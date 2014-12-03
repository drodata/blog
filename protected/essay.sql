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
-- Table structure for table `essay`
--

DROP TABLE IF EXISTS `essay`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `essay` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `file_name` varchar(140) NOT NULL,
  `title` varchar(140) NOT NULL,
  `status` enum('publish','draft','private') NOT NULL default 'draft',
  `show_toc` enum('Y','N') NOT NULL default 'N',
  `toc_cid` tinyint(2) NOT NULL,
  `js_file` varchar(40) NOT NULL,
  `c_time` datetime NOT NULL,
  `m_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=274 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `essay`
--

LOCK TABLES `essay` WRITE;
/*!40000 ALTER TABLE `essay` DISABLE KEYS */;
INSERT INTO `essay` VALUES (1,'110107-motd.php','20110107 MOTD (Useless)','draft','N',0,'util.js','2011-01-07 00:00:00','2011-04-01 13:16:52'),(2,'110106-motd.php','20110106 MOTD','private','N',0,'util.js','2011-01-06 00:00:00','2011-03-16 07:01:12'),(3,'101016-js-util-id.php','util.js 文件中的 id()中参数到底加不加引号？','publish','N',0,'util.js','2010-10-16 00:00:00','2012-08-14 09:07:28'),(4,'101106-js-onload-event-body-or-window.php','以各种Event Model来触发onload事件','draft','N',0,'util.js','2010-11-06 00:00:00','2011-01-14 01:40:52'),(5,'101116-js-on-bigpicture.php','The Big Picture 网站图片浏览JS特效学习','draft','N',0,'util.js','2010-11-16 00:00:00','2011-01-14 01:40:52'),(6,'101118-js-ch20-example-linkdetail-log.php','Example 20-8: linkdetail.js 笔记','draft','N',0,'util.js,HTTP.js,tooltip.js,linkdetail.js','2010-11-18 00:00:00','2011-01-15 03:18:44'),(7,'101121-lang-literal.php','程序语言中的 Literal','draft','N',0,'util.js','2010-11-21 00:00:00','2011-01-14 01:42:27'),(8,'101125-js-toc.php','toc-chapter.js Notes','draft','N',0,'util.js','2011-01-07 00:00:00','2011-01-26 09:07:31'),(9,'101126-js-alter-global-variable-undefined-carefully.php','修改JavaScript全局变量（如 undefined）时须警惕','publish','N',0,'util.js','2010-11-26 00:00:00','2011-03-16 08:47:01'),(10,'101223-linux-filesystem.php','Linux 文件系统','publish','Y',0,'util.js','2010-12-23 00:00:00','2011-10-29 22:55:39'),(11,'110109-php-foreach-array.php','更改 tsheader.php 中动态包含 JS 文件的代码','draft','N',0,'util.js','2011-01-09 00:00:00','2011-02-23 14:05:09'),(12,'110108-motd.php','创建一个 MySQL 表格','draft','N',0,'util.js','2011-01-08 00:00:00','2011-04-01 13:19:49'),(13,'110108-motd-bak.php','［往事］Index 中 Daily Logs 之前记录备份','private','N',0,'util.js','2011-01-08 00:00:00','2012-10-16 06:27:25'),(14,'110112-mysql-dump-chinese-with-latin1.php','mysqldump 导出表格中文乱码的问题','publish','N',0,'util.js','2011-01-12 00:00:00','2011-03-16 08:46:34'),(26,'101227-life.php','2010年总结','private','N',0,'','2010-12-27 00:00:00','2011-03-16 07:01:23'),(27,'110113-lang-using-vims-yy-copy-carefully.php','使用 Vim 的整行复制(yy)、粘贴(p) 时的注意事项','publish','N',0,'util.js','2011-01-13 10:50:01','2011-03-16 08:47:33'),(28,'110113-mysql-4-basic-operation.php','MySQL增改删查基本操作总结','draft','Y',0,'util.js','2011-01-13 21:18:41','2011-03-08 06:57:41'),(29,'110115-plog-add-essay-tag-pool.php','增加 Essay 标签显示功能','draft','N',0,'util.js','2011-01-15 09:26:18','2011-03-02 03:26:58'),(30,'110120-plog-addt.php','让 tsfoot.php 页面中 addt 模块脱离正常文本流','draft','N',0,'util.js','2011-01-20 12:02:09','2011-01-20 07:47:55'),(31,'110121-css-difference-between-display-and-visibility.php','HTML元素的可见性（CSS属性visibility和display的区别）','publish','N',0,'util.js','2011-01-21 08:35:53','2011-03-16 08:48:00'),(32,'110122-js-an-onmouseover-event-practice.php','JS onmouseover 事件在 t.php 上的实践','draft','N',0,'util.js','2011-01-22 10:19:05','2011-03-15 03:57:14'),(33,'110124-life-yanlei-marriage.php','新乡记','private','N',0,'util.js','2011-01-24 16:57:00','2011-03-16 07:00:24'),(34,'110124-life-why-cry.php','又办了件出力不讨好的事','private','N',0,'','2011-01-24 22:21:10','2011-03-16 07:00:15'),(35,'110125-php-foreach-warning.php','foreach 遍历时提示 Warning 信息','draft','N',0,'util.js','2011-01-25 11:21:31','2011-03-03 03:22:42'),(36,'110126-life-story-of-manager-li.php','每个人都有自己的故事','private','N',0,'util.js','2011-01-26 22:42:37','2011-03-16 07:00:05'),(37,'110128-life-story-of-spring.php','春天里','private','N',0,'util.js','2011-01-28 10:15:05','2011-03-16 06:59:55'),(38,'110221-css-border-style-from-xbetainfo.php','xbeta.info 网站标题样式借鉴','draft','N',0,'util.js','2011-02-21 10:12:49','2011-03-07 01:52:53'),(39,'110222-plog-add-modify-info-for-essay.php','利用 PHP 的文件、目录函数为 Essays 添加文档修改日期信息、改进add.php页面','draft','N',0,'util.js','2011-02-22 13:27:45','2011-03-07 01:52:53'),(40,'110222-life.php','亲戚有时信不过——修热水器有感','private','N',0,'util.js','2011-02-22 21:40:42','2011-03-16 06:59:47'),(42,'110223-php-a-string-reverse-function-strrev.php','郑渊洁在 sinat 中倒写汉字有没有对应的函数？[Fixed]','publish','N',0,'util.js','2011-02-23 22:17:28','2012-08-14 09:08:58'),(43,'110224-gnu-wrong-use-command-cp.php','cp 命令误用导致 npu.sh 备份失败、数据不同步','publish','N',0,'util.js','2011-02-24 19:54:19','2012-08-14 09:08:35'),(44,'110224-life-credit-card-lost-found.php','差点把经理的信用卡弄丢，玩游戏玩得忙中出错','private','N',0,'util.js','2011-02-24 21:30:21','2011-03-16 06:59:37'),(45,'110225-php-have-a-look-at-all-string-functions.php','对 PHP 字符串函数列表的一点理解','draft','N',0,'util.js','2011-02-25 09:17:25','2011-03-07 01:52:53'),(46,'110225-php-wordpress-learning-logs.php','WordPress V1.0 代码学习笔记（一）','draft','Y',0,'util.js','2011-02-25 21:28:16','2011-04-16 23:19:18'),(47,'110226-php-it-is-time-to-think-about-study-method-from-wordpress-code.php','查看别人代码太有必要了——categories 页面有感','draft','N',0,'util.js','2011-02-26 22:07:31','2011-03-07 01:52:53'),(48,'110227-life-the-grass-eyedrops-broke.php','摔碎眼药瓶','private','N',0,'util.js','2011-02-27 21:01:48','2011-03-16 06:59:28'),(49,'110228-php-wordpress-learning-02-wpdb-class.php','WordPress 代码学习笔记（二）——wp-db 类','draft','Y',0,'util.js','2011-02-28 14:23:16','2011-03-07 08:09:16'),(50,'110228-life-remember-to-give-a-call-when-relatives-were-ill.php','炎生哥感冒，我却连个电话都没打，该打','private','N',0,'util.js','2011-02-28 22:35:25','2011-03-16 06:59:19'),(51,'110301-plog-twitter-change-logs.php','Twitter 页面修改日志','draft','N',0,'util.js','2011-03-01 15:48:48','2011-03-07 01:52:53'),(52,'110301-linux-you-should-never-use-aliased-command-in-shell-scripts.php','Never Use Aliased Commands in Shell Scripts','publish','N',0,'util.js','2011-03-01 20:40:54','2011-03-16 08:49:14'),(53,'101015-js-id-for-jsvascript-class-for-css.php','ID VS CSS: Use HTML Attribute id in JavaScript, class in CSS','draft','N',0,'util.js','2010-10-15 11:42:14','2011-03-07 01:52:53'),(54,'110302-english-tam-massacre-1989.php','The Tiananmen Square Massacre, 1989','draft','N',0,'util.js','2011-03-02 11:50:31','2011-03-07 01:52:53'),(57,'110302-php-new-essay.php','［表格结构］Essay Change Logs','publish','Y',0,'util.js','2011-03-02 15:38:24','2011-04-06 12:42:47'),(58,'110303-plog-optimize-essay-module-successfully.php','Happy, ah?','draft','N',0,'util.js','2011-03-03 10:18:47','2011-03-07 01:52:53'),(59,'110303-php-make-sure-data-type-is-array-when-using-foreach-and-in_array.php','Make Sure The Data Type is correct When Using foreach and in_array','publish','N',0,'util.js','2011-03-03 16:08:28','2012-08-14 09:09:34'),(60,'110303-life-think-a-name-for-my-baby.php','I Thought a Name for My Baby','private','N',0,'util.js','2011-03-03 22:10:58','2011-03-16 06:59:12'),(61,'110304-php-resolved-error-count-bug-of-tag-pool.php','Resoved Error Count Bug of Tag Pool Module','draft','N',0,'util.js','2011-03-04 10:17:12','2011-03-07 01:52:53'),(62,'110304-plog-redirect-page-after-sql-update-delete-insert-operation.php','Redirect Page Using JavaScript','draft','N',0,'util.js','2011-03-04 15:00:59','2011-03-07 01:52:53'),(63,'110305-js-use-void-in-javascript-url.php','Invoke JavaScript Codes in a Link Using javascript: URL','draft','N',0,'util.js','2011-03-05 09:22:28','2011-03-07 03:58:58'),(64,'110306-css-navigation-style-of-apple.php','Apple\'s Navigation Style','draft','N',0,'util.js','2011-03-06 21:10:04','2011-03-08 03:31:52'),(65,'110307-life-two-bad-habits.php','改掉抽烟的毛病','private','N',0,'util.js','2011-03-07 09:08:08','2011-03-16 06:59:02'),(66,'110307-plog-optimize-toc-display-module-in-essay.php','Optimize Display TOC Module in Essay','draft','N',0,'util.js','2011-03-07 10:51:58','2011-03-07 02:51:58'),(67,'110307-plog-fetch-latest-file-for-essay-add-select-option.php','Optimize Essay Add Module: Fetch the Latest Essay File Directly','draft','N',0,'util.js','2011-03-07 14:12:39','2011-03-07 07:00:03'),(68,'110308-mysql-how-does-wp31-deal-with-tags.php','How Does WordPress 3.1 Deal With Tags','draft','N',0,'util.js','2011-03-08 08:41:05','2011-03-08 00:41:05'),(69,'110308-plog-create-tags-management-page.php','WEB: MySQL integer columns and display width','draft','N',0,'util.js','2011-03-08 10:57:15','2011-03-09 09:05:51'),(70,'110308-linux-classic-path-problem-occurred-again.php','Classic PATH Problem in Java Occurred in Shell Scriptting Again','publish','N',0,'util.js','2011-03-08 14:20:44','2012-08-14 09:10:19'),(71,'110308-doc-mysql-manual-notes-ch10-data-type.php','[ MySQL Reference Notes ] - Ch10 - Data Type','publish','Y',10,'util.js','2011-03-08 17:00:56','2012-08-14 09:10:44'),(72,'110310-mysql-what-is-the-meaning-of-number-in-parenthesis-when-declaring-integer-columns.php','What\'s The Meaning of Number in Parenthesis When Declaring Integer Columns','publish','N',0,'util.js','2011-03-10 08:21:07','2012-08-14 09:11:09'),(73,'110310-doc-site-bugs-found-and-resolved.php','[ Bugs Found and Resolved ] 01','draft','Y',0,'util.js','2011-03-10 10:10:33','2011-03-10 05:35:06'),(74,'110310-php-ask-yourself-a-question-before-using-an-array.php','Ask Yourself A Question Before Using An Array Variable','draft','N',0,'util.js','2011-03-10 11:03:17','2011-03-10 03:03:17'),(75,'110310-doc-pages-logs.php','[ Pages Logs ]','draft','Y',0,'util.js','2011-03-10 16:06:07','2011-03-10 08:27:09'),(76,'110313-php-convert-dynamic-pages-to-static-ones.php','Convert Dynamic Pages To Static HTML Pages','draft','N',0,'util.js','2011-03-13 19:01:42','2011-03-13 11:01:42'),(77,'110315-php-convert-dynamic-pages-to-static-HTML.php','如何将一个 PHP 页面转换为 HTML页面','draft','N',0,'util.js','2011-03-15 09:05:44','2011-03-15 13:32:22'),(78,'110315-life-mother-I-child.php','对待家庭应有一颗包容的心','private','N',0,'util.js','2011-03-15 22:26:34','2011-03-16 04:48:24'),(79,'110316-plog-2nd-install-movable-type.php','第二次安装 MovableType','draft','N',0,'util.js','2011-03-16 09:40:42','2011-03-16 01:40:42'),(80,'110316-plog-optimize-essay-categories-manage-page.php','优化 Essay 类别管理页面 categories.php','draft','N',0,'util.js','2011-03-16 15:15:59','2011-03-16 07:15:59'),(81,'110317-css-joel-on-soft-archive-style.php','Joelonsoft 网站归档模块样式借鉴','publish','N',0,'util.js,geometry.js','2011-03-17 16:08:04','2012-08-14 09:11:37'),(82,'110318-plog-empty-tag-problem-in-tags-page.php','空标签老是出现的原因','draft','N',0,'util.js','2011-03-18 08:11:59','2011-03-18 00:11:59'),(83,'110318-css-font-sans-serif.php','Sans Serifs 字体简介','publish','N',0,'util.js','2011-03-18 15:28:42','2012-08-14 09:11:54'),(84,'110319-css-font-size-px-pt-em.php','CSS 字体大小单位（pt, px, em）','draft','N',0,'util.js','2011-03-19 09:59:36','2011-03-19 01:59:36'),(85,'110320-life-wangfeng-talk-about-success.php','汪峰谈成功与失败','private','N',0,'util.js','2011-03-20 21:41:28','2011-03-20 13:42:39'),(86,'110320-plog-summary-of-week-11.php','[ 一周工作小节 ] W11 ( 2011.3.14 - 2011.3.20 )','draft','N',0,'util.js','2011-03-20 22:00:46','2011-03-20 14:00:46'),(87,'110321-life-two-years-anniversary-of-meeting-jinyan.php','相识两年','private','N',0,'util.js','2011-03-21 10:27:08','2011-03-21 06:30:07'),(88,'110321-plog-static-publishing-minimizes.php','最小化静态发布','publish','N',0,'util.js','2011-03-21 10:30:01','2011-03-21 02:30:01'),(89,'110321-php-notice-when-using-function-file_get_contents.php','一个 Bug 引出函数 file_get_contents() 使用时的注意事项','publish','N',0,'util.js','2011-03-21 15:21:19','2012-08-14 09:12:24'),(90,'110324-css-collapsing-margins.php','区块间边距重叠现象','publish','N',0,'util.js','2011-03-24 17:08:47','2011-03-25 03:16:44'),(91,'110329-js-multiple-documents.php','JS 文档之间的交流','draft','N',0,'util.js','2011-03-29 14:39:10','2011-03-29 06:39:10'),(92,'110329-life-adult-images.php','Adult Images','private','N',0,'util.js','2011-03-29 20:59:10','2011-03-29 12:59:10'),(93,'110331-life-visit-fo-sun-office.php','去新火线办公室、给三姐装电脑','private','N',0,'util.js','2011-03-31 21:03:21','2011-03-31 13:03:21'),(94,'110401-php-learn-wp-index-page.php','Learn WordPress\'s Index Page','draft','N',0,'util.js','2011-04-01 15:56:34','2011-04-01 07:56:34'),(95,'110403-plog-summary-of-week-13.php','[ 一周工作小节 ] W13 ( 2011.3.27 - 2011.4.3 )','draft','N',0,'util.js','2011-04-03 22:46:22','2011-04-03 14:46:42'),(96,'110403-life-cpu-fan-error-f1.php','清明扫墓、给官庄玲姑修电脑','private','N',0,'util.js','2011-04-03 23:16:21','2011-04-03 15:16:21'),(97,'110407-life-zhumadian-and-shangqiu.php','本来该发商丘的东西鬼使神差发到驻马店风波','private','N',0,'util.js','2011-04-07 21:43:30','2011-04-07 13:43:30'),(98,'110409-plog-dictionary-app.php','单词管理小应用创建记录','publish','N',0,'util.js','2011-04-09 21:53:38','2012-08-14 09:13:34'),(99,'110410-plog-summary-of-week-14.php','[ 一周工作小节 ] W14 ( 2011.4.4 - 2011.4.10 )','draft','N',0,'util.js','2011-04-10 16:47:06','2011-04-10 08:47:06'),(100,'110413-plog-quicktags-and-xclose-link.php','简易编辑框和 popup 表单右上角透明关闭按钮实现','draft','N',0,'util.js','2011-04-13 08:38:49','2011-04-13 00:38:49'),(101,'110413-js-jquery-starts.php','初识 JQuery','draft','Y',0,'util.js','2011-04-13 21:16:42','2012-02-15 06:08:45'),(102,'110414-css-study-popup-form-style-of-gmail.php','表格比区块更适合装载表单','draft','N',0,'util.js','2011-04-14 21:02:49','2011-04-21 01:24:56'),(103,'110414-test.php','实践：找到养老保险表中重复输入的身份证号','draft','Y',2,'util.js','2011-04-14 22:17:35','2011-04-18 00:55:17'),(104,'110415-css-dont-set-td-style-when-reverse-row-color.php','反色显示表格行效果中切勿设置单元格背景色','draft','N',0,'util.js','2011-04-15 09:29:42','2011-04-15 01:29:42'),(105,'110417-plog-wordpress-taxonomy.php','将单词出处信息独立出来','draft','N',0,'util.js','2011-04-17 07:03:25','2011-04-16 23:03:25'),(106,'110418-plog-summary-of-week-15.php','[ 一周工作小节 ] W15 ( 2011.4.11 - 2011.4.17 )','draft','N',0,'util.js','2011-04-18 08:19:27','2011-04-18 00:19:27'),(107,'110418-plog-depth-first-search-a-tree.php','实践：深度遍历树并用缩进形式显示单词例句的所有出处','draft','N',0,'util.js','2011-04-18 09:22:55','2011-04-18 02:56:20'),(108,'110419-life-about-live.php','生命','private','N',0,'util.js','2011-04-19 21:03:15','2011-04-19 13:03:15'),(109,'110428-english-grammar-words.php','English Grammar','publish','N',0,'util.js','2011-04-28 11:20:33','2012-08-14 09:12:54'),(110,'110507-doc-entity-relationship-module.php','[Entity Relationship Module]','draft','N',0,'util.js','2011-05-07 08:40:55','2011-05-07 00:40:55'),(111,'110510-life-concerntration.php','锻炼注意力','private','N',0,'util.js','2011-05-10 13:12:24','2011-05-10 05:12:24'),(112,'110510-mysql-omit-autoincrement-column-when-inserting.php','进行INSERT操作时省去自动增加的列','draft','N',0,'util.js','2011-05-10 14:33:23','2011-05-10 06:33:23'),(113,'110511-doc-learning-mysql-notes-ch06-db-structure.php','[ Learning MySQL ] Ch06 Notes','publish','Y',0,'util.js','2011-05-11 10:57:12','2012-08-14 09:26:14'),(114,'110513-doc-micropowder-knowledge.php','Particle Size Distribution','draft','Y',0,'util.js','2011-05-13 15:57:35','2011-05-18 00:02:52'),(115,'110518-doc-learning-mysql-notes-ch07-advanced-querying.php','[ Learning MySQL Notes] Ch07: Advanced Querying','publish','Y',0,'util.js','2011-05-18 17:24:14','2012-08-14 09:25:48'),(116,'110518-life-a-tshirt-from-elder-sister.php','大姐给我买了件安踏短袖','private','N',0,'util.js','2011-05-18 22:26:33','2011-05-18 14:26:33'),(117,'110622-plog-display-precise-time-about-my-son.php','显示 andro 来到这个世界的精确时间','draft','N',0,'util.js','2011-06-22 08:24:33','2011-06-30 01:49:20'),(118,'110625-why-two-onload-events-does-not-work-in-one-page.php','[已解决]一个文档中有两个onload事件，为何仅执行后一个？','draft','N',0,'util.js','2011-06-25 09:50:45','2011-06-25 03:49:34'),(119,'110626-life-only-our-three-at-home.php','andro满月后，父母回老家了','private','N',0,'util.js','2011-06-26 16:52:25','2011-06-26 08:58:24'),(120,'110628-life-my-classmate-lierming-borrow-me-ten-thousand-to-buy-house.php','二明买房借钱、金艳全天照看安琢首日','private','N',0,'util.js','2011-06-28 22:27:33','2011-06-28 14:27:33'),(121,'110705-life-these-days-things-are-all-in-this-page.php','自己写了个订单管理系统','private','N',0,'util.js','2011-07-05 22:13:56','2011-07-05 14:13:56'),(122,'110715-php-e-order-app-create-log.php','电子订单管理应用日志','publish','N',0,'util.js','2011-07-15 10:58:57','2012-08-14 09:26:56'),(123,'110719-linux-install-chrome-browser-in-debian-lenny.php','在 Debian Lenny 中安装 Chrome 浏览器','publish','N',0,'util.js','2011-07-19 11:30:57','2012-08-14 09:27:05'),(124,'110706-life-my-ebike-broke-in-the-rain.php','电动车在雨中失灵','private','N',0,'util.js','2011-07-06 18:49:56','2011-07-20 10:50:29'),(125,'110815-life-chenxy-bought-bmw.php','哥买宝马汽车了','private','N',0,'util.js','2011-08-15 17:22:49','2011-08-15 09:22:49'),(126,'110825-life-laojun-mountain.php','老君山简介','draft','N',0,'util.js','2011-08-25 14:39:06','2011-08-25 06:39:06'),(127,'110908-life-mother-and-andro.php','母亲年迈','draft','N',0,'util.js','2011-09-08 12:58:53','2012-08-14 09:27:28'),(128,'110909-life-andro-illed.php','Andro发烧记','private','N',0,'util.js','2011-09-09 21:49:01','2011-09-09 13:49:01'),(129,'110910-andro-taking-photos-on-day-108.php','洗澡大哭、照百天照','draft','N',0,'util.js','2011-09-10 15:58:51','2011-09-11 07:59:54'),(130,'20110915-andro-sisters-came-on-moon-festival.php','中秋节','draft','N',0,'util.js','2011-09-15 13:54:30','2011-09-15 05:54:30'),(131,'20110918-andro-rainny-sunday.php','下雨天的周末','draft','N',0,'util.js','2011-09-18 20:44:36','2011-09-18 12:44:36'),(132,'20110927-js-jquery-fundamentals-note.php','jQuery Fundamentals 笔记','draft','Y',0,'util.js','2011-09-27 10:48:23','2011-09-27 02:48:23'),(133,'20111003-life-guanjunchuangs-banquet.php','俊闯结婚在郑州请客吃饭','private','N',0,'util.js','2011-10-03 21:39:24','2011-10-03 13:39:24'),(134,'20111003-andro-red-dot-on-leg.php','右腿上起红疙瘩儿','draft','N',0,'util.js','2011-10-03 21:49:27','2011-10-03 13:49:27'),(135,'20111004-andro-went-to-childrens-hospital.php','儿童医院看病记','draft','N',0,'util.js','2011-10-04 20:44:47','2011-10-04 12:44:47'),(136,'20111005-andro-milk.php','哺乳','draft','N',0,'util.js','2011-10-05 17:39:51','2011-10-05 09:39:51'),(137,'20111008-andro-toke-photo-in-chenguang.php','晨光照相馆服务质量和态度都很差劲','draft','N',0,'util.js','2011-10-08 22:50:32','2011-10-08 14:50:32'),(138,'20111009-life.php','看清伟嫂、喜顺叔深夜造访','private','N',0,'util.js','2011-10-09 23:29:40','2011-10-09 15:29:40'),(139,'20111011-life-thoughts-from-a-company-meeting.php','锻炼文字、语言上的逻辑性——公司开会发言有感','private','N',0,'util.js','2011-10-11 02:14:42','2011-10-10 18:14:42'),(140,'20111016-mysql-change-default-character-set-from-latin1-to-utf8.php','将 MySQL 默认字符编码由 latin1 改为 utf8','publish','N',0,'util.js','2011-10-16 20:33:13','2012-08-14 09:28:10'),(141,'20111016-life-giant-bycle.php','买了辆山地车','private','N',0,'util.js','2011-10-16 20:44:52','2011-10-29 21:36:46'),(142,'20111018-mysql-variable-null.php','MySQL 中的变量 NULL','publish','N',0,'util.js','2011-10-18 11:11:50','2012-08-14 09:27:59'),(143,'20111025-mysql-order-tables-structures.php','Eorders 表格结构','draft','N',0,'util.js','2011-10-25 17:08:02','2011-10-25 09:08:02'),(144,'20111028-life-favourite-video-about-yanni.php','Yanni Live! 音乐会录像观感','private','N',0,'util.js','2011-10-28 04:51:13','2011-10-27 20:51:13'),(145,'20111028-php-quirk-of-function-date.php','date() 函数输出\'1970-01-01 08:00\'的问题','publish','N',0,'util.js','2011-10-28 08:59:29','2012-08-14 09:27:44'),(146,'20111114-life-30days-of-zhang-jingyue.php','张竞月满月酒席饭局记录','private','N',0,'util.js','2011-11-14 22:09:01','2011-11-14 14:09:01'),(147,'20111118-life-30-years-birthday.php','三十岁','private','N',0,'util.js','2011-11-18 22:41:30','2011-11-18 14:41:30'),(148,'20111124-life-about-wang-huchen.php','关于王虎臣','private','N',0,'util.js','2011-11-24 14:50:43','2011-11-24 06:50:43'),(149,'20111130-andro-saw-snow-first-time.php','打疫苗、第一次看到雪','draft','N',0,'util.js','2011-11-30 16:00:40','2011-11-30 08:00:40'),(150,'20111205-andro-ba-ba-ba-ba-ba.php','晚上哭闹、无意识的喊爸？','draft','N',0,'util.js','2011-12-05 13:56:22','2011-12-05 05:56:22'),(151,'20111208-life-borrow-money-to-mayu.php','借马玉钱','private','N',0,'util.js','2011-12-08 20:13:43','2011-12-08 12:13:43'),(152,'20111210-js-learning-boxy.php','Boxy 插件笔记','publish','Y',0,'util.js','2011-12-10 09:15:04','2012-08-14 09:29:02'),(153,'20111227-js-learning-qtip.php','qTip 插件笔记','draft','N',0,'util.js','2011-12-27 09:37:23','2011-12-27 01:37:23'),(154,'20111227-js-qtip-tooltip-via-ajax.php','借助 qTip 插件实现动态显示相关信息卡片的效果','publish','N',0,'util.js','2011-12-27 16:06:16','2012-08-14 09:28:44'),(155,'20111227-life-gif-style.php','gif in sex','private','N',0,'util.js','2011-12-27 20:27:20','2011-12-27 12:27:20'),(156,'20120109-linux-install-debian-the-6th-time.php','第 6 次安装 Debian','publish','N',0,'util.js','2012-01-09 09:31:00','2012-08-14 23:32:26'),(157,'20120131-php-experience-in-eorder-application.php','E-Order Application 中的经验教训','publish','N',0,'util.js','2012-01-31 11:56:23','2012-08-14 23:33:00'),(158,'20120203-php-learn-ezsql-class-2rd-time.php','自定义函数可选参数的声明技巧——二读 EZSQL 类库','publish','N',0,'util.js','2012-02-03 21:05:28','2012-08-14 23:33:25'),(159,'20120209-chinese-xuxieke-huangshan.php','许霞客《游黄山日记》笔记','draft','N',0,'util.js','2012-02-09 22:15:57','2012-02-09 14:15:57'),(160,'20120215-js-jquery-disable-a-link.php','如何禁用链接的默认的访问地址功能？','draft','N',0,'util.js','2012-02-15 16:02:34','2012-02-15 08:02:34'),(161,'20120216-php-first-talk-about-speed.php','关于加快页面速度','draft','N',0,'util.js','2012-02-16 10:43:12','2012-02-16 02:43:12'),(162,'20120221-mysql-changing-enum-type.php','修改表格中 ENUM 类型的方法','draft','N',0,'util.js','2012-02-21 11:21:14','2012-02-21 03:21:14'),(163,'20120224-life-the-film-127-hours.php','《127 Hours》','draft','N',0,'util.js','2012-02-24 15:34:00','2012-02-24 07:34:00'),(164,'20120314-js-ajax-loading-effect.php','AJAX Loading 特效','draft','N',0,'util.js','2012-03-14 12:51:10','2012-03-14 04:51:10'),(165,'20120315-php-predefined-variable-server-name.php','预定义变量 $_SERVER[\'SERVER_NAME\']','draft','N',0,'util.js','2012-03-15 16:58:45','2012-03-15 08:58:45'),(166,'20120330-js-click-event.php','click 事件具有叠加性','publish','N',0,'util.js','2012-03-30 22:34:05','2012-08-14 23:34:25'),(167,'20120416-eorder-change-log-0.0.15.php','E-Order V0.0.15 Change Log','publish','N',0,'util.js','2012-04-16 08:42:26','2012-08-14 23:34:38'),(168,'20120426-eorder-change-log-0.0.16.php','E-Order V0.0.16 Change Log','publish','Y',0,'util.js','2012-04-26 16:01:20','2012-08-14 23:34:48'),(169,'20120510-ued-prevent-browser-from-reading-cache-js-css-img-data.php','如何阻止浏览器读取存储于本地的缓存数据（js 文件,CSS文件及图片）','publish','N',0,'util.js','2012-05-10 13:50:22','2012-08-14 23:35:05'),(170,'20120518-js-an-indetectable-bug-about-html-tag.php','HTML 标签不对称造成的一个极其隐蔽的 Bug','publish','N',0,'util.js','2012-05-18 11:34:03','2012-08-14 23:35:28'),(171,'20120521-eorder-change-log-0.0.17.php','E-Order V0.0.17 Change Log','publish','Y',0,'util.js','2012-05-21 11:05:48','2012-08-14 23:35:39'),(172,'20120531-css-button.php','统一按钮外观','draft','Y',0,'util.js','2012-05-31 15:48:06','2012-05-31 07:48:06'),(173,'20120607-jquery-variable-in-ajax.php','jQuery  ajax 方法中的变量','publish','N',0,'util.js','2012-06-07 10:57:48','2012-08-14 23:36:01'),(174,'20120612-tech-ictag-and-tron-in-japan.php','NHK 纪录片之微型计算机技术者们的攻防','draft','N',0,'util.js','2012-06-12 07:55:54','2012-06-11 23:55:54'),(175,'20120612-eorder-module-change-log.php','E-Order 主要模块功能更新日志','publish','Y',0,'util.js','2012-06-12 08:12:42','2012-08-14 23:36:17'),(176,'20120614-andro.php','母亲生病','draft','N',0,'util.js','2012-06-14 16:54:44','2012-06-14 08:54:44'),(177,'20120618-andro.php','W25','draft','N',0,'util.js','2012-06-18 08:01:25','2012-06-19 00:02:33'),(178,'20120625-andro.php','W26','draft','N',0,'util.js','2012-06-25 08:22:05','2012-06-30 13:56:07'),(179,'20120702-andro.php','W27','draft','N',0,'util.js','2012-07-02 07:47:20','2012-07-02 23:47:37'),(180,'20120703-eorder-change-log-0.0.18.php','E-Order V0.0.18 Change Log','publish','Y',0,'util.js','2012-07-03 08:55:11','2012-08-14 23:36:30'),(181,'20120707-js-two-way-reducing-page-size.php','加快页面载入速度的两个方法','publish','N',0,'util.js','2012-07-07 08:54:16','2012-08-14 23:36:46'),(182,'20120709-andro.php','Life in W28 2012','draft','N',0,'util.js','2012-07-09 07:44:22','2012-07-10 09:51:47'),(183,'20120713-php-sugarcrm-firstlook.php','首次安装 SugarCRM','draft','N',0,'util.js','2012-07-13 10:03:13','2012-07-13 02:03:13'),(184,'20120716-andro.php','W29, 2012','draft','N',0,'util.js','2012-07-16 08:15:19','2012-07-18 00:40:43'),(185,'20120720-js-minify.php','Minify: 压缩 .js, .css 文件','draft','N',0,'util.js','2012-07-20 10:25:17','2012-07-20 02:25:17'),(186,'20120723-andro.php','W30, 2012','draft','N',0,'util.js','2012-07-23 08:12:53','2012-07-23 00:12:53'),(187,'20120730-andro.php','W31, 2012','draft','N',0,'util.js','2012-07-30 09:19:03','2012-08-01 14:10:31'),(188,'20120806-andro.php','W32, 2012','draft','N',0,'util.js','2012-08-06 09:31:14','2012-08-07 01:31:34'),(189,'20120811-eorder-change-log-0.0.19.php','E-Order V0.0.19 Change Log','publish','Y',0,'util.js','2012-08-11 09:06:20','2012-08-14 23:48:57'),(190,'20120811-js-popup-boxy-window-once-page-loaded.php','在页面加载完毕后即弹出 boxy 窗口的方法','draft','N',0,'util.js','2012-08-11 11:48:01','2012-08-11 03:48:01'),(191,'20120813-andro.php','W33, 2012','draft','N',0,'util.js','2012-08-13 08:30:27','2012-08-13 00:30:27'),(192,'20120813-life-introdude-myself.php','个人简历','publish','N',0,'util.js','2012-08-13 20:47:20','2012-08-16 08:39:38'),(193,'20120818-php-yiiframework.php','Yii Framework 初识','draft','N',0,'util.js','2012-08-18 08:17:41','2012-08-18 00:17:41'),(194,'20120820-andro.php','W34, 2012','draft','N',0,'util.js','2012-08-20 08:07:37','2012-08-21 00:08:12'),(195,'20120827-andro.php','W35, 2012','draft','N',0,'util.js','2012-08-27 13:37:33','2012-08-27 05:37:33'),(196,'20120827-php-yii-blog-tutorial-learning-note.php','Yii Blog Tutorial Learning Notes','draft','Y',0,'util.js','2012-08-27 15:08:48','2012-08-27 07:08:48'),(197,'20120830-php-remove-index-php-in-yii-blog-url.php','移除 Yii Blog URL 中的 \'index.php\'','draft','N',0,'util.js','2012-08-30 11:48:24','2012-08-30 03:48:24'),(198,'20120830-linux-user-www-data.php','Linux 用户 www-data','draft','N',0,'util.js','2012-08-30 16:11:40','2012-08-30 08:11:40'),(199,'20120831-php-keynote-of-yii-guide.php','The Definitive Guide of Yii 笔记','draft','Y',0,'util.js','2012-08-31 07:20:27','2012-08-30 23:20:27'),(200,'20120903-andro.php','W36, 2012','draft','N',0,'util.js','2012-09-03 07:20:15','2012-09-02 23:20:15'),(201,'20120903-php-how-to-get-an-element-value-in-yii-cform.php','如何获取 Yii CForm 表单中元素的值','draft','N',0,'util.js','2012-09-03 07:56:22','2012-09-02 23:56:22'),(202,'20120910-andro.php','W37, 2012','draft','N',0,'util.js','2012-09-10 08:33:55','2012-09-10 00:33:55'),(203,'20120911-yii-display-multiple-table-columns-in-cgredview.php','在 CGridView Widget 中显示两个关系表中的列','draft','N',0,'util.js','2012-09-11 10:37:38','2012-09-11 02:37:38'),(204,'20120912-yii-loading-content-via-ajax.php','在 Yii 中通过 AJAX 加载内容','draft','N',0,'util.js','2012-09-12 21:23:11','2012-09-12 13:23:11'),(205,'20120913-js-trick-of-declaring-optional-argument.php','JavaScript 函数可选参数声明的技巧','draft','N',0,'util.js','2012-09-13 14:41:41','2012-09-13 06:41:41'),(206,'20120917-andro.php','W38, 2012','draft','N',0,'util.js','2012-09-17 16:58:37','2012-09-17 08:58:37'),(207,'20120921-eorder-action-return-and-change.php','E-Order 退货换货功能实现','draft','N',0,'util.js','2012-09-21 20:56:01','2012-09-21 12:56:36'),(208,'20120924-andro.php','W39, 2012','draft','N',0,'util.js','2012-09-24 10:29:48','2012-09-24 02:29:48'),(209,'20120925-yii-validation-scenario.php','根据不同情况验证不同表单元素的方法','draft','N',0,'util.js','2012-09-25 15:55:32','2012-09-25 07:55:32'),(210,'20120926.yii.display-radio-button-in-wide-form-beautifully.php','单选按钮的显示的问题','draft','N',0,'util.js','2012-09-26 16:12:44','2012-09-26 08:12:44'),(211,'20120926.yii.unify-creation-of-mainland-and-aboard-customer-in-one-form-via-js.php','向 Yii 中加入自定义 JS 代码','draft','N',0,'util.js','2012-09-26 17:04:18','2012-09-26 09:04:18'),(212,'20120927.yii.ajax-filter-in-cgridview-widget.php','CGridView 中 AJAX 过滤功能浅述','draft','N',0,'util.js','2012-09-27 11:41:28','2012-09-27 03:41:28'),(213,'20120928.yii.practice-widget-cdetailview.php','CDetailView 显示客户信息','draft','N',0,'util.js','2012-09-28 10:40:38','2012-09-28 02:40:38'),(214,'20120929.yii.define-controller-action-using-caction.php','用 CAction 定义 Controller Actions','draft','N',0,'util.js','2012-09-29 09:20:38','2012-09-29 01:20:38'),(215,'20121001-andro.php','W40, 2012','draft','N',0,'util.js','2012-10-01 07:54:56','2012-10-02 14:21:22'),(216,'20121008.andro.php','W41, 2012','draft','N',0,'util.js','2012-10-08 07:32:26','2012-10-07 23:32:26'),(217,'20121012.eorder.action-return-and-change-2.php','退货操作（二）协议结算订单到帐授权存在的问题','draft','N',0,'util.js','2012-10-12 16:40:37','2012-10-17 01:09:17'),(218,'20121015.andro.php','W42, 2012','draft','N',0,'util.js','2012-10-15 11:04:17','2012-10-15 03:04:17'),(219,'20121016.eorder.accounting-basis.php','会计名词基础','draft','Y',0,'util.js','2012-10-16 09:06:38','2012-11-05 08:59:17'),(220,'20121016.linux.from-dhcp-to-static-ip.php','由自动获取 IP 改为固定 IP','draft','N',0,'util.js','2012-10-16 14:04:05','2012-10-16 06:04:27'),(221,'20121017.eorder.change-log-0.0.20.php','E-Order V0.0.20 Change Log','draft','Y',0,'util.js','2012-10-17 07:10:23','2012-10-16 23:10:23'),(222,'20121019.eorder.expense-status-code-error-caused-by-page-delay.php','用户页面未及时刷新导致费用申请状态错误','draft','N',0,'util.js','2012-10-19 11:03:12','2012-10-19 03:03:12'),(223,'20121022.andro.php','W43, 2012','draft','N',0,'util.js','2012-10-22 08:18:02','2012-10-22 00:18:02'),(224,'20121022.js.jquery-plugin-jquerytools.php','jQuery TOOLS 插件','draft','N',0,'util.js','2012-10-22 12:50:56','2012-10-22 04:50:56'),(225,'20121022.js.control-form-elements-using-jquery.php','使用 jQuery 控制表单元素小节','draft','N',0,'util.js','2012-10-22 14:31:35','2012-10-22 06:31:35'),(226,'20121024.life.driver-test.php','驾照理考模拟考试错题','draft','N',0,'util.js','2012-10-24 16:42:11','2012-10-24 08:42:11'),(227,'20121026.gnu.how-to-bak-files-that-newer-than-a-date-in-a-directory-using-tar.php','怎样只备份某文件夹下所有修改时间晚于某时间的文件','draft','N',0,'util.js','2012-10-26 22:51:04','2012-10-26 14:51:04'),(228,'20121029.andro.php','W44, 2012','draft','N',0,'util.js','2012-10-29 08:20:49','2012-10-29 00:20:49'),(229,'20121119.andro.php','W47, 2012','draft','N',0,'util.js','2012-11-19 08:05:17','2012-11-19 00:05:17'),(230,'20121122.gnu.build-virtual-server-using-router.php','搭建公司内网服务器','draft','N',0,'util.js','2012-11-22 14:42:20','2012-11-22 06:42:20'),(231,'20121123.gnu.using-habits-in-windows.php','Windows 下的几个操作习惯（为更好地用 Debian）','draft','N',0,'util.js','2012-11-23 19:41:51','2012-11-23 11:41:51'),(232,'20121124.gnu.the-meaning-of-noeol-and-dos-flag-in-vim.php','Vim 编辑器底端 [noeol], [dos] 的含义','publish','N',0,'util.js','2012-11-24 11:17:27','2012-11-24 03:18:56'),(233,'20121124.gnu.dpkg.php','dpkg 命令','draft','N',0,'util.js','2012-11-24 19:26:35','2012-11-24 11:26:35'),(234,'20121126.andro.php','W48, 2012','draft','N',0,'util.js','2012-11-26 08:14:58','2012-11-26 22:15:30'),(235,'20121128.php.carriage-return-and-line-feed.php','回车与换行','draft','N',0,'util.js','2012-11-28 10:16:11','2012-11-28 02:16:11'),(236,'20121129.gnu.x-permission-of-files-in-udisk.php','U盘中文件自动加上可执行属性','draft','N',0,'util.js','2012-11-29 09:48:01','2012-11-29 01:48:01'),(237,'20121130.yii.second-review-yii.php','迁移MOTD复习Yii','draft','N',0,'util.js','2012-11-30 09:48:49','2012-11-30 01:48:49'),(238,'20121203.andro.php','W49, 2012','draft','N',0,'util.js','2012-12-03 15:25:40','2012-12-03 07:26:21'),(239,'20121206.yii.migrate-motd-2.php','MOTD迁移（一）：加入Boxy插件','draft','N',0,'util.js','2012-12-06 20:36:31','2012-12-06 12:36:31'),(240,'20121208.yii.the-way-yii-include-jquery.php','Yii 怎么在head标签中引用 jQuery?','draft','N',0,'util.js','2012-12-08 17:14:42','2012-12-08 09:14:42'),(241,'20121210.yii.learn-cgridview-2.php','CGridView学习（二）——下拉菜单样式的Filter','draft','N',0,'util.js','2012-12-10 12:35:42','2012-12-10 04:35:42'),(242,'20121210.andro.php','W50, 2012','draft','N',0,'util.js','2012-12-10 20:41:57','2012-12-10 12:41:57'),(243,'20121211.yii.load-module-in-update-view-delete-actions.php','Yii 基础——loadModule()方法在update,view,delete等actions中用法','draft','N',0,'util.js','2012-12-11 13:50:38','2012-12-11 05:50:38'),(244,'20121213.yii.ways-of-making-a-model-instance.php','new Address() or new Address(\'search\')?实例化Model的方法','draft','N',0,'util.js','2012-12-13 09:45:23','2012-12-13 01:45:23'),(245,'20121213.gnu.how-to-install-xerox-3117-driver-on-debian.php','如何在 Debian 上安装 Xerox 3117 打印机驱动','draft','N',0,'util.js','2012-12-13 11:53:50','2012-12-13 03:53:50'),(246,'20121217.andro.php','W51, 2012','draft','N',0,'util.js','2012-12-17 20:18:48','2012-12-18 12:19:08'),(247,'20121218.yii.recoverable-errors.php','Recoverable Error: Object couldn\'t be converted to string 错误','draft','N',0,'util.js','2012-12-18 22:29:33','2012-12-18 14:29:33'),(248,'20121220.yii.how-to-find-an-element-in-yii-form-using-jquery.php','如何使用 jQuery 定位使用 CActiveForm 生成的元素','draft','N',0,'util.js','2012-12-20 20:10:17','2012-12-20 12:12:07'),(249,'20121221.yii.tabular-input.php','Tabular Input','draft','N',0,'util.js','2012-12-21 19:09:10','2012-12-21 11:09:10'),(250,'20121224.andro.php','W52, 2012','draft','N',0,'util.js','2012-12-24 09:00:45','2012-12-24 01:00:45'),(251,'20121227.jquery.json.php','JSON 简单应用','draft','N',0,'util.js','2012-12-27 19:01:46','2012-12-27 11:01:46'),(252,'20121231.andro.php','W53, 2012','draft','Y',0,'util.js','2012-12-31 07:59:44','2013-02-27 03:02:50'),(253,'20121231.life.end-of-2012.php','2012年终总结','draft','N',0,'util.js','2012-12-31 17:13:55','2012-12-31 09:13:55'),(254,'20130121.andro.php','W4, 2013','draft','N',0,'util.js','2013-01-21 07:57:29','2013-01-21 23:57:54'),(255,'20130307.php.zip-extension.php','oustanding 主机不能使用PHPExcel导出Excel 2007文件','draft','N',0,'util.js','2013-03-07 10:27:20','2013-03-07 02:27:20'),(256,'20130311.andro.php','W11, 2013','draft','N',0,'util.js','2013-03-11 10:26:44','2013-03-13 02:40:30'),(257,'20130318.andro.php','W12, 2013','draft','Y',0,'util.js','2013-03-18 10:35:01','2013-03-25 00:23:55'),(258,'20130325.andro.php','W13, 2013','draft','N',0,'util.js','2013-03-25 08:22:20','2013-03-25 00:22:20'),(259,'20130325.eorder.change-log-0.0.21.php','E-Order V0.0.21 Change Log','draft','Y',0,'util.js','2013-03-25 14:57:12','2013-03-25 06:57:12'),(260,'20130401.andro.php','W14, 2013','draft','N',0,'util.js','2013-04-01 08:49:33','2013-04-01 00:49:33'),(261,'20130408.eorder.journal-entry.php','现有业务分录练习','draft','Y',0,'util.js','2013-04-08 09:42:14','2013-04-16 02:59:30'),(262,'20130408.andro.php','W15, 2013','draft','N',0,'util.js','2013-04-08 09:53:39','2013-04-08 01:53:39'),(263,'20130415.andro.php','W16, 2013','draft','N',0,'util.js','2013-04-15 07:50:55','2013-04-14 23:50:55'),(264,'dro-2013-dec-2.php','2013年12月中','draft','N',0,'util.js','2013-12-19 11:16:35','2013-12-19 03:33:48'),(265,'ts-2013-dec-2.php','TS: 2013年12月中','draft','N',0,'util.js','2013-12-20 08:26:18','2013-12-20 00:26:18'),(266,'20140219.yii.cgridview-value-expression.php','CGridView 中 value 属性的值问题','draft','N',0,'util.js','2014-02-19 11:03:03','2014-02-19 03:03:03'),(267,'dro-2014-feb-2.php','2014年2月中','draft','N',0,'util.js','2014-02-20 16:09:04','2014-02-20 08:36:42'),(268,'dro-2014-feb-3.php','2014年2月下','draft','N',0,'util.js','2014-02-21 08:25:49','2014-02-21 00:25:49'),(269,'20140221.yii.using-phpexcel-in-yii.php','在Yii中引入PHPExcel教程','draft','N',0,'util.js','2014-02-21 14:11:15','2014-02-21 06:11:15'),(270,'20140222.edit-mysql-content-via-vim.php','用 Vim 编辑博客正文的想法','draft','N',0,'util.js','2014-02-22 08:46:14','2014-02-22 00:46:14'),(271,'20140223.andro.php','咳嗽第三天','draft','N',0,'util.js','2014-02-24 09:33:18','2014-02-24 01:33:18'),(272,'20140224.andro.php','早上咳嗽得厉害＋爸爸做灯笼','draft','N',0,'util.js','2014-02-24 09:46:54','2014-02-24 14:29:20'),(273,'20140225.andro.php','凌晨连着咳嗽两小时','draft','N',0,'util.js','2014-02-25 09:09:15','2014-02-25 01:09:15');
/*!40000 ALTER TABLE `essay` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-26  9:15:34
