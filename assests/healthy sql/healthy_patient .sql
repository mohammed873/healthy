-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 12:11 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_picture` varchar(200) NOT NULL,
  `admin_status` varchar(50) NOT NULL,
  `doctor_phone` varchar(50) NOT NULL,
  `doctor_linkdin` varchar(200) NOT NULL,
  `years_experience` int(11) NOT NULL,
  `surgeries_number` int(11) NOT NULL,
  `doctor_specialization` varchar(50) NOT NULL,
  `about_doctor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_picture`, `admin_status`, `doctor_phone`, `doctor_linkdin`, `years_experience`, `surgeries_number`, `doctor_specialization`, `about_doctor`) VALUES
(1, 'salwa', 'salwa@gmail.com', '$2y$10$uT20Z4otFXABrLqpPIPQ.uXGjepfLsSHwLmAgwPMTnptiayr0SwTq', 'geni.jpg', 'doctor', '067775558865', 'https://www.tutorialspoint.com/How-to-validate-email-using-jQuery', 5, 19, 'heart surgery', 'hi my name is salwa i have spent five years at medical university i was always the first in my class , i have made successful 19 medical operation . i have an experience of 4 years . for me being a doctor is everything in my life nd i feel so happy when i help others . if you still wannna know anything about me you either visit my linkedln profile or contact me'),
(2, 'mohammed', 'mohammed@gmail.com', '$2y$10$0yGGfJfIQM9clkMWdeyXguE/5OELYPV6payIJerV6Dh7kiVOONw5e', 'download.jpg', 'Secertaire', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `service_type` varchar(250) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL,
  `appointement_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(11) NOT NULL,
  `recevier_id` int(11) NOT NULL,
  `recevier_name` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `message_status` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`message_id`, `sender_id`, `sender_name`, `recevier_id`, `recevier_name`, `message`, `message_status`, `date`) VALUES
(1, 26, 'salwa', 1, 'mohammed', 'hi', 'unread', '2020-08-31 20:52:28'),
(2, 26, 'salwa', 1, 'mohammed', 'test', 'unread', '2020-08-31 20:53:04'),
(3, 26, 'salwa', 1, 'mohammed', 'hi', 'unread', '2020-08-31 20:55:22'),
(4, 26, 'salwa', 1, 'mohammed', 'ssss', 'unread', '2020-08-31 20:56:49'),
(5, 1, 'mohammed', 1, 'salwa', 'test', 'unread', '2020-08-31 20:58:49'),
(6, 1, 'mohammed', 1, 'salwa', 'test', 'unread', '2020-08-31 20:59:24'),
(7, 1, 'mohammed', 1, 'salwa', 'uhuhu', 'unread', '2020-08-31 21:00:27'),
(8, 1, 'mohammed', 1, 'salwa', 'ijij', 'unread', '2020-08-31 21:01:35'),
(9, 26, 'salwa', 1, 'mohammed', 'jnsjns', 'unread', '2020-08-31 21:11:46'),
(10, 26, 'salwa', 1, 'mohammed', 'eseses', 'unread', '2020-08-31 21:13:51'),
(11, 1, 'mohammed', 1, 'salwa', 'gygygygy', 'unread', '2020-08-31 21:14:10'),
(12, 1, 'mohammed', 1, 'salwa', 'huhh', 'unread', '2020-08-31 21:25:38'),
(13, 1, 'mohammed', 1, 'salwa', 'huhh', 'unread', '2020-08-31 21:34:23'),
(14, 1, 'mohammed', 1, 'salwa', 'jkjk', 'unread', '2020-08-31 21:40:17');

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

-- --------------------------------------------------------

--
-- Table structure for table `medical_notes`
--

CREATE TABLE `medical_notes` (
  `note_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(12) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'mohammed', 'melhachimi5@gmail.com', '$2y$10$9IzTXuOSFd.zsOrl.hc6su8rSFAXHLloP6bDVJSdmAdEx22Ke37wm', 'voldmort.jpg', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `medical_notes`
--
ALTER TABLE `medical_notes`
  ADD PRIMARY KEY (`note_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_notes`
--
ALTER TABLE `medical_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
