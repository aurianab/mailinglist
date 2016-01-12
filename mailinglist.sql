-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Janvier 2016 à 17:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mailinglist`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `validate` int(11) NOT NULL,
  `key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `validate`, `key`) VALUES
(1, 'aurianab@live.fr', '', '', 0, ''),
(2, 'ab@mail.fr', 'admin', '123', 0, ''),
(3, 'aurianab@live.fr', 'reader', '', 0, ''),
(4, 'aurianab@live.fr', 'reader', '', 0, ''),
(5, 'pauliana_93@hotmail.com', 'reader', '', 0, ''),
(6, 'pauliana_93@hotmail.com', 'reader', '', 0, ''),
(7, 'aurianab@live.fr', 'reader', '', 0, ''),
(8, 'aurianab@live.fr', 'reader', '', 0, ''),
(9, 'aurianab@live.fr', 'reader', '', 0, ''),
(10, 'aurianab@live.fr', 'reader', '', 0, ''),
(11, 'kk', 'reader', '', 0, ''),
(12, 'aurianab@live.fr', 'reader', '', 0, ''),
(13, 'aurianab@live.fr', 'reader', '', 0, ''),
(14, 'aurianab@live.fr', 'reader', '', 0, ''),
(15, 'aurianab@live.fr', 'reader', '', 0, ''),
(16, 'll', 'reader', '', 0, ''),
(17, 'kk', 'reader', '', 0, ''),
(18, 'aurianab@live.fr', 'reader', '', 0, ''),
(19, 'aurianab@live.fr', 'reader', '', 0, ''),
(20, 'aurianab@live.fr', 'reader', '', 0, ''),
(21, 'pauliana_93@hotmail.com', 'reader', '', 0, ''),
(22, 'aurianab@live.fr', 'reader', '', 0, ''),
(23, 'aurianab@live.fr', 'reader', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
