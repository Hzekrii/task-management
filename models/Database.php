<?php

class Database
{
    private $server = "mysql:host=localhost;dbname=task-management";
    private $username = "root";
    private $password = "";
    private $db;

    public function __construct()
    {

        try {
            $this->db = new PDO($this->server, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Erro {$e->getMessage()}";
        }
    }


    //* this method takes a query and an array of parameters, and executes it;
    public function query($sql, $params = null)
    {
        try {
            // prepare the query
            $query = $this->db->prepare($sql);

            // execute the query
            $query->execute($params);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error occured while executing the query: {$e->getMessage()}";
        }
    }
}
