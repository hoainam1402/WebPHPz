<?php
   include_once ("../Admin/Entities/admin.class.php");
   include_once ("../Admin/Entities/category.php");
   include_once ("../Admin/Inc/headers.php");
   include_once ("../Admin/Inc/menu-sidebar.php");
   include_once ("../Admin/Entities/category.php");
   if (!isset($_GET["admin_ID"]))
    {
        header("Location: admin.php");
    }
    else
    {
        $admin_ID = $_GET["admin_ID"];
        $admindetail = admin::get_admin($admin_ID);
        $admindetail = reset($admindetail);

    }
   ?>
<div class="main-content">
<div class="section__content section__content--p30">
   <div class="container-fluid">
      <div class="card">
         <div class="card-header bg-success">
            <strong class="card-title text-light">Thay đổi thông tin quản lí </strong>
         </div>
         <div class="card-body card-block">
            <form  enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>">
              <div class="row form-group">
                 <div class="col-12 col-md-9">
                    <input type="hidden" id="admin_ID" name="admin_ID" class="form-control" value="<?php echo $admindetail["admin_ID"] ; ?>">
                 </div>
              </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                      <i class="fa fa-pencil-square"></i>
                     <label for="product" class=" form-control-label">Họ và tên</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text" id="admin_Name" name="admin_Name" placeholder="Tên sản phẩm..." class="form-control" value="<?php echo $admindetail["admin_Name"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                      <i class="fa fa-user"></i>
                     <label for="admin_Name" class=" form-control-label">Tên tài khoản</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text" required id="admin_account" readonly name="admin_account" placeholder="Nhập tên tài khoản..."  class="form-control" value="<?php echo $admindetail["admin_account"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                      <i class="fa fa-key"></i>
                     <label for="password" class=" form-control-label">Mật khẩu</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="password" id="password" name="password" placeholder="Mật khẩu...." class="form-control" value="<?php echo $admindetail["password"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                      <i class="fa fa-map-marker"></i>
                     <label for="hf-price" class=" form-control-label">Địa chỉ</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text"  id="address" name="address"  placeholder="Nhập địa chỉ..." class="form-control" value="<?php echo $admindetail["address"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                      <i class="fa fa-phone-square"></i>
                     <label for="phone" class=" form-control-label">Số điện thoại</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại..." class="form-control" value="<?php echo $admindetail["phone"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                      <i class="fa fa-pencil-square"></i>
                     <label for="birthday" class=" form-control-label">Nhập ngày sinh</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text" id="birthday" name="birthday" class="form-control" value="<?php echo $admindetail["birthday"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-picture-o"></i>
                     <label for="file-input" class=" form-control-label">Hình ảnh admin</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="file" id="avatar" name="avatar" class="form-control-file" accept=".png,.gif,.jpg"/><br><img style="width: 100px;height: 100px;" src="<?php echo $admindetail["avatar"]; ?>">
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
if(isset($_POST['btnsubmit']))
{
  $admin_ID = $_POST['admin_ID'];
  $admin_Name = $_POST["admin_Name"];
  $admin_account = $_POST["admin_account"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $birthday = $_POST["birthday"];
  if($_FILES["avatar"]== ''){
    //var_dump("k img");die();
    $avatar = "";
  }
  else {
    //var_dump("có img");die();
    $avatar = $_FILES["avatar"];
  }

  $update = admin::update($admin_ID,$admin_Name,base64_encode($password),$address,$phone,$avatar,$admin_account,$birthday);
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
