<?php
// Include the FPDF library
require('fpdf/fpdf.php');
session_start();
if ($_SESSION['status'] == true) {
     $uid = $_SESSION['id'];
     $conn = new mysqli("localhost", "root", "", "tadb");
     if (mysqli_Connect_error()) {
          die("connection failed:");
     }

     // Start a new PDF document
     $pdf = new FPDF();
     $pdf->AddPage();

     $i = $_GET["i"];
     //seva 
     if ($i == "seva") {
          // Set the font and font size
          $pdf->SetFont('Arial', 'B', 20);
          $pdf->Cell(0, 10, 'SHREE VANADURGA DEVI TEMPLE, MITTABETTU', 1, 1, 'C');
          $pdf->SetFont('Arial', 'B', 13);
          // Add a title to the PDF
          $pdf->Cell(0, 10, 'SEVA RECIEPT', 1, 1, 'C');
          $pdf->Ln();
          $pdf->SetFont('Arial', 'B', 18);

          $pdf->Cell(0, 10, 'User Details', 0, 1, 'C');
          $pdf->Ln();

          // Retrieve the data from the database and add it to the PDF
          $pdf->SetFont('Arial', 'B', 15);
          $sql = "SELECT * FROM sevaorders WHERE u_id ='$uid' and o_id=(select max(o_id) from sevaorders where u_id='$uid')";
          $result = $conn->query($sql);


          if ($row = $result->fetch_assoc()) {
               $pdf->Cell(80, 10, $row['username']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['email']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['phone']);
               $pdf->Ln();

               // Add a line break
               $pdf->Ln();

               // Set the font size for the table
               $pdf->SetFont('Arial', 'B', 18);

               $pdf->Cell(0, 10, 'Booking Details', 0, 1, 'C');
               $pdf->Ln();


               $pdf->SetFont('Arial', 'B', 15);
               $pdf->Cell(40, 10, 'Devotee Name', 1);
               $pdf->Cell(40, 10, $row['phname'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Nakshathra', 1);
               $pdf->Cell(40, 10, $row['nakshathra'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Price', 1);
               $pdf->Cell(40, 10, $row['price'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Payment mode', 1);
               $pdf->Cell(40, 10, $row['payment_mode'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Seva name', 1);
               $pdf->Cell(40, 10, $row['s_name'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Date', 1);
               $pdf->Cell(40, 10, $row['date'], 1);
               $pdf->Ln();
          } else {
               $pdf->Cell(0, 10, 'No Results!', 1);
          }
     }



     //auditorium
     if ($i == "audi") {
          $sql = "SELECT * FROM auditorium WHERE u_id ='$uid' and a_id=(select max(a_id) from auditorium where u_id='$uid')";
          $result = $conn->query($sql);
          // Set the font and font size
          $pdf->SetFont('Arial', 'B', 20);
          $pdf->Cell(0, 10, 'SHREE VANADURGA DEVI TEMPLE, MITTABETTU', 1, 1, 'C');
          $pdf->SetFont('Arial', 'B', 13);
          // Add a title to the PDF
          $pdf->Cell(0, 10, 'AUDITORIUM BOOKING RECIEPT', 1, 1, 'C');
          $pdf->Ln();
          $pdf->SetFont('Arial', 'B', 18);
          $pdf->Cell(0, 10, 'User Details', 0, 1, 'C');
          $pdf->Ln();

          // Retrieve the data from the database and add it to the PDF
          $pdf->SetFont('Arial', 'B', 15);

          if ($row = $result->fetch_assoc()) {
               $pdf->Cell(80, 10, $row['uname']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['email']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['phone']);
               $pdf->Ln();


               // Add a line break
               $pdf->Ln();

               // Set the font size for the table
               $pdf->SetFont('Arial', 'B', 18);

               $pdf->Cell(0, 10, 'Booking Details', 0, 1, 'C');
               $pdf->Ln();


               $pdf->SetFont('Arial', 'B', 15);
               $pdf->Cell(50, 10, 'Booking date', 1);
               $pdf->Cell(50, 10, $row['booking_date'], 1);
               $pdf->Ln();
               $pdf->Cell(50, 10, 'Booking time', 1);
               $pdf->Cell(50, 10, $row['booking_time'], 1);
               $pdf->Ln();
               $pdf->Cell(50, 10, 'Event description', 1);
               $pdf->Cell(50, 10, $row['pdisc'], 1);
               $pdf->Ln();
               $pdf->Cell(50, 10, 'Payment', 1);
               $pdf->Cell(50, 10, $row['p_status'], 1);
               $pdf->Ln();
               $pdf->Cell(50, 10, 'Payment mode', 1);
               $pdf->Cell(50, 10, $row['pmode'], 1);
               $pdf->Ln();
               $pdf->Cell(50, 10, 'Amount', 1);
               $pdf->Cell(50, 10, $row['amount'], 1);
               $pdf->Ln();
          } else {
               $pdf->Cell(0, 10, 'No Results!', 1);
          }

     }


     //volunteer
     if ($i == "volunteer") {
          // Set the font and font size
          $pdf->SetFont('Arial', 'B', 20);
          $pdf->Cell(0, 10, 'SHREE VANADURGA DEVI TEMPLE, MITTABETTU', 1, 1, 'C');
          $pdf->SetFont('Arial', 'B', 13);
          // Add a title to the PDF
          $pdf->Cell(0, 10, 'VOLUNTEER RECIEPT', 1, 1, 'C');
          $pdf->Ln();
          $pdf->SetFont('Arial', 'B', 18);

          $pdf->Cell(0, 10, 'User Details', 0, 1, 'C');
          $pdf->Ln();

          // Retrieve the data from the database and add it to the PDF
          $pdf->SetFont('Arial', 'B', 15);
          $sql = "SELECT * FROM registeredvolunteers WHERE u_id ='$uid' and part='true' AND status='true'";
          $result = $conn->query($sql);


          if ($result) {
               while ($row = $result->fetch_assoc()) {
               $pdf->Cell(80, 10, $row['uname']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['email']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['phone']);
               $pdf->Ln();
               $pdf->SetFont('Arial', 'B', 15);
               $pdf->Cell(40, 10, 'Title', 1);
               $pdf->Cell(40, 10, $row['v_title'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Description', 1);
               $pdf->Cell(40, 10, $row['v_disc'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Date', 1);
               $pdf->Cell(40, 10, $row['v_date'], 1);
               $pdf->Ln();
               $pdf->Cell(40, 10, 'Time', 1);
               $pdf->Cell(40, 10, $row['v_time'], 1);
               $pdf->Ln();
               }
          } else {
               $pdf->Cell(0, 10, 'No Results!', 1);
          }
     }


     //Donation
     if ($i == "donation") {
          $sql = "SELECT * FROM donations WHERE u_id ='$uid' and id=(select max(id) from donations where u_id='$uid')";
          $result = $conn->query($sql);
          // Set the font and font size
          $pdf->SetFont('Arial', 'B', 20);
          $pdf->Cell(0, 10, 'SHREE VANADURGA DEVI TEMPLE, MITTABETTU', 1, 1, 'C');
          $pdf->SetFont('Arial', 'B', 13);
          // Add a title to the PDF
          $pdf->Cell(0, 10, 'DONATION RECIEPT', 1, 1, 'C');
          $pdf->Ln();
          $pdf->SetFont('Arial', 'B', 18);
          $pdf->Cell(0, 10, 'User Details', 0, 1, 'C');
          $pdf->Ln();

          // Retrieve the data from the database and add it to the PDF
          $pdf->SetFont('Arial', 'B', 15);

          if ($row = $result->fetch_assoc()) {
               $pdf->Cell(80, 10, $row['uname']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['email']);
               $pdf->Ln();
               $pdf->Cell(40, 10, $row['phone']);
               $pdf->Ln();


               // Add a line break
               $pdf->Ln();

               // Set the font size for the table
               $pdf->SetFont('Arial', 'B', 18);

               $pdf->Cell(0, 10, 'Donation info', 0, 1, 'C');
               $pdf->Ln();


               $pdf->SetFont('Arial', 'B', 15);
               $pdf->Cell(55, 10, 'Title', 1);
               $pdf->Cell(55, 10, $row['title'], 1);
               $pdf->Ln();
               $pdf->Cell(55, 10, 'Description', 1);
               $pdf->Cell(55, 10, $row['disc'], 1);
               $pdf->Ln();
               $pdf->Cell(55, 10, 'Amount', 1);
               $pdf->Cell(55, 10, $row['amount'], 1);
               $pdf->Ln();
               $pdf->Cell(55, 10, 'Payment mode', 1);
               $pdf->Cell(55, 10, $row['pmode'], 1);
               $pdf->Ln();
               $pdf->Cell(55, 10, 'Date of payment', 1);
               $pdf->Cell(55, 10, $row['created_at'], 1);
          } else {
               $pdf->Cell(0, 10, 'No Results!', 1);
          }

     }
     // Output the PDF document
     $pdf->Output();
} else {
     header('Location: adminlogin.php');
}
?>