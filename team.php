<?php require("header.php");
$sql = "SELECT * FROM user WHERE id=$user";
$res= $conn->query($sql);
$row=$res->fetch_assoc();


echo "Welcome ".$row['username']."!";
?>
<table>
  <tr>
    <th> Question number </th>
    <th> Your score </th>
  </tr>
<?php
$counter =0;
$sql1 = "SELECT * FROM questions order by id asc";
$res1 = $conn->query($sql1);
while($q=$res1->fetch_assoc()){
  $counter++;
  $sql2 = "SELECT * FROM points WHERE question_nb=".$q['id']." AND team_id=$user";
  $res2 = $conn->query($sql2);
  if($p=$res2->fetch_assoc()){
    $score=$p['points'];
  }
  else{
    $score=0;
  }

  echo "<tr> <td> $counter </td> <td> $score </td> </tr>";
}
echo "</table>";


?>



<? require("footer.php") ?>
