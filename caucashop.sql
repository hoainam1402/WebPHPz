-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 28, 2020 lúc 12:13 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `caucashop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_Name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `avatar` text COLLATE utf8_unicode_ci,
  `admin_account` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_Name`, `password`, `address`, `phone`, `avatar`, `admin_account`, `birthday`) VALUES
(13, 'Phan Hoài Nam', 'NDIyMzMyMTBuYW0=', '32/17 Võ văn hát Quận 9', '0333736654', '../Content/img/nam.jpg', 'hoainam1402', '1998-02-14 00:00:00'),
(15, 'Phạm Hà Tiến Thanh', 'dGhhbmgxMTEx', 'Nguyễn Thái Sơn, Gò Vấp, Tp Hồ Chí Minh', '0947977209', '../Content/img/85212721_2523260047935049_9122059054036811776_o.jpg', 'tienthanh16dthc5', '1998-01-01 13:00:00'),
(16, 'Huỳnh Nguyễn Ngọc Thiện', 'dGhpZW4xMTEx', 'Nguyễn Thái Sơn, Gò Vấp, Tp Hồ Chí Minh', '0358310505', '../Content/img/15156915_1847795398782277_1561896349850229325_o.jpg', 'ngocthien16dtc5', '1998-01-01 01:00:00'),
(17, 'Đỗ Chiếm Hữu', 'aHV1MTExMQ==', 'Phan Huy Ích, Gò Vấp, tp Hồ Chí Minh', '0947977209', '../Content/img/a.png', 'chiemhuu16dthc5', '1998-01-01 13:00:00'),
(18, 'Trần Minh Thuận', 'dGh1YW4xMTEx', 'Đường số 8, Quận 12, tp Hồ Chí Minh', '0358310505', '../Content/img/92549259_850595605407864_6237859304976678912_n.jpg', 'minhthuan16dthc5', '1998-01-01 13:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cart_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `quantity` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_ID` int(11) NOT NULL,
  `category_Name` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_ID`, `category_Name`) VALUES
(5, 'Cần Câu'),
(6, 'Máy Câu'),
(7, 'Mồi Câu'),
(8, 'Phụ Kiện Khác'),
(9, 'Test'),
(10, 'Test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `customer_Name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci,
  `phone` int(11) DEFAULT NULL,
  `account` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `images_ID` int(11) NOT NULL,
  `url` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_ID` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `product_Name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `category_ID` int(11) NOT NULL,
  `decscription` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `picture` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_ID`, `product_Name`, `category_ID`, `decscription`, `price`, `quantity`, `picture`, `created`) VALUES
(1, 'SHIMANO SCORPION 1652R-2 - 1.98M - MÁY NGANG', 5, '<ul>\r\n<li>Sản phẩm: Ch&iacute;nh h&atilde;ng SHIMANO</li>\r\n<li>Spiral X, HI-POWER X, CI4+</li>\r\n<li>Reel seat: CI4+</li>\r\n<li>Guide: STAINLESS FRAME SIC</li>\r\n<li>Grip: CORK</li>\r\n<li>Model: 1652R-2</li>\r\n<li>Độ d&agrave;i: 1.98m</li>\r\n<li>Số kh&uacute;c: 2</li>\r\n<li>Độ d&agrave;i thu gọn: 130 cm</li>\r\n</ul>', 5750000, 10, '../Content/img/can-cau-1.jpg', '2020-06-01 18:58:29'),
(4, 'Shimano Panzar 1610M-2 - 2.1m - Máy Ngang', 5, '<ul>\r\n<li>Sản phẩm: Ch&iacute;nh h&atilde;ng SHIMANO</li>\r\n<li>Guide: FUJI</li>\r\n<li>Grip: EVA</li>\r\n<li>Reel seat: Fuji</li>\r\n<li>Ph&ocirc;i: GRAPHITE COMPOSITE</li>\r\n<li>Model: 1610M-2</li>\r\n</ul>', 2200000, 10, '../Content/img/can-cau-5.jpg', '2020-06-01 19:21:23'),
(5, 'Daiwa Acculite', 5, '<ul>\r\n<li>Cần m&aacute;y đứng Daiwa Acculite</li>\r\n<li>Chất liệu: carbon IM6</li>\r\n<li>Khoen nh&ocirc;m, bọc ngo&agrave;i bằng th&eacute;p kh&ocirc;ng gỉ</li>\r\n<li>Độ cứng: Medium Fast - Trung b&igrave;nh nhanh</li>\r\n<li>Lure: 3/8 - 1 oz</li>\r\n</ul>', 1400000, 10, '../Content/img/can-cau-2.jpg', '2020-06-01 19:27:39'),
(6, 'Cần Daiwa Prorex 662MHFB AF ', 5, '<ul>\r\n<li>Cần M&aacute;y Ngang Daiwa Prorex 662MHFB-AF</li>\r\n<li>Sản xuất: Daiwa Ph&aacute;p</li>\r\n<li>Chiều d&agrave;i: 1.98 m&eacute;t</li>\r\n<li>Số kh&uacute;c: 2</li>\r\n<li>Thu gọn: 104 cm</li>\r\n<li>Cast WT: 7-28 gam</li>\r\n<li>Khoen Fuji Fazlite, ch&acirc;n K</li>\r\n<li>C&ocirc;ng nghệ: X45, HVF, V-Joint</li>\r\n</ul>', 6850000, 10, '../Content/img/can-cau-4.jpg', '2020-06-01 23:22:28'),
(7, 'Cần câu 2 khúc rỗng - Bọng HĐ91', 5, '<p><span style=\"box-sizing: border-box; font-weight: bolder;\">Cần c&acirc;u 2 kh&uacute;c rỗng - Bọng HĐ91&nbsp;</span>&nbsp;c&oacute; thiết kế đơn giản nhưng tinh tế, mang t&iacute;nh thẩm mỹ cao, đặc biệt rất dễ thao t&aacute;c v&agrave; sử dụng.</p>\r\n<p>Cần được l&agrave;m bằng chất liệu 90% cacbon chắc chắn, c&oacute; thể tải c&aacute; l&ecirc;n đến 10kg.</p>\r\n<p>Đọt cần 2,5ly, đặc biệt tải tĩnh 2kg.</p>\r\n<p>Bộ cần th&iacute;ch hợp cho người mới bắt đầu c&acirc;u c&aacute; lẫn chuy&ecirc;n nghiệp.</p>\r\n<p>Cần c&acirc;u c&oacute; nhiều size chọn lựa như 2m1, 2m4, 2m7.</p>', 5800000, 15, '../Content/img/can-cau-9.jpg', '2020-06-23 19:59:43'),
(8, 'Cần Câu Lure Super 2 ngọn + máy câu cá TFB + mồi câu lure kèm phụ kiện', 5, '<p>Cần c&acirc;u Lure super 2 ngọn</p>\r\n<p>1 ngọn M v&agrave; 1 ngọn MH</p>\r\n<p>d&agrave;i 1m8 , 2m1 , 2m4</p>\r\n<p>Chất Liệu :Carbon</p>\r\n<p>Đầu bu chống xoắn</p>\r\n<p>Tải mồi 10-28g</p>\r\n<p>phụ kiện tặng k&egrave;m hấp dẫn</p>\r\n<p>cần lure 2 ngọn</p>\r\n<p>m&aacute;y c&acirc;u c&aacute; kim loại TFB3000</p>\r\n<p>cước c&acirc;u c&aacute; 100m</p>\r\n<p>3 mồi c&acirc;u lure nhạy c&aacute;</p>\r\n<p>kh&oacute;a link</p>\r\n<p>ch&igrave; c&acirc;u lure</p>', 2450000, 17, '../Content/img/can-cau-7.jpg', '2020-06-23 20:00:55'),
(11, 'DAIWA Strike Force', 6, '<p>Sản phẩm chất lượng cao</p>', 345000, 12, '../Content/img/may-1.jpg', '2020-06-23 20:35:48'),
(12, 'Máy câu cá DEUKIO AC2000- AC7000 NEW 2020', 6, '<p>M&aacute;y C&acirc;u chất lượng cao Xuất xứ từ Nhật Bản</p>', 340000, 1, '../Content/img/may-2.jpg', '2020-06-23 20:39:40'),
(13, 'Máy Câu Đứng SHIMANO FX 4000 New 2019', 6, '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; text-align: justify; line-height: 26px; font-size: 16px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\">M&aacute;y c&acirc;u đứng Shimano FX New 2019 Size 1000 :</span>Gi&aacute;: 539,000V&ograve;ng tua: 5.0:1 Bạc đạn: 2+1 &nbsp;Tải c&aacute;: 3kg Trọng lượng m&aacute;y: 225gr&nbsp;Độ v&agrave;o d&acirc;y PE: 0.25mm/90m</p>', 360000, 10, '../Content/img/may-3.jpg', '2020-06-23 20:44:06'),
(14, 'Máy câu cá Expert 1000,2000,3000,4000,5000,6000', 6, '<p>Cối kim loại&nbsp; Số đạn bạc :5 V&ograve;ng quay : 4.7:1</p>', 350000, 10, '../Content/img/may-4.jpg', '2020-06-23 20:50:37'),
(15, 'Shimano Curado K', 6, '<p>Shimano Curado DC thừa hưởng những t&iacute;nh năng ưu việt về độ bền, độ ch&iacute;nh x&aacute;c v&agrave; t&iacute;nh linh hoạt m&agrave; Curado được biết đến, giờ đ&acirc;y Shimano đ&atilde; n&acirc;ng tầm ...</p>', 520000, 10, '../Content/img/may-5.jpg', '2020-06-23 20:53:39'),
(16, 'Mồi Cá Sắt Orichi 10g Đủ Màu', 7, '<p>Cam kết đổi trả nếu sản phẩm kh&ocirc;ng giống như m&ocirc; tả</p>\r\n<p>Th&ocirc;ng tin sản phẩm:&nbsp;</p>\r\n<p>Trọng lượng: 10g</p>\r\n<p>Chiều d&agrave;i: 5cm</p>\r\n<p>M&agrave;u sắc: Nhiều M&agrave;u&nbsp;</p>\r\n<p>Chất Liệu: Sắt</p>\r\n<p>Thể loại: kh&ocirc;ng ph&aacute;t tiếng k&ecirc;u (thu h&uacute;t nhiều lo&agrave;i c&aacute; nh&aacute;t săn mồi)</p>', 30000, 20, '../Content/img/moi-1.jpg', '2020-06-23 20:57:16'),
(17, 'Mồi câu hunter v4, mồi lure cá lóc, mồi giả câu cá lóc thái lan, mồi câu cá chuối', 7, '<p>MỒI C&Acirc;U HUNTER V4:</p>\r\n<p>Mồi c&acirc;u c&aacute; l&oacute;c giả th&aacute;i lan l&agrave; nh&aacute;i mồi mềm chuy&ecirc;n c&acirc;u lure c&aacute; l&oacute;c b&ocirc;ng, hồ giả tr&iacute;, l&oacute;c đồng, c&aacute; quả c&aacute; chuối c&aacute; sộp</p>\r\n<p>Chất liệu: Cao su mềm 3 lớp v&agrave; đ&agrave;n hồi. M&agrave;u sắc: xanh, cam, x&aacute;m</p>\r\n<p>K&iacute;ch thước: d&agrave;i 6 cm, nặng 7 gam. L&agrave; k&iacute;ch thước con mồi y&ecirc;u th&iacute;ch của c&aacute;c những ch&uacute; c&aacute; l&oacute;c.</p>\r\n<p>Hunter v4 mồi c&acirc;u th&aacute;i lan c&oacute;&nbsp; th&igrave;a tạo s&oacute;ng, tạo bọt thu h&uacute;t những ch&uacute; c&aacute; l&oacute;c khi bạn lure</p>', 155000, 10, '../Content/img/moi-5.jpg', '2020-06-23 21:05:05'),
(18, 'Mồi Lure - Minnow LD158 - mồi Lure câu cá', 7, '<p>Cam kết đổi trả nếu sản phẩm kh&ocirc;ng giống như m&ocirc; tả</p>\r\n<p>Th&ocirc;ng tin sản phẩm:&nbsp;</p>\r\n<p>Trọng lượng: 10g</p>\r\n<p>Chiều d&agrave;i: 5cm</p>\r\n<p>M&agrave;u sắc: Nhiều M&agrave;u&nbsp;</p>\r\n<p>Chất Liệu: Sắt</p>\r\n<p>Thể loại: kh&ocirc;ng ph&aacute;t tiếng k&ecirc;u (thu h&uacute;t nhiều lo&agrave;i c&aacute; nh&aacute;t săn mồi)</p>', 30000, 10, '../Content/img/moi-4.jpg', '2020-06-23 21:06:39'),
(19, 'Mồi Lure, Cá Sắt Orichi, Fishen Full Lưỡi BKK', 7, '<p>[Xả Kho 3 Ng&agrave;y] Mồi Lure, C&aacute; Sắt Orichi, Fishen Full Lưỡi BKK</p>\r\n<p>Chất liệu : kim loại nguy&ecirc;n khối</p>\r\n<p>Buộc trực tiếp d&acirc;y trục d&acirc;y leader v&agrave;o mani ( kh&oacute;a link)</p>\r\n<p>Thiết kế lưỡi 3 ti&ecirc;u bkk chắc chắn</p>\r\n<p>Th&acirc;n h&igrave;nh gịn th&iacute;ch hợp c&acirc;u c&aacute; vược</p>', 50000, 10, '../Content/img/moi-2.jpg', '2020-06-23 21:08:02'),
(20, 'Mồi giả nhái hơi Frog Toon V1 V2 V3 V4 Thái Lan - Chuyên câu Lure siêu nhậy', 7, '<p>Mồi giả Frog Toon V1 V2 V3 V4</p>\r\n<p>Xuất sứ: Th&aacute;i Lan</p>\r\n<p>Kiểu d&aacute;ng mồi giả 3D</p>\r\n<p>Chất liệu cao su tổng hợp</p>\r\n<p>K&iacute;ch Thước c&aacute;c loại frog toon</p>\r\n<p>V1: 6gr - 3,7cm</p>\r\n<p>V4: loại 1: 8gr</p>\r\n<p>Cao su : 3 lớp</p>\r\n<p>Lưỡi : &Ocirc;m s&aacute;t th&acirc;n chống vướng ho&agrave;n hảo</p>\r\n<p>Th&igrave;a : 2 th&igrave;a xoay hiệu quả gấp đ&ocirc;i.... Mồi v4 , mồi c&acirc;u ca frog toon</p>\r\n<p>Được l&agrave;m bằng cao xu mềm.</p>\r\n<p>C&oacute; 2 th&igrave;a xoay&nbsp;</p>\r\n<p>D&agrave;i 3.7cm nặng 6g</p>', 80000, 10, '../Content/img/moi-3.jpg', '2020-06-23 21:09:30'),
(22, 'a', 8, 'a', 1001, 1, 'adas', '2020-06-27 18:04:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `promotion_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `cart_ID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `user_Account` varchar(21) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_Name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_ID`, `user_Account`, `password`, `user_Name`, `address`, `phone`, `avatar`) VALUES
(1, 'hoai.nam', 'NDIyMzMyMTA=', 'Phan Hoài Nam a', '32/17 Võ văn hát Quận 9', '0333736654', 'Content/img/moi-3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Chỉ mục cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cart_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_ID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD KEY `images_ID` (`images_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `product_ID` (`product_ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `promotion_ID` (`promotion_ID`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD KEY `cart_ID` (`cart_ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`),
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`promotion_ID`) REFERENCES `promotion` (`promotion_ID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `category` (`cate_ID`);

--
-- Các ràng buộc cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`cart_ID`) REFERENCES `cartdetail` (`cart_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
