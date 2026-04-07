<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Itali Express</title>
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

            .logo a{
                color: black;
                font-size: 26px;
                font-weight: bold;
                padding-left: 10px;
                text-decoration: none;
                list-style: none;
                display: flex;
            }

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
                display: block;
                text-align: center;
                max-width: 1200px;
                margin: 0 auto;
            }

            .content h1 {
                color: green;
                padding: 15px;
            }

            .content p {
                color: #333;
                font-size: 18px;
            }
            .content img {
                width: 200px;
                height: 200px;
                object-fit: cover;
                border-radius: 10px;
                margin-bottom: 10px;
            }
            .menu-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                padding: 20px;
                justify-content:center;
            }

            .menu-item {
                background: #f8f8f8;
                border-radius: 15px;
                padding: 15px;
                text-align: center;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                transition: transform 0.2s;
            }

            .menu-item:hover {
                transform: scale(1.05);
            }

            .menu-item img {
                width: 100%;
                height: 180px;
                object-fit: cover;
                border-radius: 10px;
            }

            .menu-item h2 {
                margin: 10px 0 5px;
                color: green;
            }

            .menu-item p {
                margin: 5px 0;
            }
            .quantity-controls input {
                width: 28px;
                border: none;
                text-align: center;
                background: transparent;
                font-weight: bold;
                padding: 5px;
            }
            .cart-link {
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
            }

            .cart-link a {
                text-decoration: none;
                background-color: white;
                color: #333;
                padding: 8px 16px;
                border-radius: 20px;
                font-weight: bold;
                border: 1px solid #ccc;
                transition: 0.3s;
            }

            .cart-link a:hover {
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

        <div class="cart-link"
            <a href="cart.php"></a>
            <a href="cart.php">🛒 Cart</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <h1>Menu</h1>
        <p>Italian food delivered straight to your door!</p>
            <?php include 'db.php'; ?>
            <div class="menu-grid">
            <?php
            $sql = "SELECT * FROM food";
            $result = $conn->query($sql);
            
            while ($row = $result->fetch_assoc()) {
                echo '<div class="menu-item">';
                echo '<img src="' . $row['Image'] . '" alt="' . $row['Name'] . '">';
                echo "<h2>" . $row['Name'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>Price: $" . $row['Pricing'] . "</p>";
                
                echo '<form method="POST" action="AddToCart.php">';
                echo '<input type="hidden" name="U_ID" value="1">';
                echo '<input type="hidden" name="FoodName" value="' . $row['Name'] . '">';
                echo '<input type="hidden" name="Price" value="' . $row['Pricing'] . '">';

                echo '<div class="quantity-controls">';
                echo '<button type="button" onclick="changeQuantity(\'' . $row['Name'] . '\', -1)">-</button>';
                echo '<input type="text" id="qty_' . $row['Name'] . '" name="Quantity" value="1" readonly>';
                echo '<button type="button" onclick="changeQuantity(\'' . $row['Name'] . '\', 1)">+</button>';
                echo '</div>';

                echo '<button type="submit" class="cart-btn">Add to Cart</button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <script>
    function changeQuantity(foodId, amount) {
        let qtyInput = document.getElementById("qty_" + foodId);
        let currentValue = parseInt(qtyInput.value);

        currentValue += amount;

        if (currentValue < 1) {
            currentValue = 1;
        }

        qtyInput.value = currentValue;
    }
    </script>
</body>
</html>