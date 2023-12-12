-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 04:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_church`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement_details`
--

CREATE TABLE `announcement_details` (
  `announce_image` longblob NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_time` datetime NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE `appointment_details` (
  `appointment_id` int(40) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(60) NOT NULL,
  `date_appointed` date NOT NULL,
  `time_appointed` time NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `appointment_type` varchar(30) NOT NULL,
  `appointment_status` varchar(15) NOT NULL,
  `reason` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_details`
--

INSERT INTO `appointment_details` (`appointment_id`, `name`, `email`, `date_appointed`, `time_appointed`, `event_date`, `event_timeStart`, `event_timeEnd`, `appointment_type`, `appointment_status`, `reason`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '2023-11-30', '10:00:00', '2023-12-07', '10:00:00', '10:45:00', 'Baptism', 'Accepted', 'You are accepted.'),
(2, 'Jane Girl', 'janegirl@gmail.com', '2023-12-01', '11:00:00', '2023-12-07', '14:00:00', '15:15:00', 'Wedding', 'Accepted', 'Dun dun dunun'),
(3, 'jane the Virgin', 'janethevirgin@yahoo.com', '2023-12-01', '11:00:00', '2023-12-08', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Accepted', 'namatay ih'),
(5, 'sample', 'sample@yahoo.com', '0000-00-00', '00:00:00', '2023-12-28', '00:00:00', '00:00:00', 'Blessing', 'Pending', ''),
(6, 'sample', 'sample@yahoo.com', '0000-00-00', '00:00:00', '2023-12-28', '00:00:00', '00:00:00', 'Blessing', 'Pending', ''),
(7, 'sample', 'sample@yahoo.com', '0000-00-00', '00:00:00', '2023-12-28', '00:00:00', '00:00:00', 'Blessing', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `baptism_details`
--

CREATE TABLE `baptism_details` (
  `appointment_id` int(40) NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `fatherPob` varchar(120) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `motherPob` varchar(120) NOT NULL,
  `marriage_type` varchar(40) NOT NULL,
  `godfatherName` varchar(100) NOT NULL,
  `godfatherAddress` varchar(120) NOT NULL,
  `godmotherName` varchar(100) NOT NULL,
  `godmotherAddress` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blessing_details`
--

CREATE TABLE `blessing_details` (
  `appointment_id` int(11) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `blessing_type` varchar(20) NOT NULL,
  `address` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blessing_details`
--

INSERT INTO `blessing_details` (`appointment_id`, `contactNum`, `event_date`, `event_time`, `blessing_type`, `address`) VALUES
(1, '3456789', '2023-12-28', '00:00:00', 'House Blessing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `document_request_details`
--

CREATE TABLE `document_request_details` (
  `appointment_id` int(40) NOT NULL,
  `claim_date` date NOT NULL,
  `claim_time` time NOT NULL,
  `documentType` varchar(50) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `purpose` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funeral_details`
--

CREATE TABLE `funeral_details` (
  `appointment_id` int(40) NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_death` date NOT NULL,
  `age` int(11) NOT NULL,
  `cause_of_death` varchar(120) NOT NULL,
  `date_of_interment` datetime NOT NULL,
  `place_of_cemetery` varchar(120) NOT NULL,
  `informant_name` varchar(100) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sacrament` varchar(3) NOT NULL,
  `burial` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_userinfo`
--

CREATE TABLE `login_userinfo` (
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `user_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_userinfo`
--

INSERT INTO `login_userinfo` (`firstName`, `lastName`, `email`, `contactNum`, `user_password`) VALUES
('jelika', 'palad', 'jelikapalad@gmail.com', '09123456789', 'jelikapalad'),
('john rey', 'abrera', 'test@gmail.com', '09193456789', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501');

-- --------------------------------------------------------

--
-- Table structure for table `mass_intention_details`
--

CREATE TABLE `mass_intention_details` (
  `appointment_id` int(40) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `purpose` varchar(120) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_baptism_details`
--

CREATE TABLE `record_baptism_details` (
  `event_date` datetime NOT NULL,
  `event_time` datetime NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` datetime NOT NULL,
  `pob` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `father_pob` varchar(120) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `mother_pob` varchar(120) NOT NULL,
  `marriage_type` varchar(40) NOT NULL,
  `godfatherName` varchar(100) NOT NULL,
  `godfather_address` varchar(120) NOT NULL,
  `godmotherName` varchar(100) NOT NULL,
  `godmother_address` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_confirmation_details`
--

CREATE TABLE `record_confirmation_details` (
  `confirmation_date` datetime NOT NULL,
  `confirmation_time` datetime NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` datetime NOT NULL,
  `pob` varchar(120) NOT NULL,
  `placeof_baptism` varchar(120) NOT NULL,
  `dateof_baptism` datetime NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `address` varchar(120) NOT NULL,
  `godfatherName` varchar(100) NOT NULL,
  `godmotherName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_funeral_details`
--

CREATE TABLE `record_funeral_details` (
  `event_date` datetime NOT NULL,
  `event_time` datetime NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_death` datetime NOT NULL,
  `cause_of_death` varchar(120) NOT NULL,
  `date_of_interment` datetime NOT NULL,
  `place_of_cemetery` varchar(120) NOT NULL,
  `informant_name` varchar(100) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sacrament` varchar(3) NOT NULL,
  `burial` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_wedding_details`
--

CREATE TABLE `record_wedding_details` (
  `event_date` datetime NOT NULL DEFAULT curdate(),
  `event_time` datetime NOT NULL DEFAULT curtime(),
  `groom_lastName` varchar(40) NOT NULL,
  `groom_firstName` varchar(40) NOT NULL,
  `groom_middleName` varchar(40) NOT NULL,
  `groom_contactNum` varchar(13) NOT NULL,
  `groom_dob` datetime NOT NULL,
  `groom_pob` varchar(120) NOT NULL,
  `groom_address` varchar(120) NOT NULL,
  `groom_fatherName` varchar(100) NOT NULL,
  `groom_motherName` varchar(100) NOT NULL,
  `groom_religion` varchar(50) NOT NULL,
  `bride_lastName` varchar(40) NOT NULL,
  `bride_firstName` varchar(40) NOT NULL,
  `bride_middleName` varchar(40) NOT NULL,
  `bride_contactNum` varchar(13) NOT NULL,
  `bride_dob` datetime NOT NULL,
  `bride_pob` varchar(120) NOT NULL,
  `bride_address` varchar(120) NOT NULL,
  `bride_fatherName` varchar(100) NOT NULL,
  `bride_motherName` varchar(100) NOT NULL,
  `bride_religion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wedding_details`
--

CREATE TABLE `wedding_details` (
  `appointment_id` int(40) NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `groom_lastName` varchar(40) NOT NULL,
  `groom_firstName` varchar(40) NOT NULL,
  `groom_middleName` varchar(40) NOT NULL,
  `groom_contactNum` varchar(13) NOT NULL,
  `groom_dob` date NOT NULL,
  `groom_pob` varchar(120) NOT NULL,
  `groom_address` varchar(120) NOT NULL,
  `groom_fatherName` varchar(100) NOT NULL,
  `groom_motherName` varchar(100) NOT NULL,
  `groom_religion` varchar(50) NOT NULL,
  `bride_lastName` varchar(40) NOT NULL,
  `bride_firstName` varchar(40) NOT NULL,
  `bride_middleName` varchar(40) NOT NULL,
  `bride_contactNum` varchar(13) NOT NULL,
  `bride_dob` date NOT NULL,
  `bride_pob` varchar(120) NOT NULL,
  `bride_address` varchar(120) NOT NULL,
  `bride_fatherName` varchar(100) NOT NULL,
  `bride_motherName` varchar(100) NOT NULL,
  `bride_religion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_details`
--
ALTER TABLE `appointment_details`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `baptism_details`
--
ALTER TABLE `baptism_details`
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `document_request_details`
--
ALTER TABLE `document_request_details`
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `funeral_details`
--
ALTER TABLE `funeral_details`
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `login_userinfo`
--
ALTER TABLE `login_userinfo`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `mass_intention_details`
--
ALTER TABLE `mass_intention_details`
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `wedding_details`
--
ALTER TABLE `wedding_details`
  ADD KEY `appointment_id` (`appointment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `baptism_details`
--
ALTER TABLE `baptism_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_request_details`
--
ALTER TABLE `document_request_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funeral_details`
--
ALTER TABLE `funeral_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mass_intention_details`
--
ALTER TABLE `mass_intention_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wedding_details`
--
ALTER TABLE `wedding_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baptism_details`
--
ALTER TABLE `baptism_details`
  ADD CONSTRAINT `baptism_details_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_details` (`appointment_id`);

--
-- Constraints for table `document_request_details`
--
ALTER TABLE `document_request_details`
  ADD CONSTRAINT `document_request_details_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_details` (`appointment_id`);

--
-- Constraints for table `funeral_details`
--
ALTER TABLE `funeral_details`
  ADD CONSTRAINT `funeral_details_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_details` (`appointment_id`);

--
-- Constraints for table `mass_intention_details`
--
ALTER TABLE `mass_intention_details`
  ADD CONSTRAINT `mass_intention_details_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_details` (`appointment_id`);

--
-- Constraints for table `wedding_details`
--
ALTER TABLE `wedding_details`
  ADD CONSTRAINT `wedding_details_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_details` (`appointment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
