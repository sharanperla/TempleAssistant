<?php
session_start();
if ($_SESSION['status'] == true) {
    $conn = new mysqli("localhost", "root", "", "tadb");
    if (mysqli_Connect_error()) {
        die("connection failed:");
    }

    ?>
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
    <link href='styles/global.css' rel="stylesheet" />
    <link href='styles/userhomepage.css' rel="stylesheet" />
</head>

<body>
    <div class="header">
        <div class="container-div">

            <div class="icon-title">
                <img src="img/icon.png" width="60" height="60" id="icon" class="rounded" border="0" alt="TA">
                <h3>Temple Assistant</h3>
            </div>
            <div class="icon-btn">

                <div class="logout">
                    <form method='post' action='logoutuser.php'>
                        <button type="submit" name="logout_btn_user" class="logout-btn btn"><img style="width: 60px;"
                                src="components/logout.png"></button>
                    </form>
                </div>

                <div class=profile>
                    <form method=post action=user/userprofile.php>
                        <button type="submit" name="userprofile" class="profile btn"><img style="width: 60px;"
                                src="components/profile.png"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bar">
        <div class="fa fa-bars" style="color:white;" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false"> menu</div>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#section">HOME</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#section1">SEVA</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#section2">AUDITORIUM</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#section3">VOLUNTEER REGISTERATION</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#section4">DONATION</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#section5">ABOUT</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#section6">FEEDBACK</a></li>

        </ul>

    </div>
    <!-- close bar -->


    <div id="section">
        <div class="row">
            <div class="cart-title" name=cart-title>
                <div><a href=viewcart.php><i class="fa fa-archive" style="color:black;font-size:60px;"></i><br>Arpana
                        pathra</a></div>
            </div>
        </div>
        <div class="image">
            <h1>SHREE VANADURGADEVI TEMPLE, MITTHABETTU</h1>

            <img src="img/vanadhurgadevi.jpg" />
        </div>
    </div>

    <div id="section1">

        <div class=phnameform>
            <form method=post>
                <input type='text' name='phname' placeholder='enter name of devotee'
                    style='width:30%;height:50px;border-radius:10px;opacity:80%; ' required></input>
                <input type=text name=nakshathra placeholder='enter nakshathra'
                    style='width:30%;height:50px;border-radius:10px;opacity:80%; color:black;' required></input>
                <input type=date name=wantdate
                    style='width:30%;height:50px;border-radius:10px;opacity:80%; color:black;' required></input>
                <input type=submit name=datesub value=submit
                    style='width:10%;height:50px;border-radius:10px;opacity:80%;color:black;background-color:green; margin-top: 30px;'></input>
            </form>
        </div>
        <!-- </div> -->



        <?php
            if (isset($_POST['datesub'])) {
                $_SESSION['datesub'] = $_POST['wantdate'];
                $_SESSION['phname'] = $_POST['phname'];
                $_SESSION['naksh'] = $_POST['nakshathra'];
            }


            if (isset($_SESSION['datesub'])) {
                $conn = new mysqli("localhost", "root", "", "tadb");
                if (mysqli_Connect_error()) {
                    die("connection failed:");
                } else {
                    $selecteddate = $_SESSION['datesub'];
                    echo "<div class=heading>";
                    echo "<br>";
                    echo "<center>";
                    //echo "<h1 class=heading>".date("d/m/Y")."</h1>";
                    date_default_timezone_set("Asia/kolkata");
                    //echo "<h2>".date("l")."</h2><br>".date("h:i:sa")."<br>";
                    $hr = date("H");
                    echo "</div>";
                    //****************************condition morning,afternoon,or evening*********************************8
                    if ($hr <= 7) {
                        echo "<center>";
                        echo "<h1>good morning</h1>";
                        echo "<h2>available seva list on $selecteddate</h2>";
                        echo "<h4 alig=left>MORNING</h4>";
                        $sql = "SELECT * FROM sevalist where p_type='morning' && qty>0 && date='$selecteddate'";
                        $result = $conn->query($sql);
                        //shows seva table
                        echo "<table class='order-header' border=1px >";
                        echo "<tr>
<th>seva ID</th>
<th>Seva Name</th>
<th>Description</th>
<th>Price</th>
<th>book</th>
</tr>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-res'>
    <td>" . $row["s_id"] . "</td>
    <td>" . $row["s_name"] . "</td>
    <td>" . $row["descr"] . "</td>
    <td>" . $row["price"] . "</td>";
                                echo " <td>
	<form method=post action=cart.php>
	<input type='hidden' name='s_id' value='" . $row["s_id"] . "'>
	<input type='hidden' name='date' value='" . $row["date"] . "'>
	<div><input type='submit' class='add-btn' name='add-btn' /></div>
	 </form>
	 </td>
	  </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No results found.</td></tr>";
                        }

                        echo "</table>"; //closes morning table
        
                        echo "<h4 align=left>afternoon</h4>";
                        $sql = "SELECT * FROM sevalist where p_type='afternoon' && qty>0 && date='$selecteddate'";
                        $result = $conn->query($sql);
                        //shows seva table
                        echo "<table class='order-header' border=1px>";
                        echo "<tr>
<th>seva ID</th>
<th>Seva Name</th>
<th>Description</th>
<th>Price</th>
<th>book</th>
</tr>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-res'>
<td>" . $row["s_id"] . "</td>
<td>" . $row["s_name"] . "</td>
<td>" . $row["descr"] . "</td>
<td>" . $row["price"] . "</td>";


                                echo "<form method=post action=cart.php>";
                                echo " <td><input type='hidden' name='s_id' value='" . $row["s_id"] . "'>
<input type='hidden' name='date' value='" . $row["date"] . "'>
 <input type='submit' class='add-btn' name='add-btn' ></input>
</form>
 </td>
  </tr>";
                            } //close while
        
                        } //seva avail
                        else {
                            echo "<tr><td colspan='7'>No results found.</td></tr>";
                        }
                        //closes afternoon table
                        echo "</table>";
                        echo "<h4 align=left>evening</h4>";
                        $sql = "SELECT * FROM sevalist where p_type='evening' && qty>0 && date='$selecteddate'";
                        $result = $conn->query($sql);
                        //shows seva table
                        echo "<table class='order-header' border=1px>";
                        echo "<tr>
<th>seva ID</th>
<th>Seva Name</th>
<th>Description</th>
<th>Price</th>
<th>book</th>
</tr>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-res'>
<td>" . $row["s_id"] . "</td>
<td>" . $row["s_name"] . "</td>
<td>" . $row["descr"] . "</td>
<td>" . $row["price"] . "</td>";

                                echo "<form method=post action=cart.php>";
                                echo " <td><input type='hidden' name='s_id' value='" . $row["s_id"] . "'>
				 <input type='hidden' name='date' value='" . $row["date"] . "'>
				  <input type='submit' class='add-btn' name='add-btn' ></input>
				</form>
				  </td>
				   </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No results found.</td></tr>";
                        }
                        //closes evening table
                        echo "</table>";
                        //closes evenng table
                        //         $uid=$_SESSION['id'];
                        //         $sid = isset($_POST['s_id']) ? $_POST['s_id'] : '';
                        // 		$sql1="select*from sevalist where s_id='$sid'";
                        // 		$result= $conn->query($sql1);
                        //         if ($result->num_rows > 0) {
                        //              while ($row = $result->fetch_assoc()) {
                        // 				$s_id = $row['s_id'];
                        // 				$s_name = $row['s_name'];
                        // 				$quantity = $_POST['qty'];
                        // 				$price = $row['price'];
                        // 				$total = $row['price'] * $quantity;
                        // 				if ($quantity>$row['qty']) {
                        // 					 echo "<script>alert('out of stock!')</script>";
                        // 					 //header("Location: userhomepage.php");
                        // 				} else {
                        // 					 $sql = "INSERT INTO sevabooking (s_id, u_id,  s_name, qty, price,total) VALUES ('$sid', '$uid', '$s_name', '$quantity', '$price','$total')";
                        // 					 $updateQty = "UPDATE sevalist  SET qty = qty-'$quantity' WHERE s_id = '$s_id'";
                        // 					 if ($conn->query($sql) === TRUE) {
                        // 						  $conn->query($updateQty);
                        // 						  echo "<script>alert('added to cart!')</script>";
        
                        // 					 } else {
                        // 						  echo "Error adding to cart: " . $conn->error;
                        // 					 }
                        // 				}
                        // 		   } 
                        // 	  }//eva availability
                        // 	  else {
                        // 		echo "Product not found!";
                        //    }
        
                    }
                    //*********************************closes morning condition,checks afternoon**************************************
                    else if ($hr <= 12 && $hr > 7) {
                        echo "<center>";

                        if ($hr >= 12) {
                            echo "<h2>Good after noon</h2>";
                        } else {
                            echo "<h2>Good morning</h2>";
                        }

                        echo "<h2>ailable seva list on $selecteddate</h2>";
                        echo "<h4 align=left>afternoon</h4>";
                        $sql = "SELECT * FROM sevalist where p_type='afternoon' && qty>0 && date='$selecteddate'";
                        $result = $conn->query($sql);
                        //shows seva table
                        echo "<table class='order-header' border=1px>";
                        echo "<tr>
<th>seva ID</th>
<th>Seva Name</th>
<th>Description</th>
<th>Price</th>
<th>book</th>
</tr>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-res'>
    <td>" . $row["s_id"] . "</td>
    <td>" . $row["s_name"] . "</td>
    <td>" . $row["descr"] . "</td>
    <td>" . $row["price"] . "</td>";


                                echo "<form method=post action=cart.php>";
                                echo " <td><input type='hidden' name='s_id' value='" . $row["s_id"] . "'>
	<input type='hidden' name='date' value='" . $row["date"] . "'>
	 <input type='submit' class='add-btn' name='add-btn' ></input>
   </form>
	 </td>
	  </tr>";
                            } //close while
        
                        } //seva avail
                        else {
                            echo "<tr><td colspan='7'>No results found.</td></tr>";
                        }
                        //closes afternoon table
                        echo "</table>";
                        echo "<h4 align=left>evening</h4>";
                        $sql = "SELECT * FROM sevalist where p_type='evening' && qty>0 && date='$selecteddate'";
                        $result = $conn->query($sql);
                        //shows seva table
                        echo "<table class='order-header' border=1px>";
                        echo "<tr>
