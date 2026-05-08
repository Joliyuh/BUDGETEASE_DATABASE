<?php
// Step 1: Set your database connection details
$servername = "localhost"; // Change if your database is hosted elsewhere
$username = "root"; // Change to your database username
$password = ""; // Change to your database password 
$database = "budgetease_database"; // Change to your database name

// Step 2: Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Step 3: Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>