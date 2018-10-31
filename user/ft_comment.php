<?php
  session_start();
  if (!$_SESSION['Username'] || empty($_SESSION['Username'])) {
      header('Location: index.php?err=You must login to access this page.');
      exit();
  }
  if (empty($_POST['comment']) || empty($_GET['img_id'])) {
      header("Location: ../gallery.php?page=$_GET[page]");
      exit();
  }
  include_once '../config/database.php';
  header("Location: ../gallery.php?page=$_GET[page]");

  $comment = filter_var($_POST[comment], FILTER_SANITIZE_STRING);
  
  try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $dbh->prepare('INSERT INTO comments (login, img_id, comment) VALUES  (:login, :img_id, :comment)');
    $sth->bindParam(':img_id', $_GET['img_id'], PDO::PARAM_INT);
    $sth->bindParam(':login', $_SESSION[Username], PDO::PARAM_STR);
    $sth->bindParam(':comment', $comment, PDO::PARAM_STR);
    $sth->execute();
  } catch (PDOException $e) {
      echo 'Error: '.$e->getMessage();
      exit;
  }