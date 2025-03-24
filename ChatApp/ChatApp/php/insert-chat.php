<?php
// Start a new session or resume the existing session
    session_start();
// Check if the session variable 'unique_id' is set, indicating that the user is logged in
if(isset($_SESSION['unique_id'])){
    // Include the database configuration file to establish a connection to the database
    include_once "config.php";

    // Assign the session's unique_id to $outgoing_id (the current user's unique ID)
    $outgoing_id = $_SESSION['unique_id'];

    // Escape the incoming ID received from the POST request to prevent SQL injection
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    // Escape the message received from the POST request to prevent SQL injection
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Check if the message is not empty
    if(!empty($message)){

        // Construct and execute an SQL query to insert the message into the messages table
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
    // If the user is not logged in, redirect them to the login page
    header("location: ../login.php");
    }


    
?>