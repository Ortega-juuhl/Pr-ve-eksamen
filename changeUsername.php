<?php
session_start();

include 'db_connect.php';

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve new email from the form
        $new_username = mysqli_real_escape_string($conn, $_POST['new_username']);

        // Update the email in the database
        $update_query = "UPDATE user SET username = '$new_username' WHERE userID = '$userID'";
        $result = mysqli_query($conn, $update_query);

        if ($result) {
            echo "Email updated successfully.";
        } else {
            echo "Error updating email: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "User not logged in.";
}
?>
