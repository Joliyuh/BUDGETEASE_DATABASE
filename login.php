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

