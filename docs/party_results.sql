-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2023 at 08:09 AM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zizimnnf_elections23`
--

-- --------------------------------------------------------

--
-- Table structure for table `party_results`
--

CREATE TABLE `party_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `party_results`
--

INSERT INTO `party_results` (`id`, `party_id`, `result_id`, `votes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 648000, '2023-02-09 22:47:13', '2023-02-09 22:47:13'),
(2, 2, 1, 102000, '2023-02-09 22:47:13', '2023-02-09 22:47:13'),
(3, 3, 1, 50000, '2023-02-09 22:47:13', '2023-02-09 22:47:13'),
(4, 1, 2, 140511, '2023-02-09 23:05:11', '2023-02-09 23:05:11'),
(5, 2, 2, 743062, '2023-02-09 23:05:11', '2023-02-11 20:45:15'),
(6, 3, 2, 421540, '2023-02-09 23:05:11', '2023-02-09 23:05:11'),
(7, 1, 3, 1006311, '2023-02-11 20:33:19', '2023-02-11 22:03:04'),
(8, 2, 3, 473558, '2023-02-11 20:33:19', '2023-02-11 22:04:36'),
(9, 3, 3, 394632, '2023-02-11 20:33:19', '2023-02-11 22:05:35'),
(10, 1, 4, 0, '2023-02-11 20:33:39', '2023-02-11 20:33:39'),
(11, 2, 4, 0, '2023-02-11 20:33:39', '2023-02-11 20:33:39'),
(12, 3, 4, 0, '2023-02-11 20:33:39', '2023-02-11 20:33:39'),
(13, 1, 5, 0, '2023-02-11 20:33:51', '2023-02-11 20:33:51'),
(14, 2, 5, 0, '2023-02-11 20:33:51', '2023-02-11 20:33:51'),
(15, 3, 5, 0, '2023-02-11 20:33:51', '2023-02-11 20:33:51'),
(16, 1, 6, 0, '2023-02-11 20:34:08', '2023-02-11 20:34:08'),
(17, 2, 6, 0, '2023-02-11 20:34:08', '2023-02-11 20:34:08'),
(18, 3, 6, 0, '2023-02-11 20:34:08', '2023-02-11 20:34:08'),
(19, 1, 7, 0, '2023-02-11 20:34:17', '2023-02-11 20:34:17'),
(20, 2, 7, 0, '2023-02-11 20:34:17', '2023-02-11 20:34:17'),
(21, 3, 7, 0, '2023-02-11 20:34:17', '2023-02-11 20:34:17'),
(22, 1, 8, 0, '2023-02-11 20:34:31', '2023-02-11 20:34:31'),
(23, 2, 8, 0, '2023-02-11 20:34:31', '2023-02-11 20:34:31'),
(24, 3, 8, 0, '2023-02-11 20:34:31', '2023-02-11 20:34:31'),
(25, 1, 9, 0, '2023-02-11 20:34:40', '2023-02-11 20:34:40'),
(26, 2, 9, 0, '2023-02-11 20:34:40', '2023-02-11 20:34:40'),
(27, 3, 9, 0, '2023-02-11 20:34:40', '2023-02-11 20:34:40'),
(28, 1, 10, 0, '2023-02-11 20:34:57', '2023-02-11 20:34:57'),
(29, 2, 10, 0, '2023-02-11 20:34:57', '2023-02-11 20:34:57'),
(30, 3, 10, 0, '2023-02-11 20:34:57', '2023-02-11 20:34:57'),
(31, 1, 11, 0, '2023-02-11 20:35:23', '2023-02-11 20:35:23'),
(32, 2, 11, 0, '2023-02-11 20:35:23', '2023-02-11 20:35:23'),
(33, 3, 11, 0, '2023-02-11 20:35:23', '2023-02-11 20:35:23'),
(34, 1, 12, 0, '2023-02-11 20:35:39', '2023-02-11 20:35:39'),
(35, 2, 12, 0, '2023-02-11 20:35:39', '2023-02-11 20:35:39'),
(36, 3, 12, 0, '2023-02-11 20:35:39', '2023-02-11 20:35:39'),
(37, 1, 13, 0, '2023-02-11 20:35:52', '2023-02-11 20:35:52'),
(38, 2, 13, 0, '2023-02-11 20:35:52', '2023-02-11 20:35:52'),
(39, 3, 13, 0, '2023-02-11 20:35:52', '2023-02-11 20:35:52'),
(40, 1, 14, 0, '2023-02-11 20:36:06', '2023-02-11 20:36:06'),
(41, 2, 14, 0, '2023-02-11 20:36:06', '2023-02-11 20:36:06'),
(42, 3, 14, 0, '2023-02-11 20:36:06', '2023-02-11 20:36:06'),
(43, 1, 15, 0, '2023-02-11 20:39:17', '2023-02-11 20:39:17'),
(44, 2, 15, 0, '2023-02-11 20:39:17', '2023-02-11 20:39:17'),
(45, 3, 15, 0, '2023-02-11 20:39:17', '2023-02-11 20:39:17'),
(46, 1, 16, 0, '2023-02-11 20:39:31', '2023-02-11 20:39:31'),
(47, 2, 16, 0, '2023-02-11 20:39:31', '2023-02-11 20:39:31'),
(48, 3, 16, 0, '2023-02-11 20:39:31', '2023-02-11 20:39:31'),
(49, 1, 17, 0, '2023-02-11 20:39:45', '2023-02-11 20:39:45'),
(50, 2, 17, 0, '2023-02-11 20:39:45', '2023-02-11 20:39:45'),
(51, 3, 17, 0, '2023-02-11 20:39:45', '2023-02-11 20:39:45'),
(52, 1, 18, 0, '2023-02-11 20:40:01', '2023-02-11 20:40:01'),
(53, 2, 18, 0, '2023-02-11 20:40:01', '2023-02-11 20:40:01'),
(54, 3, 18, 0, '2023-02-11 20:40:01', '2023-02-11 20:40:01'),
(55, 1, 19, 0, '2023-02-11 20:40:11', '2023-02-11 20:40:11'),
(56, 2, 19, 0, '2023-02-11 20:40:11', '2023-02-11 20:40:11'),
(57, 3, 19, 0, '2023-02-11 20:40:11', '2023-02-11 20:40:11'),
(58, 1, 20, 0, '2023-02-11 20:40:21', '2023-02-11 20:40:21'),
(59, 2, 20, 0, '2023-02-11 20:40:21', '2023-02-11 20:40:21'),
(60, 3, 20, 0, '2023-02-11 20:40:21', '2023-02-11 20:40:21'),
(61, 1, 21, 0, '2023-02-11 20:40:33', '2023-02-11 20:40:33'),
(62, 2, 21, 0, '2023-02-11 20:40:33', '2023-02-11 20:40:33'),
(63, 3, 21, 0, '2023-02-11 20:40:33', '2023-02-11 20:40:33'),
(64, 1, 22, 0, '2023-02-11 20:40:40', '2023-02-11 20:40:40'),
(65, 2, 22, 0, '2023-02-11 20:40:40', '2023-02-11 20:40:40'),
(66, 3, 22, 0, '2023-02-11 20:40:40', '2023-02-11 20:40:40'),
(67, 1, 23, 0, '2023-02-11 20:40:51', '2023-02-11 20:40:51'),
(68, 2, 23, 0, '2023-02-11 20:40:51', '2023-02-11 20:40:51'),
(69, 3, 23, 0, '2023-02-11 20:40:51', '2023-02-11 20:40:51'),
(70, 1, 24, 0, '2023-02-11 20:41:00', '2023-02-11 20:41:00'),
(71, 2, 24, 0, '2023-02-11 20:41:00', '2023-02-11 20:41:00'),
(72, 3, 24, 0, '2023-02-11 20:41:00', '2023-02-11 20:41:00'),
(73, 1, 25, 0, '2023-02-11 20:41:08', '2023-02-11 20:41:08'),
(74, 2, 25, 0, '2023-02-11 20:41:08', '2023-02-11 20:41:08'),
(75, 3, 25, 0, '2023-02-11 20:41:08', '2023-02-11 20:41:08'),
(76, 1, 26, 0, '2023-02-11 20:41:20', '2023-02-11 20:41:20'),
(77, 2, 26, 0, '2023-02-11 20:41:20', '2023-02-11 20:41:20'),
(78, 3, 26, 0, '2023-02-11 20:41:20', '2023-02-11 20:41:20'),
(79, 1, 27, 0, '2023-02-11 20:41:33', '2023-02-11 20:41:33'),
(80, 2, 27, 0, '2023-02-11 20:41:33', '2023-02-11 20:41:33'),
(81, 3, 27, 0, '2023-02-11 20:41:33', '2023-02-11 20:41:33'),
(82, 1, 28, 0, '2023-02-11 20:41:42', '2023-02-11 20:41:42'),
(83, 2, 28, 0, '2023-02-11 20:41:42', '2023-02-11 20:41:42'),
(84, 3, 28, 0, '2023-02-11 20:41:42', '2023-02-11 20:41:42'),
(85, 1, 29, 0, '2023-02-11 20:41:52', '2023-02-11 20:41:52'),
(86, 2, 29, 0, '2023-02-11 20:41:52', '2023-02-11 20:41:52'),
(87, 3, 29, 0, '2023-02-11 20:41:52', '2023-02-11 20:41:52'),
(88, 1, 30, 0, '2023-02-11 20:42:04', '2023-02-11 20:42:04'),
(89, 2, 30, 0, '2023-02-11 20:42:04', '2023-02-11 20:42:04'),
(90, 3, 30, 0, '2023-02-11 20:42:04', '2023-02-11 20:42:04'),
(91, 1, 31, 0, '2023-02-11 20:42:17', '2023-02-11 20:42:17'),
(92, 2, 31, 0, '2023-02-11 20:42:17', '2023-02-11 20:42:17'),
(93, 3, 31, 0, '2023-02-11 20:42:17', '2023-02-11 20:42:17'),
(94, 1, 32, 0, '2023-02-11 20:42:26', '2023-02-11 20:42:26'),
(95, 2, 32, 0, '2023-02-11 20:42:26', '2023-02-11 20:42:26'),
(96, 3, 32, 0, '2023-02-11 20:42:26', '2023-02-11 20:42:26'),
(97, 1, 33, 0, '2023-02-11 20:42:36', '2023-02-11 20:42:36'),
(98, 2, 33, 0, '2023-02-11 20:42:36', '2023-02-11 20:42:36'),
(99, 3, 33, 0, '2023-02-11 20:42:36', '2023-02-11 20:42:36'),
(100, 1, 34, 0, '2023-02-11 20:42:48', '2023-02-11 20:42:48'),
(101, 2, 34, 0, '2023-02-11 20:42:48', '2023-02-11 20:42:48'),
(102, 3, 34, 0, '2023-02-11 20:42:48', '2023-02-11 20:42:48'),
(103, 1, 35, 0, '2023-02-11 20:42:54', '2023-02-11 20:42:54'),
(104, 2, 35, 0, '2023-02-11 20:42:54', '2023-02-11 20:42:54'),
(105, 3, 35, 0, '2023-02-11 20:42:54', '2023-02-11 20:42:54'),
(106, 1, 36, 0, '2023-02-11 20:43:03', '2023-02-11 20:43:03'),
(107, 2, 36, 0, '2023-02-11 20:43:03', '2023-02-11 20:43:03'),
(108, 3, 36, 0, '2023-02-11 20:43:03', '2023-02-11 20:43:03'),
(109, 1, 37, 0, '2023-02-11 20:43:11', '2023-02-11 20:43:11'),
(110, 2, 37, 0, '2023-02-11 20:43:11', '2023-02-11 20:43:11'),
(111, 3, 37, 0, '2023-02-11 20:43:11', '2023-02-11 20:43:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `party_results`
--
ALTER TABLE `party_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `party_results`
--
ALTER TABLE `party_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
