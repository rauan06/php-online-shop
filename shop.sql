-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2021 г., 19:32
-- Версия сервера: 5.7.29
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `CATEGORIES_ID` int(5) NOT NULL,
  `NAME` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`CATEGORIES_ID`, `NAME`) VALUES
(1, 'mens'),
(2, 'womens'),
(3, 'accessories');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(5) NOT NULL,
  `ADDRESS` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATE` date NOT NULL,
  `STATUS` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `ADDRESS`, `DATE`, `STATUS`, `USER_ID`) VALUES
(29, '24 Jetysuiskaya str.', '2021-12-11', 'Processing', 14),
(30, 'Nur-Sultan', '2021-12-11', 'Processing', 10),
(31, 'Shymkent', '2021-12-12', 'Processing', 10),
(32, 'Shymkent, 145-3', '2021-12-12', 'Processing', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `order_details`
--

CREATE TABLE `order_details` (
  `ORDER_DETAILS_ID` int(5) NOT NULL,
  `ORDER_ID` int(5) NOT NULL,
  `PRODUCT_ID` int(5) NOT NULL,
  `PRICE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QUANTITY` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_details`
--

INSERT INTO `order_details` (`ORDER_DETAILS_ID`, `ORDER_ID`, `PRODUCT_ID`, `PRICE`, `QUANTITY`) VALUES
(24, 29, 10, '15', '1'),
(25, 29, 17, '185', '5'),
(26, 29, 14, '120', '1'),
(27, 30, 17, '185', '1'),
(28, 30, 16, '145', '1'),
(29, 30, 22, '10', '1'),
(30, 31, 20, '3000', '4'),
(31, 31, 14, '120', '1'),
(32, 32, 13, '15', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` int(5) NOT NULL,
  `NAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRICE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IMAGE` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CATEGORY` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CREATE_DATE` date NOT NULL,
  `DESCRIPTION` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `NAME`, `PRICE`, `IMAGE`, `CATEGORY`, `CREATE_DATE`, `DESCRIPTION`) VALUES
(10, 'Socks', '15', 'IMG-61b34ef09dda90.27975808.jpg', '1', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(13, 'FRA - Pink Short sports socks', '15', 'IMG-61b3502bbb4c42.26812906.jpg', '2', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(14, 'HUC - Black Sports bag', '120', 'IMG-61b350a14a9fb2.31960544.jpg', '3', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(15, 'Lightweight knitted jumper', '90', 'IMG-61b3516a4e29d7.19052061.jpg', '1', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(16, 'Black Rodeo+M Jeans', '145', 'IMG-61b3521051d154.87792454.jpg', '2', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(17, 'Plain lightweight jersey jumper', '185', 'IMG-61b3528c786055.21511803.jpg', '2', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(18, 'New Black Sweater', '160', 'IMG-61b352ae2b6848.35215668.jpg', '2', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(20, 'Royal watches', '3000', 'IMG-61b3533359b411.89727043.jpg', '3', '2021-12-10', '<b>Material:</b> Fabric cotton blend.<br>\r\n<b>Features:</b> Blinking detail.<br>\r\n<b>Desighn option:</b> Nasal suture.<br><br>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(22, 'Black Bandana', '10', 'IMG-61b4a72c32e6f8.82241293.jpg', '3', '2021-12-11', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `USER_ID` int(5) NOT NULL,
  `USER_NAME` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PHONE` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASS` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ROLE` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAME`, `PHONE`, `PASS`, `ROLE`) VALUES
(10, 'Rauan', '1', '$2y$10$DNPzgXCc5pqtnjH0MRmEdOC7eOyobsTVB6VC2BV4cPwDLAf5kdB8C', 'admin'),
(11, 'Rauan', '87777777777', '$2y$10$CqpMf1uy.Ky6.nD.uRlJJeeLKGljCQ8sXs3aib5VL5P7M8BbDYtzG', 'user'),
(12, 'Ruslan', '87719987917', '$2y$10$z1nCxqwIvn57McHm0hTZmOmonHTPGYq70lvDyD2zJYIXh7tVwZxjS', 'admin'),
(14, 'Kamila', '2', '$2y$10$fBMpCysNq29GCyYwVOfigOQnpefxJqe41BDaJGPSdw9Lz.xaIBaMK', 'user'),
(15, 'Name', '87719987919', '$2y$10$2nODL.m8hH5m8DcCJjfdsum950QJfBeCtCzpAF7vDXOyVws/RNA8u', 'user'),
(16, 'Sara', '123456789', '$2y$10$B0Y3w1RaqMa1vCZiRX/ZsO8iFVh7ey.A0nVIJfY7omCeBqrY.Bvwi', 'user'),
(17, 'Adiya', '87015967690', '$2y$10$.s5c6dCM3rcnWVJPBfnoKeSXU4Y.Mjvr.HtIT6gV3V.B87dwkoN02', 'user'),
(18, 'Zukhra', '1234', '$2y$10$6PKvkfTfYpNlYqXIiKwBouNn4SAll/hCOtjzLUrADymcwJhY9h7IG', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CATEGORIES_ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Индексы таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ORDER_DETAILS_ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `CATEGORIES_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ORDER_DETAILS_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
