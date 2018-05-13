<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/loginView.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/authenticateModel.php";

    class authenticateController {

        function __construct($username, $password) {

            $authModelInit = new authenticateModel();
            if (isset($_POST['loginsubmit']) && !($username == "" || $password == "")) {
                $result = $authModelInit->validateUserLogIn($username, $password);
                if (!is_null($result)) {
                    $this->setUpHomePageView($result);
                } else {
                    $this->redirectToLogIn();
                }
            } else if (isset($_POST['signupsubmit'])) {
                ?>
                    <h1> Welcome </h1>
                <?php
                $email = (isset($_POST['email']) && filter_input(INPUT_POST, "email")) ? filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL) : '';
                $result = $this->validateSignUpForm($email, $username, $password) ? $authModelInit->executeSignUp($email, $username, $password) : $this->redirectToSignUp();
                if (!is_null($result)) {

                    $firstName = isset($_POST['firstname']) ? filter_input(INPUT_POST, "firstname") : '';
                	$lastName = isset($_POST['lastname']) ? filter_input(INPUT_POST, "lastname") : '';
                	$month = isset($_POST['month']) ? $_POST['month'] : '';
                    $day = isset($_POST['day']) ? $_POST['day'] : '';
                    $year = isset($_POST['year']) ? $_POST['year'] : '';
                    $dobstring = $year . "-" . $month . "-" . $day;
                    $dob = date("Y-m-d", strtotime($dobstring));
                	$favorite_actor = isset($_POST['faveactor']) ? filter_input(INPUT_POST, "faveactor") : '';
                	$favorite_genre = isset($_POST['favegenre']) ? filter_input(INPUT_POST, "favegenre") : '';
                	$favorite_TV = isset($_POST['favetvshow']) ? filter_input(INPUT_POST, "favetvshow") : '';
                	$favorite_movie = isset($_POST['favemovie']) ? filter_input(INPUT_POST, "favemovie") : '';

                    $resultProfileStatus = $authModelInit->executeSignUpProfile($firstName,$lastName,$dob,$favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie, $username);
                    if (!is_null($resultProfileStatus)) {
                        $this->redirectToLogIn();
                    } else {
                        $this->redirectToSignUp();
                    }
                } else {
                    $this->redirectToSignUp();
                }
            }

        }

        function setUpHomePageView(UserProfile $user) {
            $_SESSION['userprofile'] = $user->jsonSerialize();
            header("Location: http://localhost/hw2/homePage.php");
        }

        function redirectToLogIn() {
            header("Location: http://localhost/hw2/index.php?action=login");
            exit();
        }

        function redirectToSignUp() {
            header("Location: http://localhost/hw2/index.php?action=signup");
            exit();
        }
        function validateSignUpForm($email, $username, $password) {
            return !($email == '' || $username == ''|| $password == '');
        }
    }
?>
