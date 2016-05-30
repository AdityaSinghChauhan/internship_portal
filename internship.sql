-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2016 at 09:14 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `SNO` int(10) NOT NULL,
  `STUD_ID` int(10) NOT NULL,
  `INTERN_ID` int(10) NOT NULL,
  `EMP_ID` int(10) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COVER` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `EMP_ID` int(10) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `COM_NAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `VERIFIED` varchar(5) NOT NULL DEFAULT 'NO',
  `ABOUT` text NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`EMP_ID`, `EMAIL`, `COM_NAME`, `PASSWORD`, `CONTACT`, `ADDRESS`, `VERIFIED`, `ABOUT`, `TIME`) VALUES
(1, 'astro@gmail.com', 'Causecode', 'AGAAG', '1235456', 'ASJJHSKJHKSJHX', 'NO', 'JJKSHJDSH', '2016-05-19 13:04:43'),
(2, 'internshala@internshala.com', 'Internshala', '12345', '1234567890', 'jdhcjkdhkdhcjncuhk', 'NO', 'dkcdncdhcj kndcjhndhjkcn duchjdk n jdjk', '2016-05-19 13:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `INTERN_ID` int(20) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `COMPANY_NAME` varchar(100) NOT NULL,
  `EMP_ID` int(10) NOT NULL,
  `DURATION` int(10) NOT NULL,
  `LOCATION` varchar(50) NOT NULL,
  `DEADLINE` date NOT NULL,
  `ABOUT` text NOT NULL,
  `CATEGORY_1` varchar(50) NOT NULL,
  `CATEGORY_2` varchar(50) NOT NULL,
  `CATEGORY_3` varchar(50) NOT NULL,
  `STIPEND` int(100) NOT NULL DEFAULT '0',
  `START_DATE` date NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`INTERN_ID`, `NAME`, `COMPANY_NAME`, `EMP_ID`, `DURATION`, `LOCATION`, `DEADLINE`, `ABOUT`, `CATEGORY_1`, `CATEGORY_2`, `CATEGORY_3`, `STIPEND`, `START_DATE`, `TYPE`, `TIME`) VALUES
(1, 'Web Developer', 'Internshala', 2, 2, 'Gurgaon', '2016-05-25', 'CDKJLJ LKIFJIDFUJ JF OIUOI UF I IOU OIEFU IEU OFIEW', 'IT', 'MANAGEMENT', 'OTHER', 10000, '2016-05-31', 'Full Time', '2016-05-20 04:13:55'),
(2, 'Web Developer', 'Internshala', 2, 2, 'Gurgaon', '2016-05-25', 'jvkldj  jjvd jv kl jv jdkl jkjv dklj vldkj ldkfj', 'IT', 'NGO', 'OTHER', 10000, '2016-05-31', 'Part Time', '2016-05-20 04:14:00'),
(3, 'Web Developer', 'Internshala', 2, 2, 'Gurgaon', '2016-05-20', 'CNDCKNDJC JCDJCN JN  NJ NCJ N NJC NJ CNJN  NJCN JN ', 'Engineering', 'IT', 'NGO', 10000, '2016-06-01', 'Remote', '2016-05-20 04:14:04'),
(4, 'Web Developer 2', 'Internshala', 2, 2, 'Gurgaon', '2016-05-20', 'FJVN JVN JN NJ NJKV NJVN V', 'IT', 'MANAGEMENT', 'NGO', 10000, '2016-05-31', 'Remote', '2016-05-20 04:14:08'),
(6, 'Web Developer 5', 'Internshala', 2, 2, 'Gurgaon', '2016-05-20', 'KDCNKXN KMK MKL MKM KM M CK M MKC M', 'Engineering', 'Engineering', 'Engineering', 10000, '2016-05-31', 'Full Time', '2016-05-20 07:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUD_ID` int(10) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `F_NAME` varchar(50) NOT NULL,
  `L_NAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `MOBILE` varchar(13) NOT NULL,
  `COLLEGE` varchar(200) NOT NULL,
  `VERIFIED` varchar(5) NOT NULL DEFAULT 'No',
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains the primary data of students';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUD_ID`, `EMAIL`, `F_NAME`, `L_NAME`, `PASSWORD`, `MOBILE`, `COLLEGE`, `VERIFIED`, `TIME`) VALUES
(1, 'astroaditya@gmail.com', 'aditya', 'chauhan', 'astro1801`', '8359064532', 'BIT,Durg', 'No', '2016-05-18 14:52:45'),
(2, 'astroadityachauhan@gmail.com', 'Aditya', 'Chauhan', 'astro1801', '8359064532', 'Bhilai Institute of technology, Durg', 'No', '2016-05-18 15:01:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`INTERN_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUD_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `SNO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `EMP_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `INTERN_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `STUD_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
