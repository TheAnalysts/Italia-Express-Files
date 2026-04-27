<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="styles.css">
<link rel="icon" type="image/x-icon" href="flag.png">


    <nav class="navbar navbar-expand-lg navbar-white bg-danger px-4">
        <div class="container-fluid">
            <div class="collapse navbar-collapse w-100">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-outline-danger btn-lg px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Home.php">Home</a></li>
                                <li><a class="dropdown-item" href="Menu.php">Menu</a></li>
                                <li><a class="dropdown-item" href="aboutUS.php">About Us</a></li>
                                <li><a class="dropdown-item" href="ContactUs.php">Contact Us</a></li>
                            </ul>
                    </li>
                </ul>
            </div>
        </div>



<!-- the logo (centered) -->
    <div class="logo text-center">
        <a class="navbar-brand mx-auto text-center w-100" href="Home.php" style="font-weight: bold; color: darkgreen; font-size: 50px;">Itali Express</a>
    </div>

    <div class="nav-icons d-flex align-items-center justify-content-end w-100 gap-3">
        <a href="OrderHistory.php" class="text-decoration-none text-dark">📋 Orders</a>
        <a href="Cart.php" class="text-decoration-none text-dark">🛒 Cart</a>


        <?php if (isset($_SESSION['customer_name'])): ?>
            <span>👤 <?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
            <a href="logout.php" class="btn btn-sm btn-outline-danger ms-2">Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-sm btn-outline-primary ms-2">Login</a>
            <a href="signup.php" class="btn btn-sm btn-primary">Sign Up</a>
        <?php endif; ?>
    </div>
</nav>

