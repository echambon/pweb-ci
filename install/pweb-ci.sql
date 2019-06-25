-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 25 juin 2019 à 21:36
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pweb-ci`
--

-- --------------------------------------------------------

--
-- Structure de la table `pw_logs`
--

DROP TABLE IF EXISTS `pw_logs`;
CREATE TABLE IF NOT EXISTS `pw_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `login_date` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `error` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pw_settings`
--

DROP TABLE IF EXISTS `pw_settings`;
CREATE TABLE IF NOT EXISTS `pw_settings` (
  `website_title` varchar(255) NOT NULL,
  `website_subtitle` varchar(255) NOT NULL,
  `website_keywords` varchar(255) NOT NULL,
  `website_homepage_id` int(11) NOT NULL,
  `log_successful_connection_activated` tinyint(1) NOT NULL,
  `log_failed_attemps_activated` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pw_settings`
--

INSERT INTO `pw_settings` (`website_title`, `website_subtitle`, `website_keywords`, `website_homepage_id`, `log_successful_connection_activated`, `log_failed_attemps_activated`) VALUES
('John Smith', 'Researcher', 'pweb', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pw_users`
--

DROP TABLE IF EXISTS `pw_users`;
CREATE TABLE IF NOT EXISTS `pw_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pw_users`
--

INSERT INTO `pw_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$12$vZ0xFzK6rS.iTjUPj8/wy.GdFsOhmpLcEu7BlC1KJrutPrAPTxv/q');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
