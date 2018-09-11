-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2018 at 11:52 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_models`
--

CREATE TABLE `event_models` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `slug_home` varchar(255) NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT '0',
  `id_booker` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_models`
--

INSERT INTO `event_models` (`id`, `title`, `all_day`, `start`, `end`, `slug_home`, `accepted`, `id_booker`, `updated_at`, `created_at`, `id_owner`) VALUES
(13, 'Juliennnnn', 1, '2018-08-02 00:00:00', '2018-09-02 00:00:00', 'r', 1, 1, '2018-08-05 20:56:10', '2018-08-05 14:01:46', 2),
(15, 'sami', 1, '2018-08-02 00:00:00', '2018-09-02 00:00:00', 'u', 1, 2, '2018-08-05 20:56:12', '2018-08-05 14:01:46', 1),
(16, 'Julien', 1, '2018-09-09 00:00:00', '2018-09-16 00:00:00', 'r', 0, 1, '2018-08-05 19:05:07', '2018-08-05 19:05:07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_bed` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `title`, `owner`, `type`, `address`, `content`, `type_bed`, `created_at`, `updated_at`, `country`, `city`, `slug`) VALUES
(1, 'your place', 2, 'House party', '荣都嘉园5号楼1门1705', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ex auctor ex mattis suscipit. In maximus bibendum aliquam. Aenean ac lacus urna. Aliquam erat volutpat. Morbi id congue urna. Integer malesuada, lacus id porttitor ornare, eros velit bibendum nibh, eu condimentum nisi quam sed felis. Nulla non pretium dolor, at consectetur lectus. Vivamus sit amet est sit amet purus feugiat tincidunt. Sed scelerisque sit amet felis et porttitor. Nullam mollis nec enim vitae auctor. Mauris varius sit amet velit vel scelerisque. Donec vulputate risus lorem. Proin commodo augue sapien, ut pulvinar diam rhoncus et. \r\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ex auctor ex mattis suscipit. In maximus bibendum aliquam. Aenean ac lacus urna. Aliquam erat volutpat. Morbi id congue urna. Integer malesuada, lacus id porttitor ornare, eros velit bibendum nibh, eu condimentum nisi quam sed felis. Nulla non pretium dolor, at consectetur lectus. Vivamus sit amet est sit amet purus feugiat tincidunt. Sed scelerisque sit amet felis et porttitor. Nullam mollis nec enim vitae auctor. Mauris varius sit amet velit vel scelerisque. Donec vulputate risus lorem. Proin commodo augue sapien, ut pulvinar diam rhoncus et. \r\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ex auctor ex mattis suscipit. In maximus bibendum aliquam. Aenean ac lacus urna. Aliquam erat volutpat. Morbi id congue urna. Integer malesuada, lacus id porttitor ornare, eros velit bibendum nibh, eu condimentum nisi quam sed felis. Nulla non pretium dolor, at consectetur lectus. Vivamus sit amet est sit amet purus feugiat tincidunt. Sed scelerisque sit amet felis et porttitor. Nullam mollis nec enim vitae auctor. Mauris varius sit amet velit vel scelerisque. Donec vulputate risus lorem. Proin commodo augue sapien, ut pulvinar diam rhoncus et. \r\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ex auctor ex mattis suscipit. In maximus bibendum aliquam. Aenean ac lacus urna. Aliquam erat volutpat. Morbi id congue urna. Integer malesuada, lacus id porttitor ornare, eros velit bibendum nibh, eu condimentum nisi quam sed felis. Nulla non pretium dolor, at consectetur lectus. Vivamus sit amet est sit amet purus feugiat tincidunt. Sed scelerisque sit amet felis et porttitor. Nullam mollis nec enim vitae auctor. Mauris varius sit amet velit vel scelerisque. Donec vulputate risus lorem. Proin commodo augue sapien, ut pulvinar diam rhoncus et. \r\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ex auctor ex mattis suscipit. In maximus bibendum aliquam. Aenean ac lacus urna. Aliquam erat volutpat. Morbi id congue urna. Integer malesuada, lacus id porttitor ornare, eros velit bibendum nibh, eu condimentum nisi quam sed felis. Nulla non pretium dolor, at consectetur lectus. Vivamus sit amet est sit amet purus feugiat tincidunt. Sed scelerisque sit amet felis et porttitor. Nullam mollis nec enim vitae auctor. Mauris varius sit amet velit vel scelerisque. Donec vulputate risus lorem. Proin commodo augue sapien, ut pulvinar diam rhoncus et.', 'King size', NULL, '2018-08-05 10:44:46', 'China', '天津', 'r'),
(2, 'My place', 1, 'House party', '荣都嘉园5号楼1门1705', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ex auctor ex mattis suscipit. In maximus bibendum aliquam. Aenean ac lacus urna. Aliquam erat volutpat. Morbi id congue urna. Integer malesuada, lacus id porttitor ornare, eros velit bibendum nibh, eu condimentum nisi quam sed felis. Nulla non pretium dolor, at consectetur lectus. Vivamus sit amet est sit amet purus feugiat tincidunt. Sed scelerisque sit amet felis et porttitor. Nullam mollis nec enim vitae auctor. Mauris varius sit amet velit vel scelerisque. Donec vulputate risus lorem. Proin commodo augue sapien, ut pulvinar diam rhoncus et. ', 'King size', NULL, NULL, 'France', 'Bouillargues ', 'u');

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
(1, '2018_06_14_161847_create_home', 1),
(2, '2018_06_15_081559_create_booking_table', 2),
(3, '2018_06_15_084142_create_events_table', 3);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'Julien', 'kartori@yahoo.fr', '$2y$10$5YOgXVF6ONBXd96AVnBDMu/tohqpI3yb5HtpKwTpnCqZFq/NNUWca', 'wXZ6Icma03HdGuFJWAbGVQKGcbdlCbtokZssNuJxrYMqjDhP4ItLIVnNxOoV', '2018-06-14 08:03:47', '2018-06-14 08:03:47', 16666666),
(2, 'Sami', 'sami.menouar@gmail.com', '$2y$10$QDWi4XjmQZUesHwEKaqKnOEZtlhwdA5N6FVj01dbijIn1bYMtxK8q', NULL, '2018-06-20 22:42:50', '2018-06-20 22:42:50', 66666);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_models`
--
ALTER TABLE `event_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_models`
--
ALTER TABLE `event_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
