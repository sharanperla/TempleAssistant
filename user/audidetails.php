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
    <a href="userprofile.php"><img class="go-back-logo"
                              src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                              align=left></a>
        <div class=col-lg-12 style="text-align: center; display:flex;  align-items:center; justify-content: center; flex-direction:row;">
               <?php
                if(isset($_POST['view-dtls-btn'])){
                   $aid=$_POST['aid']; 
                   $uid=$_POST['uid']; 
            
               $sql = "SELECT * FROM auditorium WHERE u_id='$uid' AND a_id='$aid' and p_status<>'cancelled'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                   echo" <div class='product-card' background-color=red>
                         <h1 class='product-name'>EVENT DATE:". $row['booking_date']."</h1>
                         <h1 class='product-name'>SECTION:". $row['booking_time']."</h1>
                         <h1 class='product-name'>EVENT DISCRIPTION:" . $row['pdisc'] . "</h1>
                         <h1 class='product-name'>PAYMENT:" . $row['p_status'] . "</h1>
                         <h1 class='product-name'>AMOUNT:" . $row['amount'] . "</h1>
                         <h1 class='product-name'>PAYMENTMODE:" . $row['pmode'] . "</h1>
                         <h1 class='product-name'>BOOKING DATE:" . $row['created_at'] . "</h1>";
                        echo" <form method=post>
                        <input type=hidden name=sid value=$aid />
                        <input type=submit name=cancel value=cancel /></form></div>";
                            

                    }
               } else {
                    
                    echo "<br><br><p>No Bookings yet!</p>";
               }
               echo"</div>";
            
            }
              
               ?>
               <?php
               if(isset($_POST['cancel'])){
                $aid=$_POST['sid'];
                  $sql = "UPDATE auditorium SET p_status='cancelled' WHERE a_id='$aid'";
                  if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('booking canceled successfully.!')</script>";
                    echo "<script>window.location.href='userprofile.php'</script>";
                  } else {
                    echo "Error updating status: " . $conn->connect_errno;
                  }
                }
            }
        
        else{
            header('Location: adminlogin.php');
        }  
                $conn->close();


?>
               </body>
               </html>