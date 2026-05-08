<?php
session_start();
include 'INCLUDES/connection.php';

if(!isset($_SESSION['Email'])){
    header("Location: login.php");
    exit();
}

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = "SELECT
        Transactions.Transaction_ID,
        Users.Fullname,
        Categories.Category_Name,
        Transactions.Amount,
        Transactions.Type,
        Transactions.Date

        FROM Transactions

        INNER JOIN Users
        ON Transactions.User_ID = Users.User_ID

        INNER JOIN Categories
        ON Transactions.Category_ID = Categories.Category_ID

        WHERE Users.Fullname LIKE '%$search%'

        ORDER BY Transactions.Date DESC";

$result = mysqli_query($conn, $sql);

$incomeQuery = mysqli_query($conn,
"SELECT SUM(Amount) AS totalIncome
FROM Transactions
WHERE Type='Income'");

$expenseQuery = mysqli_query($conn,
"SELECT SUM(Amount) AS totalExpense
FROM Transactions
WHERE Type='Expense'");

$income = mysqli_fetch_assoc($incomeQuery);
$expense = mysqli_fetch_assoc($expenseQuery);

?>