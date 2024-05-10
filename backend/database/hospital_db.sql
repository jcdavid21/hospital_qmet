-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2024 at 01:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_id` int(11) NOT NULL,
  `acc_email` varchar(50) NOT NULL,
  `acc_password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`account_id`, `acc_email`, `acc_password`, `role_id`) VALUES
(1, 'lugo@gmail.com', '$2y$10$7gRzI3R7j0ESwpFTd97jqOd8Iub0tkHZGaq/0fl8ULJjIAABj6y7a', 3),
(2, 'jcdavid@gmail.com', '$2y$10$r7rgz.xQ3ankbs96doKCw.5d5pgUnKRtmuIZr6WxnsrM03T6BziTa', 1),
(5, 'golden@gmail.com', '$2y$10$mNsWJ2grYIlEGiqnGv4VeeHs18MrlqsGa/9uSD1h2yh0Y2/ZaBjEe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_details`
--

CREATE TABLE `tbl_account_details` (
  `account_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account_details`
--

INSERT INTO `tbl_account_details` (`account_id`, `first_name`, `last_name`, `address`, `contact`, `birth_date`) VALUES
(1, 'Christian', 'Lugo', 'Bayan Glori', '09565535401', '2015-04-21'),
(2, 'Juan Carlo', 'David', 'Quezon City', '09565535401', '2016-04-21'),
(3, 'Golden', 'Miral', 'Bayan Glori', '09565535401', '2006-04-21'),
(4, 'Golden', 'Miral', 'Bayan Glori', '09565535401', '2016-04-21'),
(5, 'Golden', 'Miral', 'Bayan Glori', '09565535401', '2016-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_doctor`
--

CREATE TABLE `tbl_account_doctor` (
  `account_id` int(11) NOT NULL DEFAULT 0,
  `profile_img` varchar(25) NOT NULL,
  `specialty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account_doctor`
--

INSERT INTO `tbl_account_doctor` (`account_id`, `profile_img`, `specialty_id`) VALUES
(5, 'profile.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `doctor_acc_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `account_id`, `specialty_id`, `doctor_acc_id`, `appointment_date`, `appointment_time`, `status_id`) VALUES
(2, 2, 1, 5, '2024-05-11', '09:00AM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apt_status`
--

CREATE TABLE `tbl_apt_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_apt_status`
--

INSERT INTO `tbl_apt_status` (`status_id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'Patient'),
(2, 'Doctor'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialty`
--

CREATE TABLE `tbl_specialty` (
  `specialty_id` int(11) NOT NULL,
  `specialty_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_specialty`
--

INSERT INTO `tbl_specialty` (`specialty_id`, `specialty_name`) VALUES
(1, 'Pediatrician'),
(2, 'Geriatric'),
(3, 'Cardio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_specialty`
--
ALTER TABLE `tbl_specialty`
  ADD PRIMARY KEY (`specialty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_specialty`
--
ALTER TABLE `tbl_specialty`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
