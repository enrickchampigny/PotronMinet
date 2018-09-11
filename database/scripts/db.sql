-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 11 sep. 2018 à 08:40
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `potron`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexe` bit(1) NOT NULL,
  `puce` varchar(256) NOT NULL,
  `id_famille` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_famille` (`id_famille`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `nom`, `sexe`, `puce`, `id_famille`) VALUES
(1, 'Clementine', b'0', '', 1),
(2, 'Misty', b'0', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `famille_accueil`
--

DROP TABLE IF EXISTS `famille_accueil`;
CREATE TABLE IF NOT EXISTS `famille_accueil` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `nom` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fixe` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `portable` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numero_carte` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `famille_accueil`
--

INSERT INTO `famille_accueil` (`id`, `idUser`, `nom`, `prenom`, `adresse`, `fixe`, `portable`, `mail`, `numero_carte`) VALUES
(1, 1, 'CHAMPIGNY', 'ENRICK', '29 avenue victor Hugo 33530 BASSENS', '', '06.34.99.87.31', 'enrick.champigny@ynov.com', '110386100358');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Enrick CHAMPIGNY', 'enrick.champigny@ynov.com', NULL, '$2y$10$sqW91KpOfQFh04fs97xiDurA53tlZFxt7.nS1zjrnf79VuHnv51wu', 'e4FDoV4q8Hb9X6nZVDdquDXSNG4Lcg3Vo4lQFHtDxOBXFqkXb3v77Aq37fHx', '2018-09-10 11:55:40', '2018-09-10 11:55:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
