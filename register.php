<?php
include 'INCLUDES/connection.php';

if(isset($_POST['register'])){

    $fullname = $_POST['Fullname'];
    $email = $_POST['Email'];

    // PASSWORD HASHING
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users(Fullname, Email, Password)
            VALUES('$fullname','$email','$password')";

    mysqli_query($conn, $sql);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

<div class="container">

<h2>Register</h2>

<form method="POST">

    <input type="text"
    name="Fullname"
    placeholder="Fullname"
    required>

    <input type="email"
    name="Email"
    placeholder="Email"
    required>

    <input type="password"
    name="Password"
    placeholder="Password"
    required>

    <button type="submit" name="register">
        Register
    </button>

</form>

<a href="login.php">Already have an account?</a>

</div>

</body>
</html>
