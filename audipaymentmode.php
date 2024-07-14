<html>
<?php
session_start();
include 'pmodelayout.html';
?>

<body>
     <?php
     $conn = new mysqli("localhost", "root", "", "tadb");
     if (mysqli_Connect_error()) {
          die("connection failed:");
     }
          $bookingDate = $_SESSION["audibookingDate"];
          $btime=$_SESSION['bookingTime'];


          $sql = "select * from auditorium where booking_date='$bookingDate' AND booking_time='$btime'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
               echo "<script>alert('sorry the auditorium is allready booked on selected date!')</script>";
               $_SESSION['audibookingtime'] = '';
               $_SESSION['audipaymentType'] = '';
               $_SESSION['aprice'] = '';

               echo "<script>window.location.href='auditorium.php'</script>";
          }
          $_SESSION['audibookingDate'] = $bookingDate;
          
     ?>
     <form action="audipaymentmode.php" id="payment-form" method="POST">
          <h1>Select your payment mode</h1>
          <div>
               <input type="radio" name="payment_mode" value="upiPayment" checked>UPI Payment
          </div>
          <div>
               <input type="radio" name="payment_mode" value="creditCard">Bank Transfer
          </div>
          <button type="submit" value="Submit" name="submode">Submit</button>
          <a href=viewcart.php>back</a>
     </form>

     <?php
     if (isset($_POST['submode'])) {
          $payment_mode = $_POST['payment_mode'];
          if ($payment_mode == "upiPayment") {
               echo "<script>window.location.href='audiupipayment.php'</script>";
          } elseif ($payment_mode == "creditCard") {
               header("Location: audicreditcard.php");
          }
     }
     ?>
</body>

</html>