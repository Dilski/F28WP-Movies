<?php
class moviesModel {
	protected $database;

	function __construct(PDO $db) {
		$this->database = $db;
	}

	function getAllMovies() {
		return $this->database->query("SELECT * from my_movies");
	}

	function getAMovie() {
		return $this->database->query("SELECT * from my_movies WHERE movieID = 1");
	}

}
?>
