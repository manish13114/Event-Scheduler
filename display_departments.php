<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
        body{
            background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
            /* color: black; */
            
        }
        table{
            border-color: white;
            background: #fff;
        }
        th {
            text-align:center;
        }
        .container-fluid {
            padding: 10px;
        }

        .input-container {
            display: flex;
            align-items: center;
            justify-content: center; 
            padding: 15px;
        }

        .input-container input {
            padding: 10px 15px;
            border: none;
            border-bottom: solid 2px #009988;
            border-radius: 8px;
            width: 80%;
            outline: none;
            /* box-shadow: 1px 1px 1px #ebebeb; */
        }

        .input-container input:hover {
            border-bottom: solid 2px #000;
        }
    </style>
</head>
<body >
    
</body>
</html>


<?php
include ("connection.php");
error_reporting(0);

$query = "SELECT * FROM departments";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <div class="container-fluid">
        <div class="input-container">

            <input id="myInput" type="text" placeholder="Search..">
        </div>
        <table border="3" cellspacing="7" width="85%" class="table table-striped">
            <tr>
            <th>Event Title</th>
            <th>Category</th>
            <th>Expected Participation</th>
            <th>External Participation</th>
            <th>Event Date</th>
            </tr>
        <style>
            td{
                text-align: center;
            }
        </style>
        
        <tbody  id="myTable">
            <?php
            // Loop through all rows to get each record
            while ($result = mysqli_fetch_assoc($data)) {
               echo" <tr>
               <td>".$result['title']."</td>
               <td>".$result['category']."</td>
               <td>".$result['expect']."</td>
               <td>".$result['extr']."</td>
               <td>".$result['date']."</td>
               </tr>
                ";
            }
            // echo "Table has these records";
        } else {
            echo "Table has no record";
        }
        
        ?>
        </tbody>
        </table>
    </div>

<!-- echo $result['Event_Name'] . " " . $result['Event_Date']. " <br>" ; -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>