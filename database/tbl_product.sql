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
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `desc` varchar(1000) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `creator` varchar(50) NOT NULL,
  `creation_time` int(20) NOT NULL,
  `status` enum('ON','OFF') NOT NULL DEFAULT 'ON',
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `name`, `code`, `price`, `desc`, `content`, `creator`, `creation_time`, `status`, `cat_id`) VALUES
(31, 'Laptop ASUS ZenBook Flip UX363EA', 'PHP1', 25990000, 'I5-1135G7/8GB/512GB PCIE/13.3FHD/WIN10/B&Uacute;T/X&Aacute;M HP532T', '&lt;p&gt;Apple MacBook Air M1 256GB 2020 I Ch&amp;iacute;nh h&amp;atilde;ng Apple Việt Nam&amp;nbsp;&lt;br /&gt;\r\nGiảm 11%&lt;/p&gt;\r\n\r\n&lt;p&gt;Apple MacBook Air M1 256GB 2020 I Ch&amp;iacute;nh h&amp;atilde;ng Apple Việt Nam&lt;br /&gt;\r\n25.700.000 ₫28.990.000 ₫ &amp;nbsp; &amp;nbsp; &amp;nbsp;1 đ&amp;aacute;nh gi&amp;aacute;&lt;br /&gt;\r\nSO S&amp;Aacute;NH CHI TIẾT&lt;br /&gt;\r\nLaptop ASUS Zenbook UX425EA&amp;nbsp;&lt;br /&gt;\r\nGiảm 4%&lt;/p&gt;\r\n\r\n&lt;p&gt;Laptop ASUS Zenbook UX425EA&lt;br /&gt;\r\n23.690.000 ₫24.690.000 ₫ &amp;nbsp; &amp;nbsp; &amp;nbsp;1 đ&amp;aacute;nh gi&amp;aacute;&lt;br /&gt;\r\nSO S&amp;Aacute;NH CHI TIẾT&lt;br /&gt;\r\nSurface Laptop Go Core i5 / 8GB / 128 GB / 12.4 inch Ch&amp;iacute;nh H&amp;atilde;ng&lt;br /&gt;\r\nGiảm 25%&lt;/p&gt;\r\n\r\n&lt;p&gt;Surface Laptop Go Core i5 / 8GB / 128 GB / 12.4 inch Ch&amp;iacute;nh H&amp;atilde;ng&lt;br /&gt;\r\n17.990.000 ₫23.990.000 ₫ &amp;nbsp; &amp;nbsp; &amp;nbsp;1 đ&amp;aacute;nh gi&amp;aacute;&lt;br /&gt;\r\nSO S&amp;Aacute;NH CHI TIẾT&lt;br /&gt;\r\nSurface Pro 7 Core i5 / 8GB / 128GB Ch&amp;iacute;nh H&amp;atilde;ng&lt;br /&gt;\r\nGiảm 13%&lt;/p&gt;\r\n\r\n&lt;p&gt;Surface Pro 7 Core i5 / 8GB / 128GB Ch&amp;iacute;nh H&amp;atilde;ng&lt;br /&gt;\r\n20.690.000 ₫23.990.000 ₫ &amp;nbsp; &amp;nbsp; &amp;nbsp;1 đ&amp;aacute;nh gi&amp;aacute;&lt;br /&gt;\r\nSO S&amp;Aacute;NH CHI TIẾT&lt;br /&gt;\r\nLaptop ASUS Gaming FX506LH-HN002T&lt;br /&gt;\r\nLaptop ASUS Gaming FX506LH-HN002T&lt;br /&gt;\r\n21.590.000 ₫21.990.000 ₫ &amp;nbsp; &amp;nbsp; &amp;nbsp;1 đ&amp;aacute;nh gi&amp;aacute;&lt;br /&gt;\r\nSO S&amp;Aacute;NH CHI TIẾT&lt;br /&gt;\r\nLaptop Asus ZenBook Flip UX363EA &amp;ndash; Hiệu năng ổn định, thiết kế sang trọng&lt;br /&gt;\r\nLaptop Asus ZenBook Flip UX363EA mang đến sự cải tiến nổi bật đến từ thiết kế c&amp;ugrave;ng việc kết hợp th&amp;ecirc;m nhiều t&amp;iacute;nh năng mạnh mẽ đến từ con chip Intel thế hệ 11. Laptop Asus ZenBook Flip UX363EA sẽ l&amp;agrave; người bạn đồng h&amp;agrave;nh khiến bạn thật sự h&amp;agrave;i l&amp;ograve;ng trong mọi nhu cầu c&amp;ocirc;ng việc.&lt;/p&gt;\r\n\r\n&lt;p&gt;Thiết kế sang trọng, m&amp;agrave;u sắc c&amp;aacute; t&amp;iacute;nh c&amp;ugrave;ng độ bền cao&lt;br /&gt;\r\nSo với những mẫu laptop quen thuộc từ trước đến nay th&amp;igrave; chiếc laptop Asus Zenbook Flip UX363EA lại cực k&amp;igrave; ghi điểm trong mắt người d&amp;ugrave;ng bởi thiết kế nổi bật với gam m&amp;agrave;u x&amp;aacute;m sang trọng đến từ chiếc vỏ nguy&amp;ecirc;n khối tạo sự bền chắc nhưng lại v&amp;ocirc; c&amp;ugrave;ng tinh tế v&amp;agrave; đẹp mắt nhờ chiếc logo được chạm khắc sắc n&amp;eacute;t tạo điểm nhấn.&lt;/p&gt;', 'phamphuoc102', 1640492969, 'ON', 254),
(32, 'Laptop Acer Aspire 3 A315-56-502X NX.HS5SV.00F', 'PHP2', 13490000, 'Core i5-1035G1/4GB/256GB PCIE/15.6 FHD/WIN10/ĐEN', '&lt;p&gt;Laptop Acer Aspire 3 A315 &amp;ndash; Laptop gi&amp;aacute; rẻ, hiệu năng cao&lt;br /&gt;\r\nLaptop Acer Aspire 3 A315 được trang bị cấu h&amp;igrave;nh cao với chip Intel Core i5 1035G1 thế hệ 10, m&amp;agrave;n h&amp;igrave;nh 15.6 inch k&amp;iacute;ch thước lớn, gọn nhẹ. Đ&amp;acirc;y l&amp;agrave; một mẫu laptop l&amp;yacute; tưởng cho sinh vi&amp;ecirc;n, nh&amp;acirc;n vi&amp;ecirc;n văn ph&amp;ograve;ng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Laptop thiết kế mỏng nhẹ, b&amp;agrave;n ph&amp;iacute;m fullsize&lt;br /&gt;\r\nAcer Aspire 3 A315 với thiết kế trẻ trung, cực kỳ nổi bật. Laptop với lớp vỏ nhựa được ho&amp;agrave;n thiện chi tiết nhưng vẫn sở hữu những n&amp;eacute;t cứng c&amp;aacute;p cần c&amp;oacute;. Kh&amp;ocirc;ng v&amp;igrave; chất liệu nhựa m&amp;agrave; khiến m&amp;aacute;y trở n&amp;ecirc;n lỏng lẻo. Khi cầm, laptop cũng mang lại khả năng cầm nắm chắc tay, bề mặt b&amp;aacute;m v&amp;acirc;n tay &amp;iacute;t.&lt;/p&gt;', 'phamphuoc102', 1640493059, 'ON', 255),
(33, 'Laptop Dell Inspiron 3511 5G8TF', 'PHP3', 13490000, 'I3-1115G4/4GB/128GB SSD/15.6 FHD/WIN10/ĐEN NHẬP KHẨU CH&Iacute;NH H&Atilde;NG', '&lt;p&gt;Laptop Dell Inspiron 3511 5G8TF &amp;ndash; Laptop bền bỉ, mỏng nhẹ&lt;br /&gt;\r\nVới Dell, những d&amp;ograve;ng sản phẩm m&amp;aacute;y t&amp;igrave;nh đều vẫn trung th&amp;agrave;nh với thiết kế chắc chắn v&amp;agrave; bền bỉ theo phong c&amp;aacute;ch của ri&amp;ecirc;ng m&amp;igrave;nh. V&amp;agrave; sản phẩm mẫu laptop Dell Inspiron 3501 5G8TF cũng vậy, một sự kết hợp từ cấu h&amp;igrave;nh ổn định đến cấu tr&amp;uacute;c chắc chắn v&amp;agrave; khả năng bền bỉ theo thời gian.&lt;/p&gt;\r\n\r\n&lt;p&gt;Cấu h&amp;igrave;nh cực k&amp;igrave; ổn định trong ph&amp;acirc;n kh&amp;uacute;c laptop tầm trung&lt;br /&gt;\r\nL&amp;agrave; chiếc laptop văn ph&amp;ograve;ng thuộc ph&amp;acirc;n kh&amp;uacute;c tầm trung nhưng Dell Inspiron 3501 5G8TF lại sở hữu ri&amp;ecirc;ng cho m&amp;igrave;nh chip Intel core i3 thuộc thế hệ 11 mới. Với những trang bị n&amp;agrave;y laptop Dell Inspiron 3501 5G8TF c&amp;oacute; thể thao t&amp;aacute;c nhiều hơn với chức năng của một chiếc m&amp;aacute;y t&amp;iacute;nh văn ph&amp;ograve;ng. Bạn c&amp;oacute; thể vừa l&amp;agrave;m nhiều việc c&amp;ugrave;ng l&amp;uacute;c đến việc giải tr&amp;iacute; cũng trở n&amp;ecirc;n dễ d&amp;agrave;ng hơn.&lt;/p&gt;', 'phamphuoc102', 1640493132, 'ON', 258),
(34, 'Apple MacBook Pro 13 Touch Bar M1 256GB 2020', 'PHP4', 33490000, 'Chính hãng Apple Việt Nam', '<p>Macbook Pro M1 2020 &ndash; Hiệu năng vượt trội với chip M1 mạnh mẽ<br />\r\nM&aacute;y t&iacute;nh bảng Macbook Pro M1 thế hệ mới vừa ra mắt được trang bị vi xử l&yacute; M1 do ch&iacute;nh Apple tự thiết kế. Hứa hẹn mang đến hiệu năng cực k&igrave; mạnh mẽ, thời gian sử dụng cực k&igrave; ấn tượng.</p>\r\n\r\n<p>Thiết kế trau chuốt từng đường n&eacute;t, trải nghiệm h&igrave;nh ảnh sắc n&eacute;t với m&agrave;n h&igrave;nh Retina<br />\r\nVẫn kế thừa thiết kế từ người tiềm nhiệm trước đ&oacute; của m&igrave;nh, Macbook Pro 2020 M1 vẫn sở hữu thiết kế nh&ocirc;m nguy&ecirc;n khối, c&aacute;c đường viền tr&ecirc;n m&aacute;y được cắt CNC tỉ mỉ, sắc xảo.</p>', 'phamphuoc102', 1640493219, 'ON', 256),
(35, 'Laptop MSI Prestige 14 EVO A11M-206VN', 'PHP5', 22190000, 'Core i5-1135G7/8GB/512GB PCIE/14 FHD 100SRGB/WIN10/X&Aacute;M', '&lt;p&gt;Laptop MSI Prestige 14 EVO A11M-206VN &amp;ndash; Nhỏ gọn hiệu năng mạnh&lt;br /&gt;\r\nBạn đang t&amp;igrave;m cho m&amp;igrave;nh một chiếc laptop để l&amp;agrave;m việc v&amp;agrave; học tập, tuy nhi&amp;ecirc;n lại chưa biết n&amp;ecirc;n chọn mua sản phẩm n&amp;agrave;o. H&amp;atilde;y mua ngay chiếc laptop MSI Prestige 14 EVO A11M-206VN, thiết kế ấn tượng c&amp;ugrave;ng hiệu năng cực khỏe sẽ l&amp;agrave; sự lựa chọn v&amp;ocirc; c&amp;ugrave;ng th&amp;iacute;ch hợp d&amp;agrave;nh cho bạn.&lt;/p&gt;\r\n\r\n&lt;p&gt;K&amp;iacute;ch thước nhỏ gọn, m&amp;agrave;n h&amp;igrave;nh IPS LCD 14 inch Full HD sắc n&amp;eacute;t&lt;br /&gt;\r\nLaptop MSI Prestige 14 EVO A11M-206VN sở hữu thiết kế ấn tượng si&amp;ecirc;u mỏng với th&amp;ocirc;ng số lần lượt l&amp;agrave; 319 x 219 x 15.9 mm v&amp;agrave; cực k&amp;igrave; nhẹ với trọng lượng chỉ 192g. Chi tiết ho&amp;agrave;n thiện tỉ mỉ ch&amp;iacute;nh x&amp;aacute;c với c&amp;aacute;c n&amp;eacute;t cắt kim loại b&amp;oacute;ng bẩy thời thượng.&lt;/p&gt;', 'phamphuoc102', 1640493295, 'ON', 257),
(36, 'Surface Laptop 4 Ryzen 5 / 8GB / 256 GB / 13.5 inches', 'PHP6', 26690000, 'Ch&iacute;nh h&atilde;ng Việt Nam', '&lt;p&gt;Surface laptop 4 Ryzen 5 mạnh mẽ hơn, dung lượng pin ấn tượng hơn&lt;br /&gt;\r\nSau Microsoft Surface Laptop 3 th&amp;igrave; Surface laptop 4 cũng đ&amp;atilde; ch&amp;iacute;nh thức được ra mắt. Tuy thiết kế kh&amp;ocirc;ng c&amp;oacute; nhiều thay đổi nhưng người d&amp;ugrave;ng sẽ cảm nhận được sự mạnh mẽ trong cấu h&amp;igrave;nh cũng như dung lượng pin v&amp;ocirc; c&amp;ugrave;ng ấn tượng. Chắc chắn, bạn sẽ thấy được nhiều sự bất ngờ tr&amp;ecirc;n phi&amp;ecirc;n bản mới nh&amp;agrave; Microsoft n&amp;agrave;y.&lt;/p&gt;\r\n\r\n&lt;p&gt;Thiết kế thanh lịch, m&amp;agrave;u sắc đa dạng&lt;br /&gt;\r\nSurface laptop 4 được thiết kế v&amp;ocirc; c&amp;ugrave;ng thanh lịch v&amp;agrave; nhỏ gọn. Thao t&amp;aacute;c mở cực nhẹ nh&amp;agrave;ng chỉ bằng một ng&amp;oacute;n tay gi&amp;uacute;p người d&amp;ugrave;ng cảm nhận được sự tr&amp;ocirc;i chảy, mượt m&amp;agrave;. M&amp;agrave;n h&amp;igrave;nh cảm ứng PixelSense c&amp;ugrave;ng hệ thống tản nhiệt &amp;ecirc;m &amp;aacute;i gi&amp;uacute;p người d&amp;ugrave;ng c&amp;oacute; những trải nghiệm cực chất.&lt;/p&gt;', 'phamphuoc102', 1640493481, 'ON', 260),
(37, 'Laptop Lenovo Yoga 6 13ALC6', 'PHP7', 22490000, 'R7-5700U/8GB/512GB PCIE/13.3 FHD 300NITS/WIN10/BÚT/XANH 82ND0033VN', '<p>Laptop Lenovo Yoga 6 13ALC6 - Laptop 2-trong-1, sang trọng, mạnh mẽ<br />\r\nLenovo Yoga 6 13ALC6 l&agrave; một phi&ecirc;n bản laptop đa năng 2-trong-1 mới mẻ, độc đ&aacute;o với thiết kế sang trọng, hiệu năng xử l&yacute; c&aacute;c t&aacute;c vụ mạnh mẽ, đảm bảo sẽ mang đến cho người d&ugrave;ng một trải nghiệm ho&agrave;n hảo d&ugrave; sử dụng với bất kỳ mục đ&iacute;ch, vị tr&iacute; c&ocirc;ng việc n&agrave;o.</p>\r\n\r\n<p>Phi&ecirc;n bản laptop 2-trong-1 ho&agrave;n hảo, m&agrave;n h&igrave;nh hiển thị sắc n&eacute;t<br />\r\nĐiểm nổi bật nhất của chiếc laptop Lenovo Yoga 6 13ALC6 ch&iacute;nh l&agrave; khả năng gập mở 360 độ, cho ph&eacute;p người d&ugrave;ng chuyển đổi một c&aacute;ch dễ d&agrave;ng giữa chế độ laptop v&agrave; tablet. Bản lề của chiếc laptop cũng được Lenovo cải tiến vượt trội hơn c&aacute;c phi&ecirc;n bản tiền nhiệm, cho khả năng gập mở trơn tru hơn, bền bỉ với hơn h&agrave;ng ngh&igrave;n lần đ&oacute;ng mở li&ecirc;n tục.</p>', 'phamphuoc102', 1640493541, 'ON', 259);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
