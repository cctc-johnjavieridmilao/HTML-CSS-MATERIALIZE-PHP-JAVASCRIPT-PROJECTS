-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 09:14 AM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `vision` varchar(1000) NOT NULL,
  `mission` varchar(1000) NOT NULL,
  `excelence` varchar(1000) NOT NULL,
  `integrity` varchar(1000) NOT NULL,
  `innovation` varchar(1000) NOT NULL,
  `efficiency` varchar(1000) NOT NULL,
  `collborating` varchar(1000) NOT NULL,
  `accountability` varchar(1000) NOT NULL,
  `environmentalism` varchar(1000) NOT NULL,
  `publicengagement` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `vision`, `mission`, `excelence`, `integrity`, `innovation`, `efficiency`, `collborating`, `accountability`, `environmentalism`, `publicengagement`) VALUES
(2, 'The Isabela State University as a leading, vibrant, comprehensive and research university in the country and the ASEAN region', 'The Isabela State University is committed to develop highly trained and globally competent professionals; generate innovative and cutting-edge knowledge and technologies for people empowerment and sustainable development; engage in viable resource generation programs; and maintain and enhance stronger partnerships under good governance to advance the interests of national and international communities', 'The conduct our affairs with due diligence, care and thoughtful engagement in pursuit of excellence in our academic, research & development and extension', 'We believe in the value of respect and subscribe to the highest ethical standard of honesty, fairness, truth and justice in all our engagements and as we pursue our mission and vision', 'We shall constantly seek for new and innovative ways of doing things. Contribute to solving current as well as emerging problems of society. We believe that innovation is the key to our competitiveness in the world', 'We shall constantly seek for more effective and yet most economical ways VALUES of pursuing our vision and mission and goals amidst limited resources', 'We strongly recognize that societal problems are not isolated – in fact, multifaceted and appropriately addressed through the deployment of multidisciplinary teams in a collaborative synergy in order to ensure efficiency, innovation and productivity', 'We recognized that working with the University is a unique opportunity and privilege. We acknowledge that our office is a public trust and as such we shall conduct our engagements with the strongest sense of responsibility and submit ourselves accountable to the public and to Almighty God', 'We put prime value on our living planet. We accept the responsibility, adopt practices to protect the environment, and be made accountable for our action', 'We shall consistently engage the public, mobilizing their participation in our programs and services. We shall seek their voice, recognize its needs, and mobilize their expertise for a sustained and continuing programs and services improvement');

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
  `bantime` datetime NOT NULL,
  `welcome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `code`, `status`, `middle_name`, `student_id`, `marital`, `dateofbirth`, `contact`, `program`, `year`, `semester`, `images`, `comment_status`, `online`, `otherprogram`, `ban`, `dateofban`, `bantime`, `welcome`) VALUES
(7, 'Doming', 'Galacingao', 'doming@gmail.com', '3b1d7a5b5d10577b79fc206c4ffd64ea', 'Male', '975167', 1, 'Fernado', '3987878', 'Single', '1999-11-11', '18', 'BSIT', '2012-2013', '1st Semester', 'graduate.png', 1, 'inActive', '', 1, '2018-09-18 22:03:12', '2018-09-15 22:03:12', 1),
(9, 'Hannah', 'Lozano', 'hanah@gmail.com', 'eb09d5e396183f4b71c3c798158f7c07', 'Female', '221129', 1, 'Aquino', '3989898', 'Married', '2000-07-11', '18', 'BS Entrep', '2017-2018', '1st Semester', '8712715374_231975963807441_1138351620814363571_n.jpg', 1, 'Offline', '', 1, '2018-09-20 20:46:18', '2018-09-17 20:46:18', 1),
(23, 'Clarise', 'Guillermo', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', '563683', 1, 'Bedana', '4545545', 'Married', '1999-11-11', '18', 'BSIT', '2012-2013', '2nd Semester', '7.jpg', 1, 'inActive', '', 1, '2018-09-12 19:58:14', '2018-09-09 19:58:14', 1),
(33, 'Rigid', 'Cid', 'rigid@gmail.com', '938af4ac7c74159f98e4e42b47d0cfd2', 'Male', '209369', 1, 'Samntha', '3878787', 'Windowed', '2005-12-22', '12', 'BSIT', '2016-2017', '1st Semester', '334Isabela_State_University_Seal.png', 1, 'inActive', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(36, 'Maui', 'Dsadasdsa', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Female', '210174', 1, 'Zdsadasd', '4987978', 'Separated', '2005-12-15', '12', 'BSIT', '2015-2016', '2nd Semester', '28056651_869758959864350_9222172565825753261_n.jpg', 1, 'inActive', '', 1, '2018-09-17 00:36:52', '2018-09-14 00:36:52', 1),
(37, 'Awewewewe', 'Ewewewewew', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', '998213', 1, 'Ewewewewew', '3789066', 'Windowed', '2005-12-15', '12', 'BSIT', '2016-2017', '1st Semester', '28056651_869758959864350_9222172565825753261_n.jpg', 1, 'inActive', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(42, 'Qwerty', 'Weeee', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Female', '619007', 1, 'Wwww', '3900787', 'Separated', '2005-12-15', '12', 'BSE - Major in Physical Science', '2013-2014', '1st Semester', '17498838_711421649031416_575574364044866861_n.jpg', 1, 'Offline', '', 0, '2018-09-19 12:46:02', '2018-09-16 12:46:02', 1),
(43, 'Xxxxxxxx', 'Xxxxxxx', 'xxx@gmail.com', 'fb0e22c79ac75679e9881e6ba183b354', 'Male', '253521', 1, 'Xxxxxxxxxxxxx', '1434343', 'Divorced', '2005-12-22', '12', 'BSHRM', '2012-2013', '1st Semester', '17493182_708067822700132_7176439834652093008_o.jpg', 1, 'Offline', '', 1, '2018-09-25 21:54:57', '2018-09-22 21:54:57', 1),
(45, 'Jhay', 'Idmilao', 'johnjavieridmilao12@gmail.com', '0341d418be8a73b5fb8069ba1a87414f', 'Male', '798540', 1, 'Romero', '5654645', 'Divorced', '1999-11-11', '18', 'others', '2017-2018', '1st Semester', '28056651_869758959864350_9222172565825753261_n.jpg', 1, 'inActive', 'dasdsadsa', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(47, 'Glenn Paul', 'Respicio', 'No Data ', 'cc60780ae00186bb779a1fd0bfe2ece0', 'Female', '926532', 1, 'Eeeee', '3333333', 'Married', '2005-12-16', '12', 'BSIT', '2004-2005', '1st Semester', '52mili.jpg', 1, 'Offline', '', 1, '2018-10-09 22:34:51', '2018-10-06 22:34:51', 1);

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
(1, 'Admin', 'admin', 1);

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
(2, 'Clarise ', 'guillermo  ', 'bedana ', 'Christine village', 'clarise@gmail.com', '098642332', 'Female', '18', '1999-11-11', 'Married', 'Baccalaureate Degree(College)', '3232', 'CBM', 'BSHRM', '2011-2012', 'National Certificate III', '', 'Employed', 'dasdsa', 'dasdsa', '4343', '20000', '', 'one year to Below 2 years', 'three years to below 4 years', 'Goverment Employment Office', 'Temporary', 'Monthly Salary', 'Fairly Relevant', 'Information Technology Skills', 'Excellent', 'Good', 'Good', 'Fair', 'Fair', 'Fair', 'Good', 'Fair', 'Fair', 'Good', 'Very Good', 'Very Good', 'Good', 'sasa', '', 1, '2018-07-30 19:03:23', '', '', '', '', '', '', '', '', '', '', 'Chief', 1),
(5, 'Samantha', 'Rigid', 'Samantha', 'Aurorra Isabela', 'rigid@gmail.com', '09675656', 'Male', '18', '1999-09-11', 'Divorced', 'Master\'s Degree', '90000', 'PS', 'BS Automotive', '2012-2013', 'National Certificate III', '', 'Ofw', '', '', '', '0', '', 'two years to below 3 years', 'two years to below 3 years', 'Personal office company', 'Casual/Contractual', 'Monthly Salary', 'Not Relevant', 'Information Technology Skills', 'Good', 'Very Good', 'Good', 'Need Improvement', 'Fair', 'Fair', 'Fair', 'Need Improvement', 'Good', 'Very Good', 'Good', 'Good', 'Good', 'dasdsa', '', 1, '2018-07-31 00:40:15', '', '', '', '', '', 'dasdas', 'ddasdas', '23232', '43423423', '', 'Ofw workers', 1),
(7, 'Doming', 'Fernado', 'Galacingao', 'Dadap,Luna,isabela', 'doming@gmail.com', '+63 654645656', 'Male', '18', '1999-11-11', 'Single', 'Baccalaureate Degree(College)', '90897898', 'ITE', 'BSIT', '2012-2013', 'Civil Service(Professional)', '', 'UnEmployed', '', '', '', '0', '', 'two years to below 3 years', 'four years and Above', 'Recomendation from Politicians', 'Casual/Contractual', 'Monthly Salary', 'Relevant', 'Information Technology Skills', 'Very Good', 'Very Good', 'Fair', 'Fair', 'Good', 'Good', 'Good', 'Need Improvement', 'Good', 'Excellent', 'Fair', 'Good', 'Fair', 'hello', '', 1, '2018-08-08 00:08:35', '', '', '', '', '', '', '', '', '', '', 'No job', 1),
(9, 'Jabez ', 'Izaac  ', 'Dela cruzz ', 'panggasinan', 'jabez@gmail.com', ' 63 365656565', 'Male', '17', '1999-11-11', 'Single', 'Post Doctoral', '787', 'CCIT', 'BSCS', '2015-2016', 'National Certificate III', '', 'Employed', 'das', 'dsadas', '2', '9000', '', 'three years to below 4 years', 'three years to below 4 years', 'Media advertisement', 'Job Order', '', 'Fairly Relevant', 'Information Technology Skills', 'Very Good', 'Need Improvement', 'Very Good', 'Very Good', 'Fair', 'Very Good', 'Very Good', 'Very Good', 'Fair', 'Good', 'Good', 'Very Good', 'Fair', 'hrllo', '', 1, '2018-08-09 21:24:47', '', '', '', '', '', '', '', '', '', '', 'GAME DEVELOPER', 1),
(23, 'Marible', 'Dasdas', 'Ddasdasdas', 'Dadap,Luna,isabela', 'maribelidmilao@gmail.com', '+63 986676767', 'Male', '22', '1995-11-11', 'Single', 'Master\'s Degree', '90', 'CBM', 'BSHRM', '2013-2014', 'Civil Service(Professional)', '', 'UnEmployed', '', '', '', '0', '', 'two years to below 3 years', 'two years to below 3 years', 'Media advertisement', 'Casual/Contractual', '', 'Fairly Relevant', 'Leadership/Managerial Skills', 'Fair', 'Good', 'Very Good', 'Good', 'Good', 'Fair', 'Very Good', 'Good', 'Excellent', 'Fair', 'Very Good', 'Good', 'Very Good', 'hiii', '', 1, '2018-08-11 02:54:47', '', '', '', '', '', '', '', '', '', '', 'No job', 1),
(37, 'Glenn Paul', 'Eeeee', 'Respicio', 'dadap Luna iSbela', 'johnjavieridmilao12@gmail.com', '00342423423', 'Female', '12', '2005-12-16', 'Married', 'Master\'s Degree', '4', 'CBM', 'BSIT', '2004-2005', 'National Certificate III', '', 'UnEmployed', 'Company Name', 'Company Position', 'Year of Employment', '20000', '', 'one year to Below 2 years', 'one year to Below 2 years', 'job fair/DOLE', 'Temporary', 'Monthly Salary', 'Relevant', 'Information Technology Skills', 'Very Good', 'Excellent', 'Fair', 'Very Good', 'Very Good', 'Excellent', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Good', 'Good', 'Very Good', 'ty', '', 1, '2018-10-06 02:10:49', 'Nature of Business', 'Place of your Business', 'Year Started', 'Monthly Income', '', 'Job Description', 'Nature of Work', 'Year Employment', 'Monthly Income', '', 'No job', 1);

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
(1, 'Rigid Samntha Cid', 'fe', '2018-10-07 03:35:10', 'f9YdWF', 1, 0),
(2, 'Rigid Samntha Cid', 'dsa', '2018-10-07 03:46:31', 'f9YdWF', 1, 0);

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
(7, 'Hannah Aquino Lozano', 'hanah@gmail.com', '+63 865464565', 1, '2018-09-08 22:26:01', 'hii'),
(16, 'Hannah Aquino Lozano', 'hanah@gmail.com', '098765543232', 1, '2018-09-08 23:34:49', 'fdsfsd'),
(17, 'Rigid Samntha Cid', 'rigid@gmail.com', '09876565444', 1, '2018-09-13 21:20:42', 'hii admin we loveyouu'),
(20, 'Clarise Bedana Guillermo', 'clarise@gmail.com', '09876565444', 1, '2018-09-14 16:32:49', 'wazaaaap admin'),
(21, 'jhay', 'johnjavieridmilao12@gmail.com', '09876565444', 1, '2018-09-22 20:56:21', 'asda'),
(23, 'Glenn Paul Celek Respicio', 'dsadasdasdasd@gmail.com', '+63 434432432', 1, '2018-09-22 23:30:49', 'hii'),
(24, 'Glenn Paul Celek Respicio', 'dasdasdas@gmail.com', '+63 434432432', 1, '2018-09-22 23:34:35', 'sdsa'),
(25, 'Glenn Paul Eeeee Respicio', 'glen@gmail.com', '07545443534', 1, '2018-10-05 00:00:00', 'hi');

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
(32, 'Admin', 'Summer Pre-Kindergarten Programs ddddddsa dasdas dasdas dsadasdsadas sad', '2018-08-08 16:02:59', '7EZEyD', 0, 0, 'Summer Pre-Kindergarten Programs', '24313087528_625935304222935_3387982712516800055_n.jpg'),
(35, 'Admin', 'Yearbook 2017 is now available!', '2018-09-01 18:49:49', 'q6A0jO', 0, 0, 'Yearbook 2017 is now available! ', '34638689532_1087268811422913_8041468458006740992_n.jpg'),
(37, 'Admin', 'Awarding of Financial Assistance to the Alumni Scholars 2016-2017 last December 06-07, 2016', '2018-09-02 11:37:49', 'xzc8aM', 0, 0, ' Alumni Scholars 2016-2017 ', '13615380522_738515149631616_26237229361480098_n.jpg'),
(38, 'Admin', 'ISUCCAA officers and coordinators conducts a team building activity cum special meeting. â€” at Sta.Ana, Cagayan.', '2018-09-02 11:53:20', 'f9YdWF', 0, 0, 'ISUCCAA ', '4213230317_633371310146001_8543917893002732559_n.jpg');

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
(33, 'John javier Romero Idmilao', 'nc i want to apply', '2018-09-02 18:19:00', 'PmHMqb'),
(34, 'Hannah Aquino Lozano', 'a', '2018-09-16 13:16:21', 'jgHS1V'),
(35, 'Glenn Paul Eeeee Respicio', 'gege', '2018-10-06 08:16:00', '<br />\r\n<b>Notice</b>:  Undefined variable: code1 in <b>C:xa'),
(36, 'Glenn Paul Eeeee Respicio', 'sds', '2018-10-06 08:17:04', 'Pcwxln'),
(37, 'Glenn Paul Eeeee Respicio', 'hehe', '2018-10-06 08:41:00', '<br />\r\n<b>Notice</b>:  Undefined variable: code in <b>C:xam'),
(38, 'Glenn Paul Eeeee Respicio', 'das', '2018-10-06 08:41:36', '<br />\r\n<b>Notice</b>:  Undefined variable: code in <b>C:xam'),
(39, 'Glenn Paul Eeeee Respicio', 'wew', '2018-10-06 08:42:07', 'R3bFz8'),
(40, 'Glenn Paul Eeeee Respicio', '', '2018-10-06 08:44:32', '<br />\r\n<b>Notice</b>:  Undefined variable: code in <b>C:xam'),
(41, 'Glenn Paul Eeeee Respicio', 'sa', '2018-10-06 08:52:57', 'PmHMqb'),
(42, 'Glenn Paul Eeeee Respicio', 'dsa', '2018-10-06 08:55:39', 'PmHMqb'),
(43, 'Glenn Paul Eeeee Respicio', 'kupal\r\n', '2018-10-06 08:55:58', 'PmHMqb'),
(44, 'Glenn Paul Eeeee Respicio', 'dsa', '2018-10-06 10:16:04', 'fyshFC'),
(45, 'Glenn Paul Eeeee Respicio', 'gege', '2018-10-06 11:44:12', 'jgHS1V');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `project` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `subject`, `project`, `image`, `date`, `code`) VALUES
(2, 'ISUCCAA Project is  good', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem perspiciatis voluptatum a, quo nobis, non commodi quia repellendus sequi nulla voluptatem dicta reprehenderit, placeat laborum ut beatae ullam suscipit veniam.', '4851.jpg', '2018-10-04 18:54:09', 'kNCEXP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_children`
--

CREATE TABLE `tbl_project_children` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `par_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_children`
--

INSERT INTO `tbl_project_children` (`id`, `user`, `text`, `date`, `par_code`) VALUES
(1, '', 'hehe', '2018-10-04 13:12:15', 'kNCEXP'),
(2, 'Glenn Paul Celek Respicio', 'a', '2018-10-04 13:17:53', 'kNCEXP'),
(3, 'Glenn Paul Eeeee Respicio', 'wtf', '2018-10-06 08:56:27', 'kNCEXP'),
(4, 'Glenn Paul Eeeee Respicio', 'dasdas', '2018-10-06 08:56:47', 'kNCEXP'),
(5, 'Glenn Paul Eeeee Respicio', 'DASDAS', '2018-10-06 09:14:36', 'kNCEXP'),
(6, 'Glenn Paul Eeeee Respicio', 'EEE', '2018-10-06 09:14:58', 'kNCEXP'),
(7, 'Glenn Paul Eeeee Respicio', 'jeje', '2018-10-06 10:16:29', 'kNCEXP');

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
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_children`
--
ALTER TABLE `tbl_project_children`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message_user`
--
ALTER TABLE `message_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_project_children`
--
ALTER TABLE `tbl_project_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
