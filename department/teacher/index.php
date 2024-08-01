<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cambridge Institute Of Technology Student Attendance System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">

<style>
body {
  background-color: #f8f9fa;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #007bff;
  color: white;
  padding: 15px;
  text-align: center;
}

.navbar {
  display: flex;
  justify-content: center;
  background-color: #0056b3;
  padding: 10px;
}

.navbar a {
  color: white;
  text-decoration: none;
  padding: 10px 20px;
  margin: 0 10px;
}

.navbar a:hover {
  background-color: #003d82;
  border-radius: 5px;
}

.content {
  margin-top: 20px;
  padding: 20px;
  background-color: #ffffff;
  border: 1px solid #ced4da;
  border-radius: 5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 50%;
  text-align: center;
}

img {
  margin-top: 20px;
  border-radius: 5px;
}

</style>

</head>
<body>

<header>

  <h1>Cambridge Institute Of Technology Student Attendance System</h1>
  <div class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="teachers.php">Faculties</a>
  <a href="attendance.php">Attendance</a>
  <a href="report.php">Report</a>
  <a href="../logout.php">Logout</a>

</div>

</header>

<center>

<div class="row">
    <div class="content">
      <p>One step solution for your classroom :)</p>
    <img src="../img/tcr.png" height="200px" width="300px" />

  </div>

</div>

</center>

</body>
</html>
