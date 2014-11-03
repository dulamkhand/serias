-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2014 at 01:04 AM
-- Server version: 5.5.40-36.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `urinesse_imdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `mod_permissions`, `cat_permissions`, `logged_at`, `sort`, `is_active`, `is_featured`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 'handaa.1224@gmail.com', '11611531cc390b3d047142569042fca3', 'item;link;admin', '', '0000-00-00 00:00:00', 0, 1, 0, '2011-02-04 22:04:13', '2014-11-03 04:12:49', 0, 0),
(2, 'duuya2012@gmail.com', '', NULL, '', '0000-00-00 00:00:00', 0, 0, 0, '2011-02-04 22:04:13', '2014-11-03 04:12:32', 0, 0),
(11, 'narantsetseg.d@gmail.com', '', 'item;link', '', '0000-00-00 00:00:00', 0, 1, 0, '2013-11-30 11:27:48', '2014-11-03 04:12:41', 0, 0),
(12, 'dulamzaya@gmail.com', '', NULL, '', '0000-00-00 00:00:00', 0, 0, 0, '2013-11-30 11:33:06', '2014-11-03 04:12:18', 0, 0),
(13, 'batsukhd.mn@gmail.com', '11611531cc390b3d047142569042fca3', 'item;link', '', '0000-00-00 00:00:00', 0, 1, 0, '2014-11-03 04:13:04', '2014-11-03 04:13:04', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'not used in url yet',
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `backcolor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forecolor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `parent_id` (`parent_id`),
  KEY `position` (`position`),
  KEY `route` (`route`),
  KEY `route_2` (`route`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=112 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `parent_id`, `parent_name`, `name`, `route`, `position`, `sort`, `backcolor`, `forecolor`, `is_active`, `updated_at`) VALUES
(1, 'movie', 0, '', 'Кино', 'movie', '2', 8, '#000', '#fff', 1, '0000-00-00 00:00:00'),
(2, 'series', 0, '', 'Олон ангит', 'series', '3', 1, '#000', '#fff', 1, '0000-00-00 00:00:00'),
(3, 'tvshow', 0, '', 'ТВ шоу', 'tvshow', '4', 1, '#000', '#fff', 1, '0000-00-00 00:00:00'),
(4, 'mn', 0, '', 'Монгол кинл', 'mn', '5', 1, '#000', '#fff', 1, '0000-00-00 00:00:00'),
(5, 'nonfiction', 0, '', 'Баримтат кино', 'nonfiction', '3', 1, '#000', '#fff', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

DROP TABLE IF EXISTS `episode`;
CREATE TABLE IF NOT EXISTS `episode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'serias|movie|?',
  `genre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `year_end` year(4) NOT NULL,
  `summary` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `studios` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_seasons` int(11) NOT NULL,
  `nb_episodes` int(11) NOT NULL,
  `official_link1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `official_link2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `casts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `boxoffice` tinyint(2) NOT NULL,
  `thisweek` tinyint(1) NOT NULL,
  `comingsoon` tinyint(1) NOT NULL,
  `source` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `type`, `genre`, `title`, `route`, `image`, `year`, `year_end`, `summary`, `body`, `trailer`, `rating`, `duration`, `age`, `studios`, `director`, `writer`, `nb_seasons`, `nb_episodes`, `official_link1`, `official_link2`, `release_date`, `casts`, `sort`, `nb_views`, `is_active`, `is_featured`, `boxoffice`, `thisweek`, `comingsoon`, `source`, `created_aid`, `updated_aid`, `created_at`, `updated_at`) VALUES
