<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Itali Express</title>
    <link rel="stylesheet" href="styles.css">
    <style>
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

        </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <h1>Menu</h1>
        <p>Italian food delivered straight to your door!</p>
            <?php include 'db.php'; ?>
            <div class="menu-grid">
            <?php
            $sql = "SELECT * FROM food";
            $result = $conn->query($sql);

            $counter = 1;

            while ($row = $result->fetch_assoc()) {
                $itemId = $counter;

                echo '<div class="menu-item">';
                echo '<img src="' . htmlspecialchars($row['Image']) . '" alt="' . htmlspecialchars($row['Name']) . '">';
                echo "<h2>" . htmlspecialchars($row['Name']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['Description']) . "</p>";
                echo "<p>Price: $" . htmlspecialchars($row['Pricing']) . "</p>";

                if (isset($_SESSION['customer_id'])) {
                    echo '<form method="POST" action="AddToCart.php">';
                    echo '<input type="hidden" name="FoodName" value="' . htmlspecialchars($row['Name'], ENT_QUOTES) . '">';
                    echo '<input type="hidden" name="Price" value="' . htmlspecialchars($row['Pricing']) . '">';

                    echo '<div class="quantity-controls">';
                    echo '<button type="button" onclick="changeQuantity(' . $itemId . ', -1)">-</button>';
                    echo '<input type="text" id="qty_' . $itemId . '" name="Quantity" value="1" readonly>';
                    echo '<button type="button" onclick="changeQuantity(' . $itemId . ', 1)">+</button>';
                    echo '</div>';

                    echo '<button type="submit" class="cart-btn">Add to Cart</button>';
                    echo '</form>';
                } else {
                    echo '<form method="GET" action="login.php">';

                    echo '<div class="quantity-controls">';
                    echo '<button type="button" onclick="changeQuantity(' . $itemId . ', -1)">-</button>';
                    echo '<input type="text" id="qty_' . $itemId . '" value="1" readonly>';
                    echo '<button type="button" onclick="changeQuantity(' . $itemId . ', 1)">+</button>';
                    echo '</div>';

                    echo '<button type="submit" class="cart-btn">Add to Cart</button>';
                    echo '</form>';
                }

                echo '</div>';

                $counter++;
            }
            ?>
        </div>
    </div>
    <script>
    function changeQuantity(itemId, amount) {
        let qtyInput = document.getElementById("qty_" + itemId);
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