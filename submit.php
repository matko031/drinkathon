<?php
if($_SESSION['loggedin']!='true'){
  header('Location: /');
}

$sql = "SELECT name FROM teams WHERE id=".$_SESSION['team_id'];
if($res = $db->query($sql)){
  $team_name = $res->fetch_assoc()['name'];
}

$question= explode('/',$_SERVER['REQUEST_URI'])[2];
$file = 'teams/'.$team_name.'/answers/'.$question.'/code.py';
$code='';

if(file_exists($file)){
  $myfile = fopen($file, 'r');
  $code = fread($myfile,filesize($file));
  fclose($myfile);
}

 ?>


<form action="/check_solution" method="post" enctype="multipart/form-data" id="submit_form">
  <textarea name="solution_code" form="submit_form"><?php echo $code;?></textarea>
  <input type='hidden' name = 'question' value='<?php echo $question; ?>'>
  <input type="submit" value="Check solution" name="submit">
</form>
