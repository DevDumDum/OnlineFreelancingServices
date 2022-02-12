-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 04:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(10) NOT NULL,
  `poster_ID` int(10) NOT NULL,
  `profession_ID` int(10) NOT NULL,
  `worker_count` int(10) NOT NULL DEFAULT 1,
  `requirements` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `min_pay` int(11) DEFAULT NULL,
  `max_pay` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `applicants` varchar(255) DEFAULT NULL,
  `accepted` varchar(255) DEFAULT NULL,
  `email_client` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `poster_ID`, `profession_ID`, `worker_count`, `requirements`, `location`, `status`, `min_pay`, `max_pay`, `timestamp`, `applicants`, `accepted`, `email_client`) VALUES
(1, 2, 7, 10, '1 year of experience', 'Naic', 1, 0, 30000, 1644632554, '3', NULL, 0),
(2, 2, 5, 55, 'With 3 years of experience', 'Pasay', 1, 10000, 50000, 1644632652, '3', NULL, 0),
(3, 3, 2, 10, 'No prior requirements', 'Imus', 1, NULL, 12, 1644634688, NULL, NULL, 0),
(4, 4, 2, 4, 'None', 'Taguig', 1, NULL, 15000, 1644636256, NULL, NULL, 0),
(5, 4, 4, 3, 'None', 'Taguig', 1, NULL, 12000, 1644636296, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `ID` int(11) NOT NULL,
  `profession_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`ID`, `profession_type`, `description`, `status`) VALUES
(1, 'Carpenter', '', '1'),
(2, 'Accountant', '', '1'),
(3, 'Architect', '', '1'),
(4, 'Cashier', '', '1'),
(5, 'Web Developer', '', '1'),
(6, 'Cleaner', '', '1'),
(7, 'Data Encoder', '', '1'),
(8, 'Electrician', '', '1'),
(9, 'Engineer', '', '1'),
(10, 'Teacher', '', '1'),
(11, 'Taho Vendor', 'The one who yells', '0'),
(12, 'Clerk', 'The one who thanks', '0');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_reported` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ID`, `type`, `id_reported`, `user_id`, `description`, `status`) VALUES
(1, 'report-p', 1, 3, 'Inactive', NULL),
(2, 'report-u', 2, 3, 'Inactive', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `profession_id` varchar(255) NOT NULL,
  `feature_list_id` varchar(255) DEFAULT NULL,
  `education_id` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `calendarlist_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `code` varchar(20) NOT NULL,
  `jobs` varchar(255) DEFAULT NULL,
  `posts` varchar(255) DEFAULT NULL,
  `apply` varchar(255) DEFAULT NULL,
  `ratings` varchar(255) DEFAULT NULL,
  `accepted` varchar(255) DEFAULT NULL,
  `ValidId` text NOT NULL,
  `ProfPic` text NOT NULL,
  `ProfBanner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `last_name`, `first_name`, `middle_name`, `full_name`, `password`, `contact`, `email`, `profession_id`, `feature_list_id`, `education_id`, `location`, `summary`, `calendarlist_id`, `status`, `code`, `jobs`, `posts`, `apply`, `ratings`, `accepted`, `ValidId`, `ProfPic`, `ProfBanner`) VALUES
(1, 'admin', 'Minon', 'Alex', 'Benedict', '', 'qwe', 2147483647, 'me@me.me', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, '1', '', '', ''),
(2, 'user', 'Sisante', 'Ian', '', 'Ian  Sisante', '123', 2147483647, 'ian.sisante@tup.edu.ph', '7,11,12', NULL, NULL, '', NULL, NULL, '1', 'ezobx6KGD81B', NULL, NULL, NULL, NULL, NULL, '', 'profile_pic.jpg', 'cover_pic.png'),
(3, 'user', 'Cabutaje', 'Mark', 'Malabanan', 'Mark Malabanan Cabutaje', '123', 2147483647, 'markallen.cabutaje@tup.edu.ph', '9', NULL, NULL, '', NULL, NULL, '1', 'ESTAYjCHDMbp', NULL, NULL, '2', NULL, NULL, 'valid_id.jpg', 'profile_pic.jpg', 'cover_pic.png'),
(4, 'user', 'Agapor', 'Rachelle', 'Ann', 'Rachelle Ann Agapor', '234', 2147483647, 'rachelleann.agapor@tup.edu.ph', '2', NULL, NULL, '', NULL, NULL, '1', 'vO5k32U4lPTX', NULL, NULL, NULL, NULL, NULL, 'valid_id.jpg', 'profile_pic.jpg', 'cover_pic.png'),
(5, 'user', 'Perpetua', 'Alyssa', '', 'Alyssa  Perpetua', '321', 2147483647, 'alyssa.perpetua@tup.edu.ph', '', NULL, NULL, '', NULL, NULL, '-1', 'mduFxt1SIOn8', NULL, NULL, NULL, NULL, NULL, 'valid_id.png', '', ''),
(6, 'user', 'Gomez', 'Aileen', '', 'Aileen  Gomez', '432', 2147483647, 'aileen.gomez@tup.edu.ph', '10', NULL, NULL, '', NULL, NULL, NULL, 'Tvj9WZ5zORiY', NULL, NULL, NULL, NULL, NULL, 'valid_id.jpg', '', ''),
(7, 'moderator', '', '', NULL, '', 'ewq', NULL, 'me2@me.me', '', NULL, NULL, '', NULL, NULL, '0', 'uTQpkhEaoIi6', NULL, NULL, NULL, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `ID` int(11) NOT NULL,
  `verification_type` varchar(50) NOT NULL,
  `content_ID` int(11) NOT NULL,
  `viewer_id` int(11) DEFAULT NULL,
  `img_loc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`ID`, `verification_type`, `content_ID`, `viewer_id`, `img_loc`) VALUES
(1, 'profession', 11, 7, NULL),
(2, 'profession', 12, 7, NULL),
(3, 'user', 2, 0, NULL),
(4, 'user', 3, 0, NULL),
(5, 'report-p', 1, 7, NULL),
(6, 'report-u', 2, NULL, NULL),
(7, 'user', 4, 0, NULL),
(8, 'user', 5, 0, NULL),
(9, 'user', 6, 1, NULL),
(10, 'moderator', 7, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
