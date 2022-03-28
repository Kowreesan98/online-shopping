-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2021 at 07:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2021-06-09 16:21:18', '22-07-2021 07:28:32 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(14, 'Fruits & Vegetables', 'Fresh fruits and vegetables', '2021-07-05 15:33:02', NULL),
(15, 'Groceries', 'Food grains & cooking ingredients', '2021-07-05 15:35:41', NULL),
(16, 'Bakery', 'Bread, Bun, cake items', '2021-07-05 15:36:19', NULL),
(17, 'Dairy Products', 'Fresh dairy foods items', '2021-07-05 15:36:42', NULL),
(18, 'Personal care', 'self care products to lead healthy life', '2021-07-05 15:37:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE `deliveryboy` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`id`, `user_id`, `vehicle`) VALUES
(1, 0, 'van'),
(2, 0, 'motorbike'),
(3, 0, 'van'),
(4, 0, 'van'),
(5, 0, 'van'),
(6, 0, 'van'),
(7, 0, 'car'),
(8, 0, 'car'),
(9, 0, 'motorbike'),
(10, 0, 'van'),
(11, 0, 'car'),
(12, 0, 'car'),
(13, 0, 'car'),
(14, 0, 'car'),
(15, 0, 'car'),
(16, 0, 'car'),
(17, 25, 'vehicle'),
(18, 26, 'car');

-- --------------------------------------------------------

--
-- Table structure for table `leaverequest`
--

CREATE TABLE `leaverequest` (
  `id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `LeaveCause` varchar(250) NOT NULL,
  `LeaveType` varchar(50) NOT NULL,
  `NoOfDays` int(11) NOT NULL,
  `StartDate` varchar(50) NOT NULL,
  `EndDate` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `Id` int(11) NOT NULL,
  `LeaveType` varchar(255) DEFAULT NULL,
  `PostingDate` varchar(255) DEFAULT NULL,
  `StartingDate` varchar(255) DEFAULT NULL,
  `EndDate` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `deliveryboy_id` int(11) DEFAULT NULL,
  `AdminRemark` varchar(255) DEFAULT NULL,
  `AdminRemarkDate` varchar(255) DEFAULT NULL,
  `Cause` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`Id`, `LeaveType`, `PostingDate`, `StartingDate`, `EndDate`, `Status`, `deliveryboy_id`, `AdminRemark`, `AdminRemarkDate`, `Cause`) VALUES
(1, 'Sick', '29/12/2001', '30/12/2001', '02/01/2002', 'rejected', 17, 'jhbjvhjv jvj', '2021-08-09 15:59:27 ', ''),
(2, 'casual', '12/11/2001', '12/11/2001', '15/11/2001', 'approved', 17, 'qdqd ', '2021-08-09 16:08:16 ', ''),
(3, 'vv', NULL, NULL, NULL, 'pending', 17, '', '', ''),
(4, 'half day', '2021-08-09 21:11:58 ', '2021-08-19', '2021-08-21', 'pending', 0, NULL, NULL, 'vjhjh bjbkjb k          '),
(5, 'full day', '2021-08-09 21:12:28 ', '2021-08-20', '2021-08-21', 'pending', 0, NULL, NULL, 'asgi    '),
(6, 'full day', '2021-08-09 21:19:52 ', '2021-08-20', '2021-08-21', 'pending', 0, NULL, NULL, 'asgi    '),
(7, 'full day', '2021-08-09 21:20:02 ', '2021-08-20', '2021-08-21', 'pending', 0, NULL, NULL, 'asgi    '),
(8, 'full day', '2021-08-09 21:45:48 ', '2021-08-20', '2021-08-21', 'pending', 0, NULL, NULL, 'jasdjabdka      '),
(9, 'half day', '2021-08-09 21:52:45 ', '2021-09-02', '2021-09-11', 'pending', 17, NULL, NULL, '                       vjhvjh j');

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(255) NOT NULL,
  `Description` mediumtext NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_from` int(11) NOT NULL,
  `message_to` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `message_from`, `message_to`, `date`) VALUES
(1, 'hello', 28, 5, '2021-08-25 18:30:00'),
(2, 'hello1', 28, 5, '2021-08-25 22:58:13'),
(3, 'h1 from admin', 5, 28, '2021-08-26 16:37:51'),
(4, '', 28, 5, '2021-08-26 17:11:04'),
(5, 'dfgdfgdfg', 28, 5, '2021-08-26 17:11:45'),
(8, 'hello from admin', 5, 28, '2021-08-26 17:50:25'),
(9, 'thius os now ', 5, 28, '2021-08-26 17:51:38'),
(10, 'dfgdfgdfg', 12, 5, '2021-08-26 17:53:15'),
(11, 'dfgdfgdfg', 12, 5, '2021-08-26 17:53:20'),
(12, 'xvxgvsxg', 5, 12, '2021-08-26 17:53:52'),
(13, 'user message', 28, 5, '2021-08-26 17:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(13, 8, '61', 1, '2021-07-05 16:11:59', NULL, 'Delivered'),
(14, 8, '61', 1, '2021-07-05 16:25:42', NULL, 'Delivered'),
(15, 10, '61', 1, '2021-07-12 11:02:44', 'COD', NULL),
(16, 10, '61', 1, '2021-07-12 11:02:44', 'COD', NULL),
(17, 10, '61', 1, '2021-07-12 11:08:23', 'COD', 'Assigned'),
(18, 10, '61', 1, '2021-07-12 12:07:56', 'COD', 'Assigned'),
(19, 10, '61', 1, '2021-07-12 12:15:05', 'COD', 'Assigned'),
(20, 10, '61', 1, '2021-07-12 13:55:24', 'COD', NULL),
(21, 10, '61', 1, '2021-07-12 13:58:25', 'COD', NULL),
(22, 10, '61', 1, '2021-07-15 15:19:36', 'COD', NULL),
(23, 10, '61', 1, '2021-07-21 17:30:29', 'COD', NULL),
(24, 10, '61', 1, '2021-07-22 14:05:30', 'COD', 'Rejected'),
(25, 10, '61', 1, '2021-07-22 14:30:44', 'COD', NULL),
(26, 10, '61', 1, '2021-07-23 13:35:00', 'COD', NULL),
(27, 11, '61', 1, '2021-07-23 13:42:13', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(9, 13, 'in Process', 'processing', '2021-07-05 17:27:17'),
(10, 13, 'in Process', 'processing', '2021-07-05 17:27:44'),
(11, 13, 'Delivered', 'delivered', '2021-07-14 06:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(1, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 09:15:36'),
(2, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 09:20:37'),
(3, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 09:23:44'),
(4, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 09:24:54'),
(5, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 09:26:10'),
(6, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 09:28:57'),
(7, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 09:29:45'),
(8, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 13:59:35'),
(9, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:00:40'),
(10, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:01:05'),
(11, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:04:29'),
(12, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:08:57'),
(13, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:12:11'),
(14, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:18:42'),
(15, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:20:48'),
(16, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:21:28'),
(17, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:22:16'),
(18, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:23:29'),
(19, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:23:52'),
(20, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:25:05'),
(21, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:25:27'),
(22, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:32:17'),
(23, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:34:59'),
(24, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:35:52'),
(25, 61, 3, 4, 4, 'siva', 'best', 'nice', '2021-07-14 14:36:30'),
(26, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 14:36:55'),
(27, 61, 4, 5, 4, 'siva', 'good', 'best product ', '2021-07-14 14:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productImage` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productImage`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(61, 14, 26, 'pumpkin-1kg', 'local store', 70, 80, 'pumpkin.jfif', 5, 'In Stock', '2021-07-05 16:07:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `del_id` int(11) NOT NULL,
  `res_date` date NOT NULL,
  `del_date` date NOT NULL,
  `madetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `order_id`, `del_id`, `res_date`, `del_date`, `madetime`, `status`) VALUES
(5, 3, 18, '2021-08-13', '2021-08-13', '2021-08-13 17:14:56', 0),
(6, 14, 18, '2021-08-13', '2021-08-13', '2021-08-13 17:18:28', 0),
(7, 14, 18, '2021-08-13', '2021-08-13', '2021-08-13 17:18:58', 0),
(8, 14, 17, '2021-08-13', '2021-08-13', '2021-08-13 17:19:24', 0),
(9, 24, 17, '2021-08-13', '2021-08-13', '2021-08-13 17:19:54', 0),
(10, 24, 18, '2021-08-13', '2021-08-13', '2021-08-13 17:20:31', 0),
(11, 14, 18, '2021-08-13', '2021-08-13', '2021-08-13 17:21:58', 0),
(12, 14, 18, '2021-08-13', '2021-08-13', '2021-08-13 17:22:18', 0),
(13, 18, 18, '2021-08-25', '2021-08-25', '2021-08-25 08:16:34', 0),
(14, 18, 18, '2021-08-25', '2021-08-25', '2021-08-25 08:33:43', 0),
(15, 17, 18, '2021-08-25', '2021-08-25', '2021-08-25 08:35:12', 0),
(16, 19, 18, '2021-08-25', '2021-08-25', '2021-08-25 08:38:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(26, 14, 'fresh vegetables', '2021-07-05 15:37:41', NULL),
(27, 14, 'fresh fruits', '2021-07-05 15:37:47', NULL),
(28, 15, 'cooking ingredients and oil', '2021-07-05 15:37:55', NULL),
(29, 15, 'Drinks', '2021-07-05 15:38:02', NULL),
(30, 15, 'Drinks', '2021-07-05 15:38:13', NULL),
(31, 16, 'Bread', '2021-07-05 15:38:19', NULL),
(32, 17, 'cheese', '2021-07-05 15:38:30', NULL),
(33, 17, 'Milk', '2021-07-05 15:38:51', NULL),
(34, 18, 'Hair care', '2021-07-05 15:39:05', NULL),
(35, 18, 'Skin care', '2021-07-05 15:39:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(26, '', 0x3a3a3100000000000000000000000000, '2021-06-10 07:07:45', NULL, 0),
(27, 'admin', 0x3a3a3100000000000000000000000000, '2021-06-12 17:06:30', NULL, 0),
(28, 'admin', 0x3a3a3100000000000000000000000000, '2021-06-12 17:07:41', NULL, 0),
(29, 'admin', 0x3a3a3100000000000000000000000000, '2021-06-12 17:08:00', NULL, 0),
(30, 'admin', 0x3a3a3100000000000000000000000000, '2021-06-12 17:09:03', NULL, 0),
(31, 'Jjjj', 0x3a3a3100000000000000000000000000, '2021-06-12 17:27:57', NULL, 0),
(32, 'siva1', 0x3a3a3100000000000000000000000000, '2021-07-08 10:45:31', NULL, 0),
(33, 'siva1', 0x3a3a3100000000000000000000000000, '2021-07-08 10:45:59', NULL, 0),
(34, 'krishna123', 0x3a3a3100000000000000000000000000, '2021-07-08 10:55:48', NULL, 0),
(35, 'krishna1', 0x3a3a3100000000000000000000000000, '2021-07-08 10:57:07', NULL, 0),
(36, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-08 10:57:22', NULL, 0),
(37, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-08 10:57:35', NULL, 0),
(38, 'krishna1', 0x3a3a3100000000000000000000000000, '2021-07-08 10:58:10', NULL, 0),
(39, 'krishna1', 0x3a3a3100000000000000000000000000, '2021-07-08 10:58:29', NULL, 0),
(40, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-08 11:02:29', NULL, 0),
(41, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-08 11:02:38', NULL, 0),
(42, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-08 11:09:19', NULL, 0),
(43, 'siva1', 0x3a3a3100000000000000000000000000, '2021-07-08 11:09:36', NULL, 0),
(44, 'siva1', 0x3a3a3100000000000000000000000000, '2021-07-08 11:11:06', '09-07-2021 11:08:48 PM', 0),
(45, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-09 17:29:15', NULL, 0),
(46, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-09 17:30:29', NULL, 0),
(47, 'krishna1', 0x3a3a3100000000000000000000000000, '2021-07-09 17:40:28', NULL, 0),
(48, 'krishna1', 0x3a3a3100000000000000000000000000, '2021-07-09 17:41:20', NULL, 0),
(49, '', 0x3a3a3100000000000000000000000000, '2021-07-09 17:41:26', NULL, 0),
(50, 'krishna1', 0x3a3a3100000000000000000000000000, '2021-07-09 17:44:31', NULL, 0),
(51, 'geetha', 0x3a3a3100000000000000000000000000, '2021-07-09 17:44:50', NULL, 0),
(52, 'siva1', 0x3a3a3100000000000000000000000000, '2021-07-09 18:18:18', NULL, 0),
(53, 'siva1', 0x3a3a3100000000000000000000000000, '2021-07-09 18:18:29', '09-07-2021 11:50:28 PM', 0),
(54, 'ratha', 0x3a3a3100000000000000000000000000, '2021-07-09 18:23:21', NULL, 0),
(55, 'sivsek', 0x3a3a3100000000000000000000000000, '2021-07-12 03:34:09', NULL, 0),
(56, 'hari', 0x3a3a3100000000000000000000000000, '2021-07-13 04:46:20', NULL, 0),
(57, 'hari', 0x3a3a3100000000000000000000000000, '2021-07-13 04:46:40', NULL, 0),
(58, 'sekar', 0x3a3a3100000000000000000000000000, '2021-07-13 04:48:53', NULL, 0),
(59, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-14 06:27:51', NULL, 0),
(60, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-14 06:28:04', NULL, 0),
(61, 'hari', 0x3a3a3100000000000000000000000000, '2021-07-14 06:36:36', NULL, 0),
(62, '', 0x3a3a3100000000000000000000000000, '2021-07-14 06:36:39', NULL, 0),
(63, 'shan1', 0x3a3a3100000000000000000000000000, '2021-07-15 13:37:57', NULL, 0),
(64, 'shan1', 0x3a3a3100000000000000000000000000, '2021-07-15 13:38:08', NULL, 0),
(65, 'sivasek', 0x3a3a3100000000000000000000000000, '2021-07-15 14:49:10', '15-07-2021 10:13:40 PM', 0),
(66, 'sivasek', 0x3a3a3100000000000000000000000000, '2021-07-15 17:06:26', NULL, 0),
(67, 'sivasek', 0x3a3a3100000000000000000000000000, '2021-07-15 17:06:39', '23-07-2021 07:08:44 PM', 0),
(68, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-21 17:23:29', NULL, 0),
(69, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-21 17:27:07', NULL, 0),
(70, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-22 13:57:51', NULL, 0),
(71, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-01 06:57:22', NULL, 0),
(72, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-01 06:57:36', NULL, 0),
(73, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-01 06:57:47', NULL, 0),
(74, 'dboy', 0x3a3a3100000000000000000000000000, '2021-08-02 11:47:05', NULL, 0),
(75, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-09 04:21:40', NULL, 0),
(76, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-09 04:21:51', NULL, 0),
(77, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-09 16:24:07', NULL, 0),
(78, 'adm', 0x3a3a3100000000000000000000000000, '2021-08-09 16:24:13', NULL, 0),
(79, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-10 18:16:29', NULL, 0),
(80, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-10 18:16:41', NULL, 0),
(81, 'dd', 0x3a3a3100000000000000000000000000, '2021-08-25 08:39:01', NULL, 0),
(82, 'dddd', 0x3a3a3100000000000000000000000000, '2021-08-25 08:39:07', NULL, 0),
(83, 'kk', 0x3a3a3100000000000000000000000000, '2021-08-25 08:39:15', NULL, 0),
(84, 'kk', 0x3a3a3100000000000000000000000000, '2021-08-25 08:39:22', NULL, 0),
(85, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-26 17:13:35', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` varchar(255) DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` varchar(256) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingPincode` varchar(256) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingCity`, `billingState`, `billingPincode`, `regDate`, `updationDate`, `username`, `role`) VALUES
(5, 'kowree parames', 'kowreesanjk06@gmail.com', 1234567890, '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '0', NULL, NULL, NULL, NULL, '2021-06-10 07:04:37', NULL, 'admin', 'admin'),
(6, 'kowree parames', 'kowreesanjk06@gmail.com', 1234567890, '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '0', NULL, NULL, NULL, NULL, '2021-06-10 07:06:42', NULL, 'kp', 'user'),
(7, 'vp', 'kowreesanjkv06@gmail.com', 1234567890, '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '0', NULL, NULL, NULL, NULL, '2021-06-10 07:30:47', NULL, 'vp', 'user'),
(8, 'krishna', 'krishna@gmail.com', 774807664, '243bd1ce0387f18005abfc43b001646a', '', '', '', '0', NULL, NULL, NULL, NULL, '2021-07-05 15:24:13', NULL, 'krishna1', 'user'),
(9, 'liro', 'geeth@gmail.com', 771235478, 'e3a61d85e02311c4b92de47041bbb6b2', '', '', '', '0', NULL, NULL, NULL, NULL, '2021-07-08 10:59:14', NULL, 'geetha', 'user'),
(10, 'siva', 'aaa@gmail.com', 775158739, '104827e490dbbdbd83866776079d2cd0', 'linganaker', 'linganaker', 'linganaker', '234', NULL, NULL, NULL, NULL, '2021-07-09 17:45:45', NULL, 'sivasek', 'user'),
(11, 'krishna krish', 'krish123@gmail.com', 771234565, 'b4e0a5e72e8a6a9348bc43a3e57cc21f', '23,main road', 'dehiwala', 'colombo', '123', NULL, NULL, NULL, NULL, '2021-07-23 13:40:56', NULL, 'krishna1234', 'user'),
(12, 'aksdk bkjbb', 'jbkb@jkn.ck', 5876898709, '0632c7f7afaaa4ad1c3c34f2b3229d2c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 07:39:34', NULL, 'dboy', 'deliveryboy'),
(13, 'aksdk bkjbb', 'mikecoorey@gmail.com', 1234567890, 'd4540d1281d54ebedf273c13c0950e17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 07:43:02', NULL, 'dboy1', 'deliveryboy'),
(14, 'aksdk bkjbb', 'mikecoorey@gmail.com', 1234567890, 'd4540d1281d54ebedf273c13c0950e17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 07:45:09', NULL, 'dboy1', 'deliveryboy'),
(15, 'aksdk bkjbb', 'mikecoorey@gmail.com', 1234567890, 'd4540d1281d54ebedf273c13c0950e17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 07:45:23', NULL, 'dboy1', 'deliveryboy'),
(16, 'aksdk bkjbb', 'iit18004@std.uwu.ac.lk', 1234567890, '417c071fec3d51b72b4a2c000b67c317', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 07:46:13', NULL, 'dboy2', 'deliveryboy'),
(17, 'aksdk bkjbb', 'iit18004@std.uwu.ac.lk', 1234567890, '417c071fec3d51b72b4a2c000b67c317', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 07:46:42', NULL, 'dboy2', 'deliveryboy'),
(22, 'aksdk bkjbb', 'mikecoorey@gmail.com', 1234567890, '74b87337454200d4d33f80c4663dc5e5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 08:02:38', NULL, 'aaaa', 'deliveryboy'),
(23, 'aksdk bkjbb', 'modi@gmail.com', 1234567890, '8f60c8102d29fcd525162d02eed4566b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 08:03:06', NULL, 'ssss', 'deliveryboy'),
(24, 'aksdk lkhl', 'nk@ghk.vjbk', 9898687698, 'f25b8258b6f0865c460ce3107d6f0116', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 08:10:35', NULL, 'kkkkk', 'deliveryboy'),
(25, 'aksdk bkjbk', 'bkjbk@vbk.bk', 5667896869, '2d7acadf10224ffdabeab505970a8934', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 08:15:55', NULL, 'pppp', 'deliveryboy'),
(26, 'kjkj kjnkjbk', 'khkjh@jbk.xk', 6789787969, '3b6281fa2ce2b6c20669490ef4b026a4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 08:18:19', NULL, 'jjjj', 'deliveryboy'),
(27, 'ssss', 'sss@ss.ss', 1464565423, '8f60c8102d29fcd525162d02eed4566b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 15:35:21', NULL, 'ssss', 'user'),
(28, 'kkkkkkkk', 'kk@kk.xom', 1464565423, 'fa7f08233358e9b466effa1328168527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 15:51:02', NULL, 'kkkk1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(5, 8, 61, '2021-07-05 17:09:10'),
(6, 10, 61, '2021-07-14 06:48:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `leaverequest`
--
ALTER TABLE `leaverequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `deliveryboy_id` (`deliveryboy_id`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_from` (`message_from`),
  ADD KEY `message_to` (`message_to`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leaverequest`
--
ALTER TABLE `leaverequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`message_from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`message_to`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
