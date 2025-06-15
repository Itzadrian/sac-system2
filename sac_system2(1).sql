-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 03:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sac_system2`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_codes`
--

CREATE TABLE `access_codes` (
  `id` int(11) NOT NULL,
  `sac` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_codes`
--

INSERT INTO `access_codes` (`id`, `sac`) VALUES
(1, 'ABC123XYZ');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sac_codes`
--

CREATE TABLE `sac_codes` (
  `id` int(11) NOT NULL,
  `sac` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sac` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `fullname` varchar(100) DEFAULT NULL,
  `surname` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `other_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `school` varchar(150) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `course_level` varchar(50) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `user_type` enum('student','staff') NOT NULL,
  `id_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `sac`, `password`, `created_at`, `fullname`, `surname`, `middle_name`, `other_name`, `gender`, `dob`, `state`, `lga`, `school`, `department`, `course_level`, `phone`, `address`, `marital_status`, `user_type`, `id_number`) VALUES
(1, 'simeondominic9@gmail.com', 'QWE456', '', '2025-06-08 02:24:09', 'Simeon Nzube Dominic', '', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, '', '', NULL, 'student', ''),
(4, 'simeonadrian22@gmail.com', 'AXE789', '', '2025-06-08 02:30:24', 'Simeon Nzube', '', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, '', '', NULL, 'student', ''),
(5, 'simeonadrian504@gmail.com', '68472636052', '', '2025-06-08 15:54:10', 'Shimasu Philip', '', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, '', '', NULL, 'student', ''),
(7, 'simeonchiemerie@gmail.com', '58923052651', '', '2025-06-08 17:04:41', 'Simeon Chiemerie', '', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, '', '', NULL, 'student', ''),
(8, 'emmanuelnysc@gmail.com', '18258371779', '', '2025-06-10 05:52:23', 'Emmanuel', '', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, '', '', NULL, 'student', ''),
(9, 'simeonagina@gmail.com', '36127646025', '', '2025-06-15 06:59:53', NULL, 'Simeon', 'Agina', 'Godwin', 'Male', '1998-10-01', 'Enugu', 'Aniniri', 'Engineering', 'Civil Engineering', 'Final Year', '08143045241', 'Auchi Edo State', 'Single', 'student', '2017030883');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_codes`
--
ALTER TABLE `access_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sac` (`sac`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sac_codes`
--
ALTER TABLE `sac_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sac` (`sac`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `sac` (`sac`),
  ADD UNIQUE KEY `fullname` (`fullname`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_codes`
--
ALTER TABLE `access_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sac_codes`
--
ALTER TABLE `sac_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
