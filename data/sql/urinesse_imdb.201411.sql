-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2014 at 11:19 PM
-- Server version: 5.5.40-36.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `urinesse_imdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bests`
--

DROP TABLE IF EXISTS `bests`;
CREATE TABLE IF NOT EXISTS `bests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `best_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bests`
--
ALTER TABLE `bests`
  ADD CONSTRAINT `bests_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);
