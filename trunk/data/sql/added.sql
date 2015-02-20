DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `news_item`;
CREATE TABLE IF NOT EXISTS `news_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;


DROP TABLE IF EXISTS `boxoffice`;
CREATE TABLE IF NOT EXISTS `boxoffice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL ,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL, -- mongolian, international, korean, 
  `item_id` int(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


