-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2014 at 05:52 PM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dezordre`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `firstname`, `lastname`, `phone`, `company`, `street`, `floor`, `comment`, `digicode`, `postal_id`, `city_id`, `user_id`) VALUES
(1, 'corentin', 'chateil', '0144445500', '', 'dfgfdg', 5, '', '', 2, 3, 6),
(2, 'corentin', 'chateil', '', '', 'qsdqsd', 5, '', '', 2, 3, 6),
(3, 'corentin22', 'chateil', '0144445500', '', 'dsfsdfsdf', 5, '', '', 2, 3, 6),
(4, 'q', 'qsdqsd', '', '', 'sdfsdfsfsdfsd', 2, '', '', 2, 3, 6),
(5, 'corentin', 'chateil', '', '', 'qsdqsdqsdqsdqs', 5, '', '', 2, 3, 6),
(6, 'corentin', 'chateil', '', '', 'dsfsdfsdf', 5, '', '', 2, 3, 6),
(7, 'corentin', 'chateil', '0144445500', '', 'sdfsdfsdf', 5, '', '', 2, 3, 6),
(8, 'corentin', 'chateil', '0144445500', '', 'dfgdfg', 5, '', '', 2, 3, 6),
(9, 'corentin', 'chateil', '', '', 'qqdqd 8', 5, '', '', 2, 3, 6),
(10, 'y', 'pie', '', '', 'fgfffg', 3, '', '', 2, 3, 6),
(11, 'corentin', 'chateil', '0144445500', '', 'xcvcv', 5, '', '', 2, 3, 6),
(12, 'corentinssss', 'chateilsss', '', '', 'qdqsd re qdqdqd qsd', 2, '', '', 2, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `bacs`
--

CREATE TABLE IF NOT EXISTS `bacs` (
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
-- Dumping data for table `bacs`
--

INSERT INTO `bacs` (`id`, `media_id`, `user_id`, `title`, `description`, `modified`, `created`, `state`, `code`) VALUES
(13, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez1'),
(14, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez2'),
(15, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez3'),
(16, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez4'),
(17, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez5'),
(18, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez6'),
(19, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez7'),
(20, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez8'),
(21, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez9'),
(22, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez10'),
(23, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez11'),
(24, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez12'),
(25, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez13'),
(26, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez14'),
(27, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez15'),
(28, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez16'),
(29, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez17'),
(30, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez18'),
(31, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez19'),
(32, 0, 0, '', '', '2014-03-18 20:19:54', '2014-03-18 20:19:54', 0, 'dez20'),
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
-- Table structure for table `bacs_orders`
--

CREATE TABLE IF NOT EXISTS `bacs_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bacs_orders`
--

INSERT INTO `bacs_orders` (`id`, `bac_id`, `order_id`) VALUES
(3, 14, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `label`, `state`) VALUES
(3, 'Paris', 0),
(4, 'Marseille', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dates_block`
--

CREATE TABLE IF NOT EXISTS `dates_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` tinyint(2) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE IF NOT EXISTS `hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `start_hour`, `end_hour`, `state`) VALUES
(3, '21:17:00', '23:17:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hours_block`
--

CREATE TABLE IF NOT EXISTS `hours_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hour_id` int(11) NOT NULL,
  `value` int(2) NOT NULL,
  `type` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locks`
--

CREATE TABLE IF NOT EXISTS `locks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`),
  KEY `ref_id` (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `date_deposit` datetime DEFAULT NULL,
  `hour_deposit` int(11) DEFAULT NULL,
  `state_deposit` int(11) DEFAULT NULL,
  `concierge_deposit` tinyint(1) NOT NULL,
  `date_withdrawal` datetime DEFAULT NULL,
  `hour_withdrawal` int(11) DEFAULT NULL,
  `state_withdrawal` int(11) DEFAULT NULL,
  `concierge_withdrawal` tinyint(1) NOT NULL,
  `nb_bacs` int(11) DEFAULT NULL COMMENT 'Nombre de bac commandé',
  `state` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Permet de gérer les commandes et à lier les différentes livr' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `date_deposit`, `hour_deposit`, `state_deposit`, `concierge_deposit`, `date_withdrawal`, `hour_withdrawal`, `state_withdrawal`, `concierge_withdrawal`, `nb_bacs`, `state`, `created`, `modified`) VALUES
(1, 6, 11, '2014-03-22 00:00:00', 3, 0, 0, NULL, NULL, NULL, 0, 4, 1, '2014-03-19 17:33:59', '2014-03-19 17:33:59'),
(2, 6, 12, '2014-03-22 00:00:00', 3, 0, 1, '2014-03-29 00:00:00', 3, 0, 1, 7, 1, '2014-03-19 17:36:36', '2014-03-19 17:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `params`
--

CREATE TABLE IF NOT EXISTS `params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `params`
--

INSERT INTO `params` (`id`, `key`, `value`) VALUES
(1, 'price_bac_monthly', '6.25'),
(2, 'nb_bac_max', '10'),
(3, 'nb_bac_min', '4');

-- --------------------------------------------------------

--
-- Table structure for table `postals`
--

CREATE TABLE IF NOT EXISTS `postals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `postals`
--

INSERT INTO `postals` (`id`, `label`, `state`, `city_id`) VALUES
(2, '75000', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `rules`, `bac_count`, `order_count`, `role`, `token`, `created`, `modified`, `active`) VALUES
(6, 'admin@admin.admin', 'ff8fa08d63f973515aea4bffae9601e3d412c660', '', '', 1, 0, 0, 90, '0f4ec3c7f59b6346e2c0f3a521db89fc', '2014-03-14 11:49:43', '2014-03-17 10:55:40', 1),
(7, '1@qq5.glourk', '464d46b0a614af1f55efe184f76f3b0caf29f3fb', '', '', 0, 0, 0, 0, 'b252c30fee2074366c66db6257af8f7a', '2014-03-14 14:19:52', '2014-03-14 14:19:52', 0),
(8, '1@qq5.glourkm', '464d46b0a614af1f55efe184f76f3b0caf29f3fb', '', '', 0, 0, 0, 0, '3df36fce007ff45c8739bcc5bcf78e88', '2014-03-14 14:22:08', '2014-03-14 14:22:08', 0),
(9, 'test@test.test', '6d0d914eb0dd5b84bb092f568684e35e0c70e946', '', '', 0, 0, 0, 0, '162fe881c0afa0d599e1cfee746d708c', '2014-03-15 18:45:11', '2014-03-15 18:45:11', 0),
(10, 'test@e3b.org', '1e8912b23578ebb42820e31fb6364f63bb51e6a8', '', '', 0, 0, 0, 0, '', '2014-03-15 18:49:03', '2014-03-15 18:50:17', 1),
(11, 'user@user.user', '7cd9912330da349edbd8005a9c905b6033d1fb08', '', '', 1, 0, 0, 0, '7acd055cfc4a82ef311a3f6b809fbe02', '2014-03-17 10:56:29', '2014-03-17 11:04:59', 1),
(12, 'testus@e3b.org', '6d0d914eb0dd5b84bb092f568684e35e0c70e946', '', '', 0, 0, 0, 0, '', '2014-03-17 17:19:27', '2014-03-17 17:19:27', 1),
(13, 'rpietra@gmail.com', 'c7ebc4a8579b44a50ed2838562d6732a452de198', '', '', 0, 0, 0, 0, '8ef7e6dac8528188e2be815467a97e5a', '2014-03-18 11:02:12', '2014-03-18 11:02:12', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
