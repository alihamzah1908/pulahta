/*
 Navicat Premium Data Transfer

 Source Server         : localnew
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : pullahta

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 11/10/2021 09:43:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
INSERT INTO `users` VALUES (25, 'Dinas Kesehatan', 'dinkes@gmail.com', NULL, '$2y$10$76jecJPd7yEvoMhYMI66/.mQC1QMOJ3hsnJw5cBPHqe2MXa8zHanu', NULL, '2021-06-17 07:01:14', '2021-06-17 07:01:14', 'Admin', 'dinkes.ciamis', 45, 31, NULL);
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
INSERT INTO `users` VALUES (45, 'Puskesmas Ciamis', 'pkmciamis@gmail.com', NULL, '$2y$10$76jecJPd7yEvoMhYMI66/.mQC1QMOJ3hsnJw5cBPHqe2MXa8zHanu', NULL, '2021-06-17 07:01:14', '2021-06-17 07:01:14', 'Staff', 'pkmciamis', 31, 31, 14);

SET FOREIGN_KEY_CHECKS = 1;
