-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Апр 04 2023 г., 09:00
-- Версия сервера: 5.7.39
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `abcTest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product` varchar(30) NOT NULL,
  `amount` int(10) NOT NULL,
  `cost` decimal(16,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `supplies`
--

INSERT INTO `supplies` (`id`, `code`, `product`, `amount`, `cost`, `date`) VALUES
(1, '1', 'Колбаса', 300, '5000.00', '2021-01-01'),
(2, 't-500', 'Пармезан', 10, '6000.00', '2021-01-02'),
(3, '12-TP-777', 'Левый носок', 100, '500.00', '2021-01-13'),
(4, '12-TP-778', 'Левый носок', 50, '300.00', '2021-01-14'),
(5, '12-TP-779', 'Левый носок', 77, '539.00', '2021-01-20'),
(6, '12-TP-877', 'Левый носок', 32, '176.00', '2021-01-30'),
(7, '12-TP-977', 'Левый носок', 94, '554.00', '2021-02-01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
