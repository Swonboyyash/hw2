<?php
require_once "Config.php";
include_once("User.php");
include_once("UserProfile.php");
include_once('Movie.php');
include_once('TvShow.php');
include_once('Actor.php');

class CreateDB {
    public $conn;
    function __construct() {
        try {
            $this->conn = new PDO('mysql:host='.Config::Host.';dbname='.Config::Database,
            Config::UserName, Config::Password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex) {
            echo 'ERROR: '.$ex->getMessage();
        }
    }
    public function verifyLogin($username, $passwd) {
        $query = "SELECT username, password, email FROM user WHERE username = :username AND password = :passwd";

        $ps = $this->conn->prepare($query);
        $ps->bindParam(':username', $username);
        $ps->bindParam(':passwd', $passwd);
        $ps->execute();

        if($result = $ps->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User')) {
            return $result['0'];
        } else {
            return null;
        }
    }
    public function showProfile($username)
    {
        $query = "SELECT first_name, last_name, date_of_birth, favorite_actor, favorite_genre, favorite_tv_show, favorite_movie, user_id, username
        from user_profiles where Username = :username";

        $ps = $this->conn->prepare($query);
        $ps->execute(array(':username' => $username));

        if($result = $ps->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'UserProfile')) {
            return $result['0'];
        } else {
            return null;
        }
    }

    public function executeSignUp($email, $username, $passwd) {
        $query = "INSERT INTO user VALUES('".$username."', '".$passwd."', '".$email."');";
        try {
            $count = $this->conn->exec($query);
            return $count;
        }
        catch (PDOException $ex) {
            print_r($ex->getMessage());
            return null;
        }
    }

    public function executeSignUpProfile($firstName,$lastName,$DOB,$favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie, $username)
    {
        $query = "INSERT INTO user_profiles (First_Name,Last_Name,Date_of_Birth,Favorite_Actor,Favorite_Genre, Favorite_TV_Show,Favorite_Movie,Username) VALUES ('".$firstName."', '".$lastName."', '".$DOB."', '".$favorite_actor."', '".$favorite_genre."', '".$favorite_TV."', '".$favorite_movie."', '".$username."');";
        try {
            $count = $this->conn->exec($query);
            return $count;
        }
        catch( PDOException $ex)
        {
            print_r($ex->getMessage());
            return null;
        }
    }

    public function fetchMovies($userInput) {
        // Check for $userInput;
        if ($userInput == "") {
            $query = "SELECT mediaId, title, year, first, last, middle, length FROM media NATURAL JOIN movie";
        } else {
            $query = "SELECT mediaId, title, year, first, last, middle, length FROM media  NATURAL JOIN movie WHERE title LIKE '%". $userInput . "%'";
        }

        try {
            $result = $this->conn->prepare($query);
            $result->execute();

            if ($resultSet = $result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Movie')) {
                return $resultSet;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public function fetchTvShows($userInput) {
        if ($userInput == "") {
            $query = "SELECT mediaId, title, year, first, last, middle, numberofseasons, completion_status, number_of_episodes FROM media NATURAL JOIN tv_show";
        } else {
            $query = "SELECT mediaId, title, year, first, last, middle, numberofseasons, completion_status, number_of_episodes FROM media NATURAL JOIN tv_show WHERE title LIKE '%". $userInput . "%'";
        }
        try {
            $result = $this->conn->prepare($query);
            $result->execute();

            if ($resultSet = $result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'TvShow')) {
                return $resultSet;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public function fetchActors($userInput) {
        if ($userInput == "") {
            $query = "SELECT actorId, first, last, middle, location, date_of_birth FROM actor";
        } else {
            $query = "SELECT actorId, first, last, middle, location, date_of_birth FROM actor WHERE first LIKE '%". $userInput . "%' OR last LIKE '%". $userInput . "%'";
        }
        try {
            $result = $this->conn->prepare($query);
            $result->execute();

            if ($resultSet = $result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Actor')) {
                return $resultSet;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public function getUpdatedUser($user_id) {
        $query = "SELECT first_name, last_name, date_of_birth, favorite_actor, favorite_genre, favorite_tv_show, favorite_movie, user_id, username
        from user_profiles where user_id = :userid";

        $ps = $this->conn->prepare($query);
        $ps->execute(array(':userid' => $user_id));

        if($result = $ps->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'UserProfile')) {
            return $result['0'];
        } else {
            return null;
        }
    }

    public function submitChanges($favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie,$user_id) {

      $query = "UPDATE user_profiles SET Favorite_Actor = :favorite_actor, Favorite_TV_Show = :favorite_tv, Favorite_Genre = :favorite_genre, Favorite_Movie = :favorite_movie WHERE user_id = :user_id;";
      // $query = "UPDATE user_profiles SET Favorite_Actor ='".$favorite_actor."', Favorite_TV_Show = '".$favorite_TV."', Favorite_Genre = '".$favorite_genre."', Favorite_Movie = '".$favorite_movie."' WHERE user_id = ".$user_id.";";
      // print_r($query);
      try {
        $ps = $this->conn->prepare($query);
        $ps->bindValue(':favorite_actor', $favorite_actor, PDO::PARAM_STR);
        $ps->bindValue(':favorite_tv', $favorite_TV, PDO::PARAM_STR);
        $ps->bindValue(':favorite_genre', $favorite_genre, PDO::PARAM_STR);
        $ps->bindValue(':favorite_movie', $favorite_movie, PDO::PARAM_STR);
        $ps->bindValue(':user_id', $user_id, PDO::PARAM_INT);

        return $ps->execute();

      }
      catch (PDOException $e) {
        echo $e->getMessage();
        return null;
      }
    }
}
?>
