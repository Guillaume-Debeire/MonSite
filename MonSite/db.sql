-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `application`;
CREATE TABLE `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `application` (`id`, `name`, `subtitle`, `date_debut`, `date_fin`) VALUES
(1,	'Plantopia',	'Application de référencement de plantes',	'février 2021',	'mars 2021'),
(2,	'Mon Site',	'Application de présentation personnelle',	'mai 2021',	'mai 2021');

DROP TABLE IF EXISTS `audiovisuel`;
CREATE TABLE `audiovisuel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `audiovisuel` (`id`, `name`, `date_debut`, `date_fin`, `type`, `link`) VALUES
(1,	'MZ - Noir c\'est noir',	'mai 2015',	'mai 2015',	'Clip vidéo',	'https://www.youtube.com/embed/4BHtHeE7BSk'),
(2,	'Star Wars/ Battlefield Mashup',	'Mars 2016',	'Mars 2016',	'Mashup',	'https://www.youtube.com/embed/yQ4kYHA4QTA'),
(3,	'Sound Road Teaser #2',	'Avril 2013',	'Avril 2013',	'Teaser',	'https://www.youtube.com/embed/qK2VscEKFcU'),
(4,	'Shirley!',	'Mars 2015',	'Mai 2015',	'Court-métrage',	'https://www.youtube.com/embed/Wd2T8CnA4Xg');

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210509171022',	'2021-05-09 19:10:29',	234),
('DoctrineMigrations\\Version20210509221923',	'2021-05-10 00:19:29',	125),
('DoctrineMigrations\\Version20210509222426',	'2021-05-10 00:24:32',	61),
('DoctrineMigrations\\Version20210510111812',	'2021-05-10 13:18:19',	88),
('DoctrineMigrations\\Version20210510123814',	'2021-05-10 14:38:23',	122),
('DoctrineMigrations\\Version20210510124953',	'2021-05-10 14:49:59',	153),
('DoctrineMigrations\\Version20210510141840',	'2021-05-10 16:18:48',	72),
('DoctrineMigrations\\Version20210510170016',	'2021-05-10 19:00:24',	91),
('DoctrineMigrations\\Version20210510170445',	'2021-05-10 19:04:54',	72);

DROP TABLE IF EXISTS `exercice`;
CREATE TABLE `exercice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `exercice` (`id`, `name`) VALUES
(1,	'MovieDB');

DROP TABLE IF EXISTS `parcours`;
CREATE TABLE `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `parcours` (`id`, `name`, `description`, `intro`, `title1`, `title2`, `text1`, `text2`, `subtitle`, `date_debut`, `date_fin`, `phone`, `email`, `specialization`, `adress`) VALUES
(1,	'Bac S',	'Bac S Option Mathémathique obtenu par votre serviteur en 2011 à Toulouse. L\'acheminement d\'années de travail qui m\'a mis sur la piste de l\'informatique.',	'',	'',	'',	'',	'',	'Option mathématiques',	'juin 2012',	'juin 2012',	NULL,	NULL,	NULL,	NULL),
(2,	'3iS',	'3is est une école du cinéma et de l\'audiovisuel dans laquelle j\'ai appris les différents métiers du cinéma, puis je me suis spécialisé dans le montage.',	'3iS est une école du cinéma et de l\'audiovisuel qui m\'a formé sur les métiers du cinéma pendant 3 ans. Un socle général d\"un an et demi m\'a appris les métiers du cinéma, puis 1 an et demi ou je me suis spécialisé dans le montage.',	'LE SOCLE',	'LE MONTAGE',	'Le socle de 3iS était parsemé d\'ateliers en tout genres permettant la pratique de plusieurs compétences primordiales aux métiers du cinéma. J\'ai pu faire des tournages, des bruitages, de la réalisation, de la production, de l\'écriture de scénario; cette base solide permet de mieux travailler en équipe une fois spécialisé.',	'Le montage est la partie que je préfère du cinéma. Sur différents logiciels (Avid, Final Cut, Premiere Pro...) j\'ai pu apprendre à réaliser de nombreux types de montages : court-métrage, clip, documentaire...',	'Monteur cinéma et audiovisuel',	'Septembre 2012',	'Juin 2015',	'01.30.69.64.48',	NULL,	'Montage',	'3iS Paris 4 rue Blaise-Pascal 78990 ELANCOURT'),
(3,	'O\'Clock',	'La formation O\'clock est une formation d\'une durée de 6 mois comprenant 4 mois de socle et 2 mois de spécialisation.                       Durant le socle, j\'ai pu totalement intégrer le HTML et le CSS. La formation était axée PHP mais j\'ai également pu acquérir des notions de Javascript.',	'O\'Clock est un organisme de formation en téléprésentiel qui m\'a permis de mettre un pied dans l\'univers du développement web. La formation, répartie sur 6 mois, m\'a appris les bases du développement puis je me suis spécialisé dans le framework Symfony.',	'LE SOCLE',	'SYMFONY',	'Le socle est d\'une durée de 4 mois, pendant lesquels j\'ai appris le HTML et le CSS, puis j\'ai eu des notions de Javascript avant de plonger dans le PHP. J\'ai également pu voir des notions de cybersécurité, déploiement, librairies, CMS, méthode SCRUM...',	'Lors de la spécialisation, nous avons découvert le framework Symfony, avec lequel nous avons créé plusieurs applications de gestions de bases de données. La spécialisation a également été le théâtre de l\'Apothéose, pendant laquelle j\'ai participé avec 3 camarades à la création de Plantopia, une application de référencement de plantes.',	'Développeur web & web mobile',	'Septembre 2020',	'Avril 2021',	'09.74.76.80.67',	'hey@oclock.io',	'Symfony',	NULL);

DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parcours_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16DB4F896E38C0DB` (`parcours_id`),
  CONSTRAINT `FK_16DB4F896E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `production`;
CREATE TABLE `production` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exercice_id` int(11) DEFAULT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `audiovisuel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D3EDB1E089D40298` (`exercice_id`),
  UNIQUE KEY `UNIQ_D3EDB1E03E030ACD` (`application_id`),
  UNIQUE KEY `UNIQ_D3EDB1E034C38397` (`audiovisuel_id`),
  KEY `IDX_D3EDB1E06E38C0DB` (`parcours_id`),
  CONSTRAINT `FK_D3EDB1E034C38397` FOREIGN KEY (`audiovisuel_id`) REFERENCES `audiovisuel` (`id`),
  CONSTRAINT `FK_D3EDB1E03E030ACD` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`),
  CONSTRAINT `FK_D3EDB1E06E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`),
  CONSTRAINT `FK_D3EDB1E089D40298` FOREIGN KEY (`exercice_id`) REFERENCES `exercice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `production` (`id`, `name`, `description`, `exercice_id`, `parcours_id`, `application_id`, `audiovisuel_id`) VALUES
(1,	'MovieDB',	'exercice',	1,	3,	NULL,	NULL),
(2,	'Plantopia',	'application',	NULL,	3,	1,	NULL),
(3,	'Mon Site',	'application',	NULL,	3,	2,	NULL),
(4,	'Shirley!',	NULL,	NULL,	2,	NULL,	4),
(5,	'Sound Road Teaser #2',	NULL,	NULL,	2,	NULL,	3);

DROP TABLE IF EXISTS `skill`;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `skill` (`id`, `name`, `type`) VALUES
(1,	'HTML',	'language'),
(2,	'CSS',	'language'),
(3,	'PHP',	'language'),
(4,	'Javascript',	'language'),
(5,	'Symfony',	'framework'),
(6,	'React',	'library'),
(7,	'Bootstrap',	'framework'),
(8,	'Montage',	'video'),
(9,	'Etalonnage',	'video'),
(10,	'Derushage',	'video'),
(11,	'Habillage',	'video');

DROP TABLE IF EXISTS `skill_application`;
CREATE TABLE `skill_application` (
  `skill_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  PRIMARY KEY (`skill_id`,`application_id`),
  KEY `IDX_1A45440D5585C142` (`skill_id`),
  KEY `IDX_1A45440D3E030ACD` (`application_id`),
  CONSTRAINT `FK_1A45440D3E030ACD` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1A45440D5585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `skill_audiovisuel`;
CREATE TABLE `skill_audiovisuel` (
  `skill_id` int(11) NOT NULL,
  `audiovisuel_id` int(11) NOT NULL,
  PRIMARY KEY (`skill_id`,`audiovisuel_id`),
  KEY `IDX_D91194885585C142` (`skill_id`),
  KEY `IDX_D911948834C38397` (`audiovisuel_id`),
  CONSTRAINT `FK_D911948834C38397` FOREIGN KEY (`audiovisuel_id`) REFERENCES `audiovisuel` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_D91194885585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `skill_exercice`;
CREATE TABLE `skill_exercice` (
  `skill_id` int(11) NOT NULL,
  `exercice_id` int(11) NOT NULL,
  PRIMARY KEY (`skill_id`,`exercice_id`),
  KEY `IDX_A6B0AABF5585C142` (`skill_id`),
  KEY `IDX_A6B0AABF89D40298` (`exercice_id`),
  CONSTRAINT `FK_A6B0AABF5585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_A6B0AABF89D40298` FOREIGN KEY (`exercice_id`) REFERENCES `exercice` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `skill_parcours`;
CREATE TABLE `skill_parcours` (
  `skill_id` int(11) NOT NULL,
  `parcours_id` int(11) NOT NULL,
  PRIMARY KEY (`skill_id`,`parcours_id`),
  KEY `IDX_DB19B3115585C142` (`skill_id`),
  KEY `IDX_DB19B3116E38C0DB` (`parcours_id`),
  CONSTRAINT `FK_DB19B3115585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_DB19B3116E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `skill_parcours` (`skill_id`, `parcours_id`) VALUES
(1,	3),
(2,	3),
(3,	3),
(4,	3),
(5,	3),
(6,	3),
(7,	3),
(8,	2),
(9,	2),
(10,	2),
(11,	2);

DROP TABLE IF EXISTS `software`;
CREATE TABLE `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `software` (`id`, `name`, `level`) VALUES
(1,	'VS Code',	'&#9733;&#9733;&#9733;&#9733;&#9733;'),
(2,	'Insomnia',	NULL),
(3,	'Premiere Pro',	NULL),
(4,	'Photoshop',	NULL),
(5,	'Avid Media Composer',	NULL),
(6,	'After Effect',	NULL);

DROP TABLE IF EXISTS `software_parcours`;
CREATE TABLE `software_parcours` (
  `software_id` int(11) NOT NULL,
  `parcours_id` int(11) NOT NULL,
  PRIMARY KEY (`software_id`,`parcours_id`),
  KEY `IDX_6EE5D228D7452741` (`software_id`),
  KEY `IDX_6EE5D2286E38C0DB` (`parcours_id`),
  CONSTRAINT `FK_6EE5D2286E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_6EE5D228D7452741` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `software_parcours` (`software_id`, `parcours_id`) VALUES
(1,	3),
(2,	3),
(3,	2),
(4,	2),
(5,	2),
(6,	2);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2021-05-11 14:38:44