<?php
ob_start();
session_start();

// Check if user is logged in
if (!isset($_SESSION['name']) || $_SESSION['name'] != 'oasis') {
    header('Location: login.php');
    exit;
}

// Include database connection
include('connect.php');  // Make sure this file properly connects to your MySQL database

// Initialize variables
$sr_id = '';
$whichcourse = '';

// Handle form submission
if (isset($_POST['sr_btn'])) {
    // Sanitize inputs
    $sr_id = mysqli_real_escape_string($conn, $_POST['sr_id']);
    $whichcourse = mysqli_real_escape_string($conn, $_POST['whichcourse']);

    // Query to get attendance data
    $query = "SELECT stat_id, COUNT(*) as countP FROM attendance WHERE stat_id='$sr_id' AND course='$whichcourse' AND st_status='Present'";
    $result = mysqli_query($conn, $query);

    // Query to get total attendance days
    $total_query = "SELECT COUNT(*) as countT FROM attendance WHERE stat_id='$sr_id' AND course='$whichcourse'";
    $total_result = mysqli_query($conn, $total_query);
    $count_tot = 0;

    if ($total_result) {
        $total_data = mysqli_fetch_assoc($total_result);
        $count_tot = $total_data['countT'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambridge Institute Of Technology Student Attendance System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Cambridge Institute Of Technology Student Attendance System</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="students.php">Students</a></li>
                <li class="active"><a href="report.php">My Report</a></li>
                <li><a href="account.php">My Account</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Student Report</h3>
            <br>
            <form method="post" action="" class="form-horizontal">
                <div class="form-group">
                    <label for="input1" class="col-sm-3 control-label">Select Subject</label>
                    <div class="col-sm-9">
                        <select name="whichcourse" id="input1" class="form-control">
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
                </div>
                <div class="form-group">
                    <label for="input2" class="col-sm-3 control-label">Your USN No.</label>
                    <div class="col-sm-9">
                        <input type="text" name="sr_id" class="form-control" id="input2" placeholder="Enter your usn no." value="<?php echo htmlspecialchars($sr_id); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input type="submit" class="btn btn-primary" value="Go!" name="sr_btn">
                    </div>
                </div>
            </form>

            <?php if (isset($result)): ?>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <table class="table table-striped">
                        <tbody>
                        <?php while ($data = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>USN No.: </td>
                                <td><?php echo htmlspecialchars($data['stat_id']); ?></td>
                            </tr>
                            <tr>
                                <td>Total Class (Days): </td>
                                <td><?php echo htmlspecialchars($count_tot); ?></td>
                            </tr>
                            <tr>
                                <td>Present (Days): </td>
                                <td><?php echo htmlspecialchars($data['countP']); ?></td>
                            </tr>
                            <tr>
                                <td>Absent (Days): </td>
                                <td><?php echo htmlspecialchars($count_tot - $data['countP']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No attendance records found for the selected criteria.</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
