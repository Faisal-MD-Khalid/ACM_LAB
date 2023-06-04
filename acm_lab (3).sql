-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 05:54 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acm_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `CriteriaID` int NOT NULL,
  `Weight` int NOT NULL,
  `CriteriaName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`CriteriaID`, `Weight`, `CriteriaName`) VALUES
(1, 5, 'codeforces'),
(4, 2, 'codechef');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `GroupID` int NOT NULL,
  `supervisor` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`GroupID`, `supervisor`) VALUES
(13, 20701054);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `confirm` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iupc`
--

CREATE TABLE `iupc` (
  `ContestID` int NOT NULL,
  `ContestName` varchar(20) NOT NULL,
  `Date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iupc`
--

INSERT INTO `iupc` (`ContestID`, `ContestName`, `Date`) VALUES
(47, 'cuet', '15-12-19'),
(48, 'buet', '16-12-19'),
(46, 'cuet', '16-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `memberof`
--

CREATE TABLE `memberof` (
  `pk` int NOT NULL,
  `sID` int NOT NULL,
  `ContestTeam` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberof`
--

INSERT INTO `memberof` (`pk`, `sID`, `ContestTeam`) VALUES
(78, 20701007, 28),
(76, 20701014, 28),
(70, 20701040, 26),
(73, 20701040, 27),
(79, 20701040, 29),
(71, 20701052, 26),
(74, 20701052, 27),
(80, 20701052, 29),
(72, 20701054, 26),
(75, 20701054, 27),
(81, 20701054, 29),
(77, 20701059, 28);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `pk` int NOT NULL,
  `cRank` int NOT NULL,
  `teamID` int NOT NULL,
  `contestID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`pk`, `cRank`, `teamID`, `contestID`) VALUES
(26, 18, 36, 46),
(27, 33, 36, 47),
(28, 77, 37, 47),
(29, 43, 36, 48);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `pk` int NOT NULL,
  `rating` int NOT NULL,
  `criteria` int NOT NULL,
  `sID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`pk`, `rating`, `criteria`, `sID`) VALUES
(1, 1600, 1, 20701054);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `SName` varchar(30) NOT NULL,
  `SID` int NOT NULL,
  `Semester` int NOT NULL,
  `SC_1` int DEFAULT NULL,
  `SC_2` int DEFAULT NULL,
  `SC_3` int DEFAULT NULL,
  `GroupID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SName`, `SID`, `Semester`, `SC_1`, `SC_2`, `SC_3`, `GroupID`) VALUES
('emam', 20701007, 4, 7, 5, 4, 1),
('tajbir', 20701014, 4, 2, 2, 2, 2),
('abed', 20701019, 4, 1, 0, 1, 3),
('yakin', 20701037, 4, 5, 2, 3, 2),
('sabbir', 20701040, 4, 7, 6, 5, 1),
('tapos', 20701052, 4, 4, 5, 5, 1),
('labib', 20701054, 4, 5, 4, 4, 2),
('rsajib', 20701058, 4, 0, 0, 0, 4),
('riduan', 20701059, 4, 3, 2, 2, 3),
('faisal', 20701065, 4, 2, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TeamID` int NOT NULL,
  `TeamName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TeamID`, `TeamName`) VALUES
(36, 'cu_eagles'),
(37, 'cu_nameless');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`CriteriaID`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`GroupID`),
  ADD KEY `Test7` (`supervisor`);

--
-- Indexes for table `iupc`
--
ALTER TABLE `iupc`
  ADD PRIMARY KEY (`ContestID`),
  ADD UNIQUE KEY `namedate` (`Date`,`ContestName`),
  ADD UNIQUE KEY `name_date` (`Date`,`ContestName`),
  ADD UNIQUE KEY `.....khg` (`Date`,`ContestName`);

--
-- Indexes for table `memberof`
--
ALTER TABLE `memberof`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `contest_student_team` (`sID`,`ContestTeam`) USING BTREE,
  ADD KEY `Test5` (`ContestTeam`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `contest_team` (`contestID`,`teamID`),
  ADD KEY `Test3` (`teamID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `criteria_sid` (`criteria`,`sID`),
  ADD KEY `Test` (`sID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamID`),
  ADD UNIQUE KEY `teamname` (`TeamName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `CriteriaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `GroupID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `iupc`
--
ALTER TABLE `iupc`
  MODIFY `ContestID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `memberof`
--
ALTER TABLE `memberof`
  MODIFY `pk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `pk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `pk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TeamID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `Test7` FOREIGN KEY (`supervisor`) REFERENCES `student` (`SID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `memberof`
--
ALTER TABLE `memberof`
  ADD CONSTRAINT `Test4` FOREIGN KEY (`sID`) REFERENCES `student` (`SID`),
  ADD CONSTRAINT `Test5` FOREIGN KEY (`ContestTeam`) REFERENCES `rank` (`pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `Test2` FOREIGN KEY (`contestID`) REFERENCES `iupc` (`ContestID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Test3` FOREIGN KEY (`teamID`) REFERENCES `team` (`TeamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `Test` FOREIGN KEY (`sID`) REFERENCES `student` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Test1` FOREIGN KEY (`criteria`) REFERENCES `criteria` (`CriteriaID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
