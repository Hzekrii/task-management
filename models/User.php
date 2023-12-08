<?php

include("./Database.php");

class User
{
    //* create a new user
    public static function create_user($first_name, $last_name, $email, $password)
    {
        $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)";

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
        $sql = "UPDATE users SET firstName = :firstName, lastName = :lastName WHERE id = :id";

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