<th>seva ID</th>
<th>Seva Name</th>
<th>Description</th>
<th>Price</th>
<th>book</th>
</tr>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-res'>
    <td>" . $row["s_id"] . "</td>
    <td>" . $row["s_name"] . "</td>
    <td>" . $row["descr"] . "</td>
    <td>" . $row["price"] . "</td>";

                                echo "<form method=post action=cart.php>";
                                echo " <td><input type='hidden' name='s_id' value='" . $row["s_id"] . "'>
				 <input type='hidden' name='date' value='" . $row["date"] . "'>
				  <input type='submit' class='add-btn' name='add-btn' ></input>
				</form>
				  </td>
				   </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No results found.</td></tr>";
                        }
                        //closes evening table
                        echo "</table>";




                        //         $uid=$_SESSION['id'];
        
                        //         $sid = isset($_POST['s_id']) ? $_POST['s_id'] : '';
                        // 		$sql1="select*from sevalist where s_id='$sid'";
                        // 		$result= $conn->query($sql1);
                        //         if ($result->num_rows > 0) {
                        //              while ($row = $result->fetch_assoc()) {
                        // 				$s_id = $row['s_id'];
                        // 				$s_name = $row['s_name'];
                        // 				$quantity = $_POST['qty'];
                        // 				$price = $row['price'];
                        // 				$total = $row['price'] * $quantity;
                        // 				if ($quantity>$row['qty']) {
                        // 					 echo "<script>alert('out of stock!')</script>";
                        // 					 //header("Location: userhomepage.php");
                        // 				} else {
                        // 					 $sql = "INSERT INTO sevabooking (s_id, u_id,  s_name, qty, price,total) VALUES ('$sid', '$uid', '$s_name', '$quantity', '$price','$total')";
                        // 					 $updateQty = "UPDATE sevalist  SET qty = qty-'$quantity' WHERE s_id = '$s_id'";
                        // 					 if ($conn->query($sql) === TRUE) {
                        // 						  $conn->query($updateQty);
                        // 						  echo "<script>alert(added to cart!)</script>";
        
                        // 					 } else {
                        // 						  echo "Error adding to cart: " . $conn->error;
                        // 					 }
                        // 				}//quantity availability
                        // 		   }//close while 
                        // 	  }//close if
                        // 	  else {
                        // 		echo "Product not found!";
                        //    }
        

                    } else if ($hr > 12 && $hr < 24) {
                        //********************************closes afternoon checks evening******************************************
                        echo "<center>";

                        if ($hr >= 16) {
                            echo "<h1>Good evening</h1>";
                        } else {
                            echo "<h1>good afternoon</h1>";
                        }

                        echo "<h2>available seva list on $selecteddate</h2>";
                        echo "<h4 align=left>evening</h4>";
                        $sql = "SELECT * FROM sevalist where p_type='evening' && qty>0 && date='$selecteddate'";
                        $result = $conn->query($sql);
                        //shows seva table
                        echo "<table class='order-header' border=1px>";
                        echo "<tr>
			 <th>seva ID</th>
			 <th>Seva Name</th>
			 <th>Description</th>
			 <th>Price</th>
			 <th>count</th>
			 </tr>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-res'>
				 <td>" . $row["s_id"] . "</td>
				 <td>" . $row["s_name"] . "</td>
				 <td>" . $row["descr"] . "</td>
				 <td>" . $row["price"] . "</td>";


                                echo "<td>
				 <form method=post action=cart.php>
							<input type='hidden' name='s_id' value='" . $row["s_id"] . "'>
							<input type='hidden' name='date' value='" . $row["date"] . "'>
							<div class='add-btn'><input type='submit' name='add-btn'/></div>
				</form>
				  </td>
				   </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No results found.</td></tr>";
                        }
                        //closes evening table
                        echo "</table>";




                        // 	 $uid=$_SESSION['id'];
        
                        // 	 $sid = isset($_POST['s_id']) ? $_POST['s_id'] : '';
                        // 	 $sql1="select*from sevalist where s_id='$sid'";
                        // 	 $result= $conn->query($sql1);
                        // 	 if ($result->num_rows > 0) {
                        // 		  while ($row = $result->fetch_assoc()) {
                        // 			 $s_id = $row['s_id'];
                        // 			 $s_name = $row['s_name'];
                        // 			 $quantity = $_POST['qty'];
                        // 			 $price = $row['price'];
                        // 			 $total = $row['price'] * $quantity;
                        // 			 if ($quantity>$row['qty']) {
                        // 				  echo "<script>alert('out of stock!')</script>";
                        // 				  //header("Location: userhomepage.php");
                        // 			 } else {
                        // 				  $sql = "INSERT INTO sevabooking (s_id, u_id,  s_name, qty, price,total) VALUES ('$sid', '$uid', '$s_name', '$quantity', '$price','$total')";
                        // 				  $updateQty = "UPDATE sevalist  SET qty = qty-'$quantity' WHERE s_id = '$s_id'";
                        // 				  if ($conn->query($sql) === TRUE) {
                        // 					   $conn->query($updateQty);
                        // 					   echo "<script>alert(added to cart!)</script>";
        
                        // 				  } else {
                        // 					   echo "Error adding to cart: " . $conn->error;
                        // 				  }
                        // 			 }//quantity availability
                        // 		}//close while 
                        //    }//close if
                        //    else {
                        // 	 echo "Product not found!";
                        // }
        













                    }
                    //****************closes evening******************/
                    else {
                        echo "sorry,the seva list of the date is not available";
                    }
                } //datbase connection
        
            } //if date is not inserted
        

            ?>

    </div>
    <!-- closes section1 -->
    <div class="phnameform" id="section2">

        <h1> BOOK AUDITORIUM HERE </h1>
        <!-- auditorium details -->
        <h4><b>NAME:</b>ANNAPOORNA</h4>
        <h4><b>LOCATION:</b> MITTABETTU</h4>
        <h4><b>CONTACT:</b> 8590830065</h4>
        <h4><b>EMAIL:</b> VDMAUDIT@GMAIL.COM</h4>
        <h4><b>TOTAL CAPACITY:</b> 500<h4>
                <a href=auditorium.php class="card">
                    BOOK NOW
                </a>

                <!--close row-->

    </div>
    <!--close container-->



    </div>
    <!--close section2-->
    <!---------------------------------------------------------------------------------------------------------------------------------------------------->
    <div id="section3">
        <div class="container" style="margin-top:5px;">
            <center>
                <div class="row">
                    <div class="col-lg-12"
                        style="border: 2px solid black;border-radius: 15px;background: #f2f2f2;box-shadow: 0px 15px 20px rgba(0,0,0,1);padding-bottom: 100px;padding-top: 5px;margin-top:100px; background:orange;height:100%;">
                        <div class="image"><img src=img/back.jpg width=50px height=200px></div>
                        <!-- auditorium details -->
                        <h4><b>Volunteers are the backbone of our temple, their selfless dedication and tireless efforts
                                help us to build a strong foundation for the growth and development of our community.
                                Join us in this noble cause and become a part of the positive change that we want to
                                bring in the world</b>
                            <h4>
                                <a href=user/volunteer.php>
                                    <div class="card">
                                        register as a volunteer
                                    </div>
                                </a>
                    </div>
                </div>
                <!--close row-->

                <div class="col-lg-6" style="padding-top: 70px;padding-left: 100px;"></div>

        </div>
        <!--close container-->
        <!-- 
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}
    echo"<center>";
     echo"<h1>VOLUNTEER REGISTERATION</h1>";
        
        $sql = "SELECT * FROM volunteer where v_count>0";
        $result = $conn->query($sql);
        //shows seva table
        echo "<table class='order-header' border=1px>";
        echo "<tr>
    <th>title</th>
    <th>discription</th>
    <th>date</th>
    <th>time</th>
    <th>vcount</th>
    <th>register</th>
    </tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc  ()) {
             echo "<tr class='order-res'>
        <td>" . $row["v_title"] . "</td>
        <td>" . $row["v_disc"] . "</td>
        <td>" . $row["v_date"] . "</td>
        <td>" . $row["v_time"] . "</td>
        <td>" . $row["v_count"] . "</td>
        
        <form method='POST' action=user/volunteer.php>
                        
                                  <td><input type='hidden' name='v_id' value='" . $row["v_id"] . "'>
                                  <button type='submit' class='add-btn'>register</button>
                             </form>
                                  </td>
                                   </tr>";}
        }
        else{
            echo"<tr><td>no activities found</td><tr>";
        }
        $uname=$_SESSION['fullname'];
        $email=$_SESSION['email'];
        $phone=$_SESSION['phone'];
        $uid=$_SESSION['id'];
        if(isset($_POST['v_id'])){
        $v_id=isset($_POST['v_id']) ? $_POST['v_id'] : '';
        $sql1="select*from volunteer where v_id='$v_id'";
        $result= $conn->query($sql1);
        if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                $v_id = $row['v_id'];
                $title = $row['v_title'];
                $vdisc = $row['v_disc'];
                $date = $row['v_date'];
                $time = $row['v_time'];
              
                     $sql = "INSERT INTO registeredvolunteers (u_id,uname,email,phone,v_id,v_title,v_disc,v_date,v_time) VALUES ('$uid','$uname','$email','$phone','$v_id', '$title', '$vdisc', '$date','$time')";
                     $updateQty = "UPDATE volunteer  SET v_count = v_count-1 WHERE v_id = '$v_id'";
                     if ($conn->query($sql) === TRUE) {
                          $conn->query($updateQty);
                          echo "<script>alert(registerd successfully!)</script>";
                          echo "<script>windows.location.href=userhomepage</script>";
                          echo "<script>alert('registerd successfully!')</script>";
                          
                     } else {
                          echo "Error in registeration: " . $conn->error;
                     }
                }
            
      }
    }
      else {
        echo "no activities found!";
   } -->




        <br>
    </div>

    </div>
    <!-- close section 3 -->
    <!------------------------------------------------------------------------------------------------------------------------------------------>
    <div id="section4">
        <div class="container" style="margin-top:5px;">
            <center>
                <div class="row">
                    <div class="col-lg-12"
                        style="border: 2px solid black;border-radius: 15px;background: #f2f2f2;box-shadow: 0px 15px 20px rgba(0,0,0,1);padding-bottom: 100px;padding-top: 5px;margin-top:100px; background:orange;height:100%;">
                        <div class="image"><img src=img/back.jpg width=50px height=200px></div>
                        <!-- auditorium details -->
                        <h4><b>"Generosity is not just an act, it's a way of life. By donating to the temple, we give
                                not only to our community but also to our own spiritual growth and well-being."</b>
                            <h4>
                                <a href=donation.php>
                                    <div class="card">
                                        contribute
                                    </div>
                                </a>
                    </div>
                </div>
                <!--close row-->
        </div>
        <!-- <div class="col-lg-6" style="padding-top: 70px;padding-left: 100px;"></div> -->

    </div>
    <div id="section5">
        <div class="container" style="margin-top:5px;">
            <center>
                <div class="row">
                    <div class="col-lg-12"
                        style="border: 2px solid black;border-radius: 15px;background: #f2f2f2;box-shadow: 0px 15px 20px rgba(0,0,0,1);padding-bottom: 100px;padding-top: 5px;margin-top:100px; background:orange;height:100%;">

                        <div class="row" style="margin-top:30px;">
                            <h2 style="text-align:center;color:white;">About Us</h2>
                            <div class="image1"><img src=img/taicon.jpg  width=400px height=400px></div>
                            <p style="text-align:justify;margin-top:10px;">
                            
                            Vanadurga Devi is a Hindu goddess who is worshipped as a form of the divine mother. She is believed to be a powerful deity who protects her devotees from harm and grants their wishes. According to Hindu mythology, Vanadurga is one of the nine forms of Durga, the supreme goddess of Hinduism. She is depicted as a fierce warrior goddess who rides on a lion and carries weapons in her multiple hands. She is also associated with the forests and is said to have the power to control wild animals and protect the environment. Vanadurga is worshipped during the festival of Navaratri, which is celebrated for nine days in honor of the nine forms of Durga. Devotees offer prayers, perform rituals, and offer food and other offerings to seek her blessings and protection. The worship of Vanadurga is particularly popular in the Indian states of Karnataka and Andhra Pradesh, where she is revered as a local deity.


                            </p>
                        </div>

                    </div>
                </div>
                <!--close row-->
        </div>
        <!-- <div class="col-lg-6" style="padding-top: 70px;padding-left: 100px;"></div> -->

    </div>
    <div id="section6">
        <div class=container
            style="border: 2px solid black;border-radius: 15px;background: #f2f2f2;box-shadow: 0px 15px 20px rgba(0,0,0,1);padding-bottom: 100px;padding-top: 5px;margin-top:100px; background:orange;height:100%;">
            <?php
                include 'user/feedback.php';
                ?>
        </div>


    </div>
    <div id="section6">
        <div class=container
            style="border: 2px solid black;border-radius: 15px;background: #f2f2f2;box-shadow: 0px 15px 20px rgba(0,0,0,1);padding-bottom: 100px;padding-top: 5px;margin-top:100px; background:orange;height:100%;">
            <div class="faq-section">
                <h2>Frequently Asked Questions</h2>
                <ul class="faq-list">
                    <?php
    $conn=new mysqli("localhost","root","","tadb");
    if(mysqli_Connect_error()){
        die("connection failed:");
    }
    echo"<div class='faq-section'>
  <h2>Add a New FAQ</h2>
  <form method=post >
    <label for=question>Question:</label>
    <input type=text name=question required>
    <button type=submit name='submitfaq' >Submit</button>
  </form>
