<?php include 'db.php'; ?>
<?php include 'header.php'; ?>
<?php
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
    <link rel="stylesheet" href="styles.css">
    <title>Cart - Itali Express</title>

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

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f8f8f8;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: green;
            color: white;
        }

        .qty-form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            border: none;
            background-color: green;
            color: white;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .qty-number {
            min-width: 25px;
            font-weight: bold;
        }

        .remove-btn, .clear-btn, .checkout-btn {
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .remove-btn {
            background-color: red;
            color: white;
        }

        .remove-btn:hover {
            background-color: darkred;
        }

        .action-buttons {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .clear-btn {
            background-color: #555;
            color: white;
        }

        .clear-btn:hover {
            background-color: #333;
        }

        .checkout-btn {
            background-color: red;
            color: white;
        }

        .checkout-btn:hover {
            background-color: darkred;
        }

        .empty-cart {
            font-size: 20px;
            color: #555;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="cart-container">
    <h1>Your Cart</h1>

    <?php
    $sql = "SELECT * FROM item_purchase WHERE U_ID = '$u_id' ORDER BY TimeStamp DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $grandTotal = 0;

        echo "<table>";
        echo "<tr>
                <th>Food</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['FoodName']) . "</td>";

            echo "<td>
                    <form method='POST' action='UpdateCart.php' class='qty-form'>
                        <input type='hidden' name='FoodName' value='" . htmlspecialchars($row['FoodName'], ENT_QUOTES) . "'>
                        <button type='submit' name='action' value='decrease' class='qty-btn'>-</button>
                        <span class='qty-number'>" . $row['Quantity'] . "</span>
                        <button type='submit' name='action' value='increase' class='qty-btn'>+</button>
                    </form>
                  </td>";

            echo "<td>$" . number_format($row['Total'], 2) . "</td>";

            echo "</tr>";

            $grandTotal += $row['Total'];
        }

        echo "<tr>";
        echo "<td colspan='2'><strong>Grand Total</strong></td>";
        echo "<td><strong>$" . number_format($grandTotal, 2) . "</strong></td>";
        echo "</tr>";
        echo "</table>";

        echo "<div class='action-buttons'>
                <form method='POST' action='ClearCart.php'>
                    <button type='submit' class='clear-btn'>Clear Cart</button>
                </form>

                <form method='POST' action='Checkout.php'>
                    <button type='submit' class='checkout-btn'>Checkout</button>
                </form>
              </div>";
    } else {
        echo "<p class='empty-cart'>Your cart is empty.</p>";
    }
    ?>
</div>

</body>
</html>