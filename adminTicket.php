<?php
session_start();

include 'db_connect.php'; // Include the file containing your database connection code

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    // Check if the user is an admin
    $check_admin_query = "SELECT is_admin FROM user WHERE userID = $userID";
    $check_admin_result = mysqli_query($conn, $check_admin_query);

    if ($check_admin_result) {
        $row = mysqli_fetch_assoc($check_admin_result);
        $is_admin = $row['is_admin'];

        if ($is_admin) {
            // Display tickets with all statuses for admin
            $display_query = "SELECT * FROM ticketsystem";
        } else {
            // Display tickets with only certain statuses for non-admin users
            $display_query = "SELECT * FROM ticketsystem WHERE CategoryID IN (1, 2)"; // Adjust statuses as needed
        }

        // Execute the SQL query
        $result = mysqli_query($conn, $display_query);

        // Check if the query was successful
        if ($result) {
            // Display the results
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Ticket ID: " . $row['ticketID'] . "<br>";
                echo "Title: " . $row['title'] . "<br>";
                echo "Description: " . $row['description'] . "<br>";
                echo "<br>";
            }
        } else {
            // Display an error message if the query fails
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Display an error message if the admin check query fails
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
