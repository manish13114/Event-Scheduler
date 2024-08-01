<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <!-- <style>
        body{
            background-color:#FFFDD0 ;
            color: black;
            
        }
        table{
            border-color: white;
        }
    </style> -->
</head>
<body >
    
</body>
</html>


<?php
include ("connection.php");
error_reporting(0);

$query = "SELECT * FROM event_detail";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
<table border="3" cellspacing="7" width="85%" >
    <tr>
    <th >Event_Name</th>
    <th>Event_Date</th>
    </tr>
<style>
    td{
        text-align: center;
    }
</style>


    <?php
    // Loop through all rows to get each record
    while ($result = mysqli_fetch_assoc($data)) {
       echo" <tr>
       <td>".$result['Event_Name']."</td>
       <td>".$result['Event_Date']."</td><br>
       </tr>
        ";
    }
    echo "Table has these records";
} else {
    echo "Table has no record";
}

?>
</table>

<!-- echo $result['Event_Name'] . " " . $result['Event_Date']. " <br>" ; -->