<?php

$sql = "SELECT * FROM questions";
if($res = $conn -> query($sql)){
  while($q = $res->fetch_assoc() ){
    $print = "<a href=questions/".$q['location']." download> ".$q['location']." </a> <br>";
    echo $print;
  }
}

?>
