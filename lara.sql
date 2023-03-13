-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 07:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisis`
--

CREATE TABLE `disposisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_disposisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisis`
--

INSERT INTO `disposisis` (`id`, `nama_disposisi`, `created_at`, `updated_at`) VALUES
(1, 'Sekretaris', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(2, 'Koordinator Bidang Perizinan Terpadu Satu Pintu', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(3, 'Koordinator Bidang Penanaman Modal', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(4, 'Kepala Subbag Umum', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(5, 'Nambah Baru', '2023-03-07 20:16:23', '2023-03-07 20:16:23'),
(6, 'A', '2023-03-07 23:11:40', '2023-03-07 23:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instansis`
--

CREATE TABLE `instansis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instansis`
--

INSERT INTO `instansis` (`id`, `nama_instansi`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Komunikasi Informatika', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(2, 'Dinas Pekerjaan Umum', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(3, 'Dinas Kelautan Perikanan', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(4, 'Sekretariat Daerah', '2023-03-07 05:23:12', '2023-03-07 05:23:12'),
(5, 'Nambah Baru2', '2023-03-07 20:16:35', '2023-03-07 20:16:40'),
(6, 'A', '2023-03-07 23:11:50', '2023-03-07 23:11:50');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_06_114530_create_surats_table', 1),
(6, '2023_03_06_121551_create_instansis_table', 1),
(7, '2023_03_06_121653_create_disposisis_table', 1),
(8, '2023_03_06_122130_add_column_instansi_id_to_surats', 1),
(9, '2023_03_06_122355_add_column_disposisi_id_to_surats', 1),
(10, '2023_03_07_115433_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', 'cc48f8895fd1ca720b15afdc9560ccd014dcf3ff5f93a96606b908fdfe42636b', '[\"*\"]', '2023-03-07 23:19:14', '2023-03-07 20:43:51', '2023-03-07 23:19:14'),
(2, 'App\\Models\\User', 1, 'auth_token', '9226a3112b9b183b06e3b24f8ff7d03c7e83dfa891b2100d0dc245211db71a20', '[\"*\"]', NULL, '2023-03-07 23:02:30', '2023-03-07 23:02:30'),
(3, 'App\\Models\\User', 1, 'auth_token', 'd127662f8752c5b9d4cfc373174ac714e911d2fe1f5138224b2265c12b3373c5', '[\"*\"]', '2023-03-07 23:16:04', '2023-03-07 23:15:47', '2023-03-07 23:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-03-07 05:23:11', '2023-03-07 05:23:11'),
(2, 'user', 'web', '2023-03-07 05:23:11', '2023-03-07 05:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `instansi_id` bigint(20) UNSIGNED NOT NULL,
  `disposisi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surats`
--

INSERT INTO `surats` (`id`, `nomor_surat`, `tanggal_surat`, `perihal_surat`, `file_surat`, `created_at`, `updated_at`, `instansi_id`, `disposisi_id`) VALUES
(1, '300/DK', '2023-03-08', 'Tes', 'dokumen/6407ed9e55876.pdf', '2023-03-07 19:06:22', '2023-03-07 19:06:22', 1, 2),
(2, '234 rapi', '2023-01-06', 'a', 'tttess', '2023-03-07 20:45:40', '2023-03-07 20:45:40', 1, 1),
(5, '123213', '2023-03-08', 'acac', 'dokumen/640812c923ad7.pdf', '2023-03-07 21:44:57', '2023-03-07 21:44:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Kahfi', 'admin@gmail.com', NULL, '$2y$10$j.OFXxPfIcjVT42AYSTveuo1SgfAZyDKb.8w6ES0cfhC3qHFoObT.', NULL, '2023-03-07 05:23:11', '2023-03-07 20:27:25'),
(2, 'User Kahfi', 'user@gmail.com', NULL, '$2y$10$kcluoavrccxZmgUBUpHhjOQE6nyZm2KB.ZWmLEZcT.Qm0sR2kLg9K', NULL, '2023-03-07 05:23:11', '2023-03-07 05:23:11'),
(4, 'Mohammad Kahfi', 'aaa@gmail.com', NULL, '$2y$10$hxfO5QwmgLiIh5eh9Z3pNeBFcZgPB0/Efg8fG37FjDBX4fVqA/qPm', NULL, '2023-03-07 07:58:45', '2023-03-07 07:58:45'),
(5, 'Mohammad Kahfi', 'aas@gmail.com', NULL, '$2y$10$yCHMzIJBaJcq78OjgwyfIOlbR4T8vbyoxMlw9c.AR0dxGOanfnnia', NULL, '2023-03-07 07:59:31', '2023-03-07 07:59:31'),
(9, 'aaa', 'aaa@aa.com', NULL, '$2y$10$DDCQELSZGy0W7mT0Wyufeumn3paO52zb84cD75a0NI3wQBC4DNTMC', NULL, '2023-03-07 19:46:26', '2023-03-07 19:46:26'),
(10, 'baba', 'bb@gmail.com', NULL, '$2y$10$BF3IGBX0mE6q1jTlKy.QP.9GNJM4ldVtIHTjv/zJN0Lt3B1pfDmjW', NULL, '2023-03-07 19:47:04', '2023-03-07 21:16:28'),
(12, 'a', 'admin@admin.com2', NULL, '$2y$10$pxn6k8pS9X96grzMSsPMnOzad5QD45cPJcq7gxLNbTFz4HjdG0IHK', NULL, '2023-03-07 23:15:02', '2023-03-07 23:15:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisis`
--
ALTER TABLE `disposisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instansis`
--
ALTER TABLE `instansis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surats_instansi_id_foreign` (`instansi_id`),
  ADD KEY `surats_disposisi_id_foreign` (`disposisi_id`);

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
-- AUTO_INCREMENT for table `disposisis`
--
ALTER TABLE `disposisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instansis`
--
ALTER TABLE `instansis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surats`
--
ALTER TABLE `surats`
  ADD CONSTRAINT `surats_disposisi_id_foreign` FOREIGN KEY (`disposisi_id`) REFERENCES `disposisis` (`id`),
  ADD CONSTRAINT `surats_instansi_id_foreign` FOREIGN KEY (`instansi_id`) REFERENCES `instansis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
