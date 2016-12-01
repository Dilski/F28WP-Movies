<?php

session_start();
$dataBase = new PDO('mysql:host=mysql-server-1.macs.hw.ac.uk;dbname=djf1;charset=utf8', 'djf1', 'abcdjf1354');

include 'models/movies-model.php';
$moviesModel = new moviesModel($dataBase);


if (isset($_POST['fetchPoster'])){
	$movieTitle = "Home Alone";
	$url = "http://www.omdbapi.com";
	$url .= "?S=" . urlencode($_POST['fetchPoster']);
	$fcon = fopen($url,"r");
	$data_json='';
	if ($fcon) {
		while (!feof($fcon)) $data_json .= fgets($fcon, 4096);
		fclose($fcon);
		if($data_json!='') {
			echo ($data_json);
		} else {
			echo json_encode(array('success' => 'false'));
		}
	} else {
		echo json_encode(array('success' => 'false'));
	}


	die();
}

include 'models/login-model.php';
$model = new loginModel($dataBase);

if (isset($_POST['submit'])) {
	$model->tryLogin($_POST['username'], $_POST['password']);
}

if(isset($_SESSION['username'])) {



	if (isset($_POST['insertMovie']) ) {
		$moviesModel->inputNewMovie($_SESSION['id']);
	}
	if (isset($_POST['delete']) ) {
		$moviesModel->deleteMovie($_POST['idtoDelete']);
	}
	if (isset($_POST['logout']) ) {
		session_destroy();
		include 'views/login-view-login.php';
	} else {
		$movieList = $moviesModel->getUserMovies($_SESSION['id']);
		include 'views/login-view-loggedin.php';
	}

} else {
	include 'views/login-view-login.php';
}

