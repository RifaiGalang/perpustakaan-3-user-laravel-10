-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 03:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `id_penerbit` bigint(20) UNSIGNED NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `id_kategori`, `penulis`, `id_penerbit`, `tahun_terbit`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Cantik Itu Luka', 1, 'Eka Kurniawan', 1, '2004', 2, '9Ykutb7egRmrURK9F7KSUBlz2AoP9BX1zA8E8mUZ.jpg', '2024-01-31 05:47:44', '2024-02-26 14:37:09'),
(2, 'Babad Tanah JAWI', 2, 'W.L. Olthof', 2, '2019', 10, 'uj6knbBBhWvjzWwMYpCD838Onxk4s3XPLE046Zdf.jpg', '2024-01-31 05:51:33', '2024-02-24 11:16:19'),
(3, 'BUMI MANUSIA', 3, 'Pramoedya Ananta Toer', 3, '2005', 5, '5pZVkIVUq2u7QPB0gZIDsgBDZYfFFDH9fm9SkrqL.jpg', '2024-01-31 05:57:54', '2024-02-25 14:49:47'),
(4, 'PERJALANAN MENUJU PULANG', 4, 'Lala Bohang & Lara Nuberg', 1, '2021', 4, 'M24cEgiyZMJZh7Du5oQGPENfMfLUje4tRIbXsZkn.jpg', '2024-01-31 06:01:09', '2024-02-27 02:37:42'),
(5, 'FALSAFAH KEBUDAYAAN PANCASILA', 5, 'Syaiful Arif', 1, '2016', 10, 'dXZmfOTvuPJO6p6sfpXVhKDUPNKmtoAJkbbgkiuh.jpg', '2024-01-31 10:10:02', '2024-02-26 14:49:11'),
(6, 'Agama Publik Indonesia', 6, 'Benyamin F. Intan. PhD', 4, '2023', 15, '5GQSbCpAhkucAnZ40JdmxvghxGqBcaEm2OKHiAD4.png', '2024-02-11 02:13:40', '2024-02-25 14:49:57'),
(8, 'Modul Digital Marketing', 8, 'Askarna , Siti Komara,  Sutono, dan  Daimah', 5, '2024', 20, 'k6HP45Z0eGtWycyKooaimuCpWTyuItc407hy18W7.jpg', '2024-02-18 20:59:26', '2024-02-25 14:50:04'),
(9, 'Tuhan ada Di Hatimu', 9, 'Husein Ja\'far Al-Hadar', 6, '2020', 10, '7RCW12321q1f4B3mLsfIR6LwTD2jQ5efuoVK5SCA.jpg', '2024-02-18 21:12:12', '2024-02-25 14:49:40'),
(10, 'Laskar Pelangi Edisi ke-50', 1, 'Andrea Hirata', 28, '2020', 5, 'XEwm7i1y184OLsrsKXlmIkLuqqVkvgjmeah9190X.jpg', '2024-02-26 02:14:29', '2024-02-26 14:14:05'),
(11, 'Menjadi Dewasa Itu Tidak Mudah. Ya ?', 15, 'Sdavincii', 1, '2023', 9, 'Evrl3vvmVNAnWY9OwjEjqRV1yCxxmM9A7YiugiIO.jpg', '2024-02-26 02:54:12', '2024-02-26 14:44:18'),
(12, '\"Manusia Baru\" Indonesia', 14, 'RHOMA DWI ARIA YULIANTRI', 4, '2023', 4, 'y0BJuwmOpd0r86Jgi42HaYgLSmcE4GYEZkqv95US.jpg', '2024-02-26 14:25:46', '2024-02-26 14:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Novel', '2024-02-01 07:43:31', '2024-02-01 07:50:13'),
(2, 'Majalah Muda', '2024-02-01 07:51:03', '2024-02-18 21:18:12'),
(3, 'Buku Ilmiah', '2024-02-01 09:39:07', '2024-02-01 09:39:07'),
(4, 'Buku Fiksi', '2024-02-11 00:42:35', '2024-02-11 00:42:35'),
(5, 'Cerita Pendek', '2024-02-12 21:10:18', '2024-02-13 22:34:24'),
(6, 'Ilmu Pengetahuan Umum', '2024-02-13 20:15:00', '2024-02-13 20:15:00'),
(7, 'Keagamaan', '2024-02-13 22:16:12', '2024-02-13 22:16:12'),
(8, 'Kebudayaan', '2024-02-13 22:18:09', '2024-02-13 22:18:09'),
(9, 'Buku Ajar', '2024-02-13 22:25:11', '2024-02-26 14:16:27'),
(11, 'Agreteknologi', '2024-02-14 21:53:11', '2024-02-14 21:53:11'),
(12, 'Religius', '2024-02-18 21:10:42', '2024-02-18 21:10:42'),
(13, 'Karya Tulis Ilmiah', '2024-02-19 09:36:58', '2024-02-19 09:36:58'),
(14, 'Ilmu Pengetahuan Sosial', '2024-02-26 01:21:57', '2024-02-26 01:21:57'),
(15, 'Buku Non-Fiksi', '2024-02-26 02:50:13', '2024-02-26 02:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`id`, `id_user`, `id_buku`, `created_at`, `updated_at`) VALUES
(4, 8, 6, '2024-02-19 09:45:30', '2024-02-19 09:45:30'),
(5, 8, 3, '2024-02-19 17:56:25', '2024-02-19 17:56:25'),
(6, 8, 9, '2024-02-19 17:58:17', '2024-02-19 17:58:17'),
(9, 4, 8, '2024-02-19 23:09:25', '2024-02-19 23:09:25'),
(10, 9, 1, '2024-02-26 01:05:53', '2024-02-26 01:05:53'),
(11, 5, 2, '2024-02-27 02:38:08', '2024-02-27 02:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_01_31_123619_buku', 2),
(4, '2024_02_01_133636_kategoribuku', 3),
(6, '2024_02_04_064137_relasikategori', 4),
(7, '2024_02_11_092035_peminjaman', 5),
(8, '2024_02_19_043219_koleksipribadi', 6),
(9, '2024_02_20_021052_ulasanbuku', 7),
(10, '2024_02_20_073030_add_to_buku', 8),
(11, '2024_02_22_102624_penerbit', 9);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` timestamp NULL DEFAULT NULL,
  `tgl_kembali` timestamp NULL DEFAULT NULL,
  `statuspeminjaman` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_user`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `statuspeminjaman`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '2024-02-14 17:00:00', '2024-02-18 17:00:00', 'Sudah di Kembalikan', '2024-02-15 00:48:52', '2024-02-18 19:04:06'),
