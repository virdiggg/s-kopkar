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

 Date: 24/12/2024 16:51:06
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
) ENGINE = InnoDB AUTO_INCREMENT = 133 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_anggota
-- ----------------------------
INSERT INTO `tb_anggota` VALUES (1, '3000', 'ADMIN', '2023-10-06', '', '2023-10-06', '06001', '', '', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', '1', '2023-10-06 16:03:13', '2024-12-16 18:32:23', '1', 'eyJpdiI6ImlOZ0tFa1VsQlE0bElMRHIiLCJ2YWx1ZSI6InhkSGZ3RmxOQXphN0hvQTlmRnk1VUpNOSs5dElBbmNhRFZPTEdhK2dyaCtXRFNobW1vSnhlNCt2UXdSK1NranZBVmYvZTdkY3ZQVzN3OG5PL1ZRQjBaUklaR0JibEM1aEplM29YMmk3WHM3QTRYd0dCN3hwWnRSeWRrcjM3RElrMk9uclEyZlRsdmo1YkRXVm5iN3E4UW5uSVhIYjI3a1BONHhxU1NkcUMxbUZwUTNhdmUrUzJXdE5GWWhiN21USlNQeExVTWw2ZVJucUc1MUlhMFJLTzBxRkw2blk3NW81RzFzRGNkcFNDT0pzL1JxU3ZmQXk4eEFzdXB5MnJGTWQ3YXRtV2ZUM2cxTVlKUVEreFNkQ1Z0MUpYQnJBbCs0ZzZoWlRuRjh1cERpWVZIRzlPYU9FL3dzR2lsL21BaVU0WmJhVVh5a0NRdU5lQXllZU41RU12NVhJbjhXeHplZDR2UWNGOTZyTmxYckdSeTNLSy9BZ09pMTh0OFFoOGx3dUQ4UlFTMnhhMkRFcm1td21ZU2pYV2VkRnFEejFLNTRacWNyMkxEdEpJUS9NK1Y4YW42SG4waGFxakhSMjlYM3RMTW5sczZUTTBPbFpTQ0QrbUlYNnUrT3dqbHl0SjdacEdRZ1A0SzVmdUhQYS9NQU9XT1RIQlN0ZjROcUM3d2F0VXExbTRiZW9KVXp2dVFUWU8xQWF4MEo1c1VUZzdnQzZQL2gySit0SiIsIm1hYyI6IiIsInRhZyI6ImVVZlpmUGxOMU5oSzRwRXhJNi9LcWc9PSJ9');
INSERT INTO `tb_anggota` VALUES (128, '3001', 'RIDWAN HAKIM', '2007-02-06', 'DEPOK', '2023-10-06', '06000', 'BANK BCA', '0381398183', 'ridwan', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2', '2023-10-06 16:22:24', '2024-12-24 15:21:17', '1', 'eyJpdiI6IjQxeDlxUUVCMWhhSmJybGIiLCJ2YWx1ZSI6IjJsVjNVZitVZEh6NFZ4YTR0cnV3WG5xaE0yZ3VYOTlPNGd2d1J3RHBYc3V6eTRjZU1Day8wcmFMNEtLeDR6YjVQSXg1N0lvUmJzYnY5OW9FYVNyYk1aV3EvcjZRTWNQRnJjZEZUVUtyTHN2S1BCY1pveGxkQnE2RTRJSjFuWWZ2U1ZSbk5lUGVkYzF2OE9uOWk1VXlTU0pSV2oyRWhDT3ovNlZIWi95My84cHJiS3UyVnR6dEp4QUJlZGxIT245c3MxOEZjWG9Hc3VHRjhsNEpYdXFXRlRiRXNtTHF2dVhscFhuL1laNWZBSDBnYU9nN3lZdERmUCtsOFdoOFhTaWN0ekx4N1hyVjJWY0g5QndEQjVBVHFuS1ZPOEJYRkNUNituYkE2bGNaUVg3RE9lQXFKdEtSeGdZbjBaUE1JWm9EN1pFSXNoOUcwRVJodG01Q2d4dXJESGFxWllzeFNKa09wY0taM0phUEIvZXViQ2xZMjNRK04wTS95UWFWRktkYkFGSlB1akFzMWNUMXVQWXNXNE4rZFBETHNiaFJXb3Zkc1U1VUxWUGRiQXgxem90amJjUXhXZkdKeUJYZ2xCc0lZeW4zM2UrQ3ViMGkrR0dya1FLMkphQk90dmtiV2xJZFIzR1BWSHRPcFhicWp3bmhCQzByY29rckVlUFdDT1BjaGpwUENGaUkzWWlkQXIvM2MrVi9DZ2l6NzlNQU5MZWVoc2FHK0dqaVV3ZUJhSjIrdzBRUDllR2YrL2pzaVhvZk5RT1U1ejgzeFEybzdybHVpcyt0Tnlrc3hEQmkzT2FEeGJDYkMwbUJJRkk9IiwibWFjIjoiIiwidGFnIjoiVkpUNzhUeVZQVTEvcnZrMXYzcXdvQT09In0=');
INSERT INTO `tb_anggota` VALUES (129, '3002', 'HAKIM', '2023-07-05', 'jjl', '2023-10-29', '06002', 'BANK BRI', '1352435667', 'hakim', 'f0830fa0b7cff627cc3b98df467c9a29a5097ae4', '2', '2023-10-29 05:42:00', '2024-12-23 22:07:20', '1', 'eyJpdiI6IlIvZ1M5THhzSnk5dU5lcVIiLCJ2YWx1ZSI6InF1OWxmMFcvTVliQUMwRUtoN1cwRjROU01XNW0rTUxMb1lFLzRiQkR0K1ZDT0pmQjY0NUVIOFRKWlNlTFBEMHNvd0hENkR0SEhrZThZcFlVWVlGNDZ4T1Uyd1R2SDlLOHkwWmhyV1pMRXZLSitNUFF3T0pvNE9nWjlPVXJxTTlEa2Y4Y0JCdVkzK1ltVVFXcU90OXNvWm1jZC9zWnZ2aFRqZ242N3ZFei9kWS84VEhhL244STh4NlFIaVZrV3lYMm4rc0QyNWZ6VzhrM3J2QzhTdnNSQjNIRyt4YWo0dnhxL1FmOWh4NHYyVmZabm9lcWdENWcyb2xudmVFQW5QQzhNOGkzOHphY292d2NDK2tsa083S1BGZlJEVXNRLzFqeGE5VFJ3NTZXcGlaamptT2N4WVZPRnVNaGl1VzMyUmpxaDRBWmdkQmxqRUVYMHg3YlJCaVpwUjlndGVxR3FDM0hjWEFPaitjZ3ByUi82SVdBdzJHK1lON2l1WkY3eEZGM2RUcXNpV1RQZmFrMjdlWFBKZVFueldaWi9uSEgxRjJ2SHExbU04ZTlndHoyVFYzaXhkenV2V0JuNGZuRmswc3lUWlN6b1lDS2ZDdEw2cWFhQ1Zsb2lZUDRySkJYeGxBWDdZNGh4aVBCVmhoUmhOVzVVdzBFM3htcjJYQzNuUTFkWjdpa3MrMnRoNWlnU0g0ZjE5cnFsV0FoUGx5dTZGOHFES2VJS2xZYTlsdGFQK2RXemJ2NE5UNjAwSllrZnUzalYxSXpYMWFiMWJSMWEyQ2FHbWxmOVIwbFA1bjc1dz09IiwibWFjIjoiIiwidGFnIjoiZFVGWXBtcHd6STdTWkNuYjVKT1o1UT09In0=');
INSERT INTO `tb_anggota` VALUES (132, '3003', 'TESTING', '2023-10-06', '', '2023-10-06', '06001', '', '', 'testing', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '2023-10-06 16:03:13', '2024-12-14 20:09:44', '1', 'eyJpdiI6IjN3eTBrbHBxNWZRUUpxaFQiLCJ2YWx1ZSI6ImxlMnlHd1N0NUYxOWxIYmVaeVJnS1hsOXVKVFBabFVCZ1R1Q1Y4T0pob09VaCtsQkcxNzlWYnVzTS84dXk5djFvd291bmw0UGxnb1kzOTNYc2tPVlNMNW1lOWI2WFlaVXBWYkZhaSsvNTlyREtjWXhuR2ZkTVJmMjQ0d2JTU1AzMkJiWDZlcE5TdUJtNDdZRmFQbXR5SVpsdlBHUzA2OTArQjdjU2NaTCsxaVBsUjNMRHhySjdyQ0M3a1VGdExUZDRJc0dOdVNzd01iNlJYUkpCcENMUC95OHJiRmtjVEZmVlJRZ3NqbXg2N21zU3pvU3lsWWJQY3cyTDBMT3hZaEZvb3VzT0ZlMC9GY1dWeTFnQUdTRjBvOVVBM3RCTThCbEZ2T050VmdTTnlUZTlaTjVFZHFETCt0YkkzTzdUTEJXaWxzNVZyc2NORWxMalBBOC9UUkhzUnVBdHlyc21KdEh5aVNhZFMvOXY4Q3daOURseUQzbVFsbk13czFzcXJ6eWcvTFEwL1pFVU9lQlJWSEhBdmQxdlRjKzBZVnNWZHhRN29EMS9tLzlKa3ZtWjlpQ1dZckIzY1pLNVNZbVEwbEdrNUNXK3kyMWRyNmdqczhERWRJVGU5a2tJWUhIMEpxOVVsMUpLSU0zQm03MkFyTlRCUU1tMEFCNUhIQm0vS0w5SzVvdVlxQ1ZiMW9ZWUhXUkxGVVpvd2dWMFFBMmRNS3lmSzZCUTJYUEZjMzFReXgzbDg0c2JjSTU0Mm9BK0N2L1ZNbmFpQW89IiwibWFjIjoiIiwidGFnIjoiTUdUdmYyNzdCUm1reGFwcHpSbmFEUT09In0=');

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
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `tb_kegiatan_simpanan` VALUES (34, 'KK2412230004', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1605180', '3001', '2024-12-23', '2024-12-23 10:28:16', 'bukti_transfer_3001_241223-d360f37d3d.jpg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (35, 'KK2412230005', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '1007936', '3001', '2024-12-23', '2024-12-23 10:45:36', 'bukti_transfer_3001_241223-1e03ef4e35.jpg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (36, 'KK2412230006', '3001', 'Sukarela', 'Masuk', 1004400, 'Transfer', '1226679', '3001', '2024-12-23', '2024-12-23 10:45:46', 'bukti_transfer_3001_241223-8437286303.jpg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (37, 'KK2412230007', '3001', 'Sukarela', 'Masuk', 15400, 'Transfer', '1127191', '3001', '2024-12-23', '2024-12-23 10:46:01', 'bukti_transfer_3001_241223-aa77985492.jpg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (38, 'KK2412230008', '3001', 'Sukarela', 'Masuk', 15400, 'Transfer', '1928162', '3001', '2024-12-23', '2024-12-23 11:01:13', 'bukti_transfer_3001_241223-1b9c1684e0.jpg');
INSERT INTO `tb_kegiatan_simpanan` VALUES (39, 'KK2412230009', '3001', 'Sukarela', 'Masuk', 2000000, 'Transfer', '1107109', '3001', '2024-12-23', '2024-12-23 22:17:03', 'bukti_transfer_3001_241223-9a62e0595d.jpeg');

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pembayaran
-- ----------------------------
INSERT INTO `tb_pembayaran` VALUES (14, 'PB2408100001', 'PJ2310180002', '3001', 'SOFTLOAN', 'Bayar', '121331', 'Payroll', 500000, 0, 1, '2024-08-10', '3000');
INSERT INTO `tb_pembayaran` VALUES (15, 'PB2408100002', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '343222', 'Payroll', 833333, 0, 1, '2024-08-10', '3000');
INSERT INTO `tb_pembayaran` VALUES (16, 'PB2408100003', 'PJ2310180001', '3001', 'HARDLOAN', 'Bayar', '344254', 'Payroll', 41667, 0, 1, '2024-08-10', '3000');
INSERT INTO `tb_pembayaran` VALUES (17, 'PB2412040001', 'PJ2408100002', '3000', 'SOFTLOAN', 'Bayar', '1231', 'Payroll', 235246356, 0, 1, '2024-12-04', '3000');
INSERT INTO `tb_pembayaran` VALUES (18, 'PB2412040002', 'PJ2409190001', '3002', 'HARDLOAN', 'Bayar', '122222', 'Payroll', 83333, 0, 1, '2024-12-04', '3000');

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
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `tb_pengajuan` VALUES (56, '3001', 'PJ2412160001', '2024-12-16', 50, 12, 0, 50, 4, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (57, '3002', 'PJ2412160002', '2024-12-16', 15000000, 12, 0, 15000000, 1250000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3002', NULL);
INSERT INTO `tb_pengajuan` VALUES (58, '3001', 'PJ2412160003', '2024-12-16', 15000000, 12, 0, 15000000, 1250000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (59, '3001', 'PJ2412200001', '2024-12-20', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (60, '3001', 'PJ2412230001', '2024-12-23', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (61, '3001', 'PJ2412230002', '2024-12-23', 1000000, 5, 0, 1000000, 200000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (62, '3001', 'PJ2412230003', '2024-12-23', 15000000, 24, 0, 15000000, 625000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);
INSERT INTO `tb_pengajuan` VALUES (63, '3001', 'PJ2412240001', '2024-12-24', 15000000, 24, 0, 15000000, 625000, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3001', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pinjaman
-- ----------------------------
INSERT INTO `tb_pinjaman` VALUES (24, '3001', 'PJ2310180001', 'HARDLOAN', '2023-10-18', '2023-10-18', 1000000, 0, '0', 0, '0', 24, 41667, 1000000, 41667, 958333, 23, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (25, '3001', 'PJ2310180002', 'SOFTLOAN', '2023-10-18', '2023-10-18', 500000, 0, '0', 0, '0', 1, 500000, 500000, 500000, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (26, '3001', 'PJ2310180003', 'HARDLOAN', '2023-10-18', '2024-08-10', 10000000, 0, '0', 0, '0', 12, 833333, 10000000, 833333, 9166667, 11, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (27, '3000', 'PJ2408100002', 'SOFTLOAN', '2024-08-10', '2024-08-10', 235246356, 0, '0', 0, '0', 1, 235246356, 235246356, 235246356, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tb_pinjaman` VALUES (28, '3002', 'PJ2409190001', 'HARDLOAN', '2024-09-19', '2024-09-19', 1000000, 0, '0', 0, '0', 12, 83333, 1000000, 83333, 916667, 11, 0, 0, 0, NULL);

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
INSERT INTO `tb_simpanan_sukarela` VALUES (8, 'SS-000001', '3001', 40479200, '2023-10-18 10:43:22', '2024-12-23', '3000', '1');
INSERT INTO `tb_simpanan_sukarela` VALUES (9, 'SS-000002', '3003', 2050504, '2024-12-09 22:46:44', '2024-12-23', '3000', '1');

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
