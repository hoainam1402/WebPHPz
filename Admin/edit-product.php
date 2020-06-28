<?php
   include_once ("../Admin/Entities/product.class.php");
   include_once ("../Admin/Entities/category.php");
   include_once("../Admin/Inc/headers.php");
   include_once ("../Admin/Inc/menu-sidebar.php");
   include_once ("../Admin/Entities/category.php");
   if (!isset($_GET["product_ID"]))
    {
        header("Location: oops.php");
    }
    else
    {
        $product_ID = $_GET["product_ID"];
        $productdetail =(product::get_product($product_ID));
        $productdetail = reset($productdetail);

    }
   ?>
<div class="main-content">
<div class="section__content section__content--p30">
   <div class="container-fluid">
      <div class="card">
         <div class="card-header bg-success">
            <strong class="card-title text-light">Thay đổi thông tin Sản Phẩm </strong>
         </div>
         <div class="card-body card-block">
            <form  enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>">
              <div class="row form-group">
                 <div class="col-12 col-md-9">
                    <input type="hidden" id="product_ID" name="product_ID" class="form-control" value="<?php echo $productdetail["product_ID"] ; ?>">
                 </div>
              </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-pencil-square"></i>
                     <label for="product" class=" form-control-label">Tên Sản Phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text" id="product" name="product" placeholder="Tên sản phẩm..." class="form-control" value="<?php echo $productdetail["product_Name"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-list-ul"></i>
                     <label for="selectSm" class=" form-control-label">Danh mục sản phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <select name="cate_ID" id="cate_ID" class="form-control-sm form-control">
                     <?php
                        $loai = category::DanhSachLoaiSanPham();
                        foreach($loai as $item)
                        {
                          echo "<option value= ".$item["cate_ID"].">".$item["category_Name"]."</option>";
                        }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-info-circle"></i>
                     <label for="textarea-input" class=" form-control-label">Thông tin sản phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <textarea name="infor-product" id="infor-product" placeholder="Nhập thông tin sản phẩm..." class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 112px;" value=""><?php echo $productdetail["decscription"] ; ?></textarea>
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-dollar"></i>
                     <label for="hf-price" class=" form-control-label">Giá sản phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="number"  id="price" name="price"  placeholder="Nhập giá sản phẩm..." class="form-control" value="<?php echo $productdetail["price"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-sort-numeric-asc"></i>
                     <label for="quantity" class=" form-control-label">Số lượng sản phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="number" min="0" max="10000"  step="1"  value="1" id="quantity" name="quantity" placeholder="Số lượng sản phẩm..." class="form-control" value="<?php echo $productdetail["quantity"] ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <i class="fa fa-picture-o"></i>
                   <label for="file-input" class=" form-control-label">Hình ảnh sản phẩm</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <input type="file" id="picture" name="picture" class="form-control-file" accept=".png,.gif,.jpg"/>
                     <img src="<?php echo $productdetail["picture"]?>" style="height: 150px;width: 150px"/>
                 </div>
               </div>
               <div class="card-footer">
                  <button type="submit" name="btnsubmit" class="btn btn-success btn-sm">
                  <i class="fa fa-check-circle"></i> Submit
                  </button>
                  <button type="reset" class="btn btn-danger btn-sm">
                  <i class="fa fa-refresh"></i> Reset
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='../admin/product.php';" >
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
  $product_ID = $_POST['product_ID'];
  $product_Name = $_POST["product"];
  $category_ID = $_POST["cate_ID"];
  $description = $_POST["infor-product"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];
  if($_FILES["picture"]== ''){
    //var_dump("k img");die();
    $picture = "";
  }
  else {
    //var_dump("có img");die();
    $picture = $_FILES["picture"];
  }

  $update = Product::update($product_ID,$product_Name,$category_ID,$description,$price,$quantity,$picture);
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
