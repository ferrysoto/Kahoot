-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para kahoot
CREATE DATABASE IF NOT EXISTS `kahoot` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `kahoot`;

-- Volcando estructura para tabla kahoot.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id_answer` bigint(6) NOT NULL AUTO_INCREMENT,
  `id_question` bigint(6) NOT NULL DEFAULT '0',
  `is_correct` int(11) NOT NULL DEFAULT '0',
  `answeradd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answerupdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_answer`),
  KEY `id_question` (`id_question`),
  CONSTRAINT `FK_QUESTION_ANSWER` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar las respuestas, las opciones, y saber si son correctas o no';

-- Volcando datos para la tabla kahoot.answers: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.creators
CREATE TABLE IF NOT EXISTS `creators` (
  `id_creator` bigint(6) NOT NULL AUTO_INCREMENT,
  `role` bigint(6) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(65) COLLATE utf8_bin NOT NULL,
  `password` varchar(600) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `useradd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_creator`),
  KEY `FK_Role_creator` (`role`),
  CONSTRAINT `FK_Role_creator` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar todos los usuarios con rol de profesor. Pueden generar Kahoots, modificarlos y eliminarlos.';

-- Volcando datos para la tabla kahoot.creators: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `creators` DISABLE KEYS */;
/*!40000 ALTER TABLE `creators` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.players
CREATE TABLE IF NOT EXISTS `players` (
  `id_player` bigint(6) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'ANONIMUS',
  `score` int(6) DEFAULT NULL,
  `answers_correct` int(6) DEFAULT '0',
  `playeradd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `playerup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_player`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Jugadores anónimos';

-- Volcando datos para la tabla kahoot.players: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` bigint(6) NOT NULL AUTO_INCREMENT,
  `id_answer` bigint(6) NOT NULL DEFAULT '0',
  `question` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `points` int(5) NOT NULL DEFAULT '0',
  `questionadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `questionupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeend` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_question`),
  KEY `id_answer` (`id_answer`),
  CONSTRAINT `FK_ANSWER_QUESTION` FOREIGN KEY (`id_answer`) REFERENCES `questions` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar las preguntas y asociar los jugadores y respuestas';

-- Volcando datos para la tabla kahoot.questions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.quiz
CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quiz` bigint(6) NOT NULL AUTO_INCREMENT,
  `id_question` bigint(6) NOT NULL DEFAULT '0',
  `id_player` bigint(6) NOT NULL DEFAULT '0',
  `id_creator` bigint(6) NOT NULL DEFAULT '0',
  `id_ranking` bigint(6) NOT NULL DEFAULT '0',
  `quizadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz`),
  KEY `id_question` (`id_question`),
  KEY `id_player` (`id_player`),
  KEY `id_creator` (`id_creator`),
  KEY `id_ranking` (`id_ranking`),
  CONSTRAINT `FK_CREATOR_QUIZ` FOREIGN KEY (`id_creator`) REFERENCES `creators` (`id_creator`),
  CONSTRAINT `FK_PLAYER_QUIZ` FOREIGN KEY (`id_player`) REFERENCES `players` (`id_player`),
  CONSTRAINT `FK_QUESTION_QUIZ` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`),
  CONSTRAINT `FK_RANKING_QUIZ` FOREIGN KEY (`id_ranking`) REFERENCES `ranking` (`id_ranking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar cada partida del kahoot';

-- Volcando datos para la tabla kahoot.quiz: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.ranking
CREATE TABLE IF NOT EXISTS `ranking` (
  `id_ranking` bigint(6) NOT NULL AUTO_INCREMENT,
  `id_player` bigint(6) NOT NULL,
  `id_creator` bigint(6) NOT NULL,
  `rankingadd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rankingup` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ranking`),
  KEY `id_player` (`id_player`),
  KEY `id_creator` (`id_creator`),
  CONSTRAINT `FK_IDCREATOR_CREATOR` FOREIGN KEY (`id_creator`) REFERENCES `creators` (`id_creator`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_IDPLAYER_PLAYERS` FOREIGN KEY (`id_player`) REFERENCES `players` (`id_player`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar los rankings y puntuaciones de cada partida';

-- Volcando datos para la tabla kahoot.ranking: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ranking` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranking` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` bigint(6) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Roles que determinan el tipo de creador';

-- Volcando datos para la tabla kahoot.roles: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
