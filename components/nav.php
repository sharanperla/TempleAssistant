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
background-color: #a8aa;

 
}
a{
	text-decoration: none;
	color: black;
}
.card {
	width: 500px;
	height: 50px;
	background: red;
	margin: 20px 10px;
	display: flex;
	align-items: center;
	justify-content: space-around;
	box-shadow: 0 4px 8px 0;
}
.footer{
background-color:#c9a0f1;
width:100%;

}
.header{
background-color:#fcb900;
width:100%;

}
.image img{
	
	border-radius: 8px;
	border: 1px solid #ddd;
	padding: 10px;
	width: 500px;
	box-shadow: 0 4px 8px 0;
}
.image img:hover{
	box-shadow: 0 0 2px 1px rgba(0,140,186,0.5);
}
.image h1{
	color: black;
} 
h3{
font-size:40px;
color:#dc3545;
}
#section1 h4{
	color:#dc3545;
}
#icon{
margin-left:20%;
margin-bottom:12px;
margin-top:10px;
}
.logout{
	margin-left:500px;
	margin-top:50px;
}
.profile{
	margin-left:250px;
	margin-top:30px;
}
.bar{
	padding-left: 30px;
	background-color: #dc3545;
	font-size: xx-large;
	
}
.dropdown-menu{
	width: 50%;
	background-color: rgb(58, 121, 194);
}

.seva table,th,td{

	width: 50%;
	padding: 10px 10px;
	padding-bottom: 1px;
	padding-top: 1px;
	border: 2px solid;
	box-shadow: 0 4px 8px 0;

}
.seva th{
	background-color: #e96010cb;
}
.seva td{
background-color: #fcb900;
text-align: center;}
#button{
	background-color: green;
}
.cart{
	float: right;
}

.volunteer table,th,td{
border-radius: 10%;
width: 50%;
padding: 10px 10px;
padding-bottom: 1px;
padding-top: 1px;
border: 2px solid;
box-shadow: 0 4px 8px 0;

}
.volunteer th{
	background-color: #e96010cb;
}
.volunteer td{
background-color: #fcb900;
text-align: center;}
#section{
	border: 1px solid black;
	border-radius: 15px;
	background: #f2f2f2;
	/* box-shadow: 0px 15px 20px rgba(0,0,0,1); */
	padding-bottom: 50px;
	padding-top: 5px; 
	background-image:url("img/back.jpg");
	
	
	
}
#section1{
	height:1000px;
	border: 1px solid black;
	border-radius: 15px;
	background-image:url("img/back.jpg");
	/* box-shadow: 0px 15px 20px rgba(0,0,0,1); */
	padding-bottom: 50px;
	padding-top: 5px; 
	/* background:skyblue; */
	
}
#section2{
	/* height:1000px; */
	border: 1px solid black;
	border-radius: 15px;
	background: #f2f2f2;
	/* box-shadow: 0px 15px 20px rgba(0,0,0,1); */
	padding-bottom: 50px;
	padding-top: 5px; 
	/* background:skyblue; */
	background-image:url("img/back.jpg");
}

#section3{
	height:740px;
	border: 1px solid black;
	border-radius: 15px;
	background: #f2f2f2;
	/* box-shadow: 0px 15px 20px rgba(0,0,0,1); */
	padding-bottom: 50px;
	padding-top: 5px; 
	background-image:url("img/back.jpg");
}
#section4{
	height:740px;
	border: 1px solid black;
	border-radius: 15px;
	background: #f2f2f2;
	/* box-shadow: 0px 15px 20px rgba(0,0,0,1); */
	padding-bottom: 50px;
	padding-top: 5px; 
	background-image:url("img/back.jpg");
}
#section5{
	height:300px
	border: 1px solid black;
	border-radius: 15px;
	background: #f2f2f2;
	/* box-shadow: 0px 15px 20px rgba(0,0,0,1); */
	padding-bottom: 50px;
	padding-top: 5px; 
	background-image:url("img/back.jpg");}
.heading{
	text-align:center;
	color:red;
	text-shadow:2px 2px black;
    font-weight:bold;
	font-size:40px;
}
.cart{
	margin-left:90%;
}

#scroll-up {
			display: none;
			position: fixed;
			bottom: 20px;
			right: 30px;
			z-index: 99;
			font-size: 18px;
			border: none;
			outline: none;
			background-color: orange;
			color: #fff;
			cursor: pointer;
			padding: 15px;
			border-radius: 10px;
		}

		#scroll-up:hover {
			background-color: red;
		}
.order-res tr:nth-child(even) no{background-color:#f2f2f2;

}

</style>

</head>
<body>
	<div class="header">
			<div class="container">
					<div class="row">

						<div class="col-lg-6">
								<img src="img/icon.png" width="70" height="70" id="icon" class="rounded" border="0" alt="TA">
								<h3>Temple Assistant</h3>
						</div>
						<div class="col-lg-1">
						<div class="logout">
							<form method='post' action='logoutuser.php'>
						 <button style="background-color: transparent; border:none;" type="submit" name="logout_btn_user" class="logout-btn"><img style="width: 30px;" src="components/logout.png"></button> 
					         </form> 
	                     </div>
	                   </div>
					   <div class="col-lg-1">
						 <div class=profile>
						<form method=post action=user/userprofile.php>
						<button style="background-color: transparent; border:none;" type="submit" name="userprofile" class="profil"><img style="width: 60px;" src="components/profile.png"></button>
	                     </form>
						</div>
						</div>
						
					</div>	
                  
			</div>
			<!-- container -->
</div>