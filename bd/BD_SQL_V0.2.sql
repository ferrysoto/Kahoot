-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.16-MariaDB - mariadb.org binary distribution
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
  `id_question` bigint(6) NOT NULL DEFAULT 0,
  `is_correct` int(11) NOT NULL DEFAULT 0,
  `answeradd` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `answerupdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `role` bigint(6) NOT NULL DEFAULT 1,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(65) COLLATE utf8_bin NOT NULL,
  `password` varchar(600) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `useradd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_creator`),
  KEY `FK_Role_creator` (`role`),
  CONSTRAINT `FK_Role_creator` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar todos los usuarios con rol de profesor. Pueden generar Kahoots, modificarlos y eliminarlos.';

-- Volcando datos para la tabla kahoot.creators: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `creators` DISABLE KEYS */;
INSERT IGNORE INTO `creators` (`id_creator`, `role`, `username`, `name`, `email`, `password`, `useradd`, `userupdate`) VALUES
	(9, 1, 'ferran.herrero', 'Ferran Herrero Soto', 'ferran.herrerosoto@gmail.com', '80ad9a1f2c73414aab6557f69416abc15da9596d07d1e29961535ed793be85a0d604d103f6fb897ce359a08d5a67228af3cad2ed8586762e31cd38a0c993476c', '2019-12-08 17:58:57', '2019-12-08 17:58:57'),
	(10, 1, 'paco.cayuela', 'Paco Cayuela', 'paco.cayuela@gmail.com', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', '2019-12-08 18:01:53', '2019-12-08 18:01:53'),
	(11, 1, 'paco.cayuela', 'Paco Cayuela', 'paco.cayuela@gmail.com', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', '2019-12-08 18:07:20', '2019-12-08 18:07:20'),
	(12, 1, 'paco.cayuela', 'Paco Cayuela', 'paco.cayuela@gmail.com', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', '2019-12-08 18:09:20', '2019-12-08 18:09:20'),
	(13, 1, 'test', 'test', 'test@test.com', '80ad9a1f2c73414aab6557f69416abc15da9596d07d1e29961535ed793be85a0d604d103f6fb897ce359a08d5a67228af3cad2ed8586762e31cd38a0c993476c', '2019-12-08 19:18:57', '2019-12-08 19:18:57'),
	(14, 1, 'test', 'test', 'test@test.com', '80ad9a1f2c73414aab6557f69416abc15da9596d07d1e29961535ed793be85a0d604d103f6fb897ce359a08d5a67228af3cad2ed8586762e31cd38a0c993476c', '2019-12-08 19:19:24', '2019-12-08 19:19:24');
/*!40000 ALTER TABLE `creators` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.players
CREATE TABLE IF NOT EXISTS `players` (
  `id_player` bigint(6) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'ANONIMUS',
  `score` int(6) DEFAULT NULL,
  `answers_correct` int(6) DEFAULT 0,
  `playeradd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `playerup` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_player`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Jugadores anónimos';

-- Volcando datos para la tabla kahoot.players: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;

-- Volcando estructura para tabla kahoot.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` bigint(6) NOT NULL AUTO_INCREMENT,
  `id_answer` bigint(6) NOT NULL DEFAULT 0,
  `question` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `points` int(5) NOT NULL DEFAULT 0,
  `questionadd` timestamp NOT NULL DEFAULT current_timestamp(),
  `questionupdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `timestart` timestamp NOT NULL DEFAULT current_timestamp(),
  `timeend` timestamp NOT NULL DEFAULT current_timestamp(),
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
  `id_question` bigint(6) NOT NULL DEFAULT 0,
  `id_player` bigint(6) NOT NULL DEFAULT 0,
  `id_creator` bigint(6) NOT NULL DEFAULT 0,
  `id_ranking` bigint(6) NOT NULL DEFAULT 0,
  `quizadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `rankingadd` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rankingup` datetime NOT NULL DEFAULT current_timestamp(),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Roles que determinan el tipo de creador';

-- Volcando datos para la tabla kahoot.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT IGNORE INTO `roles` (`id_role`, `name_role`) VALUES
	(1, 'Teacher'),
	(2, 'Student'),
	(3, 'Socially'),
	(4, 'Work');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
