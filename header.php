<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/camagru.css">
</head>

<div class="wrapper">
    <header class="header">
        <a href="index.php" id="title"><h1>Camagru</h1></a>
        <ul class="navbar">
            <li><a href="index.php">Index</a></li>
            <li><a href="montage.php">Montage</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="public.php">Public</a></li>
            <?php if ($_SESSION[Username] && !empty($_SESSION[Username])): ?>
              <li><a href='user/ft_disconnect.php'>Sign out</a></li>
              <li><a href='edit.php'>Edit Profile</a></li>
            <?php endif; ?>
        </ul>
    </header>

</html>
