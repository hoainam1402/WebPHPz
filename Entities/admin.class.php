<?php
    include_once ("Config/db.class.php");
class Admin
{
    public $admin_ID;
    public $admin_Name;
    public $password;
    public $address;
    public $phone;
    public $avatar;
    public $admin_account;
    public $birthday;


    public function __construct( $admin_Name,$password, $address, $phone, $avatar,$admin_account,$birthday)
    {
        $this->admin_Name       = $admin_Name;
        $this->password         = base64_encode($password);
        $this->address          = $address;
        $this->phone            = $phone;
        $this->avatar           = $avatar;
        $this->admin_account    = $admin_account;
        $this->birthday         = $birthday;
    }
    public static function DanhsachAdmin()
    {
        $db = new Db();
        $sql = "SELECT * FROM admin ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function get_admin($admin_ID)
    {
        $db = new Db();
        $sql = "SELECT * FROM admin WHERE admin_ID = '$admin_ID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function check_login($user, $password)
    {
      $db = new Db();
      $sql = "SELECT * FROM admin WHERE admin_account = '$user' AND password = '$password'";
      $result = $db->query_execute($sql);
      return $result;
    }
    public static function check_account($admin_account)
    {
      $db = new Db();
      $sql = "SELECT * FROM admin WHERE admin_account = '$admin_account'";
      $result = $db->query_execute($sql);
      return $result;
    }
    public function save()
    {
        $file_temp = $this->avatar['tmp_name'];
        $user_file = $this->avatar['name'];
        $filepath = "../Content/img/".$user_file;
        if (move_uploaded_file($file_temp,$filepath) == false)
        {
            return false;
        }
        $db = new Db();
        $sql = "INSERT INTO admin (admin_Name,password,address,phone,avatar,admin_account,birthday)
        VALUES ('$this->admin_Name','$this->password','$this->address','$this->phone','$filepath','$this->admin_account','$this->birthday')";
        $result = $db->query_execute($sql);
        //var_dump($sql);die();
        return $result;
    }
    public static function update($admin_ID,$admin_Name,$password,$address,$phone,$avatar,$admin_account,$birthday){
      if(($avatar)== $_FILES["avatar"]){
        var_dump($avatar);die("Hình  có");
        $file_temp = $avatar['tmp_name'];
        $user_file = $avatar['name'];
        $filepath = "../Content/img/".$user_file;
        if (move_uploaded_file($file_temp,$filepath) == false)
        {
            return false;
        }
        $db = new Db();
        $sql = "UPDATE admin SET admin_Name='$admin_Name',password='$password' ,address='$address',phone = '$phone',avatar = '$filepath',admin_account = '$admin_account',birthday='$birthday' WHERE admin_ID = '$admin_ID' ";
        //var_dump($sql);die();
        $result = $db->query_execute($sql);
        return $result;
      }
      else {
        var_dump($avatar);die("Hình không có");
        $db = new Db();
        $sql = "UPDATE admin SET admin_Name='$admin_Name',password='$password'  ,address='$address',phone = '$phone',avatar = '$avatar',admin_account = '$admin_account',birthday='$birthday' WHERE admin_ID = '$admin_ID' ";
        $result = $db->query_execute($sql);
        //var_dump($sql);die();
        return $result;
      }
    }
}
?>
