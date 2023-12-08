<?php


class Task
{

    public static function all()
    {
        $sql = "SELECT 
            tasks.id, 
            tasks.name,
            tasks.achieved,
            users.lastName as writer 
        FROM tasks JOIN users 
        WHERE tasks.writer = users.id 
        ORDER BY tasks.created_at DESC;";

        return (new Database)->query($sql);
    }
    //* create a new task
    public static function create($name, $writer)
    {
        $sql = "INSERT INTO tasks (name, writer) VALUES (:name, :writer)";

        $params = [
            ":name" => $name,
            ":writer" => $writer
        ];
        return (new Database)->query($sql, $params);
    }


    //* update a task
    public static function update($id, $name)
    {
        $sql = "UPDATE tasks SET name = :name  WHERE id = :id";

        $params = [
            ":name" => $name,
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
    public static function check($id, $achieved)
    {
        $sql = "UPDATE tasks SET achieved = :achieved  WHERE id = :id";

        $params = [
            ":achieved" => $achieved,
            ":id" => $id
        ];

        return (new Database)->query($sql, $params);
    }
}
