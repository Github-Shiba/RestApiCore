-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 08:27 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broadbanddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `id` int(11) NOT NULL,
  `product` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `product`) VALUES
(1, '100 mb'),
(2, '200 mb'),
(3, '300 mb'),
(4, '17 mb'),
(5, '72 mb'),
(6, 'Standard Tarrif'),
(7, 'Green Tarrif'),
(8, 'Saver Tarrif');

-- --------------------------------------------------------

--
-- Table structure for table `provider_master`
--

CREATE TABLE `provider_master` (
  `id` int(11) NOT NULL,
  `provider_id` varchar(7) NOT NULL,
  `provider_name` varchar(20) NOT NULL,
  `service_id` longtext NOT NULL,
  `active_dttm` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider_master`
--

INSERT INTO `provider_master` (`id`, `provider_id`, `provider_name`, `service_id`, `active_dttm`, `status`) VALUES
(1, 'CLNT001', 'BSNL', '[\"SER01\",\"SER04\",\"SER05\"]', '2020-07-09 00:00:00', 1),
(2, 'CLNT002', 'Airtel', '[\"SER06\",\"SER07\"]', '2020-07-09 00:00:00', 1),
(3, 'CLNT003', 'Vodafone', '[\"SER01\",\"SER04\",\"SER05\"]', '2020-07-09 00:00:00', 1),
(4, 'CLNT004', 'Indane Energy', '[\"SER02\",\"SER03\"]', '2020-07-09 00:00:00', 1),
(5, 'CLNT005', 'Tata Power', '[\"SER02\"]', '2020-07-09 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rate_matrix_master`
--

CREATE TABLE `rate_matrix_master` (
  `id` int(11) NOT NULL,
  `service_rate_id` varchar(5) NOT NULL,
  `product_id` varchar(6) NOT NULL,
  `zone_id` varchar(1) NOT NULL,
  `price` double(5,2) NOT NULL,
  `updatedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_matrix_master`
--

INSERT INTO `rate_matrix_master` (`id`, `service_rate_id`, `product_id`, `zone_id`, `price`, `updatedon`) VALUES
(1, 'SER01', '1', '1', 30.00, '0000-00-00 00:00:00'),
(2, 'SER02', '6', '2', 100.00, '2020-07-11 08:14:31'),
(3, 'SER03', '6', '4', 56.50, '0000-00-00 00:00:00'),
(4, 'SER04', '2', '1', 40.00, '0000-00-00 00:00:00'),
(5, 'SER05', '3', '1', 50.00, '0000-00-00 00:00:00'),
(6, 'SER06', '4', '1', 25.00, '0000-00-00 00:00:00'),
(7, 'SER07', '5', '1', 40.00, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zone_master`
--

CREATE TABLE `zone_master` (
  `id` int(11) NOT NULL,
  `zone_name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone_master`
--

INSERT INTO `zone_master` (`id`, `zone_name`) VALUES
(1, 'All'),
(2, 'South'),
(3, 'North'),
(4, 'Mid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_master`
--
ALTER TABLE `provider_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_matrix_master`
--
ALTER TABLE `rate_matrix_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_master`
--
ALTER TABLE `zone_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `provider_master`
--
ALTER TABLE `provider_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rate_matrix_master`
--
ALTER TABLE `rate_matrix_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zone_master`
--
ALTER TABLE `zone_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
