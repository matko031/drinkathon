<?php
if($user==NULL){
  header("Location:/");
}

$sql = "SELECT * FROM users WHERE id=$user";
$res= $db->query($sql);
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
$res1 = $db->query($sql1);
while($q=$res1->fetch_assoc()){
  $counter++;
  $sql2 = "SELECT * FROM points WHERE question_nb=".$q['id']." AND user_id=$user";
  $res2 = $db->query($sql2);
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
