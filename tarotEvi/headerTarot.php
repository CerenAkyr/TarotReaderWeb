<!DOCTYPE html>
<?php
session_start();
?>
  <html>

    <head>
      <meta charset = "utf-8">
      <meta name = "description" content = "This is an example">
      <meta name = viewport content = "width=device-width, initial-scale=1">
      <title>Tarot Evi</title>
      <link rel = "stylesheet" href = "/tarotEvi/styleSheets/headerMain.css">

    </head>

  <body>
      <ul>
        <li><a href='profile.php'> <?php echo $_SESSION['userUid']; ?></a></li>
        <li><a href='mainPage.php'>Tarot Falı Bak</a></li>
        <li><a href='#randomwall'>Pseudo</a></li>
        <li><a href='#search'>Forum</a></li>
      </ul>
