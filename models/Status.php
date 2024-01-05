<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../models/Database.php");
class Status
{

    public static function all()
    {
        $sql = "SELECT 
            status.id, 
            status.name
        FROM status";

        return (new Database)->query($sql);
    }
}
