-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2021 lúc 04:39 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ismart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `status` enum('ON','OFF') NOT NULL DEFAULT 'ON',
  `creator` varchar(50) NOT NULL,
  `creation_time` int(20) NOT NULL,
  `cat_thumb` varchar(150) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `title`, `slug`, `desc`, `status`, `creator`, `creation_time`, `cat_thumb`, `parent_id`) VALUES
(252, 'PC & Laptop', 'pc-laptop', 'Ưu &nbsp;v&agrave; nhược điểm m&aacute;y t&iacute;nh pc v&agrave; laptop. C&aacute;ch đ&acirc;y khoảng 5-10 năm khi m&aacute;y t&iacute;nh x&aacute;ch tay c&ograve;n chưa phổ biến như ng&agrave;y nay, do gi&aacute; th&agrave;nh c&ograve;n rất cao, th&igrave; m&aacute;y t&iacute;nh để b&agrave;n thật sự l&agrave; &ocirc;ng vua thời điểm đ&oacute;. Nhưng ng&agrave;y nay với khoa học v&agrave; sản xuất ph&aacute;t triển ch&ecirc;ch lệch gi&aacute; th&agrave;nh của ch&uacute;ng ng&agrave;y c&agrave;ng được thu hẹp. D&ugrave; c&oacute; thể chứa phần cứng tương tự như nhau nhưng tuổi thọ v&agrave; ưu nhược điểm của mỗi loại lại c&oacute; sự kh&aacute; nhiều sự kh&aacute;c biệt. Vậy những kh&aacute;c biệt đ&oacute; l&agrave; g&igrave;?', 'ON', 'phamphuoc102', 1640492663, NULL, 0),
(253, 'Phụ kiện', 'phu-kien', 'thiết bị phụ v&agrave; c&aacute;c bộ phận, chi tiết kh&ocirc;ng phải l&agrave; th&agrave;nh phần của thiết bị, c&ocirc;ng tr&igrave;nh ch&iacute;nh, nhưng nhất thiết phải c&oacute; để bảo đảm sự hoạt động b&igrave;nh thường.', 'ON', 'phamphuoc102', 1640492727, NULL, 0),
(254, 'Asus', 'asus', 'AsusTek Computer Inc. l&agrave; một tập đo&agrave;n đa quốc gia c&oacute; trụ sở ch&iacute;nh tại Đ&agrave;i Loan, chuy&ecirc;n sản xuất c&aacute;c mặt h&agrave;ng điện tử v&agrave; phần cứng m&aacute;y t&iacute;nh như m&aacute;y t&iacute;nh để b&agrave;n, m&aacute;y t&iacute;nh x&aacute;ch tay, netbook, điện thoại di động, thiết bị mạng, m&agrave;n h&igrave;nh, bộ định tuyến WIFI, m&aacute;y chiếu, bo mạch chủ, card đồ họa, thiết bị lưu trữ quang học,', 'ON', 'phamphuoc102', 1640492776, NULL, 252),
(255, 'Acer', 'acer', 'Acer Inc. l&agrave; tập đo&agrave;n đa quốc gia về thiết bị điện tử v&agrave; phần cứng m&aacute;y t&iacute;nh của Đ&agrave;i Loan c&oacute; trụ sở tại Tịch Chỉ, T&acirc;n Bắc, Đ&agrave;i Loan. C&aacute;c sản phẩm của Acer bao gồm c&aacute;c loại m&aacute;y t&iacute;nh để b&agrave;n v&agrave; laptop, m&aacute;y t&iacute;nh bảng, server, c&aacute;c thiết bị lưu trữ, m&agrave;n h&igrave;nh hiển thị, smartphone v&agrave; c&aacute;c thiết bị ngoại vi', 'ON', 'phamphuoc102', 1640492802, NULL, 252),
(256, 'Apple', 'apple', 'Apple Inc. l&agrave; một tập đo&agrave;n c&ocirc;ng nghệ đa quốc gia của Mỹ c&oacute; trụ sở ch&iacute;nh tại Cupertino, California, chuy&ecirc;n thiết kế, ph&aacute;t triển v&agrave; b&aacute;n thiết bị điện tử ti&ecirc;u d&ugrave;ng, phần mềm m&aacute;y t&iacute;nh v&agrave; c&aacute;c dịch vụ trực tuyến.', 'ON', 'phamphuoc102', 1640492824, NULL, 252),
(257, 'MSI', 'msi', 'MSI l&agrave; một tập đo&agrave;n c&ocirc;ng nghệ th&ocirc;ng tin đa quốc gia c&oacute; trụ sở ch&iacute;nh ở T&acirc;n Bắc, Đ&agrave;i Loan, với logo l&agrave; một con rồng m&agrave;u đỏ', 'ON', 'phamphuoc102', 1640492848, NULL, 252),
(258, 'Dell', 'dell', 'Dell Inc. l&agrave; một c&ocirc;ng ty đa quốc gia của Hoa Kỳ về ph&aacute;t triển v&agrave; thương mại h&oacute;a c&ocirc;ng nghệ m&aacute;y t&iacute;nh c&oacute; trụ sở tại Round Rock, Texas, Hoa Kỳ. Dell được th&agrave;nh lập năm 1984 do chủ quản gia Michael Dell đồng s&aacute;ng lập. Đ&acirc;y l&agrave; c&ocirc;ng ty c&oacute; thu nhập lớn thứ 28 tại Hoa Kỳ', 'ON', 'phamphuoc102', 1640492868, NULL, 252),
(259, 'Lenovo', 'lenovo', 'Lenovo Group Ltd. l&agrave; tập đo&agrave;n đa quốc gia về c&ocirc;ng nghệ m&aacute;y t&iacute;nh c&oacute; trụ sở ch&iacute;nh ở Bắc Kinh, Trung Quốc v&agrave; Morrisville, Bắc Carolina, Mỹ', 'ON', 'phamphuoc102', 1640493362, NULL, 252),
(260, 'Microsoft Surface', 'microsoft-surface', 'Surface l&agrave; d&ograve;ng m&aacute;y t&iacute;nh bảng được nghi&ecirc;n cứu v&agrave; ph&aacute;t triển bởi tập đo&agrave;n Microsoft đến từ Hoa Kỳ. T&iacute;nh đến thời điểm hiện tại, c&aacute;c d&ograve;ng Surface bao gồm: Surface Laptop, Surface Book, Surface Pro, Surface Studio, Surface Go, Surface Hub.', 'ON', 'phamphuoc102', 1640493418, NULL, 252);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
