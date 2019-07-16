-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 16 2019 г., 14:53
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `articals`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articals`
--

CREATE TABLE `articals` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_roman_ci NOT NULL,
  `text` mediumtext COLLATE utf8_roman_ci NOT NULL,
  `tagId` int(11) NOT NULL,
  `time_create` int(11) NOT NULL,
  `time_update` int(11) NOT NULL,
  `slug` varchar(64) COLLATE utf8_roman_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `articals`
--

INSERT INTO `articals` (`id`, `title`, `text`, `tagId`, `time_create`, `time_update`, `slug`, `created_by`, `updated_by`) VALUES
(1, 'Today', 'What day is it today. It s monday today. It\'s cool.new2321', 6, 10, 1563181779, 'today', 1, 2),
(2, 'Yesterday', 'What was day yesterday. It was sunday yesterday.', 7, 0, 1562941850, 'yesterday', 1, 1),
(3, 'Our daily routing', 'Our daily routing', 7, 1562678327, 1563184276, 'our-daily-routing', 1, 2),
(4, 'Our daily routing tomorrow', 'Our daily routing tomorrow', 7, 1562678649, 1562683748, 'our-daily-routing-tomorrow', 1, 1),
(5, 'Our daily routing tomorrow', 'Our daily routing tomorrow', 7, 1562678683, 1562683781, 'our-daily-routing-tomorrow', 1, 1),
(6, 'Our daily routing day by day', 'Our daily routing day by day', 7, 1562679216, 1562756391, 'our-daily-routing-day-by-day', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `art_tags`
--

CREATE TABLE `art_tags` (
  `id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` mediumtext COLLATE utf8_roman_ci NOT NULL,
  `articals_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `time_create` int(11) DEFAULT NULL,
  `time_update` int(11) DEFAULT NULL,
  `parrent_comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `comment`, `articals_id`, `created_by`, `updated_by`, `time_create`, `time_update`, `parrent_comment_id`) VALUES
(1, 'It is very good story. SNX', 3, 1, 1, 1562765244, 1562767212, NULL),
(2, 'WWWWWWAU!!!!!', 2, 1, 1, 1562766828, 1562766828, NULL),
(3, 'UHHHHHU!!!', 3, 1, 1, 1562767233, 1562767233, NULL),
(6, 'ssss', 3, 1, 1, 1563198366, 1563198366, NULL),
(7, 'asdasd', 2, 1, 1, 1563198774, 1563198774, NULL),
(11, '11', 2, 4, 4, 1563200010, 1563200010, NULL),
(12, '151', 2, 4, 4, 1563200019, 1563200019, NULL),
(13, 'wau', 1, 4, 4, 1563200041, 1563200041, NULL),
(14, 'it\'s cool\r\n', 4, 4, 4, 1563265340, 1563265340, NULL),
(15, 'it\'s very cool\r\n', 4, 4, 4, 1563265350, 1563265350, NULL),
(16, 'it\'s very cool\r\n', 4, 4, 4, 1563265379, 1563265379, NULL),
(17, 'it\'s very cool\r\n', 4, 4, 4, 1563266388, 1563266388, NULL),
(18, 'it\'s very cool\r\n', 4, 4, 4, 1563266480, 1563266480, NULL),
(19, 'it\'s very cool\r\n', 4, 4, 4, 1563266522, 1563266522, NULL),
(20, 'it\'s very cool\r\n', 4, 4, 4, 1563266575, 1563266575, NULL),
(21, 'it\'s very cool\r\n', 4, 4, 4, 1563266790, 1563266790, NULL),
(28, 'КОММЕНТ', 1, 4, 4, 1563276539, 1563276539, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_roman_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1562577848),
('m130524_201442_init', 1562577853),
('m190124_110200_add_verification_token_column_to_user_table', 1562577854),
('m190710_102635_create_comment_table', 1562757488),
('m190710_112935_add_updated_by_column_to_articals_table', 1562758202),
('m190715_094214_add_parrent_comment_id_column_to_comment_table', 1563183746);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tags` varchar(64) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `tags`) VALUES
(6, 'day'),
(7, 'tomorrow');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_roman_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_roman_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_roman_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'vEQYhEZLzqA10UaGVWFuj0gY_dtaxy6b', '$2y$13$CDykcHEIAqrPqjnVuM0o3uy6nzQ1ukNBAN3Z0uDD1o9iCUW9O49cG', NULL, 'rasev108@gmail.com', 10, 1562581057, 1562581057, 'X1gu9dufsItiIEL9XAaMBiX5zI78TDpd_1562581057'),
(2, 'admin2', 'vFJCm-yB0i94ok1YMUpRTzkDZxTlUAU4', '$2y$13$X2p.qwzMrTUqh5t/1PtwUeTi3e6RqkGnsitm93bwmumdPXTkL6sY6', NULL, 'a@a.com', 10, 1562666279, 1562666279, '7Fpyc6cln_xV7YIS7HzXkT673dAVmdwN_1562666279'),
(3, 'seer', '8cD_AC1AjfVQR7SGWI1K4CgSLfkVGU0-', '$2y$13$AY5iGtZETqWs6UXNEaAJw.sNdl9VYhqZFYB0dwp5CRjYIBt7HKhHm', NULL, 'tft@a.com', 10, 0, 0, 'K2ibLFlbZFjEcJAQmcU8yO4qmIR8q78A_1563198740'),
(4, 'serj', 'R84t0LWQZoV1ip6EUd4ws3szMIl20yuM', '$2y$13$hItb4pJZwHme384yBBxt6uAKBLpXXjXP3ZU4I87wwsqH7DjMXBzf2', NULL, 'se@ya.ru', 10, 0, 0, 'GEff17gDhp-GM2lqpxu2GEv1qzXiKmte_1563199455');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articals`
--
ALTER TABLE `articals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articals_ibfk_1` (`tagId`),
  ADD KEY `idx-articals-created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Индексы таблицы `art_tags`
--
ALTER TABLE `art_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `art_id` (`art_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-comment-articals_id` (`articals_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `idx-comment-parrent_comment_id` (`parrent_comment_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articals`
--
ALTER TABLE `articals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `art_tags`
--
ALTER TABLE `art_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articals`
--
ALTER TABLE `articals`
  ADD CONSTRAINT `articals_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `articals_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `art_tags`
--
ALTER TABLE `art_tags`
  ADD CONSTRAINT `art_tags_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `articals` (`id`),
  ADD CONSTRAINT `art_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk-comment-articals_id` FOREIGN KEY (`articals_id`) REFERENCES `articals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-comment-parrent_comment_id` FOREIGN KEY (`parrent_comment_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
