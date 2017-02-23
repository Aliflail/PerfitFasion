-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 04:41 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfitdbnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `Phone` bigint(255) UNSIGNED NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Date` datetime NOT NULL,
  `StoreId` int(200) NOT NULL,
  `Chest` float DEFAULT NULL,
  `Turso` float DEFAULT NULL,
  `Hip` float DEFAULT NULL,
  `biceps` float DEFAULT NULL,
  `Neck` float NOT NULL,
  `Shoulder` float NOT NULL,
  `ArmLength` float NOT NULL,
  `Waist` float NOT NULL,
  `Thighs` float NOT NULL,
  `Crotch` float NOT NULL,
  `Height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_table`
--

CREATE TABLE `orders_table` (
  `OrderId` int(250) NOT NULL,
  `UserPhone` bigint(250) NOT NULL,
  `Product` varchar(100) NOT NULL,
  `OderDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `DeliveryStatus` tinyint(1) NOT NULL,
  `StoreId` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_table`
--

CREATE TABLE `store_table` (
  `St_Id` int(100) NOT NULL,
  `Store_Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `Phone` bigint(250) UNSIGNED NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`Phone`,`Date`),
  ADD KEY `Name` (`Name`),
  ADD KEY `StoreId` (`StoreId`);

--
-- Indexes for table `orders_table`
--
ALTER TABLE `orders_table`
  ADD PRIMARY KEY (`OrderId`,`StoreId`),
  ADD KEY `UserPhone` (`UserPhone`),
  ADD KEY `StoreId` (`StoreId`);

--
-- Indexes for table `store_table`
--
ALTER TABLE `store_table`
  ADD PRIMARY KEY (`St_Id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`Phone`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_ibfk_1` FOREIGN KEY (`Phone`) REFERENCES `user_table` (`Phone`),
  ADD CONSTRAINT `measurements_ibfk_2` FOREIGN KEY (`StoreId`) REFERENCES `store_table` (`St_Id`);

--
-- Constraints for table `orders_table`
--
ALTER TABLE `orders_table`
  ADD CONSTRAINT `orders_table_ibfk_1` FOREIGN KEY (`StoreId`) REFERENCES `store_table` (`St_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
