-- MySQL dump 10.13  Distrib 5.5.33, for Linux (i686)
--
-- Host: localhost    Database: tinyblog
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categories` (
  `category_id` int(4) NOT NULL AUTO_INCREMENT,
  `category_name` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (6,'操作系统'),(7,'编程');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_comments`
--

DROP TABLE IF EXISTS `tb_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_comments` (
  `comment_id` int(4) NOT NULL AUTO_INCREMENT,
  `post_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_content` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comments`
--

LOCK TABLES `tb_comments` WRITE;
/*!40000 ALTER TABLE `tb_comments` DISABLE KEYS */;
INSERT INTO `tb_comments` VALUES (31,37,3,'2013-12-19 05:28:20','测试1'),(32,37,3,'2013-12-19 05:28:24','测试2'),(34,47,3,'2013-12-19 05:30:08','测试11');
/*!40000 ALTER TABLE `tb_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_options`
--

DROP TABLE IF EXISTS `tb_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_options` (
  `option_id` int(4) NOT NULL,
  `option_name` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `option_value` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_options`
--

LOCK TABLES `tb_options` WRITE;
/*!40000 ALTER TABLE `tb_options` DISABLE KEYS */;
INSERT INTO `tb_options` VALUES (1,'language','ch'),(2,'blog_name','韦干翼的空间2'),(3,'blog_notice','欢迎来到韦干翼的空间2'),(4,'bloger_name','韦干翼2'),(5,'page_posts','10'),(6,'foot_text','Copyright@2013 weiganyi Powered by tinyblog');
/*!40000 ALTER TABLE `tb_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_posts`
--

DROP TABLE IF EXISTS `tb_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_posts` (
  `post_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `post_content` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `read_number` int(16) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_posts`
--

LOCK TABLES `tb_posts` WRITE;
/*!40000 ALTER TABLE `tb_posts` DISABLE KEYS */;
INSERT INTO `tb_posts` VALUES (37,3,0,'2013-12-19 05:28:02','测试1','测<b>试测</b>试<i>测试</i>测<u>试测</u>试测试1<br>测<strike>试测</strike>试<font size=\"7\">测试</font>测试测试测试2<br><ol><li>测试测试测试测试测试测试3</li></ol><ul><li>测试测试测试测试测试测试4</li></ul><blockquote>测试测试测试测试测试测试5<br></blockquote>测试测<hr>试测试<a href=\"http://172.16.3.146/tinyblog/\">测试</a>测试测试6<br>测试测试<img src=\"http://172.16.3.146/tinyblog/mini-editor/images/bold.gif\">测试测试测试测试7<br>测试测试测试<img src=\"mini-editor/images/emoticons/1.gif\">测试测试测试8<br>测试测试<table style=\"border-collapse: collapse; border: 3px solid black;\"><tbody><tr style=\"border: 3px solid black;\"><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td></tr><tr style=\"border: 3px solid black;\"><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td></tr><tr style=\"border: 3px solid black;\"><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td></tr></tbody></table>测试测试测试测试9<br>测试测试<img src=\"images/wgy/1612360893.jpg\">测试测试测试测试10<br>测试测试测试测试测试测试11<br>测试测试测试测试测试测试12<br>测试测试测试测试测试测试13<br>测试测试测试测试测试测试14<br>测试测试测试测试测试测试15<br>测试测试测试测试测试测试16<br>测试测试测试测试测试测试17<br>测试测试测试测试测试测试18<br><br>',1),(38,3,0,'2013-12-19 05:28:36','测试2','测试2',0),(39,3,0,'2013-12-19 05:28:42','测试3','测试3',0),(40,3,0,'2013-12-19 05:28:47','测试4','测试4',0),(41,3,0,'2013-12-19 05:28:51','测试5','测试5',0),(42,3,0,'2013-12-19 05:28:56','测试6','测试6',0),(43,3,0,'2013-12-19 05:29:01','测试7','测试7',0),(44,3,0,'2013-12-19 05:29:05','测试8','测试8',0),(45,3,6,'2013-12-19 05:29:10','测试9','测试9',0),(46,3,7,'2013-12-19 05:29:15','测试10','测试10',1),(47,3,6,'2013-12-19 05:29:18','测试11','测试121',1);
/*!40000 ALTER TABLE `tb_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_name` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_password` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_registered` datetime DEFAULT NULL,
  `user_email` char(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_level` enum('admin','user') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (1,'admin','admin','2013-11-29 11:06:44','weiganyi@yeah.net','admin'),(3,'wgy','1234','2013-11-30 11:06:44','weiganyi@twsz.com','user');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-19 17:41:25
