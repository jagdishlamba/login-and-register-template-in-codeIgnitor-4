-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 05:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(3, 'KAPIL', 'KAPIL@GMAIL.COM', '9876543210', 'I need 100 pents and  100 t-shirts for my academy'),
(6, 'abc', 'abcgmais@gmail.com', '7884544', 'fs,g.jfxgugfg,mxgjfdgfdg'),
(12, 'ram singh', 'ramsingh@gmail.com', '7858777', 'i need 200 pents');

-- --------------------------------------------------------

--
-- Table structure for table `s_question`
--

CREATE TABLE `s_question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_question`
--

INSERT INTO `s_question` (`id`, `question`) VALUES
(1, 'What is your pet name?'),
(2, 'What is your village name?'),
(3, 'What is your favourite color?'),
(4, 'What is your favourite place?');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `s_question` int(11) NOT NULL,
  `s_answer` text NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `s_question`, `s_answer`, `priority`) VALUES
(1, 'ram', '$2y$10$nPvCYZ1M4Och52PFSUaLn.1pog15ntyOl5FUxsEmkNJwgizMYOTeO', 1, 'tommy', 1),
(2, 'user', '$2y$10$0HSKw5oByJuJMhASQKfareOA3QwhJYyRdHpNA7itplt/DKm8T9iBe', 1, '123', 2),
(3, 'guest', '$2y$10$nPNZQdCON1HAZDnLItLcHuGk3c0FZmnywGEjyABfgRBuOnB.dE5Gm', 1, '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `useractivity`
--

CREATE TABLE `useractivity` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ip` text NOT NULL,
  `browser` text NOT NULL,
  `os` text NOT NULL,
  `loginTime` datetime NOT NULL,
  `logoutTime` datetime NOT NULL,
  `sessionId` varchar(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_question`
--
ALTER TABLE `s_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useractivity`
--
ALTER TABLE `useractivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `useractivity`
--
ALTER TABLE `useractivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
