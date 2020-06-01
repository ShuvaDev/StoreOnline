-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 09:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Shuva', 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'ACER'),
(2, 'SAMSUNG'),
(3, 'IPHONE'),
(4, 'CANON');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 'cvm1eacp8k5jv7o6okhrpimlul', 8, 'Lorem Ipsum is simply', 340.22, 1, 'upload/c1b36e5fce.jpg'),
(2, 'd3c23vsc1vc1u6tif6q707jdcc', 5, 'Lorem Ipsum is simply', 165.44, 2, 'upload/6dfd777b62.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Mobile Phones'),
(3, 'Accessories'),
(4, 'Software'),
(5, 'Sports &amp; Fitness'),
(6, 'Footwear'),
(7, 'Jewellery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(12, 2, 9, 'Lorem Ipsum is simply', 233.60, 'upload/5a9093067a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `address`, `city`, `country`, `zip`, `phone`, `pass`) VALUES
(2, 'Shuvaa', 'shuva@gmail.com', 'Banskhali,Chottogram', 'Chottogram', 'Bangladesh', '4393', '01883661903', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(10, 2, 7, 'Lorem Ipsum is simply', 1, 435.22, 'upload/3ee1e8bc0a.png', '2019-10-03 00:16:10', 2),
(11, 2, 7, 'Lorem Ipsum is simply', 0, 435.22, 'upload/3ee1e8bc0a.png', '2019-10-03 01:17:58', 1),
(12, 2, 10, 'This Lorem Ipsum is simply', 1, 350.44, 'upload/2d76ae42e8.jpg', '2019-11-02 09:36:26', 1),
(13, 2, 10, 'This Lorem Ipsum is simply', 1, 350.44, 'upload/2d76ae42e8.jpg', '2019-11-02 19:40:08', 0),
(14, 2, 9, 'Lorem Ipsum is simply', 1, 233.60, 'upload/5a9093067a.jpg', '2019-11-02 19:40:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` text NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(3, 'Lorem Ipsum is simply', 3, 4, '<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p><br />&lt;p&gt;Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p><br />&lt;p&gt;Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>', 505.220, 'upload/344aaaee70.png', 0),
(4, 'Lorem Ipsum is simply', 3, 1, '<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>', 220.970, 'upload/c6906f4441.jpg', 1),
(5, 'Lorem Ipsum is simply', 5, 3, '<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>', 165.440, 'upload/6dfd777b62.jpg', 1),
(6, 'Lorem Ipsum is simply', 6, 2, '<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>', 435.220, 'upload/369029fc4c.jpg', 0),
(7, 'Lorem Ipsum is simply', 6, 2, '<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>\r\n<p>Product details will be goes here. Product details will be goes here. Product details will be goes here. Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.Product details will be goes here.</p>', 435.220, 'upload/3ee1e8bc0a.png', 0),
(8, 'Lorem Ipsum is simply', 1, 2, '<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>', 340.220, 'upload/c1b36e5fce.jpg', 1),
(9, 'Lorem Ipsum is simply', 3, 1, '<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>', 233.600, 'upload/5a9093067a.jpg', 1),
(10, 'This Lorem Ipsum is simply', 3, 2, '<p>This Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here. Product details goes here.</p>', 350.440, 'upload/2d76ae42e8.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(1, 2, 10, 'This Lorem Ipsum is simply', 350, 'upload/2d76ae42e8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
