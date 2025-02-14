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
</head>
<body>

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

<center>

<div class="row">
  <div class="content">
    <h3>Student List</h3>
    <br>

   <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Batch</label>
            <div class="col-sm-7">
                <input type="text" name="sr_batch" class="form-control" id="input1" placeholder="Only 2021" />
            </div>
      </div>
      <input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Go!" name="sr_btn" />
   </form>

   <div class="content"></div>
    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">USN no.</th>
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
     $all_query = $conn->query("SELECT * FROM students WHERE st_batch = '$srbatch' ORDER BY st_id ASC");
     while ($data = $all_query->fetch_assoc()) {
       $i++;
     ?>
     <tr>
       <td><?php echo htmlspecialchars($data['st_id']); ?></td>
       <td><?php echo htmlspecialchars($data['st_name']); ?></td>
       <td><?php echo htmlspecialchars($data['st_dept']); ?></td>
       <td><?php echo htmlspecialchars($data['st_batch']); ?></td>
       <td><?php echo htmlspecialchars($data['st_sem']); ?></td>
       <td><?php echo htmlspecialchars($data['st_email']); ?></td>
     </tr>
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
