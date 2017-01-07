-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time:  7 яну 2017 в 19:34
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms2`
--

-- --------------------------------------------------------

--
-- Структура на таблица `cl_film_screenings`
--

CREATE TABLE `cl_film_screenings` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `cm_movie_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `free_seats` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `cl_genres`
--

CREATE TABLE `cl_genres` (
  `genres` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cl_genres`
--

INSERT INTO `cl_genres` (`genres`) VALUES
('action'),
('comedy'),
('drama'),
('horror'),
('thriller');

-- --------------------------------------------------------

--
-- Структура на таблица `cm_movies`
--

CREATE TABLE `cm_movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `cl_genre_id1` varchar(20) NOT NULL,
  `cl_genre_id2` varchar(20) NOT NULL,
  `cl_genre_id3` varchar(20) NOT NULL,
  `director` varchar(50) NOT NULL,
  `translation` enum('subtitles','audio','','') NOT NULL,
  `age_rate` tinyint(2) NOT NULL,
  `country` varchar(50) NOT NULL,
  `bg_premiere` date DEFAULT NULL,
  `rating` float NOT NULL,
  `producer` varchar(50) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cm_movies`
--

INSERT INTO `cm_movies` (`id`, `title`, `description`, `cl_genre_id1`, `cl_genre_id2`, `cl_genre_id3`, `director`, `translation`, `age_rate`, `country`, `bg_premiere`, `rating`, `producer`, `trailer`, `start_date`, `end_date`, `date_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Warcraft', 'Based on a epic game!', 'action', 'comedy', 'drama', 'Duncan Jones', 'subtitles', 13, 'USA', '2017-01-08', 8, 'Duncan Jones', 'https://www.youtube.com/watch?v=RhFMIRuHAL4', '2017-01-08', '2017-01-31', NULL, '2017-01-07 05:14:14', '0000-00-00 00:00:00', 'Cvexa', '');

-- --------------------------------------------------------

--
-- Структура на таблица `cm_sold_tickets`
--

CREATE TABLE `cm_sold_tickets` (
  `id` int(11) NOT NULL,
  `cm_film_screening_id` int(11) NOT NULL,
  `row_num` int(11) NOT NULL,
  `column_num` int(11) NOT NULL,
  `price` float NOT NULL,
  `code` varchar(50) NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cl_film_screenings`
--
ALTER TABLE `cl_film_screenings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_genres`
--
ALTER TABLE `cl_genres`
  ADD PRIMARY KEY (`genres`);

--
-- Indexes for table `cm_movies`
--
ALTER TABLE `cm_movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_sold_tickets`
--
ALTER TABLE `cm_sold_tickets`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `cl_film_screenings`
--
ALTER TABLE `cl_film_screenings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cm_movies`
--
ALTER TABLE `cm_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cm_sold_tickets`
--
ALTER TABLE `cm_sold_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
