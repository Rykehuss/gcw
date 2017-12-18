-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.22-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица chat.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` char(50) NOT NULL,
  `message` char(255) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы chat.messages: ~12 rows (приблизительно)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `nickname`, `message`, `date`) VALUES
	(1, 'AR', 'AERF', 2147483647),
	(2, 'sf', 'f', 2147483647),
	(3, 'af', 'f', 2147483647),
	(4, 'af', 'f', 1512659844),
	(5, 'rga', 'aef', 1512659848),
	(6, 'ssbaetg', 'aefffawef', 1512659874),
	(7, 'sgaegq', 'qerfqr3f', 1512659883),
	(8, 'af', 'qf', 1512659887),
	(9, 'afeqrfrg', 'wf3f', 1512659890),
	(10, 'zfaref', 'asfewf', 1512659955),
	(11, 'ыпыуеп', 'фукпфуп', 1512660425),
	(12, 'eee', 'ggg', 1512680666);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
