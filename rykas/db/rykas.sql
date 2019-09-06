-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 07:10 PM
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
-- Database: `rykas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(250) NOT NULL,
  `topic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `name`, `feedback`, `date`, `email`, `topic`) VALUES
(2, 'jhay', 'text', '2018-11-21 01:08:05', 'johnjavieridmilao12@gmail.com', 'hiii');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `category` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `name`, `description`, `image`, `category`, `date`) VALUES
(8, 'BUTTERED CHICKEN WITH GARLIC', 'P. 230.00', '347CALAMARES P.260.00.jpg', 'Appetizers', '2018-11-20 23:47:38'),
(9, 'PIPINO', ' P.120.00', '486PIPINO P.120.00.jpg', 'Appetizers', '2018-11-20 23:47:38'),
(10, 'BEEF WITH BROCOLLI', ' P.230.00', '410SASHIMI TANIGUE P.230.00.jpg', 'Appetizers', '2018-11-20 23:47:38'),
(19, 'BEEF WITH BROCOLLI', ' P.230.00', '163BEEF CALDERETA P.250.00.jpg', 'Beef', '2018-11-20 23:47:38'),
(20, 'BEEF WITH BROCOLLI', ' P.230.00', '344BEEF CAMTO WITH WHITE SAUSE P.250.00.jpg', 'Beef', '2018-11-20 23:47:38'),
(21, 'BEEF KARE KARE ', 'P.230.00', '434BEEF KARE KARE P.230.00.jpg', 'Beef', '2018-11-20 23:47:38'),
(22, 'BEEF WITH AMPALAYA', ' P.230.00', '475BEEF WITH AMPALAYA P.230.00.jpg', 'Beef', '2018-11-20 23:47:38'),
(23, 'BEEF WITH BROCOLLI', ' P.230.00', '177BEEF WITH BROCOLLI P.230.00.jpg', 'Beef', '2018-11-20 23:47:38'),
(25, 'BEEF WITH MUSHROOM AND CREAMY SAUSE ', 'P.250.00', '388BEEF WITH MUSHROOM AND CREAMY SAUSE P.250.00.png', 'Beef', '2018-11-20 23:47:38'),
(26, 'BEEF WITH MUSHROOM', ' P.230.00', '226BEEF WITH MUSHROOM P.230.00.jpg', 'Beef', '2018-11-20 23:47:38'),
(27, 'BUTTERED CHICKEN WITH GARLIC ', 'P. 230.00', '277BUTTERED CHICKEN WITH GARLIC P. 230.00.jpg', 'Chicken', '2018-11-20 23:47:38'),
(28, 'CHICKEN ADOBO ', 'P.230.00', '268CHICKEN ADOBO P.230.00.jpg', 'Chicken', '2018-11-20 23:47:38'),
(29, 'HONGKONG FRIED CHICKEN (HALF)', ' P.250.00', '228HONGKONG FRIED CHICKEN (HALF) P.250.00.jpg', 'Chicken', '2018-11-20 23:47:38'),
(30, 'HONGKONG FRIED CHICKEN (WHOLE) ', 'P.450.00', '165HONGKONG FRIED CHICKEN (WHOLE) P.450.00.jpg', 'Chicken', '2018-11-20 23:47:38'),
(31, 'HOT CHILI WINGS', ' P.230.00', '357HOT CHILI WINGS P.230.00.jpg', 'Chicken', '2018-11-20 23:47:38'),
(32, 'SPICY CHICKEN BROWN SAUSE ', 'P.230.00', '286SPICY CHICKEN BROWN SAUSE P.230.00.jpg', 'Chicken', '2018-11-20 23:47:38'),
(33, 'BEEF WITH MUSHROOM SOUP ', 'P.290.00', '44BEEF WITH MUSHROOM SOUP P.290.00.jpg', 'Hot Soup', '2018-11-20 23:47:38'),
(34, 'MUSHROOM SOUP ', 'P.250.00', '115MUSHROOM SOUP P.250.00.jpg', 'Hot Soup', '2018-11-20 23:47:38'),
(35, 'NILAGANG BAKA ', 'P.250.00', '9NILAGANG BAKA P.250.00.jpg', 'Hot Soup', '2018-11-20 23:47:38'),
(36, 'BEEF WITH BROCOLLI', ' P.230.00', '152SEAFOODS SOUP P.290.00.jpg', 'Hot Soup', '2018-11-20 23:47:38'),
(37, 'SINIGANG NA BABOY SOUP ', 'P.250.00', '243SINIGANG NA BABOY SOUP P.250.00.jpg', 'Hot Soup', '2018-11-20 23:47:38'),
(38, 'ADOBONG NATIVE NA MANOK ', 'P.250.00', '203ADOBONG NATIVE NA MANOK P.250.00.jpg', 'Pinoy Corner', '2018-11-20 23:47:38'),
(39, 'ADOBONG PATO', ' P.250.00', '411ADOBONG PATO P.250.00.jpg', 'Pinoy Corner', '2018-11-20 23:47:38'),
(40, 'CREAMY ADOBONG PATO ', 'P.270.00', '9CREAMY ADOBONG PATO P.270.00.JPG', 'Pinoy Corner', '2018-11-20 23:47:38'),
(41, 'CREAMY KALDERETANG PATO ', 'P.270.00', '286CREAMY KALDERETANG PATO P.270.00.jpg', 'Pinoy Corner', '2018-11-20 23:47:38'),
(43, 'KALDERETANG PATO ', 'P.250.00', '482KALDERETANG PATO P.250.00.JPG', 'Pinoy Corner', '2018-11-20 23:47:38'),
(44, 'TINOLANG NATIVE NA MANOK', ' P.250.00', '169TINOLANG NATIVE NA MANOK P.250.00.jpg', 'Pinoy Corner', '2018-11-20 23:47:38'),
(45, 'SIZZLING BULALO WITH GRAVY SAUSE ', 'P.330.00', '461SIZZLING BULALO WITH GRAVY SAUSE P.330.00.jpg', 'Sizzlings', '2018-11-20 23:47:38'),
(46, 'SIZZLING CHICKEN IN BROWN SAUSE', ' P.250.00', '45SIZZLING CHICKEN IN BROWN SAUSE P.250.00.jpg', 'Sizzlings', '2018-11-20 23:47:38'),
(47, 'SIZZLING CHICKEN WINGS', ' P.230.00', '403SIZZLING CHICKEN WINGS P.230.00.jpg', 'Sizzlings', '2018-11-20 23:47:38'),
(48, 'SIZZLING CHICKEN WITH WHITE SAUSE', ' P.250.00', '437SIZZLING CHICKEN WITH WHITE SAUSE P.250.00.jpg', 'Sizzlings', '2018-11-20 23:47:38'),
(49, 'CHOPSUEY ', 'P.230.00', '194CHOPSUEY P.230.00.jpg', 'Vagetables', '2018-11-20 23:47:38'),
(50, 'GISING GISING', ' P.230.00', '460GISING GISING P.230.00.jpg', 'Vagetables', '2018-11-20 23:47:38'),
(51, 'INIHAW NA OKRA ', 'P.75.00', '155INIHAW NA OKRA P.75.00.jpg', 'Vagetables', '2018-11-20 23:47:38'),
(52, 'CHOPSUEY ', 'P.230.00', '420INIHAW NA TALONG P.95.00.jpg', 'Vagetables', '2018-11-20 23:47:38'),
(53, 'CHOPSUEY ', 'P.230.00', '230PINAKBET P.180.00.jpg', 'Vagetables', '2018-11-20 23:47:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
