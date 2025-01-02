/*
 Navicat Premium Data Transfer

 Source Server         : lokal mysql
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : kopkar

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 02/01/2025 09:21:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggota`;
CREATE TABLE `tb_anggota`  (
  `anggota_id` int NOT NULL AUTO_INCREMENT,
  `koperasi_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_gabung` date NOT NULL,
  `kode_toko` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bank` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rek` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` char(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT NULL,
  `flag` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1',
  `token` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`anggota_id`) USING BTREE,
  UNIQUE INDEX `user_name`(`username` ASC) USING BTREE,
  UNIQUE INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 136 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_anggota
-- ----------------------------
INSERT INTO `tb_anggota` VALUES (1, '3000', 'ADMIN', '2023-10-06', '', '2023-10-06', '06001', '', '', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', '1', '2023-10-06 16:03:13', '2024-12-16 18:32:23', '1', 'eyJpdiI6ImlOZ0tFa1VsQlE0bElMRHIiLCJ2YWx1ZSI6InhkSGZ3RmxOQXphN0hvQTlmRnk1VUpNOSs5dElBbmNhRFZPTEdhK2dyaCtXRFNobW1vSnhlNCt2UXdSK1NranZBVmYvZTdkY3ZQVzN3OG5PL1ZRQjBaUklaR0JibEM1aEplM29YMmk3WHM3QTRYd0dCN3hwWnRSeWRrcjM3RElrMk9uclEyZlRsdmo1YkRXVm5iN3E4UW5uSVhIYjI3a1BONHhxU1NkcUMxbUZwUTNhdmUrUzJXdE5GWWhiN21USlNQeExVTWw2ZVJucUc1MUlhMFJLTzBxRkw2blk3NW81RzFzRGNkcFNDT0pzL1JxU3ZmQXk4eEFzdXB5MnJGTWQ3YXRtV2ZUM2cxTVlKUVEreFNkQ1Z0MUpYQnJBbCs0ZzZoWlRuRjh1cERpWVZIRzlPYU9FL3dzR2lsL21BaVU0WmJhVVh5a0NRdU5lQXllZU41RU12NVhJbjhXeHplZDR2UWNGOTZyTmxYckdSeTNLSy9BZ09pMTh0OFFoOGx3dUQ4UlFTMnhhMkRFcm1td21ZU2pYV2VkRnFEejFLNTRacWNyMkxEdEpJUS9NK1Y4YW42SG4waGFxakhSMjlYM3RMTW5sczZUTTBPbFpTQ0QrbUlYNnUrT3dqbHl0SjdacEdRZ1A0SzVmdUhQYS9NQU9XT1RIQlN0ZjROcUM3d2F0VXExbTRiZW9KVXp2dVFUWU8xQWF4MEo1c1VUZzdnQzZQL2gySit0SiIsIm1hYyI6IiIsInRhZyI6ImVVZlpmUGxOMU5oSzRwRXhJNi9LcWc9PSJ9');
INSERT INTO `tb_anggota` VALUES (128, '3001', 'RIDWAN HAKIM', '2007-02-06', 'DEPOK', '2023-10-06', '06000', 'BANK BCA', '0381398183', 'ridwan', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '2023-10-06 16:22:24', '2024-12-29 20:44:35', '1', 'eyJpdiI6IjB6S1ZYNElTWW5FSlRBNFgiLCJ2YWx1ZSI6Ijd4bDdjOWJpV3JyNFFQLzdQUGlYZ1cxdkZuSkpGSnJaYTJGblA5bDlKa2J5djFpTVl0Q1g3cUhjeEluQU9jcFBpajIxMXRsVUxvVDhUR2k0RFFpWEhYb2prVWE3bkpBa0VOKzRvWnBTYlltbkJOT0RsS1FMMVZITnlKSVhmN1huMmRXNVFJdlNGU3cyd2hEOHZFWWFDNzdGMTRvV012OHN6eklhZml5d3ppRXpsSTlQZkZpZVZxMmttZ3NLKzQ5T2JOVHFYeTA1b3JwMjgyekVYc3N0cXdhZ2t2YWZRODJTUVRjQzdiRjlEcnAyekUxbHZEcnM5UENvSkpXMXpJRmF5aHFKbHc2dnJtOEtZdGZ3RlNWanJUeVNiQTRnVlRYUHlDSG10NmU0NmhDbnJ0ajdwdmlkc3JralpQWjR6SkhLbTFtRE1FOGIvc3VISHpXaGFjczdmMkEvU05oT20vMEJiNjlqYVVScXdTZWwwbjNGbWEvdXgwQk9JT09waWxiWWxHOEpLbk1ueXA5amo0K20yell0cDJmM0hDWWkrZHJPYWdWUVRYWGJBUVJ5aE0zUmV4U2JWSStwUy9icDBkaEtkd1VUNVJDRSs5ZTIzNkZOQWNJaFlPOUJxTkVVVGVLM3BleFhpcjdyeTJvNnVmL1pqWjF6NHNtelRscjlVWndXNU5XbHdnYkhyTmQvVHdoQWVTelYxYndBaHQvbDRuSm9CWmV2Q3JxTEcyS28yazZkcXhrVkF0bzJWS2phZnhCR2NwenhhSnVidTkraktVZVFWN21tOG1ya0svbmp0UGFXSWVJM05TMk40VTA9IiwibWFjIjoiIiwidGFnIjoid21OMENKQm9xR3FETUJiT2ljaEg0UT09In0=');
INSERT INTO `tb_anggota` VALUES (129, '3002', 'HAKIM', '2023-07-05', 'jjl', '2023-10-29', '06002', 'BANK BRI', '1352435667', 'hakim', 'f0830fa0b7cff627cc3b98df467c9a29a5097ae4', '2', '2023-10-29 05:42:00', '2024-12-25 21:00:56', '1', 'eyJpdiI6Inl3TW1QS0dOQlpFU1hSYngiLCJ2YWx1ZSI6ImpkMjV6MldxMzU1SFVBaDJQRjJRd05HZ0hQTmlZMVVzYWNEK3cybU9xNjJDMmFLbEhaei8zZTNMKzFvd29HcFpCZU9kaVBHVExhVmZnVzZmdFplWjVLaUY3V0Zsb0tpZWJWNHg0TmxSL1V2TXVKaEpsdmxpaGorbjcwd3FuekFEV3V6OGNxbk03NDY2VTdhcUhaejVtRkVYS1FqcXFNY29pZmxjVlBKWjN3NWxGUGlseFpTZitwL2V0TlE3L3FvdVh3VWFMYzlJOXdSN004MGt0aWgraTdwd3FpUHhUTkV2aXF3d2Y3czZZdUJBeXJaSmd3a0VLRzVXZU5mcHRjbTg5QkZjZTVqOG1HcngxYkErdDN3dE8yMExzU3c5Q2pOc25oaHR2WDJpS2RuNEpnQ3dBUmxKV0NjMTAzb01OSHJ1d05UbjZKREc4eVpFeHNKNks4R29SUnZIQ0Q0TGt5M1M0UDFvbG9IQlBiWUFJRUJyWjBMNTllTlArTkVjUkxtSW5Tek5OSmNKZEZyMHVYeFRaUHFnZ1R2T1N3b1c1MkI2M2F1NFRBd1hNa1lIYWRZaUg4Y3hseThSZzBhd1JhNHFILzZVZVkxNE9WZUhiVEhibTlodmFwdCs5S1hMN2dTdlhKbmVOT1ZXRFVVTTlxTmxrd3dOZ01rdzRiRFc3c3JUNldYQjI5S2NkNFc5SzVZK296aEtIZGdUMXpYQTVTK2Q3T3RzWDd2ZXBHR3ZtbXRrYW50akYrVlpaU3o4aU9oZWNFek9kUVNJV1B1cEJYbUp1ZzBNNGU5K2hzUkpPQT09IiwibWFjIjoiIiwidGFnIjoiZlFZSFVobkJqZVI5OE1aRGQ3dTRidz09In0=');
INSERT INTO `tb_anggota` VALUES (132, '3003', 'TESTING', '2023-10-06', '', '2023-10-06', '06001', '', '', 'testing', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2', '2023-10-06 16:03:13', '2024-12-26 08:46:14', '1', 'eyJpdiI6ImMwMjJ3d29JcVh3VVZxa1EiLCJ2YWx1ZSI6ImxMVnlhRUovZWUzSXZMR2ZzSnM2ZzRqQUt3VkQwNXBLUC9yS2lnb1dBU1RBaExLQmpPMEloTEIyTFVOQksxRHc5Z0VueEhseFJhRVUvbkhUL1B5SmlLMmVBeXVHWVRUYTB2bldXbkUwSDJxbGpnenJrbS90aW9QWG54Rno5STcxMHFmUEJvWFZXaHU2VWRoYjNqNzd6WXBGRW5IdE5wMG8yazZUZmZINUJRMURDR3MyMnRDOHpIcTdOaXpyMVZHU1crQ005Qi9MM21ZK2FrSUtMR2YvZkRFODZKa2NhSmZVVFh2c3AweUtnZTh1WjJSVExReEV2Y0FKK0RreC9lWGZTeUlrQWhJdm0rSGVpTStzeG0vN0xaL0pHb1dOQ2hkSkpMWmg4aldHVlk5ZzF6TGpXOTIwR2tEdUdFb3I3SXZ4U0hzUVdFQVpLTXZDd1N1Z0xtYXRtaXlxd3hFVFpxcm15RXllelJCMUgxQmtzcWJLS2hYcFJPK1dGblNwTzFJZzBjK1V4YUY0RVlFdDdPVldGQTdkRmlkUkFlekI0ak9VZ3pLRWUyMzBtQ2RKNmRCTlNIejZ6RFNCMFNpRVhMU2swVkN5WXBUNzZDbnJGblZDaENZRTY5a0tybXNWUjlTSThlSkF3K3NIbHJSZkovWk9wQVdYVk1PbkZJdG1FQzZoelZJY3M4RzdlZVRMYjhSOUhETkdxY1V3NVhLWGExbnRUZXAwQ2JGTStBdjl1eFBCeSs3SzhZbkJIY1NTR2tvN2l2cGZpNGs9IiwibWFjIjoiIiwidGFnIjoiWjYyaFV3Z3NYTGpqdDl1VS91Q1JWQT09In0=');

-- ----------------------------
-- Table structure for tb_bank
-- ----------------------------
DROP TABLE IF EXISTS `tb_bank`;
CREATE TABLE `tb_bank`  (
  `bank_id` int NOT NULL AUTO_INCREMENT,
  `kode_bank` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bank` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`bank_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_bank
-- ----------------------------
INSERT INTO `tb_bank` VALUES (1, '002', 'BANK BRI');
INSERT INTO `tb_bank` VALUES (2, '014', 'BANK BCA');
INSERT INTO `tb_bank` VALUES (3, '008', 'BANK MANDIRI');
INSERT INTO `tb_bank` VALUES (4, '009', 'BANK BNI');
INSERT INTO `tb_bank` VALUES (5, '111', 'BANK DKI');

-- ----------------------------
-- Table structure for tb_kegiatan_simpanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kegiatan_simpanan`;
CREATE TABLE `tb_kegiatan_simpanan`  (
  `keg_simpan_id` int NOT NULL AUTO_INCREMENT,
  `kode_kegiatan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `koperasi_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_simpanan` enum('Wajib','Sukarela','Pokok') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `aksi` enum('Masuk','Keluar') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int NOT NULL,
  `transaksi` enum('Payroll','Transfer','Cash') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_kwitansi` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengurus` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `bukti_transfer` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`keg_simpan_id`) USING BTREE,
  INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE,
  CONSTRAINT `tb_kegiatan_simpanan_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 66 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kegiatan_simpanan
-- ----------------------------
INSERT INTO `tb_kegiatan_simpanan` VALUES (27, 'KK2408100001', '3001', 'Sukarela', 'Masuk', 30000000, 'Cash', '32456464', '3000', '2024-08-10', '2024-08-10 09:06:40', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (28, 'KK2408100002', '3001', 'Sukarela', 'Masuk', 1234000, 'Transfer', '25252', '3000', '2024-08-10', '2024-08-10 12:12:22', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (29, 'KK2412040001', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '123', '3000', '2024-12-04', '2024-12-04 19:10:41', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (30, 'KK2412040002', '3001', 'Sukarela', 'Masuk', 10000, 'Transfer', '1122', '3000', '2024-12-04', '2024-12-04 19:12:01', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (31, 'KK2412230001', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1148535', '3001', '2024-12-23', '2024-12-23 10:27:12', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (32, 'KK2412230002', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1485118', '3001', '2024-12-23', '2024-12-23 10:27:24', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (33, 'KK2412230003', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1079724', '3001', '2024-12-23', '2024-12-23 10:27:27', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (34, 'KK2412230004', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1605180', '3001', '2024-12-23', '2024-12-23 10:28:16', 'bukti_transfer_3001_241216-0e9c4f6971.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (35, 'KK2412230005', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1007936', '3001', '2024-12-23', '2024-12-23 10:45:36', 'bukti_transfer_3001_241216-0e9c4f6971.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (36, 'KK2412230006', '3001', 'Sukarela', 'Masuk', 1004400, 'Transfer', '1226679', '3001', '2024-12-23', '2024-12-23 10:45:46', 'bukti_transfer_3001_241216-0e9c4f6971.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (37, 'KK2412230007', '3001', 'Sukarela', 'Masuk', 15400, 'Transfer', '1127191', '3001', '2024-12-23', '2024-12-23 10:46:01', 'bukti_transfer_3001_241216-0e9c4f6971.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (38, 'KK2412230008', '3001', 'Sukarela', 'Masuk', 15400, 'Transfer', '1928162', '3001', '2024-12-23', '2024-12-23 11:01:13', 'bukti_transfer_3001_241216-0e9c4f6971.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (39, 'KK2412230009', '3001', 'Sukarela', 'Masuk', 2000000, 'Transfer', '1107109', '3001', '2024-12-23', '2024-12-23 22:17:03', 'bukti_transfer_3001_241223-9a62e0595d.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (40, 'KK2412240001', '3001', 'Sukarela', 'Masuk', 20000, 'Transfer', '1453591', '3001', '2024-12-24', '2024-12-24 16:58:04', 'bukti_transfer_3001_241224-1b3e886fce.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (41, 'KK2412240002', '3001', 'Sukarela', 'Masuk', 50000000, 'Transfer', '1395451', '3001', '2024-12-24', '2024-12-24 17:10:10', 'bukti_transfer_3001_241224-18fa733b1e.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (42, 'KK2412240003', '3001', 'Sukarela', 'Keluar', 50000000, 'Transfer', '188888', '3000', '2024-12-24', '2024-12-24 17:12:28', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (43, 'KK2412240004', '3001', 'Sukarela', 'Masuk', 50000, 'Transfer', '1679540', '3001', '2024-12-24', '2024-12-24 17:24:24', 'bukti_transfer_3001_241224-5764636914.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (44, 'KK2412250001', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1717491', '3001', '2024-12-25', '2024-12-25 21:14:23', 'bukti_transfer_3001_241225-14cb7523c6.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (45, 'KK2412250002', '3001', 'Sukarela', 'Keluar', 5000000, 'Transfer', '1234', '3000', '2024-12-25', '2024-12-25 21:17:59', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (46, 'KK2412260001', '3001', 'Sukarela', 'Masuk', 123456, 'Transfer', '1435541', '3001', '2024-12-26', '2024-12-26 08:03:57', 'bukti_transfer_3001_241226-02ba582749.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (47, 'KK2412260002', '3001', 'Sukarela', 'Masuk', 123456, 'Transfer', '1297982', '3001', '2024-12-26', '2024-12-26 08:04:11', 'bukti_transfer_3001_241226-d74ff65c97.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (48, 'KK2412260003', '3001', 'Sukarela', 'Masuk', 123456, 'Transfer', '1152786', '3001', '2024-12-26', '2024-12-26 08:04:19', 'bukti_transfer_3001_241226-513d17507f.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (49, 'KK2412260004', '3001', 'Sukarela', 'Masuk', 54321, 'Transfer', '1732440', '3001', '2024-12-26', '2024-12-26 08:06:29', 'bukti_transfer_3001_241226-fb170cf975.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (50, 'KK2412260005', '3001', 'Sukarela', 'Masuk', 54321, 'Transfer', '1322399', '3001', '2024-12-26', '2024-12-26 08:06:39', 'bukti_transfer_3001_241226-5b7035fee4.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (51, 'KK2412260006', '3001', 'Sukarela', 'Masuk', 366366, 'Transfer', '1865337', '3001', '2024-12-26', '2024-12-26 08:15:14', 'bukti_transfer_3001_241226-810b7836e9.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (52, 'KK2412260007', '3001', 'Sukarela', 'Masuk', 36569808, 'Transfer', '1632408', '3001', '2024-12-26', '2024-12-26 08:44:18', 'bukti_transfer_3001_241226-b1279185cd.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (53, 'KK2412260008', '3001', 'Sukarela', 'Masuk', 2, 'Transfer', '1691182', '3001', '2024-12-26', '2024-12-26 08:44:55', 'bukti_transfer_3001_241226-fd6f5b366e.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (54, 'KK2412260009', '3001', 'Sukarela', 'Masuk', 5, 'Transfer', '1373991', '3001', '2024-12-26', '2024-12-26 08:45:54', 'bukti_transfer_3001_241226-0eb026f0cf.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (55, 'KK2412260010', '3003', 'Sukarela', 'Masuk', 25858, 'Transfer', '1663508', '3003', '2024-12-26', '2024-12-26 08:46:28', 'bukti_transfer_3003_241226-e1bc3fbd7f.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (56, 'KK2412260011', '3003', 'Sukarela', 'Masuk', 252525, 'Transfer', '1865817', '3003', '2024-12-26', '2024-12-26 08:47:04', 'bukti_transfer_3003_241226-a878769f18.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (57, 'KK2412260012', '3001', 'Sukarela', 'Masuk', 10, 'Transfer', '1977025', '3001', '2024-12-26', '2024-12-26 08:47:06', 'bukti_transfer_3001_241226-920fae1324.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (58, 'KK2412260013', '3001', 'Sukarela', 'Masuk', 10, 'Transfer', '1840260', '3001', '2024-12-26', '2024-12-26 08:47:12', 'bukti_transfer_3001_241226-25466c230a.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (59, 'KK2412260014', '3001', 'Sukarela', 'Masuk', 10, 'Transfer', '1563393', '3001', '2024-12-26', '2024-12-26 08:47:13', 'bukti_transfer_3001_241226-e2af1666f3.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (60, 'KK2412260015', '3003', 'Sukarela', 'Masuk', 25, 'Transfer', '1701449', '3003', '2024-12-26', '2024-12-26 08:47:35', 'bukti_transfer_3003_241226-c6d3af8750.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (61, 'KK2412260016', '3001', 'Sukarela', 'Masuk', 8, 'Transfer', '1332729', '3001', '2024-12-26', '2024-12-26 08:47:58', 'bukti_transfer_3001_241226-c8a3d4ed47.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (62, 'KK2412260017', '3001', 'Sukarela', 'Masuk', 6, 'Transfer', '1449200', '3001', '2024-12-26', '2024-12-26 08:48:20', 'bukti_transfer_3001_241226-2157c22455.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (63, 'KK2412260018', '3001', 'Sukarela', 'Keluar', 10000000, 'Transfer', '1001', '3000', '2024-12-26', '2024-12-26 12:23:15', NULL);
INSERT INTO `tb_kegiatan_simpanan` VALUES (64, 'KK2412260019', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1631150', '3001', '2024-12-26', '2024-12-26 12:36:54', 'bukti_transfer_3001_241226-578a0b7b9b.jpeg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (65, 'KK2412260020', '3001', 'Sukarela', 'Masuk', 50000, 'Transfer', '1579252', '3001', '2024-12-26', '2024-12-26 15:10:27', 'bukti_transfer_3001_241226-5188889f62.jpeg');

-- ----------------------------
-- Table structure for tb_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_pembayaran`;
CREATE TABLE `tb_pembayaran`  (
  `pembayaran_id` int NOT NULL AUTO_INCREMENT,
  `no_pembayaran` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_pinjaman` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `koperasi_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_pinjaman` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `aksi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_kwitansi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `transaksi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `besar_angsuran` int NOT NULL,
  `shu_bln` int NOT NULL,
  `qty` int NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `pengurus` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`pembayaran_id`) USING BTREE,
  INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE,
  INDEX `no_pinjaman`(`no_pinjaman` ASC) USING BTREE,
  CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`no_pinjaman`) REFERENCES `tb_pinjaman` (`no_pinjaman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pembayaran
-- ----------------------------
INSERT INTO `tb_pembayaran` VALUES (14, 'PB2408100001', 'PJ2310180002', '3001', 'SOFTLOAN', 'Bayar', '121331', 'Payroll', 500000, 0, 1, '2024-08-10', '3000');
INSERT INTO `tb_pembayaran` VALUES (15, 'PB2408100002', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '343222', 'Payroll', 833333, 0, 1, '2024-08-10', '3000');
INSERT INTO `tb_pembayaran` VALUES (16, 'PB2408100003', 'PJ2310180001', '3001', 'HARDLOAN', 'Bayar', '344254', 'Payroll', 41667, 0, 1, '2024-08-10', '3000');
INSERT INTO `tb_pembayaran` VALUES (17, 'PB2412040001', 'PJ2408100002', '3000', 'SOFTLOAN', 'Bayar', '1231', 'Payroll', 235246356, 0, 1, '2024-12-04', '3000');
INSERT INTO `tb_pembayaran` VALUES (18, 'PB2412040002', 'PJ2409190001', '3002', 'HARDLOAN', 'Bayar', '122222', 'Payroll', 83333, 0, 1, '2024-12-04', '3000');
INSERT INTO `tb_pembayaran` VALUES (19, 'PB2412250001', 'PJ2409190001', '3002', 'HARDLOAN', 'Bayar', '1234', 'Payroll', 83333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (20, 'PB2412250002', 'PJ2412240002', '3001', 'HARDLOAN', 'Bayar', '1351', 'Payroll', 625000, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (21, 'PB2412250003', 'PJ2412240001', '3001', 'HARDLOAN', 'Bayar', '123', 'Payroll', 625000, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (22, 'PB2412250004', 'PJ2412240002', '3001', 'HARDLOAN', 'Bayar', '23', 'Payroll', 625000, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (23, 'PB2412250005', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '13', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (24, 'PB2412250006', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '123', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (25, 'PB2412250007', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '121', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (26, 'PB2412250008', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '2e21', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (27, 'PB2412250009', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '536', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (28, 'PB2412250010', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '1333', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (29, 'PB2412250011', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '135135', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (30, 'PB2412250012', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '24626', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (31, 'PB2412250013', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '2462', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (32, 'PB2412250014', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '2463', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');
INSERT INTO `tb_pembayaran` VALUES (33, 'PB2412250015', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '535', 'Payroll', 833333, 0, 1, '2024-12-25', '3000');

-- ----------------------------
-- Table structure for tb_pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengajuan`;
CREATE TABLE `tb_pengajuan`  (
  `pengajuan_id` int NOT NULL AUTO_INCREMENT,
  `koperasi_id` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_pinjaman` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jumlah_pinjaman` int NOT NULL,
  `lama_angsuran` int NOT NULL,
  `biaya_admin` int NOT NULL,
  `jumlah_kewajiban` int NOT NULL,
  `kewajiban_bulan` int NOT NULL,
  `jenis_pinjaman` enum('HARDLOAN','SOFTLOAN','SHOPPING','ELEKTRONIK','MOTOR') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `shu_kop` int NOT NULL,
  `shu_ang` int NOT NULL,
  `shu_bln` int NOT NULL,
  `status_pengajuan` enum('DISETUJUI','DITOLAK','MENUNGGU') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diajukan` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_proses` date NULL DEFAULT NULL,
  PRIMARY KEY (`pengajuan_id`) USING BTREE,
  INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE,
  CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pengajuan
-- ----------------------------
INSERT INTO `tb_pengajuan` VALUES (34, '3001', 'PJ2310180001', '2023-10-18', 1000000, 24, 0, 1000000, 41667, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2023-10-18');
INSERT INTO `tb_pengajuan` VALUES (35, '3001', 'PJ2310180002', '2023-10-18', 500000, 1, 0, 500000, 500000, 'SOFTLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2023-10-18');
INSERT INTO `tb_pengajuan` VALUES (36, '3001', 'PJ2310180003', '2023-10-18', 10000000, 12, 0, 10000000, 833333, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2024-08-10');
INSERT INTO `tb_pengajuan` VALUES (37, '3001', 'PJ2408100001', '2024-08-10', 150000000, 24, 0, 150000000, 6250000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-08-10');
INSERT INTO `tb_pengajuan` VALUES (38, '3000', 'PJ2408100002', '2024-08-10', 235246356, 1, 0, 235246356, 235246356, 'SOFTLOAN', 0, 0, 0, 'DISETUJUI', '3000', '2024-08-10');
INSERT INTO `tb_pengajuan` VALUES (39, '3002', 'PJ2409190001', '2024-09-19', 1000000, 12, 0, 1000000, 83333, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3002', '2024-09-19');
INSERT INTO `tb_pengajuan` VALUES (40, '3002', 'PJ2409190002', '2024-09-19', 20000000, 24, 0, 20000000, 833333, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3002', NULL);
INSERT INTO `tb_pengajuan` VALUES (41, '3001', 'PJ2412040001', '2024-12-04', 1000000, 12, 0, 1000000, 83333, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3000', NULL);
INSERT INTO `tb_pengajuan` VALUES (42, '3003', 'PJ2412090001', '2024-12-11', 20000000, 23, 0, 20000000, 869565, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3003', NULL);
INSERT INTO `tb_pengajuan` VALUES (43, '3001', 'PJ2412090002', '2024-05-06', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (44, '3001', 'PJ2412090003', '2024-05-06', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (45, '3001', 'PJ2412090004', '2024-05-06', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (46, '3001', 'PJ2412090005', '2024-05-06', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (47, '3001', 'PJ2412130001', '2024-12-13', 15000000, 2, 0, 15000000, 7500000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (48, '3001', 'PJ2412140001', '2024-12-14', 15000000, 10, 0, 15000000, 1500000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (49, '3001', 'PJ2412140002', '2024-12-14', 3580000, 12, 0, 3580000, 298333, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (50, '3001', 'PJ2412140003', '2024-12-14', 11550000, 58, 0, 11550000, 199138, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (51, '3001', 'PJ2412150001', '2024-12-15', 65, 2, 0, 65, 33, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (52, '3001', 'PJ2412150002', '2024-12-15', 15000000, 12, 0, 15000000, 1250000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (53, '3001', 'PJ2412150003', '2024-12-15', 111111, 5, 0, 111111, 22222, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (54, '3001', 'PJ2412150004', '2024-12-15', 368980, 2, 0, 368980, 184490, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (55, '3001', 'PJ2412150005', '2024-12-15', 3, 2, 0, 3, 2, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (56, '3001', 'PJ2412160001', '2024-12-16', 50, 12, 0, 50, 4, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-12-25');
INSERT INTO `tb_pengajuan` VALUES (57, '3002', 'PJ2412160002', '2024-12-16', 15000000, 12, 0, 15000000, 1250000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3002', '2024-12-25');
INSERT INTO `tb_pengajuan` VALUES (58, '3001', 'PJ2412160003', '2024-12-16', 15000000, 12, 0, 15000000, 1250000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-12-25');
INSERT INTO `tb_pengajuan` VALUES (59, '3001', 'PJ2412200001', '2024-12-20', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-12-25');
INSERT INTO `tb_pengajuan` VALUES (60, '3001', 'PJ2412230001', '2024-12-23', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-12-25');
INSERT INTO `tb_pengajuan` VALUES (61, '3001', 'PJ2412230002', '2024-12-23', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-12-25');
INSERT INTO `tb_pengajuan` VALUES (62, '3001', 'PJ2412230003', '2024-12-23', 15000000, 24, 0, 15000000, 625000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-12-24');
INSERT INTO `tb_pengajuan` VALUES (63, '3001', 'PJ2412240001', '2024-12-24', 15000000, 24, 0, 15000000, 625000, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2024-12-24');
INSERT INTO `tb_pengajuan` VALUES (64, '3001', 'PJ2412240002', '2024-12-24', 15000000, 24, 0, 15000000, 625000, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2024-12-24');
INSERT INTO `tb_pengajuan` VALUES (65, '3001', 'PJ2412250001', '2024-12-25', 5000000, 6, 0, 5000000, 833333, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (66, '3001', 'PJ2412260001', '2024-12-26', 1200000, 12, 0, 1200000, 100000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (67, '3001', 'PJ2412260002', '2024-12-26', 15000000, 1, 0, 15000000, 15000000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (68, '3003', 'PJ2412260003', '2024-12-26', 3656, 2, 0, 3656, 1828, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3003', NULL);
INSERT INTO `tb_pengajuan` VALUES (69, '3001', 'PJ2412260004', '2024-12-26', 2000000, 6, 0, 2000000, 333333, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2024-12-26');
INSERT INTO `tb_pengajuan` VALUES (70, '3001', 'PJ2412260005', '2024-12-26', 100000, 2, 0, 100000, 50000, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2024-12-29');

-- ----------------------------
-- Table structure for tb_pinjaman
-- ----------------------------
DROP TABLE IF EXISTS `tb_pinjaman`;
CREATE TABLE `tb_pinjaman`  (
  `pinjaman_id` int NOT NULL AUTO_INCREMENT,
  `koperasi_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_pinjaman` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_pinjaman` enum('HARDLOAN','SOFTLOAN','SHOPPING','ELEKTRONIK','MOTOR') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_proses` date NOT NULL,
  `jumlah_pinjaman` int NOT NULL,
  `biaya_admin` int NOT NULL,
  `pct_admin` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `biaya_jasa` int NOT NULL,
  `pct_jasa` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lama_angsuran` int NOT NULL,
  `besar_angsuran` int NOT NULL,
  `total_angsuran` int NOT NULL,
  `masuk_angsuran` int NOT NULL,
  `sisa_angsuran` int NOT NULL,
  `sisa_angsuran_bln` int NOT NULL,
  `shu_kop` int NOT NULL,
  `shu_ang` int NOT NULL,
  `shu_bln` int NOT NULL,
  `updated` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`pinjaman_id`) USING BTREE,
  UNIQUE INDEX `no_pinjaman`(`no_pinjaman` ASC) USING BTREE,
  INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE,
  CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pinjaman
-- ----------------------------
INSERT INTO `tb_pinjaman` VALUES (24, '3001', 'PJ2310180001', 'HARDLOAN', '2023-10-18', '2023-10-18', 1000000, 0, '0', 0, '0', 24, 41667, 1000000, 41667, 958333, 23, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (25, '3001', 'PJ2310180002', 'SOFTLOAN', '2023-10-18', '2023-10-18', 500000, 0, '0', 0, '0', 1, 500000, 500000, 500000, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (26, '3001', 'PJ2310180003', 'HARDLOAN', '2023-10-18', '2024-08-10', 10000000, 0, '0', 0, '0', 12, 833333, 10000000, 9999996, 4, 0, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (27, '3000', 'PJ2408100002', 'SOFTLOAN', '2024-08-10', '2024-08-10', 235246356, 0, '0', 0, '0', 1, 235246356, 235246356, 235246356, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (28, '3002', 'PJ2409190001', 'HARDLOAN', '2024-09-19', '2024-09-19', 1000000, 0, '0', 0, '0', 12, 83333, 1000000, 166666, 833334, 10, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (29, '3001', 'PJ2412240001', 'HARDLOAN', '2024-12-24', '2024-12-24', 15000000, 0, '0', 0, '0', 24, 625000, 15000000, 625000, 14375000, 23, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (30, '3001', 'PJ2412240002', 'HARDLOAN', '2024-12-24', '2024-12-24', 15000000, 0, '0', 0, '0', 24, 625000, 15000000, 1250000, 13750000, 22, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (31, '3001', 'PJ2412260004', 'HARDLOAN', '2024-12-26', '2024-12-26', 2000000, 0, '0', 0, '0', 6, 333333, 2000000, 0, 2000000, 6, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (32, '3001', 'PJ2412260005', 'HARDLOAN', '2024-12-26', '2024-12-29', 100000, 0, '0', 0, '0', 2, 50000, 100000, 0, 100000, 2, 0, 0, 0, NULL);

-- ----------------------------
-- Table structure for tb_simpanan_pokok
-- ----------------------------
DROP TABLE IF EXISTS `tb_simpanan_pokok`;
CREATE TABLE `tb_simpanan_pokok`  (
  `sp_id` int NOT NULL AUTO_INCREMENT,
  `no_tab_pokok` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `koperasi_id` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT NULL,
  `pengurus` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `flag` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`sp_id`) USING BTREE,
  INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE,
  CONSTRAINT `tb_simpanan_pokok_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_simpanan_pokok
-- ----------------------------
INSERT INTO `tb_simpanan_pokok` VALUES (10, 'SP-000001', '3001', 100000, '2023-10-18 10:42:16', NULL, '3000', 1);

-- ----------------------------
-- Table structure for tb_simpanan_sukarela
-- ----------------------------
DROP TABLE IF EXISTS `tb_simpanan_sukarela`;
CREATE TABLE `tb_simpanan_sukarela`  (
  `ss_id` int NOT NULL AUTO_INCREMENT,
  `no_tab_sukarela` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `koperasi_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` date NULL DEFAULT NULL,
  `pengurus` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `flag` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`ss_id`) USING BTREE,
  UNIQUE INDEX `no_tabungan_wajib`(`no_tab_sukarela` ASC) USING BTREE,
  INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE,
  CONSTRAINT `tb_simpanan_sukarela_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_simpanan_sukarela
-- ----------------------------
INSERT INTO `tb_simpanan_sukarela` VALUES (8, 'SS-000001', '3001', 65014435, '2023-10-18 10:43:22', '2024-12-26', '3000', '1');
INSERT INTO `tb_simpanan_sukarela` VALUES (9, 'SS-000002', '3003', 2328912, '2024-12-09 22:46:44', '2024-12-26', '3000', '1');

-- ----------------------------
-- Table structure for tb_simpanan_wajib
-- ----------------------------
DROP TABLE IF EXISTS `tb_simpanan_wajib`;
CREATE TABLE `tb_simpanan_wajib`  (
  `sw_id` int NOT NULL AUTO_INCREMENT,
  `no_tab_wajib` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `koperasi_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` date NULL DEFAULT NULL,
  `pengurus` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `flag` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`sw_id`) USING BTREE,
  UNIQUE INDEX `no_tabungan_wajib`(`no_tab_wajib` ASC) USING BTREE,
  INDEX `koperasi_id`(`koperasi_id` ASC) USING BTREE,
  CONSTRAINT `tb_simpanan_wajib_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_simpanan_wajib
-- ----------------------------
INSERT INTO `tb_simpanan_wajib` VALUES (8, 'SW-000001', '3001', 100000, '2023-10-18 10:42:52', '2024-09-14', '3000', '1');

-- ----------------------------
-- Table structure for tb_swk
-- ----------------------------
DROP TABLE IF EXISTS `tb_swk`;
CREATE TABLE `tb_swk`  (
  `swk_id` int NOT NULL AUTO_INCREMENT,
  `koperasi_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_swk` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` enum('IN','OUT') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int NOT NULL,
  `jenis_transaksi` enum('PASYROLL','TRANSFER','CASH') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `pengurus` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`swk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_swk
-- ----------------------------

-- ----------------------------
-- Table structure for tb_toko
-- ----------------------------
DROP TABLE IF EXISTS `tb_toko`;
CREATE TABLE `tb_toko`  (
  `toko_id` int NOT NULL AUTO_INCREMENT,
  `kode_toko` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_toko` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`toko_id`) USING BTREE,
  UNIQUE INDEX `kode_toko`(`kode_toko` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_toko
-- ----------------------------
INSERT INTO `tb_toko` VALUES (1, '06000', 'HEAD OFFICE');
INSERT INTO `tb_toko` VALUES (2, '06001', 'TOKO PASAR REBO');
INSERT INTO `tb_toko` VALUES (3, '06002', 'TOKO SIDOARJO');
INSERT INTO `tb_toko` VALUES (4, '06003', 'TOKO KLAPA GADING');
INSERT INTO `tb_toko` VALUES (5, '06004', 'TOKO MERUYA');
INSERT INTO `tb_toko` VALUES (6, '06005', 'TOKO BANDUNG');

SET FOREIGN_KEY_CHECKS = 1;
