-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 15 2022 г., 03:00
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `financemanager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `CATEGORY_ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`CATEGORY_ID`, `NAME`, `DESCRIPTION`) VALUES
(2, 'Харчування', 'Витрати на обіди, сніданки в закладах громадського харчування'),
(3, 'Відпочинок', 'Витрати на гулянки, походи в гори, туризм'),
(4, 'Продукти харчування', 'Витрати на продукти');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `TRANSACTION_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `TYPE_ID` int(11) NOT NULL,
  `AMOUNT` double NOT NULL,
  `TRANSACTION_DATE` date NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`TRANSACTION_ID`, `CATEGORY_ID`, `TYPE_ID`, `AMOUNT`, `TRANSACTION_DATE`, `DESCRIPTION`) VALUES
(8, 2, 2, 12, '2022-12-01', 'Шавуха'),
(9, 3, 2, 12, '2022-12-08', 'Єгипет'),
(10, 4, 2, 500, '2022-12-09', 'АТБ'),
(11, 2, 2, 90, '2022-12-15', 'Велмарт'),
(12, 3, 2, 213, '2022-12-16', 'Турція'),
(13, 4, 2, 412, '2022-12-09', 'Яблука'),
(14, 2, 2, 4432, '2022-12-16', 'Ресторан в дубаї');

-- --------------------------------------------------------

--
-- Структура таблицы `transaction_types`
--

CREATE TABLE `transaction_types` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `transaction_types`
--

INSERT INTO `transaction_types` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Дохід'),
(2, 'Витрата');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TRANSACTION_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`);

--
-- Индексы таблицы `transaction_types`
--
ALTER TABLE `transaction_types`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TRANSACTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `transaction_types`
--
ALTER TABLE `transaction_types`
  MODIFY `TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `categories` (`CATEGORY_ID`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`TYPE_ID`) REFERENCES `transaction_types` (`TYPE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
