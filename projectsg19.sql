-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2019 at 01:17 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsg19`
--

-- --------------------------------------------------------

--
-- Table structure for table `acdyr`
--

CREATE TABLE `acdyr` (
  `acid` int(20) NOT NULL,
  `yr_start` year(4) NOT NULL,
  `yr_end` year(4) NOT NULL,
  `readmn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acdyr`
--

INSERT INTO `acdyr` (`acid`, `yr_start`, `yr_end`, `readmn`) VALUES
(201213, 2012, 2013, 0),
(201314, 2013, 2014, 0),
(201415, 2014, 2015, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(4) NOT NULL,
  `uname` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `uname`, `pass`, `user_type`) VALUES
(101, 'admin', 'admin12345', 'ADMIN'),
(102, 'office', 'office12345', 'OFFICE'),
(103, 'principal', 'princi12345', 'VIEW');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bankid` int(20) NOT NULL,
  `regno` int(20) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `branch` varchar(40) DEFAULT NULL,
  `branchcode` varchar(30) DEFAULT NULL,
  `MICR` varchar(40) DEFAULT NULL,
  `IFSC` varchar(40) DEFAULT NULL,
  `accno` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankid`, `regno`, `name`, `branch`, `branchcode`, `MICR`, `IFSC`, `accno`) VALUES
(5, 12347, 'assdag', 'zdfdfga', 'dfagdfg', '', '', 12343423),
(6, 12348, 'uykuggk', 'fkglgl', 'hmgkfkf', 'gfdjd', 'hdj', 65486),
(7, 123489, 'kvkygligl', 'jhvlvl', 'jhb', 'hb', 'jhl', 6516614),
(8, 12355, 'uyfukg', 'hvhvl', 'jvuv', 'gilyg', '', 4648494),
(9, 12365, 'truyx', 'tfi7tftc', 'yccc', 'ytc7icc', 'ycictic', 2147483647),
(10, 12375, 'ryfuci7c', 'tvuvcvitc', 'tci', '', '', 0),
(11, 12385, 'ytfyf7if', 'yvuovv', 'yvvovv', '', '', 0),
(12, 12395, 'yjtcycyc', 'tctckvct', 'vkctcc', '', '', 0),
(13, 12445, 'rycyjcc', 'tvucuc', '', '', '', 664446842),
(14, 12545, 'tftfffbtf', 'bfi7fn', '', '', '', 84842494),
(15, 12645, 'uaufibfb', 'snifbgbg', '', '', '', 2147483647),
(16, 12745, 'gbsfgsb', 'gbsreg', '', '', '', 556549584),
(17, 12845, 'rbhttbnr', 'styyenty', '', '', '', 5165161);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(10) NOT NULL,
  `category_name` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
('lkdp', 'LAKSHADWEEP MUSLIM'),
('oth', 'OTHERS'),
('scst', 'SCHEDULED CAST/ SCHEDULED TRIBE');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `deptid` int(4) NOT NULL,
  `deptname` varchar(60) DEFAULT NULL,
  `tutid` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`deptid`, `deptname`, `tutid`) VALUES
(101, 'ARABIC', 1),
(102, 'BIOSCIENCES', 2),
(103, 'BUSINESS ADMINISTRATION', 3),
(104, 'COMMERCE', 4),
(105, 'COMPUTER APPLICATIONS', 5),
(106, 'ELECTRONICS', NULL),
(107, 'ENGLISH', NULL),
(108, 'LANGUAGES', NULL),
(109, 'MATHEMATICS AND STATISTICS', NULL),
(110, 'PHYSICAL EDUCATION', NULL),
(111, 'PHYSICS', NULL),
(112, 'PSYCHOLOGY', NULL),
(113, 'ANIMATION AND GRAPHIC DESIGN', NULL),
(114, 'HUMAN RESOURCES AND MANAGEMENT', NULL),
(115, 'FASHION DESIGN AND MANAGEMENT', NULL),
(116, 'LOGISTICS MANAGEMENT', NULL),
(117, 'INDUSTRIAL INSTRUMENTATION AND AUTOMATION', NULL),
(118, 'SOFTWARE DEVELOPMENT AND SYSTEM ADMINISTRATION', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `external`
--

CREATE TABLE `external` (
  `extermarkid` int(20) NOT NULL,
  `extid` int(20) DEFAULT NULL,
  `semid` int(4) DEFAULT NULL,
  `prgmid` int(20) DEFAULT NULL,
  `subid1` varchar(40) NOT NULL,
  `submark1` int(20) NOT NULL,
  `subid2` varchar(40) NOT NULL,
  `submark2` int(20) NOT NULL,
  `subid3` varchar(40) NOT NULL,
  `submark3` int(20) NOT NULL,
  `subid4` varchar(40) NOT NULL,
  `submark4` int(20) NOT NULL,
  `subid5` varchar(40) NOT NULL,
  `submark5` int(20) NOT NULL,
  `subid6` varchar(40) NOT NULL,
  `submark6` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `tutor_prgmid` int(20) NOT NULL,
  `acdid` int(20) NOT NULL,
  `semid` varchar(10) NOT NULL,
  `prgmid` int(20) NOT NULL,
  `tut1id` int(20) NOT NULL,
  `tut2id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`tutor_prgmid`, `acdid`, `semid`, `prgmid`, `tut1id`, `tut2id`) VALUES
