<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations - Itali Express</title>
    <style>
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #ffffff;
            }

            /* Navigation Bar */
            nav {
                background: linear-gradient(to right,green, white, red);
                padding: 15px 20px;
                position: relative;
            }

            /* Logo (Left) */
            .logo a{
                color: black;
                font-size: 26px;
                font-weight: bold;
                padding-left: 10px;
                text-decoration: none;
                list-style: none;
                display: flex;
            }

            /* Centered Nav Links */
            nav ul {
                list-style: none;
                display: flex;
                justify-content: center;
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                margin: 0;
                padding: 0;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            nav ul li {
                margin: 0 20px;
            }

            nav ul li a {
                text-decoration: none;
                color: #333;
                font-size: 18px;
                font-weight: bold;
                transition: 0.3s;
            }

            nav ul li a:hover {
                color: red;
            }

            /* Content Section */
            .content {
                text-align: center;
            }

            .content h1 {
                color: green;
                padding: 15px;
            }

            .content p {
                color: #333;
                font-size: 18px;
            }
            
            .nav-icons {
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
                display: flex;
                gap: 15px;
            }

            .nav-icons a {
                text-decoration: none;
                background-color: white;
                color: #333;
                padding: 8px 16px;
                border-radius: 20px;
                font-weight: bold;
                border: 1px solid #ccc;
                transition: 0.3s;
            }

            .nav-icons a:hover {
                background-color: green;
                color: white;
                border-color: red;
            }

            .cart-container {
                max-width: 1000px;
                margin: 40px auto;
                padding: 20px;
                text-align: center;
            }

            .cart-container h1 {
                color: green;
                margin-bottom: 25px;
            }
        </style>
</head>

<body>

    <!-- Nav Bar -->
    <nav>
        <div class="logo"><a href="Home.php">Itali Express</a></div>

        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="Locations.php">Locations</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
        </ul>

        <div class="nav-icons">
            <a href="OrderHistory.php">📋 Orders</a>
            <a href="Cart.php">🛒 Cart</a>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="content">
        <h1>Locations</h1>
        <p>Italian food delivered straight to your door!</p>
    </div>

</body>
</html>