<?php
class Show{
    public static function countproduct(){
        $conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
        mysqli_set_charset($conn, 'UTF8');
        $query=mysqli_query($conn,"select count(1) as diem from product ");
        $data=mysqli_fetch_array($query);
        $count = $data['diem'];
        return $count;
    }
    public static function countuser(){
        $conn = new mysqli('localhost', 'root', '', 'caucashop') or die("Lối connect với server");
        mysqli_set_charset($conn, 'UTF8');
        $query=mysqli_query($conn,"select count(1) as diem from admin ");
        $data=mysqli_fetch_array($query);
        $count = $data['diem'];
        return $count;
    }
}
?>
