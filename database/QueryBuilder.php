<?php

class QueryBuilder
{

    public $pdo;

    function __construct()
    {
        // 1. Connect
        $this->pdo = new PDO("mysql:host=localhost; dbname=testphp; charset=utf8", "root", "");
    }

    // List of all tasks
    function all($table)
    {
    
        // 2. Prepare the statement
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    // Save new tasks
    function store($table, $data)
    {
        //1. Get keys from array $data
        $keys = array_keys($data);
        //2. Make string from keys of $data
        $stringOfKeys = implode(", ", $keys);
        //3. Make string from keys of $data with :
        $placeholder = ":" . implode(", :", $keys);

        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholder)";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    //Get a task
    function getOne($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //Update an existing task
    function update($table, $data)
    {
        $fields = '';
        foreach($data as $key => $value)
        {
            $fields .= $key . "=:" .$key . ", ";
        }

        $fields = rtrim($fields, ", ");
        
        $sql = "UPDATE $table SET $fields WHERE id=:id";
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    // Delete an existing tasks
    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}   
