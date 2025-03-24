<?php

// Start a new session or resume the existing session
    session_start();

// Check if the session variable 'unique_id' is set, indicating that the user is logged in
if(isset($_SESSION['unique_id'])){

    // Include the database configuration file to establish a connection to the database
    include_once "config.php";

    // Escape the logout ID received from the GET request to prevent SQL injection
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);

    // Check if the logout ID is set in the GET request
    if(isset($logout_id)){

        // Set the user's status to "Offline now"
        $status = "Offline now";

        // Construct and execute an SQL query to update the user's status in the database
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");

        // Check if the status update query was successful
        if($sql){

            // Unset all session variables
            session_unset();
            // Destroy the session
            session_destroy();

            // Redirect the user to the login page
            header("location: ../login.php");
            }
        }else{
        // If the logout ID is not set, redirect the user to the users page
        header("location: ../users.php");
        }
    }else{
    // If the user is not logged in, redirect them to the login page
    header("location: ../login.php");
    }
?>