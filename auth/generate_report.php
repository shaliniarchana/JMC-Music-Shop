<?php
session_start();
include "../config/database.php";

// Check if the user_id is provided
if (!isset($_POST["user_id"])) {
    die("No user selected.");
}

$user_id = $_POST["user_id"];

// Fetch user info
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}

// Generate Word content
$filename = "user_report_{$user_id}.doc";
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=" . $filename);

echo "<html>";
echo "<head><meta charset='UTF-8'></head>";
echo "<body>";
echo "<h2>User Report</h2>";
echo "<p><strong>User ID:</strong> $user_id</p>";
echo "<p><strong>Username:</strong> " . htmlspecialchars($user["username"]) . "</p>";
echo "<p><strong>Email:</strong> " . htmlspecialchars($user["email"]) . "</p>";
echo "<p><strong>Generated At:</strong> " . date("Y-m-d H:i:s") . "</p>";
echo "</body></html>";
exit;
?> 
