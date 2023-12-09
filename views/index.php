<?php

session_start();

///* will hold error messages for the signup process;
$signup_errors = isset($_SESSION['signup_errors']);
$firstName_error = $_SESSION["signup_errors"]['firstName_error'] ?? "";
$lastName_error = $_SESSION["signup_errors"]['lastName_error'] ?? "";
$signup_email_error = $_SESSION["signup_errors"]['email_error'] ?? "";
$signup_password_error = $_SESSION["signup_errors"]['signup_password_error'] ?? "";

//* will hold the old values of the signup inputs;
$old_firstName = $_SESSION['old']['firstName'] ?? "";
$old_lastName = $_SESSION['old']['lastName'] ?? "";
$old_signup_email = $_SESSION['old']['email'] ?? "";

unset($_SESSION['signup_errors']); // unset signup error session variables;

//* will hold the old email of the login form
$old_login_email = isset($_SESSION['login_errors']) ? $_SESSION['old'] : "";
$show_alert = isset($_SESSION['login_errors']); // show alert when there is a login error;

unset($_SESSION['login_errors']); // unset signup error session variables;
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
    <div>
        <button id="loginbtn">log In</button>
        <button id="signupbtn">sign Up</button>

    </div>
    <div id="loginform" class="loginform" style="display:none">
        <form action="../controllers/UserController.php" method="POST">
            <input type="email" placeholder="email" name="email">
            <small><?= $old_login_email ?></small>
            <input type="password" placeholder="password" name="password">
            <button type="submit">Save</button>
        </form>
    </div>
    <div id="signupform" class="signupform" style="display:block">
        <form action="../controllers/UserController.php" method="POST">
            <input type="text" placeholder="first Name" name="first_name">
            <small><?= $old_firstName ?></small>
            <input type="text" placeholder="last Name" name="last_name">
            <small><?= $old_lastName ?></small>
            <input type="email" placeholder="email" name="email">
            <small><?= $old_signup_email ?></small>
            <input type="password" placeholder="password" name="password">
            <button type="submit">Save</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../ressources/js/script.js"></script>
</body>

</html>