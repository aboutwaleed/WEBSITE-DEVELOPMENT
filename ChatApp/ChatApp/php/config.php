<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chatapp";

// Establish a connection to the MySQL server using the defined parameters.
// mysqli_connect() takes four parameters: hostname, username, password, and database name
  $conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check if the connection was successful. If $conn is false, it means the connection failed.
if(!$conn){
  // Output an error message if the connection failed.
  // mysqli_connect_error() returns a string description of the last connection error.
    echo "Database connection error".mysqli_connect_error();
  }
?>
