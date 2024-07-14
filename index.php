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
    body {
      font-family: poppins light;
      background-image: url("img/back.jpg");
    }

    .footer {
      background-color: #c9a0f1;
      width: 100%;

    }

    .header {
      background-color: #fcb900;
      width: 100%;

    }


    h3 {
      font-size: 40px;
      color: #dc3545;
    }

    .container {
      margin-left: 0%;
    }

    #icon {
      margin-left: 0%;
      margin-bottom: 12px;
      margin-top: 10px;
    }

    li a {
      text-transform: uppercase;
      font-weight: bold;


    }

    ul {

      background-color: #fcb900;
    }

    /* slideshow */
    #container1 {
      align-items: center;
      margin-left: 35%;
      margin-top: 2%;
      width: 500px;
      overflow: hidden;
      border: 5px groove #ffffff;
      border-radius: 10px;
    }

    .wrapper1 {
      width: 100%;
      display: flex;
      animation: slide1 40s infinite;
    }


    @keyframes slide1 {
      0% {
        transform: translateX(0);
      }

      10% {
        transform: translateX(0);
      }

      20% {
        transform: translateX(-100%);
      }

      30% {
        transform: translateX(-200%);
      }

      40% {
        transform: translateX(-300%);
      }

      50% {
        transform: translateX(-400%);
      }

      60% {
        transform: translateX(-500%);
      }

      70% {
        transform: translateX(-600%);
      }

      80% {
        transform: translateX(-700%);
      }

      90% {
        transform: translateX(-800%);
      }

      100% {
        transform: translateX(-900%);
      }
    }

    .wrapper1>img {
      width: 100%;
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
        <a class="nav-link active" style="color:rgb(11, 11, 11);" aria-current="page" href="index.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color:white;" href="ourfestivals.php">Our Festivals</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:white;" href="temple.php">gallery</a>
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
  <!--slideshow-->
  <div id="container1">
    <div class="wrapper1">
      <img src="img/vanadhurgadevi.jpg">
      <img src="img/s2.jpg">
      <img src="img/s3.jpg">
      <img src="img/s4.jpg">
      <img src="img/s5.jpg">
      <img src="img/v2.jpg">
      <img src="img/vanadhurgadevi.jpg">
      <img src="img/s2.jpg">
      <img src="img/s3.jpg">
      <img src="">
    </div>
  </div>

  <hr>
  <!-- slide show -->
  <!--
<hr>
<br><br><br>
<h1 style="text-align:center;color:#dc3545;"> GALLARY </h1>

<div class="row" style="margin-top:20px;">
	<div class="col-lg-4">
      <img src="img/p1.jpg" class="img-thumbnail"width="300" height="200" border="0" alt="">
	</div>
	<div class="col-lg-4">
<img src="img/p2.jpg" class="img-thumbnail"width="300" height="200" border="0" alt="">
		</div>
	<div class="col-lg-4">
<img src="img/p3.jpg"class="img-thumbnail" width="300" height="200" border="0" alt="">
		</div>

</div>
<div class="row" style="margin-top:20px;">
	<div class="col-lg-4">
      <img src="img/p4.jpg" class="img-thumbnail"width="300" height="200" border="0" alt="">
	</div>
	<div class="col-lg-4">
<img src="img/p5.jpg" class="img-thumbnail"width="300" height="200" border="0" alt="">
		</div>
	<div class="col-lg-4">
<img src="img/p6.jpg"class="img-thumbnail" width="300" height="200" border="0" alt="">
		</div>

</div>



</div>

<HR>
-->


  <div class="footer" style="margin-top:20px;">

    <div class="container" style="margin-top:20px;">
      <div class="row" style="margin-top:20px;">



        <!-- first part-->
        <div class="col-lg-6" style="margin-top:25px;">

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


            <div class="col-lg-6" style="margin-top:25px;">


            </div>



            <div class="col-lg-6" style="margin-top:25px;" text-align="left">

              <h3> GET CONNECTE </H3>

              <i class="fa fa-facebook-square fa-lg" style="margin-right:10px;"></i>Facebook <br>
              <i class="fa fa-twitter fa-lg" style="margin-right:10px;"></i>Twitter<br>

              <i class="fa fa-youtube fa-lg" style="margin-right:10px;"></i>YouTube<br>



              <i class="fa fa-instagram fa-lg" style="margin-right:10px;"></i>Instagram


              </ul>
            </div>


          </div>





        </div>




      </div>
    </div>

  </div>

</body>

</html>