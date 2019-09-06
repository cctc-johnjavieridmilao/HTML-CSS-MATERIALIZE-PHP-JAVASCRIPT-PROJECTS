-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 12:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
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
  `images` varchar(100) NOT NULL,
  `comment_status` int(11) NOT NULL,
  `online` varchar(20) NOT NULL DEFAULT 'Not Login',
  `otherprogram` varchar(250) NOT NULL,
  `ban` int(11) NOT NULL,
  `dateofban` datetime NOT NULL,
  `bantime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `code`, `status`, `middle_name`, `student_id`, `marital`, `dateofbirth`, `contact`, `program`, `year`, `semester`, `images`, `comment_status`, `online`, `otherprogram`, `ban`, `dateofban`, `bantime`) VALUES
(4, 'Marjury', 'Lazaro', 'marg@gmail.com', 'marg11', 'Male', '103159', 1, 'dyakammu', '2232323', 'Single', '1997-11-11', '20', 'BSCS', '2012-2013', '2nd Semester', 'marg.jpg', 1, 'Offline', '', 0, '2018-09-06 15:57:52', '0000-00-00 00:00:00'),
(5, 'Samantha', 'Samantha', 'rigid@gmail.com', 'rigid', 'Female', '345249', 1, 'Rigid', '2323878', 'Single', '1999-09-11', '18', 'BS Automotive', '2012-2013', '1st Semester', 'jayson.jpg', 1, 'Offline', '', 0, '2018-09-06 01:47:57', '2018-09-06 01:46:57'),
(7, 'Doming', 'Galacingao', 'doming@gmail.com', 'doming', 'Male', '975167', 1, 'Fernado', '3987878', 'Single', '1999-11-11', '18', 'BSIT', '2012-2013', '1st Semester', 'graduate.png', 1, 'Offline', '', 0, '2018-09-06 01:28:30', '2018-09-06 01:27:30'),
(9, 'Hannah', 'Lozano', 'hanah@gmail.com', 'hannah', 'Female', '221129', 1, 'Aquino', '3989898', 'Married', '2000-07-11', '18', 'BS Entrep', '2017-2018', '1st Semester', '12715374_231975963807441_1138351620814363571_n.jpg', 1, 'Offline', '', 0, '2018-09-06 00:10:24', '0000-00-00 00:00:00'),
(19, 'John javier', 'Idmilao', 'johnjavieridmilao12@gmail.com', 'jhay11', 'Male', '705559', 1, 'Romero', '3909909', 'Married', '1999-11-11', '18', 'BSIT', '2014-2015', '2nd Semester', 'kobe_lakers_free_agents.jpg', 1, 'Offline', '', 0, '2018-09-06 01:41:03', '2018-09-06 01:40:03'),
(21, 'Glenn Paul', 'Respicio', '', 'glen11', 'Male', '283703', 1, 'Celek', '4544545', 'Separated', '1999-11-11', '18', 'BSE - Major in Physical Science', '2016-2017', '2nd Semester', '12.JPG', 1, 'Offline', '', 1, '2018-09-09 02:38:08', '2018-09-06 02:38:08'),
(22, 'Xxxxxxxx', 'Xxxxxxx', 'xxx@gmail.com', 'xxxxx', 'Male', '527142', 1, 'Xxxxxxxxxxxxx', '4343243', 'Single', '1777-11-11', '240', 'BSE - Major in Physical Science', '2014-2015', 'Summer', '12.JPG', 1, 'Offline', '', 1, '2018-09-09 02:11:52', '2018-09-06 02:11:52'),
(23, 'Clarise', 'Guillermo', '', 'bedana', 'Male', '563683', 1, 'Bedana', '4545545', 'Married', '1999-11-11', '18', 'BSIT', '2012-2013', '2nd Semester', '7.jpg', 1, 'inActive', '', 1, '2018-09-09 02:03:09', '2018-09-06 02:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `addcom`
--

CREATE TABLE `addcom` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addcom`
--

