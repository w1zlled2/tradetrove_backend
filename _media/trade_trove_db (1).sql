-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 12 2024 г., 19:59
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `trade_trove_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_category_id`) VALUES
(1, 'Компьютеры', NULL),
(2, 'Автотранспорт', NULL),
(6, 'Видеокарты', 9),
(9, 'Комплектующие', 1),
(10, 'Офисные', 1),
(12, 'Игровые', 1),
(13, 'Процессоры', 9),
(14, 'Автомобили', 2),
(15, 'Мотоциклы', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `complaints`
--

INSERT INTO `complaints` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2024-02-09 00:35:09', '2024-02-09 00:35:09'),
(21, 1, 1, '2024-02-11 22:41:54', '2024-02-11 22:41:54');

-- --------------------------------------------------------

--
-- Структура таблицы `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `conditions`
--

INSERT INTO `conditions` (`id`, `name`, `code`) VALUES
(1, 'Новое', 'new'),
(2, 'Бывшее в употреблении', 'used');

-- --------------------------------------------------------

--
-- Структура таблицы `connect_types`
--

CREATE TABLE `connect_types` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `connect_types`
--

INSERT INTO `connect_types` (`id`, `name`, `code`) VALUES
(1, 'Звонки и сообщения', 'calls_messages'),
(2, 'Только сообщения', 'messages'),
(3, 'Только звонки', 'calls');

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `file_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `post_id`, `file_id`, `user_id`, `extension`, `created_at`, `updated_at`) VALUES
(1, 44, 'H6uKQxWucHt8SntjyKFyzVZzAMibQ9', 3, 'PNG', '2024-04-12 14:37:48', '2024-04-12 14:37:48'),
(2, 44, 'LZGGQwmoEAEzJ9pwaQC9uW8W66c7it', 3, 'JPG', '2024-04-12 14:37:48', '2024-04-12 14:37:48'),
(3, 48, 'WDKIzOEnsAfSnjYPOaofQFwtZ0Wuv8', 3, 'PNG', '2024-04-12 14:46:44', '2024-04-12 14:46:44'),
(4, 50, 'g0N158gNp5lbuH0SHJh1Sm35ddrjrE', 3, 'PNG', '2024-04-12 14:46:59', '2024-04-12 14:46:59'),
(5, 51, 'ndsiM5MFCY5g9ZYljcO4gaDpgBEV2M', 3, 'PNG', '2024-04-12 14:49:39', '2024-04-12 14:49:39'),
(6, 51, 'YNHBK0jYh7RNhOByKirGrNSXuCbLtx', 3, 'JPG', '2024-04-12 14:49:39', '2024-04-12 14:49:39'),
(7, 52, 'Tu8i2HbF5BIU6xOpZjx7y5okUUcurh', 3, 'PNG', '2024-04-12 14:52:50', '2024-04-12 14:52:50'),
(8, 52, 'E5cYahGbMQmEFSPm8OOQvP5MyTHY8o', 3, 'JPG', '2024-04-12 14:52:50', '2024-04-12 14:52:50'),
(9, 53, 'nmJW5zcWbChbMQtLJOdDI3dzC3aPca', 3, 'PNG', '2024-04-12 15:20:41', '2024-04-12 15:20:41'),
(10, 54, 'FzFc0t3IBu7ob20hAqF4yEhqCESFnM', 3, 'PNG', '2024-04-12 15:21:40', '2024-04-12 15:21:40'),
(11, 62, 'hpSnOyoJREeLROfnxZyO0PaogqPWcW', 3, 'PNG', '2024-04-12 17:41:46', '2024-04-12 17:41:46'),
(12, 66, '1HSuGTdwg7jZ7GMei6yEbvIr0YBSrG', 3, 'PNG', '2024-04-12 17:43:14', '2024-04-12 17:43:14');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `condition_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `connect_type_id` tinyint(4) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `category_id`, `user_id`, `address`, `price`, `condition_id`, `status_id`, `connect_type_id`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Компьютер Ryzen 5500, RTX 2060s', 'Продам новый компьютер в идеальном состоянии', 1, 2, 'Асбест, Ладыженского 7', 50000, 1, 1, 1, NULL, NULL, NULL),
(2, 'Компьютер Intel 13400f, RTX 4070', 'Продам новый компьютер в идеальном состоянии', 1, 2, 'Асбест, Мира 2', 120000, 1, 1, 1, NULL, NULL, NULL),
(41, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:31:06', '2024-04-12 14:31:06'),
(42, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:32:03', '2024-04-12 14:32:03'),
(43, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:34:55', '2024-04-12 14:34:55'),
(44, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:37:48', '2024-04-12 14:37:48'),
(45, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:40:04', '2024-04-12 14:40:04'),
(46, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:45:20', '2024-04-12 14:45:20'),
(47, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:45:29', '2024-04-12 14:45:29'),
(48, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:46:44', '2024-04-12 14:46:44'),
(49, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:46:52', '2024-04-12 14:46:52'),
(50, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 3, 3, NULL, '2024-04-12 14:46:59', '2024-04-12 14:46:59'),
(51, 'Какая-то видеокарта', 'Продам свою любимую видеокарту. Играл на ней 2 года', 6, 3, NULL, 16000, 2, 3, 2, NULL, '2024-04-12 14:49:39', '2024-04-12 14:49:39'),
(52, 'Какая-то видеокарта', 'Продам свою любимую видеокарту. Играл на ней 2 года', 6, 3, 'Свердловская обл, г Асбест, ул Чайковского, д 14', 16000, 2, 2, 2, NULL, '2024-04-12 14:52:50', '2024-04-12 14:52:50'),
(53, 'название объявления', 'описание объявления', 13, 3, 'Свердловская обл, г Асбест, ул Мира, д 2', 12424, 2, 2, 3, NULL, '2024-04-12 15:20:41', '2024-04-12 15:20:41'),
(54, 'Название объявления', 'Описание объявления', 13, 3, 'Свердловская обл, г Асбест, ул Мира, д 3', 2352352, 2, 2, 2, NULL, '2024-04-12 15:21:40', '2024-04-12 15:21:40'),
(55, 'asd', 'asd', 6, 3, 'Свердловская обл, г Асбест, ул Чайковского', 0, 1, 2, 2, NULL, '2024-04-12 17:08:06', '2024-04-12 17:08:06'),
(56, 'asd', 'asd', 6, 3, 'asd', 0, 1, 2, 2, NULL, '2024-04-12 17:09:06', '2024-04-12 17:09:06'),
(57, 'asd', 'asd', 13, 3, 'asd', 0, 1, 2, 2, NULL, '2024-04-12 17:20:56', '2024-04-12 17:20:56'),
(58, 'asd', 'asd', 6, 3, 'asd', 0, 1, 2, 1, '+7 (213) 434-74-56', '2024-04-12 17:23:41', '2024-04-12 17:23:41'),
(59, 'asd', 'asd', 13, 3, 'asd', 0, 1, 2, 2, NULL, '2024-04-12 17:23:50', '2024-04-12 17:23:50'),
(62, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 2, 2, NULL, '2024-04-12 17:41:46', '2024-04-12 17:41:46'),
(66, 'Title', 'Desc', 1, 3, 'Address', 100, 1, 2, 3, '123', '2024-04-12 17:43:14', '2024-04-12 17:43:14'),
(67, 'asd', 'asd', 6, 3, 'asd', 0, 1, 2, 2, NULL, '2024-04-12 17:45:47', '2024-04-12 17:45:47'),
(68, 'dsa', 'dsa', 10, 3, 'das', 0, 1, 3, 2, NULL, '2024-04-12 17:46:13', '2024-04-12 17:46:13'),
(69, 'dsfg', 'sdfg', 10, 3, 'tyjh', 0, 1, 3, 2, NULL, '2024-04-12 17:47:37', '2024-04-12 17:47:37'),
(70, 'asd', 'gterd', 12, 3, 'iuyo9', 0, 1, 2, 2, NULL, '2024-04-12 17:48:07', '2024-04-12 17:48:07'),
(71, 'sdfg', 'sdfg', 10, 3, 'rwedrstgrrtyu', 0, 1, 3, 2, NULL, '2024-04-12 17:48:15', '2024-04-12 17:48:15'),
(72, 'ука', 'рпке', 10, 3, 'фыв', 0, 1, 3, 2, NULL, '2024-04-12 17:48:56', '2024-04-12 17:48:56');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `code`) VALUES
(1, 'Администратор', 'admin'),
(2, 'Модератор', 'moderator'),
(3, 'Пользователь', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Опубликован'),
(2, 'На модерации'),
(3, 'Черновик');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `publishing_banned` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `api_token`, `publishing_banned`, `created_at`, `updated_at`) VALUES
(1, 'Игорь', 'Петров', 'moderator@gmail.com', '$2y$12$EwbxlnsXsZbxpsUqFjJO3uVUreqkHTUSFK1xFrnfA7i3BS0NJmLKO', 2, 'xt5gZdytLnPbCWqX521AXCvb6', 0, NULL, '2024-04-05 06:52:21'),
(2, 'Виталий', 'Филин', 'admin@gmail.com', '$2y$12$iuTnfQi2ZJaB/PVIY8MbKeI7PqC4fqa/bKo0deyKuQtPk0NaNIRem', 1, NULL, 0, NULL, '2024-04-12 17:59:15'),
(3, 'Иван', 'Малыхин', 'user@gmail.com', '$2y$12$dmllponK3QUuPQIlq409.eFPGuYdFhXj747ZgNOc6ukX443Rs06wO', 3, '1P6X0tYrl08oIUoBsiGIYEHAl', 0, NULL, '2024-04-12 17:59:21'),
(27, 'user', 'user', 'user1@gmail.com', '$2y$12$dsHSrdo9W1mMo1.fIkA3t.TeJDeHJAw2.njWNupmq3einyna13t.m', 3, NULL, 0, '2024-04-05 19:22:21', '2024-04-05 20:12:56'),
(28, 'ad', 'asd', 'asdf@f', '$2y$12$i7stKfrDFO.lOCR5GxPleefEO5pDUxDCy3oC19PjD0hjF.hcN.0UO', 3, NULL, 0, '2024-04-12 16:53:57', '2024-04-12 16:53:57');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Индексы таблицы `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `connect_types`
--
ALTER TABLE `connect_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_ibfk_1` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `condition_id` (`condition_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `connect_type_id` (`connect_type_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `connect_types`
--
ALTER TABLE `connect_types`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`condition_id`) REFERENCES `conditions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_5` FOREIGN KEY (`connect_type_id`) REFERENCES `connect_types` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
