<?php
session_start();
<<<<<<< HEAD
include 'INCLUDES/connection.php';

if(isset($_POST['login'])){

$email = $_POST['Email'];
$password = $_POST['Password'];

$sql = "SELECT * FROM Users
        WHERE Email='$email'
        AND Password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

$_SESSION['Email'] = $email;

header("Location: dashboard.php");

}else{
echo "Invalid Account";
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

<h2>Login</h2>

<form method="POST">

<input type="Email" name="Email" placeholder="Email">

<input type="Password" name="Password" placeholder="Password">

<button type="submit" name="login">Login</button>

</form>

</body>
</html>
=======
include "config.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: dashboard.php");
        } else {
            echo "Wrong password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<form method="POST">
    <input type="email" name="email" required><br>
    <input type="password" name="password" required><br>
    <button name="login">Login</button>
</form>
>>>>>>> 64362e4175be6a01fd4f7db6abc4f256db4c5f91
