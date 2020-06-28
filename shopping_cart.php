<?php
include_once ("Inc/header.php");
include_once ("Inc/slide.php");
?>
<?php
include_once ("Config/db.class.php");
class DBController
{

    private $host = "localhost";

    private $user = "root";

    private $password = "";

    private $database = "caucashop";

    private $conn;

    function __construct()
    {
        $this->conn = $this->connectDB();
    }

    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    function runQuery($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }

        if (!empty($resultset)) {
            return $resultset;
        }
    }

    function bindQueryParams($sql, $param_type, $param_value_array)
    {
        $param_value_reference[] = &$param_type;
        for ($i = 0; $i < count($param_value_array); $i++) {
            $param_value_reference[] = &$param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }

    function insert($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}

include_once ("Entities/product.class.php");
include_once ("Entities/category.php");
$list = category::DanhSachLoaiSanPham();
error_reporting(E_ALL);
ini_set('display_errors','1');
if (isset($_GET["product_ID"]))
{
    session_start();
    $product_ID = $_GET["product_ID"];
    $was_found = false;
    $i = 0;
    if (!isset($_SESSION["carts_item"]) || count($_SESSION["carts_item"]) < 1){
        $_SESSION["carts_item"] = array(0 => array("product_ID"=>$product_ID,"quantity"=>1));
    }
    else{
        foreach ($_SESSION["carts_item"] as $item){
            $i++;
            while (list($key,$values) = each($item)){
                if ($key == "product_ID" && $values == $product_ID){
                    array_splice($_SESSION["carts_item"],$i-1,1,array(array("product_ID"=>$product_ID,"quantity"=>$item["quantity"]+1)));
                    $was_found = true;
                }
            }
        }
        if ($was_found == false){
            array_push($_SESSION["carts_item"],array("product_ID"=>$product_ID,"quantity" => 1));
        }
    }
    header("location: shopping_cart.php");
}
?>
<?php
// CONFIG: Enable debug mode. This means we'll log requests into 'ipn.log' in the same directory.
// Especially useful if you encounter network errors or other intermittent problems with IPN (validation).
// Set this to 0 once you go live or don't require logging.
define("DEBUG", 1);
// Set to 0 once you're ready to go live
define("USE_SANDBOX", 1);
define("LOG_FILE", "ipn.log");
// Read POST data
// reading posted data directly from $_POST causes serialization
// issues with array data in POST. Reading raw POST data from input stream instead.
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
    $keyval = explode ('=', $keyval);
    if (count($keyval) == 2)
        $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
    $get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
    if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
        $value = urlencode(stripslashes($value));
    } else {
        $value = urlencode($value);
    }
    $req .= "&$key=$value";
}
// Post IPN data back to PayPal to validate the IPN data is genuine
// Without this step anyone can fake IPN data
if(USE_SANDBOX == true) {
    $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
} else {
    $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
}
$ch = curl_init($paypal_url);
if ($ch == FALSE) {
    return FALSE;
}
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
if(DEBUG == true) {
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
}
// CONFIG: Optional proxy configuration
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
// Set TCP timeout to 30 seconds
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
// CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
// of the certificate as shown below. Ensure the file is readable by the webserver.
// This is mandatory for some environments.
//$cert = __DIR__ . "./cacert.pem";
//curl_setopt($ch, CURLOPT_CAINFO, $cert);
$res = curl_exec($ch);
if (curl_errno($ch) != 0) // cURL error
{
    if(DEBUG == true) {
        error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);
    }
    curl_close($ch);
    exit;
} else {
    // Log the entire HTTP response if debug is switched on.
    if(DEBUG == true) {
        error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);
        error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);
    }
    curl_close($ch);
}
// Inspect IPN validation result and act accordingly
// Split response headers and payload, a better way for strcmp
$tokens = explode("\r\n\r\n", trim($res));
$res = trim(end($tokens));
if (strcmp ($res, "VERIFIED") == 0) {
    // assign posted variables to local variables
    $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];

    include("DBController.php");
    $db = new DBController();

    // check whether the payment_status is Completed
    $isPaymentCompleted = false;
    if($payment_status == "Completed") {
        $isPaymentCompleted = true;
    }
    // check that txn_id has not been previously processed
    $isUniqueTxnId = false;
    $param_type="s";
    $param_value_array = array($txn_id);
    $result = $db->runQuery("SELECT * FROM payment WHERE txn_id = ?",$param_type,$param_value_array);
    if(empty($result)) {
        $isUniqueTxnId = true;
    }
    // check that receiver_email is your PayPal email
    // check that payment_amount/payment_currency are correct
    if($isPaymentCompleted) {
        $param_type = "sssdss";
        $param_value_array = array($item_number, $item_name, $payment_status, $payment_amount, $payment_currency, $txn_id);
        $payment_id = $db->insert("INSERT INTO payment(item_number, item_name, payment_status, payment_amount, payment_currency, txn_id) VALUES(?, ?, ?, ?, ?, ?)", $param_type, $param_value_array);

    }
    // process payment and mark item as paid.


    if(DEBUG == true) {
        error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
    }

} else if (strcmp ($res, "INVALID") == 0) {
    // log for manual investigation
    // Add business logic here which deals with invalid IPN messages
    if(DEBUG == true) {
        error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
    }
}
?>
    <div class="container">
        <center>
            <h2>Thông Tin Giỏ Hàng</h2>
        </center>
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
            <table class="table table-borderless table-striped table-earning">
                <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Giá Thành</th>
                    <th>Thành Tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $tota_money = 0;
                if(isset($_SESSION["carts_item"]) && count($_SESSION["carts_item"]) >0)
                {
                    foreach($_SESSION["carts_item"] as $item){
                        $product_ID = $item["product_ID"];
                        $product = Product::get_product($product_ID);
                        $product = reset($product);
                        $tota_money += $item["quantity"]*$product["price"];
                        echo'<tr>
                                <td>'.$product["product_Name"].'</td>
                                <td><img style ="width:90px; height:80px;" src="Webphp/'.$product["picture"].'"/></td>
                                <td>'.$item["quantity"].'</td>
                                <td>'.number_format($product["price"]).' VNĐ</td>
                                <td>'.number_format($product["price"]*$item["quantity"]).' VNĐ</td>
                            </tr>';
                    }
                    echo'<tr>
                            <td class="cate_panel"><span style="box-sizing: border-box; font-weight: bold;">Tổng Tiền:</span></td>
                            <td class="cate_panel"></td>
                            <td class="cate_panel"></td>
                            <td class="cate_panel"></td>
                            <td class="cate_panel"><span style="box-sizing: border-box; font-weight: bold;">'.number_format($tota_money).' VNĐ</span></td>
                         </tr>
                    ';
                    echo"<tr>
                            <td>
                                <button type=\"button\" onclick=\"window.location.href ='danh-muc.php?category_ID=5'\" class=\"button\">
                                    <span><i class=\"\"></i> Tiếp tục mua hàng</span>
                                </button>
                                 <button type=\"button\" onclick=\"window.location.href ='XoaGioHang.php'\" class='button'>
                                    <span><i class=''></i> Xóa Tất Cả </span>
                                </button>
                                
                           </td>
                           <td>
                                <div id=\"payment-box\">
                                    <form action = \"https://www.sandbox.paypal.com/cgi-bin/webscr\" method = \"post\" target = \"_top\" >   
                                        <input type='hidden' name='business' value='sb-lmae47258491@business.example.com'>";
                                        foreach($_SESSION["carts_item"] as $item) {
                                            $product_ID = $item["product_ID"];
                                            $product = Product::get_product($product_ID);
                                            $product = reset($product);
                                            $tota_money += $item["quantity"] * $product["price"];
                                            $product_price = ($product["price"]/23000);
                                            echo ' <input type="hidden" name="item_name" value=' . $product["product_Name"] . '> 
                                            <input type="hidden" name="item_number" value='.$item["product_ID"].'> 
                                            <input type="hidden" name="amount" value='.$product_price.'> 
                                            <input type="hidden" name="no_shipping" value='.$item["quantity"].'> 
                                            <input type="hidden" name="currency_code" value="USD"> ';
                                        }echo '<input type="hidden" name="notify_url" value="http://sitename/paypal-payment-gateway-integration-in-php/notify.php">
                                        <input type="hidden" name="cancel_return" value="shopping_cart.php">
                                        <input type="hidden" name="return" value="http://sitename/paypal-payment-gateway-integration-in-php/return.php">
                                        <input type="hidden" name="cmd" value="_xclick"> 
                                        <input type="submit" name="pay_now" id="pay_now" Value="Pay Pal">
                                    </form>
                                </div>
                           </td>
                    </tr>';
                } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include_once ("Inc/footer.php");
?>