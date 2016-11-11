<?php

class loginModel
{
    protected $dbConnection;

    function __construct(PDO $db)
    {
        $this->dbConnection = $db;
        $this->dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function tryLogin($user, $pass)
    {
        try {
            if (!(isset($user) && isset($pass))) {
                echo "Please submit a username and a password";
            } else {
                $query = $this->dbConnection->prepare('Select * FROM `my_users` WHERE `username` = :id');
						                
                $query->execute(array(':id' => $user));
                $hashFetch = $query->fetch();
                $password = $hashFetch['password'];
                $id = $hashFetch['userID'];
           
                
                if (password_verify($pass, $password)){
                	$_SESSION['username'] = $user;
                	$_SESSION['id'] = $id;
                	} else {
                		echo "Username/Password Incorrect"; 

							}
            }

        } catch (PDOException $e) {
            echo "Error: " . $e;
        }

    }


}
?>
