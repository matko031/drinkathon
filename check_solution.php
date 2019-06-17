<?php
$question = $_POST['question'];
$sql = "SELECT username FROM users WHERE id='".$user."'";

if($res = $db->query($sql)){
  $username = $res->fetch_assoc()['username'];
}
$user_program = "users/".$username."/".$question.".py";
$err_file = 'users/'.$username.'/'.$question.'_err';
$user_solution ='users/'.$username.'/'.$question.'_solution';
$correct_solution = 'competition_logic/correct_solutions/'.$question;


$code = $_POST['solution_code'];
$file = fopen($user_program, "w");
fwrite($file, $code);
fclose($file);

exec('chmod +x '.$user_program);

$command = 'python3 '.$user_program.' 2>'.$err_file.' 1>'.$user_solution;
exec($command);
if(strlen(file_get_contents($err_file))==0){
  compare_files($user_solution, $correct_solution);
}

else{
  echo nl2br(file_get_contents($user_solution));
  echo '<br>';
  echo nl2br(file_get_contents($err_file));
  echo '<br><br><br>';
  echo '<h1>SYNTAX ERROR SUCKER, DRINK TWO SHOTS!!!</h1>';
  echo "<img src=\"images/shots.gif\" alt=\"Smiley face\" ><br>";
}

?>
