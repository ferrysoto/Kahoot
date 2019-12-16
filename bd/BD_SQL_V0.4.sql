-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2019 at 06:48 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kahoot`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id_answer` bigint(6) NOT NULL,
  `id_question` bigint(6) NOT NULL DEFAULT '0',
  `is_correct` int(11) NOT NULL DEFAULT '0',
  `text` varchar(300) COLLATE utf8_bin NOT NULL,
  `answeradd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answerupdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar las respuestas, las opciones, y saber si son correctas o no';

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

CREATE TABLE `creators` (
  `id_creator` bigint(6) NOT NULL,
  `role` bigint(6) NOT NULL DEFAULT '1',
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(65) COLLATE utf8_bin NOT NULL,
  `password` varchar(600) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `token` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `confirmation_email` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `useradd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar todos los usuarios con rol de profesor. Pueden generar Kahoots, modificarlos y eliminarlos.';

--
-- Dumping data for table `creators`
--

INSERT INTO `creators` (`id_creator`, `role`, `username`, `name`, `email`, `password`, `token`, `confirmation_email`, `useradd`, `userupdate`) VALUES
(9, 1, 'ferran.herrero', 'Ferran Herrero Soto', 'ferran.herrerosoto@gmail.com', '80ad9a1f2c73414aab6557f69416abc15da9596d07d1e29961535ed793be85a0d604d103f6fb897ce359a08d5a67228af3cad2ed8586762e31cd38a0c993476c', NULL, NULL, '2019-12-08 16:58:57', '2019-12-08 16:58:57'),
(10, 1, 'paco.cayuela', 'Paco Cayuela', 'paco.cayuela@gmail.com', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', NULL, NULL, '2019-12-08 17:01:53', '2019-12-08 17:01:53'),
(15, 1, 'Test', 'Test User', 'test@test.com', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', NULL, NULL, '2019-12-08 18:27:51', '2019-12-08 18:27:51'),
(16, 1, 'Admin', 'Administrator', 'admin@ieti.cat', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', NULL, NULL, '2019-12-08 18:28:22', '2019-12-08 18:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id_player` bigint(6) NOT NULL,
  `id_room` bigint(20) NOT NULL,
  `nickname` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'ANONIMUS',
  `score` int(6) DEFAULT NULL,
  `answers_correct` int(6) DEFAULT '0',
  `playeradd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `playerup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Jugadores anónimos';

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id_question` bigint(6) NOT NULL,
  `id_quiz` bigint(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `points` int(5) NOT NULL DEFAULT '0',
  `questionadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `questionupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeend` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar las preguntas y asociar los jugadores y respuestas';

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` bigint(6) NOT NULL,
  `id_creator` bigint(6) NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `quizadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar cada partida del kahoot';

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(6) NOT NULL,
  `name_role` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Roles que determinan el tipo de creador';

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(1, 'Teacher'),
(2, 'Student'),
(3, 'Socially'),
(4, 'Work');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` bigint(11) NOT NULL,
  `id_quiz` bigint(11) NOT NULL,
  `id_creator` bigint(11) NOT NULL,
  `pin` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `roomadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roomupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id_vote` bigint(6) NOT NULL,
  `id_player` bigint(6) NOT NULL,
  `id_answer` bigint(20) NOT NULL,
  `rankingadd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rankingup` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para almacenar los rankings y puntuaciones de cada partida';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `creators`
--
ALTER TABLE `creators`
  ADD PRIMARY KEY (`id_creator`),
  ADD KEY `FK_Role_creator` (`role`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id_player`),
  ADD KEY `pla1` (`id_room`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fmquestion` (`id_quiz`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `id_creator` (`id_creator`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `room1` (`id_quiz`),
  ADD KEY `room2` (`id_creator`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_player` (`id_player`),
  ADD KEY `FK_IDPLAYER_PLAYERS2` (`id_answer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id_answer` bigint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `creators`
--
ALTER TABLE `creators`
  MODIFY `id_creator` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id_player` bigint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` bigint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` bigint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id_vote` bigint(6) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `FK_QUESTION_ANSWER` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `creators`
--
ALTER TABLE `creators`
  ADD CONSTRAINT `FK_Role_creator` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `pla1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fmquestion` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `FK_CREATOR_QUIZ` FOREIGN KEY (`id_creator`) REFERENCES `creators` (`id_creator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room2` FOREIGN KEY (`id_creator`) REFERENCES `creators` (`id_creator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `FK_IDPLAYER_PLAYERS` FOREIGN KEY (`id_player`) REFERENCES `players` (`id_player`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IDPLAYER_PLAYERS2` FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
