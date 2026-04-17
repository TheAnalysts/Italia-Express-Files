<?php
include 'db.php';
include 'header.php';

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $checkSql = "SELECT * FROM customer WHERE Email = '$email'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        $error = "An account with that email already exists.";
    } else {
        $sql = "INSERT INTO customer (Name, Email, Password)
                VALUES ('$firstName', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            $message = "Account created successfully.";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Itali Express</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .signup-container {
            width: 360px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: green;
            margin-bottom: 20px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: darkred;
        }

        .message {
            color: green;
            margin-top: 15px;
        }

        .error {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="signup-container">
    <h1>Create Account</h1>

    <form method="POST" action="">
        <input type="text" name="Name" placeholder="Name" required>
        <input type="email" name="Email" placeholder="Email" required>
        <input type="password" name="Password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
    </form>

    <?php
    if (!empty($message)) {
        echo "<p class='message'>$message</p>";
    }

    if (!empty($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
</div>

</body>
</html>