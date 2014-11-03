-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2014 at 09:31 PM
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
  `year` int(11) NOT NULL,
  `summary` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `director` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `boxoffice` tinyint(2) NOT NULL,
  `thisweek` tinyint(1) NOT NULL,
  `comingsoon` tinyint(1) NOT NULL,
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `type`, `genre`, `title`, `route`, `image`, `year`, `summary`, `body`, `trailer`, `rating`, `duration`, `director`, `writer`, `sort`, `nb_views`, `is_active`, `is_featured`, `boxoffice`, `thisweek`, `comingsoon`, `created_aid`, `updated_aid`, `created_at`, `updated_at`) VALUES
(1, 'movie', 'comedy', 'Neighbors', 'neighbors-2014', '7adda305aada1f86de72a37d8c540947e32b45f6.jpg', 2014, 'A couple with a newborn baby face unexpected difficulties after they are forced to live next to a fraternity house.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt2004420" data-style="p2"><a href="http://www.imdb.com/title/tt2004420/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="Neighbors (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, '', '', 0, 0, 1, 1, 1, 1, 1, 0, 0, '2014-05-10 20:10:00', '0000-00-00 00:00:00'),
(2, 'movie', '', 'Chef', 'chef', 'fe3f3e62ae96950244deb0f56cb1cc675b6f989e.jpg', 2014, 'A chef who loses his restaurant job starts up a food truck in an effort to reclaim his creative promise, while piecing back together his estranged family.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 20:14:47', '0000-00-00 00:00:00'),
(3, 'movie', '', 'The Internship', 'the-internship', 'f0d5bc3a6014a7677d1fd6d69573e8bcf8c22619.jpg', 2013, 'Two salesmen whose careers have been torpedoed by the digital age find their way into a coveted internship at Google, where they must compete with a group of young, tech-savvy geniuses for a shot at employment.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 20:15:17', '0000-00-00 00:00:00'),
(4, 'movie', '', 'We''re the Millers', 'we-re-the-millers', 'a20d140e6e065d1c8cf9ef67b7da945f1bb01004.jpg', 2013, 'A veteran pot dealer creates a fake family as part of his plan to move a huge shipment of weed into the U.S. from Mexico.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 20:16:31', '0000-00-00 00:00:00'),
(5, 'movie', 'adventure', 'The Amazing Spider-Man', 'the-amazing-spider-man-2014', '1ec0fa008da27978b7cd6a6733a65cf4e36be878.jpg', 2014, 'Peter Parker runs the gauntlet as the mysterious company Oscorp sends up a slew of supervillains against him, impacting on his life.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt1872181" data-style="p2"><a href="http://www.imdb.com/title/tt1872181/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="The Amazing Spider-Man 2 (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, '', '', 0, 0, 1, 1, 2, 0, 0, 0, 0, '2014-05-10 20:17:12', '0000-00-00 00:00:00'),
(6, 'movie', '', 'The Heat (I)', 'the-heat-i', '23e10844d23a477eb0c16f144a0957ee3e39e891.jpg', 2013, 'An uptight FBI Special Agent is paired with a foul-mouthed Boston cop to take down a ruthless drug lord.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 20:17:51', '0000-00-00 00:00:00'),
(7, 'movie', '', 'The Way Way Back', 'the-way-way-back', 'f1e945654f3433c9200dfde8fd7aa67e3fbc32e4.jpg', 2013, 'Shy 14-year-old Duncan goes on summer vacation with his mother, her overbearing boyfriend, and her boyfriend''s daughter. Having a rough time fitting in, Duncan finds an unexpected friend in Owen, manager of the Water Wizz water park.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 20:18:55', '0000-00-00 00:00:00'),
(8, 'movie', '', 'Thor: The Dark World', 'thor-the-dark-world', '7379cde8b5ac4cd445cef7cf54289c5680d843b4.jpg', 2013, 'When Jane Foster is possessed by a great power, Thor must protect her from a new threat of old times: the Dark Elves.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 20:23:42', '0000-00-00 00:00:00'),
(9, 'movie', '', 'Hellboy', 'hellboy', '4df3471f0381f9e8254d803b6ecc579b7ecbdc20.jpg', 2004, 'A demon, raised from infancy after being conjured by and rescued from the Nazis, grows up to become a defender against the forces of darkness.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 20:24:21', '0000-00-00 00:00:00'),
(10, 'series', 'adventure', 'Game of Thrones', 'game-of-thrones-2011', '8ffc0e2809677c62849e80fb4e5836cf7dd04d36.jpg', 2011, 'Seven noble families fight for control of the mythical land of Westeros.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt0944947" data-style="p2"><a href="http://www.imdb.com/title/tt0944947/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="Game of Thrones (2011) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, '', '', 0, 0, 1, 1, 0, 0, 0, 0, 0, '2014-05-10 20:51:35', '0000-00-00 00:00:00'),
(11, 'series', '', 'True Blood', 'true-blood', '347100cc3cb6e573928df855fa51687429b9ae13.jpg', 2008, 'Telepathic waitress Sookie Stackhouse encounters a strange new supernatural world when she meets the mysterious Bill, a southern Louisiana gentleman and vampire.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 21:00:51', '0000-00-00 00:00:00'),
(12, 'series', '', 'Joan of Arcadia', 'joan-of-arcadia', 'bbf7ac2dd9a2f04e4ef2ae8390ee73bb13461eb8.jpg', 2003, 'Millions of people speak to God. What if God spoke back? Life just got a hell of a lot more confusing for teenage Joan Girardi, who already deals with feeling out of place in her family', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 21:01:41', '0000-00-00 00:00:00'),
(13, 'series', '', 'The Listener', 'the-listener', '360ec83bf97835df6ec22d8e9a176d7401a9ef32.jpg', 2009, 'A young paramedic discovers he has telepathic powers', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 21:05:15', '0000-00-00 00:00:00'),
(14, 'series', '', 'Eastwick', 'eastwick', '5c21c4fe73ff9f965b8e1c8314eceaec9524d6d0.jpg', 2009, 'A mysterious man bestows unique powers to three women.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 21:06:05', '0000-00-00 00:00:00'),
(15, 'series', '', 'Ghost Whisperer', 'ghost-whisperer', 'daed8151fa2cc16da235237693efae7303067dcc.jpg', 2005, 'A newlywed with the ability to communicate with the earthbound spirits of the recently deceased overcomes skepticism and doubt to help send their important messages to the living and allow the dead to pass on to the other side.', '', '', '', 0, '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, '2014-05-10 21:06:47', '0000-00-00 00:00:00'),
(16, 'movie', 'romance', 'The Other Woman', 'the-other-woman-2014', 'd6c9dbd063b14065c3444a453d8af023082a42bb.jpg', 2014, 'After discovering her boyfriend is married, Carly soon meets the wife he''s been betraying. And when yet another love affair is discovered, all three women team up to plot revenge on the three-timing S.O.B.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt2203939" data-style="p2"><a href="http://www.imdb.com/title/tt2203939/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="The Other Woman (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 0, '', '', 0, 0, 1, 1, 3, 1, 1, 0, 0, '2014-05-16 13:02:44', '0000-00-00 00:00:00'),
(17, 'movie', 'drama', 'Heaven Is for Real', 'heaven-is-for-real-2014', 'fbf02ee058a0a9540a5cbd50e377477820afaa49.jpg', 2014, 'A small-town father must find the courage and conviction to share his son''s extraordinary, life-changing experience with the world.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt1929263" data-style="t1">\r\n<a href="http://www.imdb.com/title/tt1929263/?ref_=tt_plg_rt" ><img alt="Heaven Is for Real (2014) on IMDb" src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png">\r\n</a></span>\r\n<script>\r\n(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];\r\nif(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;\r\njs.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";\r\nstags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');    \r\n</script>', 0, '', '', 0, 0, 1, 1, 4, 1, 1, 0, 0, '2014-05-16 13:04:11', '0000-00-00 00:00:00'),
(18, 'movie', 'action', 'Captain America: The Winter Soldier', 'captain-america-the-winter-soldier-2014', 'a3e0933f111e9f2d5fc7c171cc6bfd55f09ed0d1.jpg', 2014, 'Steve Rogers struggles to embrace his role in the modern world and battles a new threat from old history: the Soviet agent known as the Winter Soldier.', '', '', '<span class="imdbRatingPlugin" data-user="ur37598576" data-title="tt1843866" data-style="p2"><a href="http://www.imdb.com/title/tt1843866/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt="Captain America: The Winter Soldier (2014) on IMDb" />\r\n</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,''script'',''imdb-rating-api'');</script>', 210, '', '', 0, 0, 1, 0, 5, 0, 0, 0, 0, '2014-05-16 13:32:37', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=13 ;

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
(12, 10, 'Lord Snow', 'http://vodlocker.com/embed-jmrgfgh3c3g6-650x370.html', 1, 3, 0, 0, 1, 0, 0, 0, '2014-05-12 04:13:04', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
