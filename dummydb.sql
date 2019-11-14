-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 09:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaveapplication`
--

CREATE TABLE `leaveapplication` (
  `application_id` int(11) NOT NULL,
  `user_id` varchar(14) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `subjectOfLeave` varchar(25) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `typeLeave` varchar(15) NOT NULL,
  `inchargeFaculty` varchar(20) DEFAULT NULL,
  `facultyApproval` varchar(15) NOT NULL,
  `leaveStatus` int(1) NOT NULL DEFAULT '0',
  `hodStatus` int(1) NOT NULL DEFAULT '0',
  `notification_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaveapplication`
--

INSERT INTO `leaveapplication` (`application_id`, `user_id`, `fromDate`, `toDate`, `subjectOfLeave`, `reason`, `typeLeave`, `inchargeFaculty`, `facultyApproval`, `leaveStatus`, `hodStatus`, `notification_status`) VALUES
(35, '16bt6cs013', '2019-11-12', '2019-11-13', 'asdf', 'reason is nothing', '', NULL, 'Anusha', 1, 0, 3),
(36, '12345', '2019-11-12', '2019-11-14', 'check php email', 'asdfasdfasdfasdfadsfdsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Compensation Le', 'D_faculty', '', 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(14) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`) VALUES
('111', '111'),
('1212', '1212'),
('12345', '12345'),
('16bt6cs013', '1234'),
('16bt6cs023', '321'),
('16bt6cs033', '1233');

-- --------------------------------------------------------

--
-- Table structure for table `managefaculty`
--

CREATE TABLE `managefaculty` (
  `application_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `period1` varchar(15) NOT NULL,
  `period2` varchar(15) NOT NULL,
  `period3` varchar(15) NOT NULL,
  `period4` varchar(15) NOT NULL,
  `period5` varchar(15) NOT NULL,
  `period6` varchar(15) NOT NULL,
  `period7` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `token` varchar(15) NOT NULL,
  `token_expiry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(14) NOT NULL,
  `name` varchar(25) NOT NULL,
  `designation` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `LeaveTaken` int(10) NOT NULL DEFAULT '0',
  `balanceLeave` int(10) NOT NULL DEFAULT '12',
  `department` varchar(10) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `joinDate` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `designation`, `email`, `LeaveTaken`, `balanceLeave`, `department`, `mobile`, `joinDate`) VALUES
('111', 'Narayana Swamy', 'hod', 'Narayanaswamy@g.com', 0, 0, 'CSE', 8660031234, 2016),
('1212', 'Administrator', 'admin', 'Admin@g.com', 0, 0, '', 1234567899, 2016),
('122', 'Shilpa K S', 'faculty', 'shi@g.com', 0, 12, 'CSE', 8741236814, 2016),
('123', 'Vivek V', 'faculty', 'viv@g.com', 0, 12, 'CSE', 8741236813, 2016),
('12345', 'Anusha', 'faculty', 'anu@g.com', 0, 12, 'CSE', 8741236818, 2016),
('124', 'Shashikala', 'faculty', 'sha@g.com', 0, 12, 'CSE', 8741236815, 2016),
('126', 'Mahesh', 'faculty', 'mah@g.com', 0, 12, 'CSE', 8741236817, 2016),
('16bt6cs001', 'Pavan', 'student', 'pavan@g.com', 0, 12, 'CSE', 9741236811, 2016),
('16bt6cs002', 'Madhu', 'student', 'madhu@g.com', 0, 12, 'CSE', 9741236814, 2016),
('16bt6cs003', 'Ashvas', 'student', 'ashvas@g.com', 0, 12, 'CSE', 9741236815, 2016),
('16bt6cs004', 'Bhargavi', 'student', 'bhargavi.sundar4@gmail.com', 0, 12, 'CSE', 9741236819, 2016),
('16bt6cs005', 'Mimin', 'student', 'mimin@g.com', 0, 12, 'CSE', 9741236816, 2016),
('16bt6cs006', 'Bibek', 'student', 'bibek@g.com', 0, 12, 'CSE', 9741236817, 2016),
('16bt6cs007', 'Gagan', 'student', 'gagan@g.com', 0, 12, 'CSE', 9741236818, 2016),
('16bt6cs011', 'Karishma ', 'student', 'kachoo98@gmail.com', 0, 12, 'CSE', 9741236821, 2016),
('16bt6cs013', 'Nikhil Lingam', 'student', 'nikhi013@gmail.com', 1, 11, 'CSE', 9741236820, 2016),
('16bt6cs023', 'sharuk', 'student', 'sharukahmed321@gmail.com', 0, 12, 'cse', 9148555154, 2016),
('16bt6cs033', 'Ashwin.K.A', 'student', 'ashwinashok98@gmail.com', 0, 12, 'CSE', 9741236822, 2016);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `userFKApplication` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `userFK` (`user_id`);

--
-- Indexes for table `managefaculty`
--
ALTER TABLE `managefaculty`
  ADD PRIMARY KEY (`application_id`,`date`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reset_mail_FK` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  ADD CONSTRAINT `userFKApplication` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `userFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managefaculty`
--
ALTER TABLE `managefaculty`
  ADD CONSTRAINT `application_id_leave` FOREIGN KEY (`application_id`) REFERENCES `leaveapplication` (`application_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD CONSTRAINT `reset_mail_FK` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
