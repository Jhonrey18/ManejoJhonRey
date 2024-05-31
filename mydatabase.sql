-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 09, 2024 at 02:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_tbl`
--

CREATE TABLE `list_tbl` (
  `Id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` int(255) NOT NULL,
  `Shift` varchar(255) NOT NULL,
  `Shift_Start` datetime NOT NULL,
  `Shift_End` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `list_tbl`
--

INSERT INTO `list_tbl` (`Id`, `Name`, `Email`, `Address`, `Phone`, `Shift`, `Shift_Start`, `Shift_End`) VALUES
(1, 'jhon rey', 'admin@gmail.com', 'qwertyiiop', 568436, 'Night', '2024-05-31 20:35:00', '2024-05-31 20:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `id` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `account_type`, `id`) VALUES
('Asdfghjkl@gmail.com', '', '', 1),
('qqqq@gmail.com', '123456789', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_tbl`
--
ALTER TABLE `list_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_tbl`
--
ALTER TABLE `list_tbl`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
