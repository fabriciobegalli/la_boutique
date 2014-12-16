-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 16 2014 г., 04:09
-- Версия сервера: 5.6.19-log
-- Версия PHP: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `la_boutique`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `measureUnits` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryIdCategory` (`id`),
  KEY `attribute_ibfk_1` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `attribute`
--

INSERT INTO `attribute` (`id`, `categoryId`, `name`, `measureUnits`) VALUES
(5, 2, 'Diameter', 'cm'),
(6, 2, 'Type', ''),
(7, 3, 'Size', ''),
(9, 3, 'Color', ''),
(10, 1, 'Size', ''),
(11, 1, 'Type', '');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Hats'),
(3, 'Jackets'),
(1, 'Skirts');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` decimal(11,0) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `useriduser` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `userId`, `date`, `cost`, `completed`) VALUES
(13, 2, '2014-12-08 17:18:35', '2000', 1),
(14, 2, '2014-12-08 17:19:53', '2000', 0),
(16, 2, '2014-12-09 00:12:52', '1500', 0),
(17, 2, '2014-12-09 00:14:49', '1000', 0),
(18, 2, '2014-12-09 00:15:47', '1000', 0),
(19, 4, '2014-12-15 21:38:21', '1000', 1),
(20, 4, '2014-12-16 00:31:37', '50', 0),
(21, 4, '2014-12-16 00:35:47', '1000', 0),
(22, 9, '2014-12-16 04:03:57', '2525', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orderlistitem`
--

CREATE TABLE IF NOT EXISTS `orderlistitem` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` decimal(11,0) NOT NULL,
  PRIMARY KEY (`orderId`,`productId`),
  KEY `keyProductId` (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderlistitem`
--

INSERT INTO `orderlistitem` (`orderId`, `productId`, `quantity`, `cost`) VALUES
(19, 10, 1, '1000'),
(20, 8, 2, '25'),
(21, 10, 1, '1000'),
(22, 8, 1, '25'),
(22, 10, 1, '1000'),
(22, 12, 1, '1500');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryIdCategory` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `quantity`, `photo`, `categoryId`) VALUES
(8, 'Cool hat', 'Cool hat for cool guys', '25', 10, 'web/files/9477_db_file_img_35_640xauto.jpg', 2),
(9, 'Red jacket', 'Ideal for lazy men.', '500', 10, 'web/files/8156_db_file_img_39_640xauto.jpg', 3),
(10, 'White skirt', 'White skirt for girls.', '1000', 15, 'web/files/7405_db_file_img_43_640xauto.jpg', 1),
(12, 'Blue jacket', 'Blue jacket for true gentleman.', '1500', 10, 'web/files/7674_db_file_img_155_640xauto.jpg', 3),
(13, 'Black skirt', 'Black skirt for women.', '1250', 10, 'web/files/851_db_file_img_138_640xauto.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `productAttributes`
--

CREATE TABLE IF NOT EXISTS `productAttributes` (
  `productId` int(11) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `value` varchar(20) NOT NULL,
  PRIMARY KEY (`productId`,`attributeId`),
  KEY `attributeIdAttribute` (`attributeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productAttributes`
--

INSERT INTO `productAttributes` (`productId`, `attributeId`, `value`) VALUES
(8, 5, ' 20'),
(8, 6, 'Common'),
(9, 7, ' Medium'),
(9, 9, 'Red and yellow '),
(10, 10, ' Medium'),
(10, 11, 'Free-style'),
(12, 7, ' Medium'),
(12, 9, 'Blue and white'),
(13, 10, ' Small'),
(13, 11, ' Non official');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `registretionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `registretionDate`) VALUES
(1, 'user', 'user@example.com', '1234567890', '5ce7244151ec1eacfaf07a4991d1f611', '2014-12-10 14:00:00'),
(2, 'Вася Петечкин', 'test@example.com', '789789', '098f6bcd4621d373cade4e832627b4f6', '2014-12-11 11:50:40'),
(4, 'Dmitry Bekuzarov', 'dima95kh@gmail.com', '+380985789346', '5ce7244151ec1eacfaf07a4991d1f611', '2014-12-11 14:57:39'),
(5, 'Вова Иванов', 'dima95kh2@gmail.com', '+380985789346', '5ce7244151ec1eacfaf07a4991d1f611', '2014-12-11 18:44:02'),
(6, 'Vova Vovancheg', 'dima95kh5@gmail.com', '+380985789346', '5ce7244151ec1eacfaf07a4991d1f611', '2014-12-11 18:48:22'),
(9, 'Ivan Ivanov', 'ivan@gmail.com', '+380985556677', '416b69ce0b706e26442e41ca51fff5ec', '2014-12-16 01:20:14');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `attribute_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orderlistitem`
--
ALTER TABLE `orderlistitem`
  ADD CONSTRAINT `orderlistitem_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderlistitem_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `productAttributes`
--
ALTER TABLE `productAttributes`
  ADD CONSTRAINT `productAttributes_ibfk_2` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productAttributes_ibfk_3` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
