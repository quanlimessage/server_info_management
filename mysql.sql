-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 19, 2017 at 04:10 AM
-- Server version: 5.7.17
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prostage`
--
CREATE DATABASE IF NOT EXISTS `prostage` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prostage`;

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2017_05_08_074624_create_server_table', 2);

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(4, 'Sản Phẩm 2', '100000', NULL, NULL),
(5, 'Sản Phẩm 3', '800000', NULL, NULL),
(6, 'Sản Phẩm 4', '700000', NULL, NULL),
(7, 'Sản Phẩm 5', '600000', NULL, '2017-04-13 01:40:43'),
(8, 'Sản Phẩm 6', '100000', NULL, '2017-04-13 01:43:36'),
(9, 'Sản Phẩm 7', '500000', NULL, '2017-04-13 01:43:50'),
(10, 'Sản Phẩm 8', '800000', NULL, '2017-04-13 01:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ftp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id`, `name`, `user`, `ftp`, `ssh`, `password`, `created_at`, `updated_at`) VALUES
(2, '33', '33', '333', '33', '33', '2017-05-18 02:17:26', '2017-05-18 02:17:26'),
(3, 'sss', 'ddd', 'dd', 'dd', 'dddd', '2017-05-09 06:54:20', '2017-05-09 06:54:20'),
(5, 'eee', 'ccccc', 'dddd', 'eeee', 'ffffff', '2017-05-18 02:30:50', '2017-05-18 02:30:51'),
(6, 'aaaa', 'cccc', 'dddd', 'eeee', 'fffff', '2017-05-18 02:31:10', '2017-05-18 02:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `menu` text CHARACTER SET utf8,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `menu`, `image`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Quốc Trí', 1, 'Server,User', '1495073384.17309854_710068575832055_405670051339508300_n.jpg', 'tri@gmail.com', '$2y$10$ux6XCTMXy2BEPYR1Gm3N9OSZfU8kAWLa7vgvPAsbWjngSNDgG3dqO', '5F7rxTMnFjxxpRtQzj9MYKqcyo1eahW0upcQt0xyJvN3cYzhUPr7JDaf0dUF', '2017-05-09 01:17:00', '2017-05-18 02:09:44'),
(7, 'Thảo uy', 2, 'Server', '1495068575.C360_2015-02-01-16-09-55-033.jpg', 'p_uy@stagegroup.jp', '$2y$10$bGsompRn0kad81Uh2dMgTujYYVp04gHgFrzIUZA4OvRWTImj7sAP.', 'cMitokvjvZF134OtvUBYOduFzLcFwmVkaQIT3HLaUlAAFgI6PzXzkQMNyYI4', '2017-05-17 04:45:17', '2017-05-18 00:49:35'),
(8, 'Pham Tri', 3, 'Server', '1495024403.18450175_1022129961255891_508979820_n.jpg', 'quoctri111222333@gmail.com', '$2y$10$pyBlo1Aa3kKvfHJBhdQdFuU6fDrGydC4XI6v0BsWe/NDdhbUwiOFi', NULL, '2017-05-17 10:38:25', '2017-05-17 12:33:23'),
(10, 'Kyoji Kay Yamada', 1, 'Server,User', '1495068963.1724785i.jpeg', 'k_yamada@stagegroup.jp', '$2y$10$xZAaHJnYiASmKHzVWj8zE.UIDzr/aGucw8EYp0aUQgkHR678Nn.VG', '43lZUcMrNayhcA3xPvSSGMmjMscM4cuGClqHkeHNa32T2FILmLWAWannzT94', '2017-05-18 00:56:03', '2017-05-18 00:56:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