</div>";
 $sql8= "SELECT * FROM faq";
      $result8 = mysqli_query($conn, $sql8);
      if (mysqli_num_rows($result8) > 0) {
        while($row = mysqli_fetch_assoc($result8)) {
            $question=$row['questions'];
            $answer=$row['answers'];
            echo"<div class=faq-section><li class=faq-list>";
          echo '<p class=faq-question>'.$question.'</p></li><p faq-answer><li class=faq-list>'.$answer.'</p></li>';
        }
      } else {
        echo "No FAQs found";
      }
  
      if(isset($_POST['submitfaq'])){
         $question =$_POST['question'];
         $sql = "INSERT INTO faq(questions) VALUES ('$question')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Faq added succesfuly.')</script>";
        echo "<script>window.location.href='userhomepage.php#section6'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
?>

                </ul>
            </div>

        </div>


    </div>
    </div>
    <button type=hidden id="scroll-up" title="Go to top"><i class='fa fa-arrow-up'></button>
    <script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scroll-up").style.display = "block";
        } else {
            document.getElementById("scroll-up").style.display = "none";
        }
    }

    document.getElementById("scroll-up").addEventListener("click", function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
    </script>
    <!--------------------------------------------------------------------close section4--------------------------------------------------------->
    <?php
} else {
    header('Location: adminlogin.php');
}

?>
</body>

</html>