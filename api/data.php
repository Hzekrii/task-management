<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../models/Task.php");

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

// ... rest of your code

header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Output tasks as JSON
    echo json_encode(Task::all(1));
}
