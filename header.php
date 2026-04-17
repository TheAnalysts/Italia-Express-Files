<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav>
    <div class="logo">
        <a href="Home.php">Itali Express</a>
    </div>

    <div class="nav-links">
        <a href="Home.php">Home</a>
        <a href="Menu.php">Menu</a>
        <a href="Locations.php">Locations</a>
        <a href="ContactUs.php">Contact Us</a>
    </div>

    <div class="nav-icons">
        <a href="OrderHistory.php">📋 Orders</a>
        <a href="Cart.php">🛒 Cart</a>

        <?php if (isset($_SESSION['customer_name'])): ?>
            <span>👤 <?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        <?php endif; ?>
    </div>
</nav>