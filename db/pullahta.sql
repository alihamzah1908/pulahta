-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2022 pada 08.11
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

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
-- Struktur dari tabel `ckanapi`
--

CREATE TABLE `ckanapi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_data` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ckanapi`
--

INSERT INTO `ckanapi` (`id`, `jumlah_data`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'sukses', '', '2021-06-24 21:01:50', '2021-06-24 21:01:50'),
(2, 1, 'sukses', '', '2021-06-24 21:11:48', '2021-06-24 21:11:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evidence`
--

CREATE TABLE `evidence` (
  `id` int(11) NOT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `dataset_file_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `evidence`
--

INSERT INTO `evidence` (`id`, `opd_id`, `dataset_file_id`, `file`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(1, 9, 128, '1641868258.xlsx', '2022-01-10 19:30:58', '2022-01-11 02:30:58', NULL, NULL),
(2, 9, 128, '1641868349.jpg', '2022-01-10 19:32:29', '2022-01-11 02:32:29', NULL, NULL),
(3, 35, 131, '1642130051.txt', '2022-01-13 20:14:11', '2022-01-14 03:14:11', NULL, NULL),
(4, 35, 131, '1642130313.txt', '2022-01-13 20:18:33', '2022-01-14 03:18:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `metadata_file`
--

CREATE TABLE `metadata_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opd_file_id` int(11) DEFAULT NULL,
  `nama_field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegunaan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `metadata_file`
--

INSERT INTO `metadata_file` (`id`, `opd_file_id`, `nama_field`, `tipe`, `label`, `kegunaan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 33, NULL, 'numeric', 'tahun', 'Tahun merupakan satuan dari waktu.', NULL, '2021-06-24 20:16:39', '2021-06-24 20:16:39'),
(8, 33, NULL, 'numeric', 'IPM', 'IPM adalah Indeks yang mengukur pembangunan manusia dari tiga aspek dasar yaitu umur panjang dan hidup sehat, pengetahuan, dan standar hidup layak.', NULL, '2021-06-24 20:16:39', '2021-06-24 20:16:39'),
(9, 34, NULL, 'numeric', 'Tahun', 'Tahun merupakan satuan dari waktu.', NULL, '2021-06-24 20:56:46', '2021-06-24 20:56:46'),
(10, 34, NULL, 'numeric', 'IPM', 'IPM adalah Indeks yang mengukur pembangunan manusia dari tiga aspek dasar yaitu umur panjang dan hidup sehat, pengetahuan, dan standar hidup layak.', NULL, '2021-06-24 20:56:46', '2021-06-24 20:56:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `opd_file_id` int(11) DEFAULT NULL,
  `is_read` int(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `opd_id`, `opd_file_id`, `is_read`, `created_by`, `created_at`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 9, 95, 0, 4, '2021-12-20 06:15:40', '2021-12-20 06:15:40', NULL, NULL),
(2, 9, 96, 0, 4, '2021-12-20 06:18:13', '2021-12-20 06:18:13', NULL, NULL),
(3, 9, 97, 0, 4, '2021-12-20 06:20:30', '2021-12-20 06:20:30', NULL, NULL),
(4, 9, 98, 0, 4, '2021-12-20 06:21:06', '2021-12-20 06:21:06', NULL, NULL),
(5, 9, 99, 0, 4, '2021-12-20 06:31:42', '2021-12-20 06:31:42', NULL, NULL),
(6, 9, 100, 0, 4, '2021-12-20 06:33:36', '2021-12-20 06:33:36', NULL, NULL),
(7, 9, 101, 0, 4, '2021-12-20 06:40:01', '2021-12-20 06:40:01', NULL, NULL),
(8, 9, 102, 0, 4, '2021-12-20 06:41:30', '2021-12-20 06:41:30', NULL, NULL),
(9, 9, 103, 0, 4, '2021-12-20 06:42:07', '2021-12-20 06:42:07', NULL, NULL),
(10, 5, 104, 1, 4, '2021-12-22 01:11:36', '2021-12-22 01:11:59', NULL, NULL),
(11, 5, 105, 1, 4, '2022-01-03 03:22:29', '2022-01-05 04:51:44', NULL, NULL),
(12, 5, 106, 1, 4, '2022-01-03 07:18:15', '2022-01-05 04:51:41', NULL, NULL),
(13, 5, 107, 1, 4, '2022-01-03 07:47:37', '2022-01-10 01:33:57', NULL, NULL),
(14, 9, 108, 1, 4, '2022-01-04 02:50:30', '2022-01-04 02:52:35', NULL, NULL),
(15, 9, 109, 0, 19, '2022-01-04 03:03:38', '2022-01-04 03:03:38', NULL, NULL),
(16, 9, 110, 1, 19, '2022-01-04 03:16:58', '2022-01-04 03:40:01', NULL, NULL),
(17, 9, 111, 0, 19, '2022-01-04 03:19:42', '2022-01-04 03:19:42', NULL, NULL),
(18, 9, 112, 0, 19, '2022-01-04 03:37:45', '2022-01-04 03:37:45', NULL, NULL),
(19, 9, 113, 0, 4, '2022-01-05 03:16:00', '2022-01-05 03:16:00', NULL, NULL),
(20, 35, 114, 1, 4, '2022-01-05 04:45:14', '2022-01-05 04:45:33', NULL, NULL),
(21, 35, 115, 1, 29, '2022-01-05 04:46:51', '2022-01-05 04:49:19', NULL, NULL),
(22, 35, 116, 1, 4, '2022-01-05 04:50:44', '2022-01-05 04:50:53', NULL, NULL),
(23, 35, 117, 1, 29, '2022-01-05 04:52:37', '2022-01-05 04:52:44', NULL, NULL),
(24, 35, 118, 1, 4, '2022-01-05 04:55:19', '2022-01-05 04:56:33', NULL, NULL),
(25, 35, 119, 1, 29, '2022-01-05 04:56:13', '2022-01-05 04:57:16', NULL, NULL),
(26, 5, 120, 1, 43, '2022-01-10 01:33:25', '2022-01-10 01:34:13', NULL, NULL),
(27, 9, 121, 1, 4, '2022-01-10 01:42:42', '2022-01-11 01:44:42', NULL, NULL),
(28, 9, 122, 1, 4, '2022-01-11 01:47:56', '2022-01-11 01:48:12', NULL, NULL),
(29, 9, 123, 1, 4, '2022-01-11 01:50:40', '2022-01-11 01:53:13', NULL, NULL),
(30, 9, 124, 1, 4, '2022-01-11 01:53:54', '2022-01-14 14:01:18', NULL, NULL),
(31, 9, 125, 1, 19, '2022-01-11 02:06:00', '2022-01-11 02:06:35', NULL, NULL),
(32, 9, 126, 1, 4, '2022-01-11 02:12:44', '2022-01-14 14:01:42', NULL, NULL),
(33, 9, 127, 1, 4, '2022-01-11 02:27:16', '2022-01-14 14:01:05', NULL, NULL),
(34, 9, 128, 1, 19, '2022-01-11 02:28:37', '2022-01-11 02:28:45', NULL, NULL),
(35, 35, 129, 1, 29, '2022-01-13 01:26:00', '2022-01-14 14:01:37', NULL, NULL),
(36, 35, 130, 1, 4, '2022-01-13 01:40:01', '2022-01-13 01:50:32', NULL, NULL),
(37, 35, 131, 1, 29, '2022-01-14 02:37:36', '2022-01-14 14:01:29', NULL, NULL),
(38, 28, 132, 1, 33, '2022-01-14 14:06:46', '2022-01-14 14:07:01', NULL, NULL),
(39, 9, 133, 1, 19, '2022-01-14 14:09:52', '2022-01-14 14:10:01', NULL, NULL),
(40, 41, 134, 1, 47, '2022-01-14 14:17:28', '2022-01-14 14:17:37', NULL, NULL),
(41, 5, 135, 0, 4, '2022-02-03 00:55:56', '2022-02-03 00:55:56', NULL, NULL),
(42, 5, 136, 0, 4, '2022-02-03 00:56:11', '2022-02-03 00:56:11', NULL, NULL),
(43, 5, 137, 0, 4, '2022-02-03 03:52:39', '2022-02-03 03:52:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd`
--

CREATE TABLE `opd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_opd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias_opd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `opd`
--

INSERT INTO `opd` (`id`, `nama_opd`, `alias_opd`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Rumah Sakit Umum Daerah Ciamis', 'RSUD', NULL, '2021-04-27 15:37:43', '2021-06-01 18:54:24'),
(9, 'Badan Perencanaan Pembangunan Daerah', 'BAPPEDA', NULL, '2021-04-28 17:30:10', '2021-06-01 19:00:54'),
(10, 'Dinas Kebudayaan, Pemuda dan Olahraga', 'DISBUDPORA', NULL, '2021-04-28 17:30:11', '2021-06-01 19:05:33'),
(12, 'Dinas Kependudukan dan Pencatatan Sipil', 'DISDUKCAPIL', NULL, '2021-04-28 17:31:11', '2021-06-01 19:05:20'),
(13, 'Dinas Perpustakaan dan Kearsipan', 'DISPUSIP', NULL, '2021-04-28 17:31:48', '2021-06-01 19:05:01'),
(14, 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Lingkungan Hidup', 'DPRKPLH', NULL, '2021-04-28 17:31:49', '2021-06-01 19:03:55'),
(15, 'Dinas Perhubungan', 'DISHUB', NULL, '2021-04-28 17:32:10', '2021-06-01 19:03:44'),
(16, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'BKPSDM', NULL, '2021-04-28 17:32:20', '2021-06-01 19:03:39'),
(18, 'Dinas Pekerjaan Umum, Penataan Ruang, dan Pertanahan', 'PUPRP', NULL, '2021-04-28 17:33:11', '2021-06-01 19:03:30'),
(19, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'DPPKBPPPA', NULL, '2021-04-28 17:33:14', '2021-06-01 19:03:16'),
(20, 'Dinas Sosial', 'DINSOS', NULL, '2021-04-28 17:33:32', '2021-06-01 19:02:23'),
(22, 'Inspektorat', 'INSPEKTORAT', NULL, '2021-04-28 17:33:48', '2021-06-01 19:01:30'),
(23, 'Satuan Polisi Pamong Praja', 'SATPOLPP', NULL, '2021-04-28 17:34:00', '2021-06-01 19:01:11'),
(24, 'Dinas Peternakan dan Perikanan', 'DISNAKAN', NULL, '2021-04-28 17:34:03', '2021-06-01 19:00:39'),
(26, 'Dinas Pertanian dan Ketahanan Pangan', 'DISPERTA', NULL, '2021-04-28 17:34:36', '2021-06-01 18:56:45'),
(27, 'Dinas Perdagangan dan Koperasi, Usaha Kecil dan Menengah', 'DKUKMP', NULL, '2021-04-28 17:34:48', '2021-06-01 19:00:07'),
(28, 'Dinas Tenaga Kerja', 'DISNAKER', NULL, '2021-04-28 17:35:02', '2021-06-01 18:59:51'),
(29, 'Badan Pengelola Keuangan Daerah', 'BPKD', NULL, '2021-04-28 17:35:07', '2021-06-01 18:59:27'),
(30, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'DPMPTSP', NULL, '2021-04-28 17:35:55', '2021-06-01 18:59:08'),
(31, 'Dinas Kesehatan', 'DINKES', NULL, '2021-05-10 18:56:07', '2021-06-01 18:54:06'),
(32, 'Dinas Pariwisata', 'DISPAR', NULL, '2021-05-10 18:56:32', '2021-06-01 18:58:55'),
(33, 'Dinas Pemberdayaan Masyarakat dan Desa', 'DPMD', NULL, '2021-05-10 18:56:59', '2021-06-01 18:58:44'),
(34, 'Dinas Pendidikan', 'DISDIK', NULL, '2021-05-10 18:57:27', '2021-06-01 18:58:34'),
(35, 'Dinas Komunikasi dan Informatika', 'DISKOMINFO', NULL, '2021-05-10 18:58:07', '2021-06-01 18:58:22'),
(36, 'Badan Kesatuan Bangsa dan Politik', 'KESBANGPOL', NULL, '2021-05-10 18:58:51', '2021-06-01 18:57:14'),
(37, 'Sekretariat Daerah', 'SETDA', NULL, '2021-05-10 19:00:29', '2021-06-01 18:56:55'),
(38, 'Sekretariat DPRD', 'SETWAN', NULL, '2021-05-10 19:00:49', '2021-06-01 19:05:45'),
(39, 'Badan Penanggulangan Bencana Daerah', 'BPBD', NULL, '2021-06-16 23:54:11', '2021-06-16 23:54:11'),
(40, 'Badan perencanaan pembangunan daerah', 'bappeda', NULL, '2021-06-24 19:58:17', '2021-12-28 18:27:24'),
(41, 'Kecamatan Ciamis', 'Kec. Ciamis', NULL, '2021-12-28 18:21:16', '2021-12-28 18:22:20'),
(42, 'Kecamatan Cikoneng', 'Kec. Cikoneng', NULL, '2021-12-28 18:21:59', '2021-12-28 18:21:59'),
(43, 'Kecamatan Cijeungjing', 'Kec. Cijeungjing', NULL, '2021-12-28 18:22:48', '2021-12-28 18:22:48'),
(44, 'Kecamatan Sadananya', 'Kec. Sadananya', NULL, '2021-12-28 18:23:02', '2021-12-28 18:23:02'),
(45, 'Kecamatan Cidolog', 'Kec. Cidolog', NULL, '2021-12-28 18:23:16', '2021-12-28 18:23:16'),
(46, 'Kecamatan Cihaurbeuti', 'Kec. Cihaurbeuti', NULL, '2021-12-28 18:23:47', '2021-12-28 18:23:47'),
(47, 'Kecamatan Panumbangan', 'Kec. Panumbangan', NULL, '2021-12-28 18:24:01', '2021-12-28 18:24:01'),
(48, 'Kecamatan Panjalau', 'Kec. Panjalu', NULL, '2021-12-28 18:25:16', '2021-12-28 18:25:16'),
(49, 'Kecamatan Kawali', 'Kec. Kawali', NULL, '2021-12-28 18:25:46', '2021-12-28 18:25:46'),
(50, 'Kecamatan Panawangan', 'Kec. Panawangan', NULL, '2021-12-28 18:26:11', '2021-12-28 18:26:11'),
(51, 'Kecamatan Cipaku', 'Kec. Cipaku', NULL, '2021-12-28 18:26:27', '2021-12-28 18:26:27'),
(52, 'Kecamatan Jatinagara', 'Kec. Jatinagara', NULL, '2021-12-28 18:26:39', '2021-12-28 18:26:39'),
(53, 'Kecamatan Rajadesa', 'Kec. Rajadesa', NULL, '2021-12-28 18:27:04', '2021-12-28 18:27:04'),
(54, 'Kecamatan Sukadana', 'Kec. Sukadana', NULL, '2021-12-28 18:28:27', '2021-12-28 18:28:27'),
(55, 'Kecamatan Rancah', 'Kec. Rancah', NULL, '2021-12-28 18:28:40', '2021-12-28 18:28:40'),
(56, 'Kecamatan Tambaksari', 'Kec. Tambaksari', NULL, '2021-12-28 18:28:54', '2021-12-28 18:28:54'),
(57, 'Kecamatan Lakbok', 'Kec. Lakbok', NULL, '2021-12-28 18:29:08', '2021-12-28 18:29:08'),
(58, 'Kecamatan Banjarsari', 'Kec. Banjarsari', NULL, '2021-12-28 18:29:20', '2021-12-28 18:29:20'),
(59, 'Kecamatan Pamarican', 'Kec. Pamarican', NULL, '2021-12-28 18:29:34', '2021-12-28 18:29:34'),
(60, 'Kecamatan Cimaragas', 'Kec. Cimaragas', NULL, '2021-12-28 18:29:46', '2021-12-28 18:29:46'),
(61, 'Kecamatan Cisaga', 'Kec. Cisaga', NULL, '2021-12-28 18:30:08', '2021-12-28 18:30:08'),
(62, 'Kecamatan Sindangkasih', 'Kec. Sindangkasih', NULL, '2021-12-28 18:31:00', '2021-12-28 18:31:00'),
(63, 'Kecamatan Baregbeg', 'Kec. Baregbeg', NULL, '2021-12-28 18:31:14', '2021-12-28 18:31:14'),
(64, 'Kecamatan Sukamantri', 'Kec. Sukamantri', NULL, '2021-12-28 18:31:28', '2021-12-28 18:31:28'),
(65, 'Kecamatan Lumbung', 'Kec. Lumbung', NULL, '2021-12-28 18:31:41', '2021-12-28 18:31:41'),
(66, 'Kecamatan Purwadadi', 'Kec. Purwadadi', NULL, '2021-12-28 18:31:52', '2021-12-28 18:31:52'),
(67, 'Kecamatan Banjaranyar', 'Kec. Banjaranyar', NULL, '2021-12-28 18:32:04', '2021-12-28 18:32:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd_file`
--

CREATE TABLE `opd_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_to_uptd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uptd_id` int(10) DEFAULT NULL,
  `total_download` int(20) DEFAULT NULL,
  `upload_file_by` int(20) DEFAULT NULL,
  `status_file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_table` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `opd_file`
--

INSERT INTO `opd_file` (`id`, `opd_id`, `judul`, `file`, `email`, `keterangan`, `jenis_file`, `file_to_uptd`, `uptd_id`, `total_download`, `upload_file_by`, `status_file`, `keterangan_table`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(6, 9, 'Angka Harapan Hidup pada Waktu Lahir Kabupaten Ciamis Tahun 2010-2020', 'Angka Harapan Hidup pada Waktu Lahir Kabupaten Ciamis Tahun 2010-2020.xlsx-1623040427.xlsx', NULL, NULL, 'sektoral', NULL, NULL, 5, NULL, 'asli', NULL, 4, '2021-06-06 21:33:47', '2021-06-24 20:54:18', NULL, NULL),
(9, 20, 'Form isian Dinas Sosial', 'Permintaan Data Dinas Sosial.xlsx-1623726374.xlsx', NULL, NULL, 'sektoral', NULL, NULL, 4, NULL, 'asli', NULL, 4, '2021-06-14 20:06:14', '2021-06-23 20:39:00', NULL, NULL),
(23, 38, 'Form isian Sekretariat DPRD', 'Permintaan Data Sekretariat DPRD.xlsx-1623818119.xlsx', NULL, NULL, 'sektoral', NULL, NULL, 2, 38, 'asli', NULL, 4, '2021-06-15 21:35:19', '2021-06-22 21:04:03', NULL, NULL),
(26, 31, 'Jumlah Alat Kesehatan yang Terdapat di UPTD Puskesmas Ciamis', 'Jumlah Alat Kesehatan yang Terdapat di UPTD Puskesmas Ciamis.xlsx-1623830342.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 14, 'asli', NULL, 10, '2021-06-16 00:59:02', '2021-06-16 00:59:02', NULL, NULL),
(27, 31, 'Form Permintaan Data Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021', 'Form Permintaan Data Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021.xlsx-1623853848.xlsx', NULL, NULL, 'sektoral', '14', NULL, 1, 31, 'asli', NULL, 10, '2021-06-16 07:30:48', '2021-06-16 19:20:21', NULL, NULL),
(28, 31, 'Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021', 'Form Permintaan Data Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021.xlsx-1623898867.xlsx', NULL, NULL, 'sektoral', '14', NULL, NULL, 14, 'asli', NULL, 16, '2021-06-16 20:01:07', '2021-06-16 20:01:07', NULL, NULL),
(29, 32, 'Form Isian Dinas Pariwisata', 'Dataset Pengumpulan Data Dinas Pariwisata.xlsx-1623906927.xlsx', NULL, NULL, 'sektoral', NULL, NULL, 1, 32, 'asli', NULL, 4, '2021-06-16 22:15:27', '2021-06-23 19:36:47', NULL, NULL),
(30, 23, 'Form isian Satuan Polisi Pamong Praja', 'Permintaan Satpol PP.xlsx-1623915602.xlsx', NULL, NULL, 'sektoral', NULL, NULL, 1, 23, 'asli', NULL, 4, '2021-06-17 00:40:02', '2021-06-17 19:28:06', NULL, NULL),
(31, 22, 'Form isian Inspektorat', 'Permintaan Data Inspektorat.xlsx-1624240708.xlsx', NULL, NULL, 'sektoral', NULL, NULL, 2, 22, 'asli', NULL, 4, '2021-06-20 18:58:28', '2021-06-21 23:38:44', NULL, NULL),
(32, 13, 'Form isian Dinas Perpustakaan dan Kearsipan', 'Permintaan data Dispusip.xlsx-1624251931.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 13, 'asli', NULL, 4, '2021-06-20 22:05:31', '2021-06-20 22:05:31', NULL, NULL),
(34, 9, 'IPM Kabupaten Ciamis Tahun 2010 - 2020', 'IPM Kabupaten Ciamis Tahun 2010 - 2020.csv-1624593360.csv', NULL, 'Dataset ini berisi tabel IPM di Kabupaten Ciamis Tahun 2010-2020.', 'sektoral', NULL, NULL, NULL, 9, 'publikasi', 'Dataset ini berisi tabel IPM di Kabupaten Ciamis Tahun 2010-2020.\r\n\r\n- Kolom 1 berisi data tahun pengumpulan data.\r\n- Kolom 2 berisi data nilai IPM.', 4, '2021-06-24 20:56:00', '2021-06-24 20:57:12', NULL, NULL),
(45, 31, 'File untuk puskesmas ciamis', 'laporan.xlsx-1633918439.xlsx', NULL, NULL, 'sektoral', '14', 14, NULL, 31, 'asli', NULL, 25, '2021-10-10 19:13:59', '2021-10-10 19:13:59', NULL, NULL),
(46, 31, 'File balikan dari pkmciamis', 'laporan.xlsx-1633918479.xlsx', NULL, NULL, 'sektoral', '14', NULL, NULL, 14, 'asli', NULL, 45, '2021-10-10 19:14:39', '2021-10-10 19:14:39', NULL, NULL),
(47, 31, 'Form isin ke 2 untuk pkm ciamis', 'laporan.xlsx-1633918796.xlsx', NULL, NULL, 'sektoral', '14', 14, NULL, 31, 'asli', NULL, 25, '2021-10-10 19:19:56', '2021-10-10 19:19:56', NULL, NULL),
(48, 31, 'File balikan ke 2 dari pkm ciamis', 'laporan.xlsx-1633918827.xlsx', NULL, NULL, 'sektoral', '14', NULL, NULL, 14, 'asli', NULL, 45, '2021-10-10 19:20:27', '2021-10-10 19:20:27', NULL, NULL),
(49, 32, 'File dari PSDE', 'laporan.xlsx-1633918883.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 32, 'asli', NULL, 1, '2021-10-10 19:21:23', '2021-10-10 19:21:23', NULL, NULL),
(64, 20, 'Untuk Dinsos', 'laporan.xlsx-1634884917.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 20, 'asli', NULL, 1, '2021-10-21 23:41:57', '2021-10-21 23:41:57', NULL, NULL),
(65, 20, 'Untuk Admin', 'Ali.xlsx-1634885056.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 20, 'asli', NULL, 26, '2021-10-21 23:44:16', '2021-10-21 23:44:16', NULL, NULL),
(66, 32, 'Untuk Dinpar', 'laporan.xlsx-1634885222.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 32, 'asli', NULL, 1, '2021-10-21 23:47:02', '2021-10-21 23:47:02', NULL, NULL),
(68, 32, 'Untuk Admin', 'grafik-capaian-targen-da2.xls-1634885890.xls', NULL, NULL, 'sektoral', NULL, NULL, NULL, 32, 'asli', NULL, 42, '2021-10-21 23:58:10', '2021-10-21 23:58:10', NULL, NULL),
(69, 38, 'Example File2', 'laporan.xlsx-1635145886.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 38, 'asli', NULL, 1, '2021-10-25 00:11:26', '2021-10-25 00:11:26', NULL, NULL),
(70, 38, 'File kiriman untuk admin', 'laporan.xlsx-1635145920.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 38, 'asli', NULL, 18, '2021-10-25 00:12:00', '2021-10-25 00:12:00', NULL, NULL),
(71, 38, 'AIO', 'laporan.xlsx-1635147489.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 38, 'asli', NULL, 1, '2021-10-25 00:38:09', '2021-10-25 00:38:09', NULL, NULL),
(72, 38, 'idiasdask', 'laporan.xlsx-1635147550.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 38, 'asli', NULL, 18, '2021-10-25 00:39:10', '2021-10-25 00:39:10', NULL, NULL),
(105, 5, 'Ok', 'cashflow.xlsx-1641180149.xlsx', NULL, NULL, 'rkpd', NULL, NULL, 2, 5, 'asli', NULL, 4, '2022-01-02 20:22:29', '2022-02-07 00:15:43', '2022-02-07 07:15:43', 4),
(106, 5, 'test', 'cashflow.xlsx-1641194295.xlsx', NULL, NULL, 'lkpj', NULL, NULL, 1, 5, 'asli', NULL, 4, '2022-01-03 00:18:15', '2022-02-07 00:15:57', '2022-02-07 07:15:57', 4),
(114, 35, 'Tes RKPD DISKOMINFO', 'Data Yoga.xlsx-1641357914.xlsx', NULL, NULL, 'rkpd', NULL, NULL, NULL, 35, 'asli', NULL, 4, '2022-01-04 21:45:14', '2022-01-04 21:45:14', NULL, NULL),
(115, 35, 'percobaan', 'Buku_Panduan_Perhitungan_Indikator.pdf-1641358011.pdf', NULL, 'Simulasi', 'rkpd', NULL, NULL, NULL, 35, 'publikasi', NULL, 29, '2022-01-04 21:46:51', '2022-01-04 21:50:06', NULL, NULL),
(116, 35, 'Tes LKPJ DISKOMINFO', 'Data Yoga.xlsx-1641358244.xlsx', NULL, NULL, 'lkpj', NULL, NULL, NULL, 35, 'asli', NULL, 4, '2022-01-04 21:50:44', '2022-01-04 21:50:44', NULL, NULL),
(117, 35, 'Simulasi', 'E-Book Peringkat IDM TH 2020.pdf-1641358357.pdf', NULL, 'percobaan', 'lkpj', NULL, NULL, NULL, 35, 'publikasi', NULL, 29, '2022-01-04 21:52:37', '2022-01-04 21:53:01', NULL, NULL),
(118, 35, 'Test Sektoral DISKOMINFO', 'Data Yoga.xlsx-1641358519.xlsx', NULL, NULL, 'sektoral', NULL, NULL, NULL, 35, 'asli', NULL, 4, '2022-01-04 21:55:19', '2022-01-04 21:55:19', NULL, NULL),
(119, 35, 'simulasi', 'metadata_2.pdf-1641358573.pdf', NULL, 'percobaan', 'sektoral', NULL, NULL, 1, 35, 'publikasi', NULL, 29, '2022-01-04 21:56:13', '2022-01-05 00:21:28', NULL, NULL),
(120, 5, 'test kiriman', 'vaksin_sasaran.csv-1641778405.csv', NULL, NULL, 'rkpd', NULL, NULL, NULL, 5, 'asli', NULL, 43, '2022-01-09 18:33:25', '2022-01-09 18:33:25', NULL, NULL),
(124, 9, 'TEST KIRIMAN', 'vaksin_sasaran.csv-1641866034.csv', NULL, NULL, 'rkpd', NULL, NULL, NULL, 9, 'asli', NULL, 4, '2022-01-10 18:53:54', '2022-01-10 18:53:54', NULL, NULL),
(125, 9, 'tes 1', '6. RKPD 2023_BKPSDM.xlsx-1639463237(1).xlsx-1641818886.xlsx-1641866760.xlsx', NULL, NULL, 'rkpd', NULL, NULL, NULL, 9, 'asli', NULL, 19, '2022-01-10 19:06:00', '2022-01-10 19:06:00', NULL, NULL),
(126, 9, 'x', 'vaksin_sasaran.csv-1641867164.csv', NULL, NULL, 'rkpd', NULL, NULL, NULL, 9, 'verifikasi', NULL, 4, '2022-01-10 19:12:44', '2022-01-24 21:54:50', NULL, NULL),
(127, 9, 'TEST KIRIMAN LKPJ', 'vaksin_sasaran.csv-1641868036.csv', NULL, NULL, 'lkpj', NULL, NULL, NULL, 9, 'asli', NULL, 4, '2022-01-10 19:27:16', '2022-01-10 19:27:16', NULL, NULL),
(128, 9, 'tes 2', '6. RKPD 2023_BKPSDM.xlsx-1639463237(1).xlsx-1641818886.xlsx-1641868117.xlsx', NULL, NULL, 'lkpj', NULL, NULL, NULL, 9, 'asli', NULL, 19, '2022-01-10 19:28:37', '2022-01-10 19:28:37', NULL, NULL),
(129, 35, 'RKPD Diskominfo', '12. RKPD 2023_Dinas Kominfo.xls-1642037160.xls', NULL, NULL, 'rkpd', NULL, NULL, NULL, 35, 'asli', NULL, 29, '2022-01-12 18:26:00', '2022-01-12 18:26:00', NULL, NULL),
(130, 35, 'Test', 'cashflow.xlsx-1642038001.xlsx', NULL, NULL, 'lkpj', NULL, NULL, NULL, 35, 'asli', NULL, 4, '2022-01-12 18:40:01', '2022-01-12 18:40:01', NULL, NULL),
(131, 35, 'LKPJ Diskominfo', 'LKPJ 2021_DISKOMINFO.xlsx-1642127856.xlsx', NULL, NULL, 'lkpj', NULL, NULL, 1, 35, 'asli', NULL, 29, '2022-01-13 19:37:36', '2022-01-13 20:24:46', NULL, NULL),
(132, 28, 'test', 'BARU PANDUAN PENGGUNAAN APLIKASI PENGUMPULAN DATA.docx-1642169206.docx', NULL, NULL, 'rkpd', NULL, NULL, NULL, 28, 'asli', NULL, 33, '2022-01-14 07:06:46', '2022-01-14 07:06:46', NULL, NULL),
(133, 9, 'Test', 'BARU PANDUAN PENGGUNAAN APLIKASI PENGUMPULAN DATA.docx-1642169392.docx', NULL, NULL, 'lkpj', NULL, NULL, NULL, 9, 'asli', NULL, 19, '2022-01-14 07:09:52', '2022-01-14 07:09:52', NULL, NULL),
(134, 41, 'test', 'BARU PANDUAN PENGGUNAAN APLIKASI PENGUMPULAN DATA.docx-1642169848.docx', NULL, NULL, 'rkpd', NULL, NULL, NULL, 41, 'asli', NULL, 47, '2022-01-14 07:17:28', '2022-01-14 07:17:28', NULL, NULL),
(137, 5, 'AA', 'LAPORAN Yudaaaaa.docx-1643860359.docx', NULL, NULL, 'Sektoral', NULL, NULL, NULL, 5, 'asli', NULL, 4, '2022-02-02 20:52:39', '2022-02-07 00:11:45', '2022-02-07 07:11:45', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uptd_opd`
--

CREATE TABLE `uptd_opd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `nama_uptd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `uptd_opd`
--

INSERT INTO `uptd_opd` (`id`, `opd_id`, `nama_uptd`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 22, 'Bidang Kinerja Pembangunan Daerah', NULL, '2021-06-06 19:31:36', '2021-06-06 19:31:36'),
(14, 31, 'UPTD Puskesmas Ciamis', NULL, '2021-06-15 19:26:13', '2021-06-15 19:26:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_admin` int(10) DEFAULT NULL,
  `opd_parent` int(10) DEFAULT NULL,
  `uptd_parent` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `username`, `parent_admin`, `opd_parent`, `uptd_parent`) VALUES
(1, 'administrator', 'admin@gmail.com', NULL, '$2y$10$jwtTqB52QTzvf34diRNcxuL.2le6b8OQPCVWX.EjfuQsp5HOvycZ6', NULL, NULL, NULL, 'super admin', 'admin', NULL, NULL, NULL),
(4, 'Bidang PSDE', 'statistik@gmail.com', NULL, '$2y$10$aVta3Fmi.46lHASk3vnajOfs0ZYabVdOKE3ERBhGHX6Rs/HvXXi2S', NULL, '2021-05-04 00:54:53', '2021-12-13 21:34:13', 'super admin', 'statistik', NULL, NULL, NULL),
(17, 'Sekretariat Daerah', 'setda@gmail.com', NULL, '$2y$10$CKDIi2lsgohVsA9ZQ2UsLe.TIO9VAILihr2u3Q131rkH2cXy/TV3C', NULL, '2021-06-16 23:45:03', '2021-06-16 23:45:03', 'Admin', 'setda.ciamis', NULL, 37, NULL),
(18, 'Sekretariat DPRD', 'setwan@gmail.com', NULL, '$2y$10$oLOaokXOvnphEttOtRWzFeN2iz1hN6sprG/Kh7gNu.3PIqUh4Lxt.', NULL, '2021-06-16 23:47:28', '2021-06-16 23:47:28', 'Admin', 'setwan.ciamis', NULL, 38, NULL),
(19, 'Badan Perencanaan Pembangunan Daerah', 'bappeda@gmail.com', NULL, '$2y$10$fDYi2OanrDKfSVlcB3MyZuN/LmWqTK1hX36Swkp0p557RWZs1On7y', NULL, '2021-06-16 23:48:46', '2021-06-16 23:48:46', 'Admin', 'bappeda.ciamis', NULL, 9, NULL),
(20, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'bkpsdm@gmail.com', NULL, '$2y$10$tSoMUOnsy1KaPp9rjOVf6e.yLJdK85YFlHt0m2i7cTG8Jpfjt2d1q', NULL, '2021-06-16 23:50:14', '2021-06-16 23:50:14', 'Admin', 'bkpsdm.ciamis', NULL, 16, NULL),
(21, 'Badan Penanggulangan Bencana Daerah', 'bpbd@gmail.com', NULL, '$2y$10$z15jldnqHZq7b3p0kmtDKufXtEvY5tVrHboaEaps1UomFi1nJsyT2', NULL, '2021-06-16 23:55:25', '2021-06-16 23:55:25', 'Admin', 'bpbd.ciamis', NULL, 39, NULL),
(22, 'Badan Pengelola Keuangan Daerah', 'bpkd@gmail.com', NULL, '$2y$10$51ZShzcLK9PN.M6a0y2jVuFComSD29zzsatB.FMDUZ2G3aTquuqgC', NULL, '2021-06-16 23:56:28', '2021-06-16 23:56:28', 'Admin', 'bpkd.ciamis', NULL, 29, NULL),
(23, 'Dinas Pemberdayaan Masyarakat dan Desa', 'dpmd@gmail.com', NULL, '$2y$10$r/tJrimszd8OCycS4Q43le6UbvVRUK7PmcoTwwKKHQTRQkB6mO/bW', NULL, '2021-06-16 23:58:38', '2021-06-16 23:58:38', 'Admin', 'dpmd.ciamis', NULL, 33, NULL),
(24, 'Dinas Pertanian dan Ketahanan Pangan', 'dpkp@gmail.com', NULL, '$2y$10$sFMMpSzumq2gI.qd9Nl7RuQ2ArsMEjXMf8FbVeP/LAQsePMhwSrCu', NULL, '2021-06-17 00:00:26', '2021-06-17 00:00:26', 'Admin', 'dpkp.ciamis', NULL, 26, NULL),
(25, 'Dinas Kesehatan', 'dinkes@gmail.com', NULL, '$2y$10$76jecJPd7yEvoMhYMI66/.mQC1QMOJ3hsnJw5cBPHqe2MXa8zHanu', NULL, '2021-06-17 00:01:14', '2021-06-17 00:01:14', 'Admin', 'dinkes.ciamis', 45, 31, NULL),
(26, 'Dinas Sosial', 'dinsos@gmail.com', NULL, '$2y$10$peZPq2iEdZfksVs.ZGfPYulbJun.RmKNQewT4TLwhW56T88RnAHHi', NULL, '2021-06-17 00:02:14', '2021-06-17 00:02:14', 'Admin', 'dinsos.ciamis', NULL, 20, NULL),
(27, 'Dinas Kebudayaan, Pemuda dan Olah Raga', 'disbudpora@gmail.com', NULL, '$2y$10$R4FAxYRwaK1NKsiPpnEBZ.iP.eBggtEFRW71gujX.vUa.XjXtHxgi', NULL, '2021-06-17 00:03:27', '2021-06-17 00:03:27', 'Admin', 'disbudpora.ciamis', NULL, 10, NULL),
(28, 'Dinas Pendidikan', 'disdik@gmail.com', NULL, '$2y$10$SXhzZgGwo6YqNHa9wMQBRu.WnnATqO0G6sim1wGLNQxagqGpUxB3W', NULL, '2021-06-17 00:04:33', '2021-06-17 00:04:33', 'Admin', 'disdik.ciamis', NULL, 34, NULL),
(29, 'Dinas Komunikasi dan Informatika', 'diskominfo@gmail.com', NULL, '$2y$10$gAgV5ODNbpzgTvENPYbmsOfcFS2nxDdsATSRLdR9S.Xv4zQAkNt9G', NULL, '2021-06-17 00:05:58', '2021-06-17 00:05:58', 'Admin', 'diskominfo.ciamis', NULL, 35, NULL),
(30, 'Dinas Perhubungan', 'dishub@gmail.com', NULL, '$2y$10$VH7zd2Wt3zoTHrFPhvXRce7NplMkkYOyFTF0epqXsG/JlKtC5mhCG', NULL, '2021-06-17 00:06:54', '2021-06-17 00:06:54', 'Admin', 'dishub.ciamis', NULL, 15, NULL),
(31, 'Dinas Perumahan Rakyat, Kawasan Pemukiman dan Lingkungan Hidup', 'dprkplh@gmail.com', NULL, '$2y$10$RAn.iH5KN5MDlmsvzNk33OPl4Mn829VRzkYfqk21OjMgmK/ppVdIq', NULL, '2021-06-17 00:08:07', '2021-06-17 00:08:07', 'Admin', 'dprkplh.ciamis', NULL, 14, NULL),
(32, 'Dinas Peternakan dan Perikanan', 'disnakan@gmail.com', NULL, '$2y$10$PQp7PSbE0Fz7hmitrHK2R.V.oU5V6NfUEXNa6cukyNA8wF0YeVdcO', NULL, '2021-06-17 00:09:03', '2021-06-17 00:09:03', 'Admin', 'disnakan.ciamis', NULL, 24, NULL),
(33, 'Dinas Tenaga Kerja', 'disnaker@gmail.com', NULL, '$2y$10$bZ.CDmcnTnJK7H.1gzigrOQmoc8ci2osozX5UJjG7tL3NK14fiDuK', NULL, '2021-06-17 00:10:05', '2021-06-17 00:10:05', 'Admin', 'disnaker.ciamis', NULL, 28, NULL),
(34, 'Dinas Koperasi, UKM dan Perdagangan', 'dkukmp@gmail.com', NULL, '$2y$10$daJcMt1TQTlPwpspIKt3DudTFWHEPeKD01D8sR.Fhvo1ToMZM6Nla', NULL, '2021-06-17 00:11:42', '2021-06-17 00:11:42', 'Admin', 'dkukmp.ciamis', NULL, 27, NULL),
(35, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'dpmptsp@gmail.com', NULL, '$2y$10$YQiqg7VuJS03.o1k8LHF0eGqI62tkQD7dQC7M4yXXmU1qjUAYPaCq', NULL, '2021-06-17 00:13:03', '2021-06-17 00:13:03', 'Admin', 'dpmptsp.ciamis', NULL, 30, NULL),
(36, 'Dinas Pekerjaan Umum, Penataan Ruang, dan Pertanahan', 'dpuprp@gmail.com', NULL, '$2y$10$0CwT7fyN9cQTiHVHsv/xXemmiVhNq3idaz.T8TZz5XqVul38Ywm1W', NULL, '2021-06-17 00:13:58', '2021-06-17 00:13:58', 'Admin', 'dpuprp.ciamis', NULL, 18, NULL),
(37, 'Badan Kesatuan Bangsa dan Politik', 'kesbangpol@gmail.com', NULL, '$2y$10$qZQwM4uj38tHZKS3wO.NBOjTzh2RdIW1ThvjxAxvR4deA30uI0FhG', NULL, '2021-06-17 00:15:00', '2021-06-17 00:15:00', 'Admin', 'kesbangpol.ciamis', NULL, 36, NULL),
(38, 'Satuan Polisi Pamong Praja', 'satpolpp@gmail.com', NULL, '$2y$10$IK/dhxksrhGB94afW0NxYeB7Ujoe.egizOQ29iiYWv2WTu.ApJG4.', NULL, '2021-06-17 00:16:27', '2021-06-17 00:16:27', 'Admin', 'satpolpp.ciamis', NULL, 23, NULL),
(39, 'Dinas Perpustakaan dan Kearsipan', 'diperpuska@gmail.com', NULL, '$2y$10$P2gBH6gH8mn9gwIzqwFExufVbiI7m/7TFGfpV590kRAxkldmI0hsG', NULL, '2021-06-17 00:17:27', '2021-06-17 00:17:27', 'Admin', 'diperpuska.ciamis', NULL, 13, NULL),
(40, 'Inspektorat', 'inspektorat@gmail.com', NULL, '$2y$10$RoiNwyvvE111lyekaxPXc.rr9sY.Q.hsSESgEltqtmR4d2j7FsKSi', NULL, '2021-06-17 00:18:32', '2021-06-17 00:18:32', 'Admin', 'inspektorat.ciamis', NULL, 22, NULL),
(41, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'dppkbp3a@gmail.com', NULL, '$2y$10$qtXpEjD2S00F6GUxi9EO8uQU3.6tdMbulzFPU5rqTxdF6yzC.B.8a', NULL, '2021-06-17 00:19:40', '2021-06-17 00:19:40', 'Admin', 'dppkbp3a.ciamis', NULL, 19, NULL),
(42, 'Dinas Pariwisata', 'dispar@gmail.com', NULL, '$2y$10$UF0DyVJFaxtv8bI3LKc5ruSAaJEC2Z1iOhiW8w92ETPsZ.nfYF3Iq', NULL, '2021-06-17 00:20:29', '2021-06-17 00:20:29', 'Admin', 'dispar.ciamis', NULL, 32, NULL),
(43, 'Rumah Sakit Umum Daerah Ciamis', 'rsud@gmail.com', NULL, '$2y$10$dbk0I2hil9MDYENrK6DxX.df9Ok40PaBN97Pv.3VmuK1TgNmvKaEW', NULL, '2021-06-17 00:21:38', '2021-06-17 00:21:38', 'Admin', 'rsud.ciamis', NULL, 5, NULL),
(44, 'Dinas Kependudukan dan Pencatatan Sipil', 'disdukcapil@gmail.com', NULL, '$2y$10$ODYetU/nFb.uueA1ZjuSeezmi3R35n2clLsIQ/8Gw1kJbOiaA/97K', NULL, '2021-06-17 00:22:38', '2021-06-17 00:22:38', 'Admin', 'disdukcapil.ciamis', NULL, 12, NULL),
(45, 'Puskesmas Ciamis', 'pkmciamis@gmail.com', NULL, '$2y$10$76jecJPd7yEvoMhYMI66/.mQC1QMOJ3hsnJw5cBPHqe2MXa8zHanu', NULL, '2021-06-17 00:01:14', '2021-06-17 00:01:14', 'Staff', 'pkmciamis', 31, 31, 14),
(46, 'Data Informasi Bappeda', 'datainformasi@gmail.com', NULL, '$2y$10$9qZVkP5dQLTcJcsL9y1NiuczqeTp7Jpjw3o03JsiSLciyaTIePA9O', NULL, NULL, '2021-12-14 19:02:14', 'super admin', 'datainformasi', NULL, NULL, NULL),
(47, 'Kecamatan Ciamis', 'ciamis@admin.com', NULL, '$2y$10$GRmQeSkbwk.juXhkzWd7beXnTfEpiYfF2bCi3auXKX.LZCmh8J33K', NULL, '2021-12-28 18:34:54', '2021-12-28 18:34:54', 'Admin', 'kec.ciamis', NULL, 41, NULL),
(48, 'Kecamatan Cikoneng', 'cikoneng@admin.com', NULL, '$2y$10$vVLDcRLWz18fgucbbhKBEewxjhrjv8vcraw2hbBIws/vUWgC3OxGe', NULL, '2021-12-28 18:38:17', '2021-12-28 18:38:17', 'Admin', 'kec.cikoneng', NULL, 42, NULL),
(49, 'Kecamatan Cijeungjing', 'cijeungjing@admin.com', NULL, '$2y$10$o0Sw.Ta/gWYKQNpAWoTwQOO/iTTqkpG5WMTVVUysuJXLy3MuYBoPS', NULL, '2021-12-28 18:42:16', '2021-12-28 18:42:16', 'Admin', 'kec.cijeungjing', NULL, 43, NULL),
(50, 'Kecamatan Sadananya', 'sadananya@admin.com', NULL, '$2y$10$nTZTsX6xQtkh26yxsTNf0ONxqznD2bBcTiFCiywcj69n4tUPnG1RO', NULL, '2021-12-28 18:47:13', '2021-12-28 18:47:13', 'Admin', 'kec.sadananya', NULL, 44, NULL),
(51, 'Kecamatan Cidolog', 'cidolog@admin.com', NULL, '$2y$10$BUpYb9SdV.S8QugNKeG5j.4Ztu6fRfdIpuAUkm4WR7va5KqP25zCa', NULL, '2021-12-28 18:47:57', '2021-12-28 18:47:57', 'Admin', 'kec.cidolog', NULL, 45, NULL),
(52, 'Kecamatan Cihaurbeuti', 'cihaurbeuti@admin.com', NULL, '$2y$10$uYuGD65MLWXFDOWKVL5//.r6Px0LEOkUxYK/NYMaiDSiqcAJLR4Ty', NULL, '2021-12-28 18:48:41', '2021-12-28 18:48:41', 'Admin', 'kec.cihaurbeuti', NULL, 46, NULL),
(53, 'Kecamatan Panumbangan', 'panumbangan@admin.com', NULL, '$2y$10$ZGYNKp4McMpSfwxHOud7qeAXF79oRdRYcyWcKOHgfmj1e5s1E.EPi', NULL, '2021-12-28 18:49:24', '2021-12-28 18:49:24', 'Admin', 'kec.panumbangan', NULL, 47, NULL),
(54, 'Kecamatan Panjalau', 'panjalu@admin.com', NULL, '$2y$10$VjqL1RrI80ES3tkoeSDSQ.SNbRxYsBpTCyNMY0dj.AYwiYfFtDu6O', NULL, '2021-12-28 18:50:49', '2021-12-28 18:50:49', 'Admin', 'kec.panjalu', NULL, 48, NULL),
(55, 'Kecamatan Kawali', 'kawali@admin.com', NULL, '$2y$10$EAdmahgAmFbHE5Ni4A4uSesBbUEWV9o6ZY/DYCVcbV0qV32hGIfOq', NULL, '2021-12-28 18:51:34', '2021-12-28 18:51:34', 'Admin', 'kec.kawali', NULL, 49, NULL),
(56, 'Kecamatan Panawangan', 'panawangan@admin.com', NULL, '$2y$10$EvtyL56gIGXTL2zEJLQs1OrO0xMksa.ltzzD4LIC/THECD1iWCTOO', NULL, '2021-12-28 18:52:34', '2021-12-28 18:52:34', 'Admin', 'kec.panawangan', NULL, 50, NULL),
(57, 'Kecamatan Cipaku', 'cipaku@admin.com', NULL, '$2y$10$XQcr4lvsWsuge8C38R3LiOSRBl5QG0Nc.66mw4ZFr7pp/oXyWqmJu', NULL, '2021-12-28 18:53:06', '2021-12-28 18:53:06', 'Admin', 'kec.cipaku', NULL, 51, NULL),
(58, 'Kecamatan Jatinagara', 'jatinagara@admin.com', NULL, '$2y$10$gLDsFlXg6vOINX9xJX9I4Op6Osy7FlRzc4deoW946Od5/R.7idbIW', NULL, '2021-12-28 18:53:44', '2021-12-28 18:53:44', 'Admin', 'kec.jatinagara', NULL, 52, NULL),
(59, 'Kecamatan Rajadesa', 'rajadesa@admin.com', NULL, '$2y$10$QRIO4CWATiUg2fA2WcVvyOYaIqxU75OJNFCMUBzRd4tR2f.zNt.A.', NULL, '2021-12-28 18:54:31', '2021-12-28 18:54:31', 'Admin', 'kec.rajadesa', NULL, 53, NULL),
(60, 'Kecamatan Sukadana', 'sukadana@admin.com', NULL, '$2y$10$5C9OxHgTrCOIXV4JYyAP..tLiEexkfbam2fnGWtYoh09dz.VkjpDG', NULL, '2021-12-28 18:55:04', '2021-12-28 18:55:04', 'Admin', 'kec.sukadana', NULL, 54, NULL),
(61, 'Kecamatan Rancah', 'rancah@admin.com', NULL, '$2y$10$aVta3Fmi.46lHASk3vnajOfs0ZYabVdOKE3ERBhGHX6Rs/HvXXi2S', NULL, '2021-12-28 18:56:13', '2021-12-28 18:56:13', 'Admin', 'kec.rancah', NULL, 55, NULL),
(62, 'Kecamatan Tambaksari', 'tambaksari@admin.com', NULL, '$2y$10$XXnzGpttDSO/1psmbpFSDu4i7VKscnYjGGOAKAQqyB9wJMQn2xWSm', NULL, '2021-12-28 18:57:18', '2021-12-28 18:57:18', 'Admin', 'kec.tambaksari', NULL, 56, NULL),
(63, 'Kecamatan Lakbok', 'lakbok@admin.com', NULL, '$2y$10$oUviOiCo4YqBZOTcPplMZuYHlx0q/m7cw/YfKR.emcdY.WwDiW/sa', NULL, '2021-12-28 18:59:43', '2021-12-28 18:59:43', 'Admin', 'kec.lakbok', NULL, 56, NULL),
(64, 'Kecamatan Banjarsari', 'banjarsari@admin.com', NULL, '$2y$10$9f1zrFnSEH/4.vTceQAc1eNgoJj4g9BHX2tSdjSPf/yXPKLS1HrXq', NULL, '2021-12-28 19:00:57', '2021-12-28 19:00:57', 'Admin', 'kec.banjarsari', NULL, 58, NULL),
(65, 'Kecamatan Pamarican', 'pamarican@admin.com', NULL, '$2y$10$7dGwGs7YfkXzI1yjsLUSPOUvZxKdLLc1BGWGhFla9G6dWG03wYsHG', NULL, '2021-12-28 19:07:17', '2021-12-28 19:07:17', 'Admin', 'kec.pamarican', NULL, 59, NULL),
(66, 'Kecamatan Cimaragas', 'cimaragas@admin.com', NULL, '$2y$10$prfm0ANiSaHxT1qOTLJ3MeH1bRu8bOA9b3M3cP6UJQLvZmTlTd2c.', NULL, '2021-12-28 19:08:12', '2021-12-28 19:08:12', 'Admin', 'kec.cimaragas', NULL, 60, NULL),
(67, 'Kecamatan Cisaga', 'cisaga@admin.com', NULL, '$2y$10$582n6B.Zq9U955rtYdOlZedeBQvApNBSyG6qm2g1oEasc57vyrr0.', NULL, '2021-12-28 19:08:57', '2021-12-28 19:08:57', 'Admin', 'kec.cisaga', NULL, 61, NULL),
(68, 'Kecamatan Sindangkasih', 'sindangkasih@admin.com', NULL, '$2y$10$qQ0VaA1cMxMTL.dROVT04.pGe5ytH9dvRLigdCM30cKPaE3iBYAXq', NULL, '2021-12-28 19:12:38', '2021-12-28 19:12:38', 'Admin', 'kec.sindangkasih', NULL, 62, NULL),
(69, 'Kecamatan Baregbeg', 'baregbeg@admin.com', NULL, '$2y$10$b7BaVWeQQFv4JvcKIEXLJ.IzCdMavRifLJGhOmvLAPnUOoDcugLru', NULL, '2021-12-28 19:13:33', '2021-12-28 19:13:33', 'Admin', 'kec.baregbeg', NULL, 63, NULL),
(70, 'Kecamatan Sukamantri', 'sukamantri@admin.com', NULL, '$2y$10$lA4xUTkEw9jiIQEs5eZ67OJpOCBAxarqbwbYni1wxNsxTj/3R88iO', NULL, '2021-12-28 19:14:31', '2021-12-28 19:14:31', 'Admin', 'kec.sukamantri', NULL, 64, NULL),
(71, 'Kecamatan Lumbung', 'lumbung@admin.com', NULL, '$2y$10$lF2HCo1orckumxWsn344/Oy5DQf1z9R99I3WsnH.h15gkNOuFLC/y', NULL, '2021-12-28 19:15:06', '2021-12-28 19:15:06', 'Admin', 'kec.lumbung', NULL, 65, NULL),
(72, 'Kecamatan Purwadadi', 'purwadadi@admin.com', NULL, '$2y$10$ypf8joygxWUf2VbGHg1FWe6g5Ap6FYpUp3tpFLfOhWExNX/lbX2SG', NULL, '2021-12-28 19:15:54', '2021-12-28 19:15:54', 'Admin', 'kec.purwadadi', NULL, 66, NULL),
(73, 'Kecamatan Banjaranyar', 'banjaranyar@admin.com', NULL, '$2y$10$EjhY0areRXWcodsc6ND1meOzQvYVX29w02XPK/inaIsOvMn.HN3Hm', NULL, '2021-12-28 19:16:35', '2021-12-28 19:16:35', 'Admin', 'kec.banjaranyar', NULL, 67, NULL),
(74, 'Bidang Pemerintahan dan Pembangunan Manusia', 'ppm@gmail.com', NULL, '$2y$10$a3iAsTpP6J6aQHgdwHHlF.2AM.qNuGfJIEooxX5KpbP5Ez8xrwPcS', NULL, '2022-01-13 20:08:05', '2022-01-13 20:08:05', 'super admin', 'bidang.ppm', NULL, NULL, NULL),
(75, 'Bidang Perekonomian dan Sumber Daya Alam', 'psda@gmail.com', NULL, '$2y$10$W0KNjexfwxtXGeDlcsbbFeWEHLUCSkV3ra9IJ/Wu2HS31TS.aW3yO', NULL, '2022-01-13 20:09:10', '2022-01-13 20:09:10', 'super admin', 'bidang.psda', NULL, NULL, NULL),
(76, 'Bidang Infrasturktur dan Kewilayahan', 'infrawil@gmail.com', NULL, '$2y$10$RQKy8ZHyfIABz6o4GnB2eOjx/P/1F/wSnI4lDPhEBlwTFYR4YVdhu', NULL, '2022-01-13 20:11:58', '2022-01-13 20:11:58', 'super admin', 'bidang.infrawil', NULL, NULL, NULL),
(77, 'Bidang Penelitian dan Pengembangan', 'bidang_litbang@gmail.com', NULL, '$2y$10$njGmlMcV1PL4loYA6sFSP.GiLkRzlMyA43tlAQ/ejKzNQ0otLEnPy', NULL, '2022-01-16 18:34:11', '2022-01-16 18:34:11', 'super admin', 'bidang.litbang', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ckanapi`
--
ALTER TABLE `ckanapi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indeks untuk tabel `metadata_file`
--
ALTER TABLE `metadata_file`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `opd_file`
--
ALTER TABLE `opd_file`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indeks untuk tabel `uptd_opd`
--
ALTER TABLE `uptd_opd`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ckanapi`
--
ALTER TABLE `ckanapi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `evidence`
--
ALTER TABLE `evidence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `metadata_file`
--
ALTER TABLE `metadata_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `opd`
--
ALTER TABLE `opd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `opd_file`
--
ALTER TABLE `opd_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `uptd_opd`
--
ALTER TABLE `uptd_opd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
