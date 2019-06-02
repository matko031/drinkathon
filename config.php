<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', '1');
$servername = "localhost";
$username = "delimir";
$password = "sir49627";
$dbname = "drinkathon";


$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

if(isset($_SESSION['user_id'])){
    $user=$_SESSION['user_id'];
}
else{
  $user=NULL;
}

?>
