-- MySQL dump 10.13  Distrib 5.6.35, for Win32 (AMD64)
--
-- Host: localhost    Database: phpmyfaq
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
-- Current Database: `phpmyfaq`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `phpmyfaq` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `phpmyfaq`;

--
-- Table structure for table `phpmyfaqadminlog`
--

DROP TABLE IF EXISTS `phpmyfaqadminlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqadminlog` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `usr` int(11) NOT NULL,
  `text` text NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqadminlog`
--

LOCK TABLES `phpmyfaqadminlog` WRITE;
/*!40000 ALTER TABLE `phpmyfaqadminlog` DISABLE KEYS */;
INSERT INTO `phpmyfaqadminlog` VALUES (1,1562850173,2,'Beitragcreatesave','192.168.0.100');
/*!40000 ALTER TABLE `phpmyfaqadminlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqattachment`
--

DROP TABLE IF EXISTS `phpmyfaqattachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqattachment` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `record_lang` varchar(5) NOT NULL,
  `real_hash` char(32) NOT NULL,
  `virtual_hash` char(32) NOT NULL,
  `password_hash` char(40) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL,
  `encrypted` tinyint(4) NOT NULL DEFAULT '0',
  `mime_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqattachment`
--

LOCK TABLES `phpmyfaqattachment` WRITE;
/*!40000 ALTER TABLE `phpmyfaqattachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqattachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqattachment_file`
--

DROP TABLE IF EXISTS `phpmyfaqattachment_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqattachment_file` (
  `virtual_hash` char(32) NOT NULL,
  `contents` blob NOT NULL,
  PRIMARY KEY (`virtual_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqattachment_file`
--

LOCK TABLES `phpmyfaqattachment_file` WRITE;
/*!40000 ALTER TABLE `phpmyfaqattachment_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqattachment_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqcaptcha`
--

DROP TABLE IF EXISTS `phpmyfaqcaptcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqcaptcha` (
  `id` varchar(6) NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `captcha_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqcaptcha`
--

LOCK TABLES `phpmyfaqcaptcha` WRITE;
/*!40000 ALTER TABLE `phpmyfaqcaptcha` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqcaptcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqcategories`
--

DROP TABLE IF EXISTS `phpmyfaqcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqcategories` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqcategories`
--

LOCK TABLES `phpmyfaqcategories` WRITE;
/*!40000 ALTER TABLE `phpmyfaqcategories` DISABLE KEYS */;
INSERT INTO `phpmyfaqcategories` VALUES (1,'en',0,'User cred hacklab/hacklab','Hacking stuff',1);
/*!40000 ALTER TABLE `phpmyfaqcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqcategory_group`
--

DROP TABLE IF EXISTS `phpmyfaqcategory_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqcategory_group` (
  `category_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqcategory_group`
--

LOCK TABLES `phpmyfaqcategory_group` WRITE;
/*!40000 ALTER TABLE `phpmyfaqcategory_group` DISABLE KEYS */;
INSERT INTO `phpmyfaqcategory_group` VALUES (1,-1);
/*!40000 ALTER TABLE `phpmyfaqcategory_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqcategory_user`
--

DROP TABLE IF EXISTS `phpmyfaqcategory_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqcategory_user` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqcategory_user`
--

