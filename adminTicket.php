<?php
include 'db_connect.php';

$display_query = "SELECT * FROM ticketsystem";
$result = mysqli_query($conn, $display_query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Ticket ID: " . $row['ticketID'] . "<br>";
        echo "Navn: " . $row['navn'] . "<br>";
        echo "Epost: " . $row['epost'] . "<br>";
        echo "Description: " . $row['description'] . "<br>";
        //echo "Ticket status:" . $row['Category_name WHERE CategoryID = userID????'];
    }
} else {
    echo "Ingen tickets.";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <Select>
        <option>Ikke tatt</option>
        <option>Tatt</option>
        <option>Ferdig</option>
    </Select>
    
</body>
</html>
