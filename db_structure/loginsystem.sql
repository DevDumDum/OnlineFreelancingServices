-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 08:33 AM
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

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `poster_ID`, `profession_ID`, `worker_count`, `requirements`, `location`, `status`, `min_pay`, `max_pay`, `timestamp`, `applicants`, `accepted`, `email_client`) VALUES
(1, 36, 1, 1, 'Hindi ko din alam eh.', 'Samin lang naman.', 1, NULL, 5, 1640257501, '1', '1', 1),
(2, 5, 2, 1, 'Di ko lang sure.', 'Teka hanapin ko lang.', 0, 1, 1, 1640257255, '36', NULL, 0),
(3, 36, 1, 1, 'Kung ano sabihin ko yung ang susundin mo!', 'Dito dito lang.', 1, 5, 5, 1640256666, '1', NULL, 0),
(5, 1, 1, 1, '', '', 0, NULL, 1, 1640414463, '36', '36', 0),
(6, 1, 1, 3, 'asd', 'imus', 0, NULL, 100, 1640414513, '36,1,40', '36,1', 1),
(7, 1, 2, 3, 'jlkj', 'imus', -1, NULL, 100, 1640436902, NULL, NULL, 0),
(8, 36, 3, 3, 'asddks;a', 'imus', 1, NULL, 100, 1640437813, '1', NULL, 1),
(12, 39, 1, 1, 'asd', 'imus', -1, NULL, 2000, 1641628001, NULL, NULL, 0),
(13, 36, 1, 1, 'asd', 'cavite', 1, NULL, 2000, 1641965142, NULL, NULL, 0),
(14, 1, 5, 1, 'Gawin moto', 'PPC', 0, 90, 100, 1643720630, '2', '2', 0),
(15, 40, 2, 1, 'Kailangan magaling mag plus', 'dito', 0, NULL, 10000, 1643730179, NULL, NULL, 0);

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
(0, 'Select', 'none', '1'),
(1, 'Carpenter', '', '1'),
(2, 'Accountant', '', '1'),
(3, 'Architect', '', '1'),
(4, 'Cashier', '', '1'),
(5, 'Web Developer', '', '1'),
(6, 'Cleaner', '', '0'),
(7, 'Data Encoder', '', '0'),
(8, 'Electrician', '', '0'),
(9, 'Engineer', '', '0'),
(10, 'Teacher', '', '0'),
(11, 'sdfsdf', 'sdfsdf', '-1'),
(12, 'Dev', '123', '1'),
(13, 'Test Dev', 'Test', '1'),
(14, 'sdf', '123', '0'),
(15, 'Tita', 'Opo', '1');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ID` int(11) NOT NULL,
  `id_reported` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ID`, `id_reported`, `user_id`, `description`, `status`) VALUES
