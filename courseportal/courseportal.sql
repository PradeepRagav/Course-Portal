-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 06:44 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `courseportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `topic` varchar(20) NOT NULL,
  `lastdate` date DEFAULT NULL,
  `creatdate` date NOT NULL,
  PRIMARY KEY (`topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`topic`, `lastdate`, `creatdate`) VALUES
('ethical', '2015-04-07', '2015-04-02'),
('Ethical hacking', '2015-04-02', '2015-04-01'),
('MOB assignment', '2015-04-01', '2015-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE IF NOT EXISTS `assignment_submission` (
  `usn` varchar(20) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `topic` varchar(20) NOT NULL,
  `submit_doc` varchar(100) NOT NULL,
  `cdate` date NOT NULL,
  PRIMARY KEY (`usn`,`course_id`,`topic`),
  KEY `course_id` (`course_id`),
  KEY `topic` (`topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_submission`
--

INSERT INTO `assignment_submission` (`usn`, `course_id`, `topic`, `submit_doc`, `cdate`) VALUES
('1RV12IS023', '12HSM61', 'MOB assignment', '/assignments/12HSM61/MOB assignment/1RV12IS023/', '2015-04-16'),
('1RV12IS031', '12IS123', 'ethical', '/assignments/12IS123/ethical/1RV12IS031/', '2015-04-02'),
('1RV12IS031', '12IS123', 'Ethical hacking', '/assignments/12IS123/Ethical hacking/1RV12IS031/', '2015-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `name` varchar(20) DEFAULT NULL,
  `course_id` varchar(10) NOT NULL,
  `credits` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `course_id`, `credits`) VALUES
('Management and Organ', '12HSM61', 3),
('ethics', '12IS123', 3),
('Computer Networks', '12IS62', 5),
('Software Engineering', '12IS63', 4),
('Database Management ', '12IS64', 5),
('Hacking', '12ISHAK', 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_assignment`
--

CREATE TABLE IF NOT EXISTS `course_assignment` (
  `course_id` varchar(10) NOT NULL,
  `topic` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`,`topic`),
  KEY `course_id` (`course_id`),
  KEY `topic` (`topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assignment`
--

INSERT INTO `course_assignment` (`course_id`, `topic`) VALUES
('12HSM61', 'MOB assignment'),
('12IS123', 'ethical'),
('12IS123', 'Ethical hacking');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `course_id` varchar(10) NOT NULL,
  `qbank` varchar(100) DEFAULT NULL,
  `ppt` varchar(100) DEFAULT NULL,
  `lessonplan` varchar(100) DEFAULT NULL,
  `modelq` varchar(100) DEFAULT NULL,
  `labm` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`course_id`, `qbank`, `ppt`, `lessonplan`, `modelq`, `labm`) VALUES
('12IS123', '/resources/12IS123/QuestionBank/', '/resources/12IS123/CourseNotes/', '/resources/12IS123/LessonPlan/', '/resources/12IS123/ModelQuestionPaper/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `name` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `staff_id` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `department`, `staff_id`, `Password`) VALUES
('Padmashree', 'ISE', 'PS', 'pass'),
('Rajshekar Murthy ', 'ISE', 'rms', 'pass'),
('Shantharam Nayak', 'ISE', 'SN', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(20) DEFAULT NULL,
  `usn` varchar(20) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`usn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `usn`, `sem`, `password`) VALUES
('Anirudh', '1RV12IS004', 6, 'pass'),
('Megha', '1RV12IS023', 6, 'pass'),
('Nishith', '1RV12IS027', 6, 'PASS'),
('Pradeep Ragav', '1RV12IS031', 6, 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE IF NOT EXISTS `studies` (
  `usn` varchar(20) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  PRIMARY KEY (`usn`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`usn`, `course_id`) VALUES
('1RV12IS023', '12HSM61'),
('1RV12IS031', '12HSM61'),
('1RV12IS031', '12IS123'),
('1RV12IS031', '12IS62'),
('1RV12IS031', '12IS63');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `course_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  PRIMARY KEY (`course_id`,`staff_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`course_id`, `staff_id`) VALUES
('12IS62', 'PS'),
('12HSM61', 'rms'),
('12IS123', 'SN'),
('12ISHAK', 'SN');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD CONSTRAINT `assignment_submission_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `assignment_submission_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `assignment_submission_ibfk_3` FOREIGN KEY (`topic`) REFERENCES `assignment` (`topic`);

--
-- Constraints for table `course_assignment`
--
ALTER TABLE `course_assignment`
  ADD CONSTRAINT `course_assignment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_assignment_ibfk_2` FOREIGN KEY (`topic`) REFERENCES `assignment` (`topic`);

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
