-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 mars 2021 à 22:16
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `content` text NOT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `main_image` longtext,
  `user_iduser` int NOT NULL,
  `author` varchar(45) DEFAULT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`idarticle`),
  KEY `fk_post_user1_idx` (`user_iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `title`, `chapo`, `content`, `create_date`, `update_date`, `main_image`, `user_iduser`, `author`, `status`) VALUES
(1, 'Sonia Rolland évoque son arrivée en France', 'Sonia Rolland a vécu treize ans au Rwanda afin de rejoindre la France avec sa famille. Une période de sa vie sur laquelle elle est revenue dans \"Ca fait du bien\" sur Europe 1', 'Actuellement à l\'affiche de la série Tropiques criminels sur France 2, Sonia Rolland était l\'invitée d\'Anne Roumanoff dans \"Ca fait du bien\" sur Europe 1, vendredi 5 mars. Durant cet entretien, l\'ancienne reine de beauté s\'est confiée sur ses deux filles, Tess et Kahina, cette année passée au sein de l\'institut Miss France - qu\'elle a failli ne jamais faire - sa vie d\'avant, en Afrique, puis son arrivée en France.', NULL, '2021-03-08', NULL, 1, 'marial', 1),
(2, 'Bilan Covid-19 ', 'La France enregistre une légère hausse des contaminations ce dimanche. Le nombre d\'hospitalisations est également à la hausse.  ', 'Le nombre de patients hospitalisés a de son côté progressé de 193, pour s\'établir à 24 818, tandis que celui des patients traités en réanimation a augmenté de 54, pour atteindre un total de 3 743 lits occupés.\r\n\r\nLes chiffres publiés par le gouvernement indiquent par ailleurs que 3 772 579 personnes ont reçu au moins une dose de vaccin contre le Covid-19 en France. ', NULL, '2021-03-08', NULL, 1, 'marial', 1),
(3, 'Le MoDem se divise sur les régionales', 'INFO LE FIGARO - Sept conseillers régionaux sortants soutiennent Pécresse en Île-de-France, contre l\'avis de François Bayrou.', 'Mauvaise nouvelle pour la majorité présidentielle. Sept conseillers régionaux sortants d\'Île-de-France du MoDem (sur 13) ont acté leur soutien à Valérie Pécresse (ex-LR) en perspective des régionales de juin prochain. Dont l\'ancien secrétaire général du MoDem, Yann Wehrling. « Nous souhaitons clairement la réélection de Valérie Pécresse. Nous ne croyons pas à la contestation d\'un bilan auquel nous avons participé. Il n\'y a pas de raison de s\'arrêter en si bon chemin, il y a encore du boulot ! »', NULL, '2021-03-08', NULL, 2, 'rob', 2);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idcomment` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `comment_date` date NOT NULL,
  `user_iduser` int DEFAULT NULL,
  `article_idarticle` int NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`idcomment`),
  KEY `fk_comment_user_idx` (`user_iduser`),
  KEY `fk_comment_post1_idx` (`article_idarticle`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idcomment`, `content`, `comment_date`, `user_iduser`, `article_idarticle`, `status`) VALUES
(1, 'pafait', '2021-03-08', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `image` longtext,
  `role_idrole` int NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_user_role1_idx` (`role_idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `pseudo`, `email`, `password`, `first_name`, `last_name`, `mobile`, `birthdate`, `image`, `role_idrole`, `status`) VALUES
(1, 'marial', 'marialalij@gmail.com', '$2y$10$oaNR3/WHVurHjijkCY53yOV4Avcqd6q3E4Q5TQodPcHEUFbOwIf9q', 'maria', 'lalij', NULL, NULL, NULL, 1, 0),
(2, 'rob', 'rob@gmail.com', '$2y$10$uLH5caK16x3lnBvOKfNgi.pXOzWc90SFfuU0/dIH1EEece6UtsAxi', 'rob', 'demail', NULL, NULL, NULL, 2, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_post_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`article_idarticle`) REFERENCES `article` (`idarticle`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
