<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event-scheduler";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    echo "Connection successfull";
} else {
    echo "connection failed";
}




?>