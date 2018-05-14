<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/editView.php";

class editController {

    private $authModel;
    function __construct() {

        $this->authModel = new editView();
    }

    function redirectToHomePage() {
        header ("Location: http://localhost/hw2/homePage.php");
        exit();
    }
}

?>
