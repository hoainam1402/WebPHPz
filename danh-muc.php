<?php
    include_once ("Entities/category.php");
    include_once ("Entities/product.class.php");
    if(isset($_GET["category_ID"])) {
        $category_ID = $_GET["category_ID"];
        $showpro = product::DanhSachSanPhamTheoLoai($category_ID);
    }
    else{
        $category_ID = $_GET["category_ID"];
        $showpro = product::DanhSachSanPhamTheoLoai($category_ID);
    }
    //$showpro = reset($showpro);
    $show = category::DanhSachLoaiSanPham();
    $show = reset($show);
    $list = category::DanhSachLoaiSanPham();
?>
<?php
include_once ("Inc/header.php");

?>
<script src="Content/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="Content/js/moment.js" type="text/javascript"></script>
<script src="Content/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="js_1"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments)
};
gtag('js', new Date());
gtag('config', 'UA-60799117-7');
</script>
<div class="page_image_title" xmlns:fb="http://www.w3.org/1999/xhtml">
    <h3>
        <?php echo $show["category_Name"]?>
    </h3>
</div>
<div class="breadcum_main breadcum_pro">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/Webphp/index.php">Trang chủ</a></li>
            <li><a href="/Webphp/danh-muc.php"><?php echo $show["category_Name"]?></a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <div id="column-left" class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
            <div class="cate_panel">Danh Mục</div>
            <div class="list-group cate_ul">
                <?php foreach ($list as $item){?>
                <a class="list-group-item "
                    href="danh-muc.php?category_ID=<?php echo $item['cate_ID']?>"><?php echo $item['category_Name']?></a>
                <?php } ?>
            </div>
        </div>
        <div id="content" class="col-sm-9 category_page other_page">
            <div class="position-display">
            </div>
            <div class="row">
                <div class="col-sm-10"></div>
            </div>
            <div class="page-selector">
                <div class="pages-box hidden-xs">

                </div>
                <div class="shop-grid-controls">
                    <div class="entry hidden-md hidden-sm hidden-xs">
                        <div class="inline-text">Sắp xếp:</div>
                        <div class="simple-drop-down">
<!--                            <select id="input-sort" onchange="location = this.value;">-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=p.sort_order&amp;order=ASC"-->
<!--                                    selected="selected">Mặc định</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=pd.name&amp;order=ASC">Tên-->
<!--                                    (A - Z)</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=pd.name&amp;order=DESC">Tên-->
<!--                                    (Z - A)</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=p.price&amp;order=ASC">Giá-->
<!--                                    (Thấp &gt; Cao)</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=p.price&amp;order=DESC">Giá-->
<!--                                    (Cao &gt; Thấp)</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=rating&amp;order=DESC">Đánh-->
<!--                                    giá (Cao nhất)</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=rating&amp;order=ASC">Đánh-->
<!--                                    giá (Thấp nhất)</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=p.model&amp;order=ASC">Kiểu-->
<!--                                    (A - Z)</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?sort=p.model&amp;order=DESC">Kiểu-->
<!--                                    (Z - A)</option>-->
<!--                            </select>-->
                        </div>

                    </div>

                    <div class="entry hidden-md hidden-sm hidden-xs">
                        <button type="button" id="list-view" class="view-button list" data-toggle="tooltip"
                            title="Danh sách"><i class="fa fa-list"></i></button>
                        <button type="button" id="grid-view" class="view-button grid active" data-toggle="tooltip"
                            title="Lưới"><i class="fa fa-th"></i></button>
                    </div>
                    <div class="entry">
                        <div class="inline-text">Hiển thị:</div>
                        <div class="simple-drop-down" style="width: 75px;">
<!--                            <select id="input-limit" onchange="location = this.value;">-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?limit=15" selected="selected">15-->
<!--                                </option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?limit=25">25</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?limit=50">50</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?limit=75">75</option>-->
<!--                                <option value="http://19671.chilibusiness.net/pho-nuoc?limit=100">100</option>-->
<!--                            </select>-->
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <br>
            <div class="row">
                <?php foreach ($showpro as $item) { ?>
                <div class="product-layout product-list col-xs-12">
                    <div class="row category_product">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="t-all-product-info">
                                <div class="t-product-img">
                                    <a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>">
                                        <img src="<?php echo "Webphp/".$item["picture"]?>"
                                            alt="<?php echo $item["product_Name"]?>"
                                            title="<?php echo $item["product_Name"]?>" class="img-responsive">
                                    </a>

                                </div>
                                <div class="tab-p-info">
                                    <a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>"><?php echo $item["product_Name"]?>
                                    </a>
                                    <div class="description"><?php echo $item["decscription"]?></div>
                                    <div class="price_product">
                                        <span class="price-new"><?php echo number_format($item["price"])?> VNĐ</span>
                                    </div>

                                    <div class="star">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    </div>
                                    <div class="al-btns">
                                        <button type="button" onclick="window.location.href ='shopping_cart.php?product_ID=<?php echo $item["product_ID"]?>';"
                                            class="button btn-cart"><span><i class="fa fa-shopping-cart"></i> Thêm vào
                                                giỏ</span></button>
                                        <ul class="add-to-links">
                                            <li><a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>"
                                                    class="link-wishlist" data-toggle="tooltip" title="Xem chi tiết"><i
                                                        class="fa fa-eye"></i></a></li>
                                            <li>
                                                <button class="link-wishlist" type="button" data-toggle="tooltip"
                                                    title="Thêm so sánh" onclick="compare.add('18');"><i
                                                        class="fa fa-retweet"></i></button>
                                            </li>
                                            <li>
                                                <button type="button" data-toggle="tooltip" title="Thêm Yêu thích"
                                                    onclick="wishlist.add('18');"><i class="fa fa-heart"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-sm-6 text-left"></div>
                <div class="col-sm-6 text-right"></div>
            </div>
            <div class="position-display">
            </div>
        </div>
    </div>
</div>
<?php
include_once ("Inc/footer.php");
?>