LOCK TABLES `phpmyfaqcategory_user` WRITE;
/*!40000 ALTER TABLE `phpmyfaqcategory_user` DISABLE KEYS */;
INSERT INTO `phpmyfaqcategory_user` VALUES (1,-1);
/*!40000 ALTER TABLE `phpmyfaqcategory_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqcategoryrelations`
--

DROP TABLE IF EXISTS `phpmyfaqcategoryrelations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqcategoryrelations` (
  `category_id` int(11) NOT NULL,
  `category_lang` varchar(5) NOT NULL DEFAULT '',
  `record_id` int(11) NOT NULL,
  `record_lang` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`category_id`,`category_lang`,`record_id`,`record_lang`),
  KEY `idx_records` (`record_id`,`record_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqcategoryrelations`
--

LOCK TABLES `phpmyfaqcategoryrelations` WRITE;
/*!40000 ALTER TABLE `phpmyfaqcategoryrelations` DISABLE KEYS */;
INSERT INTO `phpmyfaqcategoryrelations` VALUES (1,'en',1,'en');
/*!40000 ALTER TABLE `phpmyfaqcategoryrelations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqchanges`
--

DROP TABLE IF EXISTS `phpmyfaqchanges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqchanges` (
  `id` int(11) NOT NULL,
  `beitrag` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `revision_id` int(11) NOT NULL DEFAULT '0',
  `usr` int(11) NOT NULL,
  `datum` int(11) NOT NULL,
  `what` text,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqchanges`
--

LOCK TABLES `phpmyfaqchanges` WRITE;
/*!40000 ALTER TABLE `phpmyfaqchanges` DISABLE KEYS */;
INSERT INTO `phpmyfaqchanges` VALUES (1,1,'en',0,2,1562850173,'');
/*!40000 ALTER TABLE `phpmyfaqchanges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqcomments`
--

DROP TABLE IF EXISTS `phpmyfaqcomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqcomments` (
  `id_comment` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `usr` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `datum` int(15) NOT NULL,
  `helped` text,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqcomments`
--

LOCK TABLES `phpmyfaqcomments` WRITE;
/*!40000 ALTER TABLE `phpmyfaqcomments` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqcomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqconfig`
--

DROP TABLE IF EXISTS `phpmyfaqconfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqconfig` (
  `config_name` varchar(255) NOT NULL DEFAULT '',
  `config_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqconfig`
--

LOCK TABLES `phpmyfaqconfig` WRITE;
/*!40000 ALTER TABLE `phpmyfaqconfig` DISABLE KEYS */;
INSERT INTO `phpmyfaqconfig` VALUES ('main.administrationMail','webmaster@example.org'),('main.contactInformations',''),('main.currentApiVersion','1'),('main.currentVersion','2.7.0'),('main.dateFormat','Y-m-d H:i'),('main.enableAdminLog','true'),('main.enableGoogleTranslation','false'),('main.enableRewriteRules','false'),('main.enableUserTracking','true'),('main.enableWysiwygEditor','true'),('main.googleTranslationKey',''),('main.language','language_en.php'),('main.languageDetection','true'),('main.metaDescription','phpMyFAQ should be the answer for all questions in life'),('main.metaKeywords',''),('main.metaPublisher','John Doe'),('main.optionalMailAddress','false'),('main.phpMyFAQToken',''),('main.referenceURL','http://192.168.0.1'),('main.send2friendText',''),('main.templateSet','default'),('main.titleFAQ','phpMyFAQ Codename Prospero'),('main.urlValidateInterval','86400'),('records.attachmentsPath','attachments'),('records.attachmentsStorageType','0'),('records.defaultActivation','false'),('records.defaultAllowComments','false'),('records.defaultAttachmentEncKey',''),('records.disableAttachments','true'),('records.enableAttachmentEncryption','false'),('records.enableVisibilityQuestions','false'),('records.maxAttachmentSize','100000'),('records.numberOfRecordsPerPage','10'),('records.numberOfRelatedArticles','5'),('records.numberOfShownNewsEntries','3'),('records.orderby','id'),('records.orderingPopularFaqs','visits'),('records.sortby','DESC'),('search.enableRelevance','false'),('search.numberSearchTerms','10'),('search.relevance','thema,content,keywords'),('search.useAjaxSearchOnStartpage','false'),('security.bannedIPs',''),('security.enableLoginOnly','false'),('security.ipCheck','false'),('security.ldapSupport','false'),('security.permLevel','basic'),('security.ssoLogoutRedirect',''),('security.ssoSupport','false'),('security.useSslForLogins','false'),('socialnetworks.enableFacebookSupport','false'),('socialnetworks.enableTwitterSupport','false'),('socialnetworks.twitterAccessTokenKey',''),('socialnetworks.twitterAccessTokenSecret',''),('socialnetworks.twitterConsumerKey',''),('socialnetworks.twitterConsumerSecret',''),('spam.checkBannedWords','true'),('spam.enableCaptchaCode','true'),('spam.enableSafeEmail','true');
/*!40000 ALTER TABLE `phpmyfaqconfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqdata`
--

DROP TABLE IF EXISTS `phpmyfaqdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqdata` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `revision_id` int(11) NOT NULL DEFAULT '0',
  `active` char(3) NOT NULL,
  `sticky` int(11) NOT NULL,
  `keywords` text,
  `thema` text NOT NULL,
  `content` longtext,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` enum('y','n') NOT NULL DEFAULT 'y',
  `datum` varchar(15) NOT NULL,
  `links_state` varchar(7) DEFAULT NULL,
  `links_check_date` int(11) NOT NULL DEFAULT '0',
  `date_start` varchar(14) NOT NULL DEFAULT '00000000000000',
  `date_end` varchar(14) NOT NULL DEFAULT '99991231235959',
  PRIMARY KEY (`id`,`lang`),
  FULLTEXT KEY `keywords` (`keywords`,`thema`,`content`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqdata`
--

LOCK TABLES `phpmyfaqdata` WRITE;
/*!40000 ALTER TABLE `phpmyfaqdata` DISABLE KEYS */;
INSERT INTO `phpmyfaqdata` VALUES (1,'en',1000,0,'no',0,'','','<p>sdasd ad asd asd as</p>','hacklab','hacklab@hacklab.com','n','20190711150253','nolinks',1562850174,'00000000000000','99991231235959');
/*!40000 ALTER TABLE `phpmyfaqdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqdata_group`
--

DROP TABLE IF EXISTS `phpmyfaqdata_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqdata_group` (
  `record_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqdata_group`
--

LOCK TABLES `phpmyfaqdata_group` WRITE;
/*!40000 ALTER TABLE `phpmyfaqdata_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqdata_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqdata_revisions`
--

DROP TABLE IF EXISTS `phpmyfaqdata_revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqdata_revisions` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `revision_id` int(11) NOT NULL DEFAULT '0',
  `active` char(3) NOT NULL,
  `sticky` int(11) NOT NULL,
  `keywords` text,
  `thema` text NOT NULL,
  `content` longtext,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` char(1) DEFAULT 'y',
  `datum` varchar(15) NOT NULL,
  `links_state` varchar(7) DEFAULT NULL,
  `links_check_date` int(11) NOT NULL DEFAULT '0',
  `date_start` varchar(14) NOT NULL DEFAULT '00000000000000',
  `date_end` varchar(14) NOT NULL DEFAULT '99991231235959',
  PRIMARY KEY (`id`,`lang`,`solution_id`,`revision_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqdata_revisions`
--

LOCK TABLES `phpmyfaqdata_revisions` WRITE;
/*!40000 ALTER TABLE `phpmyfaqdata_revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqdata_revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqdata_tags`
--

DROP TABLE IF EXISTS `phpmyfaqdata_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqdata_tags` (
  `record_id` int(11) NOT NULL,
  `tagging_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`,`tagging_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqdata_tags`
--

LOCK TABLES `phpmyfaqdata_tags` WRITE;
/*!40000 ALTER TABLE `phpmyfaqdata_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqdata_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqdata_user`
--

DROP TABLE IF EXISTS `phpmyfaqdata_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqdata_user` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqdata_user`
--

LOCK TABLES `phpmyfaqdata_user` WRITE;
/*!40000 ALTER TABLE `phpmyfaqdata_user` DISABLE KEYS */;
INSERT INTO `phpmyfaqdata_user` VALUES (1,-1);
/*!40000 ALTER TABLE `phpmyfaqdata_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqglossary`
--

DROP TABLE IF EXISTS `phpmyfaqglossary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqglossary` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `item` varchar(255) NOT NULL,
  `definition` text NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqglossary`
--

LOCK TABLES `phpmyfaqglossary` WRITE;
/*!40000 ALTER TABLE `phpmyfaqglossary` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqglossary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqgroup`
--

DROP TABLE IF EXISTS `phpmyfaqgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqgroup` (
  `group_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `description` text,
  `auto_join` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqgroup`
--

LOCK TABLES `phpmyfaqgroup` WRITE;
/*!40000 ALTER TABLE `phpmyfaqgroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqgroup_right`
--

DROP TABLE IF EXISTS `phpmyfaqgroup_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqgroup_right` (
  `group_id` int(11) NOT NULL,
  `right_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqgroup_right`
--

LOCK TABLES `phpmyfaqgroup_right` WRITE;
/*!40000 ALTER TABLE `phpmyfaqgroup_right` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqgroup_right` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqlinkverifyrules`
--

DROP TABLE IF EXISTS `phpmyfaqlinkverifyrules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqlinkverifyrules` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(6) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `enabled` enum('y','n') NOT NULL DEFAULT 'y',
  `locked` enum('y','n') NOT NULL DEFAULT 'n',
  `owner` varchar(255) NOT NULL DEFAULT '',
  `dtInsertDate` varchar(15) NOT NULL DEFAULT '',
  `dtUpdateDate` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqlinkverifyrules`
--

LOCK TABLES `phpmyfaqlinkverifyrules` WRITE;
/*!40000 ALTER TABLE `phpmyfaqlinkverifyrules` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqlinkverifyrules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqnews`
--

DROP TABLE IF EXISTS `phpmyfaqnews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqnews` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `header` varchar(255) NOT NULL,
  `artikel` text NOT NULL,
  `datum` varchar(14) NOT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_email` varchar(255) DEFAULT NULL,
  `active` char(1) DEFAULT 'y',
  `comment` char(1) DEFAULT 'n',
  `date_start` varchar(14) NOT NULL DEFAULT '00000000000000',
  `date_end` varchar(14) NOT NULL DEFAULT '99991231235959',
  `link` varchar(255) DEFAULT NULL,
  `linktitel` varchar(255) DEFAULT NULL,
  `target` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqnews`
--

LOCK TABLES `phpmyfaqnews` WRITE;
/*!40000 ALTER TABLE `phpmyfaqnews` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqnews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqquestions`
--

DROP TABLE IF EXISTS `phpmyfaqquestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqquestions` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created` varchar(20) NOT NULL,
  `is_visible` char(1) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqquestions`
--

LOCK TABLES `phpmyfaqquestions` WRITE;
/*!40000 ALTER TABLE `phpmyfaqquestions` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqquestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqright`
--

DROP TABLE IF EXISTS `phpmyfaqright`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqright` (
  `right_id` int(11) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `for_users` int(1) DEFAULT '1',
  `for_groups` int(1) DEFAULT '1',
  PRIMARY KEY (`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqright`
--

LOCK TABLES `phpmyfaqright` WRITE;
/*!40000 ALTER TABLE `phpmyfaqright` DISABLE KEYS */;
INSERT INTO `phpmyfaqright` VALUES (1,'adduser','Right to add user accounts',1,1),(2,'edituser','Right to edit user accounts',1,1),(3,'deluser','Right to delete user accounts',1,1),(4,'addbt','Right to add faq entries',1,1),(5,'editbt','Right to edit faq entries',1,1),(6,'delbt','Right to delete faq entries',1,1),(7,'viewlog','Right to view logfiles',1,1),(8,'adminlog','Right to view admin log',1,1),(9,'delcomment','Right to delete comments',1,1),(10,'addnews','Right to add news',1,1),(11,'editnews','Right to edit news',1,1),(12,'delnews','Right to delete news',1,1),(13,'addcateg','Right to add categories',1,1),(14,'editcateg','Right to edit categories',1,1),(15,'delcateg','Right to delete categories',1,1),(16,'passwd','Right to change passwords',1,1),(17,'editconfig','Right to edit configuration',1,1),(18,'addatt','Right to add attachments',1,1),(19,'delatt','Right to delete attachments',1,1),(20,'backup','Right to save backups',1,1),(21,'restore','Right to load backups',1,1),(22,'delquestion','Right to delete questions',1,1),(23,'addglossary','Right to add glossary entries',1,1),(24,'editglossary','Right to edit glossary entries',1,1),(25,'delglossary','Right to delete glossary entries',1,1),(26,'changebtrevs','Right to edit revisions',1,1),(27,'addgroup','Right to add group accounts',1,1),(28,'editgroup','Right to edit group accounts',1,1),(29,'delgroup','Right to delete group accounts',1,1),(30,'addtranslation','Right to add translation',1,1),(31,'edittranslation','Right to edit translations',1,1),(32,'deltranslation','Right to delete translations',1,1),(33,'approverec','Right to approve records',1,1),(34,'addattachment','Right to add attachments',1,1),(35,'editattachment','Right to edit attachments',1,1),(36,'delattachment','Right to delete attachments',1,1),(37,'dlattachment','Right to download attachments',1,1),(38,'reports','Right to generate reports',1,1);
/*!40000 ALTER TABLE `phpmyfaqright` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqsearches`
--

DROP TABLE IF EXISTS `phpmyfaqsearches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqsearches` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `searchterm` varchar(255) NOT NULL,
  `searchdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqsearches`
--

LOCK TABLES `phpmyfaqsearches` WRITE;
/*!40000 ALTER TABLE `phpmyfaqsearches` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqsearches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqsessions`
--

DROP TABLE IF EXISTS `phpmyfaqsessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqsessions` (
  `sid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqsessions`
--

LOCK TABLES `phpmyfaqsessions` WRITE;
/*!40000 ALTER TABLE `phpmyfaqsessions` DISABLE KEYS */;
INSERT INTO `phpmyfaqsessions` VALUES (1,2,'192.168.0.1',1562852287),(2,-1,'192.168.0.100',1562852739),(3,2,'192.168.0.1',1562853210);
/*!40000 ALTER TABLE `phpmyfaqsessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqstopwords`
--

DROP TABLE IF EXISTS `phpmyfaqstopwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqstopwords` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `stopword` varchar(64) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqstopwords`
--

LOCK TABLES `phpmyfaqstopwords` WRITE;
/*!40000 ALTER TABLE `phpmyfaqstopwords` DISABLE KEYS */;
INSERT INTO `phpmyfaqstopwords` VALUES (0,'cs','dnes'),(1,'cs','cz'),(2,'cs','timto'),(3,'cs','budes'),(4,'cs','budem'),(5,'cs','byli'),(6,'cs','jses'),(7,'cs','muj'),(8,'cs','svym'),(9,'cs','ta'),(10,'cs','tomto'),(11,'cs','tohle'),(12,'cs','tuto'),(13,'cs','tyto'),(14,'cs','jej'),(15,'cs','zda'),(16,'cs','proc'),(17,'cs','mate'),(18,'cs','tato'),(19,'cs','kam'),(20,'cs','tohoto'),(21,'cs','kdo'),(22,'cs','kteri'),(23,'cs','mi'),(24,'cs','nam'),(25,'cs','tom'),(26,'cs','tomuto'),(27,'cs','mit'),(28,'cs','nic'),(29,'cs','proto'),(30,'cs','kterou'),(31,'cs','byla'),(32,'cs','toho'),(33,'cs','protoze'),(34,'cs','asi'),(35,'cs','ho'),(36,'cs','nasi'),(37,'cs','napiste'),(38,'cs','re'),(39,'cs','coz'),(40,'cs','tim'),(41,'cs','takze'),(42,'cs','svych'),(43,'cs','jeji'),(44,'cs','svymi'),(45,'cs','jste'),(46,'cs','aj'),(47,'cs','tu'),(48,'cs','tedy'),(49,'cs','teto'),(50,'cs','bylo'),(51,'cs','kde'),(52,'cs','ke'),(53,'cs','prave'),(54,'cs','ji'),(55,'cs','nad'),(56,'cs','nejsou'),(57,'cs','ci'),(58,'cs','pod'),(59,'cs','tema'),(60,'cs','mezi'),(61,'cs','pres'),(62,'cs','ty'),(63,'cs','pak'),(64,'cs','vam'),(65,'cs','ani'),(66,'cs','kdyz'),(67,'cs','vsak'),(68,'cs','ne'),(69,'cs','jsem'),(70,'cs','tento'),(71,'cs','clanku'),(72,'cs','clanky'),(73,'cs','aby'),(74,'cs','jsme'),(75,'cs','pred'),(76,'cs','pta'),(77,'cs','jejich'),(78,'cs','byl'),(79,'cs','jeste'),(80,'cs','az'),(81,'cs','bez'),(82,'cs','take'),(83,'cs','pouze'),(84,'cs','prvni'),(85,'cs','vase'),(86,'cs','ktera'),(87,'cs','nas'),(88,'cs','novy'),(89,'cs','tipy'),(90,'cs','pokud'),(91,'cs','muze'),(92,'cs','design'),(93,'cs','strana'),(94,'cs','jeho'),(95,'cs','sve'),(96,'cs','jine'),(97,'cs','zpravy'),(98,'cs','nove'),(99,'cs','neni'),(100,'cs','vas'),(101,'cs','jen'),(102,'cs','podle'),(103,'cs','zde'),(104,'cs','clanek'),(105,'cs','uz'),(106,'cs','email'),(107,'cs','byt'),(108,'cs','vice'),(109,'cs','bude'),(110,'cs','jiz'),(111,'cs','nez'),(112,'cs','ktery'),(113,'cs','by'),(114,'cs','ktere'),(115,'cs','co'),(116,'cs','nebo'),(117,'cs','ten'),(118,'cs','tak'),(119,'cs','ma'),(120,'cs','pri'),(121,'cs','od'),(122,'cs','po'),(123,'cs','jsou'),(124,'cs','jak'),(125,'cs','dalsi'),(126,'cs','ale'),(127,'cs','si'),(128,'cs','ve'),(129,'cs','to'),(130,'cs','jako'),(131,'cs','za'),(132,'cs','zpet'),(133,'cs','ze'),(134,'cs','do'),(135,'cs','pro'),(136,'cs','je'),(137,'da','af'),(138,'da','alle'),(139,'da','andet'),(140,'da','andre'),(141,'da','at'),(142,'da','begge'),(143,'da','da'),(144,'da','de'),(145,'da','den'),(146,'da','denne'),(147,'da','der'),(148,'da','deres'),(149,'da','det'),(150,'da','dette'),(151,'da','dig'),(152,'da','din'),(153,'da','dog'),(154,'da','du'),(155,'da','ej'),(156,'da','eller'),(157,'da','en'),(158,'da','end'),(159,'da','ene'),(160,'da','eneste'),(161,'da','enhver'),(162,'da','et'),(163,'da','fem'),(164,'da','fire'),(165,'da','flere'),(166,'da','fleste'),(167,'da','for'),(168,'da','fordi'),(169,'da','forrige'),(170,'da','fra'),(171,'da','f√•'),(172,'da','f√∏r'),(173,'da','god'),(174,'da','han'),(175,'da','hans'),(176,'da','har'),(177,'da','hendes'),(178,'da','her'),(179,'da','hun'),(180,'da','hvad'),(181,'da','hvem'),(182,'da','hver'),(183,'da','hvilken'),(184,'da','hvis'),(185,'da','hvor'),(186,'da','hvordan'),(187,'da','hvorfor'),(188,'da','hvorn√•r'),(189,'da','i'),(190,'da','ikke'),(191,'da','ind'),(192,'da','ingen'),(193,'da','intet'),(194,'da','jeg'),(195,'da','jeres'),(196,'da','kan'),(197,'da','kom'),(198,'da','kommer'),(199,'da','lav'),(200,'da','lidt'),(201,'da','lille'),(202,'da','man mand'),(203,'da','mange'),(204,'da','med'),(205,'da','meget'),(206,'da','men'),(207,'da','mens'),(208,'da','mere'),(209,'da','mig'),(210,'da','ned'),(211,'da','ni'),(212,'da','nogen'),(213,'da','noget'),(214,'da','ny'),(215,'da','nyt'),(216,'da','n√¶r'),(217,'da','n√¶ste'),(218,'da','n√¶sten'),(219,'da','og'),(220,'da','op'),(221,'da','otte'),(222,'da','over'),(223,'da','p√•'),(224,'da','se'),(225,'da','seks'),(226,'da','ses'),(227,'da','som'),(228,'da','stor'),(229,'da','store'),(230,'da','syv'),(231,'da','ti'),(232,'da','til'),(233,'da','to'),(234,'da','tre'),(235,'da','ud'),(236,'de','ab'),(237,'de','bei'),(238,'de','da'),(239,'de','deshalb'),(240,'de','ein'),(241,'de','f√ºr'),(242,'de','haben'),(243,'de','hier'),(244,'de','ich'),(245,'de','ja'),(246,'de','kann'),(247,'de','machen'),(248,'de','muesste'),(249,'de','nach'),(250,'de','oder'),(251,'de','seid'),(252,'de','sonst'),(253,'de','und'),(254,'de','vom'),(255,'de','wann'),(256,'de','wenn'),(257,'de','wie'),(258,'de','zu'),(259,'de','bin'),(260,'de','eines'),(261,'de','hat'),(262,'de','manche'),(263,'de','solches'),(264,'de','an'),(265,'de','anderm'),(266,'de','bis'),(267,'de','das'),(268,'de','deinem'),(269,'de','demselben'),(270,'de','dir'),(271,'de','doch'),(272,'de','einig'),(273,'de','er'),(274,'de','eurer'),(275,'de','hatte'),(276,'de','ihnen'),(277,'de','ihre'),(278,'de','ins'),(279,'de','jenen'),(280,'de','keinen'),(281,'de','manchem'),(282,'de','meinen'),(283,'de','nichts'),(284,'de','seine'),(285,'de','soll'),(286,'de','unserm'),(287,'de','welche'),(288,'de','werden'),(289,'de','wollte'),(290,'de','w√§hrend'),(291,'de','alle'),(292,'de','allem'),(293,'de','allen'),(294,'de','aller'),(295,'de','alles'),(296,'de','als'),(297,'de','also'),(298,'de','am'),(299,'de','ander'),(300,'de','andere'),(301,'de','anderem'),(302,'de','anderen'),(303,'de','anderer'),(304,'de','anderes'),(305,'de','andern'),(306,'de','anderr'),(307,'de','anders'),(308,'de','auch'),(309,'de','auf'),(310,'de','aus'),(311,'de','bist'),(312,'de','bsp.'),(313,'de','daher'),(314,'de','damit'),(315,'de','dann'),(316,'de','dasselbe'),(317,'de','dazu'),(318,'de','da√ü'),(319,'de','dein'),(320,'de','deine'),(321,'de','deinen'),(322,'de','deiner'),(323,'de','deines'),(324,'de','dem'),(325,'de','den'),(326,'de','denn'),(327,'de','denselben'),(328,'de','der'),(329,'de','derer'),(330,'de','derselbe'),(331,'de','derselben'),(332,'de','des'),(333,'de','desselben'),(334,'de','dessen'),(335,'de','dich'),(336,'de','die'),(337,'de','dies'),(338,'de','diese'),(339,'de','dieselbe'),(340,'de','dieselben'),(341,'de','diesem'),(342,'de','diesen'),(343,'de','dieser'),(344,'de','dieses'),(345,'de','dort'),(346,'de','du'),(347,'de','durch'),(348,'de','eine'),(349,'de','einem'),(350,'de','einen'),(351,'de','einer'),(352,'de','einige'),(353,'de','einigem'),(354,'de','einigen'),(355,'de','einiger'),(356,'de','einiges'),(357,'de','einmal'),(358,'de','es'),(359,'de','etwas'),(360,'de','euch'),(361,'de','euer'),(362,'de','eure'),(363,'de','eurem'),(364,'de','euren'),(365,'de','eures'),(366,'de','ganz'),(367,'de','ganze'),(368,'de','ganzen'),(369,'de','ganzer'),(370,'de','ganzes'),(371,'de','gegen'),(372,'de','gemacht'),(373,'de','gesagt'),(374,'de','gesehen'),(375,'de','gewesen'),(376,'de','gewollt'),(377,'de','hab'),(378,'de','habe'),(379,'de','hatten'),(380,'de','hin'),(381,'de','hinter'),(382,'de','ihm'),(383,'de','ihn'),(384,'de','ihr'),(385,'de','ihrem'),(386,'de','ihren'),(387,'de','ihrer'),(388,'de','ihres'),(389,'de','im'),(390,'de','in'),(391,'de','indem'),(392,'de','ist'),(393,'de','jede'),(394,'de','jedem'),(395,'de','jeden'),(396,'de','jeder'),(397,'de','jedes'),(398,'de','jene'),(399,'de','jenem'),(400,'de','jener'),(401,'de','jenes'),(402,'de','jetzt'),(403,'de','kein'),(404,'de','keine'),(405,'de','keinem'),(406,'de','keiner'),(407,'de','keines'),(408,'de','konnte'),(409,'de','k√∂nnen'),(410,'de','k√∂nnte'),(411,'de','mache'),(412,'de','machst'),(413,'de','macht'),(414,'de','machte'),(415,'de','machten'),(416,'de','man'),(417,'de','manchen'),(418,'de','mancher'),(419,'de','manches'),(420,'de','mein'),(421,'de','meine'),(422,'de','meinem'),(423,'de','meiner'),(424,'de','meines'),(425,'de','mich'),(426,'de','mir'),(427,'de','mit'),(428,'de','muss'),(429,'de','musste'),(430,'de','m√º√üt'),(431,'de','nicht'),(432,'de','noch'),(433,'de','nun'),(434,'de','nur'),(435,'de','ob'),(436,'de','ohne'),(437,'de','sage'),(438,'de','sagen'),(439,'de','sagt'),(440,'de','sagte'),(441,'de','sagten'),(442,'de','sagtest'),(443,'de','sehe'),(444,'de','sehen'),(445,'de','sehr'),(446,'de','seht'),(447,'de','sein'),(448,'de','seinem'),(449,'de','seinen'),(450,'de','seiner'),(451,'de','seines'),(452,'de','selbst'),(453,'de','sich'),(454,'de','sicher'),(455,'de','sie'),(456,'de','sind'),(457,'de','so'),(458,'de','solche'),(459,'de','solchem'),(460,'de','solchen'),(461,'de','solcher'),(462,'de','sollte'),(463,'de','sondern'),(464,'de','um'),(465,'de','uns'),(466,'de','unse'),(467,'de','unsen'),(468,'de','unser'),(469,'de','unses'),(470,'de','unter'),(471,'de','viel'),(472,'de','von'),(473,'de','vor'),(474,'de','war'),(475,'de','waren'),(476,'de','warst'),(477,'de','was'),(478,'de','weg'),(479,'de','weil'),(480,'de','weiter'),(481,'de','welchem'),(482,'de','welchen'),(483,'de','welcher'),(484,'de','welches'),(485,'de','werde'),(486,'de','wieder'),(487,'de','will'),(488,'de','wir'),(489,'de','wird'),(490,'de','wirst'),(491,'de','wo'),(492,'de','wolle'),(493,'de','wollen'),(494,'de','wollt'),(495,'de','wollten'),(496,'de','wolltest'),(497,'de','wolltet'),(498,'de','w√ºrde'),(499,'de','w√ºrden'),(500,'de','z.B.'),(501,'de','zum'),(502,'de','zur'),(503,'de','zwar'),(504,'de','zwischen'),(505,'de','√ºber'),(506,'de','aber'),(507,'de','abgerufen'),(508,'de','abgerufene'),(509,'de','abgerufener'),(510,'de','abgerufenes'),(511,'de','acht'),(512,'de','acute'),(513,'de','allein'),(514,'de','allerdings'),(515,'de','allerlei'),(516,'de','allg'),(517,'de','allgemein'),(518,'de','allm√§hlich'),(519,'de','allzu'),(520,'de','alsbald'),(521,'de','amp'),(522,'de','and'),(523,'de','andererseits'),(524,'de','andernfalls'),(525,'de','anerkannt'),(526,'de','anerkannte'),(527,'de','anerkannter'),(528,'de','anerkanntes'),(529,'de','anfangen'),(530,'de','anfing'),(531,'de','angefangen'),(532,'de','angesetze'),(533,'de','angesetzt'),(534,'de','angesetzten'),(535,'de','angesetzter'),(536,'de','ansetzen'),(537,'de','anstatt'),(538,'de','arbeiten'),(539,'de','aufgeh√∂rt'),(540,'de','aufgrund'),(541,'de','aufh√∂ren'),(542,'de','aufh√∂rte'),(543,'de','aufzusuchen'),(544,'de','ausdr√ºcken'),(545,'de','ausdr√ºckt'),(546,'de','ausdr√ºckte'),(547,'de','ausgenommen'),(548,'de','ausser'),(549,'de','ausserdem'),(550,'de','author'),(551,'de','autor'),(552,'de','au√üen'),(553,'de','au√üer'),(554,'de','au√üerdem'),(555,'de','au√üerhalb'),(556,'de','background'),(557,'de','bald'),(558,'de','bearbeite'),(559,'de','bearbeiten'),(560,'de','bearbeitete'),(561,'de','bearbeiteten'),(562,'de','bedarf'),(563,'de','bedurfte'),(564,'de','bed√ºrfen'),(565,'de','been'),(566,'de','befragen'),(567,'de','befragte'),(568,'de','befragten'),(569,'de','befragter'),(570,'de','begann'),(571,'de','beginnen'),(572,'de','begonnen'),(573,'de','behalten'),(574,'de','behielt'),(575,'de','beide'),(576,'de','beiden'),(577,'de','beiderlei'),(578,'de','beides'),(579,'de','beim'),(580,'de','beinahe'),(581,'de','beitragen'),(582,'de','beitrugen'),(583,'de','bekannt'),(584,'de','bekannte'),(585,'de','bekannter'),(586,'de','bekennen'),(587,'de','benutzt'),(588,'de','bereits'),(589,'de','berichten'),(590,'de','berichtet'),(591,'de','berichtete'),(592,'de','berichteten'),(593,'de','besonders'),(594,'de','besser'),(595,'de','bestehen'),(596,'de','besteht'),(597,'de','betr√§chtlich'),(598,'de','bevor'),(599,'de','bez√ºglich'),(600,'de','bietet'),(601,'de','bisher'),(602,'de','bislang'),(603,'de','biz'),(604,'de','bleiben'),(605,'de','blieb'),(606,'de','bloss'),(607,'de','blo√ü'),(608,'de','border'),(609,'de','brachte'),(610,'de','brachten'),(611,'de','brauchen'),(612,'de','braucht'),(613,'de','bringen'),(614,'de','br√§uchte'),(615,'de','bzw'),(616,'de','b√∂den'),(617,'de','ca'),(618,'de','ca.'),(619,'de','collapsed'),(620,'de','com'),(621,'de','comment'),(622,'de','content'),(623,'de','da?'),(624,'de','dabei'),(625,'de','dadurch'),(626,'de','daf√ºr'),(627,'de','dagegen'),(628,'de','dahin'),(629,'de','damals'),(630,'de','danach'),(631,'de','daneben'),(632,'de','dank'),(633,'de','danke'),(634,'de','danken'),(635,'de','dannen'),(636,'de','daran'),(637,'de','darauf'),(638,'de','daraus'),(639,'de','darf'),(640,'de','darfst'),(641,'de','darin'),(642,'de','darum'),(643,'de','darunter'),(644,'de','dar√ºber'),(645,'de','dar√ºberhinaus'),(646,'de','dass'),(647,'de','davon'),(648,'de','davor'),(649,'de','demnach'),(650,'de','denen'),(651,'de','dennoch'),(652,'de','derart'),(653,'de','derartig'),(654,'de','derem'),(655,'de','deren'),(656,'de','derjenige'),(657,'de','derjenigen'),(658,'de','derzeit'),(659,'de','desto'),(660,'de','deswegen'),(661,'de','diejenige'),(662,'de','diesseits'),(663,'de','dinge'),(664,'de','direkt'),(665,'de','direkte'),(666,'de','direkten'),(667,'de','direkter'),(668,'de','doc'),(669,'de','doppelt'),(670,'de','dorther'),(671,'de','dorthin'),(672,'de','drauf'),(673,'de','drei'),(674,'de','drei√üig'),(675,'de','drin'),(676,'de','dritte'),(677,'de','drunter'),(678,'de','dr√ºber'),(679,'de','dunklen'),(680,'de','durchaus'),(681,'de','durfte'),(682,'de','durften'),(683,'de','d√ºrfen'),(684,'de','d√ºrfte'),(685,'de','eben'),(686,'de','ebenfalls'),(687,'de','ebenso'),(688,'de','ehe'),(689,'de','eher'),(690,'de','eigenen'),(691,'de','eigenes'),(692,'de','eigentlich'),(693,'de','einba√ºn'),(694,'de','einerseits'),(695,'de','einfach'),(696,'de','einf√ºhren'),(697,'de','einf√ºhrte'),(698,'de','einf√ºhrten'),(699,'de','eingesetzt'),(700,'de','einigerma√üen'),(701,'de','eins'),(702,'de','einseitig'),(703,'de','einseitige'),(704,'de','einseitigen'),(705,'de','einseitiger'),(706,'de','einst'),(707,'de','einstmals'),(708,'de','einzig'),(709,'de','elf'),(710,'de','ende'),(711,'de','entsprechend'),(712,'de','entweder'),(713,'de','erg√§nze'),(714,'de','erg√§nzen'),(715,'de','erg√§nzte'),(716,'de','erg√§nzten'),(717,'de','erhalten'),(718,'de','erhielt'),(719,'de','erhielten'),(720,'de','erh√§lt'),(721,'de','erneut'),(722,'de','erst'),(723,'de','erste'),(724,'de','ersten'),(725,'de','erster'),(726,'de','er√∂ffne'),(727,'de','er√∂ffnen'),(728,'de','er√∂ffnet'),(729,'de','er√∂ffnete'),(730,'de','er√∂ffnetes'),(731,'de','etc'),(732,'de','etliche'),(733,'de','etwa'),(734,'de','fall'),(735,'de','falls'),(736,'de','fand'),(737,'de','fast'),(738,'de','ferner'),(739,'de','finden'),(740,'de','findest'),(741,'de','findet'),(742,'de','folgende'),(743,'de','folgenden'),(744,'de','folgender'),(745,'de','folgendes'),(746,'de','folglich'),(747,'de','for'),(748,'de','fordern'),(749,'de','fordert'),(750,'de','forderte'),(751,'de','forderten'),(752,'de','fortsetzen'),(753,'de','fortsetzt'),(754,'de','fortsetzte'),(755,'de','fortsetzten'),(756,'de','fragte'),(757,'de','frau'),(758,'de','frei'),(759,'de','freie'),(760,'de','freier'),(761,'de','freies'),(762,'de','fuer'),(763,'de','f√ºnf'),(764,'de','gab'),(765,'de','ganzem'),(766,'de','gar'),(767,'de','gbr'),(768,'de','geb'),(769,'de','geben'),(770,'de','geblieben'),(771,'de','gebracht'),(772,'de','gedurft'),(773,'de','geehrt'),(774,'de','geehrte'),(775,'de','geehrten'),(776,'de','geehrter'),(777,'de','gefallen'),(778,'de','gefiel'),(779,'de','gef√§lligst'),(780,'de','gef√§llt'),(781,'de','gegeben'),(782,'de','gehabt'),(783,'de','gehen'),(784,'de','geht'),(785,'de','gekommen'),(786,'de','gekonnt'),(787,'de','gemocht'),(788,'de','gem√§ss'),(789,'de','genommen'),(790,'de','genug'),(791,'de','gern'),(792,'de','gestern'),(793,'de','gestrige'),(794,'de','getan'),(795,'de','geteilt'),(796,'de','geteilte'),(797,'de','getragen'),(798,'de','gewisserma√üen'),(799,'de','geworden'),(800,'de','ggf'),(801,'de','gib'),(802,'de','gibt'),(803,'de','gleich'),(804,'de','gleichwohl'),(805,'de','gleichzeitig'),(806,'de','gl√ºcklicherweise'),(807,'de','gmbh'),(808,'de','gratulieren'),(809,'de','gratuliert'),(810,'de','gratulierte'),(811,'de','gute'),(812,'de','guten'),(813,'de','g√§ngig'),(814,'de','g√§ngige'),(815,'de','g√§ngigen'),(816,'de','g√§ngiger'),(817,'de','g√§ngiges'),(818,'de','g√§nzlich'),(819,'de','haette'),(820,'de','halb'),(821,'de','hallo'),(822,'de','hast'),(823,'de','hattest'),(824,'de','hattet'),(825,'de','heraus'),(826,'de','herein'),(827,'de','heute'),(828,'de','heutige'),(829,'de','hiermit'),(830,'de','hiesige'),(831,'de','hinein'),(832,'de','hinten'),(833,'de','hinterher'),(834,'de','hoch'),(835,'de','html'),(836,'de','http'),(837,'de','hundert'),(838,'de','h√§tt'),(839,'de','h√§tte'),(840,'de','h√§tten'),(841,'de','h√∂chstens'),(842,'de','igitt'),(843,'de','image'),(844,'de','immer'),(845,'de','immerhin'),(846,'de','important'),(847,'de','indessen'),(848,'de','info'),(849,'de','infolge'),(850,'de','innen'),(851,'de','innerhalb'),(852,'de','insofern'),(853,'de','inzwischen'),(854,'de','irgend'),(855,'de','irgendeine'),(856,'de','irgendwas'),(857,'de','irgendwen'),(858,'de','irgendwer'),(859,'de','irgendwie'),(860,'de','irgendwo'),(861,'de','je'),(862,'de','jed'),(863,'de','jedenfalls'),(864,'de','jederlei'),(865,'de','jedoch'),(866,'de','jemand'),(867,'de','jenseits'),(868,'de','j√§hrig'),(869,'de','j√§hrige'),(870,'de','j√§hrigen'),(871,'de','j√§hriges'),(872,'de','kam'),(873,'de','kannst'),(874,'de','kaum'),(875,'de','kei nes'),(876,'de','keinerlei'),(877,'de','keineswegs'),(878,'de','klar'),(879,'de','klare'),(880,'de','klaren'),(881,'de','klares'),(882,'de','klein'),(883,'de','kleinen'),(884,'de','kleiner'),(885,'de','kleines'),(886,'de','koennen'),(887,'de','koennt'),(888,'de','koennte'),(889,'de','koennten'),(890,'de','komme'),(891,'de','kommen'),(892,'de','kommt'),(893,'de','konkret'),(894,'de','konkrete'),(895,'de','konkreten'),(896,'de','konkreter'),(897,'de','konkretes'),(898,'de','konnten'),(899,'de','k√∂nn'),(900,'de','k√∂nnt'),(901,'de','k√∂nnten'),(902,'de','k√ºnftig'),(903,'de','lag'),(904,'de','lagen'),(905,'de','langsam'),(906,'de','lassen'),(907,'de','laut'),(908,'de','lediglich'),(909,'de','leer'),(910,'de','legen'),(911,'de','legte'),(912,'de','legten'),(913,'de','leicht'),(914,'de','leider'),(915,'de','lesen'),(916,'de','letze'),(917,'de','letzten'),(918,'de','letztendlich'),(919,'de','letztens'),(920,'de','letztes'),(921,'de','letztlich'),(922,'de','lichten'),(923,'de','liegt'),(924,'de','liest'),(925,'de','links'),(926,'de','l√§ngst'),(927,'de','l√§ngstens'),(928,'de','mag'),(929,'de','magst'),(930,'de','mal'),(931,'de','mancherorts'),(932,'de','manchmal'),(933,'de','mann'),(934,'de','margin'),(935,'de','med'),(936,'de','mehr'),(937,'de','mehrere'),(938,'de','meist'),(939,'de','meiste'),(940,'de','meisten'),(941,'de','meta'),(942,'de','mindestens'),(943,'de','mithin'),(944,'de','mochte'),(945,'de','morgen'),(946,'de','morgige'),(947,'de','muessen'),(948,'de','muesst'),(949,'de','musst'),(950,'de','mussten'),(951,'de','mu√ü'),(952,'de','mu√üt'),(953,'de','m√∂chte'),(954,'de','m√∂chten'),(955,'de','m√∂chtest'),(956,'de','m√∂gen'),(957,'de','m√∂glich'),(958,'de','m√∂gliche'),(959,'de','m√∂glichen'),(960,'de','m√∂glicher'),(961,'de','m√∂glicherweise'),(962,'de','m√ºssen'),(963,'de','m√ºsste'),(964,'de','m√ºssten'),(965,'de','m√º√üte'),(966,'de','nachdem'),(967,'de','nacher'),(968,'de','nachhinein'),(969,'de','nahm'),(970,'de','nat√ºrlich'),(971,'de','ncht'),(972,'de','neben'),(973,'de','nebenan'),(974,'de','nehmen'),(975,'de','nein'),(976,'de','neu'),(977,'de','neue'),(978,'de','neuem'),(979,'de','neuen'),(980,'de','neuer'),(981,'de','neues'),(982,'de','neun'),(983,'de','nie'),(984,'de','niemals'),(985,'de','niemand'),(986,'de','nimm'),(987,'de','nimmer'),(988,'de','nimmt'),(989,'de','nirgends'),(990,'de','nirgendwo'),(991,'de','nter'),(992,'de','nutzen'),(993,'de','nutzt'),(994,'de','nutzung'),(995,'de','n√§chste'),(996,'de','n√§mlich'),(997,'de','n√∂tigenfalls'),(998,'de','n√ºtzt'),(999,'de','oben'),(1000,'de','oberhalb'),(1001,'de','obgleich'),(1002,'de','obschon'),(1003,'de','obwohl'),(1004,'de','oft'),(1005,'de','online'),(1006,'de','org'),(1007,'de','padding'),(1008,'de','per'),(1009,'de','pfui'),(1010,'de','pl√∂tzlich'),(1011,'de','pro'),(1012,'de','reagiere'),(1013,'de','reagieren'),(1014,'de','reagiert'),(1015,'de','reagierte'),(1016,'de','rechts'),(1017,'de','regelm√§√üig'),(1018,'de','rief'),(1019,'de','rund'),(1020,'de','sang'),(1021,'de','sangen'),(1022,'de','schlechter'),(1023,'de','schlie√ülich'),(1024,'de','schnell'),(1025,'de','schon'),(1026,'de','schreibe'),(1027,'de','schreiben'),(1028,'de','schreibens'),(1029,'de','schreiber'),(1030,'de','schwierig'),(1031,'de','sch√§tzen'),(1032,'de','sch√§tzt'),(1033,'de','sch√§tzte'),(1034,'de','sch√§tzten'),(1035,'de','sechs'),(1036,'de','sect'),(1037,'de','sehrwohl'),(1038,'de','sei'),(1039,'de','seit'),(1040,'de','seitdem'),(1041,'de','seite'),(1042,'de','seiten'),(1043,'de','seither'),(1044,'de','selber'),(1045,'de','senke'),(1046,'de','senken'),(1047,'de','senkt'),(1048,'de','senkte'),(1049,'de','senkten'),(1050,'de','setzen'),(1051,'de','setzt'),(1052,'de','setzte'),(1053,'de','setzten'),(1054,'de','sicherlich'),(1055,'de','sieben'),(1056,'de','siebte'),(1057,'de','siehe'),(1058,'de','sieht'),(1059,'de','singen'),(1060,'de','singt'),(1061,'de','sobald'),(1062,'de','soda√ü'),(1063,'de','soeben'),(1064,'de','sofern'),(1065,'de','sofort'),(1066,'de','sog'),(1067,'de','sogar'),(1068,'de','solange'),(1069,'de','solc hen'),(1070,'de','solch'),(1071,'de','sollen'),(1072,'de','sollst'),(1073,'de','sollt'),(1074,'de','sollten'),(1075,'de','solltest'),(1076,'de','somit'),(1077,'de','sonstwo'),(1078,'de','sooft'),(1079,'de','soviel'),(1080,'de','soweit'),(1081,'de','sowie'),(1082,'de','sowohl'),(1083,'de','spielen'),(1084,'de','sp√§ter'),(1085,'de','startet'),(1086,'de','startete'),(1087,'de','starteten'),(1088,'de','statt'),(1089,'de','stattdessen'),(1090,'de','steht'),(1091,'de','steige'),(1092,'de','steigen'),(1093,'de','steigt'),(1094,'de','stets'),(1095,'de','stieg'),(1096,'de','stiegen'),(1097,'de','such'),(1098,'de','suchen'),(1099,'de','s√§mtliche'),(1100,'de','tages'),(1101,'de','tat'),(1102,'de','tats√§chlich'),(1103,'de','tats√§chlichen'),(1104,'de','tats√§chlicher'),(1105,'de','tats√§chliches'),(1106,'de','tausend'),(1107,'de','teile'),(1108,'de','teilen'),(1109,'de','teilte'),(1110,'de','teilten'),(1111,'de','titel'),(1112,'de','total'),(1113,'de','trage'),(1114,'de','tragen'),(1115,'de','trotzdem'),(1116,'de','trug'),(1117,'de','tr√§gt'),(1118,'de','tun'),(1119,'de','tust'),(1120,'de','tut'),(1121,'de','txt'),(1122,'de','t√§t'),(1123,'de','ueber'),(1124,'de','umso'),(1125,'de','unbedingt'),(1126,'de','ungef√§hr'),(1127,'de','unm√∂glich'),(1128,'de','unm√∂gliche'),(1129,'de','unm√∂glichen'),(1130,'de','unm√∂glicher'),(1131,'de','unn√∂tig'),(1132,'de','unsem'),(1133,'de','unser'),(1134,'de','unsere'),(1135,'de','unserem'),(1136,'de','unseren'),(1137,'de','unserer'),(1138,'de','unseres'),(1139,'de','unten'),(1140,'de','unterbrach'),(1141,'de','unterbrechen'),(1142,'de','unterhalb'),(1143,'de','unwichtig'),(1144,'de','usw'),(1145,'de','var'),(1146,'de','vergangen'),(1147,'de','vergangene'),(1148,'de','vergangener'),(1149,'de','vergangenes'),(1150,'de','vermag'),(1151,'de','vermutlich'),(1152,'de','verm√∂gen'),(1153,'de','verrate'),(1154,'de','verraten'),(1155,'de','verriet'),(1156,'de','verrieten'),(1157,'de','version'),(1158,'de','versorge'),(1159,'de','versorgen'),(1160,'de','versorgt'),(1161,'de','versorgte'),(1162,'de','versorgten'),(1163,'de','versorgtes'),(1164,'de','ver√∂ffentlichen'),(1165,'de','ver√∂ffentlicher'),(1166,'de','ver√∂ffentlicht'),(1167,'de','ver√∂ffentlichte'),(1168,'de','ver√∂ffentlichten'),(1169,'de','ver√∂ffentlichtes'),(1170,'de','viele'),(1171,'de','vielen'),(1172,'de','vieler'),(1173,'de','vieles'),(1174,'de','vielleicht'),(1175,'de','vielmals'),(1176,'de','vier'),(1177,'de','vollst√§ndig'),(1178,'de','voran'),(1179,'de','vorbei'),(1180,'de','vorgestern'),(1181,'de','vorher'),(1182,'de','vorne'),(1183,'de','vor√ºber'),(1184,'de','v√∂llig'),(1185,'de','w√§hrend'),(1186,'de','wachen'),(1187,'de','waere'),(1188,'de','warum'),(1189,'de','weder'),(1190,'de','wegen'),(1191,'de','weitere'),(1192,'de','weiterem'),(1193,'de','weiteren'),(1194,'de','weiterer'),(1195,'de','weiteres'),(1196,'de','weiterhin'),(1197,'de','wei√ü'),(1198,'de','wem'),(1199,'de','wen'),(1200,'de','wenig'),(1201,'de','wenige'),(1202,'de','weniger'),(1203,'de','wenigstens'),(1204,'de','wenngleich'),(1205,'de','wer'),(1206,'de','werdet'),(1207,'de','weshalb'),(1208,'de','wessen'),(1209,'de','wichtig'),(1210,'de','wieso'),(1211,'de','wieviel'),(1212,'de','wiewohl'),(1213,'de','willst'),(1214,'de','wirklich'),(1215,'de','wodurch'),(1216,'de','wogegen'),(1217,'de','woher'),(1218,'de','wohin'),(1219,'de','wohingegen'),(1220,'de','wohl'),(1221,'de','wohlweislich'),(1222,'de','womit'),(1223,'de','woraufhin'),(1224,'de','woraus'),(1225,'de','worin'),(1226,'de','wurde'),(1227,'de','wurden'),(1228,'de','w√§hrenddessen'),(1229,'de','w√§r'),(1230,'de','w√§re'),(1231,'de','w√§ren'),(1232,'de','zahlreich'),(1233,'de','zehn'),(1234,'de','zeitweise'),(1235,'de','ziehen'),(1236,'de','zieht'),(1237,'de','zog'),(1238,'de','zogen'),(1239,'de','zudem'),(1240,'de','zuerst'),(1241,'de','zufolge'),(1242,'de','zugleich'),(1243,'de','zuletzt'),(1244,'de','zumal'),(1245,'de','zur√ºck'),(1246,'de','zusammen'),(1247,'de','zuviel'),(1248,'de','zwanzig'),(1249,'de','zwei'),(1250,'de','zw√∂lf'),(1251,'de','√§hnlich'),(1252,'de','√ºbel'),(1253,'de','√ºberall'),(1254,'de','√ºberallhin'),(1255,'de','√ºberdies'),(1256,'de','√ºbermorgen'),(1257,'de','√ºbrig'),(1258,'de','√ºbrigens'),(1259,'en','a'),(1260,'en','a'),(1261,'en','able'),(1262,'en','about'),(1263,'en','about'),(1264,'en','above'),(1265,'en','above'),(1266,'en','abroad'),(1267,'en','according'),(1268,'en','accordingly'),(1269,'en','across'),(1270,'en','across'),(1271,'en','actually'),(1272,'en','adj'),(1273,'en','after'),(1274,'en','after'),(1275,'en','afterwards'),(1276,'en','afterwards'),(1277,'en','again'),(1278,'en','again'),(1279,'en','against'),(1280,'en','against'),(1281,'en','ago'),(1282,'en','ahead'),(1283,'en','all'),(1284,'en','all'),(1285,'en','allow'),(1286,'en','allows'),(1287,'en','almost'),(1288,'en','almost'),(1289,'en','alone'),(1290,'en','alone'),(1291,'en','along'),(1292,'en','along'),(1293,'en','alongside'),(1294,'en','already'),(1295,'en','already'),(1296,'en','also'),(1297,'en','also'),(1298,'en','although'),(1299,'en','although'),(1300,'en','always'),(1301,'en','always'),(1302,'en','am'),(1303,'en','am'),(1304,'en','amid'),(1305,'en','amidst'),(1306,'en','among'),(1307,'en','among'),(1308,'en','amongst'),(1309,'en','amongst'),(1310,'en','amoungst'),(1311,'en','amount'),(1312,'en','an'),(1313,'en','an'),(1314,'en','and'),(1315,'en','and'),(1316,'en','another'),(1317,'en','another'),(1318,'en','any'),(1319,'en','any'),(1320,'en','anybody'),(1321,'en','anyhow'),(1322,'en','anyhow'),(1323,'en','anyone'),(1324,'en','anyone'),(1325,'en','anything'),(1326,'en','anything'),(1327,'en','anyway'),(1328,'en','anyway'),(1329,'en','anyways'),(1330,'en','anywhere'),(1331,'en','anywhere'),(1332,'en','apart'),(1333,'en','appear'),(1334,'en','appreciate'),(1335,'en','appropriate'),(1336,'en','are'),(1337,'en','are'),(1338,'en','around'),(1339,'en','around'),(1340,'en','as'),(1341,'en','as'),(1342,'en','aside'),(1343,'en','ask'),(1344,'en','asking'),(1345,'en','associated'),(1346,'en','at'),(1347,'en','at'),(1348,'en','available'),(1349,'en','away'),(1350,'en','awfully'),(1351,'en','b'),(1352,'en','back'),(1353,'en','back'),(1354,'en','backward'),(1355,'en','backwards'),(1356,'en','be'),(1357,'en','be'),(1358,'en','became'),(1359,'en','became'),(1360,'en','because'),(1361,'en','because'),(1362,'en','become'),(1363,'en','become'),(1364,'en','becomes'),(1365,'en','becomes'),(1366,'en','becoming'),(1367,'en','becoming'),(1368,'en','been'),(1369,'en','been'),(1370,'en','before'),(1371,'en','before'),(1372,'en','beforehand'),(1373,'en','beforehand'),(1374,'en','begin'),(1375,'en','behind'),(1376,'en','behind'),(1377,'en','being'),(1378,'en','being'),(1379,'en','believe'),(1380,'en','below'),(1381,'en','below'),(1382,'en','beside'),(1383,'en','beside'),(1384,'en','besides'),(1385,'en','besides'),(1386,'en','best'),(1387,'en','better'),(1388,'en','between'),(1389,'en','between'),(1390,'en','beyond'),(1391,'en','beyond'),(1392,'en','bill'),(1393,'en','both'),(1394,'en','both'),(1395,'en','bottom'),(1396,'en','brief'),(1397,'en','but'),(1398,'en','but'),(1399,'en','by'),(1400,'en','by'),(1401,'en','c'),(1402,'en','call'),(1403,'en','came'),(1404,'en','can'),(1405,'en','can'),(1406,'en','cannot'),(1407,'en','cannot'),(1408,'en','cant'),(1409,'en','cant'),(1410,'en','caption'),(1411,'en','cause'),(1412,'en','causes'),(1413,'en','certain'),(1414,'en','certainly'),(1415,'en','changes'),(1416,'en','clearly'),(1417,'en','co'),(1418,'en','co'),(1419,'en','co.'),(1420,'en','com'),(1421,'en','come'),(1422,'en','comes'),(1423,'en','computer'),(1424,'en','con'),(1425,'en','concerning'),(1426,'en','consequently'),(1427,'en','consider'),(1428,'en','considering'),(1429,'en','contain'),(1430,'en','containing'),(1431,'en','contains'),(1432,'en','corresponding'),(1433,'en','could'),(1434,'en','could'),(1435,'en','couldnt'),(1436,'en','course'),(1437,'en','cry'),(1438,'en','currently'),(1439,'en','d'),(1440,'en','dare'),(1441,'en','de'),(1442,'en','definitely'),(1443,'en','describe'),(1444,'en','described'),(1445,'en','despite'),(1446,'en','detail'),(1447,'en','did'),(1448,'en','different'),(1449,'en','directly'),(1450,'en','do'),(1451,'en','do'),(1452,'en','does'),(1453,'en','doing'),(1454,'en','done'),(1455,'en','done'),(1456,'en','down'),(1457,'en','down'),(1458,'en','downwards'),(1459,'en','due'),(1460,'en','during'),(1461,'en','during'),(1462,'en','e'),(1463,'en','each'),(1464,'en','each'),(1465,'en','edu'),(1466,'en','eg'),(1467,'en','eg'),(1468,'en','eight'),(1469,'en','eight'),(1470,'en','eighty'),(1471,'en','either'),(1472,'en','either'),(1473,'en','eleven'),(1474,'en','else'),(1475,'en','else'),(1476,'en','elsewhere'),(1477,'en','elsewhere'),(1478,'en','empty'),(1479,'en','end'),(1480,'en','ending'),(1481,'en','enough'),(1482,'en','enough'),(1483,'en','entirely'),(1484,'en','especially'),(1485,'en','et'),(1486,'en','etc'),(1487,'en','etc'),(1488,'en','even'),(1489,'en','even'),(1490,'en','ever'),(1491,'en','ever'),(1492,'en','evermore'),(1493,'en','every'),(1494,'en','every'),(1495,'en','everybody'),(1496,'en','everyone'),(1497,'en','everyone'),(1498,'en','everything'),(1499,'en','everything'),(1500,'en','everywhere'),(1501,'en','everywhere'),(1502,'en','ex'),(1503,'en','exactly'),(1504,'en','example'),(1505,'en','except'),(1506,'en','except'),(1507,'en','f'),(1508,'en','fairly'),(1509,'en','far'),(1510,'en','farther'),(1511,'en','few'),(1512,'en','few'),(1513,'en','fewer'),(1514,'en','fifteen'),(1515,'en','fifth'),(1516,'en','fify'),(1517,'en','fill'),(1518,'en','find'),(1519,'en','fire'),(1520,'en','first'),(1521,'en','first'),(1522,'en','five'),(1523,'en','five'),(1524,'en','followed'),(1525,'en','following'),(1526,'en','follows'),(1527,'en','for'),(1528,'en','for'),(1529,'en','forever'),(1530,'en','former'),(1531,'en','former'),(1532,'en','formerly'),(1533,'en','formerly'),(1534,'en','forth'),(1535,'en','forty'),(1536,'en','forward'),(1537,'en','found'),(1538,'en','found'),(1539,'en','four'),(1540,'en','four'),(1541,'en','from'),(1542,'en','from'),(1543,'en','front'),(1544,'en','full'),(1545,'en','further'),(1546,'en','further'),(1547,'en','furthermore'),(1548,'en','g'),(1549,'en','get'),(1550,'en','get'),(1551,'en','gets'),(1552,'en','getting'),(1553,'en','give'),(1554,'en','given'),(1555,'en','gives'),(1556,'en','go'),(1557,'en','go'),(1558,'en','goes'),(1559,'en','going'),(1560,'en','gone'),(1561,'en','got'),(1562,'en','gotten'),(1563,'en','greetings'),(1564,'en','h'),(1565,'en','had'),(1566,'en','had'),(1567,'en','half'),(1568,'en','happens'),(1569,'en','hardly'),(1570,'en','has'),(1571,'en','has'),(1572,'en','hasnt'),(1573,'en','have'),(1574,'en','have'),(1575,'en','having'),(1576,'en','he'),(1577,'en','he'),(1578,'en','hello'),(1579,'en','help'),(1580,'en','hence'),(1581,'en','hence'),(1582,'en','her'),(1583,'en','her'),(1584,'en','here'),(1585,'en','here'),(1586,'en','hereafter'),(1587,'en','hereafter'),(1588,'en','hereby'),(1589,'en','hereby'),(1590,'en','herein'),(1591,'en','herein'),(1592,'en','hereupon'),(1593,'en','hereupon'),(1594,'en','hers'),(1595,'en','hers'),(1596,'en','herself'),(1597,'en','herself'),(1598,'en','hi'),(1599,'en','him'),(1600,'en','him'),(1601,'en','himself'),(1602,'en','himself'),(1603,'en','his'),(1604,'en','his'),(1605,'en','hither'),(1606,'en','hopefully'),(1607,'en','how'),(1608,'en','how'),(1609,'en','howbeit'),(1610,'en','however'),(1611,'en','however'),(1612,'en','hundred'),(1613,'en','hundred'),(1614,'en','i'),(1615,'en','i'),(1616,'en','ie'),(1617,'en','ie'),(1618,'en','if'),(1619,'en','if'),(1620,'en','ignored'),(1621,'en','immediate'),(1622,'en','in'),(1623,'en','in'),(1624,'en','inasmuch'),(1625,'en','inc'),(1626,'en','inc'),(1627,'en','inc.'),(1628,'en','indeed'),(1629,'en','indeed'),(1630,'en','indicate'),(1631,'en','indicated'),(1632,'en','indicates'),(1633,'en','inner'),(1634,'en','inside'),(1635,'en','insofar'),(1636,'en','instead'),(1637,'en','interest'),(1638,'en','into'),(1639,'en','into'),(1640,'en','inward'),(1641,'en','is'),(1642,'en','is'),(1643,'en','it'),(1644,'en','it'),(1645,'en','its'),(1646,'en','its'),(1647,'en','itself'),(1648,'en','itself'),(1649,'en','j'),(1650,'en','just'),(1651,'en','k'),(1652,'en','keep'),(1653,'en','keep'),(1654,'en','keeps'),(1655,'en','kept'),(1656,'en','know'),(1657,'en','known'),(1658,'en','knows'),(1659,'en','l'),(1660,'en','last'),(1661,'en','last'),(1662,'en','lately'),(1663,'en','later'),(1664,'en','latter'),(1665,'en','latter'),(1666,'en','latterly'),(1667,'en','latterly'),(1668,'en','least'),(1669,'en','least'),(1670,'en','less'),(1671,'en','less'),(1672,'en','lest'),(1673,'en','let'),(1674,'en','like'),(1675,'en','liked'),(1676,'en','likely'),(1677,'en','likewise'),(1678,'en','little'),(1679,'en','look'),(1680,'en','looking'),(1681,'en','looks'),(1682,'en','low'),(1683,'en','lower'),(1684,'en','ltd'),(1685,'en','ltd'),(1686,'en','m'),(1687,'en','made'),(1688,'en','made'),(1689,'en','mainly'),(1690,'en','make'),(1691,'en','makes'),(1692,'en','many'),(1693,'en','many'),(1694,'en','may'),(1695,'en','may'),(1696,'en','maybe'),(1697,'en','me'),(1698,'en','me'),(1699,'en','mean'),(1700,'en','meantime'),(1701,'en','meanwhile'),(1702,'en','meanwhile'),(1703,'en','merely'),(1704,'en','might'),(1705,'en','might'),(1706,'en','mill'),(1707,'en','mine'),(1708,'en','mine'),(1709,'en','minus'),(1710,'en','miss'),(1711,'en','more'),(1712,'en','more'),(1713,'en','moreover'),(1714,'en','moreover'),(1715,'en','most'),(1716,'en','most'),(1717,'en','mostly'),(1718,'en','mostly'),(1719,'en','move'),(1720,'en','mr'),(1721,'en','mrs'),(1722,'en','much'),(1723,'en','much'),(1724,'en','must'),(1725,'en','must'),(1726,'en','my'),(1727,'en','my'),(1728,'en','myself'),(1729,'en','myself'),(1730,'en','n'),(1731,'en','name'),(1732,'en','name'),(1733,'en','namely'),(1734,'en','namely'),(1735,'en','nd'),(1736,'en','near'),(1737,'en','nearly'),(1738,'en','necessary'),(1739,'en','need'),(1740,'en','needs'),(1741,'en','neither'),(1742,'en','neither'),(1743,'en','never'),(1744,'en','never'),(1745,'en','neverf'),(1746,'en','neverless'),(1747,'en','nevertheless'),(1748,'en','nevertheless'),(1749,'en','new'),(1750,'en','next'),(1751,'en','next'),(1752,'en','nine'),(1753,'en','nine'),(1754,'en','ninety'),(1755,'en','no'),(1756,'en','no'),(1757,'en','nobody'),(1758,'en','nobody'),(1759,'en','non'),(1760,'en','none'),(1761,'en','none'),(1762,'en','nonetheless'),(1763,'en','noone'),(1764,'en','noone'),(1765,'en','no-one'),(1766,'en','nor'),(1767,'en','nor'),(1768,'en','normally'),(1769,'en','not'),(1770,'en','not'),(1771,'en','nothing'),(1772,'en','nothing'),(1773,'en','notwithstanding'),(1774,'en','novel'),(1775,'en','now'),(1776,'en','now'),(1777,'en','nowhere'),(1778,'en','nowhere'),(1779,'en','o'),(1780,'en','obviously'),(1781,'en','of'),(1782,'en','of'),(1783,'en','off'),(1784,'en','off'),(1785,'en','often'),(1786,'en','often'),(1787,'en','oh'),(1788,'en','ok'),(1789,'en','okay'),(1790,'en','old'),(1791,'en','on'),(1792,'en','on'),(1793,'en','once'),(1794,'en','once'),(1795,'en','one'),(1796,'en','one'),(1797,'en','ones'),(1798,'en','only'),(1799,'en','only'),(1800,'en','onto'),(1801,'en','onto'),(1802,'en','opposite'),(1803,'en','or'),(1804,'en','or'),(1805,'en','other'),(1806,'en','other'),(1807,'en','others'),(1808,'en','others'),(1809,'en','otherwise'),(1810,'en','otherwise'),(1811,'en','ought'),(1812,'en','our'),(1813,'en','our'),(1814,'en','ours'),(1815,'en','ours'),(1816,'en','ourselves'),(1817,'en','ourselves'),(1818,'en','out'),(1819,'en','out'),(1820,'en','outside'),(1821,'en','over'),(1822,'en','over'),(1823,'en','overall'),(1824,'en','own'),(1825,'en','own'),(1826,'en','p'),(1827,'en','part'),(1828,'en','particular'),(1829,'en','particularly'),(1830,'en','past'),(1831,'en','per'),(1832,'en','per'),(1833,'en','perhaps'),(1834,'en','perhaps'),(1835,'en','placed'),(1836,'en','please'),(1837,'en','please'),(1838,'en','plus'),(1839,'en','possible'),(1840,'en','presumably'),(1841,'en','probably'),(1842,'en','provided'),(1843,'en','provides'),(1844,'en','put'),(1845,'en','q'),(1846,'en','que'),(1847,'en','quite'),(1848,'en','qv'),(1849,'en','r'),(1850,'en','rather'),(1851,'en','rather'),(1852,'en','rd'),(1853,'en','re'),(1854,'en','re'),(1855,'en','really'),(1856,'en','reasonably'),(1857,'en','recent'),(1858,'en','recently'),(1859,'en','regarding'),(1860,'en','regardless'),(1861,'en','regards'),(1862,'en','relatively'),(1863,'en','respectively'),(1864,'en','right'),(1865,'en','round'),(1866,'en','s'),(1867,'en','said'),(1868,'en','same'),(1869,'en','same'),(1870,'en','saw'),(1871,'en','say'),(1872,'en','saying'),(1873,'en','says'),(1874,'en','second'),(1875,'en','secondly'),(1876,'en','see'),(1877,'en','see'),(1878,'en','seeing'),(1879,'en','seem'),(1880,'en','seem'),(1881,'en','seemed'),(1882,'en','seemed'),(1883,'en','seeming'),(1884,'en','seeming'),(1885,'en','seems'),(1886,'en','seems'),(1887,'en','seen'),(1888,'en','self'),(1889,'en','selves'),(1890,'en','sensible'),(1891,'en','sent'),(1892,'en','serious'),(1893,'en','serious'),(1894,'en','seriously'),(1895,'en','seven'),(1896,'en','several'),(1897,'en','several'),(1898,'en','shall'),(1899,'en','she'),(1900,'en','she'),(1901,'en','should'),(1902,'en','should'),(1903,'en','show'),(1904,'en','side'),(1905,'en','since'),(1906,'en','since'),(1907,'en','sincere'),(1908,'en','six'),(1909,'en','six'),(1910,'en','sixty'),(1911,'en','so'),(1912,'en','so'),(1913,'en','some'),(1914,'en','some'),(1915,'en','somebody'),(1916,'en','someday'),(1917,'en','somehow'),(1918,'en','somehow'),(1919,'en','someone'),(1920,'en','someone'),(1921,'en','something'),(1922,'en','something'),(1923,'en','sometime'),(1924,'en','sometime'),(1925,'en','sometimes'),(1926,'en','sometimes'),(1927,'en','somewhat'),(1928,'en','somewhere'),(1929,'en','somewhere'),(1930,'en','soon'),(1931,'en','sorry'),(1932,'en','specified'),(1933,'en','specify'),(1934,'en','specifying'),(1935,'en','still'),(1936,'en','still'),(1937,'en','sub'),(1938,'en','such'),(1939,'en','such'),(1940,'en','sup'),(1941,'en','sure'),(1942,'en','system'),(1943,'en','t'),(1944,'en','take'),(1945,'en','take'),(1946,'en','taken'),(1947,'en','taking'),(1948,'en','tell'),(1949,'en','ten'),(1950,'en','tends'),(1951,'en','th'),(1952,'en','than'),(1953,'en','than'),(1954,'en','thank'),(1955,'en','thanks'),(1956,'en','thanx'),(1957,'en','that'),(1958,'en','that'),(1959,'en','thats'),(1960,'en','the'),(1961,'en','the'),(1962,'en','their'),(1963,'en','their'),(1964,'en','theirs'),(1965,'en','them'),(1966,'en','them'),(1967,'en','themselves'),(1968,'en','themselves'),(1969,'en','then'),(1970,'en','then'),(1971,'en','thence'),(1972,'en','thence'),(1973,'en','there'),(1974,'en','there'),(1975,'en','thereafter'),(1976,'en','thereafter'),(1977,'en','thereby'),(1978,'en','thereby'),(1979,'en','therefore'),(1980,'en','therefore'),(1981,'en','therein'),(1982,'en','therein'),(1983,'en','theres'),(1984,'en','thereupon'),(1985,'en','thereupon'),(1986,'en','these'),(1987,'en','these'),(1988,'en','they'),(1989,'en','they'),(1990,'en','thick'),(1991,'en','thin'),(1992,'en','thing'),(1993,'en','things'),(1994,'en','think'),(1995,'en','third'),(1996,'en','third'),(1997,'en','thirty'),(1998,'en','this'),(1999,'en','this'),(2000,'en','thorough'),(2001,'en','thoroughly'),(2002,'en','those'),(2003,'en','those'),(2004,'en','though'),(2005,'en','though'),(2006,'en','three'),(2007,'en','three'),(2008,'en','through'),(2009,'en','through'),(2010,'en','throughout'),(2011,'en','throughout'),(2012,'en','thru'),(2013,'en','thru'),(2014,'en','thus'),(2015,'en','thus'),(2016,'en','till'),(2017,'en','to'),(2018,'en','to'),(2019,'en','together'),(2020,'en','together'),(2021,'en','too'),(2022,'en','too'),(2023,'en','took'),(2024,'en','top'),(2025,'en','toward'),(2026,'en','toward'),(2027,'en','towards'),(2028,'en','towards'),(2029,'en','tried'),(2030,'en','tries'),(2031,'en','truly'),(2032,'en','try'),(2033,'en','trying'),(2034,'en','twelve'),(2035,'en','twenty'),(2036,'en','twice'),(2037,'en','two'),(2038,'en','two'),(2039,'en','u'),(2040,'en','un'),(2041,'en','un'),(2042,'en','under'),(2043,'en','under'),(2044,'en','underneath'),(2045,'en','undoing'),(2046,'en','unfortunately'),(2047,'en','unless'),(2048,'en','unlike'),(2049,'en','unlikely'),(2050,'en','until'),(2051,'en','until'),(2052,'en','unto'),(2053,'en','up'),(2054,'en','up'),(2055,'en','upon'),(2056,'en','upon'),(2057,'en','upwards'),(2058,'en','us'),(2059,'en','us'),(2060,'en','use'),(2061,'en','used'),(2062,'en','useful'),(2063,'en','uses'),(2064,'en','using'),(2065,'en','usually'),(2066,'en','v'),(2067,'en','value'),(2068,'en','various'),(2069,'en','versus'),(2070,'en','very'),(2071,'en','very'),(2072,'en','via'),(2073,'en','via'),(2074,'en','viz'),(2075,'en','vs'),(2076,'en','w'),(2077,'en','want'),(2078,'en','wants'),(2079,'en','was'),(2080,'en','was'),(2081,'en','way'),(2082,'en','we'),(2083,'en','we'),(2084,'en','welcome'),(2085,'en','well'),(2086,'en','well'),(2087,'en','went'),(2088,'en','were'),(2089,'en','were'),(2090,'en','what'),(2091,'en','what'),(2092,'en','whatever'),(2093,'en','whatever'),(2094,'en','when'),(2095,'en','when'),(2096,'en','whence'),(2097,'en','whence'),(2098,'en','whenever'),(2099,'en','whenever'),(2100,'en','where'),(2101,'en','where'),(2102,'en','whereafter'),(2103,'en','whereafter'),(2104,'en','whereas'),(2105,'en','whereas'),(2106,'en','whereby'),(2107,'en','whereby'),(2108,'en','wherein'),(2109,'en','wherein'),(2110,'en','whereupon'),(2111,'en','whereupon'),(2112,'en','wherever'),(2113,'en','wherever'),(2114,'en','whether'),(2115,'en','whether'),(2116,'en','which'),(2117,'en','which'),(2118,'en','whichever'),(2119,'en','while'),(2120,'en','while'),(2121,'en','whilst'),(2122,'en','whither'),(2123,'en','whither'),(2124,'en','who'),(2125,'en','who'),(2126,'en','whoever'),(2127,'en','whoever'),(2128,'en','whole'),(2129,'en','whole'),(2130,'en','whom'),(2131,'en','whom'),(2132,'en','whomever'),(2133,'en','whose'),(2134,'en','whose'),(2135,'en','why'),(2136,'en','why'),(2137,'en','will'),(2138,'en','will'),(2139,'en','willing'),(2140,'en','wish'),(2141,'en','with'),(2142,'en','with'),(2143,'en','within'),(2144,'en','within'),(2145,'en','without'),(2146,'en','without'),(2147,'en','wonder'),(2148,'en','would'),(2149,'en','would'),(2150,'en','x'),(2151,'en','y'),(2152,'en','yes'),(2153,'en','yet'),(2154,'en','yet'),(2155,'en','you'),(2156,'en','you'),(2157,'en','your'),(2158,'en','your'),(2159,'en','yours'),(2160,'en','yours'),(2161,'en','yourself'),(2162,'en','yourself'),(2163,'en','yourselves'),(2164,'en','yourselves'),(2165,'en','z'),(2166,'en','zero'),(2167,'es','un'),(2168,'es','una'),(2169,'es','unas'),(2170,'es','unos'),(2171,'es','uno'),(2172,'es','sobre'),(2173,'es','todo'),(2174,'es','tambi√©n'),(2175,'es','tras'),(2176,'es','otro'),(2177,'es','alg√∫n'),(2178,'es','alguno'),(2179,'es','alguna'),(2180,'es','algunos'),(2181,'es','algunas'),(2182,'es','ser'),(2183,'es','es'),(2184,'es','soy'),(2185,'es','eres'),(2186,'es','somos'),(2187,'es','sois'),(2188,'es','estoy'),(2189,'es','esta'),(2190,'es','estamos'),(2191,'es','estais'),(2192,'es','estan'),(2193,'es','como'),(2194,'es','en'),(2195,'es','para'),(2196,'es','atras'),(2197,'es','porque'),(2198,'es','por qu√©'),(2199,'es','estado'),(2200,'es','estaba'),(2201,'es','ante'),(2202,'es','antes'),(2203,'es','siendo'),(2204,'es','ambos'),(2205,'es','pero'),(2206,'es','por'),(2207,'es','poder'),(2208,'es','puede'),(2209,'es','puedo'),(2210,'es','podemos'),(2211,'es','podeis'),(2212,'es','pueden'),(2213,'es','fui'),(2214,'es','fue'),(2215,'es','fuimos'),(2216,'es','fueron'),(2217,'es','hacer'),(2218,'es','hago'),(2219,'es','hace'),(2220,'es','hacemos'),(2221,'es','haceis'),(2222,'es','hacen'),(2223,'es','cada'),(2224,'es','fin'),(2225,'es','incluso'),(2226,'es','primero'),(2227,'es','desde'),(2228,'es','conseguir'),(2229,'es','consigo'),(2230,'es','consigue'),(2231,'es','consigues'),(2232,'es','conseguimos'),(2233,'es','consiguen'),(2234,'es','ir'),(2235,'es','voy'),(2236,'es','va'),(2237,'es','vamos'),(2238,'es','vais'),(2239,'es','van'),(2240,'es','vaya'),(2241,'es','gueno'),(2242,'es','ha'),(2243,'es','tener'),(2244,'es','tengo'),(2245,'es','tiene'),(2246,'es','tenemos'),(2247,'es','teneis'),(2248,'es','tienen'),(2249,'es','el'),(2250,'es','la'),(2251,'es','lo'),(2252,'es','las'),(2253,'es','los'),(2254,'es','su'),(2255,'es','aqui'),(2256,'es','mio'),(2257,'es','tuyo'),(2258,'es','ellos'),(2259,'es','ellas'),(2260,'es','nos'),(2261,'es','nosotros'),(2262,'es','vosotros'),(2263,'es','vosotras'),(2264,'es','si'),(2265,'es','dentro'),(2266,'es','solo'),(2267,'es','solamente'),(2268,'es','saber'),(2269,'es','sabes'),(2270,'es','sabe'),(2271,'es','sabemos'),(2272,'es','sabeis'),(2273,'es','saben'),(2274,'es','ultimo'),(2275,'es','largo'),(2276,'es','bastante'),(2277,'es','haces'),(2278,'es','muchos'),(2279,'es','aquellos'),(2280,'es','aquellas'),(2281,'es','sus'),(2282,'es','entonces'),(2283,'es','tiempo'),(2284,'es','verdad'),(2285,'es','verdadero'),(2286,'es','verdadera'),(2287,'es','cierto'),(2288,'es','ciertos'),(2289,'es','cierta'),(2290,'es','ciertas'),(2291,'es','intentar'),(2292,'es','intento'),(2293,'es','intenta'),(2294,'es','intentas'),(2295,'es','intentamos'),(2296,'es','intentais'),(2297,'es','intentan'),(2298,'es','dos'),(2299,'es','bajo'),(2300,'es','arriba'),(2301,'es','encima'),(2302,'es','usar'),(2303,'es','uso'),(2304,'es','usas'),(2305,'es','usa'),(2306,'es','usamos'),(2307,'es','usais'),(2308,'es','usan'),(2309,'es','emplear'),(2310,'es','empleo'),(2311,'es','empleas'),(2312,'es','emplean'),(2313,'es','ampleamos'),(2314,'es','empleais'),(2315,'es','valor'),(2316,'es','muy'),(2317,'es','era'),(2318,'es','eras'),(2319,'es','eramos'),(2320,'es','eran'),(2321,'es','modo'),(2322,'es','bien'),(2323,'es','cual'),(2324,'es','cuando'),(2325,'es','donde'),(2326,'es','mientras'),(2327,'es','quien'),(2328,'es','con'),(2329,'es','entre'),(2330,'es','sin'),(2331,'es','trabajo'),(2332,'es','trabajar'),(2333,'es','trabajas'),(2334,'es','trabaja'),(2335,'es','trabajamos'),(2336,'es','trabajais'),(2337,'es','trabajan'),(2338,'es','podria'),(2339,'es','podrias'),(2340,'es','podriamos'),(2341,'es','podrian'),(2342,'es','podriais'),(2343,'es','yo'),(2344,'fr','alors'),(2345,'fr','au'),(2346,'fr','aucuns'),(2347,'fr','aussi'),(2348,'fr','autre'),(2349,'fr','avant'),(2350,'fr','avec'),(2351,'fr','avoir'),(2352,'fr','bon'),(2353,'fr','car'),(2354,'fr','ce'),(2355,'fr','cela'),(2356,'fr','ces'),(2357,'fr','ceux'),(2358,'fr','chaque'),(2359,'fr','ci'),(2360,'fr','comme'),(2361,'fr','comment'),(2362,'fr','dans'),(2363,'fr','des'),(2364,'fr','du'),(2365,'fr','dedans'),(2366,'fr','dehors'),(2367,'fr','depuis'),(2368,'fr','deux'),(2369,'fr','devrait'),(2370,'fr','doit'),(2371,'fr','donc'),(2372,'fr','dos'),(2373,'fr','droite'),(2374,'fr','d√©but'),(2375,'fr','elle'),(2376,'fr','elles'),(2377,'fr','en'),(2378,'fr','encore'),(2379,'fr','essai'),(2380,'fr','est'),(2381,'fr','et'),(2382,'fr','eu'),(2383,'fr','fait'),(2384,'fr','faites'),(2385,'fr','fois'),(2386,'fr','font'),(2387,'fr','force'),(2388,'fr','haut'),(2389,'fr','hors'),(2390,'fr','ici'),(2391,'fr','il'),(2392,'fr','ils'),(2393,'fr','je'),(2394,'fr','juste'),(2395,'fr','la'),(2396,'fr','le'),(2397,'fr','les'),(2398,'fr','leur'),(2399,'fr','l√†'),(2400,'fr','ma'),(2401,'fr','maintenant'),(2402,'fr','mais'),(2403,'fr','mes'),(2404,'fr','mine'),(2405,'fr','moins'),(2406,'fr','mon'),(2407,'fr','mot'),(2408,'fr','m√™me'),(2409,'fr','ni'),(2410,'fr','nomm√©s'),(2411,'fr','notre'),(2412,'fr','nous'),(2413,'fr','nouveaux'),(2414,'fr','ou'),(2415,'fr','o√π'),(2416,'fr','par'),(2417,'fr','parce'),(2418,'fr','parole'),(2419,'fr','pas'),(2420,'fr','personnes'),(2421,'fr','peut'),(2422,'fr','peu'),(2423,'fr','pi√®ce'),(2424,'fr','plupart'),(2425,'fr','pour'),(2426,'fr','pourquoi'),(2427,'fr','quand'),(2428,'fr','que'),(2429,'fr','quel'),(2430,'fr','quelle'),(2431,'fr','quelles'),(2432,'fr','quels'),(2433,'fr','qui'),(2434,'fr','sa'),(2435,'fr','sans'),(2436,'fr','ses'),(2437,'fr','seulement'),(2438,'fr','si'),(2439,'fr','sien'),(2440,'fr','son'),(2441,'fr','sont'),(2442,'fr','sous'),(2443,'fr','soyez'),(2444,'fr','sujet'),(2445,'fr','sur'),(2446,'fr','ta'),(2447,'fr','tandis'),(2448,'fr','tellement'),(2449,'fr','tels'),(2450,'fr','tes'),(2451,'fr','ton'),(2452,'fr','tous'),(2453,'fr','tout'),(2454,'fr','trop'),(2455,'fr','tr√®s'),(2456,'fr','tu'),(2457,'fr','valeur'),(2458,'fr','voie'),(2459,'fr','voient'),(2460,'fr','vont'),(2461,'fr','votre'),(2462,'fr','vous'),(2463,'fr','vu'),(2464,'fr','√ßa'),(2465,'fr','√©taient'),(2466,'fr','√©tat'),(2467,'fr','√©tions'),(2468,'fr','√©t√©'),(2469,'hu','a'),(2470,'hu','az'),(2471,'hu','egy'),(2472,'hu','be'),(2473,'hu','ki'),(2474,'hu','le'),(2475,'hu','fel'),(2476,'hu','meg'),(2477,'hu','el'),(2478,'hu','√°t'),(2479,'hu','r√°'),(2480,'hu','ide'),(2481,'hu','oda'),(2482,'hu','sz√©t'),(2483,'hu','√∂ssze'),(2484,'hu','vissza'),(2485,'hu','de'),(2486,'hu','h√°t'),(2487,'hu','√©s'),(2488,'hu','vagy'),(2489,'hu','hogy'),(2490,'hu','van'),(2491,'hu','lesz'),(2492,'hu','volt'),(2493,'hu','csak'),(2494,'hu','nem'),(2495,'hu','igen'),(2496,'hu','mint'),(2497,'hu','√©n'),(2498,'hu','te'),(2499,'hu','√µ'),(2500,'hu','mi'),(2501,'hu','ti'),(2502,'hu','√µk'),(2503,'it','a'),(2504,'it','adesso'),(2505,'it','ai'),(2506,'it','al'),(2507,'it','alla'),(2508,'it','allo'),(2509,'it','allora'),(2510,'it','altre'),(2511,'it','altri'),(2512,'it','altro'),(2513,'it','anche'),(2514,'it','ancora'),(2515,'it','avere'),(2516,'it','aveva'),(2517,'it','avevano'),(2518,'it','ben'),(2519,'it','buono'),(2520,'it','che'),(2521,'it','chi'),(2522,'it','cinque'),(2523,'it','comprare'),(2524,'it','con'),(2525,'it','consecutivi'),(2526,'it','consecutivo'),(2527,'it','cosa'),(2528,'it','cui'),(2529,'it','da'),(2530,'it','del'),(2531,'it','della'),(2532,'it','dello'),(2533,'it','dentro'),(2534,'it','deve'),(2535,'it','devo'),(2536,'it','di'),(2537,'it','doppio'),(2538,'it','due'),(2539,'it','e'),(2540,'it','ecco'),(2541,'it','fare'),(2542,'it','fine'),(2543,'it','fino'),(2544,'it','fra'),(2545,'it','gente'),(2546,'it','giu'),(2547,'it','ha'),(2548,'it','hai'),(2549,'it','hanno'),(2550,'it','ho'),(2551,'it','il'),(2552,'it','indietro'),(2553,'it','invece'),(2554,'it','io'),(2555,'it','la'),(2556,'it','lavoro'),(2557,'it','le'),(2558,'it','lei'),(2559,'it','lo'),(2560,'it','loro'),(2561,'it','lui'),(2562,'it','lungo'),(2563,'it','ma'),(2564,'it','me'),(2565,'it','meglio'),(2566,'it','molta'),(2567,'it','molti'),(2568,'it','molto'),(2569,'it','nei'),(2570,'it','nella'),(2571,'it','no'),(2572,'it','noi'),(2573,'it','nome'),(2574,'it','nostro'),(2575,'it','nove'),(2576,'it','nuovi'),(2577,'it','nuovo'),(2578,'it','o'),(2579,'it','oltre'),(2580,'it','ora'),(2581,'it','otto'),(2582,'it','peggio'),(2583,'it','pero'),(2584,'it','persone'),(2585,'it','piu'),(2586,'it','poco'),(2587,'it','primo'),(2588,'it','promesso'),(2589,'it','qua'),(2590,'it','quarto'),(2591,'it','quasi'),(2592,'it','quattro'),(2593,'it','quello'),(2594,'it','questo'),(2595,'it','qui'),(2596,'it','quindi'),(2597,'it','quinto'),(2598,'it','rispetto'),(2599,'it','sara'),(2600,'it','secondo'),(2601,'it','sei'),(2602,'it','sembra'),(2603,'it','sembrava'),(2604,'it','senza'),(2605,'it','sette'),(2606,'it','sia'),(2607,'it','siamo'),(2608,'it','siete'),(2609,'it','solo'),(2610,'it','sono'),(2611,'it','sopra'),(2612,'it','soprattutto'),(2613,'it','sotto'),(2614,'it','stati'),(2615,'it','stato'),(2616,'it','stesso'),(2617,'it','su'),(2618,'it','subito'),(2619,'it','sul'),(2620,'it','sulla'),(2621,'it','tanto'),(2622,'it','te'),(2623,'it','tempo'),(2624,'it','terzo'),(2625,'it','tra'),(2626,'it','tre'),(2627,'it','triplo'),(2628,'it','ultimo'),(2629,'it','un'),(2630,'it','una'),(2631,'it','uno'),(2632,'it','va'),(2633,'it','vai'),(2634,'it','voi'),(2635,'it','volte'),(2636,'nb','alle'),(2637,'nb','andre'),(2638,'nb','arbeid'),(2639,'nb','av'),(2640,'nb','begge'),(2641,'nb','bort'),(2642,'nb','bra'),(2643,'nb','bruke'),(2644,'nb','da'),(2645,'nb','denne'),(2646,'nb','der'),(2647,'nb','deres'),(2648,'nb','det'),(2649,'nb','din'),(2650,'nb','disse'),(2651,'nb','du'),(2652,'nb','eller'),(2653,'nb','en'),(2654,'nb','ene'),(2655,'nb','eneste'),(2656,'nb','enhver'),(2657,'nb','enn'),(2658,'nb','er'),(2659,'nb','et'),(2660,'nb','folk'),(2661,'nb','for'),(2662,'nb','fordi'),(2663,'nb','fors√õke'),(2664,'nb','fra'),(2665,'nb','f√Ö'),(2666,'nb','f√õr'),(2667,'nb','f√õrst'),(2668,'nb','gjorde'),(2669,'nb','gj√õre'),(2670,'nb','god'),(2671,'nb','g√Ö'),(2672,'nb','ha'),(2673,'nb','hadde'),(2674,'nb','han'),(2675,'nb','hans'),(2676,'nb','hennes'),(2677,'nb','her'),(2678,'nb','hva'),(2679,'nb','hvem'),(2680,'nb','hver'),(2681,'nb','hvilken'),(2682,'nb','hvis'),(2683,'nb','hvor'),(2684,'nb','hvordan'),(2685,'nb','hvorfor'),(2686,'nb','i'),(2687,'nb','ikke'),(2688,'nb','inn'),(2689,'nb','innen'),(2690,'nb','kan'),(2691,'nb','kunne'),(2692,'nb','lage'),(2693,'nb','lang'),(2694,'nb','lik'),(2695,'nb','like'),(2696,'nb','makt'),(2697,'nb','mange'),(2698,'nb','med'),(2699,'nb','meg'),(2700,'nb','meget'),(2701,'nb','men'),(2702,'nb','mens'),(2703,'nb','mer'),(2704,'nb','mest'),(2705,'nb','min'),(2706,'nb','mye'),(2707,'nb','m√Ö'),(2708,'nb','m√Öte'),(2709,'nb','navn'),(2710,'nb','nei'),(2711,'nb','ny'),(2712,'nb','n√Ö'),(2713,'nb','n√Ör'),(2714,'nb','og'),(2715,'nb','ogs√Ö'),(2716,'nb','om'),(2717,'nb','opp'),(2718,'nb','oss'),(2719,'nb','over'),(2720,'nb','part'),(2721,'nb','punkt'),(2722,'nb','p√Ö'),(2723,'nb','rett'),(2724,'nb','riktig'),(2725,'nb','samme'),(2726,'nb','sant'),(2727,'nb','si'),(2728,'nb','siden'),(2729,'nb','sist'),(2730,'nb','skulle'),(2731,'nb','slik'),(2732,'nb','slutt'),(2733,'nb','som'),(2734,'nb','start'),(2735,'nb','stille'),(2736,'nb','s√Ö'),(2737,'nb','tid'),(2738,'nb','til'),(2739,'nb','tilbake'),(2740,'nb','tilstand'),(2741,'nb','under'),(2742,'nb','ut'),(2743,'nb','uten'),(2744,'nb','var'),(2745,'nb','ved'),(2746,'nb','verdi'),(2747,'nb','vi'),(2748,'nb','vil'),(2749,'nb','ville'),(2750,'nb','vite'),(2751,'nb','v√Ör'),(2752,'nb','v√ñre'),(2753,'nb','v√ñrt'),(2754,'nl','aan'),(2755,'nl','af'),(2756,'nl','al'),(2757,'nl','als'),(2758,'nl','bij'),(2759,'nl','dan'),(2760,'nl','dat'),(2761,'nl','die'),(2762,'nl','dit'),(2763,'nl','een'),(2764,'nl','en'),(2765,'nl','er'),(2766,'nl','had'),(2767,'nl','heb'),(2768,'nl','hem'),(2769,'nl','het'),(2770,'nl','hij'),(2771,'nl','hoe'),(2772,'nl','hun'),(2773,'nl','ik'),(2774,'nl','in'),(2775,'nl','is'),(2776,'nl','je'),(2777,'nl','kan'),(2778,'nl','me'),(2779,'nl','men'),(2780,'nl','met'),(2781,'nl','mij'),(2782,'nl','nog'),(2783,'nl','nu'),(2784,'nl','of'),(2785,'nl','ons'),(2786,'nl','ook'),(2787,'nl','te'),(2788,'nl','tot'),(2789,'nl','uit'),(2790,'nl','van'),(2791,'nl','was'),(2792,'nl','wat'),(2793,'nl','we'),(2794,'nl','wel'),(2795,'nl','wij'),(2796,'nl','zal'),(2797,'nl','ze'),(2798,'nl','zei'),(2799,'nl','zij'),(2800,'nl','zo'),(2801,'pl','a'),(2802,'pl','aby'),(2803,'pl','acz'),(2804,'pl','aczkolwiek'),(2805,'pl','a?'),(2806,'pl','ale'),(2807,'pl','ale?'),(2808,'pl','bardzo'),(2809,'pl','bardziej'),(2810,'pl','bez'),(2811,'pl','b?d?'),(2812,'pl','b?dzie'),(2813,'pl','bo'),(2814,'pl','by'),(2815,'pl','by?'),(2816,'pl','byli'),(2817,'pl','by?'),(2818,'pl','by?a'),(2819,'pl','by?o'),(2820,'pl','by?y'),(2821,'pl','cali'),(2822,'pl','ca?a'),(2823,'pl','ca?y'),(2824,'pl','co'),(2825,'pl','cokolwiek'),(2826,'pl','co?'),(2827,'pl','czasami'),(2828,'pl','czasem'),(2829,'pl','czy'),(2830,'pl','czemu'),(2831,'pl','dla'),(2832,'pl','dlaczego'),(2833,'pl','do'),(2834,'pl','gdy'),(2835,'pl','gdy?'),(2836,'pl','gdzie'),(2837,'pl','gdziekolwiek'),(2838,'pl','gdzie?'),(2839,'pl','i'),(2840,'pl','ile'),(2841,'pl','ich'),(2842,'pl','inna'),(2843,'pl','inny'),(2844,'pl','i?'),(2845,'pl','ja'),(2846,'pl','jak'),(2847,'pl','jaka?'),(2848,'pl','jakich?'),(2849,'pl','jaki?'),(2850,'pl','jaki?'),(2851,'pl','jakkolwiek'),(2852,'pl','jako'),(2853,'pl','jako?'),(2854,'pl','j?'),(2855,'pl','jednak'),(2856,'pl','jednak?e'),(2857,'pl','jego'),(2858,'pl','jej'),(2859,'pl','jest'),(2860,'pl','jeszcze'),(2861,'pl','je?eli'),(2862,'pl','ju?'),(2863,'pl','kiedy'),(2864,'pl','kim?'),(2865,'pl','kto'),(2866,'pl','ktokolwiek'),(2867,'pl','kto?'),(2868,'pl','kt√≥ra'),(2869,'pl','kt√≥re'),(2870,'pl','kt√≥ry'),(2871,'pl','kt√≥rych'),(2872,'pl','lat'),(2873,'pl','lecz'),(2874,'pl','lub'),(2875,'pl','ma'),(2876,'pl','mi'),(2877,'pl','mimo'),(2878,'pl','mnie'),(2879,'pl','moim'),(2880,'pl','mo?e'),(2881,'pl','mo?liwe'),(2882,'pl','mo?na'),(2883,'pl','mu'),(2884,'pl','na'),(2885,'pl','nad'),(2886,'pl','nas'),(2887,'pl','natomiast'),(2888,'pl','nawet'),(2889,'pl','nic'),(2890,'pl','nich'),(2891,'pl','nie'),(2892,'pl','nigdy'),(2893,'pl','ni?'),(2894,'pl','no'),(2895,'pl','o'),(2896,'pl','obok'),(2897,'pl','od'),(2898,'pl','oko?o'),(2899,'pl','on'),(2900,'pl','ona'),(2901,'pl','ono'),(2902,'pl','oraz'),(2903,'pl','pan'),(2904,'pl','pana'),(2905,'pl','pani'),(2906,'pl','po'),(2907,'pl','pod'),(2908,'pl','podczas'),(2909,'pl','teraz'),(2910,'pl','te?'),(2911,'pl','trzeba'),(2912,'pl','to'),(2913,'pl','tobie'),(2914,'pl','tote?'),(2915,'pl','tu'),(2916,'pl','twoim'),(2917,'pl','twoja'),(2918,'pl','twoje'),(2919,'pl','tw√≥j'),(2920,'pl','twym'),(2921,'pl','ty'),(2922,'pl','tych'),(2923,'pl','tylko'),(2924,'pl','tym'),(2925,'pl','w'),(2926,'pl','we'),(2927,'pl','wed?ug'),(2928,'pl','wi?c'),(2929,'pl','w?a?nie'),(2930,'pl','wszyscy'),(2931,'pl','wszystko'),(2932,'pl','wszystkie'),(2933,'pl','z'),(2934,'pl','za'),(2935,'pl','zapewne'),(2936,'pl','zawsze'),(2937,'pl','ze'),(2938,'pl','znowu'),(2939,'pl','zn√≥w'),(2940,'pl','?adna'),(2941,'pl','?adne'),(2942,'pl','?adnych'),(2943,'pl','?e'),(2944,'pl','?eby'),(2945,'pl',''),(2946,'pl',''),(2947,'pt','√∫ltimo'),(2948,'pt','√©'),(2949,'pt','acerca'),(2950,'pt','agora'),(2951,'pt','algmas'),(2952,'pt','alguns'),(2953,'pt','ali'),(2954,'pt','ambos'),(2955,'pt','antes'),(2956,'pt','apontar'),(2957,'pt','aquela'),(2958,'pt','aquelas'),(2959,'pt','aquele'),(2960,'pt','aqueles'),(2961,'pt','aqui'),(2962,'pt','atr√°s'),(2963,'pt','bem'),(2964,'pt','bom'),(2965,'pt','cada'),(2966,'pt','caminho'),(2967,'pt','cima'),(2968,'pt','com'),(2969,'pt','como'),(2970,'pt','comprido'),(2971,'pt','conhecido'),(2972,'pt','corrente'),(2973,'pt','das'),(2974,'pt','debaixo'),(2975,'pt','dentro'),(2976,'pt','desde'),(2977,'pt','desligado'),(2978,'pt','deve'),(2979,'pt','devem'),(2980,'pt','dever√°'),(2981,'pt','direita'),(2982,'pt','diz'),(2983,'pt','dizer'),(2984,'pt','dois'),(2985,'pt','dos'),(2986,'pt','e'),(2987,'pt','ela'),(2988,'pt','ele'),(2989,'pt','eles'),(2990,'pt','em'),(2991,'pt','enquanto'),(2992,'pt','ent√£o'),(2993,'pt','est√°'),(2994,'pt','est√£o'),(2995,'pt','estado'),(2996,'pt','estar'),(2997,'pt','estar√°'),(2998,'pt','este'),(2999,'pt','estes'),(3000,'pt','esteve'),(3001,'pt','estive'),(3002,'pt','estivemos'),(3003,'pt','estiveram'),(3004,'pt','eu'),(3005,'pt','far√°'),(3006,'pt','faz'),(3007,'pt','fazer'),(3008,'pt','fazia'),(3009,'pt','fez'),(3010,'pt','fim'),(3011,'pt','foi'),(3012,'pt','fora'),(3013,'pt','horas'),(3014,'pt','iniciar'),(3015,'pt','inicio'),(3016,'pt','ir'),(3017,'pt','ir√°'),(3018,'pt','ista'),(3019,'pt','iste'),(3020,'pt','isto'),(3021,'pt','ligado'),(3022,'pt','maioria'),(3023,'pt','maiorias'),(3024,'pt','mais'),(3025,'pt','mas'),(3026,'pt','mesmo'),(3027,'pt','meu'),(3028,'pt','muito'),(3029,'pt','muitos'),(3030,'pt','n√≥s'),(3031,'pt','n√£o'),(3032,'pt','nome'),(3033,'pt','nosso'),(3034,'pt','novo'),(3035,'pt','o'),(3036,'pt','onde'),(3037,'pt','os'),(3038,'pt','ou'),(3039,'pt','outro'),(3040,'pt','para'),(3041,'pt','parte'),(3042,'pt','pegar'),(3043,'pt','pelo'),(3044,'pt','pessoas'),(3045,'pt','pode'),(3046,'pt','poder√°'),(3047,'pt','podia'),(3048,'pt','por'),(3049,'pt','porque'),(3050,'pt','povo'),(3051,'pt','promeiro'),(3052,'pt','qu√™'),(3053,'pt','qual'),(3054,'pt','qualquer'),(3055,'pt','quando'),(3056,'pt','quem'),(3057,'pt','quieto'),(3058,'pt','s√£o'),(3059,'pt','saber'),(3060,'pt','sem'),(3061,'pt','ser'),(3062,'pt','seu'),(3063,'pt','somente'),(3064,'pt','t√™m'),(3065,'pt','tal'),(3066,'pt','tamb√©m'),(3067,'pt','tem'),(3068,'pt','tempo'),(3069,'pt','tenho'),(3070,'pt','tentar'),(3071,'pt','tentaram'),(3072,'pt','tente'),(3073,'pt','tentei'),(3074,'pt','teu'),(3075,'pt','teve'),(3076,'pt','tipo'),(3077,'pt','tive'),(3078,'pt','todos'),(3079,'pt','trabalhar'),(3080,'pt','trabalho'),(3081,'pt','tu'),(3082,'pt','um'),(3083,'pt','uma'),(3084,'pt','umas'),(3085,'pt','uns'),(3086,'pt','usa'),(3087,'pt','usar'),(3088,'pt','valor'),(3089,'pt','veja'),(3090,'pt','ver'),(3091,'pt','verdade'),(3092,'pt','verdadeiro'),(3093,'tr','acaba'),(3094,'tr','altm√Ω√æ'),(3095,'tr','alt√Ω'),(3096,'tr','ama'),(3097,'tr','bana'),(3098,'tr','baz√Ω'),(3099,'tr','belki'),(3100,'tr','ben'),(3101,'tr','benden'),(3102,'tr','beni'),(3103,'tr','benim'),(3104,'tr','be√æ'),(3105,'tr','bin'),(3106,'tr','bir'),(3107,'tr','biri'),(3108,'tr','birka√ß'),(3109,'tr','birkez'),(3110,'tr','bir√æey'),(3111,'tr','bir√æeyi'),(3112,'tr','biz'),(3113,'tr','bizden'),(3114,'tr','bizi'),(3115,'tr','bizim'),(3116,'tr','bu'),(3117,'tr','buna'),(3118,'tr','bunda'),(3119,'tr','bundan'),(3120,'tr','bunu'),(3121,'tr','bunun'),(3122,'tr','da'),(3123,'tr','daha'),(3124,'tr','dahi'),(3125,'tr','de'),(3126,'tr','defa'),(3127,'tr','diye'),(3128,'tr','doksan'),(3129,'tr','dokuz'),(3130,'tr','d√∂rt'),(3131,'tr','elli'),(3132,'tr','en'),(3133,'tr','gibi'),(3134,'tr','hem'),(3135,'tr','hep'),(3136,'tr','hepsi'),(3137,'tr','her'),(3138,'tr','hi√ß'),(3139,'tr','iki'),(3140,'tr','ile'),(3141,'tr','INSERmi'),(3142,'tr','ise'),(3143,'tr','i√ßin'),(3144,'tr','katrilyon'),(3145,'tr','kez'),(3146,'tr','ki'),(3147,'tr','kim'),(3148,'tr','kimden'),(3149,'tr','kime'),(3150,'tr','kimi'),(3151,'tr','k√Ωrk'),(3152,'tr','milyar'),(3153,'tr','milyon'),(3154,'tr','mu'),(3155,'tr','m√º'),(3156,'tr','m√Ω'),(3157,'tr','nas√Ωl'),(3158,'tr','ne'),(3159,'tr','neden'),(3160,'tr','nerde'),(3161,'tr','nerede'),(3162,'tr','nereye'),(3163,'tr','niye'),(3164,'tr','ni√ßin'),(3165,'tr','on'),(3166,'tr','ona'),(3167,'tr','ondan'),(3168,'tr','onlar'),(3169,'tr','onlardan'),(3170,'tr','onlari'),(3171,'tr','onlar√Ωn'),(3172,'tr','onu'),(3173,'tr','otuz'),(3174,'tr','sanki'),(3175,'tr','sekiz'),(3176,'tr','seksen'),(3177,'tr','sen'),(3178,'tr','senden'),(3179,'tr','seni'),(3180,'tr','senin'),(3181,'tr','siz'),(3182,'tr','sizden'),(3183,'tr','sizi'),(3184,'tr','sizin'),(3185,'tr','trilyon'),(3186,'tr','t√ºm'),(3187,'tr','ve'),(3188,'tr','veya'),(3189,'tr','ya'),(3190,'tr','yani'),(3191,'tr','yedi'),(3192,'tr','yetmi√æ'),(3193,'tr','yirmi'),(3194,'tr','y√ºz'),(3195,'tr','√ßok'),(3196,'tr','√ß√ºnk√º'),(3197,'tr','√º√ß'),(3198,'tr','√æey'),(3199,'tr','√æeyden'),(3200,'tr','√æeyi'),(3201,'tr','√æeyler'),(3202,'tr','√æu'),(3203,'tr','√æuna'),(3204,'tr','√æunda'),(3205,'tr','√æundan'),(3206,'lt','ant'),(3207,'lt','apie'),(3208,'lt','ar'),(3209,'lt','arba'),(3210,'lt','aš'),(3211,'lt','be'),(3212,'lt','bei'),(3213,'lt','bet'),(3214,'lt','būti'),(3215,'lt','būtų'),(3216,'lt','buvo'),(3217,'lt','čia'),(3218,'lt','dabar'),(3219,'lt','dar'),(3220,'lt','daug'),(3221,'lt','daugiau'),(3222,'lt','dėl'),(3223,'lt','gal'),(3224,'lt','gali'),(3225,'lt','į'),(3226,'lt','iki'),(3227,'lt','ir'),(3228,'lt','iš'),(3229,'lt','yra'),(3230,'lt','jam'),(3231,'lt','jau'),(3232,'lt','jei'),(3233,'lt','jeigu'),(3234,'lt','ji'),(3235,'lt','jį'),(3236,'lt','jie'),(3237,'lt','jis'),(3238,'lt','jo'),(3239,'lt','jog'),(3240,'lt','jos'),(3241,'lt','jų'),(3242,'lt','juk'),(3243,'lt','juos'),(3244,'lt','jūs'),(3245,'lt','ką'),(3246,'lt','kad'),(3247,'lt','kai'),(3248,'lt','kaip'),(3249,'lt','kas'),(3250,'lt','ko'),(3251,'lt','kol'),(3252,'lt','kur'),(3253,'lt','kuris'),(3254,'lt','labai'),(3255,'lt','man'),(3256,'lt','mano'),(3257,'lt','mes'),(3258,'lt','mūsų'),(3259,'lt','ne'),(3260,'lt','nebuvo'),(3261,'lt','nei'),(3262,'lt','nėra'),(3263,'lt','nes'),(3264,'lt','net'),(3265,'lt','nieko'),(3266,'lt','nors'),(3267,'lt','nuo'),(3268,'lt','o'),(3269,'lt','pats'),(3270,'lt','per'),(3271,'lt','po'),(3272,'lt','prie'),(3273,'lt','prieš'),(3274,'lt','savo'),(3275,'lt','su'),(3276,'lt','tačiau'),(3277,'lt','tada'),(3278,'lt','tai'),(3279,'lt','taip'),(3280,'lt','tarė'),(3281,'lt','tarp'),(3282,'lt','ten'),(3283,'lt','tiek'),(3284,'lt','tik'),(3285,'lt','to'),(3286,'lt','todėl'),(3287,'lt','tu'),(3288,'lt','turi'),(3289,'lt','už'),(3290,'lt','vėl'),(3291,'lt','vieną'),(3292,'lt','vienas'),(3293,'lt','vis'),(3294,'lt','visi'),(3295,'lt','viskas');
/*!40000 ALTER TABLE `phpmyfaqstopwords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqtags`
--

DROP TABLE IF EXISTS `phpmyfaqtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqtags` (
  `tagging_id` int(11) NOT NULL,
  `tagging_name` varchar(255) NOT NULL,
  PRIMARY KEY (`tagging_id`,`tagging_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqtags`
--

LOCK TABLES `phpmyfaqtags` WRITE;
/*!40000 ALTER TABLE `phpmyfaqtags` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqtags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaquser`
--

DROP TABLE IF EXISTS `phpmyfaquser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaquser` (
  `user_id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `session_id` varchar(150) DEFAULT NULL,
  `session_timestamp` int(11) unsigned DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `account_status` varchar(50) DEFAULT NULL,
  `last_login` varchar(14) DEFAULT NULL,
  `auth_source` varchar(100) DEFAULT NULL,
  `member_since` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `session` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaquser`
--

LOCK TABLES `phpmyfaquser` WRITE;
/*!40000 ALTER TABLE `phpmyfaquser` DISABLE KEYS */;
INSERT INTO `phpmyfaquser` VALUES (-1,'anonymous',NULL,1562849840,NULL,'protected',NULL,NULL,'20190711145720'),(1,'admin','5d65p0ktpr4rsg7r4s7ou5qhl1',1562852574,'192.168.0.100','protected','20190711154140','local','20190711145720'),(2,'hacklab','ikr7usai5c497rlfdhumspl5m0',1562853210,'192.168.0.1','active','20190711155330','local','20190711150033');
/*!40000 ALTER TABLE `phpmyfaquser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaquser_group`
--

DROP TABLE IF EXISTS `phpmyfaquser_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaquser_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaquser_group`
--

LOCK TABLES `phpmyfaquser_group` WRITE;
/*!40000 ALTER TABLE `phpmyfaquser_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaquser_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaquser_right`
--

DROP TABLE IF EXISTS `phpmyfaquser_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaquser_right` (
  `user_id` int(11) NOT NULL,
  `right_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaquser_right`
--

LOCK TABLES `phpmyfaquser_right` WRITE;
/*!40000 ALTER TABLE `phpmyfaquser_right` DISABLE KEYS */;
INSERT INTO `phpmyfaquser_right` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(1,38),(2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(2,7),(2,8),(2,9),(2,10),(2,11),(2,12),(2,13),(2,14),(2,15),(2,16),(2,17),(2,18),(2,19),(2,20),(2,21),(2,22),(2,23),(2,24),(2,25),(2,26),(2,27),(2,28),(2,29),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35),(2,36),(2,37),(2,38);
/*!40000 ALTER TABLE `phpmyfaquser_right` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaquserdata`
--

DROP TABLE IF EXISTS `phpmyfaquserdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaquserdata` (
  `user_id` int(11) NOT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaquserdata`
--

LOCK TABLES `phpmyfaquserdata` WRITE;
/*!40000 ALTER TABLE `phpmyfaquserdata` DISABLE KEYS */;
INSERT INTO `phpmyfaquserdata` VALUES (1,'2019-07-11 13:57:20','Admin','admin@hacklab.com'),(-1,'2019-07-11 13:57:20','Anonymous User',''),(2,'2019-07-11 14:00:33','hacklab','hacklab@hacklab.com');
/*!40000 ALTER TABLE `phpmyfaquserdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaquserlogin`
--

DROP TABLE IF EXISTS `phpmyfaquserlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaquserlogin` (
  `login` varchar(25) NOT NULL,
  `pass` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaquserlogin`
--

LOCK TABLES `phpmyfaquserlogin` WRITE;
/*!40000 ALTER TABLE `phpmyfaquserlogin` DISABLE KEYS */;
INSERT INTO `phpmyfaquserlogin` VALUES ('admin','2603fa149032ab1f6724c61df310d1cc'),('anonymous','9baa0ea1b5bb89cf95a8c0b5a370c71e'),('hacklab','7052cad6b415f4272c1986aa9a50a7c3');
/*!40000 ALTER TABLE `phpmyfaquserlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqvisits`
--

DROP TABLE IF EXISTS `phpmyfaqvisits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqvisits` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `visits` int(11) NOT NULL,
  `last_visit` int(15) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqvisits`
--

LOCK TABLES `phpmyfaqvisits` WRITE;
/*!40000 ALTER TABLE `phpmyfaqvisits` DISABLE KEYS */;
INSERT INTO `phpmyfaqvisits` VALUES (1,'en',1,1562850173);
/*!40000 ALTER TABLE `phpmyfaqvisits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpmyfaqvoting`
--

DROP TABLE IF EXISTS `phpmyfaqvoting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpmyfaqvoting` (
  `id` int(11) unsigned NOT NULL,
  `artikel` int(11) unsigned NOT NULL,
  `vote` int(11) unsigned NOT NULL,
  `usr` int(11) unsigned NOT NULL,
  `datum` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpmyfaqvoting`
--

LOCK TABLES `phpmyfaqvoting` WRITE;
/*!40000 ALTER TABLE `phpmyfaqvoting` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpmyfaqvoting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'phpmyfaq'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31  7:05:26
