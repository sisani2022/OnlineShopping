-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2017 at 06:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `first_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--

CREATE TABLE IF NOT EXISTS `cart_list` (
  `user_id` varchar(50) NOT NULL DEFAULT '',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_list`
--

INSERT INTO `cart_list` (`user_id`, `item_id`, `quantity`, `cost`) VALUES
('abc', 1, 2, 30),
('abc', 2, 1, 100),
('abc', 8, 2, 40),
('sarithaloka@gmail.com', 3, 2, 80),
('sarithaloka@gmail.com', 4, 3, 30),
('sarithaloka@gmail.com', 5, 1, 20),
('sarithaloka@gmail.com', 6, 2, 10),
('sarithaloka@gmail.com', 7, 3, 5),
('sarithaloka@gmail.com', 10, 2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE IF NOT EXISTS `item_list` (
  `item_id` int(11) NOT NULL,
  `item_category` varchar(20) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `item_cost` double NOT NULL,
  `item_measure` varchar(10) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_rate` int(11) NOT NULL,
  `item_image` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`item_id`, `item_category`, `item_name`, `item_cost`, `item_measure`, `item_quantity`, `item_rate`, `item_image`) VALUES
(1, 'fruits', 'apple', 30, '10', 50, 4, NULL),
(2, 'books', 'se', 100, 'gram', 50, 4, NULL),
(3, 'vegetables', 'tomatoes', 40, 'kilogram', 48, 4, NULL),
(4, 'soaps', 'xxx', 10, '10 grams', 47, 4, NULL),
(5, 'soaps', 'medimix', 20, '15 grams', 47, 5, NULL),
(6, 'pens', 'agni_blue', 5, '3 grams', 48, 4, NULL),
(7, 'pens', 'agni_black', 5, '3 grams', 50, 4, NULL),
(8, 'fruits', 'bananas', 40, '1 dozen', 50, 4, NULL),
(9, ' vegetables', 'potatoes', 20, '1 kilo', 50, 3, NULL),
(10, 'books', 'ai', 100, '50 grams', 50, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `user_id` varchar(50) DEFAULT NULL,
  `user_type` char(1) DEFAULT NULL,
  `notification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers_list`
--

CREATE TABLE IF NOT EXISTS `offers_list` (
  `offer_no` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) DEFAULT NULL,
  `item1` int(11) DEFAULT NULL,
  `item2` int(11) DEFAULT NULL,
  `item3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers_list`
--

INSERT INTO `offers_list` (`offer_no`, `item_id`, `item1`, `item2`, `item3`) VALUES
(1, 1, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `phone_num` bigint(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `age` double NOT NULL,
  `confirm` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `first_name`, `last_name`, `password`, `dob`, `phone_num`, `address`, `age`, `confirm`) VALUES
('abc', 'cse', 'stu', 'cse', '0000-00-00', 6543543223, 'telangana', 20, 'y'),
('sari@gmail.com', 'l', 'sari', '', '1997-06-06', 8790454423, 'mupkal', 20, 'no'),
('sarithaloka@gmail.com', 'saritha', 'loka', 'saritha', '0000-00-00', 8790454423, 'nzb', 20, 'yes'),
('xyz', 'sds', 'fsv', 'gvfd', '0000-00-00', 6543265432, 'nzb', 19, 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_list`
--
ALTER TABLE `cart_list`
 ADD PRIMARY KEY (`user_id`,`item_id`), ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `offers_list`
--
ALTER TABLE `offers_list`
 ADD PRIMARY KEY (`offer_no`), ADD KEY `item_id` (`item_id`), ADD KEY `item1` (`item1`), ADD KEY `item2` (`item2`), ADD KEY `item3` (`item3`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
 ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_list`
--
ALTER TABLE `cart_list`
ADD CONSTRAINT `cart_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`),
ADD CONSTRAINT `cart_list_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`item_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`);

--
-- Constraints for table `offers_list`
--
ALTER TABLE `offers_list`
ADD CONSTRAINT `offers_list_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`item_id`),
ADD CONSTRAINT `offers_list_ibfk_2` FOREIGN KEY (`item1`) REFERENCES `item_list` (`item_id`),
ADD CONSTRAINT `offers_list_ibfk_3` FOREIGN KEY (`item2`) REFERENCES `item_list` (`item_id`),
ADD CONSTRAINT `offers_list_ibfk_4` FOREIGN KEY (`item3`) REFERENCES `item_list` (`item_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
