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


function compare_files($file1, $file2){
  $f1 = fopen($file1, 'r');
  $f2 = fopen($file2, 'r');
  $counter = 0;
  echo 'line number: your solution - correct solution <br>';
  $correct=true;
  while(1){
    $counter ++;
    $a = fgets($f1);
    $b = fgets($f2);
    if(feof($f1) || feof($f2)){
      break;
    }
    else{
      echo $counter.': '.$a.' - '.$b.'<br>';
      if($a != $b){
        echo '<h1>Sucker, your solution is wrong. LOOOOOOOOSEEEER!</h1>';
        echo "<img src=\"images/loser.gif\" alt=\"Smiley face\" ><br>";
        echo '<h2>Drink one shot!</h2>';
	$correct=false;
	break;
        }
      }
  }
  if($correct){
  	echo '<h2> Congrats, your solution is correct. You may drink one shot to celebrate!</h2>';
  }
}

?>
