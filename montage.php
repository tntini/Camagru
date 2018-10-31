<?php
  session_start();
  if ($_SESSION[Username] && !empty($_SESSION[Username])) {
      include_once 'header.php';
  } else {
    header('Location: index.php?err=You must login to access this page.');
  }
?>
<script src="script/webcam.js" charset="utf-8"></script>
<title>Camagru - Montage</title>
  <article class="main">
    <div class="videobox">
      <h3>Online Rolling</h3>
        <video id="video"></video>
        <img id="image" height="640px" width="480px" style="display: none;"/>
        <div id="canvasvideo"></div>
      <form id="img_filter">
      <label for="flowercrown">
          <input type="radio" name="img_filter" value="images/filters/flowercrown.png" id="flowercrown" onchange="show_img('flowercrown')">
          <img class="img" src="images/filters/flowercrown.png" height="128" width="128">
        </label>
        <label for="pic1">
          <input type="radio" name="img_filter" value="images/filters/pic1.png" id="pic1" onchange="show_img('pic1')">
          <img class="img" src="images/filters/pic1.png" height="128" width="128">
        </label>
        <label for="pic2">
          <input type="radio" name="img_filter" value="images/filters/pic2.png" id="pic2" onchange="show_img('pic2')">
          <img class="img" src="images/filters/pic2.png" height="128" width="128">
        </label>
        <label for="pic3">
          <input type="radio" name="img_filter" value="images/filters/pic3.png" id="pic3" onchange="show_img('pic3')">
          <img class="img" src="images/filters/pic3.png" height="128" width="128">
        </label>
        <label for="pic4">
          <input type="radio" name="img_filter" value="images/filters/pic4.png" id="pic4" onchange="show_img('pic4')">
          <img class="img" src="images/filters/pic4.png" height="128" width="128">
        </label>
        <label for="pic8">
          <input type="radio" name="img_filter" value="images/filters/pic8.png" id="pic8" onchange="show_img('pic8')">
          <img class="img" src="images/filters/pic8.png" height="128" width="128">
        </label>
        <label for="pic9">
          <input type="radio" name="img_filter" value="images/filters/pic9.png" id="pic9" onchange="show_img('pic9')">
          <img class="img" src="images/filters/pic9.png" height="128" width="128">
        </label>
        <label for="pic10">
          <input type="radio" name="img_filter" value="images/filters/pic10.png" id="pic10" onchange="show_img('pic11')">
          <img class="img" src="images/filters/pic10.png" height="128" width="128">
        </label>
        <label for="pic11">
          <input type="radio" name="img_filter" value="images/filters/pic11.png" id="pic11" oncsshange="show_img('pic11')">
          <img class="img" src="images/filters/pic11.png" height="128" width="128">
        </label>
        <label for="pic12">
          <input type="radio" name="img_filter" value="images/filters/pic12.png" id="pic12" onchange="show_img('pic12')">
          <img class="img" src="images/filters/pic12.png" height="128" width="128">
        </label>
      </form>
      <br/>
      <button class="button" id="snap" onclick="javascript:takeSnap()">Take Apicture</button>
      </br>
      <br/>
    <label>UPLOAD IMAGE</label><input type='file' accept="image/*" onchange="readURL(this);" />
    <br/>
    <img id="image" height="640px" width="480px" style="display: none;"/>
  </div>
  </article>

  <aside class="aside2">
    <div class="videobox">
    <h3>Pictures</h3>
    <div id="canvas"></div>
    <form method='post' accept-charset='utf-8' name='form'>
      <input name='img' id='img' type='hidden'/>
      <input name='user' id='user' type='hidden' value='<?=$_SESSION[Username];?>'/>
    </form>
  </div>
  </aside>
  <footer class="footer">
  </footer>
</div>
