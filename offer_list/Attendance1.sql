-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2017 at 04:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `102`
--

CREATE TABLE IF NOT EXISTS `102` (
  `admsn` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `attn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `102`
--

INSERT INTO `102` (`admsn`, `name`, `attn`) VALUES
('234', 'dws', 'p'),
('87', 'sdfd', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `attn` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `attn`) VALUES
(1, 'swapna', 2),
(2, 'sushma', 3),
(3, 'soumya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class1`
--

CREATE TABLE IF NOT EXISTS `class1` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `attn` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class1`
--

INSERT INTO `class1` (`id`, `name`, `attn`) VALUES
(12, 'NDHFHBEFH', 0),
(12, 'SWAPNA', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
