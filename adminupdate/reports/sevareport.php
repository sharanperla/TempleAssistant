<html>
    <style>
        table{
            width:90%;
        }
         th {
          font-family: "Poppins";
          padding: 15px 0;
          background-color: red;
          color: white;
          text-align: center;
     }

     tr td {
          text-align: center;
          padding: 15px 0;
          font-weight: 500;
     }

     tr:nth-of-type(even) {
          background-color: #ffbd86;
     }
     tr:nth-of-type(odd) {
          background-color: orange;
     }

        </style>
    
        <?php

$conn=new mysqli("localhost","root","","tadb");
		if(mysqli_Connect_error()){
			die("connection failed:");
		}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the current month and year
$current_month = date('m');
$current_year = date('Y');

// Query the seva bookings for the current month
// $sql = "SELECT * FROM sevaorders WHERE DATE_FORMAT(created_at, '%m') = '$current_month' AND DATE_FORMAT(created_at, '%Y') = '$current_year'";
$sql="SELECT s_name, count(o_id) AS total_people,sum(price) AS amount FROM sevaorders WHERE DATE_FORMAT(created_at, '%m') = '$current_month' AND DATE_FORMAT(created_at, '%Y') = '$current_year' GROUP BY s_id";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!-- Display the seva bookings for the current month on a webpage -->
<!DOCTYPE html>
<html>
<head>
  <title>My Temple Website Seva Bookings Report</title>
</head>
<body>
    <center>
  <h1>Seva Bookings Report - <?php echo date('F Y'); ?></h1>
  <table>
    
      <tr>
        <th>Seva NAME</th>
        <th>Number of People</th>
        <th>total amount</th>
      </tr>
      <?php $sum=0;
       while($row = $result->fetch_assoc()) { 
        $price=$row["amount"];
        $sum += $price ?>
        <tr>
          <td><?php echo $row["s_name"]; ?></td>
          <td><?php echo $row["total_people"]; ?></td>

          <td><?php echo $row["amount"]; ?></td>
        </tr>
      <?php } ?>
    
    <tr colspan=3><td colspan=3>totalamount=₹<?php echo"$sum"; ?></td></tr>
      
  </table>
</body>
</html>
