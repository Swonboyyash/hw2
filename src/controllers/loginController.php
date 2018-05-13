<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/loginView.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/models/authenticateModel.php";
    class loginController {
        function __construct() {
            new loginView();
        }
    }
?>
