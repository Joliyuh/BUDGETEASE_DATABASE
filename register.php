<?php
include 'INCLUDES/connection.php';

if(isset($_POST['register'])){

$fullname = $_POST['Fullname'];
$email = $_POST['Email'];
$password = $_POST['Password'];

$sql = "INSERT INTO Users(`Fullname`,Email,Password)
VALUES('$fullname','$email','$password')";

mysqli_query($conn,$sql);

echo "Registered Successfully";

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

<h2>Register</h2>

<form method="POST">

<input type="text" name="Fullname" placeholder="Fullname">
<input type="email" name="Email" placeholder="Email">
<input type="password" name="Password" placeholder="Password">
<button type="submit" name="register">Register</button>

</form>

</body>
</html>
