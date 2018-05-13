<?php

class example {
    public function __construct()
    {
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    public function renderBody()
    {
        ?>
            <h1> It works </h1>
        <?php
    }

    function renderHeader() {
        ?>
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
                    </ul>
                    <form class="navbar-form navbar-right" action=logout.php>
                        <button type="submit" value="logout" name="action" class="btn btn-default"> Logout </button>
                    </form>
                    <form class="navbar-form navbar-right" action=profile.php>
                          <button type="submit" value="profile" name="action" class="btn btn-default"> Edit Profile </button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
    }
}

 ?>
