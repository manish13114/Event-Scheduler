<?php
ob_start();
session_start();

if ($_SESSION['name'] != 'oasis') {
    header('location: login.php');
}
?>
<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cambridge Institute Of Technology Student Attendance System</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <h3>Teacher List</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Teacher ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Email</th>
                    <th scope="col">Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $tcr_query = mysqli_query($conn, "SELECT * FROM teachers ORDER BY tc_id ASC");
                while ($tcr_data = mysqli_fetch_array($tcr_query)) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $tcr_data['tc_id']; ?></td>
                        <td><?php echo $tcr_data['tc_name']; ?></td>
                        <td><?php echo $tcr_data['tc_dept']; ?></td>
                        <td><?php echo $tcr_data['tc_email']; ?></td>
                        <td><?php echo $tcr_data['tc_course']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</center>
</body>
</html>
