-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 03:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
(3, 'MPESA', NULL),
(4, 'Selling Phones22', NULL);

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
(4, 'TR', NULL),
(5, 'Agenttt45', NULL);

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
(1, 'MPESA BANGO', 'Mabango ya mpesa'),
(2, 'MPESA BANGO', 'Mabango ya mpesa'),
(3, 'MPESA BANGO', 'Mabango ya mpesa');

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
  `pos_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `name`, `category_id`, `owner_id`, `till_no`, `region`, `district`, `ward`, `Village_mtaa`, `street`, `latitude`, `longtude`, `pos_status`) VALUES
(1, 'Hapa Kazi Tu', 3, 1, '55555', 'dar', 'temeke', 'Mbagala', 'mshikamano', 'mshikamano', '4993030', '404040', 'new'),
(2, 'Maisha Magumu', 4, 1, '34555', 'dar', 'kinondoni', 'ubungo', 'ubungo', 'njiapanda', '4993030', '404040', 'fainted');

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

--
-- Dumping data for table `pos_activities`
--

INSERT INTO `pos_activities` (`id`, `activity_id`, `pos_id`, `created_by`) VALUES
(1, 2, 1, NULL),
(2, 3, 1, NULL);

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

--
-- Dumping data for table `pos_material`
--

INSERT INTO `pos_material` (`id`, `pos_id`, `material_id`, `status`, `size_id`, `photo`) VALUES
(1, 1, 1, 'new', 1, 'picha'),
(2, 1, 2, 'fainted', 1, 'picha');

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
(1, 'moses', 'chagama', 'm', 'mchagama@it.co.tz', '25542641057', NULL);

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
(1, 'admin', NULL),
(2, 'TR agent', NULL),
(3, 'Sales Representative', NULL);

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
(2, 57, 60, NULL),
(3, 23, 45, NULL);

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
  `password` varchar(250) NOT NULL,
  `role` int(12) NOT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `role`, `created_by`) VALUES
(8, 'MOSES', 'MSAFIRI', '255742641057', 'mc@gmail.com', '$2y$10$Gbr02PIKsKW6GVHSELLkfOUKhiVIn0qYPuKxX4VlcoiVnRxMrxwp.', 1, NULL),
(11, 'Moses', 'Msafiri', '255970345098', 'mc@gmail.com', '$2y$10$8ZtYdeOzUq01vUCBv8nkq.gnTdNu08cjm42FNrDFXj7JIB7UhnGmG', 1, NULL),
(12, 'Moses', 'Msafiri', '255970345092', 'mc@gmail.com', '$2y$10$AOOwx0FoMiFmrC6xsJ3UK.u29QW0IyamsHAeWzDyI1v/F6BgyQcDe', 1, NULL),
(13, 'Moses', 'Msafiri', '255970345099', 'mc@gmail.com', '$2y$10$X86eoN1cwLVam1plvmq3rOzksJQDsbBUitYEs6lgGVTrhK.5VYwWi', 1, NULL),
(20, 'Moses', 'Msafiri', '255970345089', 'mc@gmail.com', '$2y$10$QPboIXfBR51GsJZPllOlG.ouRQh7mRYq76dPl4ESr3AEQURjIhpDC', 1, NULL),
(22, 'Moses', 'Msafiri', '25597034589', 'mc@gmail.com', '$2y$10$wycd2.u/P5cFnLZe8NgRougSmLpHKtGyLaKefDDcYdSxltsVxhpj2', 1, NULL),
(27, 'Moses', 'Msafiri', '255970345097', 'mc@gmail.com', '$2y$10$6aPiUN6bBM1k1GdRzONR.eFKneKUjdjo3C.zBNOksBlZPbMWhfJ46', 1, NULL),
(40, 'Moses', 'Msafiri', '255970345197', 'mc@gmail.com', '$2y$10$2670eQjUsqYRVLqP/L1GLeB99yt6KIgg3lmRu7Zj7iM4iZ/DkXkGy', 1, NULL),
(42, 'Moses', 'Msafiri', '255979345197', 'mc@gmail.com', '$2y$10$AAAUf3fg5bB.kZrVc55v0O1pc0430MTYw8tdUeiz9eA8NHixBJUrK', 1, NULL),
(44, 'Moses', 'Msafiri', '255979745197', 'mc@gmail.com', '$2y$10$43IIxx69GhNipLAoLQ2GyO3xq.jT.Co/Zj07Exl6OBB4k4OeAxYP6', 1, NULL),
(46, 'Moses', 'Msafiri', '255975745197', 'mc@gmail.com', '$2y$10$fbh3oHtadC1EvK5y5/MDbuXE0JrFZVyNWICAiRJBqH/o8aCWp5.si', 1, NULL),
(48, 'Moses', 'Msafiri', '255935745197', 'mc@gmail.com', '$2y$10$ie/d06bbCC8kUDr6GSd7E.YNQfo7G6s42zSzPN4QK9370syywzEQm', 1, NULL),
(50, 'Moses', 'Msafiri', '255935765197', 'mc@gmail.com', '$2y$10$01P4SQy8c79R6fjY6l8mI.h2LCs0Z91UFjkWxpEYRdYiograQ5c5O', 1, NULL),
(52, 'Moses', 'Msafiri', '2545935765197', 'mc@gmail.com', '$2y$10$iThc1xULIILVbqzcul9RbOg2RGAkQr8TFDTXDKXNJzA5mhwaBxwvO', 1, NULL),
(55, 'Moses', 'Msafiri', '254593565197', 'mc@gmail.com', '$2y$10$hb50NgYZfGUnmLbHtqqbVejsEd8sIDQO4ruJ50W7WEKXbDGjq.JzC', 1, NULL),
(58, 'Moses', 'Msafiri', '254593365197', 'mc@gmail.com', '$2y$10$1TjiDPSNFlZP04.9d2lhh.smM.N5kxpQCxUMhdE0.20/qzqZJTn72', 1, NULL),
(64, 'Moses', 'Msafiri', '2545935651', 'mc@gmail.com', '$2y$10$rQZaekVuUDssiM8jvflLSuiDC1kXXLKIBJ5xeb9Q/VF2X7GMYluvu', 1, NULL),
(65, 'Moses', 'Msafiri', '2544935651', 'mc@gmail.com', '$2y$10$dXn6mCFrk4IB4i/C0EewXerYHya/0c9nDrep/HxKu8Ng39qxtk3Ju', 1, NULL),
(67, 'Moses', 'Msafiri', '2544933651', 'mc@gmail.com', '$2y$10$DlXRafmuKJweeRl1yYjzTe7U1beEPelrct8kdFjaH2ibnA9c/Zbb6', 1, NULL),
(68, 'Moses', 'Msafiri', '2544333651', 'mc@gmail.com', '$2y$10$Kv5WwVgJJyXcsX8dYQr62.fcoeoV/96nrtmw6HKWF9OoWOGXdUZVy', 1, NULL),
(70, 'Moses', 'Msafiri', '2544333650', 'mc@gmail.com', '$2y$10$C5oPo0/ogEisz6As4vp/nuv0yKCqCXH1vwJwMkGW4sUcGuHIg3Z4q', 1, NULL),
(72, 'Moses', 'Msafiri', '2544533650', 'mc@gmail.com', '$2y$10$WgGWczWGcvxtnwaGj30Pp.dBfNxb6d.CgTxYkuVfEt85euzxeV5Ne', 1, NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pos_activities`
--
ALTER TABLE `pos_activities`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pos_material`
--
ALTER TABLE `pos_material`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pos_owner`
--
ALTER TABLE `pos_owner`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
