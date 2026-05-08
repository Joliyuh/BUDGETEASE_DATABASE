<?php
session_start();
include 'INCLUDES/connection.php';

if(isset($_POST['login'])){

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM Users WHERE Email='$email'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['Password'])){

            $_SESSION['Email'] = $row['Email'];
            $_SESSION['UserID'] = $row['User_ID'];
            $_SESSION['Fullname'] = $row['Fullname'];

            header("Location: dashboard.php");
            exit();

        } else {
            echo "Incorrect Password";
        }

    } else {
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

<div class="container">

<h2>Login</h2>

<form method="POST">

    <input type="email"
    name="Email"
    placeholder="Email"
    required>

    <input type="password"
    name="Password"
    placeholder="Password"
    required>

    <button type="submit" name="login">
        Login
    </button>

</form>

<a href="register.php">Create Account</a>

</div>

</body>
</html>

