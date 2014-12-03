-- MySQL dump 10.11
--
-- Host: localhost    Database: eorder
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
-- Table structure for table `om_taxonomy`
--

DROP TABLE IF EXISTS `om_taxonomy`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `om_taxonomy` (
  `term_id` bigint(20) unsigned NOT NULL auto_increment,
  `term_name` varchar(200) default NULL,
  `term_slug` varchar(80) default NULL,
  `term_taxonomy` varchar(80) default NULL,
  `term_note` varchar(200) default NULL,
  `term_parent` bigint(20) default '0',
  PRIMARY KEY  (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `om_taxonomy`
--

LOCK TABLES `om_taxonomy` WRITE;
/*!40000 ALTER TABLE `om_taxonomy` DISABLE KEYS */;
INSERT INTO `om_taxonomy` VALUES (32,'公司预付','manager_in','cashflow_category',NULL,0),(31,'月初金额','month_start_initial','cashflow_category',NULL,0),(5,'国内客户','mainland','customer_category',NULL,0),(6,'国外客户','aboard','customer_category',NULL,0),(30,'杂项',NULL,'expense_category',NULL,0),(29,'水、电费',NULL,'expense_category',NULL,0),(27,'厂区耗材及相关费用',NULL,'expense_category',NULL,0),(28,'广告宣传',NULL,'expense_category',NULL,0),(15,'客户','customers','company_category',NULL,0),(16,'供应商','suppliers','company_category',NULL,0),(17,'物流公司','logistics','company_category',NULL,0),(26,'办公设备耗材',NULL,'expense_category',NULL,0),(25,'快递运输费',NULL,'expense_category',NULL,0),(20,'曲东东',NULL,'fetcher','show',0),(21,'刘绘杰',NULL,'fetcher','hide',0),(22,'李东杰',NULL,'fetcher','show',0),(23,'客户本人',NULL,'fetcher','show',0),(24,'刘绘杰',NULL,'operator','hide',0),(33,'订单收入','order_in','cashflow_category',NULL,0),(34,'日常支出','out','cashflow_category',NULL,0),(35,'月末节余','month_end_check','cashflow_category',NULL,0),(85,'银行转帐','bank_transfer','revenue_type',NULL,0),(38,'其它收入','misc_in','cashflow_category',NULL,0),(39,'追加申请','add_apply','cashflow_category',NULL,0),(40,'余额退回','balance_return','cashflow_category',NULL,0),(86,'现金','cash','revenue_type',NULL,0),(42,'厂区工资',NULL,'expense_category',NULL,0),(55,'李霞',NULL,'fetcher','hide',0),(44,'充加油卡',NULL,'expense_category',NULL,0),(45,'差旅费',NULL,'expense_category',NULL,0),(46,'业务招待费',NULL,'expense_category',NULL,0),(47,'电话费',NULL,'expense_category',NULL,0),(48,'华东地区',NULL,'province_district_category',NULL,0),(49,'华南地区',NULL,'province_district_category',NULL,0),(50,'华中地区',NULL,'province_district_category',NULL,0),(51,'华北地区',NULL,'province_district_category',NULL,0),(52,'东北地区',NULL,'province_district_category',NULL,0),(53,'西北地区',NULL,'province_district_category',NULL,0),(54,'西南地区',NULL,'province_district_category',NULL,0),(56,'632.11','dollar','foreign_exchange',NULL,0),(57,'7936.07','japan_yuan','foreign_exchange',NULL,0),(84,'766.65','euro','foreign_exchange',NULL,0),(59,'每日核对','daily_check','cashflow_category',NULL,0),(60,'销售部','sales_dp','department',NULL,0),(61,'财务部','accounting_dp','department',NULL,0),(62,'生产部','production_dp','department',NULL,0),(63,'采购部','purchasing_dp','department',NULL,0),(64,'办公室','office_dp','department',NULL,0),(65,'总经理室','president_dp','department',NULL,0),(66,'国内销售','mainland_saler','role','sales_dp',0),(67,'国外销售','aboard_saler','role','sales_dp',0),(68,'销售主管','sale_director','role','sales_dp',0),(69,'会计','accountant','role','accounting_dp',0),(70,'出纳','cashier','role','accounting_dp',0),(71,'厂长','production_director','role','production_dp',0),(72,'厂区操作员','production_operator','role','production_dp',0),(73,'采购员','purchaser','role','purchasing_dp',0),(74,'办公室主任','office_director','role','office_dp',0),(75,'办公室人员','officer','role','office_dp',0),(76,'系统管理员','root','role','office_dp',0),(77,'总经理','president','role','president_dp',0),(78,'李老师',NULL,'operator','show',0),(79,'4','10','sample_autocomplete_customer_id',NULL,0),(80,'39','20','sample_autocomplete_customer_id',NULL,0),(81,'12',NULL,'empty_uprice_customer_id',NULL,0),(82,'29',NULL,'empty_uprice_customer_id',NULL,0),(83,'101',NULL,'empty_uprice_customer_id',NULL,0),(87,'承兑','acceptance','revenue_type',NULL,0),(88,'支付宝','alipay','revenue_type',NULL,0),(89,'陈奎',NULL,'fetcher','show',0);
/*!40000 ALTER TABLE `om_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-14  0:42:08
