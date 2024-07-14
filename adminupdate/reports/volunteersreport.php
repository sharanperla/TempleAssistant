<html>
    <style>
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
$sql="SELECT v_title,v_disc, count(id) AS total_people,v_date FROM registeredvolunteers WHERE DATE_FORMAT(created_at, '%m') = '$current_month' AND DATE_FORMAT(created_at, '%Y') = '$current_year' GROUP BY v_id";
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
  <h1>Volunteer activity Report - <?php echo date('F Y'); ?></h1>
  <table>
    
      <tr>
        <th>Activity Name</th>
        <th>date</th>
        <th>Discription</th>
        <th>Number of People</th>
       
      </tr>
      <?php $sum=0;
       while($row = $result->fetch_assoc()) { 
        $tt=$row["total_people"];
        $sum+=$tt;?>
        <tr>
          <td><?php echo $row["v_title"]; ?></td>
          <td><?php echo $row["v_date"]; ?></td>
          <td><?php echo $row["v_disc"]; ?></td>
          <td><?php echo $row["total_people"];?></td>
                
        </tr>
      <?php } ?>
    
    <tr><td colspan=4>total number of volunteers registered=<?php echo"$sum"; ?></td></tr>
      
  </table>
</body>
</html>
