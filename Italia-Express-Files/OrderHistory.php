<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Itali Express</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        nav {
            background: linear-gradient(to right, green, white, red);
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
            top: 50%;
            transform: translate(-50%, -50%);
            margin: 0;
            padding: 0;
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

        .history-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .history-container h1 {
            color: green;
            text-align: center;
            margin-bottom: 30px;
        }

        .order-card {
            background-color: #f8f8f8;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid green;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .order-number {
            font-size: 20px;
            font-weight: bold;
            color: green;
        }

        .order-date {
            color: #666;
            font-size: 14px;
        }

        .order-total {
            font-size: 18px;
            font-weight: bold;
            color: red;
        }

        .order-items {
            margin-top: 15px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-name {
            font-weight: bold;
            color: #333;
        }

        .item-details {
            color: #666;
        }

        .empty-history {
            text-align: center;
            font-size: 20px;
            color: #555;
            margin-top: 50px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: green;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .back-btn:hover {
            background-color: darkgreen;
        }
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
        $orderSql = "SELECT DISTINCT OrderID, TimeStamp, Total 
                     FROM food_order 
                     WHERE U_ID = '$u_id' 
                     ORDER BY TimeStamp DESC";
        $orderResult = $conn->query($orderSql);

        if ($orderResult->num_rows > 0) {
            while ($order = $orderResult->fetch_assoc()) {
                $orderId = $order['OrderID'];
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
                $itemsSql = "SELECT FoodName, Quantity, ItemTotal 
                             FROM food_order 
                             WHERE OrderID = '$orderId' AND U_ID = '$u_id'";
                $itemsResult = $conn->query($itemsSql);

                if ($itemsResult->num_rows > 0) {
                    echo "<div class='order-items'>";
                    while ($item = $itemsResult->fetch_assoc()) {
                        echo "<div class='order-item'>";
                        echo "<span class='item-name'>" . htmlspecialchars($item['FoodName']) . "</span>";
                        echo "<span class='item-details'>Qty: " . $item['Quantity'] . " × $" . number_format($item['ItemTotal'] / $item['Quantity'], 2) . " = $" . number_format($item['ItemTotal'], 2) . "</span>";
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
