<?php
echo password_hash($_GET['pass'], PASSWORD_DEFAULT);
?>

<form method="GET" action="">
  <input type="text" name="pass">
  <input type="submit">
</form>
