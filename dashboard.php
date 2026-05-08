<?php
session_start();



if(!isset($_SESSION['Email'])){
header("Location: login.php");


}
?>

<!DOCTYPE html>
<html>

<head>
<title>Dashboard</title>
<link rel="stylesheet" href="CSS/style.css">
</head>

<body>

<h1>Welcome to BUDGETEASE</h1>

<a href="logout.php">Logout</a>


</body>
</html>

