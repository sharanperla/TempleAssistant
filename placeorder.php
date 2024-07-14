<?php
session_start();
if($_SESSION['status']==true)
{
// Initialize database connection
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}
$o_id=0;
$payment_mode =$_SESSION['spay_mode'];
$uid=$_SESSION['id'];
$sql2="SELECT MAX(o_id) as o_id FROM sevaorders";
$resulto = $conn->query($sql2);
$rowOID = $resulto->fetch_assoc();
$add=$rowOID['o_id'];
$o_id=$add+1;
 $sql = "SELECT * FROM usertable WHERE u_id ='$uid'";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
               $name = $row['name'];
               $email = $row['email'];
               $phone = $row['phone'];
               $address = $row['city'];
          }
     }
     $sql = "SELECT * FROM sevabooking WHERE u_id ='$uid'";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
               $s_name= $row['s_name'];
               $price =$row['price'];
               $s_id =$row['s_id'];
               $phname=$row['phname'];
               $nakshathra=$row['nakshathra'];
               $date=$row['date'];
               $phone_number = $phone;
               $email_id = $email;
               $address_info = $address;
                $sqlu = "INSERT INTO sevaorders (o_id,s_id, u_id, username, s_name, phone, email, address, payment_mode, price,phname,nakshathra,date,created_at)
          VALUES ('$o_id', '$s_id', '$uid','$name', '$s_name', '$phone_number', '$email_id', '$address_info', '$payment_mode','$price','$phname','$nakshathra','$date', NOW())";
          $conn->query($sqlu);
}
     if ($conn->query($sql) === false) {
          echo"error in placing order";
     }
     else{
          $sqld = "DELETE FROM sevabooking WHERE u_id='$uid'";
          $conn->query($sqld);
          $_SESSION['spay_mode']=' ';
          echo "<script>alert('Order Placed!');</script>";
          // echo "<script>window.location.href=''</script>"
          }
       } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Craftmen Hardware</title>
     <link rel="stylesheet" href="style/style.css">
     <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2713/2713537.png" type="image/x-icon">
     <style>
  body {
        font-family: Arial, sans-serif;
      }
      .container {
        border: 2px solid black;
        padding: 20px;
        margin: 50px auto;
        max-width: 800px;
      }
      h1 {
        font-size: 30px;
        text-align: center;
        margin-bottom: 50px;
      }
	  h4 {
        font-size: 15px;
        text-align: center;
        margin-bottom: 30px;
      }
      p {
        font-size: 20px;
        text-align: center;
        margin-bottom: 10px;
      }
      .name {
        font-size: 30px;
        text-align: center;
        margin-bottom: 50px;
      }
      .info {
        text-align: center;
        margin-bottom: 50px;
      }
      .signature {
        text-align: right;
        margin-top: 50px;
        font-size: 24px;
        font-weight: bold;
      }
      .signature img {
        width: 200px;
      }
      h6{
          font-size:15px;
          text-align: right;
      }
          </style>
</head>

<body>
      <?php
      if($payment_mode=='directpay'){
          $sql = "SELECT * FROM sevaorders WHERE u_id='$uid' && o_id='$o_id'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                    echo"<div class=container style='background-color:pink;'>
                    <h1>Shri Vanadurgadevi Temple Mithabettu</h1>
                     <h4>Bantwal Taluk,Pilathabettu village,Nayanadu post,<br>
                     Dakshina Kannada-574233.<h4>
                    <div class=image>
                      <img src='C:\Users\ACER\Desktop\project\WhatsApp Image 2023-03-17 at 10.40.59 AM.jpeg' width='80' height='80'/>
                    </div><div>
<h6 style='align:right;'>Date: <span id=date align=right></span></h6>
<p>This reciept is to confirm that Shree/smt<strong> " . $row['phname'] . "</strong><br>
<strong> " . $row['nakshathra'] . "</strong> Nakshatra is booked ".$row['s_name']." on the date of ". $row['date']."
and opted direct payment option of an amount of RS ".$row['price']."</p>
</div>
<div class=signature>
<img src=signature.png alt=Signature width=30 height=50>
<p>Seva Committee of Temple</p>
</div>
</div>";
                                }
                              }
                         }
                   else{
                    $sql = "SELECT * FROM sevaorders WHERE u_id='$uid' && o_id='$o_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                              echo"<div class=container style='background-color:yellow;'>
                              <h1>Shri Vanadurgadevi Temple Mithabettu</h1>
                               <h4>Bantwal Taluk,Pilathabettu village,Nayanadu post,<br>
                               Dakshina Kannada-574233.<h4>
                              <div class=image>
                                <img src='C:\Users\ACER\Desktop\project\WhatsApp Image 2023-03-17 at 10.40.59 AM.jpeg' width='80' height='80'/>
                              </div><div>
      <h6 style='align:right;'>Date: <span id=date align=right></span></h6>
        <p>Recieved with thanks from shree/smt<strong> " . $row['phname'] . "</strong><br>
        <strong> " . $row['nakshathra'] . "</strong> Nakshatra
        an amount of RS ".$row['price']." in ".$row['payment_mode']."   for ".$row['s_name']." on the date of ". $row['date']." </p>
      </div>
      <div class=signature>
        <img src=signature.png alt=Signature width=30 height=50>
        <p>Seva Committee of Temple</p>
      </div>
    </div>";

                         }
                    } else {
                         echo "No Results!";
                    }
               }
                    ?>
               <div>
                    <center>
                    <a href="generate-pdf.php?i=seva" class="add-to-cart-btn" target="_blank">Download PDF</a>
                    <!-- <a href="check out.php" class='add-to-cart-btn'>Check Out</a> -->
               </div>

          </div>
     </div>
              
<script>
		// Set the current date
		var date = new Date();
		document.getElementById("date").innerHTML = date.toLocaleDateString();
	</script>
       <?php
                    
                    $_SESSION['spay_mode']='';
          }           
else{
    header('Location: adminlogin.php');
}
?>
</body>
</html>