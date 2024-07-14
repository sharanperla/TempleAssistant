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
    <a class="nav-link" style="color:white;"href="ourfestivals.php">Our Festivals</a>
  </li>
<li class="nav-item">
    <a class="nav-link active" style="color:rgb(11, 11, 11);"aria-current="page" href="temple.php">gallery</a>
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




<!-- temple body-->
<!--
<div class="container">
<h3>TEMPLES</H3>

<div class="container">
			<div class="row">

				<div class="col-lg-4">
				<img src="img/p4.jpg" width="275" height="184" border="0" alt="">
				</div> 

				<div class="col-lg-8">
						<h4 STYLE="text-transform:uppercase">tIRUMULA TIRUPATI DEVA STANAM</H4><br>

					    <h5 STYLE="text-transform:uppercase">Andhra pradesh (a.p), india</H5><br>


				<p style="text-align:justify;">
Tirupati was developed by Pallava Kings from 6th century onwards.[citation needed] The city became a 

The temple town for most of the medieval 

The city has many historical temples including the Venkateswara Temple which bears 1,150 inscriptions in Sanskrit, Tamil, Telugu and Kannada languages.[18] Out of 1150 inscriptions 236 belong to Pallava, Chola and Pandya dynasties, 169 belonged to Saluva dynasty, 251 belonged to Achyuta Deva Raya period, 130 belonged to Sadasiva Raya period and another 135 originated in Aravidu dynasty.[18][19] which specify the contributions of the Pallava Kingdom around the ninth century CE, Chola Kingdom around the tenth century CE and the Vijayanagara Empire in the 14th century CE.[20] During the 15th century, Sri Tallapaka Annamacharya sung many songs in praise of the holy town in Telugu. He compared it to be divine, including the rocks, streams, trees, animals, and adds that it is heaven on the earth. One example of such a song is:[21]
</p>	

<a href="#" class="btn btn-success">Darshan Booking</a>				
		<a href="#" class="btn btn-primary">Donation</a>
					
				</div> 


			</div>

	</div>
</div> -->

<br><br><br>
<h1 style="text-align:center;color:#dc3545;"> GALLARY </h1>
<center>
<div class=row style=margin-top:20px;>
	<?php
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
	die("connection failed:");
}
$sql = "SELECT * FROM gallery ORDER BY date DESC";
    $result = $conn->query($sql);
    //shows seva table

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         
    $img=$row["image"];
    echo"<a href=imagedetails.php>";
	echo"<div class=col-lg-4>
      <img src='img/$img' class=img-thumbnail width=300 height=200 border=0 alt=img>
	</div>
	</a>
	
";}
	}
	echo"</div>";
	?>




</center>
<HR>




<!-- end temple body-->




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