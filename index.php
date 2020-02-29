<?php
$url = explode('/',$_SERVER['REQUEST_URI']);


require("config.php");
require("header.php");
include("functions.php");
switch ($url[1]) {
  case 'about':
    require('about.php');
    break;

  case 'questions':
    require('questions.php');
    break;

  case 'register':
    require('register.php');
    break;

  case 'register_team':
    require('register_team.php');
    break;

  case 'login':
    require('login.php');
    break;

  case 'login_team':
    require('login_team.php');
    break;

  case 'team':
    require('team.php');
    break;

  case 'submit':
    require ('submit.php');
    break;

  case 'logout':
    require ('logout_team.php');
    break;

  case 'check_solution':
    require ('check_solution.php');
    break;

  case 'choose_question':
    require ('choose_question.php');
    break;

  case '/submit';
    require ('submit.php');
    break;

  case 'questions_dir':
    header('Location: questions_dir/'.url[3]);
    break;

  default:
    require('homepage.php');
    break;
}

//require("footer.php");
?>
</body>
</html>
