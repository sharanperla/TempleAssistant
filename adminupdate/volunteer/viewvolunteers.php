<!DOCTYPE html>
<html lang="en">
<style>
  table{
     width:100%
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

   
</style>

<head>
     <title>view booking</title>
</head>

<body>
     <div class="div">
          <div class="head">
               <center>
                    <!-- <img class="admin-logo" src="https://cdn-icons-png.flaticon.com/512/1007/1007959.png" alt=""
                         width=30px> -->
                    <a href="../../admindashboard.php"><img class="go-back-logo"
                              src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                              align=left></a>
                    <h1>
                         REGISTERED VOLUNTEERS
                    </h1>
          </div>
          <div> <?php
          $conn = new mysqli("localhost", "root", "", "tadb");
          if (mysqli_Connect_error()) {
               die("connection failed:");
          }
          $sql = "SELECT * FROM registeredvolunteers where v_type='individual' ORDER BY created_at DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
               // Display the results in an table
               echo "<center>";
               echo "<table class='order-news' border=1>
               <tr>
               <th>Title</th>
               <th>Date</th>
               <th>Time</th>
               <th>Name</th>
               <th>Email</th>
               <th>Registered on</th>
               </tr>";
               while ($row = $result->fetch_assoc()) {
                    echo "<tr class='order-res'>
                        <td>" . $row["v_title"] . "</td>
                        <td>" . $row["v_date"] . "</td>
                        <td>" . $row["v_time"] . "</td>
                        <td>" . $row["uname"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["created_at"] . "</td> 
                        </tr><br>";
               }
          } else {
               echo "<tr><td colspan='9'>No results found.</td></tr>";
          }


          echo "</table>";
          echo "<a href='../../admindashboard.php'>back</a>";

     
          $conn->close();
          ?>

          </div>
     </div>
</body>

</html>