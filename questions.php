<?php

$sql = "SELECT * FROM questions";
if($res = $db -> query($sql)){
  while($q = $res->fetch_assoc() ){
    $print = "<a target='_blank' href=questions_dir/".$q['location']." > ".$q['location']." </a> <br>";
    echo $print;
  }
}

?>
