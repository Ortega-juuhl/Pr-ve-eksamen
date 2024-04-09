<?php
// Start the session to manage user sessions
session_start();

// Include the file containing the database connection code
include 'db_connect.php';

// Check if the user is logged in and is an admin
if (isset($_SESSION['userID']) && $_SESSION['is_admin']) {
    // Fetch all tickets from the database
    $query = "SELECT * FROM ticketsystem";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Display a table with all tickets
        echo "<h2>All Tickets</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Ticket ID</th><th>User ID</th><th>Title</th><th>Description</th><th>Status</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ticketID'] . "</td>";
            echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['CategoryID'] . "</td>";
            echo "<td><form method='post'><input type='hidden' name='ticketID' value='" . $row['ticketID'] . "'><select name='new_status'><option value='1'>Not Taken</option><option value='2'>Under Progress</option><option value='3'>Finished</option></select><button type='submit' name='update_status'>Update Status</button></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error fetching tickets: " . mysqli_error($conn);
    }

    // Check if the form for updating status is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
        // Retrieve ticket ID and new status from the form submission
        $ticketID = $_POST['ticketID'];
        $newStatus = $_POST['new_status'];

        // Update the status of the ticket in the database
        $update_query = "UPDATE ticketsystem SET CategoryID = $newStatus WHERE ticketID = $ticketID";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            echo "<p>Status updated successfully.</p>";
        } else {
            echo "<p>Error updating status: " . mysqli_error($conn) . "</p>";
        }
    }
    
} else {
    // Redirect to the login page if the user is not logged in or is not an admin
    header("location: login.html");
    exit();
}
?>
