-- MySQL dump 10.13  Distrib 5.6.35, for Win32 (AMD64)
--
-- Host: localhost    Database: webcalendar
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
-- Current Database: `webcalendar`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `webcalendar` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `webcalendar`;

--
-- Table structure for table `webcal_access_function`
--

DROP TABLE IF EXISTS `webcal_access_function`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_access_function` (
  `cal_login` varchar(25) NOT NULL,
  `cal_permissions` varchar(64) NOT NULL,
  PRIMARY KEY (`cal_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_access_function`
--

LOCK TABLES `webcal_access_function` WRITE;
/*!40000 ALTER TABLE `webcal_access_function` DISABLE KEYS */;
INSERT INTO `webcal_access_function` VALUES ('admin','YYYYYYYYYYYYYYYYYYYYYYYYYYY');
/*!40000 ALTER TABLE `webcal_access_function` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_access_user`
--

DROP TABLE IF EXISTS `webcal_access_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_access_user` (
  `cal_login` varchar(25) NOT NULL,
  `cal_other_user` varchar(25) NOT NULL,
  `cal_can_view` int(11) NOT NULL DEFAULT '0',
  `cal_can_edit` int(11) NOT NULL DEFAULT '0',
  `cal_can_approve` int(11) NOT NULL DEFAULT '0',
  `cal_can_invite` char(1) DEFAULT 'Y',
  `cal_can_email` char(1) DEFAULT 'Y',
  `cal_see_time_only` char(1) DEFAULT 'N',
  PRIMARY KEY (`cal_login`,`cal_other_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_access_user`
--

LOCK TABLES `webcal_access_user` WRITE;
/*!40000 ALTER TABLE `webcal_access_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_access_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_asst`
--

DROP TABLE IF EXISTS `webcal_asst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_asst` (
  `cal_boss` varchar(25) NOT NULL,
  `cal_assistant` varchar(25) NOT NULL,
  PRIMARY KEY (`cal_boss`,`cal_assistant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_asst`
--

LOCK TABLES `webcal_asst` WRITE;
/*!40000 ALTER TABLE `webcal_asst` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_asst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_blob`
--

DROP TABLE IF EXISTS `webcal_blob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_blob` (
  `cal_blob_id` int(11) NOT NULL,
  `cal_id` int(11) DEFAULT NULL,
  `cal_login` varchar(25) DEFAULT NULL,
  `cal_name` varchar(30) DEFAULT NULL,
  `cal_description` varchar(128) DEFAULT NULL,
  `cal_size` int(11) DEFAULT NULL,
  `cal_mime_type` varchar(50) DEFAULT NULL,
  `cal_type` char(1) NOT NULL,
  `cal_mod_date` int(11) NOT NULL,
  `cal_mod_time` int(11) NOT NULL,
  `cal_blob` longblob,
  PRIMARY KEY (`cal_blob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_blob`
--

LOCK TABLES `webcal_blob` WRITE;
/*!40000 ALTER TABLE `webcal_blob` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_blob` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_categories`
--

DROP TABLE IF EXISTS `webcal_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_owner` varchar(25) DEFAULT NULL,
  `cat_name` varchar(80) NOT NULL,
  `cat_color` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_categories`
--

LOCK TABLES `webcal_categories` WRITE;
/*!40000 ALTER TABLE `webcal_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_config`
--

DROP TABLE IF EXISTS `webcal_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_config` (
  `cal_setting` varchar(50) NOT NULL,
  `cal_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cal_setting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_config`
--

LOCK TABLES `webcal_config` WRITE;
/*!40000 ALTER TABLE `webcal_config` DISABLE KEYS */;
INSERT INTO `webcal_config` VALUES ('ADD_LINK_IN_VIEWS','N'),('ADMIN_OVERRIDE_UAC','Y'),('ALLOW_ATTACH','N'),('ALLOW_ATTACH_ANY','N'),('ALLOW_ATTACH_PART','N'),('ALLOW_COLOR_CUSTOMIZATION','Y'),('ALLOW_COMMENTS','N'),('ALLOW_COMMENTS_ANY','N'),('ALLOW_COMMENTS_PART','N'),('ALLOW_CONFLICTS','N'),('ALLOW_CONFLICT_OVERRIDE','Y'),('ALLOW_EXTERNAL_HEADER','N'),('ALLOW_EXTERNAL_USERS','N'),('ALLOW_HTML_DESCRIPTION','Y'),('ALLOW_SELF_REGISTRATION','N'),('ALLOW_USER_HEADER','N'),('ALLOW_USER_THEMES','Y'),('ALLOW_VIEW_OTHER','Y'),('APPLICATION_NAME','Test Calendar (user creds = hacklab/hacklab)'),('APPROVE_ASSISTANT_EVENT','Y'),('AUTO_REFRESH','N'),('AUTO_REFRESH_TIME','0'),('BGCOLOR','#FFFFFF'),('BGREPEAT','repeat fixed center'),('BOLD_DAYS_IN_YEAR','Y'),('CAPTIONS','#B04040'),('CATEGORIES_ENABLED','Y'),('CELLBG','#C0C0C0'),('CONFLICT_REPEAT_MONTHS','6'),('CUSTOM_HEADER','N'),('CUSTOM_SCRIPT','N'),('CUSTOM_TRAILER','N'),('DATE_FORMAT','LANGUAGE_DEFINED'),('DATE_FORMAT_MD','LANGUAGE_DEFINED'),('DATE_FORMAT_MY','LANGUAGE_DEFINED'),('DATE_FORMAT_TASK','LANGUAGE_DEFINED'),('DEMO_MODE','N'),('DISABLE_ACCESS_FIELD','N'),('DISABLE_CROSSDAY_EVENTS','N'),('DISABLE_LOCATION_FIELD','N'),('DISABLE_PARTICIPANTS_FIELD','N'),('DISABLE_POPUPS','N'),('DISABLE_PRIORITY_FIELD','N'),('DISABLE_REMINDER_FIELD','N'),('DISABLE_REPEATING_FIELD','N'),('DISABLE_URL_FIELD','Y'),('DISPLAY_ALL_DAYS_IN_MONTH','N'),('DISPLAY_CREATED_BYPROXY','Y'),('DISPLAY_DESC_PRINT_DAY','Y'),('DISPLAY_END_TIMES','N'),('DISPLAY_LOCATION','N'),('DISPLAY_LONG_DAYS','N'),('DISPLAY_MINUTES','N'),('DISPLAY_MOON_PHASES','N'),('DISPLAY_SM_MONTH','Y'),('DISPLAY_TASKS','N'),('DISPLAY_TASKS_IN_GRID','N'),('DISPLAY_UNAPPROVED','Y'),('DISPLAY_WEEKENDS','Y'),('DISPLAY_WEEKNUMBER','Y'),('EMAIL_ASSISTANT_EVENTS','Y'),('EMAIL_EVENT_ADDED','Y'),('EMAIL_EVENT_CREATE','N'),('EMAIL_EVENT_DELETED','Y'),('EMAIL_EVENT_REJECTED','Y'),('EMAIL_EVENT_UPDATED','Y'),('EMAIL_FALLBACK_FROM','youremailhere'),('EMAIL_HTML','N'),('EMAIL_MAILER','mail'),('EMAIL_REMINDER','Y'),('ENABLE_CAPTCHA','N'),('ENABLE_GRADIENTS','N'),('ENABLE_ICON_UPLOADS','N'),('ENTRY_SLOTS','144'),('EXTERNAL_NOTIFICATIONS','N'),('EXTERNAL_REMINDERS','N'),('FONTS','Arial, Helvetica, sans-serif'),('FREEBUSY_ENABLED','N'),('GENERAL_USE_GMT','Y'),('GROUPS_ENABLED','N'),('H2COLOR','#000000'),('HASEVENTSBG','#FFFF33'),('IMPORT_CATEGORIES','Y'),('LANGUAGE','none'),('LIMIT_APPTS','N'),('LIMIT_APPTS_NUMBER','6'),('LIMIT_DESCRIPTION_SIZE','N'),('MENU_DATE_TOP','Y'),('MENU_ENABLED','Y'),('MENU_THEME','default'),('MYEVENTS','#006000'),('NONUSER_AT_TOP','Y'),('NONUSER_ENABLED','Y'),('OTHERMONTHBG','#D0D0D0'),('OVERRIDE_PUBLIC','N'),('OVERRIDE_PUBLIC_TEXT','Not available'),('PARTICIPANTS_IN_POPUP','N'),('PLUGINS_ENABLED','N'),('POPUP_BG','#FFFFFF'),('POPUP_FG','#000000'),('PUBLIC_ACCESS','N'),('PUBLIC_ACCESS_ADD_NEEDS_APPROVAL','N'),('PUBLIC_ACCESS_CAN_ADD','N'),('PUBLIC_ACCESS_DEFAULT_SELECTED','N'),('PUBLIC_ACCESS_DEFAULT_VISIBLE','N'),('PUBLIC_ACCESS_OTHERS','Y'),('PUBLIC_ACCESS_VIEW_PART','N'),('PUBLISH_ENABLED','Y'),('PULLDOWN_WEEKNUMBER','N'),('REMEMBER_LAST_LOGIN','N'),('REMINDER_DEFAULT','N'),('REMINDER_OFFSET','240'),('REMINDER_WITH_DATE','N'),('REMOTES_ENABLED','N'),('REPORTS_ENABLED','N'),('REQUIRE_APPROVALS','Y'),('RSS_ENABLED','N'),('SELF_REGISTRATION_BLACKLIST','N'),('SELF_REGISTRATION_FULL','Y'),('SEND_EMAIL','N'),('SERVER_TIMEZONE','America/New_York'),('SERVER_URL','http://192.168.0.1/'),('SITE_EXTRAS_IN_POPUP','N'),('SMTP_AUTH','N'),('SMTP_HOST','localhost'),('SMTP_PORT','25'),('STARTVIEW','month.php'),('SUMMARY_LENGTH','80'),('TABLEBG','#000000'),('TEXTCOLOR','#000000'),('THBG','#FFFFFF'),('THEME','none'),('THFG','#000000'),('TIMED_EVT_LEN','D'),('TIMEZONE','America/New_York'),('TIME_FORMAT','12'),('TIME_SLOTS','24'),('TIME_SPACER','&raquo;&nbsp;'),('TODAYCELLBG','#FFFF33'),('UAC_ENABLED','N'),('UPCOMING_ALLOW_OVR','N'),('UPCOMING_DISPLAY_CAT_ICONS','Y'),('UPCOMING_DISPLAY_LAYERS','N'),('UPCOMING_DISPLAY_LINKS','Y'),('UPCOMING_DISPLAY_POPUPS','Y'),('UPCOMING_EVENTS','N'),('USER_PUBLISH_ENABLED','Y'),('USER_PUBLISH_RW_ENABLED','Y'),('USER_RSS_ENABLED','N'),('USER_SEES_ONLY_HIS_GROUPS','Y'),('USER_SORT_ORDER','cal_lastname, cal_firstname'),('WEBCAL_PROGRAM_VERSION','v1.2.4'),('WEBCAL_TZ_CONVERSION','Y'),('WEEKENDBG','#D0D0D0'),('WEEKEND_START','6'),('WEEKNUMBER','#FF6633'),('WEEK_START','0'),('WORK_DAY_END_HOUR','17'),('WORK_DAY_START_HOUR','8');
/*!40000 ALTER TABLE `webcal_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_entry`
--

DROP TABLE IF EXISTS `webcal_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry` (
  `cal_id` int(11) NOT NULL,
  `cal_group_id` int(11) DEFAULT NULL,
  `cal_ext_for_id` int(11) DEFAULT NULL,
  `cal_create_by` varchar(25) NOT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_time` int(11) DEFAULT NULL,
  `cal_mod_date` int(11) DEFAULT NULL,
  `cal_mod_time` int(11) DEFAULT NULL,
  `cal_duration` int(11) NOT NULL,
  `cal_due_date` int(11) DEFAULT NULL,
  `cal_due_time` int(11) DEFAULT NULL,
  `cal_priority` int(11) DEFAULT '5',
  `cal_type` char(1) DEFAULT 'E',
  `cal_access` char(1) DEFAULT 'P',
  `cal_name` varchar(80) NOT NULL,
  `cal_location` varchar(100) DEFAULT NULL,
  `cal_url` varchar(100) DEFAULT NULL,
  `cal_completed` int(11) DEFAULT NULL,
  `cal_description` text,
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_entry`
--

LOCK TABLES `webcal_entry` WRITE;
/*!40000 ALTER TABLE `webcal_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_entry_categories`
--

DROP TABLE IF EXISTS `webcal_entry_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_categories` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `cat_owner` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_entry_categories`
--

LOCK TABLES `webcal_entry_categories` WRITE;
/*!40000 ALTER TABLE `webcal_entry_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_entry_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_entry_ext_user`
--

DROP TABLE IF EXISTS `webcal_entry_ext_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_ext_user` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_fullname` varchar(50) NOT NULL,
  `cal_email` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`cal_id`,`cal_fullname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_entry_ext_user`
--

LOCK TABLES `webcal_entry_ext_user` WRITE;
/*!40000 ALTER TABLE `webcal_entry_ext_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_entry_ext_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_entry_log`
--

DROP TABLE IF EXISTS `webcal_entry_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_log` (
  `cal_log_id` int(11) NOT NULL,
  `cal_entry_id` int(11) NOT NULL,
  `cal_login` varchar(25) NOT NULL,
  `cal_user_cal` varchar(25) DEFAULT NULL,
  `cal_type` char(1) NOT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_time` int(11) DEFAULT NULL,
  `cal_text` text,
  PRIMARY KEY (`cal_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_entry_log`
--

LOCK TABLES `webcal_entry_log` WRITE;
/*!40000 ALTER TABLE `webcal_entry_log` DISABLE KEYS */;
INSERT INTO `webcal_entry_log` VALUES (1,0,'system',NULL,'x',20190709,55445,'Username: admin, IP: 192.168.0.100'),(2,0,'system',NULL,'x',20190709,55503,'Username: hacklab, IP: 192.168.0.100'),(3,0,'system',NULL,'x',20190709,55608,'Username: admin, IP: 192.168.0.100'),(4,0,'admin','hacklab','a',20190709,55712,'hacklab hacklab <hacklab@hacklab.com>'),(5,0,'system',NULL,'x',20190709,60127,'Username: admin, IP: 192.168.0.100'),(6,0,'system',NULL,'x',20190709,60137,'Username: admin, IP: 192.168.0.100'),(7,0,'system',NULL,'x',20190709,60148,'Username: admin, IP: 192.168.0.100'),(8,0,'system',NULL,'x',20190709,60156,'Username: admin, IP: 192.168.0.100');
/*!40000 ALTER TABLE `webcal_entry_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_entry_repeats`
--

DROP TABLE IF EXISTS `webcal_entry_repeats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_repeats` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_type` varchar(20) DEFAULT NULL,
  `cal_end` int(11) DEFAULT NULL,
  `cal_endtime` int(11) DEFAULT NULL,
  `cal_frequency` int(11) DEFAULT '1',
  `cal_days` char(7) DEFAULT NULL,
  `cal_bymonth` varchar(50) DEFAULT NULL,
  `cal_bymonthday` varchar(100) DEFAULT NULL,
  `cal_byday` varchar(100) DEFAULT NULL,
  `cal_bysetpos` varchar(50) DEFAULT NULL,
  `cal_byweekno` varchar(50) DEFAULT NULL,
  `cal_byyearday` varchar(50) DEFAULT NULL,
  `cal_wkst` char(2) DEFAULT 'MO',
  `cal_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_entry_repeats`
--

LOCK TABLES `webcal_entry_repeats` WRITE;
/*!40000 ALTER TABLE `webcal_entry_repeats` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_entry_repeats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_entry_repeats_not`
--

DROP TABLE IF EXISTS `webcal_entry_repeats_not`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_repeats_not` (
  `cal_id` int(11) NOT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_exdate` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cal_id`,`cal_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_entry_repeats_not`
--

LOCK TABLES `webcal_entry_repeats_not` WRITE;
/*!40000 ALTER TABLE `webcal_entry_repeats_not` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_entry_repeats_not` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_entry_user`
--

DROP TABLE IF EXISTS `webcal_entry_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_entry_user` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_login` varchar(25) NOT NULL,
  `cal_status` char(1) DEFAULT 'A',
  `cal_category` int(11) DEFAULT NULL,
  `cal_percent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cal_id`,`cal_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_entry_user`
--

LOCK TABLES `webcal_entry_user` WRITE;
/*!40000 ALTER TABLE `webcal_entry_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_entry_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_group`
--

DROP TABLE IF EXISTS `webcal_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_group` (
  `cal_group_id` int(11) NOT NULL,
  `cal_owner` varchar(25) DEFAULT NULL,
  `cal_name` varchar(50) NOT NULL,
  `cal_last_update` int(11) NOT NULL,
  PRIMARY KEY (`cal_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_group`
--

LOCK TABLES `webcal_group` WRITE;
/*!40000 ALTER TABLE `webcal_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_group_user`
--

DROP TABLE IF EXISTS `webcal_group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_group_user` (
  `cal_group_id` int(11) NOT NULL,
  `cal_login` varchar(25) NOT NULL,
  PRIMARY KEY (`cal_group_id`,`cal_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_group_user`
--

LOCK TABLES `webcal_group_user` WRITE;
/*!40000 ALTER TABLE `webcal_group_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_group_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_import`
--

DROP TABLE IF EXISTS `webcal_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_import` (
  `cal_import_id` int(11) NOT NULL,
  `cal_name` varchar(50) DEFAULT NULL,
  `cal_date` int(11) NOT NULL,
  `cal_type` varchar(10) NOT NULL,
  `cal_login` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`cal_import_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_import`
--

LOCK TABLES `webcal_import` WRITE;
/*!40000 ALTER TABLE `webcal_import` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_import_data`
--

DROP TABLE IF EXISTS `webcal_import_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_import_data` (
  `cal_import_id` int(11) NOT NULL,
  `cal_id` int(11) NOT NULL,
  `cal_login` varchar(25) NOT NULL,
  `cal_import_type` varchar(15) NOT NULL,
  `cal_external_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cal_id`,`cal_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_import_data`
--

LOCK TABLES `webcal_import_data` WRITE;
/*!40000 ALTER TABLE `webcal_import_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_import_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_nonuser_cals`
--

DROP TABLE IF EXISTS `webcal_nonuser_cals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_nonuser_cals` (
  `cal_login` varchar(25) NOT NULL,
  `cal_lastname` varchar(25) DEFAULT NULL,
  `cal_firstname` varchar(25) DEFAULT NULL,
  `cal_admin` varchar(25) NOT NULL,
  `cal_is_public` char(1) NOT NULL DEFAULT 'N',
  `cal_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cal_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_nonuser_cals`
--

LOCK TABLES `webcal_nonuser_cals` WRITE;
/*!40000 ALTER TABLE `webcal_nonuser_cals` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_nonuser_cals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_reminders`
--

DROP TABLE IF EXISTS `webcal_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_reminders` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_date` int(11) NOT NULL DEFAULT '0',
  `cal_offset` int(11) NOT NULL DEFAULT '0',
  `cal_related` char(1) NOT NULL DEFAULT 'S',
  `cal_before` char(1) NOT NULL DEFAULT 'Y',
  `cal_last_sent` int(11) NOT NULL DEFAULT '0',
  `cal_repeats` int(11) NOT NULL DEFAULT '0',
  `cal_duration` int(11) NOT NULL DEFAULT '0',
  `cal_times_sent` int(11) NOT NULL DEFAULT '0',
  `cal_action` varchar(12) NOT NULL DEFAULT 'EMAIL',
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_reminders`
--

LOCK TABLES `webcal_reminders` WRITE;
/*!40000 ALTER TABLE `webcal_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_report`
--

DROP TABLE IF EXISTS `webcal_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_report` (
  `cal_login` varchar(25) NOT NULL,
  `cal_report_id` int(11) NOT NULL,
  `cal_is_global` char(1) NOT NULL DEFAULT 'N',
  `cal_report_type` varchar(20) NOT NULL,
  `cal_include_header` char(1) NOT NULL DEFAULT 'Y',
  `cal_report_name` varchar(50) NOT NULL,
  `cal_time_range` int(11) NOT NULL,
  `cal_user` varchar(25) DEFAULT NULL,
  `cal_allow_nav` char(1) DEFAULT 'Y',
  `cal_cat_id` int(11) DEFAULT NULL,
  `cal_include_empty` char(1) DEFAULT 'N',
  `cal_show_in_trailer` char(1) DEFAULT 'N',
  `cal_update_date` int(11) NOT NULL,
  PRIMARY KEY (`cal_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_report`
--

LOCK TABLES `webcal_report` WRITE;
/*!40000 ALTER TABLE `webcal_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_report_template`
--

DROP TABLE IF EXISTS `webcal_report_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_report_template` (
  `cal_report_id` int(11) NOT NULL,
  `cal_template_type` char(1) NOT NULL,
  `cal_template_text` text,
  PRIMARY KEY (`cal_report_id`,`cal_template_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_report_template`
--

LOCK TABLES `webcal_report_template` WRITE;
/*!40000 ALTER TABLE `webcal_report_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_report_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_site_extras`
--

DROP TABLE IF EXISTS `webcal_site_extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_site_extras` (
  `cal_id` int(11) NOT NULL DEFAULT '0',
  `cal_name` varchar(25) NOT NULL,
  `cal_type` int(11) NOT NULL,
  `cal_date` int(11) DEFAULT '0',
  `cal_remind` int(11) DEFAULT '0',
  `cal_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_site_extras`
--

LOCK TABLES `webcal_site_extras` WRITE;
/*!40000 ALTER TABLE `webcal_site_extras` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_site_extras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_timezones`
--

DROP TABLE IF EXISTS `webcal_timezones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_timezones` (
  `tzid` varchar(100) NOT NULL DEFAULT '',
  `dtstart` varchar(25) DEFAULT NULL,
  `dtend` varchar(25) DEFAULT NULL,
  `vtimezone` text,
  PRIMARY KEY (`tzid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_timezones`
--

LOCK TABLES `webcal_timezones` WRITE;
/*!40000 ALTER TABLE `webcal_timezones` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_timezones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_user`
--

DROP TABLE IF EXISTS `webcal_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user` (
  `cal_login` varchar(25) NOT NULL,
  `cal_passwd` varchar(32) DEFAULT NULL,
  `cal_lastname` varchar(25) DEFAULT NULL,
  `cal_firstname` varchar(25) DEFAULT NULL,
  `cal_is_admin` char(1) DEFAULT 'N',
  `cal_email` varchar(75) DEFAULT NULL,
  `cal_enabled` char(1) DEFAULT 'Y',
  `cal_telephone` varchar(50) DEFAULT NULL,
  `cal_address` varchar(75) DEFAULT NULL,
  `cal_title` varchar(75) DEFAULT NULL,
  `cal_birthday` int(11) DEFAULT NULL,
  `cal_last_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`cal_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_user`
--

LOCK TABLES `webcal_user` WRITE;
/*!40000 ALTER TABLE `webcal_user` DISABLE KEYS */;
INSERT INTO `webcal_user` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','ADMINISTRATOR','DEFAULT','Y',NULL,'Y',NULL,NULL,NULL,NULL,NULL),('hacklab','7052cad6b415f4272c1986aa9a50a7c3','hacklab','hacklab','N','hacklab@hacklab.com','Y',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `webcal_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_user_layers`
--

DROP TABLE IF EXISTS `webcal_user_layers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user_layers` (
  `cal_layerid` int(11) NOT NULL DEFAULT '0',
  `cal_login` varchar(25) NOT NULL,
  `cal_layeruser` varchar(25) NOT NULL,
  `cal_color` varchar(25) DEFAULT NULL,
  `cal_dups` char(1) DEFAULT 'N',
  PRIMARY KEY (`cal_login`,`cal_layeruser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_user_layers`
--

LOCK TABLES `webcal_user_layers` WRITE;
/*!40000 ALTER TABLE `webcal_user_layers` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_user_layers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_user_pref`
--

DROP TABLE IF EXISTS `webcal_user_pref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user_pref` (
  `cal_login` varchar(25) NOT NULL,
  `cal_setting` varchar(25) NOT NULL,
  `cal_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cal_login`,`cal_setting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_user_pref`
--

LOCK TABLES `webcal_user_pref` WRITE;
/*!40000 ALTER TABLE `webcal_user_pref` DISABLE KEYS */;
INSERT INTO `webcal_user_pref` VALUES ('admin','LANGUAGE','English-US'),('blahblahblah','LANGUAGE','English-US'),('hacklab','LANGUAGE','English-US');
/*!40000 ALTER TABLE `webcal_user_pref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_user_template`
--

DROP TABLE IF EXISTS `webcal_user_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_user_template` (
  `cal_login` varchar(25) NOT NULL,
  `cal_type` char(1) NOT NULL,
  `cal_template_text` text,
  PRIMARY KEY (`cal_login`,`cal_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_user_template`
--

LOCK TABLES `webcal_user_template` WRITE;
/*!40000 ALTER TABLE `webcal_user_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_user_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_view`
--

DROP TABLE IF EXISTS `webcal_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_view` (
  `cal_view_id` int(11) NOT NULL,
  `cal_owner` varchar(25) NOT NULL,
  `cal_name` varchar(50) NOT NULL,
  `cal_view_type` char(1) DEFAULT NULL,
  `cal_is_global` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`cal_view_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_view`
--

LOCK TABLES `webcal_view` WRITE;
/*!40000 ALTER TABLE `webcal_view` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webcal_view_user`
--

DROP TABLE IF EXISTS `webcal_view_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webcal_view_user` (
  `cal_view_id` int(11) NOT NULL,
  `cal_login` varchar(25) NOT NULL,
  PRIMARY KEY (`cal_view_id`,`cal_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webcal_view_user`
--

LOCK TABLES `webcal_view_user` WRITE;
/*!40000 ALTER TABLE `webcal_view_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `webcal_view_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'webcalendar'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31  7:05:29
