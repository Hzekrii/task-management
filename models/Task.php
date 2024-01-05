<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../models/Database.php");
class Task
{

    public static function all($project)
    {
        $sql = "SELECT 
            tasks.id, 
            tasks.name,
            status.name As status,
            tasks.description,
            tasks.start_date,
            tasks.due_date,
            tasks.finish_date,
            tasks.project_id
        FROM tasks join status
        WHERE tasks.project_id = :project and tasks.status = status.id
        ORDER BY tasks.created_at DESC;";
        $params = [
            ":project" => $project
        ];

        return (new Database)->query($sql, $params);
    }

    //* create a new task
    public static function create($name, $status, $description = NULL, $start_date, $due_date, $project_id)
    {
        $sql = "INSERT INTO tasks (name, status,description,start_date,due_date,project_id) VALUES (:name, :status, :description, :start_date, :due_date, :project)";

        $params = [
            ":name" => $name,
            ":status" => $status,
            ":description" => $description,
            ":start_date" => $start_date,
            ":due_date" => $due_date,
            ":project_id" => $project_id,
        ];

        return (new Database)->query($sql, $params);
    }


    //* update a task
    public static function updateName($id, $name)
    {
        $sql = "UPDATE tasks SET name = :name  WHERE id = :id";

        $params = [
            ":name" => $name,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    public static function updateDescription($id, $description)
    {
        $sql = "UPDATE tasks SET description = :description  WHERE id = :id";

        $params = [
            ":description" => $description,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    public static function updateDates($id, $start_date, $due_date)
    {
        $sql = "UPDATE tasks SET start_date = :start_date ,due_date = :due_date WHERE id = :id";

        $params = [
            ":start_date" => $start_date,
            ":due_date" => $due_date,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    public static function finishTask($id, $finish_date)
    {
        $sql = "UPDATE tasks SET finish_date = :finish_date WHERE id = :id";

        $params = [
            ":finish_date" => $finish_date,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
    //* delete a task 
    public static function delete($id)
    {
        $sql = "DELETE FROM tasks WHERE id=:id";

        $params = [":id" => $id];

        return (new Database)->query($sql, $params);
    }

    //* set a task achieved 
    public static function changeStatus($id, $status)
    {
        $sql = "UPDATE tasks SET status = :status  WHERE id = :id";

        $params = [
            ":status" => $status,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
}
