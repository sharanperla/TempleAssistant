<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    * {
      font-family: poppins light;
    }
  </style>

</head>

<body>

  <div class="container" style="margin-top:5%;">
    <center>
      <div class="row">
        <div class="col-lg-5" style="border: 2px solid black;border-radius: 15px;background: #f2f2f2;box-shadow: 0px 15px 20px rgba(0,0,0,1);padding-bottom: 50px;padding-top: 5px;">
          <div class="title" style="font-size: x-large;font-weight: 600; color:rgb(240, 230, 230);border-radius: 15px 15px 0 0; background:linear-gradient(50deg,#0a99f8, #da07a2);">
            <b style="color:rgb(250, 242, 240);font-size: xx-large;">Temple Assistant</b><br><br>
            <b style="color:yellow;">The comprehencive temple management system!</b>
          </div>
          <!-- form creation -->

          <?php
          $conn = new mysqli("localhost", "root", "", "tadb");
          $error_msg = "";
          if (mysqli_Connect_error()) {
            die("connection failed:");
          } else {
            session_start();
            if (isset($_POST['login'])) {
              $upass = $_POST['upass'];
              $uname = $_POST['uname'];
              if (empty($uname)) {

                die("error:please provide username");
              } else if (empty($upass)) {
                die("error:please provide password");
              } else {
                $sql = "select*from usertable where u_name='$uname'";

                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                  while ($row = $res->fetch_assoc()) {

                    $hash = $row["password"];
                    $uname = $row["u_name"];
                    $utype = $row["utype"];
                    $uid = $row["u_id"];
                    $fullname = $row["name"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                  }
                  if (password_verify($upass, $hash)) {
                    $_SESSION['id'] = $uid;
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['username'] = $uname;
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['status'] = true;

                    if ($utype != 0) {
                      header("Location: admindashboard.php"); //admindashboard.html
                    } else if ($uname == $uname) {
                      header("location:userhomepage.php"); //userhomepage.html
                    } else {
                      $error_msg = "umfi";
                    }
                  } else {
                    $error_msg = "wrong password";
                  }
                } else {
                  $error_msg = "User not found!";
                }
              }
            }
          }
          ?>

          <form method="post" style="margin-top:30px;">

            <div class="form-group col-lg-10">
              <label>Username</label>
              <input type="text" name="uname" id="uname" class="form-control " value="" placeholder="username">
            </div>

            <br>

            <div class="form-group col-lg-10">
              <label>Password</label>
              <input type="Password" name="upass" id="upass" class="form-control " value="" placeholder="Password">
            </div>
            <br>
            <div class="d-grid gap-2 col-10 mx-auto">
              <input type="submit" value="login" class="btn btn-primary" style="color:white;" name="login">
              <!-- <a href="admindashboard.html" class="btn btn-info" name="login">login</a> -->
              <a href="index.php" class="btn btn-primary">Home</a>
              <hr>
              <p><?php echo $error_msg; ?></p>
              <a href="registeration.html">new user?</a><br>
              <a href="forgotpassword.php">forgot password?</a>

            </div>
          </form>

          <!-- form close -->




        </div>

        <div class="col-lg-6" style="padding-top: 70px;padding-left: 100px;">
          <center>
            <img src="img/admin.png" width="568" height="388" border="0" alt="">
          </center>
        </div>

      </div>



  </div>



</body>

</html>