-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2020 at 06:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `gen_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `coupon_code` varchar(15) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(150) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comments` varchar(256) DEFAULT NULL,
  `status` enum('active','inactive','alloted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `gen_id`, `code`, `coupon_code`, `c_date`, `name`, `mobile`, `email`, `comments`, `status`) VALUES
(1, 1, 10000, 'FG-100-001', '2020-02-28 06:19:59', 'Ravindran', '9944416123', 'cravi@gmal.com', 'Test', 'active'),
(2, 2, 10001, 'FG-100-016', '2020-02-28 06:24:12', 'Santos', '9944416123', 'cravi@gmal.com', 'Test', 'active'),
(3, 3, 10002, 'FG-100-021', '2020-02-28 06:24:12', 'Santos', '9944416123', 'cravi@gmal.com', 'Test', 'active'),
(4, 4, 10003, 'FG-100-036', '2020-02-28 06:24:12', 'Santos', '9944416123', 'cravi@gmal.com', 'Test', 'active'),
(5, 5, 10004, 'FG-100-041', '2020-02-28 06:25:38', 'Aravinth', '98602552425', 'anthu@gmal.com', '2 Number Gen', 'active'),
(6, 5, 10005, 'FG-100-056', '2020-02-28 06:25:38', 'Aravinth', '98602552425', 'anthu@gmal.com', '2 Number Gen', 'active'),
(7, 6, 10006, 'FG-100-061', '2020-02-28 06:26:24', 'Satheesh', '855258458', 'File@gmal.com', '3 Number Gen', 'active'),
(8, 6, 10007, 'FG-100-076', '2020-02-28 06:26:24', 'Satheesh', '855258458', 'File@gmal.com', '3 Number Gen', 'active'),
(9, 6, 10008, 'FG-100-081', '2020-02-28 06:26:24', 'Satheesh', '855258458', 'File@gmal.com', '3 Number Gen', 'active'),
(10, 7, 10009, 'FG-100-096', '2020-02-28 08:22:35', 'Murugan', '285748', 'murugan@gmail.com', 'test', 'inactive'),
(11, 7, 10010, 'FG-100-105', '2020-02-28 08:31:16', 'Murugan', '285748', 'murugan@gmail.com', 'test', 'alloted'),
(17, 8, 10011, 'FG-100-110', '2020-03-02 06:17:44', 'Rav', '999', 'ccc', 'sdf', 'inactive'),
(18, 8, 10012, 'FG-100-125', '2020-03-02 07:01:28', 'Ravi', '9944416123', 'cravi@gmail.com', 'Test Update again', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `id` int(11) NOT NULL,
  `distributor_id` varchar(50) NOT NULL,
  `sponser_id` varchar(25) NOT NULL,
  `sponser_name` varchar(100) NOT NULL,
  `coupon_code` varchar(25) NOT NULL,
  `p` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `p_id` varchar(25) NOT NULL,
  `l_id` varchar(25) NOT NULL,
  `m_id` varchar(25) NOT NULL,
  `r_id` varchar(25) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `f_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `sex` enum('male','femaler','others') NOT NULL,
  `aadhar` varchar(20) DEFAULT NULL,
  `pan` varchar(25) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `nominee_name` varchar(100) NOT NULL,
  `nominee_relationship` varchar(50) NOT NULL,
  `status` enum('active','inactive','suspended','blocked') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`id`, `distributor_id`, `sponser_id`, `sponser_name`, `coupon_code`, `p`, `l`, `m`, `r`, `p_id`, `l_id`, `m_id`, `r_id`, `name`, `f_name`, `dob`, `sex`, `aadhar`, `pan`, `address`, `mobile`, `email`, `account_no`, `ifsc_code`, `bank_name`, `branch_name`, `nominee_name`, `nominee_relationship`, `status`) VALUES
(1, 'FG20200305000001', 'R', 'Root', '', 0, 2, 3, 4, 'r', 'FG20200305000002', 'FG20200305000003', 'FG20200305000004', 'Ravi', '', '0000-00-00', 'male', '1', '1', '29,30 D.B Road . R.S Puram', '9944416123', '', '', '', '', '', '', '', 'active'),
(2, 'FG20200305000002', 'FG20200305000001', '', '', 1, 7, 0, 0, 'FG20200305000001', 'FG20200305000005', '', '', 'Ravi', '', '0000-00-00', 'male', '1', '1', '', '1', '', '', '', '', '', '', '', 'active'),
(3, 'FG20200305000003', 'FG20200305000001', '', '', 1, 0, 0, 0, 'FG20200305000001', '', '', '', 'Aravinth', '', '0000-00-00', 'male', '2', '2', '', '2', '', '', '', '', '', '', '', 'active'),
(4, 'FG20200305000004', 'FG20200305000001', '', '', 1, 0, 0, 0, 'FG20200305000001', '', '', '', 'rav', '', '0000-00-00', 'male', '1', '1', '', '1', '', '', '', '', '', '', '', 'active'),
(7, 'FG20200305000005', 'FG20200305000002', '', '', 2, 0, 0, 0, '', '', '', '', 'rav', '', '0000-00-00', 'male', '1', '1', '', '1', '', '', '', '', '', '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `email` varchar(1024) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `mobile_no` int(15) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 968800735, 'active', '2020-02-27 00:00:00', '2020-02-27 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