(1, 'movie', 'comedy', 'Neighbors', 'neighbors-2014', '7adda305aada1f86de72a37d8c540947e32b45f6.jpg', 2014, 0000, 'A couple with a newborn baby face unexpected difficulties after they are forced to live next to a fraternity house.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt2004420" data-style="p2"><a href="http://www.imdb.com/title/tt2004420/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="Neighbors (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 1, 1, 1, 1, '', 0, 0, '2014-05-10 20:10:00', '0000-00-00 00:00:00'),
(2, 'movie', '', 'Chef', 'chef', 'fe3f3e62ae96950244deb0f56cb1cc675b6f989e.jpg', 2014, 0000, 'A chef who loses his restaurant job starts up a food truck in an effort to reclaim his creative promise, while piecing back together his estranged family.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 20:14:47', '0000-00-00 00:00:00'),
(3, 'movie', '', 'The Internship', 'the-internship', 'f0d5bc3a6014a7677d1fd6d69573e8bcf8c22619.jpg', 2013, 0000, 'Two salesmen whose careers have been torpedoed by the digital age find their way into a coveted internship at Google, where they must compete with a group of young, tech-savvy geniuses for a shot at employment.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 20:15:17', '0000-00-00 00:00:00'),
(4, 'movie', '', 'We''re the Millers', 'we-re-the-millers', 'a20d140e6e065d1c8cf9ef67b7da945f1bb01004.jpg', 2013, 0000, 'A veteran pot dealer creates a fake family as part of his plan to move a huge shipment of weed into the U.S. from Mexico.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 20:16:31', '0000-00-00 00:00:00'),
(5, 'movie', 'adventure', 'The Amazing Spider-Man', 'the-amazing-spider-man-2014', '1ec0fa008da27978b7cd6a6733a65cf4e36be878.jpg', 2014, 0000, 'Peter Parker runs the gauntlet as the mysterious company Oscorp sends up a slew of supervillains against him, impacting on his life.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt1872181" data-style="p2"><a href="http://www.imdb.com/title/tt1872181/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="The Amazing Spider-Man 2 (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 1, 2, 0, 0, '', 0, 0, '2014-05-10 20:17:12', '0000-00-00 00:00:00'),
(6, 'movie', '', 'The Heat (I)', 'the-heat-i', '23e10844d23a477eb0c16f144a0957ee3e39e891.jpg', 2013, 0000, 'An uptight FBI Special Agent is paired with a foul-mouthed Boston cop to take down a ruthless drug lord.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 20:17:51', '0000-00-00 00:00:00'),
(7, 'movie', '', 'The Way Way Back', 'the-way-way-back', 'f1e945654f3433c9200dfde8fd7aa67e3fbc32e4.jpg', 2013, 0000, 'Shy 14-year-old Duncan goes on summer vacation with his mother, her overbearing boyfriend, and her boyfriend''s daughter. Having a rough time fitting in, Duncan finds an unexpected friend in Owen, manager of the Water Wizz water park.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 20:18:55', '0000-00-00 00:00:00'),
(8, 'movie', '', 'Thor: The Dark World', 'thor-the-dark-world', '7379cde8b5ac4cd445cef7cf54289c5680d843b4.jpg', 2013, 0000, 'When Jane Foster is possessed by a great power, Thor must protect her from a new threat of old times: the Dark Elves.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 20:23:42', '0000-00-00 00:00:00'),
(9, 'movie', '', 'Hellboy', 'hellboy', '4df3471f0381f9e8254d803b6ecc579b7ecbdc20.jpg', 2004, 0000, 'A demon, raised from infancy after being conjured by and rescued from the Nazis, grows up to become a defender against the forces of darkness.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 20:24:21', '0000-00-00 00:00:00'),
(10, 'series', 'adventure', 'Game of Thrones', 'game-of-thrones-2011', '8ffc0e2809677c62849e80fb4e5836cf7dd04d36.jpg', 2011, 0000, 'Seven noble families fight for control of the mythical land of Westeros.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt0944947" data-style="p2"><a href="http://www.imdb.com/title/tt0944947/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="Game of Thrones (2011) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 1, 0, 0, 0, '', 0, 0, '2014-05-10 20:51:35', '0000-00-00 00:00:00'),
(11, 'series', '', 'True Blood', 'true-blood', '347100cc3cb6e573928df855fa51687429b9ae13.jpg', 2008, 0000, 'Telepathic waitress Sookie Stackhouse encounters a strange new supernatural world when she meets the mysterious Bill, a southern Louisiana gentleman and vampire.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 21:00:51', '0000-00-00 00:00:00'),
(12, 'series', '', 'Joan of Arcadia', 'joan-of-arcadia', 'bbf7ac2dd9a2f04e4ef2ae8390ee73bb13461eb8.jpg', 2003, 0000, 'Millions of people speak to God. What if God spoke back? Life just got a hell of a lot more confusing for teenage Joan Girardi, who already deals with feeling out of place in her family', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 21:01:41', '0000-00-00 00:00:00'),
(13, 'series', '', 'The Listener', 'the-listener', '360ec83bf97835df6ec22d8e9a176d7401a9ef32.jpg', 2009, 0000, 'A young paramedic discovers he has telepathic powers', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 21:05:15', '0000-00-00 00:00:00'),
(14, 'series', '', 'Eastwick', 'eastwick', '5c21c4fe73ff9f965b8e1c8314eceaec9524d6d0.jpg', 2009, 0000, 'A mysterious man bestows unique powers to three women.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 21:06:05', '0000-00-00 00:00:00'),
(15, 'series', '', 'Ghost Whisperer', 'ghost-whisperer', 'daed8151fa2cc16da235237693efae7303067dcc.jpg', 2005, 0000, 'A newlywed with the ability to communicate with the earthbound spirits of the recently deceased overcomes skepticism and doubt to help send their important messages to the living and allow the dead to pass on to the other side.', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-05-10 21:06:47', '0000-00-00 00:00:00'),
(16, 'movie', 'romance', 'The Other Woman', 'the-other-woman-2014', 'd6c9dbd063b14065c3444a453d8af023082a42bb.jpg', 2014, 0000, 'After discovering her boyfriend is married, Carly soon meets the wife he''s been betraying. And when yet another love affair is discovered, all three women team up to plot revenge on the three-timing S.O.B.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt2203939" data-style="p2"><a href="http://www.imdb.com/title/tt2203939/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="The Other Woman (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 1, 3, 1, 1, '', 0, 0, '2014-05-16 13:02:44', '0000-00-00 00:00:00'),
(17, 'movie', 'drama', 'Heaven Is for Real', 'heaven-is-for-real-2014', 'fbf02ee058a0a9540a5cbd50e377477820afaa49.jpg', 2014, 0000, 'A small-town father must find the courage and conviction to share his son''s extraordinary, life-changing experience with the world.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt1929263" data-style="t1">\r\n<a href="http://www.imdb.com/title/tt1929263/?ref_=tt_plg_rt" ><img alt="Heaven Is for Real (2014) on IMDb" src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png">\r\n</a></span>\r\n<script>\r\n(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];\r\nif(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;\r\njs.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";\r\nstags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');    \r\n</script>', 0, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 1, 4, 1, 1, '', 0, 0, '2014-05-16 13:04:11', '0000-00-00 00:00:00'),
(18, 'movie', 'action', 'Captain America: The Winter Soldier', 'captain-america-the-winter-soldier-2014', 'a3e0933f111e9f2d5fc7c171cc6bfd55f09ed0d1.jpg', 2014, 0000, 'Steve Rogers struggles to embrace his role in the modern world and battles a new threat from old history: the Soviet agent known as the Winter Soldier.', '', '<iframe width="560" height="315" src="//www.youtube.com/embed/7SlILk2WMTI" frameborder="0" allowfullscreen></iframe>', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt1843866" data-style="p2"><a href="http://www.imdb.com/title/tt1843866/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="Captain America: The Winter Soldier (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 210, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 5, 0, 0, '', 0, 0, '2014-05-16 13:32:37', '0000-00-00 00:00:00'),
(19, 'series', 'comedy', 'How I Met Your Mother', 'how-i-met-your-mother-2005', '0f31162eaa6e23ba0f436bacda15f9bfbf2e7b6e.jpg', 2005, 0000, 'A father recounts to his children, through a series of flashbacks, the journey he and his four best friends took leading up to him meeting their mother.', 'The year is 2030. Ted Mosby is relaying the story of how he met his wife to his daughter and son. The story starts in the year 2005, when then twenty-seven year old architect Ted was spurred on to want to get married after his best friends from his college days at Wesleyan, lawyer Marshall Eriksen, who was his roommate at the time and kindergarten teacher Lily Aldrin, got engaged after nine years of dating each other. Ted''s new quest in life was much to the dismay of his womanizing friend, Barney Stinson. But soon after Marshall and Lily''s engagement, Ted believed that his life mate was going to be news reporter and aspiring news anchor Robin Scherbatsky, who, despite having had a romantic relationship with her after this time, ended up being who the kids know as their "Aunt" Robin. As Ted relays the story to his kids, the constants are that their Uncle Marshall, Aunt Lily, Uncle Barney and Aunt Robin are always in the picture and thus have something to do with how he got together ...', '<iframe width="560" height="315" src="//www.youtube.com/embed/aJtVL2_fA5w" frameborder="0" allowfullscreen></iframe>', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt0460649" data-style="t1">\r\n<a href="http://www.imdb.com/title/tt0460649/?ref_=tt_plg_rt"\r\n><img alt="How I Met Your Mother (2005–2014) on IMDb" src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png">\r\n</a></span>\r\n<script>\r\n(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];\r\nif(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;\r\njs.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";\r\nstags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');    \r\n</script>', 22, 0, '', 'Carter Bays, Craig Thomas', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-11-03 04:37:31', '0000-00-00 00:00:00'),
(20, 'series', 'comedy', 'The Big Bang Theory', 'the-big-bang-theory-2007', '1916a49c465ddd46cca276e942ef5ffd90aa27ca.jpg', 2007, 0000, 'A woman who moves into an apartment across the hall from two brilliant but socially awkward physicists shows them how little they know about life outside of the laboratory.', 'Leonard Hofstadter and Sheldon Cooper are both brilliant physicists working at Caltech in Pasadena, California. They are colleagues, best friends, and roommates, although in all capacities their relationship is always tested primarily by Sheldon''s regimented, deeply eccentric, and non-conventional ways. They are also friends with their Caltech colleagues mechanical engineer Howard Wolowitz and astrophysicist Rajesh Koothrappali. The foursome spend their time working on their individual work projects, playing video games, watching science-fiction movies, or reading comic books. As they are self-professed nerds, all have little or no luck with popular women. When Penny, a pretty woman and an aspiring actress originally from Omaha, moves into the apartment across the hall from Leonard and Sheldon''s, Leonard has another aspiration in life, namely to get Penny to be his girlfriend.', '<iframe width="420" height="315" src="//www.youtube.com/embed/WBb3fojgW0Q" frameborder="0" allowfullscreen></iframe>', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt0898266" data-style="t1">\r\n<a href="http://www.imdb.com/title/tt0898266/?ref_=tt_plg_rt"\r\n><img alt="The Big Bang Theory (2007– ) on IMDb" src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png">\r\n</a></span>\r\n<script>\r\n(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];\r\nif(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;\r\njs.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";\r\nstags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');    \r\n</script>                    ', 22, 0, '', '', '', 0, 0, '', '', '0000-00-00', '', 0, 0, 1, 0, 0, 0, 0, '', 0, 0, '2014-11-03 05:45:39', '0000-00-00 00:00:00'),
(21, 'series', 'comedy', 'Friends', 'friends-1994', '57e5e313fedab13c1fb54797e19c26907253998a.jpg', 1994, 2004, 'When Monica''s high school friend (Rachel) re-enters her life, she sets off on a series of humorous and entertaining events involving Monica''s brother (Ross), her ex-roommate (Phoebe), and her next door neighbors (Chandler & Joey)', 'Six young people, on their own and struggling to survive in the real world, find the companionship, comfort and support they get from each other to be the perfect antidote to the pressures of life', '<iframe width="560" height="315" src="//www.youtube.com/embed/hDNNmeeJs1Q" frameborder="0" allowfullscreen></iframe>', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt0108778" data-style="t1">\r\n<a href="http://www.imdb.com/title/tt0108778/?ref_=tt_plg_rt"\r\n><img alt="Friends (1994–2004) on IMDb" src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png">\r\n</a></span>\r\n<script>\r\n(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];\r\nif(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;\r\njs.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";\r\nstags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');    \r\n</script>                    ', 22, 0, '', 'David Crane, Marta Kauffman', '', 10, 200, 'http://www.facebook.com/friends.tv', 'http://www.friendscontest.com/', '2009-09-22', 'Jennifer Aniston, Courteney Cox, Lisa Kudrow', 0, 0, 1, 1, 0, 0, 0, '', 0, 0, '2014-11-03 05:47:11', '0000-00-00 00:00:00'),
(22, 'mn', 'comedy', 'ТУСГАЙ АЖИЛЛАГАА', 'tusgai-ajillagaa-2014', '186f6a83d6bfd649fc2d3a0865f05bc0536c4c2f.jpg', 2014, 0000, '5 дахь өдрийн орой хот тэр чигээрээ найган дайвалзаж байлаа. Баярцэнгэл, Жаргал, Наадам нэр нь хүртэл шоу цэнгээнд уриалсан дуудах мэт 3-н залуу энэ оройг диваажингийн хаалга хүрэх нислэг гэж нэрлэжээ. Гэвч энэхүү нислэг 12 цаг болж цэнгээний газрууд болон дэлгүүрүүд үүдээ барьснаар газардана. Яахаа мэдэхгүй байсан 3-н залуу нэгэн бүсгүй тааралдсан нь архины үйлдвэрийн эзэн Тамирын эхнэр Сайхнаа байлаа. Ингээд тэд үйлдвэрт нэвтрэн орох бөгөөд одоо жинхэнэ шоу эхэллээ.', '', '<iframe width="560" height="315" src="//www.youtube.com/embed/nY5iTljpZMk" frameborder="0" allowfullscreen></iframe>', '', 120, 6, '', 'Д. Галбаяр', 'Д. Галбаяр', 0, 0, '', '', '2014-10-22', 'М.Баярмагнай, Т.Хулан, Гантулга, Мөнхтөр, Э.Ууганбаяр, С.Баттулга', 0, 0, 1, 1, 0, 1, 1, '', 0, 0, '2014-11-03 07:19:07', '0000-00-00 00:00:00'),
(23, 'mn', 'children', 'Бөмбөг', 'bumbug-2014', 'b5c1a0676f37eaef6a598c585373a931d072466e.jpg', 2014, 0000, 'Нийслэлийн жирийн сургуулийн хөл бөмбөг тоглох дуртай дөрвөн найз хөвгүүд хамт тоглодог бусад найзуудаа уриалан өсвөрийн хөл бөмбөгийн тэмцээнд оролцохоор зориг шулуудна. Тэмцээнд орохын тулд тэдэнд бүртгэлийн хураамжаа төлж, мандатаа авах мөнгө хэрэгтэй байв. Хүүхдүүд гэрийнхнээсээ гуйхад зөвшөөрсөн тул мөнгөө цуглуулаад бүртгүүлэхээр явж байхдаа спорт барааны дэлгүүрт байсан маш гоё бөмбөгийг шохоорхож байгаад мөнгөтэй цүнхээ мартаж явснаар мөнгөө алга болгоно. Тэмцээнд орох хүсэл дээрээс нь б', '', '<iframe width="560" height="315" src="//www.youtube.com/embed/wjIfzILrPJ4" frameborder="0" allowfullscreen></iframe>', '', 0, 0, '"Лимон" студи, ''''Гал Пикчерс'''' студи', 'Л.Лхагвадорж, Б.Тэгшсүрэн', 'Ч.Мөнхзул, Л.Лхагвадорж, Б.Тэгшсүрэн', 0, 0, '', '', '0020-11-01', 'Э.Бямбадорж, Н.Тэлмүүнтамир, Ц.Өлзий, Е.Төгөлдөр', 0, 0, 1, 1, 0, 1, 1, 'Тэнгис кино театр', 0, 0, '2014-11-03 07:41:08', '0000-00-00 00:00:00'),
(24, 'mn', 'drama', 'Сүүлчийн шөнө', 'suulchiin-shunu-2014', '068cfb9f08c2a8fe73a45db8c7c0d5c10bc7c49b.jpg', 2014, 0000, 'Хааяахандаа хачин ч гэмээр нэгэн бодол төрдгөө дөө бидэнд. Ямарваа нэгэн үг хэлж, үйлдэл хийж байх тэр агшин хоромд яг тэр үг, яг тэр үйлдлийн нэг нэгэн зэрэгцээ хэлж үйлдэж л байдаг гэж. Үнэндээ энэ нь дэмий гэхээсээ илүү "ҮНЭН" бодол ажээ. Харамсалтай нь бид түүнийг харж, мэдэрч, ойлгодоггүйд л хамаг хэрэг оршиж байгаа юм. Бид өөрс өөрсдийнхөө замналаар, хувь зохиолоор, амьдралын хэм хэмнэлээр амьдарч, бүтээн туурвиж, намтар түүхээ бичиж үлдээж, эхэлж-төгсдөг ч үнэн хэрэгтээ Баатар, Болд хоёр Батын амьдралаар амьдарсан байвал яах вэ?', 'Яг нэгэн ижлээр амьдарч, яг нэгэн ижлээр дурлаж хайрлаж, яг нэгэн адилаар алдаж оносоор ... Тэгээд үүнийгээ зөвхөн, ганцхан миний амьдрал гэж бодсоор. Өрөөл бусдаас өөрөө ч мэдэхгүйгээр хамааралтай, хараат, хачин итгэмгүй атлаа давтагдал амьдралаар амьдарч байж шүү дээ.\r\n\r\nГэхдээ үгүй юмаа. Энэ бол зөвхөн, ганцхан миний амьдрал гэж хэлж болно. Яаж гэж үү? Ягаад гэвэл бидний үг хэл, үйлдэл ижил адил, давтагдал байж болох ч тэр бүхнийг хүлээж авах зүрх сэтгэл, гаргалгаа, тайлбар тайлал ондоо байдаг.\r\n\r\nТанихгүй танилууд шиг амьдарч, ижил хувь зохиол, адил замналаар явж байгаа ч бид дахин давтагдашгүй хувь ганцхан "ертөнц" байж чаддагт л мөн чанар оршин байгаа билээ. Урсах нулимс, баярлах инээд минь төстэй авч амт нь өөр өөр. Харин ганцхан СҮҮЛЧИЙН ШӨНӨ нь л байсан-байгаа-байсаар ч байх болно.', '<iframe width="560" height="315" src="//www.youtube.com/embed/yYM8XKidiDE" frameborder="0" allowfullscreen></iframe>', '', 120, 13, 'Paramind Art, Tengri Concept', 'Төрийн Соёрхолт Н.Наранбаатар', 'МУСГЗ Ш.Гүрбазар', 0, 0, '', '', '0020-10-10', 'Төрийн соёрхолт Ц.Төмөрбаатар, МУГЖ Н.Батцэцэг, МУСТА О.Оюун, Ц.Төмөрхуяг, С.Болд-Эрдэнэ, О.Гэрэлсүх, УДЭТ жүжигчин М.Тогтохжаргал, Н.Баярмаа, залуу жүжигчин Т.Билигжаргал, Ж.Мөнгөнсүх, О.Дөлгөөн', 0, 0, 1, 1, 0, 1, 1, 'Тэнгис кино театр', 0, 0, '2014-11-03 07:57:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'embed url',
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
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `item_id`, `title`, `link`, `season`, `episode`, `sort`, `nb_views`, `is_active`, `is_featured`, `created_aid`, `updated_aid`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'http://vodlocker.com/embed-86xwcxbad8uw-900x600.html', 0, 0, 0, 0, 1, 1, 0, 0, '2014-05-10 22:38:46', '0000-00-00 00:00:00'),
(2, 1, '', 'http://embed.novamov.com/embed.php?v=427c4ebf082b3&height=&width=', 0, 0, 1, 0, 1, 0, 0, 0, '2014-05-10 22:59:24', '0000-00-00 00:00:00'),
(3, 10, 'WInter is coming', 'http://www.novamov.com/embed.php?v=1ffacb613dee8', 1, 1, 0, 0, 1, 0, 0, 0, '2014-05-10 23:04:12', '0000-00-00 00:00:00'),
(4, 10, 'Winter is coming', 'http://vodlocker.com/embed-86xwcxbad8uw-900x600.html', 1, 1, 0, 0, 1, 0, 0, 0, '2014-05-10 23:14:26', '0000-00-00 00:00:00'),
(5, 10, 'All me must die', 'http://vodlocker.com/embed-86xwcxbad8uw-900x600.html ', 2, 1, 0, 0, 1, 0, 0, 0, '2014-05-11 00:33:13', '0000-00-00 00:00:00'),
(6, 10, '', 'http://vodlocker.com/embed-9v4sqxpaj0ll-650x370.html', 1, 1, 0, 0, 1, 0, 0, 0, '2014-05-12 04:07:51', '0000-00-00 00:00:00'),
(7, 10, '', 'http://vodlocker.com/embed-9v4sqxpaj0ll-650x370.html', 1, 1, 0, 0, 1, 0, 0, 0, '2014-05-12 04:08:50', '0000-00-00 00:00:00'),
(8, 10, '', 'http://vidto.me/embed-qn7sjhhod3go-650x400.html', 1, 1, 0, 0, 1, 0, 0, 0, '2014-05-12 04:09:17', '0000-00-00 00:00:00'),
(9, 10, 'The Kingsroad', 'http://www.novamov.com/embed.php?v=1ffacb613dee8', 1, 2, 0, 0, 1, 0, 0, 0, '2014-05-12 04:10:30', '0000-00-00 00:00:00'),
(10, 10, 'The Kingsroad', 'http://vodlocker.com/embed-pzx8lcwvj4ir-650x370.html', 1, 2, 0, 0, 1, 0, 0, 0, '2014-05-12 04:11:03', '0000-00-00 00:00:00'),
(11, 10, 'Lord Snow', 'http://www.novamov.com/embed.php?v=986a8a1932b88', 1, 3, 0, 0, 1, 0, 0, 0, '2014-05-12 04:12:14', '0000-00-00 00:00:00'),
(12, 10, 'Lord Snow', 'http://vodlocker.com/embed-jmrgfgh3c3g6-650x370.html', 1, 3, 0, 0, 1, 0, 0, 0, '2014-05-12 04:13:04', '0000-00-00 00:00:00'),
(13, 21, 'The One Where Monica Gets a Roommate', 'http://www.free-tv-video-online.me/player/vidto.php?id=6h7mkpoehl88', 1, 1, 0, 0, 1, 0, 0, 0, '2014-11-03 05:51:43', '0000-00-00 00:00:00'),
(14, 21, 'The One with the Sonogram at the End', 'http://www.free-tv-video-online.me/player/novamov.php?id=47ebb76355319', 1, 2, 0, 0, 1, 0, 0, 0, '2014-11-03 05:52:07', '0000-00-00 00:00:00'),
(15, 21, 'The One with the Thumb', 'http://www.free-tv-video-online.me/player/divxden.php?id=24kwdl1v75nw', 1, 3, 0, 0, 1, 0, 0, 0, '2014-11-03 05:52:21', '0000-00-00 00:00:00'),
(16, 21, 'The One with George Stephanopoulos', 'http://www.free-tv-video-online.me/player/novamov.php?id=0801cd121e6a4', 1, 4, 0, 0, 1, 0, 0, 0, '2014-11-03 05:52:34', '0000-00-00 00:00:00'),
(17, 21, 'The One with the East German Laundry Detergent', 'http://www.free-tv-video-online.me/player/novamov.php?id=6f080a0a85fa7', 1, 5, 0, 0, 1, 0, 0, 0, '2014-11-03 05:52:47', '0000-00-00 00:00:00'),
(18, 21, 'The One with the Butt', 'http://www.free-tv-video-online.me/player/novamov.php?id=5cf5808da7c37', 1, 6, 0, 0, 1, 0, 0, 0, '2014-11-03 05:52:59', '0000-00-00 00:00:00'),
(19, 21, 'The One with the Blackout', 'http://www.free-tv-video-online.me/player/novamov.php?id=4fef75591545e', 1, 7, 0, 0, 1, 0, 0, 0, '2014-11-03 05:53:18', '0000-00-00 00:00:00'),
(20, 21, 'The One Where Nana Dies Twice', 'http://www.free-tv-video-online.me/player/novamov.php?id=8c6c2a928078c', 1, 8, 0, 0, 1, 0, 0, 0, '2014-11-03 05:53:30', '0000-00-00 00:00:00'),
(21, 21, 'The One Where Underdog Gets Away', 'http://www.free-tv-video-online.me/player/divxden.php?id=nhlblchhrces', 1, 9, 0, 0, 1, 0, 0, 0, '2014-11-03 05:53:43', '0000-00-00 00:00:00'),
(22, 21, 'The One with the Monkey', 'http://www.free-tv-video-online.me/player/novamov.php?id=b427c75615408', 1, 10, 0, 0, 1, 0, 0, 0, '2014-11-03 05:54:09', '0000-00-00 00:00:00'),
(23, 21, 'The One with Mrs. Bing', 'http://www.free-tv-video-online.me/player/novamov.php?id=2a2ae3bc35170', 1, 11, 0, 0, 1, 0, 0, 0, '2014-11-03 05:54:24', '0000-00-00 00:00:00'),
(24, 21, 'The One with the Dozen Lasagnas', 'http://www.free-tv-video-online.me/player/novamov.php?id=1da9aa34159b4', 1, 12, 0, 0, 1, 0, 0, 0, '2014-11-03 05:54:37', '0000-00-00 00:00:00'),
(25, 21, 'The One with the Boobies', 'http://www.free-tv-video-online.me/player/novamov.php?id=c8117a4b10502', 1, 13, 0, 0, 1, 0, 0, 0, '2014-11-03 05:54:52', '0000-00-00 00:00:00'),
(26, 21, 'The One with Ross''s New Girlfriend', 'http://www.free-tv-video-online.me/player/novamov.php?id=0d9b77cf710ac', 2, 1, 0, 0, 1, 0, 0, 0, '2014-11-03 05:55:31', '0000-00-00 00:00:00'),
(27, 21, 'The One with the Breast Milk', 'http://www.free-tv-video-online.me/player/novamov.php?id=ecc07d613b180', 2, 2, 0, 0, 1, 0, 0, 0, '2014-11-03 05:55:45', '0000-00-00 00:00:00'),
(28, 21, 'The One Where Heckles Dies', 'http://www.free-tv-video-online.me/player/novamov.php?id=415057939e0c8', 2, 3, 0, 0, 1, 0, 0, 0, '2014-11-03 05:56:01', '0000-00-00 00:00:00'),
(29, 21, 'The One with Phoebe''s Husband', 'http://www.free-tv-video-online.me/player/novamov.php?id=0103a387bba49', 2, 4, 0, 0, 1, 0, 0, 0, '2014-11-03 05:56:14', '0000-00-00 00:00:00'),
(30, 21, 'The One with Five Steaks and an Eggplant', 'http://www.free-tv-video-online.me/player/novamov.php?id=29b45a8cba32a', 2, 5, 0, 0, 1, 0, 0, 0, '2014-11-03 05:56:30', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
