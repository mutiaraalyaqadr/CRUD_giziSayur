-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2024 at 03:36 PM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prokommy_mutia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gizi`
--

CREATE TABLE `tb_gizi` (
  `no` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `sayur` varchar(100) DEFAULT NULL,
  `air` int(11) DEFAULT NULL,
  `protein` int(11) DEFAULT NULL,
  `lemak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_gizi`
--

INSERT INTO `tb_gizi` (`no`, `kode`, `sayur`, `air`, `protein`, `lemak`) VALUES
(25, 'KG-0031', 'Jagung1', 751, 91, 21),
(26, 'KG-004', 'Bayam', 92, 3, 1),
(28, 'KG-005', 'Kol', 91, 2, 1),
(30, 'KG-006', 'Brokoli', 90, 3, 1),
(36, 'KG-007', 'Kentang', 80, 2, 1),
(37, 'KG-008', 'Wortel', 88, 1, 1),
(38, 'KG-009', 'Timun', 95, 1, 1),
(39, 'KG-010', 'Labu', 91, 1, 1),
(40, 'KG-011', 'Tomat', 94, 1, 1),
(41, 'KG-012', 'Buncis', 90, 2, 1),
(42, 'KG-013', 'Oyong', 92, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gizi`
--
ALTER TABLE `tb_gizi`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gizi`
--
ALTER TABLE `tb_gizi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
