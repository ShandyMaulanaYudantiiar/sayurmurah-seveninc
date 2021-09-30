-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 12:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sayurmurah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `nama` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` int(11) NOT NULL COMMENT '0= SuperAdmin, 1= Admin, 2= User, 3= Mitra',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0= Tidak Aktif, 1= Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `foto`, `telepon`, `password`, `akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Andrea Santana Adzani', 'andreasterben69@gmail.com', '20210922043015.png', '085257423236', '$2y$10$NPSrKv3/v4iDfjhaqpCbn.fLD/HLSd.C53pCARfYk.rYPsgwqcj0.', 0, 1, '2028-08-15 12:56:55', '2028-08-15 12:56:55'),
(2, 'Dimas Fajrul F', 'dimas@gmail.com', '20210922043156.png', '085257423236', '$2y$10$z9qOsJie/Y20i7Nz0O9N3OTJOFiU4mh2Gy55N.IPOofdDEGU0gJLC', 0, 0, '2028-08-15 12:59:16', '2028-08-15 12:59:16'),
(3, 'qqq', 'qqq@gmail.com', '20210924010605.png', '085257423236', '$2y$10$.5VGj3lbaJDgQfdLCIRgiuoTgZxpq8fNcJGXXOXlrws7WI6TD9o6C', 0, 1, '2028-09-07 07:30:05', '2028-09-07 07:30:05'),
(4, 'Adinda Firania', 'dinda@gmail.com', '20210925021600.png', '085257423236', '$2y$10$Rq6YajM0WKIoEgjNnhBAiumSacXmT45nGW4rrVvUrTpYYjRE/uj0y', 0, 1, '2028-09-19 00:20:00', '2028-09-19 00:20:00'),
(5, 'aaa', 'aaa@gmail.com', '20210927101117.jpeg', '085257423236', '$2y$10$eFTylmIxEONtySJ9TeejFuTqhkFzgeD4fonFwbsivnKjryQNgzsVq', 0, 1, '2028-10-13 01:58:37', '2028-10-13 01:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `akun_models`
--

CREATE TABLE `akun_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id_daerah` bigint(20) UNSIGNED NOT NULL,
  `nama_daerah` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pasar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`id_daerah`, `nama_daerah`, `jumlah_pasar`, `created_at`, `updated_at`) VALUES
(1, 'qqq', 2, '2021-09-22 22:18:29', '2021-09-22 22:18:29'),
(2, 'aaa', 23, '2021-09-24 20:00:32', '2021-09-24 20:00:32'),
(3, 'sss', 4, '2021-09-27 00:20:07', '2021-09-27 00:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` bigint(20) UNSIGNED NOT NULL,
  `jenis_produk` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_jenis_produk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_jenis_produk` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `jenis_produk`, `deskripsi_jenis_produk`, `foto_jenis_produk`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'asdasd', '20210923050855.png', '2028-08-27 04:54:15', '2028-08-27 04:54:15'),
(3, 'aaaq', 'asda', '20210927095053.jpeg', '2028-10-13 00:17:33', '2028-10-13 00:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_09_13_071026_create_admin_table', 1),
(3, '2021_09_13_072818_create_daerah_table', 1),
(4, '2021_09_13_073005_create_detail_transaksi_table', 1),
(5, '2021_09_13_073251_create_jenis_produk_table', 1),
(6, '2021_09_13_073543_create_pasar_table', 1),
(7, '2021_09_13_074118_create_produk_table', 1),
(8, '2021_09_13_074505_create_status_transaksi_table', 1),
(9, '2021_09_13_074645_create_transaksi_table', 1),
(10, '2021_09_13_075218_create_user_table', 1),
(11, '2021_09_21_032945_create_akun_models_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasar`
--

CREATE TABLE `pasar` (
  `id_pasar` int(11) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `nama_pasar` varchar(50) NOT NULL,
  `alamat_pasar` text NOT NULL,
  `foto_pasar` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasar`
--

INSERT INTO `pasar` (`id_pasar`, `id_daerah`, `nama_pasar`, `alamat_pasar`, `foto_pasar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pasar Beringharjo', 'Jl. Pabringan No. 1', 'face-22.jpg', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(2, 1, 'Pasar Kranggan', 'Jl. Pangeran Diponegoro', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(3, 1, 'Pasar Gading', 'Jl. Mayjend. D.I Panjaitan, Yogyakarta', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(4, 1, 'Pasar Sentul', 'Jl. Sultan Agung Pakualaman', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(5, 1, 'Pasar Pace/Semaki', 'Jl. Kusumanegara, Semaki, Umbulharjo.', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(6, 1, 'Pasar Demangan', 'Jl. Gejayan No. 28 Demangan Sleman', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(7, 1, 'Pasar Condongcatur Yogyakarta', 'Jl Ringroad Utara, condongcatur, Sleman', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(8, 1, 'Pasar Colombo Yogyakarta', 'Jl Kaliurang Km.7 Yogyakarta', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00'),
(9, 1, 'Pasar Gedongkuning Yogyakarta', 'Jl. Kusumanegara, Umbulharjo, Yogyakarta Wilayah UPT Kotagede', '', '2021-09-21 03:40:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `nama_produk` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `satuan` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_produk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_pasar`, `nama_produk`, `id_jenis_produk`, `harga_produk`, `satuan`, `deskripsi_produk`, `foto_produk`, `created_at`, `updated_at`) VALUES
(1, 1, 'aaa', 1, 10000, 'kilogram', 'asdasdad', '20210923033849.png', '2021-09-22 20:38:49', '2021-09-22 20:38:49'),
(3, 1, 'xxx', 2, 2000, 'kilogram', 'zzzz', '20210927074942.png', '2028-10-12 18:42:22', '2028-10-12 18:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_status_transaksi` bigint(20) UNSIGNED NOT NULL,
  `status_transaksi` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_user` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengiriman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `total_kembali` int(11) NOT NULL,
  `bukti_bayar` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_user` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD KEY `admin_id_admin_index` (`id_admin`);

--
-- Indexes for table `akun_models`
--
ALTER TABLE `akun_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id_daerah`),
  ADD UNIQUE KEY `daerah_nama_daerah_unique` (`nama_daerah`),
  ADD KEY `daerah_id_daerah_index` (`id_daerah`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `detail_transaksi_id_detail_transaksi_index` (`id_detail_transaksi`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`),
  ADD UNIQUE KEY `jenis_produk_jenis_produk_unique` (`jenis_produk`),
  ADD KEY `jenis_produk_id_jenis_produk_index` (`id_jenis_produk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id_status_transaksi`),
  ADD KEY `status_transaksi_id_status_transaksi_index` (`id_status_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_transaksi_index` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `akun_models`
--
ALTER TABLE `akun_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daerah`
--
ALTER TABLE `daerah`
  MODIFY `id_daerah` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pasar`
--
ALTER TABLE `pasar`
  MODIFY `id_pasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id_status_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
