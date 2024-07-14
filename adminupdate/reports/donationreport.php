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
// Connect to your database and query the total amount of donations received
$conn=new mysqli("localhost","root","","tadb");
		if(mysqli_Connect_error()){
			die("connection failed:");
		}
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$current_month = date('m');
$current_year = date('Y');
// Query the total amount of donations received
$sql = "SELECT title, count(id) AS count,sum(amount) AS amount FROM donations WHERE DATE_FORMAT(created_at, '%m') = '$current_month' AND DATE_FORMAT(created_at, '%Y') = '$current_year' GROUP BY d_id ";
$result = $conn->query($sql);

$sum=0;

$conn->close();
?>

<!-- Display the total number of donations received on a webpage -->
<!DOCTYPE html>
<html>
<head>
  <title>My Temple Website Report</title>
</head>
<body>
<h1>Donation Report - <?php echo date('F Y'); ?></h1>
<table>
<tr>
        <th>Title</th>
        <th>Number of donations</th>
        <th>total amount</th>
      </tr>
      <?php $sum=0;
       while($row = $result->fetch_assoc()) { 
        $price=$row["amount"];
        $sum += $price ?>
        <tr>
          <td><?php echo $row["title"]; ?></td>
          <td><?php echo $row["count"]; ?></td>

          <td><?php echo $row["amount"]; ?></td>
        </tr>
      <?php } ?>
     <tr> <td colspan=3>Total Donations Received in this month: ₹<?php echo $sum; ?></td></tr>
       </table>

</body>
</html>
