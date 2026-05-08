<?php
session_start();
include 'INCLUDES/connection.php';

if(!isset($_SESSION['Email'])){
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['UserID'];

if(isset($_POST['add'])){

    $categoryID = $_POST['Category_ID'];
    $amount = $_POST['Amount'];
    $type = $_POST['Type'];
    $date = $_POST['Date'];

    $sql = "INSERT INTO Transactions
            (User_ID, Category_ID, Amount, Type, Date)

            VALUES
            ('$userID','$categoryID','$amount','$type','$date')";

    mysqli_query($conn, $sql);

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Add Transaction</title>
<link rel="stylesheet" href="CSS/style.css">
</head>

<body>

<h2>Add Transaction</h2>

<form method="POST">

<label>Category</label>

<select name="Category_ID" required>

<?php

$categories = mysqli_query($conn,
"SELECT * FROM Categories");

while($row = mysqli_fetch_assoc($categories)){
?>

<option value="<?php echo $row['Category_ID']; ?>">

<?php echo $row['Category_Name']; ?>

</option>

<?php } ?>

</select>

<br><br>

<label>Amount</label>

<input type="number"
step="0.01"
name="Amount"
placeholder="Enter Amount"
required>

<br><br>

<label>Type</label>

<select name="Type" required>

<option value="Income">Income</option>

<option value="Expense">Expense</option>

</select>

<br><br>

<label>Date</label>

<input type="date" name="Date" required>

<br><br>

<button type="submit" name="add">
Add Transaction
</button>

</form>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
