<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <meta name="description" content="Stuff about movies">
  <meta name="author" content="Dillon J Fearns" >
  <link rel="stylesheet" href="assets/style/stylesheet.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

</head>

<body>	

<div class="centered color-block">
<h1 class="text-center">Please log in</h1>
<br>
<p style="color: #ff372a;"><?= (isset($problemo)) ? $problemo  : ""?></p>
<br>
<form method="POST" action="">
<label for="username" >Username: </label><br><input type="text" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; } ?>" <?php if (!isset($_POST['username'])) { echo "autofocus"; } ?> required title="username"><br />
<br>
<label for="password" >Password: </label><br><input type="password" name="password" <?php if (isset($_POST['username'])) { echo "autofocus"; } ?> required title="password"><br />
<input type="submit" name="submit">
</form>
</div>



	
</body>
</html>

