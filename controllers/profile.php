<?php

session_start();
$dataBase = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DB . ';charset=utf8', DB_DB, DB_PASS);

include 'models/login-model.php';
$model = new loginModel($dataBase);

if (isset($_POST['logout']) ) {
    session::destroy();
    header( 'Location: ' . URL ) ;
    include 'views/login-view-login.php';
    die();
}


$id = $_GET['id'];

if (isset($id) && $model->userExists($id)){
    $userInfo = $model->fetchUser($id);
    include 'views/profile.php';
} else {
    header( 'Location: ' . URL ) ;
}

