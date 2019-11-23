<?php
$question = $_POST['question'];
$sql = "SELECT name FROM teams WHERE id='".$_SESSION['team_id']."'";

if($res = $db->query($sql)){
  $team_name = $res->fetch_assoc()['name'];
}

if( !file_exists('teams/'.$team_name.'/answers/'.$question)){
  $location = 'teams/'.$team_name.'/answers/'.$question;
  mkdir($location);
}

$team_code = "teams/".$team_name."/answers/".$question."/code.py";
$err_file = 'teams/'.$team_name.'/answers/'.$question.'/err';
$team_solution ='teams/'.$team_name.'/answers/'.$question.'/solution';
$correct_solution = 'competition_logic/correct_solutions/'.$question;


$code = $_POST['solution_code'];
$file = fopen($team_code, "w");
fwrite($file, $code);
fclose($file);

exec('chmod +x '.$team_code);

$command = 'ulimit -t 2 && python3 '.$team_code.' 2>'.$err_file.' | head -n 1000 1>'.$team_solution;
exec($command);
if(strlen(file_get_contents($err_file))==0){
  compare_files($team_solution, $correct_solution);
}

else{
  echo nl2br(file_get_contents($err_file));
  echo nl2br(file_get_contents($team_solution));
  echo '<br>';
  echo '<br><br><br>';
  echo '<h1>SYNTAX ERROR SUCKER, DRINK TWO SHOTS!!!</h1>';
  echo "<img src=\"images/shots.gif\" alt=\"Smiley face\" ><br>";
}

?>
