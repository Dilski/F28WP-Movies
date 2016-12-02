<?php

session_start();
$dataBase = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DB . ';charset=utf8', DB_DB, DB_PASS);

include 'models/login-model.php';
$model = new loginModel($dataBase);

if (isset($_POST['submit'])) {
	$model->tryLogin($_POST['username'], $_POST['password']);
}

if(isset($_SESSION['username'])) {

	if (isset($_POST['logout']) ) {
		session::destroy();
		include 'views/login-view-login.php';
	}
	elseif (isset($_POST['edit'])){
        $location = $_POST['location'];
        $about = $_POST['about'];
        $email = $_POST['email'];

        die(json_encode($model->updateUser($location,$about,$email)));

    } else {
        $userInfo = $model->fetchUser();
		include 'views/login-view-loggedin.php';
	}

} else {
    if (isset($_GET['id'])) {
        include 'views/profile.php';
    } else {
        include 'views/login-view-login.php';
    }
}

