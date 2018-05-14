<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/mainModel.php";

    class submitchangesModel extends mainModel
    {
        private $authObj;
        function __construct()
        {
            parent::__construct();
        }

        function makeChanges($favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie, $user_id)
        {
           $result = $this->db->submitChanges($favorite_actor, $favorite_genre,$favorite_TV,$favorite_movie, $user_id);
           if ($result) {
             return $this->db->getUpdatedUser($user_id);
           } else {
             return null;
           }
        }

    }


?>
