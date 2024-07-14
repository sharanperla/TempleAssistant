<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Update seva</title>
</head>
<style>
       body{
          font-family: poppins light;
background-color: #a8aa;
     }
     input{
         width:30%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:orange;
     } 
     #sid{
          width:20%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:orange;
     }
     </style>


<body>
     <div class="action-div" id="update">
          <div class="head">
               <a href="seva.php"><img class="go-back-logo" src="https://cdn-icons-png.flaticon.com/512/271/271220.png" alt="" width=30px>
               </a>
               <center>
               <h1>Update seva</h1>
          </div>
          <center>
          <form method=post>
          <input type=text id=sid name=sid placeholder='seva ID' required><input id=sid type=submit value=submit name=idsub style='background-color:green;'><br><br><br><br>
</form>
          <?php
          $conn=new mysqli("localhost","root","","tadb");
          if(mysqli_Connect_error()){
              die("connection failed:");
          }
          if(isset($_POST['idsub'])){
               $sid=$_POST['sid'];
          
          $sql = "SELECT * FROM sevalist where s_id='$sid'";
    $result = $conn->query($sql);
    
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
$s_id=$row["s_id"];
$sname=$row["s_name"];
$disc=$row["descr"];
$price=$row["price"];
$qty=$row["qty"] ;
$type=$row["p_type"];

    }


                               
echo"<center>";
        echo"  <form action=updateseva.php method=POST class=form >
               <label for=sname ><b>Sevaname</b></label>
               <input type=text id=sname name=sname placeholder='seva Name' value=$sname>
               <label for=descr ><b>Description</b></label>
               <input type=text id=descr name=descr placeholder='Description' value=$disc><br></td></tr>
              <tr><td> <label for=Price ><b>Price    </b></label>
               <input type=number id=price name=price min=0 placeholder='Price' value=$price>
               <label for=qty ><b>Quantity</b></label>
               <input type=number id=qty name=qty min=0 placeholder='Quantity'value=$qty><br>
               <select name=p_type style='width:30%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:orange;' required>
                    <option value=morning default=$type>morning</option>
                    <option value=evening>evening</option>
</select><br>
<input type='hidden' value=$s_id name=sid>
               <input type='submit' value='update' name=update style='background-color:green;'>
          </form>";
    }
    else{
     echo"invalid id";
}
          }

          ?>
          <?php
          $conn=new mysqli("localhost","root","","tadb");
          if(mysqli_Connect_error()){
              die("connection failed:");
          }
          if(isset($_POST['update'])){
          if (!empty($_POST)) {
               $s_id=isset($_POST['sid']) ? $_POST['sid'] : '';
            $sname = isset($_POST['sname']) ? $_POST['sname'] : '';
            $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $qty = isset($_POST['qty']) ? $_POST['qty'] : '';
            $ptype=$_POST['p_type'];
               
                              $sql = "UPDATE sevalist SET s_id='$s_id', s_name ='$sname',descr='$descr',price = '$price',qty = '$qty',p_type='$ptype' WHERE s_id = '$s_id';";
                              $result1 = $conn->query($sql);
                              if ($result1) {
                              echo "<script>alert('updated!')</script>";
                              echo "<script>window.location.href='seva.php'</script>";
                              
                              } else {
                                   echo "Failed to update!";
                              }
                         } else {
                              echo "enter credentials";
                         }
                    }
          mysqli_close($conn);


          ?>
     </div>
</body>

</html>