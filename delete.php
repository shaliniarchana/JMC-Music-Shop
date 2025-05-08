<?php
$conn = new mysqli("localhost", "root", "", "joy_music");
$id = $_GET['id'];
$conn->query("DELETE FROM products WHERE id=$id");
// ✅ Set session message
$_SESSION['message'] = "Product deleted successfully!";

// ✅ Redirect back to add_product.php
header("Location: add_to_cart.php");
exit();
?>
