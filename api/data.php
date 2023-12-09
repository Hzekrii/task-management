<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../models/Task.php");

session_start();


header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Output tasks as JSON
    echo json_encode(Task::all($_SESSION['user']['id']));
}
