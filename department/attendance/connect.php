<?php

$conn = mysqli_connect('localhost', 'root', '', 'attsystem');

if (!$conn) {
    die('Cannot connect to server: ' . mysqli_connect_error());
}

// Check if database is selected
if (!mysqli_select_db($conn, 'attsystem')) {
    die('Cannot find database: ' . mysqli_error($conn));
}

?>

