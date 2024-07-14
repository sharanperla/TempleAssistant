<html>

<head>
  <meta charset="UTF-8">
  <title>temple assistant</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<style>
  .del-btn {
    /* color:red;
     width:80px;
     height:60px; */
    background: transparent;
    border: none;
    color: red;
    font-size: 2rem;

  }

  .feedback-container {
    display: flex;
    flex-wrap: wrap;
    border: 10px black;
    margin-left: 100px;
  }

  .feedback-item {

    margin: 20px;
    padding: 20px;
    border: 2px black;
    background-color: #f5f5f5;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    align: center;

  }

  .feedback-item h2 {
    margin-top: 0;
  }

  .feedback-item p {
    margin-bottom: 0;
  }

  body {
    font-family: poppins light;
    background-color: #a8aa;
  }

  th {
    font-family: "Poppins";
    padding: 15px 0;
    background-color: orange;
    color: white;
    text-align: center;
  }

  tr td {
    text-align: center;
    padding: 15px 0;
    font-weight: 500;
  }

  tr:nth-of-type(even) {
    background-color: #ffbd86;
  }
</style>

<body>
  <div class="feedback-container">
    <?php
    $conn = new mysqli("localhost", "root", "", "tadb");
    if (mysqli_Connect_error()) {
      die("connection failed:");
    }
    //Retrieve feedback from database
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);
    // Display feedback in HTML
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        echo "<div class='feedback-item'>";
        echo "<h2>" . $row["username"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<form method='POST' align=right>
                              <input type='hidden' name='fid' value='" . $row["feedback_id"] . "'>
                              <button  type='submit' class='del-btn' name=del-btn style='background-color: transparent; border:none;'><i class='fa fa-trash'></i></button>
                             
                         </form>";
        echo "</div>";
      }
    } else {
      echo "No feedback found.";
    }
    ?>
    <?php
    if (isset($_POST['del-btn'])) {
      $id = $_POST['fid'];
      $sql = "DELETE FROM feedback WHERE feedback_id='$id'";
      $result1 = $conn->query($sql);
      if ($result1) {
        echo "<script>alert('Removed!')</script>";
        echo "<script>window.location.href='viewfeedback.php'</script>";

      } else {
        echo "Failed to remove product!";
      }
    }
    ?>
  </div>
</body>

</html>