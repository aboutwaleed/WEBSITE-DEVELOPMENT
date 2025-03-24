<?php

// Start a while loop to fetch each row as an associative array from the result set of the previous query stored in $query
    while($row = mysqli_fetch_assoc($query)){
        // Construct a SQL query to select the most recent message between the current user and another user
        // It looks for messages where either the incoming or outgoing message ID matches the current user's unique ID ($row['unique_id'])
        // and also matches the outgoing or incoming ID of the other user ($outgoing_id)
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        // Execute the SQL query and store the result in $query2
        $query2 = mysqli_query($conn, $sql2);

        // Fetch the result row as an associative array from $query2
        $row2 = mysqli_fetch_assoc($query2);

        // Use a ternary operator to check if any rows were returned by $query2
        // If there are rows, assign the message content to $result, otherwise set $result to "No message available"
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";

        // Check the length of the message stored in $result
        // If it's longer than 28 characters, truncate it to 28 characters and append '...', otherwise use the full message
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        // Check if 'outgoing_msg_id' exists in $row2
        if(isset($row2['outgoing_msg_id'])){

            // Use a ternary operator to determine if the current user is the sender of the message
            // If the current user is the sender, prepend "You: " to the message, otherwise leave it blank
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            // If 'outgoing_msg_id' is not set, set $you to an empty string
            $you = "";
        }

        // Use a ternary operator to determine if the user is currently offline
        // If the user's status is "Offline now", set $offline to "offline", otherwise set it to an empty string
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        // Use a ternary operator to determine if the current user's unique ID matches the row's unique ID
        // If they match, set $hid_me to "hide", otherwise set it to an empty string
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        // Append an HTML structure to $output
        // This structure includes a link to the chat page with the user's ID, profile image, name, truncated message, and status
        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
]                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>