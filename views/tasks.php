<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once('../models/Status.php');

// the title of the <th> tags
$status = Status::all(); // getting all the clients, they will be shown in the select in the from;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <title>TO DO lIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body>

    <!-- Form to add elements to the table -->
    <a class="btn btn-dark p-absolute m-0" href="./logout.php">LogOut</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center d-flex flex-column justify-content-center">
                <div class="mt-4 mb-3">
                    <h1>Task Manager</h1>
                </div>
                <div class="m-5">
                    <form action="../controllers/TaskController.php" method="POST" class="d-flex justify-content-center">
                        <div class="me-2 mb-3">
                            <input class="form-control" type="text" name="name" placeholder="Task Content">
                            <select name="status" id="" required>
                                <option value="" selected>--Select An Item --</option>
                                <?php foreach ($status as $s) { ?>
                                    <option value="<?= $s["id"] ?>"><?= $s["name"] ?></option>
                                <?php } ?>
                            </select>
                            <input class="form-control" type="text" name="description" placeholder="Description">
                            <input class="form-control" type="text" name="name" placeholder="Task Content">
                            <input class="form-control" type="text" name="name" placeholder="Task Content">

                            <input class="form-control" type="hidden" name="project_id" value="1">
                        </div>
                        <div class="ms-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <ul id="taskList"></ul>


    <!-- requiring the js script tags -->
    <!--<script src="../ressources/js/api.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../ressources/js/api.js"></script>
    <script>
        window.onload = function() {
            fetchDataAndRender(); // Call the function from api.js
        };
    </script>

</body>

</html>