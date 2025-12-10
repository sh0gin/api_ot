-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 09 2025 г., 13:33
-- Версия сервера: 8.0.36-0ubuntu0.20.04.1
-- Версия PHP: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `idrkibzg_m3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `number_sertificat`
--

CREATE TABLE `number_sertificat` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `clientId` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `number_sertificat`
--

INSERT INTO `number_sertificat` (`id`, `student_id`, `course_id`, `number`, `clientId`) VALUES
(2, 1, 1, 'pJZApX', 'login@login123'),
(3, 9, 1, 'KcBxdE', 'login@login123'),
(4, 9, 3, 'j4NygU', 'login@login123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `number_sertificat`
--
ALTER TABLE `number_sertificat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `number_sertificat`
--
ALTER TABLE `number_sertificat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
