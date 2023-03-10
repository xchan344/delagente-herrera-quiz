<?php 
    require('config/db.php');
    require("style/style-add.css");

    if(isset($_POST['submit'])){
        $task_name = mysqli_real_escape_string($db, $_POST['task_name']);
        $task_description = mysqli_real_escape_string($db, $_POST['task_description']);
        $task_due_date = mysqli_real_escape_string($db, $_POST['task_due_date']);
        $task_status = mysqli_real_escape_string($db, $_POST['task_status']);

        $query = "INSERT INTO tasks (task_name, task_description, task_due_date, task_status) 
                    VALUES ('$task_name', '$task_description', '$task_due_date', '$task_status')";

        if (mysqli_query($db, $query)){
            header('Location: index.php');
            exit;
        }else{
            echo 'ERROR:'. mysqli_error($db);
        }
    }
?>


<div class=body>
<div class="card-body">
<h4 class="card-title">Add Tasks</h4>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="row">
        <div class="form-group">
            <label>Task Name</label>
            <input name="task_name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Task Description</label>
            <input name="task_description" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Task Due Date</label>
            <input class="task-date"name="task_due_date" type="date" class="form-control">
        </div>
        <div class="form-group">
            <label>Task Status</label>
            <select class="form-control" name="task_status">
                <option>Select...</option>
                <option>Incomplete</option>
                <option>In progress</option>
                <option>Complete</option>
            </select>
        </div>
        <div class="row">
            <button type="submit" name="submit" value="submit" class="btn">Save</button>
            <div class="clearfix"></div>
        </div>
    </form>
</div>
</div>