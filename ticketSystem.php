<?php
session_start();

include 'db_connect.php'; // Include the file containing your database connection code

// Check if the user is logged in
if (isset($_SESSION['userID'])) {
    // Get the user ID from the session
    $userID = $_SESSION['userID'];

    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input data
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Create the SQL query to insert the data
        $insert_query = "INSERT INTO ticketsystem (userID, description, title, CategoryID) VALUES ('$userID', '$description', '$title', '1')";

        // Execute the SQL query
        if (mysqli_query($conn, $insert_query)) {
            echo "Your ticket has been sent in. <a href=\"myTicket.php\">Ticket status</a>";
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
    } else {
        // If the request method is not POST, redirect to login page
        echo("error");
        exit(); // Terminate script execution after redirection
    }
} else {
    // If user is not logged in, redirect to login page
    header("location: login.html");
    exit(); // Terminate script execution after redirection
}

// Close the database connection
mysqli_close($conn);
?>
