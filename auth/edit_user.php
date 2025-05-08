<?php
session_start();
include "../config/database.php";

if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    $sql = "SELECT username, email FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
} else {
    header("Location: admin_users.php");
    exit();
}
?>


    <!-- Display success or error message from session -->
  <?php if (isset($_SESSION["success_message"])): ?>
        <div class="message success"><?= $_SESSION["success_message"]; ?></div>
        <?php unset($_SESSION["success_message"]); ?>
    <?php elseif (isset($_SESSION["error_message"])): ?>
        <div class="message error"><?= $_SESSION["error_message"]; ?></div>
        <?php unset($_SESSION["error_message"]); ?>
    <?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="../styles/admin.css">
    <link rel="stylesheet" href="../styles/form.css">
</head>
<body>
    <h2>Edit User</h2>


    <form action="update_user.php" method="POST">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <label>Username:</label>
        <input type="text" name="username" value="<?= $result["username"] ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $result["email"] ?>" required>

        <label>New Password (optional):</label>
        <input type="password" name="password">

        <button type="submit">Update</button>
    </form>

    <a href="admin_users.php">
    <button type="button" class="thilo">Back</button>
</a>



</body>
</html>
