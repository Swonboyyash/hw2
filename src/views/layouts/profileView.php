<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";
/**
*
*/
class profileView extends mainView
{
    private $userObject;
    function __construct() {
        $this->userObject = $_SESSION['userprofile'];
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody() {
        ?>
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="jumbotron container-fluid">
                    <h1>Hello <? print_r($this->userObject['firstName']. ", ". $this->userObject['lastName']) ?></h1>
                    <p> Here is your profile.
                        You can edit your favorites here. </p>
                    </div>

                    <div class="row">
                          <div class="col-xs-6 col-lg-4">
                                  <h2> <? echo "Your Details!"; ?> </h2>
                                  <h5> <strong> Username: </strong> <? echo $this->userObject['username']?> </h5>
                                  <h5> <strong> First Name: </strong> <? echo $this->userObject['firstName']?> </h5>
                                  <h5> <strong> Last Name: </strong> <? echo $this->userObject['lastName']?> </h5>
                                  <h5> <strong> DOB: </strong> <? echo $this->userObject['dob']?> </h5><br>

                                  <h2> <? echo "Your Favorites!"; ?> </h2>
                                  <h5> <strong> Favorite Genre: </strong> <? echo $this->userObject['favegenre']?> </h5>
                                  <h5> <strong> Favorite TV Show: </strong> <? echo $this->userObject['favetvshow']?> </h5>
                                  <h5> <strong> Favorite Movie: </strong> <? echo $this->userObject['favemovie']?> </h5>
                                  <h5> <strong> Favorite Actor: </strong> <? echo $this->userObject['faveactor']?> </h5><br>
                                  <form action="homePage.php?action=edit" method="post">
                                    <p><button class="btn btn-default" type="submit" role="button">Edit</button></p>
                                  </form>
                          </div>
                    </div>
                </div>
            </div>
        </div> <?php
    }
}

?>
