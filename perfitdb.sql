-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 11:40 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `Phone` int(100) UNSIGNED NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Date` datetime NOT NULL,
  `StoreId` int(200) NOT NULL,
  `Chest` int(11) DEFAULT NULL,
  `Turso` int(11) DEFAULT NULL,
  `Hip` int(11) DEFAULT NULL,
  `biceps` int(11) DEFAULT NULL,
  `Neck` int(250) NOT NULL,
  `Shoulder` int(250) NOT NULL,
  `ArmLength` int(250) NOT NULL,
  `Waist` int(250) NOT NULL,
  `Thighs` int(250) NOT NULL,
  `Crotch` int(250) NOT NULL,
  `Height` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`Phone`, `Name`, `Date`, `StoreId`, `Chest`, `Turso`, `Hip`, `biceps`, `Neck`, `Shoulder`, `ArmLength`, `Waist`, `Thighs`, `Crotch`, `Height`) VALUES
(828158102, 'Alif Noushad', '2017-02-02 00:00:00', 1, 45, 23, 45, 16, 23, 45, 34, 89, 78, 77, 178),
(828158102, 'Alif Noushad', '2017-03-09 10:12:30', 2, 34, 73, 95, 91, 23, 45, 34, 89, 90, 77, 178),
(1234567891, 'asdfgh', '2017-02-17 00:00:00', 2, 90, 43, 76, 44, 45, 68, 99, 89, 55, 90, 172),
(1234567899, 'alif', '2016-12-21 10:11:48', 3, 12, 33, 44, 88, 67, 12, 90, 56, 77, 99, 123),
(1234567899, 'alif', '2017-02-02 10:11:48', 4, 78, 23, 55, 44, 33, 55, 66, 99, 11, 22, 123),
(1234567899, 'alif', '2017-02-16 00:00:00', 1, 87, 34, 55, 22, 34, 66, 78, 44, 90, 23, 167);

-- --------------------------------------------------------

--
-- Table structure for table `orders_table`
--

CREATE TABLE `orders_table` (
  `OrderId` int(250) NOT NULL,
  `UserPhone` int(250) NOT NULL,
  `Product` varchar(100) NOT NULL,
  `OderDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `DeliveryStatus` tinyint(1) NOT NULL,
  `StoreId` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_table`
--

INSERT INTO `orders_table` (`OrderId`, `UserPhone`, `Product`, `OderDate`, `DeliveryDate`, `DeliveryStatus`, `StoreId`) VALUES
(2, 1234567899, 'Pants', '2017-02-09', '2017-02-23', 0, 1),
(3, 1234567891, 'Shirts', '2017-03-01', '2017-03-30', 1, 2),
(4, 1234567899, 'shirt', '2017-02-28', '2017-03-24', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `store_table`
--

CREATE TABLE `store_table` (
  `St_Id` int(100) NOT NULL,
  `Store_Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_table`
--

INSERT INTO `store_table` (`St_Id`, `Store_Name`, `Password`) VALUES
(1, 'Myntra', 'password'),
(2, 'Luis Philip', '123456789'),
(3, 'Navigator', 'pswrd'),
(4, 'Bang Bang', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `Phone` int(100) UNSIGNED NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `StoreId` int(11) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`Phone`, `Password`, `UserName`, `StoreId`, `Gender`) VALUES
(449555960, 'qwerty', 'dinam', 1, 'Male'),
(828158102, 'password', 'Alif Noushad', 3, 'Female'),
(1234567891, 'alif', 'asdfgh', 2, 'Male'),
(1234567899, 'alif', 'alif', 1, 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`Phone`,`Date`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `orders_table`
--
ALTER TABLE `orders_table`
  ADD PRIMARY KEY (`OrderId`,`StoreId`),
  ADD UNIQUE KEY `OrderId` (`OrderId`,`StoreId`),
  ADD KEY `StoreId` (`StoreId`);

--
-- Indexes for table `store_table`
--
ALTER TABLE `store_table`
  ADD PRIMARY KEY (`St_Id`),
  ADD UNIQUE KEY `St_Id` (`St_Id`),
  ADD KEY `St_Id_2` (`St_Id`),
  ADD KEY `St_Id_3` (`St_Id`),
  ADD KEY `St_Id_4` (`St_Id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`Phone`),
  ADD KEY `StoreId` (`StoreId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders_table`
--
ALTER TABLE `orders_table`
  MODIFY `OrderId` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_ibfk_1` FOREIGN KEY (`Phone`) REFERENCES `user_table` (`Phone`);

--
-- Constraints for table `orders_table`
--
ALTER TABLE `orders_table`
  ADD CONSTRAINT `orders_table_ibfk_1` FOREIGN KEY (`StoreId`) REFERENCES `store_table` (`St_Id`);

--
-- Constraints for table `user_table`
--
ALTER TABLE `user_table`
  ADD CONSTRAINT `user_table_ibfk_1` FOREIGN KEY (`StoreId`) REFERENCES `store_table` (`St_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
