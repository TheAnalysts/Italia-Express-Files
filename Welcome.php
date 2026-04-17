<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['customer_name'];
$email = $_SESSION['customer_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Itali Express</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            background-color: #ffffff;
        }

        h1 {
            color: green;
        }

        p {
            font-size: 20px;
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: red;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        a:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

    <h1>Welcome back, <?php echo htmlspecialchars($name); ?>!</h1>
    <p>Logged in as: <?php echo htmlspecialchars($email); ?></p>

    <a href="Menu.php">Continue to Menu</a>

</body>
</html>