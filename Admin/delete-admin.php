<?php
    $admin_ID = $_GET['admin_ID'];
    $conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
    $sql = mysqli_query($conn,"DELETE FROM admin WHERE admin_ID = '$admin_ID' ") or die ("Lỗi truy vấn");
    if($sql){
        header("location:../admin/admin.php");
    }
?>
