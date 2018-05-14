<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";
/**
*
*/
class homePageView extends mainView {
	function __construct()
	{
		$this->renderHeader();
		$this->renderBody();
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

	function renderBody() {
		$this->renderNavigationBar();
		?>

		<div class="wrapper">
			<h2>Search</h2>
			<form class="form-inline" action="homePage.php?action=search" method="post">
				<div class="form-group">
					<label>Filter</label>
					<select name="filter">
						<option value="movies">Movie</option>
						<option value="tvshows">TV Show</option>
						<option value="actors">Actor</option>
					</select>
				</div>
				<div class="form-group">
					<label>Search</label>
					<input type="text" name="userInput" maxlength="70" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary mb-2">Search</button>
			</form>
		</div>
		<?php
	}
}

?>
