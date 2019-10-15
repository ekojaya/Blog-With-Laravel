-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2019 at 03:28 PM
-- Server version: 5.7.27
-- PHP Version: 7.3.9-1+ubuntu19.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_first`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'berkuah', '2019-10-01 22:48:54', '2019-10-01 22:48:54'),
(2, 'kering1', '2019-10-01 22:48:59', '2019-10-06 02:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `commentable_id`, `commentable_type`, `comment`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 'App\\Post', 'mantull bro', '2019-10-02 00:17:40', '2019-10-02 00:17:40'),
(3, 1, 2, 2, 'App\\Post', 'boooss', '2019-10-02 01:47:36', '2019-10-02 01:47:36'),
(4, 1, 4, 4, 'App\\Post', 'asdasda', '2019-10-08 02:10:58', '2019-10-08 02:10:58'),
(5, 2, 6, 6, 'App\\Post', 'a', '2019-10-14 08:29:16', '2019-10-14 08:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_19_081247_create_posts_table', 1),
(4, '2019_09_19_111435_create_admins_table', 1),
(5, '2019_09_20_055823_add_slug_to_posts', 1),
(6, '2019_09_20_062413_create_categories_table', 1),
(7, '2019_09_20_062525_add_category_id_to_posts', 1),
(8, '2019_09_23_025329_create_tags_table', 1),
(9, '2019_09_23_145256_create_post_tag_table', 1),
(10, '2019_09_25_101431_add_image_to_posts_table', 1),
(11, '2019_09_26_134535_create_komentars_table', 1),
(12, '2019_09_27_023834_create_comments_table', 1),
(13, '2019_09_29_071045_create_negaras_table', 1),
(14, '2019_09_29_071604_add_negara_id_to_posts', 1),
(15, '2019_10_01_083711_add_image_to_users', 1),
(16, '2019_10_02_042956_add_posts_id_to_comments', 1),
(17, '2019_10_02_085105_add_role_id_to_users', 2),
(18, '2019_10_07_103350_add_role_to_users', 2),
(19, '2019_10_08_093653_add_favorite_to_users', 3),
(20, '2019_10_08_100456_create_pesan1s_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `negaras`
--

CREATE TABLE `negaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `negaras`
--

INSERT INTO `negaras` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', '2019-10-01 22:49:55', '2019-10-06 02:24:07');

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
-- Table structure for table `pesan1s`
--

CREATE TABLE `pesan1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan1s`
--

INSERT INTO `pesan1s` (`id`, `name`, `email`, `nohp`, `pesan`, `created_at`, `updated_at`) VALUES
(8, 'eko', 'eko@eko.com', '123', '12312312', '2019-10-08 05:32:03', '2019-10-08 05:32:03'),
(9, 'eko', 'eko@eko.com', '33222', '123131', '2019-10-08 05:32:17', '2019-10-08 05:32:17'),
(10, 'eko', 'eko@eko.com', '1231231', '1231231', '2019-10-08 06:19:29', '2019-10-08 06:19:29'),
(11, 'eko', 'eko@eko.com', '22222', '2222222222222222222222', '2019-10-08 06:19:58', '2019-10-08 06:19:58'),
(12, 'eko', 'eko@eko.com', '111111111111111111', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaasssssssssssssss', '2019-10-08 06:23:17', '2019-10-08 06:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `negara_id`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'nasi Padang', 'nasi-padang', 'mantull bro', 1, '1569995491.jpg', 2, '2019-10-01 22:51:31', '2019-10-01 22:51:31'),
(4, 'mie ayam', 'mie-ayam', 'asdadsdadasda', 1, '1570355481.jpg', 1, '2019-10-06 02:51:21', '2019-10-06 02:51:21'),
(5, 'Soto Klaten', 'soto-klaten', 'mantul bro', 1, '1571064724.jpg', 1, '2019-10-14 07:52:04', '2019-10-14 07:52:04'),
(6, 'Bakso Sapi', 'bakso-sapi', 'enak bangate bro', 1, '1571064752.jpg', 1, '2019-10-14 07:52:32', '2019-10-14 07:52:32'),
(7, 'Cumi tepung Kuah Saos Padang', 'cumi-tepung-kuah-saos-padang', 'asdasdasad', 1, '1571064841.jpg', 1, '2019-10-14 07:54:01', '2019-10-14 07:54:01'),
(8, 'sate ayam', 'sate-ayam', 'asdadas', 1, '1571066571.jpg', 2, '2019-10-14 08:22:51', '2019-10-14 08:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 5, 1, NULL, NULL),
(7, 6, 2, NULL, NULL),
(8, 7, 1, NULL, NULL),
(9, 8, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Enak', '2019-10-01 22:49:07', '2019-10-01 22:49:07'),
(2, 'sedang', '2019-10-01 22:49:10', '2019-10-01 22:49:10'),
(3, 'aneh', '2019-10-01 22:49:20', '2019-10-01 22:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favo_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favo_food` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_asal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `favo_place`, `favo_food`, `kota_asal`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eko', 0, 'eko@eko.com', 'Bali', 'mie ayam', 'indonesia', '1570528559.jpg', NULL, '$2y$10$b/9gcXGyosNsN1ibtoaBvuXly3ASrlnHF4Gp6PAlS7kbKQNrE3wtq', NULL, '2019-10-01 22:48:21', '2019-10-08 02:55:59'),
(2, 'latif', 0, 'latip@latip.com', NULL, NULL, NULL, '1570355338.jpg', NULL, '$2y$10$6bpUf3uJ6Qm.8QVIC7S/ZekNeMWA3pGeeTpgEhnVTNSNom0TTvdhi', NULL, '2019-10-02 01:49:01', '2019-10-06 02:48:58'),
(3, 'alhmda', 1, 'alhmda@alhmda.com', NULL, NULL, NULL, '1570355371.jpg', NULL, '$2y$10$iBgoPnqbUB5G3ikQzMnhZ.zdvV4S7WywD.E/tNm5.lXhPN6OwwPju', NULL, '2019-10-05 21:56:04', '2019-10-06 02:49:31'),
(4, 'hanan1', 1, 'hanan1@hanan.com', NULL, NULL, NULL, '1570355282.jpg', NULL, '$2y$10$HEQU2yZLgd73pyACAE0bp.4x.xerqy1kg7DCeC746.jmSp.eP/QXG', NULL, '2019-10-05 22:17:07', '2019-10-06 02:48:02'),
(5, 'rapli', 1, 'rapli@rapli.com', NULL, NULL, NULL, '1570445426.jpg', NULL, '$2y$10$10i8Ki7yphqGZBFcHbgjhOiuGjYvoy8YoRneOFBJDf3PIvOGb3vY2', NULL, '2019-10-07 03:42:53', '2019-10-07 03:50:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negaras`
--
ALTER TABLE `negaras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesan1s`
--
ALTER TABLE `pesan1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `negaras`
--
ALTER TABLE `negaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesan1s`
--
ALTER TABLE `pesan1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
