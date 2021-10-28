/*
 Navicat Premium Data Transfer

 Source Server         : pulahta
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : 162.241.27.32:3306
 Source Schema         : petaiern_pullahta

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 28/06/2021 11:47:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ckanapi
-- ----------------------------
DROP TABLE IF EXISTS `ckanapi`;
CREATE TABLE `ckanapi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jumlah_data` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ckanapi
-- ----------------------------
INSERT INTO `ckanapi` VALUES (1, 1, 'sukses', '', '2021-06-25 04:01:50', '2021-06-25 04:01:50');
INSERT INTO `ckanapi` VALUES (2, 1, 'sukses', '', '2021-06-25 04:11:48', '2021-06-25 04:11:48');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for metadata_file
-- ----------------------------
DROP TABLE IF EXISTS `metadata_file`;
CREATE TABLE `metadata_file`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `opd_file_id` int(11) NULL DEFAULT NULL,
  `nama_field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tipe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kegunaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of metadata_file
-- ----------------------------
INSERT INTO `metadata_file` VALUES (7, 33, NULL, 'numeric', 'tahun', 'Tahun merupakan satuan dari waktu.', NULL, '2021-06-25 03:16:39', '2021-06-25 03:16:39');
INSERT INTO `metadata_file` VALUES (8, 33, NULL, 'numeric', 'IPM', 'IPM adalah Indeks yang mengukur pembangunan manusia dari tiga aspek dasar yaitu umur panjang dan hidup sehat, pengetahuan, dan standar hidup layak.', NULL, '2021-06-25 03:16:39', '2021-06-25 03:16:39');
INSERT INTO `metadata_file` VALUES (9, 34, NULL, 'numeric', 'Tahun', 'Tahun merupakan satuan dari waktu.', NULL, '2021-06-25 03:56:46', '2021-06-25 03:56:46');
INSERT INTO `metadata_file` VALUES (10, 34, NULL, 'numeric', 'IPM', 'IPM adalah Indeks yang mengukur pembangunan manusia dari tiga aspek dasar yaitu umur panjang dan hidup sehat, pengetahuan, dan standar hidup layak.', NULL, '2021-06-25 03:56:46', '2021-06-25 03:56:46');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_04_27_021211_create_opd_table', 2);
INSERT INTO `migrations` VALUES (5, '2021_04_27_021701_create_opd_file_table', 3);
INSERT INTO `migrations` VALUES (6, '2021_04_28_062343_add_role_username_user_table', 4);
INSERT INTO `migrations` VALUES (7, '2021_04_29_030547_add_column_opd_file', 5);
INSERT INTO `migrations` VALUES (8, '2021_04_30_041552_add_created_by_opd_file', 6);

-- ----------------------------
-- Table structure for opd
-- ----------------------------
DROP TABLE IF EXISTS `opd`;
CREATE TABLE `opd`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_opd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alias_opd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opd
-- ----------------------------
INSERT INTO `opd` VALUES (5, 'Rumah Sakit Umum Daerah Ciamis', 'RSUD', NULL, '2021-04-27 22:37:43', '2021-06-02 01:54:24');
INSERT INTO `opd` VALUES (9, 'Badan Perencanaan Pembangunan Daerah', 'BAPPEDA', NULL, '2021-04-29 00:30:10', '2021-06-02 02:00:54');
INSERT INTO `opd` VALUES (10, 'Dinas Kebudayaan, Pemuda dan Olahraga', 'DISBUDPORA', NULL, '2021-04-29 00:30:11', '2021-06-02 02:05:33');
INSERT INTO `opd` VALUES (12, 'Dinas Kependudukan dan Pencatatan Sipil', 'DISDUKCAPIL', NULL, '2021-04-29 00:31:11', '2021-06-02 02:05:20');
INSERT INTO `opd` VALUES (13, 'Dinas Perpustakaan dan Kearsipan', 'DISPUSIP', NULL, '2021-04-29 00:31:48', '2021-06-02 02:05:01');
INSERT INTO `opd` VALUES (14, 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Lingkungan Hidup', 'DPRKPLH', NULL, '2021-04-29 00:31:49', '2021-06-02 02:03:55');
INSERT INTO `opd` VALUES (15, 'Dinas Perhubungan', 'DISHUB', NULL, '2021-04-29 00:32:10', '2021-06-02 02:03:44');
INSERT INTO `opd` VALUES (16, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'BKPSDM', NULL, '2021-04-29 00:32:20', '2021-06-02 02:03:39');
INSERT INTO `opd` VALUES (18, 'Dinas Pekerjaan Umum, Penataan Ruang, dan Pertanahan', 'PUPRP', NULL, '2021-04-29 00:33:11', '2021-06-02 02:03:30');
INSERT INTO `opd` VALUES (19, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'DPPKBPPPA', NULL, '2021-04-29 00:33:14', '2021-06-02 02:03:16');
INSERT INTO `opd` VALUES (20, 'Dinas Sosial', 'DINSOS', NULL, '2021-04-29 00:33:32', '2021-06-02 02:02:23');
INSERT INTO `opd` VALUES (22, 'Inspektorat', 'INSPEKTORAT', NULL, '2021-04-29 00:33:48', '2021-06-02 02:01:30');
INSERT INTO `opd` VALUES (23, 'Satuan Polisi Pamong Praja', 'SATPOLPP', NULL, '2021-04-29 00:34:00', '2021-06-02 02:01:11');
INSERT INTO `opd` VALUES (24, 'Dinas Peternakan dan Perikanan', 'DISNAKAN', NULL, '2021-04-29 00:34:03', '2021-06-02 02:00:39');
INSERT INTO `opd` VALUES (26, 'Dinas Pertanian dan Ketahanan Pangan', 'DISPERTA', NULL, '2021-04-29 00:34:36', '2021-06-02 01:56:45');
INSERT INTO `opd` VALUES (27, 'Dinas Perdagangan dan Koperasi, Usaha Kecil dan Menengah', 'DKUKMP', NULL, '2021-04-29 00:34:48', '2021-06-02 02:00:07');
INSERT INTO `opd` VALUES (28, 'Dinas Tenaga Kerja', 'DISNAKER', NULL, '2021-04-29 00:35:02', '2021-06-02 01:59:51');
INSERT INTO `opd` VALUES (29, 'Badan Pengelola Keuangan Daerah', 'BPKD', NULL, '2021-04-29 00:35:07', '2021-06-02 01:59:27');
INSERT INTO `opd` VALUES (30, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'DPMPTSP', NULL, '2021-04-29 00:35:55', '2021-06-02 01:59:08');
INSERT INTO `opd` VALUES (31, 'Dinas Kesehatan', 'DINKES', NULL, '2021-05-11 01:56:07', '2021-06-02 01:54:06');
INSERT INTO `opd` VALUES (32, 'Dinas Pariwisata', 'DISPAR', NULL, '2021-05-11 01:56:32', '2021-06-02 01:58:55');
INSERT INTO `opd` VALUES (33, 'Dinas Pemberdayaan Masyarakat dan Desa', 'DPMD', NULL, '2021-05-11 01:56:59', '2021-06-02 01:58:44');
INSERT INTO `opd` VALUES (34, 'Dinas Pendidikan', 'DISDIK', NULL, '2021-05-11 01:57:27', '2021-06-02 01:58:34');
INSERT INTO `opd` VALUES (35, 'Dinas Komunikasi dan Informatika', 'DISKOMINFO', NULL, '2021-05-11 01:58:07', '2021-06-02 01:58:22');
INSERT INTO `opd` VALUES (36, 'Badan Kesatuan Bangsa dan Politik', 'KESBANGPOL', NULL, '2021-05-11 01:58:51', '2021-06-02 01:57:14');
INSERT INTO `opd` VALUES (37, 'Sekretariat Daerah', 'SETDA', NULL, '2021-05-11 02:00:29', '2021-06-02 01:56:55');
INSERT INTO `opd` VALUES (38, 'Sekretariat DPRD', 'SETWAN', NULL, '2021-05-11 02:00:49', '2021-06-02 02:05:45');
INSERT INTO `opd` VALUES (39, 'Badan Penanggulangan Bencana Daerah', 'BPBD', NULL, '2021-06-17 06:54:11', '2021-06-17 06:54:11');
INSERT INTO `opd` VALUES (40, 'badan perencanaan pembangunan daerah', 'bappeda', NULL, '2021-06-25 02:58:17', '2021-06-25 02:58:17');

-- ----------------------------
-- Table structure for opd_file
-- ----------------------------
DROP TABLE IF EXISTS `opd_file`;
CREATE TABLE `opd_file`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `opd_id` int(11) NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `file_to_uptd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uptd_id` int(10) NULL DEFAULT NULL,
  `total_download` int(20) NULL DEFAULT NULL,
  `upload_file_by` int(20) NULL DEFAULT NULL,
  `status_file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan_table` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opd_file
-- ----------------------------
INSERT INTO `opd_file` VALUES (6, 9, 'Angka Harapan Hidup pada Waktu Lahir Kabupaten Ciamis Tahun 2010-2020', 'Angka Harapan Hidup pada Waktu Lahir Kabupaten Ciamis Tahun 2010-2020.xlsx-1623040427.xlsx', NULL, '2021-06-07 04:33:47', '2021-06-25 03:54:18', NULL, NULL, 4, NULL, NULL, 5, NULL, 'asli', NULL);
INSERT INTO `opd_file` VALUES (9, 20, 'Form isian Dinas Sosial', 'Permintaan Data Dinas Sosial.xlsx-1623726374.xlsx', NULL, '2021-06-15 03:06:14', '2021-06-24 03:39:00', NULL, NULL, 4, NULL, NULL, 4, NULL, 'asli', NULL);
INSERT INTO `opd_file` VALUES (23, 38, 'Form isian Sekretariat DPRD', 'Permintaan Data Sekretariat DPRD.xlsx-1623818119.xlsx', NULL, '2021-06-16 04:35:19', '2021-06-23 04:04:03', NULL, NULL, 4, NULL, NULL, 2, 38, 'asli', NULL);
INSERT INTO `opd_file` VALUES (26, 31, 'Jumlah Alat Kesehatan yang Terdapat di UPTD Puskesmas Ciamis', 'Jumlah Alat Kesehatan yang Terdapat di UPTD Puskesmas Ciamis.xlsx-1623830342.xlsx', NULL, '2021-06-16 07:59:02', '2021-06-16 07:59:02', NULL, NULL, 10, NULL, NULL, NULL, 14, 'asli', NULL);
INSERT INTO `opd_file` VALUES (27, 31, 'Form Permintaan Data Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021', 'Form Permintaan Data Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021.xlsx-1623853848.xlsx', NULL, '2021-06-16 14:30:48', '2021-06-17 02:20:21', NULL, NULL, 10, '14', NULL, 1, 31, 'asli', NULL);
INSERT INTO `opd_file` VALUES (28, 31, 'Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021', 'Form Permintaan Data Jumlah Pasien di UPTD Puskesmas Ciamis Bulan Juni 2021.xlsx-1623898867.xlsx', NULL, '2021-06-17 03:01:07', '2021-06-17 03:01:07', NULL, NULL, 16, '14', NULL, NULL, 14, 'asli', NULL);
INSERT INTO `opd_file` VALUES (29, 32, 'Form Isian Dinas Pariwisata', 'Dataset Pengumpulan Data Dinas Pariwisata.xlsx-1623906927.xlsx', NULL, '2021-06-17 05:15:27', '2021-06-24 02:36:47', NULL, NULL, 4, NULL, NULL, 1, 32, 'asli', NULL);
INSERT INTO `opd_file` VALUES (30, 23, 'Form isian Satuan Polisi Pamong Praja', 'Permintaan Satpol PP.xlsx-1623915602.xlsx', NULL, '2021-06-17 07:40:02', '2021-06-18 02:28:06', NULL, NULL, 4, NULL, NULL, 1, 23, 'asli', NULL);
INSERT INTO `opd_file` VALUES (31, 22, 'Form isian Inspektorat', 'Permintaan Data Inspektorat.xlsx-1624240708.xlsx', NULL, '2021-06-21 01:58:28', '2021-06-22 06:38:44', NULL, NULL, 4, NULL, NULL, 2, 22, 'asli', NULL);
INSERT INTO `opd_file` VALUES (32, 13, 'Form isian Dinas Perpustakaan dan Kearsipan', 'Permintaan data Dispusip.xlsx-1624251931.xlsx', NULL, '2021-06-21 05:05:31', '2021-06-21 05:05:31', NULL, NULL, 4, NULL, NULL, NULL, 13, 'asli', NULL);
INSERT INTO `opd_file` VALUES (34, 9, 'IPM Kabupaten Ciamis Tahun 2010 - 2020', 'IPM Kabupaten Ciamis Tahun 2010 - 2020.csv-1624593360.csv', NULL, '2021-06-25 03:56:00', '2021-06-25 03:57:12', NULL, 'Dataset ini berisi tabel IPM di Kabupaten Ciamis Tahun 2010-2020.', 4, NULL, NULL, NULL, 9, 'publikasi', 'Dataset ini berisi tabel IPM di Kabupaten Ciamis Tahun 2010-2020.\r\n\r\n- Kolom 1 berisi data tahun pengumpulan data.\r\n- Kolom 2 berisi data nilai IPM.');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for uptd_opd
-- ----------------------------
DROP TABLE IF EXISTS `uptd_opd`;
CREATE TABLE `uptd_opd`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `opd_id` int(11) NULL DEFAULT NULL,
  `nama_uptd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uptd_opd
-- ----------------------------
INSERT INTO `uptd_opd` VALUES (9, 22, 'Bidang Kinerja Pembangunan Daerah', NULL, '2021-06-07 02:31:36', '2021-06-07 02:31:36');
INSERT INTO `uptd_opd` VALUES (14, 31, 'UPTD Puskesmas Ciamis', NULL, '2021-06-16 02:26:13', '2021-06-16 02:26:13');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_admin` int(10) NULL DEFAULT NULL,
  `opd_parent` int(10) NULL DEFAULT NULL,
  `uptd_parent` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'administrator', 'admin@gmail.com', NULL, '$2y$10$jwtTqB52QTzvf34diRNcxuL.2le6b8OQPCVWX.EjfuQsp5HOvycZ6', NULL, NULL, NULL, 'super admin', 'admin', NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'Bidang PSDE', 'statistik@gmail.com', NULL, '$2y$10$NwfZt9F4Ub0xGfPjsqmhsuh3yI7Qwa6eXsHucnVT/O8yKfh9b0KAG', NULL, '2021-05-04 07:54:53', '2021-05-04 07:54:53', 'super admin', 'statistik', NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 'Sekretariat Daerah', 'setda@gmail.com', NULL, '$2y$10$CKDIi2lsgohVsA9ZQ2UsLe.TIO9VAILihr2u3Q131rkH2cXy/TV3C', NULL, '2021-06-17 06:45:03', '2021-06-17 06:45:03', 'Admin', 'setda.ciamis', NULL, 37, NULL);
INSERT INTO `users` VALUES (18, 'Sekretariat DPRD', 'setwan@gmail.com', NULL, '$2y$10$oLOaokXOvnphEttOtRWzFeN2iz1hN6sprG/Kh7gNu.3PIqUh4Lxt.', NULL, '2021-06-17 06:47:28', '2021-06-17 06:47:28', 'Admin', 'setwan.ciamis', NULL, 38, NULL);
INSERT INTO `users` VALUES (19, 'Badan Perencanaan Pembangunan Daerah', 'bappeda@gmail.com', NULL, '$2y$10$fDYi2OanrDKfSVlcB3MyZuN/LmWqTK1hX36Swkp0p557RWZs1On7y', NULL, '2021-06-17 06:48:46', '2021-06-17 06:48:46', 'Admin', 'bappeda.ciamis', NULL, 9, NULL);
INSERT INTO `users` VALUES (20, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'bkpsdm@gmail.com', NULL, '$2y$10$tSoMUOnsy1KaPp9rjOVf6e.yLJdK85YFlHt0m2i7cTG8Jpfjt2d1q', NULL, '2021-06-17 06:50:14', '2021-06-17 06:50:14', 'Admin', 'bkpsdm.ciamis', NULL, 16, NULL);
INSERT INTO `users` VALUES (21, 'Badan Penanggulangan Bencana Daerah', 'bpbd@gmail.com', NULL, '$2y$10$z15jldnqHZq7b3p0kmtDKufXtEvY5tVrHboaEaps1UomFi1nJsyT2', NULL, '2021-06-17 06:55:25', '2021-06-17 06:55:25', 'Admin', 'bpbd.ciamis', NULL, 39, NULL);
INSERT INTO `users` VALUES (22, 'Badan Pengelola Keuangan Daerah', 'bpkd@gmail.com', NULL, '$2y$10$51ZShzcLK9PN.M6a0y2jVuFComSD29zzsatB.FMDUZ2G3aTquuqgC', NULL, '2021-06-17 06:56:28', '2021-06-17 06:56:28', 'Admin', 'bpkd.ciamis', NULL, 29, NULL);
INSERT INTO `users` VALUES (23, 'Dinas Pemberdayaan Masyarakat dan Desa', 'dpmd@gmail.com', NULL, '$2y$10$r/tJrimszd8OCycS4Q43le6UbvVRUK7PmcoTwwKKHQTRQkB6mO/bW', NULL, '2021-06-17 06:58:38', '2021-06-17 06:58:38', 'Admin', 'dpmd.ciamis', NULL, 33, NULL);
INSERT INTO `users` VALUES (24, 'Dinas Pertanian dan Ketahanan Pangan', 'dpkp@gmail.com', NULL, '$2y$10$sFMMpSzumq2gI.qd9Nl7RuQ2ArsMEjXMf8FbVeP/LAQsePMhwSrCu', NULL, '2021-06-17 07:00:26', '2021-06-17 07:00:26', 'Admin', 'dpkp.ciamis', NULL, 26, NULL);
INSERT INTO `users` VALUES (25, 'Dinas Kesehatan', 'dinkes@gmail.com', NULL, '$2y$10$76jecJPd7yEvoMhYMI66/.mQC1QMOJ3hsnJw5cBPHqe2MXa8zHanu', NULL, '2021-06-17 07:01:14', '2021-06-17 07:01:14', 'Admin', 'dinkes.ciamis', NULL, 31, NULL);
INSERT INTO `users` VALUES (26, 'Dinas Sosial', 'dinsos@gmail.com', NULL, '$2y$10$peZPq2iEdZfksVs.ZGfPYulbJun.RmKNQewT4TLwhW56T88RnAHHi', NULL, '2021-06-17 07:02:14', '2021-06-17 07:02:14', 'Admin', 'dinsos.ciamis', NULL, 20, NULL);
INSERT INTO `users` VALUES (27, 'Dinas Kebudayaan, Pemuda dan Olah Raga', 'disbudpora@gmail.com', NULL, '$2y$10$R4FAxYRwaK1NKsiPpnEBZ.iP.eBggtEFRW71gujX.vUa.XjXtHxgi', NULL, '2021-06-17 07:03:27', '2021-06-17 07:03:27', 'Admin', 'disbudpora.ciamis', NULL, 10, NULL);
INSERT INTO `users` VALUES (28, 'Dinas Pendidikan', 'disdik@gmail.com', NULL, '$2y$10$SXhzZgGwo6YqNHa9wMQBRu.WnnATqO0G6sim1wGLNQxagqGpUxB3W', NULL, '2021-06-17 07:04:33', '2021-06-17 07:04:33', 'Admin', 'disdik.ciamis', NULL, 34, NULL);
INSERT INTO `users` VALUES (29, 'Dinas Komunikasi dan Informatika', 'diskominfo@gmail.com', NULL, '$2y$10$gAgV5ODNbpzgTvENPYbmsOfcFS2nxDdsATSRLdR9S.Xv4zQAkNt9G', NULL, '2021-06-17 07:05:58', '2021-06-17 07:05:58', 'Admin', 'diskominfo.ciamis', NULL, 35, NULL);
INSERT INTO `users` VALUES (30, 'Dinas Perhubungan', 'dishub@gmail.com', NULL, '$2y$10$VH7zd2Wt3zoTHrFPhvXRce7NplMkkYOyFTF0epqXsG/JlKtC5mhCG', NULL, '2021-06-17 07:06:54', '2021-06-17 07:06:54', 'Admin', 'dishub.ciamis', NULL, 15, NULL);
INSERT INTO `users` VALUES (31, 'Dinas Perumahan Rakyat, Kawasan Pemukiman dan Lingkungan Hidup', 'dprkplh@gmail.com', NULL, '$2y$10$RAn.iH5KN5MDlmsvzNk33OPl4Mn829VRzkYfqk21OjMgmK/ppVdIq', NULL, '2021-06-17 07:08:07', '2021-06-17 07:08:07', 'Admin', 'dprkplh.ciamis', NULL, 14, NULL);
INSERT INTO `users` VALUES (32, 'Dinas Peternakan dan Perikanan', 'disnakan@gmail.com', NULL, '$2y$10$PQp7PSbE0Fz7hmitrHK2R.V.oU5V6NfUEXNa6cukyNA8wF0YeVdcO', NULL, '2021-06-17 07:09:03', '2021-06-17 07:09:03', 'Admin', 'disnakan.ciamis', NULL, 24, NULL);
INSERT INTO `users` VALUES (33, 'Dinas Tenaga Kerja', 'disnaker@gmail.com', NULL, '$2y$10$bZ.CDmcnTnJK7H.1gzigrOQmoc8ci2osozX5UJjG7tL3NK14fiDuK', NULL, '2021-06-17 07:10:05', '2021-06-17 07:10:05', 'Admin', 'disnaker.ciamis', NULL, 28, NULL);
INSERT INTO `users` VALUES (34, 'Dinas Koperasi, UKM dan Perdagangan', 'dkukmp@gmail.com', NULL, '$2y$10$daJcMt1TQTlPwpspIKt3DudTFWHEPeKD01D8sR.Fhvo1ToMZM6Nla', NULL, '2021-06-17 07:11:42', '2021-06-17 07:11:42', 'Admin', 'dkukmp.ciamis', NULL, 27, NULL);
INSERT INTO `users` VALUES (35, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'dpmptsp@gmail.com', NULL, '$2y$10$YQiqg7VuJS03.o1k8LHF0eGqI62tkQD7dQC7M4yXXmU1qjUAYPaCq', NULL, '2021-06-17 07:13:03', '2021-06-17 07:13:03', 'Admin', 'dpmptsp.ciamis', NULL, 30, NULL);
INSERT INTO `users` VALUES (36, 'Dinas Pekerjaan Umum, Penataan Ruang, dan Pertanahan', 'dpuprp@gmail.com', NULL, '$2y$10$0CwT7fyN9cQTiHVHsv/xXemmiVhNq3idaz.T8TZz5XqVul38Ywm1W', NULL, '2021-06-17 07:13:58', '2021-06-17 07:13:58', 'Admin', 'dpuprp.ciamis', NULL, 18, NULL);
INSERT INTO `users` VALUES (37, 'Badan Kesatuan Bangsa dan Politik', 'kesbangpol@gmail.com', NULL, '$2y$10$qZQwM4uj38tHZKS3wO.NBOjTzh2RdIW1ThvjxAxvR4deA30uI0FhG', NULL, '2021-06-17 07:15:00', '2021-06-17 07:15:00', 'Admin', 'kesbangpol.ciamis', NULL, 36, NULL);
INSERT INTO `users` VALUES (38, 'Satuan Polisi Pamong Praja', 'satpolpp@gmail.com', NULL, '$2y$10$IK/dhxksrhGB94afW0NxYeB7Ujoe.egizOQ29iiYWv2WTu.ApJG4.', NULL, '2021-06-17 07:16:27', '2021-06-17 07:16:27', 'Admin', 'satpolpp.ciamis', NULL, 23, NULL);
INSERT INTO `users` VALUES (39, 'Dinas Perpustakaan dan Kearsipan', 'diperpuska@gmail.com', NULL, '$2y$10$P2gBH6gH8mn9gwIzqwFExufVbiI7m/7TFGfpV590kRAxkldmI0hsG', NULL, '2021-06-17 07:17:27', '2021-06-17 07:17:27', 'Admin', 'diperpuska.ciamis', NULL, 13, NULL);
INSERT INTO `users` VALUES (40, 'Inspektorat', 'inspektorat@gmail.com', NULL, '$2y$10$RoiNwyvvE111lyekaxPXc.rr9sY.Q.hsSESgEltqtmR4d2j7FsKSi', NULL, '2021-06-17 07:18:32', '2021-06-17 07:18:32', 'Admin', 'inspektorat.ciamis', NULL, 22, NULL);
INSERT INTO `users` VALUES (41, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'dppkbp3a@gmail.com', NULL, '$2y$10$qtXpEjD2S00F6GUxi9EO8uQU3.6tdMbulzFPU5rqTxdF6yzC.B.8a', NULL, '2021-06-17 07:19:40', '2021-06-17 07:19:40', 'Admin', 'dppkbp3a.ciamis', NULL, 19, NULL);
INSERT INTO `users` VALUES (42, 'Dinas Pariwisata', 'dispar@gmail.com', NULL, '$2y$10$UF0DyVJFaxtv8bI3LKc5ruSAaJEC2Z1iOhiW8w92ETPsZ.nfYF3Iq', NULL, '2021-06-17 07:20:29', '2021-06-17 07:20:29', 'Admin', 'dispar.ciamis', NULL, 32, NULL);
INSERT INTO `users` VALUES (43, 'Rumah Sakit Umum Daerah Ciamis', 'rsud@gmail.com', NULL, '$2y$10$dbk0I2hil9MDYENrK6DxX.df9Ok40PaBN97Pv.3VmuK1TgNmvKaEW', NULL, '2021-06-17 07:21:38', '2021-06-17 07:21:38', 'Admin', 'rsud.ciamis', NULL, 5, NULL);
INSERT INTO `users` VALUES (44, 'Dinas Kependudukan dan Pencatatan Sipil', 'disdukcapil@gmail.com', NULL, '$2y$10$ODYetU/nFb.uueA1ZjuSeezmi3R35n2clLsIQ/8Gw1kJbOiaA/97K', NULL, '2021-06-17 07:22:38', '2021-06-17 07:22:38', 'Admin', 'disdukcapil.ciamis', NULL, 12, NULL);

SET FOREIGN_KEY_CHECKS = 1;
