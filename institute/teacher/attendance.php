<?php

ob_start();
session_start();

if (!isset($_SESSION['name']) || $_SESSION['name'] != 'oasis') {
    header('location: login.php');
    exit();
}

include('connect.php');

try {
    if (isset($_POST['att'])) {
        $course = $_POST['whichcourse'];
        $dp = date('Y-m-d');

        foreach ($_POST['st_status'] as $i => $st_status) {
            $stat_id = $_POST['stat_id'][$i];
            
            $query = "INSERT INTO attendance(stat_id, course, st_status, stat_date) 
                      VALUES ('$stat_id', '$course', '$st_status', '$dp')";
            if (!mysqli_query($conn, $query)) {
                throw new Exception('Error: ' . mysqli_error($conn));
            }
        }

        $att_msg = "Attendance Recorded.";
    }
} catch (Exception $e) {
    $error_msg = $e->getMessage();
}

?>

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

<style type="text/css">
  .status {
    font-size: 10px;
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
    <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
    <br>
    <center><p><?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?></p></center>
    <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
      <div class="form-group">
        <label>Enter Batch</label>
        <input type="text" name="whichbatch" id="input2" placeholder="2021">
      </div>
      <input type="submit" class="btn btn-primary col-md-2 col-md-offset-5" value="Show!" name="batch" />
    </form>

    <div class="content"></div>
    <form action="" method="post">
      <div class="form-group">
        <label>Select Subject</label>
        <select name="whichcourse" id="input1">
          <option value="algo">Analysis of Algorithms</option>
          <option value="algolab">Analysis of Algorithms Lab</option>
          <option value="dbms">Database Management System</option>
          <option value="dbmslab">Database Management System Lab</option>
          <option value="weblab">Web Programming Lab</option>
          <option value="os">Operating System</option>
          <option value="oslab">Operating System Lab</option>
          <option value="obm">Object Based Modeling</option>
          <option value="softcomp">Soft Computing</option>
        </select>
      </div>

      <table class="table table-stripped">
        <thead>
          <tr>
            <th scope="col">USN No.</th>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Batch</th>
            <th scope="col">Semester</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
          </tr>
        </thead>

        <?php
        if (isset($_POST['batch'])) {
            $batch = mysqli_real_escape_string($conn, $_POST['whichbatch']);
            $radio = 0;

            $all_query = mysqli_query($conn, "SELECT * FROM students WHERE st_batch='$batch' ORDER BY st_id ASC");

            while ($data = mysqli_fetch_array($all_query)) {
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
                    <td><?php echo $data['st_name']; ?></td>
                    <td><?php echo $data['st_dept']; ?></td>
                    <td><?php echo $data['st_batch']; ?></td>
                    <td><?php echo $data['st_sem']; ?></td>
                    <td><?php echo $data['st_email']; ?></td>
                    <td>
                      <label>Absent</label>
                      <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent">
                      <label>Present </label>
                      <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" checked>
                    </td>
                  </tr>
                </tbody>
                <?php
                $radio++;
            }
        }
        ?>
      </table>

      <center><br>
      <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Save!" name="att" />
      </center>
    </form>
  </div>
</div>
</center>

</body>
</html>
