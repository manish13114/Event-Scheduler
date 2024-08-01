<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>


<?php

//establishing connection
include('connect.php');

  try{

    //validation of empty fields
      if(isset($_POST['signup'])){

        //insertion of data to database table admininfo
        $result = mysqli_query($conn, "insert into departments(title,category,expect,extr,date) values('".$_POST["title"]."','".$_POST["category"]."','".$_POST["expect"]."','".$_POST["extr"]."','".$_POST["date"]."')");
        $success_msg="Event Added Successfully!";

  
  }
}
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">
<!-- head started -->
<head>
<title>Cambridge Institute Of Technology Event Scheduler</title>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="../css/main.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">

body {
  background-color: #f8f9fa;
  font-family: Arial, sans-serif;
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

.message {
  padding: 10px;
  font-size: 15px;
  font-weight: bold;
  color: #333;
  background-color: #e9ecef;
  border: 1px solid #ced4da;
  border-radius: 5px;
  margin-bottom: 20px;
  width: 50%;
  text-align: center;
}

.content {
  margin-top: 20px;
}

.form-horizontal {
  background-color: #ffffff;
  padding: 20px;
  border: 1px solid #ced4da;
  border-radius: 5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group label {
  font-weight: bold;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #004085;
}

.row, .rowtwo {
  margin-top: 20px;
}

</style>
</head>
<!-- head ended -->

<!-- body started -->
<body>

  <!-- Menus started-->
  <header>
    <h1>Cambridge Institute Of Technology Event Scheduler</h1>
    <div class="navbar">
      <!-- <a href="signup.php">Create Users</a> -->
      <a href="index.php">Add Data</a>
      <a href="../../index.html">Logout</a>
    </div>
  </header>
  <!-- Menus ended -->

<center>
<!-- Error or Success Message printint started -->
<div class="message">
        <?php if(isset($success_msg)) echo $success_msg; if(isset($error_msg)) echo $error_msg; ?>
</div>
<!-- Error or Success Message printint ended -->

<!-- Content, Tables, Forms, Texts, Images started -->




  <div class="row" id="student">
    <form action="#" method="post" class="form-horizontal col-md-6 col-md-offset-3" name="signup">
      <h4>Add Event Information</h4>
      <?php
    if(isset($success_msg)) echo $success_msg;
    if(isset($error_msg)) echo $error_msg;
     ?>
      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Event Title</label>
          <div class="col-sm-7">
            <input type="text" name="title"  class="form-control" id="input1" placeholder="Title Name" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Event Category</label>
          <div class="col-sm-7">
            <input type="text" name="category"  class="form-control" id="input1" placeholder="Event Category" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Expected Participation</label>
          <div class="col-sm-7">
            <input type="text" name="expect"  class="form-control" id="input1" placeholder="Expected Participation" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">External Participation</label>
          <div class="col-sm-7">
            <input type="text" name="extr"  class="form-control" id="input1" placeholder="External Participation" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Event date</label>
          <div class="col-sm-7">
            <input type="date" name="date"  class="form-control" id="input1" placeholder="Event Date" />
          </div>
      </div>

      
      <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Add Detail's" name="signup" />
    </form>
  </div>

</div><br>
<!-- Contents, Tables, Forms, Images ended -->
</center>
</body>
<!-- Body ended  -->
</html>
