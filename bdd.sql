-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Serveur: db517293562.db.1and1.com
-- Généré le : Samedi 15 Mars 2014 à 19:00
-- Version du serveur: 5.1.73
-- Version de PHP: 5.3.3-7+squeeze19
-- 
-- Base de données: `db517293562`
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- 
-- Contenu de la table `addresses`
-- 

INSERT INTO `addresses` VALUES (22, 'qsdqsd', 'chateil', '555', '', 'qsdqsd', 5, '', '', 2, 3, 6);
INSERT INTO `addresses` VALUES (23, 'qsdqsd', 'chateil', '544656', '', 'qdqd', 5, '', '', 2, 3, 6);
INSERT INTO `addresses` VALUES (24, 'q', 'xwcwc', '5555', '', 'wxcwxc', 5, '', '', 2, 3, 6);
INSERT INTO `addresses` VALUES (25, 'Corentin', 'Chateil', '0000000000', '', '00 ', 2, '', '', 2, 3, 6);
INSERT INTO `addresses` VALUES (26, 'dqsdqsd', 'Chateill', 'zaze', 'azeaze', 'azezae', 0, '', '', 2, 3, 6);
INSERT INTO `addresses` VALUES (27, 'dqsdqsd', 'Chateill', 'zaze', 'azeaze', 'azezae', 0, '', '', 2, 3, 6);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Contenu de la table `bacs`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `bacs_orders`
-- 

CREATE TABLE `bacs_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `bacs_orders`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `cities`
-- 

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `cities`
-- 

INSERT INTO `cities` VALUES (3, 'Paris', 0);
INSERT INTO `cities` VALUES (4, 'Marseille', 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `dates_block`
-- 

CREATE TABLE `dates_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` tinyint(2) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `dates_block`
-- 


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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `hours`
-- 

INSERT INTO `hours` VALUES (3, '21:17:00', '23:17:00', 0);

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

-- 
-- Contenu de la table `hours_block`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `locks`
-- 

CREATE TABLE `locks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `locks`
-- 


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `medias`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `orders`
-- 

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `date_deposit` datetime DEFAULT NULL,
  `hour_deposit` int(11) DEFAULT NULL,
  `state_deposit` int(11) DEFAULT NULL,
  `date_withdrawal` datetime DEFAULT NULL,
  `hour_withdrawal` int(11) DEFAULT NULL,
  `state_withdrawal` int(11) DEFAULT NULL,
  `nb_bacs` int(11) DEFAULT NULL COMMENT 'Nombre de bac commandé',
  `state` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Permet de gérer les commandes et à lier les différentes livr' AUTO_INCREMENT=13 ;

-- 
-- Contenu de la table `orders`
-- 

INSERT INTO `orders` VALUES (7, 6, 22, '2014-03-01 00:00:00', 3, NULL, NULL, NULL, NULL, 4, 1, '2014-03-14 13:17:55', '2014-03-14 13:21:27');
INSERT INTO `orders` VALUES (8, 6, 23, '2014-03-07 00:00:00', 1, NULL, NULL, NULL, NULL, 4, 1, '2014-03-14 13:48:26', '2014-03-14 13:48:26');
INSERT INTO `orders` VALUES (9, 6, 24, '2014-03-15 00:00:00', 1, NULL, NULL, NULL, NULL, 4, 1, '2014-03-14 15:04:09', '2014-03-14 15:04:09');
INSERT INTO `orders` VALUES (10, 6, 25, '2014-03-29 00:00:00', 1, NULL, NULL, NULL, NULL, 6, 1, '2014-03-14 22:13:11', '2014-03-14 22:13:11');
INSERT INTO `orders` VALUES (11, 6, 26, '2014-03-01 00:00:00', 1, NULL, NULL, NULL, NULL, 4, 1, '2014-03-15 18:35:22', '2014-03-15 18:35:22');
INSERT INTO `orders` VALUES (12, 6, 27, '2014-03-01 00:00:00', 1, NULL, NULL, NULL, NULL, 4, 1, '2014-03-15 18:36:54', '2014-03-15 18:36:54');

-- --------------------------------------------------------

-- 
-- Structure de la table `params`
-- 

CREATE TABLE `params` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `params`
-- 

INSERT INTO `params` VALUES (0, 'price_bac_monthly', '6.25');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `postals`
-- 

INSERT INTO `postals` VALUES (2, '75000', 0, 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Contenu de la table `users`
-- 

INSERT INTO `users` VALUES (6, 'admin@admin.admin', 'ff8fa08d63f973515aea4bffae9601e3d412c660', '', '', 0, 0, 0, 90, '0f4ec3c7f59b6346e2c0f3a521db89fc', '2014-03-14 11:49:43', '2014-03-14 11:49:43', 1);
INSERT INTO `users` VALUES (7, '1@qq5.glourk', '464d46b0a614af1f55efe184f76f3b0caf29f3fb', '', '', 0, 0, 0, 0, 'b252c30fee2074366c66db6257af8f7a', '2014-03-14 14:19:52', '2014-03-14 14:19:52', 0);
INSERT INTO `users` VALUES (8, '1@qq5.glourkm', '464d46b0a614af1f55efe184f76f3b0caf29f3fb', '', '', 0, 0, 0, 0, '3df36fce007ff45c8739bcc5bcf78e88', '2014-03-14 14:22:08', '2014-03-14 14:22:08', 0);
INSERT INTO `users` VALUES (9, 'test@test.test', '6d0d914eb0dd5b84bb092f568684e35e0c70e946', '', '', 0, 0, 0, 0, '162fe881c0afa0d599e1cfee746d708c', '2014-03-15 18:45:11', '2014-03-15 18:45:11', 0);
INSERT INTO `users` VALUES (10, 'test@e3b.org', '1e8912b23578ebb42820e31fb6364f63bb51e6a8', '', '', 0, 0, 0, 0, '', '2014-03-15 18:49:03', '2014-03-15 18:50:17', 1);
