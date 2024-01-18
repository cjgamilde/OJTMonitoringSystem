-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 06:45 AM
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
-- Database: `monitoringdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(50) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL,
  `file` varchar(250) NOT NULL,
  `hours` datetime(6) NOT NULL,
  `dateTimeCreated` datetime(6) NOT NULL,
  `dateTimeUpdated` datetime(6) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(100) NOT NULL,
  `description` varchar(225) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `description`, `date_time_created`, `date_time_updated`) VALUES
(1, 'Sample Announcement', '2024-01-12 09:59:44', '2024-01-12 09:59:44'),
(2, 'Sample Announcement2', '2024-01-12 09:59:44', '2024-01-12 09:59:44'),
(3, 'asdasda', '2024-01-14 21:57:14', '2024-01-14 21:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(50) NOT NULL,
  `studentid` varchar(225) NOT NULL,
  `date` varchar(200) NOT NULL,
  `day` varchar(100) NOT NULL,
  `clockIn` time(6) NOT NULL,
  `clockOut` time(6) NOT NULL,
  `breakIn` time(6) NOT NULL,
  `breakOut` time(6) NOT NULL,
  `totalHrs` datetime(6) NOT NULL,
  `latitude` varchar(225) DEFAULT NULL,
  `longitude` varchar(225) DEFAULT NULL,
  `dateTimeCreated` datetime(6) NOT NULL,
  `dateTimeUpdated` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `studentid`, `date`, `day`, `clockIn`, `clockOut`, `breakIn`, `breakOut`, `totalHrs`, `latitude`, `longitude`, `dateTimeCreated`, `dateTimeUpdated`) VALUES
(1, '1903090', 'Jan-18-2024', 'Thursday', '13:15:00.000000', '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '0000-00-00 00:00:00.000000', '14.6083424', '121.0094596', '2024-01-18 13:15:48.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(225) NOT NULL,
  `file_id` int(225) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(50) NOT NULL,
  `announcements` varchar(100) NOT NULL,
  `attendanceReport` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(50) NOT NULL,
  `studentid` int(50) NOT NULL,
  `reqList` varchar(250) NOT NULL,
  `submissionDeadline` date NOT NULL,
  `dateTimeCreated` datetime(6) NOT NULL,
  `dateTimeUpdated` datetime(6) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `studentid`, `reqList`, `submissionDeadline`, `dateTimeCreated`, `dateTimeUpdated`, `status`) VALUES
(8, 1903090, 'OJT-Monitoring-System-1.pdf', '2024-01-25', '2024-01-17 18:46:41.000000', '0000-00-00 00:00:00.000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `practicuminfo`
--

CREATE TABLE `practicuminfo` (
  `id` int(50) NOT NULL,
  `studentid` varchar(225) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `compAddress` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `supervisorName` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contactNum` int(50) DEFAULT NULL,
  `ojtCoordinator` varchar(100) DEFAULT NULL,
  `practicumHrsreq` int(100) DEFAULT NULL,
  `hiredDate` date DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `dateTimeCreated` datetime(6) DEFAULT NULL,
  `dateTimeUpdated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `practicuminfo`
--

INSERT INTO `practicuminfo` (`id`, `studentid`, `company`, `compAddress`, `department`, `supervisorName`, `position`, `email`, `contactNum`, `ojtCoordinator`, `practicumHrsreq`, `hiredDate`, `startDate`, `dateTimeCreated`, `dateTimeUpdated`) VALUES
(1, '1903090', 'Company', 'Company address', 'Department', 'Supervisor Name', 'Position', 'Email', 13123, 'OJT Coordinator', 100, '2024-01-23', '2024-01-27', NULL, '2024-01-17 00:55:37.000000');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` varchar(50) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
('L0', 'I have not started anything regarding OJT'),
('L1', 'I have applied to HTEs but have not yet been accepted to one'),
('L2', 'I have been accepted in an HTE but I am still fixing my requirements'),
('L3', 'I have been accepted in an HTE and have started my training'),
('L4', 'I am working student and waiting for approval'),
('L5', 'I am working student and have recieved my credeting approval');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(225) NOT NULL,
  `studentid` int(50) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `contactNum` bigint(225) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `yearProg` varchar(100) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dateTimeCreated` datetime(6) DEFAULT NULL,
  `dateTimeUpdated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `studentid`, `image`, `lastName`, `firstName`, `middleName`, `contactNum`, `email`, `college`, `yearProg`, `birthDate`, `gender`, `dateTimeCreated`, `dateTimeUpdated`) VALUES
(2, 1903090, 'received_699050490865588.jpeg', 'Gamit', 'Thaddeus', 'Angeles', 1987, 'thaddeusgamit31@gmail.com', 'SOAST', '4th-year BSIT', '2018-03-31', 'Male', '2024-01-13 12:29:19.000000', '2024-01-16 00:40:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `usertype` int(50) NOT NULL,
  `studentid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `studentid`) VALUES
(1, 'admin1', '$2y$10$MUar52G9Zq9OyAcvksMpVu6mDZveLholtdQ7bu4WOgJH6gTWVCd9i', 2, 0),
(2, '1903090', '$2y$10$MUar52G9Zq9OyAcvksMpVu6mDZveLholtdQ7bu4WOgJH6gTWVCd9i', 1, 0),
(3, 'faculty1', '$2y$10$MUar52G9Zq9OyAcvksMpVu6mDZveLholtdQ7bu4WOgJH6gTWVCd9i', 3, 0),
(4, 'coordi1', '$2y$10$MUar52G9Zq9OyAcvksMpVu6mDZveLholtdQ7bu4WOgJH6gTWVCd9i', 4, 0),
(5, 'student2', '$2y$10$npdWIbsDAVagJ.jlD6x7eObjvgMSkVk/TC/Wag7kgENKTMC/mM2Nu', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `description`) VALUES
(2, 'admin'),
(3, 'faculty'),
(4, 'coordinator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practicuminfo`
--
ALTER TABLE `practicuminfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `practicuminfo`
--
ALTER TABLE `practicuminfo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usertype`
--
ALTER TABLE `usertype`
  ADD CONSTRAINT `usertype_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`usertype`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;