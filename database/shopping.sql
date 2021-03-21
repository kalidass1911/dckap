-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2021 at 06:00 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_name`, `user_phone`, `user_email`, `user_address`, `total_amount`, `order_status`, `added_date`, `modified_date`) VALUES
(1, 'kalidas', '8144887824', 'kalidass1910@gmail.com', 'test address', '34000.00', 1, '2021-03-21 17:54:22', '2021-03-21 17:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`, `total_amount`, `added_date`, `modified_date`) VALUES
(1, 1, 15, 'SAMSUNG-Galaxy-F41-Fusion-Green-128-GB--6-GB-RAM', 2, '17000.00', '34000.00', '2021-03-21 17:54:22', '2021-03-21 17:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT '1' COMMENT '1-Active,0-Inactive',
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `product_name`, `short_description`, `description`, `quantity`, `price`, `product_status`, `added_date`, `modified_date`) VALUES
(4, 1, 'LG Velvet Dual Screen (Aurora Silver, 128 GB)  (6 GB RAM)', '1 Year Manufacturer Warranty for Device and 6 Months Manufacturer Warranty for In-box Accessories Including Batteries from the Date of Purchase', '<p>&nbsp;</p>\r\n\r\n<p>Bid goodbye to constantly switching between two apps by getting the LG Velvet Dual-screen Smartphone. The dual screens help you multitask like a pro as you can simultaneously view two apps at the same time. You can even choose to detach the second screen and use the main screen as a normal smartphone. The 17.3 cm (6.8) cinematic pOLED widescreen display and stereo speakers help take your audio-visual experience to the next level. To top it off, the 4,300 mAh battery holds enough power to keep you entertained for almost an entire day.</p>\r\n', 100, '49900.00', 1, '2021-03-21 00:29:43', '0000-00-00 00:00:00'),
(5, 1, 'SAMSUNG Galaxy F41 (Fusion Blue, 128 GB)  (6 GB RAM)', '1 Year Warranty Provided by the Manufacturer from Date of Purchase', '<p>The Samsung Galaxy F41 is a phone you can count on for almost everything! When you have to click a picture of your family, you can fit everyone into the frame with the help of its 8 MP ultra-wide camera. Oh, and if you want to capture the beauty of your surroundings, the 64 MP camera will do the work for you! Not to forget, it is sleek and lightweight, so you can carry it around effortlessly.</p>\r\n', 100, '16600.00', 0, '2021-03-21 00:29:32', '0000-00-00 00:00:00'),
(7, 2, 'LG 164 cm (65 inch) OLED Ultra HD (4K) Smart TV  (OLED65GXPTA)', ' 1 Year LG India Comprehensive Warranty and Additional 1 Year Warranty is Applicable on Panel/Module', '<p>Are you looking for a Smart TV that will make heads turn? If yes bring home this LG Signature OLED TV that features self-lit pixels. This TV features a display that will leave you enthralled with visuals that feature deepest blacks, richest colours, and vibrant and realistic picture quality. With features such as AI Processor 4K and AI Picture Pro, you can enjoy content that has as its quality tweaked to ensure you get clearer images with enhanced sharpness and reduced noise. This TV gives you the option to use voice commands without having to reach for the remote.</p>\r\n', 500, '375000.00', 1, '2021-03-21 00:29:09', '0000-00-00 00:00:00'),
(10, 4, 'Men Regular Fit Solid Button Down Collar Casual Shirt', 'Cotton Blend', '<p>Men Regular Fit Solid Button Down Collar Casual Shirt</p>\r\n', 1500, '700.00', 0, '2021-03-21 00:33:34', '0000-00-00 00:00:00'),
(12, 1, 'SAMSUNG Galaxy F41 (Fusion Green, 128 GB)  (6 GB RAM)', '1 Year Warranty Provided by the Manufacturer from Date of Purchase', '<p>&nbsp;</p>\r\n\r\n<p>The Samsung Galaxy F41 is a phone you can count on for almost everything! When you have to click a picture of your family, you can fit everyone into the frame with the help of its 8 MP ultra-wide camera. Oh, and if you want to capture the beauty of your surroundings, the 64 MP camera will do the work for you! Not to forget, it is sleek and lightweight, so you can carry it around effortlessly.</p>\r\n', 100, '1000.00', 0, '2021-03-21 17:39:14', '0000-00-00 00:00:00'),
(13, 1, 'SAMSUNG Galaxy F41 (Fusion Green, 128 GB)  (6 GB RAM)', ' 1 Year Warranty Provided by the Manufacturer from Date of Purchase', '<p>The Samsung Galaxy F41 is a phone you can count on for almost everything! When you have to click a picture of your family, you can fit everyone into the frame with the help of its 8 MP ultra-wide camera. Oh, and if you want to capture the beauty of your surroundings, the 64 MP camera will do the work for you! Not to forget, it is sleek and lightweight, so you can carry it around effortlessly.</p>\r\n', 10, '1000.00', 0, '2021-03-21 17:46:18', '0000-00-00 00:00:00'),
(14, 1, 'SAMSUNG Galaxy F41 (Fusion Green, 128 GB)  (6 GB RAM)', '1 Year Warranty Provided by the Manufacturer from Date of Purchase', '<p>The Samsung Galaxy F41 is a phone you can count on for almost everything! When you have to click a picture of your family, you can fit everyone into the frame with the help of its 8 MP ultra-wide camera. Oh, and if you want to capture the beauty of your surroundings, the 64 MP camera will do the work for you! Not to forget, it is sleek and lightweight, so you can carry it around effortlessly.</p>\r\n', 10, '15000.00', 0, '2021-03-21 17:48:31', '0000-00-00 00:00:00'),
(15, 1, 'SAMSUNG Galaxy F41 (Fusion Green, 128 GB)  (6 GB RAM)', ' Year Warranty Provided by the Manufacturer from Date of Purchase', '<p>The Samsung Galaxy F41 is a phone you can count on for almost everything! When you have to click a picture of your family, you can fit everyone into the frame with the help of its 8 MP ultra-wide camera. Oh, and if you want to capture the beauty of your surroundings, the 64 MP camera will do the work for you! Not to forget, it is sleek and lightweight, so you can carry it around effortlessly.</p>\r\n', 10, '17000.00', 1, '2021-03-21 17:53:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`, `parent_id`, `status`, `added_date`, `modified_date`) VALUES
(1, 'Mobile', 0, 1, '2021-03-20 22:06:07', '2021-03-20 22:06:07'),
(2, 'TV', 0, 1, '2021-03-20 22:06:07', '2021-03-20 22:06:07'),
(3, 'Books', 0, 1, '2021-03-20 22:07:15', '2021-03-20 22:07:15'),
(4, 'Shirts', 0, 1, '2021-03-20 22:07:15', '2021-03-20 22:07:15'),
(5, 'Test11', 0, 0, '2021-03-21 00:09:50', '2021-03-21 00:09:50'),
(6, 'Watch', 0, 1, '2021-03-21 17:35:03', '2021-03-21 17:35:03'),
(7, 'Paste', 0, 1, '2021-03-21 17:51:51', '2021-03-21 17:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `image_status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `file_name`, `file_url`, `image_status`, `created_date`, `modified_date`) VALUES
(3, 3, 'product_1616264940.png', 'http://localhost/shopping/uploads/images/product_1616264940.png', 1, '2021-03-20 23:59:00', '2021-03-20 23:59:00'),
(4, 3, 'product_16162649401.png', 'http://localhost/shopping/uploads/images/product_16162649401.png', 0, '2021-03-20 23:59:00', '2021-03-20 23:59:00'),
(5, 4, 'product_1616266396.jpeg', 'http://localhost/shopping/uploads/images/product_1616266396.jpeg', 1, '2021-03-21 00:23:16', '2021-03-21 00:23:16'),
(6, 4, 'product_16162663961.jpeg', 'http://localhost/shopping/uploads/images/product_16162663961.jpeg', 1, '2021-03-21 00:23:16', '2021-03-21 00:23:16'),
(7, 4, 'product_16162663962.jpeg', 'http://localhost/shopping/uploads/images/product_16162663962.jpeg', 1, '2021-03-21 00:23:16', '2021-03-21 00:23:16'),
(12, 5, 'product_16162665821.jpeg', 'http://localhost/shopping/uploads/images/product_16162665821.jpeg', 1, '2021-03-21 00:26:22', '2021-03-21 00:26:22'),
(13, 6, 'product_16162665822.jpeg', 'http://localhost/shopping/uploads/images/product_16162665822.jpeg', 0, '2021-03-21 00:26:22', '2021-03-21 00:26:22'),
(14, 6, 'product_16162665823.jpeg', 'http://localhost/shopping/uploads/images/product_16162665823.jpeg', 0, '2021-03-21 00:26:22', '2021-03-21 00:26:22'),
(15, 6, 'product_16162665824.jpeg', 'http://localhost/shopping/uploads/images/product_16162665824.jpeg', 0, '2021-03-21 00:26:22', '2021-03-21 00:26:22'),
(16, 6, 'product_16162665825.jpeg', 'http://localhost/shopping/uploads/images/product_16162665825.jpeg', 0, '2021-03-21 00:26:22', '2021-03-21 00:26:22'),
(17, 7, 'product_1616266749.jpeg', 'http://localhost/shopping/uploads/images/product_1616266749.jpeg', 1, '2021-03-21 00:29:09', '2021-03-21 00:29:09'),
(18, 7, 'product_16162667491.jpeg', 'http://localhost/shopping/uploads/images/product_16162667491.jpeg', 0, '2021-03-21 00:29:09', '2021-03-21 00:29:09'),
(19, 7, 'product_16162667492.jpeg', 'http://localhost/shopping/uploads/images/product_16162667492.jpeg', 0, '2021-03-21 00:29:09', '2021-03-21 00:29:09'),
(20, 7, 'product_16162667493.jpeg', 'http://localhost/shopping/uploads/images/product_16162667493.jpeg', 0, '2021-03-21 00:29:10', '2021-03-21 00:29:10'),
(21, 7, 'product_1616266750.jpeg', 'http://localhost/shopping/uploads/images/product_1616266750.jpeg', 0, '2021-03-21 00:29:10', '2021-03-21 00:29:10'),
(22, 8, 'product_16162667501.jpeg', 'http://localhost/shopping/uploads/images/product_16162667501.jpeg', 1, '2021-03-21 00:29:10', '2021-03-21 00:29:10'),
(23, 8, 'product_16162667502.jpeg', 'http://localhost/shopping/uploads/images/product_16162667502.jpeg', 1, '2021-03-21 00:29:10', '2021-03-21 00:29:10'),
(24, 8, 'product_16162667503.jpeg', 'http://localhost/shopping/uploads/images/product_16162667503.jpeg', 1, '2021-03-21 00:29:10', '2021-03-21 00:29:10'),
(25, 8, 'product_16162667504.jpeg', 'http://localhost/shopping/uploads/images/product_16162667504.jpeg', 1, '2021-03-21 00:29:10', '2021-03-21 00:29:10'),
(26, 8, 'product_16162667505.jpeg', 'http://localhost/shopping/uploads/images/product_16162667505.jpeg', 1, '2021-03-21 00:29:10', '2021-03-21 00:29:10'),
(27, 9, 'product_1616266892.jpeg', 'http://localhost/shopping/uploads/images/product_1616266892.jpeg', 1, '2021-03-21 00:31:32', '2021-03-21 00:31:32'),
(28, 9, 'product_16162668921.jpeg', 'http://localhost/shopping/uploads/images/product_16162668921.jpeg', 1, '2021-03-21 00:31:32', '2021-03-21 00:31:32'),
(29, 9, 'product_16162668922.jpeg', 'http://localhost/shopping/uploads/images/product_16162668922.jpeg', 1, '2021-03-21 00:31:32', '2021-03-21 00:31:32'),
(30, 10, 'product_1616267014.jpeg', 'http://localhost/shopping/uploads/images/product_1616267014.jpeg', 0, '2021-03-21 00:33:34', '2021-03-21 00:33:34'),
(31, 10, 'product_1616267015.jpeg', 'http://localhost/shopping/uploads/images/product_1616267015.jpeg', 0, '2021-03-21 00:33:35', '2021-03-21 00:33:35'),
(32, 11, 'product_16162670151.jpeg', 'http://localhost/shopping/uploads/images/product_16162670151.jpeg', 1, '2021-03-21 00:33:35', '2021-03-21 00:33:35'),
(33, 11, 'product_16162670152.jpeg', 'http://localhost/shopping/uploads/images/product_16162670152.jpeg', 1, '2021-03-21 00:33:35', '2021-03-21 00:33:35'),
(35, 12, 'product_16163285401.jpeg', 'http://localhost/shopping/uploads/images/product_16163285401.jpeg', 0, '2021-03-21 17:39:00', '2021-03-21 17:39:00'),
(36, 12, 'product_16163285402.jpeg', 'http://localhost/shopping/uploads/images/product_16163285402.jpeg', 0, '2021-03-21 17:39:00', '2021-03-21 17:39:00'),
(37, 12, 'product_16163285403.jpeg', 'http://localhost/shopping/uploads/images/product_16163285403.jpeg', 0, '2021-03-21 17:39:00', '2021-03-21 17:39:00'),
(38, 14, 'product_1616329112.jpeg', 'http://localhost/shopping/uploads/images/product_1616329112.jpeg', 0, '2021-03-21 17:48:32', '2021-03-21 17:48:32'),
(39, 14, 'product_16163291121.jpeg', 'http://localhost/shopping/uploads/images/product_16163291121.jpeg', 0, '2021-03-21 17:48:32', '2021-03-21 17:48:32'),
(40, 14, 'product_16163291122.jpeg', 'http://localhost/shopping/uploads/images/product_16163291122.jpeg', 0, '2021-03-21 17:48:32', '2021-03-21 17:48:32'),
(42, 15, 'product_16163293651.jpeg', 'http://localhost/shopping/uploads/images/product_16163293651.jpeg', 1, '2021-03-21 17:52:45', '2021-03-21 17:52:45'),
(43, 15, 'product_16163293652.jpeg', 'http://localhost/shopping/uploads/images/product_16163293652.jpeg', 1, '2021-03-21 17:52:45', '2021-03-21 17:52:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
