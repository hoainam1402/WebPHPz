<?php
include_once ("Entities/product.class.php");
if (!isset($_GET["product_ID"]))
{
    header("Location: oops.php");
}
else
{
    $product_ID = $_GET["product_ID"];
    $productdetail = product::get_product($product_ID);
    $productdetail = reset($productdetail);
    $product_related = product::sanphamlienquan($productdetail["category_ID"],$product_ID);
    $list = product::DanhSachSanPham();
}
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
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());
        gtag('config', 'UA-60799117-7');
    </script>
    <div class="page_image_title" xmlns:fb="http://www.w3.org/1999/xhtml">
        <h3>
            <?php echo $productdetail["product_Name"]?>
        </h3>
    </div>
    <div class="breadcum_main breadcum_pro">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/Webphp/index.php">Trang chủ</a></li>
                <li><a>Sản Phẩm</a></li>
                <li><a href="chi-tiet-san-pham.php?product_ID=<?php echo $_GET["product_ID"]?>"><?php echo $productdetail["product_Name"]?></a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="position-display">
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="single-product-image">
                            <div class="single-pro-main-image">
                                <a href="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>"><img id="optima_zoom" src="<?php echo "WebPHP/".$productdetail["picture"]?>" data-zoom-image="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" alt="<?php echo $productdetail["product_Name"]?>" class="img-responsive"></a>
                            </div>
                            <div class="single-pro-thumb">
                                <ul class="thubm-caro" id="optima_gallery">
                                    <li>
                                        <a href="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" data-image="<?php echo "WebPHP/".$productdetail["picture"]?>" data-zoom-image="<?php echo "WebPHP/".$productdetail["picture"]?>"> <img class="img-responsive" src="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" alt="<?php echo $productdetail["product_Name"]?>"> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" data-image="<?php echo "WebPHP/".$productdetail["picture"]?>" data-zoom-image="<?php echo "WebPHP/".$productdetail["picture"]?>"> <img class="img-responsive" src="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" alt="<?php echo $productdetail["product_Name"]?>"> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" data-image="<?php echo "WebPHP/".$productdetail["picture"]?>" data-zoom-image="<?php echo "WebPHP/".$productdetail["picture"]?>"> <img class="img-responsive" src="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" alt="<?php echo $productdetail["product_Name"]?>"> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" data-image="<?php echo "WebPHP/".$productdetail["picture"]?>" data-zoom-image="<?php echo "WebPHP/".$productdetail["picture"]?>"> <img class="img-responsive" src="<?php echo "WebPHP/".$productdetail["picture"]?>" title="<?php echo $productdetail["product_Name"]?>" alt="<?php echo $productdetail["product_Name"]?>"> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 product_details">
                        <div class="single-product-description">
                            <div class="pro-desc">
                                <h1><?php echo $productdetail["product_Name"]?> </h1>
                                <div class="rating">
                                    <p>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        /
                                        <a href onclick="$('a[href=\'#tab-reviews\']').trigger('click');
                              return false;">0 Bình luận</a>
                                    </p>
                                </div>
                                <ul class="list-unstyled">
                                    <li>Danh mục: <span class="span"><?php echo $productdetail["category_Name"]?></span></li>
                                    <li>Số lượng sản phẩm trong kho: <span class="span"><?php echo $productdetail["quantity"]?></span></li>
                                </ul>
                                <ul class="list-unstyled des2">
                                    <li class="span">Giá sản phẩm:</li>
                                    <li>
                                        <!--                                        <p>--><?php //echo $productdetail["decscription"]?><!--</p>-->
                                    </li>
                                </ul>
                            </div>
                            <ul class="list-unstyled">
                                <li><span style="text-decoration: line-through;"><?php echo number_format($productdetail["price"]*0.1 + $productdetail["price"] ); echo "VNĐ"?></span></li>
                                <li>
                                    <h2 class="new_price_details"><?php echo number_format($productdetail["price"]); echo "VNĐ"?></h2>
                                </li>
                            </ul>
                        </div>
                        <div id="product">
                            <hr>
                            <h3>Tùy chọn đang có</h3>
                            <div class="form-group required">
                                <label class="control-label" for="input-option229">Kích cỡ</label>
                                <select name="option[229]" id="input-option229" class="form-control" required>
                                    <option value> --- Chọn --- </option>
                                    <option value="24"> 2m4 </option>
                                    <option value="25"> 2m7 </option>
                                    <option value="23"> 3m1 </option>
                                </select>
                            </div>
                            <div class="product_details_cart">
                                <div class="product-quantity">
                                    <div class="numbers-row">
                                        <input type="number" name="quantity" min="0" value="1" id="input-quantity">
                                        <input type="hidden" name="product_id" value="4">
                                    </div>
                                    <div class="fv-comp-button">
                                        <ul class="add-to-links">
                                            <li><button type="button" data-toggle="tooltip" class="link-wishlist" title="Thêm Yêu thích" onclick="wishlist.add('4');"><i class="fa fa-heart-o"></i></button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-poraduct-botton">
                                    <button type="button" onclick="window.location.href ='shopping_cart.php?product_ID=<?php echo $productdetail["product_ID"];?>?quantity=<?php echo $productdetail["quantity"]?>'" data-loading-text="Đang Xử lý..." class="button btn-cart shopng-btn">Thêm vào giỏ</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row top20">
                                <div class="product-quantity">
