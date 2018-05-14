<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";
/**
*
*/
class editView extends mainView
{
    private $userObject;

    function __construct() {
        $this->userObject = $_SESSION['userprofile'];
        print_r($this->userObject);
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
  }

    function renderBody()
    {
        ?>
        <div class="wrapper">
            <h2>Edit Your Profile</h2>
            <form action="homePage.php?action=submitchanges" method="post">

                <div class="form-group">
                    <label>Favorite Genre</label>
                    <input type="text" name="favegenre" maxlength="45" class="form-control" value="<?php echo $this->userObject['favegenre']; ?>">
                </div>

                <div class="form-group">
                    <label>Favorite TV Show</label>
                    <input type="text" name="favetvshow" maxlength="45" class="form-control" value="<?php echo $this->userObject['favetvshow']; ?>">
                </div>

                <div class="form-group">
                    <label>Favorite Movie</label>
                    <input type="text" name="favemovie" maxlength="45" class="form-control" value="<?php echo $this->userObject['favemovie'];?>">
                </div>

                <div class="form-group">
                    <label>Favorite Actor</label>
                    <input type="text" name="faveactor" maxlength="45" class="form-control" value="<?php echo $this->userObject['faveactor']?>">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="signupsubmit" value="Submit" >
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <input type="hidden" name="userid" value="<?php echo $this->userObject['userId'];?>">
            </form>
        </div>
        <?php
    }
}
?>
