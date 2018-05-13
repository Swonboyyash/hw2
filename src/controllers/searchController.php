<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/searchView.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/searchModel.php";

class searchController {

    private $authModel;
    function __construct($filterBy) {

        $userInput = (isset($_POST['userInput'])) ? filter_input(INPUT_POST, "userInput") : '';
        $this->authModel = new searchModel();

        switch ($filterBy) {
            case "movies":
                $resultSet = $this->authModel->fetchMovies($userInput);
                return (!is_null($resultSet)) ? new searchView($resultSet, "movies") : $this->redirectToHomePage();
            case "tvshows":
                $resultSet = $this->authModel->fetchTvShows($userInput);
                return (!is_null($resultSet)) ? new searchView($resultSet, "tvshows") : $this->redirectToHomePage();
            case "actors":
                $resultSet = $this->authModel->fetchActors($userInput);
                return (!is_null($resultSet)) ? new searchView($resultSet, "actors") : $this->redirectToHomePage();
            default:
                $this->redirectToHomePage();
                break;
        }
    }

    function redirectToHomePage() {
        header ("Location: http://localhost/hw2/homePage.php");
        exit();
    }
}

?>
