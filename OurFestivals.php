<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>

body{
  font-family: poppins light;

background-image:url("img/back.jpg");

}
.footer{
background-color:#c9a0f1;
width:100%;

}
.header{
background-color:#fcb900;
width:100%;

}


h3{
font-size:40px;
color:#dc3545;
}
.container{
  margin-left: 0%;
}
#icon{
margin-left:0%;
margin-bottom:12px;
margin-top:10px;}

li a{
text-transform:uppercase;
font-weight:bold;


}
ul{

background-color:#fcb900;
}

</style>

</head>
<body>


	<div class="header">
		<div class="container">
	<center>
				<div class="row">

					<div class="col-lg-6">
							<img src="img/icon.png" width="70" height="70" id="icon" class="rounded" border="0" alt="TA">
							<h3>Temple Assistant</h3>
					</div>

					
					</div>


				</div>
		</div>
</div>











<!-- nav bar -->

<div id="nav1">

<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" style="color:white;" href="index.php">Home</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link active" style="color:rgb(11, 11, 11);"aria-current="page" href="ourfestivals.php">Our Festivals</a>
  </li>
<li class="nav-item">
    <a class="nav-link" style="color:white;"href="temple.php">gallery</a>
  </li>
<li class="nav-item">
    <a class="nav-link" style="color:white;" href="contact.php">Contact Us</a>
  </li>
 <li class="nav-item">
  <a class="nav-link" style="color:white;" href="adminlogin.php">login</a>
</li>
  
</ul>
</div>
<hr>
<h3 style='text-align:center;'> Our Festivals </h3>

<?php
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
	die("connection failed:");
}
$sql = "SELECT * FROM ourfest";
    $result = $conn->query($sql);
    //shows seva table

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         
    $name= $row["name"];
    $dat= $row["date"];
    $disc=  $row["description"];
    $day= $row["day"];
    $img=$row["image"];

echo"<hr>";

echo"<div class='container'>
	<div class=row>
		<div class=col-lg-3>

				<img src=$img style='border:1px solid black;padding:5px; margin-bottom:30px;margin-top:0px;border-radius:10px;' width=350 height=310 border=0 alt='fxg'>
		</div>
		<div class=col-lg-8>
<!-- sub creation-->
		<div class=row>

			<div class=col-lg-5>
			<pre>

			<b>Name</b>

			<b>Date</b>

			<b>Day</b>

			<b>Description</b>

			</pre>

			</div>

			<div class=col-lg-7 >";
		




			echo"<pre>
			<br>$name
			<br>$dat
			<br>$day";

			
echo"</pre>
			<p style=margin-left:30px;text-align:justify;>$disc</p><br>

			

			</div>



		</div>
<!-- sub creation-->




		</div>
	</div>
</div> 
<hr>";
	}
}
	?>

<!-- footer part-->
<div class="footer" style="margin-top:20px;">
		
<div class="container"style="margin-top:20px;">
		<div class="row"style="margin-top:20px;">

					
                 
<!-- first part-->
<div class="col-lg-6"style="margin-top:25px;">

	<h3>OUR LOCATION</H3>
<P>
<PRE>
Address:shree vanadurgadevi temple,mittabettu

pilathabettu

karnataka

575654 

Phone:8590830065
</PRE>
</P>

   </div>

<!-- second part-->
   <div class="col-lg-6">

<div class="row">


<div class="col-lg-6"style="margin-top:25px;">


</div>



<div class="col-lg-6"style="margin-top:25px;" text-align="left">

<h3> GET CONNECTE </H3>

<i class="fa fa-facebook-square fa-lg" style="margin-right:10px;"></i>Facebook <br>
<i class="fa fa-twitter fa-lg"style="margin-right:10px;"></i>Twitter<br>

<i class="fa fa-youtube fa-lg"style="margin-right:10px;"></i>YouTube<br>



<i class="fa fa-instagram fa-lg"style="margin-right:10px;"></i>Instagram


</ul>
</div>


</div>





   </div>




</div>
</div>

</div>

</body>
</html>