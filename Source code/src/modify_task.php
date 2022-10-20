<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/edit.css">
    <title>To do list</title>
</head>
<body>
    <?php
    require_once('../mysqli_connect.php'); // Request data for connection to database

    $task_id = $_GET['tsk_id']; // get value passed by URL

    $sql = "SELECT task_id, title, description FROM tasks"; // Gather data from db
    $result = $connection->query($sql); // Place them into query

    if ($result->num_rows > 0) { // If there is data in column
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row["task_id"] == $task_id) { // If current row id is same as passed id
                // Asign row title and description to variables
                $passed_title = $row["title"];
                $passed_description = $row["description"];
            }
        }
    } else {
        echo "Error: No results were found"; // Error if there is no passed index in database
    }
    mysqli_close($connection);
    ?>
    <h1>To do list</h1>
    <h2>Edit task</h2>
    <form action="<?php echo "../scripts/modify.php?task_id=",urlencode($task_id); ?>" method="post">

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Title:</span>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="inputGroup-sizing-default" placeholder="Your title" value="<?php echo htmlspecialchars($passed_title);?>">
        </div>
        <div class="input-group">
            <span class="input-group-text">Input description:</span>
            <textarea class="form-control" aria-label="Input description:" name="description" id="description" style="resize: none;" placeholder="Your description" rows="5"><?php echo htmlspecialchars($passed_description);?></textarea>
        </div>

        <div class="buttons" style="margin-top: 10px">
            <button type="button" class="btn btn-secondary"><a href="<?php echo "../scripts/delete.php?task_id=",urlencode($task_id)?>; ">Delete</a></button>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>