<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../models/Database.php");
class Project
{

    public static function all($workspace)
    {
        $sql = "SELECT 
            projects.id, 
            projects.name,
            projects.status,
            projects.description,
            projects.start_date,
            projects.due_date,
            projects.finish_date,
            projects.workspace_id
        FROM projects 
        WHERE projects.workspace_id = :workspace
        ORDER BY projects.created_at DESC;";
        $params = [
            ":workspace" => $workspace
        ];

        return (new Database)->query($sql, $params);
    }
    //* create a new project
    public static function create($name, $status, $description = NULL, $start_date, $due_date, $workspace_id)
    {
        $sql = "INSERT INTO projects (name, status,description,start_date,due_date,workspace_id) VALUES (:name, :status, :description, :start_date, :due_date, :project)";

        $params = [
            ":name" => $name,
            ":status" => $status,
            ":description" => $description,
            ":start_date" => $start_date,
            ":due_date" => $due_date,
            ":workspace_id" => $workspace_id,
        ];

        return (new Database)->query($sql, $params);
    }


    //* update a project
    public static function updateName($id, $name)
    {
        $sql = "UPDATE projects SET name = :name  WHERE id = :id";

        $params = [
            ":name" => $name,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    public static function updateDescription($id, $description)
    {
        $sql = "UPDATE projects SET description = :description  WHERE id = :id";

        $params = [
            ":description" => $description,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    public static function updateDates($id, $start_date, $due_date)
    {
        $sql = "UPDATE projects SET start_date = :start_date ,due_date = :due_date WHERE id = :id";

        $params = [
            ":start_date" => $start_date,
            ":due_date" => $due_date,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    public static function finishProject($id, $finish_date)
    {
        $sql = "UPDATE projects SET finish_date = :finish_date WHERE id = :id";

        $params = [
            ":finish_date" => $finish_date,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    //* delete a project 
    public static function delete($id)
    {
        $sql = "DELETE FROM projects WHERE id=:id";

        $params = [":id" => $id];

        return (new Database)->query($sql, $params);
    }

    //* set a project achieved 
    public static function changeStatus($id, $status)
    {
        $sql = "UPDATE projects SET status = :status  WHERE id = :id";

        $params = [
            ":status" => $status,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
}
