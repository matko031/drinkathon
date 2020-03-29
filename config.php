<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "mysql.ulyssis.org";
$username = "matko031";
$password = "sir49627";
$dbname = "matko031_drinkathon";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

session_start();
