<html>
<html lang="en">
     <head>
     <meta charset="UTF-8">
	<title>User Info</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	
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
    /* input{width:30%;height:50px;border-radius:10px;opacity:100%;margin-bottom:10px;background-color:green;}  */
    table{
     margin-bottom:30px;
     border:1px;
}
.admin-logo{
    width:80px;
}
     </style>

    <body>
     <center>
     <a href="../../admindashboard.php#userManagement"><img class="go-back-logo" src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo" align=left></a>
 <div class="dash-div">
          <div class="admin-head">
               <img class="admin-logo" src="https://cdn-icons-png.flaticon.com/512/7542/7542177.png" alt="">
               <h1>
                    User Information
               </h1>
          </div>
          <div class="dash-div-btn">
               <div class="show-items">
                    <h2>All Users</h2>
                    <?php
                    //Database Connection
                    $conn=new mysqli("localhost","root","","tadb");
                    if(mysqli_Connect_error()){
                        die("connection failed:");
                    }
                    $sql = "SELECT * FROM usertable";
                    $result = $conn->query($sql);
                    echo "<table class='order-news' border=1px>";
                    echo "<tr>
               <th>User ID</th>
               <th>Username</th>
               <th>fullname</th>
               <th>email</th>
               <th>city</th>
               <th>Contact Number</th>
               <th>Remove</th>
               </tr>";
                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                              echo "<tr class='order-res'>
                         <td>" . $row["u_id"] . "</td>
                         <td>" . $row["u_name"] . "</td>
                         <td>" . $row["name"] . "</td>
                         <td>" . $row["email"] . "</td>
                         <td>" . $row["city"] . "</td>
                         <td>" . $row["phone"] . "</td>
                         <td>
                         <form method='POST'>
                              <input type='hidden' name='user_id' value='" . $row["u_id"] . "'>
                              <button type='submit' class='del-btn'><img src='https://cdn-icons-png.flaticon.com/512/6861/6861362.png' width=20px/></button>
                         </form>
                     </td>
                         </tr>";
                         }
                    } else {
                         echo "<tr><td colspan='6'>No results found.</td></tr>";
                    }
                    echo "</table>";

                    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
                    $sqlall = "SELECT u_id FROM usertable";
                    $result = $conn->query($sqlall);
                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                              if ($row['u_id'] == $user_id) {
                                   $sql = "DELETE FROM usertable WHERE u_id='$user_id'";
                                   if (mysqli_query($conn, $sql)) {
                                        echo "<script>alert('User Removed.');</script>";
                                        echo "<script>window.location.href='manageUser.php'</script>";
                                        exit();
                                   } else {
                                        echo "<script>alert('Failed to remove user.');</script>";
                                        echo "<script>window.location.href='manageUser.php'</script>";
                                   }
                              }
                         }
                    } else {
                         echo "<script>alert(No user found!)</script>";
                    }

                    mysqli_close($conn);
                    ?>
               </div>
          </div>
</body>

</html>