-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 03:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `name`) VALUES
(1111, 'ผ่ายผลิต'),
(2222, 'การตลาด'),
(3333, 'สนับสนุน'),
(4444, 'ไอที');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `picture` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`, `picture`) VALUES
(3333, 'น.ส.นภา ยิ่งรวย ', '2222', 25000, 1111, 'w1.png'),
(4444, 'นางสาววิจิตรา สุทาศรี', '2222', 25000, 4444, 'w2.png'),
(5555, 'นายสุริยา รักสะอาด', '2222', 25000, 1111, ''),
(1111, 'นางศมน วิชาโท', '4444', 25000, 3333, ''),
(2222, 'นายสุริยา รักสะอาด', '1111', 20000, 4444, 'm3.png'),
(6666, 'นายยส ชื่นมื่น', '2222', 25000, 1111, ''),
(7778, 'นายสำรวย ลืมคำ', '2222', 25000, 1111, ''),
(7779, 'นายณัฐเศรษฐ์ ประดับศรี', '2222', 25000, 1111, ''),
(7780, 'Q&A ถามตอบ', '1111', 20000, 1111, 'm1.png');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(10) NOT NULL,
  `job_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`) VALUES
(1111, 'ผู้จัดการ'),
(2222, 'พนักงาน'),
(3333, 'รองผู้ดการ'),
(4444, 'ลูกจ้างสัญญา');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` enum('ADMIN','USER') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `email`, `Status`) VALUES
(001, 'phanupon', 'phanupon1234', 'phanupon phasuchaisakul', '', 'ADMIN'),
(002, 'wutthichai', 'wut1234', 'wutthichai', '', 'USER'),
(003, 'user00', '5cc32e366c87c4cb49e4309b75f57d64', 'user00 lastname', 'user00@mail.com', 'USER'),
(004, 'user00', '0baf78e0dcadd5125fbb6ae50514b3e7', 'user00 lastname', 'user00@mail.com', 'USER'),
(005, 'user01', 'b75705d7e35e7014521a46b532236ec3', 'user01 userlastname', 'user01@mail.com', 'USER'),
(006, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'ADMIN');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
