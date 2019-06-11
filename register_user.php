<?php
$username = $_POST['username'];
$user_pass = $_POST['password'];
$pass = password_hash($user_pass, PASSWORD_DEFAULT);

$usernames = array();
$sql = "SELECT username FROM users";
$result = $db ->query($sql);
while ($res = $result->fetch_assoc()){
  array_push($usernames, $res['username']);
}

if(in_array($username, $usernames)){
  echo "the username is taken, please try again";
}
else{
  $sql = "INSERT INTO users(username, password_hash) VALUES('$username', '$pass')";
  if (!$result = $db->query($sql)) {
    echo "Registration failed";
  }

  else{
    "login succefull";
    mkdir('users/'.$username, 0777);
    login_user($username, $user_pass, $db);
  }
}
?>
