<!DOCTYPE html>
<html>
  <head>
    <title>Volunteer Participation Update</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <style>
    table {
      border-collapse: collapse;
      margin-left:auto;
      margin-right:auto;
      margin-top:10px;
      margin-bottom:10px;
      width:90%;
    }
  
    table, th, td{
      border:1px solid black;
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
     .select{
      width:20%;
      height:50px;
      border-radius:10px;
      font-size:1.5rem;
      opacity:80%;
      margin-bottom:10px;
      background-color:yellow;
      border:2px solid black;
     }
     .link{
      color:red;
     }
     
     /* input{width:20%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:yellow;border:2px black;} */

    input[type="checkbox"] {
      transform: scale(1.5);
    }
    body{
      text-align:center;
    }
  </style>
  <body>
  <a href="../../admindashboard.php"><img class="go-back-logo"
                              src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                              align=left></a>
    <h1>Volunteer Participation Update</h1>
    <?php
    echo "<form method=POST>
      <label for=activity>Select Activity:</label>
      <select name=activity id=activity class=select required>";
       
           $conn=new mysqli("localhost","root","","tadb");
           if(mysqli_Connect_error()){
               die("connection failed:");
           }
     // Query the database for activities
          $sql = "SELECT * FROM volunteer";
          $result = mysqli_query($conn, $sql);
          
          // Loop through the results and display each activity as an option in the dropdown menu
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'.$row['v_id'].'">'.$row['v_title'].'('.$row['v_date'].')</option>';
          }
          echo "</select>";
          echo "<input type=submit name=dateselect value=select class=select>";
          echo "</form>";
    ?>

    <?php
      if(isset($_POST['dateselect'])){
        $vid=$_POST['activity'];
        $sqlq = "UPDATE registeredvolunteers SET status ='true' where v_id=$vid";
        $resultq = mysqli_query($conn, $sqlq);
        // Query the database for registered volunteers
        $sql = "SELECT * FROM registeredvolunteers where v_id=$vid";
        $result = mysqli_query($conn, $sql);
        
        // Loop through the results and display each volunteer's information
        echo "<form method='post'>";
        echo "<table>
                <thead>
                  <tr>
                    <th>Volunteer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Participation</th>
                  </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>'.$row['u_id'].'</td>';
          echo '<td>'.$row['uname'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td><input type=checkbox name=participation[] value='.$row['u_id'].'></td>';

          echo '</tr>';
        }
        echo "</tbody></table>";
        echo "<input type=submit name=dateselect1 value=update class=select></form>";
      }
    ?>

    <?php
      if(isset($_POST['dateselect1'])){
        // Get the list of volunteer IDs from the form
        $participation = $_POST['participation'];
        $v_title = $_POST['v_title'];
        // Update the participation status of each volunteer
        foreach ($participation as $uid) {
          $sql1 = "UPDATE registeredvolunteers SET part='true' WHERE u_id=$uid";
          $result1 = $conn->query($sql1);
        }
       
          if($result1){
              echo "<script>alert(' updated succesfuly.')</script>";
              echo "<script>window.location.href='volunteerpart.php'</script>";
 }
          else{
              echo "<script>alert(' failed to updated!.')</script>";
              echo "<script>window.location.href='volunteerpart.php'</script>";
          }
        
      }      
      ?>
      <a href="paticipatedvolunteers.php" class=link>
											
													<h1>UNMARK ATTENDENCE</h1>
							</a>
        </body>
      </html>