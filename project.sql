-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2018 at 08:07 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `date`) VALUES
(1, 'benart', 'c4597d922a5a42ee1a4e020a42ed0133', 'bencoderus@gmail.com', 1538031648);

-- --------------------------------------------------------

--
-- Table structure for table `course_db`
--

DROP TABLE IF EXISTS `course_db`;
CREATE TABLE IF NOT EXISTS `course_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `cutoff` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `ssce_combo` varchar(255) DEFAULT NULL,
  `jamb_combo` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_db`
--

INSERT INTO `course_db` (`id`, `title`, `description`, `cutoff`, `capacity`, `ssce_combo`, `jamb_combo`, `date`) VALUES
(1, 'Computer science', 'The future of technological advancement', 77, 150, 'Mathematics,English,Biology,Physics,Chemistry', 'Mathematics,English,Physics,Chemistry', 1540411672);

-- --------------------------------------------------------

--
-- Table structure for table `jamb_db`
--

DROP TABLE IF EXISTS `jamb_db`;
CREATE TABLE IF NOT EXISTS `jamb_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jambscore` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `student` varchar(255) DEFAULT NULL,
  `examyear` varchar(255) DEFAULT NULL,
  `sub1` varchar(255) DEFAULT NULL,
  `sub2` varchar(255) DEFAULT NULL,
  `sub3` varchar(255) DEFAULT NULL,
  `sub4` varchar(255) DEFAULT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `score3` int(11) DEFAULT NULL,
  `score4` int(11) DEFAULT NULL,
  `regnum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jamb_db`
--

INSERT INTO `jamb_db` (`id`, `jambscore`, `date`, `student`, `examyear`, `sub1`, `sub2`, `sub3`, `sub4`, `score1`, `score2`, `score3`, `score4`, `regnum`) VALUES
(1, 233, 1537685970, 'bencoderus@gmail.com', '2015/2016', 'Mathematics', 'English', 'Physics', 'Chemistry', 60, 60, 50, 63, '18054663HJ'),
(2, 214, 1537964157, 'coderus@gmail.com', '2017/2018', 'Mathematics', 'English', 'Physics', 'Chemistry', 66, 78, 40, 30, '18054663YU'),
(3, 269, 1539777369, 'fabian_izuchukwu@yahoo.com', '2013/2014', 'Chemistry', 'Physics', 'Mathematics', 'English', 50, 60, 70, 89, '1726388376'),
(4, 2391, 1539779411, 'test@gmail.com', '2007/2008', 'Biology', 'Literature', 'Accounting', 'Further Maths', 600, 900, 768, 123, '18054663YU'),
(5, 220, 1540454811, 'bencoderus@gmail.co', '2017/2018', 'English', 'Mathematics', 'Physics', 'Chemistry', 55, 55, 55, 55, '18054663YY'),
(6, 212, 1540935031, 'staiwo56@gmail.com', '2013/2014', 'English', 'Mathematics', 'Physics', 'Chemistry', 70, 23, 76, 43, '18054663YI');

-- --------------------------------------------------------

--
-- Table structure for table `result_db`
--

DROP TABLE IF EXISTS `result_db`;
CREATE TABLE IF NOT EXISTS `result_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utmescore` int(11) DEFAULT NULL,
  `sscescore` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `student` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_db`
--

INSERT INTO `result_db` (`id`, `utmescore`, `sscescore`, `total`, `student`, `date`, `courseid`) VALUES
(1, 60, 32, 92, 'bencoderus@gmail.com', 1537697783, 1),
(2, 40, 20, 60, 'coderus@gmail.com', 1537964160, 1),
(3, 60, 33, 93, 'fabian_izuchukwu@yahoo.com', 1539777373, 1),
(4, 60, 29, 89, 'test@gmail.com', 1539779417, 1),
(5, 50, 26, 76, 'bencoderus@gmail.co', 1540454855, 1),
(6, 40, 30, 70, 'staiwo56@gmail.com', 1540935040, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ssce_db`
--

DROP TABLE IF EXISTS `ssce_db`;
CREATE TABLE IF NOT EXISTS `ssce_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `sub1` varchar(255) DEFAULT NULL,
  `sub2` varchar(255) DEFAULT NULL,
  `sub3` varchar(255) DEFAULT NULL,
  `sub4` varchar(255) DEFAULT NULL,
  `sub5` varchar(255) DEFAULT NULL,
  `grade1` varchar(255) DEFAULT NULL,
  `grade2` varchar(255) DEFAULT NULL,
  `grade3` varchar(255) DEFAULT NULL,
  `grade4` varchar(255) DEFAULT NULL,
  `grade5` varchar(255) DEFAULT NULL,
  `examnum` varchar(255) DEFAULT NULL,
  `examyear` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssce_db`
--

