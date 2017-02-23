-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2017 at 11:16 AM
-- Server version: 5.5.54-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perfitfa_webstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE IF NOT EXISTS `measurements` (
  `Phone` bigint(255) unsigned NOT NULL,
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
  `Height` int(11) NOT NULL,
  PRIMARY KEY (`Phone`,`Date`),
  KEY `Name` (`Name`),
  KEY `StoreId` (`StoreId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`Phone`, `Name`, `Date`, `StoreId`, `Chest`, `Turso`, `Hip`, `biceps`, `Neck`, `Shoulder`, `ArmLength`, `Waist`, `Thighs`, `Crotch`, `Height`) VALUES
(7012856921, 'Eobin', '2017-02-02 00:00:00', 1, 45, 23, 45, 16, 23, 45, 34, 89, 78, 77, 178),
(7012856921, 'Eobin', '2017-03-09 10:12:30', 2, 34, 73, 95, 91, 23, 45, 34, 89, 90, 77, 178),
(8569213472, 'Hanna', '2016-12-21 10:11:48', 3, 12, 33, 44, 88, 67, 12, 90, 56, 77, 99, 123),
(8569213472, 'Hanna', '2017-02-02 10:11:48', 4, 78, 23, 55, 44, 33, 55, 66, 99, 11, 22, 123),
(8569213472, 'Hanna', '2017-02-16 00:00:00', 1, 87, 34, 55, 22, 34, 66, 78, 44, 90, 23, 167),
(9847562321, 'Rajpal', '2017-02-17 00:00:00', 2, 90, 43, 76, 44, 45, 68, 99, 89, 55, 90, 172);

-- --------------------------------------------------------

--
-- Table structure for table `orders_table`
--

CREATE TABLE IF NOT EXISTS `orders_table` (
  `OrderId` int(250) NOT NULL,
  `UserPhone` bigint(250) NOT NULL,
  `Product` varchar(100) NOT NULL,
  `OderDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `DeliveryStatus` tinyint(1) NOT NULL,
  `StoreId` int(250) NOT NULL,
  PRIMARY KEY (`OrderId`,`StoreId`),
  KEY `UserPhone` (`UserPhone`),
  KEY `StoreId` (`StoreId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_table`
--

INSERT INTO `orders_table` (`OrderId`, `UserPhone`, `Product`, `OderDate`, `DeliveryDate`, `DeliveryStatus`, `StoreId`) VALUES
(1, 7012856921, 'Pants', '2017-02-09', '2017-02-23', 0, 1),
(2, 8569213472, 'Shirt', '2017-03-01', '2017-03-30', 1, 2),
(3, 7012856921, 'Shirt', '2017-02-28', '2017-03-24', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `store_table`
--

CREATE TABLE IF NOT EXISTS `store_table` (
  `St_Id` int(100) NOT NULL,
  `Store_Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`St_Id`)
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

CREATE TABLE IF NOT EXISTS `user_table` (
  `Phone` bigint(250) unsigned NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  PRIMARY KEY (`Phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`Phone`, `Password`, `UserName`, `Gender`) VALUES
(7012856921, 'abcd', 'Eobin', 'Male'),
(8569213472, 'qwerty', 'Hanna', 'Female'),
(9847562321, '1234', 'Rajpal', 'Male');

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
