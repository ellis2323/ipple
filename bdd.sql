-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2014 at 10:35 AM
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
  `street` mediumtext NOT NULL,
  `floor` int(2) NOT NULL,
  `comment` text NOT NULL,
  `digicode` varchar(255) NOT NULL,
  `postal_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `firstname`, `lastname`, `phone`, `street`, `floor`, `comment`, `digicode`, `postal_id`, `city_id`, `user_id`) VALUES
(1, 'Corentin', 'Chateil', '', '00 ', 6, 'qsqsdqsd', 'ssdfsdf', 1, 1, 2),
(2, 'Corentin', 'Chateil', '', '00 ', 5, 'zerzer', 'zerzer', 1, 1, 2),
(3, 'Corentin', 'Chateil', '', '00 ', 5, 'qsdd', 'ssdfsdf', 1, 1, 2),
(4, 'Corentin', 'Chateil', '', '00 ', 6, '<wx<wx<wx', '<<x<w', 1, 1, 4),
(5, 'Clodo', 'Pedro', '', '1 rue des corbeaux', 5, 'Babedidouu', 'A1957', 1, 1, 0),
(6, 'Corentin', 'Chateil', '', '00 ', 5, 'zeazeazeaez', 'ssdfsdf', 1, 1, 2),
(7, 'Corentin', 'Chateil', '', '00 ', 4, 'qsdqsd', 'qsdqsd', 1, 1, 2),
(8, 'Corentin', 'Chateil', '', '00 ', 5, 'qdqssd', 'ssdfsdf', 1, 1, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `bacs`
--

INSERT INTO `bacs` (`id`, `media_id`, `user_id`, `title`, `description`, `modified`, `created`, `state`, `code`) VALUES
(1, 5, 2, 'Titre du bac 1', 'Description du bac 2\r\n', '2014-03-10 11:35:06', '2014-03-09 02:40:50', 1, 'test1'),
(2, 1, 2, 'Titre du bac', 'Description du bac', '2014-03-10 01:14:52', '2014-03-09 02:40:50', 3, 'test2'),
(3, 0, 2, '', '', '2014-03-10 01:10:45', '2014-03-09 02:40:50', 0, 'test3'),
(4, 0, 2, '', '', '2014-03-10 01:13:39', '2014-03-09 02:40:50', 0, 'test4'),
(5, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test5'),
(6, 0, 2, '', '', '2014-03-09 17:26:38', '2014-03-09 02:40:50', 0, 'test6'),
(7, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test7'),
(8, 0, 2, 'Test', 'qdqsdqsd', '2014-03-09 15:33:39', '2014-03-09 02:40:50', 0, 'test8'),
(9, 0, 2, '', '', '2014-03-10 01:15:29', '2014-03-09 02:40:50', 3, 'test9'),
(10, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test10'),
(11, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test11'),
(12, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test12'),
(13, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test13'),
(14, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test14'),
(15, 0, 2, '', '', '2014-03-09 17:06:01', '2014-03-09 02:40:50', 0, 'test15'),
(16, 0, 2, '', '', '2014-03-10 01:15:29', '2014-03-09 02:40:50', 3, 'test16'),
(17, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test17'),
(18, 0, 2, '', '', '2014-03-10 01:11:26', '2014-03-09 02:40:50', 0, 'test18'),
(19, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test19'),
(20, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test20'),
(21, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test21'),
(22, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test22'),
(23, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test23'),
(24, 0, 2, '', '', '2014-03-10 01:15:29', '2014-03-09 02:40:50', 3, 'test24'),
(25, 0, 2, '', '', '2014-03-09 17:26:15', '2014-03-09 02:40:50', 0, 'test25'),
(26, 0, 2, '', '', '2014-03-09 17:19:04', '2014-03-09 02:40:50', 0, 'test26'),
(27, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test27'),
(28, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test28'),
(29, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test29'),
(30, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test30'),
(31, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test31'),
(32, 0, 2, '', '', '2014-03-10 01:15:29', '2014-03-09 02:40:50', 3, 'test32'),
(33, 0, 2, '', '', '2014-03-10 01:15:29', '2014-03-09 02:40:50', 3, 'test33'),
(34, 0, 2, '', '', '2014-03-10 01:15:29', '2014-03-09 02:40:50', 3, 'test34'),
(35, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test35'),
(36, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test36'),
(37, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test37'),
(38, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test38'),
(39, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test39'),
(40, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test40'),
(41, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test41'),
(42, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test42'),
(43, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test43'),
(44, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test44'),
(45, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test45'),
(46, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test46'),
(47, 0, 2, '', '', '2014-03-09 02:40:50', '2014-03-09 02:40:50', 0, 'test47'),
(48, 0, 2, '', '', '2014-03-09 17:35:05', '2014-03-09 02:40:50', 0, 'test48'),
(49, 0, 2, '', '', '2014-03-10 01:14:52', '2014-03-09 02:40:50', 3, 'test49'),
(50, 0, 2, '', '', '2014-03-10 01:14:52', '2014-03-09 02:40:50', 3, 'test50');

-- --------------------------------------------------------

--
-- Table structure for table `bacs_orders`
--

CREATE TABLE IF NOT EXISTS `bacs_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bacs_orders`
--

INSERT INTO `bacs_orders` (`id`, `bac_id`, `order_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 49, 1),
(4, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `label`, `state`) VALUES
(1, 'Paris', 0),
(2, 'Marseille', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `start_hour`, `end_hour`, `state`) VALUES
(1, '10:31:00', '12:00:00', 1),
(2, '14:30:00', '18:00:00', 0);

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