(2, 5, 3, '2024-02-14 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-15 06:36:10', '2024-02-17 08:40:09'),
(3, 8, 3, '2024-02-14 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-15 06:43:35', '2024-02-17 10:05:19'),
(4, 8, 6, '2024-02-14 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-15 08:07:54', '2024-02-17 10:05:26'),
(5, 8, 4, '2024-02-15 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-16 08:11:08', '2024-02-17 10:05:22'),
(6, 5, 1, '2024-02-16 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-17 04:01:30', '2024-02-17 10:10:52'),
(7, 5, 2, '2024-02-16 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-17 05:04:27', '2024-02-17 08:43:44'),
(8, 5, 6, '2024-02-16 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-17 06:46:45', '2024-02-17 08:40:25'),
(9, 5, 4, '2024-02-16 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-17 08:44:52', '2024-02-17 08:57:24'),
(10, 5, 6, '2024-02-16 17:00:00', '2024-02-16 17:00:00', 'Sudah di Kembalikan', '2024-02-17 08:55:30', '2024-02-17 10:10:55'),
(11, 5, 1, '2024-02-18 17:00:00', '2024-02-18 17:00:00', 'Sudah di Kembalikan', '2024-02-18 18:25:19', '2024-02-18 19:17:55'),
(12, 8, 1, '2024-02-18 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-18 20:41:59', '2024-02-20 21:57:48'),
(13, 5, 9, '2024-02-18 17:00:00', '2024-02-18 17:00:00', 'Sudah di Kembalikan', '2024-02-18 22:37:25', '2024-02-19 00:55:22'),
(14, 5, 9, '2024-02-18 17:00:00', '2024-02-19 17:00:00', 'Sudah di Kembalikan', '2024-02-19 00:55:57', '2024-02-19 19:03:35'),
(15, 5, 2, '2024-02-19 17:00:00', '2024-02-19 17:00:00', 'Sudah di Kembalikan', '2024-02-19 18:53:24', '2024-02-19 19:04:23'),
(17, 5, 3, '2024-02-19 17:00:00', '2024-02-19 17:00:00', 'Sudah di Kembalikan', '2024-02-19 19:03:48', '2024-02-19 19:04:27'),
(18, 5, 2, '2024-02-19 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-19 19:04:37', '2024-02-20 21:22:20'),
(19, 5, 3, '2024-02-19 17:00:00', '2024-02-19 17:00:00', 'Sudah di Kembalikan', '2024-02-19 19:04:42', '2024-02-19 19:05:48'),
(20, 5, 9, '2024-02-19 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-19 19:05:38', '2024-02-20 21:23:47'),
(21, 5, 8, '2024-02-19 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-19 19:06:50', '2024-02-20 21:49:46'),
(22, 4, 8, '2024-02-19 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-19 23:21:10', '2024-02-20 21:49:50'),
(23, 5, 5, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 19:49:00', '2024-02-20 21:57:51'),
(24, 5, 3, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 21:31:30', '2024-02-20 21:57:53'),
(25, 5, 6, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 21:33:47', '2024-02-20 21:57:56'),
(26, 5, 4, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 21:36:26', '2024-02-20 21:57:58'),
(27, 5, 2, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 21:39:21', '2024-02-20 21:58:01'),
(28, 5, 1, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 21:52:42', '2024-02-20 21:58:15'),
(29, 5, 1, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 21:58:44', '2024-02-20 22:15:17'),
(30, 8, 1, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 21:59:07', '2024-02-20 22:15:20'),
(31, 5, 1, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 22:15:58', '2024-02-20 22:23:57'),
(32, 8, 1, '2024-02-20 17:00:00', '2024-02-20 17:00:00', 'Sudah di Kembalikan', '2024-02-20 22:16:21', '2024-02-20 22:25:12'),
(33, 5, 1, '2024-02-21 05:41:43', '2024-02-20 22:41:43', 'Sudah di Kembalikan', '2024-02-20 22:29:12', '2024-02-20 22:41:43'),
(34, 4, 4, '2024-02-21 07:51:24', '2024-02-21 00:51:24', 'Sudah di Kembalikan', '2024-02-20 22:37:30', '2024-02-21 00:51:24'),
(35, 5, 4, '2024-02-22 03:20:10', '2024-02-22 03:20:10', 'Sudah di Kembalikan', '2024-02-21 00:50:03', '2024-02-22 03:20:10'),
(36, 5, 2, '2024-02-24 10:59:05', '2024-02-24 10:59:05', 'Sudah di Kembalikan', '2024-02-22 03:14:29', '2024-02-24 10:59:05'),
(37, 5, 8, '2024-02-24 10:59:09', '2024-02-24 10:59:09', 'Sudah di Kembalikan', '2024-02-22 03:16:30', '2024-02-24 10:59:09'),
(42, 4, 1, '2024-02-25 14:49:44', '2024-02-25 14:49:44', 'Sudah di Kembalikan', '2024-02-23 02:06:23', '2024-02-25 14:49:44'),
(44, 5, 2, '2024-02-24 10:59:12', '2024-02-24 10:59:12', 'Sudah di Kembalikan', '2024-02-23 03:02:01', '2024-02-24 10:59:12'),
(45, 5, 1, '2024-02-24 10:59:15', '2024-02-24 10:59:15', 'Sudah di Kembalikan', '2024-02-23 03:04:39', '2024-02-24 10:59:15'),
(51, 5, 3, '2024-02-25 14:49:47', '2024-02-25 14:49:47', 'Sudah di Kembalikan', '2024-02-24 11:14:55', '2024-02-25 14:49:47'),
(52, 5, 4, '2024-02-25 14:49:51', '2024-02-25 14:49:51', 'Sudah di Kembalikan', '2024-02-24 11:15:09', '2024-02-25 14:49:51'),
(53, 5, 5, '2024-02-25 14:49:54', '2024-02-25 14:49:54', 'Sudah di Kembalikan', '2024-02-24 11:15:20', '2024-02-25 14:49:54'),
(54, 5, 6, '2024-02-25 14:49:57', '2024-02-25 14:49:57', 'Sudah di Kembalikan', '2024-02-24 11:15:31', '2024-02-25 14:49:57'),
(55, 5, 8, '2024-02-25 14:50:04', '2024-02-25 14:50:04', 'Sudah di Kembalikan', '2024-02-24 11:16:03', '2024-02-25 14:50:04'),
(59, 8, 1, '2024-02-26 14:37:09', '2024-02-26 14:37:09', 'Sudah di Kembalikan', '2024-02-24 11:23:08', '2024-02-26 14:37:09'),
(63, 5, 9, '2024-02-25 14:49:40', '2024-02-25 14:49:40', 'Sudah di Kembalikan', '2024-02-25 14:45:48', '2024-02-25 14:49:40'),
(65, 5, 9, '2024-02-25 14:49:17', '2024-02-25 14:49:17', 'Sudah di Kembalikan', '2024-02-25 14:47:51', '2024-02-25 14:49:17'),
(66, 9, 11, '2024-02-26 14:44:18', '2024-02-26 14:44:18', 'Sudah di Kembalikan', '2024-02-26 14:27:08', '2024-02-26 14:44:18'),
(67, 9, 5, '2024-02-26 14:47:23', '2024-02-26 14:49:11', 'Sudah di Kembalikan', '2024-02-26 14:47:23', '2024-02-26 14:49:11'),
(68, 5, 4, '2024-02-27 02:37:42', NULL, 'Belum di Kembalikan', '2024-02-27 02:37:42', '2024-02-27 02:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama_penerbit`, `created_at`, `updated_at`) VALUES
(1, 'Gramedia Pustaka Utama', '2024-02-22 03:57:26', '2024-02-22 03:57:26'),
(2, 'Narasi', '2024-02-22 03:59:14', '2024-02-22 03:59:14'),
(3, 'Lentera Dipantara', '2024-02-22 04:00:14', '2024-02-22 04:00:14'),
(4, 'Penerbit Buku Kompas', '2024-02-22 04:00:34', '2024-02-22 04:00:34'),
(5, 'CV. Green Publisher Indonesia', '2024-02-22 04:01:08', '2024-02-22 04:01:08'),
(6, 'Noura Books Publishing', '2024-02-22 04:01:30', '2024-02-22 04:01:30'),
(28, 'Bentang Pustaka', '2024-02-26 01:56:02', '2024-02-26 01:56:02'),
(29, 'Gradien Mediatama', '2024-02-26 02:54:55', '2024-02-26 14:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `rating` enum('1','2','3','4','5') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`id`, `id_user`, `id_buku`, `ulasan`, `rating`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Buku nya unik...', '5', '2024-02-19 21:38:49', '2024-02-19 21:38:49'),
(2, 4, 8, 'Baguuussssss sangat menginspirasi', '5', '2024-02-19 23:16:55', '2024-02-19 23:16:55'),
(3, 8, 5, 'merdekaa.....!!!', '4', '2024-02-20 23:07:05', '2024-02-20 23:07:05'),
(4, 9, 1, 'bukunya menarik, ada yang tidak bisa dilupakan tentang hati seseorang terhadap perilaku hidupnya', '2', '2024-02-26 02:38:50', '2024-02-26 02:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','peminjam','') NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `nama_lengkap`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AdminAplikasi', 'admin@admin.com', NULL, '$2y$12$FgU6Wa/aYFXH8kmYXzzPQOrT6Oyzzq/AtWbt.JFxchfRQFNutFP4y', 'admin', 'admin perpus', 'ponorogo', 'R8BQpv761NjiJzWYNBucexoq8CXC7qpc4vTZTb51tUWHjm3y5vbGxCR0o3P7', NULL, NULL),
(2, 'PetugasAplikasi', 'petugas@petugas.com', NULL, '$2y$12$ypaj6fNWJn5.gIplbtlR/O0JC7VA06fWPluyCEU0tWZvwnnQS9vyK', 'petugas', 'petugas perpus', 'ponorogo', 'bpeNKNqCBqrJ7berN14L1TcDxm0dI3JFIn2hSXKSDcjNghaZQQHwppGmSKVS', NULL, NULL),
(4, 'munawiri', 'muh@munawir', NULL, '$2y$12$p0hqIyw2beUpgsCH/rLGEe.8EHVOgoQIRLXQu9D2WFA93j5ztXti.', 'peminjam', 'Muhammad Munawir Irsyad', 'Bangunrejo, Sukorejo, Ponorogo', NULL, '2024-02-01 09:09:54', '2024-02-01 09:09:54'),
(5, 'ibuk', 'ibuk@ibuk.com', NULL, '$2y$12$pPSicgZcQd4DjcAxMJJAZOi/z2n1XRs5LQTFoDP70UqqBz3KLVEoa', 'peminjam', 'ibuk Siti', 'Bangunrejo, Sukorejo, Ponorogo', NULL, '2024-02-03 18:33:41', '2024-02-03 18:33:41'),
(8, 'Muhammad', 'muhammad@muhammad.com', NULL, '$2y$12$LPgufSCf14vIjWEO0bAA6ufB8zbcbJZdCYfPtn/YjFCqRjdQ3Y3Fe', 'peminjam', 'Muhammad Zida', 'Sukorejo, Ponorogo', NULL, '2024-02-15 06:42:37', '2024-02-15 06:42:37'),
(9, 'Bapak', 'bapak@bapak', NULL, '$2y$12$mIcAP.JMplgmU39yCBzS3uwESRuJkHa/38c1.NTEUkFZJ5grZlK7S', 'peminjam', 'Bapak e Galang', 'Bangunrejo, Sukorejo, Ponorogo', NULL, '2024-02-25 15:00:53', '2024-02-25 15:00:53'),
(10, 'Anas Rifa\'i', 'anas@anas', NULL, '$2y$12$FEjw2mK8KC64tkl9lvx3d..dwYnFOhSKgHx7EU2RxNgq7FCR/oSzu', 'peminjam', 'Anas Rifa\'i', 'Lengkong, Sukorejo, Ponorogo', NULL, '2024-02-26 02:08:58', '2024-02-26 02:08:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `koleksipribadi_ibfk_2` (`id_buku`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `peminjaman_ibfk_1` (`id_buku`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasanbuku_id_buku_foreign` (`id_buku`),
  ADD KEY `ulasanbuku_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategoribuku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasanbuku_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
