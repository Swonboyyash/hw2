<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";
/**
*
*/
class searchView extends mainView
{
    private $userObject;
    function __construct($resultSet, $view) {
        $this->userObject = $_SESSION['userprofile'];
        $this->renderHeader();
        $this->renderNavigationBar();
        if ($view == "movies") {
            $this->renderBodyMovies($resultSet);
        } else if ($view == "tvshows") {
            $this->renderBodyTvShows($resultSet);
        } else if ($view == "actors") {
            $this->renderBodyActors($resultSet);
        }
        $this->renderFooter();
    }

    function renderBodyMovies($movies) {
        ?>
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="jumbotron container-fluid">
                    <h1>Hello <? print_r($this->userObject['firstName']. ", ". $this->userObject['lastName']) ?></h1>
                    <p> Here is the list for all the movies.
                        You can click on View Details to get further information for a Movie. </p>
                </div>
                <?php $this->renderSearchBody("movies"); ?>
                <div class="row">
                    <?php foreach($movies as $a_movie) { ?>
                        <div class="col-xs-6 col-lg-4">
                            <form action="homePage.php" method="post">
                                <h2> <? echo $a_movie->getTitle(); ?> </h2>
                                <h5> <strong> Released: </strong> <? echo $a_movie->getYear()?> </h5>
                                <h5> <strong> Directed By: </strong> <? echo $a_movie->getDirectorFullName()?> </h5>
                                <p><button class="btn btn-default" type="submit">View details</button></p>
                                <input type="hidden" name="movieId" value=<?=$a_movie->jsonSerialize(); ?>></input>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div> <?php
    }

    function renderBodyTvShows($tvShows) {
        ?>
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="jumbotron container-fluid">
                    <h1>Hello <? print_r($this->userObject['firstName']. ", ". $this->userObject['lastName']) ?></h1>
                    <p> Here is the list for all the TV Shows.
                        You can click on View Details to get further information for a TV Show. </p>
                    </div>
                    <?php $this->renderSearchBody("tvshows"); ?>
                    <div class="row">
                        <?php foreach($tvShows as $tvShow) { ?>
                            <div class="col-xs-6 col-lg-4">
                                <form action="homePage.php" method="post">
                                    <h2> <? echo $tvShow->getTitle(); ?> </h2>
                                    <h5> <strong> Released: </strong> <? echo $tvShow->getYear()?> </h5>
                                    <h5> <strong> Directed By: </strong> <? echo $tvShow->getDirectorFullName()?> </h5>
                                    <p><button class="btn btn-default" type="submit" role="button">View details</button></p>
                                    <input type="hidden" name="movieId" value=<?= $tvShow->jsonSerialize(); ?>></input>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> <?php
    }

    function renderBodyActors($actors) {
        ?>
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="jumbotron container-fluid">
                    <h1>Hello <? print_r($this->userObject['firstName']. ", ". $this->userObject['lastName']) ?></h1>
                    <p> Here is the list for all the Actors. </p>
                </div>
                <?php $this->renderSearchBody("actors"); ?>
                <div class="row">
                    <?php foreach($actors as $actor) { ?>
                        <div class="col-xs-6 col-lg-4">
                            <h2> <? echo $actor->getActorFullName(); ?> </h2>
                            <h5> <strong> Location: </strong> <? echo $actor->getLocation()?> </h5>
                            <h5> <strong> Date Of Birth: </strong> <? echo $actor->getDateOfBirth()?> </h5>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    }
}

?>
