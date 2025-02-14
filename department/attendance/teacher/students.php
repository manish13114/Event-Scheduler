<?php

ob_start();
session_start();

if (!isset($_SESSION['name']) || $_SESSION['name'] != 'oasis') {
    header('location: login.php');
    exit();
}

include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cambridge Institute Of Technology Student Attendance System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="styles.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <h3>Student List</h3>
        <br>
        <form method="post" action="">
            <label>Batch (ex. 2021)</label>
            <input type="text" name="sr_batch">
            <input type="submit" name="sr_btn" value="Go!" >
        </form>
        <br>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th scope="col">USN No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>

            <?php
            if (isset($_POST['sr_btn'])) {
                $srbatch = mysqli_real_escape_string($conn, $_POST['sr_batch']);
                $i = 0;

                $all_query = mysqli_query($conn, "SELECT * FROM students WHERE students.st_batch = '$srbatch' ORDER BY st_id ASC");

                while ($data = mysqli_fetch_array($all_query)) {
                    $i++;
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['st_id']; ?></td>
                            <td><?php echo $data['st_name']; ?></td>
                            <td><?php echo $data['st_dept']; ?></td>
                            <td><?php echo $data['st_batch']; ?></td>
                            <td><?php echo $data['st_sem']; ?></td>
                            <td><?php echo $data['st_email']; ?></td>
                        </tr>
                    </tbody>
                    <?php 
                }
            }
            ?>
        </table>
    </div>
</div>
</center>

</body>
</html>
