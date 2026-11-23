-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2026 at 02:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_solution_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Session data intentionally omitted from this export.

-- --------------------------------------------------------

--
-- Table structure for table `sf_case_records`
--

CREATE TABLE `sf_case_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `kpi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sf_kpis`
--

CREATE TABLE `sf_kpis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sf_migrations`
--

CREATE TABLE `sf_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sf_migrations`
--

INSERT INTO `sf_migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_19_200600_create_problems_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sf_problems`
--

CREATE TABLE `sf_problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_problems`
--

INSERT INTO `sf_problems` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Test3', 'checking the XAMPP', '2026-10-20 11:34:55', '2026-10-20 11:34:55'),
(2, 'Test3', 'XAMPP Check', '2026-10-20 11:35:25', '2026-10-20 11:35:25'),
(3, 'Test 4', 'Area deleted \r\ntest test......', '2026-10-20 11:39:09', '2026-11-02 11:59:05'),
(4, 'Poor communication', 'Important project information is not shared clearly or on time.', '2026-11-02 11:35:52', '2026-11-02 11:35:52'),
(5, 'Unclear responsibilities', 'Team members are unsure who owns specific tasks and decisions.', '2026-11-02 11:35:52', '2026-11-02 11:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `sf_problem_solution`
--

CREATE TABLE `sf_problem_solution` (
  `problem_id` bigint(20) UNSIGNED NOT NULL,
  `solution_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_problem_solution`
--

INSERT INTO `sf_problem_solution` (`problem_id`, `solution_id`) VALUES
(1, 2),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sf_products`
--

CREATE TABLE `sf_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_products`
--

INSERT INTO `sf_products` (`id`, `name`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Jira', 'is needed', 'App', '2026-11-04 07:33:34', '2026-11-04 07:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `sf_product_solution`
--

CREATE TABLE `sf_product_solution` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `solution_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_product_solution`
--

INSERT INTO `sf_product_solution` (`product_id`, `solution_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sf_product_tag`
--

CREATE TABLE `sf_product_tag` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sf_solutions`
--

CREATE TABLE `sf_solutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_solutions`
--

INSERT INTO `sf_solutions` (`id`, `name`, `description`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Weekly project coordination meeting', 'Share project updates, clarify task owners, and agree on action points.', 'Project management', '2026-11-02 11:35:52', '2026-11-02 11:35:52'),
(2, 'Mahsa', 'TEST TEST', '14', '2026-11-04 06:22:18', '2026-11-04 06:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `sf_tags`
--

CREATE TABLE `sf_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_tags`
--

INSERT INTO `sf_tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Software', '2026-11-04 07:36:20', '2026-11-04 07:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `sf_users`
--

CREATE TABLE `sf_users` (
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
-- Dumping data for table `sf_users`
--

INSERT INTO `sf_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', NULL, '$2y$12$jsQwzT79E5Ah7EtQIFG1peWjjXBmm65n8uIVyPGvS0xg4xW5bRSIS', NULL, '2026-11-02 11:35:52', '2026-11-02 11:46:17');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sf_case_records`
--
ALTER TABLE `sf_case_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_case_kpi` (`kpi_id`);

--
-- Indexes for table `sf_kpis`
--
ALTER TABLE `sf_kpis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_migrations`
--
ALTER TABLE `sf_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_problems`
--
ALTER TABLE `sf_problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_problem_solution`
--
ALTER TABLE `sf_problem_solution`
  ADD PRIMARY KEY (`problem_id`,`solution_id`),
  ADD KEY `solution_id` (`solution_id`);

--
-- Indexes for table `sf_products`
--
ALTER TABLE `sf_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_product_solution`
--
ALTER TABLE `sf_product_solution`
  ADD PRIMARY KEY (`product_id`,`solution_id`),
  ADD KEY `solution_id` (`solution_id`);

--
-- Indexes for table `sf_product_tag`
--
ALTER TABLE `sf_product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `sf_solutions`
--
ALTER TABLE `sf_solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_tags`
--
ALTER TABLE `sf_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sf_users`
--
ALTER TABLE `sf_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_case_records`
--
ALTER TABLE `sf_case_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_kpis`
--
ALTER TABLE `sf_kpis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_migrations`
--
ALTER TABLE `sf_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sf_problems`
--
ALTER TABLE `sf_problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sf_products`
--
ALTER TABLE `sf_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sf_solutions`
--
ALTER TABLE `sf_solutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sf_tags`
--
ALTER TABLE `sf_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sf_users`
--
ALTER TABLE `sf_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sf_case_records`
--
ALTER TABLE `sf_case_records`
  ADD CONSTRAINT `fk_case_kpi` FOREIGN KEY (`kpi_id`) REFERENCES `sf_kpis` (`id`);

--
-- Constraints for table `sf_problem_solution`
--
ALTER TABLE `sf_problem_solution`
  ADD CONSTRAINT `sf_problem_solution_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `sf_problems` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_problem_solution_ibfk_2` FOREIGN KEY (`solution_id`) REFERENCES `sf_solutions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_product_solution`
--
ALTER TABLE `sf_product_solution`
  ADD CONSTRAINT `sf_product_solution_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `sf_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_product_solution_ibfk_2` FOREIGN KEY (`solution_id`) REFERENCES `sf_solutions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_product_tag`
--
ALTER TABLE `sf_product_tag`
  ADD CONSTRAINT `sf_product_tag_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `sf_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_product_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `sf_tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
