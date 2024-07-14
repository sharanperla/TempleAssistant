<html>
<head>
     <meta charset="UTF-8">
	<title>temple assistant</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<style>
       body{
          font-family: poppins light;
background-color: #a8aa;
     }
    
    input{width:30%;height:50px;border-radius:10px;opacity:100%;margin-bottom:10px;background-color:orange;} 
   .request{
     background-color:green;
     font-size:2rem;
     color:white;
   }
   .del-btn{
     /* color:red;
     width:80px;
     height:60px; */
     background:transparent;
     color:red;
     font-size:2rem;

    }
    .dash-btn{
    background-color:green;
     width:50px;
     height:50px;
     border:none;
     color:white;
     
    }
</style>
<center>

   <body> 
   <a href="../../admindashboard.php#userManagement".php"><img class="go-back-logo" src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo" align=left></a>
   <h1>Create volunteer slot</h1><br><br><br>
    <form method=post action=volunteer.php>
    <!-- <label for="vtitle">title</label> -->
    <input type="text" name="vtitle" placeholder="enter a title" required>
    <!-- <label for="vdisc">dicription</label> -->
    <input type="text" name="vdisc" placeholder="enter the description" required><br>
    <label for="vdate">event date:</label>
    <input type="date"  name="vdate" required>
    <label for="vtime">event Time:</label>
    <input type="time"  name="vtime"><br required>
    <!-- <label for="vcount">volunteers count:</label> -->
    <input type="number"  name="vcount" placeholder='count of volunteer' required><br><br><br>
    <input type=submit name= submit value='Create slot' class=request>
</form>
<?php
  $conn=new mysqli("localhost","root","","tadb");
  if(mysqli_Connect_error()){
      die("connection failed:");
  }
  else{if(isset($_POST['submit'])){
            if (!empty($_POST)) {
                 $vtitle = isset($_POST['vtitle']) ? $_POST['vtitle'] : '';
                 $vdisc = isset($_POST['vdisc']) ? $_POST['vdisc'] : '';
                 $vdate = isset($_POST['vdate']) ? $_POST['vdate'] : '';
                 $vtime = isset($_POST['vtime']) ? $_POST['vtime'] : '';
                 $vcount= isset($_POST['vcount']) ? $_POST['vcount'] : '';
                 $status='yettocomplete';
                 
                 $sql = "INSERT INTO volunteer(v_title,v_disc,v_date,v_time,v_count,status) VALUES ('$vtitle','$vdisc','$vdate','$vtime',' $vcount','$status')";
                 $result1 = $conn->query($sql);
                 if ($result1) {
                 echo "<script>alert('created!')</script>";
                 echo "<script>window.location.href='volunteer.php'</script>";
                 
                 } else {
                      echo "Failed to add request!";
                 }
                 } 
            }

          }
            
$sql="select * from volunteer";
$result = $conn->query($sql);
echo"<table border=2px><tr>";
echo"<th>Title</th>
<th>discription</th>
<th>date</th>
<th>time</th>
<th>count</th>
<th></th>
</tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
     $status=$row["status"];
         echo "<tr class='order-res'>
    <td>" . $row["v_title"] . "</td>
    <td>" . $row["v_disc"] . "</td>
    <td>" . $row["v_date"] . "</td>
    <td>" . $row["v_time"] . "</td>
    <td>" . $row["v_count"] . "</td>
    <td align=center>
    <form method='POST'>
    <input type='hidden' name='vid' value='" . $row["v_id"] . "'>
    <button  type='submit' class='del-btn' name=del-btn background-color: transparent; border:none;'><i class='fa fa-trash'></i></button>
    </td></form>
    <td> <form method=post action='updateVolunteerStatus.php'>
    <input type='hidden' name='v_id' value=". $row["v_id"] .">
    <select name='status' class='select' id='order-status'>";
    if ($status == "yettocomplete") {
         echo "<option value='yettocomplete'>Yet to complete</option>
               <option value='completed'>completed</option>
               <input type=submit  class='dash-btn' name=dash-btn value=submit></form>";
       } else if ($status == "completed") {
         echo "<option value='yettocomplete'>Yet to complete</option>
         <option value='completed' selected>completed</option>
         <input type=submit  class='dash-btn' name=dash-btn value=submit></form>";
       }
       echo"</td>";
       echo"</tr>";
    }
    echo"</table>";
}

?>
<?php
if(isset($_POST['del-btn']))
{
  $id=$_POST['vid'];
$sql = "DELETE FROM volunteer WHERE v_id='$id'";
$result1 = $conn->query($sql);
 if ($result1) {
 echo "<script>alert('Removed!')</script>";
 echo "<script>window.location.href='volunteer.php'</script>";
 
 } else {
      echo "Failed to remove product!";
 }
}
?>
</body>
</html>
