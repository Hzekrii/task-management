<?php
session_start();
// the title of the <th> tags
$user = $_SESSION["user"]; // getting all the clients, they will be shown in the select in the from;

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
</head>

<body>
    <!-- Form to add elements to the table -->
    <p>Hello mr <?= $_SESSION["user"]["last_name"] ?></p>
    <form action="../controllers/TaskController.php" method="POST">
        <input type="text" name="name" id="" placeholder="Task Content">
        <input type="hidden" name="writer" value="<?= $user['id'] ?>">
        <button type="submit">Save</button>
    </form>

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