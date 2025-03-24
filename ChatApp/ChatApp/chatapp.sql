-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 08:07 AM
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
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1540377303, 268930095, 'hi'),
(2, 268930095, 1540377303, 'yooooo'),
(3, 1540377303, 268930095, 'my guy'),
(4, 1540377303, 268930095, 'ayyyyyyyyy'),
(5, 1540377303, 268930095, 'yyyyy'),
(6, 268930095, 1540377303, 'yayyyyy'),
(7, 1540377303, 268930095, 'hey bro'),
(8, 268930095, 1540377303, 'hi broooooooooooooooo'),
(9, 268930095, 1540377303, 'ayyy'),
(10, 268930095, 1540377303, 'hh'),
(11, 268930095, 1540377303, 'hi'),
(12, 1540377303, 268930095, 'hi I am Waleed'),
(13, 268930095, 1540377303, 'broooo'),
(14, 1540377303, 268930095, 'hi'),
(15, 1540377303, 268930095, 'hey'),
(17, 268930095, 1540377303, 'hi'),
(18, 268930095, 1542339291, 'hiii'),
(19, 1540377303, 1542339291, 'hey'),
(20, 1540377303, 1542339291, 'yo'),
(21, 1542339291, 1540377303, 'yo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(1, 1540377303, 'Ali', 'Ahmad', 'ali.ahmad@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'Active now'),
(2, 268930095, 'Waleed', 'Sultan', 'waleed.sultan@gmail.com', 'b4af804009cb036a4ccdc33431ef9ac9', 'Active now'),
(6, 1542339291, 'Maam', 'Afrah', 'afrah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Active now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
