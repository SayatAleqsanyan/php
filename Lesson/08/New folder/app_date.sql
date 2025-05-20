-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Апр 30 2025 г., 19:52
-- Версия сервера: 8.0.41
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `app_date`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_img`
--

CREATE TABLE `db_img` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `db_img`
--

INSERT INTO `db_img` (`id`, `name`, `user_id`, `add_date`) VALUES
(1, '680e36c37dd39.png', 4, '2025-04-27 17:53:07');

-- --------------------------------------------------------

--
-- Структура таблицы `forum`
--

CREATE TABLE `forum` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `meseg` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `forum`
--

INSERT INTO `forum` (`id`, `user_id`, `meseg`, `time`) VALUES
(1, 4, 'sdfasfd', '2025-04-25 12:58:45'),
(2, 4, 'sdfasfd', '2025-04-25 13:01:42'),
(3, 4, 'sdfasfd', '2025-04-25 13:01:54'),
(4, 4, 'sdfasfd', '2025-04-25 13:02:12'),
(5, 4, 'sdfasfd', '2025-04-25 13:02:15'),
(6, 4, 'sdfasfd', '2025-04-25 13:03:16'),
(7, 1, 'sasdadcsafda', '2025-04-25 13:03:46'),
(8, 1, '<script>alert(111)</script>', '2025-04-25 13:04:30'),
(9, 1, '<script >alert(\"Hello\");</script>', '2025-04-25 13:05:21'),
(10, 1, 'sdfasfda', '2025-04-25 13:38:52'),
(11, 1, 'fdafdas', '2025-04-25 13:38:53'),
(12, 1, 'fdasfdsa', '2025-04-25 13:38:54'),
(13, 1, 'sdfafdas', '2025-04-25 13:38:56'),
(14, 1, 'fdsafdsa', '2025-04-25 13:38:59'),
(15, 1, 'fdsafda', '2025-04-25 13:39:00'),
(16, 1, 'dsfaf', '2025-04-25 13:41:52'),
(17, 1, 'դսֆսադֆ', '2025-04-25 13:43:38'),
(18, 1, 'դֆսաֆդսա', '2025-04-25 13:43:41'),
(19, 1, 'sdfsafd', '2025-04-25 13:46:09'),
(20, 1, 'sdafas', '2025-04-25 13:46:11'),
(21, 1, 'սդֆաֆդս', '2025-04-25 14:09:25'),
(22, 4, 'safasfdas', '2025-04-25 16:19:20'),
(23, 4, 'ֆսդգֆս', '2025-04-25 20:27:08'),
(24, 4, 'hfghfsd', '2025-04-27 17:40:34'),
(25, 4, 'dfasfasf', '2025-04-29 19:00:22');

-- --------------------------------------------------------

--
-- Структура таблицы `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int NOT NULL,
  `from_id` int NOT NULL,
  `to_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `from_id`, `to_id`, `status`, `created_at`) VALUES
(39, 4, 11, 2, '2025-04-30 18:34:26'),
(40, 4, 6, 2, '2025-04-30 19:00:42'),
(41, 4, 3, 0, '2025-04-30 19:01:08'),
(42, 6, 1, 0, '2025-04-30 19:33:40'),
(43, 6, 2, 0, '2025-04-30 19:33:42'),
(44, 4, 1, 2, '2025-04-30 19:41:27'),
(45, 6, 3, 0, '2025-04-30 19:41:48'),
(46, 6, 10, 0, '2025-04-30 19:41:54'),
(47, 6, 9, 0, '2025-04-30 19:41:59'),
(48, 6, 5, 0, '2025-04-30 19:42:05'),
(49, 6, 7, 2, '2025-04-30 19:42:09'),
(50, 6, 13, 2, '2025-04-30 19:42:17'),
(51, 6, 21, 2, '2025-04-30 19:42:23'),
(52, 6, 24, 2, '2025-04-30 19:42:27'),
(53, 7, 4, 2, '2025-04-30 19:45:44'),
(54, 7, 1, 2, '2025-04-30 19:46:01');

-- --------------------------------------------------------

--
-- Структура таблицы `test_users`
--

CREATE TABLE `test_users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `login` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `test_users`
--

INSERT INTO `test_users` (`id`, `email`, `login`, `pass`) VALUES
(1, 'Ml2bA@exa.com', 'Sayad', 'ssss'),
(2, 'armdon9899@gmail.com', 'adsgasdga', 'ssss'),
(3, 'test1234@sss.gg', 'ddsds', 'ssss'),
(4, 'test12345@sss.gg', 'sayat1', 'ssss'),
(5, 'saddfsaf@mail.ru', 'sayat2', 'ssss'),
(6, 'sadad@fsdf.ry', 'sayat11', 'ssss'),
(7, 'sadasd@fsdf.ry', 'sayat111', 'dddd'),
(8, 'saddffassaf@mail.ru', 'sayat1111', 'ssss'),
(9, 'Mlsdafa2bA@example.com', 'sayat1g', 'ssss'),
(10, 'Ml2dsfadsabA@example.com', 'sayat1asda', 'ssss'),
(11, 'Msadfasfl2bA@example.com', 'sayat123456', 'ssss'),
(12, 'Ml2dsfasfdabA@example.com', 'sayat1sada', 'ssss'),
(13, 'Mlfasfas2bA@example.com', 'sayat154', 'ssss'),
(14, 'fasfdaMl2bA@example.com', 'sayat1ewrqw', 'ssss'),
(15, 'armdonsfda9899@gmail.com', 'sayat1sdfa', 'ssss'),
(16, 'Ml2sbA@example.com', 'sayat1s', 'ssss'),
(17, 'Mssl2bA@example.com', 'sayat1ss', 'ssss'),
(18, 'Ml2sdfasfdabA@example.com', 'sayatsadsa', 'ssss'),
(20, 'Mlss2bA@example.com', 'sayat55', 'ssss'),
(21, 'Mldss2bA@example.com', 'sayat1sssa', 'ssss'),
(22, 'aMsl2bA@ex.com', 'saysat1', 'ssss'),
(23, 'saad@fsf.ry', 'asayat1', 'ssss'),
(24, 'Ml2srgbA@epe.com', 'saydaat1', 'ssss');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` char(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `additional` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `birth_date`, `gender`, `additional`) VALUES
(1, 'sayad.aleksanyan@mail.ru', 'Ssss5555#', 'Sayat', 'Aleqsanyan', '1998-06-17', 'male', 'web developer');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `db_img`
--
ALTER TABLE `db_img`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `neme` (`name`);

--
-- Индексы таблицы `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `from_id` (`from_id`,`to_id`);

--
-- Индексы таблицы `test_users`
--
ALTER TABLE `test_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `db_img`
--
ALTER TABLE `db_img`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `test_users`
--
ALTER TABLE `test_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