INSERT INTO `addcom` (`id`, `name`, `text`, `date`) VALUES
(1, 'hiii', 'helloooo', '2018-08-19 20:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `ID` int(11) NOT NULL,
  `User` varchar(250) NOT NULL,
  `Pass` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`ID`, `User`, `Pass`, `status`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_records`
--

CREATE TABLE `alumni_records` (
  `id` int(11) NOT NULL,
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
  `submitstat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_records`
--

INSERT INTO `alumni_records` (`id`, `fname`, `mname`, `lname`, `address`, `email`, `cpnumber`, `gender`, `age`, `birthdate`, `maritalstatus`, `degree`, `degreeearned`, `institution`, `program`, `yeargraduted`, `eligibility`, `honor`, `employed`, `companyname`, `position`, `yearofemployement`, `salary`, `jobawawards`, `timelookingjob`, `delayofemployment`, `factores`, `employmentstatus`, `mothlysalary`, `relevance`, `skills`, `curriculum`, `instruction`, `faculty`, `library`, `laboratory`, `physicalplant`, `guidance`, `housingdormitories`, `jobplacement`, `counseling`, `reseacrh`, `extension`, `administration`, `comment`, `image`, `comment_status`, `date`, `natureofbusiness`, `placeofbusiness`, `yearstatrted`, `averagemonthlyincome`, `reciveawrds`, `jobdescription`, `worknature`, `yearemployment`, `ofwincome`, `ofwawards`, `work`, `submitstat`) VALUES
(2, 'Clarise ', 'guillermo  ', 'bedana ', 'Christine village', 'clarise@gmail.com', '098642332', 'Female', '18', '1999-11-11', 'Married', 'Secondary/HighSchool', '3232', 'CBM', 'BSHRM', '2011-2012', 'National Certificate III', '', 'Employed', 'dasdsa', 'dasdsa', '4343', '20000', '', 'one year to Below 2 years', 'three years to below 4 years', 'Goverment Employment Office', 'Temporary', '50,000 - 54,999', 'Fairly Relevant', 'Information Technology Skills', 'Excellent', 'Good', 'Good', 'Fair', 'Fair', 'Fair', 'Good', 'Fair', 'Fair', 'Good', 'Very Good', 'Very Good', 'Good', 'sasa', '', 1, '2018-07-30 19:03:23', '', '', '', '', '', '', '', '', '', '', 'Chief', 1),
(4, 'Marjury', 'dyakammu', 'Lazaro', 'San mateo', 'marg@gmail.com', '987878787', 'Male', '20', '1997-11-11', 'Divorced', 'Baccalaureate Degree(College)', '2121', 'CCIT', 'BSCS', '2012-2013', 'Civil Service(Professional)', '', 'Self Employed', '', '', '', '', '', 'two years to below 3 years', 'four years and Above', 'Personal office company', 'Casual/Contractual', '40,000 - 45,999', 'Not Relevant', 'Information Technology Skills', 'Good', 'Excellent', 'Need Improvement', 'Good', 'Very Good', 'Good', 'Good', 'Fair', 'Good', 'Good', 'Good', 'Very Good', 'Very Good', 'dsadsa', '', 1, '2018-07-31 00:36:04', 'dasdsa', 'dasdsa', '23424', '232', '', '', '', '', '', '', 'Marg Computer ', 0),
(5, 'Samantha', 'Rigid', 'Samantha', 'Aurorra Isabela', 'rigid@gmail.com', '09675656', 'Male', '18', '1999-09-11', 'Divorced', 'Master\'s Degree', '90000', 'PS', 'BS Automotive', '2012-2013', 'National Certificate III', '', 'Ofw', '', '', '', '', '', 'two years to below 3 years', 'two years to below 3 years', 'Personal office company', 'Casual/Contractual', '31,000 - 34,999', 'Not Relevant', 'Information Technology Skills', 'Good', 'Very Good', 'Good', 'Need Improvement', 'Fair', 'Fair', 'Fair', 'Need Improvement', 'Good', 'Very Good', 'Good', 'Good', 'Good', 'dasdsa', '', 1, '2018-07-31 00:40:15', '', '', '', '', '', 'dasdas', 'ddasdas', '23232', '43423423', '', 'Ofw workers', 1),
(6, 'Xxxxx', 'Xxxxxxxxxxxxx', 'Xxxxxxx', 'Dadap,Luna,isabela', 'xxx@gmail.com', '+63 543343434', 'Female', '18', '1999-11-11', 'Divorced', 'Secondary/HighSchool', '321321321', 'CCIT', 'BSIT', '2016-2017', 'National Certificate I and II', '', 'UnEmployed', '', '', '', '', '', 'one year to Below 2 years', 'four years and Above', 'Recomendation from relatives/Friends', 'Casual/Contractual', '46,000 - 49,999', 'Relevant', 'Entrepreneural Skills', 'Very Good', 'Good', 'Good', 'Very Good', 'Very Good', 'Fair', 'Fair', 'Very Good', 'Good', 'Good', 'Good', 'Excellent', 'Good', 'dsa', '', 1, '2018-08-07 21:52:58', '', '', '', '', '', '', '', '', '', '', 'No job', 1),
(7, 'Doming', 'Fernado', 'Galacingao', 'Dadap,Luna,isabela', 'doming@gmail.com', '+63 654645656', 'Male', '18', '1999-11-11', 'Single', 'Post Secondary/Vocational Course', '90897898', 'ITE', 'BSIT', '2012-2013', 'Civil Service(Professional)', '', 'UnEmployed', '', '', '', '', '', 'two years to below 3 years', 'four years and Above', 'Recomendation from Politicians', 'Casual/Contractual', '40,000 - 45,999', 'Relevant', 'Information Technology Skills', 'Very Good', 'Very Good', 'Fair', 'Fair', 'Good', 'Good', 'Good', 'Need Improvement', 'Good', 'Excellent', 'Fair', 'Good', 'Fair', 'hello', '', 1, '2018-08-08 00:08:35', '', '', '', '', '', '', '', '', '', '', 'No job', 1),
(8, 'Hannah', 'Aquino', 'Lozano', 'panggasinan', 'hanah@gmail.com', '+63 865464565', 'Female', '18', '2000-07-11', 'Married', 'Secondary/HighSchool', '4', 'CBM', 'BS Entrep', '2017-2018', 'National Certificate III', 'No Data', 'Self Employed', '', '', '', '20000', '', 'two years to below 3 years', 'two years to below 3 years', 'Recomendation from Politicians', 'Self Employed', '', 'Fairly Relevant', 'Problem-Solving Skills', 'Very Good', 'Good', 'Fair', 'Very Good', 'Very Good', 'Fair', 'Very Good', 'Good', 'Good', 'Good', 'Good', 'Excellent', 'Very Good', 'hello', '', 1, '2018-08-09 21:15:36', '', '', '', '', '', '', '', '', '', '', 'No job', 1),
(9, 'Jabez ', 'Izaac  ', 'Dela cruzz ', 'panggasinan', 'jabez@gmail.com', ' 63 365656565', 'Male', '17', '1999-11-11', 'Single', 'Post Doctoral', '787', 'CCIT', 'BSCS', '2015-2016', 'National Certificate III', '', 'Employed', 'das', 'dsadas', '2', '9000', '', 'three years to below 4 years', 'three years to below 4 years', 'Media advertisement', 'Job Order', '', 'Fairly Relevant', 'Information Technology Skills', 'Very Good', 'Need Improvement', 'Very Good', 'Very Good', 'Fair', 'Very Good', 'Very Good', 'Very Good', 'Fair', 'Good', 'Good', 'Very Good', 'Fair', 'hrllo', '', 1, '2018-08-09 21:24:47', '', '', '', '', '', '', '', '', '', '', 'GAME DEVELOPER', 1),
(22, 'Jhay', 'Romero', 'Idmilao', 'Dadap,Luna,isabela', 'johnjavieridmilao12@gmail.com', '+63 365656565', 'Male', '18', '1999-11-11', 'Separated', 'Post Secondary/Vocational Course', '90', 'CCIT', 'BSIT', '2014-2015', 'National Certificate III', '', 'UnEmployed', '', '', '', '', '', 'four years and Above', 'three years to below 4 years', 'Media advertisement', 'Casual/Contractual', '', 'Fairly Relevant', 'Human relation/Interpersonal Skills', 'Good', 'Need Improvement', 'Good', 'Good', 'Good', 'Fair', 'Good', 'Good', 'Good', 'Very Good', 'Very Good', 'Good', 'Very Good', 'hiii', '', 1, '2018-08-11 02:44:04', '', '', '', '', '', '', '', '', '', '', 'No job', 1),
(23, 'Marible', 'Dasdas', 'Ddasdasdas', 'Dadap,Luna,isabela', 'maribelidmilao@gmail.com', '+63 986676767', 'Male', '22', '1995-11-11', 'Single', 'Master\'s Degree', '90', 'CBM', 'BSHRM', '2013-2014', 'Civil Service(Professional)', '', 'UnEmployed', '', '', '', '', '', 'two years to below 3 years', 'two years to below 3 years', 'Media advertisement', 'Casual/Contractual', '', 'Fairly Relevant', 'Leadership/Managerial Skills', 'Fair', 'Good', 'Very Good', 'Good', 'Good', 'Fair', 'Very Good', 'Good', 'Excellent', 'Fair', 'Very Good', 'Good', 'Very Good', 'hiii', '', 1, '2018-08-11 02:54:47', '', '', '', '', '', '', '', '', '', '', 'No job', 1);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `par_code` varchar(60) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `user`, `text`, `date`, `par_code`, `comment_status`, `stat`) VALUES
(113, 'Silver Uy Fanacio', 'jrjr', '2018-09-02 08:47:21', 'q6A0jO', 1, 0),
(114, 'Silver Uy Fanacio', 'de', '2018-09-02 09:18:46', 'q6A0jO', 1, 0),
(115, 'Silver Uy Fanacio', 'a', '2018-09-02 09:22:13', 'PQOvef', 1, 0),
(125, 'John javier Romero Idmilao', 'wew', '2018-09-02 16:30:49', 'f9YdWF', 1, 0),
(128, 'John javier Romero Idmilao', 'hii', '2018-09-02 16:46:11', 'f9YdWF', 1, 0),
(129, 'Hannah Aquino Lozano', 'An article (with the linguistic glossing abbreviation ART) is a word that is used with a noun (as a standalone word or a prefix or suffix) to specify grammatical definiteness of the noun, and in some languages extending to volume or numerical scope.', '2018-09-04 15:32:44', 'f9YdWF', 1, 0),
(130, 'Hannah Aquino Lozano', 'wewey', '2018-09-04 16:15:07', 'KVc6lg', 1, 0),
(131, 'Hannah Aquino Lozano', 'This is test', '2018-09-04 16:31:59', 'f9YdWF', 1, 0),
(132, 'Hannah Aquino Lozano', 'we', '2018-09-04 17:18:27', 'f9YdWF', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `message_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phonenumber` varchar(150) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_user`
--

INSERT INTO `message_user` (`id`, `name`, `email`, `phonenumber`, `comment_status`, `date`, `message`) VALUES
(2, 'clarise dana', 'johnjavieridmilao12@gmail.com', '09876565444', 1, '2018-06-03 20:26:01', 'jhayjhay idmilao'),
(3, 'jhay', 'johnjavieridmilao12@gmail.com', '09876565444', 1, '2018-08-07 21:31:07', 'hi'),
(4, 'dsa', 'johnjavieridmilao12@gmail.com', '09876565444', 1, '2018-08-10 14:18:35', 'ca'),
(5, 'jhay', 'johnjavieridmilao12@gmail.com', '09876565444', 1, '2018-08-10 23:29:37', ''),
(6, 'jhay', 'johnjavieridmilao12@gmail.com', '09876565444', 1, '2018-08-10 23:38:53', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `code` varchar(30) NOT NULL,
  `likes` int(11) NOT NULL,
  `comment_status` int(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `user`, `text`, `date`, `code`, `likes`, `comment_status`, `title`, `image`) VALUES
(28, 'Admin', '<p>the ISU Alumni Associtaion supported/or given a financial assistance to this event and Atty. Paul Vincent R. Mauricio, the president of the Alumni Association was the Guest speaker</p>\r\n', '2018-08-08 15:44:44', 't3tEGm', 0, 0, 'The First SAC Grand Alumni Homecoming', '7823435090_915711671911962_8139861429017284444_n.jpg'),
(29, 'Admin', '<p>The ceremonial turnover of Financial Assistance to the ISU examinees for Licensure Examination of Teachers (LET)</p>\r\n', '2018-08-08 15:50:23', 'RUjC3N', 0, 0, 'Licensure Examination of Teachers (LET)', '1221752495_891662914316838_5199567004829796631_n.jpg'),
(30, 'Admin', '<p>ISUCC Alumni Association projects/donation\r\nThe school signages and pedestrian traffic sign</p>\r\n', '2018-08-08 15:52:37', 'X07Ji8', 0, 0, 'Project and Donation', '43121687449_891655797650883_9160895270962761801_n.jpg'),
(31, 'Admin', '<p>Congratulations to the newly elected Alumni Officers...&nbsp;<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f7f/1/16/1f60a.png?_nc_eui2=AeGYNFC0faAlNeLjySrgzTk_Z8Q1_Pq8W53_LdvD3YqslQXC9HkHOroXOVyuLl2YLC7d7posKoMzpZAiuCOs1qaLaocU8R3s3OKoE4ECx0G-Fw\" style=\"height:16px; width:16px\" />ðŸ˜Š<br />\r\nPresident: Atty. Mauricio\r\nVice-Pres.: Dr. Blas\r\nSec.: Mr. Cabantac<br />\r\nTreasurer: Mr. Lindo<br />\r\nAuditor: Ms. Santos</p>\r\n\r\n<p>Serving as the Treasurer of the association for over 2 years was a great privilege. I will surely miss our office, our chats, our crazy jokes. Thank you to my former co-officers for the good and bad memories we shared together! love you all!&nbsp;<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f4c/1/16/1f642.png?_nc_eui2=AeHWoPOqXxewfmORLVIHnZmRKRldHhzmqf26PF2uhpqW_idRZDbdhdsboU_OqfvjLnsmhkaxNTMvVLZ5g0N4SX-wJtNZ20PwN7ktI_-esMprrw\" style=\"height:16px; width:16px\" />:)</p>\r\n', '2018-08-08 15:56:05', 'OnBwDP', 0, 0, 'New Elected Ofiicer of ISUCC Alumni ', '41017992287_1394182633938287_5297264440306196950_n.jpg'),
(32, 'Admin', 'Summer Pre-Kindergarten Programs', '2018-08-08 16:02:59', '7EZEyD', 0, 0, 'Summer Pre-Kindergarten Programs', '24313087528_625935304222935_3387982712516800055_n.jpg'),
(35, 'Admin', 'Yearbook 2017 is now available!', '2018-09-01 18:49:49', 'q6A0jO', 0, 0, 'Yearbook 2017 is now available! ', '34638689532_1087268811422913_8041468458006740992_n.jpg'),
(37, 'Admin', 'Awarding of Financial Assistance to the Alumni Scholars 2016-2017 last December 06-07, 2016', '2018-09-02 11:37:49', 'xzc8aM', 0, 0, ' Alumni Scholars 2016-2017', '13615380522_738515149631616_26237229361480098_n.jpg'),
(38, 'Admin', 'ISUCCAA officers and coordinators conducts a team building activity cum special meeting. â€” at Sta.Ana, Cagayan.', '2018-09-02 11:53:20', 'f9YdWF', 0, 0, 'ISUCCAA', '4213230317_633371310146001_8543917893002732559_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `news` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `subject`, `news`, `image`, `date`, `code`) VALUES
(13, 'Job Afffair', 'Calling all job seekers. ISU Cauayan gymnasium, March 22 @9am to 4pm. #jobfair', '31533742_601838179965981_5254817228622633480_n.jpg', '2018-08-08 22:04:31', 'Pcwxln'),
(14, 'Alumni Website', 'Our website has been activated and renewed! Sorry for the convenience!', '8011059418_511610085655458_4372526962077202666_n.jpg', '2018-08-08 23:19:08', 'jgHS1V'),
(15, 'Victory Liner.Inc.', 'We are hiring! Check out the available positions below. Interested? Send us your resume at vlihotline@victoryliner.com or give us a call at (02) 842-8679 for any questions.\r\n\r\nAutomotive Mechanic (100 slots) \r\nAutomotive Electrician (100 slots)\r\nElectronic Technician (10 slots)\r\nA/C Technician (10 slots)\r\nWelder (10 slots)\r\nTireman (10 slots)\r\nUpholsterer (10 slots)\r\nAutomative Painter (10 slots)\r\nStockman/Encoder (10 slots)\r\nCadet Engineer (10 slots)\r\n\r\n#victoryliner #VLI #JobsPh #JobSearch #JobOpening #Bus #Philippines', '36629433220_1465596623550099_8206245857486726649_n.jpg', '2018-08-08 23:21:26', 'EMVXJl'),
(17, 'job interview', 'job interview', '47822050353_917347278417012_2053701679001773338_n.png', '2018-08-21 22:54:29', 'eBMtlI'),
(26, 'Job hiring in Isu ', 'Job hiring in Isu ', '911533742_601838179965981_5254817228622633480_n.jpg', '2018-09-02 00:39:31', 'tpQVAQ'),
(27, 'Yearbook 2017 is now available!', 'Yearbook 2017 is now available!', '44938689532_1087268811422913_8041468458006740992_n.jpg', '2018-09-02 00:50:45', 'fyshFC'),
(28, 'Are you  it? Prove it Be an information Technology officer', 'Basic pay  of more than Php 40,000.00 for Police inspector with Benefits  and other Allowances plus IT trainings (local and foreign) higher education  in prestigous and reputable institution.', '30729389246_2103001679931288_3171611186617647104_n.jpg', '2018-09-02 17:29:49', 'R3bFz8'),
(29, 'Toshiba job hiring ', 'Now Hiring Production Operator.Direct Hiring.', '16415965892_1433553366679404_1478089374170674505_n.jpg', '2018-09-02 17:34:02', 'PmHMqb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_children`
--

CREATE TABLE `tbl_new_children` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `par_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 'Clarise', 'hrlo', '2018-08-27 08:43:16', 'Pcwxln'),
(18, 'Clarise', 'jhayjhay pogi', '2018-08-27 08:44:43', '7EZEyD'),
(19, 'Clarise', 'wth', '2018-08-27 09:06:37', '7EZEyD'),
(20, 'Clarise', 'hii', '2018-08-27 09:07:15', 'jgHS1V'),
(21, 'Clarise', 'hi', '2018-08-27 09:18:41', 'QlvCeu'),
(22, 'Clarise', 'wow', '2018-08-28 16:18:01', 'eBMtlI'),
(23, 'Clarise', 'nc', '2018-08-28 16:19:32', 'eBMtlI'),
(24, 'Clarise', 'wew', '2018-08-28 16:19:53', 'eBMtlI'),
(25, 'Clarise', 'wf', '2018-08-28 20:29:22', 'jgHS1V'),
(26, 'Clarise', 'hrhr', '2018-08-29 12:30:16', ')I/Mi8'),
(27, 'Clarise', 'eeeee', '2018-08-29 12:32:25', 'Pcwxln'),
(28, 'Clarise', 'wewewewewe', '2018-08-29 12:32:53', 'hJqjXJ'),
(29, 'Clarise', 'DSA', '2018-08-29 12:43:56', 'KSGr41'),
(30, 'Clarise guillermo bedana', 'd', '2018-09-01 17:26:34', 'hJqjXJ'),
(31, 'Clarise guillermo bedana', 'wow', '2018-09-01 19:10:07', 'fyshFC'),
(32, 'Silver Uy Fanacio', 'yo', '2018-09-02 12:12:31', 'Pcwxln'),
(33, 'John javier Romero Idmilao', 'nc i want to apply', '2018-09-02 18:19:00', 'PmHMqb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg_date`
--

CREATE TABLE `tbl_reg_date` (
  `id` int(11) NOT NULL,
  `yeardate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reg_date`
--

INSERT INTO `tbl_reg_date` (`id`, `yeardate`) VALUES
(4, ' 2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reply_comment`
--

CREATE TABLE `tbl_reply_comment` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reply_comment`
--

INSERT INTO `tbl_reply_comment` (`id`, `user`, `text`, `date`, `code`) VALUES
(4, 'Hannah Aquino Lozano', 'owww', '2018-09-04 16:32:14', 'FcTsUl');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip`) VALUES
(3, '::1'),
(4, ''),
(5, '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `addcom`
--
ALTER TABLE `addcom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `alumni_records`
--
ALTER TABLE `alumni_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_user`
--
ALTER TABLE `message_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_new_children`
--
ALTER TABLE `tbl_new_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reg_date`
--
ALTER TABLE `tbl_reg_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reply_comment`
--
ALTER TABLE `tbl_reply_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `addcom`
--
ALTER TABLE `addcom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumni_records`
--
ALTER TABLE `alumni_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message_user`
--
ALTER TABLE `message_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_new_children`
--
ALTER TABLE `tbl_new_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_reg_date`
--
ALTER TABLE `tbl_reg_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_reply_comment`
--
ALTER TABLE `tbl_reply_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
