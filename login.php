<?php
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
    die("connection failed:");
}
else{
  session_start();
if(isset($_POST['login']))
{
  $upass=$_POST['upass'];
  $uname=$_POST['uname'];
  if(empty($uname))
  {
    
    die("error:please provide username");
  }
  else if(empty($upass))
  {
    die("error:please provide password");
  }
  else{
  $sql="select*from usertable where u_name='$uname'";
  
  $res=$conn->query($sql);
  if($res->num_rows>0)
  {
  while($row=$res->fetch_assoc())
  {
    
    $hash=$row["password"];
    $uname=$row["u_name"];
    $utype=$row["utype"];
    $uid=$row["u_id"];
    $fullname=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];

  }
    if(password_verify($upass,$hash)){
      $_SESSION['id'] = $uid;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['username'] = $uname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['status']=true;

    if($utype!=0){
      header("Location: admindashboard.php");//admindashboard.html
    }
    else if ($uname==$uname)
    {
      echo"$utype heloo";
      header("location:userhomepage.php");//userhomepage.html
    }else{
      echo "umfi";
    }
  }
  else{
    echo "wrong password";
  
  }
  
  
  
} 
else{
  echo "user not found";
}
  }
}
}
?>