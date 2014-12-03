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
-- Table structure for table `essay2cat`
--

DROP TABLE IF EXISTS `essay2cat`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `essay2cat` (
  `rel_id` int(11) unsigned NOT NULL auto_increment,
  `essay_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`rel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=627 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `essay2cat`
--

LOCK TABLES `essay2cat` WRITE;
/*!40000 ALTER TABLE `essay2cat` DISABLE KEYS */;
INSERT INTO `essay2cat` VALUES (291,57,8),(256,1,1),(187,2,3),(446,3,4),(15,4,4),(16,5,4),(17,6,4),(18,7,1),(19,8,4),(193,9,4),(367,10,16),(22,11,2),(257,12,1),(530,13,3),(192,14,7),(188,26,3),(255,27,16),(125,28,7),(338,29,8),(395,30,8),(196,31,9),(154,32,4),(183,33,3),(182,34,3),(62,35,2),(181,36,3),(180,37,3),(38,38,9),(88,39,8),(179,40,3),(447,43,16),(178,44,3),(44,45,2),(280,46,2),(46,47,2),(177,48,3),(383,49,2),(176,50,3),(50,51,8),(197,52,16),(98,53,4),(290,57,2),(337,29,2),(61,58,8),(448,42,2),(449,59,2),(175,60,3),(72,61,8),(71,61,2),(78,62,8),(77,62,4),(76,62,2),(86,54,14),(240,63,4),(147,64,9),(174,65,3),(142,66,8),(110,67,8),(148,68,7),(130,69,7),(450,70,16),(451,71,1),(452,72,7),(169,73,1),(134,74,2),(198,80,8),(168,75,1),(149,76,2),(150,76,8),(156,77,2),(155,32,8),(162,78,3),(158,79,8),(199,80,9),(454,81,9),(453,81,8),(455,83,9),(215,82,8),(219,84,9),(221,85,3),(222,86,8),(457,89,8),(231,88,8),(230,87,3),(456,89,2),(243,90,9),(251,91,4),(252,92,3),(253,93,3),(254,94,2),(259,95,8),(260,96,3),(265,97,3),(459,98,8),(267,99,8),(268,100,4),(269,100,8),(270,100,9),(390,101,4),(289,102,9),(288,102,8),(282,103,8),(277,104,9),(279,105,8),(281,106,8),(285,107,8),(287,108,3),(458,109,1),(296,110,1),(297,111,3),(298,112,7),(299,112,8),(461,113,1),(304,114,1),(460,115,1),(306,116,3),(328,117,8),(327,117,4),(315,118,18),(314,118,4),(317,119,3),(318,120,3),(329,121,3),(462,122,2),(463,123,16),(334,124,3),(335,125,3),(336,126,3),(464,127,3),(344,128,19),(343,129,19),(345,130,19),(346,131,19),(348,132,4),(349,133,3),(350,134,19),(351,135,19),(352,136,19),(353,137,19),(354,138,3),(355,139,3),(468,140,7),(366,141,3),(467,142,7),(360,143,7),(361,144,3),(466,145,18),(465,145,2),(369,146,3),(370,147,3),(371,148,3),(372,149,19),(373,150,19),(375,151,3),(470,152,4),(378,153,4),(469,154,4),(380,155,3),(471,156,16),(472,157,20),(384,49,7),(503,158,7),(502,158,2),(389,159,3),(391,160,4),(392,161,2),(393,162,7),(394,163,3),(396,30,9),(397,164,4),(398,165,2),(475,166,4),(476,167,2),(477,168,2),(590,169,20),(479,170,4),(480,171,20),(408,172,9),(481,173,4),(412,174,3),(482,175,20),(414,176,19),(419,177,19),(421,178,19),(423,179,19),(483,180,20),(485,181,20),(484,181,4),(429,182,19),(430,183,2),(433,184,19),(434,185,4),(435,186,19),(438,187,19),(440,188,19),(486,189,20),(443,190,4),(444,191,19),(487,192,2),(557,193,2),(490,194,19),(491,195,19),(513,196,21),(572,197,2),(494,198,2),(495,198,16),(514,199,21),(497,200,19),(498,201,2),(499,202,19),(500,203,21),(583,204,21),(505,205,4),(506,206,19),(508,207,20),(509,208,19),(510,209,21),(511,210,21),(512,211,21),(516,212,21),(517,213,21),(518,214,21),(521,215,19),(522,216,19),(532,217,20),(526,218,19),(546,219,20),(529,220,16),(531,221,20),(534,222,20),(535,223,19),(536,224,4),(537,225,4),(538,226,3),(544,227,16),(545,228,19),(547,229,19),(548,230,16),(549,231,16),(551,232,16),(552,233,16),(554,234,19),(555,235,2),(556,236,16),(558,193,21),(559,237,21),(561,238,19),(562,239,21),(563,240,21),(564,241,21),(565,242,19),(566,243,21),(568,244,18),(569,244,21),(595,245,16),(573,197,21),(575,246,19),(576,247,21),(582,248,21),(581,248,4),(584,249,21),(585,250,19),(586,251,2),(587,251,4),(588,251,21),(594,252,19),(591,253,3),(593,254,19),(596,255,2),(601,256,19),(605,257,19),(604,258,19),(606,259,20),(607,260,19),(611,261,20),(609,262,19),(610,263,19),(613,264,19),(614,265,22),(616,266,21),(619,267,19),(620,268,19),(621,269,21),(622,270,8),(623,271,19),(625,272,19),(626,273,19);
/*!40000 ALTER TABLE `essay2cat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-26  9:19:03
