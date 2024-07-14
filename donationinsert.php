<?php
session_start();
if ($_SESSION['status'] == true) {
	$u_id = $_SESSION['id'];
	$d_id = 1;
	$d_amt = $_SESSION['d_amt'];
	$p_mode = "Online";
	$uname = $_SESSION['fullname'];
	$email = $_SESSION['email'];
	$phone = $_SESSION['phone'];


	$conn = new mysqli("localhost", "root", "", "tadb");
	if (mysqli_Connect_error()) {
		die("connection failed:");
	}
	$sqli = "select*from donationlist where d_id='$d_id'";
	$result1 = $conn->query($sqli);
	if ($result1->num_rows > 0) {
		while ($row = $result1->fetch_assoc()) {
			$title = $row['title'];
			$vdisc = $row['description'];

			$sql = "INSERT INTO donations (d_id,u_id,uname,email,phone,title,disc,amount,pmode,created_at) VALUES ('$d_id','$u_id','$uname','$email','$phone','$title', '$vdisc', '$d_amt','$p_mode',NOW())";
			$conn->query($sql);

			echo "<script>alert('payment succesfull!');</script>";

			echo "<script>window.location.href='donationreciept.php'</script>";
		}
	} else {
		echo "Error in registeration: " . $conn->error;
	}
} else {
	header('Location: adminlogin.php');
}
?>