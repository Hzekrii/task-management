<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../models/Database.php");
class Workspace
{

    public static function all($user)
    {
        $sql = "SELECT 
            workspaces.id, 
            workspaces.name,
            workspaces.description,
            workspaceUsers.permission_id
        FROM workspaces join workspaceUsers
        WHERE workspaceUsers.user_id=:user
        ORDER BY workspaces.created_at DESC;";
        $params = [
            ":user" => $user
        ];
        return (new Database)->query($sql, $params);
    }

    //* create a new workspace
    public static function create($name, $description = NULL)
    {
        $sql = "INSERT INTO workspaces (name, description) VALUES (:name, :description)";

        $params = [
            ":name" => $name,
            ":description" => $description
        ];

        return (new Database)->query($sql, $params);
    }


    //* update a workspace
    public static function updateName($id, $name)
    {
        $sql = "UPDATE workspaces SET name = :name  WHERE id = :id";

        $params = [
            ":name" => $name,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    public static function updateDescription($id, $description)
    {
        $sql = "UPDATE workspaces SET description = :description  WHERE id = :id";

        $params = [
            ":description" => $description,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }

    //* delete a workspace 
    public static function delete($id)
    {
        $sql = "DELETE FROM workspaces WHERE id=:id";

        $params = [":id" => $id];

        return (new Database)->query($sql, $params);
    }
}
