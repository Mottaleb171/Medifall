-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 11:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medifall`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) NOT NULL,
  `a_email` varchar(60) NOT NULL,
  `a_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@medifall.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `assign_indi`
--

CREATE TABLE `assign_indi` (
  `donorID` int(11) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_indi`
--

INSERT INTO `assign_indi` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `date`, `status`) VALUES
(1, 'Mehedi', 'Ace Plus, Napa Extend, Eccevit, Ecap', '11', 'Nobody Housing, 12/5, Block A', 'Bogura', 'test', 'JAGGO FOUNDATION', '01855435597', '2021-10-30', 'Donation Accepted'),
(4, 'Mehedi Hasan', 'multi vit', '30', 'Nill', 'test', 'Dhaka', 'JAGORANI CHAKRA FOUNDATION', '01400760755', '2021-10-28', 'Assigned To Executive'),
(13, 'Juel', 'Ace Plus, Napa Extend, Eccevit, Ecap', '11', 'Nobody Housing, 12/5, Block A', 'Ramna', 'Lakshmipur', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Assigned To Executive'),
(14, 'Amzad12', 'Ace Plus, Napa Extend, Eccevit, Ecap', '12', 'Nobody Housing, 12/5, Block A', 'Ramna', 'Bogura', 'CARE BANGLADESH', '01977513588', '2021-10-31', 'Pending'),
(15, 'Amzad', 'Ace Plus, Napa Extend, Eccevit, Ecap', '12', 'Nobody Housing, 12/5, Block A', 'Bogura', 'Joypurhat', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Pending'),
(16, 'Robiul ', 'Ace Plus, Napa Extend, Eccevit, Ecap', '11', 'Nobody Housing', 'Bogura', 'Natore', 'CARE BANGLADESH', '01977513588', '2021-10-31', 'Donation Accepted'),
(17, 'sajib', 'Ace Plus, Napa Extend, Eccevit, Ecap', '12', 'Nobody Housing, 12/5, Block A', 'test', 'Joypurhat', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Donation Accepted'),
(18, 'Amzad12', 'Ace Plus, Napa Extend, Eccevit, Ecap', '11', 'Nobody Housing, 12/5, Block A', 'Bogura', 'Joypurhat', 'CARE BANGLADESH', '01977513588', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `assign_org`
--

CREATE TABLE `assign_org` (
  `donorID` int(11) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_org`
--

INSERT INTO `assign_org` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `date`, `status`) VALUES
(2, 'UNICEF Bangladesh', 'BongoVax', 1000, 'Syed Mahbub Morshed Avenue, ', 'Mohammadpur', 'Dhaka', 'CARE BANGLADESH', '01178256972', '2021-10-28', 'Pending'),
(3, 'Test Org', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Bogura', 'test', 'CARE BANGLADESH', '01855435597', '2021-10-30', 'Pending'),
(4, 'ORGGGGGG', 'Ace Plus, Napa Extend, Eccevit, Ecap', 23, 'Local stree, 2/10, A', 'Bogura', 'test', 'CARE BANGLADESH', '01855435597', '2021-10-30', 'Pending'),
(9, 'ES Pharma', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local stree, 2/10, A', 'test', 'test', 'CARE BANGLADESH', '01977513588', '2021-10-30', 'Assigned To Executive'),
(10, 'testorg', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local stree, 2/10, A', 'Bogura', 'test', 'CARE BANGLADESH', '01855435597', '2021-10-30', 'Donation Accepted'),
(12, 'Test Org', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Bogura', 'Jhalakathi', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Pending'),
(13, 'Test Org2', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Ramna', 'Natore', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Pending'),
(14, 'Test Org3', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Bogura', 'Chapainawabganj', 'CARE BANGLADESH', '01977513588', '2021-10-31', 'Assigned To Executive'),
(15, 'Test Org5', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Ramna', 'Rajshahi', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Assigned To Executive'),
(16, 'BRAC', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Bogura', 'Natore', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `assign_pharma`
--

CREATE TABLE `assign_pharma` (
  `donorID` int(11) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_pharma`
--

INSERT INTO `assign_pharma` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `date`, `status`) VALUES
(6, 'Opsonin Pharmaceuticals Ltd.', 'BongoVax', 50000, 'Opsonin Building 30, New Eskaton Road Dhaka 1000, ', 'Ramna', 'Dhaka', 'JAGGO FOUNDATION', '880-2-9332262', '2021-10-17', 'Pending'),
(7, 'ES Pharma', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Bogura', 'Natore', 'CARE BANGLADESH', '01400760755', '2021-10-31', 'Pending'),
(8, 'ES Pharma2', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Bogura', 'Chapainawabganj', 'CARE BANGLADESH', '01977513588', '2021-10-31', 'Donation Accepted'),
(9, 'ES Pharma5', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Bogura', 'Joypurhat', 'CARE BANGLADESH', '01977513588', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `assign_request`
--

CREATE TABLE `assign_request` (
  `reqID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_request`
--

INSERT INTO `assign_request` (`reqID`, `name`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `date`, `status`) VALUES
(0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Pending'),
(4, 'Asad', 'Ace Plus, Napa Extend, Eccevit, Ecap', '12', 'Block A, 20/21, Mollah street', '0', 'Natore', 'CARE BANGLADESH', '01977513588', '2021-10-31 00:00:00', 'Assigned To Executive'),
(5, 'Mehedi', 'Ace Plus, Napa Extend, Eccevit, Ecap', '12', 'Block A, 20/21, Mollah street', '0', 'Khagrachhari', 'CARE BANGLADESH', '01977513588', '2021-10-31 00:00:00', 'Pending'),
(6, 'Shagor', 'Ace Plus, Napa Extend, Eccevit, Ecap', '12', 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'CARE BANGLADESH', '01400760755', '2021-10-31 00:00:00', 'Pending'),
(7, 'Shagor', 'test', '12', 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'CARE BANGLADESH', '01400760755', '2021-10-31 00:00:00', 'Assigned To Executive'),
(8, 'Mehedi', 'Ace Plus, Napa Extend, Eccevit, Ecap', '10', 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'CARE BANGLADESH', '01400760755', '2021-10-31 00:00:00', 'Donation Accepted'),
(14, 'Shagor', 'test', '13', 'Block', 'test', 'test', 'Seba Parishad', '01400760755', '2021-10-27 00:00:00', 'Pending'),
(17, 'Soikat', 'Ace', '12', 'Block', 'Bogura', 'Joypurhat', 'Life ', '01977513588', '2021-10-27 00:00:00', 'Pending'),
(18, 'Soikat', 'Ace', '11', 'test', 'Bogura', 'Noakhali', 'Healthcare BD', '01400760755', '2021-10-27 00:00:00', 'Pending'),
(19, 'Mehedi', 'Ace', '14', 'Block', 'Ramna', 'Chandpur', 'Seba Parishad', '01977513588', '2021-10-27 00:00:00', 'Pending'),
(20, 'Kamal', 'Ace', '12', 'Block', 'Bogura', 'Natore', 'Helping Hand', '01977513588', '2021-10-27 00:00:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(60) NOT NULL,
  `contact_email` varchar(60) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `contact_message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_tb`
--

INSERT INTO `contact_tb` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`) VALUES
(9, 'Mehedi Hasan', 'mshumon172060@bscse.uiu.ac.bd', '01400760755', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `executivelogin_tb`
--

CREATE TABLE `executivelogin_tb` (
  `e_id` int(7) NOT NULL,
  `ngo_name` varchar(50) DEFAULT NULL,
  `e_name` varchar(30) DEFAULT NULL,
  `e_email` varchar(30) DEFAULT NULL,
  `e_pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executivelogin_tb`
--

INSERT INTO `executivelogin_tb` (`e_id`, `ngo_name`, `e_name`, `e_email`, `e_pass`) VALUES
(1, 'JAGGO FOUNDATION', 'Robiul Islam ', 'robi123@gmail.com', '12345'),
(2, 'JAGORANI CHAKRA FOUNDATION', 'Shourav Sarker', 'shourav1234@gmail.com', '12345'),
(3, 'CARE BANGLADESH', 'Hasnat', 'hasnat@yahoo.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `executive_assign_indi`
--

CREATE TABLE `executive_assign_indi` (
  `donorID` int(7) NOT NULL,
  `donor` varchar(50) DEFAULT NULL,
  `medicine` varchar(250) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `upzilla` varchar(50) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `daate` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executive_assign_indi`
--

INSERT INTO `executive_assign_indi` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `executive`, `phone`, `daate`, `status`) VALUES
(1, 'Mehedi', 'Ace', 11, 'Nobody Housing, 12/5, Block A', 'Bogura', 'test', 'hasnat@yahoo.com', '01855435597', '2021-10-30', 'Donation Accepted'),
(4, 'Mehedi Hasan', 'multi', 30, 'Nill', 'test', 'Dhaka', 'shourav1234@gmail.com', '01400760755', '2021-10-28', 'Donation Accepted'),
(13, 'Juel', 'Ace', 11, 'Nobody Housing, 12/5, Block A', 'Ramna', 'Lakshmipur', 'hasnat@yahoo.com', '01400760755', '2021-10-31', 'Pending'),
(14, 'Amzad12', 'Ace', 12, 'Nobody Housing, 12/5, Block A', 'Ramna', 'Bogura', 'hasnat@yahoo.com', '01977513588', '2021-10-31', 'Pending'),
(15, 'Amzad', 'Ace', 12, 'Nobody Housing, 12/5, Block A', 'Bogura', 'Joypurhat', 'hasnat@yahoo.com', '01400760755', '2021-10-31', 'Pending'),
(16, 'Robiul ', 'Ace', 11, 'Nobody Housing', 'Bogura', 'Natore', 'hasnat@yahoo.com', '01977513588', '2021-10-31', 'Donation Accepted'),
(17, 'sajib', 'Ace', 12, 'Nobody Housing, 12/5, Block A', 'test', 'Joypurhat', 'hasnat@yahoo.com', '01400760755', '2021-10-31', 'Donation Accepted'),
(18, 'Amzad12', 'Ace', 11, 'Nobody Housing, 12/5, Block A', 'Bogura', 'Joypurhat', 'hasnat@yahoo.com', '01977513588', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `executive_assign_org`
--

CREATE TABLE `executive_assign_org` (
  `donorID` int(7) NOT NULL,
  `donor` varchar(50) DEFAULT NULL,
  `medicine` varchar(250) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `upzilla` varchar(50) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `daate` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executive_assign_org`
--

INSERT INTO `executive_assign_org` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `executive`, `phone`, `daate`, `status`) VALUES
(4, 'ORGGGGGG', 'Ace Plus, Napa Extend, Eccevit, Ecap', 23, 'Local stree, 2/10, A', 'Bogura', 'test', '', '01855435597', '2021-10-30', 'Pending'),
(5, 'orgnnn', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Ramna', 'test', '', '01400760755', '2021-10-30', 'Pending'),
(6, 'Org3', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Ramna', 'test', '', '01400760755', '2021-10-30', 'Pending'),
(7, 'org4', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local stree, 2/10, A', 'Bogura', 'test', '', '01400760755', '2021-10-30', 'Pending'),
(9, 'ES Pharma', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local stree, 2/10, A', 'test', 'test', 'hasnat@yahoo.com', '01977513588', '2021-10-30', 'Pending'),
(14, 'Test Org3', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Bogura', 'Chapainawabganj', 'hasnat@yahoo.com', '01977513588', '2021-10-31', 'Pending'),
(15, 'Test Org5', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Ramna', 'Rajshahi', 'hasnat@yahoo.com', '01400760755', '2021-10-31', 'Pending'),
(16, 'BRAC', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, 'Local street, 2/10, A', 'Bogura', 'Natore', 'hasnat@yahoo.com', '01400760755', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `executive_assign_pharma`
--

CREATE TABLE `executive_assign_pharma` (
  `donorID` int(7) NOT NULL,
  `donor` varchar(50) DEFAULT NULL,
  `medicine` varchar(250) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `upzilla` varchar(50) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `daate` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executive_assign_pharma`
--

INSERT INTO `executive_assign_pharma` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `executive`, `phone`, `daate`, `status`) VALUES
(8, 'ES Pharma2', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Bogura', 'Chapainawabganj', 'hasnat@yahoo.com', '01977513588', '2021-10-31', 'Donation Accepted'),
(9, 'ES Pharma5', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, 'Local street, 2/10, A', 'Bogura', 'Joypurhat', 'hasnat@yahoo.com', '01977513588', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `executive_assign_request`
--

CREATE TABLE `executive_assign_request` (
  `donorID` int(7) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `quantity` int(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `executive` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `daate` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executive_assign_request`
--

INSERT INTO `executive_assign_request` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `executive`, `phone`, `daate`, `status`) VALUES
(2, 'Shagor', 'Ace', 12, 'Block A, 20/21, Mollah street', '0', 'test', 'hasnat@yahoo.com', '01400760755', '2021-10-30', 'Donation Accepted'),
(4, 'Asad', 'Ace', 12, 'Block A, 20/21, Mollah street', '0', 'Natore', 'hasnat@yahoo.com', '01977513588', '2021-10-31', 'Donation Accepted'),
(7, 'Shagor', 'test', 12, 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'hasnat@yahoo.com', '01400760755', '2021-10-31', 'Donation Accepted'),
(8, 'Mehedi', 'Ace', 10, 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'hasnat@yahoo.com', '01400760755', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `individualdonation`
--

CREATE TABLE `individualdonation` (
  `donorID` int(11) NOT NULL,
  `donorName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `daate` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individualdonation`
--

INSERT INTO `individualdonation` (`donorID`, `donorName`, `email`, `address`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daate`, `status`) VALUES
(5, 'Mehedi Hasan', 'test@gmail.com', 'Nill', 'test', 'Dhaka', 'Ocof', 20, '01400760755', '2021-09-09', 'Pending'),
(11, 'Shourav Sarker', 'shourav123@gmail.com', '1/12 Tazmahal Road, mohammadpur,Dhaka-1207', 'Mohammadpur', 'Dhaka', 'gastrolfet', 20, '01679178054', '2021-10-17', 'Pending'),
(13, 'Juel', 'adzad@yahoo.com', 'Nobody Housing, 12/5, Block A', 'Ramna', 'Lakshmipur', 'Ace Plus, Napa Extend, Eccevit, Ecap', 11, '01400760755', '2021-10-31', 'Assigned To NGO'),
(14, 'Amzad12', 'mshumon172060@bscse.uiu.ac.bd', 'Nobody Housing, 12/5, Block A', 'Ramna', 'Bogura', 'Ace Plus, Napa Extend, Eccevit, Ecap', 12, '01977513588', '2021-10-31', 'Assigned To Executive'),
(15, 'Amzad', 'sg@yahoo.com', 'Nobody Housing, 12/5, Block A', 'Bogura', 'Joypurhat', 'Ace Plus, Napa Extend, Eccevit, Ecap', 12, '01400760755', '2021-10-31', 'Assigned To Executive'),
(16, 'Robiul ', 'mshumon172060@bscse.uiu.ac.bd', 'Nobody Housing', 'Bogura', 'Natore', 'Ace Plus, Napa Extend, Eccevit, Ecap', 11, '01977513588', '2021-10-31', 'Donation Accepted'),
(17, 'sajib', 'mshumon172060@bscse.uiu.ac.bd', 'Nobody Housing, 12/5, Block A', 'test', 'Joypurhat', 'Ace Plus, Napa Extend, Eccevit, Ecap', 12, '01400760755', '2021-10-31', 'Donation Accepted'),
(18, 'Amzad12', 'tynor@hotmail.com', 'Nobody Housing, 12/5, Block A', 'Bogura', 'Joypurhat', 'Ace Plus, Napa Extend, Eccevit, Ecap', 11, '01977513588', '2021-10-31', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `individuallogin_tb`
--

CREATE TABLE `individuallogin_tb` (
  `in_login_id` int(11) NOT NULL,
  `in_name` varchar(6) NOT NULL,
  `in_email` varchar(60) NOT NULL,
  `in_pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individuallogin_tb`
--

INSERT INTO `individuallogin_tb` (`in_login_id`, `in_name`, `in_email`, `in_pass`) VALUES
(2, 'indivi', 'individual@medifall.com', '12345'),
(4, 'Shoura', 'shourav123@gmail.com', '12345'),
(5, 'Mehedi', 'mehedi@indi.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `ngologin_tb`
--

CREATE TABLE `ngologin_tb` (
  `ngo_district` varchar(30) NOT NULL,
  `ngo_name` varchar(30) NOT NULL,
  `ngo_email` varchar(30) DEFAULT NULL,
  `ngo_pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngologin_tb`
--

INSERT INTO `ngologin_tb` (`ngo_district`, `ngo_name`, `ngo_email`, `ngo_pass`) VALUES
('Dhaka', 'CARE BANGLADESH', 'carebd@gmail.com', '12345'),
('Cumilla', 'JAGGO FOUNDATION', 'info@jaago.com.bd', '12345'),
('Rajshahi', 'JAGORANI CHAKRA FOUNDATION', 'jcjsr@ymail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `organizationdonation`
--

CREATE TABLE `organizationdonation` (
  `orgID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(250) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` float NOT NULL,
  `phone` varchar(30) NOT NULL,
  `daate` datetime NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizationdonation`
--

INSERT INTO `organizationdonation` (`orgID`, `name`, `email`, `location`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daate`, `status`) VALUES
(2, 'UNICEF Bangladesh', 'infobangladesh@unicef.org', 'Syed Mahbub Morshed Avenue, ', 'Mohammadpur', 'Dhaka', 'BongoVax', 1000, '01178256972', '2021-10-28 21:05:00', 'Pending'),
(3, 'Test Org', 'adzad@yahoo.com', 'Local street, 2/10, A', 'Bogura', 'test', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01855435597', '2021-10-30 01:53:00', 'Pending'),
(4, 'ORGGGGGG', 'tynor@hotmail.com', 'Local stree, 2/10, A', 'Bogura', 'test', 'Ace Plus, Napa Extend, Eccevit, Ecap', 23, '01855435597', '2021-10-30 02:35:00', 'Pending'),
(6, 'Org3', 'sg@yahoo.com', 'Local street, 2/10, A', 'Ramna', 'test', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01400760755', '2021-10-30 03:17:00', 'Pending'),
(7, 'org4', 'sg@yahoo.com', 'Local stree, 2/10, A', 'Bogura', 'test', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01400760755', '2021-10-30 03:22:00', 'Pending'),
(8, 'ES Pharma', 'sg@yahoo.com', 'Local stree, 2/10, A', 'Bogura', 'test', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, '01400760755', '2021-10-30 04:08:00', 'Pending'),
(9, 'ES Pharma', 'sg@yahoo.com', 'Local stree, 2/10, A', 'test', 'test', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01977513588', '2021-10-30 04:09:00', 'Pending'),
(10, 'testorg', 'mshumon172060@bscse.uiu.ac.bd', 'Local stree, 2/10, A', 'Bogura', 'test', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, '01855435597', '2021-10-30 13:20:00', 'Pending'),
(11, 'ES Pharma', 'mshumon172060@bscse.uiu.ac.bd', 'Local street, 2/10, A', 'Bogura', 'Chattogram', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01400760755', '2021-10-31 02:05:00', 'Pending'),
(12, 'Test Org', 'tynor@hotmail.com', 'Local street, 2/10, A', 'Bogura', 'Jhalakathi', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, '01400760755', '2021-10-31 15:43:00', 'Pending'),
(13, 'Test Org2', 'tynor@hotmail.com', 'Local street, 2/10, A', 'Ramna', 'Natore', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01400760755', '2021-10-31 15:47:00', 'Pending'),
(14, 'Test Org3', 'mshumon172060@bscse.uiu.ac.bd', 'Local street, 2/10, A', 'Bogura', 'Chapainawabganj', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01977513588', '2021-10-31 15:50:00', 'Assigned To NGO'),
(15, 'Test Org5', 'mshumon172060@bscse.uiu.ac.bd', 'Local street, 2/10, A', 'Ramna', 'Rajshahi', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, '01400760755', '2021-10-31 16:04:00', 'Assigned To Executive'),
(16, 'BRAC', 'tynor@hotmail.com', 'Local street, 2/10, A', 'Bogura', 'Natore', 'Ace Plus, Napa Extend, Eccevit, Ecap', 21, '01400760755', '2021-10-31 16:30:00', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `orglogin_tb`
--

CREATE TABLE `orglogin_tb` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(60) NOT NULL,
  `org_email` varchar(60) NOT NULL,
  `org_pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orglogin_tb`
--

INSERT INTO `orglogin_tb` (`org_id`, `org_name`, `org_email`, `org_pass`) VALUES
(1, 'UNICEF Bangladesh', 'infobangladesh@unicef.org', '12345'),
(2, 'Life Hope Medicare', 'lhopemedicare@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pharmadonation`
--

CREATE TABLE `pharmadonation` (
  `pharmaID` int(100) NOT NULL,
  `pharmaName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area` varchar(250) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `daate` datetime NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmadonation`
--

INSERT INTO `pharmadonation` (`pharmaID`, `pharmaName`, `email`, `area`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daate`, `status`) VALUES
(7, 'ES Pharma', 'tynor@hotmail.com', 'Local street, 2/10, A', 'Bogura', 'Natore', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, '01400760755', '2021-10-31 15:53:00', 'Assigned To NGO'),
(8, 'ES Pharma2', 'sg@yahoo.com', 'Local street, 2/10, A', 'Bogura', 'Chapainawabganj', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, '01977513588', '2021-10-31 16:05:00', 'Assigned To Executive'),
(9, 'ES Pharma5', 'sg@yahoo.com', 'Local street, 2/10, A', 'Bogura', 'Joypurhat', 'Ace Plus, Napa Extend, Eccevit, Ecap', 22, '01977513588', '2021-10-24 16:32:00', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `pharmalogin_tb`
--

CREATE TABLE `pharmalogin_tb` (
  `pha_id` int(11) NOT NULL,
  `pha_name` varchar(60) NOT NULL,
  `pha_email` varchar(60) NOT NULL,
  `pha_pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmalogin_tb`
--

INSERT INTO `pharmalogin_tb` (`pha_id`, `pha_name`, `pha_email`, `pha_pass`) VALUES
(5, 'wellbeing', 'pharma@medifall.com', '12345'),
(6, ' Square Pharmaceuticals Ltd.', 'squarepharma@gmail.com', '12345'),
(7, 'Opsonin Pharmaceuticals Ltd.', 'opsoninbd@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `requestmedicine`
--

CREATE TABLE `requestmedicine` (
  `requestID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area` varchar(250) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(60) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `daatetimee` datetime NOT NULL,
  `reason` varchar(250) NOT NULL,
  `status` varchar(30) DEFAULT 'Pending',
  `files` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestmedicine`
--

INSERT INTO `requestmedicine` (`requestID`, `name`, `email`, `area`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daatetimee`, `reason`, `status`, `files`) VALUES
(4, 'Asad', 'mshumon172060@bscse.uiu.ac.bd', 'Block A, 20/21, Mollah street', '0', 'Natore', 'Ace Plus, Napa Extend, Eccevit, Ecap', 12, '01977513588', '2021-10-31 14:06:00', '', 'Assigned To NGO', 'download.jpg'),
(5, 'Mehedi', 'tynor@hotmail.com', 'Block A, 20/21, Mollah street', '0', 'Khagrachhari', 'Ace Plus, Napa Extend, Eccevit, Ecap', 12, '01977513588', '2021-10-31 14:36:00', 'Test Reason is Given Here. It was done to check is this field is properly working or not.', 'Assigned To NGO', 'download.jpg'),
(6, 'Shagor', 'mshumon172060@bscse.uiu.ac.bd', 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'Ace Plus, Napa Extend, Eccevit, Ecap', 12, '01400760755', '2021-10-31 14:43:00', ' ', 'Assigned To NGO', 'download.jpg'),
(7, 'Shagor', 'mshumon172060@bscse.uiu.ac.bd', 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'test', 12, '01400760755', '2021-10-31 16:17:00', 'TEST', 'Donation Accepted', 'download.jpg'),
(8, 'Mehedi', 'tynor@hotmail.com', 'Block A, 20/21, Mollah street', 'Bogura', 'Joypurhat', 'Ace Plus, Napa Extend, Eccevit, Ecap', 10, '01400760755', '2021-10-31 16:27:00', ' fgfgfg', 'Donation Accepted', 'download.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assign_indi`
--
ALTER TABLE `assign_indi`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `assign_org`
--
ALTER TABLE `assign_org`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `assign_pharma`
--
ALTER TABLE `assign_pharma`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `assign_request`
--
ALTER TABLE `assign_request`
  ADD PRIMARY KEY (`reqID`);

--
-- Indexes for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `executivelogin_tb`
--
ALTER TABLE `executivelogin_tb`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `ngo_name` (`ngo_name`);

--
-- Indexes for table `executive_assign_indi`
--
ALTER TABLE `executive_assign_indi`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `executive_assign_org`
--
ALTER TABLE `executive_assign_org`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `executive_assign_pharma`
--
ALTER TABLE `executive_assign_pharma`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `executive_assign_request`
--
ALTER TABLE `executive_assign_request`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `individualdonation`
--
ALTER TABLE `individualdonation`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `individuallogin_tb`
--
ALTER TABLE `individuallogin_tb`
  ADD PRIMARY KEY (`in_login_id`);

--
-- Indexes for table `ngologin_tb`
--
ALTER TABLE `ngologin_tb`
  ADD PRIMARY KEY (`ngo_name`);

--
-- Indexes for table `organizationdonation`
--
ALTER TABLE `organizationdonation`
  ADD PRIMARY KEY (`orgID`);

--
-- Indexes for table `orglogin_tb`
--
ALTER TABLE `orglogin_tb`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `pharmadonation`
--
ALTER TABLE `pharmadonation`
  ADD PRIMARY KEY (`pharmaID`);

--
-- Indexes for table `pharmalogin_tb`
--
ALTER TABLE `pharmalogin_tb`
  ADD PRIMARY KEY (`pha_id`);

--
-- Indexes for table `requestmedicine`
--
ALTER TABLE `requestmedicine`
  ADD PRIMARY KEY (`requestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_tb`
--
ALTER TABLE `contact_tb`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `executivelogin_tb`
--
ALTER TABLE `executivelogin_tb`
  MODIFY `e_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `individualdonation`
--
ALTER TABLE `individualdonation`
  MODIFY `donorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `individuallogin_tb`
--
ALTER TABLE `individuallogin_tb`
  MODIFY `in_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organizationdonation`
--
ALTER TABLE `organizationdonation`
  MODIFY `orgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pharmadonation`
--
ALTER TABLE `pharmadonation`
  MODIFY `pharmaID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pharmalogin_tb`
--
ALTER TABLE `pharmalogin_tb`
  MODIFY `pha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requestmedicine`
--
ALTER TABLE `requestmedicine`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `executivelogin_tb`
--
ALTER TABLE `executivelogin_tb`
  ADD CONSTRAINT `executivelogin_tb_ibfk_1` FOREIGN KEY (`ngo_name`) REFERENCES `ngologin_tb` (`ngo_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
