-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2023 pada 14.30
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
-- Database: `pemilu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_27_020304_create_tbl_paslon', 2),
(5, '2020_10_27_020715_create_tbl_paslon', 3),
(6, '2020_11_05_011013_create_tbl_voting', 4),
(7, '2020_11_05_015018_create_tbl_hasil_voting', 5),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil_voting`
--

CREATE TABLE `tbl_hasil_voting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_urut_paslon` int(11) DEFAULT NULL,
  `jumlah_vote` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paslon`
--

CREATE TABLE `tbl_paslon` (
  `id` bigint(20) NOT NULL,
  `no_urut_paslon` int(11) NOT NULL,
  `ketua_paslon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wakil_paslon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi_paslon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi_paslon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_wakil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_paslon`
--

INSERT INTO `tbl_paslon` (`id`, `no_urut_paslon`, `ketua_paslon`, `wakil_paslon`, `visi_paslon`, `misi_paslon`, `img_ketua`, `img_wakil`, `created_at`, `updated_at`) VALUES
(7, 1, 'Geanohan Yuga', 'Amanda Nabila', 'Menjadikan tempat sekolah menjadi salah satu lembaga pendidikan berkualitas dan dan berprestasi. Semaksimal mungkin untuk menggerakkan anggota kelas agar menjadi pelajar yang kreatif, aktif, bertanggungjawab, dan dilandasi dengan iman.', '1. Terus menumbuhkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa melalui berbagai macam bimbingan rohani yang dilakukan di kelas.\r\n\r\n2. Mengajak anggota kelas untuk menunjukkan identitas dan eksistensi dalam bidang akademik maupun non akademik\r\n\r\n3. Terus menumbuhkan rasa kekeluargaan antara anggota kelas\r\n\r\n4. Meningkatkan rasa kedisiplinan dengan berbagai macam kegiatan\r\n\r\n5. Menegaskan berbagai macam aturan\r\n\r\n6. Meningkatkan kembali kesadaran pelajar mengenai pentingnya menjaga lingkungan kelas dan sekolah.\r\n\r\n7. Terus mengembangkan kreativitas, Bakat, minat, dan potensi setiap siswa melalui berbagai macam kegiatan yang telah disediakan oleh sekolah\r\n\r\n8. Mengoptimalkan fungsi dan peranan kelas untuk meningkatkan kerja sama\r\n\r\n9. Melanjutkan Berbagai macam program kelas yang belum terselesaikan sebelumnya\r\n\r\n10. Terus mengoptimalkan anggota kelas untuk bisa memajukan sekolah agar menjadi lebih berprestasi.', '1657043736_sila 1.png', '1657043736_sila 2.png', '2022-07-05 17:55:36', '2022-07-06 04:22:17'),
(8, 2, 'Hanung Anjas', 'Amalia Suci', 'Untuk membangun kelas yang memiliki anggota berkualitas, bermoral, kreatif, dan memiliki prestasi yang baik, secara akademik maupun non akademik.', '1. Terus mengadakan berbagai macam kegiatan latihan yang telah diselenggarakan oleh sekolah. Hal tersebut bertujuan agar pelajar atau anggota kelas lebih disiplin dan mandiri.\r\n2. Terus mengadakan berbagai macam kegiatan latihan yang telah diselenggarakan oleh sekolah. Hal tersebut bertujuan agar pelajar atau anggota kelas lebih disiplin dan mandiri.\r\n3. Membangun rasa kekeluargaan antar anggota kelas dan pihak sekolah.', '1657043948_sila 3.png', '1657043948_sila 4.png', '2022-07-05 17:59:08', '2022-07-05 17:59:08'),
(9, 3, 'Muhammad Naufal', 'Vedica Widya', 'Membangun kelas yang memiliki siswa/i berkualitas, bermoral baik, kreatif, disiplin dan berprestasi baik akademik atau non akademik', '1) Mengadakan kegiatan latihan pramuka agar siswa lebih mandiri dan disiplin\r\n2) Membangun kelas yang bersih dan rapi dengan cara diadakan piket dan sanksi bagi yang melanggarnya', '1657045414_bg vsga.jpeg', '1657045414_220px-Sultan_Hamid_II.jpg', '2022-07-05 18:01:31', '2022-07-05 18:23:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `nama`) VALUES
(1, 'Sudah Voting'),
(2, 'Belum Voting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_voting`
--

CREATE TABLE `tbl_voting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_urut_paslon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_voting`
--

INSERT INTO `tbl_voting` (`id`, `id_user`, `no_urut_paslon`, `created_at`, `updated_at`) VALUES
(30, 139, 1, '2022-07-14 07:34:50', '2022-07-14 07:34:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(88, 'Administrator', 'admin', 'admin@gmail.com', 2, NULL, '$2y$10$wT6lj5wyavYNhr8GWXM8COTh9CpPTdoiqfhd1ZuQgAZ6iBxduYya6', NULL, '2022-07-05 03:04:40', '2022-07-05 03:04:40'),
(142, 'Wayan', 'Pemilih', 'wayantrk@gmail.com', 2, NULL, '$2y$10$.kMphnd4QHFF4TfrekTYQezAxR/P8b/C75ugG4N/dN8SGdmmmCCj2', NULL, '2023-01-09 11:43:01', '2023-01-09 11:43:01'),
(143, 'Sandy', 'Pemilih', 'sandy@gmail.com', 2, NULL, '$2y$10$wRL4Fqcf/yhABPyUrG6Bgez.d8bEEPjzhJXbn332K4.l/UPGbZfJW', NULL, '2023-01-09 12:18:55', '2023-01-09 12:18:55'),
(144, 'Zulfa', 'Pemilih', 'zulfa@gmail.com', 2, NULL, '$2y$10$.eOBBKjY9EIqKvCZ3xElLOHltaMl54XpHo7qiZTkzqcyCUOqP1niW', NULL, '2023-01-09 12:19:35', '2023-01-09 12:19:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tbl_hasil_voting`
--
ALTER TABLE `tbl_hasil_voting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_urut_paslon` (`no_urut_paslon`);

--
-- Indeks untuk tabel `tbl_paslon`
--
ALTER TABLE `tbl_paslon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_voting`
--
ALTER TABLE `tbl_voting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil_voting`
--
ALTER TABLE `tbl_hasil_voting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT untuk tabel `tbl_paslon`
--
ALTER TABLE `tbl_paslon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_voting`
--
ALTER TABLE `tbl_voting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
