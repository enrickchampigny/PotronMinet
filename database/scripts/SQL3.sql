-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 sep. 2018 à 14:12
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`id`, `nom`, `ancien_nom`, `couleur`, `date_naissance`, `numero_puce`, `resume`, `famille_id`, `updated_at`, `created_at`) VALUES
(2, 'Myrtille', 'Misty', 'Noire', NULL, NULL, '', 1, '2018-09-12', '2018-09-11'),
(3, 'Clementine', 'Rahan', 'Rousse claire', NULL, NULL, 'Clémentine est une petite chatte rousse très joueuse et très curieuse ! \r\nEn plus de réclamer des caresses, elle ronronne comme une grande !', 1, '2018-09-12', '2018-09-11'),
(5, 'Plume', NULL, 'Tigrée', '2018-05-07', NULL, NULL, 2, '2018-09-12', '2018-09-12'),
(6, 'Nala', NULL, 'Tigrée', NULL, NULL, '', 2, '2018-09-12', '2018-09-12');

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
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `familles`
--

INSERT INTO `familles` (`id`, `nom`, `prenom`, `adresse`) VALUES
(1, 'VANDENDRIESSCHE - CHAMPIGNY', 'MEGGY - ENRICK', '29 Avenue Victor Hugo 33530 BASSENS'),
(2, 'CHAMPIGNY', 'CATHERINE', 'BEGLES');

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
(1, 'Enrick CHAMPIGNY', 'enrick.champigny@ynov.com', NULL, '$2y$10$sqW91KpOfQFh04fs97xiDurA53tlZFxt7.nS1zjrnf79VuHnv51wu', 'YA5KybWv7v0EzwKPzdQ6LsG4gut05Gc2Bx5ANFxJwZFB2yL52JlbB0nWm0Eg', '2018-09-10 09:55:40', '2018-09-10 09:55:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
