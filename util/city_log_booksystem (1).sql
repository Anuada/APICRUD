-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 08:57 AM
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
-- Database: `city_log_booksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin_imnida', '$2y$10$rIwNS1i11qu/qWq9.YWOIOjKbusSVlsdDNVsCO91cKtNNasYFSto.', '2024-10-08 06:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_info`
--

CREATE TABLE `visitor_info` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `division` enum('Administrative','Client Support','Technical Support','Developers','GIS') NOT NULL DEFAULT 'Technical Support',
  `type` enum('Employee','Visitor') NOT NULL DEFAULT 'Visitor',
  `status` enum('Pending','Accepted','Cancelled') NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_info`
--

INSERT INTO `visitor_info` (`id`, `employee_id`, `fname`, `lname`, `purpose`, `office`, `division`, `type`, `status`, `date`) VALUES
(1, '12', 'Jonathan', 'Abadia', 'Work at the Office Of The City Agriculturist - General Admin.', 'Office Of The City Agriculturist - General Admin.', 'Client Support', 'Employee', 'Accepted', '2024-10-08 06:56:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_info`
--
ALTER TABLE `visitor_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor_info`
--
ALTER TABLE `visitor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
