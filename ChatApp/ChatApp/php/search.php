<?php
// Start a new session or resume the existing session
    session_start();
// Include the database configuration file to establish a connection to the database
include_once "config.php";

// Retrieve the unique ID of the current user from the session
    $outgoing_id = $_SESSION['unique_id'];

// Escape the search term received from the POST request to prevent SQL injection
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

// Construct an SQL query to search for users based on the search term
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";

// Initialize an empty string to store the output
$output = "";

// Execute the SQL query
    $query = mysqli_query($conn, $sql);

// Check if the query returned any rows (users)
if(mysqli_num_rows($query) > 0){
    // If users are found, include the data.php file to display user information
    include_once "data.php";
    }else{
    // If no users are found, append a message to the output indicating so
    $output .= 'No user found related to your search term';
    }
// Output the result
    echo $output;
?>