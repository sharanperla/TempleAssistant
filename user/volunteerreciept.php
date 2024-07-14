<!DOCTYPE html>
<html>

<head>
	<title>Certificate of Appreciation</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		.container {
			max-width: 800px;
			margin: 0 auto;
			margin-bottom: 10px;
		}

		.cert {
			background-color: #fee;
			padding: 20px;
			border-radius: 10px;
			text-align: center;
		}

		h1 {
			font-size: 36px;
			text-align: center;
			margin-bottom: 50px;
		}

		.cert img {
			max-width: 130px;
			margin-bottom: 20px;
		}

		.signature {
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<h1>you will be provided with participation certificate once the activity is completed!</h1>
	<?php
	session_start();
	if ($_SESSION['status'] == true) {
		$conn = new mysqli("localhost", "root", "", "tadb");
		if (mysqli_Connect_error()) {
			die("connection failed:");
		}
		$uid = $_SESSION['id'];
		$sql="SELECT * FROM registeredvolunteers WHERE u_id ='$uid'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$uname = $row['uname'];
				$v_title = $row['v_title'];
				$v_date = $row['v_date'];
				$v_type = $row['v_type'];
				$orgname = $row['orgname'];
				$v_status = $row['status'];
				$part = $row['part'];
				if ($v_type == 'organization') {
					$name = $orgname;
				} else {
					$name = $uname;
				}
				// if($v_status=='' && $part=='')
				// {
				//     echo"you will be provided with participation certificate once the activity is completed";
				// }
				if ($v_status == 'true' && $part == 'true') {
					echo "<div class=container>
		<div class=cert>
			<img src='C:\Users\ACER\Desktop\project\WhatsApp Image 2023-03-17 at 10.40.59 AM.jpeg' align=left alt='certificate Image'>
			<div>
			<h1>Shri Vanadurgadevi Temple Mithabettu</h1>
			</div>
			<div>
			<h2>Certificate of Appreciation</h2><br><br>
			</div>
			<p>This certificate is awarded to:</p>
			<h3>" . $name . "</h3>
			<p>for your outstanding contribution to our temple as a volunteer:</p>
			<p>for<b> " . $v_title . "</b> which Was Held on <b>" . $v_date . "</b></p>
			<p align=right>Date: <span id=date align=right></span></p>
			<div class=signature>
                 
				 <img src='signature-image.jpg' align='right' alt='Signature'><br></p>
				
				<h4>Committee of shree vanadurgadevi Temple</h4>
			</div>
		</div>
	</div>";
				}
				

			}
		} else {
			echo "you are not registered in any activity";
		}

	} else {
		header('Location: adminlogin.php');
	}
	?>
	<script>
		// Set the current date
		var date = new Date();
		document.getElementById("date").innerHTML = date.toLocaleDateString();
	</script>
	<a href=../generate-pdf.php?i=volunteer>Download pdf</a>;
</body>

</html>