<?php
require("config.php");
$username = $_POST['username'];
$user_pass = $_POST['password'];
$pass = password_hash($user_pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(username, password_hash) VALUES('$username', '$pass')";
if (!$result = $conn->query($sql)) {
  echo "Registration failed";
}

 ?>
