
<?php
$f1 = fopen("/var/www/correct_solutions/".$qname.".txt", "r");
$f2 = fopen("/var/www/pax_solutions/".$qname.".txt", "r");
$first_mistake = true;
$counter = 0;
while(!feof($f1)){

  $counter ++;
  $line1 = fgets($f1);
  $line2 = fgets($f2);

  if($line1 != $line2 && !feof($f1) && !feof($f2) ){
    if($first_mistake){
      echo" Line NB | Correct Solution | Your solution <br> <br>";
      $first_mistake=false;
    }
    echo $counter."  |  ".$line1." |  ".$line2;
  }
}

echo "<br> <br>";

if(!feof($f1) ){
  echo " Your file is shorter than the correct solution ";
}
elseif (!feof($f2)) {
  echo " Your file is longer than the correct solution ";
}
else {
  echo "Finished";
}
?>
