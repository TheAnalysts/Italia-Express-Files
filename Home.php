<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itali Express</title>
<?php
    echo '<style>
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
            .logo {
                color: black;
                font-size: 26px;
                font-weight: bold;
                padding-left: 10px;
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
        </style>';
    ?>
</head>

<body>

    <!-- Nav Bar -->
    <nav>
        <div class="logo">Itali Express</div>

        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="Orders.php">Orders</a></li>
            <li><a href="Locations.php">Locations</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to Itali Express</h1>
        <p>Italian food delivered straight to your door!</p>
    </div>

</body>
</html>