<!-- ?ssphp
if (!isset($_SESSION['admin_id'])) {
	 header('Location: login.php');
	 exit();
}
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>temple assistant</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="" rel="stylesheet">
</head>
<style>
	body {
		margin: 0;
		padding: 0;
		font-family: 'Montserrat', sans-serif;
		background: #e3e9f7;
	}

	nav ul {
		margin: 0;
		padding: 0;
		height: 100%;
		width: 260px;
		position: fixed;
		top: 0;
		left: 0;
		background-color: #fcb900;
	}

	nav ul li {
		list-style: none;
	}

	nav ul li a {
		display: block;
		font-family: 'Montserrat', sans-serif;
		text-decoration: none;
		text-transform: uppercase;
		font-size: 20px;
		color: #fff;
		position: relative;
		padding: 25px 0 25px 38px;
	}

	nav ul li a:before {
		content: '';
		position: absolute;
		top: 0px;
		right: 0px;
		width: 0%;
		height: 100%;
		background: #e3e9f7;
		border-radius: 40px 0px 40px 40px;
		z-index: -1;
		transition: all 300ms ease-in-out;
	}

	nav ul li a:hover {
		color: #2b2626;
	}

	nav ul li a:hover:before {
		width: 95%;
	}

	.wrapper {
		margin-left: 260px;
	}

	.section {
		display: grid;
		place-items: center;
		min-height: 100vh;
		text-align: center;
	}

	.box-area h2 {
		text-transform: uppercase;
		font-size: 50px;
	}

	.box-area p {
		line-height: 2;
	}

	.box-area {
		width: 75%;
	}

	.logo {
		width: 100px;
		height: 100px;
		border-radius: 20%;
		overflow: hidden;
		margin: 25px auto;
	}

	.logo img {
		width: 100%;
	}

	.box-area2 .content {
		position: relative;
		margin-top: 10vh;
		min-height: 90vh;
		margin-bottom: 250px;
	}

	.box-area2 .content .cards {
		padding: 20px 15px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-wrap: wrap;

	}

	.box-area2 .content .cards .card {
		width: 250px;
		/* height: 150px; */
		background: red;
		margin: 20px 10px;
		display: flex;
		align-items: center;
		justify-content: space-around;
		box-shadow: 0 4px 8px 0;

	}

	.box-area3 .content {
        margin-left:200px;
		position: relative;
		margin-top: 10vh;
		min-height: 90vh;
	}

	.box-area3 .content .cards {
		padding: 20px 15px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-wrap: wrap;
	}

	.box-area3 .content .cards .card {
		width: 800px;
		height: 50px;
		background: red;
		margin: 20px 10px;
		display: flex;
		align-items: center;
		justify-content: space-around;
		box-shadow: 0 4px 8px 0;
	}

	.box-area4 .content {

		position: relative;
		margin-top: 10vh;
		min-height: 90vh;
	    margin-left:200px;
		
	}

	.box-area4 .content .cards {
		padding: 20px 15px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-wrap: wrap;
	}

	.box-area4 .content .cards .card {
		width: 800px;
		height: 50px;
		background: red;
		margin: 20px 10px;
		display: flex;
		align-items: center;
		justify-content: space-around;
		box-shadow: 0 4px 8px 0;
	}

	a {
		text-decoration: none;
		color: black;
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
	.templehead{
          font-size: 2rem;
		  font-weight: bold;
	}
	.icon-btn {
    display: flex;
    width: 96%;
    flex-direction: row-reverse;
    align-items: flex-end;
	margin-top:10px;
}
.btn {
    outline: none;
    border: none;
    background-color: transparent;
}
#reports{

}
</style>
<body>
	<?php
	session_start();
	if ($_SESSION['status'] == true) {

		?>
		<div class="icon-btn">
                    <form method='post' action='logoutuser.php'>
                        <button type="submit" name="logout_btn_user" class="logout-btn btn"><img style="width: 60px;"
                                src="components/logout.png"></button>
                    </form>
                </div>
		<nav>
			<ul>
				<li class="logo"><img alt="hello" src="img/img_325798.png"></li>
				<li>
					<a href="#dashboard"><i class="fa fa-dashboard"></i>   dashboard</a>
				</li>
				<li>
					<a href="#about"><i class="fa fa-book"></i>   View</a>
				</li>
				<li>
					<a href="#userManagement"><i class="fa fa-users"></i>   update</a>
				</li>
				<li>
					<a href="#reports"><i class="fa fa-picture-o"></i>   report</a>
				</li>
				<li>
					<a href="adminupdate/faq/faq.php"><i class="fa fa-phone"></i>   FAQ</a>
				</li>
				<li>
					<a href="adminupdate/feedback/viewfeedback.php"><i class="fa fa-comments-o"></i> feedbacks</a>
				</li>
			</ul>
		</nav>
		<div class="wrapper">
			<div id="homePage">
				<div class="box-area">
					<h2 style="color: #2b2626"></h2>


				</div>
			</div>
			<div id="dashboard">
				<div class="box-area2">
					<center>
						<h2 class=templehead>SHREE VANADURGADEVI TEMPLE MITTABETTU</h2>
						<img style="width: 200px;" src="img/taicon.jpg">
						<div class="content">
							<div class="cards">
								<a href="order/manage.php">
									<div class="card">
										<div class="box">
											<center>
												<?php
												//display seva count in dashboard
												$conn = new mysqli("localhost", "root", "", "tadb");
												if (mysqli_Connect_error()) {
													die("connection failed:");
												} else {
													$sql = "SELECT count(o_id) FROM sevaorders";
													$result = $conn->query($sql);
													$row = mysqli_fetch_row($result);
													if ($row) {

														echo "<h1 background-color: transparent; border:none;'><i class='fa fa-briefcase' style='width: 30px;'></i></h1>";
														echo "<h3>" . $row[0] . "</h3>";
														echo "<h3>total number of seva booked<br></h3>";
													}


												}
												?>
										</div>
									</div>
								</a>
								<a href="adminupdate/auditoriumbooking/auditoriummanage.php">
									<div class="card">
										<div class="box">
											<center>
												<?php
												//display auditorium booking  count in dashboard
												$conn = new mysqli("localhost", "root", "", "tadb");
												if (mysqli_Connect_error()) {
													die("connection failed:");
												} else {
													$sql = "SELECT count(a_id) FROM auditorium";
													$result = $conn->query($sql);
													$row = mysqli_fetch_row($result);
													if ($row) {
														echo "<h1 background-color: transparent; border:none;'><i class='fa fa-leanpub' style='width: 30px;'></i></h1>";
														echo "<h3>$row[0]</h3>";
														echo "<h3>total number of auditorium booked<br></h3>";
													}


												}
												?>
										</div>
									</div>
								</a>
								<a href="adminupdate/volunteer/viewvolunteers.php">
									<div class="card">
										<div class="box">
											<center>
												<?php
												//display volunteer count in dashboard
												$conn = new mysqli("localhost", "root", "", "tadb");
												if (mysqli_Connect_error()) {
													die("connection failed:");
												} else {
													$sql = "SELECT count(v_id) FROM registeredvolunteers";
													$result = $conn->query($sql);
													$row = mysqli_fetch_row($result);
													if ($row) {
														echo "<h1 background-color: transparent; border:none;'><i class='fa fa-users' style='width: 30px;'></i></h1>";
														echo "<b>$row[0]<b>";
														echo "<h3>total number of volunteer registered<br></h3>";
													}


												}
												?>
										</div>
									</div>
								</a>
								<div class="card">
									<a href="adminupdate/donations/viewdonations.php">
										<div class="box">
											<center>
												<?php
												$sql = "SELECT count(id) FROM donations";
												$result = $conn->query($sql);
												$row = mysqli_fetch_row($result);
												if ($row) {
													echo "<h1 background-color: transparent; border:none;'><i class='fa fa-handshake-o' style='width: 30px;'></i></h1>";
													echo "<b>$row[0]<b>";
													echo "<h3>total number of donations<br></h3>";
												}
												?>
										</div>
									</a>
								</div>
							</div>
							<div>
								<?php
								// Set up database connection
								$conn = new mysqli("localhost", "root", "", "tadb");
								if (mysqli_Connect_error()) {
									die("connection failed:");
								} else {
									// Query the database for the latest 10 items in the orders table
									$sql = "SELECT * FROM sevaorders ORDER BY created_at DESC LIMIT 10";
									$result = $conn->query($sql);

									// Display the results in an HTML table
							
									echo " <center>";
									echo "<h1>latest seva bookings</h1>";
									echo "<table class='order-news' border=1>";
									echo "<tr>
               <th>Booking ID</th>
               <th>user ID</th>
               <th>date</th>
               <th>seva Name</th>
               <th>on the name of</th>
               <th>nakshathra</th>
               <th>username</th>
               <th>phone</th>
               <th>email</th>
               <th>price</th>
               <th>payment mode</th>
               <th>booking time</th>
               </tr>";
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											echo "<tr class='order-res'>
						 <td>" . $row["o_id"] . "</td>
                         <td>" . $row["u_id"] . "</td>
                         <td>" . $row["date"] . "</td>
                         <td>" . $row["s_name"] . "</td>
                         <td>" . $row["phname"] . "</td>
                         <td>" . $row["nakshathra"] . "</td>
                         <td>" . $row["username"] . "</td>  
                         <td>" . $row["phone"] . "</td>  
                         <td>" . $row["email"] . "</td>   
                         <td>" . $row["price"] . "</td>
                         <td>" . $row["payment_mode"] . "</td> 
                         <td>" . $row["created_at"] . "</td> 
                         </tr>";
										}
									} else {
										echo "<tr><td colspan='6'>No results found.</td></tr>";
									}
									echo "</table>";

									// Query the database for the latest 10 items in the orders table
									$sql2 = "SELECT * FROM auditorium ORDER BY created_at DESC LIMIT 10";
									$result2 = $conn->query($sql2);
									echo "<h1>latest auditorium bookings</h1>";
									// Display the results in an HTML table
							
									echo "<table class='order-new' border=1>";
									echo "<tr>
               <th>Booking ID</th>
               <th>Booking date</th>
               <th>Booking type</th>
               <th>program discription</th>
               <th>username</th>
               <th>email</th>
               <th>phone</th>
               <th>payment type</th>
               <th>amount</th>
               <th>payment mode</th>
               <th>Booking date</th>
               </tr>";
									if ($result2->num_rows > 0) {
										while ($row = $result2->fetch_assoc()) {
											echo "<tr class='order-res'>
                         <td>" . $row["a_id"] . "</td>
                         <td>" . $row["booking_date"] . "</td>
                         <td>" . $row["booking_time"] . "</td>
                         <td>" . $row["pdisc"] . "</td>
                         <td>" . $row["uname"] . "</td>
                         <td>" . $row["email"] . "</td>
                         <td>" . $row["phone"] . "</td>  
                         <td>" . $row["p_status"] . "</td>  
                         <td>" . $row["amount"] . "</td>   
                         <td>" . $row["pmode"] . "</td>
                         <td>" . $row["created_at"] . "</td> 
                         </tr>";
										}
									} else {
										echo "<tr><td colspan='6'>No results found.</td></tr>";
									}
									echo "</table>";

								}
								// Close database connection
								$conn->close();
								echo " </div>";
								?>
							</div>
						</div>
						<hr>
				</div><br><br>
				<div id="about">
					<div class="box-area3">

						<h2 style="color: #2b2626"></h2>
						<div class="content">
							<div class="cards">
								<div class="card">
									<a href="order/manage.php">
										<div class="box">
											<h1>View seva bookings</h1>
										</div>
									</a>
								</div>
								<div class="card">
									<a href="adminupdate/auditoriumbooking/auditoriummanage.php">
										<div class="box">
											<h1>View auditorium bookings</h1>
										</div>
								</div>
								</a>
								<div class="card">
									<a href="adminupdate/volunteer/viewvolunteers.php">
										<div class="box">
											<h1>View registered volunteers</h1>
										</div>
								</div>
								</a>
								<div class="card">
									<a href="adminupdate/donations/viewdonations.php">
										<div class="box">
											<h1>View donations</h1>
										</div>
								</div>
								</a>
							</div>
						</div>
						<div id="userManagement">
							<div class="box-area4">
								<h2 style="color: #2b2626"></h2>
								<div class="content">
									<div class="cards">
										<a href="adminupdate/seva.php">
											<div class="card">
												<div class="box">
													<h1>update sevalist</h1>
												</div>
											</div>
										</a>
										<a href="adminupdate/auditoriumbooking/updateaudiprice.php">
											<div class="card">
												<div class="box">
													<h1>update auditorium</h1>
												</div>

											</div>
										</a>
										<a href="adminupdate/volunteer/volunteer.php">
											<div class="card">
												<div class="box">
													<h1>update volunteer slot</h1>
												</div>

											</div>
							</a>
											<a href="adminupdate/gallery/updategallery.php">
												<div class="card">
													<div class="box">
														<h1>Update gallery</h1>
													</div>
												</div>
											</a>
											<a href="adminupdate/users/manageuser.php">
												<div class="card">
													<div class="box">
														<h1>Manage user</h1>
													</div>
												</div>
											</a>
											<a href="adminupdate/volunteer/volunteerpart.php">
											<div class="card">
												<div class="box">
													<h1>update volunteer attendence</h1>
												</div>

											</div>
							</a>
									</div>
								</div>
							</div>
						</div>
<div id=reports>
<?php
include 'adminupdate/reports/sevareport.php';
include 'adminupdate/reports/auditoriumreport.php';
include 'adminupdate/reports/donationreport.php';
include 'adminupdate/reports/volunteersreport.php';


?>
							</div>



					</div>
					<?php

	} else {
		header('Location: adminlogin.php');
	}

	?>

</body>

</html>