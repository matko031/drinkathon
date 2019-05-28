<?php
require("config.php");
$file_name = "temp_".$user.$_POST['question'].".py";
$code = $_POST['solution_code'];
$file = fopen($file_name, "w");
fwrite($file, $code);
fclose($file);
echo "abc";
$a = exec("`python3 ".$file_name."` 2>&1");
echo var_dump($a);
echo "def";
 ?>
