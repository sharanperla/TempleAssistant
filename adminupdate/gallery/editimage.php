<html>
<style>
    .view {
        margin-top: 30px;
        width: 80%;
        height: 80%;
    }

    img {
        width: 100%;
        height: 100%;
    }

    button {
        width: 30%;
        height: 50px;
        border-radius: 10px;
        opacity: 80%;
        margin-bottom: 10px;
        background-color: red;
    }
</style>

<body>
    <center>
        <div class="view">
            <?php
            $img = $_POST['image'];
            $id = $_POST['id'];
            $conn = new mysqli("localhost", "root", "", "tadb");
            if (mysqli_Connect_error()) {
                die("connection failed:");
            }
            echo "<img src='../../../img/$img' class=img-thumbnail  border=4px alt=img>";
            echo "<form method=post><br><br>
<input type=hidden value=$img name=image>
<input type=hidden value=$id name=id>
<button type=submit name=delete >Delete image</button></form>";
            if (isset($_POST['delete'])) {
                $img = $_POST['image'];
                $id = $_POST['id'];
                $sql = "DELETE FROM gallery WHERE id='$id'";
                $result1 = $conn->query($sql);
                if ($result1) {
                    echo "<script>alert('IMAGE Removed!')</script>";
                    echo "<script>window.location.href='updategallery.php'</script>";

                } else {
                    echo "Failed to remove product!";
                }
            }

            ?>
        </div>
</body>

</html>