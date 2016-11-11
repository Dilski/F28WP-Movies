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

	function getUserMovies($userID) {

		$query = $this->database->prepare(
			'SELECT my_movies.movieTitle 
			FROM my_movies 
			INNER JOIN users_movies 
			ON my_movies.movieID = users_movies.movieID 
			INNER JOIN my_users 
			ON my_users.userID = users_movies.userID 
			WHERE my_users.userID = :id');
	 						
		return $query->execute(array(':id' => $userID));
	}

}
