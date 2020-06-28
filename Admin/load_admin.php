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
$query = "SELECT * FROM admin ORDER BY admin_ID DESC LIMIT $start_from, $record_per_page";
$result = mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $query);
$output .= '  
          <table class="table table-borderless table-striped table-earning">  
               <tr>  
                    <th >Họ Và Tên</th>   
                    <th >Ngày Sinh</th>  
                    <th >Địa Chỉ</th>  
                    <th >Avatar</th>    
                    <th >Tác Vụ</th>  
               </tr>  
     ';
while($row = mysqli_fetch_array($result))
{
    $birthdays = $row["birthday"];
    $timestamp = strtotime($birthdays);
    $new_date = date("d-m-Y", $timestamp);
    $output .= '  
               <tr>  
                     
                    <td>'.$row["admin_Name"].'</td>  
                    <td>'.$new_date.'</td>  
                    <td>'.$row["address"].'</td>  
                    <td> <img style="width: 100px;height: 150px;" src='.$row["avatar"].'> </td>
                    <td>
                     <button class="btn btn-success btn-sm"><a href="edit-admin.php?admin_ID='.$row["admin_ID"].'" style="color:white;" class="fa fa-dot-circle-o">Sửa</a></button>
                     | 
                     <button class="btn btn-danger btn-sm"><a href="javascript:confirmDelete(\'delete-admin.php?admin_ID='.$row["admin_ID"].'\')" style="color:white;" class="fa fa-dot-circle-o">Xoá</a></button>
                    </td>
               </tr>  
          ';
}
$output .= '</table><br /><div align="center">';
$page_query = "SELECT * FROM admin ORDER BY admin_ID DESC";
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