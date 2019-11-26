<?php

function login_team($t, $p, $db){


  $s1 = $db->prepare("SELECT * FROM teams WHERE name=?");
  $s1 -> bind_param('s', $t);
  if($s1->execute()){
    $team=$s1->get_result()->fetch_assoc();
    echo var_dump($team);
    $s1->close();
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
  $output=array();
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
    $ea = feof($f1);
    $eb = feof($f2);
    if(($ea || $eb)){
      if(!$eb || $counter < 2){
        if ($counter <2) echo 'No output';
        if (!$eb) echo '<h2>Your solution is shorter than the correct one</h2>';
        $correct = false;
      }
      break;
    }
    else{
      array_push($output, $counter.': '.$a.' - '.$b.'<br>');
      if($a != $b){
        foreach($output as $str){
          echo $str;
        return false;
        }
      }
    }
  }

  if($correct){
    return true;
  }

  else{
    foreach($output as $str){
      echo $str;
    }
  }
}

?>
