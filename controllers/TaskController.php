<?php



require_once("../models/Task.php");
require_once("../models/Status.php");
require_once("../models/Validator.php");
session_start();

// this function redirects back to products page
function goback()
{
    //* redirect to categories page;
    header("Location: ../views/tasks.php");
    die();
}

// this function checks if the inputs are valid if not then send back an error message






// Other POST handling code...

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["task_id"])) // create an order:
    {
        $name = $_POST["name"];
        $status = $_POST["status"];
        $description = $_POST["description"];
        $start_date = $_POST["start_date"];
        $due_date = $_POST["due_date"];
        $project_id = $_POST["project_id"];

        Task::create($name, $status, $description, $start_date, $due_date, $project_id);
        //create_alert_session_variable("created_successfully_alert", "Record Created successfully!"); // create an alert
    } else if (!isset($_POST["name"]) && !isset($_POST["achieved"]) && $_POST["task_id"] != "") // delete an order:
    {
        $result = Task::delete($_POST["task_id"]);
        //  create_alert_session_variable("deleting_successfully_alert", "Record deleted successfully!");
        /*} else if (isset($_POST["achieved"]) && isset($_POST["task_id"])) {
        $id = $_POST["task_id"];
        $achieved = $_POST["achieved"]; // If checkbox not checked, default value
        Task::check($id, $achieved);
    */
    } else if (isset($_POST["name"]) && $_POST["task_id"] != "") // updating an order
    {
        $id = $_POST["task_id"];
        $name = $_POST["name"];

        Task::updateName($id, $name);
        //create_alert_session_variable("updated_successfully_alert", "Record Updated successfully!");
    }
}

$_SESSION["status"] = Status::all();
//* redirect to clients page;
goback();
