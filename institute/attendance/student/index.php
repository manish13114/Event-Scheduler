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

<!-- head started -->
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

.navbar a {
  color: white;
  text-decoration: none;
  padding: 10px 15px;
  display: inline-block;
}

.navbar a:hover {
  background-color: #0056b3;
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
<!-- head ended -->

<!-- body started -->
<body>

<!-- Menus started-->
<header>

  <h1>Cambridge Institute Of Technology Student Attendance System</h1>
  <div class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="report.php">My Report</a>
  <a href="account.php">My Account</a>
  <a href="../logout.php">Logout</a>

</div>

</header>
<!-- Menus ended -->

<center>

<!-- Content, Tables, Forms, Texts, Images started -->
<div class="row">
    <div class="content">
      <p>Be attentive and be regular :)</p>
    <img src="../img/tcr.png" height="200px" width="300px" />

  </div>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>

</body>
<!-- Body ended  -->

</html>
