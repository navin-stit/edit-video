-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 09:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video`
--

-- --------------------------------------------------------

--
-- Table structure for table `createvideo`
--

CREATE TABLE `createvideo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `createvideo`
--

INSERT INTO `createvideo` (`id`, `img`, `image_size`, `description`, `created_at`, `updated_at`) VALUES
(1, 'c1.png', '1.91:1', NULL, '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(2, 'c2.png', '16:9', 'Full Landscape', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(3, 'c3.png', '1:1', 'Square (Instagram and Facebook Feed)', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(4, 'c4.png', '4:5', 'Vertical (Instagram and Facebook Feed)', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(5, 'c5.png', '2:3', 'Vertical (Facebook Only)', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(6, 'c6.png', '1.91:1', 'Full Portrait/Vertical (Stories and Facebook Feed)', '2019-07-02 18:30:00', '2019-07-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `video_price` varchar(100) NOT NULL,
  `video_image` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `music` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `music_type` varchar(100) NOT NULL,
  `thumbnail_style` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `music` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `music_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_gender`
--

CREATE TABLE `master_gender` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_gender`
--

INSERT INTO `master_gender` (`id`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Both', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(2, 'Men', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(3, 'Women', '2019-07-02 18:30:00', '2019-07-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_music`
--

CREATE TABLE `master_music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `music_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_music`
--

INSERT INTO `master_music` (`id`, `music_type`, `created_at`, `updated_at`) VALUES
(1, 'Yes, I TRUST DROPSHIPMEDIA', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(2, 'No, I WANT TO UPLOAD MY OWN', '2019-07-03 18:30:00', '2019-07-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_video`
--

CREATE TABLE `master_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_style` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_style` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_mask` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_video`
--

INSERT INTO `master_video` (`id`, `video_style`, `thumbnail_style`, `image`, `created_at`, `updated_at`, `video_mask`, `video_text`) VALUES
(1, 'https://mdbootstrap.com/img/video/Tropical.mp4', 'https://www.youtube.com/embed/A3PDXmYoF5U', 'slide1.jpg', '2019-07-03 18:30:00', '2019-07-03 18:30:00', 'Light mask', 'First text'),
(2, 'https://mdbootstrap.com/img/video/animation-intro.mp4', 'https://www.youtube.com/embed/A3PDXmYoF5U', 'slide2.jpg', '2019-07-03 18:30:00', '2019-07-03 18:30:00', 'Super light mask', 'Secondary text'),
(3, 'https://mdbootstrap.com/img/video/Lines.mp4', 'https://www.youtube.com/embed/A3PDXmYoF5U', 'slide3.jpg', '2019-07-03 18:30:00', '2019-07-03 18:30:00', 'Strong mask', 'Third text'),
(4, NULL, 'https://www.youtube.com/embed/A3PDXmYoF5U', 'slide4.jpg', '2019-07-03 18:30:00', '2019-07-03 18:30:00', NULL, NULL),
(5, NULL, 'https://www.youtube.com/embed/A3PDXmYoF5U', 'slide5.jpg', '2019-07-03 18:30:00', '2019-07-03 18:30:00', NULL, NULL),
(6, NULL, 'https://www.youtube.com/embed/A3PDXmYoF5U', 'slide6.jpg', '2019-07-03 18:30:00', '2019-07-03 18:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_06_27_061718_add_first_name_to_users', 1),
(19, '2019_06_27_061742_add_last_name_to_users', 1),
(20, '2019_07_02_100918_add_role_id_to_users', 1),
(21, '2019_07_02_115015_create_customers_table', 1),
(22, '2019_07_03_085610_create_subscribemembers_table', 1),
(23, '2019_07_03_085629_create_nonsubscribemembers_table', 1),
(24, '2019_07_03_113822_create_createvideo_table', 1),
(25, '2019_07_03_135134_create_master_gender_table', 2),
(26, '2019_07_04_051007_create_master_music_table', 3),
(27, '2019_07_04_061207_create_master_video_table', 4),
(28, '2019_07_04_072425_add_video_mask_to_master_video', 5),
(29, '2019_07_04_072446_add_video_text_to_master_video', 5),
(30, '2019_07_04_081850_create_sub_member_video_variation_table', 6),
(31, '2019_07_04_081913_create_nonsub_member_video_variation_table', 6),
(32, '2019_07_04_111255_create_customer_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nonsubscribemembers`
--

CREATE TABLE `nonsubscribemembers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nonsubscribemembers`
--

INSERT INTO `nonsubscribemembers` (`id`, `video_type`, `created_at`, `updated_at`) VALUES
(1, 'Additional for Thumbnails', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(2, 'Free Script/Text', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(3, 'Additional for Video Orientations', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(4, 'Free Royal Music', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(5, '7 Day Delivery', '2019-07-02 18:30:00', '2019-07-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `nonsub_member_video_variation`
--

CREATE TABLE `nonsub_member_video_variation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nonsub_member_video_variation`
--

INSERT INTO `nonsub_member_video_variation` (`id`, `amount`, `video_type`, `created_at`, `updated_at`) VALUES
(1, '$45.99 / 1 Video (Free)', 'Additional for Thumbnails', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(2, '$91.98 / 2 Video (Free)', 'Free Script/Text', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(3, '$137.97 / 3 Video (Free)', 'Additional for Video Orientations', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(4, '$183.96 / 4 Video', 'Free Royal Music', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(5, '$229.95 / 5 Video', '7 Day Delivery', '2019-07-03 18:30:00', '2019-07-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribemembers`
--

CREATE TABLE `subscribemembers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribemembers`
--

INSERT INTO `subscribemembers` (`id`, `video_type`, `created_at`, `updated_at`) VALUES
(1, 'Free Thumbnails', NULL, NULL),
(2, 'Free Script/Text', NULL, NULL),
(3, 'Multiple Video Orientation', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(4, 'Ability to re-edit video yourself', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(5, 'Multiple Test Variations', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(6, 'Multiple Stop Scroll Variations', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(7, 'Multiple Split Test', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(8, 'Translate Language', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(9, 'Free Royalty Music', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(10, '4 Day Express Delivery', '2019-07-02 18:30:00', '2019-07-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_member_video_variation`
--

CREATE TABLE `sub_member_video_variation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_member_video_variation`
--

INSERT INTO `sub_member_video_variation` (`id`, `amount`, `video_type`, `created_at`, `updated_at`) VALUES
(1, '$39.99 / 1 Video (Free)', 'Free Thumbnails', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(2, '$79.98 / 2 Video (Free)', 'Free Script/Text', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(3, '$119.97 / 3 Video', 'Multiple Video Orientation', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(4, '$159.96 / 4 Video', 'Ability to re-edit video yourself', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(5, '$199.95 / 5 Video', 'Multiple Test Variations', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(6, '', 'Multiple Stop Scroll Variations', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(7, NULL, 'Multiple Split Test', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(8, NULL, 'Translate Language', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(9, NULL, 'Free Royalty Music', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(10, NULL, '4 Day Express Delivery', '2019-07-03 18:30:00', '2019-07-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `createvideo`
--
ALTER TABLE `createvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_gender`
--
ALTER TABLE `master_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_music`
--
ALTER TABLE `master_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_video`
--
ALTER TABLE `master_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonsubscribemembers`
--
ALTER TABLE `nonsubscribemembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonsub_member_video_variation`
--
ALTER TABLE `nonsub_member_video_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `subscribemembers`
--
ALTER TABLE `subscribemembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_member_video_variation`
--
ALTER TABLE `sub_member_video_variation`
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
-- AUTO_INCREMENT for table `createvideo`
--
ALTER TABLE `createvideo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_gender`
--
ALTER TABLE `master_gender`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_music`
--
ALTER TABLE `master_music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_video`
--
ALTER TABLE `master_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nonsubscribemembers`
--
ALTER TABLE `nonsubscribemembers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nonsub_member_video_variation`
--
ALTER TABLE `nonsub_member_video_variation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribemembers`
--
ALTER TABLE `subscribemembers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_member_video_variation`
--
ALTER TABLE `sub_member_video_variation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
