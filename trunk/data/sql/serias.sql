-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2014 at 10:17 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `serias`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mod_permissions` text COLLATE utf8_unicode_ci,
  `cat_permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `mod_permissions`, `cat_permissions`, `logged_at`, `sort`, `is_active`, `is_featured`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 'handaa.1224@gmail.com', '11611531cc390b3d047142569042fca3', 'news;comment;discuss;category;banner;coupon;quote;quiz;poll;subscriber;admin;user', '19;18;69;63;21;64;23;22;27;26;24;35;32;33;28;31;29;36;37;65;40;39;41;47;48;49;42;43;67;55;54;95;96;97;79;77;76;89;94;88;90;92;93;81;85;83', '0000-00-00 00:00:00', 0, 1, 0, '2011-02-04 15:04:13', '2013-12-06 09:28:33', 0, 0),
(2, 'duuya2012@gmail.com', '', 'news;comment;discuss;category;banner;coupon;quote;quiz;poll;subscriber;admin;user', '19;18;69;63;21;64;23;22;27;26;24;35;32;33;28;31;29;36;37;65;40;39;41;47;48;49;42;43;67;55;54;95;96;97;79;77;76;89;94;88;90;92;93;81;85;83', '0000-00-00 00:00:00', 0, 1, 0, '2011-02-04 15:04:13', '2013-12-06 09:28:29', 0, 0),
(11, 'narantsetseg.d@gmail.com', '11611531cc390b3d047142569042fca3', 'news;comment;discuss;category;banner;coupon;quote;quiz;poll;subscriber;admin;user', '23;22;31;29;96;97;104;108;105;109;106;107', '0000-00-00 00:00:00', 0, 1, 0, '2013-11-30 04:27:48', '2013-12-01 03:20:31', 0, 0),
(12, 'dulamzaya@gmail.com', '11611531cc390b3d047142569042fca3', 'news;comment;discuss;category;banner;coupon;quote;quiz;poll;subscriber;admin;user', '79;77', '0000-00-00 00:00:00', 0, 1, 0, '2013-11-30 04:33:06', '2013-11-30 08:08:34', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'filled with path',
  `target` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-self, 1-blank',
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'defined in constants',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sort` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serias_id` int(11) NOT NULL,
  `link` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'serias|movie|?',
  `route` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `serias_id` (`serias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `links`
--


-- --------------------------------------------------------

--
-- Table structure for table `serias`
--

CREATE TABLE IF NOT EXISTS `serias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'serias|movie|?',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `serias`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`serias_id`) REFERENCES `serias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
