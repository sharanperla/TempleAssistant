<?php
echo"hi";
if(isset($_POST['dash-btn'])){
  
  $v_id = $_POST["v_id"];
  $status = $_POST["status"];
  echo"$v_id";
  echo"$status";

  // Update the order status in the database
  $conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
	die("connection failed:");
}

  $sql1 = "UPDATE volunteer SET status='$status' WHERE v_id='$v_id'";
  $sql = "UPDATE registeredvolunteers SET status='$status' WHERE v_id='$v_id'";
  $result = $conn->query($sql1);
  $conn->query($sql);
  if ($result) {
    echo "<script>alert('updated!')</script>";
    echo "<script>window.location.href='volunteer.php'</script>";
  } else {
    echo "Error updating status: " . $conn->error;
  }

//   // Update the estimated delivery date based on the order status
//   $estimated_delivery_date = date('Y-m-d'); // Default estimated delivery date is current date
//   if ($order_status == "pending") {
//     $estimated_delivery_date = date('Y-m-d', strtotime('+4 days')); 
//   }else  if ($order_status == "processing") {
//     $estimated_delivery_date = date('Y-m-d', strtotime('+3 days'));
//   } else if ($order_status == "dispatched") {
//     $estimated_delivery_date = date('Y-m-d', strtotime('+2 days'));
//   } else if ($order_status == "delivered") {
//     $estimated_delivery_date = "already delivred";
//   }

//   // Update the estimated delivery date in the database
//   $sql = "UPDATE orders SET estimatedate = '$estimated_delivery_date' WHERE o_id = '$order_id'";
//   if ($conn->query($sql) === TRUE) {
//     echo "Estimated delivery date updated successfully.";
//   } else {
//     echo "Error updating estimated delivery date: " . $conn->error;
//   }

  // Close the database connection
  $conn->close();
}
?>
