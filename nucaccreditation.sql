-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 02:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuc3`
--

-- --------------------------------------------------------

--
-- Table structure for table `academiccontent_pef`
--

CREATE TABLE `academiccontent_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comments` text NOT NULL,
  `ID` bigint(20) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telephone1` int(15) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`firstName`, `surname`, `otherName`, `email`, `telephone1`, `password`) VALUES
('Maimuna', 'Yusuf', 'Tahir', 'maimuna@gmail.com', 2147483647, '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `centrallibrary_ssf`
--

CREATE TABLE `centrallibrary_ssf` (
  `accreditationID` varchar(15) NOT NULL,
  `officerName` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `gradeLevel` varchar(20) NOT NULL,
  `floorArea` varchar(225) NOT NULL,
  `studentPopulation` varchar(225) NOT NULL,
  `sittingCapacity` varchar(100) NOT NULL,
  `openHour` int(24) NOT NULL,
  `closingHour` int(24) NOT NULL,
  `staffLendingPolicy` varchar(100) NOT NULL,
  `studentLendingPolicy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employersrating_pef`
--

CREATE TABLE `employersrating_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `funding_pef`
--

CREATE TABLE `funding_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hods_account`
--

CREATE TABLE `hods_account` (
  `accreditationID` varchar(15) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `otherName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `qualification` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hodID` varchar(16) NOT NULL,
  `universityID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library_pef`
--

CREATE TABLE `library_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panelmembers`
--

CREATE TABLE `panelmembers` (
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telephone1` int(15) NOT NULL,
  `password` varchar(70) NOT NULL,
  `accreditationID` varchar(15) NOT NULL,
  `ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panelreport`
--

CREATE TABLE `panelreport` (
  `ID` varchar(255) NOT NULL,
  `academicContent` decimal(65,0) NOT NULL,
  `employersRating` decimal(65,0) NOT NULL,
  `funding` decimal(65,0) NOT NULL,
  `library` decimal(60,0) NOT NULL,
  `physicalFacilities` decimal(60,0) NOT NULL,
  `staffing` decimal(60,0) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `oName` varchar(50) NOT NULL,
  `status` varchar(60) NOT NULL,
  `submitedDate` date NOT NULL,
  `accreditationID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panelreport_summary`
--

CREATE TABLE `panelreport_summary` (
  `ID` varchar(255) NOT NULL,
  `academicContent` decimal(65,0) NOT NULL,
  `employersRating` decimal(65,0) NOT NULL,
  `funding` decimal(65,0) NOT NULL,
  `library` decimal(60,0) NOT NULL,
  `physicalFacilities` decimal(60,0) NOT NULL,
  `staffing` decimal(60,0) NOT NULL,
  `total` decimal(65,0) NOT NULL,
  `avg` decimal(65,0) NOT NULL,
  `panelresut` varchar(255) NOT NULL,
  `accreditation_status` varchar(255) NOT NULL,
  `accreditationDate` date NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `oName` varchar(50) NOT NULL,
  `status` varchar(60) NOT NULL,
  `sdate` date NOT NULL,
  `accreditationID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panelreport_summary_avg`
--

CREATE TABLE `panelreport_summary_avg` (
  `ID` varchar(255) NOT NULL,
  `academicContent` decimal(65,0) NOT NULL,
  `employersRating` decimal(65,0) NOT NULL,
  `funding` decimal(65,0) NOT NULL,
  `library` decimal(60,0) NOT NULL,
  `physicalFacilities` decimal(60,0) NOT NULL,
  `staffing` decimal(60,0) NOT NULL,
  `total` decimal(65,0) NOT NULL,
  `avg` decimal(65,0) NOT NULL,
  `panelresut` varchar(255) NOT NULL,
  `accreditation_status` varchar(255) NOT NULL,
  `accreditationDate` date NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `oName` varchar(50) NOT NULL,
  `status` varchar(60) NOT NULL,
  `submitedDate` date NOT NULL,
  `accreditationID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `physicalfacilities_pef`
--

CREATE TABLE `physicalfacilities_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmeinfo_ssf`
--

CREATE TABLE `programmeinfo_ssf` (
  `programmeID` int(11) NOT NULL,
  `accreditationID` varchar(15) NOT NULL,
  `programmeTitle` varchar(100) NOT NULL,
  `accreditationType` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `visitedBefore` char(3) NOT NULL,
  `dateEstablished` date NOT NULL,
  `deanName` varchar(100) NOT NULL,
  `deanQualification` varchar(100) NOT NULL,
  `hodName` varchar(100) NOT NULL,
  `hodQualification` text NOT NULL,
  `programmehistory` text DEFAULT NULL,
  `programmeAdministration` text NOT NULL,
  `studentsWelfare` text NOT NULL,
  `academicAtmosphere` text NOT NULL,
  `dateSubmited` date NOT NULL,
  `officerFname` varchar(30) NOT NULL,
  `officerSurname` varchar(30) NOT NULL,
  `officerOname` varchar(30) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `submissionStatus` varchar(20) NOT NULL,
  `hodID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programme_apply`
--

CREATE TABLE `programme_apply` (
  `accreditationID` varchar(15) NOT NULL,
  `pID` varchar(20) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `dateEstablished` date NOT NULL,
  `status` varchar(70) NOT NULL,
  `hodID` varchar(16) NOT NULL,
  `universityID` varchar(15) NOT NULL,
  `duedate` varchar(20) NOT NULL,
  `accreditation_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffing_pef`
--

CREATE TABLE `staffing_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `universityinfo_ssf`
--

CREATE TABLE `universityinfo_ssf` (
  `universityName` varchar(250) NOT NULL,
  `universityAddress` text NOT NULL,
  `telephone` int(15) NOT NULL,
  `dateFounded` date NOT NULL,
  `proprietorsName` varchar(150) NOT NULL,
  `proprietorsTelephone1` int(15) NOT NULL,
  `proprietorsTelephone2` int(15) NOT NULL,
  `parsuantLaw` char(3) NOT NULL,
  `parsuantEstablishe` text NOT NULL,
  `universityID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vcinformation_ssf`
--

CREATE TABLE `vcinformation_ssf` (
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telephone1` int(255) NOT NULL,
  `telephone2` int(255) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `homeAddress` text NOT NULL,
  `password` varchar(70) NOT NULL,
  `securityQuestion` varchar(100) NOT NULL,
  `securityAnswer` varchar(100) NOT NULL,
  `universityID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vcselfstudy_ssf`
--

CREATE TABLE `vcselfstudy_ssf` (
  `accreditationID` varchar(15) NOT NULL,
  `ownershipControl` text NOT NULL,
  `organisationAdministration` text NOT NULL,
  `phillosophyObjectives` text NOT NULL,
  `utilityServices` text NOT NULL,
  `curriculumDesign` text NOT NULL,
  `updatingCurricula` text NOT NULL,
  `bookList` text NOT NULL,
  `aquisitionPolicy` text NOT NULL,
  `libraryservices` text NOT NULL,
  `staffAccomodation` text NOT NULL,
  `sportFacilities` text NOT NULL,
  `healthFacilities` text NOT NULL,
  `recruitmentPolicy` text NOT NULL,
  `staffDevelopment` text NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `rank` varchar(70) NOT NULL,
  `dateSubmited` date NOT NULL,
  `submissonStatus` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitationdetails_pef`
--

CREATE TABLE `visitationdetails_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `universityName` varchar(150) NOT NULL,
  `titleProgramme` varchar(150) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academiccontent_pef`
--
ALTER TABLE `academiccontent_pef`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `hods_account`
--
ALTER TABLE `hods_account`
  ADD PRIMARY KEY (`accreditationID`);

--
-- Indexes for table `panelmembers`
--
ALTER TABLE `panelmembers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `panelreport`
--
ALTER TABLE `panelreport`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `panelreport_summary`
--
ALTER TABLE `panelreport_summary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `panelreport_summary_avg`
--
ALTER TABLE `panelreport_summary_avg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `programmeinfo_ssf`
--
ALTER TABLE `programmeinfo_ssf`
  ADD PRIMARY KEY (`programmeID`);
ALTER TABLE `programmeinfo_ssf` ADD FULLTEXT KEY `programmehistory` (`programmehistory`);

--
-- Indexes for table `programme_apply`
--
ALTER TABLE `programme_apply`
  ADD PRIMARY KEY (`pID`),
  ADD KEY `accreditationID` (`accreditationID`),
  ADD KEY `accreditationID_2` (`accreditationID`);

--
-- Indexes for table `universityinfo_ssf`
--
ALTER TABLE `universityinfo_ssf`
  ADD PRIMARY KEY (`universityID`),
  ADD UNIQUE KEY `accreditationID` (`universityID`),
  ADD UNIQUE KEY `accreditationID_2` (`universityID`);

--
-- Indexes for table `vcinformation_ssf`
--
ALTER TABLE `vcinformation_ssf`
  ADD PRIMARY KEY (`universityID`),
  ADD UNIQUE KEY `accreditationID` (`universityID`);

--
-- Indexes for table `vcselfstudy_ssf`
--
ALTER TABLE `vcselfstudy_ssf`
  ADD PRIMARY KEY (`accreditationID`),
  ADD UNIQUE KEY `accreditationID` (`accreditationID`);

--
-- Indexes for table `visitationdetails_pef`
--
ALTER TABLE `visitationdetails_pef`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academiccontent_pef`
--
ALTER TABLE `academiccontent_pef`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
