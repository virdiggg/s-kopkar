-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2024 pada 00.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopkar_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `anggota_id` int(11) NOT NULL,
  `koperasi_id` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_gabung` date NOT NULL,
  `kode_toko` char(10) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `no_rek` char(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` char(200) NOT NULL,
  `level` enum('1','2') NOT NULL,
  `token` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `flag` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`anggota_id`, `koperasi_id`, `nama`, `tgl_lahir`, `alamat`, `tgl_gabung`, `kode_toko`, `bank`, `no_rek`, `username`, `password`, `level`, `created`, `updated`, `flag`) VALUES
(1, '3000', 'ADMIN', '2023-10-06', '', '2023-10-06', '06001', '', '', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', '1', '2023-10-06 16:03:13', NULL, '1'),
(128, '3001', 'RIDWAN HAKIM', '2007-02-06', 'DEPOK', '2023-10-06', '06000', 'BANK BCA', '0381398183', 'ridwan', '6140e5358512327b034a3b9aa83b51fd46a5753a', '2', '2023-10-06 16:22:24', NULL, '1'),
(129, '3002', 'HAKIM', '2023-07-05', 'jjl', '2023-10-29', '06002', 'BANK BRI', '1352435667', 'hakim', 'f0830fa0b7cff627cc3b98df467c9a29a5097ae4', '2', '2023-10-29 05:42:00', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `bank_id` int(11) NOT NULL,
  `kode_bank` varchar(4) NOT NULL,
  `bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`bank_id`, `kode_bank`, `bank`) VALUES
(1, '002', 'BANK BRI'),
(2, '014', 'BANK BCA'),
(3, '008', 'BANK MANDIRI'),
(4, '009', 'BANK BNI'),
(5, '111', 'BANK DKI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_simpanan`
--

CREATE TABLE `tb_kegiatan_simpanan` (
  `keg_simpan_id` int(11) NOT NULL,
  `kode_kegiatan` varchar(15) NOT NULL,
  `koperasi_id` char(5) NOT NULL,
  `status_simpanan` enum('Wajib','Sukarela','Pokok') NOT NULL,
  `aksi` enum('Masuk','Keluar') NOT NULL,
  `jumlah` int(12) NOT NULL,
  `transaksi` enum('Payroll','Transfer','Cash') NOT NULL,
  `no_kwitansi` varchar(15) NOT NULL,
  `pengurus` char(6) NOT NULL,
  `tanggal` date NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kegiatan_simpanan`
--

INSERT INTO `tb_kegiatan_simpanan` (`keg_simpan_id`, `kode_kegiatan`, `koperasi_id`, `status_simpanan`, `aksi`, `jumlah`, `transaksi`, `no_kwitansi`, `pengurus`, `tanggal`, `created`) VALUES
(27, 'KK2408100001', '3001', 'Sukarela', 'Masuk', 30000000, 'Cash', '32456464', '3000', '2024-08-10', '2024-08-10 09:06:40'),
(28, 'KK2408100002', '3001', 'Sukarela', 'Masuk', 1234000, 'Transfer', '25252', '3000', '2024-08-10', '2024-08-10 12:12:22'),
(29, 'KK2412040001', '3001', 'Sukarela', 'Masuk', 1000000, 'Transfer', '123', '3000', '2024-12-04', '2024-12-04 19:10:41'),
(30, 'KK2412040002', '3001', 'Sukarela', 'Masuk', 10000, 'Transfer', '1122', '3000', '2024-12-04', '2024-12-04 19:12:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `no_pembayaran` varchar(15) NOT NULL,
  `no_pinjaman` varchar(15) NOT NULL,
  `koperasi_id` char(5) NOT NULL,
  `status_pinjaman` varchar(20) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `no_kwitansi` varchar(20) NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `besar_angsuran` int(12) NOT NULL,
  `shu_bln` int(12) NOT NULL,
  `qty` int(1) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pengurus` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`pembayaran_id`, `no_pembayaran`, `no_pinjaman`, `koperasi_id`, `status_pinjaman`, `aksi`, `no_kwitansi`, `transaksi`, `besar_angsuran`, `shu_bln`, `qty`, `tanggal`, `pengurus`) VALUES
(14, 'PB2408100001', 'PJ2310180002', '3001', 'SOFTLOAN', 'Bayar', '121331', 'Payroll', 500000, 0, 1, '2024-08-10', '3000'),
(15, 'PB2408100002', 'PJ2310180003', '3001', 'HARDLOAN', 'Bayar', '343222', 'Payroll', 833333, 0, 1, '2024-08-10', '3000'),
(16, 'PB2408100003', 'PJ2310180001', '3001', 'HARDLOAN', 'Bayar', '344254', 'Payroll', 41667, 0, 1, '2024-08-10', '3000'),
(17, 'PB2412040001', 'PJ2408100002', '3000', 'SOFTLOAN', 'Bayar', '1231', 'Payroll', 235246356, 0, 1, '2024-12-04', '3000'),
(18, 'PB2412040002', 'PJ2409190001', '3002', 'HARDLOAN', 'Bayar', '122222', 'Payroll', 83333, 0, 1, '2024-12-04', '3000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `pengajuan_id` int(11) NOT NULL,
  `koperasi_id` varchar(5) NOT NULL,
  `no_pinjaman` varchar(15) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jumlah_pinjaman` int(15) NOT NULL,
  `lama_angsuran` int(2) NOT NULL,
  `biaya_admin` int(12) NOT NULL,
  `jumlah_kewajiban` int(12) NOT NULL,
  `kewajiban_bulan` int(12) NOT NULL,
  `jenis_pinjaman` enum('HARDLOAN','SOFTLOAN','SHOPPING','ELEKTRONIK','MOTOR') NOT NULL,
  `shu_kop` int(12) NOT NULL,
  `shu_ang` int(12) NOT NULL,
  `shu_bln` int(12) NOT NULL,
  `status_pengajuan` enum('DISETUJUI','DITOLAK','MENUNGGU') NOT NULL,
  `diajukan` char(10) NOT NULL,
  `tgl_proses` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`pengajuan_id`, `koperasi_id`, `no_pinjaman`, `tgl_pengajuan`, `jumlah_pinjaman`, `lama_angsuran`, `biaya_admin`, `jumlah_kewajiban`, `kewajiban_bulan`, `jenis_pinjaman`, `shu_kop`, `shu_ang`, `shu_bln`, `status_pengajuan`, `diajukan`, `tgl_proses`) VALUES
(34, '3001', 'PJ2310180001', '2023-10-18', 1000000, 24, 0, 1000000, 41667, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2023-10-18'),
(35, '3001', 'PJ2310180002', '2023-10-18', 500000, 1, 0, 500000, 500000, 'SOFTLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2023-10-18'),
(36, '3001', 'PJ2310180003', '2023-10-18', 10000000, 12, 0, 10000000, 833333, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3001', '2024-08-10'),
(37, '3001', 'PJ2408100001', '2024-08-10', 150000000, 24, 0, 150000000, 6250000, 'HARDLOAN', 0, 0, 0, 'DITOLAK', '3001', '2024-08-10'),
(38, '3000', 'PJ2408100002', '2024-08-10', 235246356, 1, 0, 235246356, 235246356, 'SOFTLOAN', 0, 0, 0, 'DISETUJUI', '3000', '2024-08-10'),
(39, '3002', 'PJ2409190001', '2024-09-19', 1000000, 12, 0, 1000000, 83333, 'HARDLOAN', 0, 0, 0, 'DISETUJUI', '3002', '2024-09-19'),
(40, '3002', 'PJ2409190002', '2024-09-19', 20000000, 24, 0, 20000000, 833333, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3002', NULL),
(41, '3001', 'PJ2412040001', '2024-12-04', 1000000, 12, 0, 1000000, 83333, 'HARDLOAN', 0, 0, 0, 'MENUNGGU', '3000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `pinjaman_id` int(11) NOT NULL,
  `koperasi_id` char(5) NOT NULL,
  `no_pinjaman` varchar(15) NOT NULL,
  `status_pinjaman` enum('HARDLOAN','SOFTLOAN','SHOPPING','ELEKTRONIK','MOTOR') NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_proses` date NOT NULL,
  `jumlah_pinjaman` int(12) NOT NULL,
  `biaya_admin` int(12) NOT NULL,
  `pct_admin` char(12) NOT NULL,
  `biaya_jasa` int(12) NOT NULL,
  `pct_jasa` char(12) NOT NULL,
  `lama_angsuran` int(2) NOT NULL,
  `besar_angsuran` int(12) NOT NULL,
  `total_angsuran` int(12) NOT NULL,
  `masuk_angsuran` int(12) NOT NULL,
  `sisa_angsuran` int(12) NOT NULL,
  `sisa_angsuran_bln` int(2) NOT NULL,
  `shu_kop` int(12) NOT NULL,
  `shu_ang` int(12) NOT NULL,
  `shu_bln` int(12) NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`pinjaman_id`, `koperasi_id`, `no_pinjaman`, `status_pinjaman`, `tgl_pengajuan`, `tgl_proses`, `jumlah_pinjaman`, `biaya_admin`, `pct_admin`, `biaya_jasa`, `pct_jasa`, `lama_angsuran`, `besar_angsuran`, `total_angsuran`, `masuk_angsuran`, `sisa_angsuran`, `sisa_angsuran_bln`, `shu_kop`, `shu_ang`, `shu_bln`, `updated`) VALUES
(24, '3001', 'PJ2310180001', 'HARDLOAN', '2023-10-18', '2023-10-18', 1000000, 0, '0', 0, '0', 24, 41667, 1000000, 41667, 958333, 23, 0, 0, 0, NULL),
(25, '3001', 'PJ2310180002', 'SOFTLOAN', '2023-10-18', '2023-10-18', 500000, 0, '0', 0, '0', 1, 500000, 500000, 500000, 0, 0, 0, 0, 0, NULL),
(26, '3001', 'PJ2310180003', 'HARDLOAN', '2023-10-18', '2024-08-10', 10000000, 0, '0', 0, '0', 12, 833333, 10000000, 833333, 9166667, 11, 0, 0, 0, NULL),
(27, '3000', 'PJ2408100002', 'SOFTLOAN', '2024-08-10', '2024-08-10', 235246356, 0, '0', 0, '0', 1, 235246356, 235246356, 235246356, 0, 0, 0, 0, 0, NULL),
(28, '3002', 'PJ2409190001', 'HARDLOAN', '2024-09-19', '2024-09-19', 1000000, 0, '0', 0, '0', 12, 83333, 1000000, 83333, 916667, 11, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_simpanan_pokok`
--

CREATE TABLE `tb_simpanan_pokok` (
  `sp_id` int(11) NOT NULL,
  `no_tab_pokok` varchar(15) NOT NULL,
  `koperasi_id` char(10) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `pengurus` varchar(10) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_simpanan_pokok`
--

INSERT INTO `tb_simpanan_pokok` (`sp_id`, `no_tab_pokok`, `koperasi_id`, `jumlah`, `created`, `updated`, `pengurus`, `flag`) VALUES
(10, 'SP-000001', '3001', 100000, '2023-10-18 10:42:16', NULL, '3000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_simpanan_sukarela`
--

CREATE TABLE `tb_simpanan_sukarela` (
  `ss_id` int(11) NOT NULL,
  `no_tab_sukarela` varchar(15) NOT NULL,
  `koperasi_id` char(5) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` date DEFAULT NULL,
  `pengurus` char(10) NOT NULL,
  `bukti_transfer` text DEFAULT NULL,
  `flag` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_simpanan_sukarela`
--

INSERT INTO `tb_simpanan_sukarela` (`ss_id`, `no_tab_sukarela`, `koperasi_id`, `jumlah`, `created`, `updated`, `pengurus`, `flag`) VALUES
(8, 'SS-000001', '3001', 32444000, '2023-10-18 10:43:22', NULL, '3000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_simpanan_wajib`
--

CREATE TABLE `tb_simpanan_wajib` (
  `sw_id` int(11) NOT NULL,
  `no_tab_wajib` varchar(15) NOT NULL,
  `koperasi_id` char(5) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` date DEFAULT NULL,
  `pengurus` char(10) NOT NULL,
  `flag` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_simpanan_wajib`
--

INSERT INTO `tb_simpanan_wajib` (`sw_id`, `no_tab_wajib`, `koperasi_id`, `jumlah`, `created`, `updated`, `pengurus`, `flag`) VALUES
(8, 'SW-000001', '3001', 100000, '2023-10-18 10:42:52', '2024-09-14', '3000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_swk`
--

CREATE TABLE `tb_swk` (
  `swk_id` int(11) NOT NULL,
  `koperasi_id` char(5) NOT NULL,
  `kode_swk` varchar(14) NOT NULL,
  `type` enum('IN','OUT') NOT NULL,
  `jumlah` int(20) NOT NULL,
  `jenis_transaksi` enum('PASYROLL','TRANSFER','CASH') NOT NULL,
  `tanggal` date NOT NULL,
  `pengurus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `toko_id` int(11) NOT NULL,
  `kode_toko` varchar(5) NOT NULL,
  `nama_toko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`toko_id`, `kode_toko`, `nama_toko`) VALUES
(1, '06000', 'HEAD OFFICE'),
(2, '06001', 'TOKO PASAR REBO'),
(3, '06002', 'TOKO SIDOARJO'),
(4, '06003', 'TOKO KLAPA GADING'),
(5, '06004', 'TOKO MERUYA'),
(6, '06005', 'TOKO BANDUNG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD UNIQUE KEY `user_name` (`username`),
  ADD UNIQUE KEY `koperasi_id` (`koperasi_id`);

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `tb_kegiatan_simpanan`
--
ALTER TABLE `tb_kegiatan_simpanan`
  ADD PRIMARY KEY (`keg_simpan_id`),
  ADD KEY `koperasi_id` (`koperasi_id`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `koperasi_id` (`koperasi_id`),
  ADD KEY `no_pinjaman` (`no_pinjaman`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`),
  ADD KEY `koperasi_id` (`koperasi_id`);

--
-- Indeks untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`pinjaman_id`),
  ADD UNIQUE KEY `no_pinjaman` (`no_pinjaman`),
  ADD KEY `koperasi_id` (`koperasi_id`);

--
-- Indeks untuk tabel `tb_simpanan_pokok`
--
ALTER TABLE `tb_simpanan_pokok`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `koperasi_id` (`koperasi_id`);

--
-- Indeks untuk tabel `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  ADD PRIMARY KEY (`ss_id`),
  ADD UNIQUE KEY `no_tabungan_wajib` (`no_tab_sukarela`),
  ADD KEY `koperasi_id` (`koperasi_id`);

--
-- Indeks untuk tabel `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  ADD PRIMARY KEY (`sw_id`),
  ADD UNIQUE KEY `no_tabungan_wajib` (`no_tab_wajib`),
  ADD KEY `koperasi_id` (`koperasi_id`);

--
-- Indeks untuk tabel `tb_swk`
--
ALTER TABLE `tb_swk`
  ADD PRIMARY KEY (`swk_id`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`toko_id`),
  ADD UNIQUE KEY `kode_toko` (`kode_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan_simpanan`
--
ALTER TABLE `tb_kegiatan_simpanan`
  MODIFY `keg_simpan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `pinjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_simpanan_pokok`
--
ALTER TABLE `tb_simpanan_pokok`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  MODIFY `sw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_swk`
--
ALTER TABLE `tb_swk`
  MODIFY `swk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kegiatan_simpanan`
--
ALTER TABLE `tb_kegiatan_simpanan`
  ADD CONSTRAINT `tb_kegiatan_simpanan_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`);

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`no_pinjaman`) REFERENCES `tb_pinjaman` (`no_pinjaman`);

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`);

--
-- Ketidakleluasaan untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`);

--
-- Ketidakleluasaan untuk tabel `tb_simpanan_pokok`
--
ALTER TABLE `tb_simpanan_pokok`
  ADD CONSTRAINT `tb_simpanan_pokok_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`);

--
-- Ketidakleluasaan untuk tabel `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  ADD CONSTRAINT `tb_simpanan_sukarela_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`);

--
-- Ketidakleluasaan untuk tabel `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  ADD CONSTRAINT `tb_simpanan_wajib_ibfk_1` FOREIGN KEY (`koperasi_id`) REFERENCES `tb_anggota` (`koperasi_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
