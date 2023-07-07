-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2023 at 01:19 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skr_vaksin_ternak`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_vaksins`
--

CREATE TABLE `data_vaksins` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terpakai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_vaksins`
--

INSERT INTO `data_vaksins` (`id`, `nama_vaksin`, `jumlah`, `terpakai`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ini', '4', '3', 0, '2023-06-19 17:45:33', '2023-06-16 14:30:24', '2023-06-19 17:45:33'),
(2, 'oke', '5', '2', 0, '2023-06-19 17:45:34', '2023-06-16 14:30:56', '2023-06-19 17:45:34'),
(3, 'asdsa', '5', NULL, 0, '2023-06-19 17:45:35', '2023-06-16 14:36:55', '2023-06-19 17:45:35'),
(7, 'dd', '3', NULL, 0, '2023-06-19 17:45:36', '2023-06-16 14:55:58', '2023-06-19 17:45:36'),
(8, 'Okee', '221', NULL, 0, '2023-06-19 17:45:36', '2023-06-16 17:39:34', '2023-06-19 17:45:36'),
(9, 'Laii', '12', '5', 0, '2023-06-19 17:45:37', '2023-06-16 17:39:46', '2023-06-19 17:45:37'),
(10, 'Sunt quae praesentiu', '21', '2', 0, NULL, '2023-06-19 17:50:14', '2023-06-19 17:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_vaksins`
--

CREATE TABLE `jadwal_vaksins` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwal` datetime NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_vaksin` int DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `data_vaksins_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_vaksins`
--

