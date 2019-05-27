<?php
require("header.php");
?>

<form action="register_user.php" method="post">
  <label for=username>Username:</label>
  <input type="text" name="username" placeholder="Username" required>

  <label for=password>Password:</label>
  <input type="text" name="password" placeholder="Password" required>

  <button type="submit">Register</button>
</form>

<?php
require("footer.php");
?>
