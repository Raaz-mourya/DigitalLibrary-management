-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 12:32 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `email` varchar(110) NOT NULL,
  `Pass` varchar(110) NOT NULL,
  `type` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `email`, `Pass`, `type`) VALUES
(1, 'Admin@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `bookpic` varchar(30) NOT NULL,
  `bookname` varchar(30) NOT NULL,
  `bookdetail` varchar(30) NOT NULL,
  `bookauthor` varchar(30) NOT NULL,
  `bookpub` varchar(30) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `bookprice` int(10) NOT NULL,
  `bookquantity` int(10) NOT NULL,
  `bookava` int(10) NOT NULL,
  `bookrent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `bookpic`, `bookname`, `bookdetail`, `bookauthor`, `bookpub`, `branch`, `bookprice`, `bookquantity`, `bookava`, `bookrent`) VALUES
(2, 'cs.jpeg', 'Computer Science', 'Fundamentals of cs', 'James', 'Jyoti', 'it', 399, 12, 12, 0),
(3, 'electrical.jpeg', 'Honey comb', 'english reader', 'Naveen', 'Madhur', 'civil', 199, 8, 4, 4),
(4, 'cs.jpeg', 'Computer Science', 'Fundamentals of cs', 'James', 'Jyoti', 'it', 499, 6, 0, 6),
(5, 'pyhton.jpeg', 'Pyhton', 'Beginner', 'edison', 'bhim', 'it', 349, 12, 9, 3),
(6, 'electrical.jpeg', 'Electrical', 'basic', 'thomson', 'amar', 'ec', 799, 2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `id` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `issuename` varchar(50) NOT NULL,
  `issuebook` varchar(50) NOT NULL,
  `issuetype` varchar(50) NOT NULL,
  `issuedays` int(20) NOT NULL,
  `issuedate` varchar(50) NOT NULL,
  `issuereturn` varchar(50) NOT NULL,
  `fine` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`id`, `userid`, `issuename`, `issuebook`, `issuetype`, `issuedays`, `issuedate`, `issuereturn`, `fine`) VALUES
(1, 10, 'Ritik', 'Computer Science', 'student', 15, '22/03/2023', '06/04/2023', 0),
(12, 10, 'Ritik', 'Computer Science', 'student', 12, '23/03/2023', '04/04/2023', 0),
(13, 9, 'Raj Singh', 'Pyhton', 'student', 7, '23/03/2023', '30/03/2023', 0),
(14, 9, 'Raj Singh', 'Honey comb', 'student', 7, '23/03/2023', '30/03/2023', 0),
(15, 9, 'Raj Singh', 'Computer Science', 'student', 7, '23/03/2023', '30/03/2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requestbook`
--

CREATE TABLE `requestbook` (
  `id` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `bookid` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `issuedays` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestbook`
--

INSERT INTO `requestbook` (`id`, `userid`, `bookid`, `username`, `usertype`, `bookname`, `issuedays`) VALUES
(10, 9, 5, 'Raj Singh', 'student', 'Pyhton', 7);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `pass`, `type`) VALUES
(9, 'Raj Singh', 'raj@gmail.com', '123', 'student'),
(10, 'Ritik', 'ritik@gmail.com', '123', 'student'),
(11, 'Naveen', 'naveen@gmail.com', '123', 'student'),
(12, 'Manish', 'manish@gmail.com', '123', 'student'),
(14, 'Vikas Sir', 'Admin@gmail.com', '123', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestbook`
--
ALTER TABLE `requestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requestbook`
--
ALTER TABLE `requestbook`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
