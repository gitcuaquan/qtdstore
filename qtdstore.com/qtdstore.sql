-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2021 lúc 03:51 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qtdstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `bill_id` int(11) NOT NULL,
  `bill_code` varchar(50) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `delivery_fee_id` int(11) DEFAULT NULL,
  `method_pay` enum('0','1') NOT NULL DEFAULT '0',
  `shipping_code` varchar(20) DEFAULT NULL,
  `bill_date` date NOT NULL DEFAULT current_timestamp(),
  `total` float NOT NULL DEFAULT 0,
  `num_order` int(5) NOT NULL DEFAULT 0,
  `bill_status` enum('0','1') NOT NULL DEFAULT '0',
  `bill_condition` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_id`, `bill_code`, `discount_id`, `delivery_fee_id`, `method_pay`, `shipping_code`, `bill_date`, `total`, `num_order`, `bill_status`, `bill_condition`) VALUES
(1, 'HD202011241', NULL, 1, '0', NULL, '2020-11-24', 1820000, 4, '1', '0'),
(2, 'HD202011242', NULL, 1, '0', NULL, '2020-11-24', 1385000, 3, '1', '1'),
(3, 'HD202011253', NULL, 4, '0', NULL, '2020-11-25', 1385000, 3, '0', '0'),
(4, 'HD202011304', NULL, 4, '1', '', '2020-11-30', 935000, 2, '1', '1'),
(5, 'HD202011305', NULL, 1, '0', NULL, '2020-11-30', 1370000, 3, '1', '0'),
(6, 'HD202011306', NULL, 1, '0', NULL, '2020-11-30', 920000, 2, '0', '0'),
(7, 'HD202011307', NULL, 6, '0', NULL, '2020-11-30', 1415000, 3, '1', '1'),
(8, 'HD202011308', NULL, 3, '0', NULL, '2020-11-30', 250000, 1, '1', '0'),
(9, 'HD202011309', NULL, 1, '0', NULL, '2020-11-30', 900000, 2, '0', '0'),
(10, 'HD202012110', NULL, 2, '1', NULL, '2020-12-01', 1585000, 4, '1', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(30) NOT NULL,
  `category_description` varchar(200) NOT NULL,
  `category_parent_id` int(11) DEFAULT NULL,
  `category_level` int(1) NOT NULL,
  `category_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_title`, `category_description`, `category_parent_id`, `category_level`, `category_code`) VALUES
(4, 'Sản phẩm', 'QTD Store - Tất cả sản phẩm...', NULL, 0, 'SP'),
(5, 'Giới thiệu', '', NULL, 0, 'GT'),
(6, 'Liên hệ', '', NULL, 0, 'LH'),
(7, 'Thời trang', 'QTD Store - Cửa hàng chuyên thời trang, phụ kiện nam, nữ, unisex, các bộ thời trang theo mùa,...', 4, 1, 'TT'),
(8, 'Phụ kiện', 'QTD Store - Cửa hàng chuyên thời trang, phụ kiện nam, nữ, unisex, các bộ thời trang theo mùa,...', 4, 1, 'PK'),
(9, 'Nam', 'QTD Store - Quần áo, phụ kiện cho nam giới....', 26, 2, 'NA'),
(10, 'Nữ', 'QTD Store - Quần áo, phụ kiện cho nữ giới....', 26, 2, 'NU'),
(11, 'Unisex', 'QTD Store - Quần áo, phụ kiện cho mọi giới tính...', 26, 2, 'UNI'),
(12, 'Thời trang theo mùa', 'QTD Store - Quần áo, phụ kiện theo mùa xuân hè, thu đông...', 4, 1, 'TTTM'),
(13, 'Quần', 'QTD Store - Các loại quần', 7, 2, 'Q'),
(14, 'Áo', 'QTD Store - Các loại áo', 7, 2, 'A'),
(15, 'Váy', 'QTD Store - Các loại váy...', 7, 2, 'V'),
(16, 'Mũ', 'QTD Store - Các loại mũ...', 8, 2, 'MU'),
(17, 'Thắt lưng', 'QTD Store - Các loại thắt lưng...', 8, 2, 'TL'),
(18, 'Tất', 'QTD Store - Các loại tất...', 8, 2, 'T'),
(19, 'Thời trang xuân hè', 'QTD Store - Thời trang, phụ kiện theo mùa: Xuân hè....', 12, 2, 'TTXH'),
(20, 'Thời trang thu đông', 'QTD Store - Thời trang, phụ kiện theo mùa: Thu đông...', 12, 2, 'TTTD'),
(21, 'Về chúng tôi', '', 5, 1, 'VCT'),
(22, 'Chính sách cộng tác viên', '', 5, 1, 'CTV'),
(23, 'Hướng dẫn thanh toán', '', 5, 1, 'CSTT'),
(24, 'Chính sách đổi trả', '', 5, 1, 'CSDT'),
(25, 'Chính sách bảo mật', '', 5, 1, 'BM'),
(26, 'Giới tính', 'QTD Store - Thời trang theo các giới tính....', 4, 1, 'GT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_phone` varchar(11) NOT NULL,
  `customer_fullname` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_phone`, `customer_fullname`, `customer_email`, `customer_address`, `user_id`, `region_id`) VALUES
(2, '0363100093', 'Nguyễn Đức Thương', 'ndtspear@gmail.com', 'Bắc Ninh', 1, 1),
(3, '0974885382', 'Nguyễn Văn Â', '', 'Mễ Trì - Từ Liêm - Hà Nội', NULL, 1),
(4, '0123456789', 'Bô lão Q', '', 'Ba Vì - Hà Nội', NULL, 1),
(5, '0254455554', 'Bô lão D', 'qtsdttere@gmail.com', 'Hà Nội', NULL, 1),
(6, '0156545879', 'Bô lão T', '', 'Bắc Ninh', NULL, 1),
(7, '0123458796', 'Các bô lão', '', 'Mũi Né', NULL, 3),
(8, '0231456789', 'Trần Văn C', '', 'Cam Ranh', NULL, 3),
(9, '0254612578', 'Nguyễn thị Yến', 'tranducnambn1999@gmail.com', 'Bắc Ninh', 7, 1),
(10, '0665487989', 'Nguyễn BCD', '', 'Nghệ An', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer_bill`
--

