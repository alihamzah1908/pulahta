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

 Date: 11/10/2021 10:01:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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

SET FOREIGN_KEY_CHECKS = 1;
