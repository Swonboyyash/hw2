<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/profileView.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/profileModel.php";

class profileController {

    private $authModel;
    function __construct($filterBy) {

        $userInput = (isset($_POST['userInput'])) ? filter_input(INPUT_POST, "userInput") : '';
        $this->authModel = new profileModel();

        switch ($filterBy) {
            case "movies":
                $resultSet = $this->authModel->fetchMovies($userInput);
                break;
            default:
                $this->redirectToHomePage();
        }

        if (!is_null($resultSet)) {
            new searchView($resultSet);
        } else {
            $this->redirectToHomePage();
        }
    }

    function redirectToHomePage() {
        header ("Location: http://localhost/hw2/homePage.php");
        exit();
    }
}

?>
