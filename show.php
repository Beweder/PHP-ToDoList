<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;

//Get a task

$id = $_GET['id'];
$task = $db->getOne("tasks", $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $task['title'];?></h1>
                
                <p><?= $task['content'];?></p>
                
                <a href="index.php">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>