-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time:  3 яну 2017 в 23:05
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
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
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cm_movies`
--

INSERT INTO `cm_movies` (`id`, `title`, `description`, `cl_genre_id1`, `cl_genre_id2`, `cl_genre_id3`, `director`, `translation`, `age_rate`, `country`, `bg_premiere`, `rating`, `producer`, `trailer`, `start_date`, `end_date`, `date_deleted`) VALUES
(1, 'Warcraft', 'Epic movie by a classic game ', '', '', '', 'J.J', 'subtitles', 13, 'USA', '2017-01-03', 9, '', '', '2017-01-10', '2017-01-31', NULL);

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
  `date_deleted` date DEFAULT NULL
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'test', 'test@abv.bg', 'testtest', NULL, NULL, NULL, NULL),
(2, 'asdasd', 'asdasd', 'asdasdasd', NULL, NULL, NULL, NULL),
(3, 'john', 'wick', '123123', NULL, NULL, NULL, NULL),
(4, 'John im upd', 'John im upd2', 'Johnyyyy', NULL, NULL, NULL, NULL),
(6, 'john22222', 'wick222222', '222222', NULL, NULL, NULL, NULL),
(7, 'Zombi', 'Zombi', '123123123', NULL, NULL, NULL, NULL),
(8, 'Zombi2', 'Zombi2', '22222', NULL, NULL, NULL, NULL),
(10, 'Zombi2333', 'Zombi2333', '3131313', NULL, NULL, NULL, 1),
(11, 'Zombi2333123123', 'Zombi2333123123', '123123', NULL, NULL, NULL, 1),
(13, 'Zombi2333123123a', 'Zombi2333123123a', '23', NULL, NULL, NULL, 1),
(14, 'finaly', 'i', 'didiit', NULL, NULL, NULL, 1),
(15, 'Zombi2333123123aaa', 'Zombi2333123123aaa', 'asdasdasd', NULL, NULL, NULL, 1),
(16, 'imnumberone', 'jojo@abv.bg', 'asd,a;sdasd', NULL, NULL, NULL, NULL),
(18, 'im somebody', 'im soebody too', 'notasecret', NULL, NULL, NULL, NULL),
(20, 'good', 'night', 'america', NULL, NULL, NULL, NULL),
(21, 'Steven', 'Steven', 'Stevennnn', NULL, '2017-01-03 19:36:19', '2017-01-03 19:36:19', NULL),
(22, 'new', 'old', 'user', 'mqgVtKYsypBTYu76fkue0oUCJzuL95CAL2WLhVKu', '2017-01-03 19:40:49', '2017-01-03 19:40:49', NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