(1, 7, 36, 'as', NULL),
(3, 12, 36, 'sad', NULL),
(4, 14, 36, 'saaaaad', NULL);

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
  `accepted` tinyint(1) NOT NULL DEFAULT 1,
  `ValidId` text NOT NULL,
  `ProfPic` text NOT NULL,
  `ProfBanner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `last_name`, `first_name`, `middle_name`, `full_name`, `password`, `contact`, `email`, `profession_id`, `feature_list_id`, `education_id`, `location`, `summary`, `calendarlist_id`, `status`, `code`, `jobs`, `posts`, `apply`, `ratings`, `accepted`, `ValidId`, `ProfPic`, `ProfBanner`) VALUES
(1, 'user', 'Sisante', 'Ian', 'asd', '', 'asd', 2147483647, 'iansisante@gmail.com', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, '8', NULL, 1, '', '', ''),
(2, 'user', 'Aren', 'Mark', '', '', 'asd', 2147483647, 'mark.aren@mail.me', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(3, 'admin', 'Minon', 'Alex', 'Benedict', '', 'qwe', 2147483647, 'me@me.me', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(4, 'user', 'Agapor', 'Rachelle', 'Ann', '', '321', 2147483647, 'rachelle@mail.ann', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(5, 'user', 'Guzman', 'Franco', 'De', '', 'qqq', 2147483647, 'franqq@q.q', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(6, 'user', 'dsa', 'asd', 'xxx', '', 'ddd', 1111111111, 'Anecitatempra@yahoo.com', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(9, 'moderator', '', '', NULL, '', '123', NULL, 'mark.aren@aren.me', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(10, 'moderator', '', '', NULL, '', 'xxx', NULL, 'alex@lex.x', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(11, 'moderator', '', '', NULL, '', '123', NULL, 'bbp@p.b', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(14, 'user', 'el', 'al', 'il', '', '123456', 2147483647, 'boy2pasaway0@gmail.com', '', NULL, NULL, '', NULL, NULL, '-1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(16, 'user', 'el', 'al', 'il', '', '123456', 2147483647, 'yoru@gamil.com', '', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(17, 'user', 'sadaw', 'asdaw', 'sadaw', '', '123456', 2147483647, 'awaw@gaw.com', '', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(18, 'user', 'as', 'as', 'wad', '', '123456', 2147483647, 'yoru@gmail.com', '', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(19, 'user', 'el', 'al', 'il', '', '123456', 2147483647, 'jebronlam@gmail.com', '', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(20, 'user', 'el', 'al', 'il', '', '123456', 2147483647, 'ur@gmail.com', '', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(21, 'user', 'as', 'asdaw', 'qwewq', '', '123456', 2147483647, 'aawy@gmail.com', '', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(22, 'user', 'el', 'al', 'il', '', '123456', 2147483647, 'lomi@gmail.com', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, 1, '', '', ''),
(34, 'user', 'el', 'al', 'il', '', '123456', 2147483647, 'alexandreeminion@gmail.com', '', NULL, NULL, '', NULL, NULL, '1', 'GtQBS3TRmzf1', NULL, NULL, NULL, NULL, 1, '', '', ''),
(36, 'user', 'Sisante', 'Ian', '', '', '123', 2147483647, 'ian.sisante@tup.edu.ph', '', NULL, NULL, '', NULL, NULL, '1', 'j5QXhb1mFZNx', '2,5', NULL, NULL, NULL, 1, '', '', 'cover_pic.jpg'),
(39, 'user', 'Cabutaje', 'Mark', 'Allen', '', 'qwe', 2147483647, 'asd@gmail.com', '', NULL, NULL, '', NULL, NULL, '1', 'b4RKhrzCp2uN', NULL, NULL, NULL, NULL, 1, '', '', ''),
(40, 'user', 'Cay', 'Mark', 'G', '', '123', 2147483647, 'markcay@gmail.com', '2,11', NULL, NULL, '', NULL, NULL, '1', 'bMxRdegjIXN6', NULL, NULL, '6', NULL, 1, '', 'profile_pic.png', 'cover_pic.png'),
(41, 'user', 'df', 'asdfs', 'asdf', '', '123', 2147483647, 'mar3kcay@gmail.com', '1,12', NULL, NULL, '', NULL, NULL, '1', 'dkmUEoPb7At4', NULL, NULL, NULL, NULL, 1, 'valid_id.png', '', ''),
(42, 'user', 'Jfhsdu', 'Pampoo', 'Hdjj', '', '123', 2147483647, 'caymarkgabrielle@gmail.com', '5,13', NULL, NULL, '', NULL, NULL, '-1', '8pacevO6hHAr', NULL, NULL, NULL, NULL, 1, 'valid_id.png', '', ''),
(43, 'user', 'sdf', 'dsfsdf', 'sdf', '', '123', 2147483647, 'morkcoy@gmail.com', '2,14', NULL, NULL, '', NULL, NULL, NULL, 'Sskm6rPROQeL', NULL, NULL, NULL, NULL, 1, 'valid_id.png', '', ''),
(44, 'user', 'sdf', 'adsf', 'sdf', '', '123', 2147483647, 'mar3kcady@gmail.com', '2,15', NULL, NULL, '', NULL, NULL, NULL, 'w8kgU1h7pxdG', NULL, NULL, NULL, NULL, 1, '', '', ''),
(45, 'user', 'jksdfj', 'sdfkjnbb', 'sdhfkjhdf', '', '123', 2147483647, 'mar3kcady@gmail.comsdf', '1,11', NULL, NULL, '', NULL, NULL, NULL, 'mCZYV9h36cAH', NULL, NULL, NULL, NULL, 1, 'valid_id.png', 'profile_pic.png', 'cover_pic.png'),
(46, 'user', 'lkjaslkj', 'asas', 'zxkcb', '', '123', 915887612, 'markallencabutaje00@gmail.com', '5', NULL, NULL, '', NULL, NULL, NULL, 'fMem1qoWuySP', NULL, NULL, NULL, NULL, 1, 'valid_id.jpg', '', ''),
(47, 'user', 'zxiucy', 'akjhs', 'mnabs', '', '123', 98712368, 'kajs@kajsh.com', '3', NULL, NULL, '', NULL, NULL, NULL, 'OAvWoDrGTUhi', NULL, NULL, NULL, NULL, 1, 'valid_id.jpg', '', ''),
(48, 'user', 'hjksa', 'klajs', '', '', '123', 91284, 'alsk@me.com', '5', NULL, NULL, '', NULL, NULL, NULL, 'pc2syiNTaze7', NULL, NULL, NULL, NULL, 1, 'valid_id.jpg', '', '');

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
(1, 'user', 1, 0, NULL),
(2, 'user', 2, 0, NULL),
(4, 'user', 4, 0, NULL),
(5, 'user', 5, 0, NULL),
(6, 'user', 6, 0, NULL),
(9, 'moderator', 9, 0, NULL),
(10, 'moderator', 10, 0, NULL),
(11, 'moderator', 11, 0, NULL),
(12, 'user', 32, 0, NULL),
(13, 'user', 33, 0, NULL),
(14, 'user', 34, 0, NULL),
(15, 'user', 35, 0, NULL),
(16, 'user', 36, 0, NULL),
(18, 'user', 38, 0, NULL),
(19, 'user', 39, 0, NULL),
(20, 'profession', 11, 0, NULL),
(21, 'user', 40, 0, NULL),
(22, 'profession', 12, 0, NULL),
(23, 'user', 41, 0, NULL),
(24, 'profession', 13, 0, NULL),
(25, 'user', 42, 0, NULL),
(26, 'profession', 14, 3, NULL),
(27, 'user', 43, 3, NULL),
(28, 'profession', 15, 0, NULL),
(29, 'user', 45, 3, NULL),
(30, 'user', 46, 3, NULL),
(31, 'user', 47, 3, NULL),
(32, 'user', 48, 3, NULL),
(33, 'report-p', 1, 3, NULL),
(35, 'report-p', 3, 3, NULL),
(36, 'report-u', 4, 0, NULL);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
