<?php
    require_once('../mysqli_connect.php'); // Request data for connection to database

    // Check connection
    if($connection === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    // Assign variables to data from forms
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $date = date("Y/m/d");
    $state = 0;

    // Inserting data into tasks table
    $sql = "INSERT INTO tasks (date, title, description, state)
            VALUES ('$date', '$title','$description','$state')";

    if(mysqli_query($connection, $sql)){
        echo "<script type='application/javascript'>alert('Task successfully created')</script>"; // Alert that task was created
    } else{
        echo "ERROR!";
    }

    // Close connection to db
    mysqli_close($connection);
    header("Location: ../src/index.php"); // Redirect to index page
?>
