<?php
$con = new mysqli("localhost", "root", "", "tadb");
    if ($con->connect_errno) {
        die("Not connected");
    }
    if (isset($_POST['signin'])) {
        $fullname = $_POST["fullname"];
        $uname = $_POST["uname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $city =$_POST["city"];
        $country=$_POST["country"];
        $password = $_POST["password"];
        $confirm = $_POST["confirm"];

        //generating unique userid
        $sql = "select max(u_id) from usertable";
        $res = $con->query($sql);
        if ($res->num_rows == 0) {
            $id = 1;
        } else {
            $row = $res->fetch_assoc();
            $id = $row['max(u_id)'] + 1;
        }


        //VALIDATION
        if (!empty($fullname) && !empty($uname) && !empty($email) && !empty($city) && !empty($country) && !empty($password) && !empty($confirm)) {
            if (!preg_match("/^[a-z A-Z-']*$/", $fullname)) {
                //display error msg in the same page
               
                echo "<script>alert('invalid fullname')</script>";
                echo "<script>window.location.href='registeration.php'</script>";
            } elseif (!ctype_alpha($uname)) {
                //display error......
                echo "<script>alert('invalid username')</script>";
                echo "<script>window.location.href='signup.php'</script>";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //display error....
                echo "<script>alert('invalid email')</script>";
                echo "<script>window.location.href='registeration.php'</script>";
            }elseif (strlen($phone)<10 || (!preg_match("/^[0-9]{10}+$/",$phone)))
            {
                echo "<script>alert('invalid phone number')</script>";
                echo "<script>window.location.href='registeration.php'</script>";
            }
            elseif (strlen($password) < 8 || (!preg_match("/[a-zA-Z]/", $password) || !preg_match("/[0-9]/", $password))) {
                //display error....
                echo "<script>alert('PASSWORD SHOULD HAVE 8 CHARCTERS,SHIULD INCLUDE NUMBERS AND LETTERS')</script>";
                echo "<script>window.location.href='registeration.php'</script>";
            } elseif ($password != $confirm) {
                echo "<script>alert('password doesnt match')</script>";
                echo "<script>window.location.href='registeration.php'</script>";
            } else {
                $sql = "select * from usertable where name='$uname'";
                $res = $con->query($sql);
                if ($res->num_rows > 0) {
                    echo "<script>alert('user name already exist')</script>";
                echo "<script>window.location.href='registeration.php'</script>";
                } else {
                    //encripting the password
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $sql = "insert into usertable(u_id,name,u_name,email,phone,city,country,password) values($id,'$fullname','$uname','$email','$phone','$city','$country','$hash')";
                $res = $con->query($sql);
                if ($res) {
                    echo "<script>alert('Registration successfull.')</script>";
                    echo "<script>window.location.href='adminlogin.php'</script>";
                    exit;
                } else {
                    echo "Error registering. Try again.";
                }
                }
            }
            } else {
            echo "<script>alert('Please fill all the credentials.')</script>";
            echo "<script>window.location.href='registeration.php'</script>";
        }
        
    }
?>
