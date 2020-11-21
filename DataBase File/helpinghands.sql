-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 07:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpinghands`
--

-- --------------------------------------------------------

--
-- Table structure for table `charitys`
--

CREATE TABLE `charitys` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(199) NOT NULL,
  `amount` bigint(100) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charitys`
--

INSERT INTO `charitys` (`id`, `name`, `email`, `amount`, `phone`, `address`, `city`, `state`, `zip`) VALUES
(1, 'abhishek', 'abgupta0912@gmail.com', 1000, 9450068679, '91 shanti vihar', 'jhansi', 'up', 284002);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneno` bigint(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `phoneno`, `email`, `subject`, `msg`) VALUES
(2, 'abhishek', 2147483647, 'abgupta0912@gmail.com', 'data test', 'abhi\r\n'),
(3, 'abhi', 2147483647, 'abgupta0912@gmail.com', 'new msg', 'hii'),
(4, 'abhishek', 2147483647, 'abgupta0912@gmail.com', 'nothing ', 'hiii'),
(5, 'abhishek', 2147483647, 'abgupta0912@gmail.com', 'hello', 'hi'),
(6, 'abhishek', 9450068679, 'abgupta0912@gmail.com', 'new msg', 'abhi'),
(7, 'abhishek', 9889448203, 'abgupta0912@gmail.com', 'data test two', 'hoii'),
(8, 'abhishek', 9223372036854775807, 'abgupta0912@gmail.com', 'nothing ', 'qwew'),
(9, 'abhishek', 21212121212, 'abgupta0912@gmail.com', 'csf', 'sff');

-- --------------------------------------------------------

--
-- Table structure for table `donationform`
--

CREATE TABLE `donationform` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `state` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donationform`
--

INSERT INTO `donationform` (`id`, `name`, `category`, `email`, `address`, `state`, `city`, `zip`) VALUES
(1, 'abhishek', 'book', 'abgupta0912@gmail.com', '91 shanti vihar', 'up', 'jhansi', 284002),
(2, 'abhishek gupta', 'food', 'abgupta0912@gmail.com', '91 shanti vihar', 'up', 'jhansi', 284002),
(3, 'abhishek', 'book', 'abgupta0912@gmail.com', '91 shanti vihar', 'up', 'jhansi', 284002),
(4, 'abhishek', 'clothes', 'abgupta0912@gmail.com', '91 shanti vihar', 'up', 'jhansi', 284002),
(5, 'abhishek', 'book', 'abgupta0912@gmail.com', '91 shanti vihar', 'up', 'jhansi', 284002);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fpassword` varchar(100) NOT NULL,
  `phone` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`id`, `username`, `email`, `fpassword`, `phone`) VALUES
(1, 'abhishek', 'abgupta0912@gmail.com', 'abhi', 9450068679),
(7, 'anushka', 'anushka@gmail.com', 'anushka', 9889448203),
(8, 'akansha', 'akansha@gmail.com', 'akanshka', 9542351548);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charitys`
--
ALTER TABLE `charitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donationform`
--
ALTER TABLE `donationform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charitys`
--
ALTER TABLE `charitys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donationform`
--
ALTER TABLE `donationform`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
