-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 12:49 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oops`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`) VALUES
(1, 'Image Studio'),
(2, 'Graphic Design Studio'),
(3, 'Interactive & Multimedia'),
(4, 'Software Development Studio'),
(5, 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'normal user', ''),
(2, 'admin', '{ \r\n\"admin\" : 1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `dept_id`, `username`, `password`, `salt`, `name`, `image`, `groups`) VALUES
(21, 1, 'namosi', '10424c51ac36490bef539b02f184af71514ab1d0ede05f3dacd4adbd8dda3bb7', 'Ä·¨WZ}Åz`øQžs¨ÊÄÅýù…Â‘ÛE~º', 'Namosi Tamrakar', '20171017033153Picture 001.jpg', 2),
(25, 1, 'sumina', '979358e212f2bb9dee1dec4fbdae6af19812c0fcfb1709bd2caf644c5736fba7', '>’EY?¨‰9Ê®ØÒ®8ýãº™ß,(‰¡´ø\\yçÐŒ', 'Sumina Shrestha', '20171017040919Love-Wallpapers-love-33002117-1600-1000.jpg', 1),
(26, 3, 'gagan', '840cbdda6cf51597b1dd0d6025206d80bf26ed6b1d0d8c6a7b90938e568f8ca1', '9\Z{GÁùŸE3!Ëœ’m«¤ð+uK£FxT‚“LKÎL', 'Gagan Pradhan', '20171018114337521963_1404505876431253_76515735_n.jpg', 1),
(27, 1, 'kushal', 'ffa297527ef433dca4a1f71b662d816961550c466de88c8774dd658e18f3c69b', 'ŸÞo•b•J„ÄŽE’ëèS<´Ã©ši)rž’Ìˆ=ù4', 'kushal Maharjan', '20171018115657521963_1404505876431253_76515735_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group` (`groups`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groups`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
