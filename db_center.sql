-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 12:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `service`
--
--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nicno` varchar(10) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contactno` varchar(45) NOT NULL,
  `usertype` int(1) UNSIGNED ZEROFILL NOT NULL,
  `password` varchar(45) NOT NULL,
  `profile` text NOT NULL,
  `lastlogin` datetime NOT NULL,
  `status` int(1) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `service` (
  `sid` int(10) UNSIGNED NOT NULL,
  `nicnosender` varchar(10) NOT NULL,
  `type` enum('special','ordinal') NOT NULL,
  `place` varchar(45) NOT NULL,
  `detail` varchar(45) NOT NULL,
  `senddate` datetime NOT NULL,
  `status` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_user`
--

CREATE TABLE `service_user` (
  `suid` int(10) UNSIGNED NOT NULL,
  `sid` int(10) UNSIGNED NOT NULL,
  `nicnoreceiver` varchar(10) NOT NULL,
  `readdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nicno`, `firstname`, `lastname`, `address`, `contactno`, `usertype`, `password`, `profile`, `lastlogin`, `status`) VALUES
('123456789v', 'Ravi', 'Kumar', 'Kopay', '0111234567', 1, '123456Rk', 'profile/Koala.jpg', '2018-05-10 12:32:04', 0),
('987654321v', 'Siva', 'Karan', 'Jafffna', '9876543210', 0, '123456Sk', '', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `FK_service_1` (`nicnosender`);

--
-- Indexes for table `service_user`
--
ALTER TABLE `service_user`
  ADD PRIMARY KEY (`suid`),
  ADD KEY `FK_service_user_1` (`sid`),
  ADD KEY `FK_service_user_2` (`nicnoreceiver`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nicno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `sid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `service_user`
--
ALTER TABLE `service_user`
  MODIFY `suid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_service_1` FOREIGN KEY (`nicnosender`) REFERENCES `user` (`nicno`);

--
-- Constraints for table `service_user`
--
ALTER TABLE `service_user`
  ADD CONSTRAINT `FK_service_user_1` FOREIGN KEY (`sid`) REFERENCES `service` (`sid`),
  ADD CONSTRAINT `FK_service_user_2` FOREIGN KEY (`nicnoreceiver`) REFERENCES `user` (`nicno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
