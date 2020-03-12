-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 01:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manik_plastic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Techno', 'info@technothinksup.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `bill_date` varchar(20) NOT NULL,
  `bill_type` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_basic_amt` double DEFAULT NULL,
  `bill_gst_amt` double DEFAULT NULL,
  `bill_net_tot_amt` double DEFAULT NULL,
  `bill_status` int(11) NOT NULL DEFAULT 1,
  `bill_addedby` varchar(100) NOT NULL,
  `bill_date2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `company_id`, `bill_no`, `bill_date`, `bill_type`, `customer_id`, `bill_basic_amt`, `bill_gst_amt`, `bill_net_tot_amt`, `bill_status`, `bill_addedby`, `bill_date2`) VALUES
(1, 1, 1, '11-03-2020', '2', 2, 9500, 500, 10000, 1, '1', '11-03-2020 18:19:27 PM'),
(2, 1, 1, '10-03-2020', '1', 2, 9500, 0, 9500, 1, '1', '11-03-2020 18:30:04 PM'),
(3, 1, 2, '11-03-2020', '2', 2, 6600, 0, 6600, 1, '1', '11-03-2020 18:32:53 PM'),
(4, 1, 3, '11-03-2020', '2', 1, 9399.000000000002, 495.0000000000001, 9894.000000000002, 1, '1', '11-03-2020 18:36:28 PM');

-- --------------------------------------------------------

--
-- Table structure for table `bill_ch`
--

CREATE TABLE `bill_ch` (
  `bill_ch_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `bill_ch_details` varchar(350) NOT NULL,
  `bill_ch_bundls` varchar(250) NOT NULL,
  `bill_ch_bags` double NOT NULL,
  `bill_ch_kg` double NOT NULL,
  `bill_ch_rate` double NOT NULL,
  `bill_ch_rate_type` varchar(50) DEFAULT NULL,
  `bill_ch_bill_amt` double NOT NULL,
  `bill_ch_frieght` double NOT NULL,
  `bill_ch_vat_amt` double DEFAULT NULL,
  `bill_ch_gst_per` double NOT NULL,
  `bill_ch_gst_amt` double NOT NULL,
  `bill_ch_total_amt` double DEFAULT NULL,
  `bill_ch_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_ch`
--

INSERT INTO `bill_ch` (`bill_ch_id`, `bill_id`, `bill_ch_details`, `bill_ch_bundls`, `bill_ch_bags`, `bill_ch_kg`, `bill_ch_rate`, `bill_ch_rate_type`, `bill_ch_bill_amt`, `bill_ch_frieght`, `bill_ch_vat_amt`, `bill_ch_gst_per`, `bill_ch_gst_amt`, `bill_ch_total_amt`, `bill_ch_date`) VALUES
(1, 1, 'dfsdf', '10', 100, 50, 100, 'Bag', 10000, 500, 9500, 5, 500, 10000, '11-03-2020 06:19:27 PM'),
(2, 2, 'demo', '10', 20, 50, 500, 'Bag', 10000, 500, 9500, 0, 0, 9500, '11-03-2020 06:30:04 PM'),
(3, 3, '22x40 hvy', '5', 2000, 350, 3.55, 'Bag', 7100, 500, 6600, 0, 0, 6600, '11-03-2020 06:32:53 PM'),
(4, 4, '12x26.5 yeloo', '2', 3000, 230, 2.2, 'Bag', 6600.000000000001, 500, 6100.000000000001, 5, 330.00000000000006, 6430.000000000001, '11-03-2020 06:36:28 PM'),
(5, 4, '12X26.5 YELLO', '1', 1500, 120, 2.2, 'Bag', 3300.0000000000005, 1, 3299.0000000000005, 5, 165.00000000000003, 3464.0000000000005, '11-03-2020 06:36:28 PM');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_address` varchar(350) NOT NULL,
  `company_city` varchar(150) NOT NULL,
  `company_state` varchar(150) NOT NULL,
  `company_district` varchar(150) NOT NULL,
  `company_statecode` bigint(20) NOT NULL,
  `company_pincode` varchar(20) DEFAULT NULL,
  `company_mob1` varchar(12) NOT NULL,
  `company_mob2` varchar(12) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  `company_website` varchar(150) NOT NULL,
  `company_pan_no` varchar(12) NOT NULL,
  `company_gst_no` varchar(100) NOT NULL,
  `company_lic1` varchar(150) NOT NULL,
  `company_lic2` varchar(150) NOT NULL,
  `company_start_date` varchar(15) NOT NULL,
  `company_end_date` varchar(15) NOT NULL,
  `company_logo` varchar(200) NOT NULL,
  `company_seal` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_district`, `company_statecode`, `company_pincode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_lic1`, `company_lic2`, `company_start_date`, `company_end_date`, `company_logo`, `company_seal`, `date`) VALUES
(1, 'Manik Plastic', 'fghfgh dfgh', 'Kolhapur', 'Maharashtra', 'Kolhapur', 27, '111222', '9876543210', '9998887770', 'demo@email.com', 'www.ppp.com', '111', '222', '333', '444', '01-01-2019', '01-01-2021', '', '', '2020-03-11 07:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `customer_group_id` int(11) DEFAULT NULL,
  `customer_no` int(11) DEFAULT NULL,
  `customer_company` varchar(250) DEFAULT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `customer_gstin` varchar(50) DEFAULT NULL,
  `customer_pan` varchar(50) DEFAULT NULL,
  `customer_mobile` varchar(20) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_addr` text DEFAULT NULL,
  `customer_city` varchar(150) DEFAULT NULL,
  `customer_state` varchar(250) DEFAULT NULL,
  `customer_pin` varchar(10) DEFAULT NULL,
  `customer_statecode` int(11) NOT NULL,
  `customer_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `customer_addedby` varchar(50) DEFAULT NULL,
  `customer_added_date` varchar(20) DEFAULT NULL,
  `customer_updateby` varchar(50) DEFAULT NULL,
  `customer_update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `company_id`, `customer_group_id`, `customer_no`, `customer_company`, `customer_name`, `customer_gstin`, `customer_pan`, `customer_mobile`, `customer_phone`, `customer_email`, `customer_addr`, `customer_city`, `customer_state`, `customer_pin`, `customer_statecode`, `customer_status`, `customer_addedby`, `customer_added_date`, `customer_updateby`, `customer_update_date`) VALUES
