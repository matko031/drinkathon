<?php
$url = $_SERVER['REQUEST_URI'];

require("config.php");
require("header.php");
include("functions.php");

switch ($url) {
  case '/about':
    require('about.php');
    break;

  case '/questions':
    require('questions.php');
    break;

  case '/register':
    require('register.php');
    break;

  case '/login':
    require('login.php');
    break;

  case '/login_user':
    require('login_user.php');
    break;

  case '/team':
    require('team.php');
    break;

  case '/submit':
    require ('submit.php');
    break;

  case '/logout':
    require ('logout_user.php');
    break;



  default:
    require('homepage.php');
    break;
}

require("footer.php");
?>
