<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Itali Express</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        
    </style>
</head>
<body>

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

    <div class="history-container">
        <h1>Order History</h1>

        <?php
        $u_id = 1;
        
        // Get all unique orders for this user
        $orderSql = "SELECT DISTINCT Order_ID, TimeStamp, Total 
                     FROM food_order 
                     WHERE U_ID = '$u_id' 
                     ORDER BY TimeStamp DESC";
        $orderResult = $conn->query($orderSql);

        if ($orderResult->num_rows > 0) {
            while ($order = $orderResult->fetch_assoc()) {
                $orderId = $order['Order_ID'];
                $orderDate = date('F j, Y, g:i a', strtotime($order['TimeStamp']));
                $orderTotal = $order['Total'];

                echo "<div class='order-card'>";
                echo "<div class='order-header'>";
                echo "<div>";
                echo "<div class='order-number'>Order #" . $orderId . "</div>";
                echo "<div class='order-date'>" . $orderDate . "</div>";
                echo "</div>";
                echo "<div class='order-total'>$" . number_format($orderTotal, 2) . "</div>";
                echo "</div>";

                // Get items for this specific order
                $itemsSql = "SELECT FoodName, Quantity, Total 
                             FROM food_order 
                             WHERE Order_ID = '$orderId' AND U_ID = '$u_id'";
                $itemsResult = $conn->query($itemsSql);

                if ($itemsResult->num_rows > 0) {
                    echo "<div class='order-items'>";
                    while ($item = $itemsResult->fetch_assoc()) {
                        echo "<div class='order-item'>";
                        echo "<span class='item-name'>" . htmlspecialchars($item['FoodName']) . "</span>";
                        echo "<span class='item-details'>Qty: " . $item['Quantity'] . " × $" . number_format($item['Total'] / $item['Quantity'], 2) . " = $" . number_format($item['Total'], 2) . "</span>";
                        echo "</div>";
                    }
                    echo "</div>";
                }

                echo "</div>";
            }
        } else {
            echo "<div class='empty-history'>";
            echo "<p>No order history found.</p>";
            echo "<a href='Menu.php' class='back-btn'>Start Shopping</a>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
