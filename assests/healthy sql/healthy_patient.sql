-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 07:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthy_patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `service_type` varchar(250) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL,
  `appointement_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `user_id`, `user_name`, `user_email`, `service_type`, `time`, `message`, `appointement_status`) VALUES
(1, 1, 'mohammed', 'melhachimi514@gmail.com', 'Nursing care', '12PM TO 2PM', 'test', 'Accepted'),
(2, 7, 'ahmed', 'ahmed@gmail.com', 'Nursing care', '6PM TO 8PM', 'hi doc', 'Decline'),
(3, 1, 'mohammed', 'melhachimi514@gmail.com', 'Nursing care', '10 AM TO 12PM', 'hi doc', 'Declined'),
(4, 1, '', '', '1', '', '', 'On Hold'),
(5, 1, '', '', '1', '', '', 'On Hold'),
(6, 1, '', '', '1', '', '', 'On Hold'),
(7, 1, '', '', '1', '', '', 'On Hold'),
(8, 1, '', '', '1', '', '', 'On Hold'),
(9, 1, '', '', '1', '', '', 'On Hold'),
(10, 1, '', '', '1', '', '', 'On Hold'),
(11, 1, '', '', '1', '', '', 'On Hold'),
(12, 1, '', '', '1', '', '', 'On Hold'),
(13, 1, 'medo', 'melhachimi514@gmail.com', 'Nursing care', '2PM TO 4PM', 'fuck off dock', 'On Hold'),
(14, 1, 'medo', 'melhachimi514@gmail.com', 'Nursing care', '6PM TO 8PM', 'fu', 'On Hold');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `user_id`, `firstname`, `email`, `comment`) VALUES
(1, 1, 'mohammed', 'melhachimi514@gmail.com', 'uhudhudhduh'),
(2, 1, 'fihfihf', 'fihifhiff', 'ucgucguc'),
(3, 1, 'idhidhid', 'dgugdugd', 'dihihdhdi'),
(4, 1, '', '', ''),
(5, 1, '', 'hhh', ''),
(6, 1, '', '', ''),
(7, 1, '', '', ''),
(8, 1, '', '', ''),
(9, 1, 'jbjbj', 'bjbjb', 'jbjbj'),
(10, 1, 'mohammed elhachimi', 'melhachimi514@gmail.com', 'hhhhhhhhhh'),
(11, 1, 'mohammed elhachimi', 'melhachimi514@gmail.com', 'idihdid'),
(12, 1, 'mohammed elhachimi', 'melhachimi514@gmail.com', 'hi doc'),
(13, 1, 'mohammed elhachimi', 'melhachimi514@gmail.com', 'hiiiii'),
(14, 1, 'mohammed elhachimi', 'melhachimi514@gmail.com', 'dgdhgdh'),
(15, 1, 'mohammed elhachimi', 'melhachimi514@gmail.com', 'uhuhsuhuzs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_picture` varchar(200) NOT NULL,
  `user_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_picture`, `user_status`) VALUES
(1, 'mohammed', 'med@gmail.com', '$2y$10$7Vv.gglK7hb9IxpjgCv4MuyGq8oadYSeMTbujF7UwZB9DeMDYCQqO', 'kappel-chair.jpg', 'user'),
(7, 'ahmed', 'ahmed@gmail.com', '$2y$10$TekJ2CBn5uN1jK1hhFzZXeqj5ghSrXYHqisKYXEMaS93CAkneGVPK', 'Angry-Tokyo-Ghoul-HD-Mobile-Wallpaper.jpg', 'user'),
(8, 'admin', 'admin@gmail.com', '$2y$10$65osirDR2nNLE.h2xBv5OuTeWvV5SudAt7RuyzGdIaQc4JN14zJMK', 'images.jpg', 'admin'),
(9, 'ayoub', 'ayoub@gmai.com', '$2y$10$eMtpbv9UCU6ZBVwmIAzfoO5Z.YXVNOCVYiDwCt2FwsBWuurBTxzbq', 'images.jpg', 'user'),
(11, 'ahmed', 'ahmekd@gmail.com', '$2y$10$dwBKgm1qVJ2Wp76bVqys6uraff/hpEw12fxFIVG4ut/9psPsJexka', 'hh2.jpg', 'user'),
(12, 'mohammed', 'admin1@gmail.com', '$2y$10$TwJCWJSg63hk7qeu1scn9e4.mDZuq7NXTk9nXCqHlQTsQnOetHmNW', 'hh.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
