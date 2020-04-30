-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 09:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terminal_bdis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `branchid`, `firstname`, `lastname`, `username`, `password`, `confirm_password`, `user_type`, `date_added`) VALUES
(1, 1, 'ricky', 'delgado', 'ricky', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Admin', 'Aug 27 2015 11:37 AM'),
(2, 4, 'rolly', 'tanclone', 'rolly', 'admin', 'admin', 'Dispatcher', 'Aug 27 2015 11:37 AM'),
(3, 4, 'jonathan', 'bayhon', 'jonathan', 'admin', 'admin', 'Dispatcher', 'Aug 27 2015 11:38 AM'),
(4, 2, 'elias', 'canete', 'elias', 'admin', 'admin', 'Dispatcher', 'Aug 27 2015 11:38 AM'),
(5, 3, 'rene', 'comaulas', 'rene', 'admin', 'admin', 'Dispatcher', 'Aug 27 2015 11:39 AM'),
(6, 1, 'nexon', 'latumbo', 'nixon', 'admin', 'admin', 'Dispatcher', 'Aug 27 2015 11:40 AM'),
(9, 7, 'Daniel', 'Matosnaga', 'Daniel', 'admin', 'admin', 'Dispatcher', ''),
(10, 8, 'Daniel', 'Bacteria', 'DanielB', 'admin', 'admin', 'Dispatcher', ''),
(11, 2, 'Ace', 'Ventura', 'Ace', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Dispatcher', ''),
(12, 3, 'Ben', 'Tambling', 'Ben', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Dispatcher', ''),
(13, 4, 'Boy', 'Abunda', 'Boy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Dispatcher', ''),
(14, 5, 'Roy', 'Morales', 'Roy', 'admin', 'admin', 'Dispatcher', ''),
(15, 1, 'John paul', 'Trujillo', 'Jhon', 'admin', 'admin', 'Dispatcher', ''),
(16, 3, 'Rowan', 'Atkinson', 'Rowan', 'admin', 'admin', 'Dispatcher', ''),
(17, 1, 'Nonoy', 'Ligaspe', 'Nonoy', 'admin', 'admin', 'Dispatcher', ''),
(18, 4, 'Nikor', 'Kidman', 'Nikor', 'Q¢!ð¸â–g;£Æ÷N', 'admin', 'Dispatcher', '');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchid` int(11) NOT NULL,
  `branch_location` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchid`, `branch_location`, `date_added`) VALUES
(1, 'Kolkata', 'Aug 27 2015 11:36 AM'),
(2, 'Mumbai', 'Aug 27 2015 11:36 AM'),
(3, 'Delhi', 'Aug 27 2015 11:36 AM'),
(4, 'Patna', 'Aug 27 2015 11:37 AM');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` int(11) NOT NULL,
  `bus_number` varchar(100) NOT NULL,
  `bus_type` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `bus_travel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busid`, `bus_number`, `bus_type`, `date_added`, `bus_travel`) VALUES
(3, '113', 'Aircon', 'Aug 29 2015 02:56 PM', 'No'),
(4, '675', 'Economy', 'Aug 29 2015 02:56 PM', 'Yes'),
(5, '355', 'Economy', 'Sep 07 2015 12:46 PM', 'Yes'),
(6, '234', 'Economy', 'Sep 15 2015 04:54 PM', 'No'),
(7, '3542', 'Aircon', 'Sep 17 2015 02:09 PM', 'No'),
(8, '5225', 'Aircon', 'September 22,2015 8:05AM', 'No'),
(9, '5532', 'Economy', 'September 22,2015 8:15AM', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `driver_travel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverid`, `firstname`, `lastname`, `contact_number`, `profile`, `date_added`, `driver_travel`) VALUES
(1, 'Canter ', 'Jacinto', '09226628436', '', 'Sep 15 2015 04:44 PM', 'No'),
(2, 'Sangga', 'Cyril', '09102837465', '', 'Sep 15 2015 04:45 PM', 'Yes'),
(3, 'Saicor', 'Randy', '09101635443', '', 'Sep 15 2015 04:57 PM', 'Yes'),
(4, 'Rodolfo', 'Francisco', '09277407245', '', 'Sep 16 2015 05:53 PM', 'No'),
(5, 'Apolinario', 'Mabini', '092476544382', '', 'September 22,2015 7:51AM', 'No'),
(6, 'Bonie', 'Fernandez', '09193547273', '', 'Sep 22 2015 07:55 AM', 'No'),
(7, 'Alwin', 'Gomez', '09248788675', '', 'Sep 22 2015 07:56 AM', 'No'),
(9, 'Lui', 'Panghilinan', '091227364557', '', 'September 22,2015 8:10AM', 'No'),
(10, 'Cyril', 'Takiyama', '092915243657', '', 'September 22,2015 2:49PM', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `busid` varchar(100) NOT NULL,
  `driverid` varchar(100) NOT NULL,
  `from_location` varchar(100) NOT NULL,
  `destination_location` varchar(100) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `terminal_location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `status_operation` varchar(100) NOT NULL,
  `arrived_at_destination` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `busid`, `driverid`, `from_location`, `destination_location`, `departure_time`, `arrival_time`, `terminal_location`, `status`, `status_operation`, `arrived_at_destination`, `date_added`) VALUES
(1, '3', '1', 'Kolkata', 'Patna', '2015-10-06 15:39:38', '2015-10-06 15:42:11', 'Patna', 'Arrived at Patna', 'Arrived', 'YES', '2015-10-06 15:39:38'),
(2, '4', '2', 'Patna', 'Kolkata', '2015-10-06 15:39:43', '2015-10-06 15:40:53', 'Kolkata', 'Arrived at Kolkata', 'Arrived', 'YES', '2015-10-06 15:39:43'),
(3, '3', '1', 'Kolkata', 'Patna', '2015-10-06 15:50:53', '2015-10-06 16:26:18', 'Patna', 'Arrived at Patna', 'Cancelled', 'YES', '2015-10-06 15:50:53'),
(4, '4', '2', 'Kolkata', 'Patna', '2015-10-06 16:02:59', '0000-00-00 00:00:00', 'Travel', 'Travel', 'On Travel', 'Not Yet', '2015-10-06 16:02:59'),
(5, '5', '3', 'Patna', 'Kolkata', '2015-10-06 16:24:40', '0000-00-00 00:00:00', 'Travel', 'Travel', 'On Travel', 'Not Yet', '2015-10-06 16:24:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `busid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
