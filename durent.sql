-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 12:16 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `durent`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `email`, `password`, `type`) VALUES
(1, 'narongchaioioi@gmail.com', '$2y$10$d2.nDHlzRP9JPXvR1NTeb.amatYUDNqx6MUcgdV2TF4pPZjbCYFbe', 'customer'),
(2, 'staff@staff.com', '$2y$10$d2.nDHlzRP9JPXvR1NTeb.amatYUDNqx6MUcgdV2TF4pPZjbCYFbe', 'staff'),
(3, 'admin@admin.com', '$2y$10$d2.nDHlzRP9JPXvR1NTeb.amatYUDNqx6MUcgdV2TF4pPZjbCYFbe', 'admin'),
(4, 'benz@benz.com', '$2y$10$OKbmOtOjuDBDYozwA7BGC.9EK.nJA2qtQek94DOjW4ecMobrY0cPe', 'customer'),
(9, 'benz@staff.com', '$2y$10$d2.nDHlzRP9JPXvR1NTeb.amatYUDNqx6MUcgdV2TF4pPZjbCYFbe', 'staff'),
(10, 'x@staff.com', '$2y$10$d2.nDHlzRP9JPXvR1NTeb.amatYUDNqx6MUcgdV2TF4pPZjbCYFbe', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `houseNo` varchar(255) NOT NULL,
  `subStreet` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subDistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `name`, `houseNo`, `subStreet`, `street`, `subDistrict`, `district`, `province`, `zipcode`, `customerID`) VALUES
(2, 'My Home', '123/4567', 'my substreet', 'my street', 'my subdistrict', 'my district', 'my province', 12345, 4),
(3, 'My Condo', '123456', '', 'my street', '', 'my district', 'my province', 123123, 4),
(4, 'My Address', '123/456', '', 'my street', '', 'my district', 'my province', 123456, 5);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `accountID`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `name`) VALUES
(1, 'Film and Photography'),
(2, 'Audio Visual Equipment'),
(3, 'Projectors and Screens'),
(4, 'Drones'),
(5, 'DJ Equipment'),
(6, 'Transport'),
(7, 'Storage'),
(8, 'Electronics'),
(9, 'Party and Events'),
(10, 'Sports'),
(11, 'Musical Instruments'),
(12, 'Home / Office / Garden'),
(13, 'Kids and Baby'),
(14, 'Holiday and Travel'),
(15, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `interest` longtext NOT NULL,
  `payment` varchar(255) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `fname`, `lname`, `tel`, `interest`, `payment`, `paymentType`, `accountID`) VALUES
(4, 'Narongchai', 'Jaroonpipatkul', '0631913467', 'every thing !!!!', '1234-5678-8765-4321', 'visa', 1),
(5, 'Benz', 'Benz', '123456789', 'rent', '1234-5678-8765-4321', 'mastercard', 4);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subCategory` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `title`, `category`, `subCategory`, `description`, `status`, `dateFrom`, `dateTo`, `price`, `customerID`) VALUES
(1, 'My new apple watch , buy 1 month , never use', '8', '14', 'à¸‚à¸­à¹à¸™à¸°à¸™à¸³ Apple Watch Series 4 à¸­à¸­à¸à¹à¸šà¸šà¸—à¸²à¸‡à¸£à¸²à¸à¸à¸²à¸™\r\nà¹ƒà¸«à¸¡à¹ˆà¸«à¸¡à¸”à¸—à¸±à¹‰à¸‡à¹ƒà¸™à¸”à¹‰à¸²à¸™à¸”à¸µà¹„à¸‹à¸™à¹Œà¹à¸¥à¸°à¸§à¸´à¸¨à¸§à¸à¸£à¸£à¸¡ à¹€à¸žà¸·à¹ˆà¸­à¸Šà¹ˆà¸§à¸¢à¹ƒà¸«à¹‰à¸„à¸¸à¸“à¹à¸­à¹‡à¸„à¸—à¸µà¸Ÿ\r\nà¸¡à¸µà¸ªà¸¸à¸‚à¸ à¸²à¸žà¸”à¸µ à¹à¸¥à¸°à¸•à¹ˆà¸­à¸•à¸´à¸”à¸—à¸¸à¸à¹€à¸£à¸·à¹ˆà¸­à¸‡à¹„à¸”à¹‰à¸”à¸µà¸¢à¸´à¹ˆà¸‡à¸‚à¸¶à¹‰à¸™', 'checking', '2018-11-30', '2018-12-31', '49', 4),
(2, 'My Chopper !! very cute !!!!!!!!!!!!!!!!!!!!!!!', '1', '5', 'Chopper !!!!', 'checking', '2018-12-20', '2019-01-16', '50', 4),
(13, '2018 Summer Dark Brown Linen Men Suit / 1 time user', '15', '54', 'my suit ! ', 'availiable', '2019-01-07', '2019-03-20', '45', 4),
(14, 'MICROLAB SOLO 9C / buy 6 months / similar new items / good quantity', '2', '6', 'MICROLAB SOLO 9C \r\nI buy only 6 months .\r\nsimilar new items !! very good quantity', 'availiable', '2018-12-29', '2019-02-21', '32', 4),
(15, 'Viewsonic XG2560 / buy 9 months / good quality / for gaming', '3', '', 'ViewSonic XG2560 25 Inch 1080p 240Hz  \r\nI buy only 9 months.\r\n', 'rented', '2018-11-30', '2019-01-11', '65', 4),
(16, 'DJI Mavic Pro / Pocket camera drone / 100% high quality', '4', '', 'Gimbal-Stabilized 12MP / 4K Camera \r\nOcuSync Transmission Technology\r\nUp to 4.3 Mile Control Range \r\nUp to 27 Minutes Flight Time ', 'deliver', '2018-12-06', '2019-01-31', '120', 5),
(17, 'louis vuitton / GRACEFUL MM N44045 / 99% new item', '1', '1', 'The spacious Graceful hobo has a lightweight, body-friendly design that makes it perfect for every day. The flat handle sits easily on the shoulder, while emblematic details\r\n', 'renting', '2018-11-21', '2018-12-05', '45', 5);

-- --------------------------------------------------------

--
-- Table structure for table `itemimage`
--

CREATE TABLE `itemimage` (
  `itemImageID` int(11) NOT NULL,
  `imageSrc` varchar(255) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itemimage`
