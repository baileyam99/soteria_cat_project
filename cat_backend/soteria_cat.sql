-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 06:17 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soteria_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `caselist`
--

CREATE TABLE `caselist` (
  `codename` varchar(255) NOT NULL,
  `clientName` varchar(20) DEFAULT NULL,
  `caseType` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `lead` varchar(20) NOT NULL,
  `caseStatus` tinyint(1) NOT NULL,
  `openDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `closeDate` timestamp NULL DEFAULT NULL,
  `retentionDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caselist`
--

INSERT INTO `caselist` (`codename`, `clientName`, `caseType`, `description`, `lead`, `caseStatus`, `openDate`, `closeDate`, `retentionDate`) VALUES
('APOLLO', 'Mom & Pop Store', 'malware', ' Description', 'tgilchrist', 1, '2022-03-20 22:30:28', NULL, NULL),
('DAEDALUS', 'Big Co Inc', 'ransomware', 'Daedalus description', 'pihme', 1, '2022-03-20 22:30:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `casetypes`
--

CREATE TABLE `casetypes` (
  `caseType` varchar(255) NOT NULL,
  `objectives` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casetypes`
--

INSERT INTO `casetypes` (`caseType`, `objectives`) VALUES
('malware', 'obj'),
('phishing', 'obj'),
('ransomware', 'obj');

-- --------------------------------------------------------

--
-- Table structure for table `chainofcustody`
--

CREATE TABLE `chainofcustody` (
  `codename` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `actionTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `releasedBy` varchar(20) NOT NULL,
  `releasedTo` varchar(20) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evidencelog`
--

CREATE TABLE `evidencelog` (
  `codename` varchar(255) NOT NULL,
  `idNum` int(11) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `descriptor` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `dateModified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `itemHash` varchar(255) DEFAULT NULL,
  `collector` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evidencelog`
--

INSERT INTO `evidencelog` (`codename`, `idNum`, `fileName`, `descriptor`, `size`, `dateModified`, `itemHash`, `collector`) VALUES
('APOLLO', 1, 'file1', 'descriptor1', '245 kb', '2022-03-30 02:43:58', 'hdeyhdeygy1', 'tgilchrist'),
('APOLLO', 2, 'File3', 'Description3', 'HUGE', '0000-00-00 00:00:00', 'fjuehwiu', 'csarlo'),
('DAEDALUS', 3, 'file2', 'descriptor2', '245 kb', '2022-03-30 02:43:58', 'hde332f41', 'csarlo');

-- --------------------------------------------------------

--
-- Table structure for table `indices`
--

CREATE TABLE `indices` (
  `codename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `indexValue` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `ID` int(11) NOT NULL,
  `codename` varchar(255) DEFAULT NULL,
  `submitDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `body` text NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`codename`, `submitDate`, `body`, `username`) VALUES
('APOLLO', '2022-03-20 23:46:59', 'This is a note about APOLLO', 'tgilchrist'),
('APOLLO', '2022-03-21 04:47:18', 'This is a new note about APOLLO', 'csarlo'),
('DAEDALUS', '2022-03-21 04:47:52', ' Wax wings are a major vulnerability', 'csarlo'),
('APOLLO', '2022-03-21 22:37:23', ' Here is a note', 'csarlo');

-- --------------------------------------------------------

--
-- Table structure for table `physicalinventory`
--

CREATE TABLE `physicalinventory` (
  `codename` varchar(255) NOT NULL,
  `idNum` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `disposition` varchar(255) DEFAULT NULL,
  `collector` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `admin`) VALUES
('csarlo', 1),
('pihme', 1),
('tgilchrist', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caselist`
--
ALTER TABLE `caselist`
  ADD PRIMARY KEY (`codename`);

--
-- Indexes for table `casetypes`
--
ALTER TABLE `casetypes`
  ADD PRIMARY KEY (`caseType`);

--
-- Indexes for table `chainofcustody`
--
ALTER TABLE `chainofcustody`
  ADD KEY `codename` (`codename`,`identifier`),
  ADD KEY `codename_index_coc` (`codename`);

--
-- Indexes for table `evidencelog`
--
ALTER TABLE `evidencelog`
  ADD PRIMARY KEY (`idNum`,`codename`) USING BTREE,
  ADD KEY `codename_index_el` (`codename`);

--
-- Indexes for table `indices`
--
ALTER TABLE `indices`
  ADD PRIMARY KEY (`codename`,`type`,`indexValue`),
  ADD KEY `codename_index_indices` (`codename`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `codename_index_notes` (`codename`),
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Indexes for table `physicalinventory`
--
ALTER TABLE `physicalinventory`
  ADD PRIMARY KEY (`idNum`,`codename`) USING BTREE,
  ADD KEY `codename_index_pi` (`codename`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evidencelog`
--
ALTER TABLE `evidencelog`
  MODIFY `idNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `physicalinventory`
--
ALTER TABLE `physicalinventory`
  MODIFY `idNum` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chainofcustody`
--
ALTER TABLE `chainofcustody`
  ADD CONSTRAINT `chainofcustody_ibfk_1` FOREIGN KEY (`codename`,`identifier`) REFERENCES `physicalinventory` (`codename`, `identifier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
