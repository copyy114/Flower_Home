-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 01:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowerhome`
--
CREATE DATABASE IF NOT EXISTS `flowerhome` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `flowerhome`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `total_amount`, `created_at`) VALUES
(1, '01', 'test@gmail.com', '174', '05', 400.00, '2024-08-11 16:34:27'),
(2, '01', 'test@gmail.com', '174', '05', 400.00, '2024-08-11 16:35:36'),
(3, 'ไกนวิทย์', 'test@gmail.com', '77', '00', 300.00, '2024-08-11 16:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 2, 7, 2),
(2, 3, 9, 1),
(3, 3, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE `tbproduct` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `prev_price` float(12,2) NOT NULL DEFAULT 0.00,
  `current_price` float(12,2) NOT NULL DEFAULT 0.00,
  `img_path` varchar(255) NOT NULL,
  `type_shop` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`id`, `name`, `description`, `prev_price`, `current_price`, `img_path`, `type_shop`, `date_created`, `date_updated`) VALUES 
('?','HEIT001','name','100','0','IMG_3978.HEIC(4).png','flower_25','?','?'),
('?','HEIT002','name','100','0','IMG_3978.HEIC(5).png','flower_25','?','?'),
('?','HEIT003','name','100','0','IMG_3978.HEIC(6).png','flower_25','0','0'),
('?','HEIT004','name','100','0','IMG_3978.HEIC(7).png','flower_25','0','0'),
('?','HEIT005','name','100','0','IMG_3978.HEIC(8).png','flower_25','0','0'),
('?','HEIT006','name','100','0','IMG_3978.HEIC(9).png','flower_25','0','0'),
('?','HEIT007','name','100','0','IMG_3978.HEIC(10).png','flower_25','0','0'),
('?','HEIT008','name','100','0','IMG_3978.HEIC(11).png','flower_25','0','0'),
('?','HEIT009','name','100','0','IMG_3978.HEIC(12).png','flower_25','0','0'),
('?','HEIT010','name','100','0','IMG_3978.HEIC(13).png','flower_25','0','0'),
('?','HEIT011','name','100','0','IMG_3978.HEIC(14).png','flower_25','0','0'),
('?','HEIT012','name','100','0','IMG_3978.HEIC(15).png','flower_25','0','0'),
('?','HEIT013','name','100','0','IMG_3978.HEIC(16).png','flower_25','0','0'),
('?','HEIT014','name','100','0','IMG_3978.HEIC(17).png','flower_25','0','0'),
('?','HEIT015','name','100','0','IMG_3978.HEIC(18).png','flower_25','0','0'),
('?','HEIT016','name','100','0','IMG_3978.HEIC(19).png','flower_25','0','0'),
('?','HEIT017','name','100','0','IMG_3978.HEIC(20).png','flower_25','0','0'),
('?','HEIT018','name','100','0','IMG_3978.HEIC(21).png','flower_25','0','0'),
('?','HEIT019','name','100','0','IMG_3978.HEIC(22).png','flower_25','0','0'),
('?','HEIT020','name','100','0','IMG_3978.HEIC(23).png','flower_25','0','0'),
('?','HEIT021','name','100','0','IMG_3978.HEIC(24).png','flower_25','0','0'),
('?','HEIT022','name','100','0','IMG_3978.HEIC(25).png','flower_25','0','0'),
('?','HEIT023','name','100','0','IMG_3978.HEIC(26).png','flower_25','0','0'),
('?','HEIT024','name','100','0','IMG_3978.HEIC(27).png','flower_25','0','0'),
('?','HEIT025','name','100','0','IMG_3978.HEIC(28).png','flower_25','0','0'),
('?','HEIT026','name','100','0','IMG_3978.HEIC(29).png','flower_25','0','0'),
('?','HEIT027','name','100','0','IMG_3978.HEIC(30).png','flower_25','0','0'),
('?','HEIT028','name','100','0','IMG_3978.HEIC(31).png','flower_25','0','0'),
('?','HEIT029','name','100','0','IMG_3978.HEIC(32).png','flower_25','0','0'),
('?','HEIT030','name','100','0','IMG_3978.HEIC(33).png','flower_25','0','0'),
('?','HEIT031','name','100','0','IMG_3978.HEIC(34).png','flower_25','0','0'),
('?','HEIT032','name','100','0','IMG_3978.HEIC(35).png','flower_25','0','0'),
('?','HEIT033','name','100','0','IMG_3978.HEIC(36).png','flower_25','0','0'),
('?','HEIT034','name','100','0','IMG_3978.HEIC(37).png','flower_25','0','0'),
('?','HEIT035','name','100','0','IMG_3978.HEIC(38).png','flower_25','0','0'),
('?','HEIT036','name','100','0','IMG_3978.HEIC(39).png','flower_25','0','0'),
('?','HEIT037','name','100','0','IMG_3978.HEIC(40).png','flower_25','0','0'),
('?','HEIT038','name','100','0','IMG_3978.HEIC(41).png','flower_25','0','0'),
('?','HEIT039','name','100','0','IMG_3978.HEIC(42).png','flower_25','0','0'),
('?','HEIT040','name','100','0','IMG_3978.HEIC(43).png','flower_25','0','0'),
('?','HEIT041','name','100','0','IMG_3978.HEIC(44).png','flower_25','0','0'),
('?','HEIT042','name','100','0','IMG_3978.HEIC(45).png','flower_25','0','0'),
('?','HEIT043','name','100','0','IMG_3978.HEIC(46).png','flower_25','0','0'),
('?','HEIT044','name','100','0','IMG_3978.HEIC(47).png','flower_25','0','0'),
('?','HEIT045','name','100','0','IMG_3978.HEIC(48).png','flower_25','0','0'),
('?','HEIT046','name','100','0','IMG_3978.HEIC(49).png','flower_25','0','0'),
('?','HEIT047','name','100','0','IMG_3978.HEIC(50).png','flower_25','0','0'),
('?','HEIT048','name','100','0','IMG_3978.HEIC(51).png','flower_25','0','0'),
('?','HEIT049','name','100','0','IMG_3978.HEIC(52).png','flower_25','0','0'),
('?','HEIT050','name','100','0','IMG_3978.HEIC(53).png','flower_25','0','0'),
('?','HEIT051','name','100','0','IMG_3978.HEIC(54).png','flower_25','0','0'),
('?','HEIT052','name','100','0','IMG_3978.HEIC(55).png','flower_25','0','0'),
('?','HEIT053','name','100','0','IMG_3978.HEIC(56).png','flower_25','0','0'),
('?','HEIT054','name','100','0','IMG_3978.HEIC(57).png','flower_25','0','0'),
('?','HEIT055','name','100','0','IMG_3978.HEIC(58).png','flower_25','0','0'),
('?','HEIT056','name','100','0','IMG_3978.HEIC(59).png','flower_25','0','0'),
('?','HEIT057','name','100','0','IMG_3978.HEIC(60).png','flower_25','0','0'),
('?','HEIT058','name','100','0','IMG_3978.HEIC(61).png','flower_25','0','0'),
('?','HEIT059','name','100','0','IMG_3978.HEIC(62).png','flower_25','0','0'),
('?','HEIT060','name','100','0','IMG_3978.HEIC(63).png','flower_25','0','0'),
('?','HEIT061','name','100','0','IMG_3978.HEIC(64).png','flower_25','0','0'),
('?','HEIT062','name','100','0','IMG_3978.HEIC(65).png','flower_25','0','0'),
('?','HEIT063','name','100','0','IMG_3978.HEIC(66).png','flower_25','0','0'),
('?','HEIT064','name','100','0','IMG_3978.HEIC(67).png','flower_25','0','0'),
('?','HEIT065','name','100','0','IMG_3978.HEIC(68).png','flower_25','0','0'),
('?','HEIT066','name','100','0','IMG_3978.HEIC(69).png','flower_25','0','0'),
('?','HEIT067','name','100','0','IMG_3978.HEIC(70).png','flower_25','0','0'),
('?','HEIT068','name','100','0','IMG_3978.HEIC(71).png','flower_25','0','0'),
('?','HEIT069','name','100','0','IMG_3978.HEIC(72).png','flower_25','0','0'),
('?','HEIT070','name','100','0','IMG_3978.HEIC(73).png','flower_25','0','0'),
('?','HEIT071','name','100','0','IMG_3978.HEIC(74).png','flower_25','0','0'),
('?','HEIT072','name','100','0','IMG_3978.HEIC(75).png','flower_25','0','0'),
('?','HEIT073','name','100','0','IMG_3978.HEIC(76).png','flower_25','0','0'),
('?','HEIT074','name','100','0','IMG_3978.HEIC(77).png','flower_25','0','0'),
('?','HEIT075','name','100','0','IMG_3978.HEIC(78).png','flower_25','0','0'),
('?','HEIT076','name','100','0','IMG_3978.HEIC.png','flower_25','0','0'),



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `user_type` enum('customer','owner') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `user_type`, `last_login`) VALUES
(1, 'test01', 'customer1', '0', 'customer', '2024-08-12 22:35:02'),
(3, 'ลูกค้า', 'm1', '1234', 'owner', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbproduct`
--
ALTER TABLE `tbproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbproduct` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
