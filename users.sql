-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 05:44 AM
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
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL COMMENT '''uploads/default.png'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `idnumber`, `lastname`, `firstname`, `middlename`, `course`, `year`, `username`, `password`, `profile_pic`) VALUES
(1, '321321', 'Daguplo', 'Clint', 'o', 'BSIT', '3', 'clint', '$2y$10$poORwX8YK/16OP3Hkc6fSOjEVB/Kx3/hdlIbBL6mFEQXROHu6RbqK', 'uploads/1742445514_default.png'),
(19, '00012', 'daguplo', 'clint', 'C', 'BSIT', '3', 'root', '$2y$10$MplAXGVq8CzKeMGm4NVGS.KWykofnTokxl3XmGZqGkPft60z5gB0m', 'uploads/1741236169_1741235266_defualt.png'),
(21, '00011', 'daguplo', 'client', 'G.', 'BAYUT', '4', 'root', '$2y$10$.2sX6L8ZBkZKxCxfmiW8p.Dh.9PPPObRT9i8.cNjmSv9qTMJcx.02', ''),
(22, '321321', 'ancero', 'gwapo', 'g', 'bsit', '2', 'ancero', '$2y$10$/rayOTkkxOJUibyd4M1okOSgK8BF5tsV8ym.UTUPRtSylKWoRXN3q', '1741236027_default.png'),
(23, '000321', 'J Brone', 'bayut', 'G', 'bsit', '3', 'bayut', '$2y$10$N1GkRclWHw.f.g4ED10CpOc7WuUbCFAGWaMQUxaWVb.uVoZ6B8hKW', '1741236027_default.png'),
(24, '000999', 'bustillo', 'jaromy', 'g', 'BSIT', '3', 'jarom', '$2y$10$/lzcbQ3k94nXHqUjooaMJu5XFMERIOoPQQkVo2HeN2xypB8wColfW', 'uploads/1742609383_defualt.png'),
(25, '011111', 'admin', 'minda', 'a', 'bsca', '1', 'admin', '$2y$10$ADNXSC1rtvOoOoxw9.S.jOUXkliJM7wiNyu0db5CABMvVU7qQKqEW', ''),
(26, '00009', 'daguplo', 'clint', 'g', '1st Year', '2nd Year', 'jbrone', '$2y$10$lwtvnMkqet9dmkozSLdRvOh7SN8s9vZtdRkcYng53nBwy5T3jT0Ke', ''),
(27, '0123', 'wada', 'fuck', 'c', 'BSIT', '4', 'watafuck', '$2y$10$evK.Fp7pSf4czVZd1yfIFub1yY4JXhHriTVFjwsIcc6tQkQvzyDm6', ''),
(28, '0321', 'damskie', 'wew', 'h', 'BSIT', '3rd Year', 'sahh', '$2y$10$RoZ8UMBUjD.Onoe6xcrZreBk.q7VisrMijAkKf79iA6jSNAMdswgu', ''),
(29, '000010', 'Rafaela', 'Allen', 'K', 'BSIT', '3', 'allen', '$2y$10$UtJCr7wApRCWvRL9gEPTaO0jiBjx7mame10dtpVIGoM26dOD8nYZq', 'uploads/1742877603_default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
