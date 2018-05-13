<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/mainModel.php";

/**
 *
 */
class profileModel extends mainModel
{
    function __construct() {
        parent::__construct();
    }

    function showProfile($userInput) {
        return $this->db->fetchMovies($userInput);
    }
}
?>
