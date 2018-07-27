-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2018 at 01:54 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `created_at`, `updated_at`, `course_name`, `course_fees`) VALUES
(1, NULL, NULL, 'Web Development Foundation', '150000'),
(2, NULL, NULL, 'Web Development Advanced', '150000'),
(3, NULL, NULL, 'Networking In Advanced', '120000'),
(4, NULL, NULL, 'Windows & Linux Server', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `ctimes`
--

CREATE TABLE `ctimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ctimes`
--

INSERT INTO `ctimes` (`id`, `created_at`, `updated_at`, `batch`, `start_date`) VALUES
(1, NULL, NULL, 'Batch 2', '2017-05-20'),
(2, NULL, NULL, 'Batch 3', '2017-10-02'),
(3, NULL, NULL, 'Batch 4', '2018-06-09');

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_05_22_032416_create_courses_table', 1),
(7, '2017_05_22_025242_create_students_table', 2),
(8, '2017_09_11_051516_create_ctimes_table', 2);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `studentName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctime_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `created_at`, `updated_at`, `studentName`, `course_id`, `student_payment`, `ctime_id`) VALUES
(1, '2017-09-10 23:15:49', '2017-09-10 23:15:49', 'PyMyoSwe', '1', '150000', 1),
(2, '2017-09-10 23:16:08', '2017-09-10 23:16:08', 'TayTanCho', '1', '150000', 1),
(3, '2017-09-10 23:16:46', '2017-09-10 23:16:46', 'AungKyawKyaw', '1', '150000', 1),
(4, '2017-09-10 23:17:17', '2017-09-10 23:17:17', 'KyawSwarLinnMaung', '1', '150000', 1),
(5, '2017-09-10 23:17:29', '2017-09-10 23:17:29', 'MyoHtet', '1', '150000', 1),
(6, '2017-09-10 23:17:46', '2017-09-10 23:17:46', 'ThetPaingTun', '1', '150000', 1),
(7, '2017-09-10 23:17:56', '2017-09-10 23:17:56', 'MayThwinHtoo', '1', '150000', 1),
(8, '2017-09-10 23:18:06', '2017-09-10 23:18:06', 'ChueChueThetWai', '1', '150000', 1),
(9, '2017-09-10 23:20:40', '2017-09-26 21:15:02', 'ThetPaingTun', '2', '150000', 2),
(10, '2017-10-02 04:52:51', '2017-11-14 05:41:03', 'Saw Hla Phyu', '3', '120000', 2),
(11, '2017-10-02 04:53:11', '2017-10-03 05:03:59', 'Saw Aung Paing Htoo', '3', '50000', 2),
(12, '2017-10-02 04:53:25', '2017-10-31 03:11:15', 'Saw Wai Yan Phyo', '3', '120000', 2),
(13, '2017-10-02 18:51:33', '2017-11-11 01:18:00', 'Myo Htet', '2', '150000', 2),
(14, '2017-10-02 18:52:46', '2017-10-09 23:55:22', 'Kyaw Swar Linn Maung', '2', '150000', 2),
(15, '2017-10-02 18:53:39', '2017-10-09 22:05:00', 'Aung Kyaw Kyaw', '2', '150000', 2),
(16, '2017-10-07 00:17:45', '2017-11-25 23:30:48', 'Zar Ni Tun', '1', '150000', 2),
(17, '2017-10-07 00:18:01', '2017-11-25 23:30:37', 'Kyaw Min Oo', '1', '150000', 2),
(18, '2017-10-07 00:18:15', '2017-11-25 23:30:24', 'Kyaw Zin Phyo', '1', '150000', 2),
(19, '2017-10-07 00:18:29', '2017-11-25 23:30:16', 'Hnin Tha Zin', '1', '150000', 2),
(20, '2017-10-09 06:31:39', '2018-02-10 00:13:27', 'Myo Thi Ha', '1', '130000', 2),
(21, '2017-10-19 17:30:00', '2017-11-25 23:30:06', 'Theint Me Me Soe', '1', '150000', 2),
(22, '2017-12-13 05:14:32', '2018-04-21 01:43:46', 'Theint Me Me Soe', '2', '150000', 3),
(23, '2017-12-13 05:14:43', '2018-04-21 01:43:40', 'Hnin Tha Zin', '2', '150000', 3),
(24, '2017-12-29 20:09:49', '2018-02-10 19:43:05', 'Thin Thiri Han Thar Win', '1', '150000', 3),
(25, '2017-12-30 02:21:32', '2018-02-24 19:57:38', 'Wai Yan Soe', '1', '150000', 3),
(26, '2018-01-05 23:37:16', '2018-04-06 05:49:03', 'Phyo Min Maung Maung', '1', '150000', 3),
(27, '2018-02-18 23:51:19', '2018-02-18 23:51:19', 'Wai Yan Phyo', '4', '40000', 3),
(28, '2018-02-18 23:51:31', '2018-04-29 02:06:11', 'San Chain Tun', '4', '100000', 3),
(29, '2018-04-21 01:43:09', '2018-04-29 02:06:06', 'Zar Ni Tun', '2', '150000', 2),
(30, '2018-04-21 01:43:20', '2018-04-29 02:06:01', 'Kyaw Zin Phyo', '2', '150000', 2),
(31, '2018-04-29 02:06:58', '2018-04-29 02:06:58', 'Kyaw Min Oo', '2', '150000', 2),
(32, '2018-06-09 22:14:55', '2018-06-09 22:14:55', 'Khine Thazin Oo', '1', '50000', 3),
(33, '2018-06-09 22:15:11', '2018-06-09 22:15:11', 'Hnin Thazin Hmwe', '1', '50000', 3),
(34, '2018-06-17 20:11:29', '2018-07-18 18:09:01', 'Soe Thuzar Win', '1', '150000', 3),
(35, '2018-06-23 05:17:00', '2018-06-23 05:17:00', 'Aye Mya Mya Aung', '1', '50000', 3),
(36, '2018-06-25 03:58:33', '2018-06-25 03:58:33', 'Win Paing Soe', '1', '150000', 3),
(37, '2018-06-25 03:59:36', '2018-06-25 03:59:36', 'Aung Ye Kyaw', '1', '75000', 3),
(38, '2018-06-30 19:18:15', '2018-06-30 19:18:15', 'De Naung Linn', '1', '50000', 3),
(39, '2018-06-30 22:50:10', '2018-06-30 22:50:10', 'Si Thu Aung', '1', '50000', 3),
(40, '2018-06-30 22:50:27', '2018-06-30 22:50:27', 'Aung Khant Ko Ko', '1', '50000', 3),
(41, '2018-06-30 22:50:38', '2018-06-30 22:50:38', 'Si Thu Phyo', '1', '50000', 3),
(42, '2018-07-27 07:07:11', '2018-07-27 07:07:11', 'Phyo Min Maun Maung', '2', '50000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'khinewin', 'khinewin123@gmail.com', '$2y$10$ctev3Hq2NX8TzEpaJT5G3eBvCPq7egwG7q127/DZ1ijFAB/Os/lIW', 'olCvTl0RUQscS8Pe1yrlKmZ6hRfDFIXXLAfr97PqdiP2SahO6TWegQpey2oR', '2017-09-10 22:34:06', '2017-09-10 22:34:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctimes`
--
ALTER TABLE `ctimes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ctimes`
--
ALTER TABLE `ctimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
