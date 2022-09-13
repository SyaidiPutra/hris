-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2022 pada 07.31
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
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asuransi`
--

CREATE TABLE `asuransi` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `no_registrasi` varchar(255) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `nama_asuransi` varchar(255) NOT NULL,
  `iuran_bulanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_karyawan`
--

CREATE TABLE `calon_karyawan` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_tengah` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Konghucu') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_pernikahan` enum('Menikah','Belum Menikah','Duda','Janda') NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_kk` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `alamat_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `no_hp_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `no_hp_ibu` varchar(255) DEFAULT NULL,
  `hubungan_kontak_darurat` varchar(255) NOT NULL,
  `nama_kontak_darurat` varchar(255) NOT NULL,
  `alamat_kontak_darurat` varchar(255) NOT NULL,
  `pekerjaan_kontak_darurat` varchar(255) NOT NULL,
  `no_hp_kontak_darurat` varchar(255) DEFAULT NULL,
  `referensi` varchar(255) DEFAULT NULL,
  `keinginan_gaji` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calon_karyawan`
--

INSERT INTO `calon_karyawan` (`id`, `nama_depan`, `nama_tengah`, `nama_belakang`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `status_pernikahan`, `email`, `no_hp`, `no_ktp`, `no_kk`, `nama_ayah`, `alamat_ayah`, `pekerjaan_ayah`, `no_hp_ayah`, `nama_ibu`, `alamat_ibu`, `pekerjaan_ibu`, `no_hp_ibu`, `hubungan_kontak_darurat`, `nama_kontak_darurat`, `alamat_kontak_darurat`, `pekerjaan_kontak_darurat`, `no_hp_kontak_darurat`, `referensi`, `keinginan_gaji`, `created_at`, `updated_at`) VALUES
(17, 'Adamx', 'Nurx', '', 'Subang', '1945-08-17', 'L', 'Islam', 'Subang, Jawa Barat', 'Belum Menikah', 'sample@gmail.com', '0857', '3215', '3215', 'Adam', 'Bekasi, Jawa Barat', 'Buruh', '0856', 'Hawa', 'Bandung, Jawa Barat', 'IRT', '0896', 'Sepupu', 'Sonya', 'Cianjur, Jawa Barat', 'IRT', '0882', 'Lusiana', 8500000, '2022-09-13 11:16:06', '2022-09-13 12:28:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `id_calon_karyawan` int(11) NOT NULL,
  `interviewer` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_tengah` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_pernikahan` enum('Menikah','Belum Menikah','Duda','Janda') NOT NULL,
  `jumlah_anak` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_ktp` char(1) NOT NULL,
  `no_kk` char(1) DEFAULT NULL,
  `no_npwp` char(1) DEFAULT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `alamat_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `no_hp_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `no_hp_ibu` varchar(255) DEFAULT NULL,
  `hubungan_kontak_darurat` varchar(255) NOT NULL,
  `nama_kontak_darurat` varchar(255) NOT NULL,
  `alamat_kontak_darurat` varchar(255) NOT NULL,
  `pekerjaan_kontak_darurat` varchar(255) NOT NULL,
  `no_hp_kontak_darurat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_dept`
--

