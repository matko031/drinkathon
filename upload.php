<?php
$qname=$_POST['question'];
$target_dir = "/var/www/pax_solutions/";
$target_file = $target_dir . $qname.".txt";
$uploadOk = 1;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br> <br>";
	require("/var/www/correct_solutions/test_solution.php");
}

else {
	echo "Sorry, there was an error uploading your file.";
}
?>
