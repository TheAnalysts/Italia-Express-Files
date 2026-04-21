<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$u_id = $_SESSION['customer_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Itali Express</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .history-container {
            max-width: 1000px;
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

<?php include 'header.php'; ?>

<div class="history-container">
    <h1>Order History</h1>

    <?php
    $orderSql = "SELECT OrderID, MAX(TimeStamp) AS TimeStamp, MAX(Total) AS Total
                FROM food_order
                WHERE U_ID = '$u_id'
                GROUP BY OrderID
                ORDER BY MAX(TimeStamp) DESC";

    $orderResult = $conn->query($orderSql);

    if ($orderResult->num_rows > 0) {
        while ($order = $orderResult->fetch_assoc()) {
            $orderId = $order['OrderID'];
            $orderDate = date('F j, Y, g:i a', strtotime($order['TimeStamp']));
            $orderTotal = $order['Total'];

            echo "<div class='order-card'>";
            echo "<div class='order-header'>";
            echo "<div>";
            echo "<div class='order-number'>Order #" . htmlspecialchars($orderId) . "</div>";
            echo "<div class='order-date'>" . htmlspecialchars($orderDate) . "</div>";
            echo "</div>";
            echo "<div class='order-total'>$" . number_format($orderTotal, 2) . "</div>";
            echo "</div>";

            $itemsSql = "SELECT FoodName, Quantity, ItemTotal
                         FROM food_order
                         WHERE OrderID = '$orderId' AND U_ID = '$u_id'";

            $itemsResult = $conn->query($itemsSql);

            if ($itemsResult->num_rows > 0) {
                echo "<div class='order-items'>";
                while ($item = $itemsResult->fetch_assoc()) {
                    $unitPrice = ($item['Quantity'] > 0) ? ($item['ItemTotal'] / $item['Quantity']) : 0;

                    echo "<div class='order-item'>";
                    echo "<span class='item-name'>" . htmlspecialchars($item['FoodName']) . "</span>";
                    echo "<span class='item-details'>Qty: " . $item['Quantity'] .
                         " × $" . number_format($unitPrice, 2) .
                         " = $" . number_format($item['ItemTotal'], 2) . "</span>";
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