<?php

require("config.php");

$username= $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$res = $conn->query($sql);
if($res){
  $row = $res->fetch_assoc();
  if(password_verify($pass, $row['password_hash'])){

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['loggedin']=true;
    header("Location: /");
    die;
  }
}

header("Location: /");



?>
