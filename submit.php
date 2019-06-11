
<form action="check_solution" method="post" enctype="multipart/form-data" id="submit_form">
    Select the question and then write the code under:
	<select name = 'question'>
    <?php
    $sql = "SELECT * FROM questions";
    if($res=$db->query($sql)){
      while($row=$res->fetch_assoc()){
        echo "<option value=q".$row['id']."> Question ".$row['id']." </option>";
    ?>
    <?php
      }
    }
     ?>
	</select>
  <br>
  <textarea name="solution_code" form="submit_form"> </textarea>
  <input type="submit" value="Check solution" name="submit">
</form>
