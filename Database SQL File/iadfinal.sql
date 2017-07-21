-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 12:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iadfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` tinyint(4) NOT NULL,
  `email` varchar(19) NOT NULL,
  `login_id` varchar(13) NOT NULL,
  `password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(5, 'HP'),
(6, 'Dell'),
(7, 'Samsung'),
(8, 'Motorola'),
(9, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_name` varchar(19) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_name`, `item_id`, `qty`, `date`) VALUES
(12, '::1', 8, 6, '07/06/2017 01:05:22 pm'),
(13, '::1', 5, 25, '07/06/2017 01:05:47 pm'),
(14, '::1', 5, 10, '07/06/2017 03:09:41 pm'),
(15, '::1', 4, 3, '07/06/2017 04:32:26 pm'),
(16, '::1', 5, 7, '07/06/2017 10:07:20 pm');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(7, 'Tablet'),
(8, 'Smart Phone'),
(9, 'Camera'),
(10, 'Laptop'),
(11, 'Desktop');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(19) NOT NULL,
  `phone` tinyint(4) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(19) NOT NULL,
  `address` text NOT NULL,
  `mobile` tinyint(4) NOT NULL,
  `email` varchar(19) NOT NULL,
  `login_id` varchar(13) NOT NULL,
  `password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `title` varchar(19) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `tag` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `cat_id`, `brand_id`, `title`, `description`, `price`, `image`, `tag`, `qty`) VALUES
(4, 10, 6, 'Dell Laptop E-600', 'Core 2 duo 2.5ghz.\r\n350GB, 4GB', 17, 'dell-laptop.jpg', 'dell laptop e600 e-600 c2d', 39),
(5, 7, 9, 'Apple Ipad', 'Brand new apple-ipad.\r\nWarranty - 1year.', 250, 'featured-content-ipad-icon_2x.png', 'ipad', 93),
(6, 10, 5, 'HP Notebook', 'Hp mini notebook.', 350, 'HPNotebook15.jpg', 'notebook mini hp', 37),
(7, 9, 7, 'DSLR', 'New DSLR at affordable price.', 500, 'Samsung-.jpg', 'DSLR', 17),
(8, 8, 7, 'Samsung Galaxy J3', 'Used smart phone.', 150, 'samsung-galaxy-j3-pro-pakistan-priceoye.jpg', 'samsung galaxy j3 used smartphone', 72);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `item_name` text NOT NULL,
  `qty` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `item_name`, `qty`, `sale_price`) VALUES
(7, '07/06/2017 01:04:56 pm', 'DSLR', 2, 1000),
(8, '07/06/2017 01:03:51 pm', 'Apple Ipad', 15, 3750),
(9, '07/06/2017 01:03:06 pm', 'Dell Laptop E-600', 4, 600),
(10, '07/06/2017 01:04:38 pm', 'HP Notebook', 6, 2100),
(11, '07/06/2017 01:05:07 pm', 'DSLR', 2, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
