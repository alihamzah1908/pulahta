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

 Date: 22/06/2021 13:39:33
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
