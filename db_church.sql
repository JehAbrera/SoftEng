-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 08:09 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `baptism_details`
--

CREATE TABLE `baptism_details` (
  `baptism_id` int(40) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `midName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `contNum` varchar(13) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `fatherPob` varchar(120) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `motherPob` varchar(120) NOT NULL,
  `marriage_type` varchar(40) NOT NULL,
  `godfathName` varchar(100) NOT NULL,
  `godfathAddress` varchar(120) NOT NULL,
  `godmothName` varchar(100) NOT NULL,
  `godmothAddress` varchar(120) NOT NULL,
  `bapPsa` varchar(50) NOT NULL,
  `bapContract` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blessing_details`
--

CREATE TABLE `blessing_details` (
  `blessing_id` int(40) NOT NULL,
  `foreign_id` varchar(11) NOT NULL,
  `contact_num` varchar(13) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `blessing_type` varchar(20) NOT NULL,
  `address` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_request_details`
--

CREATE TABLE `document_request_details` (
  `docreq_id` int(40) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `claim_date` date NOT NULL,
  `documentType` varchar(50) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `purpose` varchar(120) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funeral_details`
--

CREATE TABLE `funeral_details` (
  `funeral_id` int(40) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `deathDate` date NOT NULL,
  `age` int(11) NOT NULL,
  `deathCause` varchar(120) NOT NULL,
  `internmentDate` date NOT NULL,
  `cemeteryPlace` varchar(120) NOT NULL,
  `informName` varchar(100) NOT NULL,
  `contNum` varchar(13) NOT NULL,
  `address` varchar(120) NOT NULL,
  `sacrament` varchar(3) NOT NULL,
  `burial` varchar(6) NOT NULL,
  `deathCert` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mass_intention_details`
--

CREATE TABLE `mass_intention_details` (
  `intention_id` int(40) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `purpose` varchar(120) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wedding_details`
--

CREATE TABLE `wedding_details` (
  `wedding_id` int(40) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `groom_lName` varchar(40) NOT NULL,
  `groom_fName` varchar(40) NOT NULL,
  `groom_midName` varchar(40) NOT NULL,
  `groom_conNum` varchar(13) NOT NULL,
  `groom_dob` date NOT NULL,
  `groom_pob` varchar(120) NOT NULL,
  `groom_address` varchar(120) NOT NULL,
  `groom_father` varchar(100) NOT NULL,
  `groom_mother` varchar(100) NOT NULL,
  `groom_religion` varchar(50) NOT NULL,
  `groom_idpic` varchar(50) NOT NULL,
  `groom_psa` varchar(50) NOT NULL,
  `groom_cenomar` varchar(50) NOT NULL,
  `groom_baptism` varchar(50) NOT NULL,
  `groom_confirm` varchar(50) NOT NULL,
  `bride_lName` varchar(40) NOT NULL,
  `bride_fName` varchar(40) NOT NULL,
  `bride_midName` varchar(40) NOT NULL,
  `bride_conNum` varchar(13) NOT NULL,
  `bride_dob` date NOT NULL,
  `bride_pob` varchar(120) NOT NULL,
  `bride_address` varchar(120) NOT NULL,
  `bride_father` varchar(100) NOT NULL,
  `bride_mother` varchar(100) NOT NULL,
  `bride_religion` varchar(50) NOT NULL,
  `bride_idpic` varchar(50) NOT NULL,
  `bride_psa` varchar(50) NOT NULL,
  `bride_cenomar` varchar(50) NOT NULL,
  `bride_baptism` varchar(50) NOT NULL,
  `bride_confirm` varchar(50) NOT NULL,
  `couples_contract` varchar(50) NOT NULL
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
  ADD PRIMARY KEY (`baptism_id`);

--
-- Indexes for table `blessing_details`
--
ALTER TABLE `blessing_details`
  ADD PRIMARY KEY (`blessing_id`);

--
-- Indexes for table `document_request_details`
--
ALTER TABLE `document_request_details`
  ADD PRIMARY KEY (`docreq_id`);

--
-- Indexes for table `funeral_details`
--
ALTER TABLE `funeral_details`
  ADD PRIMARY KEY (`funeral_id`);

--
-- Indexes for table `mass_intention_details`
--
ALTER TABLE `mass_intention_details`
  ADD PRIMARY KEY (`intention_id`);

--
-- Indexes for table `wedding_details`
--
ALTER TABLE `wedding_details`
  ADD PRIMARY KEY (`wedding_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `baptism_details`
--
ALTER TABLE `baptism_details`
  MODIFY `baptism_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blessing_details`
--
ALTER TABLE `blessing_details`
  MODIFY `blessing_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_request_details`
--
ALTER TABLE `document_request_details`
  MODIFY `docreq_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funeral_details`
--
ALTER TABLE `funeral_details`
  MODIFY `funeral_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mass_intention_details`
--
ALTER TABLE `mass_intention_details`
  MODIFY `intention_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wedding_details`
--
ALTER TABLE `wedding_details`
  MODIFY `wedding_id` int(40) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
