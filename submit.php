<?php
if($_SESSION['loggedin']!='true'){
  header('Location: /');
}

$sql = "SELECT name FROM teams WHERE id=".$_SESSION['team_id'];
if($res = $db->query($sql)){
  $team_name = $res->fetch_assoc()['name'];
}

$question_id= explode('/',$_SERVER['REQUEST_URI'])[2];
$file = 'teams/'.$team_name.'/answers/'.$question_id.'/code.py';
$code='';

$s2 = "SELECT name FROM questions WHERE id=".$question_id;
$r2 = $db->query($s2);
$question_name = $r2->fetch_assoc()['name'];

if(file_exists($file)){
  $myfile = fopen($file, 'r');
  $code = fread($myfile,filesize($file));
  fclose($myfile);
}

echo "<h3>".$question_name."</h3>";
 ?>

<form action="/check_solution" method="post" enctype="multipart/form-data" id="submit_form">
  <textarea name="solution_code" form="submit_form"><?php echo $code;?></textarea>
  <input type='hidden' name = 'question_id' value='<?php echo $question_id; ?>'>
  <input type="submit" value="Check solution" name="submit">
</form>
