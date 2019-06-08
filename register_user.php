<?php
echo 'start';
$username = $_POST['username'];
$user_pass = $_POST['password'];
$pass = password_hash($user_pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(username, password_hash) VALUES('$username', '$pass')";
echo 'abc';
if (!$result = $db->query($sql)) {
  echo "Registration failed";
}
else{
  "login succefull";
  login_user($username, $pass);
}
echo 'leleee';
?>
