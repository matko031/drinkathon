<?php

function login_team($t, $p, $db){


  $sql = "SELECT * FROM teams WHERE name='$t'";
  if($res = $db->query($sql)){
    $team = $res->fetch_assoc();
    if(password_verify($p, $team['password'])){
      $_SESSION['team_id'] = $team['id'];
      $_SESSION['team_name'] = $team['name'];
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
    if($counter > 200){
      echo '<h3> Answer too long, drink one shot extra! </h3>';
      $correct = false;
      break;
    }
    $a = fgets($f1);
    $b = fgets($f2);
    if((feof($f1) || feof($f2))){
      if($counter < 2){
        $correct=false;
      }
      break;
    }
    else{
      echo $counter.': '.$a.' - '.$b.'<br>';
      if($a != $b){
        return false;
        }
      }
  }
  if($correct){
    return true;
  }
}

?>
