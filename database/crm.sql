-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `user_type`, `user`, `pass`, `fname`, `lname`, `mname`, `email`, `department`, `number`) VALUES
(1, 'FAE', 'jc', 'moralba', '', '', '', 'jcmoralba@gmail.com', '', 0),
(4, '', '', 'junmar', 'junmmma', 'rrriosa', '', 'junmarpogi@gmail.com', 'FAE', 91232312),
(5, '', '', '1234', 'dwqeqw', 'wadadaw', '', 'test@gmail.com', 'FAE', 9823423),
(6, '', '', '123', 'asd', 'asd', '', 'qwecqwe2@yahoo.com', 'FAE', 3123123),
(7, '', '', '123123', 'qwe', '123', '', 'qwecqwe2@yahoo.com', 'qwe', 12123123);

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_ID` int(50) NOT NULL,
  `actName` varchar(255) DEFAULT NULL,
  `datee` date DEFAULT NULL,
  `descrip` varchar(255) DEFAULT NULL,
  `contacts_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_ID`, `actName`, `datee`, `descrip`, `contacts_ID`) VALUES
(1, 'test', '2024-03-25', 'testing', 30),
(2, 'testing', '2024-03-26', 'tester', 30);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `deleted` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password_hash`, `fName`, `lName`, `deleted`) VALUES
(17, 'vladimer.ilagor@gmail.com', '$2y$10$PMQ6Soy1Az1gNVZg9YMGAuOsnyRMrWIXClzv742xiihg1KuS9G6ee', 'Vladimer', 'Ilagor', 0),
(18, 'vladimer.ilagor@gmail.coms', '$2y$10$PBDzuZZ7TJaBXnexQXcSkePDYE3RXQSokvfoZDiBh.LPG8EDxoZqe', 'Vladimer', 'Ilagor', 0),
(19, 'jrquibol@gmail.com', '$2y$10$esYsG/.sERdp0DUZoE5UTOFHakFXj3MzM8GiU/s5DAIOAUtrMj48G', 'sir', 'john', 0),
(20, 'vladimer.ilagor@gmail.comss', '$2y$10$8TdDmwmFaZ0eebT0mMVsG.eY6twVEtZhjke3CZiCR1ZCV/BeNpesO', 'Vladimer', 'Ilagor', 1),
(21, 'ilagorv.qcydoqcu@gmail.com', '$2y$10$qUpFmR5c7tsLewhSOo1JkeannE8DZGJfIZcdZadlI4qy0RqQ5.FaG', 'Vladimer', 'Ilagor', 1),
(22, 'ryanquibol05@gmail.com', '$2y$10$BS8R.ZDNe8tMOAgI9zVIb.1j8e7pPO0Fidk/SOuqXN4irwEqp1xiS', 'Sir', 'John', 1),
(23, 'zxc@gmail.com', '$2y$10$iZEuXA1DUmpxACgFPaCCy.5pJJNaGdt742EWfeOZbz691tVXWjqpe', 'try', 'asd', 0),
(24, 'qweqwe@gmail.com', '$2y$10$qK.BC28KWa0psg4zzUVwuebItAdXHutun3uYUFNhEZvmeR.3GPXE2', 'a', 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_ID` int(50) NOT NULL,
  `cName` varchar(255) DEFAULT NULL,
  `cNum` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `deleted` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_ID`, `cName`, `cNum`, `email`, `company`, `deleted`) VALUES
(1, 'test', '1234', 'test@gmail.com', 'testcompany', 0),
(2, 'Asd', '123456789', '123@123.com', '123company', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `client_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `last_contacted` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `total_sales` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`client_id`, `company_name`, `pdf`, `last_contacted`, `remark`, `total_sales`) VALUES
(1, 'zzz Company', '002_PDF', '11/2/2020', 'remarks2', '50,000'),
(2, '1235646', '1324345', '', '246576', ''),
(3, 'asdasd', 'asdasd', 'asdasd', 'asdsad', 'asdsadas');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contacts_ID` int(50) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `cNum` varchar(255) NOT NULL,
  `eMail` varchar(255) NOT NULL,
  `cPrice` int(50) NOT NULL,
  `isDeleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contacts_ID`, `fName`, `lName`, `cNum`, `eMail`, `cPrice`, `isDeleted`) VALUES
