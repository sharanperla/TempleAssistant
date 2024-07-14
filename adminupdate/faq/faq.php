<html>
    <style>
  
  .faq-list {
    list-style: none;
    padding: 0;
  }
  
  .faq-question {
    display: block;
    color:white;
    background: green;
    padding: 10px ;
    margin-bottom: 5px;
    margin-right:40px;
    text-align: left;
    width: 100%;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
  }
  
  .faq-answer {
    display: flex;
    padding: 10px;
    background: #fff;
    border-radius: 5px;
  }
  .faq-section {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background:orange;
}

.faq-section h2 {
  text-align:center;
  font-size: 2em;
  font-weight: bold;
  margin-bottom: 20px;
}

.faq-section ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.faq-section li {
  margin-bottom: 20px;
}

.faq-section h3 {
  font-size: 1.2em;
  font-weight: bold;
  margin-bottom: 10px;
}

.faq-section p {
  margin: 0;
}

.faq-section p.unanswered {
  font-style: Poppins;
}

.faq-section form {
  margin-top: 10px;
}

.faq-section label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

.faq-section textarea {
  display: block;
  width: 100%;
  height: 100px;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px;
}

.faq-section button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 5px 10px;
  border: none;
  width:100px;
  border-radius: 5px;
  cursor: pointer;
  margin-left:45%;
}

    </style>
    <body>
    <a href="../../admindashboard.php"><img class="go-back-logo"
                              src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo"
                              align=left></a>
        <div class="faq-section">
        
  <h2>FAQs</h2>
  <ul>
    <?php
      // Replace <your_database>, <your_username>, <your_password>, <your_table> with your database credentials and table name respectively

      $conn=new mysqli("localhost","root","","tadb");
      if(mysqli_Connect_error()){
          die("connection failed:");
      }

      $sql = "SELECT * FROM faq";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<li>";
          echo "<h3 class=faq-question>" . $row['questions'] . "</h3>";
          if ($row['answers']) {
            echo "<p class=faq-answer>" . $row['answers'] . "</p>";
          } else {
            echo "<p class='unanswered'>This question has not been answered yet.</p>";
            echo "<form method='post' action='faqanswer.php'>";
            echo "<input type='hidden'  name='id' value='" . $row['id'] . "'>";
            echo "<label for='answer'>Answer:</label>";
            echo "<textarea name='answer' rows='4' required></textarea>";
            echo "<button type='submit' name='submit'>Submit</button>";
            echo "</form>";
          }
          echo "</li>";
        }
      } else {
        echo "<p>No FAQs found.</p>";
      }

      mysqli_close($conn);
    ?>
  </ul>
</div>
    </body>
    </html>