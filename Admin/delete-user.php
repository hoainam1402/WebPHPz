<?php
$user_ID = $_GET['user_ID'];
$conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
$sql = mysqli_query($conn,"DELETE FROM user WHERE user_ID = '$user_ID' ") or die ("Lỗi truy vấn");
if($sql){
    header("location:../admin/user.php");
}
?>
