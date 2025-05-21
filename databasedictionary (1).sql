-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 07:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasedictionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adminmail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adminpass` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adminstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `adminmail`, `adminpass`, `adminstatus`) VALUES
(2, 'taksh dange', 'td@gmail.com', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `regd` date NOT NULL,
  `empstatus` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `totalleave` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `ename`, `email`, `password`, `phoneno`, `dob`, `regd`, `empstatus`, `desig`, `totalleave`, `salary`) VALUES
(1, 'John A', 'ja@gmail.com', '12345', '0000000000', '2023-04-16', '2023-04-17', 'Programmer', 'JA', 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `id` int(6) UNSIGNED NOT NULL,
  `leavereason` varchar(255) NOT NULL,
  `leavedatestart` date NOT NULL,
  `leavedateend` date NOT NULL,
  `leavestatus` varchar(50) NOT NULL,
  `empid` int(6) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vc`
--

CREATE TABLE `vc` (
  `id` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` text NOT NULL,
  `emp_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vc`
--

INSERT INTO `vc` (`id`, `emp_id`, `reason`, `date_start`, `date_end`, `status`, `emp_name`) VALUES
(NULL, 2, 'ABC', '2023-04-26', '2023-04-29', 'approved', 'Aaa'),
(NULL, 3, 'SICK', '2023-04-10', '2023-04-13', 'approved', 'John B'),
(NULL, 1, 'SICK', '2023-04-09', '2023-04-28', 'approved', 'John S'),
(NULL, 1, 'SICK', '2023-04-09', '2023-04-13', 'approved', 'John A'),
(NULL, 1, 'SICK', '2023-04-17', '2023-04-11', 'approved', 'John C'),
(NULL, 1, 'SICK', '2023-04-17', '2023-04-22', 'approved', 'John A');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `workid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `design` varchar(50) NOT NULL,
  `task` text NOT NULL,
  `wstatus` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`workid`, `empid`, `design`, `task`, `wstatus`, `status`) VALUES
(8, 1, 'JA', 'Make a webiste', 'Assigned', 'complete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`workid`),
  ADD KEY `empid` (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `workid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
