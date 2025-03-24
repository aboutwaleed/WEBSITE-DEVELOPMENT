<?php
// Start a new session or resume the existing session
    session_start();

// Include the database configuration file to establish a connection to the database
include_once "config.php";

// Escape the email and password received from the POST request to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

// Check if both email and password are not empty
if(!empty($email) && !empty($password)){

    // Construct and execute an SQL query to select the user with the provided email
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

    // Check if the query returned any rows (user with the provided email exists)
    if(mysqli_num_rows($sql) > 0){

        // Fetch the user's data as an associative array
        $row = mysqli_fetch_assoc($sql);

        // Encrypt the provided password using MD5 encryption
        $user_pass = md5($password);

        // Get the encrypted password stored in the database for the user
        $enc_pass = $row['password'];

        // Compare the provided password with the encrypted password from the database
        if($user_pass === $enc_pass){

            // If passwords match, set the user's status to "Active now" and update it in the database
            $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");

            // Check if the status update query was successful
            if($sql2){
                // If successful, set the session variable 'unique_id' to the user's unique ID
                $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success"; // Output "success" indicating successful login
                }else{
                    echo "Something went wrong. Please try again!"; // Output error message
                }
            }else{
                echo "Email or Password is Incorrect!"; // Output error message
            }
        }else{
            echo "$email - This email not Exist!"; // Output error message
        }
    }else{
        echo "All input fields are required!"; // Output error message indicating missing input fields
    }
?>