<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $card_name = $_POST['card_name'];
    $total_price = $_SESSION['total_price'];

    // Insert payment details into database
    $query = "INSERT INTO payments (card_number, expiry_date, cvv, card_name, total_price) 
              VALUES ('$card_number', '$expiry_date', '$cvv', '$card_name', '$total_price')";
    
    if ($conn->query($query) === TRUE) {
        echo "<h2>Payment Successful! Thank You.</h2>";
        session_destroy(); // Clear session after successful payment
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