INSERT INTO `jadwal_vaksins` (`id`, `jadwal`, `lokasi`, `jumlah_vaksin`, `user_id`, `status`, `data_vaksins_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2000-09-18 23:34:00', 'Cupiditate sed eum t', 123, NULL, 0, 2, '2023-06-18 03:08:23', '2023-06-17 04:13:37', '2023-06-18 03:08:23'),
(2, '2000-06-05 06:43:00', 'In nihil illo sed do', 3, 3, 2, 9, '2023-06-18 03:08:11', '2023-06-17 04:13:45', '2023-06-18 03:08:11'),
(3, '2021-08-08 20:06:00', 'Voluptatem est aliq', NULL, NULL, 0, 3, NULL, '2023-06-18 03:08:16', '2023-06-18 03:08:16'),
(4, '1998-08-19 14:15:00', 'Harum aperiam illum', 1, 3, 1, 1, NULL, '2023-06-18 03:08:19', '2023-06-18 03:14:57'),
(5, '2023-06-22 10:31:00', 'Jl Bukit indah', 1, 3, 2, 2, NULL, '2023-06-19 14:27:57', '2023-06-19 14:30:28'),
(6, '2006-11-01 21:06:00', 'Est tempora rerum au', 1, 13, 2, 10, NULL, '2023-06-19 17:50:22', '2023-06-19 17:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_20_082859_create_landlord_tenants_table', 2),
(6, '2023_06_15_114602_create_permission_tables', 3),
(7, '2023_06_16_123526_create_data_vaksins_table', 4),
(10, '2023_06_17_061608_create_jadwal_vaksins_table', 5),
(11, '2023_06_17_123450_create_pendaftaran_vaksins_table', 6),
(12, '2023_06_17_233330_alter_column_jumlah_vaksin_on_tabel_jadwal_vaksins', 7),
(13, '2023_06_18_010153_alter_colum_user_id_on_table_jadwal_vaksins', 8),
(14, '2023_06_19_222048_change_column_nik_on_table_pendaftaran_vaksins', 9),
(15, '2023_06_20_014021_alter_colum_deteled_at_on_table_users', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_vaksins`
--

CREATE TABLE `pendaftaran_vaksins` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_hewan` int NOT NULL,
  `jadwal_vaksin_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran_vaksins`
--

INSERT INTO `pendaftaran_vaksins` (`id`, `nik`, `nama_pemilik`, `jumlah_hewan`, `jadwal_vaksin_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '434324242', 'Corrupti est ut eu', 12, 2, NULL, '2023-06-17 06:00:41', '2023-06-17 06:00:41'),
(2, '60', 'Voluptas eveniet se', 39, 2, NULL, '2023-06-17 06:08:53', '2023-06-17 06:08:53'),
(3, '91', 'Nisi cillum voluptat', 17, 2, NULL, '2023-06-17 06:09:38', '2023-06-17 06:09:38'),
(4, '74', 'Omnis dolore magna c', 83, 2, NULL, '2023-06-17 06:11:37', '2023-06-17 06:11:37'),
(5, '16', 'Sit anim minim dolo', 73, 2, NULL, '2023-06-17 06:12:14', '2023-06-17 06:12:14'),
(6, '9', 'Non enim ut odit pos', 5, 2, NULL, '2023-06-17 06:16:17', '2023-06-17 06:16:17'),
(7, '98', 'Sunt iusto magnam a', 14, 2, NULL, '2023-06-17 06:17:45', '2023-06-17 06:17:45'),
(8, '9', 'Aut nulla quo maiore', 42, 1, NULL, '2023-06-17 06:19:53', '2023-06-17 06:19:53'),
(9, '55', 'Libero laudantium e', 62, 2, NULL, '2023-06-17 06:22:26', '2023-06-17 06:22:26'),
(10, '66', 'Quidem quaerat dolor', 29, 2, NULL, '2023-06-17 06:35:14', '2023-06-17 06:35:14'),
(11, '82', 'Ex voluptatem totam', 100, 2, NULL, '2023-06-17 14:30:20', '2023-06-17 14:30:20'),
(12, '7372233327323922', 'Qui voluptas adipisc', 55, 4, NULL, '2023-06-19 14:23:18', '2023-06-19 14:23:18'),
(13, '26', 'Ipsum eaque consequ', 16, 3, NULL, '2023-06-19 14:25:12', '2023-06-19 14:25:12'),
(14, '77323293434343', 'Test', 100, 5, NULL, '2023-06-19 14:28:42', '2023-06-19 14:28:42'),
(15, '96', 'Distinctio Amet di', 91, 6, NULL, '2023-06-19 17:51:12', '2023-06-19 17:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'all', 'web', '2023-06-15 03:57:49', '2023-06-15 03:57:49'),
(2, 'vaksinator', 'web', '2023-06-15 03:57:49', '2023-06-15 03:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-06-15 03:57:49', '2023-06-15 03:57:49'),
(2, 'vaksinator', 'web', '2023-06-15 03:57:49', '2023-06-15 03:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Ducimus tempora dol', 'jijyna@mailinator.com', NULL, '$2y$10$bl62q9svGl.10O8aNmW7oOfNmF.046orfSMkMbGD/YzGpXhsfdRgi', NULL, '2023-06-16 04:12:37', '2023-06-19 17:45:29', '2023-06-19 17:45:29'),
(10, 'admin', 'admin@gmail.com', NULL, '$2y$10$CW8ux9/jJZ79WojWAwi8HO/zSK6legyGqoky/yIf6ysV5Ilx7TAyq', NULL, '2023-06-18 03:11:56', '2023-06-18 03:11:56', NULL),
(12, 'Eaque mollitia dolor', 'tujy@mailinator.com', NULL, '$2y$10$zIv2h.BM8gYl2K7ELnoEi.nvKsbh/F13cEIcHDMlLDPMLpCOA0on2', NULL, '2023-06-19 17:49:09', '2023-06-19 17:49:09', NULL),
(13, 'nainz', 'nain@mail.com', NULL, '$2y$10$vdkPCs15FNZ1IQFsGeVbjOOHYHKYQ0wyETkLB1jaokQ8I8u91PdE2', NULL, '2023-06-19 17:56:59', '2023-06-19 17:56:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_vaksins`
--
ALTER TABLE `data_vaksins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_vaksins`
--
ALTER TABLE `jadwal_vaksins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_vaksins_data_vaksins_id_foreign` (`data_vaksins_id`),
  ADD KEY `jadwal_vaksins_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftaran_vaksins`
--
ALTER TABLE `pendaftaran_vaksins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_vaksins_jadwal_vaksin_id_foreign` (`jadwal_vaksin_id`);

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
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_domain_unique` (`domain`),
  ADD UNIQUE KEY `tenants_database_unique` (`database`);

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
-- AUTO_INCREMENT for table `data_vaksins`
--
ALTER TABLE `data_vaksins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_vaksins`
--
ALTER TABLE `jadwal_vaksins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pendaftaran_vaksins`
--
ALTER TABLE `pendaftaran_vaksins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_vaksins`
--
ALTER TABLE `jadwal_vaksins`
  ADD CONSTRAINT `jadwal_vaksins_data_vaksins_id_foreign` FOREIGN KEY (`data_vaksins_id`) REFERENCES `data_vaksins` (`id`),
  ADD CONSTRAINT `jadwal_vaksins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `pendaftaran_vaksins`
--
ALTER TABLE `pendaftaran_vaksins`
  ADD CONSTRAINT `pendaftaran_vaksins_jadwal_vaksin_id_foreign` FOREIGN KEY (`jadwal_vaksin_id`) REFERENCES `jadwal_vaksins` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
