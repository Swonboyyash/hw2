<?php
require_once getcwd()."/src/controllers/landingController.php";
require_once getcwd()."/src/controllers/signupController.php";
require_once getcwd()."/src/controllers/loginController.php";
require_once getcwd()."/src/controllers/authenticateController.php";

// /Applications/XAMPP/xamppfiles/htdocs/hw2
// require_once getcwd()."/src/views/layouts/searchPage.php";
session_start();
$activity = (isset($_REQUEST['action']) && in_array($_REQUEST['action'],
              ["signup", "login", "authenticate"])) ? $_REQUEST['action'] . "Controller" : "landingController";

if ($activity == 'signupController') {
  new signupController();
} else if ($activity == 'loginController') {
  new loginController();
} else if ($activity == 'landingController')  {
  new landingController();
} else if ($activity == 'authenticateController') {
    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        new authenticateController($_REQUEST['username'], $_REQUEST['password']);
    } else {
        header("Location: .");
    }
}
?>
