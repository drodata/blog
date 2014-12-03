/*
DROP TABLE IF EXISTS `tbl_company`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tbl_company` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `full_name` tinytext,
  `short_name` char(50) default NULL,
  `category` int(10) default NULL,
  `site` char(100) default NULL,
  `adder_id` int(5) default NULL,
  `create_time` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;



ALTER TABLE tbl_company CHANGE full_name full_name VARCHAR(128) DEFAULT NULL;
ALTER TABLE tbl_company DROP COLUMN adder_id;
ALTER TABLE tbl_company ADD update_time DATETIME DEFAULT NULL AFTER create_time;
ALTER TABLE tbl_company CHANGE short_name short_name VARCHAR(30) DEFAULT NULL;
ALTER TABLE tbl_company CHANGE category category INT(3) DEFAULT NULL;
ALTER TABLE tbl_company CHANGE site site VARCHAR(128) DEFAULT NULL;

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('客户', 'CompanyCategory', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('供应商', 'CompanyCategory', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('物流公司', 'CompanyCategory', 3, 3);
*/

DROP TABLE IF EXISTS `tbl_address`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tbl_address` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `company_id` int(5) default NULL,
  `is_main` tinyint(1) default NULL,
  `visible` tinyint(1) default '1',
  `contacter` char(30) default NULL,
  `duty` varchar(40) default NULL,
  `country_id` int(4) default NULL,
  `province` varchar(20) default NULL,
  `city` varchar(20) default NULL,
  `street` tinytext,
  `zip` varchar(20) default NULL,
  `office_phone` char(30) default NULL,
  `cell_phone` char(30) default NULL,
  `fax` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
