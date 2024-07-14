<html>
<?php
include 'pmodelayout.html';
?>
<body>
     <form action="paymentmode.php" id="payment-form" method="POST">
          <h1>Select your payment mode</h1>
          <div>
               <input type="radio" name="payment_mode" value="upiPayment" checked>UPI Payment
          </div>
          <div>
               <input type="radio" name="payment_mode" value="creditCard">Bank Transfer
          </div>
          <div>
               <input type="radio" name="payment_mode" value="cod">direct pay
          </div>
          <button type="submit" value="Submit" name="submit">Submit</button>
          <a href=viewcart.php>back</a>
     </form>
<?php
if(isset($_POST['submit'])){
$payment_mode=$_POST['payment_mode'];
if ($payment_mode == "upiPayment") {
    header("Location: upipayment.php");
} elseif ($payment_mode == "creditCard") {
    header("Location: creditcard.php");
} elseif ($payment_mode == "cod") {
    header("Location: directpay.php");
}
}
?>
</body>

</html>