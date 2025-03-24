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

    // Initialize an empty string to store the output
    $output = "";

    // Construct a SQL query to select all messages between the current user and another user
    // Join the users table to get user information for the messages
    // Order the messages by their ID to display them in the correct order
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) 
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

    // Execute the SQL query and store the result in $query
    $query = mysqli_query($conn, $sql);

    // Check if the query returned any rows (messages)
    if(mysqli_num_rows($query) > 0){
        // Loop through each row in the result set
        while($row = mysqli_fetch_assoc($query)){
                // Check if the message is sent by the current user (outgoing message)
                if($row['outgoing_msg_id'] === $outgoing_id){

                    // Append the outgoing message HTML structure to $output
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{

                    // Append the incoming message HTML structure to $output
                    // Include the sender's profile image and message details
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
        // If no messages are found, append a message indicating that there are no messages available
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
    // Output the constructed HTML
    echo $output;
    }else{
    // If the user is not logged in, redirect them to the login page
    header("location: ../login.php");
    }

?>