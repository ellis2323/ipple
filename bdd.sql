-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 26 Mars 2014 à 16:39
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `dezordre`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  `street` mediumtext NOT NULL,
  `floor` int(2) NOT NULL,
  `comment` text NOT NULL,
  `digicode` varchar(255) NOT NULL,
  `postal_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `bacs`
--

CREATE TABLE `bacs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `state` int(2) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Contenu de la table `bacs`
--

INSERT INTO `bacs` (`id`, `media_id`, `user_id`, `title`, `description`, `modified`, `created`, `state`, `code`) VALUES
(13, 2, 2, '', 'qdqsd', '2014-03-21 21:46:01', '2014-03-18 20:19:54', 1, 'dez1'),
(14, 0, 2, '', '', '2014-03-21 21:42:49', '2014-03-18 20:19:54', 1, 'dez2'),
(15, 0, 2, '', '', '2014-03-21 21:42:54', '2014-03-18 20:19:54', 1, 'dez3'),
(16, 0, 2, '', '', '2014-03-21 21:42:58', '2014-03-18 20:19:54', 1, 'dez4'),
(17, 0, 2, '', '', '2014-03-21 21:43:02', '2014-03-18 20:19:54', 1, 'dez5'),
(18, 0, 0, '', '', '2014-03-21 21:40:56', '2014-03-18 20:19:54', 0, 'dez6'),
(19, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez7'),
(20, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez8'),
(21, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez9'),
(22, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez10'),
(23, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez11'),
(24, 0, 0, '', '', '2014-03-21 21:29:54', '2014-03-18 20:19:54', 0, 'dez12'),
(25, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez13'),
(26, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez14'),
(27, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez15'),
(28, 0, 0, '', '', '2014-03-21 21:35:41', '2014-03-18 20:19:54', 0, 'dez16'),
(29, 0, 0, '', '', '2014-03-21 21:35:48', '2014-03-18 20:19:54', 0, 'dez17'),
(30, 0, 0, '', '', '2014-03-21 21:35:54', '2014-03-18 20:19:54', 0, 'dez18'),
(31, 0, 0, '', '', '2014-03-21 21:36:01', '2014-03-18 20:19:54', 0, 'dez19'),
(32, 0, 0, '', '', '2014-03-21 21:36:52', '2014-03-18 20:19:54', 0, 'dez20'),
(33, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez21'),
(34, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez22'),
(35, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez23'),
(36, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez24'),
(37, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez25'),
(38, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez26'),
(39, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez27'),
(40, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez28'),
(41, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez29'),
(42, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez30'),
(43, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez31'),
(44, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez32'),
(45, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez33'),
(46, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez34'),
(47, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez35'),
(48, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez36'),
(49, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez37'),
(50, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez38'),
(51, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez39'),
(52, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez40'),
(53, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez41'),
(54, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez42'),
(55, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez43'),
(56, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez44'),
(57, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez45'),
(58, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez46'),
(59, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez47'),
(60, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez48'),
(61, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez49'),
(62, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez50'),
(63, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez51'),
(64, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez52'),
(65, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez53'),
(66, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez54'),
(67, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez55'),
(68, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez56'),
(69, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez57'),
(70, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez58'),
(71, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez59'),
(72, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez60'),
(73, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez61'),
(74, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez62'),
(75, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez63'),
(76, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez64'),
(77, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez65'),
(78, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez66'),
(79, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez67'),
(80, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez68'),
(81, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez69'),
(82, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez70'),
(83, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez71'),
(84, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez72'),
(85, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez73'),
(86, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez74'),
(87, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez75'),
(88, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez76'),
(89, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez77'),
(90, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez78'),
(91, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez79'),
(92, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez80'),
(93, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez81'),
(94, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez82'),
(95, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez83'),
(96, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez84'),
(97, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez85'),
(98, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez86'),
(99, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez87'),
(100, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez88'),
(101, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez89'),
(102, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez90'),
(103, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez91'),
(104, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez92'),
(105, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez93'),
(106, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez94'),
(107, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez95'),
(108, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez96'),
(109, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez97'),
(110, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez98'),
(111, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez99'),
(112, 0, 0, '', '', '2014-03-18 20:19:55', '2014-03-18 20:19:55', 0, 'dez100');

-- --------------------------------------------------------

--
-- Structure de la table `bacs_orders`
--

CREATE TABLE `bacs_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `cities`
--

INSERT INTO `cities` (`id`, `label`, `state`) VALUES
(3, 'Paris', 0),
(4, 'Marseille', 0);

-- --------------------------------------------------------

--
-- Structure de la table `dates_block`
--

CREATE TABLE `dates_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `dates_block`
--

INSERT INTO `dates_block` (`id`, `value`, `type`) VALUES
(1, 1397426399, 5),
(2, 1398290400, 5);

-- --------------------------------------------------------

--
-- Structure de la table `hours`
--

CREATE TABLE `hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `hours`
--

INSERT INTO `hours` (`id`, `start_hour`, `end_hour`, `state`) VALUES
(3, '21:17:00', '23:17:00', 0),
(4, '12:00:00', '15:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `hours_block`
--

CREATE TABLE `hours_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hour_id` int(11) NOT NULL,
  `value` int(2) NOT NULL,
  `type` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `locks`
--

CREATE TABLE `locks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`),
  KEY `ref_id` (`ref_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `ref`, `ref_id`, `file`, `position`) VALUES
(1, 'Bac', 13, '/img/uploads/2014/03/fond_ecran_hd_sexy_blond_allonge_sur_ventre_cheveux_mi_long_wallpaper_desktop_image_picture.jpg', 0),
(2, 'Bac', 13, '/img/uploads/2014/03/Maverick.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `date_deposit` varchar(255) DEFAULT NULL,
  `hour_deposit` int(11) DEFAULT NULL,
  `state_deposit` int(11) DEFAULT NULL,
  `concierge_deposit` tinyint(2) NOT NULL,
  `date_withdrawal` varchar(255) DEFAULT NULL,
  `hour_withdrawal` int(11) DEFAULT NULL,
  `state_withdrawal` int(11) DEFAULT NULL,
  `concierge_withdrawal` tinyint(2) NOT NULL,
  `nb_bacs` int(11) DEFAULT NULL COMMENT 'Nombre de bac commandé',
  `state` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Permet de gérer les commandes et à lier les différentes livr' AUTO_INCREMENT=98 ;

-- --------------------------------------------------------

--
-- Structure de la table `params`
--

CREATE TABLE `params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `params`
--

INSERT INTO `params` (`id`, `key`, `value`) VALUES
(1, 'price_bac_monthly', '6.25'),
(2, 'nb_bac_max', '10'),
(3, 'nb_bac_min', '4'),
(4, 'max_date_withdrawal', '9'),
(5, 'min_date_deposit', '1');

-- --------------------------------------------------------

--
-- Structure de la table `postals`
--

CREATE TABLE `postals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `postals`
--

INSERT INTO `postals` (`id`, `label`, `state`, `city_id`) VALUES
(2, '75000', 0, 4),
(5, '75002', 1, 1),
(6, '78005', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `rules`, `bac_count`, `order_count`, `role`, `token`, `created`, `modified`, `active`) VALUES
(1, 'rpietra@gmail.com', 'f6f765068a7b0033b49cdad2e08f599d08dbc338', '', '', 1, 0, 0, 0, 'a48e0f6d99833fbe6858ccb183fcd343', '2014-03-20 16:04:58', '2014-03-24 10:22:31', 1),
(2, 'admin@admin.admin', 'f6f765068a7b0033b49cdad2e08f599d08dbc338', '', '', 1, 0, 0, 90, '', '2014-03-20 16:11:36', '2014-03-20 19:18:01', 1),
(3, 'laurentmallet@gmail.com', '8c7fd3b2abc66a1b2e110aa592a639d526c64f25', '', '', 1, 0, 0, 0, '', '2014-03-20 19:19:54', '2014-03-21 16:37:27', 1),
(16, 'rpie.tra@gmail.com', 'f6f765068a7b0033b49cdad2e08f599d08dbc338', '', '', 0, 0, 0, 0, 'e0e24beaf3329cd51de2373d13ab2dbd', '2014-03-25 13:57:13', '2014-03-25 13:57:13', 0),
(13, 'corentingc@gmail.Com', '58395719ba91fc17f1eed8e70d1e06d5b7c511d9', '', '', 1, 0, 0, 0, '', '2014-03-22 16:23:06', '2014-03-22 16:37:24', 1),
(14, 'benjamin.fanget@happymove.fr', 'a14c7de1cf75523c363a31d4d0f4a49ff4f40b81', '', '', 1, 0, 0, 0, '', '2014-03-24 10:07:16', '2014-03-24 10:26:45', 1),
(15, 'l.aurentmallet@gmail.com', 'a07776fe329a86574cae68689010b0495bb02b27', '', '', 0, 0, 0, 90, '237781988da8b913a99b318b50ab7a0b', '2014-03-25 13:52:49', '2014-03-25 13:52:49', 1);

