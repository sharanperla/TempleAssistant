<?php
if(isset($_POST['submit'])){
$_SESSION['donationamount']=$_POST['d_amt'];

$payment_mode=$_POST['payment_mode'];
if ($payment_mode == "upiPayment") {
    
    header("Location: dupipayment.php");
} elseif ($payment_mode == "creditCard") {
    header("Location: dcreditcard.php");
} 
}
?>