<?php
session_start();
if($_SESSION['status']==true)
{
if(isset($_POST['add-btn'])){
$uname=$_SESSION['fullname'];
        $email=$_SESSION['email'];
        $phone=$_SESSION['phone'];
		$uid=$_SESSION['id'];
        $vtype=$_POST['volunteer-type'];
		$orgname=isset($_POST['org-name']) ? $_POST['org-name'] : '';
		$orgdisc=isset($_POST['orgdisc']) ? $_POST['orgdisc'] : '';
		$orgcount=isset($_POST['org-count']) ? $_POST['org-count'] : '';
		if(isset($_POST['v_id'])){
            
  $conn=new mysqli("localhost","root","","tadb");
  if(mysqli_Connect_error()){
      die("connection failed:");
  }
		$v_id=isset($_POST['v_id']) ? $_POST['v_id'] : '';
		if($vtype=='individual')
         { 
		$sql="select * from registeredvolunteers where u_id='$uid' AND v_id='$v_id'";
		 }
		// $sqlo="select*from registeredvolunteers where u_id='$uid' && v_id='$v_id' && v_type='organization' && orgname='$orgname'";
		// $resulto= $conn->query($sqlo);
		$result= $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<script>alert('you where already registered!');</script>";
			echo "<script>window.location.href='volunteer.php'</script>";
		}
		// }elseif ($resulto->num_rows > 0){
        //     echo "<script>alert('this organisation is already registered on this activity!');</script>";
		// 	echo "<script>window.location.href='volunteer.php'</script>";
		// }
		else{
			$sqli="select * from volunteer where v_id='$v_id'";
		$result1= $conn->query($sqli);
		if ($result1->num_rows > 0) {
			 while ($row = $result1->fetch_assoc()) {
				$v_id = $row['v_id'];
				$title = $row['v_title'];
				$vdisc = $row['v_disc'];
				$date = $row['v_date'];
				$time = $row['v_time'];
			    
					 $sql = "INSERT INTO registeredvolunteers (u_id,uname,email,phone,v_id,v_title,v_disc,v_date,v_time,v_type,orgname,orgdisc,volcount,created_at) VALUES ('$uid','$uname','$email','$phone','$v_id', '$title', '$vdisc', '$date','$time','$vtype','$orgname','$orgdisc','$orgcount',NOW())";
					 $updateQty = "UPDATE volunteer  SET v_count = v_count-1 WHERE v_id = '$v_id'";
					 if ($conn->query($sql) === TRUE) {
						  $conn->query($updateQty);
						  
						  echo "<script>alert('registered successfully!');</script>";
						  
						  echo "<script>window.location.href='volunteerreciept.php'</script>";
					 } else {
						  echo "Error in registeration: " . $conn->error;
					 }
				}
		    
	  }
	}
	}
	  else {
		echo "no activities found!";
   } 
}
}else{
	header('Location: adminlogin.php');
	}
   ?>