CREATE TABLE `tbl_customer_bill` (
  `customer_bill_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer_bill`
--

INSERT INTO `tbl_customer_bill` (`customer_bill_id`, `customer_id`, `bill_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_name` enum('normal','express') NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`delivery_id`, `delivery_name`) VALUES
(1, 'normal'),
(2, 'express');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_delivery_fee`
--

CREATE TABLE `tbl_delivery_fee` (
  `delivery_fee_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `delivery_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_delivery_fee`
--

INSERT INTO `tbl_delivery_fee` (`delivery_fee_id`, `delivery_id`, `region_id`, `delivery_fee`) VALUES
(1, 1, 1, 20000),
(2, 1, 2, 35000),
(3, 1, 3, 50000),
(4, 2, 1, 35000),
(5, 2, 2, 50000),
(6, 2, 3, 65000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_bill`
--

CREATE TABLE `tbl_detail_bill` (
  `detail_bill_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `size` enum('s','m','l','xl','xxl','over') NOT NULL DEFAULT 's'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_bill`
--

INSERT INTO `tbl_detail_bill` (`detail_bill_id`, `bill_id`, `product_id`, `qty`, `size`) VALUES
(1, 1, 2, 4, 's'),
(2, 2, 3, 2, 'l'),
(3, 2, 10, 1, 'm'),
(4, 3, 13, 2, 's'),
(5, 3, 4, 1, 's'),
(6, 4, 11, 2, 'm'),
(7, 5, 8, 1, 'l'),
(8, 5, 4, 2, 'l'),
(9, 6, 10, 1, 's'),
(10, 6, 8, 1, 's'),
(11, 7, 1, 1, 's'),
(12, 7, 3, 2, 's'),
(13, 8, 23, 1, 'm'),
(14, 9, 7, 2, 'm'),
(15, 10, 7, 3, 'm'),
(16, 10, 23, 1, 'm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_wish_cart`
--

CREATE TABLE `tbl_detail_wish_cart` (
  `detail_wish_cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `discount_id` int(11) NOT NULL,
  `discount_code` varchar(10) NOT NULL,
  `discount_value` float NOT NULL,
  `discount_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_img`
--

CREATE TABLE `tbl_img` (
  `img_id` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_img`
--

INSERT INTO `tbl_img` (`img_id`, `img_url`) VALUES
(1, 'public/uploads/users/user-basic.png'),
(2, 'public/uploads/product/3IARQAri3edWklQB0sqk_simg_de2fe0_500x500_maxb.jpg'),
(3, 'public/uploads/product/3IARQAri3edWklQB0sqk_simg_de2fe0_500x500_maxb.jpg'),
(4, 'public/uploads/product/L6LBArnnrEouK2p49DbD_simg_de2fe0_500x500_maxb.jpg'),
(5, 'public/uploads/product/p9UeG5pEGs69gAcGUxyz_simg_de2fe0_500x500_maxb.jpg'),
(6, 'public/uploads/product/uhJ6R28G3FlhTkqktsb6_simg_de2fe0_500x500_maxb.jpg'),
(7, 'public/uploads/product/ynZQvrxiCLt7jbHoD2to_simg_de2fe0_500x500_maxb.jpg'),
(8, 'public/uploads/product/fqr5GIqbNql367x01jCR_simg_de2fe0_500x500_maxb.jpg'),
(9, 'public/uploads/product/86WylPmAv1zE0aasy840_simg_de2fe0_500x500_maxb.png'),
(10, 'public/uploads/product/fqr5GIqbNql367x01jCR_simg_de2fe0_500x500_maxb.jpg'),
(11, 'public/uploads/product/KIWMc6DrMzkXNDk3LpVW_simg_de2fe0_500x500_maxb.jpg'),
(12, 'public/uploads/product/kxlE6ksoigePUPk3juKh_simg_de2fe0_500x500_maxb.jpg'),
(13, 'public/uploads/product/zT7QYCiJe6VP3wFpYtVy_simg_de2fe0_500x500_maxb.jpg'),
(14, 'public/uploads/product/8hAqz4XsJ69hWFEpEQLn_simg_de2fe0_500x500_maxb.jpg'),
(15, 'public/uploads/product/5gzcyjFlFsBMmErZsBDd_simg_de2fe0_500x500_maxb.jpg'),
(16, 'public/uploads/product/8hAqz4XsJ69hWFEpEQLn_simg_de2fe0_500x500_maxb.jpg'),
(17, 'public/uploads/product/14a50vKUvDoG2EKsSWiH_simg_de2fe0_500x500_maxb.jpg'),
(18, 'public/uploads/product/I8aQkYxf2orYuDkc1aa1_simg_de2fe0_500x500_maxb.jpg'),
(19, 'public/uploads/product/KN1EY76dL6rkD1B4cF7T_simg_de2fe0_500x500_maxb.jpg'),
(20, 'public/uploads/product/E8sR1F_simg_de2fe0_500x500_maxb.jpg'),
(21, 'public/uploads/product/E8sR1F_simg_de2fe0_500x500_maxb.jpg'),
(22, 'public/uploads/product/i0C28u_simg_de2fe0_500x500_maxb.jpg'),
(23, 'public/uploads/product/jcajEY_simg_de2fe0_500x500_maxb.jpg'),
(24, 'public/uploads/product/o4Lmev_simg_de2fe0_500x500_maxb.jpg'),
(25, 'public/uploads/product/bdcw4mRtbfIBr6lzQ1GE_simg_de2fe0_500x500_maxb.jpg'),
(26, 'public/uploads/product/bdcw4mRtbfIBr6lzQ1GE_simg_de2fe0_500x500_maxb.jpg'),
(27, 'public/uploads/product/DiY4sp1RYeNC1PrbGXpR_simg_de2fe0_500x500_maxb.jpg'),
(28, 'public/uploads/product/pr0jTiJvxUwLWNfNpnto_simg_de2fe0_500x500_maxb.jpg'),
(29, 'public/uploads/product/xA4Mgh7oqiGZKYINXJfV_simg_de2fe0_500x500_maxb.jpg'),
(30, 'public/uploads/product/0uBiHA_simg_de2fe0_500x500_maxb.jpg'),
(31, 'public/uploads/product/0uBiHA_simg_de2fe0_500x500_maxb.jpg'),
(32, 'public/uploads/product/izEWVD_simg_de2fe0_500x500_maxb.jpg'),
(33, 'public/uploads/product/LE187V_simg_de2fe0_500x500_maxb.jpg'),
(34, 'public/uploads/product/vL5Vci_simg_de2fe0_500x500_maxb.jpg'),
(35, 'public/uploads/product/YwPUlMmc1W83G79wscJR_simg_de2fe0_500x500_maxb.jpg'),
(36, 'public/uploads/product/6hviclBP0tBH3jDlTBwH_simg_de2fe0_500x500_maxb.jpg'),
(37, 'public/uploads/product/K0rMhkIXXXBUfFwsSbG2_simg_de2fe0_500x500_maxb.jpg'),
(38, 'public/uploads/product/kNK26IKAebDdUj0h5mLV_simg_de2fe0_500x500_maxb.jpg'),
(39, 'public/uploads/product/wqufdFawSw7S2gVfqpqx_simg_de2fe0_500x500_maxb.jpg'),
(40, 'public/uploads/product/YwPUlMmc1W83G79wscJR_simg_de2fe0_500x500_maxb.jpg'),
(41, 'public/uploads/product/Jl336D_simg_de2fe0_500x500_maxb.jpg'),
(42, 'public/uploads/product/66AiKF_simg_de2fe0_500x500_maxb.jpg'),
(43, 'public/uploads/product/Jl336D_simg_de2fe0_500x500_maxb.jpg'),
(44, 'public/uploads/product/TaMrFc_simg_de2fe0_500x500_maxb.jpg'),
(45, 'public/uploads/product/U4Qkal_simg_de2fe0_500x500_maxb.jpg'),
(46, 'public/uploads/product/ybf8aX_simg_de2fe0_500x500_maxb.jpg'),
(47, 'public/uploads/product/byu7776oa4lMLj5zoqEc_simg_de2fe0_500x500_maxb - Copy.jpg'),
(48, 'public/uploads/product/byu7776oa4lMLj5zoqEc_simg_de2fe0_500x500_maxb.jpg'),
(49, 'public/uploads/product/BzHLr6Ff5ZBcIu3h6xHX_simg_de2fe0_500x500_maxb.jpg'),
(50, 'public/uploads/product/JSG4ptWfOpxuq7dIqj6u_simg_de2fe0_500x500_maxb.jpg'),
(51, 'public/uploads/product/oDfuObnDyyEBSKYIybBC_simg_de2fe0_500x500_maxb.jpg'),
(52, 'public/uploads/product/RKvP1siP9shoX6MBfZ6p_simg_de2fe0_500x500_maxb.jpg'),
(53, 'public/uploads/product/Yu5BIqPVnHpU5fI5TFGO_simg_de2fe0_500x500_maxb.jpg'),
(54, 'public/uploads/product/8CRGqFGkUBzLqEHGljlA_simg_de2fe0_500x500_maxb.jpg'),
(55, 'public/uploads/product/8CRGqFGkUBzLqEHGljlA_simg_de2fe0_500x500_maxb.jpg'),
(56, 'public/uploads/product/11pkpjqZ2NOhXypZt8l2_simg_de2fe0_500x500_maxb.jpg'),
(57, 'public/uploads/product/gUGUWJMiYH1DuGoyH0Nh_simg_de2fe0_500x500_maxb.jpg'),
(58, 'public/uploads/product/td5RryaahEB5LKOVuuuA_simg_de2fe0_500x500_maxb.jpg'),
(59, 'public/uploads/product/v1gJKs67S5zXY9G2L1Rm_simg_de2fe0_500x500_maxb.jpg'),
(60, 'public/uploads/product/OFVEx6_simg_de2fe0_500x500_maxb.jpg'),
(61, 'public/uploads/product/OFVEx6_simg_de2fe0_500x500_maxb.jpg'),
(62, 'public/uploads/product/R6Qt58_simg_de2fe0_500x500_maxb.jpg'),
(63, 'public/uploads/product/RKwYa6_simg_de2fe0_500x500_maxb.jpg'),
(64, 'public/uploads/product/UfVUar_simg_de2fe0_500x500_maxb.jpg'),
(65, 'public/uploads/product/wZHwjI_simg_de2fe0_500x500_maxb.jpg'),
(66, 'public/uploads/product/7eLVSK_simg_de2fe0_500x500_maxb.jpg'),
(67, 'public/uploads/product/7eLVSK_simg_de2fe0_500x500_maxb.jpg'),
(68, 'public/uploads/product/dpUvCb_simg_de2fe0_500x500_maxb.jpg'),
(69, 'public/uploads/product/QYpO7l_simg_de2fe0_500x500_maxb.jpg'),
(70, 'public/uploads/product/wjmoyA_simg_de2fe0_500x500_maxb.jpg'),
(71, 'public/uploads/product/6KqPLNjXGhQ0FshKhXOY_simg_de2fe0_500x500_maxb.jpg'),
(72, 'public/uploads/product/0wqYfWNoLqeTwxGN9Sjq_simg_de2fe0_500x500_maxb.jpg'),
(73, 'public/uploads/product/6KqPLNjXGhQ0FshKhXOY_simg_de2fe0_500x500_maxb.jpg'),
(74, 'public/uploads/product/7mNPDc0GrZUGOVUVJFdA_simg_de2fe0_500x500_maxb.jpg'),
(75, 'public/uploads/product/FBXtWf2E9A6EQNVlIxVQ_simg_de2fe0_500x500_maxb.jpg'),
(76, 'public/uploads/product/ZboYnCV2PuqlP5mLTEPL_simg_de2fe0_500x500_maxb.jpg'),
(77, 'public/uploads/product/jp7PJH_simg_de2fe0_500x500_maxb.jpg'),
(78, 'public/uploads/product/jp7PJH_simg_de2fe0_500x500_maxb.jpg'),
(79, 'public/uploads/product/lCEiGF_simg_de2fe0_500x500_maxb.jpg'),
(80, 'public/uploads/product/Qmyxor_simg_de2fe0_500x500_maxb.jpg'),
(81, 'public/uploads/product/TnfJRb_simg_de2fe0_500x500_maxb.jpg'),
(82, 'public/uploads/product/Zk8XnY_simg_de2fe0_500x500_maxb.jpg'),
(83, 'public/uploads/product/AW9HWy_simg_de2fe0_500x500_maxb.jpg'),
(84, 'public/uploads/product/APbSkPngAFGqxC8LsDtZ_simg_de2fe0_500x500_maxb.jpg'),
(85, 'public/uploads/product/AW9HWy_simg_de2fe0_500x500_maxb.jpg'),
(86, 'public/uploads/product/BQ1l0k_simg_de2fe0_500x500_maxb.jpg'),
(87, 'public/uploads/product/lJXUT7_simg_de2fe0_500x500_maxb.jpg'),
(88, 'public/uploads/product/Y48ADS_simg_de2fe0_500x500_maxb.jpg'),
(89, 'public/uploads/product/M1Xkmt_simg_de2fe0_500x500_maxb.jpg'),
(90, 'public/uploads/product/2MnhOO_simg_de2fe0_500x500_maxb.jpg'),
(91, 'public/uploads/product/AhuJ5I_simg_de2fe0_500x500_maxb.jpg'),
(92, 'public/uploads/product/M1Xkmt_simg_de2fe0_500x500_maxb.jpg'),
(93, 'public/uploads/product/zTdU9z_simg_de2fe0_500x500_maxb.jpg'),
(94, 'public/uploads/product/8TbGG6A248G324kJc24Z_simg_de2fe0_500x500_maxb.jpg'),
(95, 'public/uploads/product/8TbGG6A248G324kJc24Z_simg_de2fe0_500x500_maxb.jpg'),
(96, 'public/uploads/product/HAhm6UGbc48s9ztncQ2R_simg_de2fe0_500x500_maxb.jpg'),
(97, 'public/uploads/product/NMNM0COdVPnKNaavG0v0_simg_de2fe0_500x500_maxb.jpg'),
(98, 'public/uploads/product/pj4O2FRFmCdRIGosOI9k_simg_de2fe0_500x500_maxb.jpg'),
(99, 'public/uploads/product/QbLB4nluAFf6iA9facWL_simg_de2fe0_500x500_maxb.jpg'),
(100, 'public/uploads/product/2lwrid_simg_de2fe0_500x500_maxb.jpg'),
(101, 'public/uploads/product/2lwrid_simg_de2fe0_500x500_maxb.jpg'),
(102, 'public/uploads/product/dhIEXQ_simg_de2fe0_500x500_maxb.jpg'),
(103, 'public/uploads/product/eQtYxc_simg_de2fe0_500x500_maxb.jpg'),
(104, 'public/uploads/product/eU06R0_simg_de2fe0_500x500_maxb.jpg'),
(105, 'public/uploads/product/FssbGY_simg_de2fe0_500x500_maxb.jpg'),
(106, 'public/uploads/product/IW1sas_simg_de2fe0_500x500_maxb.jpg'),
(107, 'public/uploads/product/2DVw0o_simg_de2fe0_500x500_maxb.jpg'),
(108, 'public/uploads/product/4nqV6B_simg_de2fe0_500x500_maxb.jpg'),
(109, 'public/uploads/product/In99BW_simg_de2fe0_500x500_maxb.jpg'),
(110, 'public/uploads/product/IW1sas_simg_de2fe0_500x500_maxb.jpg'),
(111, 'public/uploads/product/r4128a_simg_de2fe0_500x500_maxb.jpg'),
(112, 'public/uploads/product/JBvoPL_simg_de2fe0_500x500_maxb.jpg'),
(113, 'public/uploads/product/FlOW8T_simg_de2fe0_500x500_maxb.jpg'),
(114, 'public/uploads/product/JBvoPL_simg_de2fe0_500x500_maxb.jpg'),
(115, 'public/uploads/product/rJ7Lb9_simg_de2fe0_500x500_maxb.jpg'),
(116, 'public/uploads/product/rUvNvc_simg_de2fe0_500x500_maxb.jpg'),
(117, 'public/uploads/product/SDJu8H_simg_de2fe0_500x500_maxb.jpg'),
(118, 'public/uploads/product/4qYvWcLQTujKzrRPGb2p_simg_de2fe0_500x500_maxb.jpg'),
(119, 'public/uploads/product/4qYvWcLQTujKzrRPGb2p_simg_de2fe0_500x500_maxb.jpg'),
(120, 'public/uploads/product/8CbUWJQAPsdIyK7eNuhw_simg_de2fe0_500x500_maxb.jpg'),
(121, 'public/uploads/product/eO8yZtOwTzpdvgxj4AX5_simg_de2fe0_500x500_maxb.jpg'),
(122, 'public/uploads/product/nV8f7UX12jK8c6vgztPC_simg_de2fe0_500x500_maxb.jpg'),
(123, 'public/uploads/product/vQKlNMaluHhrEVLRpYxO_simg_de2fe0_500x500_maxb.jpg'),
(124, 'public/uploads/product/PISRlW_simg_de2fe0_500x500_maxb.jpg'),
(125, 'public/uploads/product/PISRlW_simg_de2fe0_500x500_maxb.jpg'),
(126, 'public/uploads/product/q1WdC1_simg_de2fe0_500x500_maxb.jpg'),
(127, 'public/uploads/product/Qr0da1_simg_de2fe0_500x500_maxb.jpg'),
(128, 'public/uploads/product/RE8XvA_simg_de2fe0_500x500_maxb.jpg'),
(129, 'public/uploads/product/VX1nNu_simg_de2fe0_500x500_maxb.jpg'),
(130, 'public/uploads/users/FB_IMG_1553579794218.jpg'),
(131, 'admin/public/uploads/users/FB_IMG_1547225481695.jpg'),
(132, 'admin/public/uploads/users/IMG_20170703_191656.jpg'),
(133, 'admin/public/uploads/users/IMG_20170704_075936.jpg'),
(134, 'admin/public/uploads/users/_20181027_132819.jpg'),
(135, 'public/uploads/product/ZboYnCV2PuqlP5mLTEPL_simg_de2fe0_500x500_maxb - Copy.jpg'),
(136, 'public/uploads/product/0wqYfWNoLqeTwxGN9Sjq_simg_de2fe0_500x500_maxb.jpg'),
(137, 'public/uploads/product/7mNPDc0GrZUGOVUVJFdA_simg_de2fe0_500x500_maxb.jpg'),
(138, 'public/uploads/product/FBXtWf2E9A6EQNVlIxVQ_simg_de2fe0_500x500_maxb.jpg'),
(139, 'public/uploads/product/ZboYnCV2PuqlP5mLTEPL_simg_de2fe0_500x500_maxb.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_date` date NOT NULL DEFAULT current_timestamp(),
  `post_content` varchar(2000) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(300) NOT NULL,
  `product_detail` varchar(2000) NOT NULL,
  `product_price_in` float NOT NULL,
  `product_price` float NOT NULL,
  `img_id` int(11) NOT NULL,
  `product_date` date NOT NULL DEFAULT current_timestamp(),
  `is_hot` enum('0','1') NOT NULL DEFAULT '0',
  `is_feature` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_code`, `product_name`, `product_desc`, `product_detail`, `product_price_in`, `product_price`, `img_id`, `product_date`, `is_hot`, `is_feature`) VALUES
(1, 'XH-1', 'Áo cộc nam AC6806 - AC6806', 'Bạn cần 1 chiếc áo thun có cổ dành để đi làm cho mùa hè năm nay? Áo thun polo trắng trẻ trung 2020 mã AXH-180 sẽ là lựa chọn hàng đầu cho bạn, với thiết kế trẻ trung, áo làm từ vải 95% cotton thoáng mát, nhẹ nhàng, thoải mái khi mặc.', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o thun polo trắng trẻ trung 2020&quot; m&atilde; số AXH-180, l&agrave; 1 trong những mẫu &aacute;o thun nam d&agrave;nh cho c&ocirc;ng sở mới nhất cho m&ugrave;a h&egrave; n&agrave;y. &Aacute;o được thiết kế kiểu d&aacute;ng polo thể thao, hơi &ocirc;m người gọn g&agrave;ng với m&agrave;u trắng trơn thanh lịch, rất ph&ugrave; hợp với m&ocirc;i trường c&ocirc;ng sở.</p>\r\n\r\n<p>Chất liệu may &aacute;o từ vải thun cao cấp 95% cotton co gi&atilde;n 4 chiều tho&aacute;ng m&aacute;t v&agrave; thấm mồ h&ocirc;i tốt. &Aacute;o được gia c&ocirc;ng tinh xảo với đường chỉ chắc chắn l&agrave;m l&ecirc;n chất lượng sản phẩm. Sản phẩm rất ph&ugrave; hợp cho c&aacute;c bạn trẻ sử dụng cho đi l&agrave;m hoặc c&aacute;c hoạt động thể thao ngo&agrave;i trời, đi chơi hoặc đi du lịch.&nbsp;</p>\r\n', 200000, 450000, 2, '2020-11-12', '0', '1'),
(2, 'XH-2', 'Áo croptop nữ-Áo crotop hoa cúc - ACTNHHC-2', 'Bạn cần 1 chiếc áo thun có cổ dành để đi làm cho mùa hè năm nay? Áo thun polo trắng trẻ trung 2020 mã AXH-180 sẽ là lựa chọn hàng đầu cho bạn, với thiết kế trẻ trung, áo làm từ vải 95% cotton thoáng mát, nhẹ nhàng, thoải mái khi mặc', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o thun polo trắng trẻ trung 2020&quot; m&atilde; số AXH-180, l&agrave; 1 trong những mẫu &aacute;o thun nam d&agrave;nh cho c&ocirc;ng sở mới nhất cho m&ugrave;a h&egrave; n&agrave;y. &Aacute;o được thiết kế kiểu d&aacute;ng polo thể thao, hơi &ocirc;m người gọn g&agrave;ng với m&agrave;u trắng trơn thanh lịch, rất ph&ugrave; hợp với m&ocirc;i trường c&ocirc;ng sở.</p>\r\n\r\n<p>Chất liệu may &aacute;o từ vải thun cao cấp 95% cotton co gi&atilde;n 4 chiều tho&aacute;ng m&aacute;t v&agrave; thấm mồ h&ocirc;i tốt. &Aacute;o được gia c&ocirc;ng tinh xảo với đường chỉ chắc chắn l&agrave;m l&ecirc;n chất lượng sản phẩm. Sản phẩm rất ph&ugrave; hợp cho c&aacute;c bạn trẻ sử dụng cho đi l&agrave;m hoặc c&aacute;c hoạt động thể thao ngo&agrave;i trời, đi chơi hoặc đi du lịch.&nbsp;</p>\r\n', 200000, 450000, 8, '2020-11-12', '1', '0'),
(3, 'XH-3', 'Áo phông nữ tuổi teen - ATLCH-1', 'Bạn cần 1 chiếc áo thun có cổ dành để đi làm cho mùa hè năm nay? Áo thun polo trắng trẻ trung 2020 mã AXH-180 sẽ là lựa chọn hàng đầu cho bạn, với thiết kế trẻ trung, áo làm từ vải 95% cotton thoáng mát, nhẹ nhàng, thoải mái khi mặc', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o thun polo trắng trẻ trung 2020&quot; m&atilde; số AXH-180, l&agrave; 1 trong những mẫu &aacute;o thun nam d&agrave;nh cho c&ocirc;ng sở mới nhất cho m&ugrave;a h&egrave; n&agrave;y. &Aacute;o được thiết kế kiểu d&aacute;ng polo thể thao, hơi &ocirc;m người gọn g&agrave;ng với m&agrave;u trắng trơn thanh lịch, rất ph&ugrave; hợp với m&ocirc;i trường c&ocirc;ng sở.</p>\r\n\r\n<p>Chất liệu may &aacute;o từ vải thun cao cấp 95% cotton co gi&atilde;n 4 chiều tho&aacute;ng m&aacute;t v&agrave; thấm mồ h&ocirc;i tốt. &Aacute;o được gia c&ocirc;ng tinh xảo với đường chỉ chắc chắn l&agrave;m l&ecirc;n chất lượng sản phẩm. Sản phẩm rất ph&ugrave; hợp cho c&aacute;c bạn trẻ sử dụng cho đi l&agrave;m hoặc c&aacute;c hoạt động thể thao ngo&agrave;i trời, đi chơi hoặc đi du lịch.</p>\r\n', 200000, 450000, 14, '2020-11-12', '0', '1'),
(4, 'TD-4', 'Áo Thu Đông Nam - 2020', 'Bạn cần 1 chiếc áo thun có cổ dành để đi làm cho mùa hè năm nay? Áo thun polo trắng trẻ trung 2020 mã AXH-180 sẽ là lựa chọn hàng đầu cho bạn, với thiết kế trẻ trung, áo làm từ vải 95% cotton thoáng mát, nhẹ nhàng, thoải mái khi mặc.', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o thun polo trắng trẻ trung 2020&quot; m&atilde; số AXH-180, l&agrave; 1 trong những mẫu &aacute;o thun nam d&agrave;nh cho c&ocirc;ng sở mới nhất cho m&ugrave;a h&egrave; n&agrave;y. &Aacute;o được thiết kế kiểu d&aacute;ng polo thể thao, hơi &ocirc;m người gọn g&agrave;ng với m&agrave;u trắng trơn thanh lịch, rất ph&ugrave; hợp với m&ocirc;i trường c&ocirc;ng sở.</p>\r\n\r\n<p>Chất liệu may &aacute;o từ vải thun cao cấp 95% cotton co gi&atilde;n 4 chiều tho&aacute;ng m&aacute;t v&agrave; thấm mồ h&ocirc;i tốt. &Aacute;o được gia c&ocirc;ng tinh xảo với đường chỉ chắc chắn l&agrave;m l&ecirc;n chất lượng sản phẩm. Sản phẩm rất ph&ugrave; hợp cho c&aacute;c bạn trẻ sử dụng cho đi l&agrave;m hoặc c&aacute;c hoạt động thể thao ngo&agrave;i trời, đi chơi hoặc đi du lịch.&nbsp;</p>\r\n', 200000, 450000, 20, '2020-11-12', '1', '0'),
(5, 'QTD-5', 'Quần jogger nam thể thao, Quần jogger nam thể thao - JG-001', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n\r\n<p>H&atilde;y c&ugrave;ng ch&uacute;ng t&ocirc;i chi&ecirc;m ngưỡng sản phẩm qua 1 số h&igrave;nh ảnh sau v&agrave; li&ecirc;n hệ ngay để nhận được tư vấn đặt h&agrave;ng miễn ph&iacute; nh&eacute; !!!</p>\r\n', 200000, 450000, 25, '2020-11-12', '0', '0'),
(6, 'QTD-6', 'Quần Jogger nữ siêu đẹp', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 30, '2020-11-12', '1', '1'),
(7, 'QXH-7', 'Quần nữ - Quần nữ - SP quần ngắn', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 35, '2020-11-12', '0', '1'),
(8, 'QXH-8', 'Quần Short Nam ', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 41, '2020-11-12', '1', '0'),
(9, 'QTD-9', 'QUẦN THỂ THAO NAM - 167TH', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 47, '2020-11-12', '0', '0'),
(10, 'M-10', 'Mũ bucket nữ - MBTT -1', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 54, '2020-11-12', '0', '1'),
(11, 'M-11', 'Mũ nam hàn quốc - Mũ nam', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 60, '2020-11-12', '1', '0'),
(12, 'M-12', 'Mũ nam nữ - Nón nam - Mũ nam nữ', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 66, '2020-11-12', '0', '1'),
(13, 'M-13', 'Mũ nữ - Mũ nữ - Mũ lông cừu', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 71, '2020-11-12', '0', '1'),
(14, 'T-14', 'Tất nam hàn quốc', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trờ</p>\r\n', 200000, 450000, 77, '2020-11-12', '1', '0'),
(15, 'T-15', 'Tất nam Tất nam - Tất thể thao nam', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trờ</p>\r\n', 200000, 450000, 83, '2020-11-12', '0', '1'),
(16, 'T-16', 'Tất nữ - Tất nữ - TẤT GIẤY', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 89, '2020-11-12', '1', '0'),
(17, 'T-17', 'Tất nữ Hàn Quốc - Tất nữ Hàn Quốc T11', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 94, '2020-11-12', '0', '0'),
(18, 'TL-18', 'Thắt lưng nam - THẮT LƯNG CS03', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 100, '2020-11-12', '0', '0'),
(19, 'TL-19', 'THẮT LƯNG NAM - TLN-VB1', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 106, '2020-11-12', '0', '0'),
(20, 'TL-20', 'Thắt lưng nữ - DVhoanoi', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 112, '2020-11-12', '0', '0'),
(21, 'TL-21', 'Thắt lưng nữ - tl nữ 01', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 118, '2020-11-12', '0', '0'),
(22, 'V-22', 'VÁY NỮ DÀI TAY RÚT EO DAM0011', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 200000, 450000, 124, '2020-11-12', '0', '0'),
(23, 'M-23', 'Mũ bucket nữ - MBTT -1', 'Bạn cần 1 chiếc áo sơ mi khoác ngoài mặc chống nắng hoặc tạo phong cách? Áo sơ mi nam khoác ngoài xanh mã AXH-186 là lựa chọn hàng đầu cho bạn. Áo thiết kế trẻ trung hiện đại với form áo rộng thoải mái. Chất liệu vải dày dặn chắn nắng tốt và thoáng mát, kết hợp đường may chắc chắn làm nên chất lượng', '<p>H&ocirc;m nay Aoxuanhe xin giới thiệu đến c&aacute;c bạn mẫu &quot;&Aacute;o sơ mi nam kho&aacute;c ngo&agrave;i xanh&quot; m&atilde; số AXH-186, đ&acirc;y l&agrave; mẫu &aacute;o sơ mi kho&aacute;c ngo&agrave;i mặc chống nắng hoặc tạo phong c&aacute;ch. &Aacute;o được thiết kế theo phong c&aacute;ch trẻ trung hiện đại với t&uacute;i ngực c&aacute;ch điệu nổi bật.</p>\r\n\r\n<p>&Aacute;o được l&agrave;m từ vải tổng hợp cao cấp d&agrave;y dặn chắn nắng tốt, thấm m&ocirc; hồi v&agrave; tho&aacute;ng kh&iacute; tốt tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Sản phẩm c&oacute; đường may chắc chắn tinh xảo, với nhiều điểm nhấn l&agrave;m nổi bật sản phẩm. Sản phẩm c&oacute; m&agrave;u xanh nam t&iacute;nh nổi bật.&nbsp;&Aacute;o rất ph&ugrave; hợp với đi l&agrave;m hoặc đi chơi, đi du lịch với c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n', 100000, 200000, 135, '2020-11-16', '0', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`product_category_id`, `product_id`, `category_id`) VALUES
(1, 1, 9),
(2, 1, 14),
(3, 1, 19),
(4, 2, 10),
(5, 2, 14),
(6, 2, 19),
(7, 3, 10),
(8, 3, 14),
(9, 3, 19),
(10, 4, 9),
(11, 4, 14),
(12, 4, 20),
(13, 5, 9),
(14, 5, 14),
(15, 5, 20),
(16, 6, 10),
(17, 6, 11),
(18, 6, 13),
(19, 6, 20),
(20, 7, 10),
(21, 7, 14),
(22, 7, 19),
(23, 8, 9),
(24, 8, 14),
(25, 8, 19),
(26, 9, 9),
(27, 9, 13),
(28, 9, 20),
(29, 10, 10),
(30, 10, 16),
(31, 10, 19),
(32, 11, 9),
(33, 11, 16),
(34, 11, 19),
(35, 12, 9),
(36, 12, 11),
(37, 12, 19),
(38, 13, 10),
(39, 13, 16),
(40, 13, 19),
(41, 14, 9),
(42, 14, 18),
(43, 14, 20),
(44, 15, 9),
(45, 15, 18),
(46, 15, 20),
(47, 16, 10),
(48, 16, 18),
(49, 16, 19),
(50, 17, 10),
(51, 17, 18),
(52, 17, 20),
(53, 18, 9),
(54, 18, 17),
(55, 19, 9),
(56, 19, 17),
(57, 20, 10),
(58, 20, 17),
(59, 21, 10),
(60, 21, 17),
(61, 22, 10),
(62, 22, 15),
(63, 22, 19),
(64, 23, 10),
(65, 23, 16),
(66, 23, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_img`
--

CREATE TABLE `tbl_product_img` (
  `product_img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_img`
--

INSERT INTO `tbl_product_img` (`product_img_id`, `product_id`, `img_id`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 2, 9),
(7, 2, 8),
(8, 2, 11),
(9, 2, 12),
(10, 2, 13),
(11, 3, 15),
(12, 3, 14),
(13, 3, 17),
(14, 3, 18),
(15, 3, 19),
(16, 4, 20),
(17, 4, 22),
(18, 4, 23),
(19, 4, 24),
(20, 5, 25),
(21, 5, 27),
(22, 5, 28),
(23, 5, 29),
(24, 6, 30),
(25, 6, 32),
(26, 6, 33),
(27, 6, 34),
(28, 7, 36),
(29, 7, 37),
(30, 7, 38),
(31, 7, 39),
(32, 7, 35),
(33, 8, 42),
(34, 8, 41),
(35, 8, 44),
(36, 8, 45),
(37, 8, 46),
(38, 9, 48),
(39, 9, 49),
(40, 9, 50),
(41, 9, 51),
(42, 9, 52),
(43, 9, 53),
(44, 10, 54),
(45, 10, 56),
(46, 10, 57),
(47, 10, 58),
(48, 10, 59),
(49, 11, 60),
(50, 11, 62),
(51, 11, 63),
(52, 11, 64),
(53, 11, 65),
(54, 12, 66),
(55, 12, 68),
(56, 12, 69),
(57, 12, 70),
(58, 13, 72),
(59, 13, 71),
(60, 13, 74),
(61, 13, 75),
(62, 13, 76),
(63, 14, 77),
(64, 14, 79),
(65, 14, 80),
(66, 14, 81),
(67, 14, 82),
(68, 15, 84),
(69, 15, 83),
(70, 15, 86),
(71, 15, 87),
(72, 15, 88),
(73, 16, 90),
(74, 16, 91),
(75, 16, 89),
(76, 16, 93),
(77, 17, 94),
(78, 17, 96),
(79, 17, 97),
(80, 17, 98),
(81, 17, 99),
(82, 18, 100),
(83, 18, 102),
(84, 18, 103),
(85, 18, 104),
(86, 18, 105),
(87, 19, 107),
(88, 19, 108),
(89, 19, 109),
(90, 19, 106),
(91, 19, 111),
(92, 20, 113),
(93, 20, 112),
(94, 20, 115),
(95, 20, 116),
(96, 20, 117),
(97, 21, 118),
(98, 21, 120),
(99, 21, 121),
(100, 21, 122),
(101, 21, 123),
(102, 22, 124),
(103, 22, 126),
(104, 22, 127),
(105, 22, 128),
(106, 22, 129),
(107, 23, 72),
(108, 23, 74),
(109, 23, 75),
(110, 23, 76);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_storage`
--

CREATE TABLE `tbl_product_storage` (
  `product_storage_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_amount` int(5) NOT NULL,
  `product_storage_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_storage`
--

INSERT INTO `tbl_product_storage` (`product_storage_id`, `product_id`, `product_size`, `product_amount`, `product_storage_date`) VALUES
(1, 1, 's', 4, '2020-11-12'),
(2, 1, 'm', 20, '2020-11-12'),
(3, 1, 'l', 10, '2020-11-12'),
(4, 1, 'xl', 3, '2020-11-12'),
(5, 2, 's', 12, '2020-11-12'),
(6, 2, 'm', 5, '2020-11-12'),
(7, 2, 'l', 11, '2020-11-12'),
(8, 2, 'xl', 5, '2020-11-12'),
(9, 3, 's', 30, '2020-11-12'),
(10, 3, 'm', 12, '2020-11-12'),
(11, 3, 'l', 23, '2020-11-12'),
(12, 3, 'xl', 3, '2020-11-12'),
(13, 4, 's', 12, '2020-11-12'),
(14, 4, 'm', 32, '2020-11-12'),
(15, 4, 'l', 19, '2020-11-12'),
(16, 4, 'xl', 12, '2020-11-12'),
(17, 5, 's', 9, '2020-11-12'),
(18, 5, 'm', 41, '2020-11-12'),
(19, 5, 'l', 45, '2020-11-12'),
(20, 5, 'xl', 23, '2020-11-12'),
(21, 6, 's', 14, '2020-11-12'),
(22, 6, 'm', 23, '2020-11-12'),
(23, 6, 'l', 21, '2020-11-12'),
(24, 6, 'xl', 12, '2020-11-12'),
(25, 7, 's', 11, '2020-11-12'),
(26, 7, 'm', 5, '2020-11-12'),
(27, 7, 'l', 12, '2020-11-12'),
(28, 7, 'xl', 12, '2020-11-12'),
(29, 8, 's', 22, '2020-11-12'),
(30, 8, 'm', 12, '2020-11-12'),
(31, 8, 'l', 12, '2020-11-12'),
(32, 8, 'xl', 31, '2020-11-12'),
(33, 9, 's', 14, '2020-11-12'),
(34, 9, 'm', 5, '2020-11-12'),
(35, 9, 'l', 23, '2020-11-12'),
(36, 9, 'xl', 21, '2020-11-12'),
(37, 10, 's', 12, '2020-11-12'),
(38, 10, 'm', 23, '2020-11-12'),
(39, 10, 'l', 15, '2020-11-12'),
(40, 11, 's', 12, '2020-11-12'),
(41, 11, 'm', 32, '2020-11-12'),
(42, 11, 'l', 21, '2020-11-12'),
(43, 12, 's', 11, '2020-11-12'),
(44, 12, 'm', 5, '2020-11-12'),
(45, 12, 'l', 12, '2020-11-12'),
(46, 13, 's', 23, '2020-11-12'),
(47, 13, 'm', 12, '2020-11-12'),
(48, 13, 'l', 7, '2020-11-12'),
(49, 14, 's', 12, '2020-11-12'),
(50, 14, 'm', 56, '2020-11-12'),
(51, 14, 'l', 65, '2020-11-12'),
(52, 15, 's', 12, '2020-11-12'),
(53, 15, 'm', 24, '2020-11-12'),
(54, 15, 'l', 72, '2020-11-12'),
(55, 15, 'xl', 56, '2020-11-12'),
(56, 16, 's', 54, '2020-11-12'),
(57, 16, 'm', 23, '2020-11-12'),
(58, 16, 'l', 32, '2020-11-12'),
(59, 16, 'xl', 32, '2020-11-12'),
(60, 17, 's', 54, '2020-11-12'),
(61, 17, 'm', 27, '2020-11-12'),
(62, 17, 'l', 34, '2020-11-12'),
(63, 17, 'xl', 42, '2020-11-12'),
(64, 18, 'l', 67, '2020-11-12'),
(65, 19, 'm', 23, '2020-11-12'),
(66, 19, 'l', 76, '2020-11-12'),
(67, 20, 'm', 75, '2020-11-12'),
(68, 20, 'l', 34, '2020-11-12'),
(69, 21, 's', 54, '2020-11-12'),
(70, 21, 'm', 32, '2020-11-12'),
(71, 22, 's', 12, '2020-11-12'),
(72, 22, 'm', 32, '2020-11-12'),
(73, 22, 'l', 12, '2020-11-12'),
(74, 23, 's', 5, '2020-11-16'),
(75, 23, 'm', 8, '2020-11-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_region`
--

CREATE TABLE `tbl_region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_region`
--

INSERT INTO `tbl_region` (`region_id`, `region_name`) VALUES
(1, 'Miền Bắc'),
(2, 'Miền Trung'),
(3, 'Miền Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_store_banking`
--

CREATE TABLE `tbl_store_banking` (
  `store_banking_id` int(11) NOT NULL,
  `store_banking_name` varchar(50) NOT NULL,
  `store_banking_acount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_store_info`
--

CREATE TABLE `tbl_store_info` (
  `store_info_id` int(11) NOT NULL,
  `store_name` int(11) NOT NULL,
  `store_hotline` int(11) NOT NULL,
  `store_email` int(11) NOT NULL,
  `store_address` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(7) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` enum('member','salesman','manager') NOT NULL DEFAULT 'member',
  `address` varchar(100) DEFAULT NULL,
  `img_id` int(11) DEFAULT 1,
  `active_token` varchar(40) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `reset_token` varchar(40) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `date_of_birth`, `gender`, `phone`, `email`, `position`, `address`, `img_id`, `active_token`, `is_active`, `reset_token`, `reg_date`, `region_id`) VALUES
(1, 'cuoppro_9x', '67d0421d0f16728afbbdac9c0f6c068b', 'Nguyễn Đức', 'Thương', '1999-04-05', 'male', '363100093', 'ndtspear@gmail.com', 'manager', NULL, 1, NULL, '1', NULL, '2020-10-23', 1),
(2, 'salesman_1', '0688b7958b2f3a7e0fa6e54a364543d1', 'Nguyễn Văn', 'A', '1999-10-13', 'male', '354554488', 'qtdstore2020@gmail.com', 'salesman', NULL, 1, NULL, '1', NULL, '2020-10-23', 2),
(4, 'customer2000', '0688b7958b2f3a7e0fa6e54a364543d1', 'Nguyễn Đức', 'Thương', '1999-04-05', 'male', '0363100093', 'chimsedinangbn1999@gmail.com', 'member', 'Gia Bình - Bắc Ninh', 134, '17abf3e3096fadd6c7283ca7ad3b3b1a', '1', '8289f7921f009cf5e25f2d06fef8f11a', '2020-10-24', 1),
(7, 'yen2k1', '67d0421d0f16728afbbdac9c0f6c068b', 'Nguyễn thị', 'Yến', '2001-07-06', 'female', '0254612578', 'tranducnambn1999@gmail.com', 'member', 'Bắc Ninh', 1, 'ef80efd0a0fb22d2b28ec79a9732fc16', '1', NULL, '2030-11-20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wish_cart`
--

CREATE TABLE `tbl_wish_cart` (
  `wish_cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail_wish_cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `FK_delivery_fee` (`delivery_fee_id`),
  ADD KEY `FK_discount` (`discount_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `FK_user` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_customer_bill`
--
ALTER TABLE `tbl_customer_bill`
  ADD PRIMARY KEY (`customer_bill_id`),
  ADD KEY `FK_customer` (`customer_id`),
  ADD KEY `FK_bill_customer` (`bill_id`);

--
-- Chỉ mục cho bảng `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Chỉ mục cho bảng `tbl_delivery_fee`
--
ALTER TABLE `tbl_delivery_fee`
  ADD PRIMARY KEY (`delivery_fee_id`),
  ADD KEY `FK_deli` (`delivery_id`),
  ADD KEY `FK_region` (`region_id`);

--
-- Chỉ mục cho bảng `tbl_detail_bill`
--
ALTER TABLE `tbl_detail_bill`
  ADD PRIMARY KEY (`detail_bill_id`),
  ADD KEY `FK_product_detail_bill` (`product_id`),
  ADD KEY `FK_bill_abc` (`bill_id`);

--
-- Chỉ mục cho bảng `tbl_detail_wish_cart`
--
ALTER TABLE `tbl_detail_wish_cart`
  ADD PRIMARY KEY (`detail_wish_cart_id`);

--
-- Chỉ mục cho bảng `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_img_prod` (`img_id`);

--
-- Chỉ mục cho bảng `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `FK_product_cate` (`product_id`),
  ADD KEY `FK_category` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  ADD PRIMARY KEY (`product_img_id`),
  ADD KEY `FK_product_img` (`product_id`),
  ADD KEY `FK_img_pro` (`img_id`);

--
-- Chỉ mục cho bảng `tbl_product_storage`
--
ALTER TABLE `tbl_product_storage`
  ADD PRIMARY KEY (`product_storage_id`),
  ADD KEY `FK_product` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD PRIMARY KEY (`region_id`);

--
-- Chỉ mục cho bảng `tbl_store_banking`
--
ALTER TABLE `tbl_store_banking`
  ADD PRIMARY KEY (`store_banking_id`);

--
-- Chỉ mục cho bảng `tbl_store_info`
--
ALTER TABLE `tbl_store_info`
  ADD PRIMARY KEY (`store_info_id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_users_img` (`img_id`),
  ADD KEY `FK_region_id` (`region_id`);

--
-- Chỉ mục cho bảng `tbl_wish_cart`
--
ALTER TABLE `tbl_wish_cart`
  ADD PRIMARY KEY (`wish_cart_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_customer_bill`
--
ALTER TABLE `tbl_customer_bill`
  MODIFY `customer_bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_delivery_fee`
--
ALTER TABLE `tbl_delivery_fee`
  MODIFY `delivery_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_bill`
--
ALTER TABLE `tbl_detail_bill`
  MODIFY `detail_bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_wish_cart`
--
ALTER TABLE `tbl_detail_wish_cart`
  MODIFY `detail_wish_cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  MODIFY `product_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `tbl_product_storage`
--
ALTER TABLE `tbl_product_storage`
  MODIFY `product_storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `tbl_region`
--
ALTER TABLE `tbl_region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_store_banking`
--
ALTER TABLE `tbl_store_banking`
  MODIFY `store_banking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_store_info`
--
ALTER TABLE `tbl_store_info`
  MODIFY `store_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_wish_cart`
--
ALTER TABLE `tbl_wish_cart`
  MODIFY `wish_cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD CONSTRAINT `FK_delivery_fee` FOREIGN KEY (`delivery_fee_id`) REFERENCES `tbl_delivery_fee` (`delivery_fee_id`),
  ADD CONSTRAINT `FK_discount` FOREIGN KEY (`discount_id`) REFERENCES `tbl_discount` (`discount_id`);

--
-- Các ràng buộc cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Các ràng buộc cho bảng `tbl_customer_bill`
--
ALTER TABLE `tbl_customer_bill`
  ADD CONSTRAINT `FK_bill_customer` FOREIGN KEY (`bill_id`) REFERENCES `tbl_bill` (`bill_id`),
  ADD CONSTRAINT `FK_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`);

--
-- Các ràng buộc cho bảng `tbl_delivery_fee`
--
ALTER TABLE `tbl_delivery_fee`
  ADD CONSTRAINT `FK_deli` FOREIGN KEY (`delivery_id`) REFERENCES `tbl_delivery` (`delivery_id`),
  ADD CONSTRAINT `FK_region` FOREIGN KEY (`region_id`) REFERENCES `tbl_region` (`region_id`);

--
-- Các ràng buộc cho bảng `tbl_detail_bill`
--
ALTER TABLE `tbl_detail_bill`
  ADD CONSTRAINT `FK_bill_abc` FOREIGN KEY (`bill_id`) REFERENCES `tbl_bill` (`bill_id`),
  ADD CONSTRAINT `FK_product_detail_bill` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `FK_img_prod` FOREIGN KEY (`img_id`) REFERENCES `tbl_img` (`img_id`);

--
-- Các ràng buộc cho bảng `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`),
  ADD CONSTRAINT `FK_product_cate` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  ADD CONSTRAINT `FK_img_pro` FOREIGN KEY (`img_id`) REFERENCES `tbl_img` (`img_id`),
  ADD CONSTRAINT `FK_product_img` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product_storage`
--
ALTER TABLE `tbl_product_storage`
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `FK_region_id` FOREIGN KEY (`region_id`) REFERENCES `tbl_region` (`region_id`),
  ADD CONSTRAINT `FK_users_img` FOREIGN KEY (`img_id`) REFERENCES `tbl_img` (`img_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
