<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['U_ID'];

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