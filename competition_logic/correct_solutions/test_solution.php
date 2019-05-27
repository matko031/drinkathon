
<?php
$f1 = fopen("/var/www/competition_logic/correct_solutions/".$qname.".txt", "r");
$f2 = fopen("/var/www/competition_logic/pax_solutions/".$qname.".txt", "r");
$f3 = fopen("/var/www/competition_logic/correct_solutions/".$qname.".txt", "r");


$sol_len = 0;
while(!feof($f3)){
  $sol_len++;
  fgets($f3);
}

$mistakes=0;
$first_mistake = true;
$counter = 0;
while(!feof($f1)){
  if($counter>2000){
    break;
  }
  $counter ++;
  $line1 = fgets($f1);
  $line2 = fgets($f2);

  if($line1 != $line2 && !feof($f1) && !feof($f2) ){
    $mistakes++;
    if($first_mistake){
      echo" <table> <tr> <th>Line NB </th> <th> Correct Solution </th> <th> Your solution </th> </tr>";
      $first_mistake=false;
    }
    echo "<tr> <td>".$counter."</td><td>".$line1."</td><td>".$line2."</td></tr>";
  }
}

if(!$first_mistake){
  echo " </table>";
}

$score = $sol_len - $mistakes;
echo "<br> <br>";

if(!feof($f1) ){
  echo " Your file is shorter than the correct solution ";
}
elseif (!feof($f2)) {
  echo " Your file is longer than the correct solution ";
}

echo "Finished<br>";
echo "Your score is $score/$sol_len";

?>
