-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 01:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pullahta`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_27_021211_create_opd_table', 2),
(5, '2021_04_27_021701_create_opd_file_table', 3),
(6, '2021_04_28_062343_add_role_username_user_table', 4),
(7, '2021_04_29_030547_add_column_opd_file', 5),
(8, '2021_04_30_041552_add_created_by_opd_file', 6);

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_opd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id`, `nama_opd`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'SETDA', NULL, '2021-04-27 21:07:23', '2021-04-27 21:07:23'),
(3, 'SETWAN', NULL, '2021-04-27 21:16:19', '2021-04-27 21:16:19'),
(4, 'Diskominfo', NULL, '2021-04-27 21:21:42', '2021-04-27 21:21:42'),
(5, 'RSUD', NULL, '2021-04-27 22:37:43', '2021-04-27 22:37:43'),
(8, 'Dinas Pendidikan', NULL, '2021-04-29 00:29:37', '2021-04-29 00:29:37'),
(9, 'Badan Perencanaan Pembangunan Daerah', NULL, '2021-04-29 00:30:10', '2021-04-29 00:30:10'),
(10, 'Dinas Kebudayaan, Pemuda dan Olahraga', NULL, '2021-04-29 00:30:11', '2021-04-29 00:30:11'),
(11, 'Dinas Pemberdayaan Masyarakat dan Desa', NULL, '2021-04-29 00:30:49', '2021-04-29 00:30:49'),
(12, 'Dinas Kependudukan dan Pencatatan Sipil', NULL, '2021-04-29 00:31:11', '2021-04-29 00:31:11'),
(13, 'Dinas Perpustakaan dan Kearsipan', NULL, '2021-04-29 00:31:48', '2021-04-29 00:31:48'),
(14, 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Lingkungan Hidup', NULL, '2021-04-29 00:31:49', '2021-04-29 00:31:49'),
(15, 'Dinas Perhubungan', NULL, '2021-04-29 00:32:10', '2021-04-29 00:32:10'),
(16, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', NULL, '2021-04-29 00:32:20', '2021-04-29 00:32:20'),
(17, 'Dinas Kesehatan', NULL, '2021-04-29 00:32:33', '2021-04-29 00:32:33'),
(18, 'Dinas Pekerjaan Umum, Penataan Ruang, dan Pertanahan', NULL, '2021-04-29 00:33:11', '2021-04-29 00:33:11'),
(19, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', NULL, '2021-04-29 00:33:14', '2021-04-29 00:33:14'),
(20, 'Dinas Sosial', NULL, '2021-04-29 00:33:32', '2021-04-29 00:33:32'),
(21, 'Dinas Pariwisata', NULL, '2021-04-29 00:33:34', '2021-04-29 00:33:34'),
(22, 'Inspektorat', NULL, '2021-04-29 00:33:48', '2021-04-29 00:33:48'),
(23, 'Satpol PP', NULL, '2021-04-29 00:34:00', '2021-04-29 00:34:00'),
(24, 'Dinas Peternakan dan Perikanan', NULL, '2021-04-29 00:34:03', '2021-04-29 00:34:03'),
(25, 'Kesbangpol', NULL, '2021-04-29 00:34:20', '2021-04-29 00:34:20'),
(26, 'Dinas Pertanian dan Ketahanan Pangan', NULL, '2021-04-29 00:34:36', '2021-04-29 00:34:36'),
(27, 'Dinas Perdagangan dan Koperasi, Usaha Kecil dan Menengah', NULL, '2021-04-29 00:34:48', '2021-04-29 00:34:48'),
(28, 'Dinas Tenaga Kerja', NULL, '2021-04-29 00:35:02', '2021-04-29 00:35:02'),
(29, 'Badan Pengelola Keuangan Daerah', NULL, '2021-04-29 00:35:07', '2021-04-29 00:35:07'),
(30, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', NULL, '2021-04-29 00:35:55', '2021-04-29 00:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `opd_file`
--

CREATE TABLE `opd_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opd_file`
--

INSERT INTO `opd_file` (`id`, `opd_id`, `judul`, `file`, `deleted_at`, `created_at`, `updated_at`, `email`, `keterangan`, `created_by`) VALUES
(2, 4, 'XYZ', 'examplejs.xlsx-1619589940.xlsx', NULL, '2021-04-27 23:05:40', '2021-04-27 23:05:40', NULL, NULL, NULL),
(3, 4, 'XYA', 'examplejs.xlsx-1619665696.xlsx', NULL, '2021-04-28 20:08:16', '2021-04-28 20:08:16', NULL, NULL, NULL),
(4, 4, 'YUA', 'examplejs.xlsx-1619665893.xlsx', NULL, '2021-04-28 20:11:33', '2021-04-28 20:11:33', NULL, NULL, NULL),
(5, 2, 'XYZ', 'examplejs.xlsx-1619680559.xlsx', NULL, '2021-04-29 00:15:59', '2021-04-29 00:15:59', NULL, NULL, NULL),
(6, 3, 'EYS', 'examplejs.xlsx-1619752742.xlsx', NULL, '2021-04-29 20:19:02', '2021-04-29 20:19:02', NULL, NULL, NULL),
(7, 2, 'Produk Hukum 2020 - 2021', 'DAFTAR TABEL PORTAL DATA.xlsx-1619753298.xlsx', NULL, '2021-04-29 20:28:18', '2021-04-29 20:28:18', NULL, NULL, NULL),
(8, 8, 'Jumlah Guru Honorer Tahun 2021', 'Judul Tabel Lengkap.xlsx-1619753410.xlsx', NULL, '2021-04-29 20:30:11', '2021-04-29 20:30:11', NULL, NULL, NULL),
(9, 17, 'Jumlah Fasilitas Kesehatan Tahun 2020', 'examplejs.xlsx-1619753474.xlsx', NULL, '2021-04-29 20:31:14', '2021-04-29 20:31:14', NULL, NULL, NULL),
(10, 8, 'Jumlah Guru Honorer Tahun 2021', 'document-diskominfo-8.xlsx-1619753647.xlsx', NULL, '2021-04-29 20:34:07', '2021-04-29 20:34:07', NULL, NULL, NULL),
(11, 21, 'Jumlah Hotel Ciamis Tahun 2025', 'examplejs.xlsx-1619754800.xlsx', NULL, '2021-04-29 20:53:20', '2021-04-29 20:53:20', NULL, NULL, NULL),
(12, 21, 'Jumlah Hotel Ciamis Tahun 2025', 'document-diskominfo-11.xlsx-1619754974.xlsx', NULL, '2021-04-29 20:56:14', '2021-04-29 20:56:14', NULL, NULL, NULL),
(13, 17, 'PDF', 'Kelompok Data.pdf-1619756056.pdf', NULL, '2021-04-29 21:14:16', '2021-04-29 21:14:16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `username`) VALUES
(1, 'administrator', 'admin@gmail.com', NULL, '$2y$10$jwtTqB52QTzvf34diRNcxuL.2le6b8OQPCVWX.EjfuQsp5HOvycZ6', NULL, NULL, NULL, 'admin', 'admin'),
(2, 'user1', 'user1@gmail.com', NULL, '$2y$10$jwtTqB52QTzvf34diRNcxuL.2le6b8OQPCVWX.EjfuQsp5HOvycZ6', NULL, NULL, NULL, 'opd', 'user1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_file`
--
ALTER TABLE `opd_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `opd_file`
--
ALTER TABLE `opd_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
