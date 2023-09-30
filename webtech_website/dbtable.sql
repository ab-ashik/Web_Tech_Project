-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 03:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtable`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `purchase_no` int(11) NOT NULL,
  `accId` varchar(20) NOT NULL,
  `accName` varchar(100) NOT NULL,
  `accAdrs` varchar(100) NOT NULL,
  `eventType` varchar(50) NOT NULL,
  `payment` int(10) NOT NULL,
  `vendorName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`purchase_no`, `accId`, `accName`, `accAdrs`, `eventType`, `payment`, `vendorName`) VALUES
(2, 'abdullah', 'Abdullah', 'dhaka', 'Birthday', 10000, 'hp'),
(3, 'abdullah', 'Abdullah', 'dhaka', 'Anniversary', 5000, 'hp');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientId` varchar(20) NOT NULL,
  `clientName` varchar(50) NOT NULL,
  `clientEmail` varchar(100) NOT NULL,
  `clientPhone` int(11) NOT NULL,
  `clientAdrs` varchar(200) NOT NULL,
  `clientPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientId`, `clientName`, `clientEmail`, `clientPhone`, `clientAdrs`, `clientPassword`) VALUES
('abdullah', 'Abdullah', 'abc@gmail.com', 1234567891, 'dhaka', '55555');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eId` int(10) NOT NULL,
  `eType` varchar(50) NOT NULL,
  `eDuration` varchar(50) NOT NULL,
  `eRate` int(10) NOT NULL,
  `vendorName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eId`, `eType`, `eDuration`, `eRate`, `vendorName`) VALUES
(0, '', '', 0, 'hp'),
(1211, 'Birthday', '90 Minutes', 10000, 'hp'),
(1233, 'Anniversary', '60 Minutes', 5000, 'hp');

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `id` varchar(20) NOT NULL,
  `passwords` varchar(50) NOT NULL,
  `roles` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`id`, `passwords`, `roles`) VALUES
('abdullah', '55555', 'client'),
('hp', '123456', 'vendor'),
('mod', '123456', 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `mdId` varchar(20) NOT NULL,
  `mdName` varchar(50) NOT NULL,
  `mdEmail` varchar(100) NOT NULL,
  `mdPhone` int(11) NOT NULL,
  `mdAdrs` varchar(200) NOT NULL,
  `mdPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`mdId`, `mdName`, `mdEmail`, `mdPhone`, `mdAdrs`, `mdPassword`) VALUES
('mod', 'Moderator', 'mod@gmail.com', 1234567891, 'dhaka', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `review` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `review`) VALUES
('HP', 'Abdullah', 'Good Service');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorId` varchar(20) NOT NULL,
  `vendorName` varchar(50) NOT NULL,
  `vendorEmail` varchar(100) NOT NULL,
  `vendorPhone` int(11) NOT NULL,
  `vendorAdrs` varchar(200) NOT NULL,
  `vendorPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorId`, `vendorName`, `vendorEmail`, `vendorPhone`, `vendorAdrs`, `vendorPassword`) VALUES
('hp', 'HP', 'hp@gmail.com', 1234567891, 'dhaka', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`purchase_no`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eId`);

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`mdId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `purchase_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
