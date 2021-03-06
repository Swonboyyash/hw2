<?php
session_start();

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/controllers/homePageController.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/controllers/searchController.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/controllers/profileController.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/controllers/editController.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/controllers/submitchangesController.php";

if(isset($_SESSION['userprofile'])) {
    $activity = (isset($_REQUEST['action']) && in_array($_REQUEST['action'],
    ["search", "profile", "details", "edit", "submitchanges"])) ? $_REQUEST['action'] . "Controller" : "homePageController";
    if ($activity == 'homePageController') {
        if(isset($_REQUEST['movieId'])) {
            new homePageController();
        } else {
            new homePageController();
        }
    } else if ($activity == 'searchController') {
        $filterBy = (isset($_REQUEST['filter'])) ? $_REQUEST['filter'] : header("Location: ./homePage.php") ;
        new searchController($filterBy);
    } else if ($activity == 'detailsController') {
        header("Content-Type: application/json; charset=UTF-8");
        // We need to check for different types of POST within action=detailsController
        // So movieId means display details for movies
        // If tvshowId => display tvshow content.
        // print_r(gettype(json_decode($_REQUEST['movieId'])));
        new example();
    } else if ($activity == 'profileController') {
        new profileController();
    } else if ($activity == 'editController') {
        new editController();
    } else if ($activity == 'submitchangesController') {
        $userObject = $_SESSION['userprofile'];
        new submitchangesController($userObject['faveactor'], $userObject['favegenre'], $userObject['favetvshow'], $userObject['favemovie'], $userObject['userId']);
    }

} else {
    session_destroy();
    header("Location: http://localhost/hw2/index.php");
}

?>
