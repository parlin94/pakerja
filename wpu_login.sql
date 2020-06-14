-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2020 pada 12.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `kode_diagnosa` varchar(225) NOT NULL,
  `nama_diagnosa` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `kode_diagnosa`, `nama_diagnosa`, `keterangan`) VALUES
(12, 'SK01', 'Tidak Stres', 'Tingkat kesehatan terus dipertahankan'),
(15, 'SK02', 'Stres Rendah', '1. Cari waktu jeda sejenak kalau dikantor, entah ketemu teman kantor dan tukar pikiran atau keluar atau keluar dari ruangan bisa ke kantin atau breaktime\r\n2. Lakukan meditasi sebentar untuk menenangkan diri.\r\n3. Cuci muka sebentar karena air yang kena muka jadi buat fresh berkaitan dengan relaksasi. \r\n4. Bisa berolahraga ringan ditempat duduk\r\n5. Lakukan hobby mislanya dengan musik sebentar atau \r\n    menggambar, lalu lanjutkan lagi pekerjaan.\r\n6. Cari tahu sumber stres apa lalu diskusikan dengan orang \r\n     terdekat atau bertanya pada diri sendiri/intropeksi diri.\r\n7. Buat prioritas untuk dikerjakan satu persatu.\r\n8. Kasih apresiasi kecil pada diri sendiri\r\n9. Makan makanan yang bergizi\r\n'),
(16, 'SK03', 'Stres Sedang', '1. Coba flashback yang mana jadi masalah utama dulu, buat list prioritas. \r\n2. Buat jadwal sehari-hari dan buat rutinitas\r\n3. Meditasi buat ketenangan\r\n4. Buat rencana diri buat riward diri\r\n5. Tukar pikiran dengan teman dan ahli jika diperlukan\r\n6. Berpikir positif bahwa setiap masalah pasti ada solusinya\r\n'),
(17, 'SK04', 'Stres Tinggi', '1. Ambil waktu beristrahat\r\n2. Buat prioritas dan tentuin mana yang mau diselesaikan terlebih dahulu\r\n3. Makan makanan yang bergizi \r\n4. Lakukan meditasi/olahraga\r\n5. Meminta bantuan ke ahli\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode_gejala` varchar(225) NOT NULL,
  `nama_gejala` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `nama_gejala`, `keterangan`) VALUES
(74, 'G001', 'Tugas yang diberikan perusahaan berlebihan', 'Tugas yang diberikan perusahaan berlebihan'),
(75, 'G002', 'Tanggung jawab yang diberikan perusahaan sangat memberatkan', 'Tanggung jawab yang diberikan perusahaan sangat memberatkan'),
(76, 'G003', 'Dikejar waktu dalam menyelesaikan pekerjaan', 'Dikejar waktu dalam menyelesaikan pekerjaan'),
(77, 'G004', 'Tugas yang dilakukan tidak terjadwal dengan baik', 'Tugas yang dilakukan tidak terjadwal dengan baik'),
(78, 'G005', 'Mengalami kesulitan memenuhi target perusahaan', 'Mengalami kesulitan memenuhi target perusahaan'),
(79, 'G006', 'Mendapat waktu istirahat yang kurang untuk menjalankan pekerjaan', 'Mendapat waktu istirahat yang kurang untuk menjalankan pekerjaan'),
(80, 'G007', 'Tidak mampu menyelesaikan pekerjaan tepat waktu', 'Tidak mampu menyelesaikan pekerjaan tepat waktu'),
(81, 'G008', 'Bekerja dengan peralatan yang tidak memadai', 'Bekerja dengan peralatan yang tidak memadai'),
(82, 'G009', 'Lingkungan kerja yang banyak gangguan', 'Lingkungan kerja yang banyak gangguan'),
(83, 'G010', 'Lingkungan kerja yang banyak gangguan', 'tetes'),
(84, 'G011', 'Lingkungan kerja yang banyak gangguan', 'Lingkungan kerja yang banyak gangguan'),
(85, 'G012', 'Melakukan pekerjaan yang dirasa tidak dimengerti/tidak cocok', 'Melakukan pekerjaan yang dirasa tidak dimengerti/tidak cocok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `keyakinan` float NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id` int(11) NOT NULL,
  `diagnosa_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `mb` double NOT NULL,
  `md` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id`, `diagnosa_id`, `gejala_id`, `mb`, `md`) VALUES
(6, 12, 74, 2, 2),
(14, 12, 75, 0, 0),
(16, 12, 74, 0.3, 0.1),
(17, 12, 77, 0, 0),
(18, 12, 74, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `user_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'parlin dh', 'duhaperi@gmail.com', 'photo.png', '$2y$10$HhfupMQF/12avL/ZX1bK.uQoUsLHR/xkKSTGqfyRXJz7w9carWvCW', 1, 1, 1589092529),
(2, 'Roni', 'yosefduha@gmail.com', '1443163545-Ibnu_Sina_Wardi.png', '$2y$10$3/kSIcvwx2fplVWP5o2lku5xbOqJEQ0RrDiLHygJZFAXmCnO/kxhu', 2, 1, 1589863390);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(8, 1, 2),
(15, 2, 2),
(16, 1, 5),
(17, 1, 3),
(18, 5, 2),
(21, 5, 3),
(23, 7, 2),
(27, 7, 3),
(29, 8, 3),
(33, 28, 2),
(34, 30, 2),
(35, 30, 3),
(36, 30, 13),
(37, 30, 12),
(39, 0, 12),
(42, 2, 12),
(43, 1, 12),
(44, 1, 14),
(45, 0, 15),
(50, 0, 2),
(51, 1, 15),
(52, 1, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(14, 'Diagnosa'),
(15, 'Relasi'),
(16, 'gejala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-tachometer-alt', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role Acces', 'admin/role', 'fas fa-fw fa-key', 1),
(9, 5, 'Gejala', 'diagnosa/gejala', 'fas fa-fw fa-user', 1),
(17, 14, 'Data Diagnosa', 'diagnosa/index', 'fas fa-fw fa-briefcase-medical', 1),
(19, 1, 'Manajemen User', 'admin/pengguna', 'fas fa-fw fa-address-card', 1),
(20, 16, 'Data Gejala', 'gejala/index', 'fas fa-fw fa-briefcase-medical', 1),
(26, 15, 'Nilai CF', 'relasi/index', 'fas fa-fw fa-broadcast-tower', 1),
(27, 2, 'Dashboard', 'user/dashboard', 'fas fa-fw fa-home', 1),
(28, 2, 'Konsultasi', 'user/konsultasi', 'fa fa-fw fa-fw fa-balance-scale', 1),
(29, 2, 'Profile', 'user/index', 'fas fa-fw fa-user', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_diagnosa` (`kode_diagnosa`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
