<?php
session_start();
if($_SESSION['status']==true)
{

	$conn=new mysqli("localhost","root","","tadb");
		if(mysqli_Connect_error()){
			die("connection failed:");
		}

$uid = $_SESSION['id'];

// If user confirms deletion, delete user account from database
if (isset($_POST['confirm-delete'])) {
     $sql = "DELETE FROM usertable WHERE u_id='$uid'";

     if ($conn->query($sql) === TRUE) {
          //Account deleted successfully, log the user out
          session_unset();
          session_destroy();
          header("Location: adminlogin.php");
          exit();
     } else {
          echo "Error deleting account: " . $conn->error;
     }
}

$conn->close();
}
else{

	header('Location: ../adminlogin.php');
}
?>

<!DOCTYPE html>
<html>

<head>
     <title>Delete Account</title>
     <link rel="stylesheet" href="style/style.css">
     <style>
          body {
               min-height: 100vh;
               display: flex;
               align-items: center;
               justify-content: center;
          }

          div {
               display: flex;
               align-items: center;
               justify-content: center;
               flex-direction: column;
               background-color: orange;
               padding: 2rem;
               border-radius: 15px;
          }

          div p {
               text-align: center;
               display: flex;
               align-items: center;
               justify-content: center;
               flex-direction: column;
               margin: 1rem 0;
          }

          .delete-acc-btn {
               padding: 10px 20px;
               margin-bottom: 10px;
          }
     </style>
</head>

<body>

     <div>

          <h1>Delete Account</h1>
          <p>Are you sure you want to delete your account? This action cannot be undone. <br>
               All your past order details wil be erased and cannot be recovered back.</p>
          <form method="POST">
               <input type="submit" class="delete-acc-btn" name="confirm-delete" value="Yes, Delete My Account">
          </form>
          <a href="userprofile.php">Cancel</a>
     </div>
</body>

</html>