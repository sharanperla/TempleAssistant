<html>
    <style>
        .view{
            margin-top:30px;
            width:80%;
            height:80%;
        }
        img{
            width:100%;
            height:100%;
        }
        </style>
    <body>
    <center>
        <div class="view">
        <?php
$img=$_POST['image'];
$id=$_POST['id'];
$details=$_POST['imgdiscription'];
$conn=new mysqli("localhost","root","","tadb");
if(mysqli_Connect_error()){
	die("connection failed:");
}

echo"<img src='../../../img/$img' class=img-thumbnail  border=4px alt=img>";
echo"<h1>";
               echo "<script>window.location.href='updategallery.php'</script>";
               
              
?>
</div>
</body>
</html>
