-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2021 lúc 04:40 PM
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
-- Cấu trúc bảng cho bảng `using_images`
--

CREATE TABLE `using_images` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `relation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `using_images`
--

INSERT INTO `using_images` (`id`, `image_id`, `relation_id`) VALUES
(33, 33, 31),
(34, 34, 32),
(35, 35, 33),
(36, 36, 34),
(37, 37, 35),
(38, 38, 36),
(39, 39, 37);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `using_images`
--
ALTER TABLE `using_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relation_id` (`relation_id`),
  ADD KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `using_images`
--
ALTER TABLE `using_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `using_images`
--
ALTER TABLE `using_images`
  ADD CONSTRAINT `using_images_ibfk_1` FOREIGN KEY (`relation_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `using_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `tbl_image` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
