<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Movies</title>
  <meta name="description" content="Stuff about movies">
  <meta name="author" content="Dillon Fearns">

</head>

<body>	
<h1><?= $aMovie['movieTitle'] ?> is the movie for today.</h1>

	<?php foreach ($movieList as $movie): ?>
		<p><?= $movie['movieTitle'] ?> is one of the movies</p>
	<?php endforeach ?> 

	
</body>
</html>


