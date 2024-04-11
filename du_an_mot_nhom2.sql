-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 05:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_mot_nhom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `dm_id` int(11) NOT NULL,
  `dm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`dm_id`, `dm_name`) VALUES
(4, 'Áo Sơ Mi'),
(5, 'Áo Thun'),
(6, 'Áo Len'),
(11, 'ÁO Khoác');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cntt_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cntt_id`, `sp_id`, `kh_id`, `content`) VALUES
(12, 42, 43, 'duytan'),
(13, 42, 43, 'sdfdfdfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `hd_id` int(11) NOT NULL,
  `kh_name` varchar(255) NOT NULL,
  `kh_email` varchar(255) NOT NULL,
  `kh_phone` varchar(255) NOT NULL,
  `kh_address` varchar(255) NOT NULL,
  `kh_content` text DEFAULT NULL,
  `kh_id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`hd_id`, `kh_name`, `kh_email`, `kh_phone`, `kh_address`, `kh_content`, `kh_id`, `order_status`, `order_date`, `order_code`) VALUES
(65, 'tan đơiì buồn', ' 456@gmail.com', '0987345666', 'hà nội', 'sssss', 43, '2', '2023-12-05 19:48:52', ''),
(66, 'tan đơiì buồn', ' 456@gmail.com', '0987345666', 'hà nội', 'bfdgdfgfdg', 43, '', '2023-12-05 19:50:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `hd_ct_id` int(11) NOT NULL,
  `sp_name` varchar(255) NOT NULL,
  `sp_image` varchar(300) NOT NULL,
  `sp_price` varchar(200) NOT NULL,
  `sp_quantity` int(11) NOT NULL,
  `hd_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`hd_ct_id`, `sp_name`, `sp_image`, `sp_price`, `sp_quantity`, `hd_id`, `sp_id`, `size`) VALUES
(60, 'thome brow', 'thome1.jpg', '1000000 ', 1, 65, 44, ''),
(61, 'thome brow', 'thome1.jpg', '1000000 ', 2, 66, 44, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(255) NOT NULL,
  `sp_price` varchar(200) NOT NULL,
  `sp_sale` varchar(200) NOT NULL,
  `sp_quantity` int(11) NOT NULL,
  `sp_description` text NOT NULL,
  `kt_id` int(11) NOT NULL,
  `dm_id` int(11) NOT NULL,
  `sp_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sp_id`, `sp_name`, `sp_price`, `sp_sale`, `sp_quantity`, `sp_description`, `kt_id`, `dm_id`, `sp_image`) VALUES
(1, 'GIÀY ADIDAS CLIMACOOL VENT NỮ - TRẮNG', '  400000', '300000  ', 20, 'Giày Adidas Climacool Vent là một mẫu giày thể thao với thiết kế rất đẹp và thời trang, bộ đế êm có khả năng đàn hồi cao hỗ trợ tuyệt vời trong quá trình luyện tập. Phần upper công nghệ Climacool giúp đôi giày cực thoáng khi và dễ chịu khi sử dụng.', 9, 1, '27cc2a221a32c6425cd88c04d03c9153.jpg'),
(2, 'GIÀY ADIDAS BRAVADA NAM - TRẮNG ĐEN', ' 500000', '350000 ', 20, 'Giày adidas Bravada mẫu giày được thiết kế Basic cho các tín đồ yêu thời trang. Với các kiểu thiết kế Original này bạn sẽ không bao giờ lo lắng chuyện đôi giày của bạn bị lỗi mốt theo năm tháng.', 6, 1, 'images (1).jpg'),
(3, 'GIÀY NIKE AIR ZOOM PEGASUS 39 NỮ- XÁM', ' 500000', '450000 ', 20, 'Giày Nike Air Zoom Pegasus 39 là mẫu giày thể thao phiên bản thứ 39 của dòng giày huyền thoại Nike Pegasus nổi tiếng. Với những cải tiến vượt trội đặc biệt với việc gấp 2 lần lớp đệm Air Zoom so với phiên bản trước, Nike Air Zoom Pegasus 39 xứng đáng là siêu phẩm được săn đón nhất năm 2022.', 6, 3, 'images (5).jpg'),
(40, 'Sơ Mi Dior Cộc Tay', '  900', '500  ', 5, '123', 12, 4, 'dior cộc.jpg'),
(41, 'Sơ Mi Dior Dài Tay', '  10000', '5000  ', 2, 'dsq', 12, 4, 'sơ mi dior.jpg'),
(42, 'Sơ mi BBR Cộc Tay', '  2000', '1000  ', 3, '123', 13, 4, 'bbr cộc.png'),
(43, 'Sơ mi BBR dài tay', '  10000', '5000  ', 4, 'dzai', 12, 5, 'bbr dài tay.png'),
(44, 'thome brow', ' 1300000', '1000000 ', 3, 'cat', 14, 4, 'thome1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `kt_id` int(11) NOT NULL,
  `kt_name` varchar(255) NOT NULL,
  `kieu_display` int(11) NOT NULL DEFAULT 0,
  `ma_color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`kt_id`, `kt_name`, `kieu_display`, `ma_color`) VALUES
(12, 'M', 1, '#000000'),
(13, 'L', 1, '#000000'),
(14, 'XL', 1, '#000000'),
(15, 'Đen', 2, '#000000'),
(17, 'Trắng', 2, '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kh_id` int(11) NOT NULL,
  `kh_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kh_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kh_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kh_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `kh_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kh_id`, `kh_name`, `kh_password`, `kh_email`, `kh_avatar`, `role`, `kh_phone`) VALUES
(43, 'tan đơiì buồn', '$2y$10$qs5ARLtWE8aqdHzDMm85S.ZHk.tV4pPu8qzTK6K0H7p9ZsP3BYkzW', ' 456@gmail.com', 'sneaker.webp ', 1, ''),
(44, 'admin', '$2y$10$k.yGm0Rz6.rEk8tGAtAVz.n1Std63i6mhxUftu9CynEhZ.r7l36Zm', ' admin@gmail.com', 'ba bể.png ', 0, ''),
(45, 'leduytan', '$2y$10$T7d34uv6BopkFwLMH7duMecY7Boh9.hlZZqEBx2HIQKKUHbpmGcZi', ' 3@gmail.com', 'anh3lab12.png ', 1, ''),
(46, 'leduytan', '$2y$10$CLt0z0n58BZrt1O/hyIe5..oI2ry7bgVwXn/ebvGXSzmGZxLAKdJ.', ' 123@gmail.com', 'biển 2.jpg ', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`dm_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cntt_id`),
  ADD KEY `Fk_product_id` (`sp_id`),
  ADD KEY `FK_user_id` (`kh_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`hd_id`),
  ADD KEY `FK_customer` (`kh_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`hd_ct_id`),
  ADD KEY `FK_product` (`sp_id`),
  ADD KEY `FK_order` (`hd_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`kt_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cntt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `hd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `hd_ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `kt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`kh_id`) REFERENCES `user` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_product_id` FOREIGN KEY (`sp_id`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_customer` FOREIGN KEY (`kh_id`) REFERENCES `user` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`hd_id`) REFERENCES `order` (`hd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`sp_id`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
