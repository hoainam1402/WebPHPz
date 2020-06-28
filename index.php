<?php
include_once ("Inc/header.php");
include_once ("Inc/slide.php");
include_once ("Entities/product.class.php");
$showdata = product::DanhSachSanPham();
$sanphammoi = product::sanphammoi();
?>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="content_top">
                <div class="position-display">
                        <div class="show-in-tab">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-507b14-0" data-toggle="tab" aria-expanded="true">Khuyến mãi</a></li>
                                <li><a href="#tab-507b14-1" data-toggle="tab" aria-expanded="true">Nổi Bật</a></li>
                                <li><a href="#tab-507b14-3" data-toggle="tab" aria-expanded="true">Bán chạy</a></li>
                                <!-- <li class="empty_tab"><a>&nbsp;</a></li>-->
                            </ul>
                        </div>
                        <div class="tab-content row">
                            <div id="tab-507b14-0" role="tabpanel" class="tab-pane active">
                                <div class="owl-car507b14 nrb-next-prev owl-car-tab owl-theme" style="opacity: 1; display: block;">
                                    <?php foreach ($showdata as $item){ ?>
                                        <div class="owl-wrapper-outer">
                                            <div class="owl-wrapper" style="width: 6446px; left: 0px; display: block;">
                                                <div class="owl-item" style="width: 293px;">
                                                    <div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="t-all-product-info">
                                                                <div class="p-sign color_overlay">
                                                                    Khuyến mãi
                                                                </div>
                                                                <div class="t-product-img">
                                                                    <a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>">
                                                                        <img src="<?php echo "WebPHP/".$item["picture"] ?>" title="<?php echo "Tên sản phẩm:".$item["product_Name"] ?>" alt="<?php echo $item["product_Name"]?>" class="img-responsive">
                                                                    </a>
                                                                </div>
                                                                <div class="tab-p-info">
                                                                    <a href=""><?php echo $item["product_Name"] ?> </a>
                                                                    <div class="star">
                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                    </div>
                                                                    <div class="price_product">
                                                                        <span class="price-new"><?php echo number_format($item["price"]) ?>VNĐ</span>
                                                                        <div class="clear"></div>
                                                                        <span class="price-old"><?php echo number_format($item["price"]+($item["price"]*0.1))?> VNĐ</span>
                                                                    </div>
                                                                    <div class="al-btns">
                                                                        <button type="button"  onclick="window.location.href ='shopping_cart.php?product_ID=<?php echo $item["product_ID"]?>';" class="button btn-cart"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                                                        <ul class="add-to-links">
                                                                            <li><a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>" class="link-wishlist" data-toggle="tooltip" title="" data-original-title="Xem chi tiết"><i class="fa fa-eye"></i></a></li>
                                                                            <li>
                                                                                <button class="link-wishlist" type="button" data-toggle="tooltip" title="" onclick="compare.add('2');" data-original-title="Thêm so sánh"><i class="fa fa-retweet"></i></button>
                                                                            </li>
                                                                            <li>
                                                                                <button type="button" data-toggle="tooltip" title="" onclick="wishlist.add('2');" data-original-title="Thêm Yêu thích"><i class="fa fa-heart"></i></button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="owl-controls clickable" style="display: block;">
                                        <div class="owl-buttons">
                                            <div class="owl-prev"><i class="fa fa-long-arrow-left"></i></div>
                                            <div class="owl-next"><i class="fa fa-long-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <script type="text/javascript"><!--
                            //Fix the product layout responsiveness
                            $(document).ready(function() {
                                //we only want this code to execute one time even if the are several showintabs mods in the pages
                                if (typeof showtabFLAG == 'undefined'){
                                    //Set flag
                                    showtabFLAG = true;

                                    //Columns number
                                    colsTab = $('#column-right, #column-left').length;

                                    //default values for carousel
                                    xsItems = 1;
                                    smItems = 2;
                                    mdItems = 3;
                                    lgItems = 4;

                                    //Check columns conditions
                                    if (colsTab == 2) {
                                        smItems = 1;
                                        mdItems = 2;
                                        lgItems = 2;
                                        $('#content .product-layout-tab').attr('class', 'product-layout-tab product-grid col-lg-6 col-md-6 col-sm-12 col-xs-12');
                                        $('#content .product-layout-tab:nth-child(2n+2)').after('<div class="clearfix visible-md visible-sm"></div>');
                                    } else if (colsTab == 1) {
                                        mdItems = 2;
                                        lgItems = 3;
                                        $('#content .product-layout-tab').attr('class', 'product-layout-tab product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12');
                                        $('#content .product-layout-tab:nth-child(3n+3)').after('<div class="clearfix visible-lg"></div>');
                                    }else{
                                        $('#content .product-layout-tab:nth-child(4n+4)').after('<div class="clearfix"></div>');
                                    }
                                }
                            });
                            //-->
                        </script>
                        <script type="text/javascript"><!--
                            $(document).ready(function() {
                                $('.owl-car507b14').owlCarousel({
                                    baseClass:'owl-car-tab',
                                    itemsCustom: [ [0, xsItems], [768, smItems], [992, mdItems], [1170, lgItems]],
                                    pagination: false,
                                    navigation: true,
                                    slideSpeed: 500,
                                    scrollPerPage:false,
                                    navigationText:["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"]
                                });
                            });
                            //-->
                        </script>
                    </div>
                    <div id="banner_page_0" class="banner_page">
                        <ul>
                            <li class="item b-stripe oll">
                                <a href="#">
                                    <img src="Content/img/banner_3.jpg" alt="quảng cáo 1" class="img-responsive">
                                </a>
                            </li>
                            <li class="item b-stripe event">
                                <a href="#">
                                    <img src="Content/img/banner_1.jpg" alt="quảng cáo 2" class="img-responsive">
                                </a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="h2-arviel-title">
                        <h3>Mới nhất</h3>
                    </div>
                    <div class="row">
                        <?php foreach ($sanphammoi as $item) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="row category_product">

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="t-all-product-info" >
                                        <div class="p-sign" > Mới</div >
                                        <div class="t-product-img" >
                                            <a href = "chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>" >
                                                <img src = "<?php echo "WebPHP/".$item["picture"] ?>" class="img-responsive" >
                                            </a >
                                        </div >
                                        <div class="tab-p-info" >
                                            <a href = "chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>" > <?php echo $item["product_Name"] ?> </a >
                                            <div class="price_product" >
                                                <span class="price-new" > <?php echo number_format($item["price"]) ?> VNĐ </span >
                                            </div >
                                            <div class="star" >
                                                <span class="fa fa-stack" ><i class="fa fa-star-o fa-stack-2x" ></i ></span >
                                                <span class="fa fa-stack" ><i class="fa fa-star-o fa-stack-2x" ></i ></span >
                                                <span class="fa fa-stack" ><i class="fa fa-star-o fa-stack-2x" ></i ></span >
                                                <span class="fa fa-stack" ><i class="fa fa-star-o fa-stack-2x" ></i ></span >
                                                <span class="fa fa-stack" ><i class="fa fa-star-o fa-stack-2x" ></i ></span >
                                            </div >
                                            <div class="al-btns" >
                                                <button type = "button" onclick="window.location.href ='shopping_cart.php?product_ID=<?php echo $item["product_ID"]?>';" class="button btn-cart" ><span ><i class="fa fa-shopping-cart" ></i > Thêm vào giỏ </span ></button >
                                                <ul class="add-to-links" >
                                                    <li ><a href = "chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>" class="link-wishlist" data - toggle = "tooltip" title = "Xem chi tiết" ><i class="fa fa-eye" ></i ></a ></li >
                                                    <li >
                                                        <button class="link-wishlist" type = "button" data - toggle = "tooltip" title = "Thêm so sánh" onclick = "compare.add('20');" ><i class="fa fa-retweet" ></i ></button >
                                                    </li >
                                                    <li >
                                                        <button type = "button" data - toggle = "tooltip" title = "Thêm Yêu thích" onclick = "wishlist.add('20');" ><i class="fa fa-heart" ></i ></button >
                                                    </li >
                                                </ul >
                                            </div >
                                        </div >
                                    </div >
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="content_bottom">
                <div class="position-display">
                    <div id="banner_page_1" class="banner_page">
                        <ul>
                            <li class="item b-stripe oll">
                                <a href="#">
                                    <img src="Content/img/fishing-4.jpg" alt="Canon" class="img-responsive">
                                </a>
                            </li>
                            <li class="item b-stripe event">
                                <a href="#">
                                    <img src="Content/img/fishing-3.jpg" alt="Sony" class="img-responsive">
                                </a>
                            </li>
                            <li class="item b-stripe oll">
                                <a href="#">
                                    <img src="Content/img/fishing-2.jpg" alt="Nikon" class="img-responsive">
                                </a>
                            </li>
                            <li class="item b-stripe event">
                                <a href="#">
                                    <img src="Content/img/fishing-1.jpg" alt="Kodak" class="img-responsive">
                                </a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once ("Inc/footer.php");
        ?>
    </div>
</div>