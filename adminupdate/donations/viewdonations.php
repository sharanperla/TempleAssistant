<html>

<head>
     <meta charset="UTF-8">
     <title>temple assistant</title>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
     <link href="" rel="stylesheet">
</head>
<style>
     body {
          font-family: poppins light;
          background-color: #a8aa;
     }

     input {
          width: 30%;
          height: 50px;
          border-radius: 10px;
          opacity: 100%;
          margin-bottom: 10px;
          background-color: green;
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
</style>

<body>
     <center>
          <a href="../../admindashboard.php"><img class="go-back-logo"
                    src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo" align=left></a>
          <h1>Donations</h1><br><br>
          <?php
          echo " <center>";
          $conn = new mysqli("localhost", "root", "", "tadb");
          if (mysqli_Connect_error()) {
               die("connection failed:");
          }

          $sql = "SELECT * FROM donations ORDER BY created_at DESC";
          $result = $conn->query($sql);

          //shows seva table
          echo "<table class='don-header' border=1px>";
          echo "<tr>
<th>name</th>
<th>email</th>
<th>phone</th>
<th>title</th>
<th>amount</th>
<th>pmode</th>
<th>date</th>

</tr>";
          if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                    echo "<tr class='order-res'>
    <td>" . $row["uname"] . "</td>
    <td>" . $row["email"] . "</td>
    <td>" . $row["phone"] . "</td>
    <td>" . $row["title"] . "</td>
    <td>" . $row["amount"] . "</td>
    <td>" . $row["pmode"] . "</td>
    <td>" . $row["created_at"] . "</td> 

                               </tr>";

               }

          } else {
               echo "<tr><td colspan='7'>No results found.</td></tr>";
          }
          echo "</table>";

          // Close database connection
          $conn->close();
          ?>
          <center>

               <a href='../../admindashboard.php'>back</a>

</body>

</html>