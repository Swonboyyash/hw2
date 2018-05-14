<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/profileView.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/submitchangesModel.php";

    class submitchangesController {

        function __construct($favorite_actor, $favorite_genre, $favorite_TV, $favorite_movie) {

            $scModelInit = new submitchangesModel();

            //
            // if (!($favorite_actor == "" || $favorite_genre == "" || $favorite_TV == "" || $favorite_movie == "" || $user_id == ""))
            // {

                	$favorite_actor = isset($_POST['faveactor']) ? filter_input(INPUT_POST, "faveactor") : '';
                	$favorite_genre = isset($_POST['favegenre']) ? filter_input(INPUT_POST, "favegenre") : '';
                	$favorite_TV = isset($_POST['favetvshow']) ? filter_input(INPUT_POST, "favetvshow") : '';
                	$favorite_movie = isset($_POST['favemovie']) ? filter_input(INPUT_POST, "favemovie") : '';
                  $user_id = isset($_POST['userid']) ? filter_input(INPUT_POST, "userid") : '';

                  $resultProfileStatus = $scModelInit->makeChanges($favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie, $user_id);
                    if ($resultProfileStatus) {
                        $this->updateProfile($resultProfileStatus);
                    } else {
                        $this->redirectToEdit();
                    }
            // }
            //    else {
            //         $this->redirectToEdit();
            //     }

            }

            function updateProfile(UserProfile $resultProfileStatus) {
                $_SESSION['userprofile'] = $resultProfileStatus->jsonSerialize();
               header("Location: http://localhost/hw2/homePage.php/?action=profile");
            }


        function redirectToProfile() {
           header("Location: http://localhost/hw2/homePage.php/?action=profile");
        }

        function redirectToEdit() {
          header("Location: http://localhost/hw2/homePage.php?action=edit");
        }

        function validateSignUpForm($email, $username, $password) {
            return !($email == '' || $username == ''|| $password == '');
        }
    }
?>
