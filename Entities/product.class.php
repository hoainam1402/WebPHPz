<?php
    include_once ("Config/db.class.php");
class Product
{
    public $product_ID;
    public $product_Name;
    public $category_ID;
    public $decscription;
    public $price;
    public $quantity;
    public $picture;


    public function __construct($product_Name, $category_ID,$decscription, $price, $quantity, $picture)
    {
        $this->product_Name = $product_Name;
        $this->category_ID  = $category_ID;
        $this->decscription = $decscription;
        $this->price        = $price;
        $this->quantity     = $quantity;
        $this->picture      = $picture;
    }
    public static function DanhSachSanPham()
    {
        $db = new Db();
        $sql = "SELECT product_ID,product_Name,category_ID,category_Name,price,quantity,picture,decscription FROM product  INNER JOIN category where product.category_ID = category.cate_ID";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function DanhSachSanPhamTheoLoai($category_ID)
    {
        $db = new Db();
        $sql = "SELECT product_ID,product_Name,category_ID,category_Name,price,quantity,picture,decscription FROM product  INNER JOIN category where product.category_ID = category.cate_ID and category_ID ='$category_ID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function getlist_product($category_ID)
    {
        $db = new Db();
        $sql = "SELECT product_ID,product_Name,category_ID,category_Name,price,quantity,picture,decscription FROM product  INNER JOIN category where product.category_ID = category.cate_ID and category_ID ='$category_ID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function get_product($product_ID)
    {
        $db = new Db();
        $sql = "SELECT product_ID,product_Name,category_ID,category_Name,price,quantity,picture,decscription FROM product  INNER JOIN category  WHERE product_ID = '$product_ID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public function save()
    {
        $file_temp = $this->picture['tmp_name'];
        $user_file = $this->picture['name'];
        $filepath = "../Content/img/".$user_file;
        if (move_uploaded_file($file_temp,$filepath) == false)
        {
            return false;
        }
        $db = new Db();
        $sql = "INSERT INTO product ( product_Name, category_ID, decscription,price,quantity,picture)
        VALUES ('$this->product_Name','$this->category_ID','$this->decscription','$this->price','$this->quantity','$filepath')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public function update($product_ID,$product_Name,$category_ID,$description,$price,$quantity,$picture){

      if(empty($picture)){
        $db = new Db();
        $sql = "UPDATE product SET product_Name='$product_Name',category_ID='$category_ID'  ,decscription='$description',price = '$price',quantity = '$quantity' WHERE product_ID = '$product_ID' ";
        $result = $db->query_execute($sql);
        return $result;
      }
      else {
        $file_temp = $picture['tmp_name'];
        $user_file = $picture['name'];
        $filepath = "../Content/img/".$user_file;
        if (move_uploaded_file($file_temp,$filepath) == false)
        {
            return false;
        }
        $db = new Db();
        $sql = "UPDATE product SET product_Name='$product_Name',category_ID='$category_ID'  ,decscription='$description',price = '$price',quantity = '$quantity',picture = '$filepath' WHERE product_ID = '$product_ID' ";
        //var_dump($sql);die();
        $result = $db->query_execute($sql);
        return $result;
      }
    }
    public function sanphamlienquan($category_ID,$product_ID)
    {
        $db = new Db();
        $sql = "Select * from product where category_ID ='$category_ID' and product_ID != '$product_ID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public function sanphammoi()
    {
        $db = new Db();
        $sql = "SELECT * FROM `product` ORDER BY created DESC LIMIT 8";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>
