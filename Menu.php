<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Itali Express</title>
    <link rel="stylesheet" href="styles.css">
    <style>

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