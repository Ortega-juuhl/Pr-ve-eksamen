<?php
session_start();

include 'db_connect.php'; // Include the file containing your database connection code

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $display_query = "SELECT * FROM ticketsystem WHERE userID = $userID"; // Corrected the SELECT statement

    // Execute the SQL query
    $result = mysqli_query($conn, $display_query);

    // Check if the query was successful
    if ($result) {
        // Display the results
        while ($row = mysqli_fetch_assoc($result)) {
            // Output each row of data
            echo "Ticket ID: " . $row['ticketID'] . "<br>";
            echo "Navn: " . $row['navn'] . "<br>";
            echo "Epost: " . $row['epost'] . "<br>";
            echo "Description: " . $row['description'] . "<br>";
            echo "<br>";
        }
    } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect to login page if user is not logged in
    header("location: login.html");
    exit(); // Terminate script execution after redirection
}

// Close the database connection
mysqli_close($conn);
?>