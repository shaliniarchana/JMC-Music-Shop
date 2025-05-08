<?php
$servername = "localhost";
$username = "root";  // Default WAMP MySQL user
$password = "";      // Default WAMP MySQL password (leave blank)
$dbname = "joy_music"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
