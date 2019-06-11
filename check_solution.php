<?php
$sql = "SELECT username FROM users WHERE id='".$user."'";
if($res = $db->query($sql)){
  $username = $res->fetch_assoc()['username'];
}
$file_name = "users/".$username."/".$_POST['question'].".py";
$code = $_POST['solution_code'];
$file = fopen($file_name, "w");
fwrite($file, $code);
fclose($file);
exec('chmod +x '.$file_name);


exec('"`python3 '.$file_name.' 2>err`"');
$fn = fopen("users/".$username."/err", 'r');
while (!feof($fn)){
echo fgets($fn);
echo '<br>';
}
fclose($fn);
 ?>
