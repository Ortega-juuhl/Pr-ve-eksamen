<?php
session_start();

include 'db_connect.php'; // Include the file containing your database connection code

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $display_query = "SELECT * FROM ticketsystem WHERE userID = $userID";

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
            //echo "Ticket status:" . $row['Category_name WHERE CategoryID = userID????'];

            if(isset($_POST['delte_button'])) { 
                $delete_query = "DELETE FROM ticketsystem WHERE userID = $userID";
                $delete_result = mysqli_query($conn, $delete_query);
                if ($delete_result) {
                    echo "Ticket deleted successfully. <a href='ticketSystem.html'>Create a ticket</a>"; 
                } else {
                    echo "Error deleting ticket: " . mysqli_error($conn);
                }
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dine tickets</title>
</head>
<body>
    <form method="post"> 
        <input type="submit" name="delete_button" class="button" value="Delete"/> 
    </form> 
</body>
</html>