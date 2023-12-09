<?php

require_once("../models/Database.php");

class User
{
    //
    public static function all()
    {
        $sql = "SELECT 
            users.id, 
            users.firstName,
            users.LastName,
            tasks.achieved,
            users.lastName as writer 
        FROM tasks JOIN users 
        WHERE tasks.writer = users.id 
        ORDER BY tasks.created_at DESC;";

        return (new Database)->query($sql);
    }
    //* create a new user
    public static function create_user($first_name, $last_name, $email, $password)
    {
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (:firstName, :lastName, :email, :password)";

        $params = [
            ":firstName" => $first_name,
            ":lastName" => $last_name,
            ":email" => $email,
            ":password" => $password
        ];

        return (new Database)->query($sql, $params);
    }

    // get a user using email
    public static function get_user($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $params = [
            ":email" => $email
        ];

        return (new Database)->query($sql, $params);
    }

    // update the user
    public static function update($id, $first_name, $last_name)
    {
        $sql = "UPDATE users SET first_name = :firstName, last_name = :lastName WHERE id = :id";

        $params = [
            ":firstName" => $first_name,
            ":lastName" => $last_name,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }

    // update the user's password
    public static function update_password($id, $password)
    {
        $sql = "UPDATE users SET password = :password WHERE id = :id";

        $params = [
            ":password" => $password,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
}