--

INSERT INTO `itemimage` (`itemImageID`, `imageSrc`, `itemID`) VALUES
(1, './assets/non-static/productImages/1/(1)Webp.net-resizeimage.jpg', 1),
(2, './assets/non-static/productImages/1/(2)tony_tony_chopper_by_nadia009-d7h5wpp.png', 1),
(3, './assets/non-static/productImages/1/(3)81GTod5TLQL._SL1500_.jpg', 1),
(4, './assets/non-static/productImages/1/(4)61eErhHCb6L._SL1500_.jpg', 1),
(5, './assets/non-static/productImages/1/(5)onepiece.jpg', 1),
(7, './assets/non-static/productImages/2/(1)tony_tony_chopper_by_nadia009-d7h5wpp.png', 2),
(8, './assets/non-static/productImages/2/(2)81GTod5TLQL._SL1500_.jpg', 2),
(9, './assets/non-static/productImages/2/(3)93ca4f2ac2a8b81300cbe9b7c168e68c.gif', 2),
(10, './assets/non-static/productImages/2/(4)1aaF.gif', 2),
(11, './assets/non-static/productImages/2/(5)item_0000001826_11.jpg', 2),
(12, './assets/non-static/productImages/2/(6)hqdefault.jpg', 2),
(58, './assets/non-static/productImages/12/(1)39795.jpg', 12),
(59, './assets/non-static/productImages/12/(2)1aaF.gif', 12),
(60, './assets/non-static/productImages/12/(3)details.png', 12),
(61, './assets/non-static/productImages/12/(4)da2.png', 12),
(62, './assets/non-static/productImages/12/(5)hqdefault.jpg', 12),
(63, './assets/non-static/productImages/13/(1)piece-suits-men-street-styles-flapped-pockets.jpg', 13),
(64, './assets/non-static/productImages/13/(2)11518170075733-Peter-England-Men-Suits-3381518170075531-1.jpg', 13),
(65, './assets/non-static/productImages/13/(3)preMode-fÃ¼r-mich.-Interessiert-an-weiteren-Tipps-zur-Mode-Geh-zum-Kulturtrip.jpg', 13),
(66, './assets/non-static/productImages/13/(4)s-l300.jpg', 13),
(67, './assets/non-static/productImages/13/(5)images.jpg', 13),
(68, './assets/non-static/productImages/14/(1)5.jpg', 14),
(69, './assets/non-static/productImages/14/(2)$_86 (1).JPG', 14),
(70, './assets/non-static/productImages/14/(3)$_86.JPG', 14),
(71, './assets/non-static/productImages/14/(4)15.jpg', 14),
(72, './assets/non-static/productImages/14/(5)16.jpg', 14),
(73, './assets/non-static/productImages/14/(6)microlab-solo-9c-2-10858521.jpg', 14),
(74, './assets/non-static/productImages/15/(1)DSC00055.0.jpg', 15),
(75, './assets/non-static/productImages/15/(2)download.jpg', 15),
(76, './assets/non-static/productImages/15/(3)DZOGyLQX0AANHsp.jpg', 15),
(77, './assets/non-static/productImages/15/(4)maxresdefault.jpg', 15),
(78, './assets/non-static/productImages/15/(5)61Uhv6c2m5L._SL1000_.jpg', 15),
(79, './assets/non-static/productImages/16/(1)21399-24417-DSC06877-xl.jpg', 16),
(80, './assets/non-static/productImages/16/(2)dji-mavic-pro-img7.jpg', 16),
(81, './assets/non-static/productImages/16/(3)9eb33e20-d8a6-11e7-91af-f34de211f924_1280x720_113846.jpg', 16),
(82, './assets/non-static/productImages/16/(4)item_XL_11959356_17858701.jpg', 16),
(83, './assets/non-static/productImages/16/(5)u_10172003.jpg', 16),
(84, './assets/non-static/productImages/17/(1)4b611125599735fbde776d9d55b54850.jpg', 17),
(85, './assets/non-static/productImages/17/(2)IMG_2280.JPG', 17),
(86, './assets/non-static/productImages/17/(3)louis-vuitton-graceful-mm-damier-ebene-handbags--N44045_PM2_Front view.jpg', 17),
(87, './assets/non-static/productImages/17/(4)louis-vuitton-graceful-mm-damier-ebene-canvas-handbags--N44045_PM1_Interior view.jpg', 17),
(88, './assets/non-static/productImages/17/(5)IMG_1177.JPG', 17);

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rentalID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `customerID` int(11) NOT NULL,
  `addressID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rentalID`, `itemID`, `dateFrom`, `dateTo`, `customerID`, `addressID`, `staffID`) VALUES
