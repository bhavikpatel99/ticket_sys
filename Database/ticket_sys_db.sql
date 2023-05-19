-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2023 at 09:04 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_sys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbltask`
--

DROP TABLE IF EXISTS `tbltask`;
CREATE TABLE IF NOT EXISTS `tbltask` (
  `taskId` int NOT NULL AUTO_INCREMENT,
  `empId` int NOT NULL,
  `task` varchar(255) NOT NULL,
  `assignDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `entry_By` int NOT NULL,
  `entryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`taskId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `empName` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `whatsappNumber` int NOT NULL,
  `deptName` varchar(255) NOT NULL,
  `entry_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_By` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userStatus` tinyint NOT NULL DEFAULT '1',
  `userLevel` tinyint NOT NULL DEFAULT '1' COMMENT '0.)Boss,1.)Employee',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userId`, `empName`, `emailId`, `whatsappNumber`, `deptName`, `entry_Date`, `entry_By`, `description`, `password`, `userStatus`, `userLevel`) VALUES
(1, 'Boss', 'boss@gmail.com', 123456789, 'Boss', '2023-05-18 02:02:06', 0, '', '4988ec12e3d9a8db3943f47d4ca37c62', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
