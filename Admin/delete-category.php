<?php
    $cate_ID = $_GET['cate_ID'];
    $conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
    $sql = mysqli_query($conn,"DELETE FROM category WHERE cate_ID = '$cate_ID' ") or die ("Lỗi truy vấn");
    if($sql){
        header("location:../admin/category.php");
    }
?>
