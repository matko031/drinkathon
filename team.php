<?php
if($_SESSION['loggedin']!=true){
  header("Location:/");
}

$sql = "SELECT * FROM teams WHERE id=".$_SESSION['team_id'];
$res= $db->query($sql);
$row=$res->fetch_assoc();


echo "<h1>Welcome ".$row['name']."! </h1>";
?>
<h3> This is your team homepage where you can see your current scores on all the questions.</h3>
<h4> If you have less points than you thought, you can take a shot to feel better :) </h4>
<table>
  <tr>
    <th> Question </th>
    <th> Your score </th>
  </tr>
<?php
$counter =0;
$sql1 = "SELECT * FROM questions order by id asc";
$res1 = $db->query($sql1);
while($q=$res1->fetch_assoc()){
  $counter++;
  $sql2 = "SELECT * FROM team_scores WHERE question_id=".$q['id']." AND team_id=".$_SESSION['team_id'];
  $res2 = $db->query($sql2);
  if($p=$res2->fetch_assoc()){
    $score=$p['score'];
  }
  else{
    $score=0;
  }

  echo "<tr> <td> ".$q['name']." </td> <td> $score </td> </tr>";
}
echo "</table>";


?>
