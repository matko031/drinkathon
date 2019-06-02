<?php require("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Drinkathon </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  </head>


<body>

<nav class="main-nav">
  <ul>
  <li><a href="/"> Home </a></li>
  <li><a href="/about.php"> About </a></li>
  <li><a href="/questions/"> Questions </a></li>
  <?php if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){ ?>
  <li><a href="register.php"> Register </a></li>
  <li><a href="/login.php"> Login </a></li>
  <?php } else { ?>
  <li><a href="team.php"> Team </a></li>
  <li><a href="/logout_user.php"> Logout </a></li>
  <li><a href="/submit.php"> Submit</a></li>
  <?php } ?>
</ul>
</nav>
