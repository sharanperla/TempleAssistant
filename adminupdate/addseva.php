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
     <title>Add Products</title>
</head>
<style>
     body{
          font-family: poppins light;
background-color: #a8aa;
     }
     input{width:30%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:orange;} 
     </style>
<body>
     
     <div class="addproduct" id="add">
          <div class="admin-head">
               <a href="seva.php"><img class="go-back-logo" src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"></a>
               <center>
               <h1>Add seva</h1>
          </div>
        
          <form action="addseva.php" method="POST" class="add">
               <center>
          <input type="date" id="date" name="date" placeholder="date" required><br>
               <input type="text" id="sname" name="sname" placeholder="seva Name" required>
               <input type="text" id="descr" name="descr" placeholder="Description of seva"><br>
               <input type="number" id="price" name="price" min="0" placeholder="Price" required>
               
               <input type="number" id="qty" name="qty" min="0" placeholder="Quantity" required><br>
               <select name=p_type required style='width:30%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:orange;'>
                    <option value=morning>morning</option>
                    <option value=afternoon>afternoon</option>
                    <option value=evening>evening</option>     
                    </select><br>
               <input type="submit" value="Add" style='background-color:green;'>
          </form>

          <?php
          
          $conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}
else{
          if (!empty($_POST)) {
              
               $sname = isset($_POST['sname']) ? $_POST['sname'] : '';
               $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
               $price = isset($_POST['price']) ? $_POST['price'] : '';
               $date = isset($_POST['date']) ? $_POST['date'] : '';
               
               $qty = isset($_POST['qty']) ? $_POST['qty'] : '';
               $ptype=$_POST['p_type'];
               $sql = "INSERT INTO sevalist(s_name,descr,price,qty,p_type,date) VALUES ('$sname','$descr','$price',' $qty','$ptype','$date')";
               $result1 = $conn->query($sql);
               if ($result1) {
               echo "<script>alert('Product added!')</script>";
               echo "<script>window.location.href='addseva.php'</script>";
               
               } else {
                    echo "Failed to add product!";
               }
               } else {
                    
               }
          }
          
     }

     else{
          header('Location: adminlogin.php');
          }
      ?>
     </div>
</body>

</html>