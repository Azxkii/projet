-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 oct. 2023 à 16:04
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `azxki`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `id_user` int NOT NULL,
  `id_plateforme` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `prix`, `img`, `id_user`, `id_plateforme`) VALUES
(1, 'CARTE XBOX 10€', '10', 'cxbox10', 1, 2),
(6, 'CARTE PSN 20€', '20', 'cpsn20', 1, 1),
(7, 'CARTE PSN 25€', '25', 'cpsn25', 1, 1),
(8, 'CARTE PSN 30€', '30', 'cpsn30', 1, 1),
(9, 'CARTE PSN 50€', '50', 'cpsn50', 1, 1),
(10, 'CARTE PSN 100€', '100', 'cpsn100', 1, 1),
(11, 'FIFA 23', '50', 'fifa23', 1, 1),
(12, '500 POINTS FUT', '5', '500point_fut', 1, 1),
(13, '1050 POINTS FUT', '10', '1050point_fut', 1, 1),
(14, '1600 POINTS FUT', '15', '1600point_fut', 1, 1),
(15, '2800 POINTS FUT', '25', '2800point_fut', 1, 1),
(16, '5900 POINTS FUT', '50', '5900point_fut', 1, 1),
(17, '12000 POINTS FUT', '100', '12000point_fut', 1, 1),
(18, 'CARTE XBOX 15€', '15', 'cxbox15', 1, 2),
(20, 'CARTE XBOX 20€', '20', 'cxbox20', 1, 2),
(21, 'CARTE XBOX 25€', '25', 'cxbox25', 1, 2),
(22, 'CARTE XBOX 30€', '30', 'cxbox30', 1, 2),
(23, 'CARTE XBOX 50€', '50', 'cxbox50', 1, 2),
(24, 'CARTE XBOX 75€', '75', 'cxbox75', 1, 2),
(25, '500 POINTS FUT', '5', '500point_fut', 1, 2),
(26, '1050 POINTS FUT', '10', '1050point_fut', 1, 2),
(27, '1600 POINTS FUT', '15', '1600point_fut', 1, 2),
(28, '2800 POINTS FUT', '25', '2800point_fut', 1, 2),
(29, '5900 POINTS FUT', '50', '5900point_fut', 1, 2),
(30, '12000 POINTS FUT', '100', '12000point_fut', 1, 2),
(31, 'ABONNEMENT 1 AN XBOX LIVE', '60', 'abo1_an_xboxlive', 1, 2),
(32, 'ABONNEMENT 3 MOIS XBOX LIVE', '20', 'abo3_mois_xboxlive', 1, 2),
(33, 'ABONNEMENT 6 MOIS XBOX LIVE', '45', 'abo6_mois_xboxlive', 1, 2),
(34, 'CARTE STEAM 20€', '20', 'csteam20', 1, 5),
(35, 'CARTE STEAM 25€', '25', 'csteam25', 1, 5),
(36, 'CARTE STEAM 50€', '50', 'csteam50', 1, 5),
(37, 'CARTE STEAM 100€', '100', 'csteam100', 1, 5),
(38, 'CARTE ROCKSTAR 100K', '1', 'crockstar100k', 1, 3),
(39, 'CARTE ROCKSTAR 200K', '2', 'crockstar200k', 1, 3),
(40, 'CARTE ROCKSTAR 500K', '5', 'crockstar500k', 1, 3),
(41, 'CARTE ROCKSTAR 1250K', '10', 'crockstar1250k', 1, 3),
(42, 'CARTE ROCKSTAR 3500K', '25', 'crockstar3500k', 1, 3),
(43, 'CARTE ROCKSTAR 8000K', '50', 'crockstar8000k', 1, 3),
(44, 'GTA 5', '10', 'gta', 1, 3),
(45, '500 POINT FUT', '5', '500point_fut', 1, 6),
(46, '1050 POINT FUT', '10', '1050point_fut', 1, 6),
(47, '1600 POINT FUT', '15', '1600point_fut', 1, 6),
(48, '2800 POINT FUT', '25', '2800point_fut', 1, 6),
(49, '5900 POINT FUT', '50', '5900point_fut', 1, 6),
(50, '12000 POINT FUT', '100', '12000point_fut', 1, 6),
(51, 'FIFA 23', '30', 'fifa23', 1, 6),
(52, '1000 PIECES APEX', '10', '1000apexcoins', 1, 6),
(53, '2150 PIECES APEX', '20', '2150apexcoins', 1, 6),
(54, '4350 PIECES APEX', '40', '4350apexcoins', 1, 6),
(55, '6700 PIECES APEX', '60', '6700apexcoins', 1, 6),
(56, '11500 PIECES APEX', '100', '11500apexcoins', 1, 6),
(57, 'PACK HARLEY QUINN', '10', 'garleyquinnfortnite', 1, 4),
(58, 'PACK GRAPPLING', '10', 'grapplingfortnite', 1, 4),
(59, 'PACK SPIDER-MAN', '10', 'spidermanfortnite', 1, 4),
(60, '1000 V-BUCKS', '8', 'vbuck1k', 1, 4),
(61, '2800 V-BUCKS', '20', 'vbuck2k8', 1, 4),
(62, '5000 V-BUCKS', '35', 'vbuck5k', 1, 4),
(63, '13 500 V-BUCKS', '80', 'vbuck13k5', 1, 4),
(64, 'CARTE PSN 5€', '5', 'cpsn5', 8, 1),
(65, 'CARTE PSN 10€', '10', 'cpsn10', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `author` int NOT NULL,
  `article_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `content`, `author`, `article_id`) VALUES
(2, 'Super article !', 8, 3),
(3, 'bon article !', 8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `quantite` varchar(10) NOT NULL,
  `id_user` int NOT NULL,
  `id_article` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

DROP TABLE IF EXISTS `plateforme`;
CREATE TABLE IF NOT EXISTS `plateforme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plateforme`
--

INSERT INTO `plateforme` (`id`, `nom`) VALUES
(1, 'playstation'),
(2, 'xbox'),
(3, 'rockstar'),
(4, 'epic'),
(5, 'steam'),
(6, 'origin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `is_admin` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `email`, `code`, `verify`, `is_admin`) VALUES
(1, 'Azxkiii', '$2y$10$ldV6NE/.TOaP9Q79NP.Q3OqsFtwloqNhroBvVgMceLgErR0QadVcW', 'cococoursan@gmail.com', '', 1, 1),
(8, 'Azxki', '$2y$10$yAZCpU08uV8aTxR3hMheuew5WlR5dAopTths6x4Cq4OimZnsdJ9DC', 'test@test.fr', '6476f72bf325e', 1, 1),
(15, 'corentin', '$2y$10$SQoyksoFsDZDkfDmqoXkS./wVGqIOWy5ylguHStqPGpTcaN7NlIbm', 'azxki01@gmail.com', '6477083864d6e', 1, 1),
(16, 'coco', '$2y$10$CTJDU6zkK6lNskkCF2/WWORA05nDrsFymwUDDVsR.9/zt7.SEwSnq', 'coco@coco.fr', '648b759196b8d', 0, 0),
(17, 'cococrsnn', '$2y$10$vBIBFdXAZZ2h4ZthaHZUjOTbhhP.4WphpBJf3F.Y/Q08q5A5jQWwK', 'binaryoff@gmail.com', '64901fbb333b8', 1, 0),
(18, 'azxkiiiiiii', '$2y$10$M17bHteiyEtNZRjHSafTz.yTPSQNu5KbWyk9IZbHMSnGFShNj/7VK', 'test@test01.fr', '6491f1c2b0d62', 0, 0),
(19, 'azxkiiiiiiii', '$2y$10$VYkMaDE6Xyj3j.OGZXQsHOC6A6e2XBJQjRCG8GBkg/PpDoFjknzFe', 'test@test02.fr', '6491f27964b46', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
