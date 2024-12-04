-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 03:51 AM
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
-- Database: `damai`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_laporan`
--

CREATE TABLE `data_laporan` (
  `kode_laporan` char(6) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `judul_laporan` enum('Kekerasan Fisik','Kekerasan Psikis/Emosional','Kekerasan Seksual','Kekerasan Ekonomi','Kekerasan Digital','Kekerasan Dalam Rumah Tangga (KDRT)','Kekerasan di Sekolah','Eksploitasi Anak','Kekerasan dalam Pengasuhan') NOT NULL,
  `deskripsi_laporan` varchar(255) NOT NULL,
  `deskripsi_data_korban` varchar(255) NOT NULL,
  `status` enum('belum','proses','selesai') NOT NULL,
  `tanggal_laporan` date NOT NULL DEFAULT current_timestamp(),
  `lokasi_kejadian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_laporan`
--

INSERT INTO `data_laporan` (`kode_laporan`, `id_user`, `id_kelurahan`, `judul_laporan`, `deskripsi_laporan`, `deskripsi_data_korban`, `status`, `tanggal_laporan`, `lokasi_kejadian`) VALUES
('LP0001', 4, 2, 'Kekerasan Fisik', 'blabla', 'ckanslck', 'belum', '2024-11-26', 'ckslacma'),
('LP0002', NULL, 0, 'Kekerasan Psikis/Emosional', 'blablaxascjkavbsureiuhbbscasnjknasojcoifjoeicjzxxsacdavdv', 'BUDI NGOK NGOK PASIR SARI', 'belum', '2024-11-26', 'degayu'),
('LP0003', 0, 2, 'Kekerasan Fisik', 'blabla', 'BUDI NGOK NGOK PASIR SARI', 'belum', '2024-11-26', ''),
('LP0004', 0, 2, 'Kekerasan Fisik', 'blabla', 'ckanslck', 'belum', '2024-11-26', 'KRATON');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`, `created_at`) VALUES
(2, 'Kelurahan Degayu', '2024-11-26'),
(3, 'Kelurahan Tirto', '2024-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `pelayanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `id_penugasan` int(11) NOT NULL,
  `kode_laporan` char(6) NOT NULL,
  `tanggal_penugasan` date NOT NULL,
  `petugas_penugasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progres_laporan`
--

CREATE TABLE `progres_laporan` (
  `id_progres` int(11) NOT NULL,
  `kode_laporan` char(6) NOT NULL,
  `ditangani_oleh` enum('kelurahan','dpmppa') NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('masyarakat','kelurahan','dpmppa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(4, 'Rina', 'rinams', '$2y$10$qfA2sfbDmjeePmxWVZoUQOuK3lYQmKJoBFYuCFyNmPSJdSPxBdKkW', 'masyarakat'),
(5, 'DPMPPA', 'admin_dpmppa', '$2y$10$/Q5LIL1ZKL7CQRf/L6ApQuoDLvAJZEwMTKl4mq1p8iF.zcatZcV82', 'dpmppa'),
(6, 'Degayu', 'admin_degayu', '$2y$10$kvBzm82HUgl4ay7A2SCn8e1oPzAUCElnCjISkAjM5hUXiUvUJN5Z6', 'kelurahan'),
(7, 'Budi', 'buto', '$2y$10$QE8bB89Spe4Hkc9QQ4UXJ.T1eWD8jA2/uzOUu4vgLux6efCMn1Sia', 'masyarakat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_laporan`
--
ALTER TABLE `data_laporan`
  ADD PRIMARY KEY (`kode_laporan`),
  ADD KEY `data_laporan_ibfk_1` (`id_kelurahan`),
  ADD KEY `data_laporan_ibfk_2` (`id_user`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indexes for table `progres_laporan`
--
ALTER TABLE `progres_laporan`
  ADD PRIMARY KEY (`id_progres`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_laporan` (`kode_laporan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progres_laporan`
--
ALTER TABLE `progres_laporan`
  MODIFY `id_progres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `progres_laporan`
--
ALTER TABLE `progres_laporan`
  ADD CONSTRAINT `progres_laporan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `pelayanan` (`id_pelayanan`),
  ADD CONSTRAINT `progres_laporan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `progres_laporan_ibfk_3` FOREIGN KEY (`kode_laporan`) REFERENCES `data_laporan` (`kode_laporan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