(1, 201213, 's6201213', 1007, 2, 9),
(9, 201314, 's6201314', 1001, 7, 8),
(12, 201415, 's1201415', 1008, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `internal`
--

CREATE TABLE `internal` (
  `intermarkid` int(20) NOT NULL,
  `intid` int(20) DEFAULT NULL,
  `semid` int(4) DEFAULT NULL,
  `prgmid` int(20) DEFAULT NULL,
  `subid1` varchar(40) DEFAULT NULL,
  `submark1` int(20) NOT NULL,
  `subid2` varchar(40) NOT NULL,
  `submark2` int(20) NOT NULL,
  `subid3` varchar(40) NOT NULL,
  `submark3` int(20) NOT NULL,
  `subid4` varchar(40) NOT NULL,
  `submark4` int(20) NOT NULL,
  `subid5` varchar(40) NOT NULL,
  `submark5` int(20) NOT NULL,
  `subid6` varchar(40) NOT NULL,
  `submark6` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `sender_id` int(20) NOT NULL,
  `receiver_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `title`, `content`, `sender_id`, `receiver_id`) VALUES
(0, 'test', 'content test to maximum', 12, 101);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `prgmid` int(20) NOT NULL,
  `prgmname` varchar(70) DEFAULT NULL,
  `deptid` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prgmid`, `prgmname`, `deptid`) VALUES
(1001, 'BA ARABIC LANGUAGE AND LITERATURE MODEL II (SELF FINANCING)', 101),
(1002, 'CERTIFICATE COURSE IN FUNCTIONAL ARABIC', 101),
(1003, 'M.Sc MICROBIOLOGY (SELF FINANCING)', 102),
(1004, 'M.Sc BIOCHEMISTRY (SELF FINANCING)', 102),
(1005, 'M.Sc. BIOTECHNOLOGY (AIDED)', 102),
(1006, 'B.Sc. MICROBIOLOGY (SELF FINANCING)', 102),
(1007, 'B.Sc. BIOTECHNOLOGY (SELF FINANCING)', 102),
(1008, 'BACHELOR OF BUSINESS ADMINISTRATION (AIDED)', 103),
(1009, 'CERTIFICATE COURSE ON HUMAN RIGHTS LAW AND CYBER SPACE', 103),
(1010, 'CERTIFICATE COURSE ON SOFT SKILL DEVELOPMENT', 103),
(1011, 'CERTIFICATE COURSE IN TAX', 104),
(1012, 'CERTIFICATE COURSE IN COMPUTERIZED ACCOUNTING -TALLY', 104),
(1013, 'CERTIFICATE COURSE FOR RESEARCH METHODOLOGY', 104),
(1014, 'CERTIFICATE COURSE FOR BUSINESS COMMUNICATION', 104),
(1015, 'CERTIFICATE COURSE FOR ENTREPRENEURSHIP DEVELOPMENT PROGRAMME', 104),
(1016, 'M.COM. FINANCE (SELF FINANCING)', 104),
(1017, 'B.COM. FINANCE & TAXATION (MODEL I) (SELF FINANCING)', 104),
(1018, 'B.COM. WITH COMPUTER APPLICATION (MODEL II) (AIDED)', 104),
(1019, 'M.SC. COMPUTER SCIENCE (AIDED)', 105),
(1020, 'BACHELOR OF COMPUTER APPLICATION (AIDED)', 105),
(1021, 'DIPLOMA IN COMPUTER APPLICATIONS ', 105),
(1022, 'NPTEL', 105),
(1023, 'SPOKEN TUTORIAL SYSTEM', 105),
(1024, 'B.Sc. ELECTRONICS (AIDED)', 106),
(1025, 'M.Sc. ELECTRONICS (SELF FINANCING)', 106),
(1026, 'CERTIFICATE COURSE ON MATLAB', 106),
(1027, 'CERTIFICATE COURSE ON DATA COMMUNICATION & COMPUTER HARDWARE', 106),
(1028, 'B.A.ENGLISH MODEL III LITERATURE, COMMUNICATION & JOURNALISM(SELF)', 107),
(1029, 'M.A ENGLISH LANGUAGE & LITERATURE (SELF FINANCING)', 107),
(1030, 'CERTIFICATE COURSE IN COMMUNICATIVE ENGLISH', 107),
(1031, 'BRIDGE COURSE IN HISTORY OF ENGLISH LITERATURE', 107),
(1032, 'LANGUAGE', 108),
(1033, 'B.SC. MATHEMATICS WITH COMPUTER SCIENCE (MODEL II) (SELF FINANCING)', 109),
(1034, 'PHYSICAL EDUCATION', 110),
(1035, 'M.SC. PHYSICS (SELF FINANCING)', 111),
(1036, 'B.SC. PHYSICS WITH COMPUTER (MODEL II) (SELF FINANCING)', 111),
(1037, 'B.Sc PSYCHOLOGY (MODEL I)(SELF FINANCING)', 112),
(1038, 'CERTIFICATE COURSE IN COUNSELLING SKILLS FOR ENHANCING SELF AND OTHERS', 112),
(1039, 'CERTIFICATE COURSE IN COMMUNICATION IN ORGANIZATION SETTINGS', 112),
(1040, 'B.VOC ANIMATION & GRAPHIC DESIGN (SELF FINANCING)', 113),
(1041, 'CERTIFICATE COURSE ON FILM APPRECIATION', 113),
(1042, 'CERTIFICATE COURSE ON FUNDAMENTALS OF 3D ANIMATION', 113),
(1043, 'CERTIFICATE COURSE ON LAYOUT DESIGN', 113),
(1044, 'CERTIFICATE COURSE ON SOFT SKILL & PERSONALITY DEVELOPMENT', 113),
(1045, 'MHRM (SELF FINANCING)', 114),
(1046, 'B.VOC FASHION DESIGN & MANAGEMENT (AIDED)', 115),
(1047, 'B.VOC LOGISTICS MANAGEMENT (SELF FINANCING)', 116),
(1048, 'B.VOC INDUSTRIAL INSTRUMENTATION & AUTOMATION (AIDED)', 117),
(1049, 'B.VOC SOFTWARE DEVELOPMENT & SYSTEM ADMINISTRATION (AIDED)', 118);

-- --------------------------------------------------------

--
-- Table structure for table `qualexam`
--

CREATE TABLE `qualexam` (
  `qid` int(20) NOT NULL,
  `regno` int(20) DEFAULT NULL,
  `nameofexam` varchar(60) DEFAULT NULL,
  `nameofboard` varchar(60) DEFAULT NULL,
  `nameofinst` varchar(60) DEFAULT NULL,
  `examregno` int(20) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `qsub1` varchar(90) DEFAULT NULL,
  `qsub2` varchar(90) DEFAULT NULL,
  `qsub3` varchar(90) DEFAULT NULL,
  `qsub4` varchar(90) DEFAULT NULL,
  `qsub5` varchar(90) DEFAULT NULL,
  `qsubmark1` int(20) DEFAULT NULL,
  `qsubmark2` int(20) DEFAULT NULL,
  `qsubmark3` int(20) DEFAULT NULL,
  `qsubmark4` int(20) DEFAULT NULL,
  `qsubmark5` int(20) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `maxmarks` int(10) DEFAULT NULL,
  `percent` int(10) DEFAULT NULL,
  `attempt` int(10) DEFAULT NULL,
  `nccnss` tinyint(1) DEFAULT NULL,
  `exservice` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualexam`
--

INSERT INTO `qualexam` (`qid`, `regno`, `nameofexam`, `nameofboard`, `nameofinst`, `examregno`, `month`, `year`, `course`, `qsub1`, `qsub2`, `qsub3`, `qsub4`, `qsub5`, `qsubmark1`, `qsubmark2`, `qsubmark3`, `qsubmark4`, `qsubmark5`, `total`, `maxmarks`, `percent`, `attempt`, `nccnss`, `exservice`) VALUES
(1, 12346, 'qwerrqw', 'qwerqw', '', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 12347, 'abcde', 'abcde', '', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0),
(6, 12348, 'gesbtrbr', 'da sbg ', 'asg dg ', 2147483647, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 123489, 'jhvjkv', 'nbkk', 'bkbkjb', 2147483647, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 12355, 'tccukfk', 'hgvgvk', 'hgcck', 6594949, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 12345, 'afg', 'dyjcjy', 'cytcic', 5465161, 'march', 2012, 'tfyfifi', 'ytfyfyf', 'tftyff', 'tfyffff', 'fufuif', 'tfiffi', 67979, 79797, 8797, 897, 7987, 9797, 9777777, 97, 0, 1, 1),
(10, 12365, 'rdudixi', 'yriii', 'yi7tfit', 0, 'tdoto8c', 0, 't7cotf', 'ffofofo', 'tcutitc', 'yuvukvuv', 'ycycyck', 'ycytcy', 8416184, 794684, 4468168, 4916, 648, 7161, 16161, 14161, 0, 1, 1),
(11, 12375, 'rdudruf', 'ftfg8o8', 'ugy8go8f8', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 12385, 'tfycivcvi', 'giuvukv', '', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 12395, 'crcyycrycy', 'ytciciyt', 'ctkictvtck', 651616816, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 12445, 'tcytc', 'vukvv', '', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 12545, 'btfufn', 'nftfnnb7', 'bn7i7  c', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 12645, 'yafbgbogb', 'bfaibgoib', 'iabfbrgo', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 12745, 'aygbfbg', 'sbgfbgo', 'abgbgo', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 12845, 'thrnhrtyh', '', '', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `readmission`
--

CREATE TABLE `readmission` (
  `readmnid` int(20) NOT NULL,
  `old_acdid` int(20) NOT NULL,
  `old_admnid` int(20) NOT NULL,
  `stop_date` date NOT NULL,
  `restart_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `religion_id` varchar(20) NOT NULL,
  `rel_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`religion_id`, `rel_name`) VALUES
('chris', 'CHRISTIAN'),
('hin', 'HINDU'),
('isl', 'ISLAM'),
('lkdp', 'LAKSHADWEEP MUSLIM'),
('noreloth', 'OTHERS / NO RELIGION');

-- --------------------------------------------------------

--
-- Table structure for table `rem_std`
--

CREATE TABLE `rem_std` (
  `admno` int(20) NOT NULL,
  `tutid` int(20) NOT NULL,
  `acid` int(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rem_std`
--

INSERT INTO `rem_std` (`admno`, `tutid`, `acid`, `status`) VALUES
(0, 0, 201213, 'TRUE'),
(123, 12, 201213, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `acid` int(4) NOT NULL,
  `s1id` varchar(10) DEFAULT NULL,
  `s2id` varchar(10) DEFAULT NULL,
  `s3id` varchar(10) DEFAULT NULL,
  `s4id` varchar(10) DEFAULT NULL,
  `s5id` varchar(10) DEFAULT NULL,
  `s6id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`acid`, `s1id`, `s2id`, `s3id`, `s4id`, `s5id`, `s6id`) VALUES
(201213, 's1201213', 's2201213', 's3201213', 's4201213', 's5201213', 's6201213'),
(201314, 's1201314', 's2201314', 's3201314', 's4201314', 's5201314', 's6201314'),
(201415, 's1201415', 's2201415', 's3201415', 's4201415', 's5201415', 's6201415');

-- --------------------------------------------------------

--
-- Table structure for table `sslc`
--

CREATE TABLE `sslc` (
  `sslcid` int(20) NOT NULL,
  `regno` int(20) DEFAULT NULL,
  `nameofexam` varchar(60) DEFAULT NULL,
  `nameofschool` varchar(60) DEFAULT NULL,
  `examregno` int(20) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `slsub1` varchar(90) DEFAULT NULL,
  `slsub2` varchar(90) DEFAULT NULL,
  `slsub3` varchar(90) DEFAULT NULL,
  `slsub4` varchar(90) DEFAULT NULL,
  `slsub5` varchar(90) DEFAULT NULL,
  `slsubmark1` int(20) DEFAULT NULL,
  `slsubmark2` int(20) DEFAULT NULL,
  `slsubmark3` int(20) DEFAULT NULL,
  `slsubmark4` int(20) DEFAULT NULL,
  `slsubmark5` int(20) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `maxmarks` int(10) DEFAULT NULL,
  `percent` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sslc`
--

INSERT INTO `sslc` (`sslcid`, `regno`, `nameofexam`, `nameofschool`, `examregno`, `month`, `year`, `course`, `slsub1`, `slsub2`, `slsub3`, `slsub4`, `slsub5`, `slsubmark1`, `slsubmark2`, `slsubmark3`, `slsubmark4`, `slsubmark5`, `total`, `maxmarks`, `percent`) VALUES
(1, 12345, '$slexa', '$slschool', 0, '$slmonth', 0, '$slstream', '$sl1', '$sl2', '$sl3', '$sl4', '$sl5', 0, 0, 0, 0, 0, 0, 0, 0),
(2, 12347, '', 'abcde', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 12348, '', 'tbartb', 49846464, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(7, 123489, '', 'sdfgdh', 66161, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 12355, '', 'bhlblb;', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(9, 12346, 'afaga', 'kgilglig', 4984461, 'march', 2012, 'rdrddt', 'tfy', 'fytdf', 'tytyt', 'ytfyf', 'tydyy', 464, 654, 646, 64, 54, 4654, 54, 89),
(10, 12365, '', 'ytciiic', 2147483647, 'march', 2012, 'ytcxri', 'ytci7tcic', 'cycit', 'yytcycvku', 'yttfu', 'yjctiyc', 4616, 984984, 89494, 54984, 9484, 64184, 0, 494681),
(11, 12375, '', 'vyrcic', 6491, 'vtuvku', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(12, 12385, '', 'yvtviv', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(13, 12395, '', 'vgvvtuiv', 5461284, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(14, 12445, '', 'hvukhvulv', 5151, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(15, 12545, '', 'tcyvyvk', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(16, 12645, '', 'fnobagobrgo', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(17, 12745, '', 'augbirbg', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0),
(18, 12845, '', '', 0, '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `acdid` int(20) NOT NULL,
  `regno` int(30) NOT NULL,
  `admno` int(30) DEFAULT NULL,
  `rollno` int(30) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `aadharno` varchar(20) DEFAULT NULL,
  `emailid` varchar(40) DEFAULT NULL,
  `dateofadmn` date DEFAULT NULL,
  `father` varchar(60) DEFAULT NULL,
  `mother` varchar(60) DEFAULT NULL,
  `guardian` varchar(60) DEFAULT NULL,
  `occfather` varchar(60) DEFAULT NULL,
  `occmother` varchar(60) DEFAULT NULL,
  `annual_income` int(40) DEFAULT NULL,
  `mother_tongue` varchar(30) DEFAULT NULL,
  `houseno` varchar(50) DEFAULT NULL,
  `street` varchar(60) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `postoffice` varchar(40) DEFAULT NULL,
  `village` varchar(40) DEFAULT NULL,
  `panchayath` varchar(40) DEFAULT NULL,
  `thaluk` varchar(40) DEFAULT NULL,
  `dist` varchar(40) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL,
  `nationality` varchar(40) DEFAULT NULL,
  `community` varchar(40) DEFAULT NULL,
  `pin` int(30) DEFAULT NULL,
  `placeofbirth` varchar(30) DEFAULT NULL,
  `phfather` int(20) DEFAULT NULL,
  `phmother` int(20) DEFAULT NULL,
  `phguard` int(20) DEFAULT NULL,
  `ph` int(20) DEFAULT NULL,
  `relid` varchar(40) DEFAULT NULL,
  `sslcid` int(20) DEFAULT NULL,
  `qid` int(20) DEFAULT NULL,
  `bankid` int(20) DEFAULT NULL,
  `tcid` int(20) DEFAULT NULL,
  `intid` int(20) DEFAULT NULL,
  `extid` int(20) DEFAULT NULL,
  `prgmid` int(20) DEFAULT NULL,
  `categoryadmn` varchar(20) DEFAULT NULL,
  `addlang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`acdid`, `regno`, `admno`, `rollno`, `name`, `gender`, `dob`, `age`, `marital_status`, `aadharno`, `emailid`, `dateofadmn`, `father`, `mother`, `guardian`, `occfather`, `occmother`, `annual_income`, `mother_tongue`, `houseno`, `street`, `city`, `postoffice`, `village`, `panchayath`, `thaluk`, `dist`, `state`, `nationality`, `community`, `pin`, `placeofbirth`, `phfather`, `phmother`, `phguard`, `ph`, `relid`, `sslcid`, `qid`, `bankid`, `tcid`, `intid`, `extid`, `prgmid`, `categoryadmn`, `addlang`) VALUES
(201213, 12345, 12345, 12345, 'Abhishek', 'M', '2019-10-22', 12, '', '', '', '2019-10-01', '', '', '', '', '', 100000, '', '', '', '', '', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 1, 9, 0, 0, NULL, NULL, 1001, '', NULL),
(201213, 12346, 12346, 12346, 'Ananya', 'F', '2019-10-11', 0, '', '', '', '2019-10-03', '', '', '', '', '', 0, '', 'wqerqwr', '', 'weqrqwr', '', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 9, 1, 0, 0, NULL, NULL, 1007, '', NULL),
(201213, 12347, 12347, 12347, 'Mathew', 'M', '0000-00-00', 0, '', '', '', '2019-10-02', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 2, 2, 0, 0, NULL, NULL, 1008, '', NULL),
(201213, 12348, 12348, 12348, 'Abhilash', 'M', '2019-10-11', 0, '', '', '', '2019-10-16', '', '', '', '', '', 0, '', 'aeggafgdfgeardgwfgas', '', 'dd sdbs', '', 'g abgrbae', '', '', '', '', '', 'OTHERS', 0, '', 0, 0, 0, 0, 'cm1cs1', 6, 6, 0, 0, NULL, NULL, 1020, '', NULL),
(201314, 12355, 12355, 12355, 'jared', 'M', '2019-10-16', 0, '', '', '', '2019-10-08', '', '', '', '', '', 0, '', 'dgfdagdfg', '', 'dgafg', '', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 8, 8, 0, 0, NULL, NULL, 1032, '', NULL),
(201314, 12365, 12365, 12365, 'VAISHAK', 'M', '2019-10-10', 18, '0', '1611964161684', '', '2019-10-09', '', '', '', '', '', 313213, 'citi7t', 'ydffif', 'utuciu', 'tcuctuo', 'utcutcou', 'tct7c', 'tctucitc', 'utcutcuc', 'outcotcc', 'utcutcutc', 'utctc', 'LATIN', 68489484, 'tuf8c', 0, 0, 0, 0, '', 10, 10, 0, 0, NULL, NULL, 1001, '', NULL),
(201314, 12375, 12375, 12375, 'ARNAV', 'M', '2019-10-18', 21, '0', '65164616', 'viyvivu', '2019-10-05', 'hvhbibb', '', '', 'libiblibb', '', 0, '', '', '', '', '', '', '', '', '', '', '', 'OTHERS', 0, '', 6511, 0, 0, 0, '', 11, 11, 0, 0, NULL, NULL, 1009, '', NULL),
(201314, 12385, 12385, 12385, 'SHEILA', 'F', '2019-10-17', 19, '0', '', '', '2019-10-17', '', '', '', '', '', 0, '', 'dddux', 'tfuitvuv', '', '', '', '', '', '', '', '', 'SCHEDULED', 0, '', 0, 0, 0, 0, '', 12, 12, 0, 0, NULL, NULL, 1046, '', NULL),
(201314, 12395, 12395, 12395, 'JAYAN', 'M', '2019-10-25', 18, '0', '', '', '2019-10-10', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 'OTHERS', 0, '', 0, 0, 0, 0, 'cm1cs3', 13, 13, 0, 0, NULL, NULL, 1001, '', NULL),
(201415, 12445, 12445, 12445, 'FARHAN', 'M', '2019-10-16', 18, '0', '', '', '2019-10-11', '', '', '', '', '', 0, '', 'babfviaf', '', '', '', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 14, 14, 0, 0, NULL, NULL, 1001, '', NULL),
(201415, 12545, 12545, 12545, 'KARAN', 'M', '2019-10-26', 19, '0', '', '', '2019-10-17', '', '', '', '', '', 0, '', 'gsrgibgaob', 'bubvov', 'hvioviv', 'hbvihvi', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 15, 15, 0, 0, NULL, NULL, 1001, '', NULL),
(201415, 12645, 12645, 12645, 'SHERIN', 'F', '2019-10-12', 19, '0', '', '', '2019-10-11', '', '', '', '', '', 0, '', 'dthtdn', '', '', '', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 16, 16, 0, 0, NULL, NULL, 1001, '', NULL),
(201415, 12745, 12745, 12745, 'LAREN', 'F', '2019-10-25', 18, '0', '', '', '2019-10-25', '', '', '', '', '', 0, '', 'sygbygi', 'sbirbgiobg', 'bgrbgb', 'bgsirbg', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 17, 17, 0, 0, NULL, NULL, 1001, '', NULL),
(201213, 12845, 12845, 12845, 'GARY', 'M', '2019-10-17', 18, '0', '', '', '2019-10-17', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 'LATIN', 0, '', 0, 0, 0, 0, 'cm1cs1', 18, 18, 0, 0, NULL, NULL, 1001, '', NULL),
(201213, 123489, 123489, 123489, 'erin', 'F', '2019-10-18', 0, '', '', '', '2019-10-17', '', '', '', '', '', 0, 'dfhsdh', 'fgefgfg', '', 'dagfg', '', 'dfdgd', '', 'dfdfhd', '', 'dsfhghs', '', 'OTHERS', 0, 'dfhdghs', 0, 0, 0, 0, 'cm1cs1', 7, 7, 0, 0, NULL, NULL, 1036, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studrel`
--

CREATE TABLE `studrel` (
  `relid` varchar(40) NOT NULL,
  `community` varchar(90) NOT NULL,
  `caste` varchar(80) DEFAULT NULL,
  `religion_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studrel`
--

INSERT INTO `studrel` (`relid`, `community`, `caste`, `religion_id`) VALUES
('cm1cs1', 'LATIN CATHOLIC/NADAR CHRISTIAN/ANGLO INDIAN/ROMAN CATHOILIC', 'LATIN CATHOLIC/NADAR CHRISTIAN/ANGLO INDIAN/ROMAN CATHOLIC', 'chris'),
('cm1cs2', 'SYRIAN CHRISTIANS, CSI, MARTHOMA, PENTECOST,JOCOBITE', 'SYRIAN CHRISTIANS, CSI, MARTHOMA, PENTECOST,JOCOBITE', 'chris'),
('cm1cs3', 'OTHERS', 'OTHER ELIGIBLE CASTS', 'chris'),
('cm2cs1', 'EZHAVA/AZ/THIYYAS/BILLAVA', 'EZHAVA/AZ/THIYYAS/BILLAVA', 'hin'),
('cm2cs2', 'GENERAL CATEGORY', 'NAIR/MENON/PILLAI/UNNITHAN/SHUDRA NAMBOOTHIRI', 'hin'),
('cm2cs3', 'GENERAL CATEGORY', 'POTTI/BHATTATHIRI/AMBALAVASIS', 'hin'),
('cm2cs4', 'OTHER BACKWARD HINDU', 'OTHER BACKWARD HINDU', 'hin'),
('cm3cs1', 'MAPILLAH/PATHAN/MARAKKAR/OSSAN/PUSALAN/THANGAL\r\n', 'MAPILLAH/PATHAN/MARAKKAR/OSSAN/PUSALAN/THANGAL\r\n', 'isl'),
('cm3cs2', 'SUNNI', 'SUNNI', 'isl'),
('cm3cs3', 'SHIA', 'SHIA', 'isl'),
('cm4cs1', 'OTHER ELIGIBLE COMMUNITIES', 'OTHER ELIGIBLE COMMUNITIES', 'noreloth'),
('cm5cs1', 'SCHEDULED CAST', 'CHAKKAMAR/MADIGA/CHEMMAN/CHEMMAR/KUDUMBI/DHEEVARA', 'noreloth'),
('cm6cs1', 'SCHEDULED TRIBE', 'ALLAR/CHINGATHAN/IRIVAVAN/KALANADI MALAYAN/MALAMUTTAN/MALAYALAR/PATHIYAN', 'noreloth');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subid` int(20) NOT NULL,
  `subname` varchar(80) NOT NULL,
  `semid` varchar(10) NOT NULL,
  `prgmid` int(20) NOT NULL,
  `tutid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subid`, `subname`, `semid`, `prgmid`, `tutid`) VALUES
(2, 'hodsub12012', 's6201213', 1007, 11),
(3, 'sub101nam', 's6201213', 1001, 6),
(12, 'sub123', 's6201314', 1001, 17),
(13, 'sub21415', 's1201415', 1001, 12),
(14, 'sub456', 's1201415', 1008, 19);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `tcid` int(20) NOT NULL,
  `regno` int(20) DEFAULT NULL,
  `transferno` varchar(20) DEFAULT NULL,
  `dateoftransfer` date DEFAULT NULL,
  `nameofinst` varchar(60) DEFAULT NULL,
  `periodofstudy` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`tcid`, `regno`, `transferno`, `dateoftransfer`, `nameofinst`, `periodofstudy`) VALUES
(6, 12347, '4543245', '0000-00-00', 'vnfjdj', ''),
(9, 12347, '34r23424', '0000-00-00', '', ''),
(10, 12348, '496464', '0000-00-00', 'nhfcjyj', 'nhj'),
(11, 123489, '6846161', '0000-00-00', '', ''),
(12, 12355, '5949+84+48', '0000-00-00', '', ''),
(13, 12365, '44449489', '0000-00-00', 'yduvu', 'bytdt'),
(14, 12375, '66844', '0000-00-00', '', ''),
(15, 12385, '611711', '0000-00-00', '', ''),
(16, 12395, '646418416', '0000-00-00', '', ''),
(17, 12445, '544856568568', '0000-00-00', '', ''),
(18, 12545, '841863424842', '0000-00-00', '', ''),
(19, 12645, '5448697666', '0000-00-00', '', ''),
(20, 12745, '5844884848', '0000-00-00', '', ''),
(21, 12845, '5161611', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutid` int(20) NOT NULL,
  `tutname` varchar(40) DEFAULT NULL,
  `deptid` int(4) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutid`, `tutname`, `deptid`, `pass`, `uname`, `user_type`) VALUES
(1, 'test101', 101, 'test101', 'test101', 'HOD'),
(2, 'test201', 102, 'test201', 'test201', 'HOD'),
(3, 'test301', 103, 'test301', 'test301', 'HOD'),
(4, 'test401', 104, 'test401', 'test401', 'HOD'),
(5, 'test501', 105, 'test501', 'test501', 'HOD'),
(6, 'test110', 101, 'test110', 'test110', 'FACULTY'),
(7, 'test120', 101, 'test120', 'test120', 'FACULTY'),
(8, 'test130', 101, 'test130', 'test130', 'FACULTY'),
(9, 'test210', 102, 'test210', 'test210', 'FACULTY'),
(10, 'test220', 102, 'test220', 'test220', 'FACULTY'),
(11, 'test230', 102, 'test230', 'test230', 'FACULTY'),
(12, 'test310', 103, 'test310', 'test310', 'FACULTY'),
(13, 'test320', 103, 'test320', 'test320', 'FACULTY'),
(14, 'test330', 103, 'test330', 'test330', 'FACULTY'),
(15, 'test410', 104, 'test410', 'test410', 'FACULTY'),
(16, 'test420', 104, 'test420', 'test420', 'FACULTY'),
(17, 'test430', 104, 'test430', 'test430', 'FACULTY'),
(18, 'test510', 105, 'test510', 'test510', 'FACULTY'),
(19, 'test520', 105, 'test520', 'test520', 'FACULTY'),
(20, 'test530', 105, 'test530', 'test530', 'FACULTY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acdyr`
--
ALTER TABLE `acdyr`
  ADD PRIMARY KEY (`acid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankid`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `external`
--
ALTER TABLE `external`
  ADD PRIMARY KEY (`extermarkid`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`tutor_prgmid`);

--
-- Indexes for table `internal`
--
ALTER TABLE `internal`
  ADD PRIMARY KEY (`intermarkid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`prgmid`),
  ADD KEY `deptid` (`deptid`);

--
-- Indexes for table `qualexam`
--
ALTER TABLE `qualexam`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `readmission`
--
ALTER TABLE `readmission`
  ADD PRIMARY KEY (`readmnid`),
  ADD KEY `FOREIGN_KEY` (`old_acdid`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `rem_std`
--
ALTER TABLE `rem_std`
  ADD PRIMARY KEY (`admno`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`acid`),
  ADD KEY `acid` (`acid`);

--
-- Indexes for table `sslc`
--
ALTER TABLE `sslc`
  ADD PRIMARY KEY (`sslcid`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `acdid` (`acdid`);

--
-- Indexes for table `studrel`
--
ALTER TABLE `studrel`
  ADD PRIMARY KEY (`relid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`tcid`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutid`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `deptid` (`deptid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bankid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `deptid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `external`
--
ALTER TABLE `external`
  MODIFY `extermarkid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `tutor_prgmid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `internal`
--
ALTER TABLE `internal`
  MODIFY `intermarkid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qualexam`
--
ALTER TABLE `qualexam`
  MODIFY `qid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `readmission`
--
ALTER TABLE `readmission`
  MODIFY `readmnid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sslc`
--
ALTER TABLE `sslc`
  MODIFY `sslcid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `tcid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`regno`) REFERENCES `student` (`regno`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`deptid`) REFERENCES `dept` (`deptid`);

--
-- Constraints for table `qualexam`
--
ALTER TABLE `qualexam`
  ADD CONSTRAINT `qualexam_ibfk_1` FOREIGN KEY (`regno`) REFERENCES `student` (`regno`);

--
-- Constraints for table `readmission`
--
ALTER TABLE `readmission`
  ADD CONSTRAINT `FOREIGN_KEY` FOREIGN KEY (`old_acdid`) REFERENCES `acdyr` (`acid`);

--
-- Constraints for table `sslc`
--
ALTER TABLE `sslc`
  ADD CONSTRAINT `sslc_ibfk_1` FOREIGN KEY (`regno`) REFERENCES `student` (`regno`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`regno`) REFERENCES `student` (`regno`);

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`deptid`) REFERENCES `dept` (`deptid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
