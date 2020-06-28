<?php
include_once ("../Admin/Config/db.class.php");
class User
{
    public $user_ID;
    public $user_Account;
    public $password;
    public $user_Name;
    public $address;
    public $phone;

    public function __construct( $user_Account,$password, $user_Name, $address, $phone)
    {
        $this->user_Account       = $user_Account;
        $this->password           = base64_encode($password);
        $this->user_Name          = $user_Name;
        $this->address            = $address;
        $this->phone              = $phone;
    }
    public static function DanhsachUser()
    {
        $db = new Db();
        $sql = "SELECT * FROM user ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function get_user($user_ID)
    {
        $db = new Db();
        $sql = "SELECT * FROM user WHERE user_ID = '$user_ID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function check_login($user, $password)
    {
        $db = new Db();
        $sql = "SELECT * FROM user WHERE user_Account = '$user' AND password = '$password'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function check_account($user_Account)
    {
        $db = new Db();
        $sql = "SELECT * FROM user WHERE user_Account = '$user_Account'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO user (user_Account,password,user_Name,address,phone)
        VALUES ('$this->user_Account','$this->password','$this->user_Name','$this->address','$this->address')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function update($user_ID,$user_Account,$password,$user_Name,$address,$phone){
        $db = new Db();
        $sql = "UPDATE admin SET user_Account='$user_Account',password='$password'  ,user_Name='$user_Name',user_Name = '$user_Name',address = '$address',phone = '$phone' WHERE user_ID = '$user_ID' ";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>
