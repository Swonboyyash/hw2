<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/profileView.php";

class profileController {

    private $authModel;
    function __construct() {

        $this->authModel = new profileView();

    }

    function redirectToHomePage() {
        header ("Location: http://localhost/hw2/homePage.php");
        exit();
    }
}

?>
