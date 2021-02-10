<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;

// Save new tasks
$data = [
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

$db->store("tasks", $data);

header("location: /test-php");exit;

