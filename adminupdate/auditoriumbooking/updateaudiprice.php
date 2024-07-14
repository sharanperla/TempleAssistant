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
    <h1>Update auditorium price</h1>
    <?php
    echo "<form method=POST>
      <label for=activity>Select section:</label>
      <select name=section id=activity class=select required>";
      echo"<option value='morningprice'>morning</option>
      <option value='nightprice'>night</option>";
          echo "</select>
          <label for=amount>amount</label>
          <input type=number name=amount  class=select placeholder='enter the price'>";
          echo "<input type=submit name=dateselect value=select class=select>";
          echo "</form>";
    ?>

    <?php
      if(isset($_POST['dateselect'])){
        $section=$_POST['section'];
        $price=$_POST['amount'];
        $conn = new mysqli("localhost", "root", "", "tadb");
								if (mysqli_Connect_error()) {
									die("connection failed:");
								}
        if($section=='morningprice')
        {
        $sqlq = "UPDATE auditoriumprice SET morningprice=$price";
        }else{
            $sqlq = "UPDATE auditoriumprice SET nightprice=$price"; 
        }
        $resultq = mysqli_query($conn, $sqlq);
    
          if($resultq){
           
              echo "<script>alert(' updated succesfuly.')</script>";
              echo "<script>window.location.href='updateaudiprice.php'</script>";
 }
          else{
          
              echo "<script>alert(' failed to updated!.')</script>";
              echo "<script>window.location.href='updateaudiprice.php'</script>";
          }
        }
      	?>
        </body>
      </html>