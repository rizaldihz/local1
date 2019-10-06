-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 09:01 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrogas-hulu`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `wilayah_kerja_id` int(11) NOT NULL,
  `produksi_minyak` float DEFAULT NULL,
  `produksi_gas` float DEFAULT NULL,
  `fuel_gas` float DEFAULT NULL,
  `flare` float DEFAULT NULL,
  `injeksi_gas` float DEFAULT NULL,
  `produksi_air` float DEFAULT NULL,
  `injeksi_air` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `tanggal`, `wilayah_kerja_id`, `produksi_minyak`, `produksi_gas`, `fuel_gas`, `flare`, `injeksi_gas`, `produksi_air`, `injeksi_air`) VALUES
(4, '2019-09-14', 4, 0.01, 0.01, -0.01, -0.01, 0, -0.01, 0.02),
(5, '2019-09-14', 2, 0.01, 0.01, 0.02, -0.02, 0.02, 0.02, 0.02),
(6, '2019-09-14', 3, 0.02, -0.02, 0.03, 0.02, 0.02, 0.02, 0.03),
(7, '2019-09-14', 5, 0.02, 0.03, 0.03, 0.02, 0.03, 0.03, 0.02),
(8, '2019-09-14', 1, 123, 34, 3, 123, 314, 123, 123),
(9, '2019-09-15', 1, 1, 1, 1, 1, 1, 1, 1),
(10, '2019-09-15', 3, 1, 1, 1, 1, 1, 1, 1),
(11, '2019-09-01', 5, 3, 3, 3, 3, 3, 3, 3),
(12, '2019-09-09', 1, 5, 5, 5, 5, 5, 5, 5),
(13, '2019-09-26', 4, 111, 222, 444, 555, 666, 333, 777),
(14, '2019-09-26', 1, 12, 13, 15, 11, 17, 14, 19),
(15, '2019-09-25', 1, 400, 10, 110, 200, 157, 100, 178);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', NULL, '$2y$10$yneadKVFBFZN1mKAwhfNJ.5PSaHms0CPPOgLRQgC/qDI.9YuoG3Ti', NULL, '2019-09-12 01:49:18', '2019-09-12 01:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kerjas`
--

CREATE TABLE `wilayah_kerjas` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_kerjas`
--

INSERT INTO `wilayah_kerjas` (`id`, `nama`) VALUES
(1, 'Cepu'),
(2, 'Madura Offshore'),
(3, 'Kangean'),
(4, 'Ketapang'),
(5, 'WMO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah_kerjas`
--
ALTER TABLE `wilayah_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wilayah_kerjas`
--
ALTER TABLE `wilayah_kerjas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
