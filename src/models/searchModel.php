<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/mainModel.php";

/**
 *
 */
class searchModel extends mainModel
{
    function __construct() {
        parent::__construct();
    }

    function fetchMovies($userInput) {
        return $this->db->fetchMovies($userInput);
    }

    function fetchTvShows($userInput) {
        return $this->db->fetchTvShows($userInput);
    }

    function fetchActors($userInput) {
        return $this->db->fetchActors($userInput);
    }
}
?>
