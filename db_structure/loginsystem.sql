-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 02:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
(10, 'Teacher', '', '1');

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
(1, 'admin', 'Minon', 'Alex', 'Benedict', '', 'qwe', 2147483647, 'me@me.me', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, '1', '', '', '');

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
