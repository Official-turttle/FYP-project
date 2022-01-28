-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 05:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_server_fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pnumber` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `Password`, `Fname`, `Lname`, `Email`, `Pnumber`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'a@mail.com', 444444444);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(55) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(20) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`, `description`, `status`) VALUES
(1, 'CANDY', 'sweets', 0),
(2, 'BISCUIT', 'biscuit', 0),
(3, 'BREAD', 'white bread', 0),
(4, 'HAND SANITIZER', 'hand sanitizers', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `ID` int(11) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `do_date` date NOT NULL,
  `recieved_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`ID`, `supplier`, `do_date`, `recieved_date`, `status`) VALUES
(1, 'MUNCHY', '2022-01-25', '2022-01-25', '2'),
(2, 'MUNCHY', '2022-01-25', NULL, '1'),
(3, 'MIGHTY BAKERY ', '2022-01-26', '2022-01-26', '2'),
(4, 'MUNCHY', '2022-01-28', NULL, '1'),
(5, 'ROYAL PARYA', '2022-01-28', '2022-01-28', '2');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order_detail`
--

CREATE TABLE `delivery_order_detail` (
  `ID` int(30) NOT NULL,
  `DO_ID` int(30) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `product` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `item_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_order_detail`
--

INSERT INTO `delivery_order_detail` (`ID`, `DO_ID`, `barcode`, `product`, `quantity`, `item_status`) VALUES
(1, 1, '8850338009440', 'Halls (Lime)', 50, 1),
(2, 2, '9556439892637', 'Lexus', 50, 0),
(3, 3, '9556996111318', 'might white', 50, 1),
(4, 4, '6956088586148', 'Hand Sanitizer', 50, 0),
(5, 5, '6956088586148', 'Hand Sanitizer', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ID` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `barcode` varchar(36) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `rack` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `name`, `barcode`, `category`, `date`, `quantity`, `supplier`, `rack`) VALUES
(2, 'Halls (Lime)', '8850338009440', 'CANDY', '2022-01-25', '30', 'MUNCHY', '1AA'),
(3, 'Lexus', '9556439892637', 'BISCUIT', '2022-01-25', '20', 'MUNCHY', '1AB'),
(4, 'mighty white', '9556996111318', 'BREAD', '2022-01-26', '49', 'MIGHTY BAKERY ', '11B'),
(5, 'Hand Sanitizer', '6956088586148', 'HAND SANITIZER', '2022-01-28', '59', 'ROYAL PARYA', '2AB');

-- --------------------------------------------------------

--
-- Table structure for table `item_record`
--

CREATE TABLE `item_record` (
  `ID` int(50) NOT NULL,
  `product` varchar(30) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `recieved_ammount` varchar(30) NOT NULL,
  `delivered_ammount` varchar(30) NOT NULL,
  `recieved_date` date DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `po_ID` varchar(30) NOT NULL,
  `do_ID` varchar(30) NOT NULL,
  `stockTake_date` date DEFAULT NULL,
  `counted_quantity` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_record`
--

INSERT INTO `item_record` (`ID`, `product`, `barcode`, `recieved_ammount`, `delivered_ammount`, `recieved_date`, `delivered_date`, `po_ID`, `do_ID`, `stockTake_date`, `counted_quantity`, `description`) VALUES
(1, 'Halls (Lime)', '8850338009440', '50', '', '2022-01-25', NULL, '', '1', NULL, '', ''),
(2, 'Halls (Lime)', '8850338009440', '', '20', NULL, '2022-01-25', '1', '', NULL, '', ''),
(3, 'Halls (Lime)', '8850338009440', '', '10', NULL, '2022-01-25', '2', '', NULL, '', ''),
(4, 'Halls (Lime)', '8850338009440', '', '', NULL, NULL, '', '', '2022-01-25', '39', 'difer 1'),
(5, 'Lexus', '9556439892637', '50', '', '2022-01-25', NULL, '', '2', NULL, '', ''),
(6, 'Halls (Lime)', '8850338009440', '', '9', NULL, '2022-01-25', '3', '', NULL, '', ''),
(7, 'mighty white', '9556996111318', '', '', NULL, NULL, '', '', '2022-01-26', '49', 'diff 1'),
(8, 'might white', '9556996111318', '50', '', '2022-01-26', NULL, '', '3', NULL, '', ''),
(9, 'might white', '9556996111318', '', '50', NULL, '2022-01-26', '4', '', NULL, '', ''),
(10, 'Hand Sanitizer', '6956088586148', '', '', NULL, NULL, '', '', '2022-01-28', '29', 'difer1 '),
(11, 'Hand Sanitizer', '6956088586148', '50', '', '2022-01-28', NULL, '', '4', NULL, '', ''),
(12, 'Hand Sanitizer', '6956088586148', '50', '', '2022-01-28', NULL, '', '5', NULL, '', ''),
(13, 'Hand Sanitizer', '6956088586148', '', '20', NULL, '2022-01-28', '5', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `ID` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `sub_total` varchar(20) NOT NULL,
  `tax` varchar(20) NOT NULL,
  `tax_total` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `completation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`ID`, `po_date`, `supplier`, `sub_total`, `tax`, `tax_total`, `total`, `status`, `completation_date`) VALUES
(1, '2022-01-25', 'MUNCHY', '30.00', '6', '1.80', '31.80', '2', '2022-01-25'),
(2, '2022-01-25', 'MUNCHY', '12.00', '6', '0.72', '12.72', '2', '2022-01-25'),
(3, '2022-01-25', 'JONUS TASTY CANDY', '22.00', '6', '1.32', '23.32', '1', NULL),
(4, '2022-01-26', 'JONUS TASTY CANDY', '125.00', '6', '7.50', '132.50', '2', '2022-01-26'),
(5, '2022-01-28', 'MUNCHY', '30.00', '6', '1.80', '31.80', '2', '2022-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `ID` int(55) NOT NULL,
  `po_ID` int(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `product` varchar(20) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `total_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`ID`, `po_ID`, `barcode`, `product`, `quantity`, `price`, `total_price`) VALUES
(1, 1, '9556439892637', 'Lexus', 20, '20', '400'),
(2, 1, '8850338009440', 'Halls (Lime)', 20, '1.50', '30'),
(3, 2, '8850338009440', 'Halls (Lime)', 10, '1.20', '12'),
(4, 3, '8850338009440', 'Halls (Lime)', 9, '2.5', '22.5'),
(5, 4, '9556996111318', 'might white', 50, '2.50', '125'),
(6, 5, '6956088586148', 'Hand Sanitizer', 20, '1.50', '30');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `ID` int(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_list`
--

INSERT INTO `supplier_list` (`ID`, `supplier_name`, `contact_number`, `email`, `contact_person`, `status`) VALUES
(1, 'MUNCHY', '0320318584', 'sppmsk@amazon-aws-us.com', 'Tey Rong Zhang', 1),
(2, 'JONUS TASTY CANDY', '03-87235051', 'jonus@gmail.com', 'Jerick', 1),
(3, 'MIGHTY BAKERY ', '07-8616618', 'ng8o5ott@ucyeh.com', 'Kevin', 1),
(4, 'ROYAL PARYA', '012345678944', 'ash@gmail.com', 'Ash', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `delivery_order_detail`
--
ALTER TABLE `delivery_order_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item_record`
--
ALTER TABLE `item_record`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_order_detail`
--
ALTER TABLE `delivery_order_detail`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_record`
--
ALTER TABLE `item_record`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `ID` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
