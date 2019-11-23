<?php
$team_name = $_POST['team_name'];
$team_pass = $_POST['password'];
$pax1 = $_POST['pax1'];
$pax2 = $_POST['pax2'];
$email = $_POST['email'];
$pass = password_hash($team_pass, PASSWORD_DEFAULT);

$team_names = array();
$sql = "SELECT name FROM teams";
$result = $db ->query($sql);
while ($team = $result->fetch_assoc()){
  array_push($team_names, $team['name']);
}

if(in_array($team_name, $team_names)){
  echo "the username is taken, please try again";
}
else{
  $sql = "INSERT INTO teams(name, pax1, pax2, email, password) VALUES('$team_name', '$pax1', '$pax2', '$email', '$pass')";
  if (!$result = $db->query($sql)) {
    echo "Registration failed";
  }

  else{
    "login succefull";
    mkdir('teams/'.$team_name, 0777);
    mkdir('teams/'.$team_name.'/answers', 0777);

    login_team($team_name, $team_pass, $db);
  }
}
?>
