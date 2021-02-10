<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;

// Get a task

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
                <h1>Edit Task</h1>

                <form action="update.php?id=<?= $task['id'];?>" method="POST">
                    
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" value="<?= $task['title'];?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content"><?= $task['content'];?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>