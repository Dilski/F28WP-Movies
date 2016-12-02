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
                return "Please submit a username and a password";
            } else {
                $query = $this->dbConnection->prepare('SELECT * FROM `my_users` WHERE `username` = :id');

                $query->execute(array(':id' => $user));
                $hashFetch = $query->fetch();
                $password = $hashFetch['password'];
                $id = $hashFetch['userID'];


                if (password_verify($pass, $password)) {
                    session::set('username', $user);
                    session::set('id', $id);
                } else {
                    return "Username/Password Incorrect";

                }
            }

        } catch (PDOException $e) {
            echo "Error: " . $e;
        }

    }

    function fetchUser($id = 'empty'){
        $id = ($id == 'empty')? session::get('id') : $id;
            $query = $this->dbConnection->prepare('SELECT my_user_info.*, my_users.username FROM `my_user_info` INNER JOIN my_users ON my_users.userID=my_user_info.userID WHERE my_users.userID = :id');
            $query->execute(array(':id' => $id));
            $data = $query->fetch();
            return $data;
    }

    function updateUser($location, $about, $email) {
        $query = $this->dbConnection->prepare('UPDATE my_user_info SET userLocation= :location, userAbout= :about, userEmail= :email WHERE userID= :id');
        $query->execute(array(':location' => $location, ':about' => $about, ':email' => $email, ':id' => session::get('id')));
        return $this->fetchUser();
    }

    function userExists($id) {
        $query = $this->dbConnection->prepare("SELECT userID FROM my_user_info WHERE userID= :id");
        $query->execute(array(':id' => $id));
        return $query->rowCount() > 0;
    }

}

?>
