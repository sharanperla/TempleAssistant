<?php
if(isset($_POST['paynow']))
{
echo "<script>alert('Order Placed!');</script>";
echo "<script>window.location.href='waste.php'</script>";

}