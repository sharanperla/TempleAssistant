<?php
session_start();
if ($_SESSION['status'] == true) {
	$u_id = $_SESSION['id'];
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title> Donation Receipt</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				background-color: #f2f2f2;
			}

			.container {
				max-width: 800px;
				border: 2px solid black;
				margin: auto;
				padding: 20px;
				background-color: #fff;
				box-shadow: 0px 0px 5px #ccc;
				margin: 50px auto;
				max-width: 800px;
			}

			h1 {
				text-align: center;
				color: #8b0000;
			}

			.table {
				width: 100%;
				border-collapse: collapse;
				margin-top: 20px;
			}

			.table th,
			.table td {
				padding: 8px;
				text-align: left;
				border-bottom: 1px solid #ddd;
			}

			.table th {
				background-color: #f2f2f2;
				color: #8b0000;
			}

			.amount {
				color: #8b0000;
				font-weight: bold;
			}

			.paragraphs {
				margin-top: 20px;
				padding-top: 20px;
				border-top: 1px solid #ddd;
				align: center;
			}

			.paragraphs p {
				margin: 0;
				color: #666;
				font-size: 18px;
				line-height: 1.5;
				text-align: center;
				text-justify: inter-word;
			}

			.info {
				font-size: 24px;
				text-align: center;
				margin-bottom: 50px;
			}

			.signature {
				text-align: right;
				margin-top: 50px;
				font-size: 24px;
				font-weight: bold;
			}

			.signature img {
				width: 200px;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<center>
				<h1>Shree Vanadurgadevi Temple Mithabettu</h1>
				<h2>Pilathabettu village,Bantwal Taluk,Nayanadu Post, <br>
					Dakshina Kannada-574233.</h2>
				<div>
					<img src="C:\Users\ACER\Desktop\project\WhatsApp Image 2023-03-17 at 10.40.59 AM.jpeg" width="150"
						height="200">
				</div>
				<div>
					<h2>Donation Receipt</h2>
				</div>
				<?php
				$conn = new mysqli("localhost", "root", "", "tadb");
				if (mysqli_Connect_error()) {
					die("connection failed:");

				}
				$sql = "SELECT max(id) as id FROM donations WHERE u_id='$u_id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$id = $row['id'];
				}
				$sql2 = "select * from donations where id='$id'";
				$result1 = $conn->query($sql2);
				if ($result1->num_rows > 0) {

					while ($row = $result1->fetch_assoc()) {
						$name = $row['uname'];
						$email = $row['email'];
						$phone = $row['phone'];
						$title = $row['title'];
						$amount = $row['amount'];
						$pmode = $row['pmode'];
						$date = $row['created_at'];

						echo "<table class='table'>
			<tr>
				<th>Date:</th>
				<td>" . $date . "</td>
			</tr>
			<tr>
				<th>Donor Name:</th>
				<td>$name</td>
			</tr>
			<tr>
				<th>Email Address:</th>
				<td>$email</td>
			</tr>
			<tr>
				<th>Phone Number:</th>
				<td>$phone</td>
			</tr>
			<tr>
				<th>Donation Amount:</th>
				<td class='amount'>₹$amount</td>
			</tr>
			<tr>
				<th>Payment Method:</th>
				<td>$pmode</td>
			</tr>
            <tr>
				<th>For:</th>
				<td>$title</td>
			</tr>
		</table>";


						?>
						<div class="paragraphs">
							<p>We want to express our sincerest thanks for your generous donation to our Temple. Your support is
								invaluable to us as it helps us to maintain and improve our facilities and services for the
								community.
								We want to assure you that your donation will be used responsibly and effectively
							<p>Once again, thank you for your kindness and support.</p>
						</div>

						<center>
							<br>
							<p>Seva Committee of Shree Vanadurgadevi Temple</p>
						</center>
						<div>
							<br><img src="https://example.com/signature.png" alt="Signature" align="right" width="200"
								height="100"><br><br><br>
						</div>

				</div>

				<div>
					<center>
						<a href=userhomepage.php>back</a>
					<?php }
				} else {
					echo "no result";
				}

} else {
	header('Location: adminlogin.php');
}
?>

			<a href="generate-pdf.php?i=donation">Download pdf</a>
</body>

</html>