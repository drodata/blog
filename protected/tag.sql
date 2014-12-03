-- MySQL dump 10.11
--
-- Host: localhost    Database: trekshot
-- ------------------------------------------------------
-- Server version	5.0.51a-24+lenny4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `essay_tags`
--

DROP TABLE IF EXISTS `essay_tags`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `essay_tags` (
  `tag_id` bigint(20) unsigned NOT NULL auto_increment,
  `tag_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `essay_tags`
--

LOCK TABLES `essay_tags` WRITE;
/*!40000 ALTER TABLE `essay_tags` DISABLE KEYS */;
INSERT INTO `essay_tags` VALUES (1,'alias'),(2,'array'),(3,'array_function'),(4,'basic'),(5,'bigpicture'),(6,'bugs'),(7,'css'),(8,'css_display'),(9,'css_left'),(10,'css_position'),(11,'css_visibility'),(12,'dump'),(13,'error'),(14,'event'),(15,'event_handling'),(16,'ezsql'),(17,'filesystem'),(18,'foreach'),(19,'function'),(20,'gnu_cmd'),(21,'id'),(22,'javascript'),(23,'js'),(24,'language'),(25,'latin1'),(26,'linux'),(27,'literal'),(28,'motd'),(29,'mysql'),(30,'onload'),(31,'onmouseover'),(32,'personal'),(33,'php'),(34,'php_file_functions'),(35,'php_warning'),(36,'plog_essay.index'),(37,'pseudoprotocol'),(38,'redirect'),(39,'shell_scripting'),(40,'sinat'),(41,'statement'),(42,'string'),(43,'tag'),(44,'tam'),(45,'tip'),(46,'undefined'),(48,'utf8'),(49,'vim'),(50,'void'),(51,'wordpress'),(73,'joelonsoft'),(53,'xbeta'),(54,'1989'),(59,'path'),(60,'java'),(72,'hover'),(64,'mysql_basic'),(65,'toc'),(66,'logs'),(67,'switch'),(68,'apple'),(69,'static'),(70,'bug_fixed'),(71,'mt'),(79,'font-size'),(80,'url_encode'),(81,'xclose'),(82,'npu'),(83,'jquery'),(84,'安琢'),(85,'table_structure'),(86,'depth first search'),(87,'depth_first_search'),(88,'grammar'),(89,'spaces_in_url'),(90,'ER'),(91,'dream_comes_true'),(92,'chrome'),(93,'how-to'),(94,'character-set'),(95,'null'),(96,'yanni'),(97,'f_date()'),(98,'wpdb'),(99,'boxy'),(100,'qtip'),(101,'weibo'),(102,'E-Orders'),(103,'debian'),(104,'eorder'),(105,'animate'),(106,'plugins'),(107,'preventDefault'),(108,'enum'),(109,'loading'),(110,'ajax'),(111,'server'),(112,'predefined_variable'),(113,'click'),(114,'unbind'),(115,'PHPExcel'),(116,'cache'),(117,'ued'),(118,'html_tag_matching'),(119,'button'),(120,'eo_log'),(121,'nhk'),(122,'TRON'),(123,'ICtag'),(124,'japan'),(125,'clone'),(126,'speed'),(127,'echo'),(128,'minify'),(129,'yii'),(130,'apache'),(131,'rewrite'),(132,'permission'),(133,'www-data'),(134,'yiiframework'),(135,'CGridView'),(136,'Widget'),(137,'optinal'),(138,'argument'),(139,'operator'),(140,'||'),(141,'validation'),(142,'scenario'),(143,'form'),(144,'wide_form'),(145,'radio'),(146,'filter'),(147,'CDbCriteria'),(148,'CActiveDataProvider'),(149,'CDetailView'),(150,'route'),(151,'action'),(152,'CAction'),(153,'DHCP'),(154,'IP'),(155,'delay.refresh'),(156,'bug'),(157,'delay'),(158,'refresh'),(159,'plugin'),(160,'jquerytools'),(161,'dateinput'),(162,'radio_button'),(163,'select_box'),(164,'check_box'),(165,'tar'),(166,'file_attributes'),(167,'mtime'),(168,'ctime'),(169,'atime'),(170,'rm'),(171,'subdirectory'),(172,'shell'),(173,'touch'),(174,'inode'),(175,'dmz'),(176,'router'),(177,'LAN'),(178,'encoding'),(179,'noeol'),(180,'dos'),(181,'dos2unix'),(182,'dpkg'),(183,'cr'),(184,'lf'),(185,'U盘'),(186,'yii_basic'),(187,'loadModule()'),(188,'instance'),(189,'undo'),(190,'allowoverride'),(191,'CActiveForm'),(192,'htmlOptions'),(193,'json'),(194,'xerox'),(195,'3117'),(196,'Excel'),(197,'extension'),(198,'zip'),(199,'why');
/*!40000 ALTER TABLE `essay_tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-26  9:19:33
