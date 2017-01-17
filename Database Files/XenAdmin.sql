-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2017 at 07:16 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `XenAdmin`
--
CREATE DATABASE IF NOT EXISTS `XenAdmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `XenAdmin`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `password` varchar(25) NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `user_id`, `password`, `Created_on`) VALUES
(1, 'admin@xen.ai', 'password', '2017-01-05 22:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `password` varchar(25) NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xen_application`
--

CREATE TABLE `xen_application` (
  `app_ID` int(11) NOT NULL,
  `env_ID` int(11) NOT NULL,
  `app_name` varchar(256) NOT NULL,
  `app_desc` varchar(256) NOT NULL,
  `app_logSource` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xen_application`
--

INSERT INTO `xen_application` (`app_ID`, `env_ID`, `app_name`, `app_desc`, `app_logSource`) VALUES
(1, 0, 'Apache', 'apache server Log', '/lammp/log'),
(2, 1, 'Test add', 'tets UI', '/opt/lampp');

-- --------------------------------------------------------

--
-- Table structure for table `xen_environments`
--

CREATE TABLE `xen_environments` (
  `environment_ID` int(11) NOT NULL,
  `environment_name` varchar(256) NOT NULL,
  `hostID` varchar(256) NOT NULL,
  `hostPassword` varchar(512) NOT NULL,
  `environment_desc` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xen_environments`
--

INSERT INTO `xen_environments` (`environment_ID`, `environment_name`, `hostID`, `hostPassword`, `environment_desc`) VALUES
(1, 'Xen AI Engine', '192.168.0.113', 'password', 'Host Environment for the automation Engine'),
(4, 'Test Env', 'www.aws.com', 'Hello ', 'The AWS ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `User_id` (`user_id`);

--
-- Indexes for table `xen_application`
--
ALTER TABLE `xen_application`
  ADD PRIMARY KEY (`app_ID`);

--
-- Indexes for table `xen_environments`
--
ALTER TABLE `xen_environments`
  ADD PRIMARY KEY (`environment_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `xen_application`
--
ALTER TABLE `xen_application`
  MODIFY `app_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xen_environments`
--
ALTER TABLE `xen_environments`
  MODIFY `environment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
