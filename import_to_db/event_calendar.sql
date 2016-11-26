-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 11:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `start` varchar(128) NOT NULL,
  `url` varchar(512) DEFAULT NULL,
  `end` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `url`, `end`) VALUES
(8, 'All Day Event', '2016-09-01', '', NULL),
(9, 'Long Event', '2016-09-07', '', '2016-09-10'),
(10, 'Repeating Event', '2016-09-09T16:00:00', NULL, NULL),
(11, 'Conference', '2016-09-11', '2016-09-13', NULL),
(12, 'Meeting', '2016-09-12T10:30:00', '2016-09-12T12:30:00', NULL),
(13, 'Lunch', '2016-09-12T12:00:00', NULL, NULL),
(14, 'Meeting', '2016-09-12T14:30:00', NULL, NULL),
(15, 'Happy Hour', '2016-09-12T17:30:00', NULL, NULL),
(16, 'Dinner', '2016-09-12T20:00:00', NULL, NULL),
(17, 'Birthday Party', '2016-09-13T07:00:00', NULL, NULL),
(18, 'Click for Google', '2016-09-28', 'http://google.com/', NULL),
(19, 'TestEvent', '2016-11-30', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
