<?php
session_start();

if($_SESSION['status']==true)
{
     ?>
     <!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
.flex{
     width:50;
}
          </style>
     <script>
          setTimeout(function() {
               window.location.href = "donation.php";
          }, 5000);
     </script>
</head>

<body>
     <div style="display:flex; align-items:center; justify-content:center; flex-direction:column;">
          <h1>Scan for Payment</h1>
          <img style="width:500px;" src="components/qrImage.jpg" />
          <form method=post action=donationinsert.php>
          <div class="flex">
            <?php $amount=$_SESSION['damount'];
            echo"<h1>₹$amount</h1><center>";
     
                         echo"<input type=hidden value=$amount name=amount>";
                         ?>
                         <button type="submit" class="submit" name=paynow>scan to pay</button>
                    </div>
     </div>
     <?php
 $_SESSION['dpay_mode']='upi payment';    
}
else{
     header('Location: adminlogin.php');
     }
?> 
</body>

</html>