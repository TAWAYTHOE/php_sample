-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 06:50 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mingalar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(5) NOT NULL,
  `adminname` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_address` varchar(20) NOT NULL,
  `admin_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `password`, `admin_email`, `admin_address`, `admin_phone`) VALUES
('A001', 'hhh', ' \r\na3aca2964e72000eea4c56cb341002a4', 'hhh@gmail.com', 'Mdy', '09-641644'),
('A002', 'Nyein ', 'a34800c968ee9fe3576fd7cb7d68ad94', 'nyein@gmail.com', 'POL', '09-4515564'),
('A003', 'zzz', 'f3abb86bd34cf4d52698f14c0da1dc60', 'zzz@gmail.com', 'POL', '0926241'),
('A004', 'myo', 'de9d37acd3491a1a1826ba587b1fc8d8', 'myo@gmail.com', 'myo', '16516563');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cinemaid` varchar(5) NOT NULL,
  `cinemaname` varchar(30) NOT NULL,
  `cinemalocation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cinemaid`, `cinemaname`, `cinemalocation`) VALUES
('C001', 'Minagalar', 'Latha'),
('C002', 'Thwin', 'Kyautata'),
('C003', 'Shae Saung', 'Kyautata'),
('C004', 'Nay Pyi Ta', 'Kyautata'),
('C005', 'Thamada', 'Dagon'),
('C006', 'Top Royal', 'Sein Gay Har'),
('C007', 'Mingalar 2', 'Dagon Center II'),
('C008', 'Mingalar Sanpya ', 'Lathar '),
('C009', 'Mingalar Waziyar', 'Hlaing Thar Yar'),
('C010', 'Mingalar Cineplex', 'Heldan'),
('C011', 'Htate Htar', 'Ho Nar Ka');

-- --------------------------------------------------------

--
-- Table structure for table `exbooking`
--

CREATE TABLE `exbooking` (
  `exbookid` varchar(10) NOT NULL,
  `memberid` varchar(5) NOT NULL,
  `planid` varchar(10) NOT NULL,
  `seatid1` varchar(5) NOT NULL,
  `seatid2` varchar(5) DEFAULT NULL,
  `seatid3` varchar(5) DEFAULT NULL,
  `bookdate` date NOT NULL,
  `showdate` date NOT NULL,
  `showtime` time NOT NULL,
  `totalprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exbooking`
--

INSERT INTO `exbooking` (`exbookid`, `memberid`, `planid`, `seatid1`, `seatid2`, `seatid3`, `bookdate`, `showdate`, `showtime`, `totalprice`) VALUES
('B0001', 'M0001', 'P0001', 'A01', '0', '0', '2018-11-19', '2018-11-22', '10:00:00', 3000),
('B0002', 'M0002', 'P0003', 'G07 ', 'G08 ', 'G09 ', '2018-11-19', '2018-11-23', '10:00:00', 6000),
('B0003', 'M0003', 'P0004', 'G06 ', 'G08 ', '0', '2018-11-20', '2018-11-23', '10:00:00', 4000),
('B0004', 'M0003', 'P0003', 'G07 ', 'G06 ', '0', '2018-11-21', '2018-11-23', '10:00:00', 4000),
('B0005', 'M0003', 'P0002', 'G02 ', 'G01 ', '0', '2018-11-21', '2018-11-24', '10:00:00', 4000),
('B0006', 'M0004', 'P0002', 'C10 ', 'C09 ', '0', '2018-11-23', '2018-11-24', '13:00:00', 6000),
('B0007', 'M0004', 'P0003', 'G07 ', 'G08 ', 'G09 ', '2018-11-23', '2018-11-23', '10:00:00', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberid` varchar(10) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `mpassword` varchar(50) NOT NULL,
  `memail` varchar(20) NOT NULL,
  `maddress` varchar(100) NOT NULL,
  `mphone` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberid`, `mname`, `mpassword`, `memail`, `maddress`, `mphone`) VALUES
('M0001', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa@gmail.com', 'aaa', 111),
('M0002', 'Myo Thiha', '06c56a89949d617def52f371c357b6db', 'momo@gmail.com', 'bbb', 222),
('M0003', 'zzz', 'f3abb86bd34cf4d52698f14c0da1dc60', 'zzz@gmail.com', 'zzz', 999),
('M0004', 'Thura', 'b04153a76b0e5b59edc0d4565cb9b25b', 'thura@gmail.com', 'rrrriiiipppp', 1651616);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movieid` varchar(5) NOT NULL,
  `moviename` varchar(20) NOT NULL,
  `movietype` varchar(10) NOT NULL,
  `moviephoto` varchar(200) NOT NULL,
  `moviedes` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieid`, `moviename`, `movietype`, `moviephoto`, `moviedes`) VALUES
('V0001', 'Wali Diwali', '2D', '1a.JPG', 'Indian Movie: Watch in good'),
('V0002', 'Aquaman', '3D', '2a.JPG', 'Marvel: Watch in good'),
('V0003', 'Spider Man', '3D', '3a.JPG', 'Into the spider verse'),
('V0004', 'Kyatt Guu', '3D', '4a.JPG', 'Myanmar Movie: Watch is not better'),
('V0005', 'GrindelWold', '3D', '5a.JPG', 'Better in watch'),
('V0006', 'Mee', '2D', '6a.JPG', 'Myanmar Movie: Good to watch');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `planid` varchar(10) NOT NULL,
  `cinemaid` varchar(5) NOT NULL,
  `movieid` varchar(5) NOT NULL,
  `movielength` int(11) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `adminid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`planid`, `cinemaid`, `movieid`, `movielength`, `startdate`, `enddate`, `adminid`) VALUES