CREATE TABLE `master_dept` (
  `id` int(11) NOT NULL,
  `nama_dept` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_dept`
--

INSERT INTO `master_dept` (`id`, `nama_dept`, `created_at`, `updated_at`) VALUES
(1, 'PPIC', '2022-09-12 02:03:25', '0000-00-00 00:00:00'),
(2, 'Production', '2022-09-12 02:03:32', NULL),
(3, 'Warehouse', '2022-09-12 02:03:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `jobdesc` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_jabatan`
--

INSERT INTO `master_jabatan` (`id`, `nama_jabatan`, `jobdesc`, `created_at`, `updated_at`) VALUES
(6, 'Operator', 'Cek', '2022-09-12 01:50:48', NULL),
(7, 'Leader', 'Tes', '2022-09-12 01:50:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenis_soal`
--

CREATE TABLE `master_jenis_soal` (
  `id` int(11) NOT NULL,
  `nama_jenis_soal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_role`
--

CREATE TABLE `master_role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_role`
--

INSERT INTO `master_role` (`id`, `nama_role`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Tes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'HRD', '', '2022-09-12 11:07:19', NULL),
(6, 'Leader', '', '2022-09-12 11:29:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_soal`
--

CREATE TABLE `master_soal` (
  `id` int(11) NOT NULL,
  `id_jenis_soal` int(11) NOT NULL,
  `soal1` varchar(255) NOT NULL,
  `soal2` varchar(255) NOT NULL,
  `soal3` varchar(255) NOT NULL,
  `soal4` varchar(255) NOT NULL,
  `soal5` varchar(255) NOT NULL,
  `soal6` varchar(255) NOT NULL,
  `soal7` varchar(255) NOT NULL,
  `soal8` varchar(255) NOT NULL,
  `soal9` varchar(255) NOT NULL,
  `soal10` varchar(255) NOT NULL,
  `jawaban_soal1` varchar(255) NOT NULL,
  `jawaban_soal2` varchar(255) NOT NULL,
  `jawaban_soal3` varchar(255) NOT NULL,
  `jawaban_soal4` varchar(255) NOT NULL,
  `jawaban_soal5` varchar(255) NOT NULL,
  `jawaban_soal6` varchar(255) NOT NULL,
  `jawaban_soal7` varchar(255) NOT NULL,
  `jawaban_soal8` varchar(255) NOT NULL,
  `jawaban_soal9` varchar(255) NOT NULL,
  `jawaban_soal10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_transisi`
--

CREATE TABLE `master_transisi` (
  `id` int(11) NOT NULL,
  `nama_transisi` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_transisi`
--

INSERT INTO `master_transisi` (`id`, `nama_transisi`, `created_at`, `updated_at`) VALUES
(1, 'Check In', '2022-09-12 02:10:41', '0000-00-00 00:00:00'),
(4, 'Mutasi', '2022-09-12 02:11:37', NULL),
(5, 'Check Out', '2022-09-12 02:11:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman_kerja`
--

CREATE TABLE `pengalaman_kerja` (
  `id` int(11) NOT NULL,
  `id_calon_karyawan` int(11) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `alasan_berhenti` varchar(255) DEFAULT NULL,
  `jobdesc` varchar(255) DEFAULT NULL,
  `gaji_terakhir` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengalaman_kerja`
--

INSERT INTO `pengalaman_kerja` (`id`, `id_calon_karyawan`, `nama_perusahaan`, `jabatan`, `dept`, `durasi`, `alasan_berhenti`, `jobdesc`, `gaji_terakhir`, `created_at`, `updated_at`) VALUES
(2, 17, 'PT. Cipta Gemilang RayaS', 'Supervisor', 'Team Creative', 49, 'Resign', 'Membuat idea untuk mendukung produksi', 100000000, '2022-09-13 11:16:06', '2022-09-13 12:28:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_tenaga_kerja`
--

CREATE TABLE `permintaan_tenaga_kerja` (
  `id` int(11) NOT NULL,
  `id_requestor` int(11) NOT NULL,
  `untuk_dept` int(11) NOT NULL,
  `untuk_jabatan` int(11) NOT NULL,
  `kebutuhan_manpower` int(11) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `min_pendidikan` varchar(255) NOT NULL,
  `jurusan_pendidikan` varchar(255) NOT NULL,
  `harus_berpengalaman` enum('Ya','Tidak') NOT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening_karyawan`
--

CREATE TABLE `rekening_karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id` int(11) NOT NULL,
  `id_calon_karyawan` int(11) NOT NULL,
  `jenis_pendidikan` enum('Formal','Non Formal') NOT NULL,
  `jenjang_pendidikan` varchar(255) DEFAULT NULL,
  `program_keahlian` varchar(255) NOT NULL,
  `nama_lembaga` varchar(255) NOT NULL,
  `alamat_lembaga` varchar(255) NOT NULL,
  `berijazah` enum('Ya','Tidak') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id`, `id_calon_karyawan`, `jenis_pendidikan`, `jenjang_pendidikan`, `program_keahlian`, `nama_lembaga`, `alamat_lembaga`, `berijazah`, `created_at`, `updated_at`) VALUES
(8, 17, 'Formal', 'S1', 'Teknik Informatikas', 'UNPAD', 'Bandung', 'Ya', '2022-09-13 11:16:06', '2022-09-13 12:28:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `id_calon_karyawan` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban_test` varchar(255) DEFAULT NULL,
  `verifikasi_jawaban` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transisi`
--

CREATE TABLE `transisi` (
  `id` int(11) NOT NULL,
  `id_master_transisi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_dept` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_karyawan`, `id_role`, `username`, `password`, `created_at`, `updated_at`) VALUES
(10, NULL, 1, 'superadmin', '$2y$10$B0qVKdx0c6LtiP/G1TaP2.pJB0jm4bE9Hhdvc2Pkc95w543YubDNW', '2022-09-12 11:34:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_calon_karyawan` (`id_calon_karyawan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_dept`
--
ALTER TABLE `master_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_jenis_soal`
--
ALTER TABLE `master_jenis_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_role`
--
ALTER TABLE `master_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_soal`
--
ALTER TABLE `master_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_soal` (`id_jenis_soal`);

--
-- Indeks untuk tabel `master_transisi`
--
ALTER TABLE `master_transisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_calon_karyawan` (`id_calon_karyawan`);

--
-- Indeks untuk tabel `permintaan_tenaga_kerja`
--
ALTER TABLE `permintaan_tenaga_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_requestor` (`id_requestor`),
  ADD KEY `untuk_dept` (`untuk_dept`),
  ADD KEY `untuk_jabatan` (`untuk_jabatan`);

--
-- Indeks untuk tabel `rekening_karyawan`
--
ALTER TABLE `rekening_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_calon_karyawan` (`id_calon_karyawan`);

--
-- Indeks untuk tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_calon_karyawan` (`id_calon_karyawan`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `transisi`
--
ALTER TABLE `transisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master_transisi` (`id_master_transisi`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_dept` (`id_dept`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_dept`
--
ALTER TABLE `master_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `master_jenis_soal`
--
ALTER TABLE `master_jenis_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_role`
--
ALTER TABLE `master_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_soal`
--
ALTER TABLE `master_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_transisi`
--
ALTER TABLE `master_transisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `permintaan_tenaga_kerja`
--
ALTER TABLE `permintaan_tenaga_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekening_karyawan`
--
ALTER TABLE `rekening_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transisi`
--
ALTER TABLE `transisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `asuransi`
--
ALTER TABLE `asuransi`
  ADD CONSTRAINT `asuransi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `master_soal`
--
ALTER TABLE `master_soal`
  ADD CONSTRAINT `master_soal_ibfk_1` FOREIGN KEY (`id_jenis_soal`) REFERENCES `master_jenis_soal` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD CONSTRAINT `pengalaman_kerja_ibfk_1` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `permintaan_tenaga_kerja`
--
ALTER TABLE `permintaan_tenaga_kerja`
  ADD CONSTRAINT `permintaan_tenaga_kerja_ibfk_1` FOREIGN KEY (`id_requestor`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `permintaan_tenaga_kerja_ibfk_2` FOREIGN KEY (`untuk_dept`) REFERENCES `master_dept` (`id`),
  ADD CONSTRAINT `permintaan_tenaga_kerja_ibfk_3` FOREIGN KEY (`untuk_jabatan`) REFERENCES `master_jabatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `rekening_karyawan`
--
ALTER TABLE `rekening_karyawan`
  ADD CONSTRAINT `rekening_karyawan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id`),
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `master_jenis_soal` (`id`);

--
-- Ketidakleluasaan untuk tabel `transisi`
--
ALTER TABLE `transisi`
  ADD CONSTRAINT `transisi_ibfk_1` FOREIGN KEY (`id_master_transisi`) REFERENCES `master_transisi` (`id`),
  ADD CONSTRAINT `transisi_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `transisi_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `master_jabatan` (`id`),
  ADD CONSTRAINT `transisi_ibfk_4` FOREIGN KEY (`id_dept`) REFERENCES `master_dept` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `master_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
