<?php
$url = array_filter(explode("/", $_SERVER['REQUEST_URI']));

require("config.php");
require("header.php");
echo $url;
die();

if(sizeof($url)>0){

  switch ($url[1]) {
    case 'questions':
      require('questions.php');
  }
}

else{
  require('homepage.php');
}
?>
