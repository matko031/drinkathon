
<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select the question and the file to upload:
	<select name = 'question'>
		<option value='question1'> Question 1 </option>
	</select>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
</form>

</body>
</html>
