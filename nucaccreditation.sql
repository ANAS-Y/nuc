-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 10:27 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nucaccreditation`
--

-- --------------------------------------------------------

--
-- Table structure for table `academiccontent_pef`
--

CREATE TABLE IF NOT EXISTS `academiccontent_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comments` text NOT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `academiccontent_summary`
--

CREATE TABLE IF NOT EXISTS `academiccontent_summary` (
  `accreditationID` int(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `maximumScore` int(100) NOT NULL,
  `actualScore` int(100) NOT NULL,
  `percentageScore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accreditationrequest_apply`
--

CREATE TABLE IF NOT EXISTS `accreditationrequest_apply` (
  `accreditationID` varchar(15) NOT NULL,
  `RequestReasons` text NOT NULL,
  `prposedDate` date NOT NULL,
  `Fname` varchar(40) NOT NULL,
  `Lname` varchar(40) NOT NULL,
  `Oname` varchar(40) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`accreditationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telephone1` int(15) NOT NULL,
  `telephone2` int(15) NOT NULL,
  `homeAddress` text NOT NULL,
  `position` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `securityQuestion` varchar(100) NOT NULL,
  `securityAnswer` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centrallibrary_ssf`
--

CREATE TABLE IF NOT EXISTS `centrallibrary_ssf` (
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

CREATE TABLE IF NOT EXISTS `employersrating_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employersrating_summary`
--

CREATE TABLE IF NOT EXISTS `employersrating_summary` (
  `accreditationID` int(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `maximumScore` int(100) NOT NULL,
  `actualScore` int(100) NOT NULL,
  `percentageScore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `funding_pef`
--

CREATE TABLE IF NOT EXISTS `funding_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `funding_summary`
--

CREATE TABLE IF NOT EXISTS `funding_summary` (
  `accreditationID` int(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `maximumScore` int(100) NOT NULL,
  `actualScore` int(100) NOT NULL,
  `percentageScore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hods_account`
--

CREATE TABLE IF NOT EXISTS `hods_account` (
  `accreditationID` varchar(15) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `otherName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `qualification` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hodID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library_pef`
--

CREATE TABLE IF NOT EXISTS `library_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library_summary`
--

CREATE TABLE IF NOT EXISTS `library_summary` (
  `accreditationID` int(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `maximumScore` int(100) NOT NULL,
  `actualScore` int(100) NOT NULL,
  `percentageScore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panelmembers`
--

CREATE TABLE IF NOT EXISTS `panelmembers` (
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telephone1` int(15) NOT NULL,
  `password` varchar(70) NOT NULL,
  `accreditationID` varchar(15) NOT NULL,
  PRIMARY KEY (`accreditationID`),
  UNIQUE KEY `accreditationID` (`accreditationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panelreport_summary`
--

CREATE TABLE IF NOT EXISTS `panelreport_summary` (
  `accreditationID` varchar(15) NOT NULL,
  `philosophyObjectives` text NOT NULL,
  `curriculum` text NOT NULL,
  `admissionRequirement` text NOT NULL,
  `academicRegulations` text NOT NULL,
  `courseEvaluation` text NOT NULL,
  `studentCourseEvaluation` text NOT NULL,
  `externalExaminer` text NOT NULL,
  `staffing` text NOT NULL,
  `physicalFacilities` text NOT NULL,
  `libraryBooks` text NOT NULL,
  `financing` text NOT NULL,
  `universityComment` text NOT NULL,
  `academicScore` int(11) NOT NULL,
  `staffingScore` int(11) NOT NULL,
  `facilitiesScore` int(11) NOT NULL,
  `libraryScore` int(11) NOT NULL,
  `fundingScore` int(11) NOT NULL,
  `employersScore` int(11) NOT NULL,
  `totalScore` int(100) NOT NULL,
  `accreditationStatus` text NOT NULL,
  `dateSubmited` date NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `submissionStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physicalfacilities_pef`
--

CREATE TABLE IF NOT EXISTS `physicalfacilities_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physicalfacilities_summary`
--

CREATE TABLE IF NOT EXISTS `physicalfacilities_summary` (
  `accreditationID` int(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `maximumScore` int(100) NOT NULL,
  `actualScore` int(100) NOT NULL,
  `percentageScore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmeinfo_ssf`
--

CREATE TABLE IF NOT EXISTS `programmeinfo_ssf` (
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
  `programmehistory` text,
  `programmeAdministration` text NOT NULL,
  `studentsWelfare` text NOT NULL,
  `academicAtmosphere` text NOT NULL,
  `dateSubmited` date NOT NULL,
  `officerFname` varchar(30) NOT NULL,
  `officerSurname` varchar(30) NOT NULL,
  `officerOname` varchar(30) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `submissionStatus` varchar(20) NOT NULL,
  `hodID` varchar(16) NOT NULL,
  PRIMARY KEY (`programmeID`),
  FULLTEXT KEY `programmehistory` (`programmehistory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programme_apply`
--

CREATE TABLE IF NOT EXISTS `programme_apply` (
  `accreditationID` varchar(15) NOT NULL,
  `pID` varchar(20) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `dateEstablished` date NOT NULL,
  `status` varchar(70) NOT NULL,
  `hodID` varchar(16) NOT NULL,
  PRIMARY KEY (`pID`),
  KEY `accreditationID` (`accreditationID`),
  KEY `accreditationID_2` (`accreditationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffing_pef`
--

CREATE TABLE IF NOT EXISTS `staffing_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `score` int(100) NOT NULL,
  `comment` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffing_summary`
--

CREATE TABLE IF NOT EXISTS `staffing_summary` (
  `accreditationID` int(15) NOT NULL,
  `content` varchar(150) NOT NULL,
  `maximumScore` int(100) NOT NULL,
  `actualScore` int(100) NOT NULL,
  `percentageScore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `universityinfo_ssf`
--

CREATE TABLE IF NOT EXISTS `universityinfo_ssf` (
  `universityName` varchar(250) NOT NULL,
  `universityAddress` text NOT NULL,
  `telephone` int(15) NOT NULL,
  `dateFounded` date NOT NULL,
  `proprietorsName` varchar(150) NOT NULL,
  `proprietorsTelephone1` int(15) NOT NULL,
  `proprietorsTelephone2` int(15) NOT NULL,
  `parsuantLaw` char(3) NOT NULL,
  `parsuantEstablishe` text NOT NULL,
  `accreditationID` varchar(15) NOT NULL,
  PRIMARY KEY (`accreditationID`),
  UNIQUE KEY `accreditationID` (`accreditationID`),
  UNIQUE KEY `accreditationID_2` (`accreditationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vcinformation_ssf`
--

CREATE TABLE IF NOT EXISTS `vcinformation_ssf` (
  `firstName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telephone1` int(15) NOT NULL,
  `telephone2` int(15) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `homeAddress` text NOT NULL,
  `password` varchar(70) NOT NULL,
  `securityQuestion` varchar(100) NOT NULL,
  `securityAnswer` varchar(100) NOT NULL,
  `accreditationID` varchar(15) NOT NULL,
  PRIMARY KEY (`accreditationID`),
  UNIQUE KEY `accreditationID` (`accreditationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vcselfstudy_ssf`
--

CREATE TABLE IF NOT EXISTS `vcselfstudy_ssf` (
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
  `submissonStatus` varchar(70) NOT NULL,
  PRIMARY KEY (`accreditationID`),
  UNIQUE KEY `accreditationID` (`accreditationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitationdetails_pef`
--

CREATE TABLE IF NOT EXISTS `visitationdetails_pef` (
  `accreditationID` varchar(15) NOT NULL,
  `universityName` varchar(150) NOT NULL,
  `titleProgramme` varchar(150) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`accreditationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
