-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 01:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment-ttsoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `HN` int(6) NOT NULL,
  `FNAME` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `TEL` varchar(10) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Information of patients';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`HN`, `FNAME`, `LNAME`, `TEL`, `EMAIL`) VALUES
(1, '้เกียรติสกุล', 'ไชยเสน', '0912345678', 'kiatsakul.pa@ku.th'),
(2, 'ทวีศักดิ์', 'สีอังรัตน์', '0912345678', 'thaweesak.se@ku.th'),
(3, 'ทินวุฒ', 'พลบำรุง', '0876543210', 'thinnawut.p@ku.th'),
(4, 'พีระพงษ์', 'เทพประสิทธิ์', '0812345678', 'peeraphong.te@ku.th'),
(5, 'พิมพ์ญาดา', 'โพชะจา', '0923456789', 'peeraya.ph@ku.th'),
(6, 'วัชรากร', 'เครือเนตร', '0865432109', 'wacharakorn.k@ku.th'),
(7, 'ปรัชชฎางค์กรณ์', 'แก้วมณีโชติ', '0976543210', 'pratchadangkorn.k@ku.th');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`HN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `HN` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
