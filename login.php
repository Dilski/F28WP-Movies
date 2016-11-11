<?php

session_start();
$dataBase = new PDO('mysql:host=mysql-server-1.macs.hw.ac.uk;dbname=djf1;charset=utf8', 'djf1', 'abcdjf1354');

include 'models/login-model.php';

$model = new loginModel($dataBase);

if (isset($_POST['submit'])) {
	$model->tryLogin($_POST['username'], $_POST['password']);
}
if (isset($_POST['logout']) ) {
	session_destroy();
	include 'views/login-view-login.php';
	break;
	
}


if(isset($_SESSION['username'])) {

	include 'models/movies-model.php';
	
	$moviesModel = new moviesModel($dataBase);

	if (isset($_POST['insertMovie']) ) {
		$moviesModel->inputNewMovie($_SESSION['id']);
	}

	
	$movieList = $moviesModel->getUserMovies($_SESSION['id']);
	
	
	include 'views/login-view-loggedin.php';
} else {
	include 'views/login-view-login.php';
}
?>