INSERT INTO `ssce_db` (`id`, `student`, `type`, `date`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `grade1`, `grade2`, `grade3`, `grade4`, `grade5`, `examnum`, `examyear`) VALUES
(1, 'bencoderus@gmail.com', 'WAEC', 1537653862, 'Mathematics', 'English', 'Biology', 'Physics', 'Chemistry', 'B3', 'B3', 'B2', 'B3', 'B2', '19078899HJ', '2014/2015'),
(2, 'coderus@gmail.com', 'WAEC', 1537963843, 'Mathematics', 'English', 'Biology', 'Chemistry', 'Physics', 'C5', 'C5', 'C5', 'C5', 'C5', '19078899GI', '2017/2018'),
(3, 'fabian_izuchukwu@yahoo.com', 'WAEC', 1539777270, 'Mathematics', 'English', 'Physics', 'Chemistry', 'Further Maths', 'A1', 'A1', 'B2', 'C4', 'C4', '19078899GI', '2002/2003'),
(4, 'test@gmail.com', 'WAEC', 1539779213, 'English', 'Physics', 'Commerce', 'Commerce', 'Commerce', 'B2', 'B2', 'C4', 'C4', 'C4', '19078899GI', '2009/2010'),
(5, 'bencoderus@gmail.co', 'GCE', 1540452949, 'Mathematics', 'English', 'Biology', 'Chemistry', 'Physics', 'B3', 'C4', 'C4', 'B3', 'C5', '19078899HO', '2017/2018'),
(6, 'staiwo56@gmail.com', 'WAEC', 1540934973, 'Mathematics', 'English', 'Physics', 'Chemistry', 'Biology', 'A1', 'B3', 'B3', 'B2', 'C6', '19078899HE', '2013/2014');

-- --------------------------------------------------------

--
-- Table structure for table `student_db`
--

DROP TABLE IF EXISTS `student_db`;
CREATE TABLE IF NOT EXISTS `student_db` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `othername` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `regdate` int(11) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `reglevel` int(11) NOT NULL DEFAULT '1',
  `programme` varchar(255) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `admitted` int(11) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_db`
--

INSERT INTO `student_db` (`sid`, `email`, `password`, `surname`, `othername`, `sex`, `dob`, `address`, `country`, `regdate`, `mobile`, `img`, `reglevel`, `programme`, `courseid`, `admitted`) VALUES
(1, 'bencoderus@gmail.com', 'c4597d922a5a42ee1a4e020a42ed0133', 'iduwe', 'benjamin', 'Male', 885686400, 'Magbon, Lagos', 'Nigeria', 1537563082, '08174048073', '19113630_1695739200507777_7799487218175086204_n.jpg', 8, 'Full time', 1, 1),
(2, 'awritersmailbox@gmail.com', 'c539eadb15ce2243242196e428986d70', 'iduwe', 'leonard', 'Male', 649382400, 'magbon', 'Nigeria', 1537722832, '08174048073', NULL, 2, 'Full time', 1, 0),
(3, 'proresumetouch@gmail.com', '64259a1e2f9b9fd81d5a4905ff0cfca5', NULL, NULL, NULL, NULL, NULL, NULL, 1537723803, '08166074465', NULL, 1, 'Full time', 1, 0),
(4, 'coderus@gmail.com', 'c4597d922a5a42ee1a4e020a42ed0133', 'Samuel', 'Samson', 'Male', 643593600, '', 'Nigeria', 1537963575, '08174048073', 'ben.png', 8, 'Full time', 1, 2),
(5, 'olajidet00@gmail.com', 'be5086ec543ce9683abe60cf0aa3f7f2', NULL, NULL, NULL, NULL, NULL, NULL, 1538071911, '08184715056', NULL, 1, 'Full time', 1, 0),
(6, 'fabian_izuchukwu@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Innocent', 'Izuchukwu', 'Male', 1514764800, '19, Bolaji Omupo Street, Shomolu-Lagos.', 'Nigeria', 1539776886, '08066102168', '17.png', 8, 'Full time', 1, 1),
(7, 'test@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test', 'Test', 'Male', 1539734400, 'yabatech', 'Nigeria', 1539778476, '08099990000', 'aswn1.jpg', 8, 'Full time', 1, 1),
(8, 'bencoderus@gmail.co', 'c4597d922a5a42ee1a4e020a42ed0133', 'Macquis', 'udochukwu', 'Male', 883785600, 'house 17 magbon lagos', 'Nigeria', 1540307426, '08038685725', 'IMG_20171214_151112.jpg', 8, 'Full time', 1, 2),
(9, 'staiwo56@gmail.com', '7a4ad423a4acd6bfd0174dfea44beb65', 'Aderiye', 'Taiwo', 'Male', 888883200, 'yabatech sabo agege', 'Nigeria', 1540934715, '08174329195', '30710648_1716696838412013_468568888905302016_n.jpg', 8, 'Full time', 1, 2),
(10, 'falz@gmail.com', 'b1bc248a7ff2b2e95569f56de68615df', NULL, NULL, NULL, NULL, NULL, NULL, 1541510038, '07084651704', NULL, 1, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
