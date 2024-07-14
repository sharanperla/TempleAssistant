<!DOCTYPE html>
<html>

<head>
  <title>Auditorium Booking Confirmation Receipt</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    p {
      margin-bottom: 10px;
    }

    .container {
      border: 2px solid black;
      padding: 2px 2px 2px 2px;
    }
  </style>
</head>

<body>
  <?php
  session_start();

  if ($_SESSION['status'] == true) {
    $conn = new mysqli("localhost", "root", "", "tadb");
    if (mysqli_Connect_error()) {
      die("connection failed:");
    }
    $uid = $_SESSION['id'];
    $sql1 = "select max(a_id) as a_id from auditorium where u_id='$uid'";
    $result = $conn->query($sql1);
    $rowOID = $result->fetch_assoc();
    $a_id = $rowOID['a_id'];
    $sql2 = "select * from auditorium where a_id='$a_id'";
    $result1 = $conn->query($sql2);
    if ($result1->num_rows > 0) {

      while ($row = $result1->fetch_assoc()) {

        $bookeddate = $row['created_at'];
        $eventdate = $row['booking_date'];
        $bookingtime = $row['booking_time'];
        $eventdisc = $row['pdisc'];
        $name = $row['uname'];
        $mail = $row['email'];
        $phone = $row['phone'];
        $ptype = $row['p_status'];
        $paymentmode = $row['pmode'];
        $amount = $row['amount'];
        echo "<div class=container>";
        echo "<h1>Auditorium Booking Receipt</h1>
    <p>Dear $name,</p>
    <p>Thank you for booking the ANNAPOORNA hall for your $eventdisc event on $eventdate.</p>
    <table>
      <tr>
        <th>Booking Details</th>
        <th>Amount</th>g Confir
      </tr>
      <tr>
        <td>Booking Date:</td>
        <td>$bookeddate</td>
      </tr>
      <tr>
        <td>Event Date:</td>
        <td> $eventdate</td>
      </tr>
      <tr>
        <td>Auditorium Name:</td>
        <td>ANNAPOORNA</td>
      </tr>
      <tr>
        <td>Event Type:</td>
        <td>$eventdisc</td>
      </tr>
      <tr>
        <td>Number of Attendees:</td>
        <td>[Number of Attendees]</td>
      </tr>
      <tr>
        <td>Cost:</td>
        <td> $amount as $ptype amount through $paymentmode</td>
      </tr>
    </table>
    <p>Please keep this confirmation receipt for your records. If you have any questions or need to make changes to your booking, please contact us through phone or email.</p>
    <p>Thank you for choosing our auditorium for your event. We look forward to hosting you!</p></div>";
      }
    }
  } else {
    header('Location: adminlogin.php');
  }
  ?>
  <a href="generate-pdf.php?i=audi">Download pdf</a>
</body>

</html>