<?php
include_once ("Config/db.class.php");
class category
{
    public $cate_ID;
    public $category_Name;

    public function __construct($category_Name)
    {
        $this->category_Name = $category_Name;
    }

    public static function DanhSachLoaiSanPham()
    {
        $db = new Db();
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function get_category($cate_ID){
        $db = new Db();
        $sql = "SELECT * FROM category WHERE cate_ID = $cate_ID";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function update($cate_ID,$category_Name){
        $db = new Db();
        $sql = ("UPDATE category SET category_Name = '$category_Name' WHERE cate_ID = $cate_ID ") ;
        $result = $db->query_execute($sql);
        return $result;
    }
    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO category ( category_Name)
        VALUES ('$this->category_Name')";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>
