<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href='../styles/donation-style.css' rel='stylesheet' />
  <link href='../styles/global.css' rel='stylesheet' />
  <style>
    body {
      background-image: url("../img/back.jpg");
    }

    #card {

      margin: 2rem;
      padding: 2rem 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      border: 2px solid black;
      border-radius: 15px;
      background: #f2f2f2;
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 1);
      background: orange;
    }

    #card:hover {
      box-shadow: 5px -1px 20px 5px rgba(0, 0, 0, 0.096);
    }

    #card h1 {
      font-size: 1.5rem;
      text-align: center;
    }

    #card h2 {
      color: #fda11c;
      font-size: 2rem;
      margin: 10px 0;
      text-align: center;
    }
    .add-btn{
      width:80px;
      margin-right:80px;
      border-radius:10px;
    }
  </style>
</head>

<body>
  <section class="donation-sec">
    <div class="header">
      <a href="../userhomepage.php"><img class="go-back-logo" src="https://cdn-icons-png.flaticon.com/512/271/271220.png"
          width=30px alt="logo" align=left></a>
      Volunteer REGISTERATION
    </div>
    <?php

    // session_start();
// if($_SESSION['status']==true)
// {
    

    $conn = new mysqli("localhost", "root", "", "tadb");
    if (mysqli_Connect_error()) {
      die("connection failed:");
    } ?>
    <div class="card-div">
      <?php
      $sql = "SELECT * FROM volunteer where v_count>0";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div id='cardtwo'>";
          echo "<tr class='order-res'>
                  <h1>" . $row["v_title"] . "</h1>
                  <h6>discription:" . $row["v_disc"] . "</h6>
                  <h6>date:" . $row["v_date"] . "</h6>
                  <h6>time:" . $row["v_time"] . "</h6>";

                      echo "<form method='POST' action='volunteerinsert.php'>
                              <input type=hidden value='individual' name='volunteer-type' placeholder='individual'>         
          <h6 style='margin-left:6rem;'>
          <input type='hidden' name='v_id' value='" . $row["v_id"] . "'/>
								  <button type='submit' class='add-btn' name='add-btn'>submit</button>
							 </form></h6>
               </div>";
        }
      } else {
        echo "<h6>no activities found</h6>";
      }




      // }else{
// 	header('Location: adminlogin.php');
// 	}
      
      ?>
  </section>
  </div>
</body>

</html>