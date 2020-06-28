<?php
include_once("../Admin/Inc/headers.php");
include_once ("../Admin/Inc/menu-sidebar.php");
include_once ("../Admin/Entities/admin.class.php");
include_once ("../Admin/Entities/category.php");
include_once ("../Admin/Entities/user.php");
$danhsachadmin = user:: DanhsachUser();
?>
<script>
    function confirmDelete(delUrl) {
        if (confirm("Are you sure you want to delete")) {
            document.location = delUrl;
        }
    }
</script>
<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;

$conn=mysqli_connect("localhost","root","","caucashop");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(*) FROM user ";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM user LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res_data)){
    //here goes the data
}
mysqli_close($conn);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Danh sách quản lí</h3>
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
<!--                            <button class="btn btn-primary" onclick="document.location = 'add-user.php'">-->
<!--                                <i class="fa fa-plus-square"></i> Thêm quản lí mới</button>-->
                        </div>
                    </div>
                    <script>
                        $(document).ready(function(){
                            load_data();
                            function load_data(page)
                            {
                                $.ajax({
                                    url:"load_user.php",
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

                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once ("../Admin/Inc/footer.php")
?>
