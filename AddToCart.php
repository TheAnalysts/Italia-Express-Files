<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['U_ID'];
    $foodName = $_POST['FoodName'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];

    $total = $price * $quantity;

    // Check if item already exists for THIS user
    $checkSql = "SELECT * FROM item_purchase 
                 WHERE FoodName = '$foodName' AND U_ID = '$u_id'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();

        $newQuantity = $row['Quantity'] + $quantity;
        $newTotal = $newQuantity * $price;

        $updateSql = "UPDATE item_purchase
                      SET Quantity = '$newQuantity',
                          Total = '$newTotal',
                          TimeStamp = NOW()
                      WHERE U_ID = '$u_id' AND FoodName = '$foodName'";

        $conn->query($updateSql);
    } else {
        $insertSql = "INSERT INTO item_purchase (U_ID, FoodName, TimeStamp, Quantity, Total)
                      VALUES ('$u_id', '$foodName', NOW(), '$quantity', '$total')";

        $conn->query($insertSql);
    }

    header("Location: Menu.php");
    exit();
}
?>