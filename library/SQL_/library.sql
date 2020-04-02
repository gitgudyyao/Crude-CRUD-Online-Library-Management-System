-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2020 at 03:11 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'ADMIN1', 'admin@gmail.com', 'admin', '123', '2020-04-01 09:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

DROP TABLE IF EXISTS `tblbooks`;
CREATE TABLE IF NOT EXISTS `tblbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `Title`, `Author`, `Category`, `Description`, `Year`, `RegDate`, `UpdationDate`, `Status`) VALUES
(3, 'DERR', 'EEE', 'EEE', 'EEEE', 2051, '2017-07-08 20:17:31', '2020-04-02 15:10:10', 1),
(4, NULL, '1', '4', '3', 2003, '2020-04-01 12:04:00', '2020-04-02 15:08:30', 0),
(5, 'tah', NULL, NULL, '3', 2003, '2020-04-01 12:23:09', '2020-04-02 14:55:55', 1),
(7, 'Test', 'Jon', 'Bub', 'Hi', 2111, '2020-04-02 14:02:42', '2020-04-02 14:55:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

DROP TABLE IF EXISTS `tblstudents`;
CREATE TABLE IF NOT EXISTS `tblstudents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID002', 'ongtypc', 'ongtypc@gmail.com', '0123456789', 'f925916e2754e5e03f75dd58a5733251', 0, '2017-07-11 15:37:05', '2020-04-02 14:32:27'),
(4, 'SID005', 'sdfsd', 'csfsd@dfsfks.com', '0123456789', '92228410fc8b872914e023160cf4ae8f', 0, '2017-07-11 15:41:27', '2017-07-15 17:43:03'),
(8, 'SID009', 'test', 'test@gmail.com', '0123456789', 'f925916e2754e5e03f75dd58a5733251', 0, '2017-07-11 15:58:28', '2020-04-01 13:31:21'),
(9, 'SID010', 'asd', 'asd@gmail.com', '0123456789', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 13:40:30', NULL),
(10, 'SID011', '321', '123@gmail.com', '0123456789', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 18:00:59', NULL),
(11, '2', 'DERPE', '1@GMAIL.COM', '2', '202cb962ac59075b964b07152d234b70', 1, '2020-04-01 09:12:36', '2020-04-02 14:56:11'),
(12, '3', 'TAN YING YAO', 'yyao87730@gmail.com', '0126319935', 'a87ff679a2f3e71d9181a67b7542122c', 1, '2020-04-01 09:49:00', NULL),
(13, '4', 'TAN YING YAO', 'yyao7730@gmail.com', '0126319935', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1, '2020-04-01 09:49:13', NULL),
(14, '5', 'TAN YING YAO', 'yyao7730@gmail.com', '0126319935', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1, '2020-04-01 09:50:32', '2020-04-01 10:00:39'),
(15, '6', 'ta', '2@gmail.com', '1213', '202cb962ac59075b964b07152d234b70', 0, '2020-04-01 13:33:02', '2020-04-01 13:38:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
