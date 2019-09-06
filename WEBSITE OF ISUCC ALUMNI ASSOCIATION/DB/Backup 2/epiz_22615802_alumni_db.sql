-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql210.byetcluster.com
-- Generation Time: Aug 28, 2018 at 12:25 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_22615802_alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `marital` varchar(50) NOT NULL,
  `dateofbirth` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `cnumber` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `online` varchar(20) NOT NULL DEFAULT 'Not Login',
  `otherprogram` varchar(250) NOT NULL,
  `ban` int(11) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `code`, `status`, `middle_name`, `student_id`, `marital`, `dateofbirth`, `contact`, `program`, `year`, `semester`, `address`, `cnumber`, `images`, `comment_status`, `online`, `otherprogram`, `ban`) VALUES
(2, 'Clarise', 'bedana', 'clarise@gmail.com', 'clarise', 'Female', '425104', 1, 'guillermo', '1121212', 'Married', '1999-11-11', '18', 'BSHRM', '2011-2012', '2nd Semester', '', '', '28228056651_869758959864350_9222172565825753261_n.jpg', 1, 'Offline', '', 0),
(14, 'Reymond', 'Alamay', 'reymondalamay@yahoo.com', 'qwerty102788', 'Male', '694454', 1, 'Gaoiran', '1234567', 'Single', '1988-10-27', '29', 'BS Entrep', '2008-2009', '2nd Semester', '', '', '20180802_182920.jpg', 1, 'Offline', '', 0),
(15, 'John', 'The great', '', 'qwerty', 'Male', '601400', 1, 'Pogi', '12', 'Married', '2005-12-08', '12', 'AB Pol Sci', '2000-2001', '1st Semester', '', '', 'FB_IMG_1528389863457.jpg', 1, 'Offline', '', 0),
(16, 'Christian jay', 'Gaoiran', 'gaoiranchristianjayb@gmail.com', 'Anggandako12345', 'Male', '747919', 1, 'Baruela', '1412128', 'Single', '1998-10-11', '19', 'BSBA', '2017-2018', '2nd Semester', '', '', 'DSC_0758.JPG', 1, 'Offline', '', 0),
(12, 'Ralph Anthony', 'Maramag', '', 'iloveyouhoneyq', 'Male', '253629', 1, 'Julain', '1513623', 'Single', '1996-01-06', '22', 'BSIT', '2017-2018', '2nd Semester', '', '', '23718527765_1568972013127278_1944842957296586579_n.jpg', 1, 'Offline', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `addcom`
--

CREATE TABLE IF NOT EXISTS `addcom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `addcom`
--

INSERT INTO `addcom` (`id`, `name`, `text`, `date`) VALUES
(1, 'hiii', 'helloooo', '2018-08-19 20:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE IF NOT EXISTS `admin_account` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(250) NOT NULL,
  `Pass` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`ID`, `User`, `Pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_records`
--

CREATE TABLE IF NOT EXISTS `alumni_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cpnumber` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `birthdate` varchar(200) NOT NULL,
  `maritalstatus` varchar(200) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `degreeearned` varchar(200) NOT NULL,
  `institution` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `yeargraduted` varchar(200) NOT NULL,
  `eligibility` varchar(200) NOT NULL,
  `honor` varchar(200) NOT NULL,
  `employed` varchar(200) NOT NULL,
  `companyname` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `yearofemployement` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `jobawawards` varchar(200) NOT NULL,
  `timelookingjob` varchar(200) NOT NULL,
  `delayofemployment` varchar(200) NOT NULL,
  `factores` varchar(200) NOT NULL,
  `employmentstatus` varchar(200) NOT NULL,
  `mothlysalary` varchar(200) NOT NULL,
  `relevance` varchar(200) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `curriculum` varchar(200) NOT NULL,
  `instruction` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `library` varchar(200) NOT NULL,
  `laboratory` varchar(200) NOT NULL,
  `physicalplant` varchar(200) NOT NULL,
  `guidance` varchar(200) NOT NULL,
  `housingdormitories` varchar(200) NOT NULL,
  `jobplacement` varchar(200) NOT NULL,
  `counseling` varchar(200) NOT NULL,
  `reseacrh` varchar(200) NOT NULL,
  `extension` varchar(200) NOT NULL,
  `administration` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `natureofbusiness` varchar(250) NOT NULL,
  `placeofbusiness` varchar(250) NOT NULL,
  `yearstatrted` varchar(250) NOT NULL,
  `averagemonthlyincome` varchar(250) NOT NULL,
  `reciveawrds` varchar(250) NOT NULL,
  `jobdescription` varchar(250) NOT NULL,
  `worknature` varchar(250) NOT NULL,
  `yearemployment` varchar(250) NOT NULL,
  `ofwincome` varchar(250) NOT NULL,
  `ofwawards` varchar(250) NOT NULL,
  `work` varchar(250) NOT NULL,
  `submitstat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `alumni_records`
--

INSERT INTO `alumni_records` (`id`, `fname`, `mname`, `lname`, `address`, `email`, `cpnumber`, `gender`, `age`, `birthdate`, `maritalstatus`, `degree`, `degreeearned`, `institution`, `program`, `yeargraduted`, `eligibility`, `honor`, `employed`, `companyname`, `position`, `yearofemployement`, `salary`, `jobawawards`, `timelookingjob`, `delayofemployment`, `factores`, `employmentstatus`, `mothlysalary`, `relevance`, `skills`, `curriculum`, `instruction`, `faculty`, `library`, `laboratory`, `physicalplant`, `guidance`, `housingdormitories`, `jobplacement`, `counseling`, `reseacrh`, `extension`, `administration`, `comment`, `image`, `comment_status`, `date`, `natureofbusiness`, `placeofbusiness`, `yearstatrted`, `averagemonthlyincome`, `reciveawrds`, `jobdescription`, `worknature`, `yearemployment`, `ofwincome`, `ofwawards`, `work`, `submitstat`) VALUES
(24, 'Reymond', 'Gaoiran', 'Alamay', 'dadap luna isabela', 'reymondalamay@yahoo.com', '+63 9965654434', 'Male', '29', '1988-10-27', 'Single', 'Baccalaureate Degree(College)', '4', 'CBM', 'BS Entrep', '2008-2009', 'Civil Service(Professional)', 'CUM LAUDE', 'Employed', 'ROPALI CORPORATION', 'BRANCH MANAGER', '9', '25000', 'BEST MANAGER', 'Below 1 year', 'Below 1 year', 'Personal office company', 'Permanent', '', 'Very Relevant', 'Leadership/Managerial Skills', 'Excellent', 'Excellent', 'Excellent', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Good', 'Very Good', 'Very Good', 'Excellent', 'Very Good', 'Very Good', 'I hope isucc will provide the best Educational technology to provide much quality eduction for the learners.', '', 1, '2018-08-25 12:30:44', '', '', '', '', '', '', '', '', '', '', 'Branch manager', 1),
(25, 'John', 'Pogi', 'The great', 'dito lang', 'haha@gmail.com', '+63 123456789', 'Male', '12', '2005-12-08', 'Married', 'Baccalaureate Degree(College)', '9', 'CCIT', 'AB Pol Sci', '2000-2001', 'Licensure Examination for Teachers (LET)', '', 'UnEmployed', '', '', '', '', '', 'four years and Above', 'four years and Above', 'Personal office company', 'Permanent', '', 'Very Relevant', 'Information Technology Skills', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Jsjshshsissbab', '', 1, '2018-08-25 13:17:09', '', '', '', '', '', '', '', '', '', '', 'Jsishsbah', 1),
(26, 'Christian jay', 'Baruela', 'Gaoiran', 'Dadap luna Isabela ', 'gaoiranchristianjayb@gmail.com', '+63 275296771', 'Male', '19', '1998-10-11', 'Single', 'Baccalaureate Degree(College)', '1', 'CBM', 'BSBA', '2017-2018', 'National Certificate III', '', 'UnEmployed', '', '', '', '', '', 'Below 1 year', 'Below 1 year', 'Recomendation from relatives/Friends', 'Permanent', '', 'Very Relevant', 'Communication Skills', 'Very Good', 'Very Good', 'Very Good', 'Good', 'Fair', 'Good', 'Excellent', 'Good', 'Good', 'Very Good', 'Good', 'Good', 'Very Good', 'Continue to improve ', '', 1, '2018-08-26 07:10:35', '', '', '', '', '', '', '', '', '', '', 'No job', 1);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE IF NOT EXISTS `children` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `par_code` varchar(60) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `stat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `user`, `text`, `date`, `par_code`, `comment_status`, `stat`) VALUES
(64, 'Silver', 'hi', '2018-08-16 22:30:24', 'a1BJvC', 1, 1),
(65, 'Hannah', 'hi', '2018-08-16 22:32:27', 'a1BJvC', 1, 0),
(66, 'Silver', 'ds', '2018-08-16 22:39:06', 'DXMFUE', 1, 0),
(67, 'Silver', 'hi', '2018-08-16 23:39:57', 'a1BJvC', 1, 1),
(68, 'Silver', 'hey', '2018-08-16 23:40:04', 'a1BJvC', 1, 1),
(69, 'Silver', 'hello', '2018-08-19 14:32:31', 'a1BJvC', 1, 0),
(75, 'Silver', 'hi', '2018-08-19 15:46:55', '7EZEyD', 1, 0),
(76, 'Silver', 'hi im silver', '2018-08-19 15:49:58', 'a1BJvC', 1, 0),
(77, 'Silver', 'hi', '2018-08-19 15:53:09', 'a1BJvC', 1, 0),
(78, 'Silver', 'hi', '2018-08-19 15:53:38', 'a1BJvC', 1, 0),
(79, 'Silver', 'hi', '2018-08-19 15:54:21', 'a1BJvC', 1, 0),
(80, 'Silver', 'nice', '2018-08-19 15:55:45', 'X07Ji8', 1, 0),
(81, 'Silver', 'hi', '2018-08-19 15:56:36', 'a1BJvC', 1, 0),
(82, 'Silver', 'hi', '2018-08-19 15:57:52', 'a1BJvC', 1, 0),
(83, 'Silver', 'whos that man', '2018-08-19 16:02:29', 'X07Ji8', 1, 0),
(84, 'Silver', 'whahaha', '2018-08-19 16:04:18', 'X07Ji8', 1, 0),
(85, 'Clarise', 'wahaha', '2018-08-19 16:29:15', 'a1BJvC', 1, 0),
(86, 'Clarise', 'hi', '2018-08-19 16:37:01', 'j5EuKx', 1, 0),
(87, 'Silver', 'Pogi', '2018-08-19 18:23:22', 'OnBwDP', 1, 0),
(88, 'Silver', 'hello', '2018-08-20 04:38:15', '7EZEyD', 1, 0),
(89, 'Silver', 'hi', '2018-08-20 15:28:50', '7EZEyD', 1, 0),
(90, 'Ralph Anthony', 'hrllo', '2018-08-25 11:21:46', '7EZEyD', 1, 0),
(91, 'Clarise', 'wow', '2018-08-27 07:12:01', 'jgHS1V', 1, 0),
(92, 'Clarise', 'omg', '2018-08-27 09:54:22', '7EZEyD', 1, 0),
(93, 'Clarise', ':)', '2018-08-27 09:54:58', 't3tEGm', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `date`, `name`) VALUES
(6, 'dsadsa', '2018-07-09 22:04:14', 'dasdsa'),
(7, 'Hi', '2018-07-09 22:09:45', 'jhayjhay idmilao Romero'),
(8, 'dsadsadas', '2018-07-09 22:10:58', 'jhay'),
(9, 'dasdsdsada', '2018-07-09 22:25:15', 'jhayjhay');

-- --------------------------------------------------------

--
-- Table structure for table `message_user`
--

CREATE TABLE IF NOT EXISTS `message_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phonenumber` varchar(150) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `message_user`
--

INSERT INTO `message_user` (`id`, `name`, `email`, `phonenumber`, `comment_status`, `date`, `message`) VALUES
(12, 'Reymond Gaoiran Alamay', 'reymondalamay@yahoo.com', '09155367715', 1, '2018-08-25 12:34:20', 'isucc please make the fastest way for my honorable dismisal. thank you'),
(13, 'Christian jay Baruela Gaoiran', 'gaoiranchristianjayb@gmail.com', '09275296771', 1, '2018-08-26 06:59:25', 'This idea is great because through this website we can still be inform about the happenings of the school ðŸ˜Š');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `code` varchar(30) NOT NULL,
  `likes` int(11) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `user`, `text`, `date`, `code`, `likes`, `comment_status`, `title`, `image`) VALUES
(28, 'Admin', '<p>the ISU Alumni Associtaion supported/or given a financial assistance to this event and Atty. Paul Vincent R. Mauricio, the president of the Alumni Association was the Guest speaker</p>\r\n', '2018-08-08 15:44:44', 't3tEGm', 0, 0, 'The First SAC Grand Alumni Homecoming', '7823435090_915711671911962_8139861429017284444_n.jpg'),
(29, 'Admin', '<p>The ceremonial turnover of Financial Assistance to the ISU examinees for Licensure Examination of Teachers (LET)</p>\r\n', '2018-08-08 15:50:23', 'RUjC3N', 0, 0, 'Licensure Examination of Teachers (LET)', '1221752495_891662914316838_5199567004829796631_n.jpg'),
(30, 'Admin', '<p>ISUCC Alumni Association projects/donation\r\nThe school signages and pedestrian traffic sign</p>\r\n', '2018-08-08 15:52:37', 'X07Ji8', 0, 0, 'Project and Donation', '43121687449_891655797650883_9160895270962761801_n.jpg'),
(31, 'Admin', '<p>Congratulations to the newly elected Alumni Officers...&nbsp;<img alt="" src="https://static.xx.fbcdn.net/images/emoji.php/v9/f7f/1/16/1f60a.png?_nc_eui2=AeGYNFC0faAlNeLjySrgzTk_Z8Q1_Pq8W53_LdvD3YqslQXC9HkHOroXOVyuLl2YLC7d7posKoMzpZAiuCOs1qaLaocU8R3s3OKoE4ECx0G-Fw" style="height:16px; width:16px" />ðŸ˜Š<br />\r\nPresident: Atty. Mauricio\r\nVice-Pres.: Dr. Blas\r\nSec.: Mr. Cabantac<br />\r\nTreasurer: Mr. Lindo<br />\r\nAuditor: Ms. Santos</p>\r\n\r\n<p>Serving as the Treasurer of the association for over 2 years was a great privilege. I will surely miss our office, our chats, our crazy jokes. Thank you to my former co-officers for the good and bad memories we shared together! love you all!&nbsp;<img alt="" src="https://static.xx.fbcdn.net/images/emoji.php/v9/f4c/1/16/1f642.png?_nc_eui2=AeHWoPOqXxewfmORLVIHnZmRKRldHhzmqf26PF2uhpqW_idRZDbdhdsboU_OqfvjLnsmhkaxNTMvVLZ5g0N4SX-wJtNZ20PwN7ktI_-esMprrw" style="height:16px; width:16px" />:)</p>\r\n', '2018-08-08 15:56:05', 'OnBwDP', 0, 0, 'New Elected Ofiicer of ISUCC Alumni ', '41017992287_1394182633938287_5297264440306196950_n.jpg'),
(32, 'Admin', 'Summer Pre-Kindergarten Programs', '2018-08-08 16:02:59', '7EZEyD', 0, 0, 'Summer Pre-Kindergarten Programs', '24313087528_625935304222935_3387982712516800055_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(250) NOT NULL,
  `news` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `subject`, `news`, `image`, `date`, `code`) VALUES
(13, 'JobAfffair', 'Calling all job seekers. ISU Cauayan gymnasium, March 22 @9am to 4pm. #jobfair', '31533742_601838179965981_5254817228622633480_n.jpg', '2018-08-08 22:04:31', 'Pcwxln'),
(14, 'Alumni Website', 'Our website has been activated and renewed! Sorry for the convenience!', '8011059418_511610085655458_4372526962077202666_n.jpg', '2018-08-08 23:19:08', 'jgHS1V'),
(15, 'Victory Liner.Inc.', 'We are hiring! Check out the available positions below. Interested? Send us your resume at vlihotline@victoryliner.com or give us a call at (02) 842-8679 for any questions.\r\n\r\nAutomotive Mechanic (100 slots) \r\nAutomotive Electrician (100 slots)\r\nElectronic Technician (10 slots)\r\nA/C Technician (10 slots)\r\nWelder (10 slots)\r\nTireman (10 slots)\r\nUpholsterer (10 slots)\r\nAutomative Painter (10 slots)\r\nStockman/Encoder (10 slots)\r\nCadet Engineer (10 slots)\r\n\r\n#victoryliner #VLI #JobsPh #JobSearch #JobOpening #Bus #Philippines', '36629433220_1465596623550099_8206245857486726649_n.jpg', '2018-08-08 23:21:26', 'EMVXJl'),
(16, '#Jobhiring', 'job hiring', '32314572825_1498060500209413_6188914362870593495_n.jpg', '2018-08-21 22:53:45', 'QlvCeu'),
(17, 'job interview', 'job interview', '47822050353_917347278417012_2053701679001773338_n.png', '2018-08-21 22:54:29', 'eBMtlI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_children`
--

CREATE TABLE IF NOT EXISTS `tbl_new_children` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `par_code` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_new_children`
--

INSERT INTO `tbl_new_children` (`id`, `user`, `text`, `date`, `par_code`) VALUES
(1, 'johnjavieridmilao12@gmail.com', 'hi', '2018-08-04 09:42:03', 'gCWFQn'),
(2, 'johnjavieridmilao12@gmail.com', 'hello', '2018-08-04 09:42:14', 'gCWFQn'),
(3, 'johnjavieridmilao12@gmail.com', 'what new?', '2018-08-04 09:43:30', 'dNg7BI'),
(4, 'johnjavieridmilao12@gmail.com', 'hiii', '2018-08-04 10:05:40', 'sea2aL'),
(5, 'rigid@gmail.com', 'what happening', '2018-08-04 10:20:40', 'YlFtca'),
(6, 'johnjavieridmilao12@gmail.com', 'nice', '2018-08-05 14:01:24', 'dNg7BI'),
(7, 'johnjavieridmilao12@gmail.com', 'oh', '2018-08-05 14:03:51', 'sea2aL'),
(8, 'johnjavieridmilao12@gmail.com', 'basketball is life', '2018-08-05 14:06:34', 'fIqOyw'),
(9, 'johnjavieridmilao12@gmail.com', 'FFFFF', '2018-08-06 05:40:55', 'YlFtca'),
(10, 'johnjavieridmilao12@gmail.com', 'gago', '2018-08-06 05:41:21', 'YlFtca'),
(12, 'jhayjhay', 'asa', '2018-08-07 14:47:32', 'YlFtca'),
(13, 'Jhay', 'wow', '2018-08-12 03:52:26', 'EMVXJl'),
(14, 'Silver', 'nice', '2018-08-19 16:28:31', 'jgHS1V'),
(15, 'Clarise', 'hey', '2018-08-19 16:29:47', 'Pcwxln'),
(16, 'Clarise', 'hi', '2018-08-19 16:37:58', 'GhDQIL'),
(17, 'Clarise', 'wow', '2018-08-27 07:12:01', 'jgHS1V'),
(18, 'Clarise', ':)', '2018-08-27 09:54:58', 't3tEGm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg_date`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yeardate` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_reg_date`
--

INSERT INTO `tbl_reg_date` (`id`, `yeardate`) VALUES
(4, ' 2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip`) VALUES
(3, '::1'),
(4, ''),
(5, '124.6.144.252'),
(6, '173.252.127.4'),
(7, '69.171.251.15'),
(8, '66.220.156.145'),
(9, '66.220.149.14'),
(10, '69.171.251.12'),
(11, '110.54.240.8'),
(12, '110.54.178.194'),
(13, '49.150.240.40'),
(14, '49.150.237.60'),
(15, '110.54.166.120'),
(16, '66.220.149.10'),
(17, '110.54.229.6'),
(18, '66.220.149.2'),
(19, '31.13.115.14'),
(20, '173.252.122.19'),
(21, '49.150.249.159'),
(22, '49.150.85.165'),
(23, '69.171.251.7'),
(24, '112.206.199.124'),
(25, '218.189.26.155'),
(26, '66.249.82.107'),
(27, '66.249.82.105'),
(28, '66.249.82.103'),
(29, '64.233.173.14'),
(30, '124.105.97.166'),
(31, '49.150.135.117'),
(32, '69.136.133.225');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
