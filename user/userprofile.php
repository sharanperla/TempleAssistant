<?php
session_start();
if($_SESSION['status']==true)
{
// Initialize database connection
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../style.css">
     <style>
          .divhead {
    min-height: 30vh;
    background-size: cover; 
    background-image: url(https://images.pexels.com/photos/1293120/pexels-photo-1293120.jpeg?cs=srgb&dl=abstract-abstract-art-abstract-painting-1293120.jpg&fm=jpg);
    display: flex;
    justify-content: center;
    align-items: center;
}

.divhead h1 {
    font-size: 3rem;
    color: white;
}
body{
     background-color: yellow;
}
          
     </style>
</head>

<body>

     <div class="divhead">
     
          <h1>Your Profile</h1>
     </div>
     <a href="../userhomepage.php"><img class="go-back-logo"
                              src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                              align=left></a>
     <div class="details" style="display:flex; align-items:center; justify-content:center; flex-direction:column;">
          <?php
          $uid=$_SESSION['id'];
          $sql = "SELECT * FROM usertable WHERE u_id='$uid'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // https://cdn-icons-png.flaticon.com/512/456/456212.png
               while ($row = $result->fetch_assoc()) {
                    echo "<div class='user-info-div'>
               <img src='https://cdn-icons-png.flaticon.com/512/456/456212.png'/>
               
               <h1> 
               " . $row['u_name'] . "
               </h1>
               
               <h2>
               " . $row['name'] . "
               </h2>
               <h2>
               " . $row['email'] . "
               </h2>
               <h2>
               " . $row['phone'] . "
               </h2>
               
               <h2>
               " . $row['city'] . "
               </h2>
               
               <h2>
               " . $row['country'] . "
               </h2>
               
               </div>";
               }
          } else {
               echo "user not found";
          }
          ?>
          <div>
               <a class="add-to-cart-btn" href="edit-profile.php">Edit Profile</a>
               <a class="add-to-cart-btn" href="delete-profile.php">Delete Account</a>
          </div>

          <h1 style="margin-top:2rem;">Past Bookings</h1>
          <div class=col-lg-12 style="text-align: center; display:flex;  align-items:center; justify-content: center; flex-direction:row;">
               <?php
               $sql = "SELECT * FROM sevaorders WHERE u_id='$uid'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                         
                         echo "
                    <div class='product-card'>
                         <h1 class='product-name'>". $row['phname']."</h1>
                         <h1 class='product-name'>". $row['nakshathra']."</h1>
                         <h1 class='product-name'>" . $row['s_name'] . "</h1>
     
                         <div class='btn-grp'>
                              <form method='POST' action='viewsevadetails.php'>
                                   <input type='hidden' name='sid' value='" . $row["id"] . "'>
                                   <button type='submit' class='view-dtls-btn' name=view-dtls-btn>View Details</button>
                              </form>
                         </div>
                    </div>";
                    }
               } else {
                    
                    echo "<br><br><p>No Bookings yet!</p>";
               }
               echo"</div>";
              
echo"<br>";

               $sql = "SELECT * FROM auditorium WHERE u_id='$uid'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                    echo"<h1>Auditorium</h1>";
                    echo"<div class=col-lg-12 style='text-align: center; display:flex;  align-items:center; justify-content: center; flex-direction:row;'>";
                    while ($row = $result->fetch_assoc()) {
                         
                         echo "
                    <div class='product-card'>
                         <h1 class='product-name'>". $row['booking_date']."</h1>
                         <h1 class='product-name'>". $row['booking_time']."</h1>
                         <h1 class='product-name'>" . $row['pdisc'] . "</h1>";
                         if($row['p_status']=='cancelled'){
                             echo" <h2 color=green>" . $row['p_status'] . "</h2>";
                         }
                         echo"
                         <div class='btn-grp'>
                              <form method='POST' action='audidetails.php'>
                                   <input type='hidden' name='aid' value='" . $row["a_id"] . "'>
                                   <input type='hidden' name='uid' value=$uid>
                                   <button type='submit' class='view-dtls-btn' name='view-dtls-btn' >View Details</button>
                              </form>
                         </div>
                    </div>";
                    }
               } else {
                    
                    echo "<br><br><p>No Bookings !</p>";
               }
               echo"</div>";
               $sql = "SELECT * FROM donations WHERE u_id='$uid'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                    echo"<h1>Donations</h1>";
                    echo"<div class=col-lg-12 style='text-align: center; display:flex;  align-items:center; justify-content: center; flex-direction:row;'>";
                    while ($row = $result->fetch_assoc()) {
                         
                         echo "
                    <div class='product-card'>
                         <h1 class='product-name'>". $row['title']."</h1>
                         <h1 class='product-name'>". $row['amount']."</h1>
                         <div class='btn-grp'>
                              <form method='POST' action='auditoriumdetails.php'>
                                   <input type='hidden' name='aid' value='" . $row["id"] . "'>
                                   <button type='submit' class='view-dtls-btn'>View Details</button>
                              </form>
                         </div>
                    </div>";
                    }
               } else {
                    
                   
               }
               echo"</div>";
               $sql = "SELECT * FROM registeredvolunteers WHERE u_id='$uid'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                    echo"<h1>Upcoming volunteering activities</h1>";
                    echo"<div class=col-lg-12 style='text-align: center; display:flex;  align-items:center; justify-content: center; flex-direction:row;'>";
                    while ($row = $result->fetch_assoc()) {
                         
                         echo "
                    <div class='product-card'>
                         <h1 class='product-name'>". $row['v_title']."</h1>
                         <h1 class='product-name'>". $row['v_date']."</h1>
                         <div class='btn-grp'>
                              <form method='POST' action='auditoriumdetails.php'>
                                   <input type='hidden' name='aid' value='" . $row["id"] . "'>
                                   <button type='submit' class='view-dtls-btn'>View Details</button>
                              </form>
                         </div>
                    </div>";
                    }
               } else {
                    
                   
               }
              
               echo"</div>";
               echo" <a href=volunteerreciept.php>GET VOLUNTEER RECIEPT</a>";
            }
            else{
                header('Location: adminlogin.php');
            } 
               ?>
          </div>
     </div>
     
</body>

</html>