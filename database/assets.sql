-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2019 at 09:33 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `d_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  KEY `d_id` (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `Name`, `d_id`, `email`) VALUES
('asdf1234', '123456789', 'sunil', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctype` varchar(500) NOT NULL,
  `cdesc` varchar(500) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `ctype`, `cdesc`) VALUES
(1, 'HARDWARE', 'Hardwares pertaining to different components used in the office.'),
(2, 'SOFTWARES', 'Softwares used by different employees in their PC\'s'),
(3, 'FURNITURE', 'Furniture used in the office');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(500) NOT NULL,
  `room_number` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `room_number`, `floor`) VALUES
(1, 'personel', 419, 4),
(2, 'electrical', 304, 3),
(3, 'mechanical', 206, 2),
(4, 'civil', 103, 1),
(5, 'finance', 507, 5);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `d_id` int(11) NOT NULL,
  `emp_phone` varchar(15) NOT NULL,
  `hw_id` int(11) DEFAULT NULL,
  `sw_id` int(11) DEFAULT NULL,
  KEY `hw_id` (`hw_id`),
  KEY `sw_id` (`sw_id`),
  KEY `d_id` (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `d_id`, `emp_phone`, `hw_id`, `sw_id`) VALUES
(101, 'RAKESH', 1, '7036458924', 2, 2),
(101, 'RAKESH', 1, '7036458924', 5, NULL),
(102, 'HEMANTH', 5, '7023908997', 6, 5),
(102, 'HEMANTH', 5, '7023908997', 5, 2),
(103, 'GIRISH', 4, '9988775566', 3, 3),
(104, 'ASHOK', 3, '8855667799', 6, 4),
(105, 'KUMAR NITESH', 2, '8877551122', 4, 4),
(105, 'KUMAR NITESH', 2, '8877551122', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

DROP TABLE IF EXISTS `furniture`;
CREATE TABLE IF NOT EXISTS `furniture` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `v_id` int(11) NOT NULL,
  `dop` date NOT NULL,
  `price` double NOT NULL,
  `c_id` int(11) NOT NULL,
  `master` int(11) NOT NULL,
  PRIMARY KEY (`f_id`),
  KEY `c_id` (`c_id`),
  KEY `v_id` (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`f_id`, `f_name`, `v_id`, `dop`, `price`, `c_id`, `master`) VALUES
(2, 'GODREJ TABLE', 4, '2016-10-13', 10000, 3, 1),
(3, 'NILKAMAL CHAIR', 4, '2017-03-15', 4000, 3, 2),
(4, 'IKEA SOFA', 2, '2019-02-12', 50000, 3, 3),
(5, 'SAMSUNG Air conditioner', 2, '2016-10-14', 40000, 3, 4),
(6, 'WHIRLPOOL Air Conditioner', 2, '2017-08-24', 50000, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
CREATE TABLE IF NOT EXISTS `hardware` (
  `hw_id` int(11) NOT NULL AUTO_INCREMENT,
  `hw_name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `dop` date NOT NULL,
  `price` double NOT NULL,
  `c_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `master` int(11) NOT NULL,
  PRIMARY KEY (`hw_id`),
  KEY `c_id` (`c_id`),
  KEY `c_id_2` (`c_id`),
  KEY `v_id` (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`hw_id`, `hw_name`, `qty`, `dop`, `price`, `c_id`, `v_id`, `status`, `master`) VALUES
(2, 'HP DESKTOP', 32, '2015-10-14', 50000, 1, 5, 'WORKING', 1),
(3, 'DELL KEYBOARD', 65, '2019-06-03', 1000, 1, 5, 'WORKING', 2),
(4, 'HP MOUSE', 23, '2017-09-12', 1000, 1, 5, 'WORKING', 3),
(5, 'SAMSUNG PRINTER', 50, '2015-08-12', 10000, 1, 5, 'WORKING', 4),
(6, 'IBALL SCANNER', 20, '2019-01-16', 17000, 1, 5, 'WORKING', 5),
(7, 'DELL DESKTOP', 15, '2007-07-12', 50000, 1, 3, 'WORKING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
CREATE TABLE IF NOT EXISTS `software` (
  `sw_id` int(11) NOT NULL AUTO_INCREMENT,
  `sw_name` varchar(100) NOT NULL,
  `serial_no` varchar(100) NOT NULL,
  `dop` date NOT NULL,
  `price` double NOT NULL,
  `exp_date` date NOT NULL,
  `c_id` int(11) NOT NULL,
  `master` int(11) NOT NULL,
  PRIMARY KEY (`sw_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`sw_id`, `sw_name`, `serial_no`, `dop`, `price`, `exp_date`, `c_id`, `master`) VALUES
(2, 'WINDOWS 10', 'ASDF123456', '2016-02-10', 7000, '2023-04-15', 2, 1),
(3, 'McAfee Anti virus', 'HGFJHGJ57887687', '2017-08-15', 5000, '2020-07-15', 2, 2),
(4, 'MS OFFICE', 'VBVJH78685', '2018-02-13', 5000, '2021-04-17', 2, 3),
(5, 'ADOBE PHOTOSHOP', 'CVHJN7756', '2017-06-21', 5000, '2022-04-15', 2, 4),
(6, 'Dropbox', 'GJKHYUG7578', '2016-07-12', 2000, '2021-08-19', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`v_id`, `v_name`, `phone`, `address`, `email`) VALUES
(1, 'Satish', '6303301144', 'RN0289,HYDERABAD', 'satish@gmail.com'),
(2, 'ramesh', '9493941861', 'RN0.404,SECUNDERABAD', 'ramesh@gmail.com'),
(3, 'suresh', '9966338855', 'RNO.404,ecil', 'suresh@yahoo.com'),
(4, 'nagesh', '7788996655', 'RNO.320,UPPAL', 'nagesh@outlook.com'),
(5, 'ajay', '7659483216', 'RNO.569,AMEERPET', 'ajay3@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`hw_id`) REFERENCES `hardware` (`hw_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`sw_id`) REFERENCES `software` (`sw_id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `furniture_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`),
  ADD CONSTRAINT `furniture_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vendors` (`v_id`);

--
-- Constraints for table `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`),
  ADD CONSTRAINT `hardware_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vendors` (`v_id`);

--
-- Constraints for table `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `software_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
