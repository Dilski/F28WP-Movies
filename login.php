<?php

$dataBase = new PDO('mysql:host=mysql-server-1.macs.hw.ac.uk;dbname=djf1;charset=utf8', 'djf1', 'abcdjf1354');

include 'models/login-model.php';

$model = new loginModel($dataBase);

if (isset($_POST['submit'])) {
	$model->tryLogin($_POST['username'], $_POST['password']);
}
if (isset($_POST['logout'])) {
	session_destroy();
}

if(isset($_SESSION['username'])) {
	$dataBase = new PDO('mysql:host=mysql-server-1.macs.hw.ac.uk;dbname=djf1;charset=utf8', 'djf1', 'abcdjf1354');

	include 'models/movies-model.php';

	$moviesModel = new moviesModel($dataBase);
	
	$movieList = $moviesModel->getUserMovies($_SESSION['id']);
	include 'views/login-view-loggedin.php';
} else {
	include 'views/login-view-login.php';
}
?>

