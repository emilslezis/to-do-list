<?php

require_once('../mysqli_connect.php'); // Request data for connection to database

$sql = "SELECT task_id, state FROM tasks"; // Get needed database data from tasks table
$result = $connection->query($sql);        // Query of db data

$task_id = $_GET['tsk_id']; // Passed by URL value gets assigned to variable

if ($result->num_rows > 0) { // If there is data in db
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["task_id"] == $task_id) { // Check weather row id is same as passed id
            $passed_state = $row["state"];
        }
    }
} else {
    echo "Error: No results were found"; // If there is no id with passed value in db
}
// Change state to other state
if($passed_state=='0'){
    $passed_state='1';
}else{
    $passed_state='0';
}
$sql = "UPDATE tasks SET state='$passed_state' WHERE task_id='$task_id'"; // Update state of task with passed id

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error; // Prints out error if it occurs
}

mysqli_close($connection); // Close database connection

header("Location: ../src/index.php"); // Redirect to index page