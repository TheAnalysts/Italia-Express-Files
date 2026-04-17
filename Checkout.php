<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['U_ID'];

    // Get all items from cart
    $sql = "SELECT * FROM item_purchase WHERE U_ID = '$u_id'";
    $result = $conn->query($sql);

    $grandTotal = 0;
    $cartItems = array();

    // Calculate grand total and store cart items
    while ($row = $result->fetch_assoc()) {
        $grandTotal += $row['Total'];
        $cartItems[] = $row;
    }

    // Insert each item into food_order table (all items share same OrderID via auto-increment grouping)
    if (count($cartItems) > 0) {
        foreach ($cartItems as $item) {
            $foodName = $item['FoodName'];
            $quantity = $item['Quantity'];
            $itemTotal = $item['Total'];

            $insertOrderSql = "INSERT INTO food_order (U_ID, FoodName, Quantity, ItemTotal, Total, TimeStamp)
                               VALUES ('$u_id', '$foodName', '$quantity', '$itemTotal', '$grandTotal', NOW())";
            $conn->query($insertOrderSql);
        }
    }

    // Clear the cart after checkout
    $clearSql = "DELETE FROM item_purchase WHERE U_ID = '$u_id'";
    $conn->query($clearSql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Itali Express</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 60px;
        }

        h1 {
            color: green;
        }

        p {
            font-size: 20px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: red;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        a:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <h1>Order Placed!</h1>
    <p>Your order has been checked out.</p>
    <p><strong>Total Paid: $<?php echo number_format($grandTotal, 2); ?></strong></p>
    <a href="Menu.php">Back to Menu</a>
</body>
</html>