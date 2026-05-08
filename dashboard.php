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

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="CSS/style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container">

<h1>Welcome <?php echo $_SESSION['Fullname']; ?></h1>

<a href="add_transaction.php">
Add Transaction
</a>

<a href="logout.php">
Logout
</a>

<h2>Search</h2>

<form method="GET">

<input type="text"
name="search"
placeholder="Search User">

<button type="submit">
Search
</button>

</form>

<h2>Transaction Table</h2>

<table border="1">

<tr>

<th>ID</th>
<th>User</th>
<th>Category</th>
<th>Amount</th>
<th>Type</th>
<th>Date</th>
<th>Action</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Transaction_ID']; ?></td>

<td><?php echo $row['Fullname']; ?></td>

<td><?php echo $row['Category_Name']; ?></td>

<td><?php echo $row['Amount']; ?></td>

<td><?php echo $row['Type']; ?></td>

<td><?php echo $row['Date']; ?></td>

<td>

<a href="edit_transaction.php?id=<?php echo $row['Transaction_ID']; ?>">
Edit
</a>

<a href="delete_transaction.php?id=<?php echo $row['Transaction_ID']; ?>"
onclick="return confirm('Delete this transaction?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

<h2>Financial Chart</h2>

<canvas id="myChart"></canvas>

</div>

<script>

const ctx = document.getElementById('myChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: ['Income', 'Expense'],

datasets: [{

label: 'Money Overview',

data: [
<?php echo $income['totalIncome'] ?? 0; ?>,
<?php echo $expense['totalExpense'] ?? 0; ?>
],

borderWidth: 1

}]

}

});

</script>

</body>
</html>