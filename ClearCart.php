<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$u_id = $_SESSION['customer_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_SESSION['customer_id'];

    $sql = "DELETE FROM item_purchase WHERE U_ID = '$u_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: cart.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: cart.php");
    exit();
}
?>