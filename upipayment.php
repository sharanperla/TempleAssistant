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
               window.location.href = "viewcart.php";
          }, 5000);
     </script>
</head>

<body>
     <div style="display:flex; align-items:center; justify-content:center; flex-direction:column;">
          <h1>Scan for Payment</h1>
          <img style="width:500px;" src="components/qrImage.jpg" />
          <form method=post action=placeorder.php>
          <div class="flex">
                         
                         <button type="submit" class="submit" name=submit>scan to pay</button>
                    </div>
     </div>
     <?php
 $_SESSION['spay_mode']='upi payment';    
}
else{
     header('Location: adminlogin.php');
     }
?> 
</body>

</html>