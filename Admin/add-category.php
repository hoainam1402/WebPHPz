<?php
   include_once ("../Admin/Entities/product.class.php");
   include_once ("../Admin/Entities/category.php");
       if(isset($_POST["btnsubmit"])){
           $category_Name = $_POST["categoryName"];
           $result = category::check_exits($category_Name);
           $newCategory = new category($category_Name);
           if(empty($category_Name))
           {
               header("Location: add-category.php?failure");
           }
           else
           {
               if (mysqli_num_rows($result) > 0)
               {?>
                   <script> alert("Danh mục đã tồn tại"); </script> <?php
               }
               else {
                   $newCategory->save();
                   header("Location: add-category.php?inserted");
               }
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
                echo "<div class='message failed'>Hãy điền đầy đủ thông tin !</div>";
            }

            if (isset($_GET["inserted"]))
            {
                echo "<div class='message success'>Thêm danh mục thành công!</div>";
            }
  ?>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-success">
                    <strong class="card-title text-light">Thêm Danh Mục Mới</strong>
                </div>
                <div class="card-body card-block">
                    <form enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="categoryName" class=" form-control-label">Tên danh mục</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="categoryName" name="categoryName" placeholder="Tên danh mục..."
                                    class="form-control"
                                    value="<?php echo isset($_POST["categoryName"]) ? $_POST["categoryName"] : "" ; ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="btnsubmit" class="btn btn-success btn-sm">
                                <i class="fa fa-check-circle"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            <button type="button" class="btn btn-primary btn-sm"
                                onclick="window.location.href='../admin/category.php';">
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