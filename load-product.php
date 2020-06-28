<?php
$connect = mysqli_connect("localhost", "root", "", "caucashop");
$record_per_page = 5;
$page = '';
$output = '';
if(isset($_POST["page"]))
{
    $page = $_POST["page"];
}
else
{
    $page = 1;
}
$start_from = ($page - 1)*$record_per_page;
$query = "SELECT * FROM product ORDER BY product_ID DESC LIMIT $start_from, $record_per_page";
$result = mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $query);
//$output .= '
//          <table class="table table-borderless table-striped table-earning">
//               <tr>
//                    <th >Họ Và Tên</th>
//                    <th >Ngày Sinh</th>
//                    <th >Địa Chỉ</th>
//                    <th >Avatar</th>
//                    <th >Tác Vụ</th>
//               </tr>
//     ';
while($row = mysqli_fetch_array($result))
{
    $output .= '
                    <div class="product-layout product-list col-xs-12">
                        <div class="row category_product">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="t-all-product-info">
                                    <div class="t-product-img">
                                        <a href="chi-tiet-san-pham.php?product_ID='. $row["product_ID"].' ">
                                            <img src=" '.$row["picture"].' " alt=" '.$row["product_Name"].'" title="'.$row["product_Name"].'" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="tab-p-info">
                                        <a href="chi-tiet-san-pham.php?product_ID='.$row["product_ID"].' "> '.$row["product_Name"].'</a>
                                        <div class="description">'.$row["decscription"].'</div>
                                        <div class="price_product">
                                            <span class="price-new">'.number_format($row["price"]).' VNĐ</span>
                                        </div>

                                        <div class="star">
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        </div>
                                        <div class="al-btns">
                                            <button type="button" onclick="cart.add(\'18\');" class="button btn-cart"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                            <ul class="add-to-links">
                                                <li><a href="chi-tiet-san-pham.php?product_ID='. $row["product_ID"].'" class="link-wishlist" data-toggle="tooltip" title="Xem chi tiết"><i class="fa fa-eye"></i></a></li>
                                                <li>
                                                    <button class="link-wishlist" type="button" data-toggle="tooltip" title="Thêm so sánh" onclick="compare.add(\'18\');"><i class="fa fa-retweet"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" data-toggle="tooltip" title="Thêm Yêu thích" onclick="wishlist.add(\'18\');"><i class="fa fa-heart"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
          ';
}
$output .= '</table><br /><div align="center">';
$page_query = "SELECT * FROM product ORDER BY product_ID DESC";
$page_result = mysqli_query($connect, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);
for($i=1; $i<=$total_pages; $i++)
{
    $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";
}
$output .= '</div><br /><br />';
echo $output;
?>