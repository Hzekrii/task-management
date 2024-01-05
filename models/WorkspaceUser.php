<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../models/Database.php");
class WorkspaceUser
{

    public static function all($workspace)
    {
        $sql = "SELECT 
            workspaceUsers.id,
            users.firstName,
            users.LastName,
            users.email,
            workspaceUsers.permission_id
        FROM workspaceUsers join users
        WHERE workspaceUsers.workspace_id=:workspace
        ORDER BY workspaceUsers.created_at DESC;";
        $params = [
            ":workspace" => $workspace
        ];

        return (new Database)->query($sql, $params);
    }
    //* create a new workspaceUser
    public static function create($user_id, $workspace_id, $permission_id)
    {
        $sql = "INSERT INTO workspaceUsers (user_id, workspace_id, permission_id) VALUES (:user_id, :workspace_id, :permission_id)";

        $params = [
            ":user_id" => $user_id,
            ":workspace_id" => $workspace_id,
            ":permission_id" => $permission_id
        ];

        return (new Database)->query($sql, $params);
    }



    //* delete a workspaceUser 
    public static function delete($id)
    {
        $sql = "DELETE FROM workspaceUsers WHERE id=:id";

        $params = [":id" => $id];

        return (new Database)->query($sql, $params);
    }
}
