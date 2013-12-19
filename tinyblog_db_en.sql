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
  `category_name` char(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (1,'os'),(2,'program'),(3,'design');
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
  `comment_content` longtext NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comments`
--

LOCK TABLES `tb_comments` WRITE;
/*!40000 ALTER TABLE `tb_comments` DISABLE KEYS */;
INSERT INTO `tb_comments` VALUES (8,1,3,'2013-12-11 08:08:20','fuck!'),(13,32,1,'2013-12-18 06:33:08','tttttt'),(14,31,1,'2013-12-19 10:43:14','fdsafads'),(15,31,1,'2013-12-19 10:43:18','fdsafdas'),(16,29,3,'2013-12-19 10:43:35','sdfsad'),(17,29,3,'2013-12-19 10:43:36','fsdfdsaf'),(18,29,3,'2013-12-19 10:43:37','fdafasd'),(19,28,3,'2013-12-19 10:43:44','fdsaf'),(20,25,3,'2013-12-19 10:43:52','test7'),(24,32,1,'2013-12-19 11:09:40','fdsafdas'),(25,32,1,'2013-12-19 11:09:46','6575756756'),(26,26,1,'2013-12-19 11:42:11','fdsaf'),(27,26,1,'2013-12-19 11:42:13','123123'),(28,26,1,'2013-12-19 11:42:16','-=0-=-0='),(29,26,1,'2013-12-19 11:42:23','test8'),(30,26,1,'2013-12-19 11:42:27','haha');
/*!40000 ALTER TABLE `tb_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_options`
--

DROP TABLE IF EXISTS `tb_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_options` (
  `option_id` int(4) NOT NULL AUTO_INCREMENT,
  `option_name` char(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_options`
--

LOCK TABLES `tb_options` WRITE;
/*!40000 ALTER TABLE `tb_options` DISABLE KEYS */;
INSERT INTO `tb_options` VALUES (1,'language','en'),(2,'blog_name','WGY Space'),(3,'blog_notice','welcome to my blog</br>u can feel free in here</br>u can email to me:weiganyi@yeah.net</br>'),(4,'bloger_name','weiganyi'),(5,'page_posts','15'),(6,'foot_text','Copyright@2013 weiganyi Powered by tinyblog');
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
  `post_title` text NOT NULL,
  `post_content` longtext NOT NULL,
  `read_number` int(16) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_posts`
--

LOCK TABLES `tb_posts` WRITE;
/*!40000 ALTER TABLE `tb_posts` DISABLE KEYS */;
INSERT INTO `tb_posts` VALUES (1,3,0,'2013-12-03 11:06:44','test','i have dream</br>my four little childrens</br>',6),(3,1,1,'2013-11-03 11:06:44','test3','test3</br>',2),(5,1,3,'2012-11-03 11:06:44','test4','hello world',2),(23,3,0,'2013-12-13 04:03:48','test5','fsdfafhfd<img src=\"images/wgy/1934739006.jpg\">hdfdhgdhdfgh<br><i>ds</i><i>a</i>fds<br><u>fdg</u>fd<br><strike>hgf</strike>dh<br><font size=\"7\">gfdsg</font>s<br><ol><li>gfdsgdfsg</li></ol><ul><li>gfsgsh</li></ul><blockquote>fdsfaaf<br></blockquote>fdsafd<hr>asf<br>fd<a href=\"http://test.php\">asf</a>dsaf<br>fdasfdas<br><img src=\"mini-editor/images/emoticons/1.gif\"><br>gfd<img src=\"mini-editor/images/emoticons/4.gif\">sg<br>gfdsg<table style=\"border-collapse: collapse; border: 3px solid black;\"><tbody><tr style=\"border: 3px solid black;\"><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td></tr><tr style=\"border: 3px solid black;\"><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td></tr><tr style=\"border: 3px solid black;\"><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td><td style=\"width: 100px; height: 20px; border: 3px solid black;\"></td></tr></tbody></table>sdf<br>gfs<img src=\"file:///D:/project/WordPress/test/test.jpg\">dgfds<br>gfs<img src=\"http://172.16.3.146/tinyblog/mini-editor/images/bold.gif\">dgsd<br>fdsafsd<br>fdasf<br>hgfhf<br>jhgdj<br><br><br><br>',8),(24,3,0,'2013-12-17 09:48:44','test6','test6',0),(25,3,0,'2013-12-17 09:48:50','test7','test7',1),(26,3,0,'2013-12-17 09:48:57','test8','test8',1),(27,3,0,'2013-12-17 09:50:16','test9','test9',0),(28,3,0,'2013-12-17 09:50:22','test10','test10',1),(29,3,1,'2013-12-17 09:50:27','test11','test11',1),(30,3,1,'2013-12-17 09:50:30','test12','test12',0),(31,3,1,'2013-12-17 09:50:35','test13','test13',1),(32,3,1,'2013-12-17 09:50:39','test14','test1421',3),(34,3,0,'2013-12-17 02:41:04','test15','test1532',1),(35,3,0,'2013-12-17 04:42:46','test17','test17',1),(36,3,0,'2013-12-17 04:42:52','test16','test16',1);
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
  `user_name` char(255) NOT NULL,
  `user_password` char(255) NOT NULL,
  `user_registered` datetime DEFAULT NULL,
  `user_email` char(255) DEFAULT NULL,
  `user_level` enum('admin','user') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
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

-- Dump completed on 2013-12-19 14:19:40
