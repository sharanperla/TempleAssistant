<?php
session_start();
if ($_SESSION['status'] == true) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/08ae7c27bc.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href='styles/donation-style.css' rel='stylesheet' />
        <link href='styles/global.css' rel='stylesheet' />
    </head>

    <body>
        <section class="donation-sec">
            <div class="header">
                <a href="userhomepage.php"><img class="go-back-logo" src="https://cdn-icons-png.flaticon.com/512/271/271220.png" width=30px alt="logo" align=left></a>
                DONATION
            </div>

            <?php

            $conn = new mysqli("localhost", "root", "", "tadb");
            if (mysqli_Connect_error()) {
                die("connection failed:");
            }
            ?>
            <div class="card-div">

                <?php
                $sql = "SELECT * FROM donationlist";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div id='card'>";
                        echo "<h1>" . $row["title"] . "</h1>
                        <h6>" . $row["description"] . "</h6>
                        <img src='" . $row["image"] . "'>
                        ";


                ?>
                        <form method='POST' >
                            <div class="input-div">
                                <label>Enter amount:</label>
                                <input type=number name=amount />
                            </div>
                            <input type=hidden name=d_id value='<?= $row['d_id'] ?>' />
            <br>         
            <button id='rzp-button1' type='submit' class='add-to-cart-btn' name=rzp-button1>Online Payment</button>
        </form>
            </div>
           <?php
                    
                } 
            }else {
                    echo "<h6>no activities found</h6>";
                }
                if (isset($_POST['rzp-button1'])) {
                    $d_amt = $_POST['amount'];
                    $d_id = $_POST['d_id'];
                    $_SESSION['d_amt'] = $d_amt;
                    // $_SESSION['damount'] = $d_amt;
                    $payment_mode = "Online Payment";
                }
            } else {
                header('Location: adminlogin.php');
            }
            ?>
</div>
</section>

    <script src=" https://checkout.razorpay.com/v1/checkout.js"></script>
                            <script>
                                var options = {
                                    "key": "rzp_test_9Ardy5e2f0XiRZ", // Enter the Key ID generated from the Dashboard
                                    "amount": "<?= $d_amt * 100 ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
                                    "currency": "INR",
                                    "handler": function(response) {
                                        alert("Payment Successful!");
                                        window.location.href = 'donationinsert.php';
                                    },
                                    "theme": {
                                        "color": "orange"
                                    }
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.on('payment.failed', function(response) {
                                    alert(response.error.code);
                                    alert(response.error.description);
                                    alert(response.error.source);
                                    alert(response.error.step);
                                    alert(response.error.reason);
                                    alert(response.error.metadata.order_id);
                                    alert(response.error.metadata.payment_id);
                                });
                                document.getElementById('rzp-button1').onclick = function(e) {
                                    rzp1.open();
                                    e.preventDefault();
                                }

                                function redirect() {
                                    alert("Order Placed!");
                                }
                            </script>
    </body>

    </html>