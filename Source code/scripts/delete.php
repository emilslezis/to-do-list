<?php
require_once('../mysqli_connect.php');// Request data for connection to database

$task_id = $_GET['task_id']; // Asign passed id value to variable

$sql = "DELETE FROM tasks WHERE task_id=$task_id"; // Delete data with passed id

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error; // Echo's out error
}

$connection->close(); // Disconnect from database
header("Location: ../src/index.php"); // Redirect to main page
