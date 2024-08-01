<?php
ob_start();
session_start();

// Check if the session is valid
if ($_SESSION['name'] != 'oasis') {
    header('location: ../login.php');
    exit; // Ensure no further execution after redirect
}

// Include the improved database connection script using MySQLi
include('connect.php');

$success_msg = '';
$error_msg = '';

try {
    // Checking form data and empty fields
    if (isset($_POST['done'])) {
        if (empty($_POST['name'])) {
            throw new Exception("Name cannot be empty");
        }
        if (empty($_POST['dept'])) {
            throw new Exception("Department cannot be empty");
        }
        if (empty($_POST['batch'])) {
            throw new Exception("Batch cannot be empty");
        }
        if (empty($_POST['email'])) {
            throw new Exception("Email cannot be empty");
        }

        // Initializing the student id
        $sid = $_POST['id'];

        // Updating student's information in the database table "students"
        $query = "UPDATE students SET st_name=?, st_dept=?, st_batch=?, st_sem=?, st_email=? WHERE st_id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $_POST['name'], $_POST['dept'], $_POST['batch'], $_POST['semester'], $_POST['email'], $sid);

        if ($stmt->execute()) {
            $success_msg = 'Updated successfully';
        } else {
            throw new Exception("Error updating record: " . $conn->error);
        }
    }
} catch (Exception $e) {
    $error_msg = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambridge Institute Of Technology Student Attendance System</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="styles.css">
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
            <h3>Update Account</h3>
            <br>

            <!-- Error or Success Message printing -->
            <?php if (!empty($success_msg) || !empty($error_msg)): ?>
                <p><?php echo $success_msg . $error_msg; ?></p>
            <?php endif; ?>

            <br>

            <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="input1" class="col-sm-3 control-label">USN No.</label>
                    <div class="col-sm-7">
                        <input type="text" name="sr_id" class="form-control" id="input1"
                               placeholder="enter your usn no. to continue"/>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Go!" name="sr_btn"/>
            </form>

            <div class="content"></div>

            <?php
            if (isset($_POST['sr_btn'])) {
                // Initialize student ID from form data
                $sr_id = $_POST['sr_id'];

                // Searching student information respecting the particular ID using prepared statement
                $query = "SELECT * FROM students WHERE st_id=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $sr_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($data = $result->fetch_assoc()) {
                        ?>
                        <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
                            <table class="table table-striped">
                                <tr>
                                    <td>USN No.:</td>
                                    <td><?php echo $data['st_id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Student's Name:</td>
                                    <td><input type="text" name="name" value="<?php echo $data['st_name']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Department:</td>
                                    <td><input type="text" name="dept" value="<?php echo $data['st_dept']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Batch:</td>
                                    <td><input type="text" name="batch" value="<?php echo $data['st_batch']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Semester:</td>
                                    <td><input type="text" name="semester" value="<?php echo $data['st_sem']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="text" name="email" value="<?php echo $data['st_email']; ?>"></td>
                                </tr>
                                <input type="hidden" name="id" value="<?php echo $sr_id; ?>">
                                <tr>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-primary col-md-3 col-md-offset-7"
                                               value="Update" name="done"/></td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    }
                } else {
                    echo "No student found with this registration number.";
                }
            }
            ?>
        </div>
    </div>
</center>

</body>
</html>
