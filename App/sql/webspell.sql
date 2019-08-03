-- MySQL dump 10.13  Distrib 5.6.35, for Win32 (AMD64)
--
-- Host: localhost    Database: webspell
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
-- Current Database: `webspell`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `webspell` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `webspell`;

--
-- Table structure for table `ws_bbb_about`
--

DROP TABLE IF EXISTS `ws_bbb_about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_about` (
  `about` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_about`
--

LOCK TABLES `ws_bbb_about` WRITE;
/*!40000 ALTER TABLE `ws_bbb_about` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_articles`
--

DROP TABLE IF EXISTS `ws_bbb_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_articles` (
  `articlesID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `screens` text NOT NULL,
  `poster` int(11) NOT NULL DEFAULT '0',
  `link1` varchar(255) NOT NULL DEFAULT '',
  `url1` varchar(255) NOT NULL DEFAULT '',
  `window1` int(1) NOT NULL DEFAULT '0',
  `link2` varchar(255) NOT NULL DEFAULT '',
  `url2` varchar(255) NOT NULL DEFAULT '',
  `window2` int(1) NOT NULL DEFAULT '0',
  `link3` varchar(255) NOT NULL DEFAULT '',
  `url3` varchar(255) NOT NULL DEFAULT '',
  `window3` int(1) NOT NULL DEFAULT '0',
  `link4` varchar(255) NOT NULL DEFAULT '',
  `url4` varchar(255) NOT NULL DEFAULT '',
  `window4` int(1) NOT NULL DEFAULT '0',
  `votes` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0',
  `saved` int(1) NOT NULL DEFAULT '0',
  `viewed` int(11) NOT NULL DEFAULT '0',
  `comments` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`articlesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_articles`
--

LOCK TABLES `ws_bbb_articles` WRITE;
/*!40000 ALTER TABLE `ws_bbb_articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_articles_contents`
--

DROP TABLE IF EXISTS `ws_bbb_articles_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_articles_contents` (
  `articlesID` int(11) NOT NULL,
  `content` text NOT NULL,
  `page` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_articles_contents`
--

LOCK TABLES `ws_bbb_articles_contents` WRITE;
/*!40000 ALTER TABLE `ws_bbb_articles_contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_articles_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_awards`
--

DROP TABLE IF EXISTS `ws_bbb_awards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_awards` (
  `awardID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `squadID` int(11) NOT NULL DEFAULT '0',
  `award` varchar(255) NOT NULL DEFAULT '',
  `homepage` varchar(255) NOT NULL DEFAULT '',
  `rang` int(11) NOT NULL DEFAULT '0',
  `info` text NOT NULL,
  PRIMARY KEY (`awardID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_awards`
--

LOCK TABLES `ws_bbb_awards` WRITE;
/*!40000 ALTER TABLE `ws_bbb_awards` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_awards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_banned_ips`
--

DROP TABLE IF EXISTS `ws_bbb_banned_ips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_banned_ips` (
  `banID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `deltime` int(15) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`banID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_banned_ips`
--

LOCK TABLES `ws_bbb_banned_ips` WRITE;
/*!40000 ALTER TABLE `ws_bbb_banned_ips` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_banned_ips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_banner`
--

DROP TABLE IF EXISTS `ws_bbb_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_banner` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `banner` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`bannerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_banner`
--

LOCK TABLES `ws_bbb_banner` WRITE;
/*!40000 ALTER TABLE `ws_bbb_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_bannerrotation`
--

DROP TABLE IF EXISTS `ws_bbb_bannerrotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_bannerrotation` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) NOT NULL DEFAULT '',
  `bannername` varchar(255) NOT NULL DEFAULT '',
  `bannerurl` varchar(255) NOT NULL DEFAULT '',
  `displayed` varchar(255) NOT NULL DEFAULT '',
  `hits` int(11) DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bannerID`),
  UNIQUE KEY `banner` (`banner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_bannerrotation`
--

LOCK TABLES `ws_bbb_bannerrotation` WRITE;
/*!40000 ALTER TABLE `ws_bbb_bannerrotation` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_bannerrotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_buddys`
--

DROP TABLE IF EXISTS `ws_bbb_buddys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_buddys` (
  `buddyID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT '0',
  `buddy` int(11) NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`buddyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_buddys`
--

LOCK TABLES `ws_bbb_buddys` WRITE;
/*!40000 ALTER TABLE `ws_bbb_buddys` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_buddys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_captcha`
--

DROP TABLE IF EXISTS `ws_bbb_captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_captcha` (
  `hash` varchar(255) NOT NULL DEFAULT '',
  `captcha` int(11) NOT NULL DEFAULT '0',
  `deltime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_captcha`
--

LOCK TABLES `ws_bbb_captcha` WRITE;
/*!40000 ALTER TABLE `ws_bbb_captcha` DISABLE KEYS */;
INSERT INTO `ws_bbb_captcha` VALUES ('076557d5b6ff51d8d7013c714cff7601',38835,1563099084),('13b93b5fc6b94c7a872e88943cbc9f94',27459,1563099170),('3040183c31084e9a427d7807bb3df586',0,1563108912),('397872a99a6089a326ac86459058ee89',22833,1563099118),('416588c361b0404ef049990da4c34429',0,1563099074),('4289626e096cccdd615f41ff8e92096c',2,1563088409),('489cf4a4b667f17b195c5f86e29ee534',39049,1563099523),('4d4c4ace8e69fa2ffb5f8551a1755714',0,1563108905),('4f249b116c76fa873e46389b94f0adec',1,1563098888),('5c78482ad7826f1d310cb43703bbaf69',71833,1563099164),('729ef9287cd240270ac180712ddf081a',71437,1563108785),('82dd58031fd2357a1fd643e43e5c7f36',0,1563099039),('8387de89aa793b9eaab1fb915c2953be',0,1563099039),('89773c26b0b06437527fe9b2b6f47a14',19852,1563098886),('8e40dea77b384ecb4125262bc74742c9',0,1563099217),('945b9da3f7c858da94afe61576597785',0,1563098969),('95156fc195bbc6b964fedfe7952935d9',42,1563108929),('970933a9cf84c1d6ddb9b6c22ec81d3f',0,1563099160),('9f51be9de18883b25f2f6f0fa8d740d5',37169,1563108943),('a8efd42391f9d157c079e69873392ec6',0,1563099074),('af3bd3787cd3834be69d4920e16d3109',0,1563099039),('b3c9b5d87fc00af2acc88dd87fa9e412',0,1563099074),('b5bd035c275dee9b04689075d5174a19',0,1563108881),('b6522ca31b0bbf9159ed67529052894d',0,1563098959),('bad9a0cd18d9949dec0773a87d2e1022',0,1563098937),('caf59ee2018015bd22de084f1d961527',43,1563098858),('ce91eb211f4f368fd1a498b5abb2e7c2',0,1563099001),('dac3ba7caa6eb145735d186905ffe525',0,1563099039),('dd217650ab55accc0f08a572f3218bd4',0,1563108874),('e87a68cd5d2165a6a8b987f458467cac',0,1563098932),('eb1651582f8552cfeffc49e0b8b87485',6,1563088447),('ede0021b1dce6e4c6ef965bb5d499855',22,1563099220),('faca1f7c76d8d35a6a988743651affd4',34120,1563089080),('fc2e3b6f43ee595eff5da236b0f7f440',0,1563099074);
/*!40000 ALTER TABLE `ws_bbb_captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_cash_box`
--

DROP TABLE IF EXISTS `ws_bbb_cash_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_cash_box` (
  `cashID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `paydate` int(14) NOT NULL DEFAULT '0',
  `usedfor` text NOT NULL,
  `info` text NOT NULL,
  `totalcosts` double(8,2) NOT NULL DEFAULT '0.00',
  `usercosts` double(8,2) NOT NULL DEFAULT '0.00',
  `squad` int(11) NOT NULL DEFAULT '0',
  `konto` text NOT NULL,
  PRIMARY KEY (`cashID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_cash_box`
--

LOCK TABLES `ws_bbb_cash_box` WRITE;
/*!40000 ALTER TABLE `ws_bbb_cash_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_cash_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_cash_box_payed`
--

DROP TABLE IF EXISTS `ws_bbb_cash_box_payed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_cash_box_payed` (
  `payedID` int(11) NOT NULL AUTO_INCREMENT,
  `cashID` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL DEFAULT '0',
  `costs` double(8,2) NOT NULL DEFAULT '0.00',
  `date` int(14) NOT NULL DEFAULT '0',
  `payed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`payedID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_cash_box_payed`
--

LOCK TABLES `ws_bbb_cash_box_payed` WRITE;
/*!40000 ALTER TABLE `ws_bbb_cash_box_payed` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_cash_box_payed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_challenge`
--

DROP TABLE IF EXISTS `ws_bbb_challenge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_challenge` (
  `chID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `cwdate` int(14) NOT NULL DEFAULT '0',
  `squadID` varchar(255) NOT NULL DEFAULT '',
  `opponent` varchar(255) NOT NULL DEFAULT '',
  `opphp` varchar(255) NOT NULL DEFAULT '',
  `oppcountry` char(2) NOT NULL DEFAULT '',
  `league` varchar(255) NOT NULL DEFAULT '',
  `map` varchar(255) NOT NULL DEFAULT '',
  `server` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  PRIMARY KEY (`chID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_challenge`
--

LOCK TABLES `ws_bbb_challenge` WRITE;
/*!40000 ALTER TABLE `ws_bbb_challenge` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_challenge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_clanwars`
--

DROP TABLE IF EXISTS `ws_bbb_clanwars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_clanwars` (
  `cwID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `squad` int(11) NOT NULL DEFAULT '0',
  `game` varchar(5) NOT NULL DEFAULT '',
  `league` varchar(255) NOT NULL DEFAULT '',
  `leaguehp` varchar(255) NOT NULL DEFAULT '',
  `opponent` varchar(255) NOT NULL DEFAULT '',
  `opptag` varchar(255) NOT NULL DEFAULT '',
  `oppcountry` char(2) NOT NULL DEFAULT '',
  `opphp` varchar(255) NOT NULL DEFAULT '',
  `maps` varchar(255) NOT NULL DEFAULT '',
  `hometeam` varchar(255) NOT NULL DEFAULT '',
  `oppteam` varchar(255) NOT NULL DEFAULT '',
  `server` varchar(255) NOT NULL DEFAULT '',
  `hltv` varchar(255) NOT NULL,
  `homescore` text,
  `oppscore` text,
  `screens` text NOT NULL,
  `report` text NOT NULL,
  `comments` int(1) NOT NULL DEFAULT '0',
  `linkpage` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`cwID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_clanwars`
--

LOCK TABLES `ws_bbb_clanwars` WRITE;
/*!40000 ALTER TABLE `ws_bbb_clanwars` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_clanwars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_comments`
--

DROP TABLE IF EXISTS `ws_bbb_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` int(11) NOT NULL DEFAULT '0',
  `type` char(2) NOT NULL DEFAULT '',
  `userID` int(11) NOT NULL DEFAULT '0',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `date` int(14) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_comments`
--

LOCK TABLES `ws_bbb_comments` WRITE;
/*!40000 ALTER TABLE `ws_bbb_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_contact`
--

DROP TABLE IF EXISTS `ws_bbb_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_contact` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_contact`
--

LOCK TABLES `ws_bbb_contact` WRITE;
/*!40000 ALTER TABLE `ws_bbb_contact` DISABLE KEYS */;
INSERT INTO `ws_bbb_contact` VALUES (1,'Administrator','admin@hacklab.com',1);
/*!40000 ALTER TABLE `ws_bbb_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_counter`
--

DROP TABLE IF EXISTS `ws_bbb_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_counter` (
  `hits` int(20) NOT NULL DEFAULT '0',
  `online` int(14) NOT NULL DEFAULT '0',
  `maxonline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_counter`
--

LOCK TABLES `ws_bbb_counter` WRITE;
/*!40000 ALTER TABLE `ws_bbb_counter` DISABLE KEYS */;
INSERT INTO `ws_bbb_counter` VALUES (2,1563001996,2);
/*!40000 ALTER TABLE `ws_bbb_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_counter_iplist`
--

DROP TABLE IF EXISTS `ws_bbb_counter_iplist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_counter_iplist` (
  `dates` varchar(255) NOT NULL DEFAULT '',
  `del` int(20) NOT NULL DEFAULT '0',
  `ip` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_counter_iplist`
--

LOCK TABLES `ws_bbb_counter_iplist` WRITE;
/*!40000 ALTER TABLE `ws_bbb_counter_iplist` DISABLE KEYS */;
INSERT INTO `ws_bbb_counter_iplist` VALUES ('13.07.2019',1563002008,'192.168.0.100');
/*!40000 ALTER TABLE `ws_bbb_counter_iplist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_counter_stats`
--

DROP TABLE IF EXISTS `ws_bbb_counter_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_counter_stats` (
  `dates` varchar(255) NOT NULL DEFAULT '',
  `count` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_counter_stats`
--

LOCK TABLES `ws_bbb_counter_stats` WRITE;
/*!40000 ALTER TABLE `ws_bbb_counter_stats` DISABLE KEYS */;
INSERT INTO `ws_bbb_counter_stats` VALUES ('13.07.2019',1);
/*!40000 ALTER TABLE `ws_bbb_counter_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_countries`
--

DROP TABLE IF EXISTS `ws_bbb_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_countries` (
  `countryID` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `short` varchar(3) NOT NULL,
  PRIMARY KEY (`countryID`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_countries`
--

LOCK TABLES `ws_bbb_countries` WRITE;
/*!40000 ALTER TABLE `ws_bbb_countries` DISABLE KEYS */;
INSERT INTO `ws_bbb_countries` VALUES (1,'Argentina','ar'),(2,'Australia','au'),(3,'Austria','at'),(4,'Belgium','be'),(5,'Bosnia Herzegowina','ba'),(6,'Brazil','br'),(7,'Bulgaria','bg'),(8,'Canada','ca'),(9,'Chile','cl'),(10,'China','cn'),(11,'Colombia','co'),(12,'Czech Republic','cz'),(13,'Croatia','hr'),(14,'Cyprus','cy'),(15,'Denmark','dk'),(16,'Estonia','ee'),(17,'Finland','fi'),(18,'Faroe Islands','fo'),(19,'France','fr'),(20,'Germany','de'),(21,'Greece','gr'),(22,'Hungary','hu'),(23,'Iceland','is'),(24,'Ireland','ie'),(25,'Israel','il'),(26,'Italy','it'),(27,'Japan','jp'),(28,'Korea','kr'),(29,'Latvia','lv'),(30,'Lithuania','lt'),(31,'Luxemburg','lu'),(32,'Malaysia','my'),(33,'Malta','mt'),(34,'Netherlands','nl'),(35,'Mexico','mx'),(36,'Mongolia','mn'),(37,'New Zealand','nz'),(38,'Norway','no'),(39,'Poland','pl'),(40,'Portugal','pt'),(41,'Romania','ro'),(42,'Russian Federation','ru'),(43,'Singapore','sg'),(44,'Slovak Republic','sk'),(45,'Slovenia','si'),(46,'Taiwan','tw'),(47,'South Africa','za'),(48,'Spain','es'),(49,'Sweden','se'),(50,'Syria','sy'),(51,'Switzerland','ch'),(52,'Tibet','ti'),(53,'Tunisia','tn'),(54,'Turkey','tr'),(55,'Ukraine','ua'),(56,'United Kingdom','uk'),(57,'USA','us'),(58,'Venezuela','ve'),(59,'Yugoslavia','yu'),(60,'European Union','eu'),(61,'Albania','al'),(62,'Algeria','dz'),(63,'American Samoa','as'),(64,'Andorra','ad'),(65,'Angola','ao'),(66,'Anguilla','ai'),(67,'Antarctica','aq'),(68,'Antigua and Barbuda','ag'),(69,'Armenia','am'),(70,'Aruba','aw'),(71,'Azerbaijan','az'),(72,'Bahamas','bz'),(73,'Bahrain','bh'),(74,'Bangladesh','bd'),(75,'Barbados','bb'),(76,'Belarus','by'),(77,'Benelux','bx'),(78,'Benin','bj'),(79,'Bermuda','bm'),(80,'Bhutan','bt'),(81,'Bolivia','bo'),(82,'Botswana','bw'),(83,'Bouvet Island','bv'),(84,'British Indian Ocean Territory','io'),(85,'Brunei Darussalam','bn'),(86,'Burkina Faso','bf'),(87,'Burundi','bi'),(88,'Cambodia','kh'),(89,'Cameroon','cm'),(90,'Cape Verde','cv'),(91,'Cayman Islands','ky'),(92,'Central African Republic','cf'),(93,'Christmas Island','cx'),(94,'Cocos Islands','cc'),(95,'Comoros','km'),(96,'Congo','cg'),(97,'Cook Islands','ck'),(98,'Costa Rica','cr'),(99,'Cote d\'Ivoire','ci'),(100,'Cuba','cu'),(101,'Democratic Congo','cd'),(102,'Democratic Korea','kp'),(103,'Djibouti','dj'),(104,'Dominica','dm'),(105,'Dominican Republic','do'),(106,'East Timor','tp'),(107,'Ecuador','ec'),(108,'Egypt','eg'),(109,'El Salvador','sv'),(110,'England','en'),(111,'Eritrea','er'),(112,'Ethiopia','et'),(113,'Falkland Islands','fk'),(114,'Fiji','fj'),(115,'French Polynesia','pf'),(116,'French Southern Territories','tf'),(117,'Gabon','ga'),(118,'Gambia','gm'),(119,'Georgia','ge'),(120,'Ghana','gh'),(121,'Gibraltar','gi'),(122,'Greenland','gl'),(123,'Grenada','gd'),(124,'Guadeloupe','gp'),(125,'Guam','gu'),(126,'Guatemala','gt'),(127,'Guinea','gn'),(128,'Guinea-Bissau','gw'),(129,'Guyana','gy'),(130,'Haiti','ht'),(131,'Heard Islands','hm'),(132,'Holy See','va'),(133,'Honduras','hn'),(134,'Hong Kong','hk'),(135,'India','in'),(136,'Indonesia','id'),(137,'Iran','ir'),(138,'Iraq','iq'),(139,'Jamaica','jm'),(140,'Jordan','jo'),(141,'Kazakhstan','kz'),(142,'Kenia','ke'),(143,'Kiribati','ki'),(144,'Kuwait','kw'),(145,'Kyrgyzstan','kg'),(146,'Lao People\'s','la'),(147,'Lebanon','lb'),(148,'Lesotho','ls'),(149,'Liberia','lr'),(150,'Libyan Arab Jamahiriya','ly'),(151,'Liechtenstein','li'),(152,'Macau','mo'),(153,'Macedonia','mk'),(154,'Madagascar','mg'),(155,'Malawi','mw'),(156,'Maldives','mv'),(157,'Mali','ml'),(158,'Marshall Islands','mh'),(159,'Mauritania','mr'),(160,'Mauritius','mu'),(161,'Micronesia','fm'),(162,'Moldova','md'),(163,'Monaco','mc'),(164,'Montserrat','ms'),(165,'Morocco','ma'),(166,'Mozambique','mz'),(167,'Myanmar','mm'),(168,'Namibia','nb'),(169,'Nauru','nr'),(170,'Nepal','np'),(171,'Netherlands Antilles','an'),(172,'New Caledonia','nc'),(173,'Nicaragua','ni'),(174,'Nigeria','ng'),(175,'Niue','nu'),(176,'Norfolk Island','nf'),(177,'Northern Ireland','nx'),(178,'Northern Mariana Islands','mp'),(179,'Oman','om'),(180,'Pakistan','pk'),(181,'Palau','pw'),(182,'Palestinian','ps'),(183,'Panama','pa'),(184,'Papua New Guinea','pg'),(185,'Paraguay','py'),(186,'Peru','pe'),(187,'Philippines','ph'),(188,'Pitcairn','pn'),(189,'Puerto Rico','pr'),(190,'Qatar','qa'),(191,'Reunion','re'),(192,'Rwanda','rw'),(193,'Saint Helena','sh'),(194,'Saint Kitts and Nevis','kn'),(195,'Saint Lucia','lc'),(196,'Saint Pierre and Miquelon','pm'),(197,'Saint Vincent','vc'),(198,'Samoa','ws'),(199,'San Marino','sm'),(200,'Sao Tome and Principe','st'),(201,'Saudi Arabia','sa'),(202,'Scotland','sc'),(203,'Senegal','sn'),(204,'Sierra Leone','sl'),(205,'Solomon Islands','sb'),(206,'Somalia','so'),(207,'South Georgia','gs'),(208,'Sri Lanka','lk'),(209,'Sudan','sd'),(210,'Suriname','sr'),(211,'Svalbard and Jan Mayen','sj'),(212,'Swaziland','sz'),(213,'Tajikistan','tj'),(214,'Tanzania','tz'),(215,'Thailand','th'),(216,'Togo','tg'),(217,'Tokelau','tk'),(218,'Tonga','to'),(219,'Trinidad and Tobago','tt'),(220,'Turkmenistan','tm'),(221,'Turks_and Caicos Islands','tc'),(222,'Tuvalu','tv'),(223,'Uganda','ug'),(224,'United Arab Emirates','ae'),(225,'Uruguay','uy'),(226,'Uzbekistan','uz'),(227,'Vanuatu','vu'),(228,'Vietnam','vn'),(229,'Virgin Islands (British)','vg'),(230,'Virgin Islands (USA)','vi'),(231,'Wales','wa'),(232,'Wallis and Futuna','wf'),(233,'Western Sahara','eh'),(234,'Yemen','ye'),(235,'Zambia','zm'),(236,'Zimbabwe','zw');
/*!40000 ALTER TABLE `ws_bbb_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_demos`
--

DROP TABLE IF EXISTS `ws_bbb_demos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_demos` (
  `demoID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `game` varchar(255) NOT NULL DEFAULT '',
  `clan1` varchar(255) NOT NULL DEFAULT '',
  `clan2` varchar(255) NOT NULL DEFAULT '',
  `clantag1` varchar(255) NOT NULL DEFAULT '',
  `clantag2` varchar(255) NOT NULL DEFAULT '',
  `url1` varchar(255) NOT NULL DEFAULT '',
  `url2` varchar(255) NOT NULL DEFAULT '',
  `country1` char(2) NOT NULL DEFAULT '',
  `country2` char(2) NOT NULL DEFAULT '',
  `league` varchar(255) NOT NULL DEFAULT '',
  `leaguehp` varchar(255) NOT NULL DEFAULT '',
  `maps` varchar(255) NOT NULL DEFAULT '',
  `player` varchar(255) NOT NULL DEFAULT '',
  `file` varchar(255) NOT NULL DEFAULT '',
  `downloads` int(11) NOT NULL DEFAULT '0',
  `votes` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0',
  `comments` int(1) NOT NULL DEFAULT '0',
  `accesslevel` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`demoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_demos`
--

LOCK TABLES `ws_bbb_demos` WRITE;
/*!40000 ALTER TABLE `ws_bbb_demos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_demos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_failed_login_attempts`
--

DROP TABLE IF EXISTS `ws_bbb_failed_login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_failed_login_attempts` (
  `ip` varchar(255) NOT NULL DEFAULT '',
  `wrong` int(2) DEFAULT '0',
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_failed_login_attempts`
--

LOCK TABLES `ws_bbb_failed_login_attempts` WRITE;
/*!40000 ALTER TABLE `ws_bbb_failed_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_failed_login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_faq`
--

DROP TABLE IF EXISTS `ws_bbb_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_faq` (
  `faqID` int(11) NOT NULL AUTO_INCREMENT,
  `faqcatID` int(11) NOT NULL DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`faqID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_faq`
--

LOCK TABLES `ws_bbb_faq` WRITE;
/*!40000 ALTER TABLE `ws_bbb_faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_faq_categories`
--

DROP TABLE IF EXISTS `ws_bbb_faq_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_faq_categories` (
  `faqcatID` int(11) NOT NULL AUTO_INCREMENT,
  `faqcatname` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`faqcatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_faq_categories`
--

LOCK TABLES `ws_bbb_faq_categories` WRITE;
/*!40000 ALTER TABLE `ws_bbb_faq_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_faq_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_files`
--

DROP TABLE IF EXISTS `ws_bbb_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_files` (
  `fileID` int(11) NOT NULL AUTO_INCREMENT,
  `filecatID` int(11) NOT NULL DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `filesize` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT '',
  `mirrors` text NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT '0',
  `accesslevel` int(1) NOT NULL DEFAULT '0',
  `votes` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  PRIMARY KEY (`fileID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_files`
--

LOCK TABLES `ws_bbb_files` WRITE;
/*!40000 ALTER TABLE `ws_bbb_files` DISABLE KEYS */;
INSERT INTO `ws_bbb_files` VALUES (1,1,1563022762,'test','24','','test1.php','',0,0,0,0,0,1),(2,1,1563023000,'test','21','test','1563023000_test1.php','',0,0,0,0,0,1),(3,1,1563023099,'test3','21','','test1.php','',0,0,0,0,0,1);
/*!40000 ALTER TABLE `ws_bbb_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_files_categorys`
--

DROP TABLE IF EXISTS `ws_bbb_files_categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_files_categorys` (
  `filecatID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `subcatID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`filecatID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_files_categorys`
--

LOCK TABLES `ws_bbb_files_categorys` WRITE;
/*!40000 ALTER TABLE `ws_bbb_files_categorys` DISABLE KEYS */;
INSERT INTO `ws_bbb_files_categorys` VALUES (1,'test',0);
/*!40000 ALTER TABLE `ws_bbb_files_categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_announcements`
--

DROP TABLE IF EXISTS `ws_bbb_forum_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_announcements` (
  `announceID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL DEFAULT '0',
  `readgrps` text NOT NULL,
  `userID` int(11) NOT NULL DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  `topic` varchar(255) NOT NULL DEFAULT '',
  `announcement` text NOT NULL,
  PRIMARY KEY (`announceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_announcements`
--

LOCK TABLES `ws_bbb_forum_announcements` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_forum_announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_boards`
--

DROP TABLE IF EXISTS `ws_bbb_forum_boards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_boards` (
  `boardID` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `info` varchar(255) NOT NULL DEFAULT '',
  `readgrps` text NOT NULL,
  `writegrps` text NOT NULL,
  `sort` int(2) NOT NULL DEFAULT '0',
  `topics` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`boardID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_boards`
--

LOCK TABLES `ws_bbb_forum_boards` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_boards` DISABLE KEYS */;
INSERT INTO `ws_bbb_forum_boards` VALUES (1,1,'Main Board','The general public board','','',1,0,0),(2,2,'Main Board','The general intern board','1','1',1,0,0);
/*!40000 ALTER TABLE `ws_bbb_forum_boards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_categories`
--

DROP TABLE IF EXISTS `ws_bbb_forum_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_categories` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `readgrps` text NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `info` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_categories`
--

LOCK TABLES `ws_bbb_forum_categories` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_categories` DISABLE KEYS */;
INSERT INTO `ws_bbb_forum_categories` VALUES (1,'','Test - cred = admin/hacklab2019','',2),(2,'1','Intern Boards','',3);
/*!40000 ALTER TABLE `ws_bbb_forum_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_groups`
--

DROP TABLE IF EXISTS `ws_bbb_forum_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_groups` (
  `fgrID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fgrID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_groups`
--

LOCK TABLES `ws_bbb_forum_groups` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_groups` DISABLE KEYS */;
INSERT INTO `ws_bbb_forum_groups` VALUES (1,'Old intern board users');
/*!40000 ALTER TABLE `ws_bbb_forum_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_moderators`
--

DROP TABLE IF EXISTS `ws_bbb_forum_moderators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_moderators` (
  `modID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`modID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_moderators`
--

LOCK TABLES `ws_bbb_forum_moderators` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_moderators` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_forum_moderators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_notify`
--

DROP TABLE IF EXISTS `ws_bbb_forum_notify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_notify` (
  `notifyID` int(11) NOT NULL AUTO_INCREMENT,
  `topicID` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notifyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_notify`
--

LOCK TABLES `ws_bbb_forum_notify` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_notify` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_forum_notify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_posts`
--

DROP TABLE IF EXISTS `ws_bbb_forum_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL DEFAULT '0',
  `topicID` int(11) NOT NULL DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  `poster` int(11) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_posts`
--

LOCK TABLES `ws_bbb_forum_posts` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_forum_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_ranks`
--

DROP TABLE IF EXISTS `ws_bbb_forum_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_ranks` (
  `rankID` int(11) NOT NULL AUTO_INCREMENT,
  `rank` varchar(255) NOT NULL DEFAULT '',
  `pic` varchar(255) NOT NULL DEFAULT '',
  `postmin` int(11) NOT NULL DEFAULT '0',
  `postmax` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rankID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_ranks`
--

LOCK TABLES `ws_bbb_forum_ranks` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_ranks` DISABLE KEYS */;
INSERT INTO `ws_bbb_forum_ranks` VALUES (1,'Rank 1','rank1.gif',0,9),(2,'Rank 2','rank2.gif',10,24),(3,'Rank 3','rank3.gif',25,49),(4,'Rank 4','rank4.gif',50,199),(5,'Rank 5','rank5.gif',200,399),(6,'Rank 6','rank6.gif',400,2147483647),(7,'Administrator','admin.gif',0,0),(8,'Moderator','moderator.gif',0,0);
/*!40000 ALTER TABLE `ws_bbb_forum_ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_forum_topics`
--

DROP TABLE IF EXISTS `ws_bbb_forum_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_forum_topics` (
  `topicID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `readgrps` text NOT NULL,
  `writegrps` text NOT NULL,
  `userID` int(11) NOT NULL DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  `topic` varchar(255) NOT NULL DEFAULT '',
  `lastdate` int(14) NOT NULL DEFAULT '0',
  `lastposter` int(11) NOT NULL DEFAULT '0',
  `lastpostID` int(11) NOT NULL DEFAULT '0',
  `replys` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `closed` int(1) NOT NULL DEFAULT '0',
  `moveID` int(11) NOT NULL DEFAULT '0',
  `sticky` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topicID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_forum_topics`
--

LOCK TABLES `ws_bbb_forum_topics` WRITE;
/*!40000 ALTER TABLE `ws_bbb_forum_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_forum_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_gallery`
--

DROP TABLE IF EXISTS `ws_bbb_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_gallery` (
  `galleryID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` int(14) NOT NULL,
  `groupID` int(11) NOT NULL,
  PRIMARY KEY (`galleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_gallery`
--

LOCK TABLES `ws_bbb_gallery` WRITE;
/*!40000 ALTER TABLE `ws_bbb_gallery` DISABLE KEYS */;
INSERT INTO `ws_bbb_gallery` VALUES (1,1,'test',1563022606,0);
/*!40000 ALTER TABLE `ws_bbb_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_gallery_groups`
--

DROP TABLE IF EXISTS `ws_bbb_gallery_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_gallery_groups` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_gallery_groups`
--

LOCK TABLES `ws_bbb_gallery_groups` WRITE;
/*!40000 ALTER TABLE `ws_bbb_gallery_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_gallery_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_gallery_pictures`
--

DROP TABLE IF EXISTS `ws_bbb_gallery_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_gallery_pictures` (
  `picID` int(11) NOT NULL AUTO_INCREMENT,
  `galleryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `comments` int(1) NOT NULL DEFAULT '1',
  `votes` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`picID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_gallery_pictures`
--

LOCK TABLES `ws_bbb_gallery_pictures` WRITE;
/*!40000 ALTER TABLE `ws_bbb_gallery_pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_gallery_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_games`
--

DROP TABLE IF EXISTS `ws_bbb_games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_games` (
  `gameID` int(3) NOT NULL AUTO_INCREMENT,
  `tag` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`gameID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_games`
--

LOCK TABLES `ws_bbb_games` WRITE;
/*!40000 ALTER TABLE `ws_bbb_games` DISABLE KEYS */;
INSERT INTO `ws_bbb_games` VALUES (1,'cs','Counter-Strike'),(2,'ut','Unreal Tournament'),(3,'to','Tactical Ops'),(4,'hl2','Halflife 2'),(5,'wc3','Warcraft 3'),(6,'hl','Halflife'),(7,'bf','Battlefield 1942'),(8,'aa','Americas Army'),(9,'aoe','Age of Empires 3'),(10,'b21','Battlefield 2142'),(11,'bf2','Battlefield 2'),(12,'bfv','Battlefield Vietnam'),(13,'c3d','Carom 3D'),(14,'cc3','Command &amp; Conquer'),(15,'cd2','Call of Duty 2'),(16,'cd4','Call of Duty 4'),(17,'cod','Call of Duty'),(18,'coh','Company of Heroes'),(19,'crw','Crysis Wars'),(20,'cry','Crysis'),(21,'css','Counter-Strike: Source'),(22,'cz','Counter-Strike: Condition Zero'),(23,'dds','Day of Defeat: Source'),(24,'dod','Day of Defeat'),(25,'dow','Dawn of War'),(26,'dta','DotA'),(27,'et','Enemy Territory'),(28,'fc','FarCry'),(29,'fer','F.E.A.R.'),(30,'fif','FIFA'),(31,'fl','Frontlines: Fuel of War'),(32,'hal','HALO'),(33,'jk2','Jedi Knight 2'),(34,'jk3','Jedi Knight 3'),(35,'lfs','Live for Speed'),(36,'lr2','LotR: Battle for Middle Earth 2'),(37,'lr','LotR: Battle for Middle Earth'),(38,'moh','Medal of Hornor'),(39,'nfs','Need for Speed'),(40,'pes','Pro Evolution Soccer'),(41,'q3','Quake 3'),(42,'q4','Quake 4'),(43,'ql','Quakelive'),(44,'rdg','Race Driver Grid'),(45,'sc2','Starcraft 2'),(46,'sc','Starcraft'),(47,'sof','Soldier of Fortune 2'),(48,'sw2','Star Wars: Battlefront 2'),(49,'sw','Star Wars: Battlefront'),(50,'swa','SWAT 4'),(51,'tf2','Team Fortress 2'),(52,'tf','Team Fortress'),(53,'tm','TrackMania'),(54,'ut3','Unreal Tournament 3'),(55,'ut4','Unreal Tournament 2004'),(56,'war','War Rock'),(57,'wic','World in Conflict'),(58,'wow','World of Warcraft'),(59,'wrs','Warsow');
/*!40000 ALTER TABLE `ws_bbb_games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_guestbook`
--

DROP TABLE IF EXISTS `ws_bbb_guestbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_guestbook` (
  `gbID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hp` varchar(255) NOT NULL DEFAULT '',
  `icq` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `admincomment` text NOT NULL,
  PRIMARY KEY (`gbID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_guestbook`
--

LOCK TABLES `ws_bbb_guestbook` WRITE;
/*!40000 ALTER TABLE `ws_bbb_guestbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_guestbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_history`
--

DROP TABLE IF EXISTS `ws_bbb_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_history` (
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_history`
--

LOCK TABLES `ws_bbb_history` WRITE;
/*!40000 ALTER TABLE `ws_bbb_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_imprint`
--

DROP TABLE IF EXISTS `ws_bbb_imprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_imprint` (
  `imprintID` int(11) NOT NULL AUTO_INCREMENT,
  `imprint` text NOT NULL,
  PRIMARY KEY (`imprintID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_imprint`
--

LOCK TABLES `ws_bbb_imprint` WRITE;
/*!40000 ALTER TABLE `ws_bbb_imprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_imprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_links`
--

DROP TABLE IF EXISTS `ws_bbb_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_links` (
  `linkID` int(11) NOT NULL AUTO_INCREMENT,
  `linkcatID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `info` varchar(255) NOT NULL DEFAULT '',
  `banner` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`linkID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_links`
--

LOCK TABLES `ws_bbb_links` WRITE;
/*!40000 ALTER TABLE `ws_bbb_links` DISABLE KEYS */;
INSERT INTO `ws_bbb_links` VALUES (1,1,'webSPELL.org','http://www.webspell.org','webspell.org: Webdesign und Webdevelopment','1.gif');
/*!40000 ALTER TABLE `ws_bbb_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_links_categorys`
--

DROP TABLE IF EXISTS `ws_bbb_links_categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_links_categorys` (
  `linkcatID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`linkcatID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_links_categorys`
--

LOCK TABLES `ws_bbb_links_categorys` WRITE;
/*!40000 ALTER TABLE `ws_bbb_links_categorys` DISABLE KEYS */;
INSERT INTO `ws_bbb_links_categorys` VALUES (1,'Webdesign');
/*!40000 ALTER TABLE `ws_bbb_links_categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_linkus`
--

DROP TABLE IF EXISTS `ws_bbb_linkus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_linkus` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `file` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`bannerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_linkus`
--

LOCK TABLES `ws_bbb_linkus` WRITE;
/*!40000 ALTER TABLE `ws_bbb_linkus` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_linkus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_lock`
--

DROP TABLE IF EXISTS `ws_bbb_lock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_lock` (
  `time` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_lock`
--

LOCK TABLES `ws_bbb_lock` WRITE;
/*!40000 ALTER TABLE `ws_bbb_lock` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_lock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_messenger`
--

DROP TABLE IF EXISTS `ws_bbb_messenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_messenger` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  `fromuser` int(11) NOT NULL DEFAULT '0',
  `touser` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `viewed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_messenger`
--

LOCK TABLES `ws_bbb_messenger` WRITE;
/*!40000 ALTER TABLE `ws_bbb_messenger` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_messenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_news`
--

DROP TABLE IF EXISTS `ws_bbb_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `rubric` int(11) NOT NULL DEFAULT '0',
  `screens` text NOT NULL,
  `poster` int(11) NOT NULL DEFAULT '0',
  `link1` varchar(255) NOT NULL DEFAULT '',
  `url1` varchar(255) NOT NULL DEFAULT '',
  `window1` int(11) NOT NULL DEFAULT '0',
  `link2` varchar(255) NOT NULL DEFAULT '',
  `url2` varchar(255) NOT NULL DEFAULT '',
  `window2` int(11) NOT NULL DEFAULT '0',
  `link3` varchar(255) NOT NULL DEFAULT '',
  `url3` varchar(255) NOT NULL DEFAULT '',
  `window3` int(11) NOT NULL DEFAULT '0',
  `link4` varchar(255) NOT NULL DEFAULT '',
  `url4` varchar(255) NOT NULL DEFAULT '',
  `window4` int(11) NOT NULL DEFAULT '0',
  `saved` int(1) NOT NULL DEFAULT '1',
  `published` int(11) NOT NULL DEFAULT '0',
  `comments` int(1) NOT NULL DEFAULT '0',
  `cwID` int(11) NOT NULL DEFAULT '0',
  `intern` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`newsID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_news`
--

LOCK TABLES `ws_bbb_news` WRITE;
/*!40000 ALTER TABLE `ws_bbb_news` DISABLE KEYS */;
INSERT INTO `ws_bbb_news` VALUES (1,1563002897,0,'|1_1563002943.php',1,'','',0,'','',0,'','',0,'','',0,0,0,0,0,0);
/*!40000 ALTER TABLE `ws_bbb_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_news_contents`
--

DROP TABLE IF EXISTS `ws_bbb_news_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_news_contents` (
  `newsID` int(11) NOT NULL,
  `language` varchar(2) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_news_contents`
--

LOCK TABLES `ws_bbb_news_contents` WRITE;
/*!40000 ALTER TABLE `ws_bbb_news_contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_news_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_news_languages`
--

DROP TABLE IF EXISTS `ws_bbb_news_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_news_languages` (
  `langID` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL DEFAULT '',
  `lang` char(2) NOT NULL DEFAULT '',
  `alt` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`langID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_news_languages`
--

LOCK TABLES `ws_bbb_news_languages` WRITE;
/*!40000 ALTER TABLE `ws_bbb_news_languages` DISABLE KEYS */;
INSERT INTO `ws_bbb_news_languages` VALUES (1,'danish','dk','danish'),(2,'dutch','nl','dutch'),(3,'english','uk','english'),(4,'finnish','fi','finnish'),(5,'french','fr','french'),(6,'german','de','german'),(7,'hungarian','hu','hungarian'),(8,'italian','it','italian'),(9,'norwegian','no','norwegian'),(10,'spanish','es','spanish'),(11,'swedish','se','swedish'),(12,'czech','cz','czech'),(13,'croatian','hr','croatian'),(14,'lithuanian','lt','lithuanian'),(15,'polish','pl','polish'),(16,'portugese','pt','portugese'),(17,'slovak','sk','slovak');
/*!40000 ALTER TABLE `ws_bbb_news_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_news_rubrics`
--

DROP TABLE IF EXISTS `ws_bbb_news_rubrics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_news_rubrics` (
  `rubricID` int(11) NOT NULL AUTO_INCREMENT,
  `rubric` varchar(255) NOT NULL DEFAULT '',
  `pic` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`rubricID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_news_rubrics`
--

LOCK TABLES `ws_bbb_news_rubrics` WRITE;
/*!40000 ALTER TABLE `ws_bbb_news_rubrics` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_news_rubrics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_newsletter`
--

DROP TABLE IF EXISTS `ws_bbb_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_newsletter` (
  `email` varchar(255) NOT NULL DEFAULT '',
  `pass` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_newsletter`
--

LOCK TABLES `ws_bbb_newsletter` WRITE;
/*!40000 ALTER TABLE `ws_bbb_newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_partners`
--

DROP TABLE IF EXISTS `ws_bbb_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_partners` (
  `partnerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `banner` varchar(255) NOT NULL DEFAULT '',
  `date` int(14) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `displayed` varchar(255) NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT '0',
  PRIMARY KEY (`partnerID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_partners`
--

LOCK TABLES `ws_bbb_partners` WRITE;
/*!40000 ALTER TABLE `ws_bbb_partners` DISABLE KEYS */;
INSERT INTO `ws_bbb_partners` VALUES (1,'webSPELL 4','http://www.webspell.org','1.gif',1563002002,1,'1',0);
/*!40000 ALTER TABLE `ws_bbb_partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_poll`
--

DROP TABLE IF EXISTS `ws_bbb_poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_poll` (
  `pollID` int(10) NOT NULL AUTO_INCREMENT,
  `aktiv` int(1) NOT NULL DEFAULT '0',
  `laufzeit` bigint(20) NOT NULL DEFAULT '0',
  `titel` varchar(255) NOT NULL DEFAULT '',
  `o1` varchar(255) NOT NULL DEFAULT '',
  `o2` varchar(255) NOT NULL DEFAULT '',
  `o3` varchar(255) NOT NULL DEFAULT '',
  `o4` varchar(255) NOT NULL DEFAULT '',
  `o5` varchar(255) NOT NULL DEFAULT '',
  `o6` varchar(255) NOT NULL DEFAULT '',
  `o7` varchar(255) NOT NULL DEFAULT '',
  `o8` varchar(255) NOT NULL DEFAULT '',
  `o9` varchar(255) NOT NULL DEFAULT '',
  `o10` varchar(255) NOT NULL DEFAULT '',
  `comments` int(1) NOT NULL DEFAULT '0',
  `hosts` text NOT NULL,
  `intern` int(1) NOT NULL DEFAULT '0',
  `userIDs` text NOT NULL,
  PRIMARY KEY (`pollID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_poll`
--

LOCK TABLES `ws_bbb_poll` WRITE;
/*!40000 ALTER TABLE `ws_bbb_poll` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_poll_votes`
--

DROP TABLE IF EXISTS `ws_bbb_poll_votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_poll_votes` (
  `pollID` int(10) NOT NULL DEFAULT '0',
  `o1` int(11) NOT NULL DEFAULT '0',
  `o2` int(11) NOT NULL DEFAULT '0',
  `o3` int(11) NOT NULL DEFAULT '0',
  `o4` int(11) NOT NULL DEFAULT '0',
  `o5` int(11) NOT NULL DEFAULT '0',
  `o6` int(11) NOT NULL DEFAULT '0',
  `o7` int(11) NOT NULL DEFAULT '0',
  `o8` int(11) NOT NULL DEFAULT '0',
  `o9` int(11) NOT NULL DEFAULT '0',
  `o10` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pollID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_poll_votes`
--

LOCK TABLES `ws_bbb_poll_votes` WRITE;
/*!40000 ALTER TABLE `ws_bbb_poll_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_poll_votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_scrolltext`
--

DROP TABLE IF EXISTS `ws_bbb_scrolltext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_scrolltext` (
  `text` longtext NOT NULL,
  `delay` int(11) NOT NULL DEFAULT '100',
  `direction` varchar(255) NOT NULL DEFAULT '',
  `color` varchar(7) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_scrolltext`
--

LOCK TABLES `ws_bbb_scrolltext` WRITE;
/*!40000 ALTER TABLE `ws_bbb_scrolltext` DISABLE KEYS */;
INSERT INTO `ws_bbb_scrolltext` VALUES ('Test - account credentials = admin/hacklab2019',3,'left','');
/*!40000 ALTER TABLE `ws_bbb_scrolltext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_servers`
--

DROP TABLE IF EXISTS `ws_bbb_servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_servers` (
  `serverID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `game` char(3) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`serverID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_servers`
--

LOCK TABLES `ws_bbb_servers` WRITE;
/*!40000 ALTER TABLE `ws_bbb_servers` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_settings`
--

DROP TABLE IF EXISTS `ws_bbb_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_settings` (
  `settingID` int(11) NOT NULL AUTO_INCREMENT,
  `hpurl` varchar(255) NOT NULL DEFAULT '',
  `clanname` varchar(255) NOT NULL DEFAULT '',
  `clantag` varchar(255) NOT NULL DEFAULT '',
  `adminname` varchar(255) NOT NULL DEFAULT '',
  `adminemail` varchar(255) NOT NULL DEFAULT '',
  `news` int(11) NOT NULL DEFAULT '0',
  `newsarchiv` int(11) NOT NULL DEFAULT '0',
  `headlines` int(11) NOT NULL DEFAULT '0',
  `headlineschars` int(11) NOT NULL DEFAULT '0',
  `topnewschars` int(11) NOT NULL DEFAULT '0',
  `articles` int(11) NOT NULL DEFAULT '0',
  `latestarticles` int(11) NOT NULL DEFAULT '0',
  `articleschars` int(11) NOT NULL DEFAULT '0',
  `clanwars` int(11) NOT NULL DEFAULT '0',
  `results` int(11) NOT NULL DEFAULT '0',
  `upcoming` int(11) NOT NULL DEFAULT '0',
  `shoutbox` int(11) NOT NULL DEFAULT '0',
  `sball` int(11) NOT NULL DEFAULT '0',
  `sbrefresh` int(11) NOT NULL DEFAULT '0',
  `topics` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `latesttopics` int(11) NOT NULL DEFAULT '0',
  `latesttopicchars` int(11) NOT NULL DEFAULT '0',
  `awards` int(11) NOT NULL DEFAULT '0',
  `demos` int(11) NOT NULL DEFAULT '0',
  `guestbook` int(11) NOT NULL DEFAULT '0',
  `feedback` int(11) NOT NULL DEFAULT '0',
  `messages` int(11) NOT NULL DEFAULT '0',
  `users` int(11) NOT NULL DEFAULT '0',
  `profilelast` int(11) NOT NULL DEFAULT '0',
  `topnewsID` int(11) NOT NULL DEFAULT '0',
  `sessionduration` int(3) NOT NULL DEFAULT '0',
  `closed` int(1) NOT NULL DEFAULT '0',
  `gb_info` int(1) NOT NULL DEFAULT '1',
  `imprint` int(1) NOT NULL DEFAULT '0',
  `picsize_l` int(11) NOT NULL DEFAULT '450',
  `picsize_h` int(11) NOT NULL DEFAULT '500',
  `pictures` int(11) NOT NULL DEFAULT '12',
  `publicadmin` int(1) NOT NULL DEFAULT '1',
  `thumbwidth` int(11) NOT NULL DEFAULT '130',
  `usergalleries` int(1) NOT NULL DEFAULT '1',
  `maxusergalleries` int(11) NOT NULL DEFAULT '1048576',
  `default_language` varchar(2) NOT NULL DEFAULT 'uk',
  `insertlinks` int(1) NOT NULL DEFAULT '1',
  `search_min_len` int(3) NOT NULL DEFAULT '3',
  `max_wrong_pw` int(2) NOT NULL DEFAULT '10',
  `captcha_math` int(1) NOT NULL DEFAULT '2',
  `captcha_bgcol` varchar(7) NOT NULL DEFAULT '#FFFFFF',
  `captcha_fontcol` varchar(7) NOT NULL DEFAULT '#000000',
  `captcha_type` int(1) NOT NULL DEFAULT '2',
  `captcha_noise` int(3) NOT NULL DEFAULT '100',
  `captcha_linenoise` int(2) NOT NULL DEFAULT '10',
  `autoresize` int(1) NOT NULL DEFAULT '2',
  `bancheck` int(13) NOT NULL,
  PRIMARY KEY (`settingID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_settings`
--

LOCK TABLES `ws_bbb_settings` WRITE;
/*!40000 ALTER TABLE `ws_bbb_settings` DISABLE KEYS */;
INSERT INTO `ws_bbb_settings` VALUES (1,'192.168.0.1','Clanname','MyClan','Admin-Name','admin@hacklab.com',10,20,10,22,200,20,5,20,20,5,5,5,30,60,20,10,10,18,20,20,20,20,20,60,10,27,0,0,1,0,450,500,12,1,130,1,1048576,'uk',1,3,10,2,'#FFFFFF','#000000',2,100,10,2,1563022802);
/*!40000 ALTER TABLE `ws_bbb_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_shoutbox`
--

DROP TABLE IF EXISTS `ws_bbb_shoutbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_shoutbox` (
  `shoutID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `message` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`shoutID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_shoutbox`
--

LOCK TABLES `ws_bbb_shoutbox` WRITE;
/*!40000 ALTER TABLE `ws_bbb_shoutbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_shoutbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_smileys`
--

DROP TABLE IF EXISTS `ws_bbb_smileys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_smileys` (
  `smileyID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alt` varchar(255) NOT NULL DEFAULT '',
  `pattern` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`smileyID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_smileys`
--

LOCK TABLES `ws_bbb_smileys` WRITE;
/*!40000 ALTER TABLE `ws_bbb_smileys` DISABLE KEYS */;
INSERT INTO `ws_bbb_smileys` VALUES (1,'biggrin.gif','amused',':D'),(2,'confused.gif','confused','?('),(3,'crying.gif','sad',';('),(4,'pleased.gif','pleased',':]'),(5,'happy.gif','happy','=)'),(6,'smile.gif','smiling',':)'),(7,'wink.gif','wink',';)'),(8,'frown.gif','unhappy',':('),(9,'tongue.gif','tongue',':p'),(10,'tongue2.gif','funny',';p'),(11,'redface.gif','tired',':O'),(12,'cool.gif','cool','8)'),(13,'eek.gif','shocked','8o'),(14,'evil.gif','devilish',':evil:'),(15,'mad.gif','angry','X('),(16,'crazy.gif','crazy','^^');
/*!40000 ALTER TABLE `ws_bbb_smileys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_sponsors`
--

DROP TABLE IF EXISTS `ws_bbb_sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_sponsors` (
  `sponsorID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `banner` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '1',
  `banner_small` varchar(255) NOT NULL DEFAULT '',
  `displayed` varchar(255) NOT NULL DEFAULT '1',
  `mainsponsor` varchar(255) NOT NULL DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sponsorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_sponsors`
--

LOCK TABLES `ws_bbb_sponsors` WRITE;
/*!40000 ALTER TABLE `ws_bbb_sponsors` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_sponsors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_squads`
--

DROP TABLE IF EXISTS `ws_bbb_squads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_squads` (
  `squadID` int(11) NOT NULL AUTO_INCREMENT,
  `gamesquad` int(11) NOT NULL DEFAULT '1',
  `games` text NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `icon_small` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`squadID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_squads`
--

LOCK TABLES `ws_bbb_squads` WRITE;
/*!40000 ALTER TABLE `ws_bbb_squads` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_squads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_squads_members`
--

DROP TABLE IF EXISTS `ws_bbb_squads_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_squads_members` (
  `sqmID` int(11) NOT NULL AUTO_INCREMENT,
  `squadID` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL DEFAULT '0',
  `position` varchar(255) NOT NULL DEFAULT '',
  `activity` int(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `joinmember` int(1) NOT NULL DEFAULT '0',
  `warmember` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sqmID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_squads_members`
--

LOCK TABLES `ws_bbb_squads_members` WRITE;
/*!40000 ALTER TABLE `ws_bbb_squads_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_squads_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_static`
--

DROP TABLE IF EXISTS `ws_bbb_static`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_static` (
  `staticID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `accesslevel` int(1) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`staticID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_static`
--

LOCK TABLES `ws_bbb_static` WRITE;
/*!40000 ALTER TABLE `ws_bbb_static` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_static` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_styles`
--

DROP TABLE IF EXISTS `ws_bbb_styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_styles` (
  `styleID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `bgpage` varchar(255) NOT NULL DEFAULT '',
  `border` varchar(255) NOT NULL DEFAULT '',
  `bghead` varchar(255) NOT NULL DEFAULT '',
  `bgcat` varchar(255) NOT NULL DEFAULT '',
  `bg1` varchar(255) NOT NULL DEFAULT '',
  `bg2` varchar(255) NOT NULL DEFAULT '',
  `bg3` varchar(255) NOT NULL DEFAULT '',
  `bg4` varchar(255) NOT NULL DEFAULT '',
  `win` varchar(255) NOT NULL DEFAULT '',
  `loose` varchar(255) NOT NULL DEFAULT '',
  `draw` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`styleID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_styles`
--

LOCK TABLES `ws_bbb_styles` WRITE;
/*!40000 ALTER TABLE `ws_bbb_styles` DISABLE KEYS */;
INSERT INTO `ws_bbb_styles` VALUES (1,'webSPELL v4','#E6E6E6','#666666','#333333','#FFFFFF','#FFFFFF','#F2F2F2','#F2F2F2','#D9D9D9','#00CC00','#DD0000','#FF6600');
/*!40000 ALTER TABLE `ws_bbb_styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_upcoming`
--

DROP TABLE IF EXISTS `ws_bbb_upcoming`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_upcoming` (
  `upID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `type` char(1) NOT NULL DEFAULT '',
  `squad` int(11) NOT NULL DEFAULT '0',
  `opponent` varchar(255) NOT NULL DEFAULT '',
  `opptag` varchar(255) NOT NULL DEFAULT '',
  `opphp` varchar(255) NOT NULL DEFAULT '',
  `oppcountry` char(2) NOT NULL DEFAULT '',
  `maps` varchar(255) NOT NULL DEFAULT '',
  `server` varchar(255) NOT NULL DEFAULT '',
  `league` varchar(255) NOT NULL DEFAULT '',
  `leaguehp` varchar(255) NOT NULL DEFAULT '',
  `warinfo` text NOT NULL,
  `short` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `enddate` int(14) NOT NULL DEFAULT '0',
  `country` char(2) NOT NULL DEFAULT '',
  `location` varchar(255) NOT NULL DEFAULT '',
  `locationhp` varchar(255) NOT NULL DEFAULT '',
  `dateinfo` text NOT NULL,
  PRIMARY KEY (`upID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_upcoming`
--

LOCK TABLES `ws_bbb_upcoming` WRITE;
/*!40000 ALTER TABLE `ws_bbb_upcoming` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_upcoming` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_upcoming_announce`
--

DROP TABLE IF EXISTS `ws_bbb_upcoming_announce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_upcoming_announce` (
  `annID` int(11) NOT NULL AUTO_INCREMENT,
  `upID` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`annID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_upcoming_announce`
--

LOCK TABLES `ws_bbb_upcoming_announce` WRITE;
/*!40000 ALTER TABLE `ws_bbb_upcoming_announce` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_upcoming_announce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_user`
--

DROP TABLE IF EXISTS `ws_bbb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `registerdate` int(14) NOT NULL DEFAULT '0',
  `lastlogin` int(14) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `email_hide` int(1) NOT NULL DEFAULT '1',
  `email_change` varchar(255) NOT NULL,
  `email_activate` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `sex` char(1) NOT NULL DEFAULT 'u',
  `country` varchar(255) NOT NULL DEFAULT '',
  `town` varchar(255) NOT NULL DEFAULT '',
  `birthday` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `icq` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `usertext` varchar(255) NOT NULL DEFAULT '',
  `userpic` varchar(255) NOT NULL DEFAULT '',
  `clantag` varchar(255) NOT NULL DEFAULT '',
  `clanname` varchar(255) NOT NULL DEFAULT '',
  `clanhp` varchar(255) NOT NULL DEFAULT '',
  `clanirc` varchar(255) NOT NULL DEFAULT '',
  `clanhistory` varchar(255) NOT NULL DEFAULT '',
  `cpu` varchar(255) NOT NULL DEFAULT '',
  `mainboard` varchar(255) NOT NULL DEFAULT '',
  `ram` varchar(255) NOT NULL DEFAULT '',
  `monitor` varchar(255) NOT NULL DEFAULT '',
  `graphiccard` varchar(255) NOT NULL DEFAULT '',
  `soundcard` varchar(255) NOT NULL DEFAULT '',
  `verbindung` varchar(255) NOT NULL DEFAULT '',
  `keyboard` varchar(255) NOT NULL DEFAULT '',
  `mouse` varchar(255) NOT NULL DEFAULT '',
  `mousepad` varchar(255) NOT NULL DEFAULT '',
  `newsletter` int(1) NOT NULL DEFAULT '1',
  `homepage` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `pmgot` int(11) NOT NULL DEFAULT '0',
  `pmsent` int(11) NOT NULL DEFAULT '0',
  `visits` int(11) NOT NULL DEFAULT '0',
  `banned` varchar(255) DEFAULT NULL,
  `ban_reason` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `topics` text NOT NULL,
  `articles` text NOT NULL,
  `demos` text NOT NULL,
  `files` text NOT NULL,
  `gallery_pictures` text NOT NULL,
  `mailonpm` int(1) NOT NULL DEFAULT '0',
  `userdescription` text NOT NULL,
  `activated` varchar(255) NOT NULL DEFAULT '1',
  `language` varchar(2) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_user`
--

LOCK TABLES `ws_bbb_user` WRITE;
/*!40000 ALTER TABLE `ws_bbb_user` DISABLE KEYS */;
INSERT INTO `ws_bbb_user` VALUES (1,1563001997,1563023104,'admin','2603fa149032ab1f6724c61df310d1cc','admin','admin@hacklab.com',1,'','','','','u','','','1970-01-01 00:00:00','','','','','','','','','','','','','','','','','','','',1,'','',0,0,0,NULL,'','','|','','','','',0,'','1','');
/*!40000 ALTER TABLE `ws_bbb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_user_forum_groups`
--

DROP TABLE IF EXISTS `ws_bbb_user_forum_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_user_forum_groups` (
  `usfgID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT '0',
  `1` int(1) NOT NULL,
  PRIMARY KEY (`usfgID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_user_forum_groups`
--

LOCK TABLES `ws_bbb_user_forum_groups` WRITE;
/*!40000 ALTER TABLE `ws_bbb_user_forum_groups` DISABLE KEYS */;
INSERT INTO `ws_bbb_user_forum_groups` VALUES (1,1,1);
/*!40000 ALTER TABLE `ws_bbb_user_forum_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_user_gbook`
--

DROP TABLE IF EXISTS `ws_bbb_user_gbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_user_gbook` (
  `userID` int(11) NOT NULL DEFAULT '0',
  `gbID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hp` varchar(255) NOT NULL DEFAULT '',
  `icq` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  PRIMARY KEY (`gbID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_user_gbook`
--

LOCK TABLES `ws_bbb_user_gbook` WRITE;
/*!40000 ALTER TABLE `ws_bbb_user_gbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_user_gbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_user_groups`
--

DROP TABLE IF EXISTS `ws_bbb_user_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_user_groups` (
  `usgID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT '0',
  `news` int(1) NOT NULL DEFAULT '0',
  `news_writer` int(1) NOT NULL,
  `newsletter` int(1) NOT NULL DEFAULT '0',
  `polls` int(1) NOT NULL DEFAULT '0',
  `forum` int(1) NOT NULL DEFAULT '0',
  `moderator` int(1) NOT NULL DEFAULT '0',
  `clanwars` int(1) NOT NULL DEFAULT '0',
  `feedback` int(1) NOT NULL DEFAULT '0',
  `user` int(1) NOT NULL DEFAULT '0',
  `page` int(1) NOT NULL DEFAULT '0',
  `files` int(1) NOT NULL DEFAULT '0',
  `cash` int(1) NOT NULL DEFAULT '0',
  `gallery` int(1) NOT NULL,
  `super` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usgID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_user_groups`
--

LOCK TABLES `ws_bbb_user_groups` WRITE;
/*!40000 ALTER TABLE `ws_bbb_user_groups` DISABLE KEYS */;
INSERT INTO `ws_bbb_user_groups` VALUES (1,1,1,0,1,1,1,1,1,1,1,1,1,0,0,1);
/*!40000 ALTER TABLE `ws_bbb_user_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_user_visitors`
--

DROP TABLE IF EXISTS `ws_bbb_user_visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_user_visitors` (
  `visitID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT '0',
  `visitor` int(11) NOT NULL DEFAULT '0',
  `date` int(14) NOT NULL DEFAULT '0',
  PRIMARY KEY (`visitID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_user_visitors`
--

LOCK TABLES `ws_bbb_user_visitors` WRITE;
/*!40000 ALTER TABLE `ws_bbb_user_visitors` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_user_visitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_whoisonline`
--

DROP TABLE IF EXISTS `ws_bbb_whoisonline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_whoisonline` (
  `time` int(14) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `userID` int(11) NOT NULL DEFAULT '0',
  `site` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_whoisonline`
--

LOCK TABLES `ws_bbb_whoisonline` WRITE;
/*!40000 ALTER TABLE `ws_bbb_whoisonline` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_bbb_whoisonline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_bbb_whowasonline`
--

DROP TABLE IF EXISTS `ws_bbb_whowasonline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_bbb_whowasonline` (
  `time` int(14) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `userID` int(11) NOT NULL DEFAULT '0',
  `site` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_bbb_whowasonline`
--

LOCK TABLES `ws_bbb_whowasonline` WRITE;
/*!40000 ALTER TABLE `ws_bbb_whowasonline` DISABLE KEYS */;
INSERT INTO `ws_bbb_whowasonline` VALUES (1563023104,'',1,'files');
/*!40000 ALTER TABLE `ws_bbb_whowasonline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'webspell'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31  7:05:35
