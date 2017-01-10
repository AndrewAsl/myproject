-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.26 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица mydb.accounts
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(11) NOT NULL,
  `account_qt` decimal(10,0) DEFAULT NULL,
  `users_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  KEY `fk_accounts_users_idx` (`users_user_id`),
  CONSTRAINT `fk_accounts_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.accounts: ~0 rows (приблизительно)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.books
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(45) DEFAULT NULL,
  `book_price` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.books: ~2 rows (приблизительно)
DELETE FROM `books`;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`book_id`, `bookname`, `book_price`) VALUES
	(1, 'bookname', 20.34),
	(2, 'bookname2', 10.24);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.book_rubrics
DROP TABLE IF EXISTS `book_rubrics`;
CREATE TABLE IF NOT EXISTS `book_rubrics` (
  `br_id` int(11) NOT NULL AUTO_INCREMENT,
  `books_book_id` int(11) NOT NULL,
  `materials_material_id` int(11) NOT NULL,
  `bookrubr_title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`br_id`,`books_book_id`,`materials_material_id`),
  KEY `fk_book_rubrics_books1_idx` (`books_book_id`),
  KEY `fk_book_rubrics_materials1_idx` (`materials_material_id`),
  CONSTRAINT `fk_book_rubrics_books1` FOREIGN KEY (`books_book_id`) REFERENCES `books` (`book_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_book_rubrics_materials1` FOREIGN KEY (`materials_material_id`) REFERENCES `materials` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.book_rubrics: ~0 rows (приблизительно)
DELETE FROM `book_rubrics`;
/*!40000 ALTER TABLE `book_rubrics` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_rubrics` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.materials
DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_types_mt_id` int(11) DEFAULT NULL,
  `mat_title` varchar(45) DEFAULT NULL,
  `anons` varchar(255) DEFAULT NULL,
  `body` text,
  `in_book` tinyint(1) DEFAULT NULL,
  `material_price` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`material_id`),
  KEY `fk_materials_material_types1_idx` (`material_types_mt_id`),
  CONSTRAINT `fk_materials_material_types1` FOREIGN KEY (`material_types_mt_id`) REFERENCES `material_types` (`mt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.materials: ~0 rows (приблизительно)
DELETE FROM `materials`;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` (`material_id`, `material_types_mt_id`, `mat_title`, `anons`, `body`, `in_book`, `material_price`) VALUES
	(12, NULL, 'Title2', 'Text body2', 'Text body, much text2', NULL, 11.25),
	(13, NULL, 'Title1', 'Text body1', 'Text body, much text1', NULL, 11.25),
	(14, NULL, 'Title1', 'Text body1', 'Text body, much text1', NULL, 11.25),
	(15, NULL, 'Title5', 'Text body5', 'Text body, much text5', NULL, 11.25);
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.material_types
DROP TABLE IF EXISTS `material_types`;
CREATE TABLE IF NOT EXISTS `material_types` (
  `mt_id` int(11) NOT NULL AUTO_INCREMENT,
  `mattype_titlel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.material_types: ~0 rows (приблизительно)
DELETE FROM `material_types`;
/*!40000 ALTER TABLE `material_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_types` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.notices
DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `notice_id` int(11) NOT NULL,
  `notice_text` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.notices: ~0 rows (приблизительно)
DELETE FROM `notices`;
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;
/*!40000 ALTER TABLE `notices` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.notices_has_users
DROP TABLE IF EXISTS `notices_has_users`;
CREATE TABLE IF NOT EXISTS `notices_has_users` (
  `notices_notice_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  PRIMARY KEY (`notices_notice_id`,`users_user_id`),
  KEY `fk_notices_has_users_users1_idx` (`users_user_id`),
  KEY `fk_notices_has_users_notices1_idx` (`notices_notice_id`),
  CONSTRAINT `fk_notices_has_users_notices1` FOREIGN KEY (`notices_notice_id`) REFERENCES `notices` (`notice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notices_has_users_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.notices_has_users: ~0 rows (приблизительно)
DELETE FROM `notices_has_users`;
/*!40000 ALTER TABLE `notices_has_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `notices_has_users` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_user_id` int(11) NOT NULL,
  `data_created` date DEFAULT NULL,
  `is_payed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`users_user_id`),
  KEY `fk_orders_users1_idx` (`users_user_id`),
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.orders: ~0 rows (приблизительно)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.orders_has_books
DROP TABLE IF EXISTS `orders_has_books`;
CREATE TABLE IF NOT EXISTS `orders_has_books` (
  `orders_order_id` int(11) NOT NULL,
  `orders_users_user_id` int(11) NOT NULL,
  `books_book_id` int(11) NOT NULL,
  PRIMARY KEY (`orders_order_id`,`orders_users_user_id`,`books_book_id`),
  KEY `fk_orders_has_books_books1_idx` (`books_book_id`),
  KEY `fk_orders_has_books_orders1_idx` (`orders_order_id`,`orders_users_user_id`),
  CONSTRAINT `fk_orders_has_books_books1` FOREIGN KEY (`books_book_id`) REFERENCES `books` (`book_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_books_orders1` FOREIGN KEY (`orders_order_id`, `orders_users_user_id`) REFERENCES `orders` (`order_id`, `users_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.orders_has_books: ~0 rows (приблизительно)
DELETE FROM `orders_has_books`;
/*!40000 ALTER TABLE `orders_has_books` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_has_books` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.orders_has_materials
DROP TABLE IF EXISTS `orders_has_materials`;
CREATE TABLE IF NOT EXISTS `orders_has_materials` (
  `orders_order_id` int(11) NOT NULL,
  `orders_users_user_id` int(11) NOT NULL,
  `materials_material_id` int(11) NOT NULL,
  PRIMARY KEY (`orders_order_id`,`orders_users_user_id`,`materials_material_id`),
  KEY `fk_orders_has_materials_materials1_idx` (`materials_material_id`),
  KEY `fk_orders_has_materials_orders1_idx` (`orders_order_id`,`orders_users_user_id`),
  CONSTRAINT `fk_orders_has_materials_materials1` FOREIGN KEY (`materials_material_id`) REFERENCES `materials` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_materials_orders1` FOREIGN KEY (`orders_order_id`, `orders_users_user_id`) REFERENCES `orders` (`order_id`, `users_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.orders_has_materials: ~0 rows (приблизительно)
DELETE FROM `orders_has_materials`;
/*!40000 ALTER TABLE `orders_has_materials` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_has_materials` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.payed_period
DROP TABLE IF EXISTS `payed_period`;
CREATE TABLE IF NOT EXISTS `payed_period` (
  `payp_id` int(11) NOT NULL AUTO_INCREMENT,
  `period` tinyint(4) DEFAULT NULL,
  `start_day` date DEFAULT NULL,
  `is_trial` tinyint(1) DEFAULT NULL,
  `prices_for_pay_period_pricepp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`payp_id`),
  KEY `fk_payed_period_prices_for_pay_period1_idx` (`prices_for_pay_period_pricepp_id`),
  CONSTRAINT `fk_payed_period_prices_for_pay_period1` FOREIGN KEY (`prices_for_pay_period_pricepp_id`) REFERENCES `prices_for_pay_period` (`pricepp_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.payed_period: ~0 rows (приблизительно)
DELETE FROM `payed_period`;
/*!40000 ALTER TABLE `payed_period` DISABLE KEYS */;
/*!40000 ALTER TABLE `payed_period` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.prices_for_pay_period
DROP TABLE IF EXISTS `prices_for_pay_period`;
CREATE TABLE IF NOT EXISTS `prices_for_pay_period` (
  `pricepp_id` int(11) NOT NULL AUTO_INCREMENT,
  `period_name` varchar(25) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`pricepp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.prices_for_pay_period: ~0 rows (приблизительно)
DELETE FROM `prices_for_pay_period`;
/*!40000 ALTER TABLE `prices_for_pay_period` DISABLE KEYS */;
/*!40000 ALTER TABLE `prices_for_pay_period` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.rubric_relations
DROP TABLE IF EXISTS `rubric_relations`;
CREATE TABLE IF NOT EXISTS `rubric_relations` (
  `ancestor_id` int(11) NOT NULL COMMENT 'ID родителя',
  `descendant_id` int(11) NOT NULL COMMENT 'ID потомка',
  `level` smallint(5) NOT NULL DEFAULT '0' COMMENT 'Уровень потомка по отношению к родителю',
  `book_rubrics_br_id` int(11) NOT NULL,
  PRIMARY KEY (`ancestor_id`,`descendant_id`,`book_rubrics_br_id`),
  KEY `fk_rubric_relations_book_rubrics1_idx` (`book_rubrics_br_id`),
  CONSTRAINT `fk_rubric_relations_book_rubrics1` FOREIGN KEY (`book_rubrics_br_id`) REFERENCES `book_rubrics` (`br_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.rubric_relations: ~0 rows (приблизительно)
DELETE FROM `rubric_relations`;
/*!40000 ALTER TABLE `rubric_relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `rubric_relations` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `ur_id` int(11) NOT NULL,
  `payp_id` int(11) DEFAULT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `middlename` varchar(25) DEFAULT NULL,
  `surname` varchar(25) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uniquekey` (`password`,`nickname`),
  KEY `fk_ur_idx` (`ur_id`),
  KEY `fk_payp_idx` (`payp_id`),
  CONSTRAINT `FK_users_user_roles` FOREIGN KEY (`ur_id`) REFERENCES `user_roles` (`ur_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_users_paypp1` FOREIGN KEY (`payp_id`) REFERENCES `payed_period` (`payp_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.users: ~1 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `ur_id`, `payp_id`, `nickname`, `email`, `firstname`, `middlename`, `surname`, `phone`, `password`) VALUES
	(6, 1, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, '$2y$10$3uiothqITxnFFEV3Ddg1KeDtiA/h53RllqMIisZgS8zH3exKGuqpC');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Дамп структуры для таблица mydb.user_roles
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `ur_id` int(11) NOT NULL AUTO_INCREMENT,
  `ur_title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы mydb.user_roles: ~0 rows (приблизительно)
DELETE FROM `user_roles`;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`ur_id`, `ur_title`) VALUES
	(1, 'Администратор'),
	(2, 'Зарегистрированный пользователь');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
