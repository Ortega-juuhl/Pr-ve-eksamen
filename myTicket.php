<?php
session_start();

include 'db_connect.php'; // Include the file containing your database connection code

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $query = "SELECT ts.ticketID, ts.userID, ts.title, ts.description, c.Category_name, c.Category_description
              FROM ticketsystem ts
              INNER JOIN Categories c ON ts.CategoryID = c.CategoryID
              WHERE ts.userID = $userID";

    // Execute the SQL query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Display the results
        while ($row = mysqli_fetch_assoc($result)) {
            // Output each row of data
            echo "Ticket ID: " . $row['ticketID'] . "<br>";
            echo "Title: " . $row['title'] . "<br>";
            echo "Description: " . $row['description'] . "<br>";
            echo "Ticket status: " . $row['Category_name'] . "<br>";
            echo "Ticket statis description: " . $row['Category_description'] . "<br>";
            // Include delete button form here if needed
            echo "<br>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='ticketID' value='" . $row['ticketID'] . "'>";
            echo "<button type='submit' name='delete_button'>Delete</button>";
            echo "</form>";
            echo "<br>";
        }
        
        // Handle ticket deletion
        if(isset($_POST['delete_button'])) { 
            $ticketID = $_POST['ticketID'];
            $delete_query = "DELETE FROM ticketsystem WHERE ticketID = $ticketID";
            $delete_result = mysqli_query($conn, $delete_query);
            if ($delete_result) {
                echo "Ticket deleted successfully. <a href='ticketSystem.html'>Create a ticket</a>"; 
            } else {
                echo "Error deleting ticket: " . mysqli_error($conn);
            }
        }
    } else {
        // Display an error message if the query fails
        echo "You don't have any active tickets.";
    }
} else {
    // Redirect to login page if user is not logged in
    header("location: login.html");
    exit(); // Terminate script execution after redirection

}

// Close the database connection
mysqli_close($conn);
?>