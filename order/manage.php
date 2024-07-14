<!DOCTYPE html>
<html lang="en">
<style>
     th {
          font-family: "Poppins";
          padding: 15px 0;
          background-color: orange;
          color: white;
          text-align: center;
     }

     tr td {
          text-align: center;
          padding: 15px 0;
          font-weight: 500;
     }

     tr:nth-of-type(even) {
          background-color: #ffbd86;
     }
</style>

<head>
     <title>Seva bookings</title>
</head>

<body>
     <div class="div">
          <div class="latest">
               <div class="head">
                    <center>
                         <img class="admin-logo" src="https://cdn-icons-png.flaticon.com/512/1007/1007959.png" alt=""
                              width=30px>
                         <a href="../admindashboard.php"><img class="go-back-logo"
                                   src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                                   align=left></a>
                         <h1>
                              view booking
                         </h1>
               </div>
               <?php
               // Set up database connection
               $conn = new mysqli("localhost", "root", "", "tadb");
               if (mysqli_Connect_error()) {
                    die("connection failed:");
               } else {
                    // Query the database for the latest 10 items in the orders table
                    $sql = "SELECT * FROM sevaorders
                    WHERE date >= CURDATE()
                    ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    // Display the results in an HTML table
                    echo "<center>";
                    echo "<table class='order-news' border=1>";
                    echo "<tr>
               <th>Booking ID</th>
               <th>user ID</th>
               <th>date</th>
               <th>seva Name</th>
               <th>Devotee</th>
               <th>nakshathra</th>
               <th>username</th>
               <th>phone</th>
               <th>email</th>
               <th>price</th>
               <th>payment mode</th>
               <th>booking time</th>
               </tr>";
                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                              echo "<tr class='order-res'>
                         <td>" . $row["o_id"] . "</td>
                         <td>" . $row["u_id"] . "</td>
                         <td>" . $row["date"] . "</td>
                         <td>" . $row["s_name"] . "</td>
                         <td>" . $row["phname"] . "</td>
                         <td>" . $row["nakshathra"] . "</td>
                         <td>" . $row["username"] . "</td>  
                         <td>" . $row["phone"] . "</td>  
                         <td>" . $row["email"] . "</td>   
                         <td>" . $row["price"] . "</td>
                         <td>" . $row["payment_mode"] . "</td> 
                         <td>" . $row["created_at"] . "</td> 
                         </tr>";
                         }
                    } else {
                         echo "<tr><td colspan='12'>No results found.</td></tr>";
                    }
                    echo "</table>";

                    echo"<h1>Completed seva bookings</h1>";
                    $sql1 = "SELECT * FROM sevaorders
                    WHERE date < CURDATE()
                    ORDER BY created_at DESC;
                    ";
                    $result1 = $conn->query($sql1);

                    // Display the results in an HTML table
                    echo "<center>";
                    echo "<table class='order-news' border=1>";
                    echo "<tr>
               <th>Booking ID</th>
               <th>user ID</th>
               <th>date</th>
               <th>seva Name</th>
               <th>Devotee</th>
               <th>nakshathra</th>
               <th>username</th>
               <th>phone</th>
               <th>email</th>
               <th>price</th>
               <th>payment mode</th>
               <th>booking time</th>
               </tr>";
                    if ($result1->num_rows > 0) {
                         while ($row = $result1->fetch_assoc()) {
                              echo "<tr class='order-res'>
                         <td>" . $row["o_id"] . "</td>
                         <td>" . $row["u_id"] . "</td>
                         <td>" . $row["date"] . "</td>
                         <td>" . $row["s_name"] . "</td>
                         <td>" . $row["phname"] . "</td>
                         <td>" . $row["nakshathra"] . "</td>
                         <td>" . $row["username"] . "</td>  
                         <td>" . $row["phone"] . "</td>  
                         <td>" . $row["email"] . "</td>   
                         <td>" . $row["price"] . "</td>
                         <td>" . $row["payment_mode"] . "</td> 
                         <td>" . $row["created_at"] . "</td> 
                         </tr>";
                         }
                    } else {
                         echo "<tr><td colspan='12'>No results found.</td></tr>";
                    }
                    echo "</table>";
               }
               // Close database connection
               $conn->close();
               ?>


          </div>

     </div>
</body>

</html>