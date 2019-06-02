<?php
require("config.php");
$file_name = "temp_".$user.$_POST['question'].".py";
$code = $_POST['solution_code'];
$file = fopen($file_name, "w");
fwrite($file, $code);
fclose($file);
$a = exec("python3 ".$file_name." &>1");
echo $a;
 ?>
