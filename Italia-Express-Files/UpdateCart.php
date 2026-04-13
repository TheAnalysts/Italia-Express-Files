<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['U_ID'];
    $foodName = $_POST['FoodName'];
    $action = $_POST['action'];

    $sql = "SELECT * FROM item_purchase WHERE U_ID = '$u_id' AND FoodName = '$foodName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $currentQuantity = (int)$row['Quantity'];
        $currentTotal = (float)$row['Total'];

        if ($currentQuantity > 0) {
            $unitPrice = $currentTotal / $currentQuantity;
        } else {
            $unitPrice = 0;
        }

        if ($action == "increase") {
            $newQuantity = $currentQuantity + 1;
        } elseif ($action == "decrease") {
            $newQuantity = $currentQuantity - 1;
        } else {
            $newQuantity = $currentQuantity;
        }

        if ($newQuantity <= 0) {
            $deleteSql = "DELETE FROM item_purchase WHERE U_ID = '$u_id' AND FoodName = '$foodName'";
            $conn->query($deleteSql);
        } else {
            $newTotal = $unitPrice * $newQuantity;

            $updateSql = "UPDATE item_purchase
                          SET Quantity = '$newQuantity',
                              Total = '$newTotal',
                              TimeStamp = NOW()
                          WHERE U_ID = '$u_id' AND FoodName = '$foodName'";
            $conn->query($updateSql);
        }
    }

    header("Location: cart.php");
    exit();
}
?>