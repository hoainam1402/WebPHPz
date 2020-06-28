<?php ob_start(); ?>
<?php include_once ("Entities/category.php")?>
<!DOCTYPE html>
<html dir="ltr" lang="vi">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Đồ Câu Cá Online</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link href="http://localhost/WebPhP/Content/img/logo.jpg" rel="icon">
      <script src="Content/js/jquery-2.1.1.min.js" type="text/javascript"></script>
      <link href="Content/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <script src="Content/js/bootstrap.min.js" type="text/javascript"></script>
      <link href="Content/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="Content/css/jquery.fancybox.css">
      <link rel="stylesheet" href="Content/css/owl.carousel.css">
      <link rel="stylesheet" href="Content/css/owl.transitions.css">
      <link rel="stylesheet" href="Content/css/owl.theme.css">
      <link rel="stylesheet" href="Content/css/mobile_menu.min.css">
      <link rel="stylesheet" href="Content/css/mb_setting.css">
      <link rel="stylesheet" href="Content/css/main.css">
      <link rel="stylesheet" href="Content/css/style.css">
      <link rel="stylesheet" href="Content/css/responsive.css">
      <link rel="stylesheet" href="Content/css/custom.css">
      <link href="Content/css/owl.carousel.tabs.css" type="text/css" rel="stylesheet" media="screen">
      <link href="Content/css/owl.carousel_1.css" type="text/css" rel="stylesheet" media="screen">
      <link href="Content/css/owl.transitions_1.css" type="text/css" rel="stylesheet" media="screen">
      <link href="Content/css/settings.css" type="text/css" rel="stylesheet" media="screen">
      <link href="Content/css/static-captions.css" type="text/css" rel="stylesheet" media="screen">
      <link href="Content/css/dynamic-captions.css" type="text/css" rel="stylesheet" media="screen">
      <link href="Content/css/captions.css" type="text/css" rel="stylesheet" media="screen">
      <script src="Content/js/owl.carousel.min_1.js" type="text/javascript"></script>
      <script src="Content/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
      <script src="Content/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
      <script src="js_1"></script>
      <!-- <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments)};
         gtag('js', new Date());
         gtag('config', 'UA-60799117-7');
      </script>
      <script type="text/javascript">
         if (jQuery(window).width() > 320) {
           var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
           (function(){
             var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
             s1.async=true;
             s1.src="https://embed.tawk.to/596303fe6edc1c10b03452f0/default";
             s1.charset="UTF-8";
             s1.setAttribute("crossorigin","*");
             s0.parentNode.insertBefore(s1,s0);
           })();
         }
         jQuery("#tawkchat-minified-container").css("display", "none !important");
      </script> -->
      <link rel="stylesheet" href="Content/css/animate.min.css" type="text/css" media="all">
      <style>
         .sticky-bottom{background:#161616 none repeat scroll 0 0;bottom:0;font-size:18px;right:auto;position:fixed;left:10px;text-align:center;width:290px;padding:9px 0 5px 0;z-index:9999999999;border-top-left-radius:5px;border-top-right-radius:5px;-webkit-box-shadow:rgba(0,0,0,0.0980392) 0 0 1px 2px;-moz-box-shadow:rgba(0,0,0,0.0980392) 0 0 1px 2px;box-shadow:rgba(0,0,0,0.0980392) 0 0 1px 2px}.sticky-bottom a{color:#fff;font-size:17px}.sticky-bottom a:hover{text-decoration:none;color:#fff}.sticky-bottom ul{list-style:none;margin:0;padding:0}.sticky-bottom ul li{border-right:1px solid #ddf2c1;display:inline-block;width:24%}.sticky-bottom ul li:last-child{border:0}.sticky-bottom ul li a:hover{text-decoration:none}.sticky-bottom ul li span{color:#fff;cursor:pointer;display:block;padding:12px 0 10px 0;text-transform:uppercase}.mypage-alo-phone{position:fixed;right:auto;left:90px;bottom:35px;visibility:visible;background-color:transparent;width:110px;height:110px;cursor:pointer;z-index:200000!important}.mypage-alo-ph-img-circle{width:32px;height:32px;top:43px;left:43px;position:absolute;background:rgba(30,30,30,0.1) url(Content/img/phone.png) no-repeat center center;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid transparent;opacity:.7;-webkit-transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-ms-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;-webkit-transform-origin:50% 50%;-moz-transform-origin:50% 50%;-ms-transform-origin:50% 50%;-o-transform-origin:50% 50%;transform-origin:50% 50%;background-size:70%}.mypage-alo-ph-circle-fill{width:60px;height:60px;top:28px;left:28px;position:absolute;-webkit-transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-ms-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid transparent;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s;opacity:.75!important}.mypage-alo-ph-circle{width:90px;height:90px;top:12px;left:12px;position:absolute;background-color:transparent;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid rgba(30,30,30,0.4);opacity:.1;opacity:.5}@media only screen and (max-width:768px){.sticky-bottom{display:none}.mypage-alo-phone{left:0!important;right:auto!important;bottom:0}}@media only screen and (max-width:568px){.style-btn-overlay .uabb-modal-content-data{display:block;overflow:hidden}}
      </style>
      <style> .mypage-alo-ph-img-circle,.mypage-alo-ph-circle-fill{ background-color:  #F6BC31}.mypage-alo-ph-circle{border-color:  #F6BC31}</style>
   </head>
   <body class="common-home h-8">
      <header>
         <!-- header top area start -->
         <div class="header-top" id="sticker">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-8 col-md-12 col-lg-8 header_top_left">
                     <column class="position-display">
                        <div>
                           <div class="dv-builder-full">
                              <div class="dv-builder  ">
                                 <div class="dv-module-content">
                                    <div class="row">
                                       <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                          <div class="dv-item-module ">
                                             <div id="logo" class="logo-area">
                                                <a href="http://localhost/WebPhP">
                                                   <img src="Content/img/Logo-shop.png" title="An Nam Shop" alt="An Nam Shop" class="img-responsive pull-left">
                                                   <div class="logo-des">
                                                   </div>
                                                   <div class="clearfix"></div>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                          <div class="dv-item-module ">
                                             <div class="navbar navbar-inverse yamm menu_horizontal" id="menu_id_MB01">
                                                <div class="navbar-header">
                                                   <button type="button" data-toggle="collapse" data-target="#navbar-collapse-MB01" class="navbar-toggle">
                                                   <span class="icon-bar"></span>
                                                   <span class="icon-bar"></span>
                                                   <span class="icon-bar"></span>
                                                   </button>
                                                </div>
                                                <div id="navbar-collapse-MB01" class="navbar-collapse collapse">
                                                   <ul class="nav navbar-nav">
                                                      <li>
                                                         <a href="http://localhost/WebPhP">
                                                         Trang chủ
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="gioi-thieu.php">
                                                         Giới thiệu
                                                         </a>
                                                      </li>
                                                      <li class="dropdown">
                                                          <?php
                                                            $macategory = category::DanhSachLoaiSanPham();
                                                            //$macategory = reset($macategory);
                                                          ?>
                                                         <a href="danh-muc.php" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">Sản Phẩm <b class="caret"></b></a>
                                                         <ul role="menu" class="dropdown-menu multi-level" aria-labelledby="dropdownMenu">
                                                            <li>
                                                                <?php foreach ($macategory as $item) {?>
                                                               <a href="danh-muc.php?category_ID=<?php echo $item["cate_ID"];?>"><?php echo $item["category_Name"];?></a>
                                                                <?php } ?>
                                                            </li>
                                                         </ul>
                                                      </li>
                                                      <li>
                                                         <a href="huong-dan-su-dung.php">
                                                         Hướng Dẫn
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="lien-he.php">
                                                         Liên Hệ
                                                         </a>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <script>
                                                $(function() {
                                                  window.prettyPrint && prettyPrint()
                                                  $(document).on('click', '.navbar .dropdown-menu', function(e) {
                                                    e.stopPropagation()
                                                  })
                                                })
                                             </script>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </column>
                  </div>
                  <div class="col-sm-4 col-md-12 col-lg-4 log_index">
                     <div class="right-menu-areas">
                        <div class="right-menus hm-1">
                           <ul>
                              <li class="dropdown">
                                  <?php
                                    if(!headers_sent())
                                    {
                                        session_start();
                                    }
                                    if(isset($_SESSION["user"]) != "" )
                                    {
                                        echo '<a href="#" title="Tài Khoản" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md">'.$_SESSION["user"].'</span> <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right account_header">
                                        <li><a href="logout.php">Đăng Xuất</a></li>
                                        <li><a href="user-infor.php?user_ID=2">My Account </a></li>
                                        </ul>';
                                    }
                                    else
                                    {
                                        echo '<a href="#" title="Tài Khoản" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md">Tài Khoản</span> <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right account_header">
                                        <li><a href="login.php">Đăng Nhập </a></li>
                                        <li><a href="register.php">Đăng Kí </a></li>
                                        </ul>';
                                    }
                                  ?>
                              </li>
                              <li>
                                 <a href="javascript:void(0)" class="search_click"><i class="fa fa-search"></i></a>
                                 <div id="search" class="search-area">
                                    <input type="text" name="search" value placeholder="Tìm kiếm sản phẩm">
                                    <span class="button">
                                    <button type="button" class="btn btn-default btn-lg">
                                    <span><i class="fa fa-search"></i></span>
                                    </button>
                                    </span>
                                 </div>
                              </li>
                           </ul>
                           <div id="cart" class="btn-group cart_panel">
                              <span id="cart-total">
                                  <span class="num_product">
                                      <button type="button" onclick="window.location.href ='shopping_cart.php'" id="cart-popover" class="cart-icon dropdown-toggle" data-placement="bottom" title="Shopping Cart">
                                      </button>

                                  </span>
                              </span>
                              </button>
                               <script> 
                                   $('#cart-popover').popover({
                                       html : true,
                                       container: 'body',
                                       content:function(){
                                           return $('#popover_content_wrapper').html();
                                       }
                                   });
                               </script>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header main area start -->
         <!-- header main area end -->
      </header>
