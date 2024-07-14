<
    <?php
  // Replace <your_database>, <your_username>, <your_password>, <your_table> with your database credentials and table name respectively

  $conn=new mysqli("localhost","root","","tadb");
      if(mysqli_Connect_error()){
          die("connection failed:");
      }

  if (isset($_POST['submit'])) {
    $id =$_POST['id'];
    $answer = $_POST['answer'];
    $sql = "UPDATE faq SET answers='$answer' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
      header("Location: faq.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
?>
