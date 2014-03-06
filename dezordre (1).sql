-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 06 Mars 2014 à 22:19
-- Version du serveur: 5.1.44
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dezordre`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `street` mediumtext NOT NULL,
  `floor` int(2) NOT NULL,
  `comment` text NOT NULL,
  `digicode` varchar(255) NOT NULL,
  `postal_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `addresses`
--

INSERT INTO `addresses` (`id`, `firstname`, `lastname`, `phone`, `street`, `floor`, `comment`, `digicode`, `postal_id`, `city_id`, `user_id`) VALUES
(1, 'Corentin', 'Chateil', '', '00 ', 7, 'dsqfdsf', 'ssdfsdf', 1, 1, 2),
(2, 'Corentin', 'Chateil', '', '00 ', 7, 'dsqfdsf', 'ssdfsdf', 1, 1, 2),
(3, 'Corentin', 'Chateil', '', '00 ', 7, 'dsqfdsf', 'ssdfsdf', 1, 2, 2),
(4, 'Corentin', 'Chateil', '', 'qsdqsddsfqsd', 10, 'qsdqsdqsdqsd', 'qsdqsd', 1, 1, 2),
(5, 'Corentin', 'Chateil', '', 'qsdqsddsfqsd', 10, 'qsdqsdqsdqsd', 'qsdqsd', 1, 1, 2),
(6, 'Corentin', 'Chateil', '', 'qsdqsddsfqsd', 10, 'qsdqsdqsdqsd', 'qsdqsd', 1, 1, 2),
(7, 'Corentin', 'Chateil', '', '00 ', 7, 'sdfsdfsdf', 'ssdfsdf', 1, 1, 2),
(8, 'Corentin', 'Chateil', '', '00 ', 14, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(9, 'Corentin', 'Chateil', '', '00 ', 14, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(10, 'Corentin', 'Chateil', '', '00 ', 14, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(11, 'Corentin', 'Chateil', '', '00 ', 14, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(12, 'Corentin', 'Chateil', '', '00 ', 14, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(13, 'Corentin', 'Chateil', '', '00 ', 14, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(14, 'Corentin', 'Chateil', '', '00 ', 14, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(15, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdfqsdqsd', 'ssdfsdf', 1, 1, 2),
(16, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(17, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(18, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(19, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(20, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(21, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(22, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(23, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(24, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(25, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(26, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(27, 'Corentin', 'Chateil', '', '00 ', 123123, 'qsdqsd', 'ssdfsdf', 1, 1, 2),
(28, 'Corentin', 'Chateil', '', '00 ', 11, 'qsdqsdqsd', 'qsdqsd', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `bacs`
--

CREATE TABLE IF NOT EXISTS `bacs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `state` tinyint(1) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `bacs`
--

INSERT INTO `bacs` (`id`, `user_id`, `title`, `description`, `modified`, `created`, `state`, `code`) VALUES
(1, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez000'),
(2, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez1'),
(3, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez2'),
(4, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez3'),
(5, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez4'),
(6, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez5'),
(7, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez6'),
(8, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez7'),
(9, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez8'),
(10, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez9'),
(11, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez10'),
(12, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez11'),
(13, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez12'),
(14, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez13'),
(15, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez14'),
(16, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez15'),
(17, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez16'),
(18, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez17'),
(19, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez18'),
(20, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez19'),
(21, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez20'),
(22, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez21'),
(23, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez22'),
(24, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez23'),
(25, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez24'),
(26, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez25'),
(27, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez26'),
(28, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez27'),
(29, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez28'),
(30, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez29'),
(31, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez30'),
(32, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez31'),
(33, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez32'),
(34, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez33'),
(35, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez34'),
(36, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez35'),
(37, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez36'),
(38, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez37'),
(39, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez38'),
(40, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez39'),
(41, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez40'),
(42, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez41'),
(43, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez42'),
(44, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez43'),
(45, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez44'),
(46, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez45'),
(47, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez46'),
(48, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez47'),
(49, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez48'),
(50, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez49'),
(51, 0, '', '', '2014-03-06 12:10:55', '2014-03-06 12:10:55', 0, 'dez50');

-- --------------------------------------------------------

--
-- Structure de la table `bac_delivery`
--

CREATE TABLE IF NOT EXISTS `bac_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) NOT NULL,
  `bac_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `bac_delivery`
--


-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `cities`
--

INSERT INTO `cities` (`id`, `label`, `state`) VALUES
(1, 'Paris', 0),
(2, 'Lyon', 0);

-- --------------------------------------------------------

--
-- Structure de la table `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL COMMENT 'Date de la livraison',
  `state` tinyint(1) DEFAULT NULL COMMENT 'Type de livraison',
  `delivery_id` int(11) DEFAULT NULL COMMENT 'Id de la livraison de retrait, NULL si retrait immédiat',
  `address_id` int(11) DEFAULT NULL,
  `hour_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bac_delivery_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table contenant les livraisons' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `deliveries`
--

INSERT INTO `deliveries` (`id`, `date`, `state`, `delivery_id`, `address_id`, `hour_id`, `order_id`, `user_id`, `bac_delivery_count`) VALUES
(1, '2014-03-06 00:00:00', NULL, NULL, 28, 1, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `hours`
--

CREATE TABLE IF NOT EXISTS `hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `hours`
--

INSERT INTO `hours` (`id`, `start_hour`, `end_hour`, `state`) VALUES
(1, '09:30:00', '12:00:00', 1),
(2, '14:30:00', '18:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `locks`
--

CREATE TABLE IF NOT EXISTS `locks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `locks`
--


-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL COMMENT 'Livraison',
  `address_id` int(11) NOT NULL,
  `date_deposit` datetime NOT NULL,
  `hour_deposit` int(11) NOT NULL,
  `date_withdrawal` datetime NOT NULL,
  `hour_withdrawal` int(11) NOT NULL,
  `nb_bacs` int(11) DEFAULT NULL COMMENT 'Nombre de bac commandé',
  `state` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Permet de gérer les commandes et à lier les différentes livr' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `delivery_id`, `address_id`, `date_deposit`, `hour_deposit`, `date_withdrawal`, `hour_withdrawal`, `nb_bacs`, `state`, `created`, `modified`) VALUES
(1, 2, NULL, 27, '2014-03-06 00:00:00', 0, '2014-03-06 00:00:00', 0, 5, 2, '2014-03-06 22:57:31', '2014-03-06 23:03:41'),
(2, 2, NULL, 28, '2014-03-06 00:00:00', 1, '2014-03-06 00:00:00', 1, 6, 2, '2014-03-06 23:09:59', '2014-03-06 23:13:42');

-- --------------------------------------------------------

--
-- Structure de la table `postals`
--

CREATE TABLE IF NOT EXISTS `postals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `postals`
--

INSERT INTO `postals` (`id`, `label`, `state`, `city_id`) VALUES
(1, '75018', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `rules` tinyint(1) NOT NULL,
  `bac_count` int(11) NOT NULL,
  `order_count` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `rules`, `bac_count`, `order_count`, `role`, `token`, `created`, `modified`, `active`) VALUES
(1, 'user@user.user', '7cd9912330da349edbd8005a9c905b6033d1fb08', 'user', 'user', 0, 0, 0, 0, '61bf57e3a837c7932688e4ee30db6f5d', '2014-03-06 10:41:09', '2014-03-06 21:54:30', 1),
(2, 'admin@admin.admin', 'ff8fa08d63f973515aea4bffae9601e3d412c660', 'admin', 'admin', 0, 0, 0, 91, 'cf617075bcda8446836d0cdd9e3d5744', '2014-03-06 10:41:49', '2014-03-06 10:43:07', 1);
