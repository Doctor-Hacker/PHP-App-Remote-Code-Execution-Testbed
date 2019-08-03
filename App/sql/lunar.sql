-- MySQL dump 10.13  Distrib 5.6.35, for Win32 (AMD64)
--
-- Host: localhost    Database: lunar
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Current Database: `lunar`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `lunar` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `lunar`;

--
-- Table structure for table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_form` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(1024) NOT NULL,
  `subject` varchar(1024) NOT NULL,
  `sent` longtext NOT NULL,
  `error` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_form`
--

LOCK TABLES `contact_form` WRITE;
/*!40000 ALTER TABLE `contact_form` DISABLE KEYS */;
INSERT INTO `contact_form` VALUES (1,'hacklab@hacklab.com','Message:','Your message was successfully sent','There was an error sending your message, please go back and try again');
/*!40000 ALTER TABLE `contact_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `title` longtext NOT NULL,
  `linkText` varchar(32) NOT NULL,
  `menu` varchar(32) NOT NULL,
  `pageContent` longtext NOT NULL,
  `metaKeywords` longtext NOT NULL,
  `metaDescription` longtext NOT NULL,
  `extension` varchar(1024) NOT NULL,
  `extPosition` varchar(32) NOT NULL,
  `externalURL` longtext NOT NULL,
  `destination` varchar(32) NOT NULL,
  `sort` int(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (2,'local','Test home page','Test','Top','This is a test page for this Lunar CMS thing. For testing purposes, I\'ve created a user called hacklab@hacklab.com with a password of Hacklab1. \r\n\r\nHave a play and let me know if you think we can use it in the company.\r\n\r\nAdmin','','','','above','','',1),(3,'local','About','About','Top','This is a simple About page. I can easily edit it. ','','','','above','','',1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `ID` int(1) NOT NULL AUTO_INCREMENT,
  `homepage` varchar(32) NOT NULL,
  `template` varchar(1024) NOT NULL,
  `siteName` varchar(1024) NOT NULL,
  `siteURL` varchar(1024) NOT NULL,
  `adminFolder` varchar(1024) NOT NULL,
  `timeZone` varchar(1024) NOT NULL,
  `users` varchar(5) NOT NULL,
  `stats` varchar(5) NOT NULL,
  `seo` varchar(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Test','grey_site','Test site','http://127.0.0.1/','admin/','Africa/Abidjan','0','1','0');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats` (
  `ID` int(128) NOT NULL AUTO_INCREMENT,
  `browser` varchar(1024) NOT NULL,
  `version` varchar(1024) NOT NULL,
  `os` varchar(1024) NOT NULL,
  `day` varchar(128) NOT NULL,
  `month` varchar(128) NOT NULL,
  `year` varchar(128) NOT NULL,
  `hour` varchar(128) NOT NULL,
  `page` varchar(128) NOT NULL,
  `ip` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats`
--

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` VALUES (1,'Mozilla Firefox','18.0','Windows','07','201907','','11','/','127.0.0.1'),(2,'Mozilla Firefox','18.0','Windows','07','201907','','11','/','127.0.0.1'),(3,'Mozilla Firefox','18.0','Windows','07','201907','','12','/','127.0.0.1'),(4,'Mozilla Firefox','18.0','Windows','07','201907','','12','/?page=Test','127.0.0.1'),(5,'Mozilla Firefox','18.0','Windows','07','201907','','12','/?page=Installed','127.0.0.1'),(6,'Mozilla Firefox','18.0','Windows','07','201907','','12','/?page=Test','127.0.0.1'),(7,'Mozilla Firefox','18.0','Windows','07','201907','','12','/','127.0.0.1'),(8,'Mozilla Firefox','18.0','Windows','07','201907','','12','/','127.0.0.1'),(9,'Mozilla Firefox','18.0','Windows','07','201907','','12','/','127.0.0.1'),(10,'Mozilla Firefox','18.0','Windows','07','201907','','12','/?page=About','127.0.0.1'),(11,'Mozilla Firefox','18.0','Windows','07','201907','','12','/?page=Test','127.0.0.1'),(12,'Google Chrome','75.0.3770.100','Windows','07','201907','','12','/','192.168.0.1'),(13,'Google Chrome','75.0.3770.100','Windows','07','201907','','12','/?page=About','192.168.0.1'),(14,'Google Chrome','75.0.3770.100','Windows','07','201907','','12','/?page=Test','192.168.0.1'),(15,'Google Chrome','75.0.3770.100','Windows','07','201907','','12','/?page=Test','192.168.0.1'),(16,'Google Chrome','75.0.3770.100','Windows','09','201907','','11','/','192.168.0.1'),(17,'Google Chrome','75.0.3770.100','Windows','09','201907','','11','/?page=About','192.168.0.1'),(18,'Google Chrome','75.0.3770.100','Windows','09','201907','','11','/?page=Test','192.168.0.1');
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `access` int(1) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,0,'admin','admin@hacklab.com','980071217318d3c19061c5dbf4896ccfd132e252'),(2,2,'hacklab','hacklab@hacklab.com','980071217318d3c19061c5dbf4896ccfd132e252');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lunar'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31  7:05:20
