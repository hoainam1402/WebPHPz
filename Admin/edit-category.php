<?php
   include_once ("../Admin/Entities/product.class.php");
   include_once ("../Admin/Entities/category.php");
   if (!isset($_GET["cate_ID"]))
   {
       header("Location: oops.php");
   }
   else
   {
       $cate_ID = $_GET["cate_ID"];
       $editCategory = category::get_category($cate_ID);
       $editCategory = reset($editCategory);
   }
   ?>
<?php
   include_once("../Admin/Inc/headers.php");
   include_once ("../Admin/Inc/menu-sidebar.php");
   include_once ("../Admin/Entities/category.php");
   ?>
<div class="main-content">
<div class="section__content section__content--p30">
   <div class="container-fluid">
      <div class="card">
         <div class="card-header bg-success">
            <strong class="card-title text-light">Thêm Danh Mục Mới</strong>
         </div>
         <div class="card-body card-block">
            <form  enctype="multipart/form-data" method="post" class="form-horizontal">
               <div class="row form-group">
                 <div class="col-12 col-md-9">
                    <input type="hidden" id="cate_ID" name="cate_ID" class="form-control" value="<?php echo $editCategory["cate_ID"] ; ?>">
                 </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <label for="categoryName" class=" form-control-label">Tên danh mục</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text" id="categoryName" name="categoryName" placeholder="Tên danh mục..." class="form-control" value="<?php echo $editCategory["category_Name"]; ?>">
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" name="btnsubmit" class="btn btn-success btn-sm">
                  <i class="fa fa-check-circle"></i> Submit
                  </button>
                  <button type="reset" class="btn btn-danger btn-sm">
                  <i class="fa fa-refresh"></i> Reset
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='../admin/category.php';" >
                  <i class="fa fa-mail-reply-all"></i> Cancel
                  </button>
               </div>
            </form>
            <?php
                if(isset($_POST['btnsubmit']))
                {
                  $cate_ID = $_POST['cate_ID'];
                  $category_Name = $_POST['categoryName'];
                  if(empty($category_Name)){
                      ?><script> alert("Cập nhật thông tin thất bại. Vui lòng điền đầy đủ thông tin"); </script><?php
                  }
                  else {
                      $update = category::update($cate_ID,$category_Name);
                      if (!$update){
                          ?><script> alert("Cập nhật thông tin thất bại. Lỗi Truy Vấn"); </script><?php
                      }
                    ?><script> alert("Cập nhật thông tin thành công"); window.location.href='category.php' </script><?php
                  }
                }
            ?>
         </div>
      </div>
   </div>
</div>
<?php
   include_once ("../Admin/Inc/footer.php")
   ?>
