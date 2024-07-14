<?php
 $conn=new mysqli("localhost","root","","tadb");
 if(mysqli_Connect_error()){
     die("connection failed:");}
$s_id = $_POST['del_sid'];
$phname = $_POST['phname'];

$sql = "DELETE FROM sevabooking WHERE s_id='$s_id' &&  phname='$phname'";
$result = $conn->query($sql);
// $updateQty = "UPDATE products  SET qty = qty +'$qty' WHERE p_id = '$p_id'";
if ($result) {
     // $conn->query($updateQty);
     header('Location: viewcart.php');
} else {
     echo "Removing item failed!";
}

$conn->close();
?> 