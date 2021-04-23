-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2019 at 09:40 AM
-- Server version: 10.1.29-MariaDB-6+b1
-- PHP Version: 7.2.4-1+b1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yukpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Tukijo', 'L', '085894448495', 'Pati', '2019-01-03 22:36:46', '2019-01-06 00:21:54'),
(2, 'Tukiyem', 'P', '0896643434', 'Kudus', '2019-01-03 23:49:21', '2019-01-06 00:22:12'),
(3, 'Bambang', 'L', '08323234343', 'Semarang', '2019-02-08 20:35:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'ATK', '2019-01-03 23:56:33', '2019-01-03 23:56:57'),
(3, 'Elektronik', '2019-01-03 23:57:08', '2019-01-04 21:22:27'),
(4, 'Makanan', '2019-01-28 07:01:16', NULL),
(5, 'Minuman', '2019-01-28 07:01:20', NULL),
(6, 'Aksesoris', '2019-02-07 11:35:32', NULL);

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
  `stock` int(10) DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `name`, `barcode`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`) VALUES
(2, 'Buku Sidu', 'AA001', 1, 5, 5000, 98, '2019-01-04 21:24:20', '2019-02-08 20:31:33'),
(4, 'Aqua', 'MB001', 5, 8, 3000, 28, '2019-01-28 07:01:40', '2019-02-09 08:42:14'),
(5, 'Pensil 2B', 'AA002', 1, 5, 2500, 94, '2019-01-04 22:30:43', '2019-02-09 07:13:55'),
(6, 'Pop Mie', 'MA001', 4, 2, 5000, 9, '2019-02-08 20:33:17', NULL),
(7, 'Polpen Pilot', 'AA003', 1, 2, 1500, 198, '2019-02-09 07:14:24', NULL),
(8, 'Indomie Goreng', 'MA002', 4, 7, 2500, 50, '2019-02-09 08:31:34', '2019-02-09 08:41:53'),
(9, 'Indomie Soto Kuah', 'MA003', 4, 7, 2500, 50, '2019-02-09 09:02:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(2, 'buah', '2019-01-04 00:09:15', '2019-02-09 07:14:42'),
(3, 'liter', '2019-01-04 00:09:45', '2019-01-04 21:22:38'),
(4, 'kilogram', '2019-01-04 00:09:50', NULL),
(5, 'pack', '2019-01-05 19:46:55', '2019-01-05 19:47:15'),
(7, 'bungkus', '2019-02-08 20:37:05', NULL),
(8, 'botol', '2019-02-09 08:42:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(7, 'Toko A', '0295254545', 'Kudus', 'Toko Abadi Jaya di Kudus', '2019-01-03 22:07:56', '2019-02-08 20:35:57'),
(9, 'Toko B', '089834354654', 'Pati', NULL, '2019-01-03 22:28:09', '2019-02-08 20:35:42'),
(10, 'PT. Indo Logistik', '02189888', 'Jakarta', NULL, '2019-01-03 23:48:10', '2019-02-08 20:36:13'),
(11, 'CV. YukCoding Media', '085786447406', 'Pati, Jawa Tengah', 'Software House', '2019-01-04 21:31:50', '2019-02-08 20:36:32'),
(13, 'Toko C', '02443434334', 'Semarang', 'Pemiliknya Pak John', '2019-02-09 08:58:20', '2019-02-09 08:58:48');

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
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `change`, `note`, `date`, `user_id`, `created`) VALUES
(16, 'YP1902040001', NULL, 7000, 1000, 6000, 1000, -5000, 'ssd', '2019-02-04', 1, '2019-02-04 09:10:07'),
(18, 'YP1902040002', 2, 5500, 0, 5500, 6000, 500, '', '2019-02-04', 1, '2019-02-04 11:43:54'),
(19, 'YP1902050001', NULL, 10000, 0, 10000, 10000, 0, '', '2019-02-05', 1, '2019-02-05 07:15:47'),
(20, 'YP1902060001', 3, 5000, 0, 5000, 5000, 0, '', '2019-02-06', 1, '2019-02-06 07:16:07'),
(21, 'YP1902090001', NULL, 8000, 1000, 7000, 10000, 3000, '', '2019-02-09', 1, '2019-02-09 07:18:05');

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
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(27, 16, 4, 3000, 1, 500, 2500),
(28, 16, 5, 2500, 2, 500, 4500),
(31, 18, 4, 3000, 1, 0, 3000),
(32, 18, 5, 2500, 1, 0, 2500),
(33, 19, 2, 5000, 2, 0, 10000),
(34, 20, 6, 5000, 1, 0, 5000),
(35, 21, 7, 1500, 2, 0, 3000),
(36, 21, 5, 2500, 2, 0, 5000);

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
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(13, 5, 'in', 'Kulakan', 7, 100, '2019-01-06', '2019-01-06 01:00:33', 1),
(21, 4, 'in', 'Kulakan', 9, 30, '2019-01-28', '2019-01-28 07:03:55', 1),
(22, 5, 'out', 'Rusak', NULL, 1, '2019-02-08', '2019-02-08 20:37:50', 1),
(23, 2, 'in', 'Kulakan', 10, 100, '2019-02-07', '2019-02-08 21:09:46', 1),
(24, 6, 'in', 'Tambahan', NULL, 10, '2019-02-08', '2019-02-08 21:10:12', 1),
(25, 7, 'in', 'Kulakan', 9, 200, '2019-02-09', '2019-02-09 07:17:36', 1),
(26, 8, 'in', 'Kulakan', 9, 50, '2019-02-09', '2019-02-09 08:33:15', 1),
(29, 9, 'in', 'Kulakan', 13, 50, '2019-02-09', '2019-02-09 09:04:10', 1);

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
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`, `created`, `updated`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Mohammad Nur Fawaiq', 'Pati, Indonesia', 1, '2019-01-02 23:39:19', NULL),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Anggita', NULL, 2, '2019-02-07 17:07:31', '2019-02-08 21:01:17'),
(3, 'kasir2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 'Steven', 'Kudus', 2, '2019-02-07 17:31:08', '2019-02-08 21:01:26'),
(4, 'budi123', '5d373a0ed0c16806d5771e8dda3c79ad98c24b93', 'Budi Doremi', NULL, 2, '2019-02-09 09:23:28', '2019-02-09 09:24:11');

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Constraints for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD CONSTRAINT `t_sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `t_sale_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
