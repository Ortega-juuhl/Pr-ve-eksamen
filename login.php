<?php
// Start the session to manage user sessions
session_start();

// Include the file containing the database connection code
include 'db_connect.php';

// Check if the form data is sent using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a SQL query to retrieve user details based on the provided username
    $sql = "SELECT userID, username, password, is_admin FROM user WHERE username = '$username'";
    
    // Execute the SQL query
    $result = $conn->query($sql);

    // Check if a user with the provided username exists
    if ($result->num_rows == 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify if the provided password matches the hashed password in the database
        if (password_verify($password, $row['password'])) {
            // Set session variables upon successful login
            $_SESSION['userID'] = $row['userID']; // Store the user ID in the session  
            
            // Check if the user is an admin
            if ($row['is_admin']) {
                $_SESSION['is_admin'] = $row['is_admin'];
                // Redirect the admin to the admin page
                header('Location: adminTicket.php');
            } else {
                // Redirect regular users to the regular user page
                header('Location: ticketSystem.html');
            }
            exit(); // Terminate the script after redirection
        } else {
            // Password verification failed
            echo "Invalid username or password";
        }
    } else {
        // No user found with the provided username
        echo "Invalid username or password";
    }
}
?>
