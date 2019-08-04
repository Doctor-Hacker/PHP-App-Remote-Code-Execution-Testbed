-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2019 at 05:05 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webid`
--
DROP DATABASE IF EXISTS `webid`;
CREATE DATABASE IF NOT EXISTS `webid` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webid`;

-- --------------------------------------------------------

--
-- Table structure for table `webid_accesseshistoric`
--

DROP TABLE IF EXISTS `webid_accesseshistoric`;
CREATE TABLE `webid_accesseshistoric` (
  `month` char(2) NOT NULL DEFAULT '',
  `year` char(4) NOT NULL DEFAULT '',
  `pageviews` int(11) NOT NULL DEFAULT '0',
  `uniquevisitiors` int(11) NOT NULL DEFAULT '0',
  `usersessions` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_accounts`
--

DROP TABLE IF EXISTS `webid_accounts`;
CREATE TABLE `webid_accounts` (
  `id` int(7) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `name` tinytext NOT NULL,
  `text` text NOT NULL,
  `type` varchar(15) NOT NULL,
  `paid_date` varchar(16) NOT NULL,
  `amount` double(6,2) NOT NULL,
  `day` int(3) NOT NULL,
  `week` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_adminusers`
--

DROP TABLE IF EXISTS `webid_adminusers`;
CREATE TABLE `webid_adminusers` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `hash` varchar(5) NOT NULL DEFAULT '',
  `created` varchar(8) NOT NULL DEFAULT '',
  `lastlogin` varchar(14) NOT NULL DEFAULT '',
  `status` int(2) NOT NULL DEFAULT '0',
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_adminusers`
--

INSERT INTO `webid_adminusers` (`id`, `username`, `password`, `hash`, `created`, `lastlogin`, `status`, `notes`) VALUES
(1, 'admin', '978485bbcce127968f50bccde54680fd', 'msnf', '20190712', '1562945593', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `webid_auccounter`
--

DROP TABLE IF EXISTS `webid_auccounter`;
CREATE TABLE `webid_auccounter` (
  `auction_id` int(11) NOT NULL DEFAULT '0',
  `counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_auctions`
--

DROP TABLE IF EXISTS `webid_auctions`;
CREATE TABLE `webid_auctions` (
  `id` int(32) NOT NULL,
  `user` int(32) DEFAULT NULL,
  `title` varchar(70) DEFAULT NULL,
  `subtitle` varchar(70) DEFAULT NULL,
  `starts` varchar(14) DEFAULT NULL,
  `description` text,
  `pict_url` tinytext,
  `category` int(11) DEFAULT NULL,
  `secondcat` int(11) DEFAULT NULL,
  `minimum_bid` double(16,2) DEFAULT '0.00',
  `shipping_cost` double(16,2) DEFAULT '0.00',
  `shipping_cost_additional` double(16,2) DEFAULT '0.00',
  `reserve_price` double(16,2) DEFAULT '0.00',
  `buy_now` double(16,2) DEFAULT '0.00',
  `auction_type` char(1) DEFAULT NULL,
  `duration` varchar(7) DEFAULT NULL,
  `increment` double(8,2) NOT NULL DEFAULT '0.00',
  `shipping` char(1) DEFAULT NULL,
  `payment` tinytext,
  `international` char(1) DEFAULT NULL,
  `ends` varchar(14) DEFAULT NULL,
  `current_bid` double(16,2) DEFAULT '0.00',
  `closed` int(1) DEFAULT '0',
  `photo_uploaded` tinyint(1) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `suspended` int(1) DEFAULT '0',
  `relist` int(11) NOT NULL DEFAULT '0',
  `relisted` int(11) NOT NULL DEFAULT '0',
  `num_bids` int(11) NOT NULL DEFAULT '0',
  `sold` enum('y','n','s') NOT NULL DEFAULT 'n',
  `shipping_terms` tinytext NOT NULL,
  `bn_only` enum('y','n') NOT NULL DEFAULT 'n',
  `bold` enum('y','n') NOT NULL DEFAULT 'n',
  `highlighted` enum('y','n') NOT NULL DEFAULT 'n',
  `featured` enum('y','n') NOT NULL DEFAULT 'n',
  `current_fee` double(16,2) DEFAULT '0.00',
  `tax` enum('y','n') NOT NULL DEFAULT 'n',
  `taxinc` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_banners`
--

DROP TABLE IF EXISTS `webid_banners`;
CREATE TABLE `webid_banners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('gif','jpg','png','swf') DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sponsortext` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `purchased` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_bannerscategories`
--

DROP TABLE IF EXISTS `webid_bannerscategories`;
CREATE TABLE `webid_bannerscategories` (
  `banner` int(11) NOT NULL DEFAULT '0',
  `category` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_bannerskeywords`
--

DROP TABLE IF EXISTS `webid_bannerskeywords`;
CREATE TABLE `webid_bannerskeywords` (
  `banner` int(11) NOT NULL DEFAULT '0',
  `keyword` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_bannersstats`
--

DROP TABLE IF EXISTS `webid_bannersstats`;
CREATE TABLE `webid_bannersstats` (
  `banner` int(11) DEFAULT NULL,
  `purchased` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_bannersusers`
--

DROP TABLE IF EXISTS `webid_bannersusers`;
CREATE TABLE `webid_bannersusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_bids`
--

DROP TABLE IF EXISTS `webid_bids`;
CREATE TABLE `webid_bids` (
  `id` int(11) NOT NULL,
  `auction` int(32) DEFAULT NULL,
  `bidder` int(32) DEFAULT NULL,
  `bid` double(16,2) DEFAULT NULL,
  `bidwhen` varchar(14) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_categories`
--

DROP TABLE IF EXISTS `webid_categories`;
CREATE TABLE `webid_categories` (
  `cat_id` int(4) NOT NULL,
  `parent_id` int(4) DEFAULT NULL,
  `left_id` int(8) NOT NULL,
  `right_id` int(8) NOT NULL,
  `level` int(1) NOT NULL,
  `cat_name` tinytext,
  `sub_counter` int(11) DEFAULT '0',
  `counter` int(11) DEFAULT '0',
  `cat_colour` varchar(15) DEFAULT '',
  `cat_image` varchar(150) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_categories`
--

INSERT INTO `webid_categories` (`cat_id`, `parent_id`, `left_id`, `right_id`, `level`, `cat_name`, `sub_counter`, `counter`, `cat_colour`, `cat_image`) VALUES
(1, -1, 1, 394, -1, 'All', 0, 0, '', ''),
(2, 1, 340, 393, 0, 'Art &amp; Antiques', 0, 0, '', ''),
(3, 2, 391, 392, 1, 'Textiles &amp; Linens', 0, 0, '', ''),
(4, 2, 389, 390, 1, 'Amateur Art', 0, 0, '', ''),
(5, 2, 387, 388, 1, 'Ancient World', 0, 0, '', ''),
(6, 2, 385, 386, 1, 'Books &amp; Manuscripts', 0, 0, '', ''),
(7, 2, 383, 384, 1, 'Cameras', 0, 0, '', ''),
(8, 2, 363, 382, 1, 'Ceramics &amp; Glass', 0, 0, '', ''),
(9, 8, 364, 381, 2, 'Glass', 0, 0, '', ''),
(10, 9, 379, 380, 3, '40s, 50s &amp; 60s', 0, 0, '', ''),
(11, 9, 377, 378, 3, 'Art Glass', 0, 0, '', ''),
(12, 9, 375, 376, 3, 'Carnival', 0, 0, '', ''),
(13, 9, 373, 374, 3, 'Chalkware', 0, 0, '', ''),
(14, 9, 371, 372, 3, 'Chintz &amp; Shelley', 0, 0, '', ''),
(15, 9, 369, 370, 3, 'Contemporary Glass', 0, 0, '', ''),
(16, 9, 367, 368, 3, 'Decorative', 0, 0, '', ''),
(17, 9, 365, 366, 3, 'Porcelain', 0, 0, '', ''),
(18, 2, 361, 362, 1, 'Fine Art', 0, 0, '', ''),
(19, 2, 359, 360, 1, 'General', 0, 0, '', ''),
(20, 2, 357, 358, 1, 'Musical Instruments', 0, 0, '', ''),
(21, 2, 355, 356, 1, 'Orientalia', 0, 0, '', ''),
(22, 2, 353, 354, 1, 'Painting', 0, 0, '', ''),
(23, 2, 351, 352, 1, 'Photographic Images', 0, 0, '', ''),
(24, 2, 349, 350, 1, 'Post-1900', 0, 0, '', ''),
(25, 2, 347, 348, 1, 'Pre-1900', 0, 0, '', ''),
(26, 2, 345, 346, 1, 'Prints', 0, 0, '', ''),
(27, 2, 343, 344, 1, 'Scientific Instruments', 0, 0, '', ''),
(28, 2, 341, 342, 1, 'Silver &amp; Silver Plate', 0, 0, '', ''),
(29, 1, 262, 339, 0, 'Books', 0, 0, '', ''),
(30, 29, 337, 338, 1, 'Animals', 0, 0, '', ''),
(31, 29, 335, 336, 1, 'Arts, Architecture &amp; Photography', 0, 0, '', ''),
(32, 29, 333, 334, 1, 'Audiobooks', 0, 0, '', ''),
(33, 29, 331, 332, 1, 'Biographies &amp; Memoirs', 0, 0, '', ''),
(34, 29, 329, 330, 1, 'Business &amp; Investing', 0, 0, '', ''),
(35, 29, 327, 328, 1, 'Catalogs', 0, 0, '', ''),
(36, 29, 325, 326, 1, 'Children', 0, 0, '', ''),
(37, 29, 323, 324, 1, 'Computers &amp; Internet', 0, 0, '', ''),
(38, 29, 321, 322, 1, 'Contemporary', 0, 0, '', ''),
(39, 29, 319, 320, 1, 'Cooking, Food &amp; Wine', 0, 0, '', ''),
(40, 29, 317, 318, 1, 'Entertainment', 0, 0, '', ''),
(41, 29, 315, 316, 1, 'Foreign Language Instruction', 0, 0, '', ''),
(42, 29, 313, 314, 1, 'General', 0, 0, '', ''),
(43, 29, 311, 312, 1, 'Health, Mind &amp; Body', 0, 0, '', ''),
(44, 29, 309, 310, 1, 'Historical', 0, 0, '', ''),
(45, 29, 307, 308, 1, 'History', 0, 0, '', ''),
(46, 29, 305, 306, 1, 'Home &amp; Garden', 0, 0, '', ''),
(47, 29, 303, 304, 1, 'Horror', 0, 0, '', ''),
(48, 29, 301, 302, 1, 'Illustrated', 0, 0, '', ''),
(49, 29, 299, 300, 1, 'Literature &amp; Fiction', 0, 0, '', ''),
(50, 29, 297, 298, 1, 'Men', 0, 0, '', ''),
(51, 29, 295, 296, 1, 'Mystery &amp; Thrillers', 0, 0, '', ''),
(52, 29, 293, 294, 1, 'News', 0, 0, '', ''),
(53, 29, 291, 292, 1, 'Nonfiction', 0, 0, '', ''),
(54, 29, 289, 290, 1, 'Parenting &amp; Families', 0, 0, '', ''),
(55, 29, 287, 288, 1, 'Poetry', 0, 0, '', ''),
(56, 29, 285, 286, 1, 'Rare', 0, 0, '', ''),
(57, 29, 283, 284, 1, 'Reference', 0, 0, '', ''),
(58, 29, 281, 282, 1, 'Regency', 0, 0, '', ''),
(59, 29, 279, 280, 1, 'Religion &amp; Spirituality', 0, 0, '', ''),
(60, 29, 277, 278, 1, 'Science &amp; Nature', 0, 0, '', ''),
(61, 29, 275, 276, 1, 'Science Fiction &amp; Fantasy', 0, 0, '', ''),
(62, 29, 273, 274, 1, 'Sports', 0, 0, '', ''),
(63, 29, 271, 272, 1, 'Sports &amp; Outdoors', 0, 0, '', ''),
(64, 29, 269, 270, 1, 'Teens', 0, 0, '', ''),
(65, 29, 267, 268, 1, 'Textbooks', 0, 0, '', ''),
(66, 29, 265, 266, 1, 'Travel', 0, 0, '', ''),
(67, 29, 263, 264, 1, 'Women', 0, 0, '', ''),
(68, 1, 254, 261, 0, 'Clothing &amp; Accessories', 0, 0, '', ''),
(69, 68, 259, 260, 1, 'Accessories', 0, 0, '', ''),
(70, 68, 257, 258, 1, 'Clothing', 0, 0, '', ''),
(71, 68, 255, 256, 1, 'Watches', 0, 0, '', ''),
(72, 1, 248, 253, 0, 'Coins &amp; Stamps', 0, 0, '', ''),
(73, 72, 251, 252, 1, 'Coins', 0, 0, '', ''),
(74, 72, 249, 250, 1, 'Philately', 0, 0, '', ''),
(75, 1, 172, 247, 0, 'Collectibles', 0, 0, '', ''),
(76, 75, 245, 246, 1, 'Advertising', 0, 0, '', ''),
(77, 75, 243, 244, 1, 'Animals', 0, 0, '', ''),
(78, 75, 241, 242, 1, 'Animation', 0, 0, '', ''),
(79, 75, 239, 240, 1, 'Antique Reproductions', 0, 0, '', ''),
(80, 75, 237, 238, 1, 'Autographs', 0, 0, '', ''),
(81, 75, 235, 236, 1, 'Barber Shop', 0, 0, '', ''),
(82, 75, 233, 234, 1, 'Bears', 0, 0, '', ''),
(83, 75, 231, 232, 1, 'Bells', 0, 0, '', ''),
(84, 75, 229, 230, 1, 'Bottles &amp; Cans', 0, 0, '', ''),
(85, 75, 227, 228, 1, 'Breweriana', 0, 0, '', ''),
(86, 75, 225, 226, 1, 'Cars &amp; Motorcycles', 0, 0, '', ''),
(87, 75, 223, 224, 1, 'Cereal Boxes &amp; Premiums', 0, 0, '', ''),
(88, 75, 221, 222, 1, 'Character', 0, 0, '', ''),
(89, 75, 219, 220, 1, 'Circus &amp; Carnival', 0, 0, '', ''),
(90, 75, 217, 218, 1, 'Collector Plates', 0, 0, '', ''),
(91, 75, 215, 216, 1, 'Dolls', 0, 0, '', ''),
(92, 75, 213, 214, 1, 'General', 0, 0, '', ''),
(93, 75, 211, 212, 1, 'Historical &amp; Cultural', 0, 0, '', ''),
(94, 75, 209, 210, 1, 'Holiday &amp; Seasonal', 0, 0, '', ''),
(95, 75, 207, 208, 1, 'Household Items', 0, 0, '', ''),
(96, 75, 205, 206, 1, 'Kitsch', 0, 0, '', ''),
(97, 75, 203, 204, 1, 'Knives &amp; Swords', 0, 0, '', ''),
(98, 75, 201, 202, 1, 'Lunchboxes', 0, 0, '', ''),
(99, 75, 199, 200, 1, 'Magic &amp; Novelty Items', 0, 0, '', ''),
(100, 75, 197, 198, 1, 'Memorabilia', 0, 0, '', ''),
(101, 75, 195, 196, 1, 'Militaria', 0, 0, '', ''),
(102, 75, 193, 194, 1, 'Music Boxes', 0, 0, '', ''),
(103, 75, 191, 192, 1, 'Oddities', 0, 0, '', ''),
(104, 75, 189, 190, 1, 'Paper', 0, 0, '', ''),
(105, 75, 187, 188, 1, 'Pinbacks', 0, 0, '', ''),
(106, 75, 185, 186, 1, 'Porcelain Figurines', 0, 0, '', ''),
(107, 75, 183, 184, 1, 'Railroadiana', 0, 0, '', ''),
(108, 75, 181, 182, 1, 'Religious', 0, 0, '', ''),
(109, 75, 179, 180, 1, 'Rocks, Minerals &amp; Fossils', 0, 0, '', ''),
(110, 75, 177, 178, 1, 'Scientific Instruments', 0, 0, '', ''),
(111, 75, 175, 176, 1, 'Textiles', 0, 0, '', ''),
(112, 75, 173, 174, 1, 'Tobacciana', 0, 0, '', ''),
(113, 1, 154, 171, 0, 'Comics, Cards &amp; Science Fiction', 0, 0, '', ''),
(114, 113, 169, 170, 1, 'Anime &amp; Manga', 0, 0, '', ''),
(115, 113, 167, 168, 1, 'Comic Books', 0, 0, '', ''),
(116, 113, 165, 166, 1, 'General', 0, 0, '', ''),
(117, 113, 163, 164, 1, 'Godzilla', 0, 0, '', ''),
(118, 113, 161, 162, 1, 'Star Trek', 0, 0, '', ''),
(119, 113, 159, 160, 1, 'The X-Files', 0, 0, '', ''),
(120, 113, 157, 158, 1, 'Toys', 0, 0, '', ''),
(121, 113, 155, 156, 1, 'Trading Cards', 0, 0, '', ''),
(122, 1, 144, 153, 0, 'Computers &amp; Software', 0, 0, '', ''),
(123, 122, 151, 152, 1, 'General', 0, 0, '', ''),
(124, 122, 149, 150, 1, 'Hardware', 0, 0, '', ''),
(125, 122, 147, 148, 1, 'Internet Services', 0, 0, '', ''),
(126, 122, 145, 146, 1, 'Software', 0, 0, '', ''),
(127, 1, 132, 143, 0, 'Electronics &amp; Photography', 0, 0, '', ''),
(128, 127, 141, 142, 1, 'Consumer Electronics', 0, 0, '', ''),
(129, 127, 139, 140, 1, 'General', 0, 0, '', ''),
(130, 127, 137, 138, 1, 'Photo Equipment', 0, 0, '', ''),
(131, 127, 135, 136, 1, 'Recording Equipment', 0, 0, '', ''),
(132, 127, 133, 134, 1, 'Video Equipment', 0, 0, '', ''),
(133, 1, 112, 131, 0, 'Home &amp; Garden', 0, 0, '', ''),
(134, 133, 129, 130, 1, 'Baby Items', 0, 0, '', ''),
(135, 133, 127, 128, 1, 'Crafts', 0, 0, '', ''),
(136, 133, 125, 126, 1, 'Furniture', 0, 0, '', ''),
(137, 133, 123, 124, 1, 'Garden', 0, 0, '', ''),
(138, 133, 121, 122, 1, 'General', 0, 0, '', ''),
(139, 133, 119, 120, 1, 'Household Items', 0, 0, '', ''),
(140, 133, 117, 118, 1, 'Pet Supplies', 0, 0, '', ''),
(141, 133, 115, 116, 1, 'Tools &amp; Hardware', 0, 0, '', ''),
(142, 133, 113, 114, 1, 'Weddings', 0, 0, '', ''),
(143, 1, 98, 111, 0, 'Movies &amp; Video', 0, 0, '', ''),
(144, 143, 109, 110, 1, 'Blueray', 0, 0, '', ''),
(145, 143, 107, 108, 1, 'DVD', 0, 0, '', ''),
(146, 143, 105, 106, 1, 'General', 0, 0, '', ''),
(147, 143, 103, 104, 1, 'HD-DVD', 0, 0, '', ''),
(148, 143, 101, 102, 1, 'Laser Discs', 0, 0, '', ''),
(149, 143, 99, 100, 1, 'VHS', 0, 0, '', ''),
(150, 1, 84, 97, 0, 'Music', 0, 0, '', ''),
(151, 150, 95, 96, 1, 'CDs', 0, 0, '', ''),
(152, 150, 93, 94, 1, 'General', 0, 0, '', ''),
(153, 150, 91, 92, 1, 'Instruments', 0, 0, '', ''),
(154, 150, 89, 90, 1, 'Memorabilia', 0, 0, '', ''),
(155, 150, 87, 88, 1, 'Records', 0, 0, '', ''),
(156, 150, 85, 86, 1, 'Tapes', 0, 0, '', ''),
(157, 1, 74, 83, 0, 'Office &amp; Business', 0, 0, '', ''),
(158, 157, 81, 82, 1, 'Briefcases', 0, 0, '', ''),
(159, 157, 79, 80, 1, 'Fax Machines', 0, 0, '', ''),
(160, 157, 77, 78, 1, 'General Equipment', 0, 0, '', ''),
(161, 157, 75, 76, 1, 'Pagers', 0, 0, '', ''),
(162, 1, 58, 73, 0, 'Other Goods &amp; Services', 0, 0, '', ''),
(163, 162, 71, 72, 1, 'General', 0, 0, '', ''),
(164, 162, 69, 70, 1, 'Metaphysical', 0, 0, '', ''),
(165, 162, 67, 68, 1, 'Property', 0, 0, '', ''),
(166, 162, 65, 66, 1, 'Services', 0, 0, '', ''),
(167, 162, 63, 64, 1, 'Tickets &amp; Events', 0, 0, '', ''),
(168, 162, 61, 62, 1, 'Transportation', 0, 0, '', ''),
(169, 162, 59, 60, 1, 'Travel', 0, 0, '', ''),
(170, 1, 50, 57, 0, 'Sports &amp; Recreation', 0, 0, '', ''),
(171, 170, 55, 56, 1, 'Apparel &amp; Equipment', 0, 0, '', ''),
(172, 170, 53, 54, 1, 'Exercise Equipment', 0, 0, '', ''),
(173, 170, 51, 52, 1, 'General', 0, 0, '', ''),
(174, 1, 2, 49, 0, 'Toys &amp; Games', 0, 0, '', ''),
(175, 174, 47, 48, 1, 'Action Figures', 0, 0, '', ''),
(176, 174, 45, 46, 1, 'Beanie Babies &amp; Beanbag Toys', 0, 0, '', ''),
(177, 174, 43, 44, 1, 'Diecast', 0, 0, '', ''),
(178, 174, 41, 42, 1, 'Fast Food', 0, 0, '', ''),
(179, 174, 39, 40, 1, 'Fisher-Price', 0, 0, '', ''),
(180, 174, 37, 38, 1, 'Furby', 0, 0, '', ''),
(181, 174, 35, 36, 1, 'Games', 0, 0, '', ''),
(182, 174, 33, 34, 1, 'General', 0, 0, '', ''),
(183, 174, 31, 32, 1, 'Giga Pet &amp; Tamagotchi', 0, 0, '', ''),
(184, 174, 29, 30, 1, 'Hobbies', 0, 0, '', ''),
(185, 174, 27, 28, 1, 'Marbles', 0, 0, '', ''),
(186, 174, 25, 26, 1, 'My Little Pony', 0, 0, '', ''),
(187, 174, 23, 24, 1, 'Peanuts Gang', 0, 0, '', ''),
(188, 174, 21, 22, 1, 'Pez', 0, 0, '', ''),
(189, 174, 19, 20, 1, 'Plastic Models', 0, 0, '', ''),
(190, 174, 17, 18, 1, 'Plush Toys', 0, 0, '', ''),
(191, 174, 15, 16, 1, 'Puzzles', 0, 0, '', ''),
(192, 174, 13, 14, 1, 'lot Cars', 0, 0, '', ''),
(193, 174, 11, 12, 1, 'Teletubbies', 0, 0, '', ''),
(194, 174, 9, 10, 1, 'Toy Soldiers', 0, 0, '', ''),
(195, 174, 7, 8, 1, 'Vintage', 0, 0, '', ''),
(196, 174, 5, 6, 1, 'Vintage Tin', 0, 0, '', ''),
(197, 174, 3, 4, 1, 'Vintage Vehicles', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `webid_closedrelisted`
--

DROP TABLE IF EXISTS `webid_closedrelisted`;
CREATE TABLE `webid_closedrelisted` (
  `auction` int(32) DEFAULT '0',
  `relistdate` varchar(8) NOT NULL DEFAULT '',
  `newauction` int(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_comm_messages`
--

DROP TABLE IF EXISTS `webid_comm_messages`;
CREATE TABLE `webid_comm_messages` (
  `id` int(11) NOT NULL,
  `boardid` int(11) NOT NULL DEFAULT '0',
  `msgdate` varchar(14) NOT NULL DEFAULT '',
  `user` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_community`
--

DROP TABLE IF EXISTS `webid_community`;
CREATE TABLE `webid_community` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `messages` int(11) NOT NULL DEFAULT '0',
  `lastmessage` varchar(14) NOT NULL DEFAULT '0',
  `msgstoshow` int(11) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_community`
--

INSERT INTO `webid_community` (`id`, `name`, `messages`, `lastmessage`, `msgstoshow`, `active`) VALUES
(1, 'Selling', 0, '', 30, 1),
(2, 'Buying', 0, '', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `webid_counters`
--

DROP TABLE IF EXISTS `webid_counters`;
CREATE TABLE `webid_counters` (
  `users` int(11) DEFAULT '0',
  `inactiveusers` int(11) NOT NULL DEFAULT '0',
  `auctions` int(11) DEFAULT '0',
  `closedauctions` int(11) NOT NULL DEFAULT '0',
  `bids` int(11) NOT NULL DEFAULT '0',
  `suspendedauctions` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_counters`
--

INSERT INTO `webid_counters` (`users`, `inactiveusers`, `auctions`, `closedauctions`, `bids`, `suspendedauctions`) VALUES
(1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `webid_countries`
--

DROP TABLE IF EXISTS `webid_countries`;
CREATE TABLE `webid_countries` (
  `country` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_countries`
--

INSERT INTO `webid_countries` (`country`) VALUES
('Afghanistan'),
('Albania'),
('Algeria'),
('American Samoa'),
('Andorra'),
('Angola'),
('Anguilla'),
('Antarctica'),
('Antigua And Barbuda'),
('Argentina'),
('Armenia'),
('Aruba'),
('Australia'),
('Austria'),
('Azerbaijan Republic'),
('Bahamas'),
('Bahrain'),
('Bangladesh'),
('Barbados'),
('Belarus'),
('Belgium'),
('Belize'),
('Benin'),
('Bermuda'),
('Bhutan'),
('Bolivia'),
('Bosnia and Herzegowina'),
('Botswana'),
('Bouvet Island'),
('Brazil'),
('British Indian Ocean Territory'),
('Brunei Darussalam'),
('Bulgaria'),
('Burkina Faso'),
('Burma'),
('Burundi'),
('Cambodia'),
('Cameroon'),
('Canada'),
('Cape Verde'),
('Cayman Islands'),
('Central African Republic'),
('Chad'),
('Chile'),
('China'),
('Christmas Island'),
('Cocos &#40;Keeling&#41; Islands'),
('Colombia'),
('Comoros'),
('Congo'),
('Congo, the Democratic Republic'),
('Cook Islands'),
('Costa Rica'),
('Cote d&#39;Ivoire'),
('Croatia'),
('Cyprus'),
('Czech Republic'),
('Denmark'),
('Djibouti'),
('Dominica'),
('Dominican Republic'),
('East Timor'),
('Ecuador'),
('Egypt'),
('El Salvador'),
('Equatorial Guinea'),
('Eritrea'),
('Estonia'),
('Ethiopia'),
('Falkland Islands'),
('Faroe Islands'),
('Fiji'),
('Finland'),
('France'),
('French Guiana'),
('French Polynesia'),
('French Southern Territories'),
('Gabon'),
('Gambia'),
('Georgia'),
('Germany'),
('Ghana'),
('Gibraltar'),
('Great Britain'),
('Greece'),
('Greenland'),
('Grenada'),
('Guadeloupe'),
('Guam'),
('Guatemala'),
('Guinea'),
('Guinea-Bissau'),
('Guyana'),
('Haiti'),
('Heard and Mc Donald Islands'),
('Honduras'),
('Hong Kong'),
('Hungary'),
('Iceland'),
('India'),
('Indonesia'),
('Ireland'),
('Israel'),
('Italy'),
('Jamaica'),
('Japan'),
('Jordan'),
('Kazakhstan'),
('Kenya'),
('Kiribati'),
('Korea &#40;South&#41;'),
('Kuwait'),
('Kyrgyzstan'),
('Lao People&#39;s Democratic Republic'),
('Latvia'),
('Lebanon'),
('Lesotho'),
('Liberia'),
('Liechtenstein'),
('Lithuania'),
('Luxembourg'),
('Macau'),
('Macedonia'),
('Madagascar'),
('Malawi'),
('Malaysia'),
('Maldives'),
('Mali'),
('Malta'),
('Marshall Islands'),
('Martinique'),
('Mauritania'),
('Mauritius'),
('Mayotte'),
('Mexico'),
('Micronesia, Federated States of'),
('Moldova, Republic of'),
('Monaco'),
('Mongolia'),
('Montserrat'),
('Morocco'),
('Mozambique'),
('Namibia'),
('Nauru'),
('Nepal'),
('Netherlands'),
('Netherlands Antilles'),
('New Caledonia'),
('New Zealand'),
('Nicaragua'),
('Niger'),
('Nigeria'),
('Niuev'),
('Norfolk Island'),
('Northern Mariana Islands'),
('Norway'),
('Oman'),
('Pakistan'),
('Palau'),
('Panama'),
('Papua New Guinea'),
('Paraguay'),
('Peru'),
('Philippines'),
('Pitcairn'),
('Poland'),
('Portugal'),
('Puerto Rico'),
('Qatar'),
('Reunion'),
('Romania'),
('Russian Federation'),
('Rwanda'),
('Saint Kitts and Nevis'),
('Saint Lucia'),
('Saint Vincent and the Grenadin'),
('Samoa &#40;Independent&#41;'),
('San Marino'),
('Sao Tome and Principe'),
('Saudi Arabia'),
('Senegal'),
('Seychelles'),
('Sierra Leone'),
('Singapore'),
('Slovakia'),
('Slovenia'),
('Solomon Islands'),
('Somalia'),
('South Africa'),
('South Georgia'),
('Spain'),
('Sri Lanka'),
('St. Helena'),
('St. Pierre and Miquelon'),
('Suriname'),
('Svalbard and Jan Mayen Islands'),
('Swaziland'),
('Sweden'),
('Switzerland'),
('Taiwan'),
('Tajikistan'),
('Tanzania'),
('Thailand'),
('Togo'),
('Tokelau'),
('Tonga'),
('Trinidad and Tobago'),
('Tunisia'),
('Turkey'),
('Turkmenistan'),
('Turks and Caicos Islands'),
('Tuvalu'),
('Uganda'),
('Ukraine'),
('United Arab Emiratesv'),
('United Kingdom'),
('United States'),
('Uruguay'),
('Uzbekistan'),
('Vanuatu'),
('Venezuela'),
('Viet Nam'),
('Virgin Islands &#40;British&#41;'),
('Virgin Islands &#40;U.S.&#41;'),
('Wallis and Futuna Islands'),
('Western Sahara'),
('Yemen'),
('Zambia'),
('Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `webid_currentaccesses`
--

DROP TABLE IF EXISTS `webid_currentaccesses`;
CREATE TABLE `webid_currentaccesses` (
  `day` char(2) NOT NULL DEFAULT '0',
  `month` char(2) NOT NULL DEFAULT '0',
  `year` char(4) NOT NULL DEFAULT '0',
  `pageviews` int(11) NOT NULL DEFAULT '0',
  `uniquevisitors` int(11) NOT NULL DEFAULT '0',
  `usersessions` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_currentbrowsers`
--

DROP TABLE IF EXISTS `webid_currentbrowsers`;
CREATE TABLE `webid_currentbrowsers` (
  `month` char(2) NOT NULL DEFAULT '0',
  `year` varchar(4) NOT NULL DEFAULT '0',
  `browser` varchar(50) NOT NULL DEFAULT '0',
  `counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_currentplatforms`
--

DROP TABLE IF EXISTS `webid_currentplatforms`;
CREATE TABLE `webid_currentplatforms` (
  `month` char(2) NOT NULL DEFAULT '0',
  `year` varchar(4) NOT NULL DEFAULT '0',
  `platform` varchar(50) NOT NULL DEFAULT '0',
  `counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_durations`
--

DROP TABLE IF EXISTS `webid_durations`;
CREATE TABLE `webid_durations` (
  `days` int(11) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_durations`
--

INSERT INTO `webid_durations` (`days`, `description`) VALUES
(1, '1 day'),
(2, '2 days'),
(3, '3 days'),
(7, '1 week'),
(14, '2 weeks'),
(21, '3 weeks'),
(30, '1 month');

-- --------------------------------------------------------

--
-- Table structure for table `webid_faqs`
--

DROP TABLE IF EXISTS `webid_faqs`;
CREATE TABLE `webid_faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL DEFAULT '',
  `answer` text NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_faqs`
--

INSERT INTO `webid_faqs` (`id`, `question`, `answer`, `category`) VALUES
(2, 'Registering', 'To register as a new user, click on Register at the top of the window. You will be asked for your name, a username and password, and contact information, including your email address.\r\n\r\n<B>You must be at least 18 years of age to register.</B>!', 1),
(4, 'Item Watch', '<b>Item watch</b> notifies you when someone bids on the auctions that you have added to your Item Watch. ', 3),
(5, 'What is a Dutch auction?', 'Dutch auction is a type of auction where the auctioneer begins with a high asking price which is lowered until some participant is willing to accept the auctioneer\'s price. The winning participant pays the last announced price.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `webid_faqs_translated`
--

DROP TABLE IF EXISTS `webid_faqs_translated`;
CREATE TABLE `webid_faqs_translated` (
  `id` int(11) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT '',
  `question` varchar(200) NOT NULL DEFAULT '',
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_faqs_translated`
--

INSERT INTO `webid_faqs_translated` (`id`, `lang`, `question`, `answer`) VALUES
(2, 'EN', 'Registering', 'To register as a new user, click on Register at the top of the window. You will be asked for your name, a username and password, and contact information, including your email address.\r\n\r\n<B>You must be at least 18 years of age to register.</B>!'),
(2, 'ES', 'Registrarse', 'Para registrar un nuevo usuario, haz click en <B>Reg&iacute;Â­strate</B> en la parte superior de la pantalla. Se te preguntar&aacute;n tus datos personales, un nombre de usuario, una contrase&ntilde;a e informacion de contacto como la direccion e-mail.\r\n\r\n<B>'),
(4, 'EN', 'Item Watch', '<b>Item watch</b> notifies you when someone bids on the auctions that you have added to your Item Watch. '),
(4, 'ES', 'En la Mira', '<i><b>En la Mira</b></i> te env&iacute;a una notificacion por e-mail, cada vez que alguien puja en una de las subastas que has a&ntilde;adido a tu lista <i>En la Mira</i>. '),
(6, 'ES', 'Auction Watch', '<i><B>Auction Watch</b></i> es tu asistente para saber cuando se abre una subasta cuya descripcion contiene palabras clave de tu interes.\r\n\r\nPara usar esta opcion inserta las palabras clave en las que est&aacute;s interesado en la lista de <i>Auction Watch</i>. Todas las palabras claves deben estar separadas por un espacio. Cuando estas palabras claves aparezcan en alg&uacute;n t&iacute;tulo o descripcion de subasta, recibir&aacute;s un e-mail con la informacion de que una subasta que contiene tus palabras claves ha sido creada. Tambi&aacute;n puedas agregar el nombre del usuario como palabra clave. ');

-- --------------------------------------------------------

--
-- Table structure for table `webid_faqscat_translated`
--

DROP TABLE IF EXISTS `webid_faqscat_translated`;
CREATE TABLE `webid_faqscat_translated` (
  `id` int(11) NOT NULL DEFAULT '0',
  `lang` char(2) NOT NULL DEFAULT '',
  `category` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_faqscat_translated`
--

INSERT INTO `webid_faqscat_translated` (`id`, `lang`, `category`) VALUES
(3, 'EN', 'Buying'),
(3, 'ES', 'Comprar'),
(1, 'EN', 'General'),
(1, 'ES', 'General'),
(2, 'EN', 'Selling'),
(2, 'ES', 'Vender');

-- --------------------------------------------------------

--
-- Table structure for table `webid_faqscategories`
--

DROP TABLE IF EXISTS `webid_faqscategories`;
CREATE TABLE `webid_faqscategories` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_faqscategories`
--

INSERT INTO `webid_faqscategories` (`id`, `category`) VALUES
(1, 'General'),
(2, 'Selling'),
(3, 'Buying');

-- --------------------------------------------------------

--
-- Table structure for table `webid_feedbacks`
--

DROP TABLE IF EXISTS `webid_feedbacks`;
CREATE TABLE `webid_feedbacks` (
  `id` int(11) NOT NULL,
  `rated_user_id` int(32) DEFAULT NULL,
  `rater_user_nick` varchar(20) DEFAULT NULL,
  `feedback` mediumtext,
  `rate` int(2) DEFAULT NULL,
  `feedbackdate` int(15) NOT NULL,
  `auction_id` int(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_fees`
--

DROP TABLE IF EXISTS `webid_fees`;
CREATE TABLE `webid_fees` (
  `id` int(5) NOT NULL,
  `fee_from` double(16,2) NOT NULL DEFAULT '0.00',
  `fee_to` double(16,2) NOT NULL DEFAULT '0.00',
  `fee_type` enum('flat','perc') NOT NULL DEFAULT 'flat',
  `value` double(8,2) NOT NULL DEFAULT '0.00',
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_fees`
--

INSERT INTO `webid_fees` (`id`, `fee_from`, `fee_to`, `fee_type`, `value`, `type`) VALUES
(1, 0.00, 0.00, 'flat', 0.00, 'signup_fee'),
(2, 0.00, 0.00, 'flat', 0.00, 'buyer_fee'),
(3, 0.00, 0.00, 'flat', 0.00, 'setup'),
(4, 0.00, 0.00, 'flat', 0.00, 'hpfeat_fee'),
(5, 0.00, 0.00, 'flat', 0.00, 'bolditem_fee'),
(6, 0.00, 0.00, 'flat', 0.00, 'hlitem_fee'),
(7, 0.00, 0.00, 'flat', 0.00, 'rp_fee'),
(8, 0.00, 0.00, 'flat', 0.00, 'picture_fee'),
(9, 0.00, 0.00, 'flat', 0.00, 'subtitle_fee'),
(10, 0.00, 0.00, 'flat', 0.00, 'excat_fee'),
(11, 0.00, 0.00, 'flat', 0.00, 'relist_fee'),
(12, 0.00, 0.00, 'flat', 0.00, 'buyout_fee'),
(13, 0.00, 0.00, 'flat', 0.00, 'endauc_fee');

-- --------------------------------------------------------

--
-- Table structure for table `webid_filterwords`
--

DROP TABLE IF EXISTS `webid_filterwords`;
CREATE TABLE `webid_filterwords` (
  `word` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_filterwords`
--

INSERT INTO `webid_filterwords` (`word`) VALUES
('');

-- --------------------------------------------------------

--
-- Table structure for table `webid_gateways`
--

DROP TABLE IF EXISTS `webid_gateways`;
CREATE TABLE `webid_gateways` (
  `gateways` text,
  `paypal_address` varchar(50) NOT NULL DEFAULT '',
  `paypal_required` int(1) NOT NULL DEFAULT '0',
  `paypal_active` int(1) NOT NULL DEFAULT '0',
  `authnet_address` varchar(50) NOT NULL DEFAULT '',
  `authnet_password` varchar(50) NOT NULL DEFAULT '',
  `authnet_required` int(1) NOT NULL DEFAULT '0',
  `authnet_active` int(1) NOT NULL DEFAULT '0',
  `worldpay_address` varchar(50) NOT NULL DEFAULT '',
  `worldpay_required` int(1) NOT NULL DEFAULT '0',
  `worldpay_active` int(1) NOT NULL DEFAULT '0',
  `moneybookers_address` varchar(50) NOT NULL DEFAULT '',
  `moneybookers_required` int(1) NOT NULL DEFAULT '0',
  `moneybookers_active` int(1) NOT NULL DEFAULT '0',
  `toocheckout_address` varchar(50) NOT NULL DEFAULT '',
  `toocheckout_required` int(1) NOT NULL DEFAULT '0',
  `toocheckout_active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_gateways`
--

INSERT INTO `webid_gateways` (`gateways`, `paypal_address`, `paypal_required`, `paypal_active`, `authnet_address`, `authnet_password`, `authnet_required`, `authnet_active`, `worldpay_address`, `worldpay_required`, `worldpay_active`, `moneybookers_address`, `moneybookers_required`, `moneybookers_active`, `toocheckout_address`, `toocheckout_required`, `toocheckout_active`) VALUES
('paypal,authnet,worldpay,moneybookers,toocheckout', '', 0, 1, '', '', 0, 1, '', 0, 1, '', 0, 1, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `webid_groups`
--

DROP TABLE IF EXISTS `webid_groups`;
CREATE TABLE `webid_groups` (
  `id` int(5) NOT NULL,
  `group_name` varchar(50) NOT NULL DEFAULT '',
  `can_sell` int(1) NOT NULL DEFAULT '0',
  `can_buy` int(1) NOT NULL DEFAULT '0',
  `count` int(15) NOT NULL DEFAULT '0',
  `auto_join` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_groups`
--

INSERT INTO `webid_groups` (`id`, `group_name`, `can_sell`, `can_buy`, `count`, `auto_join`) VALUES
(1, 'Sellers', 1, 0, 0, 1),
(2, 'Buyers', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `webid_increments`
--

DROP TABLE IF EXISTS `webid_increments`;
CREATE TABLE `webid_increments` (
  `id` int(3) NOT NULL,
  `low` double(16,2) DEFAULT '0.00',
  `high` double(16,2) DEFAULT '0.00',
  `increment` double(16,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_increments`
--

INSERT INTO `webid_increments` (`id`, `low`, `high`, `increment`) VALUES
(1, 0.00, 0.99, 0.28),
(2, 1.00, 9.99, 0.50),
(3, 10.00, 29.99, 1.00),
(4, 30.00, 99.99, 2.00),
(5, 100.00, 249.99, 5.00),
(6, 250.00, 499.99, 10.00),
(7, 500.00, 999.99, 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `webid_logs`
--

DROP TABLE IF EXISTS `webid_logs`;
CREATE TABLE `webid_logs` (
  `id` int(25) NOT NULL,
  `type` varchar(5) NOT NULL,
  `message` text NOT NULL,
  `action_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(32) NOT NULL DEFAULT '0',
  `ip` varchar(45) NOT NULL,
  `timestamp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_logs`
--

INSERT INTO `webid_logs` (`id`, `type`, `message`, `action_id`, `user_id`, `ip`, `timestamp`) VALUES
(1, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562943639),
(2, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562943639),
(3, 'error', 'Unknown error type: [2] file_get_contents(): php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 116\n', 0, 0, '127.0.0.1', 1562943762),
(4, 'error', 'Unknown error type: [2] file_get_contents(http://www.webidsupport.com/version.txt): failed to open stream: php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 116\n', 0, 0, '127.0.0.1', 1562943762),
(5, 'error', 'Unknown error type: [2] fopen(): php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 120\n', 0, 0, '127.0.0.1', 1562943773),
(6, 'error', 'Unknown error type: [2] fopen(http://www.webidsupport.com/version.txt): failed to open stream: php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 120\n', 0, 0, '127.0.0.1', 1562943773),
(7, 'error', 'Unknown error type: [2] file_get_contents(): php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 116\n', 0, 0, '127.0.0.1', 1562943867),
(8, 'error', 'Unknown error type: [2] file_get_contents(http://www.webidsupport.com/version.txt): failed to open stream: php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 116\n', 0, 0, '127.0.0.1', 1562943867),
(9, 'error', 'Unknown error type: [2] fopen(): php_network_getaddresses: getaddrinfo failed: No such host is known.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 120\n', 0, 0, '127.0.0.1', 1562943879),
(10, 'error', 'Unknown error type: [2] fopen(http://www.webidsupport.com/version.txt): failed to open stream: php_network_getaddresses: getaddrinfo failed: No such host is known.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 120\n', 0, 0, '127.0.0.1', 1562943879),
(11, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562943909),
(12, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562943909),
(13, 'user', 'Regestered User', 0, 1, '192.168.0.100', 1562944031),
(14, 'error', 'Unknown error type: [2] in_array() expects parameter 2 to be array, null given on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\inc\\plupload\\examples\\upload.php line 77\n', 0, 0, '127.0.0.1', 1562944818),
(15, 'error', 'Unknown error type: [2] array_push() expects parameter 1 to be array, null given on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\inc\\plupload\\examples\\upload.php line 79\n', 0, 0, '127.0.0.1', 1562944818),
(16, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945011),
(17, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945011),
(18, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945038),
(19, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945038),
(20, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '127.0.0.1', 1562945231),
(21, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '127.0.0.1', 1562945231),
(22, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945293),
(23, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945293),
(24, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945299),
(25, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945299),
(26, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '127.0.0.1', 1562945342),
(27, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '127.0.0.1', 1562945342),
(28, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945360),
(29, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945360),
(30, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945391),
(31, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945391),
(32, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945402),
(33, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945402),
(34, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945412),
(35, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945413),
(36, 'error', 'Unknown error type: [2] Division by zero on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\index.php line 18\n', 0, 0, '127.0.0.1', 1562945515),
(37, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '127.0.0.1', 1562945515),
(38, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '127.0.0.1', 1562945515),
(39, 'error', 'Unknown error type: [2] file_get_contents(): php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 116\n', 0, 0, '127.0.0.1', 1562945599),
(40, 'error', 'Unknown error type: [2] file_get_contents(http://www.webidsupport.com/version.txt): failed to open stream: php_network_getaddresses: getaddrinfo failed: This is usually a temporary error during hostname resolution and means that the local server did not receive a response from an authoritative server.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 116\n', 0, 0, '127.0.0.1', 1562945599),
(41, 'error', 'Unknown error type: [2] fopen(): php_network_getaddresses: getaddrinfo failed: No such host is known.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 120\n', 0, 0, '127.0.0.1', 1562945611),
(42, 'error', 'Unknown error type: [2] fopen(http://www.webidsupport.com/version.txt): failed to open stream: php_network_getaddresses: getaddrinfo failed: No such host is known.  on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\includes\\functions_admin.php line 120\n', 0, 0, '127.0.0.1', 1562945611),
(43, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '192.168.0.100', 1562945710),
(44, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\admin\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '192.168.0.100', 1562945710),
(45, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\hacklab\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '127.0.0.1', 1564932586),
(46, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\hacklab\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '127.0.0.1', 1564932586),
(47, 'error', 'Unknown error type: [2] Illegal string offset \'value\' on C:\\Users\\hacklab\\Desktop\\UniServerZ\\www\\cron.php line 45\n', 0, 0, '127.0.0.1', 1564934620),
(48, 'error', 'Unknown error type: [2] Illegal string offset \'fee_type\' on C:\\Users\\hacklab\\Desktop\\UniServerZ\\www\\cron.php line 47\n', 0, 0, '127.0.0.1', 1564934620);

-- --------------------------------------------------------

--
-- Table structure for table `webid_maintainance`
--

DROP TABLE IF EXISTS `webid_maintainance`;
CREATE TABLE `webid_maintainance` (
  `id` int(11) NOT NULL,
  `active` enum('y','n') DEFAULT NULL,
  `superuser` varchar(32) DEFAULT NULL,
  `maintainancetext` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_maintainance`
--

INSERT INTO `webid_maintainance` (`id`, `active`, `superuser`, `maintainancetext`) VALUES
(1, 'n', 'renlok', '<br>\r\n<center>\r\n<b>Under maintainance!!!!!!!</b>\r\n</center>');

-- --------------------------------------------------------

--
-- Table structure for table `webid_membertypes`
--

DROP TABLE IF EXISTS `webid_membertypes`;
CREATE TABLE `webid_membertypes` (
  `id` int(11) NOT NULL,
  `feedbacks` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_membertypes`
--

INSERT INTO `webid_membertypes` (`id`, `feedbacks`, `icon`) VALUES
(14, 49, 'starY.gif'),
(15, 99, 'starB.gif'),
(16, 999, 'starT.gif'),
(17, 4999, 'starR.gif'),
(19, 24999, 'starFY.gif'),
(20, 49999, 'starFT.gif'),
(21, 99999, 'starFV.gif'),
(22, 999999, 'starFR.gif'),
(23, 9999, 'starG.gif'),
(24, 9, 'transparent.gif');

-- --------------------------------------------------------

--
-- Table structure for table `webid_messages`
--

DROP TABLE IF EXISTS `webid_messages`;
CREATE TABLE `webid_messages` (
  `id` int(50) NOT NULL,
  `sentto` int(25) NOT NULL DEFAULT '0',
  `sentfrom` int(25) NOT NULL DEFAULT '0',
  `fromemail` varchar(50) NOT NULL DEFAULT '',
  `sentat` varchar(20) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `isread` int(1) NOT NULL DEFAULT '0',
  `subject` varchar(50) NOT NULL DEFAULT '',
  `replied` int(1) NOT NULL DEFAULT '0',
  `reply_of` int(50) NOT NULL DEFAULT '0',
  `question` int(15) NOT NULL DEFAULT '0',
  `public` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_news`
--

DROP TABLE IF EXISTS `webid_news`;
CREATE TABLE `webid_news` (
  `id` int(32) NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `content` longtext NOT NULL,
  `new_date` int(8) NOT NULL DEFAULT '0',
  `suspended` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_news`
--

INSERT INTO `webid_news` (`id`, `title`, `content`, `new_date`, `suspended`) VALUES
(1, 'User hacklab/hacklab created', 'User hacklab/hacklab created', 1562945701, 0);

-- --------------------------------------------------------

--
-- Table structure for table `webid_news_translated`
--

DROP TABLE IF EXISTS `webid_news_translated`;
CREATE TABLE `webid_news_translated` (
  `id` int(11) NOT NULL DEFAULT '0',
  `lang` char(2) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_news_translated`
--

INSERT INTO `webid_news_translated` (`id`, `lang`, `title`, `content`) VALUES
(1, 'EN', 'User hacklab/hacklab created', 'User hacklab/hacklab created');

-- --------------------------------------------------------

--
-- Table structure for table `webid_online`
--

DROP TABLE IF EXISTS `webid_online`;
CREATE TABLE `webid_online` (
  `ID` bigint(21) NOT NULL,
  `SESSION` varchar(32) NOT NULL DEFAULT '',
  `time` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_online`
--

INSERT INTO `webid_online` (`ID`, `SESSION`, `time`) VALUES
(10, 'bb29d2d7020d800e8a8b82e74a9d991b', 1564934620);

-- --------------------------------------------------------

--
-- Table structure for table `webid_pendingnotif`
--

DROP TABLE IF EXISTS `webid_pendingnotif`;
CREATE TABLE `webid_pendingnotif` (
  `id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL DEFAULT '0',
  `seller_id` int(11) NOT NULL DEFAULT '0',
  `winners` text NOT NULL,
  `auction` text NOT NULL,
  `seller` text NOT NULL,
  `thisdate` varchar(8) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_proxybid`
--

DROP TABLE IF EXISTS `webid_proxybid`;
CREATE TABLE `webid_proxybid` (
  `itemid` int(32) DEFAULT NULL,
  `userid` int(32) DEFAULT NULL,
  `bid` double(16,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_rates`
--

DROP TABLE IF EXISTS `webid_rates`;
CREATE TABLE `webid_rates` (
  `id` int(11) NOT NULL,
  `ime` tinytext NOT NULL,
  `valuta` tinytext NOT NULL,
  `symbol` char(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_rates`
--

INSERT INTO `webid_rates` (`id`, `ime`, `valuta`, `symbol`) VALUES
(1, 'Great Britain', 'Pound Sterling ', 'GBP'),
(2, 'Argentina', 'Argentinian Peso', 'ARS'),
(3, 'Australia', 'Australian Dollar ', 'AUD'),
(4, 'Burma', 'Myanmar (Burma) Kyat', 'MMK'),
(5, 'Brazil', 'Brazilian Real ', 'BRL'),
(6, 'Chile', 'Chilean Peso ', 'CLP'),
(7, 'China', 'Chinese Renminbi ', 'CNY'),
(8, 'Colombia', 'Colombian Peso ', 'COP'),
(9, 'Neth. Antilles', 'Neth. Antilles Guilder', 'ANG'),
(10, 'Czech. Republic', 'Czech. Republic Koruna ', 'CZK'),
(11, 'Denmark', 'Danish Krone ', 'DKK'),
(12, 'European Union', 'EURO', 'EUR'),
(13, 'Fiji', 'Fiji Dollar ', 'FJD'),
(14, 'Jamaica', 'Jamaican Dollar', 'JMD'),
(15, 'Trinidad & Tobago', 'Trinidad & Tobago Dollar', 'TTD'),
(16, 'Hong Kong', 'Hong Kong Dollar', 'HKD'),
(17, 'Ghana', 'Ghanaian Cedi', 'GHC'),
(18, 'Iceland', 'Icelandic Krona ', 'INR'),
(19, 'India', 'Indian Rupee', 'INR'),
(20, 'Indonesia', 'Indonesian Rupiah ', 'IDR'),
(21, 'Israel', 'Israeli New Shekel ', 'ILS'),
(22, 'Japan', 'Japanese Yen', 'JPY'),
(23, 'Malaysia', 'Malaysian Ringgit', 'MYR'),
(24, 'Mexico', 'New Peso', 'MXN'),
(25, 'Morocco', 'Moroccan Dirham ', 'MAD'),
(26, 'Honduras', 'Honduras Lempira', 'HNL'),
(27, 'Hungaria', 'Hungarian Forint', 'HUF'),
(28, 'New Zealand', 'New Zealand Dollar', 'NZD'),
(29, 'Norway', 'Norwege Krone', 'NOK'),
(30, 'Pakistan', 'Pakistan Rupee ', 'PKR'),
(31, 'Panama', 'Panamanian Balboa ', 'PAB'),
(32, 'Peru', 'Peruvian New Sol', 'PEN'),
(33, 'Philippine', 'Philippine Peso ', 'PHP'),
(34, 'Poland', 'Polish Zloty', 'PLN'),
(35, 'Russian', 'Russian Rouble', 'RUR'),
(36, 'Singapore', 'Singapore Dollar ', 'SGD'),
(37, 'Slovakia', 'Koruna', 'SKK'),
(38, 'Slovenia', 'Slovenian Tolar', 'SIT'),
(39, 'South Africa', 'South African Rand', 'ZAR'),
(40, 'South Korea', 'South Korean Won', 'KRW'),
(41, 'Sri Lanka', 'Sri Lanka Rupee ', 'LKR'),
(42, 'Sweden', 'Swedish Krona', 'SEK'),
(43, 'Switzerland', 'Swiss Franc', 'CHF'),
(44, 'Taiwan', 'Taiwanese New Dollar ', 'TWD'),
(45, 'Thailand', 'Thailand Thai Baht ', 'THB'),
(46, 'Pacific Financial Community', 'Pacific Financial Community Franc', 'CFP'),
(47, 'Tunisia', 'Tunisisan Dinar', 'TND'),
(48, 'Turkey', 'Turkish Lira', 'TRL'),
(49, 'United States', 'U.S. Dollar', 'USD'),
(50, 'Venezuela', 'Bolivar ', 'VEB'),
(51, 'Bahamas', 'Bahamian Dollar', 'BSD'),
(52, 'Croatia', 'Croatian Kuna', 'HRK'),
(53, 'East Caribe', 'East Caribbean Dollar', 'XCD'),
(54, 'CFA Franc (African Financial Community)', 'African Financial Community Franc', 'CFA'),
(55, 'Canadian', 'Canadian Dollar', 'CAD');

-- --------------------------------------------------------

--
-- Table structure for table `webid_rememberme`
--

DROP TABLE IF EXISTS `webid_rememberme`;
CREATE TABLE `webid_rememberme` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `hashkey` char(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_settings`
--

DROP TABLE IF EXISTS `webid_settings`;
CREATE TABLE `webid_settings` (
  `sitename` varchar(255) NOT NULL DEFAULT '',
  `siteurl` varchar(255) NOT NULL DEFAULT '',
  `copyright` varchar(255) NOT NULL DEFAULT '',
  `version` varchar(10) NOT NULL DEFAULT '',
  `loginbox` int(1) NOT NULL DEFAULT '0',
  `newsbox` int(1) NOT NULL DEFAULT '0',
  `newstoshow` int(11) NOT NULL DEFAULT '0',
  `helpbox` int(1) NOT NULL DEFAULT '0',
  `perpage` int(10) NOT NULL DEFAULT '15',
  `moneyformat` int(1) NOT NULL DEFAULT '0',
  `moneydecimals` int(11) NOT NULL DEFAULT '2',
  `moneysymbol` int(1) NOT NULL DEFAULT '0',
  `currency` varchar(10) NOT NULL DEFAULT '',
  `adminmail` varchar(100) NOT NULL DEFAULT '',
  `banners` int(1) NOT NULL DEFAULT '0',
  `newsletter` int(1) NOT NULL DEFAULT '0',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `timecorrection` int(3) NOT NULL DEFAULT '0',
  `cron` int(1) NOT NULL DEFAULT '0',
  `archiveafter` int(11) NOT NULL DEFAULT '0',
  `datesformat` enum('USA','EUR') NOT NULL DEFAULT 'EUR',
  `errortext` text NOT NULL,
  `picturesgallery` int(1) NOT NULL DEFAULT '0',
  `maxpictures` int(11) NOT NULL DEFAULT '0',
  `buy_now` int(1) NOT NULL DEFAULT '1',
  `thumb_show` smallint(6) NOT NULL DEFAULT '120',
  `thumb_list` smallint(6) NOT NULL DEFAULT '120',
  `lastitemsnumber` int(11) NOT NULL DEFAULT '0',
  `hotitemsnumber` int(11) NOT NULL DEFAULT '0',
  `endingsoonnumber` int(11) NOT NULL DEFAULT '0',
  `boards` enum('y','n') NOT NULL DEFAULT 'y',
  `wordsfilter` enum('y','n') NOT NULL DEFAULT 'y',
  `aboutus` enum('y','n') NOT NULL DEFAULT 'y',
  `aboutustext` text NOT NULL,
  `terms` enum('y','n') NOT NULL DEFAULT 'y',
  `termstext` text NOT NULL,
  `privacypolicy` enum('y','n') NOT NULL DEFAULT 'y',
  `privacypolicytext` text NOT NULL,
  `defaultcountry` varchar(30) NOT NULL DEFAULT '',
  `defaultlanguage` char(2) NOT NULL DEFAULT 'EN',
  `catsorting` enum('alpha','counter') NOT NULL DEFAULT 'alpha',
  `usersauth` enum('y','n') NOT NULL DEFAULT 'y',
  `descriptiontag` text NOT NULL,
  `keywordstag` text NOT NULL,
  `maxuploadsize` int(11) NOT NULL DEFAULT '0',
  `contactseller` enum('always','logged','never') NOT NULL DEFAULT 'always',
  `theme` tinytext,
  `catstoshow` int(11) NOT NULL DEFAULT '0',
  `bn_only` enum('y','n') NOT NULL DEFAULT 'n',
  `users_email` enum('y','n') NOT NULL DEFAULT 'y',
  `boardsmsgs` int(11) NOT NULL DEFAULT '0',
  `activationtype` int(1) NOT NULL DEFAULT '1',
  `https` enum('y','n') NOT NULL DEFAULT 'n',
  `https_url` varchar(255) NOT NULL DEFAULT '',
  `bn_only_disable` enum('y','n') NOT NULL DEFAULT 'n',
  `bn_only_percent` int(3) NOT NULL DEFAULT '50',
  `buyerprivacy` enum('y','n') NOT NULL DEFAULT 'n',
  `cust_increment` int(1) NOT NULL DEFAULT '0',
  `subtitle` enum('y','n') NOT NULL DEFAULT 'y',
  `extra_cat` enum('y','n') NOT NULL DEFAULT 'n',
  `fees` enum('y','n') NOT NULL DEFAULT 'n',
  `fee_type` int(1) NOT NULL DEFAULT '1',
  `fee_max_debt` double(16,2) NOT NULL DEFAULT '25.00',
  `fee_signup_bonus` double(16,2) NOT NULL DEFAULT '0.00',
  `fee_disable_acc` enum('y','n') NOT NULL DEFAULT 'y',
  `tax` enum('y','n') NOT NULL DEFAULT 'n',
  `taxuser` enum('y','n') NOT NULL DEFAULT 'n',
  `ae_status` enum('y','n') NOT NULL DEFAULT 'n',
  `ae_timebefore` int(11) NOT NULL DEFAULT '120',
  `ae_extend` int(11) NOT NULL DEFAULT '300',
  `cache_theme` enum('y','n') NOT NULL DEFAULT 'y',
  `hours_countdown` int(5) NOT NULL DEFAULT '24',
  `edit_starttime` int(1) NOT NULL DEFAULT '1',
  `banner_width` int(11) NOT NULL DEFAULT '468',
  `banner_height` int(11) NOT NULL DEFAULT '60',
  `counter_auctions` enum('y','n') NOT NULL DEFAULT 'y',
  `counter_users` enum('y','n') NOT NULL DEFAULT 'y',
  `counter_online` enum('y','n') NOT NULL DEFAULT 'y',
  `banemail` text NOT NULL,
  `mandatory_fields` varchar(255) NOT NULL DEFAULT '',
  `displayed_feilds` varchar(255) NOT NULL DEFAULT '',
  `ao_hpf_enabled` enum('y','n') NOT NULL DEFAULT 'y',
  `ao_hi_enabled` enum('y','n') NOT NULL DEFAULT 'y',
  `ao_bi_enabled` enum('y','n') NOT NULL DEFAULT 'y',
  `proxy_bidding` enum('y','n') NOT NULL DEFAULT 'y',
  `recaptcha_public` varchar(40) NOT NULL DEFAULT '',
  `recaptcha_private` varchar(40) NOT NULL DEFAULT '',
  `spam_sendtofriend` int(1) NOT NULL DEFAULT '1',
  `spam_register` int(1) NOT NULL DEFAULT '1',
  `mod_queue` enum('y','n') NOT NULL DEFAULT 'n',
  `payment_options` text NOT NULL,
  `autorelist` enum('y','n') NOT NULL DEFAULT 'y',
  `autorelist_max` int(3) NOT NULL DEFAULT '10',
  `invoice_yellow_line` varchar(255) NOT NULL DEFAULT '',
  `invoice_thankyou` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_settings`
--

INSERT INTO `webid_settings` (`sitename`, `siteurl`, `copyright`, `version`, `loginbox`, `newsbox`, `newstoshow`, `helpbox`, `perpage`, `moneyformat`, `moneydecimals`, `moneysymbol`, `currency`, `adminmail`, `banners`, `newsletter`, `logo`, `timecorrection`, `cron`, `archiveafter`, `datesformat`, `errortext`, `picturesgallery`, `maxpictures`, `buy_now`, `thumb_show`, `thumb_list`, `lastitemsnumber`, `hotitemsnumber`, `endingsoonnumber`, `boards`, `wordsfilter`, `aboutus`, `aboutustext`, `terms`, `termstext`, `privacypolicy`, `privacypolicytext`, `defaultcountry`, `defaultlanguage`, `catsorting`, `usersauth`, `descriptiontag`, `keywordstag`, `maxuploadsize`, `contactseller`, `theme`, `catstoshow`, `bn_only`, `users_email`, `boardsmsgs`, `activationtype`, `https`, `https_url`, `bn_only_disable`, `bn_only_percent`, `buyerprivacy`, `cust_increment`, `subtitle`, `extra_cat`, `fees`, `fee_type`, `fee_max_debt`, `fee_signup_bonus`, `fee_disable_acc`, `tax`, `taxuser`, `ae_status`, `ae_timebefore`, `ae_extend`, `cache_theme`, `hours_countdown`, `edit_starttime`, `banner_width`, `banner_height`, `counter_auctions`, `counter_users`, `counter_online`, `banemail`, `mandatory_fields`, `displayed_feilds`, `ao_hpf_enabled`, `ao_hi_enabled`, `ao_bi_enabled`, `proxy_bidding`, `recaptcha_public`, `recaptcha_private`, `spam_sendtofriend`, `spam_register`, `mod_queue`, `payment_options`, `autorelist`, `autorelist_max`, `invoice_yellow_line`, `invoice_thankyou`) VALUES
('WeBid', 'http://127.0.0.1/', '', '1.1.1', 1, 1, 5, 1, 15, 1, 2, 2, 'GBP', 'admin@hacklab.com', 1, 1, 'logo.gif', 0, 2, 30, 'EUR', 'An unexpected error occurred. The error has been forwarded to our technical team and will be fixed shortly', 1, 5, 2, 120, 120, 8, 8, 0, 'y', 'y', 'y', '', 'y', '', 'y', '', 'United Kingdom', 'EN', 'alpha', 'y', '', '', 51200, 'always', 'default', 20, 'n', 'y', 0, 1, 'n', '', 'n', 50, 'n', 0, 'y', 'n', 'n', 1, 25.00, 0.00, 'y', 'n', 'n', 'n', 120, 300, 'y', 24, 1, 468, 60, 'y', 'y', 'y', '', 'a:7:{s:9:\"birthdate\";s:1:\"y\";s:7:\"address\";s:1:\"y\";s:4:\"city\";s:1:\"y\";s:4:\"prov\";s:1:\"y\";s:7:\"country\";s:1:\"y\";s:3:\"zip\";s:1:\"y\";s:3:\"tel\";s:1:\"y\";}', 'a:7:{s:17:\"birthdate_regshow\";s:1:\"y\";s:15:\"address_regshow\";s:1:\"y\";s:12:\"city_regshow\";s:1:\"y\";s:12:\"prov_regshow\";s:1:\"y\";s:15:\"country_regshow\";s:1:\"y\";s:11:\"zip_regshow\";s:1:\"y\";s:11:\"tel_regshow\";s:1:\"y\";}', 'y', 'y', 'y', 'y', '', '', 1, 1, 'n', 'a:2:{i:0;s:13:\"Wire Transfer\";i:1;s:6:\"Cheque\";}', 'y', 10, '', 'Thank you for shopping with us and we hope to see you return soon!');

-- --------------------------------------------------------

--
-- Table structure for table `webid_statssettings`
--

DROP TABLE IF EXISTS `webid_statssettings`;
CREATE TABLE `webid_statssettings` (
  `activate` enum('y','n') NOT NULL DEFAULT 'y',
  `accesses` enum('y','n') NOT NULL DEFAULT 'y',
  `browsers` enum('y','n') NOT NULL DEFAULT 'y',
  `domains` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_statssettings`
--

INSERT INTO `webid_statssettings` (`activate`, `accesses`, `browsers`, `domains`) VALUES
('n', 'y', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `webid_tax`
--

DROP TABLE IF EXISTS `webid_tax`;
CREATE TABLE `webid_tax` (
  `id` int(2) NOT NULL,
  `tax_name` varchar(30) NOT NULL,
  `tax_rate` double(16,2) NOT NULL,
  `countries_seller` text NOT NULL,
  `countries_buyer` text NOT NULL,
  `fee_tax` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_tax`
--

INSERT INTO `webid_tax` (`id`, `tax_name`, `tax_rate`, `countries_seller`, `countries_buyer`, `fee_tax`) VALUES
(1, 'Site Fees', 0.00, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `webid_useraccounts`
--

DROP TABLE IF EXISTS `webid_useraccounts`;
CREATE TABLE `webid_useraccounts` (
  `useracc_id` int(11) NOT NULL,
  `auc_id` int(15) NOT NULL DEFAULT '0',
  `user_id` int(15) NOT NULL DEFAULT '0',
  `date` int(15) NOT NULL DEFAULT '0',
  `setup` double(8,2) NOT NULL DEFAULT '0.00',
  `featured` double(8,2) NOT NULL DEFAULT '0.00',
  `bold` double(8,2) NOT NULL DEFAULT '0.00',
  `highlighted` double(8,2) NOT NULL DEFAULT '0.00',
  `subtitle` double(8,2) NOT NULL DEFAULT '0.00',
  `relist` double(8,2) NOT NULL DEFAULT '0.00',
  `reserve` double(8,2) NOT NULL DEFAULT '0.00',
  `buynow` double(8,2) NOT NULL DEFAULT '0.00',
  `image` double(8,2) NOT NULL DEFAULT '0.00',
  `extcat` double(8,2) NOT NULL DEFAULT '0.00',
  `signup` double(8,2) NOT NULL DEFAULT '0.00',
  `buyer` double(8,2) NOT NULL DEFAULT '0.00',
  `finalval` double(8,2) NOT NULL DEFAULT '0.00',
  `balance` double(8,2) NOT NULL DEFAULT '0.00',
  `total` double(8,2) NOT NULL,
  `paid` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webid_users`
--

DROP TABLE IF EXISTS `webid_users`;
CREATE TABLE `webid_users` (
  `id` int(32) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `password` varchar(32) DEFAULT '',
  `hash` varchar(5) DEFAULT '',
  `name` tinytext,
  `address` tinytext,
  `city` varchar(25) DEFAULT '',
  `prov` varchar(20) DEFAULT '',
  `country` varchar(30) DEFAULT '',
  `zip` varchar(10) DEFAULT '',
  `phone` varchar(40) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `reg_date` int(15) DEFAULT NULL,
  `rate_sum` int(11) NOT NULL DEFAULT '0',
  `rate_num` int(11) NOT NULL DEFAULT '0',
  `birthdate` int(8) DEFAULT '0',
  `suspended` int(1) DEFAULT '0',
  `nletter` int(1) NOT NULL DEFAULT '0',
  `balance` double(16,2) NOT NULL DEFAULT '0.00',
  `auc_watch` text,
  `item_watch` text,
  `endemailmode` enum('one','cum','none') NOT NULL DEFAULT 'one',
  `startemailmode` enum('yes','no') NOT NULL DEFAULT 'yes',
  `emailtype` enum('html','text') NOT NULL DEFAULT 'html',
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `payment_details` text,
  `groups` text,
  `bn_only` enum('y','n') NOT NULL DEFAULT 'y',
  `timecorrection` int(3) NOT NULL DEFAULT '0',
  `paypal_email` varchar(50) DEFAULT '',
  `authnet_id` varchar(50) DEFAULT '',
  `authnet_pass` varchar(50) DEFAULT '',
  `worldpay_id` varchar(50) DEFAULT '',
  `moneybookers_email` varchar(50) DEFAULT '',
  `toocheckout_id` varchar(50) DEFAULT '',
  `language` char(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_users`
--

INSERT INTO `webid_users` (`id`, `nick`, `password`, `hash`, `name`, `address`, `city`, `prov`, `country`, `zip`, `phone`, `email`, `reg_date`, `rate_sum`, `rate_num`, `birthdate`, `suspended`, `nletter`, `balance`, `auc_watch`, `item_watch`, `endemailmode`, `startemailmode`, `emailtype`, `lastlogin`, `payment_details`, `groups`, `bn_only`, `timecorrection`, `paypal_email`, `authnet_id`, `authnet_pass`, `worldpay_id`, `moneybookers_email`, `toocheckout_id`, `language`) VALUES
(1, 'hacklab', '2f19f8470e0cbc23363d20d25b8855f2', '38qo7', 'hacklab', '1 Bell Street', 'Dundee', 'Scotland', 'United Kingdom', 'DD11HG', '12312312312', 'hacklab@hacklab.com', 1562944031, 0, 0, 19630302, 0, 2, 0.00, NULL, NULL, 'one', 'yes', 'html', '2019-07-12 15:18:23', NULL, '1,2', 'y', 0, '', '', '', '', '', '', 'EN');

-- --------------------------------------------------------

--
-- Table structure for table `webid_usersips`
--

DROP TABLE IF EXISTS `webid_usersips`;
CREATE TABLE `webid_usersips` (
  `id` int(11) NOT NULL,
  `user` int(32) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `type` enum('first','after') NOT NULL DEFAULT 'first',
  `action` enum('accept','deny') NOT NULL DEFAULT 'accept'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webid_usersips`
--

INSERT INTO `webid_usersips` (`id`, `user`, `ip`, `type`, `action`) VALUES
(1, 1, '192.168.0.100', 'first', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `webid_winners`
--

DROP TABLE IF EXISTS `webid_winners`;
CREATE TABLE `webid_winners` (
  `id` int(11) NOT NULL,
  `auction` int(32) NOT NULL DEFAULT '0',
  `seller` int(32) NOT NULL DEFAULT '0',
  `winner` int(32) NOT NULL DEFAULT '0',
  `bid` double(16,2) NOT NULL DEFAULT '0.00',
  `closingdate` int(15) NOT NULL DEFAULT '0',
  `feedback_win` tinyint(1) NOT NULL DEFAULT '0',
  `feedback_sel` tinyint(1) NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '1',
  `paid` int(1) NOT NULL DEFAULT '0',
  `bf_paid` int(1) NOT NULL DEFAULT '0',
  `ff_paid` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `webid_accounts`
--
ALTER TABLE `webid_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_adminusers`
--
ALTER TABLE `webid_adminusers`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_auccounter`
--
ALTER TABLE `webid_auccounter`
  ADD PRIMARY KEY (`auction_id`);

--
-- Indexes for table `webid_auctions`
--
ALTER TABLE `webid_auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_banners`
--
ALTER TABLE `webid_banners`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_bannersstats`
--
ALTER TABLE `webid_bannersstats`
  ADD KEY `id` (`banner`);

--
-- Indexes for table `webid_bannersusers`
--
ALTER TABLE `webid_bannersusers`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_bids`
--
ALTER TABLE `webid_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_categories`
--
ALTER TABLE `webid_categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `left_id` (`left_id`,`right_id`,`level`);

--
-- Indexes for table `webid_comm_messages`
--
ALTER TABLE `webid_comm_messages`
  ADD KEY `msg_id` (`id`);

--
-- Indexes for table `webid_community`
--
ALTER TABLE `webid_community`
  ADD KEY `msg_id` (`id`);

--
-- Indexes for table `webid_countries`
--
ALTER TABLE `webid_countries`
  ADD PRIMARY KEY (`country`);

--
-- Indexes for table `webid_faqs`
--
ALTER TABLE `webid_faqs`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_faqs_translated`
--
ALTER TABLE `webid_faqs_translated`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_faqscategories`
--
ALTER TABLE `webid_faqscategories`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_feedbacks`
--
ALTER TABLE `webid_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_fees`
--
ALTER TABLE `webid_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_groups`
--
ALTER TABLE `webid_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_increments`
--
ALTER TABLE `webid_increments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_logs`
--
ALTER TABLE `webid_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_maintainance`
--
ALTER TABLE `webid_maintainance`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_membertypes`
--
ALTER TABLE `webid_membertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_messages`
--
ALTER TABLE `webid_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_news`
--
ALTER TABLE `webid_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_online`
--
ALTER TABLE `webid_online`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `webid_pendingnotif`
--
ALTER TABLE `webid_pendingnotif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_rates`
--
ALTER TABLE `webid_rates`
  ADD KEY `id` (`id`);

--
-- Indexes for table `webid_tax`
--
ALTER TABLE `webid_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_useraccounts`
--
ALTER TABLE `webid_useraccounts`
  ADD PRIMARY KEY (`useracc_id`);

--
-- Indexes for table `webid_users`
--
ALTER TABLE `webid_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_usersips`
--
ALTER TABLE `webid_usersips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webid_winners`
--
ALTER TABLE `webid_winners`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `webid_accounts`
--
ALTER TABLE `webid_accounts`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_adminusers`
--
ALTER TABLE `webid_adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webid_auctions`
--
ALTER TABLE `webid_auctions`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_banners`
--
ALTER TABLE `webid_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_bannersusers`
--
ALTER TABLE `webid_bannersusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_bids`
--
ALTER TABLE `webid_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_categories`
--
ALTER TABLE `webid_categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT for table `webid_comm_messages`
--
ALTER TABLE `webid_comm_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_community`
--
ALTER TABLE `webid_community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webid_faqs`
--
ALTER TABLE `webid_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `webid_faqs_translated`
--
ALTER TABLE `webid_faqs_translated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `webid_faqscategories`
--
ALTER TABLE `webid_faqscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webid_feedbacks`
--
ALTER TABLE `webid_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_fees`
--
ALTER TABLE `webid_fees`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `webid_groups`
--
ALTER TABLE `webid_groups`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webid_increments`
--
ALTER TABLE `webid_increments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `webid_logs`
--
ALTER TABLE `webid_logs`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `webid_maintainance`
--
ALTER TABLE `webid_maintainance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webid_membertypes`
--
ALTER TABLE `webid_membertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `webid_messages`
--
ALTER TABLE `webid_messages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_news`
--
ALTER TABLE `webid_news`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webid_online`
--
ALTER TABLE `webid_online`
  MODIFY `ID` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `webid_pendingnotif`
--
ALTER TABLE `webid_pendingnotif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_rates`
--
ALTER TABLE `webid_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `webid_tax`
--
ALTER TABLE `webid_tax`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webid_useraccounts`
--
ALTER TABLE `webid_useraccounts`
  MODIFY `useracc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webid_users`
--
ALTER TABLE `webid_users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webid_usersips`
--
ALTER TABLE `webid_usersips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webid_winners`
--
ALTER TABLE `webid_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
