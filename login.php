<?php
session_start();
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