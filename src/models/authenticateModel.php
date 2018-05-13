<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/mainModel.php";

    class authenticateModel extends mainModel
    {
        private $authObj;
        function __construct()
        {
            parent::__construct();
        }

        function validateUserLogIn($username, $password)
        {
            $resultSet = $this->db->verifyLogin($username, $password);
            if (!is_null($resultSet)) {
                return $this->db->showProfile($username);
            } else {
                return null;
            }
        }

        function executeSignUp($email, $username, $password) {
            return $this->db->executeSignUp($email, $username, $password);
        }

        function executeSignUpProfile($firstName,$lastName,$DOB,$favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie, $username) {
            return $this->db->executeSignUpProfile($firstName,$lastName,$DOB,$favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie, $username);
        }
    }


?>
