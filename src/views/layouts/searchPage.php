<?php
require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/views/mainView.php";

/**
*
*/
class searchPage extends mainView
{
    private $search = '';

    function __construct()
    {
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody() {
        ?>
        <div class="wrapper">
            <h2>Search</h2>
            <form action="src/views/layouts/homePageViewInit.php" method="post">
                <div class="form-group">
                    <label>Search</label>
                    <input type="text" name="search" maxlength="70" class="form-control">
                </div>

                <div class="form-group" style="display:block">
                    <label>Filter</label>
                    <select name="filter">
                        <option value="Movie">Movie</option>
                        <option value="TV Show">TV Show</option>
                        <option value="Actor">Actor</option>
                    </select>
                </div>
            </div>
            <?php
        }
    }
    ?>
