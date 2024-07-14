<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bb{width:30%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:yellow;} 
        input{width:30%;height:50px;border-radius:10px;opacity:80%;margin-bottom:10px;background-color:yellow;border:2px black;}
        </style>
    <body>
        <h1 style="text-align:center;color:#dc3545;"> GALLARY </h1>
<center>
<div class=row style=margin-top:20px;>
	<?php
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
	die("connection failed:");
}
echo"<form method=post>
<input type=file name=location placeholder='select file' required><br>
<button type=submit name=addimage class=bb>Add image</button></form></form>";

if(isset($_POST['addimage'])){
    $loc= $_POST['location'];
    $sql = "INSERT INTO gallery(image,date) VALUES ('$loc',NOW())";
    $result1 = $conn->query($sql);
    if ($result1) {
    echo "<script>alert('image added!')</script>";
    echo "<script>window.location.href='updategallery.php'</script>";
    
    } else {
         echo "Failed to add image!";
    }
        }
$sql = "SELECT * FROM gallery ORDER BY date DESC";
    $result = $conn->query($sql);
    //shows seva table
   
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         
    $img=$row["image"];
    $id=$row["ID"];
   
	echo"<div class=col-lg-4>
    <form method=post action=editimage.php>
    <input type=hidden value=$img name=image>
    <input type=hidden value=$id name=id>
      <button type=submit><img src='../../../img/$img' class=img-thumbnail width=300 height=200 border=0 alt=img></button>
	</div>
	</form> 
	
";}
	}
	echo"</div>";
	?>
    </body>
    </html