<?php

$dataBase = new PDO('mysql:host=mysql-server-1.macs.hw.ac.uk;dbname=djf1;charset=utf8', 'djf1', 'abcdjf1354');

include 'models/movies-model.php';

$moviesModel = new moviesModel($dataBase);

$movieList = $moviesModel->getAllMovies();
$aMovie = $moviesModel->getAMovie()->fetch();

include 'views/movies-view.php';

?>

