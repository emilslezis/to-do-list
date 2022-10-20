<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">
    <title>To do list</title>
</head>
<body>
    <script>
        function redirect(task_id){
            window.location.replace("../scripts/change_state.php?tsk_id="+ task_id);
        }
    </script>
    <h1>To do list</h1>
    <?php
    require_once('../mysqli_connect.php'); // Request data for connection to database

    $sql = "SELECT task_id, date, title, description, state FROM tasks"; // Collect needed data from db
    $result = $connection->query($sql); //Query of an gathered data

    function getBoolState($state){ // Functions turns binary value (0 or 1) and turns into boolean for checkbox
        if($state==1){
            return "checked";
        }else{
            return "false";
        }
    }

    // Check connection (Drops an error if coudn't connect to db)
    if($connection === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    if ($result->num_rows > 0) {
        // Go trough data row by row
        while($row = $result->fetch_assoc()) {
            echo '<div class="card">
                        <div class="card-body">
                            <div class="title">
                                <h5 class="card-title"><button style="margin-right: 5px" onclick="redirect(', urlencode($row["task_id"]) ,')"><input type="checkbox" name="test" ', getBoolState($row["state"]) ,'></button>', $row["title"] ,'</h5>
                            </div>
                            <p class="card-text">', $row["description"] ,'</p>
                            <div class="footer">
                                <p>', $row["date"] ,'</p>
                                <a class="btn btn-primary" href=modify_task.php?tsk_id=',urlencode($row["task_id"]),'>Edit</a>
                            </div>
                        </div>
                    </div>';
        }
    } else {
        echo "There are no active tasks. Press Add to add one in few clicks."; // Goes out if there is no tasks
    }
    $connection->close();
    ?>
    <div class="card add_btn">
        <a class="btn btn-primary" href="add_task.php">Add new</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>