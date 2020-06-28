<footer class="footer_content">
   <div class="footer-top" id="footer_top">
      <div class="container">
         <column class="position-display">
            <div>
               <div class="dv-builder-full">
                  <div class="dv-builder footer_cuoi ">
                     <div class="dv-module-content">
                        <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                              <div class="dv-item-module ">
                                 <div>
                                    <div class="single-footer-widget sfw-1">
                                       <div class="image_footer"><a href><img src="Content/img/Logo-shop.png" class="img-responsive"></a></div>
                                       <div class="footer-address">
                                          <p><i class="fa  fa-map-marker"></i> &nbsp; Số 32/17, Đường Võ Văn Hát, Quận 9, Thành phố Hồ Chí Minh.</p>
                                          <p><i class="fa fa-phone"></i> &nbsp; +84 333 736 654</p>
                                          <p><i class="fa fa-fax"></i> &nbsp; +84 333 736 654</p>
                                          <p><a href="mailto:phanhoainam1402@gmail.com"><i class="fa fa-envelope-o"></i> &nbsp; phanhoainam1402@gmail.com</a></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                              <div class="dv-item-module ">
                                 <div class="h-16">
                                    <div class="h2-left-cat">
                                       <div class="h16-menu">
                                          <nav>
                                             <div class="left-cart-menu">
                                                <ul>
                                                   <li>
                                                      <i class="fa "></i> <a href="javascript:void(0)"> Thông Tin </a> <span><i class="fa fa-caret-right"></i></span>
                                                      <ul class="cat-sb">
                                                         <li><a href="http://localhost/WebPhP/huong-dan.html">Hướng Dẫn</a></li>
                                                         <li><a href="http://localhost/WebPhP/chinh-sach-rieng-tu.php">Chính sách riêng tư</a></li>
                                                         <li><a href="http://localhost/WebPhP/thoa-thuan.php">Thỏa thuận người dùng</a></li>
                                                         <li><a href="http://localhost/WebPhP/dieu-khien.php">Điều khoản sử dụng</a></li>
                                                         <li><a href ="http://localhost/WebPhP/ban-do-shop.php">Bản đồ shop</a></li>
                                                      </ul>
                                                   </li>
                                                </ul>
                                             </div>
                                          </nav>
                                       </div>
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
                           <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                              <div class="dv-item-module ">
                                 <div class="h-16">
                                    <div class="h2-left-cat">
                                       <div class="h16-menu">
                                          <nav>
                                             <div class="left-cart-menu">
                                                <ul>
                                                   <li>
                                                      <i class="fa "></i> <a href="javascript:void(0)"> Khách Hàng </a> <span><i class="fa fa-caret-right"></i></span>
                                                      <ul class="cat-sb">
                                                         <li><a href="?route=product/manufacturer">Thương Hiệu</a></li>
                                                         <li><a href="?route=account/voucher">Phiếu quà tặng</a></li>
                                                         <li><a href="?route=affiliate/login">Bán hàng</a></li>
                                                         <li><a href="?route=product/special">Khuyến Mãi</a></li>
                                                         <li><a href="?route=account/return/add">Đổi/trả hàng</a></li>
                                                      </ul>
                                                   </li>
                                                </ul>
                                             </div>
                                          </nav>
                                       </div>
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
                           <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                              <div class="dv-item-module ">
                                 <script>
                                    function subscribe()
                                    {
                                        var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                                        var email = $('#txtemail').val();
                                        if (email != "")
                                        {
                                            if (!emailpattern.test(email))
                                            {
                                                alert("Lỗi email");
                                                return false;
                                            }
                                            else
                                            {
                                                $.ajax({
                                                    url: 'index.php?route=module/newsletters/news',
                                                    type: 'post',
                                                    data: 'email=' + $('#txtemail').val(),
                                                    dataType: 'json',
                                                    success: function (json) {
                                                        if (json.message[0] == 1)
                                                            $('.warning-new').html("<div><span class='alert alert-success'>" + json.message[1] + "</span></div>");
                                                        else
                                                            $('.warning-new').html("<div><span class='alert alert-danger'>" + json.message[1] + "</div></div>");
                                                        $('.warning-new').fadeIn('slow').delay(2000).fadeOut('slow');
                                                    }

                                                });
                                                return false;
                                            }
                                        }
                                        else
                                        {
                                            alert("Vui lòng nhập Email của bạn");
                                            $(email).focus();
                                            return false;
                                        }
                                    }
                                 </script>
                                 <style type="text/css">
                                    .warning-new{ display: none; position: fixed; top: 50px; left:0; width: 100%; z-index: 1000; padding: 10px;}
                                    .warning-new .alert{padding: 20px 30px;}
                                 </style>
                                 <!--<h2>Đăng ký nhận tin</h2> -->
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="warning-new text-center">
                                          <div class="warning-new text-center">
                                             <!-- Not delete -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="newsletter-area">
                                    <div class="row">
                                       <form action method="post">
                                          <div class="form-group newsletters-info">
                                             <label class="col-sm-12 control-label title-newsletters" for="input-firstname">Đăng ký nhận tin</label>
                                             <div class="col-sm-12">
                                                <input type="email" name="txtemail" id="txtemail" value placeholder="Nhập mail của bạn!" class="form-control input-lg newsletters-input">
                                                <button type="submit" class="btn btn-lg newsletters-btn" onclick="return subscribe();">Đăng ký</button>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <div class="dv-item-module ">
                                 <div>
                                    <div class="all-social-icons">
                                       <ul>
                                          <li><a href="https://facebook.com/namphan1402" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                          <li><a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                          <li><a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                          <li><a href="https://youtube.com" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </column>
      </div>
   </div>
   <div class="footer-bottom" id="footer_bottom">
      <div class="container">
         <div class="row">
            <div class="col-sm-8 col-xs-12 copyright">
               <column class="position-display">
                  <div>
                     <div class="dv-builder-full">
                        <div class="dv-builder  ">
                           <div class="dv-module-content">
                              <div class="row">
                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="dv-item-module ">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </column>
            </div>
            <div class="col-sm-4 col-xs-12 chili">
               <div style="white-space:nowrap;display: block;overflow: hidden;">
                  <a style="color:#000000;font-size:12px;" target="_blank">Powered by AnNam Shop</a>
                  <!-- background: url(https://www.chili.vn/chili_vn_web_doanh_nghiep.png);
                     background-repeat: no-repeat; background-position: right; padding-right: 37px; -->
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- owl.carousel.min js -->
<script src="Content/js/owl.carousel.min.js"></script>
<!-- slicknav js -->
<script src="Content/js/jquery.mobilemenu.js"></script>
<!-- jquery.scrollUp js -->
<script src="Content/js/jquery.scrollUp.min.js"></script>
<!-- jquerye levatezoom js -->
<script src="Content/js/jquery.elevatezoom.js"></script>
<!-- jquerye countdown js -->
<script src="Content/js/countdown.js"></script>
<!-- jquery fancybox js -->
<script src="Content/js/jquery.fancybox.pack.js"></script>
<!-- jquery bx-slider js -->
<script src="Content/js/bx-slider.min.js"></script>
<!-- plugins js -->
<script src="Content/js/plugins.js"></script>
<script src="Content/js/common.js" type="text/javascript"></script>
<!-- main js -->
<script src="Content/js/main.js"></script>
<div class="sticky-bottom">
   <div id="pcSupport" class="wrap">
      <a href="tel:0333736654">Hotline 24/7: 0333736654</a>
   </div>
</div>
<a href="tel:0333736654" mypage class="call-now" rel="nofollow">
   <div class="mypage-alo-phone">
      <div class="animated infinite zoomIn mypage-alo-ph-circle"></div>
      <div class="animated infinite pulse mypage-alo-ph-circle-fill"></div>
      <div class="animated infinite tada mypage-alo-ph-img-circle"></div>
   </div>
</a>
</body>
</html>
