<?php
    include_once ("Config/db.class.php");

class user
{
    public $user_ID;
    public $user_Account;
    public $password;
    public $user_Name;
    public $address;
    public $phone;
    public $avatar;
    public  function __construct($user_Account,$password,$user_Name,$address,$phone,$avatar)
    {
        $this->user_Account = $user_Account;
        $this->password     = base64_encode($password);
        $this->user_Name    = $user_Name;
        $this->address      = $address;
        $this->phone        = $phone;
        $this->avatar        = $avatar;
    }
    public  function update($user_ID,$user_Account,$password,$user_Name,$address,$phone,$avatar){
          $file_temp = $avatar['tmp_name'];
          $user_file = $avatar['name'];
          $filepath = "Content/img/".$user_file;
          if (move_uploaded_file($file_temp,$filepath) == false)
          {
              return false;
          }
          $db = new Db();
          $sql = "UPDATE user SET user_Account='$user_Account',password='$password',user_Name = '$user_Name',address='$address',phone = '$phone',avatar = '$filepath' WHERE user_ID = '$user_ID' ";
          //var_dump($sql);die();
          $result = $db->query_execute($sql);
          return $result;
      }
    public function check_account($user_Account)
    {
        $db = new Db();
        $sql = "SELECT * FROM user WHERE user_Account = '$user_Account' ";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function check_login($user, $password)
    {
        $db = new Db();
        $sql = "SELECT * FROM user WHERE user_Account = '$user' AND password = '$password' ";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function get_user($user_ID)
    {
        $db = new Db();
        $sql = "SELECT * FROM user WHERE user_ID = '$user_ID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>