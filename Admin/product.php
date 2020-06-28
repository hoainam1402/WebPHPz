<?php
     include_once("../Admin/Inc/headers.php");
     include_once ("../Admin/Inc/menu-sidebar.php");
     include_once ("../Admin/Entities/product.class.php");
     include_once ("../Admin/Entities/category.php");
     $danhsachsanpham = product:: DanhSachSanPham();

    include_once("../Admin/Config/db.class.php");
    $perPage = 5;
    $sqlQuery = "SELECT * FROM product";
    $result = mysqli_query($conn, $sqlQuery);
    $totalRecords = mysqli_num_rows($result);
    $totalPages = ceil($totalRecords / $perPage)

?>
<script>
function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete")) {
        document.location = delUrl;
    }
}
</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">data table</h3>
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
                            <button class="btn btn-primary" onclick="document.location = 'add-product.php'">
                                <i class="fa fa-plus-square"></i> Thêm sản phẩm</button>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function(){
                            load_data();
                            function load_data(page)
                            {
                                $.ajax({
                                    url:"load_data.php",
                                    method:"POST",
                                    data:{page:page},
                                    success:function(data){
                                        $('#pagination_data').html(data);
                                    }
                                })
                            }
                            $(document).on('click', '.pagination_link', function(){
                                var page = $(this).attr("id");
                                load_data(page);
                            });
                        });
                    </script>
                    <div class="table-responsive table--no-card m-b-30" id="pagination_data">
                        //load data ajax
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
   include_once ("../Admin/Inc/footer.php")
   ?>