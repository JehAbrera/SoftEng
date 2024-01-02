-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 11:34 PM
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
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_details`
--

INSERT INTO `announcement_details` (`post_id`, `announce_image`, `event_name`, `event_date`, `event_time`, `description`) VALUES
(1, 'ramos.jpg', 'Araw ng kapanganakan ni Jesus', '2023-12-25', '15:07:59', ' LAST NA '),
(2, 'ramos.jpg', 'Sabay sabay na salubungin ang Bagong Taon', '2023-12-31', '14:41:20', ' Happy New Year ');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE `appointment_details` (
  `appointment_id` int(40) NOT NULL,
  `referenceNum` varchar(13) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(60) NOT NULL,
  `date_appointed` date NOT NULL,
  `time_appointed` time NOT NULL,
  `event_date` date NOT NULL,
  `event_timeStart` time NOT NULL,
  `event_timeEnd` time NOT NULL,
  `appointment_type` varchar(30) NOT NULL,
  `appointment_status` varchar(15) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `recorded` text NOT NULL DEFAULT '\'No\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_details`
--

INSERT INTO `appointment_details` (`appointment_id`, `referenceNum`, `name`, `email`, `date_appointed`, `time_appointed`, `event_date`, `event_timeStart`, `event_timeEnd`, `appointment_type`, `appointment_status`, `reason`, `recorded`) VALUES
(2, 'SJCP12345678', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-12', '15:49:22', '2023-12-29', '10:30:00', '11:45:00', 'Wedding', 'Completed', '', 'Yes'),
(3, 'SJCP12300041', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-12', '17:05:00', '2024-02-08', '10:30:00', '11:45:00', 'Wedding', 'Canceled', 'Unable to attend', 'No'),
(4, 'SJCP12301041', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-12', '17:14:39', '2024-01-08', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'Yes'),
(5, 'SJCP02300041', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-12', '19:56:59', '2024-01-31', '13:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Canceled', 'Lack of Preparetion', 'No'),
(8, 'SJCP22300041', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-12', '20:17:29', '2024-01-20', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'No'),
(9, 'SJCP32300041', 'sample2', 'sample2@yahoo.com', '2023-12-12', '20:18:12', '2023-12-29', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'No'),
(12, 'SJCP42300041', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-12', '20:28:33', '2024-01-25', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Canceled', 'Emergency', 'No'),
(16, 'SJCP52300041', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-11', '20:34:01', '2023-12-30', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'No'),
(17, 'SJCP62300041', 'sample2', 'sample2@yahoo.com', '2023-12-12', '21:54:01', '2023-12-21', '00:00:00', '00:00:00', 'Car Blessing', 'Completed', '', 'No'),
(18, 'SJCP72300041', 'sample2', 'sample2@yahoo.com', '2023-12-12', '21:55:40', '2023-12-31', '00:00:00', '00:00:00', 'Store Blessing', 'Completed', '', 'No'),
(19, 'SJCP82300041', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-12', '22:03:21', '2024-03-15', '15:00:00', '15:45:00', 'Baptism', 'Rejected', 'Change of Plans', 'No'),
(20, 'SJCP92300041', 'sample2', 'sample2@yahoo.com', '2023-12-12', '22:14:34', '2024-04-16', '00:00:00', '00:00:00', 'Motorcycle Blessing', 'Canceled', 'Personal Stuff', 'No'),
(21, 'SJCP11300041', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:13:55', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Canceled', 'Conflicting Schedule', 'no'),
(22, 'SJCP13300041', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:14:52', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Rejected', 'Conflicting Time Slot', 'no'),
(23, 'SJCP14300041', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:05', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(26, 'SJCP15300041', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:06', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(29, 'SJCP16300041', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:07', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Canceled', 'Change of Plans', ''),
(31, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:36', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(32, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:37', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(33, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:38', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(35, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:39', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'Yes'),
(36, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:40', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Rejected', '', 'no'),
(38, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:41', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Canceled', 'Change of Plans', 'no'),
(40, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:42', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(42, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:43', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(43, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:44', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(45, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:45', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(47, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:46', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(49, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:47', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(51, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:48', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Accepted', '', 'no'),
(53, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:49', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(55, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:50', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(56, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:51', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Rejected', '', 'no'),
(58, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:52', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(60, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:53', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(62, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:54', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Rejected', 'Conflicting Schedule', 'no'),
(64, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:55', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Rejected', 'Change of Plans', 'no'),
(66, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:56', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Canceled', 'Unable to attend', 'no'),
(68, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:57', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Canceled', 'Emergency', 'no'),
(69, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:58', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(71, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:15:59', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(73, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:00', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Canceled', 'Personal Stuff', 'no'),
(75, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:01', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Canceled', 'Unable to attend', 'no'),
(76, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:02', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(78, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:03', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(80, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:04', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(82, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:05', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(84, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:06', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(86, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:07', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Completed', '', 'no'),
(88, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:08', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(90, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:09', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(92, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:10', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(94, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:11', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(95, '', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '2023-12-24', '03:16:12', '2023-12-30', '15:30:00', '16:45:00', 'Wedding', 'Pending', '', 'no'),
(97, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:09', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(98, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:13', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(100, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:14', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Canceled', 'Lack of Preparetion', 'no'),
(101, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:15', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(102, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:16', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(105, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:17', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(109, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:18', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'no'),
(111, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:19', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(114, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:20', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Canceled', 'Emergency', 'no'),
(117, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:21', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(120, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:22', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'Yes'),
(123, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:23', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Rejected', '', 'no'),
(126, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:24', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(129, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:25', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(132, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:26', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(135, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:27', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Canceled', 'Unable to attend', 'no'),
(138, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:28', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'no'),
(141, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:29', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(144, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:30', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(147, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:31', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(150, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:32', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Accepted', '', 'no'),
(153, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:33', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Rejected', '', 'no'),
(156, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:34', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'no'),
(158, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:35', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(162, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:36', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'no'),
(165, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:37', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'no'),
(168, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:38', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(171, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:39', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(174, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:40', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Completed', '', 'no'),
(177, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:41', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(180, '', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '2023-12-24', '05:03:42', '2024-01-05', '15:00:00', '15:45:00', 'Baptism', 'Pending', '', 'no'),
(181, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:21', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'Yes'),
(182, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:24', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(184, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:25', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Accepted', '', 'no'),
(185, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:26', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'Yes'),
(187, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:27', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Rejected', '', 'no'),
(189, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:28', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(191, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:29', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(193, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:30', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(196, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:31', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(198, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:32', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(200, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:33', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Rejected', '', 'no'),
(203, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:34', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Rejected', '', 'no'),
(205, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:35', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(207, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:36', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'Yes'),
(210, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:37', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Rejected', 'Change of Plans', 'no'),
(213, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:38', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(215, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:39', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(218, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:40', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(220, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:41', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(223, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:42', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(225, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:43', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Canceled', 'Unable to attend', 'no'),
(228, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:44', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Accepted', '', 'no'),
(231, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:45', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Rejected', '', 'no'),
(233, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:46', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(236, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:47', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Completed', '', 'no'),
(238, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:48', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(241, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:49', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(244, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:50', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(246, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:51', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(247, '', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '2023-12-24', '05:12:52', '2024-01-06', '08:00:00', '00:00:00', 'Funeral Mass/Blessing', 'Pending', '', 'no'),
(250, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:29', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accecpted', '', 'no'),
(251, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:49', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(252, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:50', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(255, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:51', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accepted', '', 'no'),
(258, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:52', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accepted', '', 'no'),
(261, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:53', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(264, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:54', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(267, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:55', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(270, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:56', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(273, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:57', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(276, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:58', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(279, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:17:59', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accepted', '', 'no'),
(283, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:00', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Rejected', '', 'no'),
(286, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:01', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(289, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:02', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(291, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:03', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(294, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:04', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(298, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:05', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(301, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:06', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(304, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:07', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Completed', '', 'no'),
(307, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:08', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accepted', '', 'no'),
(310, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:09', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accepted', '', 'no'),
(313, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:10', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accepted', '', 'no'),
(316, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:11', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Accepted', '', 'no'),
(319, '', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '2023-12-24', '05:18:12', '2024-01-02', '18:00:00', '00:00:00', 'Mass Intention', 'Pending', '', 'no'),
(322, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:03', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(323, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:05', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(325, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:06', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(327, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:07', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(328, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:08', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(330, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:09', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(333, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:10', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(335, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:11', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(338, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:12', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(341, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:13', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(344, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:14', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(347, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:15', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(350, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:16', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(353, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:17', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(355, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:18', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(358, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:19', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(362, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:20', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(365, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:21', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(368, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:22', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(371, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:23', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(374, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:24', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(377, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:25', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(381, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:26', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(383, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:27', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Completed', '', 'no'),
(387, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:28', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(390, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:29', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(393, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:30', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(395, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:31', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(397, '', 'sample2', 'sample2@yahoo.com', '2023-12-24', '05:19:32', '2023-12-30', '00:00:00', '00:00:00', 'House Blessing', 'Pending', '', 'no'),
(399, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:20:53', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Pending', '', 'no'),
(400, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:22', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Pending', '', 'no'),
(401, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:23', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Completed', '', 'no'),
(402, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:24', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Completed', '', 'no'),
(403, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:24', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Completed', '', 'no'),
(404, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:25', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Completed', '', 'no'),
(405, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:26', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Accepted', '', 'no'),
(406, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:26', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Accepted', '', 'no'),
(407, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:27', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Pending', '', 'no'),
(408, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:27', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Pending', '', 'no'),
(409, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:28', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Cancecled', 'Unforeseen Circumstance', 'no'),
(410, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:24:28', '2023-12-28', '00:00:00', '00:00:00', 'Baptismal Certificate', 'Rejected', '', 'no'),
(411, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:36', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Pending', '', 'no'),
(412, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:41', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Completed', '', 'no'),
(413, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:41', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Accepted', '', 'no'),
(414, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:42', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Pending', '', 'no'),
(415, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:42', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Accepted', '', 'no'),
(416, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:43', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Accepted', '', 'no'),
(417, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:44', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Accepted', '', 'no'),
(418, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:44', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Completed', '', 'no'),
(419, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:45', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Completed', '', 'no'),
(420, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:45', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Completed', '', 'no'),
(421, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:46', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Completed', '', 'no'),
(422, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:54', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Completed', '', 'no'),
(423, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:54', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Rejected', '', 'no'),
(424, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:55', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Pending', '', 'no'),
(425, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:56', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Accepted', '', 'no'),
(426, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:56', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Pending', '', 'no'),
(427, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:57', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Pending', '', 'no'),
(428, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:57', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Accepted', '', 'no'),
(429, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:25:58', '2024-01-06', '00:00:00', '00:00:00', 'Good Moral Certificate', 'Completed', '', 'no'),
(430, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:12', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(431, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:16', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(432, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:17', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Accepted', '', 'no'),
(433, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:17', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Accepted', '', 'no'),
(434, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:17', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(435, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:18', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'no'),
(436, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:18', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(437, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:18', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(438, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:19', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Rejected', '', 'no'),
(439, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:19', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Accepted', '', 'no'),
(440, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:20', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(441, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:20', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'no'),
(442, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:20', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Accepted', '', 'no'),
(443, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:20', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'no'),
(444, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:21', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(445, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:21', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'no'),
(446, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:21', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'no'),
(447, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:30', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(448, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:31', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Accepted', '', 'no'),
(449, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:31', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(450, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:31', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Pending', '', 'no'),
(451, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:32', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Accepted', '', 'no'),
(452, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:32', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'no'),
(453, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:32', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Rejected', '', 'no'),
(454, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:33', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Completed', '', 'no'),
(455, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:32:33', '2024-01-06', '00:00:00', '00:00:00', 'Permit and No Record', 'Rejected', 'Conflicting Schedule', 'no'),
(456, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:34:06', '2024-01-06', '00:00:00', '00:00:00', 'Wedding Certificate', 'Pending', '', 'no'),
(457, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:34:08', '2024-01-06', '00:00:00', '00:00:00', 'Wedding Certificate', 'Accepted', '', 'no'),
(458, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:34:09', '2024-01-06', '00:00:00', '00:00:00', 'Wedding Certificate', 'Accepted', '', 'no'),
(459, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:34:10', '2024-01-06', '00:00:00', '00:00:00', 'Wedding Certificate', 'Pending', '', 'no'),
(460, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:34:10', '2024-01-06', '00:00:00', '00:00:00', 'Wedding Certificate', 'Pending', '', 'no'),
(461, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:34:11', '2024-01-06', '00:00:00', '00:00:00', 'Wedding Certificate', 'Completed', '', 'no'),
(462, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:34:11', '2024-01-06', '00:00:00', '00:00:00', 'Wedding Certificate', 'Completed', '', 'no'),
(463, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:35:30', '2024-01-06', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Completed', '', 'no'),
(464, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:35:32', '2024-01-06', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Pending', '', 'no'),
(465, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:35:32', '2024-01-06', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Completed', '', 'no'),
(466, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:35:33', '2024-01-06', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Pending', '', 'no'),
(467, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:35:33', '2024-01-06', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Rejected', '', 'no'),
(468, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:35:33', '2024-01-06', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Canceled', 'Emergency', 'no'),
(469, '', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '2023-12-24', '05:35:34', '2024-01-06', '00:00:00', '00:00:00', 'Confirmation Certificate', 'Rejected', '', 'no');

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
(2, 4, '2024-01-08', '15:00:00', '15:45:00', 'BABY', 'GIRL', 'BOY', 'Male', '2000-10-10', 'MAKATI', 'JRWEJRO HERER', '0932448239', 'DADDY', 'MEOW', 'MOMMY', 'BARK', 'Catholic Marriage', 'SUGARDADDY', 'TITO', 'SUGARMOMMY', 'TITA', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j'),
(3, 19, '2024-03-15', '15:00:00', '15:45:00', 'baby', 'ko', 'anak', 'Female', '2023-01-01', 'makati', 'meow address', '09234567890', 'ama ko', 'tatay', 'ina ko', 'nanay', 'Catholic Marriage', 'tito', 'sinigang', 'tita', 'adobo', '304061468_2637753339714891_5438805081949783654_n.j', '397248586_10224459257777051_5569628535027392278_n.'),
(4, 97, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(5, 98, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(7, 100, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(8, 101, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(9, 102, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(12, 105, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(16, 109, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(18, 111, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(21, 114, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(24, 117, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(27, 120, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(30, 123, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(33, 126, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(36, 129, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(39, 132, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(42, 135, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(45, 138, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(48, 141, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(51, 144, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(54, 147, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(57, 150, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(60, 153, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(63, 156, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(65, 158, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(69, 162, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(72, 165, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(75, 168, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(78, 171, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(81, 174, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(84, 177, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j'),
(87, 180, '2024-01-05', '15:00:00', '15:45:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones', '350482134_277677864774735_6781282249358597638_n.jp', '408149939_3320413528104831_9039154027077360422_n.j');

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
(5, '322', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(6, '323', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(8, '325', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(10, '327', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(11, '328', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(13, '330', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(16, '333', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(18, '335', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(21, '338', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(24, '341', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(27, '344', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(30, '347', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(33, '350', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(36, '353', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(38, '355', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(41, '358', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(45, '362', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(48, '365', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(51, '368', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(54, '371', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(57, '374', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(60, '377', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(64, '381', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(66, '383', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(70, '387', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(73, '390', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(76, '393', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(78, '395', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', ''),
(80, '397', '9493893859', '2023-12-30', '00:00:00', 'House Blessing', '');

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
(3, 399, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(4, 400, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(5, 401, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(6, 402, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(7, 403, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(8, 404, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(9, 405, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(10, 406, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(11, 407, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(12, 408, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(13, 409, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(14, 410, '2023-12-28', 'Baptismal Certificate', 'Certilog', 'Lollog', 'Baptislog', '2000-10-10', 'Bet', 'It', '9239423942', 'Egg', '', '304061468_2637753339714891_5438805081949783654_n.j', '', ''),
(15, 411, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(16, 412, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(17, 413, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(18, 414, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(19, 415, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(20, 416, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(21, 417, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(22, 418, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(23, 419, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(24, 420, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(25, 421, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(26, 422, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(27, 423, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(28, 424, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(29, 425, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(30, 426, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(31, 427, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(32, 428, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(33, 429, '2024-01-06', 'Good Moral Certificate', 'Mowaw', 'Uwu', 'Goodl', '2000-02-10', '', '', '9935935934', 'Lugaw Lomi', '', '304061468_2637753339714891_5438805081949783654_n.j', '403412910_1803606980082965_8839108354747965217_n.j', '350482134_277677864774735_6781282249358597638_n.jp'),
(34, 430, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(35, 431, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(36, 432, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(37, 433, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(38, 434, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(39, 435, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(40, 436, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(41, 437, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(42, 438, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(43, 439, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(44, 440, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(45, 441, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(46, 442, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(47, 443, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(48, 444, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(49, 445, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(50, 446, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(51, 447, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(52, 448, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(53, 449, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(54, 450, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(55, 451, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(56, 452, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(57, 453, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(58, 454, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(59, 455, '2024-01-06', 'Permit and No Record', 'Recaurd', 'Mcdo', 'Naur', '2000-10-10', '', '', '9213231213', 'Kissing', 'Cheeky Nini', '403412910_1803606980082965_8839108354747965217_n.j', '', ''),
(60, 456, '2024-01-06', 'Wedding Certificate', 'Adobo', 'Sinigang', 'Pad Thai', '2001-02-10', 'Chili Garlic Sauce', 'Pepper Steak', '9123124441', 'Restaurant', '', '364644656_6461019557315150_3068842320297085489_n.j', '', ''),
(61, 457, '2024-01-06', 'Wedding Certificate', 'Adobo', 'Sinigang', 'Pad Thai', '2001-02-10', 'Chili Garlic Sauce', 'Pepper Steak', '9123124441', 'Restaurant', '', '364644656_6461019557315150_3068842320297085489_n.j', '', ''),
(62, 458, '2024-01-06', 'Wedding Certificate', 'Adobo', 'Sinigang', 'Pad Thai', '2001-02-10', 'Chili Garlic Sauce', 'Pepper Steak', '9123124441', 'Restaurant', '', '364644656_6461019557315150_3068842320297085489_n.j', '', ''),
(63, 459, '2024-01-06', 'Wedding Certificate', 'Adobo', 'Sinigang', 'Pad Thai', '2001-02-10', 'Chili Garlic Sauce', 'Pepper Steak', '9123124441', 'Restaurant', '', '364644656_6461019557315150_3068842320297085489_n.j', '', ''),
(64, 460, '2024-01-06', 'Wedding Certificate', 'Adobo', 'Sinigang', 'Pad Thai', '2001-02-10', 'Chili Garlic Sauce', 'Pepper Steak', '9123124441', 'Restaurant', '', '364644656_6461019557315150_3068842320297085489_n.j', '', ''),
(65, 461, '2024-01-06', 'Wedding Certificate', 'Adobo', 'Sinigang', 'Pad Thai', '2001-02-10', 'Chili Garlic Sauce', 'Pepper Steak', '9123124441', 'Restaurant', '', '364644656_6461019557315150_3068842320297085489_n.j', '', ''),
(66, 462, '2024-01-06', 'Wedding Certificate', 'Adobo', 'Sinigang', 'Pad Thai', '2001-02-10', 'Chili Garlic Sauce', 'Pepper Steak', '9123124441', 'Restaurant', '', '364644656_6461019557315150_3068842320297085489_n.j', '', ''),
(67, 463, '2024-01-06', 'Confirmation Certificate', 'Bhie', 'Trap', 'Boo', '2000-10-10', 'Banana Ketchup', 'Mang Tomas', '9812818423', 'Soy Sauce', '', '400861806_6723540291078432_7203868383007699164_n.j', '', ''),
(68, 464, '2024-01-06', 'Confirmation Certificate', 'Bhie', 'Trap', 'Boo', '2000-10-10', 'Banana Ketchup', 'Mang Tomas', '9812818423', 'Soy Sauce', '', '400861806_6723540291078432_7203868383007699164_n.j', '', ''),
(69, 465, '2024-01-06', 'Confirmation Certificate', 'Bhie', 'Trap', 'Boo', '2000-10-10', 'Banana Ketchup', 'Mang Tomas', '9812818423', 'Soy Sauce', '', '400861806_6723540291078432_7203868383007699164_n.j', '', ''),
(70, 466, '2024-01-06', 'Confirmation Certificate', 'Bhie', 'Trap', 'Boo', '2000-10-10', 'Banana Ketchup', 'Mang Tomas', '9812818423', 'Soy Sauce', '', '400861806_6723540291078432_7203868383007699164_n.j', '', ''),
(71, 467, '2024-01-06', 'Confirmation Certificate', 'Bhie', 'Trap', 'Boo', '2000-10-10', 'Banana Ketchup', 'Mang Tomas', '9812818423', 'Soy Sauce', '', '400861806_6723540291078432_7203868383007699164_n.j', '', ''),
(72, 468, '2024-01-06', 'Confirmation Certificate', 'Bhie', 'Trap', 'Boo', '2000-10-10', 'Banana Ketchup', 'Mang Tomas', '9812818423', 'Soy Sauce', '', '400861806_6723540291078432_7203868383007699164_n.j', '', ''),
(73, 469, '2024-01-06', 'Confirmation Certificate', 'Bhie', 'Trap', 'Boo', '2000-10-10', 'Banana Ketchup', 'Mang Tomas', '9812818423', 'Soy Sauce', '', '400861806_6723540291078432_7203868383007699164_n.j', '', '');

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
  `informLast` varchar(40) NOT NULL,
  `informFirst` varchar(40) NOT NULL,
  `informMid` varchar(40) NOT NULL,
  `contNum` varchar(13) NOT NULL,
  `address` varchar(120) NOT NULL,
  `sacrament` varchar(3) NOT NULL,
  `burial` varchar(6) NOT NULL,
  `deathCert` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funeral_details`
--

INSERT INTO `funeral_details` (`funeral_id`, `foreign_id`, `event_date`, `event_timeStart`, `event_timeEnd`, `lastName`, `firstName`, `middleName`, `gender`, `deathDate`, `age`, `deathCause`, `internmentDate`, `cemeteryPlace`, `informLast`, `informFirst`, `informMid`, `contNum`, `address`, `sacrament`, `burial`, `deathCert`) VALUES
(1, 5, '2024-01-31', '13:00:00', '00:00:00', 'Dead', 'Died', 'Deceased', 'Male', '2020-10-10', 30, 'Did not live', '2020-12-10', 'Makati', 'Call,Me If', '', '', '09234782349', 'hERE ANDT there', 'Yes', 'Casket', 'ramos.jpg'),
(2, 181, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(3, 182, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(5, 184, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(6, 185, '2024-01-06', '08:00:00', '00:00:00', 'Nagi', 'Ramen', 'Joy', 'Male', '2010-10-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Ramen', 'Ton', 'ichi', '9950580869', 'Malungay', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(8, 187, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(10, 189, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(12, 191, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(14, 193, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(17, 196, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(19, 198, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(21, 200, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(24, 203, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(26, 205, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(28, 207, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(31, 210, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(34, 213, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(36, 215, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(39, 218, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(41, 220, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(44, 223, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(46, 225, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(49, 228, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(52, 231, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(54, 233, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(57, 236, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(59, 238, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(62, 241, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(65, 244, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(67, 246, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j'),
(68, 247, '2024-01-06', '08:00:00', '00:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate', 'Strawberry', 'Vanilla', '9923423423', 'Hotdog Street', 'Yes', 'Casket', '364644656_6461019557315150_3068842320297085489_n.j');

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

--
-- Dumping data for table `login_userinfo`
--

INSERT INTO `login_userinfo` (`userType`, `firstName`, `lastName`, `email`, `contactNum`, `user_password`) VALUES
('Admin', 'Gentle', 'Woman', 'gentlewoman@gmail.com', '09950580869', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
('User', 'Jelika ', 'Palad', 'jelikapalad@gmail.com', '+630995058086', '936a185caaa266bb9cbe981e9e05cb78cd732b0b3280eb944412bb6f8f8f07af');

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
(3, 250, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(4, 251, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(5, 252, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(8, 255, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(11, 258, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(14, 261, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(17, 264, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(20, 267, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(23, 270, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(26, 273, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(29, 276, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(32, 279, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(36, 283, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(39, 286, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(42, 289, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(44, 291, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(47, 294, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(51, 298, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(54, 301, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(57, 304, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(60, 307, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(63, 310, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(66, 313, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(69, 316, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?'),
(72, 319, '9766753556', '2024-01-02', '18:00:00', 'Healing/Recovery', 'Thoughts and Prayers\r\nWhat if Multiple Line?');

-- --------------------------------------------------------

--
-- Table structure for table `record_baptism_details`
--

CREATE TABLE `record_baptism_details` (
  `baptism_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
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

--
-- Dumping data for table `record_baptism_details`
--

INSERT INTO `record_baptism_details` (`baptism_id`, `event_date`, `event_time`, `lastName`, `firstName`, `middleName`, `gender`, `dob`, `pob`, `address`, `contactNum`, `fatherName`, `father_pob`, `motherName`, `mother_pob`, `marriage_type`, `godfatherName`, `godfather_address`, `godmotherName`, `godmother_address`) VALUES
(1, '2024-01-08', '15:00:00', 'BABY', 'GIRL', 'BOY', 'Male', '2000-10-10', 'MAKATI', 'JRWEJRO HERER', '0932448239', 'DADDY', 'MEOW', 'MOMMY', 'BARK', 'Catholic Marriage', 'SUGARDADDY', 'TITO', 'SUGARMOMMY', 'TITA'),
(2, '2024-01-05', '15:00:00', 'Bapty', 'Easim', 'Babe', 'Male', '2023-11-03', 'Makatlog', 'Sadness Joy Anger Disgust', '9913828312', 'Happy Feet', 'Angry Birds', 'Bible', 'Sushi', 'Catholic Marriage', 'Teenage Dirtbag', 'Wheatus', 'I Who Have Nothing', 'Tom Jones');

-- --------------------------------------------------------

--
-- Table structure for table `record_confirmation_details`
--

CREATE TABLE `record_confirmation_details` (
  `confirmation_id` int(11) NOT NULL,
  `confirmation_date` date NOT NULL,
  `confirmation_time` time NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(120) NOT NULL,
  `placeof_baptism` varchar(120) NOT NULL,
  `dateof_baptism` date NOT NULL,
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
  `funeral_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `middleName` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_death` date NOT NULL,
  `age` int(3) NOT NULL,
  `cause_of_death` varchar(120) NOT NULL,
  `date_of_interment` date NOT NULL,
  `place_of_cemetery` varchar(120) NOT NULL,
  `informLast` varchar(40) NOT NULL,
  `informFirst` varchar(40) NOT NULL,
  `informMid` varchar(40) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sacrament` varchar(3) NOT NULL,
  `burial` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record_funeral_details`
--

INSERT INTO `record_funeral_details` (`funeral_id`, `event_date`, `event_time`, `lastName`, `firstName`, `middleName`, `gender`, `date_of_death`, `age`, `cause_of_death`, `date_of_interment`, `place_of_cemetery`, `informLast`, `informFirst`, `informMid`, `contactNum`, `address`, `sacrament`, `burial`) VALUES
(1, '2024-01-06', '08:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Strawberry.Vanilla.Chocolate', '', '', '9923423423', 'Hotdog Street', 'Yes', 'Casket'),
(2, '2024-01-06', '08:00:00', 'Crispy', 'Chicken', 'Joy', 'Female', '2023-12-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Chocolate,Strawberry Vanilla', '', '', '9923423423', 'Hotdog Street', 'Yes', 'Casket'),
(3, '2024-01-06', '08:00:00', 'Nagi', 'Ramen', 'Joy', 'Male', '2010-10-01', 29, 'Burger Steak', '2024-01-05', 'Gravy', 'Ramen,Ton ichi', '', '', '9950580869', 'Malungay', 'Yes', 'Casket');

-- --------------------------------------------------------

--
-- Table structure for table `record_wedding_details`
--

CREATE TABLE `record_wedding_details` (
  `wedding_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
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
-- Dumping data for table `record_wedding_details`
--

INSERT INTO `record_wedding_details` (`wedding_id`, `event_date`, `event_time`, `groom_lastName`, `groom_firstName`, `groom_middleName`, `groom_contactNum`, `groom_dob`, `groom_pob`, `groom_address`, `groom_fatherName`, `groom_motherName`, `groom_religion`, `bride_lastName`, `bride_firstName`, `bride_middleName`, `bride_contactNum`, `bride_dob`, `bride_pob`, `bride_address`, `bride_fatherName`, `bride_motherName`, `bride_religion`) VALUES
(1, '2023-12-29', '10:30:00', 'GUY', 'DUDE', 'MAN', '09123456789', '2000-10-10', 'MAKATI', '28439 KSFKSKF', 'DAD', 'MOM', 'CATHOLIC', 'GIRL', 'WOMAN', 'GAL', '9832483284', '2000-10-10', 'MAKATI', 'R3HII', 'DAD', 'MOM', 'ISLAM'),
(2, '2023-12-30', '15:30:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant');

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
(3, 21, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(4, 22, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(5, 23, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(8, 26, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(11, 29, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(13, 31, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(14, 32, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(15, 33, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(17, 35, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(18, 36, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(20, 38, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(22, 40, '2023-12-30', '15:30:00', '16:45:00', 'Rizal', 'Nestor', 'Aquino', '+639832147765', '1995-12-14', 'Brgy. Rizal, Taguig City', '213 Sampaguita St., Brgy., Rizal, Taguig City', 'Rodolfo Apolinar Rizal', 'Beninay Aquino', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Degay', 'Melinda', 'Handog', '+639129948643', '1996-05-04', 'Pateros City', '213 Sampaguita St., Brgy., Rizal, Taguig City', 'Pedro Realonda Degay', 'Analita Handog', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(24, 42, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(25, 43, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(27, 45, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(29, 47, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(31, 49, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(33, 51, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(35, 53, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(37, 55, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(38, 56, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(40, 58, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(42, 60, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(44, 62, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(46, 64, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(48, 66, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(50, 68, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(51, 69, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(53, 71, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(55, 73, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(57, 75, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(58, 76, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(60, 78, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(62, 80, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(64, 82, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(66, 84, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(68, 86, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(70, 88, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2004-01-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(72, 90, '2023-12-30', '15:30:00', '16:45:00', 'Palad', 'JeLika', 'Pablo', '09950580869', '2004-01-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(74, 92, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(76, 94, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j'),
(77, 95, '2023-12-30', '15:30:00', '16:45:00', 'Sosi', 'Sausage', 'Mojito', '9998887777', '2023-12-01', 'Makati', 'Chill Top', 'French', 'Cheese', 'Islam', 'tabicon.png', '403412910_1803606980082965_8839108354747965217_n.j', '400861806_6723540291078432_7203868383007699164_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '304061468_2637753339714891_5438805081949783654_n.j', 'Sizzling', 'Bride', 'Sisig', '9123451234', '2019-06-19', 'Water', 'Make Me Sweat', 'Tatay', 'Mother', 'Protestant', '397248586_10224459257777051_5569628535027392278_n.', 'ramos.jpg', '400861806_6723540291078432_7203868383007699164_n.j', '408149939_3320413528104831_9039154027077360422_n.j', '350482134_277677864774735_6781282249358597638_n.jp', '364644656_6461019557315150_3068842320297085489_n.j');

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
-- Indexes for table `record_baptism_details`
--
ALTER TABLE `record_baptism_details`
  ADD PRIMARY KEY (`baptism_id`);

--
-- Indexes for table `record_confirmation_details`
--
ALTER TABLE `record_confirmation_details`
  ADD PRIMARY KEY (`confirmation_id`);

--
-- Indexes for table `record_funeral_details`
--
ALTER TABLE `record_funeral_details`
  ADD PRIMARY KEY (`funeral_id`);

--
-- Indexes for table `record_wedding_details`
--
ALTER TABLE `record_wedding_details`
  ADD PRIMARY KEY (`wedding_id`);

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `appointment_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT for table `baptism_details`
--
ALTER TABLE `baptism_details`
  MODIFY `baptism_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `blessing_details`
--
ALTER TABLE `blessing_details`
  MODIFY `blessing_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `document_request_details`
--
ALTER TABLE `document_request_details`
  MODIFY `docreq_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `funeral_details`
--
ALTER TABLE `funeral_details`
  MODIFY `funeral_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `mass_intention_details`
--
ALTER TABLE `mass_intention_details`
  MODIFY `intention_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `record_baptism_details`
--
ALTER TABLE `record_baptism_details`
  MODIFY `baptism_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `record_confirmation_details`
--
ALTER TABLE `record_confirmation_details`
  MODIFY `confirmation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record_funeral_details`
--
ALTER TABLE `record_funeral_details`
  MODIFY `funeral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `record_wedding_details`
--
ALTER TABLE `record_wedding_details`
  MODIFY `wedding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wedding_details`
--
ALTER TABLE `wedding_details`
  MODIFY `wedding_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
