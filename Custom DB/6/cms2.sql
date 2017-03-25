-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 март 2017 в 13:53
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
  `price` double NOT NULL,
  `free_seats` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cl_film_screenings`
--

INSERT INTO `cl_film_screenings` (`id`, `date`, `hour`, `cm_movie_id`, `price`, `free_seats`, `created_at`, `updated_at`, `date_deleted`) VALUES
(2, '2017-02-14', '15:00:00', 2, 8, 152, '0000-00-00', '2017-03-17', NULL),
(3, '2017-02-13', '07:14:00', 2, 7, 150, '0000-00-00', '0000-00-00', NULL),
(4, '2017-02-14', '12:29:00', 9, 7, 150, '0000-00-00', '0000-00-00', NULL),
(5, '2017-02-15', '21:00:00', 10, 7, 150, '0000-00-00', '0000-00-00', NULL),
(6, '2017-03-12', '04:11:00', 11, 7, 150, '0000-00-00', '0000-00-00', NULL),
(7, '2017-03-13', '11:00:00', 12, 7, 150, '0000-00-00', '0000-00-00', NULL),
(8, '2017-03-17', '16:14:00', 2, 7, 150, '0000-00-00', '0000-00-00', NULL),
(9, '2017-03-15', '19:00:00', 10, 7.5, 100, '0000-00-00', '0000-00-00', NULL),
(10, '2017-03-16', '20:00:00', 13, 7, 150, '0000-00-00', '0000-00-00', NULL),
(11, '2017-03-16', '08:00:00', 13, 8, 100, '0000-00-00', '0000-00-00', NULL),
(12, '2017-03-09', '11:00:00', 13, 9, 150, '0000-00-00', '0000-00-00', NULL),
(13, '2017-02-20', '09:00:00', 1, 7, 100, '0000-00-00', '0000-00-00', NULL),
(14, '2017-02-20', '17:00:00', 1, 8, 250, '0000-00-00', '0000-00-00', NULL),
(15, '2017-03-17', '10:05:00', 1, 8, 50, '2017-03-17', '2017-03-17', NULL);

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
('Action/Екшън'),
('Animation/Анимация'),
('Comedy/Комедия'),
('Drama/Драма'),
('Family/Семеен'),
('Horror/Ужас'),
('Romantic/Романтичен'),
('SCI-FI/Фантастика'),
('Thriller/Трилър');

-- --------------------------------------------------------

--
-- Структура на таблица `cm_movies`
--

CREATE TABLE `cm_movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `poster` varchar(150) DEFAULT NULL,
  `description` text,
  `cl_genre_id1` varchar(20) DEFAULT NULL,
  `cl_genre_id2` varchar(20) DEFAULT NULL,
  `cl_genre_id3` varchar(20) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL,
  `translation` enum('subtitles','bg_audio','','') DEFAULT NULL,
  `video_format` enum('3D','2D','','') NOT NULL DEFAULT '2D',
  `age_rate` tinyint(2) NOT NULL DEFAULT '10',
  `country` varchar(50) DEFAULT NULL,
  `bg_premiere` date DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `producer` varchar(50) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `date_deleted` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'cvexa',
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cm_movies`
--

INSERT INTO `cm_movies` (`id`, `title`, `poster`, `description`, `cl_genre_id1`, `cl_genre_id2`, `cl_genre_id3`, `director`, `translation`, `video_format`, `age_rate`, `country`, `bg_premiere`, `rating`, `producer`, `trailer`, `start_date`, `end_date`, `date_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Warcraft / Warcraft', '1486929184_warcraft.jpg', 'Мирната територия Азерот е на ръба на война, когато цивилизацията й е изправена пред страховит набег на завоеватели: воини орки бягат от загиващия си дом, опитвайки се да колонизират нов...', 'Animation/Анимация', 'Comedy/Комедия', 'Drama/Драма', 'Duncan Jones', 'bg_audio', '3D', 13, 'USA', '2017-02-25', 8, 'Duncan Jones', 'https://www.youtube.com/embed/RhFMIRuHAL4', '2017-01-08', '2017-01-31', NULL, '2017-01-07 05:14:14', '2017-02-14 22:10:24', 'Cvexa', ''),
(2, 'xXx: Return of Xander ', '1486926222_cwgr_gjuiair7ts.jpg', 'Xander Cage is left for dead after an incident, though he secretly returns to action for a new, tough assignment with his handler Augustus Gibbons. ', 'Animation/Анимация', 'Comedy/Комедия', 'Drama/Драма', ' D.J. Caruso ', 'subtitles', '2D', 15, 'USA,Brazil', '2017-01-02', 10, NULL, 'https://www.youtube.com/embed/xEuM4IUFWu8', '2017-01-27', '2017-03-27', NULL, '2017-01-23 21:25:12', '2017-02-12 19:03:42', 'cvexa', NULL),
(9, 'Collide / Аутобан ', '1486925896_collide-nicholas-hoult-felicity-jones-new-trailer-01.jpg', 'Осъзнавайки, че няма избор, Кейси Стийн (Никълъс Холт) се обръща за помощ към бившия си шеф и пласьор на наркотици Герън (Бен Кингсли), за да набави необходимите 200 хиляди долара за животоспасяваща бъбречна трансплантация за дългогодишната си приятелка Джулиет (Фелисити Джоунс)...', 'Horror/Ужас', 'Romantic/Романтичен', 'SCI-FI/Фантастика', 'Еран Крийви', 'subtitles', '2D', 5, 'China', '2017-06-22', 5, NULL, 'https://www.youtube.com/embed/p7yt_t3nZKA', '2012-12-12', '2012-12-12', NULL, '2017-01-23 22:22:37', '2017-02-12 18:58:16', 'cvexa', NULL),
(10, 'The Great Wall', '1486925779_great_wall_ver17.jpg', 'European mercenaries searching for black powder become embroiled in the defense of the Great Wall of China against a horde of monstrous creatures. ', NULL, NULL, NULL, ' Yimou Zhang (as Zhang Yimou ) ', 'bg_audio', '2D', 10, 'China', '2017-11-20', 6, NULL, 'https://www.youtube.com/embed/6SKI9rgqFck', '2017-01-27', '2017-01-31', NULL, '2017-01-24 22:48:07', '2017-02-12 18:56:19', 'cvexa', NULL),
(11, 'Resident Evil: The Final Chapter', '1486926235_reinternational.jpg', 'Picking up immediately after the events in Resident Evil: Retribution, Alice (Milla Jovovich) is the only survivor of what was meant to be humanity''s final stand against the undead...', NULL, NULL, NULL, ' Paul W.S. Anderson ', 'subtitles', '2D', 18, 'USA', '2017-02-20', 5, NULL, 'https://www.youtube.com/embed/8gQIL8uV_Tc', '2017-01-27', '2017-03-27', NULL, '2017-01-26 20:44:07', '2017-02-12 19:03:55', 'cvexa', NULL),
(12, 'The Space Between Us', '1486926247_spacebetweenposter.jpg', 'The first human born on Mars travels to Earth for the first time, experiencing the wonders of the planet through fresh eyes. He embarks on an adventure with a street smart girl to discover how he came to be. ', NULL, NULL, NULL, ' Peter Chelsom ', 'bg_audio', '2D', 14, 'USA', '2017-03-17', 5, NULL, 'https://www.youtube.com/embed/2FjFJ5N2MjA', '2017-02-27', '2017-03-27', NULL, '2017-01-26 22:18:52', '2017-03-17 18:25:42', 'cvexa', NULL),
(13, 'Fist Fight', '1487109964_fist_fight.jpg', 'When one school teacher gets the other fired, he is challenged to an after-school fight. ', 'Action/Екшън', 'Comedy/Комедия', 'Family/Семеен', ' Richie Keen ', 'bg_audio', '3D', 6, 'USA', '2017-02-26', 4, NULL, 'https://www.youtube.com/embed/6YVBj2o_3mg', '2017-02-26', '2022-02-17', NULL, '2017-02-14 22:06:04', '2017-02-18 19:58:55', 'cvexa', NULL);

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
  `code` varchar(50) DEFAULT NULL,
  `date_deleted` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cm_sold_tickets`
--

INSERT INTO `cm_sold_tickets` (`id`, `cm_film_screening_id`, `row_num`, `column_num`, `price`, `code`, `date_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `user_id`) VALUES
(1, 1, 6, 10, 10, NULL, NULL, '2017-03-01 17:45:54', '2017-03-01 17:45:54', 'cvexa', NULL, 3),
(2, 9, 4, 10, 7.5, NULL, NULL, '2017-03-03 17:00:35', '2017-03-03 17:00:35', 'cvexa', NULL, NULL),
(3, 9, 4, 10, 7.5, NULL, NULL, '2017-03-03 17:03:23', '2017-03-03 17:03:23', 'cvexa', NULL, NULL),
(4, 9, 3, 9, 7.5, NULL, NULL, '2017-03-03 17:03:23', '2017-03-03 17:03:23', 'cvexa', NULL, 3),
(5, 9, 3, 10, 7.5, NULL, NULL, '2017-03-03 17:03:23', '2017-03-03 17:03:23', 'cvexa', NULL, NULL),
(6, 11, 3, 9, 8, NULL, NULL, '2017-03-03 17:04:05', '2017-03-03 17:04:05', 'cvexa', NULL, NULL),
(7, 11, 3, 8, 8, NULL, NULL, '2017-03-03 17:04:05', '2017-03-03 17:04:05', 'cvexa', NULL, 3),
(8, 12, 2, 9, 9, NULL, NULL, '2017-03-08 11:04:59', '2017-03-08 11:04:59', 'cvexa', NULL, NULL),
(9, 12, 2, 8, 9, NULL, NULL, '2017-03-08 11:04:59', '2017-03-08 11:04:59', 'cvexa', NULL, NULL),
(10, 12, 2, 7, 9, NULL, NULL, '2017-03-08 11:04:59', '2017-03-08 11:04:59', 'cvexa', NULL, NULL),
(11, 12, 10, 9, 9, NULL, NULL, '2017-03-08 11:24:07', '2017-03-08 11:24:07', 'cvexa', NULL, NULL),
(12, 12, 10, 8, 9, NULL, NULL, '2017-03-08 11:24:07', '2017-03-08 11:24:07', 'cvexa', NULL, NULL),
(13, 12, 10, 10, 9, NULL, NULL, '2017-03-08 11:24:07', '2017-03-08 11:24:07', 'cvexa', NULL, NULL),
(14, 12, 3, 9, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(15, 12, 3, 8, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(16, 12, 3, 7, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(17, 12, 3, 6, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(18, 12, 3, 4, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(19, 12, 3, 2, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(20, 12, 4, 3, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(21, 12, 4, 4, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(22, 12, 4, 5, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(23, 12, 4, 7, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(24, 12, 4, 8, 9, NULL, NULL, '2017-03-08 11:34:57', '2017-03-08 11:34:57', 'cvexa', NULL, NULL),
(25, 12, 7, 10, 9, NULL, NULL, '2017-03-08 11:38:21', '2017-03-08 11:38:21', 'cvexa', NULL, NULL),
(26, 11, 3, 10, 8, NULL, NULL, '2017-03-08 11:38:54', '2017-03-08 11:38:54', 'cvexa', NULL, NULL),
(27, 11, 4, 10, 8, NULL, NULL, '2017-03-08 11:38:54', '2017-03-08 11:38:54', 'cvexa', NULL, NULL),
(28, 11, 4, 9, 8, NULL, NULL, '2017-03-08 11:40:02', '2017-03-08 11:40:02', 'cvexa', NULL, NULL),
(29, 11, 5, 8, 8, NULL, NULL, '2017-03-08 12:01:23', '2017-03-08 12:01:23', 'cvexa', NULL, NULL),
(30, 11, 4, 8, 8, NULL, NULL, '2017-03-08 12:02:46', '2017-03-08 12:02:46', 'cvexa', NULL, NULL),
(31, 11, 1, 5, 8, NULL, NULL, '2017-03-08 12:05:28', '2017-03-08 12:05:28', 'cvexa', NULL, NULL),
(32, 11, 1, 6, 8, NULL, NULL, '2017-03-08 12:05:28', '2017-03-08 12:05:28', 'cvexa', NULL, NULL),
(33, 11, 2, 6, 8, NULL, NULL, '2017-03-08 12:05:28', '2017-03-08 12:05:28', 'cvexa', NULL, NULL),
(34, 12, 6, 6, 9, NULL, NULL, '2017-03-08 13:00:38', '2017-03-08 13:00:38', 'cvexa', NULL, NULL),
(35, 12, 6, 5, 9, NULL, NULL, '2017-03-08 13:00:38', '2017-03-08 13:00:38', 'cvexa', NULL, NULL),
(36, 12, 4, 9, 9, NULL, NULL, '2017-03-08 13:00:38', '2017-03-08 13:00:38', 'cvexa', NULL, NULL),
(37, 12, 4, 10, 9, NULL, NULL, '2017-03-08 13:03:01', '2017-03-08 13:03:01', 'cvexa', NULL, NULL),
(38, 12, 2, 4, 9, NULL, NULL, '2017-03-08 13:03:53', '2017-03-08 13:03:53', 'cvexa', NULL, NULL),
(39, 12, 2, 4, 9, NULL, NULL, '2017-03-08 13:04:36', '2017-03-08 13:04:36', 'cvexa', NULL, NULL),
(40, 12, 7, 9, 9, NULL, NULL, '2017-03-08 13:05:15', '2017-03-08 13:05:15', 'cvexa', NULL, NULL),
(41, 12, 9, 10, 9, NULL, NULL, '2017-03-08 13:06:22', '2017-03-08 13:06:22', 'cvexa', NULL, NULL),
(42, 12, 4, 6, 9, NULL, NULL, '2017-03-08 13:19:58', '2017-03-08 13:19:58', 'Just_user', NULL, NULL),
(43, 12, 5, 7, 9, NULL, NULL, '2017-03-08 13:19:58', '2017-03-08 13:19:58', 'Just_user', NULL, NULL),
(44, 12, 9, 6, 9, NULL, NULL, '2017-03-08 13:22:30', '2017-03-08 13:22:30', 'Vr', NULL, NULL),
(45, 12, 7, 7, 9, '54', NULL, '2017-03-08 13:27:23', '2017-03-08 13:27:23', 'Vr', NULL, NULL),
(46, 12, 5, 9, 9, '0', NULL, '2017-03-08 13:29:16', '2017-03-08 13:29:16', 'Vr', NULL, NULL),
(47, 12, 5, 8, 9, '0', NULL, '2017-03-08 13:29:16', '2017-03-08 13:29:16', 'Vr', NULL, NULL),
(48, 12, 5, 10, 9, '0', NULL, '2017-03-08 13:29:16', '2017-03-08 13:29:16', 'Vr', NULL, NULL),
(49, 12, 5, 6, 9, '5561247', NULL, '2017-03-08 13:31:26', '2017-03-08 13:31:26', 'Vr', NULL, NULL),
(50, 12, 6, 7, 9, '5671215rcbfo', NULL, '2017-03-08 13:35:28', '2017-03-08 13:35:28', 'Vr', NULL, NULL),
(51, 12, 6, 8, 9, '10681244rcbfo', NULL, '2017-03-08 13:35:28', '2017-03-08 13:35:28', 'Vr', NULL, 1),
(52, 12, 5, 5, 9, '8551214ErH6v', NULL, '2017-03-08 13:38:53', '2017-03-08 13:38:53', 'Vr', NULL, 1),
(53, 12, 5, 4, 9, '2541250ErH6v', NULL, '2017-03-08 13:38:53', '2017-03-08 13:38:53', 'Vr', NULL, 1),
(54, 6, 1, 1, 7, '311626aKuF4', NULL, '2017-03-11 11:45:38', '2017-03-11 11:45:38', 'Vr', NULL, 1),
(55, 6, 1, 2, 7, '112612aKuF4', NULL, '2017-03-11 11:45:38', '2017-03-11 11:45:38', 'Vr', NULL, 1),
(56, 6, 1, 3, 7, '31367mreE5', NULL, '2017-03-11 11:48:22', '2017-03-11 11:48:22', 'Just_user', NULL, 3),
(57, 9, 1, 1, 7.5, '411928grAya', NULL, '2017-03-11 20:45:18', '2017-03-11 20:45:18', 'test2', NULL, 5),
(58, 9, 1, 5, 7.5, '31597MIdKx', NULL, '2017-03-14 08:03:47', '2017-03-14 08:03:47', 'admin', NULL, 16),
(59, 9, 1, 6, 7.5, '2169-6MIdKx', NULL, '2017-03-14 08:03:47', '2017-03-14 08:03:47', 'admin', NULL, 16),
(60, 9, 1, 7, 7.5, '417944MIdKx', NULL, '2017-03-14 08:03:47', '2017-03-14 08:03:47', 'admin', NULL, 16),
(61, 10, 2, 6, 7, '8261019wjlQf', NULL, '2017-03-15 17:36:06', '2017-03-15 17:36:06', 'admin2', NULL, 23),
(62, 10, 2, 7, 7, '4271010wjlQf', NULL, '2017-03-15 17:36:06', '2017-03-15 17:36:06', 'admin2', NULL, 23),
(63, 9, 1, 2, 7.5, '212918mEBCk', NULL, '2017-03-15 18:36:34', '2017-03-15 18:36:34', 'admin2', NULL, 23),
(64, 9, 6, 5, 7.5, '665921POIgm', NULL, '2017-03-15 21:08:18', '2017-03-15 21:08:18', 'admin2', NULL, 23),
(65, 9, 6, 6, 7.5, '966924POIgm', NULL, '2017-03-15 21:08:18', '2017-03-15 21:08:18', 'admin2', NULL, 23);

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
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'vr', '1489269213_h2.jpg', 'vass@abv.bg', '$2y$10$IwaaQkogJYBx2Pe9rpTZZu5DlI4oNeioRIQdnQbL9n06vikQirns6', 'g3Ae7i5nXfRKIm8a2eKmp6qDYFw5CZO1VN2NI7mf5iJrz8s4El4svEu7jHI3', '2017-03-11 11:37:16', '2017-03-11 19:53:33', 'admin'),
(3, 'Just_user', '', 'user@abv.bg', '$2y$10$VcqgsKAohkpmXNlJNcjQs.4T7B97X6gJlv1DtdJo2FOfn/pgwczkW', 'UmZfNMz1k0Rjdmx8wl4Z9pMJHcQ3pJfInHaQ5YWkkkpjDNlOlwGhu8hCQGZs', '2017-01-10 19:01:58', '2017-03-11 09:50:06', 'user'),
(4, 'test1', '', 'test1@abv.bg', '$2y$10$sPpxGgZhFzAW1BbgRWTFL.C2FHV2KzDO.1VtR39euHu.njC.cg03q', '6rueEdOqfZ4J7DCjw5LM7mi7JcB66E3mrVCpwRDpPTCqiJCoexQP2b0AAwlP', '2017-02-05 16:23:20', '2017-03-11 11:36:24', 'user'),
(5, 'test2', '1489268635_c6.jpg', 'test2@abv.bg', '$2y$10$R3n1on0.1LE90CRlmdMlDet/jF/eDdbEDJ7qv9zqjsi5zoWEvonTG', 'ulJf1GP2GbXdSdazTYl8ZAQBu9oKjPVgt5DCprsoXDGczdluf5hXSFvMw4Wq', '2017-02-05 16:26:01', '2017-03-11 19:46:19', 'user'),
(6, 'test3', '', 'test43@abv.bg', '$2y$10$C4F2G6mwesuxdWvkHDIZSeY5hBBggFtLneqlVLjOGSwo6P6DJq9f.', 'dlvLDS1BTKg6M4F49x1GgH4NWpifRD8AdbvigHhCQ08sOgnARIzJjypEN0vw', '2017-02-05 16:27:45', '2017-02-05 16:28:21', 'user'),
(7, 'asdasd33', '', 'asdasd@abv.bg', '$2y$10$MaP5vkltjfI83x.4J9ZRBuIUsxCFAI.IoxLt7rbfB5XJfy6phBiEy', 'IhOfFWwu9uGgEy9q2qL8kiMNByFPISWqa5a5p4hIrMH6PtMQxCbX4dcnjqaJ', '2017-02-06 16:52:21', '2017-02-06 16:53:13', 'user'),
(8, 'anotherone', '', 'asd@abv.bg', '$2y$10$ocecNpoiDwiT8GyQmgFgOewMriVD4Gfhnje69dRXQwv9ZHkUrnXR.', 'Fs23edU66J032hWRiZzqOzV5SZRSIMHNqjF51c1haoPmlWKUyVrxVcI3dPYa', '2017-02-06 17:09:34', '2017-02-06 17:11:41', 'user'),
(9, 'another2', '', 'anosad@abv.bg', '$2y$10$Wju7fhrgIjLAfQY6ZhO9vuuVSb5BERIR2TK3oyFzXw/PY0j57TgdO', 'Zjjol63wYOkvlSQ75jtzzC4KIBfKRCkwI6omCw8RWvGtnW8Q6wSmIhzXYIe0', '2017-02-06 17:12:49', '2017-02-06 17:18:13', 'user'),
(10, 'asdasdasd', '', 'asdaaaasd@abv.bg', '$2y$10$aSOC9io8z4rDct2PWaOk2Odpo52JPBUrvkVClhWaAmZM6IM/D.lOK', 'OnYBDIndlNEAyJ7eCAAwqLDlkUmSQEmmlFF459ZP2Wd5xlmEHoE7PPQIAOd2', '2017-02-06 17:18:28', '2017-02-06 17:19:34', 'user'),
(11, 'asdasddddd', '', 'asdasdadsddd@abv.bg', '$2y$10$B/9Rq4Js61ogHE8Xlth6POKgoUOZiyxtyW729bElHVViqkiVZU8PO', 'k2axP4Jvd4US7IU4mUzhJ5y8JruqcZmNjwaHzpXgF7zcPIILRXhJJbWAh2N9', '2017-02-06 17:26:11', '2017-02-06 17:28:17', 'user'),
(12, 'adsadasdsdaasdsad', '', 'asdsssasd@abv.bg', '$2y$10$II3s0wvBjqVoP1i/6d6oAeYePhTSiQIAlz6k/cKR.hLxhAgvXL9T6', 'BE93cHgDxuXCfU8aivORx34S8wyhj9qe8zTnoCGsnRJGWb1YX8yicegHf8ou', '2017-02-06 17:28:34', '2017-02-06 17:30:29', 'user'),
(13, 'xaxaaxxaxaxa', '', 'asxaxaxa@abv.bg', '$2y$10$RGN5db.646vVs42ZcRwyaOqenpAbSask0wXZZes.oyqq.CgjqkWs.', 'szGfvuUS7ILBxShcD20NCcUvEPbQ4IlHNvpH0tCGSsUwDWFrlobkyvwACgLj', '2017-02-06 17:31:10', '2017-02-06 17:32:26', 'user'),
(14, 'asdasdasdasddasasdasdasd', '', 'dasasdadadadad@abv.bg', '$2y$10$HDM9WG7LO9Cc0eXUwrD.FODVSHvDTWrv/U30XnbzEtSqagNurEaja', 'ctAyVEwmf1c2YuqpSmBnxCKlynL3AGXphDiQyfxhsTDq0jI8T79PkGJAXAWU', '2017-02-06 17:32:37', '2017-02-06 17:34:01', 'user'),
(15, 'xxxxxxxxxxxxxxxxxxxxxxxx', '', 'xxxxxxxxxxxxxx@abv.bg', '$2y$10$mUO7KvSCO81KQ4tbnXU3h.LrbsCviL2cNXnFnGIz6nMAoSpWW1eSG', '1L4ZLBj1ESlMGgYLpObBe48oKdEOyeTx9A95THpcsnZoTl35JBEE4CilO3AI', '2017-02-06 17:34:23', '2017-02-06 17:34:28', 'user'),
(16, 'admin', '1489478701_c10.jpg', 'admin@abv.bg', '$2y$10$ee7fumzc/HHeigzFBf0UFel.D2yWnZqlS6VZigqkTpCmL4D61M5da', '9VJrHWgHkRsH0IKgvVO5UmGVgYnrSHYkBi2xpjWaIkosXEbM8I1dIRav1Ybf', '2017-03-12 17:49:13', '2017-03-14 06:05:02', 'admin'),
(17, 'asdasd', NULL, 'asdasdasd@abv.bg', '$2y$10$P.zADdthj7lmk1XnndwoOeUrp.0cEEW.VBuTqVT/p20ClE2n8ZHou', 'TsCHIB9yqaUsPnoWBvlhDnRy35VCRanwjJRgzmFuE4HDSyRWLqrMMpZxxbhZ', '2017-03-12 17:53:38', '2017-03-12 17:54:05', 'user'),
(18, 'fafafafafaf', NULL, 'afafafaf@abv.bg', '$2y$10$i0z1l4s8cMqyLi01WNpGkOaJFMpu5OkDJ5CxMBwxzg8cmAo4Sacqa', 'wACb5C1aQcnHXGbb1TKZRG1xFFA3aEgDsTTyMBnrN7XskFWHrE2NYNVUnPwM', '2017-03-12 17:54:26', '2017-03-12 17:55:57', 'user'),
(19, 'lalalalal', NULL, 'lalalal@abv.bg', '$2y$10$DtKBL7MuRLqcLNFBkDPUWOUIKNHo5IyQ5cDpVDXYcsdFiQOFPYF8W', 'XMURGmDr8pHn5tujuWzjFbScxAjJqElVGmaqOiWbmTUKuHi34eCVYSeDNU7t', '2017-03-12 17:56:11', '2017-03-12 17:57:28', 'user'),
(20, 'fagfag', NULL, 'fagfag@abv.bg', '$2y$10$CBlqDIRnS8Jn0zpgZJ75qub9XHRxjwbhtiISyTIpN/VA0JtkqnK7e', '9BHfGrxJb0mL16glocr42D0BYn1eeRxGgxyDa02ZcT1UAVd68mrB1jJvotgJ', '2017-03-12 17:57:58', '2017-03-12 17:58:42', 'user'),
(21, 'kakkak', NULL, 'kakkak@abv.bg', '$2y$10$GA6o92YqAuZKql5WkKWxLe2xKGMFlbEA1Lk4cNh06DvlZZjdhmZG6', 'EE33hSktFVAI2B1kQpDV9mdTTjcbSFSYEhcPaSF8dvA7UxZju0HOVEsbpiIO', '2017-03-12 17:58:59', '2017-03-12 18:00:13', 'user'),
(22, 'mas', NULL, 'mas@abv.bg', '$2y$10$ePjvAl4Ad3WBMogg7gusnO2TuO89CDmn.h2C7jbxlXiCMUqSY7lqe', 'kffczrQVzPlVjCmVVJQJxZCK267fzNRKyL4CNnLhJAb9evIKp55SE08qn5OD', '2017-03-12 18:04:05', '2017-03-12 18:04:15', 'user'),
(23, 'admin2', '1489601160_m22.jpg', 'admin2@abv.bg', '$2y$10$XeKX.h8rgmwiv7adFr0yyO/V6Un2CiTplBTFubtuuhJDScvUO2LF.', 'TngRoqR0aBAmrINjad8vZcDXhJkk93e26mH9ahZA7ReqVGvQx4esiuTFyWXK', '2017-03-15 15:33:07', '2017-03-15 19:53:20', 'admin'),
(24, 'хахаха', NULL, 'omgzombi@abv.bg', '$2y$10$s3YwG8F0akuKOF7Da0TVCuZn8BQdGboWpWxjik.IHt.x0yyWUBqGq', 'R2znIKyWeXfpAP3Wh0maD2OdjFsXkwVXm6LbvfyrAauwqlMlOOoq3GJy2unN', '2017-03-15 15:40:04', '2017-03-15 15:40:04', 'user'),
(25, 'хахаха2', NULL, 'omgzombia@abv.bg', '$2y$10$ceLPZtGzcLgPEuZmPiIlF.UrSG.Ck49XzLyTHgfqU16IahuI7IybS', 'V1YhEAq14392L4IMC6MpEZnP24Od9aGhV2XRVfBKudIpiK5gmyAh9L91wBgf', '2017-03-15 15:41:51', '2017-03-15 15:47:42', 'user'),
(26, 'test23', NULL, 'test23@abv.bg', '$2y$10$yZLaSus55ix7Yvv5bL.q0eWmgdNb.fpTjzpGKTKF5/axqNjnpn9uO', 'Qz9D9VH0wwLal1abc2eY7KKkKWLcHHi3rrmsaXGEXHfOzluBiCtyLDMdsptR', '2017-03-15 15:47:58', '2017-03-17 16:23:24', 'admin'),
(27, 'test24', NULL, 'test24@abv.bg', '$2y$10$c63xNZw.Lk2BepLCPfT85eGrPCf/JSlakQShATvlkqga9OfI9GYm6', '7DBF4qmNU8dIKYQiFSDF35gwM2qGV1ihPtm7feVXbel4sgZiU0yekkg4mk80', '2017-03-15 15:48:39', '2017-03-15 15:53:36', 'user'),
(28, 'test25', NULL, 'test35@abv.bg', '$2y$10$q2mf4K8t4YjpCeTOwbtr0ewjlRkukdyrW0vLdm6O9cAAhWj4mcUwa', 'GfdywGwHkmJ38Mmin2kA1jMkWzyi3gSLEqSQzfybSYaVcAtuUKbVKVEB4eo9', '2017-03-15 15:53:53', '2017-03-15 15:55:01', 'user'),
(29, 'test35', NULL, 'test325@abv.bg', '$2y$10$wZKO4bI8O7TIs9vjCZq6eeKNHZoR98536axD1uFXCJAxhGDTDowpG', 'IwbuBaT2Uz3VbUq0UntBDvxpUAr8x7wsbvDdiJBcvgCyEVGjhvXAojYgmhtd', '2017-03-15 15:57:28', '2017-03-15 15:57:31', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cm_movies`
--
ALTER TABLE `cm_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cm_sold_tickets`
--
ALTER TABLE `cm_sold_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
