<?php
class moviesModel {
	protected $database;

	function __construct(PDO $db) {
		$this->database = $db;
		$this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	function getAllMovies() {
		return $this->database->query("SELECT * from my_movies");
	}

	function getAMovie() {
		return $this->database->query("SELECT * from my_movies WHERE movieID = 1");
	}

	function getUserMovies($userID) {

		$sql = '
			SELECT * 
			FROM my_movies 
			INNER JOIN users_movies ON my_movies.movieID = users_movies.movieID 
			INNER JOIN my_users ON my_users.userID = users_movies.userID 
			WHERE my_users.userID = :id';
		
		$query = $this->database->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$query->execute(array(':id' => $userID));
	 	return $query->fetchAll();
	}
	
	function inputNewMovie($userID) {

		$sql = "
			INSERT INTO my_movies (movieGenre, movieTitle, movieType, movieRating, movieURL) 
			VALUES (:genre, :title, :type, :rating, :url);
			";
		
		$query = $this->database->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$query->bindParam(':genre', $_POST['Genre']);
		$query->bindParam(':title', $_POST['Title']);
		$query->bindParam(':type', $_POST['English']);
		$query->bindParam(':rating', $_POST['Rating']);
		$query->bindParam(':url', $_POST['URL']);
		$query->execute();
		$movieID = $this->database->lastInsertId();
      $sql = "INSERT INTO users_movies (movieID, userID) VALUES (:movie, :user);";
		
		$query = $this->database->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$query->bindParam(':movie', $movieID);
		$query->bindParam(':user', $userID);
		$query->execute();
	}
	
	function deleteMovie($movieID) {

		$sql = "DELETE FROM my_movies WHERE movieID = :movieID";
		
		$query = $this->database->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$query->bindParam(':movieID', $movieID);
		$query->execute();
	}

}
