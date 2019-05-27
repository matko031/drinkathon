<?php require("header.php"); ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select the question and the file to upload:
	<select name = 'question'>
		<option value='question1'> Question 1 </option>
	</select>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Check solution" name="submit">
</form>


<?php require("footer.php"); ?>
