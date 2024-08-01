<?php
ob_start();
session_start();

if ($_SESSION['name'] != 'oasis') {
    header('location: login.php');
    exit();
}

include('connect.php');
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
        <div class="container">
            <h1 class="text-center">Cambridge Institute Of Technology Student Attendance System</h1>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="students.php">Students</a></li>
                        <li><a href="teachers.php">Faculties</a></li>
                        <li><a href="attendance.php">Attendance</a></li>
                        <li><a href="report.php">Report</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Individual Report Form -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Individual Report</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label>Select Report Type</label>
                                <select class="form-control" name="report_type">
                                    <option value="individual">Individual Report</option>
                                    <option value="monthly_individual">Monthly Individual Report</option>
                                    <option value="percentage">Percentage Report</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Subject</label>
                                <select class="form-control" name="whichcourse">
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
                            <div class="form-group">
                                <label>Student USN No.</label>
                                <input type="text" class="form-control" name="sr_id" placeholder="Enter Student USN">
                            </div>
                            <div class="form-group" id="month_selector" style="display: none;">
                                <label>Select Month</label>
                                <input type="month" class="form-control" name="report_month">
                            </div>
                            <input type="submit" class="btn btn-primary" name="sr_btn" value="Go!">
                        </form>

                        <?php
                        if (isset($_POST['sr_btn'])) {
                            $sr_id = $_POST['sr_id'];
                            $course = $_POST['whichcourse'];
                            $report_type = $_POST['report_type'];
                            $month = isset($_POST['report_month']) ? $_POST['report_month'] : null;

                            if ($report_type == 'individual') {
                                $stmt1 = $conn->prepare("SELECT COUNT(*) as countP FROM attendance WHERE stat_id = ? AND course = ? AND st_status = 'Present'");
                                $stmt1->bind_param("ss", $sr_id, $course);
                                $stmt1->execute();
                                $result1 = $stmt1->get_result();
                                $data1 = $result1->fetch_assoc();
                                $countP = $data1['countP'];

                                $stmt2 = $conn->prepare("SELECT COUNT(*) as countT FROM attendance WHERE stat_id = ? AND course = ?");
                                $stmt2->bind_param("ss", $sr_id, $course);
                                $stmt2->execute();
                                $result2 = $stmt2->get_result();
                                $data2 = $result2->fetch_assoc();
                                $countT = $data2['countT'];
                                ?>
                                <div class="panel panel-default mt-4">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Individual Report Summary</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Student USN No:</td>
                                                    <td><?php echo $sr_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Class (Days):</td>
                                                    <td><?php echo $countT; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Present (Days):</td>
                                                    <td><?php echo $countP; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Absent (Days):</td>
                                                    <td><?php echo $countT - $countP; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                            } elseif ($report_type == 'monthly_individual') {
                                $stmt = $conn->prepare("SELECT COUNT(*) as countP FROM attendance WHERE stat_id = ? AND course = ? AND DATE_FORMAT(stat_date, '%Y-%m') = ? AND st_status = 'Present'");
                                $stmt->bind_param("sss", $sr_id, $course, $month);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $data = $result->fetch_assoc();
                                $countP = $data['countP'];

                                $stmt2 = $conn->prepare("SELECT COUNT(*) as countT FROM attendance WHERE stat_id = ? AND course = ? AND DATE_FORMAT(stat_date, '%Y-%m') = ?");
                                $stmt2->bind_param("sss", $sr_id, $course, $month);
                                $stmt2->execute();
                                $result2 = $stmt2->get_result();
                                $data2 = $result2->fetch_assoc();
                                $countT = $data2['countT'];
                                ?>
                                <div class="panel panel-default mt-4">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Monthly Individual Report Summary</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Student USN No:</td>
                                                    <td><?php echo $sr_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Month:</td>
                                                    <td><?php echo $month; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Class (Days):</td>
                                                    <td><?php echo $countT; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Present (Days):</td>
                                                    <td><?php echo $countP; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Absent (Days):</td>
                                                    <td><?php echo $countT - $countP; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                            } elseif ($report_type == 'percentage') {
                                $stmt = $conn->prepare("SELECT COUNT(*) as countP FROM attendance WHERE stat_id = ? AND course = ? AND st_status = 'Present'");
                                $stmt->bind_param("ss", $sr_id, $course);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $data = $result->fetch_assoc();
                                $countP = $data['countP'];

                                $stmt2 = $conn->prepare("SELECT COUNT(*) as countT FROM attendance WHERE stat_id = ? AND course = ?");
                                $stmt2->bind_param("ss", $sr_id, $course);
                                $stmt2->execute();
                                $result2 = $stmt2->get_result();
                                $data2 = $result2->fetch_assoc();
                                $countT = $data2['countT'];

                                $percentage = ($countT > 0) ? ($countP / $countT) * 100 : 0;
                                ?>
                                <div class="panel panel-default mt-4">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Percentage Report Summary</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Student USN No:</td>
                                                    <td><?php echo $sr_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Class (Days):</td>
                                                    <td><?php echo $countT; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Present (Days):</td>
                                                    <td><?php echo $countP; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Absent (Days):</td>
                                                    <td><?php echo $countT - $countP; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Attendance Percentage:</td>
                                                    <td><?php echo number_format($percentage, 2); ?>%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Mass Report Form -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mass Report</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label>Select Report Type</label>
                                <select class="form-control" name="report_type_mass">
                                    <option value="mass">Mass Report</option>
                                    <option value="monthly_mass">Monthly Mass Report</option>
                                    <option value="high_percentage">High Percentage Report</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Subject</label>
                                <select class="form-control" name="course">
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
                            <div class="form-group">
                                <label>Minimum Attendance Percentage</label>
                                <input type="number" class="form-control" name="min_percentage" placeholder="Enter Minimum Percentage" step="0.01" min="0" max="100">
                            </div>
                            <div class="form-group" id="month_selector_mass" style="display: none;">
                                <label>Select Month</label>
                                <input type="month" class="form-control" name="report_month_mass">
                            </div>
                            <input type="submit" class="btn btn-primary" name="sr_mass" value="Go!">
                        </form>

                        <?php
                        if (isset($_POST['sr_mass'])) {
                            $course = $_POST['course'];
                            $report_type_mass = $_POST['report_type_mass'];
                            $month_mass = isset($_POST['report_month_mass']) ? $_POST['report_month_mass'] : null;
                            $min_percentage = isset($_POST['min_percentage']) ? $_POST['min_percentage'] : null;

                            if ($report_type_mass == 'mass') {
                                $stmt = $conn->prepare("SELECT stat_id, COUNT(*) as total_classes, SUM(CASE WHEN st_status = 'Present' THEN 1 ELSE 0 END) as total_present FROM attendance WHERE course = ? GROUP BY stat_id");
                                $stmt->bind_param("s", $course);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                echo "<table class='table table-striped mt-4'>
                                        <thead>
                                            <tr>
                                                <th>Student USN No</th>
                                                <th>Total Classes</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                                <th>Percentage</th>
                                            </tr>
                                        </thead>
                                        <tbody>";

                                while ($row = $result->fetch_assoc()) {
                                    $total_classes = $row['total_classes'];
                                    $total_present = $row['total_present'];
                                    $total_absent = $total_classes - $total_present;
                                    $percentage = ($total_classes > 0) ? ($total_present / $total_classes) * 100 : 0;

                                    echo "<tr>
                                            <td>{$row['stat_id']}</td>
                                            <td>{$total_classes}</td>
                                            <td>{$total_present}</td>
                                            <td>{$total_absent}</td>
                                            <td>" . number_format($percentage, 2) . "%</td>
                                        </tr>";
                                }

                                echo "</tbody>
                                    </table>";
                            } elseif ($report_type_mass == 'monthly_mass') {
                                $stmt = $conn->prepare("SELECT stat_id, COUNT(*) as total_classes, SUM(CASE WHEN st_status = 'Present' THEN 1 ELSE 0 END) as total_present FROM attendance WHERE course = ? AND DATE_FORMAT(stat_date, '%Y-%m') = ? GROUP BY stat_id");
                                $stmt->bind_param("ss", $course, $month_mass);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                echo "<table class='table table-striped mt-4'>
                                        <thead>
                                            <tr>
                                                <th>Student USN No</th>
                                                <th>Total Classes</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                                <th>Percentage</th>
                                            </tr>
                                        </thead>
                                        <tbody>";

                                while ($row = $result->fetch_assoc()) {
                                    $total_classes = $row['total_classes'];
                                    $total_present = $row['total_present'];
                                    $total_absent = $total_classes - $total_present;
                                    $percentage = ($total_classes > 0) ? ($total_present / $total_classes) * 100 : 0;

                                    echo "<tr>
                                            <td>{$row['stat_id']}</td>
                                            <td>{$total_classes}</td>
                                            <td>{$total_present}</td>
                                            <td>{$total_absent}</td>
                                            <td>" . number_format($percentage, 2) . "%</td>
                                        </tr>";
                                }

                                echo "</tbody>
                                    </table>";
                            } elseif ($report_type_mass == 'high_percentage') {
                              if ($month_mass && $min_percentage !== null) {
                                  // Adjust column names as per your database schema
                                  $stmt = $conn->prepare("
                                      SELECT 
                                          a.stat_id, 
                                          s.st_name AS st_name, 
                                          COUNT(*) AS total_classes, 
                                          SUM(CASE WHEN a.st_status = 'Present' THEN 1 ELSE 0 END) AS total_present 
                                      FROM attendance a
                                      JOIN students s ON a.stat_id = s.st_id
                                      WHERE a.course = ? 
                                      AND DATE_FORMAT(a.stat_date, '%Y-%m') = ? 
                                      GROUP BY a.stat_id
                                      HAVING (total_classes > 0 AND (total_present / total_classes) * 100 >= ?)
                                  ");
                                  $stmt->bind_param("sss", $course, $month_mass, $min_percentage);
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                          
                                  echo "<table class='table table-striped mt-4'>
                                          <thead>
                                              <tr>
                                                  <th>Student Name</th>
                                                  <th>Student USN No</th>
                                                  <th>Total Classes</th>
                                                  <th>Present</th>
                                                  <th>Absent</th>
                                                  <th>Percentage</th>
                                              </tr>
                                          </thead>
                                          <tbody>";
                          
                                  while ($row = $result->fetch_assoc()) {
                                      $total_classes = $row['total_classes'];
                                      $total_present = $row['total_present'];
                                      $total_absent = $total_classes - $total_present;
                                      $percentage = ($total_classes > 0) ? ($total_present / $total_classes) * 100 : 0;
                          
                                      echo "<tr>
                                              <td>{$row['st_name']}</td>
                                              <td>{$row['stat_id']}</td>
                                              <td>{$total_classes}</td>
                                              <td>{$total_present}</td>
                                              <td>{$total_absent}</td>
                                              <td>" . number_format($percentage, 2) . "%</td>
                                          </tr>";
                                  }
                          
                                  echo "</tbody>
                                      </table>";
                              } else {
                                  echo "<p>Please provide both month and minimum percentage.</p>";
                              }
                          }
                          
                          
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select[name="report_type"]').change(function () {
                if ($(this).val() == 'monthly_individual') {
                    $('#month_selector').show();
                } else {
                    $('#month_selector').hide();
                }
            });

            $('select[name="report_type_mass"]').change(function () {
                if ($(this).val() == 'monthly_mass' || $(this).val() == 'high_percentage') {
                    $('#month_selector_mass').show();
                } else {
                    $('#month_selector_mass').hide();
                }
            });
        });
    </script>
</body>

</html>
