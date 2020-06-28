<?php
  $conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
  mysqli_set_charset($conn, 'UTF8');
  session_start();
  $check=$_SESSION['admin'];
  $query=mysqli_query($conn,"select * from admin where admin_account='$check' ");
  $data=mysqli_fetch_array($query);
  $address = $data['address'];
  $user=$data['admin_Name'];
  $avatar=$data['avatar'];
  if(!isset($user))
  {
    header("Location: login.php");
  }

?>