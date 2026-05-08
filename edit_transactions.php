<?php
session_start();
include 'INCLUDES/connection.php';

$id = $_GET['id'];

$query = mysqli_query($conn,
"SELECT * FROM Transactions WHERE Transaction_ID='$id'");

$row = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){

    $amount = $_POST['Amount'];

    $sql = "UPDATE Transactions
            SET Amount='$amount'
            WHERE Transaction_ID='$id'";

    mysqli_query($conn, $sql);

    header("Location: dashboard.php");
    exit();
}
?>