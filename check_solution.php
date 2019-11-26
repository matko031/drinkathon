<?php
$question_id = $_POST['question_id'];
$sql = "SELECT name FROM teams WHERE id='".$_SESSION['team_id']."'";

if($res = $db->query($sql)){
  $team_name = $res->fetch_assoc()['name'];
}

$location = 'teams/'.$team_name.'/answers/'.$question_id;
if( !file_exists($location)){
  mkdir($location);
}

$team_code = "teams/".$team_name."/answers/".$question_id."/code.py";
$err_file = 'teams/'.$team_name.'/answers/'.$question_id.'/err';
$team_solution ='teams/'.$team_name.'/answers/'.$question_id.'/solution';
$correct_solution = "questions_dir/".$question_id."/output";
$input = "questions_dir/".$question_id."/input";


$code = $_POST['solution_code'];
$file = fopen($team_code, "w");
fwrite($file, $code);
fclose($file);

exec('chmod +x '.$team_code);

$command = 'ulimit -t 2 && cat '.$input.' | python3 '.$team_code.' 2>'.$err_file.' 1>'.$team_solution;
exec($command);
if(strlen(file_get_contents($err_file))==0){
  $solution = compare_files($team_solution, $correct_solution);

  if($solution){
    $s1 = $db -> prepare("SELECT points FROM questions WHERE id=?");
    $s1->bind_param('s', $question_id);
    $s1 -> execute();
    $points = $s1->get_result();
    $points = $points->fetch_assoc()['points'];
    $s1->close();

    $s2 = $db -> prepare("SELECT * FROM team_scores WHERE team_id=? AND question_id=?");
    $s2->bind_param('ss', $_SESSION['team_id'], $question_id);
    $r2 = $s2 ->execute();
    $s2->close();
    if(gettype($r2)!='boolean' ){
      $s3 = "UPDATE team_scores SET score +=".$points." WHERE question_id=".$question_id." AND  team_id=".$_SESSION['team_id'];
      $db->query($s3);
    }
    else{
      $s4 = "INSERT INTO team_scores (question_id, team_id, score) VALUES (".$question_id.", ".$_SESSION['team_id'].", ".$points.")";
    }
    echo '<h2> Congrats, your solution is correct. You may drink one shot to celebrate!</h2>';
    echo "<img src=\"images/celebration.gif\" alt=\"Smiley face\" ><br>";
  }

  else{
    echo '<h1>Sucker, your solution is wrong. LOOOOOOOOSEEEER!</h1>';
    echo "<img src=\"images/loser.gif\" alt=\"Smiley face\" ><br>";
    echo '<h2>Drink one shot!</h2>';
  }
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
