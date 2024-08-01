<?php
// Database connection parameters
$host = 'localhost';   // MySQL server hostname (usually 'localhost')
$username = 'root';    // MySQL username (default 'root')
$password = '';        // MySQL password (default is empty)
$database = 'atttsystem'; // Database name

// Establishing connection to MySQL server
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Check if the database is selected
if (!mysqli_select_db($conn, $database)) {
    die('Cannot select database: ' . mysqli_error($conn));
}

// Optional: Set charset to UTF-8
mysqli_set_charset($conn, 'utf8mb4');

// From here, $conn can be used for executing SQL queries
?>
