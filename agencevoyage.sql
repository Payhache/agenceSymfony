-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 août 2020 à 18:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agencevoyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`id`, `name`) VALUES
(1, 'Ski'),
(2, 'bateau'),
(3, 'luge'),
(4, 'tennis'),
(5, 'attrappe maman'),
(6, 'patin a glace'),
(8, 'attrappe maman'),
(9, 'patin a glace'),
(10, 'chasse au trésor'),
(11, 'attrappe maman'),
(12, 'patin a glace'),
(13, 'chasse au trésor'),
(14, 'attrappe maman'),
(15, 'patin a glace'),
(16, 'chasse au trésor'),
(17, 'attrappe maman'),
(18, 'patin a glace'),
(19, 'chasse au trésor'),
(27, 'patin a glace'),
(28, 'chasse au trésor'),
(29, 'toto'),
(30, 'patin a glace'),
(31, 'chasse au trésor'),
(32, 'attrappe maman'),
(33, 'patin a glace'),
(34, 'chasse au trésor'),
(35, 'attrappe maman');

-- --------------------------------------------------------

--
-- Structure de la table `activity_sejour`
--

DROP TABLE IF EXISTS `activity_sejour`;
CREATE TABLE IF NOT EXISTS `activity_sejour` (
  `activity_id` int(11) NOT NULL,
  `sejour_id` int(11) NOT NULL,
  PRIMARY KEY (`activity_id`,`sejour_id`),
  KEY `IDX_C483C02881C06096` (`activity_id`),
  KEY `IDX_C483C02884CF0CF` (`sejour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ouverture` date DEFAULT NULL,
  `nb_star` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destination_sejour`
--

DROP TABLE IF EXISTS `destination_sejour`;
CREATE TABLE IF NOT EXISTS `destination_sejour` (
  `destination_id` int(11) NOT NULL,
  `sejour_id` int(11) NOT NULL,
  PRIMARY KEY (`destination_id`,`sejour_id`),
  KEY `IDX_C4CCBFBF816C6140` (`destination_id`),
  KEY `IDX_C4CCBFBF84CF0CF` (`sejour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200818124213', '2020-08-18 12:42:35', 592),
('DoctrineMigrations\\Version20200819085319', '2020-08-19 08:54:15', 910);

-- --------------------------------------------------------

--
-- Structure de la table `sejour`
--

DROP TABLE IF EXISTS `sejour`;
CREATE TABLE IF NOT EXISTS `sejour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_logement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_personne` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96F5202812469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity_sejour`
--
ALTER TABLE `activity_sejour`
  ADD CONSTRAINT `FK_C483C02881C06096` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C483C02884CF0CF` FOREIGN KEY (`sejour_id`) REFERENCES `sejour` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destination_sejour`
--
ALTER TABLE `destination_sejour`
  ADD CONSTRAINT `FK_C4CCBFBF816C6140` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C4CCBFBF84CF0CF` FOREIGN KEY (`sejour_id`) REFERENCES `sejour` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD CONSTRAINT `FK_96F5202812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
