<?php
$question = $_POST['question'];
$sql = "SELECT username FROM users WHERE id='".$user."'";

if($res = $db->query($sql)){
  $username = $res->fetch_assoc()['username'];
}
$user_solution = "users/".$username."/".$question.".py";
$err_file = 'users/'.$username.'/err_'.$question;

$code = $_POST['solution_code'];
$file = fopen($user_solution, "w");
fwrite($file, $code);
fclose($file);

exec('chmod +x '.$user_solution);

$command = 'python3 '.$user_solution.' 2>'.$err_file;
$res = exec($command);
if(strlen($err_file)==0){
  echo $res;
}

else{
  echo $res;
  echo '<br>';
  echo nl2br(file_get_contents($err_file));
}
?>
