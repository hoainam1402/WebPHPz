<?php
include_once ("../Admin/Entities/admin.class.php");
include_once ("../Admin/Entities/category.php");
include_once("../Admin/Inc/headers.php");
include_once ("../Admin/Inc/menu-sidebar.php");
include_once ("../Admin/Entities/user.php");
if (!isset($_GET["user_ID"]))
{
    header("Location: user.php");
}
else
{
    $user_ID = $_GET["user_ID"];
    $userdetail = User::get_user($user_ID);
    $userdetail = reset($userdetail);

}
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-success">
                    <strong class="card-title text-light">Thay đổi thông tin người dùng </strong>
                </div>
                <div class="card-body card-block">
                    <form  enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>">
                        <div class="row form-group">
                            <div class="col-12 col-md-9">
                                <input type="hidden" id="user_ID" name="user_ID" class="form-control" value="<?php echo $userdetail["user_ID"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-pencil-square"></i>
                                <label for="product" class=" form-control-label">Họ và tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="user_Name" name="user_Name" placeholder="Tên người dùng..." class="form-control" value="<?php echo $userdetail["user_Name"] ;?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-user"></i>
                                <label for="admin_Name" class=" form-control-label">Tên tài khoản</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" required id="user_Account" readonly name="user_Account" placeholder="Nhập tên tài khoản..."  class="form-control" value="<?php echo $userdetail["user_Account"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-key"></i>
                                <label for="password" class=" form-control-label">Mật khẩu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="password" name="password" placeholder="Mật khẩu...." class="form-control" value="<?php echo $userdetail["password"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-map-marker"></i>
                                <label for="hf-price" class=" form-control-label">Địa chỉ</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  id="address" name="address"  placeholder="Nhập địa chỉ..." class="form-control" value="<?php echo $userdetail["address"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-phone-square"></i>
                                <label for="phone" class=" form-control-label">Số điện thoại</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại..." class="form-control" value="<?php echo $userdetail["phone"] ; ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="btnsubmit" class="btn btn-success btn-sm">
                                <i class="fa fa-check-circle"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='../admin/user.php';" >
                                <i class="fa fa-mail-reply-all"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['btnsubmit']))
    {
        $user_ID = $_POST['user_ID'];
        $user_Name = $_POST["user_Name"];
        $user_Account = $_POST["user_Account"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $update = user::update($user_ID,$user_Account,base64_encode($password),$user_Name,$address,$phone);
        if(!$update){
            ?><script> alert("Cập nhật thông tin thất bại"); </script><?php
        }
        else {
            ?><script> alert("Cập nhật thông tin thành công"); </script><?php
        }
    }
    ?>
    <?php
    include_once ("../Admin/Inc/footer.php")
    ?>
