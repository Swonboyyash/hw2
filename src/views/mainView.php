<?php
/**
*
*/
class mainView
{
    function renderHeader() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Welcome!!</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
            <style type="text/css">
            body {
                font: 14px sans-serif;
            }
            .wrapper {
                width: 350px; padding: 20px;
            }
            </style>
        </head>
        <body>
            <?php
        }

        function renderFooter() {
            ?>
        </body>
        </html>
        <?php
    }

    function renderNavigationBar()
    {
        ?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"> Quick Links </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="http://localhost/hw2/homePage.php?action=search&filter=movies"> Movies </a></li>
                        <li><a href="http://localhost/hw2/homePage.php?action=search&filter=tvshows"> Tv Shows </a></li>
                        <li><a href="http://localhost/hw2/homePage.php?action=search&filter=actors"> Actors </a></li>
                        <li><a href="/hw2/analytics.php">Analytics</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="logout.php">
                        <button type="submit" value="logout" name="action" class="btn btn-default"> Logout </button>
                    </form>
                    <form class="navbar-form navbar-right" action="homePage.php?action=profile">
                        <button type="submit" value="profile" name="action" class="btn btn-default"> Edit Profile </button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
    }

    function renderSearchBody($select = "movies") {
        $userInput = (isset($_REQUEST['userInput'])) ? $_REQUEST['userInput'] : "";
		?>
		<div class="wrapper" style="width:auto; display:inline-block;">
			<form class="form-inline" action="homePage.php?action=search" method="post">
				<div class="form-group">
					<label>Filter</label>
					<select name="filter">
                        <?php
    						if ($select == "movies") { echo "<option value='movies' selected>Movie</option>"; } else { echo "<option value='movies'>Movie</option>"; }
    						if ($select == "tvshows") { echo "<option value='tvshows' selected>TV Show</option>"; } else { echo "<option value='tvshows'>TV Show</option>"; }
    						if ($select == "actors") {echo "<option value='actors' selected>Actor</option>"; } else { echo "<option value='actors'>Actor</option>"; }
                        ?>
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="userInput" value="<?= $userInput ?>" maxlength="70" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary mb-2">Search</button>
				</div>
			</form>
		</div><?php
	}
}

?>
