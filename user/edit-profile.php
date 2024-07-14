<?php
session_start();
if($_SESSION['status']==true)
{

	$conn=new mysqli("localhost","root","","tadb");
		if(mysqli_Connect_error()){
			die("connection failed:");
		}
if (isset($_POST['submit'])) {
     $uid=$_SESSION['id'];
     $username = $_POST['username'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $_SESSION['phone']=$_POST['phoneNumber'];
     $phoneNumber = $_POST['phoneNumber'];
     $sql = "UPDATE usertable SET name='$username', email='$email', city='$address', phone='$phoneNumber' WHERE u_id='$uid'";
     if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
     } else {
          echo "Error updating record: " . $conn->error;
     }
}
}
else{

	header('Location: adminlogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Update Profile</title>
     <link rel="stylesheet" href="style/style.css">
</head>
<style>
body{
  font-family: poppins light;

background-image:url("img/back.jpg");

}
 input{
    width:30%;
    height:50px;
    border-radius:10px;
    opacity:80%; 
  align:center;
    margin-bottom:20px;
    background-color:orange;
  }
  button{
    width:30%;
    height:50px;
    border-radius:10px;
    opacity:80%; 
    align:center;
    margin-bottom:20px;
    background-color:green;
  }
  label{
  color:black;
  font-size:1.5em;}
  table tr:nth-child(even){background-color:#f2f2f2;

}</style>
<body>
<a href="userprofile.php"><img class="go-back-logo"
                              src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                              align=left></a>
<?php
 $name=$_SESSION['fullname'];
 $em=$_SESSION['email'];
 $ph=$_SESSION['phone'];
     echo"<div class=div-head>
          <h1 align=center>edit Profile</h1>
     </div>
     <form action='' method=post class=login-form align=center>
          <label for=username>Username</label>
          <input type=text id=username name=username value='$name' required><br>
          <label for=email>Email</label>
          <input type=email id=email name=email value='$em' required><br>
          <label for=address>Address</label>
          <input type=text id=address name=address required><br>
          <label for=phoneNumber>Phone Number</label>
          <input type=text id=phoneNumber name=phoneNumber value='$ph' required><br>
          <button type=submit class=add-to-cart-btn name=submit >Update</button><br>
          
     </form>";
     ?>
     
</body>

</html>