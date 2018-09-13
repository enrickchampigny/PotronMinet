-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 sep. 2018 à 13:20
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
-- Structure de la table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `ancien_nom` varchar(250) DEFAULT NULL,
  `couleur` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `numero_puce` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `famille_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`id`, `nom`, `ancien_nom`, `couleur`, `date_naissance`, `numero_puce`, `resume`, `famille_id`, `updated_at`, `created_at`) VALUES
(2, 'Myrtille', 'Misty', 'Noir', '2018-07-05', NULL, 'Myrtille alias \"Aiguille\" avec ces petites griffes acérés est une chatonne réservée qui ne demande qu\'a évoluer avec sa soeur Clémentine.', 1, '2018-09-12', '2018-09-11'),
(3, 'Clémentine', 'Rahan', 'Blanc', NULL, NULL, 'Clémentine est une petite chatte rousse très joueuse et très curieuse ! \r\nEn plus de réclamer des caresses, elle ronronne comme une grande !', 1, '2018-09-13', '2018-09-11'),
(5, 'Plume', NULL, 'Blanc', '2018-05-07', '250268501532788', NULL, 3, '2018-09-13', '2018-09-12'),
(6, 'Nala', NULL, 'Blanc', NULL, '250268501532862', NULL, 3, '2018-09-13', '2018-09-12');

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

DROP TABLE IF EXISTS `familles`;
CREATE TABLE IF NOT EXISTS `familles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(256) DEFAULT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `familles`
--

INSERT INTO `familles` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 'VANDENDRIESSCHE', 'MEGGY', '29 Avenue Victor Hugo', '33530', 'BASSENS', '06.34.99.87.31', NULL, '2018-09-13'),
(3, 'CHAMPIGNY', 'CATHERINE', 'BEGLES', NULL, NULL, NULL, NULL, NULL),
(2, 'POTRON', '', '', NULL, NULL, NULL, NULL, NULL),
(4, 'Nouvelle', 'Famille', '12', '33000', 'Bordeaux', '06.06.06.06.06', '2018-09-13', '2018-09-13'),
(5, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '2018-09-13', '2018-09-13'),
(6, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '2018-09-13', '2018-09-13'),
(7, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '2018-09-13', '2018-09-13'),
(8, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '2018-09-13', '2018-09-13');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Enrick CHAMPIGNY', 'enrick.champigny@ynov.com', NULL, '$2y$10$sqW91KpOfQFh04fs97xiDurA53tlZFxt7.nS1zjrnf79VuHnv51wu', 'dZZYYEXo9l4c4g0BjqL5ASAjsXEz2fEVV4qo6QeJQAhv44uZlMBOm4HrHFK6', '2018-09-10 09:55:40', '2018-09-10 09:55:40'),
(2, 'POTRON', 'enrick.champigny@scub.net', NULL, '$2y$10$HH41FVNjVtxDwO50.L7W1u762y2oQKDuLtsao1LtC9y/pGCcczNhO', 'Ure5eOEmhEfGDEHUFyAoxmi3NlM35mcs5Zi5DDYzEtCQcdryi6b1qTVfaJyv', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
