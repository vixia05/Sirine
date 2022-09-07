-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 02:19 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirine`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `np` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `np_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`np`, `np_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('admi', '2021-03-14 18:18:00', '$2y$10$4pd6brTJ9vV3hER1y1tJguFnkt9AVPZE9.B7ZkiBRrRt1uQ3aunoG', '2021-03-15 01:18:00', '2021-03-14 18:18:00', '2021-03-14 18:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `hvh`
--

CREATE TABLE `hvh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `np` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_verif` date NOT NULL,
  `jml_rim` int(11) NOT NULL,
  `lembur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jml_hvh`
--

CREATE TABLE `jml_hvh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_verif` date NOT NULL,
  `baik_verif` int(11) NOT NULL,
  `rusak_verif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_08_162958_create_profile_tables', 1),
(2, '2021_03_08_163044_create_hvh_tables', 1),
(3, '2021_03_08_163102_create_notification_tables', 1),
(4, '2021_03_08_163131_create_return_produk_tables', 1),
(5, '2021_03_08_163156_create_jml_hvh_tables', 1),
(6, '2021_03_11_140318_create_accounts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `np_post` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_post` date NOT NULL,
  `tgl_respon` date NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privillege` int(11) NOT NULL,
  `np_respon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `np` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `sub_bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_produk`
--

CREATE TABLE `return_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `np` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_cek` date NOT NULL,
  `blobor` int(11) DEFAULT NULL,
  `flooi` int(11) DEFAULT NULL,
  `tipis` int(11) DEFAULT NULL,
  `botak` int(11) DEFAULT NULL,
  `noda` int(11) DEFAULT NULL,
  `terlipat` int(11) DEFAULT NULL,
  `tercampur` int(11) DEFAULT NULL,
  `hologram` int(11) DEFAULT NULL,
  `Other` int(11) DEFAULT NULL,
  `Jml_lolos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `accounts_np_unique` (`np`);

--
-- Indexes for table `hvh`
--
ALTER TABLE `hvh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jml_hvh`
--
ALTER TABLE `jml_hvh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_produk`
--
ALTER TABLE `return_produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hvh`
--
ALTER TABLE `hvh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jml_hvh`
--
ALTER TABLE `jml_hvh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_produk`
--
ALTER TABLE `return_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
