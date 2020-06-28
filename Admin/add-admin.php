<?php
   include_once ("../Admin/Entities/admin.class.php");
   include_once("../Admin/Inc/headers.php");
    if(isset($_POST["btnsubmit"])){
        $admin_Name = $_POST["admin_Name"];
        $admin_account = $_POST["admin_account"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $birthday = $_POST["birthday"];
        $avatar = $_FILES["avatar"];
        $newaccount = new admin($admin_Name,$password,$address,$phone,$avatar,$admin_account,$birthday);
        $result = admin::check_account($admin_account);
        if(empty($admin_Name && $password && $avatar && $admin_account ))
        { ?>
            <script> alert("Vui lòng điền đầy đủ thông tin"); </script> <?php
        }
        else
        {
            if (mysqli_num_rows($result) > 0)
            {?>
                <script> alert("Tài khoản đã tồn tại"); </script> <?php
            }
            else {
                $newaccount->save();?>
                <script> alert("Tạo tài khoản thành công"); </script>;<?php
            }
        }
    }
   ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-success">
                    <strong class="card-title text-light">Thêm người quản lí mới </strong>
                </div>
                <div class="card-body card-block">
                    <form  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-pencil-square"></i>
                                <label for="product" class=" form-control-label">Họ và tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="admin_Name" name="admin_Name" placeholder="Nhập họ và tên..." class="form-control" value="<?php echo isset($_POST["admin_Name"]) ? $_POST["admin_Name"] : "" ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-user"></i>
                                <label for="product" class=" form-control-label">Tài khoản</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="admin_account" name="admin_account" placeholder="Nhập tài khoản..." class="form-control" value="<?php echo isset($_POST["admin_account"]) ? $_POST["admin_account"] : "" ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-key"></i>
                                <label for="password" class=" form-control-label">Mật khẩu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu..." class="form-control" value="<?php echo isset($_POST["passwword"]) ? $_POST["passwword"] : "" ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-map-marker"></i>
                                <label for="address" class=" form-control-label">Địa chỉ </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="address" name="address" placeholder="Nhập địa chỉ..." class="form-control" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : "" ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-phone-square"></i>
                                <label for="phone" class=" form-control-label">Số điện thoại </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại..." class="form-control" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : "" ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-pencil-square"></i>
                                <label for="birthday" class=" form-control-label">Ngày sinh </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="datetime-local" id="birthday" min="01-01-1970" max="09-06-2020" name="birthday"  class="form-control" value="<?php echo isset($_POST["birthday"]) ? $_POST["birthday"] : "" ; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <i class="fa fa-picture-o"></i>
                                <label for="file-input" class=" form-control-label">Hình ảnh sản phẩm</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="avatar" name="avatar" class="form-control-file" accept=".png,.gif,.jpg"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="btnsubmit" class="btn btn-success btn-sm">
                                <i class="fa fa-check-circle"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='../admin/admin.php';" >
                                <i class="fa fa-mail-reply-all"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
   include_once ("../Admin/Inc/footer.php");
   ?>