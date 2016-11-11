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

<table style="width:100%">
    <tr>
        <th>Movie Title</th>
        <th>Genre</th>
        <th>Rating</th>
        <th>Poster</th>
        <th>Action</th>
    </tr>
    <?php foreach ($movieList as $movie): ?>
        <tr>
            <td><?= $movie['movieTitle'] ?></td>
            <td><?= $movie['movieGenre'] ?></td>
            <td><?= $movie['movieRating'] ?></td>
            <td></td>
            <td></td>
        </tr>
    <?php endforeach ?>
</table>
	
</body>
</html>

