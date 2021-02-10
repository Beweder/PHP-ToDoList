<?php 

require 'database/QueryBuilder.php';

$db = new QueryBuilder;

// List of all tasks

$tasks = $db->all("tasks");

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
                <h1>All Tasks</h1>
                <a class="btn btn-success" href="create.php">Add Task</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= $task['id'];?></td>
                            <td><?= $task['title'];?></td>
                            <td>
                                <a class="btn btn-info" href="show.php?id=<?= $task['id'];?>">Show</a>
                                <a class="btn btn-warning" href="edit.php?id=<?= $task['id'];?>">Edit</a>
                                <a class="btn btn-danger" href="delete.php?id=<?= $task['id'];?>">Delete</a>
                            </td>
                        </tr> 
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>


