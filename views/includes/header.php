<header class="header">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/nav.css">
    
    <div class="logo">
        <img src="images/JOY.gif" alt="Joy Music Corner Logo" class="img-responsive">
    </div>

    <nav class="navbar">
        <button id="modeToggle" class="mode-btn"><i class="fas fa-moon"></i></button>
        <a href="HOMEPAGE.php"><i class="fas fa-home"></i> Home</a>
        <?php if (isset($_SESSION["user_id"])): ?>
            <form action="./auth/logout.php" method="POST" style="display:inline;">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <button type="submit">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        <?php else: ?>
            <a href="login.php"><i class="fas fa-user"></i> Login</a>
        <?php endif; ?>
        <a href="products.php"><i class="fas fa-guitar"></i> Products</a>
        <a href="aboutus.php"><i class="fas fa-info-circle"></i> About Us</a>
        <a href="ContactUs.php"><i class="fas fa-phone-alt"></i> Contact Us</a>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>

        <!-- Show Modify Users button only for admin -->
        <?php if (isset($_SESSION["username"]) && $_SESSION["username"] === "admin"): ?>

            <a href="./auth/admin_users.php">
                <i class="fas fa-user-cog"></i> Modify Users
            </a>
        <?php endif; ?>

    </nav>
</header>
