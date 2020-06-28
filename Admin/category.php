<?php
     include_once("../Admin/Inc/headers.php");
     include_once ("../Admin/Inc/menu-sidebar.php");
     include_once ("../Admin/Entities/category.php");
     $danhsachdanhmuc = category::DanhSachLoaiSanPham();
?>
<script>
function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
    }
}
</script>
<div class="main-content">
   <div class="section__content section__content--p30">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <!-- DATA TABLE -->
               <h3 class="title-5 m-b-35">Danh sách danh mục</h3>
               <div class="table-data__tool">
                  <div class="table-data__tool-left">
                     <div class="rs-select2--light rs-select2--md">
                        <div class="dropDownSelect2"></div>
                     </div>
                     <div class="rs-select2--light rs-select2--sm">
                        <div class="dropDownSelect2"></div>
                     </div>
                     <button class="au-btn-filter"></button>
                  </div>
                  <div class="table-data__tool-right">
                     <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="document.location = 'add-category.php'">
                     <i class="zmdi zmdi-plus"></i>Thêm danh mục</button>
                  </div>
               </div>
               <div class="table-responsive table--no-card m-b-30">
                  <table class="table table-borderless table-striped table-earning">
                     <thead>
                        <tr>
                           <th>Mã danh mục</th>
                           <th>Tên danh mục</th>
                           <th>Tác vụ</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($danhsachdanhmuc as $item):?>
                        <tr>
                        <tr>
                           <td><?php echo $item["cate_ID"]; ?></td>
                           <td><?php echo $item["category_Name"]; ?></td>
                           <td>
                              <button class="btn btn-success btn-sm"><a href="edit-category.php?cate_ID=<?php echo $item["cate_ID"]; ?>" style="color:white;" class="fa fa-dot-circle-o">Sửa</a></button>
                              | <button class="btn btn-danger btn-sm"><a href="javascript:confirmDelete('delete-category.php?cate_ID=<?php echo $item["cate_ID"]; ?>')" style="color:white;" class="fa fa-dot-circle-o">Xoá</a></button>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
               <!-- END DATA TABLE -->
            </div>
         </div>
      </div>
   </div>
</div>
<?php include_once ("../Admin/Inc/footer.php") ?>
