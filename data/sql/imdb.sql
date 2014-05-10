-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2014 at 05:36 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imdb`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'serias|movie|?',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `type`, `title`, `route`, `image`, `year`, `summary`, `body`, `sort`, `nb_views`, `is_active`, `is_featured`, `created_aid`, `updated_aid`, `created_at`, `updated_at`) VALUES
(1, 'movie', 'Neighbors', 'neighbors', '7adda305aada1f86de72a37d8c540947e32b45f6.jpg', 2014, 'A couple with a newborn baby face unexpected difficulties after they are forced to live next to a fraternity house.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:10:00', '0000-00-00 00:00:00'),
(2, 'movie', 'Chef', 'chef', 'fe3f3e62ae96950244deb0f56cb1cc675b6f989e.jpg', 2014, 'A chef who loses his restaurant job starts up a food truck in an effort to reclaim his creative promise, while piecing back together his estranged family.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:14:47', '0000-00-00 00:00:00'),
(3, 'movie', 'The Internship', 'the-internship', 'f0d5bc3a6014a7677d1fd6d69573e8bcf8c22619.jpg', 2013, 'Two salesmen whose careers have been torpedoed by the digital age find their way into a coveted internship at Google, where they must compete with a group of young, tech-savvy geniuses for a shot at employment.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:15:17', '0000-00-00 00:00:00'),
(4, 'movie', 'We''re the Millers', 'we-re-the-millers', 'a20d140e6e065d1c8cf9ef67b7da945f1bb01004.jpg', 2013, 'A veteran pot dealer creates a fake family as part of his plan to move a huge shipment of weed into the U.S. from Mexico.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:16:31', '0000-00-00 00:00:00'),
(5, 'movie', 'The Amazing Spider-Man', 'the-amazing-spider-man', '1ec0fa008da27978b7cd6a6733a65cf4e36be878.jpg', 2014, 'eter Parker runs the gauntlet as the mysterious company Oscorp sends up a slew of supervillains against him, impacting on his life.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:17:12', '0000-00-00 00:00:00'),
(6, 'movie', 'The Heat (I)', 'the-heat-i', '23e10844d23a477eb0c16f144a0957ee3e39e891.jpg', 2013, 'An uptight FBI Special Agent is paired with a foul-mouthed Boston cop to take down a ruthless drug lord.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:17:51', '0000-00-00 00:00:00'),
(7, 'movie', 'The Way Way Back', 'the-way-way-back', 'f1e945654f3433c9200dfde8fd7aa67e3fbc32e4.jpg', 2013, 'Shy 14-year-old Duncan goes on summer vacation with his mother, her overbearing boyfriend, and her boyfriend''s daughter. Having a rough time fitting in, Duncan finds an unexpected friend in Owen, manager of the Water Wizz water park.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:18:55', '0000-00-00 00:00:00'),
(8, 'movie', 'Thor: The Dark World', 'thor-the-dark-world', '7379cde8b5ac4cd445cef7cf54289c5680d843b4.jpg', 2013, 'When Jane Foster is possessed by a great power, Thor must protect her from a new threat of old times: the Dark Elves.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:23:42', '0000-00-00 00:00:00'),
(9, 'movie', 'Hellboy', 'hellboy', '4df3471f0381f9e8254d803b6ecc579b7ecbdc20.jpg', 2004, 'A demon, raised from infancy after being conjured by and rescued from the Nazis, grows up to become a defender against the forces of darkness.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:24:21', '0000-00-00 00:00:00'),
(10, 'series', 'Game of Thrones', 'game-of-thrones', '8ffc0e2809677c62849e80fb4e5836cf7dd04d36.jpg', 2011, 'Seven noble families fight for control of the mythical land of Westeros.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 13:51:35', '0000-00-00 00:00:00'),
(11, 'series', 'True Blood', 'true-blood', '347100cc3cb6e573928df855fa51687429b9ae13.jpg', 2008, 'Telepathic waitress Sookie Stackhouse encounters a strange new supernatural world when she meets the mysterious Bill, a southern Louisiana gentleman and vampire.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 14:00:51', '0000-00-00 00:00:00'),
(12, 'series', 'Joan of Arcadia', 'joan-of-arcadia', 'bbf7ac2dd9a2f04e4ef2ae8390ee73bb13461eb8.jpg', 2003, 'Millions of people speak to God. What if God spoke back? Life just got a hell of a lot more confusing for teenage Joan Girardi, who already deals with feeling out of place in her family', '', 0, 0, 1, 0, 0, 0, '2014-05-10 14:01:41', '0000-00-00 00:00:00'),
(13, 'series', 'The Listener', 'the-listener', '360ec83bf97835df6ec22d8e9a176d7401a9ef32.jpg', 2009, 'A young paramedic discovers he has telepathic powers', '', 0, 0, 1, 0, 0, 0, '2014-05-10 14:05:15', '0000-00-00 00:00:00'),
(14, 'series', 'Eastwick', 'eastwick', '5c21c4fe73ff9f965b8e1c8314eceaec9524d6d0.jpg', 2009, 'A mysterious man bestows unique powers to three women.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 14:06:05', '0000-00-00 00:00:00'),
(15, 'series', 'Ghost Whisperer', 'ghost-whisperer', 'daed8151fa2cc16da235237693efae7303067dcc.jpg', 2005, 'A newlywed with the ability to communicate with the earthbound spirits of the recently deceased overcomes skepticism and doubt to help send their important messages to the living and allow the dead to pass on to the other side.', '', 0, 0, 1, 0, 0, 0, '2014-05-10 14:06:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
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
-- Dumping data for table `link`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_1` FOREIGN KEY (`serias_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
