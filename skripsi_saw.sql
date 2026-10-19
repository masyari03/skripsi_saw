-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 08:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `nip`) VALUES
(2, 'Difa', '2017'),
(7, 'Nina', '2022'),
(8, 'Misha', '2019'),
(9, 'Althaf', '2000'),
(10, 'Bagas', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_saw`
--

CREATE TABLE `hasil_saw` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nilai_akhir` decimal(5,4) DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_saw`
--

INSERT INTO `hasil_saw` (`id`, `id_guru`, `nilai_akhir`, `peringkat`) VALUES
(212, 2, 0.9700, 1),
(213, 9, 0.8900, 2),
(214, 7, 0.8500, 3),
(215, 10, 0.8100, 4),
(216, 8, 0.7300, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `bobot`) VALUES
(1, 'Nilai Kehadiran', 0.40),
(2, 'Nilai Penyampaian Metode Ummi', 0.20),
(3, 'Nilai 7 Tahapan Pembelajaran', 0.15),
(4, 'Nilai Kreativitas Mengajar', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_penilai` int(11) NOT NULL,
  `nilai` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_guru`, `id_kriteria`, `id_penilai`, `nilai`) VALUES
(58, 2, 1, 5, 1.00),
(59, 2, 2, 5, 1.00),
(60, 2, 3, 5, 0.80),
(61, 2, 4, 5, 1.00),
(62, 7, 1, 5, 0.80),
(63, 7, 2, 5, 0.80),
(64, 7, 3, 5, 0.80),
(65, 7, 4, 5, 1.00),
(66, 8, 1, 5, 0.60),
(67, 8, 2, 5, 0.60),
(68, 8, 3, 5, 0.80),
(69, 8, 4, 5, 1.00),
(70, 9, 1, 5, 0.80),
(71, 9, 2, 5, 1.00),
(72, 9, 3, 5, 0.80),
(73, 9, 4, 5, 1.00),
(74, 10, 1, 5, 0.80),
(75, 10, 2, 5, 0.60),
(76, 10, 3, 5, 0.80),
(77, 10, 4, 5, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `role` enum('admin','penilai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'admin', '5d53fc42d3f239c75fafd191268bab62a99f9d9b77930341177cb63d19a95655', 'Asyari arif', 'admin'),
(5, 'arif', '6120fde48703c282a459c7bdb841fde98a1972b2648c35f23266411c175cf9ff', 'arif yusuf', 'penilai'),
(9, 'difa', '6120fde48703c282a459c7bdb841fde98a1972b2648c35f23266411c175cf9ff', 'nadzifa ifti', 'penilai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_saw`
--
ALTER TABLE `hasil_saw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_saw_ibfk_1` (`id_guru`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `penilaian_ibfk_3` (`id_penilai`),
  ADD KEY `penilaian_ibfk_1` (`id_guru`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hasil_saw`
--
ALTER TABLE `hasil_saw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_saw`
--
ALTER TABLE `hasil_saw`
  ADD CONSTRAINT `hasil_saw_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`),
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_penilai`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
