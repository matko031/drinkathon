
<?php
echo var_dump($_FILES);
$target_dir = "/var/www/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} 

else {
	echo "Sorry, there was an error uploading your file.";
	}
?>

