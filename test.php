<?php
$pdo = new PDO("mysql:host=localhost; dbname=testphp; charset=utf8", "root", "");
$statement = $pdo->prepare("SELECT * FROM tasks");
$result = $statement->execute();
var_dump($statement->fetchAll());die;