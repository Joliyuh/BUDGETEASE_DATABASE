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


