-- MySQL dump 10.13  Distrib 5.6.35, for Win32 (AMD64)
--
-- Host: localhost    Database: zenphoto
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
-- Current Database: `zenphoto`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `zenphoto` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `zenphoto`;

--
-- Table structure for table `zp_admin_to_object`
--

DROP TABLE IF EXISTS `zp_admin_to_object`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_admin_to_object` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminid` int(11) unsigned NOT NULL,
  `objectid` int(11) unsigned NOT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'album',
  `edit` int(11) DEFAULT '32767',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_admin_to_object`
--

LOCK TABLES `zp_admin_to_object` WRITE;
/*!40000 ALTER TABLE `zp_admin_to_object` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_admin_to_object` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_administrators`
--

DROP TABLE IF EXISTS `zp_administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_administrators` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `rights` int(11) DEFAULT NULL,
  `custom_data` text COLLATE utf8_unicode_ci,
  `valid` int(1) DEFAULT '1',
  `group` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `loggedin` datetime DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `language` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prime_album` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_credentials` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`,`valid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_administrators`
--

LOCK TABLES `zp_administrators` WRITE;
/*!40000 ALTER TABLE `zp_administrators` DISABLE KEYS */;
INSERT INTO `zp_administrators` VALUES (1,'administrators',NULL,'group',NULL,1961343989,'Users with full privileges',0,NULL,'2019-07-08 16:35:50',NULL,NULL,NULL,NULL,NULL),(2,'viewers',NULL,'group',NULL,2945,'Users allowed only to view zenphoto objects',0,NULL,'2019-07-08 16:35:50',NULL,NULL,NULL,NULL,NULL),(3,'bozos',NULL,'group',NULL,0,'Banned users',0,NULL,'2019-07-08 16:35:50',NULL,NULL,NULL,NULL,NULL),(4,'album managers',NULL,'template',NULL,67386245,'Managers of one or more albums',0,NULL,'2019-07-08 16:35:50',NULL,NULL,NULL,NULL,NULL),(5,'default',NULL,'template',NULL,945,'Default user settings',0,NULL,'2019-07-08 16:35:50',NULL,NULL,NULL,NULL,NULL),(6,'newuser',NULL,'template',NULL,1,'Newly registered and verified users',0,NULL,'2019-07-08 16:35:50',NULL,NULL,NULL,NULL,NULL),(7,'admin','ab78b6b515074bcf880562da9169ab114586c220','Admin','admin@hacklab.com',1961343989,NULL,1,NULL,'2019-07-08 16:37:09','2019-07-09 06:42:16',NULL,'en_US',NULL,NULL),(8,'hacklab','ca9b313a483b6e75e049fc35e4395658f8738f39','Hacklab','hacklab@hacklab.com',6390705,NULL,1,NULL,'2019-07-08 16:38:04','2019-07-08 16:39:30',NULL,'en_US',NULL,NULL);
/*!40000 ALTER TABLE `zp_administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_albums`
--

DROP TABLE IF EXISTS `zp_albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_albums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(11) unsigned DEFAULT NULL,
  `folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title` text COLLATE utf8_unicode_ci,
  `desc` text COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT NULL,
  `updateddate` datetime DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci,
  `show` int(1) unsigned NOT NULL DEFAULT '1',
  `closecomments` int(1) unsigned NOT NULL DEFAULT '0',
  `commentson` int(1) unsigned NOT NULL DEFAULT '1',
  `thumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mtime` int(32) DEFAULT NULL,
  `sort_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subalbum_sort_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) unsigned DEFAULT NULL,
  `image_sortdirection` int(1) unsigned DEFAULT '0',
  `album_sortdirection` int(1) unsigned DEFAULT '0',
  `hitcounter` int(11) unsigned DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password_hint` text COLLATE utf8_unicode_ci,
  `total_value` int(11) DEFAULT '0',
  `total_votes` int(11) DEFAULT '0',
  `used_ips` longtext COLLATE utf8_unicode_ci,
  `custom_data` text COLLATE utf8_unicode_ci,
  `dynamic` int(1) DEFAULT '0',
  `search_params` text COLLATE utf8_unicode_ci,
  `album_theme` varchar(127) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `rating_status` int(1) DEFAULT '3',
  `watermark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `watermark_thumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codeblock` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `folder` (`folder`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_albums`
--

LOCK TABLES `zp_albums` WRITE;
/*!40000 ALTER TABLE `zp_albums` DISABLE KEYS */;
INSERT INTO `zp_albums` VALUES (1,NULL,'test','test',NULL,'2019-07-09 06:38:43',NULL,NULL,1,0,1,NULL,1562650723,NULL,NULL,NULL,0,0,0,'',NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `zp_albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_captcha`
--

DROP TABLE IF EXISTS `zp_captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_captcha` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ptime` int(32) unsigned NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_captcha`
--

LOCK TABLES `zp_captcha` WRITE;
/*!40000 ALTER TABLE `zp_captcha` DISABLE KEYS */;
INSERT INTO `zp_captcha` VALUES (4,1562650873,'1fb5606f892e386420ceb02ffe8dd0da07869695'),(5,1562650925,'e3923f6dd9b15c51c1ceeedd4c5d9ef14088b14c');
/*!40000 ALTER TABLE `zp_captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_comments`
--

DROP TABLE IF EXISTS `zp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ownerid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `inmoderation` int(1) unsigned NOT NULL DEFAULT '0',
  `type` varchar(52) COLLATE utf8_unicode_ci DEFAULT 'images',
  `IP` text COLLATE utf8_unicode_ci,
  `private` int(1) DEFAULT '0',
  `anon` int(1) DEFAULT '0',
  `custom_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `ownerid` (`ownerid`),
  KEY `ownerid_2` (`ownerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_comments`
--

LOCK TABLES `zp_comments` WRITE;
/*!40000 ALTER TABLE `zp_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_images`
--

DROP TABLE IF EXISTS `zp_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `albumid` int(11) unsigned DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title` text COLLATE utf8_unicode_ci,
  `desc` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `city` tinytext COLLATE utf8_unicode_ci,
  `state` tinytext COLLATE utf8_unicode_ci,
  `country` tinytext COLLATE utf8_unicode_ci,
  `credit` text COLLATE utf8_unicode_ci,
  `copyright` text COLLATE utf8_unicode_ci,
  `commentson` int(1) unsigned NOT NULL DEFAULT '1',
  `show` int(1) NOT NULL DEFAULT '1',
  `date` datetime DEFAULT NULL,
  `sort_order` int(11) unsigned DEFAULT NULL,
  `height` int(10) unsigned DEFAULT NULL,
  `width` int(10) unsigned DEFAULT NULL,
  `thumbX` int(10) unsigned DEFAULT NULL,
  `thumbY` int(10) unsigned DEFAULT NULL,
  `thumbW` int(10) unsigned DEFAULT NULL,
  `thumbH` int(10) unsigned DEFAULT NULL,
  `mtime` int(32) DEFAULT NULL,
  `hitcounter` int(11) unsigned DEFAULT '0',
  `total_value` int(11) unsigned DEFAULT '0',
  `total_votes` int(11) unsigned DEFAULT '0',
  `used_ips` longtext COLLATE utf8_unicode_ci,
  `custom_data` text COLLATE utf8_unicode_ci,
  `rating` float DEFAULT NULL,
  `rating_status` int(1) DEFAULT '3',
  `hasMetadata` int(1) DEFAULT '0',
  `watermark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `watermark_use` int(1) DEFAULT '7',
  `owner` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `codeblock` text COLLATE utf8_unicode_ci,
  `user` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hint` text COLLATE utf8_unicode_ci,
  `EXIFMake` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFModel` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFDescription` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCObjectName` mediumtext COLLATE utf8_unicode_ci,
  `IPTCImageHeadline` mediumtext COLLATE utf8_unicode_ci,
  `IPTCImageCaption` mediumtext COLLATE utf8_unicode_ci,
  `IPTCImageCaptionWriter` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFDateTime` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFDateTimeOriginal` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFDateTimeDigitized` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCDateCreated` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCTimeCreated` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCDigitizeDate` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCDigitizeTime` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFArtist` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCImageCredit` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCByLine` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCByLineTitle` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCSource` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCContact` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFCopyright` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCCopyright` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFExposureTime` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFFNumber` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFISOSpeedRatings` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFExposureBiasValue` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFMeteringMode` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFFlash` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFImageWidth` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFImageHeight` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFOrientation` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFContrast` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFSharpness` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFSaturation` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFWhiteBalance` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFSubjectDistance` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFFocalLength` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFLensType` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFLensInfo` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFFocalLengthIn35mmFilm` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCCity` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCSubLocation` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCState` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCLocationCode` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCLocationName` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFGPSLatitude` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFGPSLatitudeRef` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFGPSLongitude` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFGPSLongitudeRef` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFGPSAltitude` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EXIFGPSAltitudeRef` varchar(52) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCOriginatingProgram` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPTCProgramVersion` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filename` (`filename`,`albumid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_images`
--

LOCK TABLES `zp_images` WRITE;
/*!40000 ALTER TABLE `zp_images` DISABLE KEYS */;
INSERT INTO `zp_images` VALUES (1,1,'7up-Copy.jpg','7up - Copy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-07-09 06:44:13',NULL,150,150,NULL,NULL,NULL,NULL,1562651053,0,0,0,NULL,NULL,NULL,3,1,NULL,7,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,'7up.jpg','7up',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-07-09 06:44:13',NULL,150,150,NULL,NULL,NULL,NULL,1562651053,0,0,0,NULL,NULL,NULL,3,1,NULL,7,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,1,'apples-Copy.jpg','apples - Copy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-07-09 06:44:13',NULL,150,150,NULL,NULL,NULL,NULL,1562651053,0,0,0,NULL,NULL,NULL,3,1,NULL,7,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'apples.jpg','apples',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-07-09 06:44:13',NULL,150,150,NULL,NULL,NULL,NULL,1562651053,0,0,0,NULL,NULL,NULL,3,1,NULL,7,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,'beans.jpg','beans',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2019-07-09 06:44:13',NULL,177,284,NULL,NULL,NULL,NULL,1562651053,0,0,0,NULL,NULL,NULL,3,1,NULL,7,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `zp_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_menu`
--

DROP TABLE IF EXISTS `zp_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(11) unsigned DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `include_li` int(1) unsigned DEFAULT '1',
  `type` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` varchar(48) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `show` int(1) unsigned NOT NULL DEFAULT '1',
  `menuset` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `span_class` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `span_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_menu`
--

LOCK TABLES `zp_menu` WRITE;
/*!40000 ALTER TABLE `zp_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_news`
--

DROP TABLE IF EXISTS `zp_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `extracontent` text COLLATE utf8_unicode_ci,
  `show` int(1) unsigned NOT NULL DEFAULT '1',
  `date` datetime DEFAULT NULL,
  `titlelink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentson` int(1) unsigned DEFAULT '0',
  `codeblock` text COLLATE utf8_unicode_ci,
  `author` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastchange` datetime DEFAULT NULL,
  `lastchangeauthor` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hitcounter` int(11) unsigned DEFAULT '0',
  `permalink` int(1) unsigned NOT NULL DEFAULT '0',
  `locked` int(1) unsigned NOT NULL DEFAULT '0',
  `expiredate` datetime DEFAULT NULL,
  `total_value` int(11) unsigned DEFAULT '0',
  `total_votes` int(11) unsigned DEFAULT '0',
  `used_ips` longtext COLLATE utf8_unicode_ci,
  `rating` float DEFAULT NULL,
  `rating_status` int(1) DEFAULT '3',
  `sticky` int(1) DEFAULT '0',
  `custom_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titlelink` (`titlelink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_news`
--

LOCK TABLES `zp_news` WRITE;
/*!40000 ALTER TABLE `zp_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_news2cat`
--

DROP TABLE IF EXISTS `zp_news2cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_news2cat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) unsigned NOT NULL,
  `news_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_news2cat`
--

LOCK TABLES `zp_news2cat` WRITE;
/*!40000 ALTER TABLE `zp_news2cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_news2cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_news_categories`
--

DROP TABLE IF EXISTS `zp_news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_news_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `titlelink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` int(1) unsigned NOT NULL DEFAULT '0',
  `hitcounter` int(11) unsigned DEFAULT '0',
  `user` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hint` text COLLATE utf8_unicode_ci,
  `parentid` int(11) DEFAULT NULL,
  `sort_order` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `custom_data` text COLLATE utf8_unicode_ci,
  `show` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `titlelink` (`titlelink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_news_categories`
--

LOCK TABLES `zp_news_categories` WRITE;
/*!40000 ALTER TABLE `zp_news_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_news_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_obj_to_tag`
--

DROP TABLE IF EXISTS `zp_obj_to_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_obj_to_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(11) unsigned NOT NULL,
  `type` tinytext COLLATE utf8_unicode_ci,
  `objectid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagid` (`tagid`),
  KEY `objectid` (`objectid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_obj_to_tag`
--

LOCK TABLES `zp_obj_to_tag` WRITE;
/*!40000 ALTER TABLE `zp_obj_to_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_obj_to_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_options`
--

DROP TABLE IF EXISTS `zp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ownerid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `theme` varchar(127) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_option` (`name`,`ownerid`,`theme`)
) ENGINE=InnoDB AUTO_INCREMENT=296 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_options`
--

LOCK TABLES `zp_options` WRITE;
/*!40000 ALTER TABLE `zp_options` DISABLE KEYS */;
INSERT INTO `zp_options` VALUES (1,0,'zenphoto_release','8157',NULL,NULL),(2,0,'zenphoto_install','{35527368-1a9b-a54a-6a72-9fa6002ced6d}',NULL,NULL),(4,0,'libauth_version','3',NULL,NULL),(5,0,'time_offset','0',NULL,'zp-core/setup/setup-option-defaults.php'),(6,0,'mod_rewrite_image_suffix','.php',NULL,'zp-core/setup/setup-option-defaults.php'),(7,0,'server_protocol','http',NULL,'zp-core/setup/setup-option-defaults.php'),(8,0,'charset','UTF-8',NULL,'zp-core/setup/setup-option-defaults.php'),(9,0,'image_quality','85',NULL,'zp-core/setup/setup-option-defaults.php'),(10,0,'thumb_quality','75',NULL,'zp-core/setup/setup-option-defaults.php'),(11,0,'image_size','595',NULL,'zp-core/setup/setup-option-defaults.php'),(12,0,'image_use_side','longest',NULL,'zp-core/setup/setup-option-defaults.php'),(13,0,'image_allow_upscale','0',NULL,'zp-core/setup/setup-option-defaults.php'),(14,0,'thumb_size','100',NULL,'zp-core/setup/setup-option-defaults.php'),(15,0,'thumb_crop','1',NULL,'zp-core/setup/setup-option-defaults.php'),(16,0,'thumb_crop_width','85',NULL,'zp-core/setup/setup-option-defaults.php'),(17,0,'thumb_crop_height','85',NULL,'zp-core/setup/setup-option-defaults.php'),(18,0,'thumb_sharpen','0',NULL,'zp-core/setup/setup-option-defaults.php'),(19,0,'image_sharpen','0',NULL,'zp-core/setup/setup-option-defaults.php'),(20,0,'albums_per_page','5',NULL,'zp-core/setup/setup-option-defaults.php'),(21,0,'images_per_page','15',NULL,'zp-core/setup/setup-option-defaults.php'),(22,0,'search_password','',NULL,'zp-core/setup/setup-option-defaults.php'),(23,0,'search_hint',NULL,NULL,'zp-core/setup/setup-option-defaults.php'),(24,0,'album_session','0',NULL,'zp-core/setup/setup-option-defaults.php'),(25,0,'watermark_h_offset','90',NULL,'zp-core/setup/setup-option-defaults.php'),(26,0,'watermark_w_offset','90',NULL,'zp-core/setup/setup-option-defaults.php'),(27,0,'watermark_scale','5',NULL,'zp-core/setup/setup-option-defaults.php'),(28,0,'watermark_allow_upscale','1',NULL,'zp-core/setup/setup-option-defaults.php'),(29,0,'perform_video_watermark','0',NULL,'zp-core/setup/setup-option-defaults.php'),(30,0,'spam_filter','none',NULL,'zp-core/setup/setup-option-defaults.php'),(31,0,'email_new_comments','1',NULL,'zp-core/setup/setup-option-defaults.php'),(32,0,'image_sorttype','Filename',NULL,'zp-core/setup/setup-option-defaults.php'),(33,0,'image_sortdirection','0',NULL,'zp-core/setup/setup-option-defaults.php'),(34,0,'hotlink_protection','1',NULL,'zp-core/setup/setup-option-defaults.php'),(35,0,'feed_items','10',NULL,'zp-core/setup/setup-option-defaults.php'),(36,0,'feed_imagesize','240',NULL,'zp-core/setup/setup-option-defaults.php'),(37,0,'feed_sortorder','latest',NULL,'zp-core/setup/setup-option-defaults.php'),(38,0,'feed_items_albums','10',NULL,'zp-core/setup/setup-option-defaults.php'),(39,0,'feed_imagesize_albums','240',NULL,'zp-core/setup/setup-option-defaults.php'),(40,0,'feed_sortorder_albums','latest',NULL,'zp-core/setup/setup-option-defaults.php'),(41,0,'feed_enclosure','0',NULL,'zp-core/setup/setup-option-defaults.php'),(42,0,'feed_mediarss','0',NULL,'zp-core/setup/setup-option-defaults.php'),(43,0,'feed_cache','1',NULL,'zp-core/setup/setup-option-defaults.php'),(44,0,'feed_cache_expire','86400',NULL,'zp-core/setup/setup-option-defaults.php'),(45,0,'feed_hitcounter','1',NULL,'zp-core/setup/setup-option-defaults.php'),(46,0,'search_fields','title,desc,tags,file,location,city,state,country,content,author',NULL,'zp-core/setup/setup-option-defaults.php'),(47,0,'allowed_tags_default','a => (href =>() title =>() target=>() class=>() id=>())\nabbr =>(class=>() id=>() title =>())\nacronym =>(class=>() id=>() title =>())\nb => (class=>() id=>() )\nblockquote =>(class=>() id=>() cite =>())\nbr => (class=>() id=>() )\ncode => (class=>() id=>() )\nem => (class=>() id=>() )\ni => (class=>() id=>() ) \nstrike => (class=>() id=>() )\nstrong => (class=>() id=>() )\nul => (class=>() id=>())\nol => (class=>() id=>())\nli => (class=>() id=>())\np => (class=>() id=>() style=>())\nh1=>(class=>() id=>() style=>())\nh2=>(class=>() id=>() style=>())\nh3=>(class=>() id=>() style=>())\nh4=>(class=>() id=>() style=>())\nh5=>(class=>() id=>() style=>())\nh6=>(class=>() id=>() style=>())\npre=>(class=>() id=>() style=>())\naddress=>(class=>() id=>() style=>())\nspan=>(class=>() id=>() style=>())\ndiv=>(class=>() id=>() style=>())\nimg=>(class=>() id=>() style=>() src=>() title=>() alt=>() width=>() height=>())\n',NULL,NULL),(48,0,'allowed_tags','a => (href =>() title =>() target=>() class=>() id=>())\nabbr =>(class=>() id=>() title =>())\nacronym =>(class=>() id=>() title =>())\nb => (class=>() id=>() )\nblockquote =>(class=>() id=>() cite =>())\nbr => (class=>() id=>() )\ncode => (class=>() id=>() )\nem => (class=>() id=>() )\ni => (class=>() id=>() ) \nstrike => (class=>() id=>() )\nstrong => (class=>() id=>() )\nul => (class=>() id=>())\nol => (class=>() id=>())\nli => (class=>() id=>())\np => (class=>() id=>() style=>())\nh1=>(class=>() id=>() style=>())\nh2=>(class=>() id=>() style=>())\nh3=>(class=>() id=>() style=>())\nh4=>(class=>() id=>() style=>())\nh5=>(class=>() id=>() style=>())\nh6=>(class=>() id=>() style=>())\npre=>(class=>() id=>() style=>())\naddress=>(class=>() id=>() style=>())\nspan=>(class=>() id=>() style=>())\ndiv=>(class=>() id=>() style=>())\nimg=>(class=>() id=>() style=>() src=>() title=>() alt=>() width=>() height=>())\n',NULL,'zp-core/setup/setup-option-defaults.php'),(49,0,'style_tags','abbr => (title => ())\nacronym => (title => ())\nb => ()\nem => ()\ni => () \nstrike => ()\nstrong => ()\n',NULL,'zp-core/setup/setup-option-defaults.php'),(50,0,'comment_name_required','1',NULL,'zp-core/setup/setup-option-defaults.php'),(51,0,'comment_email_required','1',NULL,'zp-core/setup/setup-option-defaults.php'),(52,0,'comment_web_required','show',NULL,'zp-core/setup/setup-option-defaults.php'),(53,0,'Use_Captcha','',NULL,'zp-core/setup/setup-option-defaults.php'),(54,0,'full_image_quality','75',NULL,'zp-core/setup/setup-option-defaults.php'),(55,0,'protect_full_image','Protected view',NULL,'zp-core/setup/setup-option-defaults.php'),(56,0,'locale','',NULL,'zp-core/setup/setup-option-defaults.php'),(57,0,'date_format','%x',NULL,'zp-core/setup/setup-option-defaults.php'),(58,0,'zp_plugin_class-video','4105',NULL,'zp-core/setup/setup-option-defaults.php'),(59,0,'use_lock_image','1',NULL,'zp-core/setup/setup-option-defaults.php'),(60,0,'search_user','',NULL,'zp-core/setup/setup-option-defaults.php'),(61,0,'multi_lingual','0',NULL,'zp-core/setup/setup-option-defaults.php'),(62,0,'tagsort','0',NULL,'zp-core/setup/setup-option-defaults.php'),(63,0,'albumimagesort','ID',NULL,'zp-core/setup/setup-option-defaults.php'),(64,0,'albumimagedirection','DESC',NULL,'zp-core/setup/setup-option-defaults.php'),(65,0,'cache_full_image','0',NULL,'zp-core/setup/setup-option-defaults.php'),(66,0,'custom_index_page','',NULL,'zp-core/setup/setup-option-defaults.php'),(67,0,'picture_of_the_day','a:3:{s:3:\"day\";N;s:6:\"folder\";N;s:8:\"filename\";N;}',NULL,'zp-core/setup/setup-option-defaults.php'),(68,0,'exact_tag_match','0',NULL,'zp-core/setup/setup-option-defaults.php'),(69,0,'EXIFMake','1',NULL,'zp-core/setup/setup-option-defaults.php'),(70,0,'EXIFModel','1',NULL,'zp-core/setup/setup-option-defaults.php'),(71,0,'EXIFExposureTime','1',NULL,'zp-core/setup/setup-option-defaults.php'),(72,0,'EXIFFNumber','1',NULL,'zp-core/setup/setup-option-defaults.php'),(73,0,'EXIFFocalLength','1',NULL,'zp-core/setup/setup-option-defaults.php'),(74,0,'EXIFISOSpeedRatings','1',NULL,'zp-core/setup/setup-option-defaults.php'),(75,0,'EXIFDateTimeOriginal','1',NULL,'zp-core/setup/setup-option-defaults.php'),(76,0,'EXIFExposureBiasValue','1',NULL,'zp-core/setup/setup-option-defaults.php'),(77,0,'EXIFMeteringMode','1',NULL,'zp-core/setup/setup-option-defaults.php'),(78,0,'EXIFFlash','1',NULL,'zp-core/setup/setup-option-defaults.php'),(79,0,'EXIFDescription','0',NULL,'zp-core/setup/setup-option-defaults.php'),(80,0,'IPTCObjectName','0',NULL,'zp-core/setup/setup-option-defaults.php'),(81,0,'IPTCImageHeadline','0',NULL,'zp-core/setup/setup-option-defaults.php'),(82,0,'IPTCImageCaption','0',NULL,'zp-core/setup/setup-option-defaults.php'),(83,0,'IPTCImageCaptionWriter','0',NULL,'zp-core/setup/setup-option-defaults.php'),(84,0,'EXIFDateTime','0',NULL,'zp-core/setup/setup-option-defaults.php'),(85,0,'EXIFDateTimeDigitized','0',NULL,'zp-core/setup/setup-option-defaults.php'),(86,0,'IPTCDateCreated','0',NULL,'zp-core/setup/setup-option-defaults.php'),(87,0,'IPTCTimeCreated','0',NULL,'zp-core/setup/setup-option-defaults.php'),(88,0,'IPTCDigitizeDate','0',NULL,'zp-core/setup/setup-option-defaults.php'),(89,0,'IPTCDigitizeTime','0',NULL,'zp-core/setup/setup-option-defaults.php'),(90,0,'EXIFArtist','0',NULL,'zp-core/setup/setup-option-defaults.php'),(91,0,'IPTCImageCredit','0',NULL,'zp-core/setup/setup-option-defaults.php'),(92,0,'IPTCByLine','0',NULL,'zp-core/setup/setup-option-defaults.php'),(93,0,'IPTCByLineTitle','0',NULL,'zp-core/setup/setup-option-defaults.php'),(94,0,'IPTCSource','0',NULL,'zp-core/setup/setup-option-defaults.php'),(95,0,'IPTCContact','0',NULL,'zp-core/setup/setup-option-defaults.php'),(96,0,'EXIFCopyright','0',NULL,'zp-core/setup/setup-option-defaults.php'),(97,0,'IPTCCopyright','0',NULL,'zp-core/setup/setup-option-defaults.php'),(98,0,'EXIFImageWidth','0',NULL,'zp-core/setup/setup-option-defaults.php'),(99,0,'EXIFImageHeight','0',NULL,'zp-core/setup/setup-option-defaults.php'),(100,0,'EXIFOrientation','0',NULL,'zp-core/setup/setup-option-defaults.php'),(101,0,'EXIFContrast','0',NULL,'zp-core/setup/setup-option-defaults.php'),(102,0,'EXIFSharpness','0',NULL,'zp-core/setup/setup-option-defaults.php'),(103,0,'EXIFSaturation','0',NULL,'zp-core/setup/setup-option-defaults.php'),(104,0,'EXIFWhiteBalance','0',NULL,'zp-core/setup/setup-option-defaults.php'),(105,0,'EXIFSubjectDistance','0',NULL,'zp-core/setup/setup-option-defaults.php'),(106,0,'EXIFLensType','0',NULL,'zp-core/setup/setup-option-defaults.php'),(107,0,'EXIFLensInfo','0',NULL,'zp-core/setup/setup-option-defaults.php'),(108,0,'EXIFFocalLengthIn35mmFilm','0',NULL,'zp-core/setup/setup-option-defaults.php'),(109,0,'IPTCCity','0',NULL,'zp-core/setup/setup-option-defaults.php'),(110,0,'IPTCSubLocation','0',NULL,'zp-core/setup/setup-option-defaults.php'),(111,0,'IPTCState','0',NULL,'zp-core/setup/setup-option-defaults.php'),(112,0,'IPTCLocationCode','0',NULL,'zp-core/setup/setup-option-defaults.php'),(113,0,'IPTCLocationName','0',NULL,'zp-core/setup/setup-option-defaults.php'),(114,0,'EXIFGPSLatitude','0',NULL,'zp-core/setup/setup-option-defaults.php'),(115,0,'EXIFGPSLatitudeRef','0',NULL,'zp-core/setup/setup-option-defaults.php'),(116,0,'EXIFGPSLongitude','0',NULL,'zp-core/setup/setup-option-defaults.php'),(117,0,'EXIFGPSLongitudeRef','0',NULL,'zp-core/setup/setup-option-defaults.php'),(118,0,'EXIFGPSAltitude','0',NULL,'zp-core/setup/setup-option-defaults.php'),(119,0,'EXIFGPSAltitudeRef','0',NULL,'zp-core/setup/setup-option-defaults.php'),(120,0,'IPTCOriginatingProgram','0',NULL,'zp-core/setup/setup-option-defaults.php'),(121,0,'IPTCProgramVersion','0',NULL,'zp-core/setup/setup-option-defaults.php'),(122,0,'auto_rotate','0',NULL,'zp-core/setup/setup-option-defaults.php'),(123,0,'IPTC_encoding','ISO-8859-1',NULL,'zp-core/setup/setup-option-defaults.php'),(124,0,'UTF8_image_URI','0',NULL,'zp-core/setup/setup-option-defaults.php'),(125,0,'captcha','zenphoto',NULL,'zp-core/setup/setup-option-defaults.php'),(126,0,'sharpen_amount','40',NULL,'zp-core/setup/setup-option-defaults.php'),(127,0,'sharpen_radius','0.5',NULL,'zp-core/setup/setup-option-defaults.php'),(128,0,'sharpen_threshold','3',NULL,'zp-core/setup/setup-option-defaults.php'),(129,0,'thumb_gray','0',NULL,'zp-core/setup/setup-option-defaults.php'),(130,0,'image_gray','0',NULL,'zp-core/setup/setup-option-defaults.php'),(132,0,'search_no_albums','0',NULL,'zp-core/setup/setup-option-defaults.php'),(133,0,'strong_hash','1',NULL,'zp-core/lib-auth.php'),(134,0,'defined_groups','a:6:{i:0;s:14:\"administrators\";i:1;s:7:\"viewers\";i:2;s:5:\"bozos\";i:3;s:14:\"album managers\";i:4;s:7:\"default\";i:5;s:7:\"newuser\";}',NULL,NULL),(135,0,'comment_body_requiired','1',NULL,'zp-core/setup/setup-option-defaults.php'),(136,0,'zp_plugin_zenphoto_sendmail','4101',NULL,'zp-core/setup/setup-option-defaults.php'),(137,0,'RSS_album_image','1',NULL,'zp-core/setup/setup-option-defaults.php'),(138,0,'RSS_comments','1',NULL,'zp-core/setup/setup-option-defaults.php'),(139,0,'RSS_articles','1',NULL,'zp-core/setup/setup-option-defaults.php'),(140,0,'RSS_article_comments','1',NULL,'zp-core/setup/setup-option-defaults.php'),(141,0,'tinyMCEPresent','0',NULL,'zp-core/setup/setup-option-defaults.php'),(142,0,'AlbumThumbSelectField','ID',NULL,'zp-core/setup/setup-option-defaults.php'),(143,0,'AlbumThumbSelectDirection','DESC',NULL,'zp-core/setup/setup-option-defaults.php'),(144,0,'AlbumThumbSelectorText','most recent',NULL,'zp-core/setup/setup-option-defaults.php'),(145,0,'site_email','zenphoto@192.168.0.1',NULL,'zp-core/setup/setup-option-defaults.php'),(146,0,'Zenphoto_theme_list','a:5:{i:0;s:7:\"default\";i:1;s:18:\"effervescence_plus\";i:2;s:7:\"garland\";i:3;s:10:\"stopdesign\";i:4;s:7:\"zenpage\";}',NULL,NULL),(147,0,'zp_plugin_deprecated-functions','4105',NULL,NULL),(148,0,'zp_plugin_zenphoto_news','2053',NULL,'zp-core/setup/setup-option-defaults.php'),(149,0,'zp_plugin_hitcounter','1',NULL,'zp-core/setup/setup-option-defaults.php'),(150,0,'zp_plugin_tiny_mce','2053',NULL,'zp-core/setup/setup-option-defaults.php'),(151,0,'zp_plugin_security-logger','4105',NULL,'zp-core/setup/setup-option-defaults.php'),(152,0,'album_publish','1',NULL,'zp-core/setup/setup-option-defaults.php'),(153,0,'image_publish','1',NULL,'zp-core/setup/setup-option-defaults.php'),(154,0,'deprecated_getZenpageHitcounter','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(155,0,'deprecated_printImageRating','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(156,0,'deprecated_printAlbumRating','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(157,0,'deprecated_printImageEXIFData','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(158,0,'deprecated_printCustomSizedImageMaxHeight','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(159,0,'deprecated_getCommentDate','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(160,0,'deprecated_getCommentTime','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(161,0,'deprecated_hitcounter','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(162,0,'deprecated_my_truncate_string','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(163,0,'deprecated_getImageEXIFData','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(164,0,'deprecated_getAlbumPlace','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(165,0,'deprecated_printAlbumPlace','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(166,0,'deprecated_zenpageHitcounter','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(167,0,'deprecated_rewrite_path_zenpage','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(168,0,'deprecated_getNewsImageTags','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(169,0,'deprecated_printNewsImageTags','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(170,0,'deprecated_getNumSubalbums','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(171,0,'deprecated_getAllSubalbums','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(172,0,'deprecated_addPluginScript','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(173,0,'deprecated_zenJavascript','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(174,0,'deprecated_normalizeColumns','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(175,0,'deprecated_printParentPagesBreadcrumb','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(176,0,'deprecated_isMyAlbum','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(177,0,'deprecated_getSubCategories','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(178,0,'deprecated_inProtectedNewsCategory','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(179,0,'deprecated_isProtectedNewsCategory','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(180,0,'deprecated_getParentNewsCategories','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(181,0,'deprecated_getCategoryTitle','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(182,0,'deprecated_getCategoryID','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(183,0,'deprecated_getCategoryParentID','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(184,0,'deprecated_getCategorySortOrder','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(185,0,'deprecated_getParentPages','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(186,0,'deprecated_isProtectedPage','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(187,0,'deprecated_isMyPage','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(188,0,'deprecated_checkPagePassword','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(189,0,'deprecated_isMyNews','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(190,0,'deprecated_checkNewsAccess','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(191,0,'deprecated_checkNewsCategoryPassword','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(192,0,'deprecated_getCurrentNewsCategory','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(193,0,'deprecated_getCurrentNewsCategoryID','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(194,0,'deprecated_getCurrentNewsCategoryParentID','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(195,0,'deprecated_inNewsCategory','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(196,0,'deprecated_inSubNewsCategoryOf','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(197,0,'deprecated_isSubNewsCategoryOf','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(198,0,'deprecated_printNewsReadMoreLink','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(199,0,'deprecated_getNewsContentShorten','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(200,0,'deprecated_checkForPassword','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(201,0,'deprecated_printAlbumMap','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(202,0,'deprecated_printImageMap','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(203,0,'deprecated_setupAllowedMaps','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(204,0,'deprecated_printPreloadScript','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(205,0,'deprecated_processExpired','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(206,0,'deprecated_getParentItems','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(207,0,'deprecated_getPages','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(208,0,'deprecated_getNewsArticles','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(209,0,'deprecated_countArticles','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(210,0,'deprecated_getLimitAndOffset','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(211,0,'deprecated_getTotalArticles','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(212,0,'deprecated_getAllArticleDates','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(213,0,'deprecated_getCurrentNewsPage','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(214,0,'deprecated_getCurrentAdminNewsPage','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(215,0,'deprecated_getCombiNews','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(216,0,'deprecated_countCombiNews','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(217,0,'deprecated_getCategoryLink','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(218,0,'deprecated_getCategory','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(219,0,'deprecated_getAllCategories','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(220,0,'deprecated_isProtectedAlbum','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(221,0,'deprecated_getSearchURL','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(222,0,'deprecated_printPasswordForm','1',NULL,'zp-core/zp-extensions/deprecated-functions.php'),(223,0,'zp_plugin_zenphoto_seo','2049',NULL,'zp-core/setup/setup-option-defaults.php'),(224,0,'default_copyright','Copyright 2019: 192.168.0.1',NULL,'zp-core/setup/setup-option-defaults.php'),(225,0,'fullsizeimage_watermark',NULL,NULL,'zp-core/setup/setup-option-defaults.php'),(226,0,'gallery_page_unprotected_register','1',NULL,'zp-core/setup/setup-option-defaults.php'),(227,0,'gallery_page_unprotected_contact','1',NULL,'zp-core/setup/setup-option-defaults.php'),(228,0,'gallery_data','a:17:{s:21:\"gallery_sortdirection\";i:0;s:16:\"gallery_sorttype\";s:2:\"ID\";s:13:\"gallery_title\";s:7:\"Gallery\";s:19:\"Gallery_description\";s:73:\"You can insert your Gallery description on the Admin Options Gallery tab.\";s:16:\"gallery_password\";N;s:12:\"gallery_user\";N;s:12:\"gallery_hint\";N;s:10:\"hitcounter\";N;s:13:\"current_theme\";s:7:\"default\";s:13:\"website_title\";N;s:11:\"website_url\";N;s:16:\"gallery_security\";s:6:\"public\";s:16:\"login_user_field\";N;s:24:\"album_use_new_image_date\";N;s:19:\"thumb_select_images\";N;s:18:\"persistent_archive\";N;s:17:\"unprotected_pages\";s:43:\"a:2:{i:0;s:8:\"register\";i:1;s:7:\"contact\";}\";}',NULL,'zp-core/setup/setup-option-defaults.php'),(229,0,'zenphoto_captcha_length','5',NULL,'zp-core/zp-extensions/captcha/zenphoto.php'),(230,0,'zenphoto_captcha_key','ea421577bedcce02cd4eacbccbdf658bbb3f5e46',NULL,'zp-core/zp-extensions/captcha/zenphoto.php'),(231,0,'zenphoto_captcha_key','ea421577bedcce02cd4eacbccbdf658bbb3f5e46',NULL,'zp-core/zp-extensions/captcha/zenphoto.php'),(232,0,'zenphoto_captcha_string','abcdefghijkmnpqrstuvwxyz23456789ABCDEFGHJKLMNPQRSTUVWXYZ',NULL,'zp-core/zp-extensions/captcha/zenphoto.php'),(233,0,'extra_auth_hash_text',')AI|5ZqJnYFG8,jN^@fxlK9cvM{g6',NULL,'zp-core/lib-auth.php'),(234,0,'extra_auth_hash_text','{/1Hk)u<g?4Ia*^-J8SPvlfydW,RK5',NULL,'zp-core/lib-auth.php'),(235,0,'min_password_lenght','6',NULL,'zp-core/lib-auth.php'),(236,0,'min_password_lenght','6',NULL,'zp-core/lib-auth.php'),(237,0,'password_pattern','A-Za-z0-9   |   ~!@#$%&*_+`-(),.\\^\'\"/[]{}=:;?\\|',NULL,'zp-core/lib-auth.php'),(238,0,'zenpage_zp_index_news','','zenpage','themes/zenpage'),(239,0,'Allow_search','1','zenpage','themes/zenpage'),(240,0,'Use_thickbox','1','zenpage','themes/zenpage'),(241,0,'zenpage_homepage','none','zenpage','themes/zenpage'),(242,0,'zenpage_contactpage','1','zenpage','themes/zenpage'),(243,0,'zenpage_custommenu','','zenpage','themes/zenpage'),(244,0,'albums_per_row','2','zenpage','themes/zenpage'),(245,0,'images_per_row','5','zenpage','themes/zenpage'),(246,0,'thumb_transition','1','zenpage','themes/zenpage'),(247,0,'zp_plugin_colorbox','1',NULL,'themes/zenpage/themeoptions.php'),(248,0,'colorbox_zenpage_album','1',NULL,'themes/zenpage/themeoptions.php'),(249,0,'Allow_search','1','stopdesign','themes/stopdesign'),(250,0,'colorbox_zenpage_image','1',NULL,'themes/zenpage/themeoptions.php'),(251,0,'Allow_search','1','default','themes/default'),(252,0,'Theme_logo','','effervescence_plus','themes/effervescence_plus'),(253,0,'Theme_colors','light','default','themes/default'),(254,0,'Allow_search','1','garland','themes/garland'),(255,0,'Mini_slide_selector','Recent images','stopdesign','themes/stopdesign'),(256,0,'albums_per_row','2','default','themes/default'),(257,0,'Allow_search','1','effervescence_plus','themes/effervescence_plus'),(258,0,'images_per_row','5','default','themes/default'),(259,0,'Allow_cloud','1','garland','themes/garland'),(260,0,'albums_per_row','3','stopdesign','themes/stopdesign'),(261,0,'colorbox_zenpage_search','1',NULL,'themes/zenpage/themeoptions.php'),(262,0,'thumb_transition','1','default','themes/default'),(263,0,'enable_album_zipfile','','effervescence_plus','themes/effervescence_plus'),(264,0,'colorbox_default_album','1',NULL,'themes/default/themeoptions.php'),(265,0,'albums_per_row','2','garland','themes/garland'),(266,0,'images_per_row','6','stopdesign','themes/stopdesign'),(267,0,'custom_index_page','','default','themes/default'),(268,0,'colorbox_default_image','1',NULL,'themes/default/themeoptions.php'),(269,0,'Slideshow','1','effervescence_plus','themes/effervescence_plus'),(270,0,'colorbox_default_search','1',NULL,'themes/default/themeoptions.php'),(271,0,'thumb_transition','1','stopdesign','themes/stopdesign'),(272,0,'images_per_row','5','garland','themes/garland'),(273,0,'Graphic_logo','*','effervescence_plus','themes/effervescence_plus'),(274,0,'Watermark_head_image','1','effervescence_plus','themes/effervescence_plus'),(275,0,'thumb_transition','1','garland','themes/garland'),(276,0,'Theme_personality','Image page','effervescence_plus','themes/effervescence_plus'),(277,0,'colorbox_stopdesign_album','1',NULL,'themes/stopdesign/themeoptions.php'),(278,0,'Theme_colors','kish-my father','effervescence_plus','themes/effervescence_plus'),(279,0,'thumb_size','85','garland','themes/garland'),(280,0,'effervescence_menu','','effervescence_plus','themes/effervescence_plus'),(281,0,'colorbox_stopdesign_image','1',NULL,'themes/stopdesign/themeoptions.php'),(282,0,'albums_per_row','3','effervescence_plus','themes/effervescence_plus'),(283,0,'colorbox_garland_image','1',NULL,'themes/garland/themeoptions.php'),(284,0,'images_per_row','4','effervescence_plus','themes/effervescence_plus'),(285,0,'colorbox_stopdesign_search','1',NULL,'themes/stopdesign/themeoptions.php'),(286,0,'thumb_transition','1','effervescence_plus','themes/effervescence_plus'),(287,0,'colorbox_garland_album','1',NULL,'themes/garland/themeoptions.php'),(288,0,'effervescence_daily_album_image','1','effervescence_plus','themes/effervescence_plus'),(289,0,'effervescence_daily_album_image_effect','','effervescence_plus','themes/effervescence_plus'),(290,0,'colorbox_garland_search','1',NULL,'themes/garland/themeoptions.php'),(291,0,'colorbox_effervescence_plus_album','1',NULL,'themes/effervescence_plus/themeoptions.php'),(292,0,'colorbox_effervescence_plus_image','1',NULL,'themes/effervescence_plus/themeoptions.php'),(293,0,'garland_menu','','garland','themes/garland'),(294,0,'colorbox_effervescence_plus_search','1',NULL,'themes/effervescence_plus/themeoptions.php'),(295,0,'last_garbage_collect','1562650715',NULL,NULL);
/*!40000 ALTER TABLE `zp_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_pages`
--

DROP TABLE IF EXISTS `zp_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(11) unsigned DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `extracontent` text COLLATE utf8_unicode_ci,
  `sort_order` varchar(48) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `show` int(1) unsigned NOT NULL DEFAULT '1',
  `titlelink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentson` int(1) unsigned DEFAULT '0',
  `codeblock` text COLLATE utf8_unicode_ci,
  `author` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `lastchange` datetime DEFAULT NULL,
  `lastchangeauthor` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hitcounter` int(11) unsigned DEFAULT '0',
  `permalink` int(1) unsigned NOT NULL DEFAULT '0',
  `locked` int(1) unsigned NOT NULL DEFAULT '0',
  `expiredate` datetime DEFAULT NULL,
  `total_value` int(11) unsigned DEFAULT '0',
  `total_votes` int(11) unsigned DEFAULT '0',
  `used_ips` longtext COLLATE utf8_unicode_ci,
  `rating` float DEFAULT NULL,
  `rating_status` int(1) DEFAULT '3',
  `user` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hint` text COLLATE utf8_unicode_ci,
  `custom_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titlelink` (`titlelink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_pages`
--

LOCK TABLES `zp_pages` WRITE;
/*!40000 ALTER TABLE `zp_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_plugin_storage`
--

DROP TABLE IF EXISTS `zp_plugin_storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_plugin_storage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `aux` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `aux` (`aux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_plugin_storage`
--

LOCK TABLES `zp_plugin_storage` WRITE;
/*!40000 ALTER TABLE `zp_plugin_storage` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_plugin_storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zp_tags`
--

DROP TABLE IF EXISTS `zp_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zp_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zp_tags`
--

LOCK TABLES `zp_tags` WRITE;
/*!40000 ALTER TABLE `zp_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `zp_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'zenphoto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31  7:05:37
