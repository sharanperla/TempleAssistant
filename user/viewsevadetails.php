<?php
session_start();
if($_SESSION['status']==true)
{
// Initialize database connection
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}
$uid=$_SESSION['id'];
?>
<html>
    <head></head>
    <style>
        .product-card {
    width:100%;
    height:100%;
    margin: 2rem;
    padding: 2rem 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background-color:yellow;
   
}

.product-card:hover {
    box-shadow: 5px -1px 20px 5px rgba(0, 0, 0, 0.096);
}


.product-card h1 {
    font-size: 1.5rem;
    text-align: center;
}

.product-card h2 {
    color: #fda11c;
    font-size: 2rem;
    margin: 10px 0;
    text-align: center;
}

    </style>

    <body>
        <div class=col-lg-12 style="text-align: center; display:flex;  align-items:center; justify-content: center; flex-direction:row;">
               <?php
                if(isset($_POST['view-dtls-btn'])){
                   $sid=$_POST['sid']; 
        
               $sql = "SELECT * FROM sevaorders WHERE u_id='$uid' && id='$sid'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                   echo" <div class='product-card' background-color=red>
                         <h1 class='product-name'>DEVOTEE NAME:". $row['phname']."</h1>
                         <h1 class='product-name'>NAKSHATRAM:". $row['nakshathra']."</h1>
                         <h1 class='product-name'>SEVA NAME:" . $row['s_name'] . "</h1>
                         <h1 class='product-name'>DATE:" . $row['date'] . "</h1>
                         <h1 class='product-name'>BOOKING DATE:" . $row['created_at'] . "</h1>
                         <h1 class='product-name'>PAYMENT:" . $row['payment_mode'] . "</h1>
                         <h1 class='product-name'>PRICE:" . $row['price'] . "</h1></div>";


                    }
               } else {
                    
                    echo "<br><br><p>No Bookings yet!</p>";
               }
               echo"</div>";
            
            }
               }
            else{
                header('Location: adminlogin.php');
            } 
               ?>
               </body>
               </html>