--
-- Dumping data for table `locks`
--

INSERT INTO `locks` (`id`, `bac_id`, `created`, `modified`) VALUES
(1, 15, '2014-03-09 17:00:06', '2014-03-09 17:00:51');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `ref`, `ref_id`, `file`, `position`) VALUES
(1, 'Bac', 2, '/img/uploads/2014/03/8641.jpg', 2),
(2, 'Bac', 2, '/img/uploads/2014/03/1380459_530044937073513_841769712_n.jpg', 3),
(3, 'Bac', 2, '/img/uploads/2014/03/yeah_science_bitch_meme.jpg', 1),
(4, 'Bac', 1, '/img/uploads/2014/03/1545766_10201068079799364_541670278_n.jpg', 3),
(5, 'Bac', 1, '/img/uploads/2014/03/yeah_science_bitch_meme-1.jpg', 2);

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
  `date_withdrawal` datetime DEFAULT NULL,
  `hour_withdrawal` int(11) DEFAULT NULL,
  `state_withdrawal` int(11) DEFAULT NULL,
  `nb_bacs` int(11) DEFAULT NULL COMMENT 'Nombre de bac commandé',
  `state` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Permet de gérer les commandes et à lier les différentes livr' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `date_deposit`, `hour_deposit`, `state_deposit`, `date_withdrawal`, `hour_withdrawal`, `state_withdrawal`, `nb_bacs`, `state`, `created`, `modified`) VALUES
(1, 2, 0, '2014-09-03 00:00:00', NULL, NULL, '2014-09-04 00:00:00', NULL, NULL, 10, 3, '2014-03-10 16:31:31', '2014-03-10 17:33:14'),
(3, 0, 0, NULL, NULL, NULL, '2014-03-10 00:00:00', NULL, NULL, 4, NULL, '2014-03-10 16:53:16', '2014-03-10 16:53:16'),
(4, 0, 0, '2014-03-10 00:00:00', NULL, NULL, NULL, NULL, NULL, 4, NULL, '2014-03-10 16:53:47', '2014-03-10 16:53:47'),
(5, 0, 0, '2024-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, 4, NULL, '2014-03-10 16:55:02', '2014-03-10 16:55:02'),
(6, 0, 0, '2024-02-01 00:00:00', NULL, NULL, NULL, NULL, NULL, 4, NULL, '2014-03-10 16:55:45', '2014-03-10 16:55:45'),
(7, 0, 0, '2024-02-07 00:00:00', NULL, NULL, NULL, NULL, NULL, 4, NULL, '2014-03-10 16:56:09', '2014-03-10 16:56:09'),
(8, 0, 0, '2024-02-09 00:00:00', NULL, NULL, NULL, NULL, NULL, 4, NULL, '2014-03-10 16:56:20', '2014-03-10 16:56:20'),
(9, 0, 0, '2014-03-10 00:00:00', NULL, NULL, NULL, NULL, NULL, 5, NULL, '2014-03-10 16:59:35', '2014-03-10 16:59:35');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `postals`
--

INSERT INTO `postals` (`id`, `label`, `state`, `city_id`) VALUES
(1, '75018', 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `rules`, `bac_count`, `order_count`, `role`, `token`, `created`, `modified`, `active`) VALUES
(2, 'admin@admin.admin', 'ff8fa08d63f973515aea4bffae9601e3d412c660', 'admin', 'admin', 0, 0, 0, 91, 'cf617075bcda8446836d0cdd9e3d5744', '2014-03-06 10:41:49', '2014-03-09 03:04:07', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
