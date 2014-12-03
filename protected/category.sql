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
-- Table structure for table `essay_categories`
--

DROP TABLE IF EXISTS `essay_categories`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `essay_categories` (
  `cat_id` int(4) unsigned NOT NULL auto_increment,
  `cat_name` varchar(40) NOT NULL,
  `cat_slug` varchar(40) NOT NULL,
  `cat_desc` text NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `essay_categories`
--

LOCK TABLES `essay_categories` WRITE;
/*!40000 ALTER TABLE `essay_categories` DISABLE KEYS */;
INSERT INTO `essay_categories` VALUES (1,'MISC','misc','Uncategories. everything.'),(2,'PHP','php',''),(3,'Life','life',''),(4,'JavaScript','js',''),(7,'MySQL','sql','ezsql...'),(8,'Site Logs','sitelogs','p and trekshot.org'),(9,'CSS','css',''),(16,'GNU/Linux','linux',''),(18,'Why','why','How does it works?'),(19,'Andro','andro',''),(20,'E-Orders','eo',''),(21,'Yii Framework','yii',''),(22,'Personal Diary','personal-diary','');
/*!40000 ALTER TABLE `essay_categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-26  9:19:43
