<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['U_ID'];

    $sql = "SELECT * FROM item_purchase WHERE U_ID = '$u_id'";
    $result = $conn->query($sql);

    $grandTotal = 0;

    while ($row = $result->fetch_assoc()) {
        $grandTotal += $row['Total'];
    }

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