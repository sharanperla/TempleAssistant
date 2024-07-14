<?php
session_start();

if($_SESSION['status']==true)
{
 $uid = $_SESSION['id'];
 $uname=$_SESSION['fullname'];
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT SUM(price) as total_sum FROM sevabooking WHERE u_id='$uid';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
     $total = $row['total_sum'];
} else {
     echo "No Results!";
}
$_SESSION['spay_mode']='creditcard payment';
include 'creditcardlayout.php';
}
else{
     header('Location: adminlogin.php');
     }
?>

