
<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/configs/CreateDB.php";
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/layouts/homePageView.php";

$connection = new CreateDB();

if (isset($_POST['signupsubmit'])) {
  if (isset($_POST['email']) && filter_input(INPUT_POST, "email")) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  } else {
    $email = '';
  }
  $username = isset($_POST['email']) ? filter_input(INPUT_POST, "username") : '';
  $passwd = isset($_POST['email']) ? filter_input(INPUT_POST, "password") : '';

	$fname = isset($_POST['firstname']) ? filter_input(INPUT_POST, "firstname") : '';
	$lname = isset($_POST['lastname']) ? filter_input(INPUT_POST, "lastname") : '';
	$month = isset($_POST['month']) ? $_POST['month'] : '';
  $day = isset($_POST['day']) ? $_POST['day'] : '';
  $year = isset($_POST['year']) ? $_POST['year'] : '';
  $dobstring = $year . "-" . $month . "-" . $day;
  $dob = date("Y-m-d", strtotime($dobstring));
	$actor = isset($_POST['faveactor']) ? filter_input(INPUT_POST, "faveactor") : '';
	$genre = isset($_POST['favegenre']) ? filter_input(INPUT_POST, "favegenre") : '';
	$tvshow = isset($_POST['favetvshow']) ? filter_input(INPUT_POST, "favetvshow") : '';
	$movie = isset($_POST['favemovie']) ? filter_input(INPUT_POST, "favemovie") : '';

if ($email == '' || $username == ''|| $passwd == '') {
  redirectToSignUp();
} else {
  $resultSet = $connection->executeSignUp($email, $username, $passwd);

  if (!is_null($resultSet)) {
	   $newSet=$connection->executeSignUpProfile($fname,$lname,$dob,$actor,$genre,$tvshow,$movie,$username);
	    redirectToLogIn();
  } else {
    echo "error with registration";
	   redirectToSignUp();
  }
}
} else if (isset($_POST['loginsubmit'])) {
  $username = isset($_POST['username']) ? filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING) : '';
  $passwd = isset($_POST['password']) ? filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING) : '';
  if($username == ''|| $passwd == '') {
    redirectToLogIn();
  } else {
    $resultSet = $connection->verifyLogin($username, $passwd);
    if (!is_null($resultSet)) {
		  $tempset= $connection->showProfile($username);
			setUpHomePageView($tempset);
    } else {
      redirectToLogIn();
    }
  }
} else {
	redirectToLogIn();
}

function setUpHomePageView(UserProfile $user)
{
  new homePageView($user);
}

function redirectToSignUp() {
  header("Location: ../../../index.php?action=signUp");
  exit();
}

function redirectToLogIn() {
  header("Location: ../../../index.php?action=login");
  exit();
}

function redirectToSearchPage() {
  header("Location: ../../../index.php?action=search");
  exit();
}
?>
