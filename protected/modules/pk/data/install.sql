/** -------------------------------------------------
 *	General tables
 */
DROP TABLE IF EXISTS `pk_source`;
CREATE TABLE IF NOT EXISTS `pk_source` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `pk_source` (`name`, `type`) VALUES ('Misc', 6);

DROP TABLE IF EXISTS `pk_section`;
CREATE TABLE IF NOT EXISTS `pk_section` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `source_id` bigint(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent` bigint(20) DEFAULT 0,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
INSERT INTO `pk_section` (`id`, `source_id`, `name`, `position`) VALUES (1, 1, 'misc', 1);

DROP TABLE IF EXISTS `pk_taxonomy`;
CREATE TABLE IF NOT EXISTS `pk_taxonomy` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `parent` bigint(20) DEFAULT 0,
  `position` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pk_lookup`;
CREATE TABLE IF NOT EXISTS `pk_lookup` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
INSERT INTO `pk_lookup` (`name`, `code`, `type`, `position`) VALUES
('Web Essay'	, 1, 'SourceType', 1),
('Documentation', 2, 'SourceType', 2),
('Tutorial'	, 3, 'SourceType', 3),
('Book'		, 4, 'SourceType', 4),
('PDF'		, 5, 'SourceType', 5),
('Misc'		, 6, 'SourceType', 6),

('English'	, 1, 'VocabularyLanguage', 1),
('现代汉语'	, 2, 'VocabularyLanguage', 2),
('古汉语'	, 3, 'VocabularyLanguage', 3),

('Noun'		, 1, 'ExplanationClass', 1),
('Verb'		, 2, 'ExplanationClass', 2),
('Adjective'	, 3, 'ExplanationClass', 3),
('Adverb'	, 4, 'ExplanationClass', 4);

/** -------------------------------------------------
 *	Vacabulary
 */
DROP TABLE IF EXISTS `pk_vocabulary`;
CREATE TABLE IF NOT EXISTS `pk_vocabulary` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `pronunciation` varchar(20) DEFAULT NULL,
  `language` tinyint(1) DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `compare` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pk_explanation`;
CREATE TABLE IF NOT EXISTS `pk_explanation` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vocabulary_id` bigint(20) DEFAULT NULL,
  `is_main` boolean DEFAULT NULL,
  `class` tinyint(1) DEFAULT NULL,
  `explanation` varchar(200) DEFAULT NULL,
  `native_explanation` varchar(200) DEFAULT NULL,
  `example` varchar(200) DEFAULT NULL,
  `synonym` varchar(100) DEFAULT NULL,
  `compare` varchar(100) DEFAULT NULL,
  `see_also` varchar(100) DEFAULT NULL,
  `c_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pk_quotation`;
CREATE TABLE IF NOT EXISTS `pk_quotation` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `explanation_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `anchor` varchar(100) DEFAULT NULL,
  `c_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

/** -------------------------------------------------
 *	Clip Folder
 */

DROP TABLE IF EXISTS `pk_clip`;
CREATE TABLE IF NOT EXISTS `pk_clip` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `folder_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `anchor` varchar(100) DEFAULT NULL,
  `c_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pk_folder`;
CREATE TABLE IF NOT EXISTS `pk_folder` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `parent` bigint(20) DEFAULT 0,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
