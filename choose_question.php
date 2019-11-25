<?php
echo '<h1> Please select the question you want to answer: </h1>';
$sql = "SELECT * FROM questions";
if($res = $db -> query($sql)){
  while($q = $res->fetch_assoc() ){
    $print = "<a href=/submit/".$q['id']." > ".$q['name']." </a> <br>";
    echo $print;
  }
}

?>
