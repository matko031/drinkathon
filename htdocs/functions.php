<?php

function login_user($u, $p, $db){

  $sql = "SELECT * FROM users WHERE username='$u'";
  if($res = $db->query($sql)){
    $row = $res->fetch_assoc();
    if(password_verify($p, $row['password_hash'])){
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['loggedin']=true;
      header("Location: /");
    }
    else{
      echo "Wrong username/password";
      die();
    }
  }
  echo "Login failed";
}


?>
