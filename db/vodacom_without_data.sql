-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 07:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vodacom`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `created_by`) VALUES
(2, 'Selling Phones', NULL),
(3, 'MPESA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_by`) VALUES
(3, 'Agent', NULL),
(4, 'TR', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `description`) VALUES
(1, 'MPESA BANGO', 'Mabango ya mpesa');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(12) NOT NULL,
  `name` varchar(60) NOT NULL,
  `category_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `till_no` varchar(20) NOT NULL,
  `region` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `ward` varchar(20) DEFAULT NULL,
  `Village_mtaa` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longtude` varchar(50) DEFAULT NULL,
  `pos_status` varchar(20) DEFAULT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `name`, `category_id`, `owner_id`, `till_no`, `region`, `district`, `ward`, `Village_mtaa`, `street`, `latitude`, `longtude`, `pos_status`, `created_by`) VALUES
(1, 'KIWANGO', 0, 1, '555', 'Dar es Salaam', 'Ilala', 'Kikwambe', 'Malinyi', NULL, '3.0900', NULL, NULL, 1),
(2, 'Kimako', 0, 1, 'welcome', 'Mbeya', 'Mbalizi', 'ward', 'Mbalizi', NULL, '30', NULL, NULL, 1),
(3, 'KIWANGO', 4, 1, '65757', 'Mbeya', 'MBz', 'ward', 'MBZ', NULL, '20', NULL, NULL, 1),
(4, 'KIWANGO2', 4, 1, '6575745', 'MBY', 'JIJI', 'wer', 'err', NULL, '30', NULL, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_activities`
--

CREATE TABLE `pos_activities` (
  `id` int(12) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_material`
--

CREATE TABLE `pos_material` (
  `id` int(12) NOT NULL,
  `pos_id` int(10) NOT NULL,
  `material_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `size_id` int(12) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_owner`
--

CREATE TABLE `pos_owner` (
  `id` int(12) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_owner`
--

INSERT INTO `pos_owner` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `mobile`, `created_by`) VALUES
(1, 'Jackon', 'Karango', 'HH', 'kara.h@gmail.com', '07654321890', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `council` varchar(20) NOT NULL,
  `rate_per_area` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `council`, `rate_per_area`) VALUES
(1, 'Kasuru', 120);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_by`) VALUES
(1, 'Sales Agent', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(12) NOT NULL,
  `height` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `height`, `width`, `created_by`) VALUES
(1, 20, 30, NULL),
(2, 20, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_id` int(12) NOT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `mobile`, `email`, `role_id`, `created_by`) VALUES
(1, 'John', 'John', '0765345678', 'kyomo89elieza@gmao.com', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_activities`
--
ALTER TABLE `pos_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_material`
--
ALTER TABLE `pos_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_owner`
--
ALTER TABLE `pos_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pos_activities`
--
ALTER TABLE `pos_activities`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_material`
--
ALTER TABLE `pos_material`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_owner`
--
ALTER TABLE `pos_owner`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
