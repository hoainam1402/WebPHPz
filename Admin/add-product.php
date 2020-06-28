<?php
   include_once ("../Admin/Entities/product.class.php");
   include_once ("../Admin/Entities/category.php");
       if(isset($_POST["btnsubmit"])){
           $product_Name = $_POST["product"];
           $category_ID = $_POST["cate_ID"];
           $description = $_POST["infor-product"];
           $price = $_POST["price"];
           $quantity = $_POST["quantity"];
           $picture = $_FILES["picture"];
           $newProduct = new product($product_Name,$category_ID,$description,$price,$quantity,$picture);
           if(empty($product_Name && $category_ID && $picture && $price ))
           {
               header("Location: add-product.php?failure");
           }
           else
           {
               $newProduct->save();
               header("Location: add-product.php?inserted");
           }
       }
   ?>
<?php
   include_once("../Admin/Inc/headers.php");
   include_once ("../Admin/Inc/menu-sidebar.php");
   include_once ("../Admin/Entities/category.php");
   ?>
<div class="main-content">
<?php
   if (isset($_GET["failure"]))
   {
       echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'><span class='badge badge-pill badge-danger'>Failure </span>&#160;Hãy điền đầy đủ thông tin !</div>";
   }
   
   if (isset($_GET["inserted"]))
   {
       echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'><span class='badge badge-pill badge-success'>Success </span>&#160;Thêm sản phẩm thành công!</div>";
   }
   ?>
<div class="section__content section__content--p30">
   <div class="container-fluid">
      <div class="card">
         <div class="card-header bg-success">
            <strong class="card-title text-light">Thêm Sản Phẩm Mới</strong>
         </div>
         <div class="card-body card-block">
            <form  enctype="multipart/form-data" method="post" class="form-horizontal">
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-pencil-square"></i>
                     <label for="product" class=" form-control-label">Tên Sản Phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="text" id="product" name="product" placeholder="Tên sản phẩm..." class="form-control" value="<?php echo isset($_POST["product"]) ? $_POST["product"] : "" ; ?>">
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
                     <textarea name="infor-product" id="infor-product" placeholder="Nhập thông tin sản phẩm..." class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 112px;" value="<?php echo isset($_POST["infor-product"]) ? $_POST["infor-product"] : "" ; ?>">
                     </textarea>
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-dollar"></i>
                     <label for="hf-price" class=" form-control-label">Giá sản phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="number"  id="price" name="price"  placeholder="Nhập giá sản phẩm..." class="form-control" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : "" ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-sort-numeric-asc"></i>
                     <label for="quantity" class=" form-control-label">Số lượng sản phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="number" min="0" max="10000"  step="1"  value="1" id="quantity" name="quantity" placeholder="Số lượng sản phẩm..." class="form-control" value="<?php echo isset($_POST["quantity"]) ? $_POST["quantity"] : "" ; ?>">
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col col-md-3">
                     <i class="fa fa-picture-o"></i>
                     <label for="file-input" class=" form-control-label">Hình ảnh sản phẩm</label>
                  </div>
                  <div class="col-12 col-md-9">
                     <input type="file" id="picture" name="picture" class="form-control-file" accept=".png,.gif,.jpg"/>
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
   include_once ("../Admin/Inc/footer.php")
   ?>