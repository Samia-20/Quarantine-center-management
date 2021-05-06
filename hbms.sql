-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 04:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_id` bigint(20) NOT NULL,
  `type` varchar(150) NOT NULL,
  `ward` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`bed_id`, `type`, `ward`) VALUES
(1, 'Manual', 'Paediatric'),
(5, 'Low Bed', 'Critical Care'),
(7, 'Semi-Electric', 'Pregnancy'),
(8, 'Manual', 'Emergency'),
(9, 'Bariatric', 'Critical Care');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pat_id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(150) NOT NULL,
  `blood_group` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `testdate` date DEFAULT NULL,
  `testresult` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pat_id`, `name`, `age`, `sex`, `blood_group`, `phone`, `testdate`, `testresult`) VALUES
(14, 'sam', 20, 'Female', 'B+ve', '9632712664', '2020-12-25', 'negative'),
(15, 'nitu', 21, 'Female', 'A+', '96325874569', '2020-12-27', 'postive'),
(16, 'sana', 26, 'Female', 'O+', '9632569856', '2020-12-18', 'postive'),
(20, 'abc', 23, 'Male', 'B+ve', '9632712664', '2021-01-16', 'postive'),
(21, 'sama', 12, 'Female', 'b+', '9632712664', '2021-01-28', 'postive');

-- --------------------------------------------------------

--
-- Table structure for table `pat_to_bed`
--

CREATE TABLE `pat_to_bed` (
  `pat_id` bigint(255) NOT NULL,
  `bed_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pat_to_bed`
--

INSERT INTO `pat_to_bed` (`pat_id`, `bed_id`) VALUES
(14, '4'),
(15, 'none'),
(16, 'none'),
(17, '0'),
(18, 'none'),
(19, '7'),
(20, '8'),
(21, '9');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(40) NOT NULL,
  `specialization` varchar(140) NOT NULL,
  `timings` varchar(140) NOT NULL,
  `phno` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `age`, `sex`, `specialization`, `timings`, `phno`) VALUES
(1, 'abc', 30, 'Male', 'Doctor', '9am to 5pm', '9632712664'),
(2, 'keshav', 20, 'Male', 'Nurse', '5pm to 6 am', '9632589632'),
(3, 'lkjhv', 22, 'Female', 'Doctor', '7 to 5', '89632589632'),
(4, 'dsv', 33, 'Transexual', 'Volunteer', '2csmcn', '3698523658'),
(5, 'lamiya', 33, 'Female', 'Doctor', '3 to 9', '365299556561'),
(6, 'abc', 21, 'Male', 'Doctor', '5pm to 6 am', '9098765434');

-- --------------------------------------------------------

--
-- Table structure for table `staff_to_pat`
--

CREATE TABLE `staff_to_pat` (
  `staff_id` varchar(40) NOT NULL,
  `pat_id` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_to_pat`
--

INSERT INTO `staff_to_pat` (`staff_id`, `pat_id`) VALUES
('', NULL),
('', NULL),
('', NULL),
('', 'none'),
('', '16'),
('0', '17'),
('none', '18'),
('none', '19'),
('5', '20'),
('none', '21'),
('6', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `uname` varchar(150) NOT NULL,
  `pword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `uname`, `pword`) VALUES
(1, 'Obi Adaobi', 'ada', 'ada'),
(2, 'Samia', 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `bed_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
