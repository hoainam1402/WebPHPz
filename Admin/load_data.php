<?php
    //pagination.php
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
    $query = "SELECT product_ID,product_Name,category_ID,decscription,category_Name,price,quantity,picture FROM product  INNER JOIN category where product.category_ID=category.cate_ID ORDER BY product_ID DESC LIMIT $start_from, $record_per_page";
    $result = mysqli_set_charset($connect, 'UTF8');
    $result = mysqli_query($connect, $query);
    $output .= "  
          <table class='table table-borderless table-striped table-earning'>  
               <tr>  
                    <th >Tên sản phẩm</th>  
                    <th >Danh mục</th>  
                    <th >Giá</th>  
                    <th >Số lượng</th>  
                    <th >Hình ảnh</th>  
                    <th >Tác Vụ</th>  
               </tr>  
     ";
    while($row = mysqli_fetch_array($result))
    {
        $output .= '  
               <tr>  
                    <td>'.$row["product_Name"].'</td>  
                    <td>'.$row["category_Name"].'</td>  
                    <td>'.$row["price"].'</td>  
                    <td>'.$row["quantity"].'</td>  
                    <td> <img style="width: 150px;height: 100px;" src='.$row["picture"].'> </td>
                    <td>
                     <button class="btn btn-success btn-sm"><a href="edit-product.php?product_ID='.$row["product_ID"].'" style="color:white;" class="fa fa-dot-circle-o">Sửa</a></button>
                     | 
                     <button class="btn btn-danger btn-sm"><a href="javascript:confirmDelete(\'delete-product.php?product_ID='.$row["product_ID"].'\')" style="color:white;" class="fa fa-dot-circle-o">Xoá</a></button>
                    </td>
               </tr>  
          ';
    }
    $output .= '</table><br /><div align="center">';
    $page_query = "SELECT product_ID,product_Name,category_ID,decscription,category_Name,price,quantity,picture FROM product  INNER JOIN category where product.category_ID=category.cate_ID ORDER BY product_ID DESC";
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