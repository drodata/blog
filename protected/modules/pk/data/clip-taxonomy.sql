DROP TABLE IF EXISTS `ts_clip_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ts_clip_taxonomy` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clip_id` bigint(20) DEFAULT NULL,
  `taxonomy_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

