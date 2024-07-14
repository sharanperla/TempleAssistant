<?php
session_start();
if($_SESSION['status']==true)
{
  
include './components/nav.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Your Cart</title>
     <link rel="stylesheet" href="style/style.css">
     <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/891/891462.png" type="image/x-icon">
</head>
<style>
.product-card{
     border:2px solid black;
     border-radius:10px;
     margin-bottom:10px;
     width:50%;
     
}
     </style>

<body><center>
     <div class="div-head">
          <h1><strong>Arpana pathra</strong></h1>
     </div>


     <?php
     echo " <div class='cart-div'><div class='search-card-div'>";
     $uid = $_SESSION['id'];
     $name = $_SESSION['fullname'];
     $conn=new mysqli("localhost","root","","tadb");
     if(mysqli_Connect_error()){
         die("connection failed:");
     }

     $sql = "SELECT * FROM sevabooking WHERE u_id='$uid'";
     $sqlone = "SELECT SUM(price) as total_sum FROM sevabooking WHERE u_id='$uid';";
     $result = $conn->query($sql);
     $sum = $conn->query($sqlone);

     if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // $image_path = "img/v2.jpg";
               echo "<div class='product-card'>";
                                   //<img src='" . $image_path . "'/>
                                   echo"<h2 class='ph-name'><b>" . $row['phname'] . "<b></h2>
                                   <h2 class='nakshathra'>" . $row['nakshathra'] . "</h2>
                                   <h2 class='seva-name'>" . $row['s_name'] . "</h2>
                                   <h2 class='seva-date'> " . $row['date'] . "</h2>
                                   <h2 class='seva-price' style='background-color:yellow; border-radius:10px; width:40%; '> ₹" . $row['price'] . "</h2>
                                   <form method='POST' action='deletecartItem.php'>
                                        <input type='hidden' name='del_sid' value='" . $row["s_id"] . "'>
                                        <input type='hidden' name='phname' value='" . $row["phname"] . "'>
                                        <button type='submit' class='add-to-cart-btn'width:60px;height:60px><i class='fa fa-trash' style='color:red; aria-hidden:true;'></i></button>
                                   </form>
                    </div>";
          }
     } else {
          echo "
                    <div class='empty-cart'>
                         <center>
                          <img src='https://cdn-icons-png.flaticon.com/512/1376/1376786.png' alt=''/>
                          <h1>" . $name . ",Your Arpana pathra is empty!</h1>
                    </div>
                    ";
     }

     $conn->close();
     if ($sum->num_rows > 0) {
          $row = $sum->fetch_assoc();
          $total_sum = $row["total_sum"];
     }
     if ($total_sum > 0) {
          echo "</div>
          <div class='place-order-div'>
          <div>
          <h1 style='background-color:orange;'>Total: <span>₹</span>" . $total_sum .  " </h1>
          </div>
          <form method='POST' action='paymentmode.php'>
          <button type='submit' class='add-to-cart-btn' style='background-color:green;border-radius:10px;width:30%;height:10%;padding-bottom:10px;color:white;'><b>confirm booking<b></button>
          </form>
          <br><br><a href=userhomepage.php#section1>back</a>
          </div>";
     } else {
          echo "<div></div>";
     }
     ?>
     </div>
     </div>
     <?php
     }else{
        header('Location: adminlogin.php');
        }
?>
</body>

</html>