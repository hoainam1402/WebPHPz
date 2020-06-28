<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function() {
        readURL(this);
    });
});
</script>
<?php
    include_once ("Entities/user.php");
    if (!isset($_GET["user_ID"]))
    {
        header("Location: index.php");
    }
    else
    {
        $user_ID = $_GET["user_ID"];
        $userinfor = user::get_user($user_ID);
        $userinfor = reset($userinfor);

    }
?>

<head>
    <title>Thông tin người dùng </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1><?php echo $userinfor["user_Name"];?></h1>
        </div>
        <div class="col-sm-2"><a href="index.php" class="pull-right"><img title="profile image"
                    class="img-circle img-responsive" src="Content/img/logo-home.jpg"></a></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img src="<?php echo $userinfor["avatar"]?>" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Hình ảnh người dùng </h6>
            </div>
            </hr><br>
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form enctype="multipart/form-data" method="post" class="form-horizontal"
                        action="<?php $_SERVER['PHP_SELF']?>">
                        <div class="row form-group">
                            <div class="col-12 col-md-9">
                                <input type="hidden" id="user_ID" name="user_ID" class="form-control"
                                    value="<?php echo $userinfor["user_ID"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-pencil-square"></i>
                                <label for="product" class=" form-control-label">Họ và tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="user_Name" name="user_Name" placeholder="Tên sản phẩm..."
                                    class="form-control" value="<?php echo $userinfor["user_Name"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-user"></i>
                                <label for="admin_Name" class=" form-control-label">Tên tài khoản</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" required id="user_Account" readonly name="user_Account"
                                    placeholder="Nhập tên tài khoản..." class="form-control"
                                    value="<?php echo $userinfor["user_Account"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-key"></i>
                                <label for="password" class=" form-control-label">Mật khẩu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="password" name="password" placeholder="Mật khẩu...."
                                    class="form-control" value="<?php echo $userinfor["password"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-map-marker"></i>
                                <label for="hf-price" class=" form-control-label">Địa chỉ</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="address" name="address" placeholder="Nhập địa chỉ..."
                                    class="form-control" value="<?php echo $userinfor["address"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-phone-square"></i>
                                <label for="phone" class=" form-control-label">Số điện thoại</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại..."
                                    class="form-control" value="<?php echo $userinfor["phone"] ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-picture-o"></i>
                                <label for="file-input" class=" form-control-label">Hình ảnh admin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="avatar" name="avatar" class="form-control-file"
                                    accept=".png,.gif,.jpg" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" name="btnsubmit" type="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                    Reset</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->
    </div>
    <!--/col-9-->
</div>
<!--/row-->
<?php
if(isset($_POST['btnsubmit']))
{
  $user_ID = $_POST['user_ID'];
  $user_Name = $_POST["user_Name"];
  $user_Account = $_POST["user_Account"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $avatar = $_FILES["avatar"];
  $update = user::update($user_ID,$user_Account,base64_encode($password),$user_Name,$address,$phone,$avatar);
  if(!$update){
    ?><script>
alert("Cập nhật thông tin thất bại");
</script><?php
  }
  else {
    ?><script>
alert("Cập nhật thông tin thành công");
</script><?php
  }
}
?>