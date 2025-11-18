-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2025 at 02:48 PM
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
-- Database: `tp_mvc25`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `name`, `nidn`, `phone`, `join_date`) VALUES
(1, 'Nisrina Safinatunnajah', '123456789', '081234567890', '2020-02-10'),
(2, 'Syifa Humeida Salsabila', '987654321', '082233445566', '2019-07-15'),
(3, 'Jasmine ', '567899876', '081889977665', '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_detail`
--

CREATE TABLE `dosen_detail` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `keahlian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen_detail`
--

INSERT INTO `dosen_detail` (`id`, `dosen_id`, `alamat`, `keahlian`) VALUES
(1, 1, 'Jl. Mawar No. 12, Bandung', 'Machine Learning'),
(2, 1, 'Jl. Melati No. 22, Cimahi', 'Data Mining'),
(3, 2, 'Jl. Durian No. 45, Jakarta', 'UI/UX Design'),
(4, 3, 'Jl. Kenanga No. 88, Surabaya', 'Network Security');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `nama_mk` varchar(150) DEFAULT NULL,
  `sks` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `dosen_id`, `nama_mk`, `sks`) VALUES
(1, 1, 'Kecerdasan Buatan', 3),
(2, 1, 'Analisis Data', 4),
(3, 2, 'Desain Antarmuka Pengguna', 3),
(4, 3, 'Keamanan Jaringan', 3),
(5, 3, 'Administrasi Server', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen_detail`
--
ALTER TABLE `dosen_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dosen_detail`
--
ALTER TABLE `dosen_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen_detail`
--
ALTER TABLE `dosen_detail`
  ADD CONSTRAINT `dosen_detail_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
