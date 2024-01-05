<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../models/Database.php");
class ProjectUser
{

    public static function all($project)
    {
        $sql = "SELECT 
            projectUsers.id,
            users.firstName,
            users.LastName,
            users.email,
            projectUsers.permission_id
        FROM projectUsers join users
        WHERE projectUsers.project_id=:project
        ORDER BY projectUsers.created_at DESC;";
        $params = [
            ":project" => $project
        ];

        return (new Database)->query($sql, $params);
    }

    public static function taskUsers($task)
    {
        $sql = "SELECT 
            projectUsers.id,
            users.firstName,
            users.LastName,
            users.email,
            projectUsers.permission_id
        FROM projectUsers join users
        WHERE projectUsers.task_id=:task
        ORDER BY projectUsers.created_at DESC;";
        $params = [
            ":task" => $task
        ];

        return (new Database)->query($sql, $params);
    }
    //* create a new projectUser
    public static function create($user_id, $project_id, $permission_id)
    {
        $sql = "INSERT INTO projectUsers (user_id, project_id, permission_id) VALUES (:user_id, :project_id, :permission_id)";

        $params = [
            ":user_id" => $user_id,
            ":project_id" => $project_id,
            ":permission_id" => $permission_id
        ];

        return (new Database)->query($sql, $params);
    }



    //* delete a projectUser 
    public static function delete($id)
    {
        $sql = "DELETE FROM projectUsers WHERE id=:id";

        $params = [":id" => $id];

        return (new Database)->query($sql, $params);
    }
}
