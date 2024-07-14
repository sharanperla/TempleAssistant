<html>
     <head>
     <meta charset="UTF-8">
	<title>temple assistant</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<style>
       body{
          font-family: poppins light;
background-color: #a8aa;
     }
    .del-btn{
     /* color:red;
     width:80px;
     height:60px; */
     background:transparent;
     border:none;
     color:red;
     font-size:2rem;
    }
    input{width:30%;height:50px;border-radius:10px;opacity:100%;margin-bottom:10px;background-color:green;} 
    table{
     margin-bottom:30px;
}
     </style>

    <body>
     <center>
     <a href="../admindashboard.php#userManagement"><img class="go-back-logo" src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo" align=left></a><h1>Update sevalist</h1><br><br>
<!-- <form method=post>
     <select id=mode name=mode required>
          <option value=directpay selected>directpay<option>
          <option value='upi payment'>upi payment</option>
          <option value='creditcard payment'>creditcard payment</option>
     </select>
     <input type=date name=date placeholder='select date' required/>
</form> -->
        <?php
       echo" <center>";
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}

     // $mode=$_POST['mode'];
     // $date= $_POST['date'];
    $sql = "SELECT * FROM sevalist";
    $result = $conn->query($sql);
   
    echo "<table class='order-header' border=1px>";
    echo "<tr>
<th>seva ID</th>
<th>Seva Name</th>
<th>Description</th>
<th>Price</th>
<th>Qty</th>
<th>Remove</th>
</tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         echo "<tr class='order-res'>
    <td>" . $row["s_id"] . "</td>
    <td>" . $row["s_name"] . "</td>
    <td>" . $row["descr"] . "</td>
    <td>" . $row["price"] . "</td>
    <td>" . $row["qty"] . "</td>
    <td align=center>
    <form method='POST'>
                              <input type='hidden' name='sid' value='" . $row["s_id"] . "'>
                              <button  type='submit' class='del-btn' background-color: transparent; border:none;'><i class='fa fa-trash'></i></button>
                             
                         </form>
                              </td>
                               </tr>";
                              
}

}
else {
    echo "<tr><td colspan='7'>No results found.</td></tr>";
}
echo "</table>";
                    $sid = isset($_POST['sid']) ? $_POST['sid'] : '';
                    $sqlall = "SELECT s_id FROM sevalist";
                    $result = $conn->query($sqlall);
                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                              if ($row['s_id'] == $sid) {
                                  $sql = "DELETE FROM sevalist WHERE s_id='$sid'";
                                  $result1 = $conn->query($sql);
                                   if ($result1) {
                                   echo "<script>alert('Product Removed!')</script>";
                                   echo "<script>window.location.href='seva.php'</script>";
                                   
                                   } else {
                                        echo "Failed to remove product!";
                                   }
                              } else {
                                   echo "<script>alert(No matching product id found!)</script>";
                              }
                         }
                    } else {
                         echo "<script>alert(No product found!)</script>";
                    }
                

                    // Close database connection
                    $conn->close();
                    ?>
                     <center>
     <form method=post action=addseva.php>
     <input type=submit class='edit-btn' value=add>
</form> 
<form method=post action=updateseva.php>
     <input type=submit class='edit-btn' value=update>
</form> 
<a href='../admindashboard.php'>back</a>
    
</body>

</html>


