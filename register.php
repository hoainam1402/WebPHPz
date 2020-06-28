<?php
    include_once ("Entities/user.php");
    if(isset($_POST["btnsubmit"])){
        $user_Account = $_POST["user_Account"];
        $password = $_POST["password"];
        $user_Name = $_POST["user_Name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $newaccount = new user($user_Account,$password,$user_Name,$address,$phone);
        $result = user::check_account($user_Account);
        if(empty($user_Account && $password && $user_Name && $address && $phone))
        { ?>
            <script> alert("Vui lòng điền đầy đủ thông tin");  </script> <?php
        }
        else
        {
            if (mysqli_num_rows($result) > 0)
            {?>
                <script> alert("Tài khoản đã tồn tại"); </script> <?php
            }
            else {
                $newaccount->save();?>
                <script> alert("Tạo tài khoản thành công");window.location.href='index.php' </script>;<?php
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="Admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="Admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="Admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="Admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="Admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-form">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên tài khoản</label>
                                <input class="au-input au-input--full" type="text" name="user_Account" placeholder="Nhập tên tài khoản" value="<?php echo isset($_POST["user_Account"]) ? $_POST["user_Account"] : "" ; ?>">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Nhập mật khẩu" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : "" ; ?>">
                            </div>
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input class="au-input au-input--full" type="text" name="user_Name" placeholder="Nhập họ và tên" value="<?php echo isset($_POST["user_Name"]) ? $_POST["user_Name"] : "" ; ?>">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="au-input au-input--full" type="text" name="address" placeholder="Nhập địa chỉ" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : "" ; ?>">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="au-input au-input--full" type="txt" name="phone" placeholder="Số điện thoại" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : "" ; ?>">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="aggree">Agree the terms and policy
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="btnsubmit">register</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Bạn đã có tài khoản ?
                                <a href="login.php">Đăng nhập ngay</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="Admin/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="Admin/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="Admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="Admin/vendor/slick/slick.min.js">
</script>
<script src="Admin/vendor/wow/wow.min.js"></script>
<script src="Admin/vendor/animsition/animsition.min.js"></script>
<script src="Admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="Admin/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="Admin/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="Admin/vendor/circle-progress/circle-progress.min.js"></script>
<script src="Admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="Admin/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="Admin/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="Admin/js/main.js"></script>

</body>

</html>
<!-- end document-->