('P0001', 'C001', 'V0006', 120, '2018-11-22', '2018-11-29', 'A001'),
('P0002', 'C002', 'V0002', 90, '2018-11-22', '2018-11-29', 'A003'),
('P0003', 'C003', 'V0003', 90, '2018-11-19', '2018-11-26', 'A002'),
('P0004', 'C004', 'V0004', 90, '2018-11-19', '2018-11-26', 'A003'),
('P0005', 'C002', 'V0005', 120, '2018-11-23', '2018-11-30', 'A002');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seatid` varchar(5) NOT NULL,
  `seattype` varchar(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seatid`, `seattype`, `price`) VALUES
('0', '0', 0),
('A01', 'STALL', 3000),
('A02', 'STALL', 3000),
('A03', 'STALL', 3000),
('A04', 'STALL', 3000),
('A05', 'STALL', 3000),
('A06', 'STALL', 3000),
('A07', 'STALL', 3000),
('A08', 'STALL', 3000),
('A09', 'STALL', 3000),
('A10', 'STALL', 3000),
('B01', 'STALL', 3000),
('B02', 'STALL', 3000),
('B03', 'STALL', 3000),
('B04', 'STALL', 3000),
('B05', 'STALL', 3000),
('B06', 'STALL', 3000),
('B07', 'STALL', 3000),
('B08', 'STALL', 3000),
('B09', 'STALL', 3000),
('B10', 'STALL', 3000),
('C01', 'STALL', 3000),
('C02', 'STALL', 3000),
('C03', 'STALL', 3000),
('C04', 'STALL', 3000),
('C05', 'STALL', 3000),
('C06', 'STALL', 3000),
('C07', 'STALL', 3000),
('C08', 'STALL', 3000),
('C09', 'STALL', 3000),
('C10', 'STALL', 3000),
('D01', 'STALL', 3000),
('D02', 'STALL', 3000),
('D03', 'STALL', 3000),
('D04', 'STALL', 3000),
('D05', 'STALL', 3000),
('D06', 'STALL', 3000),
('D07', 'STALL', 3000),
('D08', 'STALL', 3000),
('D09', 'STALL', 3000),
('D10', 'STALL', 3000),
('E01', 'STALL', 3000),
('E02', 'STALL', 3000),
('E03', 'STALL', 3000),
('E04', 'STALL', 3000),
('E05', 'STALL', 3000),
('E06', 'STALL', 3000),
('E07', 'STALL', 3000),
('E08', 'STALL', 3000),
('E09', 'STALL', 3000),
('E10', 'STALL', 3000),
('F01', 'STALL', 3000),
('F02', 'STALL', 3000),
('F03', 'STALL', 3000),
('F04', 'STALL', 3000),
('F05', 'STALL', 3000),
('F06', 'STALL', 3000),
('F07', 'STALL', 3000),
('F08', 'STALL', 3000),
('F09', 'STALL', 3000),
('F10', 'STALL', 3000),
('G01', 'DC', 2000),
('G02', 'DC', 2000),
('G03', 'DC', 2000),
('G04', 'DC', 2000),
('G05', 'DC', 2000),
('G06', 'DC', 2000),
('G07', 'DC', 2000),
('G08', 'DC', 2000),
('G09', 'DC', 2000),
('G10', 'DC', 2000),
('H01', 'DC', 2000),
('H02', 'DC', 2000),
('H03', 'DC', 2000),
('H04', 'DC', 2000),
('H05', 'DC', 2000),
('H06', 'DC', 2000),
('H07', 'DC', 2000),
('H08', 'DC', 2000),
('H09', 'DC', 2000),
('H10', 'DC', 2000),
('I01', 'DC', 2000),
('I02', 'DC', 2000),
('I03', 'DC', 2000),
('I04', 'DC', 2000),
('I05', 'DC', 2000),
('I06', 'DC', 2000),
('I07', 'DC', 2000),
('I08', 'DC', 2000),
('I09', 'DC', 2000),
('I10', 'DC', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `adminname` (`adminname`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cinemaid`);

--
-- Indexes for table `exbooking`
--
ALTER TABLE `exbooking`
  ADD PRIMARY KEY (`exbookid`),
  ADD KEY `exbooking_fkmemberid` (`memberid`),
  ADD KEY `exbooking_fkplanid` (`planid`),
  ADD KEY `exbooking_fkseatid` (`seatid1`),
  ADD KEY `exbooking_fkseatid2` (`seatid2`),
  ADD KEY `exbooking_fkseatid3` (`seatid3`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberid`),
  ADD UNIQUE KEY `memail` (`memail`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieid`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planid`),
  ADD KEY `movieid` (`movieid`),
  ADD KEY `plan_fkcinemaid` (`cinemaid`),
  ADD KEY `plan_fkadminid` (`adminid`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seatid`),
  ADD KEY `seat_fk1` (`seattype`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exbooking`
--
ALTER TABLE `exbooking`
  ADD CONSTRAINT `exbooking_fkmemberid` FOREIGN KEY (`memberid`) REFERENCES `member` (`memberid`),
  ADD CONSTRAINT `exbooking_fkplanid` FOREIGN KEY (`planid`) REFERENCES `plan` (`planid`),
  ADD CONSTRAINT `exbooking_fkseatid` FOREIGN KEY (`seatid1`) REFERENCES `seat` (`seatid`),
  ADD CONSTRAINT `exbooking_fkseatid2` FOREIGN KEY (`seatid2`) REFERENCES `seat` (`seatid`),
  ADD CONSTRAINT `exbooking_fkseatid3` FOREIGN KEY (`seatid3`) REFERENCES `seat` (`seatid`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_fkadminid` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminid`),
  ADD CONSTRAINT `plan_fkcinemaid` FOREIGN KEY (`cinemaid`) REFERENCES `cinema` (`cinemaid`),
  ADD CONSTRAINT `plan_fkmovieid` FOREIGN KEY (`movieid`) REFERENCES `movie` (`movieid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
