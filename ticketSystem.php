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
        $navn = $_POST['navn'];
        $beskrivelse = $_POST['beskrivelse'];
        $epost = $_POST['epost'];

        // Create the SQL query to insert the data
        $insert_query = "INSERT INTO ticketsystem (userID, navn, description, epost) VALUES ('$userID', '$navn', '$beskrivelse', '$epost')";

        // Execute the SQL query
        if (mysqli_query($conn, $insert_query)) {
            echo "Your ticket has been sent in.";
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
