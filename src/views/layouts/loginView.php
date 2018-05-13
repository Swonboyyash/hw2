<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";
  /**
   *
   */
  class loginView extends mainView
  {
    private $username = '';
    private $password = '';
    function __construct()
    {
      $this->renderHeader();
      $this->renderBody();
      $this->renderFooter();
    }

    function renderBody()
    {
      ?>
        <div class="wrapper">
          <h2>Login</h2>
          <p>Please fill in your credentials to login.</p>
          <form action="index.php?action=authenticate" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" maxlength="45" class="form-control">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" maxlength="45" class="form-control">
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="loginsubmit" maxlength="45" value="Login">
            </div>
            <p>Don't have an account? <a href="?action=signUp">Sign up now</a>.</p>
          </form>
        </div>
      <?php
    }
  }

?>
