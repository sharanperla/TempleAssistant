     <?php
     session_start();
     if (isset($_POST['logout_btn_user'])) {
          session_destroy();
          header("Location: adminlogin.php");
          exit();
     }
     ?>
