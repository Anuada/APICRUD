-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 03:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccv`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `isLogin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountId`, `email`, `username`, `password`, `user_type`, `isLogin`) VALUES
(12, 'Jirah@gmail.com', 'Jirah12', '$2y$10$5SFZU9DJ4dPfeiX3qAA/cOYebolIGXUPELeoYsP.Z7jAIVgMwlv/O', 'users', 0),
(13, 'Ericson@gmail.com', 'Ericson', '$2y$10$yKN4RUmN.2be5VSpBAuXCeZ287tn7uVuF7BNDktYN1CmmueRJr.N6', 'users', 0),
(14, 'Eric@gmail.com', 'Eric45', '$2y$10$.NsQXqqhwYYNUzthSi8e..NQg1K.qyJSMEhMlpcAYpJZWNNiAj9E2', 'youth_leader', 0),
(15, 'Jaylance@gmail.com', 'Jaylance12', '$2y$10$nML4fY3Q2vlT6a8kpcnvWe064n4CWD1LGr/JoXw9wOOUh6RR0W03W', 'youth_leader', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `accountId` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `profileImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookinglawyer`
--

CREATE TABLE `bookinglawyer` (
  `id` int(11) NOT NULL,
  `womanId` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `lawyerId` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `availability_id` int(11) NOT NULL,
  `specialize` varchar(255) DEFAULT NULL,
  `bookingStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lawyeravailability`
--

CREATE TABLE `lawyeravailability` (
  `id` int(11) NOT NULL,
  `Avail_startLtime` time NOT NULL,
  `Avail_EndLtime` time NOT NULL,
  `Avail_Ldate` date NOT NULL,
  `lawyer_Id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leader_upload_events`
--

CREATE TABLE `leader_upload_events` (
  `id` int(11) NOT NULL,
  `youth_leaderId` int(11) NOT NULL,
  `TypeofEvents` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `location` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leader_upload_events`
--

INSERT INTO `leader_upload_events` (`id`, `youth_leaderId`, `TypeofEvents`, `date`, `time_start`, `time_end`, `location`, `Description`) VALUES
(31, 14, 'Worship', '2024-08-31', '13:26:00', '13:25:00', 'ddd', 'ddd'),
(32, 14, 'sss', '2024-08-21', '13:28:00', '13:27:00', 'sadad', 'sadadad'),
(33, 14, 'Instruments', '2024-08-20', '22:27:00', '22:28:00', 'https://www.google.com/maps/place/Lorega+(Lorega+San+Miguel),+Cebu+City,+6000+Cebu/@10.307387,123.89', 'balabapa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `accountId` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `Fblink` varchar(250) NOT NULL,
  `profileImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`accountId`, `fname`, `lname`, `address`, `DOB`, `contactNo`, `Fblink`, `profileImage`) VALUES
(12, 'Jirah', 'Hilaryo', 'Kisang-an Pardo', '2004-10-28', '0988994', '', '12.png'),
(13, 'Ericson', 'Anwada', 'Kisang-an Pardo', '2004-10-18', '09889944', '', '12.png');

-- --------------------------------------------------------

--
-- Table structure for table `youth_joining_event`
--

CREATE TABLE `youth_joining_event` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `youth_leaderId` int(11) NOT NULL,
  `bookingStatus` varchar(100) NOT NULL,
  `typeof_event` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `youth_joining_event`
--

INSERT INTO `youth_joining_event` (`id`, `userId`, `youth_leaderId`, `bookingStatus`, `typeof_event`, `reason`) VALUES
(1, 12, 14, 'Accept', 'sss', 'sahdjsajhsaf'),
(2, 12, 14, 'Pending', 'Instruments', 'wew');

-- --------------------------------------------------------

--
-- Table structure for table `youth_leader`
--

CREATE TABLE `youth_leader` (
  `accountId` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `profileImage` varchar(100) NOT NULL,
  `About` varchar(250) NOT NULL,
  `LicenseImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youth_leader`
--

INSERT INTO `youth_leader` (`accountId`, `fname`, `lname`, `address`, `DOB`, `contactNo`, `profileImage`, `About`, `LicenseImage`) VALUES
(14, 'Eric', 'Andrada', 'lawaan', '2007-02-27', '09546733', '14.png', '', ''),
(15, 'Jaylance', 'Sarmento', 'Kinsang-an Pardo Cebu City', '2024-07-03', '0934694', '15.png', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `bookinglawyer`
--
ALTER TABLE `bookinglawyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `womanId` (`womanId`),
  ADD KEY `lawyerId` (`lawyerId`),
  ADD KEY `availability_id` (`availability_id`);

--
-- Indexes for table `lawyeravailability`
--
ALTER TABLE `lawyeravailability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyerId` (`lawyer_Id`);

--
-- Indexes for table `leader_upload_events`
--
ALTER TABLE `leader_upload_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `youth_leaderId` (`youth_leaderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `youth_joining_event`
--
ALTER TABLE `youth_joining_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `youth_leaderId` (`youth_leaderId`);

--
-- Indexes for table `youth_leader`
--
ALTER TABLE `youth_leader`
  ADD PRIMARY KEY (`accountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookinglawyer`
--
ALTER TABLE `bookinglawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyeravailability`
--
ALTER TABLE `lawyeravailability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leader_upload_events`
--
ALTER TABLE `leader_upload_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `youth_joining_event`
--
ALTER TABLE `youth_joining_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `youth_leader`
--
ALTER TABLE `youth_leader`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `account` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leader_upload_events`
--
ALTER TABLE `leader_upload_events`
  ADD CONSTRAINT `leader_upload_events_ibfk_1` FOREIGN KEY (`youth_leaderId`) REFERENCES `youth_leader` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `account` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `youth_joining_event`
--
ALTER TABLE `youth_joining_event`
  ADD CONSTRAINT `youth_joining_event_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `youth_joining_event_ibfk_2` FOREIGN KEY (`youth_leaderId`) REFERENCES `youth_leader` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `youth_leader`
--
ALTER TABLE `youth_leader`
  ADD CONSTRAINT `youth_leader_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `account` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
