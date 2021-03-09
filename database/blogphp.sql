-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mars 2021 à 21:21
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `title`, `chapo`, `content`, `create_date`, `update_date`, `main_image`, `user_iduser`, `author`, `status`) VALUES
(1, 'OÙ DÉGUSTER LES MEILLEURS FLANS DE PARIS ? NOS ADRESSES COUP DE COEUR', 'vis aux amoureux du flan, on vous révèle nos adresses coups de coeur à Paris pour déguster votre gourmandise préférée', '  Le Flan, c\'est une gourmandise qui met tout le monde d\'accord. Et l\'histoire d\'amour entre les becs sucrés et ce gâteau incontournable ne date pas d\'hier. Figurez-vous que l\'origine du Flan Pâtissier remonte carrément au Moyen-Âge ! Aujourd\'hui encore ce gâteau est un incontournable pour les becs sucrés et les fondus de flans sont bien nombreux à Paris.\r\n\r\n                          ', NULL, '2021-03-09', NULL, 1, 'marial', 1),
(2, '“Diagnostic genré” dans un parc : une élue de la mairie de Paris ridiculisée', 'En visite dimanche 7 mars dans un parc du sud-est parisien, l’adjointe à la maire de Paris, Hélène Bidard, s’est attirée les foudres des internautes. ', 'Visiblement, la mairie de Paris n’a pas les mêmes priorités que ses concitoyens. C’est en tout ce qui ressort des réseaux sociaux après les propos d’Hélène Bidard, militante communiste, mais surtout adjointe à la maire de Paris, ce dimanche 7 mars, après avoir fait une « balade urbaine » au Parc Suzanne Lenglen (XVe arrondissement de Paris). Celle qui se présente pour « l’égalité femmes-hommes, la jeunesse et l’éducation populaire », s’est fendue d’un petit commentaire qui est loin d‘être passé inaperçu sur son compte                          ', NULL, '2021-03-09', NULL, 2, 'david', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idcomment` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `comment_date` date NOT NULL,
  `user_iduser` int NOT NULL,
  `article_idarticle` int NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`idcomment`),
  KEY `fk_comment_user_idx` (`user_iduser`),
  KEY `fk_comment_post1_idx` (`article_idarticle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idcomment`, `content`, `comment_date`, `user_iduser`, `article_idarticle`, `status`) VALUES
(1, 'delicieux , i will try it', '2021-03-09', 1, 1, 1),
(2, 'parfait', '2021-03-09', 2, 1, 1);

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
(2, 'utilisateur');

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
  `status` tinyint DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_user_role1_idx` (`role_idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `pseudo`, `email`, `password`, `first_name`, `last_name`, `mobile`, `birthdate`, `image`, `role_idrole`, `status`) VALUES
(1, 'marial', 'marialali@gmail.com', '$2y$10$BDUX.rdmOFBsCLFzN26XuuQh.r4mxZOzwWJ3rPgXEZAUv1EdIp0pW', 'maria', 'lalij', NULL, NULL, NULL, 1, NULL),
(2, 'david', 'david@gmail.com', '$2y$10$.GtCOkNXW2aav15.QfbIf..vvKNgW.4hpUv5SwrpDpzwAJ230W3u2', 'dav', 'demai', NULL, NULL, NULL, 2, NULL);

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
