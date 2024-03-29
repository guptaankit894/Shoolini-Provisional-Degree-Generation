-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2019 at 02:25 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prov_deg`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_prov`
--

DROP TABLE IF EXISTS `stud_prov`;
CREATE TABLE IF NOT EXISTS `stud_prov` (
  `rollno` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `F_name` varchar(50) DEFAULT NULL,
  `Faculty` varchar(100) DEFAULT NULL,
  `Degree` varchar(100) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Session` varchar(10) DEFAULT NULL,
  `OGPA` double DEFAULT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
