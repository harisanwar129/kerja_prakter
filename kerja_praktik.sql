-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 10:53 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja_praktik`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Doraemon', 'Laki-laki', '08589455545', 'Cipanas', '2019-01-03 22:36:46', '2021-04-23 14:03:14'),
(3, 'Budi', 'Perempuan', '08323875454', 'Cianjur', '2019-02-08 20:35:04', '2021-04-23 14:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `cname`, `created`, `updated`) VALUES
(7, 'Cat', '2021-04-23 13:41:13', NULL),
(8, 'Besi', '2021-04-23 13:41:26', NULL),
(9, 'Semen', '2021-04-23 13:41:36', NULL),
(10, 'Keramik', '2021-04-23 13:47:30', NULL),
(11, 'kayu', '2021-04-23 13:48:18', NULL),
(12, 'Plastik', '2021-04-23 13:49:26', NULL),
(13, 'Lain-lain', '2021-04-23 13:52:34', NULL),
(14, 'Alat Listrik', '2021-04-23 13:58:33', NULL),
(15, 'ALat tukang', '2021-04-23 14:04:54', NULL),
(18, 'dd', '2021-04-24 15:09:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(10) DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `name`, `barcode`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`) VALUES
(10, 'Semen 3 Roda', 'A001', 9, 13, 50000, 892, '2021-04-23 13:54:54', NULL),
(11, 'Pintu Kayu', 'A002', 11, 13, 30000, 40, '2021-04-23 13:57:00', NULL),
(12, 'Terminal 2 lubang', 'A003', 14, 13, 20000, 206, '2021-04-23 13:59:33', NULL),
(13, 'Kabel Putih', 'A004', 14, 9, 10000, 4548, '2021-04-23 14:01:03', NULL),
(14, 'Palu', 'A006', 15, 13, 15000, 452, '2021-04-23 14:06:02', NULL),
(16, 'dfsdfsd', '233423', 18, 12, 23423, 0, '2021-04-24 15:10:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `uname`, `created`, `updated`) VALUES
(9, 'meter', '2021-04-23 13:50:41', '2021-04-23 08:53:45'),
(11, 'kilogram', '2021-04-23 13:51:19', '2021-04-23 08:53:34'),
(12, 'batang', '2021-04-23 13:51:28', '2021-04-23 08:53:27'),
(13, 'pcs', '2021-04-23 13:54:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(15, 'Abadi Makmur', '0841616512', 'Jln. Bandung', 'Supplier Cat', '2021-04-23 14:07:30', NULL),
(16, 'Rezeki Mauju', '0815456454', 'jln. Bogor 25', 'Supplier dari bahan bangunan', '2021-04-23 14:08:22', '2021-04-23 09:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `change` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `change`, `note`, `date`, `user_id`, `created`) VALUES
(16, 'YP1902040001', NULL, 7000, 1000, 6000, 1000, -5000, 'ssd', '2019-02-04', 1, '2019-02-04 09:10:07'),
(19, 'YP1902050001', NULL, 10000, 0, 10000, 10000, 0, '', '2019-02-05', 1, '2019-02-05 07:15:47'),
(20, 'YP1902060001', 3, 5000, 0, 5000, 5000, 0, '', '2019-02-06', 1, '2019-02-06 07:16:07'),
(21, 'YP1902090001', NULL, 8000, 1000, 7000, 10000, 3000, '', '2019-02-09', 1, '2019-02-09 07:18:05'),
(23, 'YP2104230001', NULL, 210000, 0, 210000, 800000, 590000, '', '2021-04-23', 3, '2021-04-23 14:13:40'),
(24, 'SJ2104230002', NULL, 50000, 0, 50000, 80000, 30000, '', '2021-04-23', 3, '2021-04-23 16:57:55'),
(25, 'SJ2104230003', NULL, 90000, 0, 90000, 900000, 810000, '', '2021-04-23', 3, '2021-04-23 23:32:46'),
(26, 'SJ2104230004', NULL, 90000, 0, 90000, 900000, 810000, '', '2021-04-23', 3, '2021-04-23 23:32:52'),
(27, 'SJ2104230005', NULL, 90000, 0, 90000, 900000, 810000, '', '2021-04-23', 3, '2021-04-23 23:32:57'),
(28, 'SJ2104230006', NULL, 120000, 0, 120000, 500000, 380000, '', '2021-04-23', 3, '2021-04-23 23:33:45'),
(29, 'SJ2104230007', NULL, 120000, 0, 120000, 500000, 380000, '', '2021-04-23', 3, '2021-04-23 23:37:47'),
(30, 'SJ2104230008', NULL, 120000, 0, 120000, 500000, 380000, '', '2021-04-23', 3, '2021-04-23 23:39:57'),
(31, 'SJ2104230009', NULL, 120000, 0, 120000, 500000, 380000, '', '2021-04-23', 3, '2021-04-23 23:40:53'),
(32, 'SJ2104230010', NULL, 120000, 0, 120000, 500000, 380000, '', '2021-04-23', 3, '2021-04-23 23:40:59'),
(33, 'SJ2104230011', NULL, 120000, 0, 120000, 500000, 380000, '', '2021-04-23', 3, '2021-04-23 23:44:43'),
(34, 'SJ2104230012', NULL, 20000, 0, 20000, 80000, 60000, '', '2021-04-23', 3, '2021-04-23 23:45:12'),
(35, 'SJ2104230013', NULL, 20000, 0, 20000, 80000, 60000, '', '2021-04-23', 3, '2021-04-23 23:45:17'),
(36, 'SJ2104230014', NULL, 20000, 0, 20000, 90000, 70000, '', '2021-04-23', 3, '2021-04-23 23:51:49'),
(37, 'SJ2104230001', NULL, 100000, 0, 100000, 1000000, 900000, '', '2021-04-23', 3, '2021-04-24 00:09:32'),
(38, 'SJ2104240001', NULL, 30000, 0, 30000, 90000, 60000, '', '2021-04-24', 3, '2021-04-24 06:14:13'),
(39, 'SJ2104240002', NULL, 50000, 0, 50000, 9000000, 8950000, '', '2021-04-24', 3, '2021-04-24 06:14:39'),
(40, 'SJ2104240003', NULL, 1500000, 0, 1500000, 9000000, 7500000, '', '2021-04-24', 3, '2021-04-24 06:16:17'),
(41, 'SJ2104240004', NULL, 30000, 0, 30000, 555555, 525555, '', '2021-04-24', 3, '2021-04-24 06:34:39'),
(42, 'SJ2104240005', NULL, 30000, 0, 30000, 50000, 20000, '', '2021-04-24', 3, '2021-04-24 06:36:36'),
(43, 'SJ2104240006', NULL, 10000, 0, 10000, 900000, 890000, '', '2021-04-24', 2, '2021-04-24 07:36:07'),
(44, 'SJ2104240007', NULL, 20000, 11, 19989, 900000, 880011, '', '2021-04-24', 3, '2021-04-24 12:32:23'),
(45, 'SJ2104240008', NULL, 50000, 20000, 30000, 50000, 20000, '', '2021-04-24', 3, '2021-04-24 12:43:06'),
(46, 'SJ2104240009', NULL, 40050, 50, 40000, 50000, 10000, '', '2021-04-24', 3, '2021-04-24 14:25:39'),
(47, 'SJ2104240010', NULL, 140000, 40000, 100000, 200000, 100000, '', '2021-04-24', 3, '2021-04-24 14:34:16'),
(48, 'SJ2104240011', NULL, 120000, 0, 120000, 200000, 80000, '', '2021-04-24', 3, '2021-04-24 15:00:28');

--
-- Triggers `t_sale`
--
DELIMITER $$
CREATE TRIGGER `detail_del` AFTER DELETE ON `t_sale` FOR EACH ROW BEGIN
	DELETE FROM t_sale_detail
    WHERE sale_id = OLD.sale_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_cart`
--

CREATE TABLE `t_sale_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(39, 23, 13, 10000, 5, 0, 50000),
(40, 23, 12, 20000, 5, 0, 100000),
(41, 23, 11, 30000, 2, 0, 60000),
(42, 24, 10, 50000, 1, 0, 50000),
(55, 37, 12, 20000, 1, 0, 0),
(56, 37, 10, 50000, 2, 0, 100000),
(57, 38, 11, 30000, 1, 0, 30000),
(58, 39, 10, 50000, 1, 0, 50000),
(59, 40, 11, 30000, 50, 0, 1500000),
(60, 41, 11, 30000, 1, 0, 30000),
(61, 42, 11, 30000, 1, 0, 30000),
(62, 43, 12, 20000, 1, 0, 0),
(63, 43, 13, 10000, 1, 0, 10000),
(64, 44, 12, 20000, 1, 0, 20000),
(65, 45, 10, 50000, 1, 0, 50000),
(66, 46, 10, 50000, 1, 0, 50),
(67, 46, 12, 20000, 2, 0, 40000),
(68, 47, 10, 50000, 2, 0, 100000),
(69, 47, 12, 20000, 2, 0, 40000),
(70, 48, 11, 30000, 4, 0, 120000);

--
-- Triggers `t_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_add` AFTER INSERT ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = stock - NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_del` AFTER DELETE ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = stock + OLD.qty
    WHERE item_id = OLD.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(32, 10, 'in', 'tambahan', 15, 900, '2021-04-23', '2021-04-23 14:09:24', 3),
(33, 11, 'in', 'Tambahan', 15, 453, '2021-04-23', '2021-04-23 14:09:53', 3),
(34, 12, 'in', 'tambahan', 15, 265, '2021-04-23', '2021-04-23 14:10:28', 3),
(35, 13, 'in', 'tambahan', 15, 4554, '2021-04-23', '2021-04-23 14:11:07', 3),
(36, 14, 'in', 'tambahan', 15, 452, '2021-04-23', '2021-04-23 14:11:41', 3),
(37, 12, 'out', 'Rusak', NULL, 50, '2021-04-23', '2021-04-23 14:12:21', 3),
(38, 11, 'in', 'tambahan', 15, 100, '2021-04-24', '2021-04-24 06:17:22', 3),
(39, 11, 'out', 'rusak', NULL, 400, '2021-04-24', '2021-04-24 06:17:49', 3),
(41, 12, 'in', 'dffv', 15, 3, '2021-04-24', '2021-04-24 14:35:11', 3),
(43, 11, 'out', 'dasd', NULL, 50, '2021-04-24', '2021-04-24 14:36:04', 3),
(44, 11, 'in', 'dsd', 15, 2, '2021-04-24', '2021-04-24 14:37:21', 3),
(45, 11, 'in', 'etertdfgd', 16, 4, '2021-04-24', '2021-04-24 15:07:53', 3),
(46, 11, 'out', 'fdsfsf', NULL, 10, '2021-04-24', '2021-04-24 15:08:24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`, `created`, `updated`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'haris', 'Cipanas, Indonesia', 1, '2019-01-02 23:39:19', '2021-04-23 17:03:19'),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Patric', NULL, 2, '2019-02-07 17:07:31', '2021-04-23 17:03:32'),
(3, 'kasir2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 'Sasuke', 'Cipnas\r\n', 2, '2019-02-07 17:31:08', '2021-04-24 01:11:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`),
  ADD UNIQUE KEY `invoice` (`invoice`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_sale_cart`
--
ALTER TABLE `t_sale_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `t_stock_ibfk_2` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD CONSTRAINT `t_sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_sale_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_sale_cart`
--
ALTER TABLE `t_sale_cart`
  ADD CONSTRAINT `t_sale_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_sale_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
