<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Login</title>
  <meta name="description" content="Stuff about movies">
  <meta name="author" content="Dillon J Fearns" >

</head>

<body>	
<h1>Welcome <?= $_SESSION['username'] ?> </h1>

<form method="POST" action="">
<input type="submit" name="logout" value="logout">
</form>
	
</body>
</html>

