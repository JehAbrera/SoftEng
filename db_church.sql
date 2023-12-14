-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 03:46 PM
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
  `post_id` int(11) NOT NULL,
  `announce_image` varchar(255) NOT NULL,
  `event_name` varchar(40) NOT NULL,
  `event_date` date NOT NULL,
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
(1, 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-12', '15:46:05', '2023-12-27', '11:00:00', '11:45:00', 'Baptism', 'Accepted', ''),
(2, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-12', '15:49:22', '2023-12-29', '10:30:00', '11:45:00', 'Wedding', 'Completed', ''),
(3, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-12', '17:05:00', '2024-02-08', '10:30:00', '11:45:00', 'Wedding', 'Pending', ''),
(4, 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-12', '17:14:39', '2024-01-08', '15:00:00', '15:45:00', 'Baptism', 'Accepted', ''),
(5, 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-12', '19:56:59', '2024-01-31', '13:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Accepted', ''),
(8, 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-12', '20:17:29', '2024-01-20', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', ''),
(9, 'sample2', 'sample2@yahoo.com', '2023-12-12', '20:18:12', '2023-12-29', '00:00:00', '00:00:00', 'House Blessing', 'Completed', ''),
(12, 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-12', '20:28:33', '2024-01-25', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Pending', ''),
(16, 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-11', '20:34:01', '2023-12-30', '00:00:00', '00:00:00', 'Permit and No Record', 'Canceled', ''),
(17, 'sample2', 'sample2@yahoo.com', '2023-12-12', '21:54:01', '2023-12-21', '00:00:00', '00:00:00', 'Car Blessing', 'Accepted', ''),
(18, 'sample2', 'sample2@yahoo.com', '2023-12-12', '21:55:40', '2023-12-31', '00:00:00', '00:00:00', 'Store Blessing', 'Pending', ''),
(19, 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-12', '22:03:21', '2024-03-15', '15:00:00', '15:45:00', 'Baptism', 'Canceled', ''),
(20, 'sample2', 'sample2@yahoo.com', '2023-12-12', '22:14:34', '2024-04-16', '00:00:00', '00:00:00', 'Motorcycle Blessing', 'Pending', ''),
(21, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '16:47:40', '2024-01-31', '14:00:00', '15:15:00', 'Wedding', 'Pending', ''),
(22, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '16:52:04', '2024-01-31', '14:00:00', '15:15:00', 'Wedding', 'Pending', ''),
(23, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '16:59:05', '2024-01-31', '14:00:00', '15:15:00', 'Wedding', 'Pending', ''),
(24, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '17:02:20', '2024-01-31', '14:00:00', '15:15:00', 'Wedding', 'Pending', ''),
(25, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '17:02:42', '2024-01-31', '14:00:00', '15:15:00', 'Wedding', 'Pending', ''),
(26, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '17:04:59', '2024-01-26', '09:00:00', '10:15:00', 'Wedding', 'Pending', ''),
(27, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '20:57:47', '2024-02-10', '15:30:00', '16:45:00', 'Wedding', 'Pending', ''),
(28, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '20:58:09', '2024-02-10', '15:30:00', '16:45:00', 'Wedding', 'Pending', ''),
(29, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '21:02:36', '2024-02-10', '15:30:00', '16:45:00', 'Wedding', 'Pending', ''),
(30, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '21:08:01', '2024-02-14', '09:00:00', '10:15:00', 'Wedding', 'Pending', ''),
(31, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '21:18:09', '2024-02-14', '09:00:00', '10:15:00', 'Wedding', 'Pending', ''),
(32, 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-14', '22:30:00', '2024-02-03', '09:00:00', '10:15:00', 'Wedding', 'Pending', ''),
(33, 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-14', '22:37:42', '2024-01-13', '09:00:00', '09:45:00', 'Baptism', 'Pending', ''),
(34, 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-14', '22:39:21', '2023-12-20', '13:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', ''),
(35, 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-14', '22:39:48', '2023-12-30', '06:00:00', '00:00:00', 'Mass Intention', 'Pending', ''),
(36, 'sample2', 'sample2@yahoo.com', '2023-12-14', '22:40:54', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', ''),
(37, 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-14', '22:42:08', '2023-12-30', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Pending', ''),
(38, 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-14', '22:42:54', '2023-12-30', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Pending', ''),
(39, 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-14', '22:43:37', '2023-12-30', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '');

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

--
-- Dumping data for table `baptism_details`
--

INSERT INTO `baptism_details` (`baptism_id`, `foreign_id`, `event_date`, `event_timeStart`, `event_timeEnd`, `lastName`, `firstName`, `midName`, `gender`, `dob`, `pob`, `address`, `contNum`, `fatherName`, `fatherPob`, `motherName`, `motherPob`, `marriage_type`, `godfathName`, `godfathAddress`, `godmothName`, `godmothAddress`, `bapPsa`, `bapContract`) VALUES
(1, 1, '2023-12-27', '11:00:00', '11:45:00', 'Palad', 'Jelika', '', 'Female', '2003-04-01', 'JKJ', '3233 Estrella St., Brgy. Carmona', '09177035541', 'RQWR', 'RQWRQ', 'RQWR', 'RQWR', 'Catholic Marriage', 'FAF', 'FASF', 'AAA', 'FASF', '403412910_1803606980082965_8839108354747965217_n.j', '397248586_10224459257777051_5569628535027392278_n.'),
(2, 4, '2024-01-08', '15:00:00', '15:45:00', 'BABY', 'GIRL', 'BOY', 'Male', '2000-10-10', 'MAKATI', 'JRWEJRO HERER', '0932448239', 'DADDY', 'MEOW', 'MOMMY', 'BARK', 'Catholic Marriage', 'SUGARDADDY', 'TITO', 'SUGARMOMMY', 'TITA', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j'),
(3, 19, '2024-03-15', '15:00:00', '15:45:00', 'baby', 'ko', 'anak', 'Female', '2023-01-01', 'makati', 'meow address', '09234567890', 'ama ko', 'tatay', 'ina ko', 'nanay', 'Catholic Marriage', 'tito', 'sinigang', 'tita', 'adobo', '304061468_2637753339714891_5438805081949783654_n.j', '397248586_10224459257777051_5569628535027392278_n.'),
(4, 33, '2024-01-13', '09:00:00', '09:45:00', 'Mamon', 'Lemon', 'Lime', 'Female', '2023-11-01', 'Goldilocks', 'Tart', '9123818312', 'Tofu', 'Beef', 'Steak', 'Meat', 'Catholic Marriage', 'French', 'Fries', 'Tilapia', 'Dilis', 'F8M92gXXgAAtmGf.jpg', 'F_BeEYLWQAAZ3c9.jpg');

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

--
-- Dumping data for table `blessing_details`
--

INSERT INTO `blessing_details` (`blessing_id`, `foreign_id`, `contact_num`, `event_date`, `event_time`, `blessing_type`, `address`) VALUES
(1, '9', '09323485943', '2023-12-29', '00:00:00', 'House Blessing', 'Makati'),
(2, '17', '09950580869', '2023-12-21', '00:00:00', 'Car Blessing', ''),
(3, '18', '09177035541', '2023-12-31', '00:00:00', 'Store Blessing', 'Pembo'),
(4, '20', '09177035541', '2024-04-16', '00:00:00', 'Motorcycle Blessing', ''),
(5, '36', '9231983812', '2023-12-30', '00:00:00', 'House Blessing', '');

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
  `address` varchar(150) NOT NULL,
  `birthcert` varchar(50) NOT NULL,
  `barangaycert` varchar(50) NOT NULL,
  `kawancert` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_request_details`
--

INSERT INTO `document_request_details` (`docreq_id`, `foreign_id`, `claim_date`, `documentType`, `firstName`, `middleName`, `lastName`, `dob`, `fatherName`, `motherName`, `contactNum`, `purpose`, `address`, `birthcert`, `barangaycert`, `kawancert`) VALUES
(1, 12, '2024-01-25', 'Baptismal Certificate', 'firsttt', 'mid', 'lastnaem', '2000-10-10', 'tatay', 'nanay', '09213456789', 'kasal', '', '', '', ''),
(2, 16, '2023-12-30', 'Permit and No Record', 'firstAdobo', 'midHatdog', 'lastSisig', '2000-10-10', '', '', '092353374378', 'bacon', 'chicken nuggets', '', '', ''),
(3, 37, '2023-12-30', 'Confirmation Certificate', 'Fly', 'Butterfly', 'Ant', '2003-10-10', 'Caterpillar', 'Moth', '9213823183', 'Identity Theft', '', 'F9M7EPsaQAAE9bf.jpg', '', ''),
(4, 38, '2023-12-30', 'Good Moral Certificate', 'Angry', 'Happy', 'Kind', '2003-02-10', '', '', '9985948484', 'Emotions', '', 'F7DEdW6WwAARlnm.jpg', 'F_J-l5xWIAAdHW7.jpg', 'F5FkmnQXsAEiBFW.jpg'),
(5, 39, '2023-12-30', 'Permit and No Record', 'And No', 'Record', 'Permit', '2000-12-12', '', '', '9129382391', 'My Purpose', 'Requesting', 'F29yxj-XkAAXIYu.jpg', '', '');

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

--
-- Dumping data for table `funeral_details`
--

INSERT INTO `funeral_details` (`funeral_id`, `foreign_id`, `event_date`, `event_timeStart`, `event_timeEnd`, `lastName`, `firstName`, `middleName`, `gender`, `deathDate`, `age`, `deathCause`, `internmentDate`, `cemeteryPlace`, `informName`, `contNum`, `address`, `sacrament`, `burial`, `deathCert`) VALUES
(1, 5, '2024-01-31', '13:00:00', '00:00:00', 'Dead', 'Died', 'Deceased', 'Male', '2020-10-10', 30, 'Did not live', '2020-12-10', 'Makati', 'Call,Me If', '09234782349', 'hERE ANDT there', 'Yes', 'Casket', 'ramos.jpg'),
(2, 34, '2023-12-20', '13:00:00', '00:00:00', 'Night', 'Morning', 'Day', 'Male', '2023-12-11', 20, 'Cooked', '2023-12-23', 'Earth', 'Charger,Laptop Mouse', '9238128318', 'Outlet Electrical 99', 'Yes', 'Casket', 'F9IuxMxXEAAA_hQ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_userinfo`
--

CREATE TABLE `login_userinfo` (
  `userType` varchar(6) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `user_password` varchar(256) NOT NULL
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

--
-- Dumping data for table `mass_intention_details`
--

INSERT INTO `mass_intention_details` (`intention_id`, `foreign_id`, `contactNum`, `event_date`, `event_time`, `purpose`, `name`) VALUES
(2, 8, '09348652345', '2024-01-20', '18:00:00', 'Healing/Recovery', 'radio button													'),
(3, 35, '9132928318', '2023-12-30', '06:00:00', 'Thanksgiving', 'Happy New Year!');

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
-- Dumping data for table `wedding_details`
--

INSERT INTO `wedding_details` (`wedding_id`, `foreign_id`, `event_date`, `event_timeStart`, `event_timeEnd`, `groom_lName`, `groom_fName`, `groom_midName`, `groom_conNum`, `groom_dob`, `groom_pob`, `groom_address`, `groom_father`, `groom_mother`, `groom_religion`, `groom_idpic`, `groom_psa`, `groom_cenomar`, `groom_baptism`, `groom_confirm`, `bride_lName`, `bride_fName`, `bride_midName`, `bride_conNum`, `bride_dob`, `bride_pob`, `bride_address`, `bride_father`, `bride_mother`, `bride_religion`, `bride_idpic`, `bride_psa`, `bride_cenomar`, `bride_baptism`, `bride_confirm`, `couples_contract`) VALUES
(1, 2, '2023-12-29', '10:30:00', '11:45:00', 'GUY', 'DUDE', 'MAN', '09123456789', '2000-10-10', 'MAKATI', '28439 KSFKSKF', 'DAD', 'MOM', 'CATHOLIC', '400861806_6723540291078432_7203868383007699164_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '397248586_10224459257777051_5569628535027392278_n.', '408149939_3320413528104831_9039154027077360422_n.j', 'ramos.jpg', 'GIRL', 'WOMAN', 'GAL', '9832483284', '2000-10-10', 'MAKATI', 'R3HII', 'DAD', 'MOM', 'ISLAM', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '400861806_6723540291078432_7203868383007699164_n.j', '397248586_10224459257777051_5569628535027392278_n.', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j'),
(2, 3, '2024-02-08', '10:30:00', '11:45:00', 'MAN', 'GUY', 'DUDE', '9123244325539', '2000-10-10', 'MAKATI', '9239NDNJWJ', 'DAD', 'MOM', 'CATHOLIC', '403412910_1803606980082965_8839108354747965217_n.j', '364644656_6461019557315150_3068842320297085489_n.j', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', 'WOMAN', 'GIRL', 'LADY', '928347238', '2000-10-10', 'MANILA', 'NEJDNEDEJ NJ', 'TATAY', 'NANAY', 'ISLAM', '408149939_3320413528104831_9039154027077360422_n.j', '304061468_2637753339714891_5438805081949783654_n.j', '364644656_6461019557315150_3068842320297085489_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '397248586_10224459257777051_5569628535027392278_n.', '403412910_1803606980082965_8839108354747965217_n.j'),
(3, 26, '2024-01-26', '09:00:00', '10:15:00', 'Dela', 'Juan', 'Tomas', '9123568930', '2000-10-10', 'Taguig', '9 Sampa', 'Josehph', 'Mary', 'Catholic', '', '', '', '', '', 'Pedro', 'jUana', 'Agustin', '9218424378', '2000-10-10', 'Ke', '9 SMla', 'Hello', 'HI', 'Islam', '', '', '', '', '', ''),
(4, 30, '2024-02-14', '09:00:00', '10:15:00', 'Rizal', 'Jose', 'Protasio', '9123213124', '2000-10-10', 'Makati', 'Sinigang', 'Father', 'Nanay', 'Jehovah‘s Witness', 'GBMa9ImXcAAy8Ql.jpg', 'GAaGjoTW8AAvfdo.jpg', 'league of legends.jpg', 'F_d3_rUbcAAHcoT.png', 'GA_TC6gXMAAKL07.jpg', 'Rivera', 'Leonor', 'Hatdog', '9234583584', '2001-02-10', 'Green', 'Yellow', 'Ama Ko ', 'Nanay Leonor', 'Jehovah‘s Witness', 'GBGtf9-bkAAVzpA.jpg', 'GAx0KA5WEAAgIG7.jpg', 'F_d4BswbcAIdkix.png', 'F80hyAGasAEn1la.jpg', 'GAXMczcb0AAtXsb.jpg', 'F_BXKZrbsAAhgPz.jpg'),
(5, 31, '2024-02-14', '09:00:00', '10:15:00', 'Rizal', 'Jose', 'Protasio', '9123213124', '2000-10-10', 'Makati', 'Sinigang', 'Father', 'Nanay', 'Jehovah‘s Witness', 'GBMa9ImXcAAy8Ql.jpg', 'GAaGjoTW8AAvfdo.jpg', 'league of legends.jpg', 'F_d3_rUbcAAHcoT.png', 'GA_TC6gXMAAKL07.jpg', 'Rivera', 'Leonor', 'Hatdog', '9234583584', '2001-02-10', 'Green', 'Yellow', 'Ama Ko ', 'Nanay Leonor', 'Jehovah‘s Witness', 'GBGtf9-bkAAVzpA.jpg', 'GAx0KA5WEAAgIG7.jpg', 'F_d4BswbcAIdkix.png', 'F80hyAGasAEn1la.jpg', 'GAXMczcb0AAtXsb.jpg', 'F_BXKZrbsAAhgPz.jpg'),
(6, 32, '2024-02-03', '09:00:00', '10:15:00', 'Pork', 'Shrimp', 'Fried', '9213813818', '1996-02-10', 'Taguig City', 'Steamer', 'Rice Cooker', 'Refrigerator', 'Jehovah‘s Witness', 'GBL-KHtbwAAhK2Q.jpg', 'GBBPq9AXMAA3RYX.jpg', 'GA_TC6gXMAAKL07.jpg', 'league of legends.jpg', 'GAYkbiGX0AEH0m4.jpg', 'Siomai', 'Sisig', 'Sinigang', '9382838290', '2000-12-01', 'Siopao', 'Karinderya', 'Shower', 'Sink', 'Roman Catholic', 'F_dNBe7XgAAxyhS.jpg', 'F_JnE_XXMAA-Z8C.jpg', 'FuKhVtiacAMSkGB.jpg', 'F71YPF1WMAAoZT4.jpg', 'GApg1ewXEAA2qW-.png', 'F6oYGK2XwAA3BS0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement_details`
--
ALTER TABLE `announcement_details`
  ADD PRIMARY KEY (`post_id`);

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
-- Indexes for table `login_userinfo`
--
ALTER TABLE `login_userinfo`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for table `announcement_details`
--
ALTER TABLE `announcement_details`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `baptism_details`
--
ALTER TABLE `baptism_details`
  MODIFY `baptism_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blessing_details`
--
ALTER TABLE `blessing_details`
  MODIFY `blessing_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `document_request_details`
--
ALTER TABLE `document_request_details`
  MODIFY `docreq_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `funeral_details`
--
ALTER TABLE `funeral_details`
  MODIFY `funeral_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mass_intention_details`
--
ALTER TABLE `mass_intention_details`
  MODIFY `intention_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wedding_details`
--
ALTER TABLE `wedding_details`
  MODIFY `wedding_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
