<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;

//Update an existing task

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

$db->update("tasks", $data);

header ("Location: /test-php");exit;
