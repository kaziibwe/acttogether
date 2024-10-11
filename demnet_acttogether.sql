-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2024 at 09:35 AM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demnet_acttogether`
--

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `group_phone`, `group_email`, `created_at`, `updated_at`) VALUES
(1, 'Group A', '0785557587', 'groupa@gmail.com', NULL, NULL),
(2, 'GROUP 2', '0355557587', 'groupa@gmail.com', NULL, NULL),
(3, 'GROUP3', '0298766367', 'groupc@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL,
  `savers_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_given_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_age` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_nationality` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_nin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_pnumber_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_pnumber_2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_marital_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_nok_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_nok_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_nok_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_nok_occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nok_relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_ac_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `savers_ac_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `savers_surname`, `savers_given_name`, `savers_age`, `savers_nationality`, `savers_nin`, `savers_address`, `savers_pnumber_1`, `savers_pnumber_2`, `savers_occupation`, `savers_gender`, `savers_marital_status`, `savers_nok_name`, `savers_nok_address`, `savers_nok_number`, `savers_nok_occupation`, `nok_relationship`, `savers_ac_id`, `savers_ac_number`, `amount`, `group_id`) VALUES
(1, 'kaziibwe', 'alfred', '20', 'uganda', 'DFGGHFGHHHHG', 'nakawa', '07898539394', '07898539454', '', '', '', '', '', '', '', '', '', '', 24600, 1),
(2, 'francis', 'sesanga', '21', 'uganda', 'DFGGHFGHHHH', 'jinja', '07898539395', '07898539396', '', '', '', '', '', '', '', '', '', '', 80000, 1),
(3, 'alfred', 'kimbowa', '22', 'uganda', 'DFGGHFGHHHH', 'kitintale', '07898539333', '07898533575', '', '', '', '', '', '', '', '', '', '', 41200, 2),
(4, 'ricky', 'kisa', '23', 'uganda', 'DFGGHFGHHHH', 'kamuri', '07898537989', '07898534343', '', '', '', '', '', '', '', '', '', '', 75000, 2),
(5, 'kityo', 'moreen', '24', 'uganda', 'DF88HFGHHHH', 'bunamwaya', '07837558375', '07634785656', '', '', '', '', '', '', '', '', '', '', 77000, 3),
(6, 'nuwahereza', 'chris', '25', 'uganda', 'SJKAFJFKALJ', 'katete', '07898568394', '07898539348', '', '', '', '', '', '', '', '', '', '', 70000, 3);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_08_070341_create_groups_table', 2),
(6, '2024_02_08_075440_create_members_table', 2),
(7, '2024_02_22_180022_create_transactions', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_amount` int NOT NULL,
  `new_amount` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `amount`, `old_amount`, `new_amount`, `description`, `member_id`, `created_at`, `updated_at`) VALUES
(1, '4567899876', '20000', 0, 0, 'ekjdksgj lakgj skdjg ', 1, NULL, NULL),
(2, '98599906', '4000', 68000, 72000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 5, NULL, NULL),
(3, '98599906', '5000', 72000, 77000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 5, NULL, NULL),
(4, '98599906', '5000', 30000, 35000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, NULL, NULL),
(5, '98599906', '5000', 35000, 40000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, NULL, NULL),
(6, '98599906', '5000', 40000, 45000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, NULL, NULL),
(7, '98599906', '5000', 45000, 50000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, NULL, NULL),
(8, '98599906', '3000', 50000, 53000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-23 15:19:15', '2024-02-23 15:19:15'),
(9, '98599906', '3000', 53000, 56000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-23 15:21:21', '2024-02-23 15:21:21'),
(10, '98599906', '3000', 56000, 59000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-23 16:10:22', '2024-02-23 16:10:22'),
(11, '98599906', '3000', 59000, 62000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-23 16:32:47', '2024-02-23 16:32:47'),
(12, '81921343', '2300', 20000, 22300, 'Sacco Dep: by kaziibwe-0707948082, Group: Group A-0785557587', 1, '2024-02-23 16:36:35', '2024-02-23 16:36:35'),
(13, '81921343', '2300', 22300, 24600, 'Sacco Dep: by kaziibwe-0707948082, Group: Group A-0785557587', 1, '2024-02-23 16:36:52', '2024-02-23 16:36:52'),
(14, '98599906', '3000', 62000, 65000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-23 16:43:05', '2024-02-23 16:43:05'),
(15, '98599906', '3000', 65000, 68000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-23 16:46:30', '2024-02-23 16:46:30'),
(16, '98599906', '3000', 68000, 71000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-23 16:47:37', '2024-02-23 16:47:37'),
(17, '98599906', '4000', 71000, 75000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 4, '2024-02-24 20:49:06', '2024-02-24 20:49:06'),
(18, '98599906', '4000', 50000, 54000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, '2024-02-24 20:56:02', '2024-02-24 20:56:02'),
(19, '98599906', '4000', 54000, 58000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, '2024-02-24 20:58:00', '2024-02-24 20:58:00'),
(20, '30952663', '1200', 40000, 41200, 'Sacco Dep: by alfred-070794648456, Group: GROUP 2-0355557587', 3, '2024-02-24 20:58:02', '2024-02-24 20:58:02'),
(21, '28225302', '2000', 58000, 60000, 'Sacco Dep: by francis-0789458348, Group: Group A-0785557587', 2, '2024-02-24 21:00:04', '2024-02-24 21:00:04'),
(22, '98599906', '4000', 60000, 64000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, '2024-02-24 22:23:39', '2024-02-24 22:23:39'),
(23, '98599906', '4000', 64000, 68000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, '2024-03-02 15:33:35', '2024-03-02 15:33:35'),
(24, '98599906', '4000', 68000, 72000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, '2024-03-02 15:41:57', '2024-03-02 15:41:57'),
(25, '98599906', '4000', 72000, 76000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, '2024-03-02 15:45:23', '2024-03-02 15:45:23'),
(26, '98599906', '4000', 76000, 80000, 'Sacco Dep: by ricky-0768357385, Group: GROUP 2-0355557587', 2, '2024-03-02 15:55:22', '2024-03-02 15:55:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_group_id_foreign` (`group_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
