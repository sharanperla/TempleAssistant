<?php
if($_SESSION['status']==true)
{
// Initialize database connection
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}
if (isset($_POST['submit'])) {

          $uid = $_SESSION['id'];
          $username = $_SESSION['fullname'];
          $content = $_POST['content'];
          $date = date("Y-m-d H:i:s");
          $email = $_SESSION['email'];

          // Insert the feedback into the database
          $sql = "INSERT INTO feedback (u_id,username, content, date, email) VALUES ('$uid','$username', '$content', '$date', '$email')";
          if ($conn->query($sql) === TRUE) {
               echo "<script>alert('Feedback Submitted.')</script>";
               echo "<script>window.location.href='userhomepage.php#section5'</script>";
          } else {
            
          }
     }
    



?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Feedback</title>
     <link rel="stylesheet" href="style/style.css">
     <style>
          body{
          }
          .forms {

               max-width: 600px;
               margin: 2rem auto;
               font-family: Arial, sans-serif;
          }

          label {
               display: block;
               margin-bottom: 10px;
          }

          input[type=text],
          input[type=email],
          textarea {
               display: block;
               width: 100%;
               padding: 10px;
               margin-bottom: 20px;
               border: 1px solid #ccc;
               border-radius: 4px;
               box-sizing: border-box;
               font-size: 16px;
          }

          input[type=submit] {
               background-color: #4CAF50;
               color: #fff;
               padding: 10px 20px;
               border: none;
               border-radius: 4px;
               cursor: pointer;
               font-size: 16px;
          }

          input[type=submit]:hover {
               background-color: green;
          }
          .feedback-container {
                    display: flex;
                    flex-wrap: wrap;
                    }

                    .feedback-item {
                    margin: 20px;
                    padding: 20px;
                    background-color: #f5f5f5;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width:50%;
                    align:center;
                    }

                    .feedback-item h2 {
                    margin-top: 0;
                    }

                    .feedback-item p {
                    margin-bottom: 0;
                    }
     </style>
</head>
  <body>
     <center>
    <h1>Feedback</h1>
    <div class=col-lg-12>
<form method="post" class="forms">
          <label for="content">Feedback:</label>
          <textarea name="content" required></textarea>
          <input type="submit" name="submitfeedback" value="Submit Feedback">
     </form>
  <?php
  $conn->close();
}else{
    header('Location: adminlogin.php');
}   
?>   

</body>

</html>