<!--                                    <div id="fb-root">-->
<!--                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=182184219900081&autoLogAppEvents=1" nonce="DfQnoZCn"></script>-->
<!--                                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>-->
<!--                                     AddThis Button BEGIN -->
<!--                                    <div class="addthis_toolbox addthis_default_style">  <a class="addthis_counter addthis_pill_style"></a></div>-->
<!--                                    <script type="text/javascript" src="Content/js/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>-->
<!--                                     AddThis Button END -->
<!--                                    </div>-->
                                        <!-- AddThis Button BEGIN -->
                                        <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
                                        <script type="text/javascript" src="Content/js/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
                                        <!-- AddThis Button END -->
                                </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bg-ms-product">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-description" data-toggle="tab">Mô tả</a></li>
                                <li><a href="#tab-reviews" data-toggle="tab">Đánh giá (0)</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active bo  ttom20" id="tab-description">
                                    <p><?php echo $productdetail["decscription"]?></p>
                                </div>
                                <div class="tab-pane" id="tab-reviews">
                                    <form class="form-horizontal" id="form-review">
                                        <div id="review"></div>
                                        <h2>Gửi Bình luận</h2>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label" for="input-name">Họ & Tên:</label>
                                                <input type="text" name="name" value id="input-name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label" for="input-review">Nội dung:</label>
                                                <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label">Cho điểm:</label>
                                                &nbsp;&nbsp;&nbsp; Bình thường&nbsp;
                                                <input type="radio" name="rating" value="1">
                                                &nbsp;
                                                <input type="radio" name="rating" value="2">
                                                &nbsp;
                                                <input type="radio" name="rating" value="3">
                                                &nbsp;
                                                <input type="radio" name="rating" value="4">
                                                &nbsp;
                                                <input type="radio" name="rating" value="5">
                                                &nbsp;Tốt
                                            </div>
                                        </div>
                                        <div class="buttons clearfix">
                                            <div class="pull-right">
                                                <button type="button" id="button-review" data-loading-text="Đang Xử lý..." class="btn btn-primary">Tiếp tục</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--PRODCUCT LATE -->
            </div>
        </div>
        <div class="product-late-ms product_module">
            <div class="row">
                <div class="col-sm-12">
                    <div class="area-title">
                        <h3 class="text_related title">Sản phẩm liên quan</h3>
                        <div class="titleborderOut">
                            <div class="titleborder"></div>
                        </div>
                    </div>
                </div>
                <div class="related_product">
                    <?php foreach ($product_related as $item) {?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="related_product">
                                <div class="t-all-product-info">
                                    <div class="t-product-img">
                                        <a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>">
                                            <img src="<?php echo "Webphp/".$item["picture"] ?>" alt="<?php echo $item["product_Name"] ?>" title="<?php echo $item["product_Name"] ?>" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="tab-p-info">
                                        <a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>"> <?php echo $item["product_Name"] ?></a>
                                        <div class="price_product">
                                            <span class="price-new"><?php echo number_format($item["price"])." VNĐ"?></span>
                                            <div class="clear"></div>
                                            <span class="price-old"><?php echo number_format($item["price"]+$item["price"]*0.1)." VNĐ"?></span>
                                        </div>
                                        <div class="star">
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        </div>
                                        <div class="al-btns">
                                            <button type="button" onclick="window.location.href ='shopping_cart.php?product_ID=<?php echo $item["product_ID"]?>';" class="button btn-cart"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                            <ul class="add-to-links">
                                                <li><a href="chi-tiet-san-pham.php?product_ID=<?php echo $item["product_ID"]?>" class="link-wishlist" data-toggle="tooltip" title="Xem chi tiết"><i class="fa fa-eye"></i></a></li>
                                                <li>
                                                    <button class="link-wishlist" type="button" data-toggle="tooltip" title="Thêm so sánh" onclick="compare.add('1');"><i class="fa fa-retweet"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" data-toggle="tooltip" title="Thêm Yêu thích" onclick="wishlist.add('1');"><i class="fa fa-heart"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="position-display">
        </div>
    </div>
        <script type="text/javascript">
                $('select[name=\'recurring_id\'], input[name="quantity"]').change(function () {
                    $.ajax({
                        url: 'index.php?route=product/product/getRecurringDescription',
                        type: 'post',
                        data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
                        dataType: 'json',
                        beforeSend: function () {
                            $('#recurring-description').html('');
                        },
                        success: function (json) {
                            $('.alert, .text-danger').remove();
                            if (json['success']) {
                                $('#recurring-description').html(json['success']);
                            }
                        }
                    });
                });
        </script>
        <script type="text/javascript">
                $('#button-cart').on('click', function() {
                    $.ajax({
                        url: 'index.php?route=checkout/cart/add',
                        type: 'post',
                        data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
                        dataType: 'json',
                        beforeSend: function() {
                            $('#button-cart').button('loading');
                        },
                        complete: function() {
                            $('#button-cart').button('reset');
                        },
                        success: function(json) {
                            $('.alert, .text-danger').remove();
                            $('.form-group').removeClass('has-error');
                            if (json['error']) {
                                if (json['error']['option']) {
                                    for (i in json['error']['option']) {
                                        var element = $('#input-option' + i.replace('_', '-'));
                                        if (element.parent().hasClass('input-group')) {
                                            element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                                        } else {
                                            element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                                        }
                                    }
                                }
                                if (json['error']['recurring']) {
                                    $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
                                }
                                // Highlight any found errors
                                $('.text-danger').parent().addClass('has-error');
                            }

                            if (json['success']) {
                                $('.breadcrumb').after('<div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                                $('#cart > button').html('<i class="fa fa-shopping-cart"></i> ' + json['total']);
                                $('html, body').animate({ scrollTop: 0 }, 'slow');
                                $('#cart > ul').load('index.php?route=common/cart/info ul li');
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                });
        </script>
    <script type="text/javascript">
        $(document).ready(function() {
            /*---- -----*/
            $('.thubm-caro').owlCarousel({
                items: 4,
                pagination: false,
                navigation: true,
                autoPlay: false,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [991, 3],
                itemsTablet: [767, 3],
                itemsMobile: [480, 2],
                navigationText: ['<i class="fa fa-angle-left owl-prev-icon"></i>', '<i class="fa fa-angle-right owl-next-icon"></i>']
            });
            /////////////// END Related products ---////////////////////////


            if (window.matchMedia("(max-width: 768px)").matches) {
                $("#optima_zoom").elevateZoom({ zoomType: 'inner', gallery: 'optima_gallery', cursor: 'crosshair', galleryActiveClass: "active", imageCrossfade: true, loadingIcon: ""});
            }
            else {
                // $("#optima_zoom").elevateZoom({gallery: 'optima_gallery', cursor: 'pointer', galleryActiveClass: "active", imageCrossfade: true, loadingIcon: ""});
                $("#optima_zoom").elevateZoom({
                    zoomWindowFadeIn : 500,
                    zoomLensFadeIn: 500,
                    gallery       : "optima_gallery",
                    imageCrossfade: true,
                    zoomWindowWidth:350,
                    zoomWindowHeight:350,
                    zoomWindowOffetx: 10,
                    scrollZoom: true,
                    cursor:"pointer"
                });
            }

            var $zoomImg = $("#optima_zoom");
            $(window).resize(function(){

                var height = $zoomImg.height();
                $(".zoomWrapper").css("height", height);
                $(".zoomContainer .zoomWindow").css({"height": height});
                $zoomImg.removeData('elevateZoom');
                $('.zoomContainer').remove();
            });
            $("#optima_zoom").bind("click", function (e) {
                var ez = $('#optima_zoom').data('elevateZoom');
                ez.closeAll(); //NEW: This function force hides the lens, tint and window
                $.fancybox(ez.getGalleryList());
                return false;
            });
            /*----- cart-plus-minus-button -----*/



            $(".numbers-row").append('<div class="inc button">-</div><div class="dec button">+</div>');
            $(".button").on("click", function() {
                var $button = $(this);
                var oldValue = $button.parent().find("#input-quantity").val();
                if ($button.text() == "+") {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                $button.parent().find("#input-quantity").val(newVal);
            });
        });
    </script>
    </div>
<?php
include_once ("Inc/footer.php");
?>