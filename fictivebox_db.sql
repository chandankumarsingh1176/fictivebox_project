-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 11:09 PM
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
-- Database: `fictivebox_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_pic` varchar(255) NOT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_author`, `book_pic`, `rating`, `category`, `created_at`, `updated_at`) VALUES
(3, 'Between the Water and the Woods', 'Simone Snaith ,  Sara Kipin  (Illustrator)', '1732128329_40968799.jpg', '2', 'history', '2024-11-20 13:15:29', '2024-11-20 14:12:29'),
(4, 'The Pigman', 'Paul Zindel', '1732128538_12314760.jpg', '3', 'walfair', '2024-11-20 13:18:58', '2024-11-20 13:21:13'),
(5, 'The Graveyard Book', 'Neil Gaiman', '4cLQj0aiwTF2eocxKke3uj1vd1OKVdkG1uf2FQm6.jpg', '4', 'motivation', '2024-11-20 13:22:29', '2024-11-20 13:33:58'),
(6, 'Night of Cake & Puppets', 'Laini Taylor ,  Jim Di Bartolo  (Illustrator)', 'Sit6vWHnmc2rROm5n5HBLuEucA1L16ftuNoFmuip.jpg', '5', 'fiction', '2024-11-20 13:25:04', '2024-11-20 13:33:50'),
(7, 'Tinder', 'Sally Gardner ,  David Roberts  (Illustrator)', 'loZ5eeJ1YvB9m7w3p2MncIz0YoaNd1FXQqMZ69tW.jpg', '1', 'fiction', '2024-11-20 13:27:12', '2024-11-20 13:33:45'),
(8, 'The Sun and the Void', 'Gabriela Romero Lacruz', '1pKmXCrbyAqTSB3WlNCEZl7aIYUAPf0Rh7Zx7lsD.jpg', '5', 'history', '2024-11-20 13:35:06', '2024-11-20 13:59:57'),
(9, 'Dark Desperate Things: an illustrated novel for mature readers', 'Adam Archer', '1732129761_55244561.jpg', '1', 'fiction', '2024-11-20 13:39:22', '2024-11-20 14:00:11'),
(10, 'The Killing Thought', 'Anne Marie Wells', '1732129870_181552250.jpg', '2', 'non-fiction', '2024-11-20 13:41:10', '2024-11-20 14:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `book_ratings`
--

CREATE TABLE `book_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `rateing` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_ratings`
--

INSERT INTO `book_ratings` (`id`, `book_id`, `user_id`, `rateing`, `comments`, `created_at`, `updated_at`) VALUES
(33, '4', '2', '3', NULL, '2024-11-20 13:21:13', '2024-11-20 13:21:13'),
(34, '3', '2', '2', NULL, '2024-11-20 13:21:21', '2024-11-20 13:21:21'),
(35, '7', '2', '1', NULL, '2024-11-20 13:33:45', '2024-11-20 13:33:45'),
(36, '6', '2', '5', NULL, '2024-11-20 13:33:50', '2024-11-20 13:33:50'),
(37, '5', '2', '4', NULL, '2024-11-20 13:33:58', '2024-11-20 13:33:58'),
(38, '8', '2', '5', NULL, '2024-11-20 13:59:57', '2024-11-20 13:59:57'),
(39, '10', '2', '2', NULL, '2024-11-20 14:00:06', '2024-11-20 14:00:06'),
(40, '9', '2', '1', NULL, '2024-11-20 14:00:11', '2024-11-20 14:00:11');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_19_175036_books', 2),
(5, '2024_11_19_175049_book_rating', 3),
(6, '2024_11_19_175015_users', 4);

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hbtxWqoZNuASNdXKCYYEEe3eMhLyT4iZO34esSpa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRXM1T1QxVjlGdkxHRVNxRTY5dDY4MHpCZGRpVmpEbm5keHF6ejY4UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjc6InVzZXJfaWQiO2k6Mjt9', 1732137131);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `dob`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'CHANDAN SINGH', '8932859232', '2005-02-20', 'chandantafi1996@gmail.com', '$2y$12$JtCWyEftls4C.2G27fhkkO3imz6YpbdFM6ovDFNALQ5.kSdlftpXC', '2024-11-19 13:46:10', '2024-11-20 14:42:46'),
(3, 'CHANDAN SINGH', '8932859232', '2005-02-20', 'chandantafi199@gmail.com', '$2y$12$QPxIcQUeTVsWrwikvNIkCeCnGVMXlf/QEQbnLiixBUZ0t/YaUYgki', '2024-11-19 13:46:49', '2024-11-20 14:46:54'),
(4, 'CHANDAN SINGH', '8932859232', '2005-02-20', 'chandantafi1@gmail.com', '$2y$12$1tETCIfT5K0SuoyobKtiEOomFU6.g9ucGwBTHUDl/BmfwNGPqPlsO', '2024-11-19 13:49:13', '2024-11-20 14:50:24'),
(5, 'CHANDAN SINGH', '8932859232', '2005-06-21', 'chandantafi1998@gmail.com', '$2y$12$CQ79SsiXPkbK.7B16hobnODvVUqqFgtgZhiMUUw/WNclJQL7uw7rS', '2024-11-19 13:51:49', '2024-11-20 14:08:38'),
(6, 'CHANDAN SINGH', '8932859232', '1998-05-11', 'chandantafi16998@gmail.com', '$2y$12$yjG5TShavxQQCSNETCJvL.L/Q5ZnZnn/3GAxw5zBSbpLJ8aPC1c6m', '2024-11-19 13:53:28', '2024-11-19 13:53:28'),
(7, 'CHANDAN SINGH', '8932859232', '1998-05-11', 'chandantafi165998@gmail.com', '$2y$12$J3/vVHDaLvfZtt8li9N0bOJbkP1DQ.9fIdbztXGmAHLEd9.kYbDbm', '2024-11-19 13:55:00', '2024-11-19 13:55:00'),
(8, 'CHANDAN SINGH', '8932859232', '1998-05-11', 'chandantafi1659983@gmail.com', '$2y$12$mMvu5VonKj88c6hcz76o..xSseFvXS6FK3j.D3KKp1OjOy/l5wv4K', '2024-11-19 13:55:37', '2024-11-19 13:55:37'),
(9, 'CHANDAN SINGH', '8932859232', '1998-05-11', 'chandantafi16559983@gmail.com', '$2y$12$PvRf2zrkhZrve85Esh91K.hPcWTqYrWcaJLrVS8rM71KPZsRNbm.O', '2024-11-19 13:56:58', '2024-11-19 13:56:58'),
(10, 'CHANDAN SINGH', '8932859232', '2005-06-14', 'chandantafi19498@gmail.com', '$2y$12$/vkbo6RvtJvEDTuCU0sL1e0yW3jbPY0oCsE9HE8CyAfXhYoPJNYSS', '2024-11-19 14:00:34', '2024-11-19 14:00:34'),
(12, 'CHANDAN SINGH', '8932859232', '2024-11-20', 'chandantafi194938@gmail.com', '$2y$12$kaOaupWHwoIz9ofAI85m4OL7Pihw3cfLv5Jioabs/Q1lMqdHXXx0e', '2024-11-20 01:45:53', '2024-11-20 01:45:53'),
(13, 'CHANDAN SINGH', '8932859232', '2024-11-14', 'chandantafi19988@gmail.com', '$2y$12$f3P3rD2SDtwQDR03eIFjI.Hx/TW03WKjrH7ExX50mDIQ6sB8fdcV2', '2024-11-20 14:20:50', '2024-11-20 14:20:50'),
(14, 'CHANDAN SINGH', '8932859232', '2024-11-07', 'chandantafi12998@gmail.com', '$2y$12$l.JoT8vEPQp2DYsntYPxNeWnmLFB5MjIYM8f3GfL1EjPavyJqFrWK', '2024-11-20 14:23:39', '2024-11-20 14:23:39'),
(15, 'CHANDAN SINGH', '8932859232', '2024-11-07', 'chandantafi123998@gmail.com', '$2y$12$nJlBwD09d6jo079Sd7hAl.Qj9AqBzRsCY0udlejFXqL6wL9KC/tMq', '2024-11-20 14:25:51', '2024-11-20 14:25:51'),
(16, 'CHANDAN SINGH', '8932859232', '2024-11-08', 'chandantafi1949386@gmail.com', '$2y$12$LmeI8i.zNvmKSz.xwcw48OmP3mVCI5.rPkmkkeQJG5ZSN.3TRmMI6', '2024-11-20 14:27:46', '2024-11-20 14:27:46'),
(17, 'CHANDAN SINGH', '8932859232', '2024-11-16', 'chandantafi196565698@gmail.com', '$2y$12$wQ45kAwm4LYVM.wbEFLidOA1JhANKmQAWW8lkFuWIrCUwzF7BQB3y', '2024-11-20 14:28:46', '2024-11-20 14:28:46'),
(18, 'CHANDAN SINGH', '8932859232', '2024-11-14', 'chandantafi1999998@gmail.com', '$2y$12$jattIOmlmvPoLJed8vp0MeLzxTDEK7BMtW/0g4OD3nh8LHMqMo7Jm', '2024-11-20 14:29:37', '2024-11-20 14:29:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_book_name_index` (`book_name`);

--
-- Indexes for table `book_ratings`
--
ALTER TABLE `book_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_ratings_book_id_index` (`book_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_name_index` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book_ratings`
--
ALTER TABLE `book_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
