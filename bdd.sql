-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2014 at 05:50 PM
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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `firstname`, `lastname`, `phone`, `company`, `street`, `floor`, `comment`, `digicode`, `postal_id`, `city_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Regis', 'PIETRASZEWSKI', '3364540731', '', '76 rue saint didier', 0, 'kill regis', 'ret', 5, 3, 3, '2014-03-20 19:32:49', '2014-03-20 19:32:49'),
(2, '456456', 'cahteil', '0102030405', '', 'qsdqdqsd', 0, '', '', 2, 3, 2, '2014-03-20 19:35:44', '2014-03-20 19:35:44'),
(3, 'Regis', 'PIETRASZEWSKI', '3364540731', '', '76 rue saint didier', 3, 'yiyi', 'yuyu', 2, 3, 1, '2014-03-21 10:43:49', '2014-03-21 10:43:49'),
(4, 'Regis', 'PIETRASZEWSKI', '3364540731', '', '76 rue saint didier', 3, 'yiyiyiyi', 'yuyu', 5, 3, 1, '2014-03-21 10:44:09', '2014-03-21 13:15:53'),
(5, '456456', 'cahteil', '0102030405', '', 'qsdqdqsd', 0, '', '', 2, 3, 2, '2014-03-21 11:15:39', '2014-03-21 16:49:00'),
(6, 'Regis', 'PIETRASZEWSKI', '3364540731', '', '76 rue saint didier', 3, 'yiyiyiyi', 'yuyu', 5, 3, 1, '2014-03-21 13:17:48', '2014-03-21 14:25:27'),
(7, 'Regis', 'PIETRASZEWSKI', '3364540731', 'lklk', '76 rue saint roger', 3, 'to\r\nh\r\nh\r\nh\r\nh\r\nh\r\nh\r\nh\r\nh\r\nh\r\n', 'yuyu', 5, 3, 1, '2014-03-21 15:11:02', '2014-03-21 17:31:41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dates_block`
--

INSERT INTO `dates_block` (`id`, `value`, `type`) VALUES
(1, 3, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Permet de gérer les commandes et à lier les différentes livr' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `date_deposit`, `hour_deposit`, `state_deposit`, `concierge_deposit`, `date_withdrawal`, `hour_withdrawal`, `state_withdrawal`, `concierge_withdrawal`, `nb_bacs`, `state`, `created`, `modified`) VALUES
(1, 3, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, '2014-03-20 19:32:57', '2014-03-20 19:32:57'),
(2, 3, 1, '2014-03-29 00:00:00', 3, 0, 0, NULL, NULL, 0, 0, 7, 1, '2014-03-20 19:32:57', '2014-03-20 19:32:57'),
(3, 2, 2, '2014-03-29 00:00:00', 3, 0, 0, NULL, NULL, 0, 0, 8, 1, '2014-03-20 19:35:49', '2014-03-20 19:35:49'),
(4, 1, 4, '25-03-2014', 3, 0, 0, '2014-03-28 00:00:00', 3, 1, 0, 5, 1, '2014-03-21 10:44:15', '2014-03-21 13:15:53'),
(5, 2, 5, '28-06-2014', 3, 0, 1, '29-03-2014', 3, 1, 0, 8, 1, '2014-03-21 11:15:48', '2014-03-21 16:49:00'),
(6, 1, 6, '25-03-2014', 3, 0, 0, '26-03-2014', 3, 0, 0, 5, 1, '2014-03-21 13:18:02', '2014-03-21 14:25:27'),
(7, 1, 7, '26-03-2014', 3, 1, 0, '30-03-2014', 3, 1, 0, 5, 1, '2014-03-21 15:11:20', '2014-03-21 17:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `params`
--

CREATE TABLE IF NOT EXISTS `params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `params`
--

INSERT INTO `params` (`id`, `key`, `value`) VALUES
(1, 'price_bac_monthly', '6.25'),
(2, 'nb_bac_max', '10'),
(3, 'nb_bac_min', '4'),
(4, 'max_date_withdrawal', '8'),
(5, 'min_date_deposit', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `postals`
--

INSERT INTO `postals` (`id`, `label`, `state`, `city_id`) VALUES
(2, '75000', 0, 4),
(5, '75002', 1, 1),
(6, '78005', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `rules`, `bac_count`, `order_count`, `role`, `token`, `created`, `modified`, `active`) VALUES
(1, 'rpietra@gmail.com', '3efb6a65d6d0559f7d59bed9b5216384d8d3e509', '', '', 1, 0, 0, 0, 'a48e0f6d99833fbe6858ccb183fcd343', '2014-03-20 16:04:58', '2014-03-21 15:50:38', 1),
(2, 'admin@admin.admin', '9202ec82c91242c5f4ff29f27bd6b63425ca4b9e', '', '', 1, 0, 0, 0, '', '2014-03-20 16:11:36', '2014-03-20 19:18:01', 1),
(3, 'laurentmallet@gmail.com', '8c7fd3b2abc66a1b2e110aa592a639d526c64f25', '', '', 1, 0, 0, 0, '', '2014-03-20 19:19:54', '2014-03-21 16:37:27', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
