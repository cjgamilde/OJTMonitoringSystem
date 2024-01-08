-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 06:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `monitoringdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `usertype` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin1', '$2y$10$Ba6eySsVm4b4S48XCJSi0OnaJE4634ksqOiiC6pbR51mz1Ygm84tS', 2),
(2, 'student1', '$2y$10$MUar52G9Zq9OyAcvksMpVu6mDZveLholtdQ7bu4WOgJH6gTWVCd9i', 1),
(3, 'faculty1', '$2y$10$/wlZvHVsdLuQvD8tp0C32OfHksvOXWwxajRLyq2eFACo2aUcUrq1O', 3),
(4, 'coordi1', '$2y$10$rugtMfIrmDQrwaVLatOcQOtcc3UZs5lS7SqbEoOmOVnihidEDGmyu', 4),
(5, 'student2', '$2y$10$npdWIbsDAVagJ.jlD6x7eObjvgMSkVk/TC/Wag7kgENKTMC/mM2Nu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `description`) VALUES
(1, 'student'),
(2, 'admin'),
(3, 'faculty'),
(4, 'coordinator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usertype`
--
ALTER TABLE `usertype`
  ADD CONSTRAINT `usertype_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`usertype`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
