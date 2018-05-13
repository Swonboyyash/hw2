<?php

require_once "/Applications/XAMPP/xamppfiles/htdocs/hw2/src/configs/CreateDB.php";

class mainModel
{
    protected $db;
    function __construct()
    {
       $this->db = new CreateDB();
    }
}
