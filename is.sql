-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2015 г., 01:50
-- Версия сервера: 5.5.35-log
-- Версия PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `is`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `key`, `name`) VALUES
(1, 'main', 'Головне');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned NOT NULL,
  `item_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `position` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hash_id` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `hash_id`, `login`, `password`, `role`, `created`) VALUES
(1, '2dff61354ff9c350000f96125923fada', 'admin', '$2a$10$jegULAunOvGmkz3ePNg1EeWYLRI5nyRjHd5FCGilSsgcOCgdj4fv.', 'admin', '2015-02-21 01:12:17'),
(2, 'd3710069dc6c7821c979fe03d7ff4052', 'user', '$2a$10$wYGGboD.z9oak/daDcEhaOdcAE/7pE8lcqlUsz54LG7ezgIu87K1a', 'user', '2015-02-21 01:17:51'),
(3, '7b7ee135af82cf07008b208d296d27aa', 'moder', '$2a$10$2kr1dwvUFYFZg9FoB0NFkehsp9fMX86z5dEFDZH670Lu2muWl01i.', 'moder', '2015-02-21 01:18:05'),
(4, '22273e3265e384d86fa7fd0c9c9309d2', 'guest', '$2a$10$mkhhMGG011gVi/ll54UakeuxJ4J7iioDf1xZoIgqMnBhDrwVe0RTK', 'guest', '2015-02-21 01:18:16');

-- --------------------------------------------------------

--
-- Структура таблицы `users_information`
--

CREATE TABLE IF NOT EXISTS `users_information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(500) DEFAULT NULL,
  `content` text,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users_information`
--

INSERT INTO `users_information` (`id`, `user_id`, `email`, `name`, `contact`, `content`, `modified`) VALUES
(1, 1, NULL, NULL, NULL, NULL, '2015-02-21 01:12:17'),
(2, 2, NULL, NULL, NULL, NULL, '2015-02-21 01:17:51'),
(3, 3, NULL, NULL, NULL, NULL, '2015-02-21 01:18:05'),
(4, 4, NULL, NULL, NULL, NULL, '2015-02-21 01:18:16');

-- --------------------------------------------------------

--
-- Структура таблицы `users_resend_password`
--

CREATE TABLE IF NOT EXISTS `users_resend_password` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `hash` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hash_id` (`hash`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_information`
--
ALTER TABLE `users_information`
  ADD CONSTRAINT `users_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_resend_password`
--
ALTER TABLE `users_resend_password`
  ADD CONSTRAINT `users_resend_password_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