(23, 'Qwer', 'Quibol', '930242', 'hjdka@ksaj121', 0, 'yes'),
(29, 'Vladimer', 'Ilagor', '09123456789', 'vladimer.ilagor@gmail.com', 0, 'yes'),
(30, 'Vladimer', 'ilagor', '09232123212', 'test@gmail.com', 0, 'no'),
(31, 'Junmar', 'Rosaio', '0909090909', 'asd@gmail.com', 0, 'no'),
(32, 'Asdsadas', 'Asddads', '09031293123131', 'dada2@gmail.com', 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `dealID` int(50) NOT NULL,
  `dName` varchar(255) NOT NULL,
  `dValue` int(50) NOT NULL,
  `dStage` varchar(255) NOT NULL,
  `datee` date DEFAULT NULL,
  `contacts_ID` int(50) NOT NULL,
  `isDeleted` int(50) NOT NULL,
  `contacts` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL,
  `client_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`dealID`, `dName`, `dValue`, `dStage`, `datee`, `contacts_ID`, `isDeleted`, `contacts`, `orders`, `client_ID`) VALUES
(3, 'CRM', 100, 'Negotation', '2024-04-01', 29, 0, '21', 'cdo', 1),
(4, 'sda', 131, 'Qualification', NULL, 29, 1, '22', 'cdo', 2),
(5, 'asdaaaaaaa', 132, 'Qualified', '2024-03-22', 29, 0, '23', 'cdo', 1),
(6, 'adsa', 123, 'Qualification', NULL, 29, 0, '24', 'cdo', 2),
(7, 'nice', 1231, 'New', NULL, 29, 0, '25', 'toyota', 1),
(8, 'dsa', 12, 'New', '1970-01-01', 29, 0, '26', 'cdo', 2),
(9, 'asd', 123, 'New', '1970-01-01', 29, 0, '27', 'cdo', 1),
(10, 'CRMMM', 100, 'Existing', '1970-01-01', 30, 0, '28', 'cdo', 2),
(11, 'qeq', 123, 'New', '2024-03-21', 29, 0, '29', 'cdo', 1),
(12, 'xx', 1232, 'New', '2024-03-21', 29, 0, '30', 'cdo', 2),
(13, 'x1', 1111, 'Qualification', '2024-03-22', 29, 0, '31', 'v', 1),
(14, 'QWEQW', 1231, 'New', '2024-03-21', 29, 0, '32', 'v', 2),
(15, 'QEQWE', 123, 'New', '2024-03-21', 29, 0, '33', 'v', 1),
(16, 'LAST', 44, 'New', '2024-03-21', 29, 0, '34', 'cdo', 2),
(17, 'ngek', 100, 'Negotiation', '2024-03-23', 29, 0, '35', 'cdo', 1),
(21, 'sir', 1231, 'Negotiation', '2024-03-22', 29, 0, '36', 'cdo', 2),
(23, 'add', 3424, 'Negotiation', '2024-03-23', 29, 0, '37', 'cdo', 1),
(25, 'mark', 12, 'Qualified', '2024-03-22', 29, 0, '38', 'cdo', 2),
(26, 'sda', 1231, 'Qualified', '2024-03-22', 29, 0, '39', 'cdo', 1),
(28, 'iiii', 123, 'Qualified', '2024-03-22', 29, 0, '40', 'cdo', 2),
(32, 'asdas', 123, 'Qualified', '2024-03-22', 29, 0, '41', 'cdo', 1),
(33, 'opop', 88, 'Qualified', '2024-03-22', 29, 0, '42', 'cdo', 2),
(36, 'crmmmmmm', 123333, 'Negotiation', '2024-03-22', 31, 0, '43', 'v', 1),
(37, 'asddd', 1222, 'Negotiation', '2024-03-23', 31, 0, '44', 'v', 2),
(38, 'make', 12344, 'Negotiation', '2024-03-23', 31, 0, '45', 'v', 1),
(39, 'yyyy', 889, 'In - Negotiation', '2024-03-29', 30, 0, '46', 'v', 1),
(53, 'test', 2, 'Existing', '2024-03-13', 31, 0, '2', 'wrench', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `deleted`, `start_date`, `end_date`, `created_on`) VALUES
(1, 'Title 1', 'This the Description of title 1', 1, '2024-03-12', '2024-03-14', NULL),
(2, 'sdkfj', 'ksdgjfskdf', 1, '2024-03-12', '2024-03-14', NULL),
(3, 'asdas', 'asdasdasd', 1, '2024-03-13', '2024-03-21', NULL),
(4, 'BLACK FRIDAY', 'Nigga', 1, '2024-02-26', '2024-03-22', NULL),
(5, 'Title 1cfdf', 'askdjgashdihi', 1, '2024-03-22', '2024-03-26', NULL),
(6, 'Event title 1123', 'Description of title event 1', 1, '2024-03-22', '2024-03-26', NULL),
(7, 'asdas', 'hdajsda', 1, '2024-03-01', '2024-03-23', NULL),
(8, 'asdasd', 'asdasd', 1, '2024-03-01', '2024-03-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_prospect`
--

CREATE TABLE `new_prospect` (
  `prospect_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `item_deals` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_prospect`
--

INSERT INTO `new_prospect` (`prospect_id`, `company_name`, `item_deals`, `status`, `remark`, `pdf`) VALUES
(1, 'ABC Company', 'test', '', 'qweqw', 'qweqw111'),
(2, 'ZZZ Company', 'deals2', '', 'Remarks3', 'PDF1'),
(3, 'ZZZ Company', 'deals2', '', 'Remarks3', 'PDF1'),
(4, 'ZZZ Company', 'deals2', 'Contacted', 'Remarks3', ''),
(6, 'ZZZ Company', 'deals2', 'Meeting', 'Remarks3', ''),
(7, 'ZZZ Company', '3123123', 'In Negotiation', 'Remarks3', ''),
(8, 'ZZZ Company', 'deals2', 'Contacted', 'Remarks4', ''),
(9, '123 Company', 'deals2', 'Contacted', '12312', '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Contacted'),
(2, 'Meeting'),
(3, 'Sent Quotations'),
(5, 'In Negotiation'),
(6, 'Close Deals');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_ID`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contacts_ID`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`dealID`),
  ADD KEY `contacts_ID` (`contacts_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_prospect`
--
ALTER TABLE `new_prospect`
  ADD PRIMARY KEY (`prospect_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contacts_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `dealID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `new_prospect`
--
ALTER TABLE `new_prospect`
  MODIFY `prospect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`contacts_ID`) REFERENCES `contacts` (`contacts_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
