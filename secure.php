<?php
$conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
mysqli_set_charset($conn, 'UTF8');
$check=$_SESSION['user'];
$query=mysqli_query($conn,"select * from user where user_Name ='$check' ");
$data=mysqli_fetch_array($query);
$user=$data['user_name'];
?>