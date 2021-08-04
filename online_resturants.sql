-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 08:44 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_resturants`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`, `admin_email`) VALUES
(1, 'admin', 'admin', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL,
  `meal_name` varchar(100) NOT NULL,
  `meal_description` varchar(100) NOT NULL,
  `meal_price` varchar(100) NOT NULL,
  `meal_image` varchar(100) NOT NULL,
  `resturants_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `meal_name`, `meal_description`, `meal_price`, `meal_image`, `resturants_id`) VALUES
(6, 'Cheese Lovers pizza', 'delicious pizza with extra cheese', '110', './uploads/15954755961626480499.png', 31),
(8, 'mango cake', 'mango delicious cake', '200', './uploads/9408249901626480702.jpg', 32);

-- --------------------------------------------------------

--
-- Table structure for table `order_meal_details`
--

CREATE TABLE `order_meal_details` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_meal_details`
--

INSERT INTO `order_meal_details` (`id`, `quantity`, `order_id`, `meal_id`) VALUES
(9, 5, 6, 6),
(10, 4, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `resturants`
--

CREATE TABLE `resturants` (
  `resturants_id` int(11) NOT NULL,
  `resturants_name` varchar(100) NOT NULL,
  `resturants_address` varchar(200) NOT NULL,
  `resturants_url` varchar(100) NOT NULL,
  `resturants_phone` int(11) NOT NULL,
  `resturants_image` varchar(100) NOT NULL,
  `category__id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resturants`
--

INSERT INTO `resturants` (`resturants_id`, `resturants_name`, `resturants_address`, `resturants_url`, `resturants_phone`, `resturants_image`, `category__id`) VALUES
(31, 'pizaa hut', 'cairo egypt', 'https://www.muwasik.co', 2147483646, './uploads/17715232111626480254.png', 20),
(32, 'etoile', 'cairo egypt', 'https://www.leqybonobahurij.in', 2147483647, './uploads/7417261651626480327.jpg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `resturants_category`
--

CREATE TABLE `resturants_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resturants_category`
--

INSERT INTO `resturants_category` (`category_id`, `category_name`) VALUES
(15, 'xxxx'),
(20, 'pizza'),
(21, 'desserts');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `address_id`) VALUES
(2, 'yasmin', 'yassmen993@gmail.com', '123456789', 24),
(6, 'Zelenia Mckay', 'qinuwaj@mailinator.com', 'Pa$$w0rd!', 34),
(14, 'Keith Marks', 'dodomu@mailinator.com', 'Pa$$w0rd!', 47);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `governorate` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `building_no` int(11) NOT NULL,
  `flat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `country`, `governorate`, `street`, `building_no`, `flat_no`) VALUES
(24, 'Egypt', 'cairo', 'zayton', 280, 33),
(34, 'Ali Velez', 'Giselle Hartman', 'Yolanda Oconnor', 87, 454),
(47, 'Kevin Reese', 'Cyrus Ewing', 'Yoshio Williamson', 58, 55);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `order_title` varchar(100) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `order_title`, `order_quantity`, `order_price`, `order_status`, `user_id`) VALUES
(6, '2429810891', 9, 2300, 'ordered', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `resturants_id` (`resturants_id`);

--
-- Indexes for table `order_meal_details`
--
ALTER TABLE `order_meal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_2` (`order_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `resturants`
--
ALTER TABLE `resturants`
  ADD PRIMARY KEY (`resturants_id`),
  ADD UNIQUE KEY `resturants_url` (`resturants_url`),
  ADD KEY `category__id` (`category__id`);

--
-- Indexes for table `resturants_category`
--
ALTER TABLE `resturants_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_meal_details`
--
ALTER TABLE `order_meal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resturants`
--
ALTER TABLE `resturants`
  MODIFY `resturants_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `resturants_category`
--
ALTER TABLE `resturants_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `resturants_meal_relation` FOREIGN KEY (`resturants_id`) REFERENCES `resturants` (`resturants_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_meal_details`
--
ALTER TABLE `order_meal_details`
  ADD CONSTRAINT `mealDetailsRelation` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`meal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orderDetailsRelation` FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resturants`
--
ALTER TABLE `resturants`
  ADD CONSTRAINT `categoryRelation` FOREIGN KEY (`category__id`) REFERENCES `resturants_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `userADDRESS` FOREIGN KEY (`address_id`) REFERENCES `user_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_order_relation` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
