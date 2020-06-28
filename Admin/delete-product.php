<?php
    $product_ID = $_GET['product_ID'];
    $conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
    $sql = mysqli_query($conn,"DELETE FROM product WHERE product_ID = '$product_ID' ") or die ("Lỗi truy vấn");
    if($sql){
        header("location:../admin/product.php");
    }
?>
