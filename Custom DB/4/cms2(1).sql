-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 фев 2017 в 13:47
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

--
-- Схема на данните от таблица `cl_film_screenings`
--

INSERT INTO `cl_film_screenings` (`id`, `date`, `hour`, `cm_movie_id`, `price`, `free_seats`, `date_deleted`) VALUES
(1, '2017-01-11', '15:00:00', 1, 7, 100, NULL);

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
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `cl_genre_id1` varchar(20) DEFAULT NULL,
  `cl_genre_id2` varchar(20) DEFAULT NULL,
  `cl_genre_id3` varchar(20) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL,
  `translation` enum('subtitles','bg_audio','','') DEFAULT NULL,
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

INSERT INTO `cm_movies` (`id`, `title`, `description`, `cl_genre_id1`, `cl_genre_id2`, `cl_genre_id3`, `director`, `translation`, `age_rate`, `country`, `bg_premiere`, `rating`, `producer`, `trailer`, `start_date`, `end_date`, `date_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Warcraft / Warcraft: Началото', 'Мирната територия Азерот е на ръба на война, когато цивилизацията й е изправена пред страховит набег на завоеватели: воини орки бягат от загиващия си дом, опитвайки се да колонизират нов...', 'Action', 'Comedy', 'Family', 'Duncan Jones', 'subtitles', 13, 'USA', '2017-01-08', 8, 'Duncan Jones', 'https://www.youtube.com/embed/RhFMIRuHAL4', '2017-01-08', '2017-01-31', NULL, '2017-01-07 05:14:14', '2017-01-30 18:33:04', 'Cvexa', ''),
(2, 'xXx: Return of Xander ', 'Xander Cage is left for dead after an incident, though he secretly returns to action for a new, tough assignment with his handler Augustus Gibbons. ', 'Action', 'Comedy', 'Family', ' D.J. Caruso ', 'subtitles', 15, 'USA,Brazil', '2017-01-02', 10, NULL, 'https://www.youtube.com/embed/xEuM4IUFWu8', '2017-01-27', '2017-03-27', NULL, '2017-01-23 21:25:12', '2017-01-30 17:16:19', 'cvexa', NULL),
(9, 'Collide / Аутобан ', 'Осъзнавайки, че няма избор, Кейси Стийн (Никълъс Холт) се обръща за помощ към бившия си шеф и пласьор на наркотици Герън (Бен Кингсли), за да набави необходимите 200 хиляди долара за животоспасяваща бъбречна трансплантация за дългогодишната си приятелка Джулиет (Фелисити Джоунс)...', NULL, NULL, NULL, 'Еран Крийви', 'subtitles', 5, 'China', '2017-06-22', 5, NULL, 'https://www.youtube.com/embed/p7yt_t3nZKA', NULL, NULL, NULL, '2017-01-23 22:22:37', '2017-01-26 20:58:47', 'cvexa', NULL),
(10, 'The Great Wall', 'European mercenaries searching for black powder become embroiled in the defense of the Great Wall of China against a horde of monstrous creatures. ', NULL, NULL, NULL, ' Yimou Zhang (as Zhang Yimou ) ', 'bg_audio', 10, 'China', '2017-01-20', 6, NULL, 'https://www.youtube.com/embed/6SKI9rgqFck', '2017-01-27', '2017-01-31', NULL, '2017-01-24 22:48:07', '2017-01-26 21:06:50', 'cvexa', NULL),
(11, 'Resident Evil: The Final Chapter', 'Picking up immediately after the events in Resident Evil: Retribution, Alice (Milla Jovovich) is the only survivor of what was meant to be humanity''s final stand against the undead...', NULL, NULL, NULL, ' Paul W.S. Anderson ', 'subtitles', 18, 'USA', '2017-01-27', 5, NULL, 'https://www.youtube.com/embed/8gQIL8uV_Tc', '2017-01-27', '2017-03-27', NULL, '2017-01-26 20:44:07', '2017-01-26 21:06:16', 'cvexa', NULL),
(12, 'The Space Between Us', 'The first human born on Mars travels to Earth for the first time, experiencing the wonders of the planet through fresh eyes. He embarks on an adventure with a street smart girl to discover how he came to be. ', NULL, NULL, NULL, ' Peter Chelsom ', 'bg_audio', 14, 'USA', '2017-02-20', 5, NULL, 'https://www.youtube.com/embed/2FjFJ5N2MjA', '2017-02-27', '2017-03-27', NULL, '2017-01-26 22:18:52', '2017-01-26 22:19:41', 'cvexa', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Vr', 'vas@abv.bg', '$2y$10$7Ikl1QrtpcPnLrgYu54TQuzFM81T5o6j.A/Km3HIzUUKxWSUK0LnK', 'hskaRRBLOk53qavSmdYHOBdqa7AiWvseQVm3I3r0aVK3CJ92dGsazgwrqgxP', '2017-01-10 17:44:05', '2017-02-06 17:06:12', 'admin'),
(3, 'Just_user', 'user@abv.bg', '$2y$10$VcqgsKAohkpmXNlJNcjQs.4T7B97X6gJlv1DtdJo2FOfn/pgwczkW', 'krgJuRMqg6rhalUcfiz8nLGfnTfJdfWspdO4WnuhZ2vQNpJNCHaK6Mvi4KL3', '2017-01-10 19:01:58', '2017-02-06 17:07:36', 'user'),
(4, 'test1', 'test1@abv.bg', '$2y$10$/558u55HS5LMaiW.1lHXb.Ucjf59eWMELSiBnpe9C2UqADOMwp1Iu', 'fLYPCgHdx7XBCimVAQSdLpuRV1OMrGCZ21OQBSNhNSdu7MMI6s2DIfQxTHtV', '2017-02-05 16:23:20', '2017-02-05 16:25:51', 'user'),
(5, 'test2', 'test2@abv.bg', '$2y$10$7I5mqg7NTyd.evOpDXPZeOaPw9mVYrvokBsWCaofgYZtAgGXlWlRi', 'ixZUb0ewd6OjF5t4Ya58DBjsSOSSPm5EdIlUoratlKrKl2d4YAC7BCdxZqnz', '2017-02-05 16:26:01', '2017-02-05 16:27:33', 'user'),
(6, 'test3', 'test43@abv.bg', '$2y$10$C4F2G6mwesuxdWvkHDIZSeY5hBBggFtLneqlVLjOGSwo6P6DJq9f.', 'dlvLDS1BTKg6M4F49x1GgH4NWpifRD8AdbvigHhCQ08sOgnARIzJjypEN0vw', '2017-02-05 16:27:45', '2017-02-05 16:28:21', 'user'),
(7, 'asdasd33', 'asdasd@abv.bg', '$2y$10$MaP5vkltjfI83x.4J9ZRBuIUsxCFAI.IoxLt7rbfB5XJfy6phBiEy', 'IhOfFWwu9uGgEy9q2qL8kiMNByFPISWqa5a5p4hIrMH6PtMQxCbX4dcnjqaJ', '2017-02-06 16:52:21', '2017-02-06 16:53:13', 'user'),
(8, 'anotherone', 'asd@abv.bg', '$2y$10$ocecNpoiDwiT8GyQmgFgOewMriVD4Gfhnje69dRXQwv9ZHkUrnXR.', 'Fs23edU66J032hWRiZzqOzV5SZRSIMHNqjF51c1haoPmlWKUyVrxVcI3dPYa', '2017-02-06 17:09:34', '2017-02-06 17:11:41', 'user'),
(9, 'another2', 'anosad@abv.bg', '$2y$10$Wju7fhrgIjLAfQY6ZhO9vuuVSb5BERIR2TK3oyFzXw/PY0j57TgdO', 'Zjjol63wYOkvlSQ75jtzzC4KIBfKRCkwI6omCw8RWvGtnW8Q6wSmIhzXYIe0', '2017-02-06 17:12:49', '2017-02-06 17:18:13', 'user'),
(10, 'asdasdasd', 'asdaaaasd@abv.bg', '$2y$10$aSOC9io8z4rDct2PWaOk2Odpo52JPBUrvkVClhWaAmZM6IM/D.lOK', 'OnYBDIndlNEAyJ7eCAAwqLDlkUmSQEmmlFF459ZP2Wd5xlmEHoE7PPQIAOd2', '2017-02-06 17:18:28', '2017-02-06 17:19:34', 'user'),
(11, 'asdasddddd', 'asdasdadsddd@abv.bg', '$2y$10$B/9Rq4Js61ogHE8Xlth6POKgoUOZiyxtyW729bElHVViqkiVZU8PO', 'k2axP4Jvd4US7IU4mUzhJ5y8JruqcZmNjwaHzpXgF7zcPIILRXhJJbWAh2N9', '2017-02-06 17:26:11', '2017-02-06 17:28:17', 'user'),
(12, 'adsadasdsdaasdsad', 'asdsssasd@abv.bg', '$2y$10$II3s0wvBjqVoP1i/6d6oAeYePhTSiQIAlz6k/cKR.hLxhAgvXL9T6', 'BE93cHgDxuXCfU8aivORx34S8wyhj9qe8zTnoCGsnRJGWb1YX8yicegHf8ou', '2017-02-06 17:28:34', '2017-02-06 17:30:29', 'user'),
(13, 'xaxaaxxaxaxa', 'asxaxaxa@abv.bg', '$2y$10$RGN5db.646vVs42ZcRwyaOqenpAbSask0wXZZes.oyqq.CgjqkWs.', 'szGfvuUS7ILBxShcD20NCcUvEPbQ4IlHNvpH0tCGSsUwDWFrlobkyvwACgLj', '2017-02-06 17:31:10', '2017-02-06 17:32:26', 'user'),
(14, 'asdasdasdasddasasdasdasd', 'dasasdadadadad@abv.bg', '$2y$10$HDM9WG7LO9Cc0eXUwrD.FODVSHvDTWrv/U30XnbzEtSqagNurEaja', 'ctAyVEwmf1c2YuqpSmBnxCKlynL3AGXphDiQyfxhsTDq0jI8T79PkGJAXAWU', '2017-02-06 17:32:37', '2017-02-06 17:34:01', 'user'),
(15, 'xxxxxxxxxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxx@abv.bg', '$2y$10$mUO7KvSCO81KQ4tbnXU3h.LrbsCviL2cNXnFnGIz6nMAoSpWW1eSG', '1L4ZLBj1ESlMGgYLpObBe48oKdEOyeTx9A95THpcsnZoTl35JBEE4CilO3AI', '2017-02-06 17:34:23', '2017-02-06 17:34:28', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cm_movies`
--
ALTER TABLE `cm_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
