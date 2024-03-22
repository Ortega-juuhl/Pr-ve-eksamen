<?php
ini_set('memory_limit', '1024M');

$db = "fjell";
$user = "root";
$password = "";
$host = "localhost";

$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}
?>