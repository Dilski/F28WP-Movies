<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Login</title>
  <meta name="description" content="Stuff about movies">
  <meta name="author" content="Dillon J Fearns" >

</head>

<body>	
<h1>Please log in</h1>
<form method="POST" action="">
<label for="username" >Username: </label><input type="text" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; } ?>" <?php if (!isset($_POST['username'])) { echo "autofocus"; } ?> required>
<label for="password" >Password: </label><input type="password" name="password" <?php if (isset($_POST['username'])) { echo "autofocus"; } ?> required>
<input type="submit" name="submit">
</form>


	
</body>
</html>

