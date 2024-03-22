<?php
session_start();

// Check if the user ID is set in the session
if (isset($_SESSION['userID'])) {
    // Get the user ID from the session
    $userID = $_SESSION['userID'];

    // Create the SQL query to insert the user ID
    $insert_query = "INSERT INTO ticketsystem (userID, ) VALUES ('$userID')";

    // Execute the SQL query
    if (mysqli_query($connection, $insert_query)) {
        echo "User ID has been added to the database.";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "User ID is not set in the session.";
}

// Close the database connection
mysqli_close($connection);
?>