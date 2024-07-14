<!DOCTYPE html>
<html lang="en">
<style>
     .head {
          margin-bottom: 10px
     }


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

     .div {
          background: #e3e9f7;
     }

     .order-news {
          margin-bottom: 20px;
     }

     .head {
          margin-bottom: 0px;
     }
</style>

<head>
     <title>view booking</title>
</head>

<body>
     <div class="div">
          <div class="head">
               <center>
                    <img class="admin-logo" src="https://cdn-icons-png.flaticon.com/512/1007/1007959.png" alt=""
                         width=30px>
                    <a href="../../admindashboard.php"><img class="go-back-logo"
                              src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                              align=left></a>
                    <h1>
                         Auditoium booking
                    </h1>
          </div>
          <div class=tables> <?php
          // Set up database connection
          $conn = new mysqli("localhost", "root", "", "tadb");
          if (mysqli_Connect_error()) {
               die("connection failed:");
          }
          // Query the database for the latest 10 items in the orders table
          $sql = "SELECT * FROM auditorium ORDER BY created_at DESC";
          $result = $conn->query($sql);

          // Display the results in an HTML table
          echo "<center>";
          echo "<table class='order-news' border=1>";
          echo "<tr>
               <th>Booking ID</th>
               <th>Booking date</th>
               <th>Booking type</th>
               <th>program discription</th>
               <th>username</th>
               <th>email</th>
               <th>phone</th>
               <th>payment type</th>
               <th>amount</th>
               <th>payment mode</th>
               <th>Booking date</th>
               </tr>";
          if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                    echo "<tr class='order-res'>
                         <td>" . $row["a_id"] . "</td>
                         <td>" . $row["booking_date"] . "</td>
                         <td>" . $row["booking_time"] . "</td>
                         <td>" . $row["pdisc"] . "</td>
                         <td>" . $row["uname"] . "</td>
                         <td>" . $row["email"] . "</td>
                         <td>" . $row["phone"] . "</td>  
                         <td>" . $row["p_status"] . "</td>  
                         <td>" . $row["amount"] . "</td>   
                         <td>" . $row["pmode"] . "</td>
                         <td>" . $row["created_at"] . "</td> 
                         </tr><br>";
               }
          } else {
               echo "<tr><td colspan='6'>No results found.</td></tr>";
          }
          echo "</table>";


          $sqlr = "SELECT * FROM auditoriumprice";
          $resultr = $conn->query($sqlr);

          if ($resultr->num_rows > 0) {
              
               while ($row = $resultr->fetch_assoc()) {
                    $mor=$row['morningprice'];
                    $nig=$row['nightprice'];

               }
          }
          echo "</div><div class=latest>";
          $sql = "SELECT * FROM auditorium where p_status='advance' ORDER BY created_at DESC";
          $result = $conn->query($sql);
          
          echo "<center>";
          echo "<h2>Pending payments<h2>";
          echo "<table class='order-news' border=1>";
          if ($result->num_rows > 0) {
               // Display the results in an HTML table
          
               echo "<tr>
               <th>Booking ID</th>
               <th>Booking date</th>
               <th>Booking type</th>
               <th>program discription</th>
               <th>username</th>
               <th>email</th>
               <th>phone</th>
               <th>paid amount</th>
               <th>pending amount</th>
               <th>payment mode</th>
               <th>Booking date</th>
               </tr>";
               while ($row = $result->fetch_assoc()) {
                    $btime=$row['booking_time'];
                    if($btime=='morning')
                    {
                         $amount=$mor;
                    }else{
                         $amount=$nig;
                    }
                    $paid=$row["amount"];
                    $pendingamount=$amount-$paid;
                    echo "<tr class='order-res'>
                         <td>" . $row["a_id"] . "</td>
                         <td>" . $row["booking_date"] . "</td>
                         <td>" . $row["booking_time"] . "</td>
                         <td>" . $row["pdisc"] . "</td>
                         <td>" . $row["uname"] . "</td>
                         <td>" . $row["email"] . "</td>
                         <td>" . $row["phone"] . "</td>  
                         <td>" . $row["amount"] . "</td> 
                         <td>$pendingamount</td>  
                         <td>" . $row["pmode"] . "</td>
                         <td>" . $row["created_at"] . "</td> ";


               }
          } else {
               echo "<th colspan=12>No pending payments</th>";
          }
          echo "</tr>";
          echo "</table>";


          // Close database connection
          $conn->close();
          ?>

          </div>
     </div>

     </div>
</body>

</html>