<?php
session_start();
if ($_SESSION['status'] == true) {
	?>
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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<style>
			* {
				font-family: poppins light;
			}

			input {
				width: 30%;
				height: 50px;
				border-radius: 10px;
				opacity: 80%;
				align: center;
			}

			label {
				color: black;
				font-size: 1.5em;
			}

			table tr:nth-child(even) {
				background-color: #f2f2f2;

			}

			table {
				width: 80%;
			}

			table tr:nth-child(even) {
				background-color: #f2f2f2;


			}

			table tr th {
				background-color: yellow;
			}
		</style>

	</head>

	<body>

		<div class="container" style="margin-top:5%;">

			<center>
				<div class="row">
					<div class="col-lg-12"
						style="border: 2px solid black;border-radius: 15px;background: #f2f2f2;box-shadow: 0px 15px 20px rgba(0,0,0,1);padding-bottom: 50px;padding-top: 5px; background:linear-gradient(to right,#f9d423 0%,#ff4e50 100%);">
						<div class="title"
							style="font-size: x-large;font-weight: 600; color:rgb(240, 230, 230);border-radius: 15px 15px 15px 15px; background:linear-gradient(315deg,#20bf55 0%,#01baef 74%);">
							<b style="color:rgb(250, 242, 240);font-size: xx-large;">BOOK AUDITORIUM HERE</b><br><br>
						</div>

						<!-- Display calendar for selecting booking date and time -->
						<form method="post" action="auditorium.php" align=center id='bookauditorium'>
							<label for="booking_date">Booking Date:</label>
							<input type="date" id="booking_date" name="booking_date" required><br><br>
							<label for="pdisc">PROGRAM DESCRIPTION</label>
							<input type="text" id="pdisc" name="pdisc" required><br><br>

							<!-- <script type="text/javascript">
						function calculatePrice() {
							// Get the booking type and payment type selected by the user
							var bookingType = document.getElementById("bookingType").value;
							var paymentType = document.getElementById("paymentType").value;
							// Calculate the price based on the booking type and payment type
							var price = 0;
							if (bookingType == "fullday") {
								price = 20000;
							} else if (bookingType == "morning") {
								price = 10000;
							} else if (bookingType == "night") {
								price = 12000;
							}

							if (paymentType == "advance") {
								price *= 0.25; // 10% discount for advance payment
							}

							// Display the price on the page
							document.getElementById("price").innerHTML = "$" + price.toFixed(2);
							var formData = new FormData();
							formData.append("price", price);
							var xhr = new XMLHttpRequest();
							xhr.open("POST", "auditorium.php");
							xhr.send(formData);
							var otherForm = document.getElementById("bookauditori");
							var priceInput = document.createElement("input");
							priceInput.setAttribute("type", "hidden");
							priceInput.setAttribute("name", "price");
							priceInput.setAttribute("value", price.toFixed(2));
							otherForm.appendChild(priceInput);
						}
						</script> -->

							<!-- <form method='POST'> -->
							<label for="bookingType">Booking Type:</label>
							<select id=bookingType name=bookingType
								style="width:30%;height:50px;border-radius:10px;opacity:80%; align:center;">
								<option value="morning" SELECTED>Morning(9.00am-3.00pm)</option>
								<option value="night">Night(6.00pm-10.00pm)</option>
							</select>
							<br>
							<br><label for="paymentType">Payment Type:</label>
							<select id="paymentType" name="paymentType"
								style="width:30%;height:50px;border-radius:10px;opacity:80%; align:center;">
								<option value="advance">Advance Payment</option>
								<option value="fullpayment">Full Payment</option>
							</select>
							<br>
							<br><button type="submit" name='pricesubmit'
								style="width:30%;height:50px;border-radius:10px;opacity:100%; align:center;background-color:green;color:white;">Price</button>
							<br>
						</form>
						<?php
						if (isset($_POST["pricesubmit"])) {
							$conn=new mysqli("localhost","root","","tadb");
							if(mysqli_Connect_error()){
								die("connection failed:");
							}
					   
							$sql = "SELECT morningprice, nightprice FROM auditoriumprice";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								 while ($row = $result->fetch_assoc()) {
									$morning=$row['morningprice'];
									$night=$row['nightprice'];
								 }
								}
							$booking_date = $_POST["booking_date"];
							$pdisc = $_POST["pdisc"];
							$bookingType = $_POST["bookingType"];
							$paymentType = $_POST["paymentType"];
							$_SESSION['bookingTime']=$bookingType;

                        // Calculate the price based on the booking type and payment type
						$price=0;
							if ($bookingType == "morning") {
								$price = $morning;
							} else if ($bookingType == "night") {
								$price = $night;
							}

							if ($paymentType == "advance") {
								$price *= 0.25; // 25%  for advance payment
							}
						}
						?>

						<?php
						if (isset($price)) {
							echo "<p>$price</p>";
						}
						?>

						<?php
						if (isset($_POST["pricesubmit"])) {
							$_SESSION["audibookingDate"] = $booking_date;
							$_SESSION["programdisc"] = $pdisc;
							$_SESSION["programdisc"] = $pdisc;
							$_SESSION["aprice"] = $price;
							$_SESSION["paymentType"] = $paymentType;
							?>
							<form action="audipaymentmode.php">
								<input type="hidden" name="bookingType" value="<?php echo $bookingType; ?>">
								<input type="hidden" name="paymentType" value="<?php echo $paymentType; ?>">
								<input type="hidden" name="booking_date" value="<?php echo $booking_date; ?>">
								<input type="hidden" name="pdisc" value="<?php echo $pdisc; ?>">
								<input type="submit" value="submit" />
								
							</form>
							<?php
						}
						?>
						<center>
					</div>
				</div>
				<br><br>
				<?php
				if (isset($_POST['price'])) {

					$a = $_POST['price'];
					$paymentType = $_POST['paymentType'];
					$_SESSION['aprice'] = $a;
					// if(!empty($_POST['bookingType'];)
					$b = $_POST['bookingType'];
					$_SESSION['audibookingtime'] = $b;
					$_SESSION['audipaymentType'] = $_POST['paymentType'];

				}

				?>


				<center>
					<?php
					$conn = new mysqli("localhost", "root", "", "tadb");
					if (mysqli_Connect_error()) {
						die("connection failed:");
					}
					echo "<br><h1>upcoming events</h1>";
					$sql1 = "SELECT * FROM auditorium";
					$result1 = mysqli_query($conn, $sql1);
					echo "<table  border=2px>";
					echo "<tr>
<th>DATE</th>
<th>TIME</th>
<th>Description</th>
</tr>";

					if ($result1->num_rows > 0) {
						while ($row = $result1->fetch_assoc()) {
							echo "<tr>
<td>" . $row["booking_date"] . "</td>
<td>" . $row["booking_time"] . "</td>
<td>" . $row["pdisc"] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "";
					}
					echo "</div>";
				
} else {
	header('Location: adminlogin.php');
}

?>


</body>

</html>