<?php

$host = 'localhost'; // Database host (usually 'localhost')
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'attsystem'; // Database name

// Create connection
$conn= new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Set charset to UTF-8 (optional, but recommended)
$conn->set_charset('utf8mb4');

?>