(2, 16, '2018-12-13', '2019-01-08', 4, 2, 1),
(3, 17, '2018-11-24', '2018-11-30', 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rental_item`
--

CREATE TABLE `rental_item` (
  `rentalItemNo` int(11) NOT NULL,
  `rentalNo` int(11) NOT NULL,
  `itemNo` int(11) NOT NULL,
  `staffNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `name`) VALUES
(1, 'operator'),
(2, 'specialist'),
(3, 'deliver');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `roleID`, `fname`, `lname`, `tel`, `DOB`, `gender`, `salary`, `status`, `accountID`) VALUES
(1, 1, 'Narongchai', 'Jaroonpipatkul', '0631913467', '1997-10-02', 'male', 100000000, 'working', 2),
(2, 2, 'Benz', 'Benz', '0123456789', '2016-04-06', 'male', 100000000, 'holiday', 9),
(3, 3, 'X', 'X', '123456789', '2007-07-18', 'male', 10000000, 'working', 10);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subCategoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subCategoryID`, `name`, `categoryID`) VALUES
(1, 'Cameras', 1),
(2, 'Lenses', 1),
(3, 'Accessories', 1),
(4, 'Photography Studios', 1),
(5, 'Other Film and Photography', 1),
(6, 'Speakers', 2),
(7, 'Microphones', 2),
(8, 'Recording Equipment', 2),
(9, 'Recording Studios', 2),
(10, 'Other Audio Visual', 2),
(11, 'Computer', 8),
(12, 'Entertainment', 8),
(13, 'Virtual Reality', 8),
(14, 'Other Electronics', 8),
(15, 'Special Effects', 9),
(16, 'Entertainment', 9),
(17, 'Catering Equipment', 9),
(18, 'Decoration', 9),
(19, 'Tents and Marquees', 9),
(20, 'Other Party', 9),
(21, 'Racket Sports', 10),
(22, 'Gym Equipment', 10),
(23, 'Water Sports', 10),
(24, 'Winter Sports', 10),
(25, 'Outdoor Sports', 10),
(26, 'Other Sports', 10),
(27, 'Temperature Ventilation Appliances', 12),
(28, 'Furniture', 12),
(29, 'House Appliances', 12),
(30, 'Garden', 12),
(31, 'DIY', 12),
(32, 'Other Home / Office / Garden', 12),
(51, 'Wedding Attire', 15),
(52, 'Fancy Dress', 15),
(53, 'Womens Formal Wear', 15),
(54, 'Mens Formal Wear', 15),
(55, 'Womens Casual', 15),
(56, 'Mens Casual', 15),
(57, 'Clothing Package Deals', 15),
(58, 'Footwear', 15),
(59, 'Streetwear', 15),
(60, 'Clothing Accessories', 15),
(61, 'Other Clothing', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `itemimage`
--
ALTER TABLE `itemimage`
  ADD PRIMARY KEY (`itemImageID`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rentalID`);

--
-- Indexes for table `rental_item`
--
ALTER TABLE `rental_item`
  ADD PRIMARY KEY (`rentalItemNo`),
  ADD KEY `rentalNo` (`rentalNo`,`itemNo`),
  ADD KEY `itemNo` (`itemNo`),
  ADD KEY `speciallistNo` (`staffNo`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subCategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `itemimage`
--
ALTER TABLE `itemimage`
  MODIFY `itemImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rentalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rental_item`
--
ALTER TABLE `rental_item`
  MODIFY `rentalItemNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
