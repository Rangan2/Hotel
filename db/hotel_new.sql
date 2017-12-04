-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 08:04 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_details`
--

CREATE TABLE `city_details` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_details`
--

INSERT INTO `city_details` (`city_id`, `city_name`) VALUES
(1, 'Kolkata '),
(2, 'Siliguri');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`company_id`, `company_name`) VALUES
(1, 'Nokia'),
(2, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_id` int(11) NOT NULL,
  `chk_in_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `purpose_visit` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `pax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_id`, `chk_in_id`, `company_name`, `company_address`, `city`, `nationality`, `purpose_visit`, `contact_no`, `agent_name`, `remark`, `discount`, `age`, `pax`) VALUES
(1, 1000, 'Nokia', 'Darjeeling', '1', 'Indian', 'official', '7278856087', 'Rangan Roy', '', '10', 21, 2),
(2, 1001, 'Altimetrik', 'Siliguri', '1', 'Indian', 'official', '7278856087', 'Indranil Sur', 'Good', '20', 21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer_booking`
--

CREATE TABLE `customer_booking` (
  `booking_cust_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cust_name1` varchar(255) NOT NULL,
  `cust_name2` varchar(255) NOT NULL,
  `cust_name3` varchar(255) NOT NULL,
  `cust_name4` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `chk_in_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `look_in_room` int(11) NOT NULL,
  `look_in_id` int(11) NOT NULL,
  `chk_in_type` varchar(255) NOT NULL,
  `arriving_from` varchar(25) NOT NULL,
  `drstination` varchar(255) NOT NULL,
  `guest_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_booking`
--

INSERT INTO `customer_booking` (`booking_cust_id`, `booking_id`, `cust_name1`, `cust_name2`, `cust_name3`, `cust_name4`, `image1`, `image2`, `image3`, `image4`, `gender`, `chk_in_id`, `date`, `time`, `look_in_room`, `look_in_id`, `chk_in_type`, `arriving_from`, `drstination`, `guest_category`) VALUES
(1, 1, 'Raangan Roy', '', '', '', '11.jpg', '', '', '', 'M', 1000, '21/01/2016', '11:53 pm', 0, 0, '1', 'Kolkata', 'Siliguri', '1'),
(2, 1, 'Sudip Roy', '', '', '', '21.jpg', '', '', '', 'M', 1001, '26/02/2016', '12:48 pm', 0, 0, '1', 'Kolkata', 'Darjeeling', '1');

-- --------------------------------------------------------

--
-- Table structure for table `every_day_details`
--

CREATE TABLE `every_day_details` (
  `detail_id` int(11) NOT NULL,
  `chk_in_id` varchar(255) NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `chk_in_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `every_day_details`
--

INSERT INTO `every_day_details` (`detail_id`, `chk_in_id`, `room_no`, `chk_in_date`) VALUES
(1, '1000', '103,104', '17/03/2016'),
(2, '1001', '202,203', '17/03/2016'),
(3, '1000', '103,104', '18/03/2016'),
(4, '1001', '202,203', '18/03/2016');

-- --------------------------------------------------------

--
-- Table structure for table `new_room_allotment`
--

CREATE TABLE `new_room_allotment` (
  `allotment_id` int(11) NOT NULL,
  `chk_in_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `room_tariff` varchar(200) NOT NULL,
  `extra_bed` varchar(200) NOT NULL,
  `chk_in_date` varchar(200) NOT NULL,
  `advance` varchar(200) NOT NULL,
  `exp_chk_out_date` varchar(200) NOT NULL,
  `pax` varchar(200) NOT NULL,
  `total_advance` varchar(200) NOT NULL,
  `pay_mode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_room_allotment`
--

INSERT INTO `new_room_allotment` (`allotment_id`, `chk_in_id`, `room_no`, `room_tariff`, `extra_bed`, `chk_in_date`, `advance`, `exp_chk_out_date`, `pax`, `total_advance`, `pay_mode`) VALUES
(1, 1000, 104, '1000', '500', '26/02/2016', '300', '2016-02-03', '3', '300', 'cash'),
(2, 1001, 203, '1000', '500', '26/02/2016', '300', '2016-02-29', '3', '300', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `room_allotment`
--

CREATE TABLE `room_allotment` (
  `allotment_id` int(11) NOT NULL,
  `chk_in_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `chk_in_date` varchar(255) NOT NULL,
  `room_tariff` varchar(200) NOT NULL,
  `extra_bed` varchar(200) NOT NULL,
  `advance` varchar(200) NOT NULL,
  `exp_chk_out_date` date NOT NULL,
  `pax` varchar(200) NOT NULL,
  `total_advance` varchar(200) NOT NULL,
  `pay_mode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_allotment`
--

INSERT INTO `room_allotment` (`allotment_id`, `chk_in_id`, `room_no`, `chk_in_date`, `room_tariff`, `extra_bed`, `advance`, `exp_chk_out_date`, `pax`, `total_advance`, `pay_mode`) VALUES
(1, 1000, 103, '22/01/2016', '5000', '200', '2000', '0000-00-00', '2', '', 'cash'),
(2, 1001, 202, '26/02/2016', '1000', '500', '300', '2016-02-28', '3', '', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE `room_master` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_floor` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_ac_type` varchar(255) NOT NULL,
  `room_desc` varchar(255) NOT NULL,
  `room_key_no` varchar(255) NOT NULL,
  `room_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`room_id`, `room_number`, `room_floor`, `room_type`, `room_ac_type`, `room_desc`, `room_key_no`, `room_status`) VALUES
(1, '101', '2', '2', '3', 'T/B  N A/C (M /B S/B', '1456', 'Booked'),
(2, '102', '2', '3', '3', 'T/B  A/C (M /B S/B)', '1234', 'Booked'),
(3, '103', '2', '3', '3', 'T/B  A/C (M /B S/B)', '2345', 'Booked'),
(4, '104', '2', '4', '3', 'D/B  N A/C (M/B)', '4321', 'Booked'),
(5, '201', '3', '1', '3', 'T/B  A/C (M /B S/B)', '2313', 'Maintenance'),
(6, '202', '3', '3', '3', 'T/B  A/C (M /B S/B)', '2213', 'Booked'),
(7, '203', '3', '3', '2', 'T/B  A/C (M /B S/B)', '4453', 'Available'),
(8, '204', '3', '1', '3', 'T/B  A/C (M /B S/B)', '3342', 'Booked'),
(9, '301', '4', '3', '2', 'T/B  A/C (M /B S/B)', '4545', 'Blocked'),
(10, '302', '4', '3', '3', 'T/B  A/C (M /B S/B)', '6634', 'Available'),
(11, '303', '4', '2', '3', 'T/B  A/C (M /B S/B)', '9989', 'Booked'),
(12, '304', '4', '2', '3', 'T/B  A/C (M /B S/B)', '7676', 'Available'),
(13, '001', '1', '3', '3', 'T/B  A/C (M /B S/B)', '0987', 'Booked'),
(14, '002', '1', '3', '3', 'T/B  A/C (M /B S/B)', '9890', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `room_type_master`
--

CREATE TABLE `room_type_master` (
  `room_type_id` int(11) NOT NULL,
  `room_type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type_master`
--

INSERT INTO `room_type_master` (`room_type_id`, `room_type`) VALUES
(1, 'Non Ac Single Room'),
(2, 'Non Ac Single Room'),
(3, 'Non Ac Double Room'),
(4, 'Non Ac Double Room'),
(5, 'Non Ac Triple Room'),
(6, 'A/C Double Room'),
(7, 'A/C Four Room'),
(8, 'A/C Four Room'),
(9, 'A/C Triple Bed Room'),
(10, 'A/C Suit Room'),
(11, 'A/C Suit Room'),
(12, 'A/C Suit Room');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_details`
--
ALTER TABLE `city_details`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_booking`
--
ALTER TABLE `customer_booking`
  ADD PRIMARY KEY (`booking_cust_id`);

--
-- Indexes for table `every_day_details`
--
ALTER TABLE `every_day_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `new_room_allotment`
--
ALTER TABLE `new_room_allotment`
  ADD PRIMARY KEY (`allotment_id`);

--
-- Indexes for table `room_allotment`
--
ALTER TABLE `room_allotment`
  ADD PRIMARY KEY (`allotment_id`);

--
-- Indexes for table `room_master`
--
ALTER TABLE `room_master`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_type_master`
--
ALTER TABLE `room_type_master`
  ADD PRIMARY KEY (`room_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_details`
--
ALTER TABLE `city_details`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_booking`
--
ALTER TABLE `customer_booking`
  MODIFY `booking_cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `every_day_details`
--
ALTER TABLE `every_day_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `new_room_allotment`
--
ALTER TABLE `new_room_allotment`
  MODIFY `allotment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room_allotment`
--
ALTER TABLE `room_allotment`
  MODIFY `allotment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room_master`
--
ALTER TABLE `room_master`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `room_type_master`
--
ALTER TABLE `room_type_master`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
