<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "joy_music";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, username, email FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="../styles/admin.css">
    <link rel="stylesheet" href="../styles/search.css">
    <script>
        function filterUsers() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll(".table-container table tr:not(:first-child)");

            rows.forEach(row => {
                let username = row.cells[1].textContent.toLowerCase();
                row.style.display = username.includes(input) ? "" : "none";
            });
        }
    </script>
</head>
<body>
    <h2>All Users</h2>

    <!-- Search Bar -->
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Search by username..." onkeyup="filterUsers()">
        <span class="search-icon">🔍</span>
    </div>

    <!-- Users Table -->
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row["id"]) ?></td>
                    <td><?= htmlspecialchars($row["username"]) ?></td>
                    <td><?= htmlspecialchars($row["email"]) ?></td>
                    <td>
                        <!-- Edit button: Visible to the user themselves -->
                        <form action="edit_user.php" method="GET" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="edit-btn">Edit</button>
                        </form>

                        <!-- Delete button: Visible to admin or the user themselves -->
                        <form action="delete_user.php" method="POST" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?= $row["id"] ?>">
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>

                        <!-- Download Report button: Only visible to admin -->
                        <form action="generate_report.php" method="POST" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?= $row["id"] ?>">
                            <button type="submit" class="report-btn">Download Report</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <a href="../homepage.php"><button class="thilo">Back to Home</button></a>
</body>
</html>
