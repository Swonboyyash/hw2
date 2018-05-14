<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";
/**
*
*/
class homePageView extends mainView {
	function __construct()
	{
		$this->renderHeader();
		$this->renderNavigationBar();
		?> <div class="container-fluid"> <h2>Search</h2> </div> <?php
		$this->renderSearchBody();
		$this->renderFooter();
	}

	//Old View of Home Page. New one is replaced to display the

	// function createUserProfTable(UserProfile $u) {
	// 		echo "<html>";
	// 		echo "<h1><strong>Hello, " . $u->getUsername(). "!</strong></h1>";
	//   echo "<h2>Your Profile</h2>";
	// 		echo "<table border = '1'>";
	//   echo "	<tr>\n";
	//   echo "		<th><i>First Name </i></th>";
	// 		echo "		<th><i>Last Name </i></th>";
	// 		echo "		<th><i>DOB </i></th>";
	// 		echo "		<th><i>Favorite Actor </i></th>";
	// 		echo "		<th><i>Favorite Genre </i></th>";
	// 		echo "		<th><i>Favorite TV Show </i></th>";
	// 		echo "		<th><i>Favorite Movie </i></th>";
	// 		echo "	</tr>\n";
	// 		echo "	<tr>\n";
	//   echo "		<td>" . $u->getFirstName()  	. "</td>\n";
	// 		echo "		<td>" . $u->getLastName()  		. "</td>\n";
	// 		echo "		<td>" . $u->getDOB()  				. "</td>\n";
	// 		echo "		<td>" . $u->getFaveActor()  	. "</td>\n";
	// 		echo "		<td>" . $u->getFaveGenre()  	. "</td>\n";
	// 		echo "		<td>" . $u->getFaveTVShow()  	. "</td>\n";
	// 		echo "		<td>" . $u->getFaveMovie()  	. "</td>\n";
	//   echo "	</tr>\n";
	// 		echo "</table>";
	// 		echo "</html>";
	// 		}
}
?>
