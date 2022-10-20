<?php
require_once('../mysqli_connect.php'); // Request data for connection to database

$title = $_REQUEST['title'];              // Get title from form
$description = $_REQUEST['description'];  // Get description from form

$task_id = $_GET['task_id'];              // Get URL passed value and assign it to variable

$sql = "UPDATE tasks SET title='$title', description='$description' WHERE task_id=$task_id"; // Update title and description

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error; // Error acquired
}

$connection->close();
header("Location: ../src/index.php");