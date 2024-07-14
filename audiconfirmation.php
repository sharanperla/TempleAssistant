<?php
session_start();

if ($_SESSION['status'] == true) {
    $conn = new mysqli("localhost", "root", "", "tadb");
    if (mysqli_Connect_error()) {
        die("connection failed:");
    }

    $uid = $_SESSION['id'];
    $bookingDate = $_SESSION['audibookingDate'];
    $pdisc = $_SESSION['programdisc'];
    $amount = $_SESSION['aprice'];
    $customerName = $_SESSION['fullname'];
    $customerEmail = $_SESSION['email'];
    $customerPhone = $_SESSION['phone'];
    $paytime = $_SESSION['bookingTime'];
    $status = $_SESSION['paymentType'];
    // Auditorium is available, proceed with booking
    if (isset($_SESSION['apay_mode'])) {
        $pmode = $_SESSION['apay_mode'];
        $sql = "INSERT INTO auditorium (booking_date, booking_time, pdisc,u_id,uname,email,phone,p_status,amount,pmode,created_at) VALUES ('$bookingDate', '$paytime', '$pdisc','$uid', '$customerName','$customerEmail', '$customerPhone','$status','$amount','$pmode',NOW())";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            // Display success message
            echo "<script>alert('Congratulations,your booking has been registered!')</script>";
            echo "<script>window.location.href='audibookingreciept.php'</script>";
        } else {
            echo "failed to request";

        }
    }
} else {
    header('Location: adminlogin.php');
}

?>