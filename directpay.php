<?php
session_start();

if($_SESSION['status']==true)
{
$_SESSION['spay_mode']='directpay';
echo "<script>window.location.href='placeorder.php'</script>";
}
else{
header('Location: adminlogin.php');
}
?>