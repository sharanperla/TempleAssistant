<?php
session_start();
if($_SESSION['status']==true)
{
$conn=new mysqli("localhost","root","","tadb");
 if(mysqli_Connect_error()){
     die("connection failed:");
}
if(isset($_POST['submit']))
{

  $aid=$_POST['a_id'];

  $price=$_POST['price'];
  $bookingDate=$_POST['booking_date'];
  $pdisc=$_POST['pdisc'];
  $bookingTime = $_POST['bookingType'];
 $ptype = $_POST['paymentType'];
   //Check if auditorium is available for booking
 $sql = "SELECT * FROM auditorium WHERE booking_date = '$bookingDate' AND booking_time = '$bookingTime'";
$result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) {
  
    // Auditorium is already booked, display error     
    echo "Sorry, the auditorium is not available at the selected date and time. Please select a different date and time.";
 } else {
 $_SESSION['amount']=$price;
 $_SESSION['booking_date']=$bookingDate;
 $_SESSION['bookingTime']=$bookingTime;
 $_SESSION['ptype']=$ptype;
 $_SESSION['price']=$price;
 echo "
 <script>
 window.location.href='audipaymentmode.php';
 </script>
 ";
}
}
}else{
	header('Location: adminlogin.php');
	}
    ?>
