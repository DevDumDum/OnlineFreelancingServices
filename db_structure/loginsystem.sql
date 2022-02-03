-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 02:27 PM
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
  `accepted` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `poster_ID`, `profession_ID`, `worker_count`, `requirements`, `location`, `status`, `min_pay`, `max_pay`, `timestamp`, `applicants`, `accepted`) VALUES
(1, 36, 1, 1, 'Hindi ko din alam eh.', 'Samin lang naman.', 1, NULL, 5, 1640257501, '41', NULL),
(2, 5, 2, 1, 'Di ko lang sure.', 'Teka hanapin ko lang.', 1, 1, 1, 1640257255, NULL, NULL),
(3, 36, 1, 1, 'Kung ano sabihin ko yung ang susundin mo!', 'Dito dito lang.', 1, 5, 5, 1640256666, NULL, NULL),
(5, 1, 1, 1, '', '', 0, NULL, 1, 1640414463, NULL, NULL),
(6, 1, 1, 3, 'asd', 'imus', 1, NULL, 100, 1640414513, '36', NULL),
(7, 1, 2, 3, 'jlkj', 'imus', 1, NULL, 100, 1640436902, NULL, NULL),
(8, 36, 3, 3, 'asddks;a', 'imus', 1, NULL, 100, 1640437813, NULL, NULL),
(12, 39, 3, 1, 'asd', 'imus', 1, NULL, 2000, 1641628001, NULL, NULL),
(13, 36, 4, 1, 'asd', 'cavite', 1, NULL, 2000, 1641965142, NULL, NULL),
(14, 36, 1, 5, 'sana magaling gumawa ng upuan', 'imus', 1, NULL, 5000, 1642967071, NULL, NULL),
(15, 41, 11, 3, 'malakas sumigaw', 'imus', 1, NULL, 5000, 1643026331, NULL, NULL),
(16, 36, 11, 1, 'Requirement 1', 'Location 1', 1, NULL, 2, 1643866387, NULL, NULL);

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
(10, 'Teacher', '', '1'),
(11, 'Taho vendor', 'nasigaw ng tahooo', '1'),
(12, 'Websighter', 'natingin ng website', '1'),
(13, 'taho vendor', 'aslkja', '1');

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
  `ratings` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `last_name`, `first_name`, `middle_name`, `full_name`, `password`, `contact`, `email`, `profession_id`, `feature_list_id`, `education_id`, `location`, `summary`, `calendarlist_id`, `status`, `code`, `jobs`, `posts`, `apply`, `ratings`) VALUES
(1, 'user', 'Sisante', 'Ian', 'asd', 'Ian asd Sisante', 'asd', 2147483647, 'iansisante@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(2, 'user', 'Aren', 'Mark', '', 'Mark Aren', 'asd', 2147483647, 'mark.aren@mail.me', '1,2,3', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(3, 'admin', 'Minon', 'Alex', 'Benedict', 'Alex Benedict Minon', 'qwe', 2147483647, 'me@me.me', '1,2,3', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(4, 'user', 'Agapor', 'Rachelle', 'Ann', ' Rachelle Ann Agapor', '321', 2147483647, 'rachelle@mail.ann', '1,2,3', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(5, 'user', 'Guzman', 'Franco', 'De', 'Franco De Guzman', 'qqq', 2147483647, 'franqq@q.q', '1,2,3', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(6, 'user', 'dsa', 'asd', 'xxx', 'asd xxx dsa', 'ddd', 1111111111, 'Anecitatempra@yahoo.com', '1,2,3', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(9, 'moderator', '', '', NULL, '', '123', NULL, 'mark.aren@aren.me', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(10, 'moderator', '', '', NULL, '', 'xxx', NULL, 'alex@lex.x', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(11, 'moderator', '', '', NULL, '', '123', NULL, 'bbp@p.b', '', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(14, 'user', 'el', 'al', 'il', 'al il el', '123456', 2147483647, 'boy2pasaway0@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(16, 'user', 'el', 'al', 'il', 'al il el', '123456', 2147483647, 'yoru@gamil.com', '1,2,3', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(17, 'user', 'sadaw', 'asdaw', 'sadaw', 'asdaw sadaw sadaw', '123456', 2147483647, 'awaw@gaw.com', '1,2,3', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(18, 'user', 'as', 'as', 'wad', 'as wad as', '123456', 2147483647, 'yoru@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(19, 'user', 'el', 'al', 'il', 'al il el', '123456', 2147483647, 'jebronlam@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(20, 'user', 'el', 'al', 'il', 'al il el', '123456', 2147483647, 'ur@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(21, 'user', 'as', 'asdaw', 'qwewq', 'asdaw qwewq as', '123456', 2147483647, 'aawy@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(22, 'user', 'el', 'al', 'il', 'al il el', '123456', 2147483647, 'lomi@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(34, 'user', 'el', 'al', 'il', 'al il el', '123456', 2147483647, 'alexandreeminion@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '1', 'GtQBS3TRmzf1', NULL, NULL, NULL, NULL),
(36, 'user', 'Sisante', 'Ian', '', 'Ian Sisante', '123', 2147483647, 'ian.sisante@tup.edu.ph', '1,2,3', NULL, NULL, '', NULL, NULL, '1', 'j5QXhb1mFZNx', NULL, NULL, '6', NULL),
(39, 'user', 'Cabutaje', 'Mark', 'Allen', 'Mark Allen Cabutaje', 'qwe', 2147483647, 'asd@gmail.com', '1,2,3', NULL, NULL, '', NULL, NULL, '1', 'b4RKhrzCp2uN', NULL, NULL, NULL, NULL),
(40, 'user', 'kabutski', 'maku', '', 'maku kabutski', 'asd', 982137868, 'mme@mdm.com', '5,11,12', NULL, NULL, '', NULL, NULL, NULL, 'a1r9u7Yxtkq8', NULL, NULL, NULL, NULL),
(41, 'user', 'carlos', 'juan', '', 'juan carlos', '123', 947198273, 'markallencabutaje00@gmail.com', '1,5,11', NULL, NULL, '', NULL, NULL, '1', 'YzFGQV4gtorw', NULL, NULL, '1', NULL);

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
(21, 'profession', 12, 3, NULL),
(22, 'user', 40, 3, NULL),
(23, 'profession', 11, 0, NULL),
(24, 'user', 41, 0, NULL);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
