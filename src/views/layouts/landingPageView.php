<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";
/**
*
*/
class landingPageView extends mainView
{

  function __construct()
  {
    $this->renderHeader();
    $this->renderBody();
    $this->renderFooter();
  }

  function renderBody() {

    ?>
    <div>
      <form style="text-align:center;"action="index.php">
        <h1 class="display-4">Welcome, Get started by Logging In or Signing Up</h1>
        <button type="submit" value="login" name="action" class="btn btn-primary"> Log In </button>
        <button type="submit" value="signup" name="action" class="btn btn-primary"> Sign Up </button>
      </form>
    </div>
    <?php
    }
  }
  ?>
