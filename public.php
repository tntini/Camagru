<?php
 session_start();
  if (!$_SESSION[Username] && empty($_SESSION[Username])) {
      if (!$_GET[page]) {
          header('Location: public.php?page=1');
      }
  } else {
      header('Location: index.php?err=You must not login to access this page.');
  }
    include_once 'config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $dbh->prepare('SELECT * FROM snap LIMIT 10');
        $sth->execute();
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }

    $result = $sth->fetchAll();
    if (!$result) {
        if ($_GET[page] > 1) {
            $prev = $_GET[page] - 1;
            header("Location: public.php?page=$prev");
            exit();
        } else {
            echo "<span class='empty'>The public is empty.</span>";
        }
    }
    include_once 'header.php';
    ?>
      <title>matcha - public</title>
      <article class='main'>
      <div class=container>
      <?php
      foreach ($result as $key => $value) {
          echo "<div class='fleximgbox'>";
          try {
              $sth = $dbh->prepare('SELECT COUNT(*) FROM likes WHERE img_id = :img_id');
              $sth->bindParam(':img_id', $value[id], PDO::PARAM_INT);
              $sth->execute();
          } catch (PDOException $e) {
              echo 'Error: '.$e->getMessage();
              exit;
          }
          $likes = $sth->fetchColumn();
          echo "<img src='$value[img]' style='width:426px;'>
          <br/>
          Posted By : <i>$value[login]
          <br/></i>Likes: $likes
          <a href='user/ft_like.php?img_id=$value[id]&page=$_GET[page]' style='float:right; margin-top: -20px;'><img src='images/Like.png' width='42' height='42'></a>
          <form class='comment' action='user/ft_comment.php?img_id=$value[id]&page=$_GET[page]' method='post'><br/>
          <input class='form' style='width:79%;' type='text' placeholder='Enter Comment' name='comment' required>
          <button type='submit' class='button' style='width: auto;'>Comment</button>
          </form>";
          try {
              $sth = $dbh->prepare("SELECT * FROM comments WHERE img_id = $value[id]");
              $sth->execute();
          } catch (PDOException $e) {
              echo 'Error: '.$e->getMessage();
              exit;
          }
          $result = $sth->fetchAll();
          if ($result) {
              echo "<div class='comments'>";
              foreach ($result as $key => $value) {
                  echo "-> <i>$value[login]</i> <br/> $value[comment] <hr>";
              }
              echo '</div>';
          }
          echo '</div>';
      }
      echo '</div><center>
      <ul class="pagination">';
     
    ?>
  </article>
</div>