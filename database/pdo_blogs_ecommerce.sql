-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 05:40 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo_blogs_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `accounts_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`accounts_id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `role`) VALUES
(1, 'duocadmin', '123456', 'Trình Quốc Được', 'trinhduoc69@gmail.com', '0942858890', 'abccc', 'admin'),
(2, 'duocuser', '123456', 'Trình Quốc Được', 'trinhduoc69@gmail.com', '0942858890', 'Phú Thọ CITY', 'admin'),
(11, 'tovantiep', '123456', 'Tô Văn Tiệp', 'vvdao096@gmail.com', '0942858890', 'Núi Móng -Hoàn Sơn -Tiên Du-Bắc Ninh', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id_category_product` int(11) NOT NULL,
  `title_category_product` varchar(100) NOT NULL,
  `desc_category_product` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id_category_product`, `title_category_product`, `desc_category_product`) VALUES
(29, 'Bánh ', 'Bánh đa, xèo...'),
(45, 'Nem', 'Nem Hà Nội, Thanh Hóa...'),
(60, 'Bún', 'Bún Khô,Bún Nước');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_userid` int(11) NOT NULL,
  `order_username` varchar(255) NOT NULL,
  `order_phone` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_code`, `order_date`, `order_status`, `order_userid`, `order_username`, `order_phone`, `order_email`, `order_address`) VALUES
(40, '658', '13/06/2021 01:30:30am', 1, 7, 'Tô Văn Tiệp', '0942858990', 'tovantiep2604@gmail.com', 'Thanh Oai'),
(41, '1585', '13/06/2021 01:31:37am', 1, 7, 'Tô Văn Tiệp', '0942858990', 'tovantiep2604@gmail.com', 'Thanh Oai'),
(42, '6597', '14/06/2021 02:18:23pm', 0, 7, 'Vũ Văn Đạo', '0942858890', 'tovantiep2604@gmail.com', 'acccccccccccccc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_code`, `product_id`, `product_quantity`) VALUES
(44, '42', 34, 1),
(45, '8700', 20, 1),
(46, '658', 20, 1),
(47, '658', 23, 2),
(48, '1585', 20, 1),
(49, '6597', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL,
  `title_product` varchar(255) NOT NULL,
  `price_product` varchar(100) NOT NULL,
  `desc_product` text NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `image_product` varchar(100) NOT NULL,
  `id_category_product` int(11) NOT NULL,
  `product_hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `title_product`, `price_product`, `desc_product`, `quantity_product`, `image_product`, `id_category_product`, `product_hot`) VALUES
(4, 'Bánh đa kế Bắc Giang', '10000', '', 100, 'badakebg.jpg', 29, 0),
(6, 'Bánh đậu xanh Hải Dương', '40000', '', 100, 'banhdauxanh.jpg', 29, 0),
(7, 'Bánh ít lá gai', '8000', '', 100, 'banhitlagai.jpg', 29, 0),
(9, 'Bánh tẻ', '10000', '', 100, 'banhte.jpg', 29, 0),
(10, 'Bánh xèo', '20000', '', 100, 'banhxeo.jpg', 29, 0),
(11, 'Bún bò Huế', '30000', '', 100, 'bunbohue.jpg', 60, 1),
(12, 'Bún chả Hà Nội', '30000', '', 100, 'bunchahn.jpg', 60, 0),
(13, 'Bún đậu mắm tôm', '40000', '', 100, 'bundaumamtom.jpg', 60, 1),
(18, 'Gỏi cuốn', '10000', '', 100, 'goicuon.jpg', 45, 0),
(19, 'Hủ tiếu', '30000', '', 100, 'hutieu.jpg', 60, 0),
(20, 'Nem bùi', '35000', '', 100, 'nembui.jpg', 45, 1),
(37, 'Nem Chua Thanh Hóa', '10000', '', 100, 'nemchuath.jpg', 45, 1),
(38, 'Bánh Đa Cua Hải Phòng', '35000', 'abccc', 100, 'banhdacuahp.jpg', 60, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`accounts_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `accounts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id_category_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