(1, 1, 1, NULL, 'uhgfjh fff', 'ghj', 'gfjh', 'ghj', '9673454383', '9966332211', 'demo@www.com', 'gfjjh', 'gfjghj', 'ghj', '999666', 27, 1, '1', '11-03-2020 13:30:02 ', NULL, NULL),
(2, 1, 1, NULL, 'uimjvbnm ghj', 'gfjhfgjh', 'ghj', 'fgjh', '8899889988', '9988998899', 'fghfgh@dfg.ghj', 'fgjhfgjh', 'ghj', 'gjh', '578678', 27, 1, '1', '11-03-2020 13:31:07 ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `customer_group_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `customer_group_name` varchar(250) NOT NULL,
  `customer_group_status` int(11) NOT NULL DEFAULT 1,
  `customer_group_addedby` varchar(100) NOT NULL,
  `customer_group_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`customer_group_id`, `company_id`, `customer_group_name`, `customer_group_status`, `customer_group_addedby`, `customer_group_date`) VALUES
(1, 1, 'Demo', 1, '1', '11-03-2020');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `receipt_no` varchar(20) NOT NULL,
  `receipt_date` varchar(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `bill_type` varchar(20) NOT NULL,
  `bill_id` bigint(20) NOT NULL,
  `received_amount` double NOT NULL,
  `balance_amount` double NOT NULL,
  `receipt_status` int(11) NOT NULL DEFAULT 1,
  `receipt_addedby` varchar(100) NOT NULL,
  `receipt_add_date` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `company_id`, `receipt_no`, `receipt_date`, `customer_id`, `bill_type`, `bill_id`, `received_amount`, `balance_amount`, `receipt_status`, `receipt_addedby`, `receipt_add_date`) VALUES
(1, 1, '1', '12-03-2020', 1, '1', 2, 4000, 5500, 1, '1', '2020-03-12 16:26:39'),
(2, 1, '000002', '12-03-2020', 1, '1', 2, 4500, 1000, 1, '1', '2020-03-12 17:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_id` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `user_name` varchar(250) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_otp` varchar(10) DEFAULT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `company_id`, `branch_id`, `role_id`, `user_name`, `user_lastname`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_otp`, `user_status`, `user_addedby`, `user_date`, `is_admin`) VALUES
(1, 1, '', 1, 'Admin', '', 'Kolhapur', 'demo@email.com', '9876543210', '123456', NULL, 'active', 'Admin', '2020-01-08 09:55:02', 1),
(6, 1, '', 2, 'Datta Mane', '', 'Kop', 'datta@mail.com', '9673454383', '123456', NULL, 'active', '1', '2020-02-12 06:56:56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `bill_ch`
--
ALTER TABLE `bill_ch`
  ADD PRIMARY KEY (`bill_ch_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`customer_group_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_ch`
--
ALTER TABLE `bill_ch`
  MODIFY `bill_ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `customer_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
