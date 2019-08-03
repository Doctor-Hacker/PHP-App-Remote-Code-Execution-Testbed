-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2016 at 01:01 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `es_addon_modules`
--

CREATE TABLE IF NOT EXISTS `es_addon_modules` (
  `addon_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `v_admin` varchar(255) NOT NULL,
  `v_staff` varchar(255) NOT NULL,
  `v_n_staff` varchar(255) NOT NULL,
  `v_student` varchar(255) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_type` varchar(255) NOT NULL DEFAULT 'admin',
  `created_on` date NOT NULL,
  PRIMARY KEY (`addon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_addon_modules`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_admins`
--

CREATE TABLE IF NOT EXISTS `es_admins` (
  `es_adminsid` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `user_type` enum('super','admin') NOT NULL,
  `user_theme` varchar(255) NOT NULL DEFAULT 'pink.css',
  `admin_lname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phoneno` varchar(255) NOT NULL,
  `admin_more` text NOT NULL,
  `admin_permissions` text NOT NULL,
  PRIMARY KEY (`es_adminsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `es_admins`
--

INSERT INTO `es_admins` (`es_adminsid`, `admin_username`, `admin_password`, `admin_fname`, `user_type`, `user_theme`, `admin_lname`, `admin_email`, `admin_phoneno`, `admin_more`, `admin_permissions`) VALUES
(1, 'admin', 'admin', 'Admin', 'super', 'pink.css', 'Admin', 'admin@gmail.com', '12345556', '', '1_p,1_1,1_2,1_4,1_3,2_p,2_1,2_2,2_3,2_4,2_5,2_6,2_7,2_8,2_9,2_10,2_11,2_12,2_13,2_14,2_15,2_20,2_16,2_17,2_18,2_19,3_p,3_1,3_2,3_3,3_5,3_4,3_7,4_p,5_p,5_1,5_3,5_2,6_p,6_1,6_2,6_3,6_6,6_7,6_8,6_9,6_10,6_11,6_12,6_13,6_14,6_15,6_16,7_p,7_1,7_2,7_3,7_4,7_5,8_p,8_1,8_2,8_3,8_101,8_4,8_5,8_6,8_16,8_102,8_7,8_8,8_9,8_17,8_103,8_104,8_10,8_11,8_12,8_18,8_105,8_106,8_13,8_14,8_15,8_19,8_107,8_108,9_p,9_1,9_17,9_18,9_19,9_2,9_20,9_21,9_22,9_23,9_3,9_4,9_5,9_6,9_101,9_7,9_102,9_8,9_103,9_24,9_25,9_33,9_11,9_12,9_26,9_13,9_27,9_14,9_29,9_30,9_31,9_15,9_16,9_32,10_p,10_1,10_2,10_3,10_4,10_5,10_6,10_7,10_8,10_11,10_9,10_10,10_12,11_p,11_1,11_2,11_3,11_4,11_5,11_6,11_7,11_8,11_9,11_10,11_11,11_12,11_13,11_14,11_15,11_16,11_17,11_18,11_19,11_20,11_21,11_23,11_101,11_102,11_22,11_103,11_104,12_p,12_1,12_2,12_3,12_4,12_5,12_11,12_6,12_7,12_8,12_12,12_9,12_10,13_p,13_1,13_2,13_3,13_17,13_4,13_5,13_6,13_18,13_7,13_8,13_9,13_19,13_20,13_10,13_11,13_12,13_21,13_22,13_13,13_14,13_15,13_16,13_23,13_101,13_102,13_103,13_104,13_106,13_105,14_p,14_1,14_2,14_3,14_101,14_4,14_5,14_6,14_102,14_7,14_8,14_9,14_103,14_10,14_21,14_104,14_11,14_105,14_12,14_106,14_13,14_14,14_15,14_16,14_107,14_17,14_18,14_19,14_20,15_p,15_1,15_2,15_3,16_p,16_1,16_2,16_3,16_101,16_4,16_5,16_6,16_102,16_7,16_8,16_10,16_11,16_12,16_103,16_13,16_14,16_15,16_17,16_18,16_20,16_21,16_24,16_104,16_105,16_22,16_25,16_23,16_26,16_106,16_107,16_27,16_28,16_29,17_p,17_1,17_6,17_2,17_3,17_101,17_4,17_5,17_7,17_8,17_9,18_p,18_5,18_1,18_2,18_3,18_4,18_6,18_7,18_8,18_9,18_10,18_11,18_12,19_p,19_1,19_2,19_3,19_4,19_5,19_6,19_11,19_7,19_12,19_13,19_14,19_15,19_101,19_102,19_8,19_16,19_9,19_10,19_17,19_18,20_p,20_1,20_5,20_101,20_2,20_6,20_102,20_3,20_4,21_p,21_1,21_2,21_3,22_p,22_1,22_2,22_3,22_5,22_4,22_6,23_p,24_p,24_1,24_2,24_3,24_4,25_p,25_1,25_2,25_5,25_6,25_3,25_4,25_7,25_8,26_p,26_1,26_2,27_p,27_1,27_2,27_3,28_p,28_1,28_2,28_3,28_4,28_5,29_p,29_1,29_2,30_p,30_1,30_2,30_3,30_4,30_5,30_6,30_7,30_8,31_p,31_1,31_2,31_3,31_5,31_4,32_p,32_3,32_1,32_4,32_2,32_5,33_p,33_1,33_2,33_3,33_8,33_4,33_5,33_6,33_7,34_p,34_1,34_2,35_p,35_1,35_2,35_3,13_108,13_109,5_11,5_12,5_5,5_6,6_20');

-- --------------------------------------------------------

--
-- Table structure for table `es_allowencemaster`
--

CREATE TABLE IF NOT EXISTS `es_allowencemaster` (
  `es_allowencemasterid` int(11) NOT NULL AUTO_INCREMENT,
  `alw_post` varchar(255) NOT NULL,
  `alw_type` varchar(255) NOT NULL,
  `alw_fromdate` date NOT NULL,
  `alw_todate` date NOT NULL,
  `alw_amount` varchar(255) NOT NULL,
  `alw_amt_type` varchar(255) NOT NULL,
  `alw_dept` varchar(255) NOT NULL,
  PRIMARY KEY (`es_allowencemasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_allowencemaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_assignment`
--

CREATE TABLE IF NOT EXISTS `es_assignment` (
  `es_assignmentid` int(11) NOT NULL AUTO_INCREMENT,
  `as_name` varchar(255) NOT NULL,
  `as_class` varchar(255) NOT NULL,
  `as_sec` varchar(255) NOT NULL,
  `as_suject` varchar(255) NOT NULL,
  `as_lastdate` date NOT NULL,
  `as_description` longtext NOT NULL,
  `as_createdon` date NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `as_marks` int(11) NOT NULL,
  `person_type` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`es_assignmentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_attemptcerti`
--

CREATE TABLE IF NOT EXISTS `es_attemptcerti` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `exam_name` varchar(222) NOT NULL,
  `exam_date` varchar(222) NOT NULL,
  `roll_number` varchar(222) NOT NULL,
  `marks_obtained` varchar(222) NOT NULL,
  `rank` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `charector` varchar(222) NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `games` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_attemptcerti`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_attend_staff`
--

CREATE TABLE IF NOT EXISTS `es_attend_staff` (
  `es_attend_staffid` int(11) NOT NULL AUTO_INCREMENT,
  `at_staff_dept` varchar(255) NOT NULL,
  `at_staff_date` datetime NOT NULL,
  `at_staff_id` varchar(255) NOT NULL,
  `at_staff_name` varchar(255) NOT NULL,
  `at_staff_desig` varchar(255) NOT NULL,
  `at_staff_attend` varchar(255) NOT NULL,
  `at_staff_remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`es_attend_staffid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_attend_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_attend_student`
--

CREATE TABLE IF NOT EXISTS `es_attend_student` (
  `es_attend_studentid` int(11) NOT NULL AUTO_INCREMENT,
  `at_std_group` varchar(255) NOT NULL,
  `at_std_class` varchar(255) NOT NULL,
  `at_attendance_date` datetime NOT NULL,
  `at_std_subject` varchar(255) NOT NULL,
  `at_std_period` int(11) NOT NULL,
  `at_period_from` int(11) NOT NULL,
  `at_period_to` int(11) NOT NULL,
  `at_reg_no` varchar(255) NOT NULL,
  `at_stud_name` varchar(255) NOT NULL,
  `at_attendance` varchar(255) NOT NULL,
  `at_remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`es_attend_studentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_attend_student`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_bonafied`
--

CREATE TABLE IF NOT EXISTS `es_bonafied` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `exam_name` varchar(222) NOT NULL,
  `exam_date` varchar(222) NOT NULL,
  `roll_number` varchar(222) NOT NULL,
  `marks_obtained` varchar(222) NOT NULL,
  `rank` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `charector` varchar(222) NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `games` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_bonafied`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_bookissue`
--

CREATE TABLE IF NOT EXISTS `es_bookissue` (
  `es_bookissueid` int(11) NOT NULL AUTO_INCREMENT,
  `bki_id` int(11) NOT NULL,
  `bki_bookid` int(11) NOT NULL,
  `issuetype` varchar(255) NOT NULL,
  `issuedate` date NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`es_bookissueid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_bookissue`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_booklets`
--

CREATE TABLE IF NOT EXISTS `es_booklets` (
  `booklet_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_file` varchar(255) NOT NULL,
  `book_desc` longtext NOT NULL,
  `user_type` enum('admin','staff') NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`booklet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_booklets`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_bookreturns`
--

CREATE TABLE IF NOT EXISTS `es_bookreturns` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_id` bigint(20) NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_bookreturns`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_book_reservation`
--

CREATE TABLE IF NOT EXISTS `es_book_reservation` (
  `reserv_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `staff_or_student_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `reservetype` enum('student','staff') NOT NULL,
  `reserved_on` date NOT NULL,
  `expired_on` date NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`reserv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_book_reservation`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_candidate`
--

CREATE TABLE IF NOT EXISTS `es_candidate` (
  `es_candidateid` int(11) NOT NULL AUTO_INCREMENT,
  `st_postaplied` varchar(255) NOT NULL,
  `st_firstname` varchar(255) NOT NULL,
  `st_lastname` varchar(255) NOT NULL,
  `st_gender` varchar(255) NOT NULL,
  `st_dob` varchar(255) NOT NULL,
  `st_primarysubject` varchar(255) NOT NULL,
  `st_fatherhusname` varchar(255) NOT NULL,
  `st_noofdughters` int(11) NOT NULL,
  `st_noofsons` int(11) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_mobilenocomunication` varchar(255) NOT NULL,
  `st_examp1` varchar(255) NOT NULL,
  `st_examp2` varchar(255) NOT NULL,
  `st_examp3` varchar(255) NOT NULL,
  `st_marks1` varchar(255) NOT NULL,
  `st_marks2` varchar(255) NOT NULL,
  `st_marks3` varchar(255) NOT NULL,
  `st_borduniversity1` varchar(255) NOT NULL,
  `st_borduniversity2` varchar(255) NOT NULL,
  `st_borduniversity3` varchar(255) NOT NULL,
  `st_year1` varchar(255) NOT NULL,
  `st_year2` varchar(255) NOT NULL,
  `st_year3` varchar(255) NOT NULL,
  `st_insititute1` varchar(255) NOT NULL,
  `st_insititute2` varchar(255) NOT NULL,
  `st_insititute3` varchar(255) NOT NULL,
  `st_position1` varchar(255) NOT NULL,
  `st_position2` varchar(255) NOT NULL,
  `st_position3` varchar(255) NOT NULL,
  `st_period1` varchar(255) NOT NULL,
  `st_period2` varchar(255) NOT NULL,
  `st_period3` varchar(255) NOT NULL,
  `st_pradress` varchar(255) NOT NULL,
  `st_prcity` varchar(255) NOT NULL,
  `st_prpincode` varchar(255) NOT NULL,
  `st_prphonecode` varchar(255) NOT NULL,
  `st_prstate` varchar(255) NOT NULL,
  `st_prresino` varchar(255) NOT NULL,
  `st_prcountry` varchar(255) NOT NULL,
  `st_prmobno` varchar(255) NOT NULL,
  `st_peadress` varchar(255) NOT NULL,
  `st_pecity` varchar(255) NOT NULL,
  `st_pepincode` varchar(255) NOT NULL,
  `st_pephoneno` varchar(255) NOT NULL,
  `st_pestate` varchar(255) NOT NULL,
  `st_peresino` varchar(255) NOT NULL,
  `st_pecountry` varchar(255) NOT NULL,
  `st_pemobileno` varchar(255) NOT NULL,
  `st_refposname1` varchar(255) NOT NULL,
  `st_refposname2` varchar(255) NOT NULL,
  `st_refposname3` varchar(255) NOT NULL,
  `st_refdesignation1` varchar(255) NOT NULL,
  `st_refdesignation2` varchar(255) NOT NULL,
  `st_refdesignation3` varchar(255) NOT NULL,
  `st_refinsititute1` varchar(255) NOT NULL,
  `st_refinsititute2` varchar(255) NOT NULL,
  `st_refinsititute3` varchar(255) NOT NULL,
  `st_refemail1` varchar(255) NOT NULL,
  `st_refemail2` varchar(255) NOT NULL,
  `st_refemail3` varchar(255) NOT NULL,
  `st_writentest` varchar(255) NOT NULL,
  `st_technicalinterview` varchar(255) NOT NULL,
  `st_finalinterview` varchar(255) NOT NULL,
  `status` enum('selected','notselected','onhold') NOT NULL,
  `st_perviouspackage` varchar(255) NOT NULL,
  `st_basic` varchar(255) NOT NULL,
  `st_dateofjoining` varchar(255) NOT NULL,
  `st_post` varchar(255) NOT NULL,
  `st_department` varchar(255) NOT NULL,
  `st_remarks` varchar(255) NOT NULL,
  `st_qualification` varchar(255) NOT NULL,
  `st_class` varchar(255) NOT NULL,
  `es_staffid` int(11) NOT NULL,
  `staff_status` enum('addedtostaff','notadded') NOT NULL,
  `st_emailsend` varchar(255) NOT NULL,
  PRIMARY KEY (`es_candidateid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_candidate`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_caste`
--

CREATE TABLE IF NOT EXISTS `es_caste` (
  `caste_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `caste` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`caste_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_caste`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_categorylibrary`
--

CREATE TABLE IF NOT EXISTS `es_categorylibrary` (
  `es_categorylibraryid` int(11) NOT NULL AUTO_INCREMENT,
  `lb_categoryname` varchar(255) NOT NULL,
  `lb_catdesc` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`es_categorylibraryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_categorylibrary`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_chapters`
--

CREATE TABLE IF NOT EXISTS `es_chapters` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `chapter_name` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`chapter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_chapters`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_charcerti`
--

CREATE TABLE IF NOT EXISTS `es_charcerti` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `exam_name` varchar(222) NOT NULL,
  `exam_date` varchar(222) NOT NULL,
  `roll_number` varchar(222) NOT NULL,
  `marks_obtained` varchar(222) NOT NULL,
  `rank` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `charector` varchar(222) NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `games` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_charcerti`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_classes`
--

CREATE TABLE IF NOT EXISTS `es_classes` (
  `es_classesid` int(11) NOT NULL AUTO_INCREMENT,
  `es_classname` varchar(255) NOT NULL,
  `es_orderby` int(11) NOT NULL,
  `es_schoolid` int(11) NOT NULL,
  `es_groupid` int(11) NOT NULL,
  PRIMARY KEY (`es_classesid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_classes`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_classifieds`
--

CREATE TABLE IF NOT EXISTS `es_classifieds` (
  `es_classifiedsid` int(11) NOT NULL AUTO_INCREMENT,
  `cfs_name` varchar(255) NOT NULL,
  `cfs_modeofadds` varchar(255) NOT NULL,
  `cfs_posteddate` date NOT NULL,
  `cfs_details` longtext NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`es_classifiedsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_classifieds`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_deductionmaster`
--

CREATE TABLE IF NOT EXISTS `es_deductionmaster` (
  `es_deductionmasterid` int(11) NOT NULL AUTO_INCREMENT,
  `ded_post` varchar(255) NOT NULL,
  `ded_type` varchar(255) NOT NULL,
  `ded_fromdate` date NOT NULL,
  `ded_todate` date NOT NULL,
  `ded_amount` varchar(255) NOT NULL,
  `ded_amt_type` varchar(255) NOT NULL,
  `ded_dept` varchar(255) NOT NULL,
  PRIMARY KEY (`es_deductionmasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_deductionmaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_departments`
--

CREATE TABLE IF NOT EXISTS `es_departments` (
  `es_departmentsid` int(11) NOT NULL AUTO_INCREMENT,
  `es_deptname` varchar(255) NOT NULL,
  `es_orderby` int(11) NOT NULL,
  `es_groupid` int(11) NOT NULL,
  PRIMARY KEY (`es_departmentsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_departments`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_deptposts`
--

CREATE TABLE IF NOT EXISTS `es_deptposts` (
  `es_deptpostsid` int(11) NOT NULL AUTO_INCREMENT,
  `es_postshortname` varchar(255) NOT NULL,
  `es_postcode` varchar(255) NOT NULL,
  `es_postname` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`es_deptpostsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_deptposts`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_dispatch`
--

CREATE TABLE IF NOT EXISTS `es_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispatch_category` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_dispatch`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_dispatch_entry`
--

CREATE TABLE IF NOT EXISTS `es_dispatch_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispatchgroup` int(11) NOT NULL,
  `dateofdispatch` date NOT NULL,
  `received_company` varchar(255) NOT NULL,
  `received_address` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `partculars` text NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `recived_by` varchar(255) NOT NULL,
  `submited_to` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `latter_status` enum('Open','Closed') NOT NULL DEFAULT 'Closed',
  `status` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active',
  `out_sender` varchar(255) NOT NULL,
  `out_to` varchar(255) NOT NULL,
  `out_address` text NOT NULL,
  `out_type` varchar(255) NOT NULL,
  `out_sentthrough` varchar(255) NOT NULL,
  `in_receivedthrough` varchar(255) NOT NULL,
  `consignment_no` varchar(255) NOT NULL,
  `dispatch_type` varchar(255) NOT NULL,
  `outward_dispatch_type` varchar(255) NOT NULL,
  `d_letter_types` varchar(255) NOT NULL,
  `p_latter_id` int(11) NOT NULL,
  `courrier_name` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_dispatch_entry`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_eligibilitycerti`
--

CREATE TABLE IF NOT EXISTS `es_eligibilitycerti` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `exam_name` varchar(222) NOT NULL,
  `exam_date` varchar(222) NOT NULL,
  `roll_number` varchar(222) NOT NULL,
  `marks_obtained` varchar(222) NOT NULL,
  `rank` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `charector` varchar(222) NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `games` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_eligibilitycerti`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_enquiry`
--

CREATE TABLE IF NOT EXISTS `es_enquiry` (
  `es_enquiryid` int(11) NOT NULL AUTO_INCREMENT,
  `eq_serialno` int(11) NOT NULL,
  `eq_createdon` date NOT NULL,
  `eq_name` varchar(255) NOT NULL,
  `eq_address` varchar(255) NOT NULL,
  `eq_city` varchar(255) NOT NULL,
  `eq_wardname` varchar(255) NOT NULL,
  `eq_sex` varchar(255) NOT NULL,
  `eq_class` varchar(255) NOT NULL,
  `eq_phno` varchar(255) NOT NULL,
  `eq_mobile` varchar(255) NOT NULL,
  `eq_emailid` varchar(255) NOT NULL,
  `eq_reftype` varchar(255) NOT NULL,
  `eq_refname` varchar(255) NOT NULL,
  `eq_description` varchar(255) NOT NULL,
  `eq_formtype` varchar(255) NOT NULL,
  `eq_paymode` varchar(255) NOT NULL,
  `eq_chequeno` varchar(255) NOT NULL,
  `eq_bankname` varchar(255) NOT NULL,
  `eq_submitedon` date NOT NULL,
  `eq_acadamic` varchar(255) NOT NULL,
  `eq_marksobtain` int(11) NOT NULL,
  `eq_outof` int(11) NOT NULL,
  `eq_oralexam` varchar(255) NOT NULL,
  `eq_familyinteraction` varchar(255) NOT NULL,
  `eq_percentage` double NOT NULL,
  `eq_result` varchar(255) NOT NULL,
  `eq_amountpaid` varchar(255) NOT NULL,
  `eq_state` varchar(255) NOT NULL,
  `es_preadmissionid` int(11) NOT NULL,
  `eq_mothername` varchar(255) NOT NULL,
  `eq_zip` varchar(255) NOT NULL,
  `college_id` int(11) NOT NULL,
  `eq_prv_acdmic` text NOT NULL,
  `eq_countryid` varchar(255) NOT NULL,
  `eq_dob` date NOT NULL,
  `eq_application_no` varchar(255) NOT NULL,
  `es_voucherentryid` int(11) NOT NULL,
  `pre_class` varchar(255) NOT NULL,
  `scat_id` varchar(255) NOT NULL,
  PRIMARY KEY (`es_enquiryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_enquiry`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_exam`
--

CREATE TABLE IF NOT EXISTS `es_exam` (
  `es_examid` int(11) NOT NULL AUTO_INCREMENT,
  `es_examname` varchar(255) NOT NULL,
  `es_examordby` int(11) NOT NULL,
  PRIMARY KEY (`es_examid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_exam`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_examfee`
--

CREATE TABLE IF NOT EXISTS `es_examfee` (
  `exam_fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_preadmissionid` int(11) NOT NULL,
  `fine_name` varchar(255) NOT NULL,
  `fine_amount` double NOT NULL,
  `created_on` date NOT NULL,
  `paid_amount` double NOT NULL,
  `deduction_allowed` double NOT NULL,
  `paid_on` date NOT NULL,
  `balance` double NOT NULL,
  `remarks` text NOT NULL,
  `voucherid` varchar(255) NOT NULL,
  PRIMARY KEY (`exam_fee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_examfee`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_exam_academic`
--

CREATE TABLE IF NOT EXISTS `es_exam_academic` (
  `es_exam_academicid` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`es_exam_academicid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_exam_academic`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_exam_details`
--

CREATE TABLE IF NOT EXISTS `es_exam_details` (
  `es_exam_detailsid` int(11) NOT NULL AUTO_INCREMENT,
  `academicexam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_date` datetime NOT NULL,
  `exam_duration` varchar(255) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `pass_marks` int(11) NOT NULL,
  `upload_exam_paper` longtext NOT NULL,
  PRIMARY KEY (`es_exam_detailsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_exam_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_expcerti`
--

CREATE TABLE IF NOT EXISTS `es_expcerti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `aced_year` varchar(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `charac` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `conduct` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_expcerti`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_fa_groups`
--

CREATE TABLE IF NOT EXISTS `es_fa_groups` (
  `es_fa_groupsid` int(11) NOT NULL AUTO_INCREMENT,
  `fa_groupname` varchar(255) NOT NULL,
  `fa_undergroup` varchar(255) NOT NULL,
  `fa_display` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`es_fa_groupsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_fa_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_feemaster`
--

CREATE TABLE IF NOT EXISTS `es_feemaster` (
  `es_feemasterid` int(11) NOT NULL AUTO_INCREMENT,
  `fee_particular` varchar(255) NOT NULL,
  `fee_class` int(11) NOT NULL,
  `fee_amount` double NOT NULL,
  `fee_instalments` int(11) NOT NULL,
  `fee_extra1` varchar(255) NOT NULL,
  `fee_extra2` varchar(255) NOT NULL,
  `fee_fromdate` date NOT NULL,
  `fee_todate` date NOT NULL,
  PRIMARY KEY (`es_feemasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_feemaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_feepaid`
--

CREATE TABLE IF NOT EXISTS `es_feepaid` (
  `es_feepaidid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `particularid` int(11) NOT NULL,
  `particulartname` varchar(255) NOT NULL,
  `feeamount` float NOT NULL,
  `date` date NOT NULL,
  `academicyear` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `es_installment` int(11) NOT NULL,
  `fi_fromdate` date NOT NULL,
  `fi_todate` date NOT NULL,
  `es_voucherentryid` int(11) NOT NULL,
  `fee_waived` varchar(255) NOT NULL,
  PRIMARY KEY (`es_feepaidid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_feepaid`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_feepaid_new`
--

CREATE TABLE IF NOT EXISTS `es_feepaid_new` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `es_preadmissionid` int(11) NOT NULL,
  `financemaster_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `paid_on` date NOT NULL,
  `voucherid` int(50) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_feepaid_new`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_feepaid_new_details`
--

CREATE TABLE IF NOT EXISTS `es_feepaid_new_details` (
  `fp_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `particulars` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`fp_det_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_feepaid_new_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_feesnotice`
--

CREATE TABLE IF NOT EXISTS `es_feesnotice` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `exam_name` varchar(222) NOT NULL,
  `exam_date` varchar(222) NOT NULL,
  `roll_number` varchar(222) NOT NULL,
  `marks_obtained` varchar(222) NOT NULL,
  `rank` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `charector` varchar(222) NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `games` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(222) NOT NULL,
  `state` varchar(222) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `fee` varchar(230) NOT NULL,
  `subject` varchar(230) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_feesnotice`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_fee_inst_last_date`
--

CREATE TABLE IF NOT EXISTS `es_fee_inst_last_date` (
  `inst_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_finance_masterid` int(11) NOT NULL,
  `instalment_no` int(11) NOT NULL,
  `last_date` date NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_fee_inst_last_date`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_finance_master`
--

CREATE TABLE IF NOT EXISTS `es_finance_master` (
  `es_finance_masterid` int(11) NOT NULL AUTO_INCREMENT,
  `fi_startdate` date NOT NULL,
  `fi_enddate` date NOT NULL,
  `fi_address` text NOT NULL,
  `fi_currency` varchar(255) NOT NULL,
  `fi_symbol` varchar(255) NOT NULL,
  `fi_email` varchar(255) NOT NULL,
  `fi_initialbalance` float NOT NULL,
  `fi_phoneno` varchar(255) NOT NULL,
  `fi_school_logo` varchar(255) NOT NULL,
  `fi_website` varchar(255) NOT NULL,
  `fi_ac_startdate` date NOT NULL,
  `fi_ac_enddate` date NOT NULL,
  `fi_schoolname` varchar(255) NOT NULL,
  `fi_endclass` varchar(255) NOT NULL,
  PRIMARY KEY (`es_finance_masterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_finance_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_fine_charged_collected`
--

CREATE TABLE IF NOT EXISTS `es_fine_charged_collected` (
  `es_fcc_id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `es_feemasterid` int(11) NOT NULL,
  `fine_amount` double NOT NULL,
  `amount_paid` double NOT NULL,
  `deduction_allowed` double NOT NULL,
  `es_installment` int(11) NOT NULL,
  `date` date NOT NULL,
  `fi_fromdate` date NOT NULL,
  `fi_todate` date NOT NULL,
  `es_voucherentryid` int(11) NOT NULL,
  PRIMARY KEY (`es_fcc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_fine_charged_collected`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_fine_master`
--

CREATE TABLE IF NOT EXISTS `es_fine_master` (
  `es_fine_masterid` int(11) NOT NULL AUTO_INCREMENT,
  `fine_amount` float NOT NULL,
  `fine_type` enum('Percentage','Amount') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`es_fine_masterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_fine_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_groups`
--

CREATE TABLE IF NOT EXISTS `es_groups` (
  `es_groupsid` int(11) NOT NULL AUTO_INCREMENT,
  `es_groupname` varchar(255) NOT NULL,
  `es_grouporderby` int(11) NOT NULL,
  PRIMARY KEY (`es_groupsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_holidaynoti`
--

CREATE TABLE IF NOT EXISTS `es_holidaynoti` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `exam_name` varchar(222) NOT NULL,
  `exam_date` varchar(222) NOT NULL,
  `roll_number` varchar(222) NOT NULL,
  `marks_obtained` varchar(222) NOT NULL,
  `rank` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `charector` varchar(222) NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `games` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_holidaynoti`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_holidays`
--

CREATE TABLE IF NOT EXISTS `es_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `holiday_date` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_holidays`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_hostelbuld`
--

CREATE TABLE IF NOT EXISTS `es_hostelbuld` (
  `es_hostelbuldid` int(11) NOT NULL AUTO_INCREMENT,
  `buld_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL,
  PRIMARY KEY (`es_hostelbuldid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_hostelbuld`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_hostelperson_item`
--

CREATE TABLE IF NOT EXISTS `es_hostelperson_item` (
  `es_hostelperson_itemid` int(11) NOT NULL AUTO_INCREMENT,
  `hostelperson_itemno` int(11) NOT NULL,
  `hostelperson_itemcode` int(11) NOT NULL,
  `hostelperson_itemname` varchar(255) NOT NULL,
  `hostelperson_itemtype` varchar(255) NOT NULL,
  `hostelperson_itemqty` int(11) NOT NULL,
  `es_personid` int(11) NOT NULL,
  `hostelperson_itemissued` datetime NOT NULL,
  `es_persontype` varchar(255) NOT NULL,
  `es_roomallotmentid` int(11) NOT NULL,
  `status` enum('issued','issuereturn') NOT NULL,
  `return_on` date NOT NULL,
  PRIMARY KEY (`es_hostelperson_itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_hostelperson_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_hostelroom`
--

CREATE TABLE IF NOT EXISTS `es_hostelroom` (
  `es_hostelroomid` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(255) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_vacancy` int(11) NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `buld_name` varchar(255) NOT NULL,
  `es_hostelbuldid` int(11) DEFAULT NULL,
  `room_rate` double NOT NULL,
  PRIMARY KEY (`es_hostelroomid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_hostelroom`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_hostel_charges`
--

CREATE TABLE IF NOT EXISTS `es_hostel_charges` (
  `es_hostel_charges_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_roomallotmentid` int(11) NOT NULL,
  `es_hostelbuldid` int(11) NOT NULL,
  `es_personid` int(11) NOT NULL,
  `es_persontype` varchar(255) NOT NULL,
  `due_month` date NOT NULL,
  `room_rate` double NOT NULL,
  `amount_paid` double NOT NULL,
  `deduction` double NOT NULL,
  `balance` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `paid_on` date NOT NULL,
  `remarks` text NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`es_hostel_charges_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_hostel_charges`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_hostel_health`
--

CREATE TABLE IF NOT EXISTS `es_hostel_health` (
  `es_hostel_healthid` int(11) NOT NULL AUTO_INCREMENT,
  `health_regno` int(11) NOT NULL,
  `health_name` varchar(255) NOT NULL,
  `health_class` varchar(255) NOT NULL,
  `health_section` varchar(255) NOT NULL,
  `health_problem` varchar(255) NOT NULL,
  `health_doctorname` varchar(255) NOT NULL,
  `health_address` varchar(255) NOT NULL,
  `health_contactno` int(11) NOT NULL,
  `health_prescription` varchar(255) NOT NULL,
  `es_personid` int(11) NOT NULL,
  `es_persontpe` varchar(255) NOT NULL,
  `es_createdon` date NOT NULL,
  PRIMARY KEY (`es_hostel_healthid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_hostel_health`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_idcard_image`
--

CREATE TABLE IF NOT EXISTS `es_idcard_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horizontal_image` varchar(255) NOT NULL,
  `vertical_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_idcard_image`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_incharge`
--

CREATE TABLE IF NOT EXISTS `es_incharge` (
  `incharge_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_classesid` varchar(255) NOT NULL,
  `es_staffid` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`incharge_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_incharge`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_institutes`
--

CREATE TABLE IF NOT EXISTS `es_institutes` (
  `inst_id` int(11) NOT NULL AUTO_INCREMENT,
  `inst_name` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_institutes`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_inventory`
--

CREATE TABLE IF NOT EXISTS `es_inventory` (
  `es_inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `in_inventory_name` varchar(255) NOT NULL,
  `in_short_name` varchar(255) NOT NULL,
  `in_description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`es_inventoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_inventory`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_in_category`
--

CREATE TABLE IF NOT EXISTS `es_in_category` (
  `es_in_categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `in_category_name` varchar(255) NOT NULL,
  `in_description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  PRIMARY KEY (`es_in_categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_in_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_in_goods_issue`
--

CREATE TABLE IF NOT EXISTS `es_in_goods_issue` (
  `es_in_goods_issueid` int(11) NOT NULL AUTO_INCREMENT,
  `in_issue_date` datetime NOT NULL,
  `in_issue_to` varchar(255) NOT NULL,
  `in_inventory_id` int(11) NOT NULL,
  `in_issued_items` longtext NOT NULL,
  `in_returned_items` longtext NOT NULL,
  `in_department_id` int(11) NOT NULL,
  `in_issue_status` enum('notreturned','partialreturned','returned') NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  PRIMARY KEY (`es_in_goods_issueid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_in_goods_issue`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_in_item_master`
--

CREATE TABLE IF NOT EXISTS `es_in_item_master` (
  `es_in_item_masterid` int(11) NOT NULL AUTO_INCREMENT,
  `in_item_code` varchar(255) NOT NULL,
  `in_item_name` varchar(255) NOT NULL,
  `cost` bigint(20) NOT NULL,
  `in_inventory_id` int(11) NOT NULL,
  `in_category_id` int(11) NOT NULL,
  `in_qty_available` float NOT NULL,
  `in_reorder_level` float NOT NULL,
  `in_quantity_issued` float NOT NULL DEFAULT '0',
  `in_last_recieved_date` datetime NOT NULL,
  `in_last_issued_date` datetime NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `in_units` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `test1` varchar(255) NOT NULL,
  PRIMARY KEY (`es_in_item_masterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_in_item_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_in_orders`
--

CREATE TABLE IF NOT EXISTS `es_in_orders` (
  `es_in_ordersid` int(11) NOT NULL AUTO_INCREMENT,
  `in_suplier_name` varchar(255) NOT NULL,
  `in_items_purchased` longtext NOT NULL,
  `order_date` datetime NOT NULL,
  `in_rec_note_no` int(11) NOT NULL,
  `in_rec_date` datetime NOT NULL,
  `in_rec_bill_no` varchar(255) NOT NULL,
  `in_items_recieved` longtext NOT NULL,
  `in_tot_amnt` float NOT NULL,
  `in_ord_status` enum('pending','complete') NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  PRIMARY KEY (`es_in_ordersid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_in_orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_in_supplier_master`
--

CREATE TABLE IF NOT EXISTS `es_in_supplier_master` (
  `es_in_supplier_masterid` int(11) NOT NULL AUTO_INCREMENT,
  `in_name` varchar(255) NOT NULL,
  `in_address` varchar(255) NOT NULL,
  `in_city` varchar(255) NOT NULL,
  `in_state` varchar(255) NOT NULL,
  `in_country` varchar(255) NOT NULL,
  `in_office_no` varchar(255) NOT NULL,
  `in_mobile_no` varchar(255) NOT NULL,
  `in_email` varchar(255) NOT NULL,
  `in_fax` varchar(255) NOT NULL,
  `in_description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  PRIMARY KEY (`es_in_supplier_masterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_in_supplier_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_issueloan`
--

CREATE TABLE IF NOT EXISTS `es_issueloan` (
  `es_issueloanid` int(11) NOT NULL AUTO_INCREMENT,
  `es_staffid` int(11) NOT NULL,
  `es_loanmasterid` int(11) NOT NULL,
  `loan_intrestrate` float NOT NULL,
  `loan_amount` float NOT NULL,
  `loan_instalments` int(11) NOT NULL,
  `deductionmonth` date NOT NULL,
  `dud_amount` float NOT NULL,
  `amountpaidtillnow` float NOT NULL,
  `noofinstalmentscompleted` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `voucherid` varchar(255) NOT NULL,
  PRIMARY KEY (`es_issueloanid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_issueloan`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_knowledge_articles`
--

CREATE TABLE IF NOT EXISTS `es_knowledge_articles` (
  `es_knowledge_articlesid` int(11) NOT NULL AUTO_INCREMENT,
  `kb_category_id` int(11) NOT NULL,
  `kb_article_name` varchar(255) NOT NULL,
  `kb_article_desc` text NOT NULL,
  `kb_article_date` datetime NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `kb_priority` varchar(255) NOT NULL,
  `kb_views` bigint(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `person_type` varchar(255) NOT NULL,
  PRIMARY KEY (`es_knowledge_articlesid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_knowledge_articles`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_knowledge_base`
--

CREATE TABLE IF NOT EXISTS `es_knowledge_base` (
  `es_knowledge_baseid` int(11) NOT NULL AUTO_INCREMENT,
  `kb_category` varchar(255) NOT NULL,
  `kb_description` text NOT NULL,
  `kb_date` datetime NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`es_knowledge_baseid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_knowledge_base`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_leaveleter`
--

CREATE TABLE IF NOT EXISTS `es_leaveleter` (
  `es_leaveleterid` int(11) NOT NULL AUTO_INCREMENT,
  `leave_msg` longtext NOT NULL,
  PRIMARY KEY (`es_leaveleterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_leaveleter`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_leavemaster`
--

CREATE TABLE IF NOT EXISTS `es_leavemaster` (
  `es_leavemasterid` int(11) NOT NULL AUTO_INCREMENT,
  `lev_post` varchar(255) NOT NULL,
  `lev_type` varchar(255) NOT NULL,
  `lev_leavescount` varchar(255) NOT NULL,
  `lev_carryforward` varchar(255) NOT NULL,
  `lev_days` varchar(255) NOT NULL,
  `lev_enchashable` varchar(255) NOT NULL,
  `lev_dept` varchar(255) NOT NULL,
  `lev_from_date` date NOT NULL,
  `lev_to_date` date NOT NULL,
  PRIMARY KEY (`es_leavemasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_leavemaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_ledger`
--

CREATE TABLE IF NOT EXISTS `es_ledger` (
  `es_ledgerid` int(11) NOT NULL AUTO_INCREMENT,
  `lg_name` varchar(255) NOT NULL,
  `lg_groupname` varchar(255) NOT NULL,
  `lg_openingbalance` double NOT NULL,
  `lg_createdon` date NOT NULL,
  `lg_amounttype` varchar(255) NOT NULL,
  PRIMARY KEY (`es_ledgerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_ledger`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_libaraypublisher`
--

CREATE TABLE IF NOT EXISTS `es_libaraypublisher` (
  `es_libaraypublisherid` int(11) NOT NULL AUTO_INCREMENT,
  `library_publishername` varchar(255) NOT NULL,
  `library_pulisheradress` varchar(255) NOT NULL,
  `library_city` varchar(255) NOT NULL,
  `libaray_state` varchar(255) NOT NULL,
  `libarary_country` varchar(255) NOT NULL,
  `libaray_phoneno` varchar(255) NOT NULL,
  `librray_mobileno` varchar(255) NOT NULL,
  `library_fax` varchar(255) NOT NULL,
  `libarary_email` varchar(255) NOT NULL,
  `libarary_aditinalinformation` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`es_libaraypublisherid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_libaraypublisher`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_libbook`
--

CREATE TABLE IF NOT EXISTS `es_libbook` (
  `es_libbookid` int(11) NOT NULL AUTO_INCREMENT,
  `lbook_dateofpurchase` date NOT NULL,
  `lbook_aceesnofrom` int(11) NOT NULL,
  `lbook_accessnoto` int(11) NOT NULL,
  `lbook_bookfromno` int(11) NOT NULL,
  `lbook_booktono` int(11) NOT NULL,
  `lbook_author` varchar(255) NOT NULL,
  `lbook_title` varchar(255) NOT NULL,
  `lbook_publishername` varchar(255) NOT NULL,
  `lbook_publisherplace` varchar(255) NOT NULL,
  `lbook_booksubject` varchar(255) NOT NULL,
  `lbook_bookedition` varchar(255) NOT NULL,
  `lbook_year` varchar(255) NOT NULL,
  `lbook_cost` varchar(255) NOT NULL,
  `lbook_sourse` varchar(255) NOT NULL,
  `lbook_aditinalbookinfo` varchar(255) NOT NULL,
  `lbook_bookstatus` varchar(255) NOT NULL,
  `lbook_category` varchar(255) NOT NULL,
  `lbook_class` varchar(255) NOT NULL,
  `lbook_booksubcategory` varchar(255) NOT NULL,
  `lbook_ref` varchar(255) NOT NULL,
  `lbook_statusstatus` varchar(255) NOT NULL,
  `lbook_pages` varchar(255) NOT NULL,
  `lbook_volume` varchar(255) NOT NULL,
  `lbook_bilnumber` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `issuestatus` enum('issued','notissued') NOT NULL,
  PRIMARY KEY (`es_libbookid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_libbook`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_libbookfinedet`
--

CREATE TABLE IF NOT EXISTS `es_libbookfinedet` (
  `es_libbookfinedetid` int(11) NOT NULL AUTO_INCREMENT,
  `es_libbooksid` varchar(255) NOT NULL,
  `es_libbookbwid` varchar(255) NOT NULL,
  `es_libbookfine` varchar(255) NOT NULL,
  `es_libbookdate` varchar(255) NOT NULL,
  `es_type` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `es_issuetype` varchar(255) NOT NULL,
  `fine_paid` varchar(255) NOT NULL,
  `fine_deducted` varchar(255) NOT NULL,
  `paid_on` date NOT NULL,
  `remarks` text NOT NULL,
  `returnedon` date NOT NULL,
  PRIMARY KEY (`es_libbookfinedetid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_libbookfinedet`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_libfine`
--

CREATE TABLE IF NOT EXISTS `es_libfine` (
  `es_libfineid` int(11) NOT NULL AUTO_INCREMENT,
  `es_libfinenoofdays` varchar(255) NOT NULL,
  `es_libfineamount` varchar(255) NOT NULL,
  `es_libfineduration` varchar(255) NOT NULL,
  `es_libfinefor` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`es_libfineid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_libfine`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_loanmaster`
--

CREATE TABLE IF NOT EXISTS `es_loanmaster` (
  `es_loanmasterid` int(11) NOT NULL AUTO_INCREMENT,
  `loan_post` varchar(255) NOT NULL,
  `loan_type` varchar(255) NOT NULL,
  `loan_name` varchar(255) NOT NULL,
  `loan_fromdate` date NOT NULL,
  `loan_todate` date NOT NULL,
  `loan_intrestrate` varchar(255) NOT NULL,
  `loan_maxlimit` varchar(255) NOT NULL,
  `loan_dept` varchar(255) NOT NULL,
  PRIMARY KEY (`es_loanmasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_loanmaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_loanpayment`
--

CREATE TABLE IF NOT EXISTS `es_loanpayment` (
  `es_loanpaymentid` int(11) NOT NULL AUTO_INCREMENT,
  `es_issueloanid` int(11) NOT NULL,
  `inst_amount` float NOT NULL,
  `onmonth` date NOT NULL,
  PRIMARY KEY (`es_loanpaymentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_loanpayment`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_marks`
--

CREATE TABLE IF NOT EXISTS `es_marks` (
  `es_marksid` int(11) NOT NULL AUTO_INCREMENT,
  `es_examdetailsid` int(11) NOT NULL,
  `es_marksstudentid` int(11) NOT NULL,
  `es_marksobtined` varchar(255) NOT NULL DEFAULT '0',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`es_marksid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_marks`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_messages`
--

CREATE TABLE IF NOT EXISTS `es_messages` (
  `es_messagesid` bigint(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `from_type` varchar(255) NOT NULL,
  `to_id` int(11) NOT NULL,
  `to_type` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `from_status` enum('active','inactive','deleted') NOT NULL,
  `to_status` enum('active','inactive','deleted') NOT NULL,
  `replay_status` enum('notreplied','replied') NOT NULL DEFAULT 'notreplied',
  PRIMARY KEY (`es_messagesid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_message_documents`
--

CREATE TABLE IF NOT EXISTS `es_message_documents` (
  `doc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `es_messagesid` bigint(20) NOT NULL,
  `message_doc` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_message_documents`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_modules_alloted`
--

CREATE TABLE IF NOT EXISTS `es_modules_alloted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `max_no_courses` varchar(255) NOT NULL,
  `max_no_students` varchar(255) NOT NULL,
  `modules_permissions` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `es_modules_alloted`
--

INSERT INTO `es_modules_alloted` (`id`, `max_no_courses`, `max_no_students`, `modules_permissions`, `created_on`) VALUES
(1, '1000', '9000000', '1_p,2_p,3_p,4_p,5_p,6_p,7_p,8_p,9_p,10_p,11_p,12_p,13_p,14_p,15_p,16_p,17_p,18_p,19_p,20_p,21_p,22_p,23_p,24_p,25_p,26_p,27_p,28_p,29_p,30_p,31_p,32_p,33_p,34_p,35_p', '2010-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `es_new_timetable`
--

CREATE TABLE IF NOT EXISTS `es_new_timetable` (
  `new_time_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`new_time_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_new_timetable`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_notice`
--

CREATE TABLE IF NOT EXISTS `es_notice` (
  `es_noticeid` int(11) NOT NULL AUTO_INCREMENT,
  `es_title` varchar(255) NOT NULL,
  `es_message` longtext NOT NULL,
  `es_date` date NOT NULL,
  `es_subject` varchar(255) NOT NULL,
  PRIMARY KEY (`es_noticeid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_notice`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_notice_messages`
--

CREATE TABLE IF NOT EXISTS `es_notice_messages` (
  `es_messagesid` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `from_type` varchar(255) NOT NULL,
  `to_id` int(11) NOT NULL,
  `to_type` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `from_status` enum('active','inactive','deleted') NOT NULL,
  `to_status` enum('active','inactive','deleted') NOT NULL,
  `replay_status` enum('notreplied','replied') NOT NULL DEFAULT 'notreplied',
  `replied_message_id` bigint(20) NOT NULL,
  `read_status` enum('Unread','Read') NOT NULL DEFAULT 'Unread',
  PRIMARY KEY (`es_messagesid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_notice_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_offerletter`
--

CREATE TABLE IF NOT EXISTS `es_offerletter` (
  `es_offerletterid` int(11) NOT NULL AUTO_INCREMENT,
  `ofr_message` longtext NOT NULL,
  PRIMARY KEY (`es_offerletterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_offerletter`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_old_balances`
--

CREATE TABLE IF NOT EXISTS `es_old_balances` (
  `ob_id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `old_balance` varchar(255) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `wived_amount` varchar(255) NOT NULL,
  `last_paid_dt` date NOT NULL,
  `balance` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`ob_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_old_balances`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_old_balances_paid`
--

CREATE TABLE IF NOT EXISTS `es_old_balances_paid` (
  `obp_id` int(11) NOT NULL AUTO_INCREMENT,
  `ob_id` int(11) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `waived_amount` varchar(255) NOT NULL,
  `paid_on` date NOT NULL,
  PRIMARY KEY (`obp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_old_balances_paid`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_otherletter_formats`
--

CREATE TABLE IF NOT EXISTS `es_otherletter_formats` (
  `letter_id` int(11) NOT NULL AUTO_INCREMENT,
  `letter_title` text NOT NULL,
  `letter_desc` longtext NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`letter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_otherletter_formats`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_other_fine_dettails`
--

CREATE TABLE IF NOT EXISTS `es_other_fine_dettails` (
  `otherfine_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_preadmissionid` int(11) NOT NULL,
  `fine_name` varchar(255) NOT NULL,
  `fine_amount` double NOT NULL,
  `created_on` date NOT NULL,
  `paid_amount` double NOT NULL,
  `deduction_allowed` double NOT NULL,
  `paid_on` date NOT NULL,
  `balance` double NOT NULL,
  `remarks` text NOT NULL,
  `voucherid` varchar(225) NOT NULL,
  PRIMARY KEY (`otherfine_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_other_fine_dettails`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_payslipdetails`
--

CREATE TABLE IF NOT EXISTS `es_payslipdetails` (
  `es_payslipdetailsid` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `pay_month` date NOT NULL,
  `basic_salary` float NOT NULL,
  `tot_allowance` float NOT NULL,
  `tot_deductions` float NOT NULL,
  `net_salary` float NOT NULL,
  `balance` varchar(255) NOT NULL,
  `leavedays` varchar(255) NOT NULL,
  `totalleave` varchar(255) NOT NULL,
  `voucherid` varchar(255) NOT NULL,
  PRIMARY KEY (`es_payslipdetailsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_payslipdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_pfmaster`
--

CREATE TABLE IF NOT EXISTS `es_pfmaster` (
  `es_pfmasterid` int(11) NOT NULL AUTO_INCREMENT,
  `pf_post` varchar(255) NOT NULL,
  `pf_empcont` float NOT NULL,
  `pf_empconttype` varchar(255) NOT NULL,
  `pf_empycont` float NOT NULL,
  `pf_empyconttype` varchar(255) NOT NULL,
  `pf_dept` varchar(255) NOT NULL,
  `pf_from_date` date NOT NULL,
  `pf_to_date` date NOT NULL,
  PRIMARY KEY (`es_pfmasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_pfmaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_photogallery`
--

CREATE TABLE IF NOT EXISTS `es_photogallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_photogallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_preadmission`
--

CREATE TABLE IF NOT EXISTS `es_preadmission` (
  `pre_schl1` varchar(111) NOT NULL,
  `pre_schl2` varchar(100) NOT NULL,
  `enrlno1` varchar(255) NOT NULL,
  `enrlno2` varchar(255) NOT NULL,
  `yearfrom1` varchar(255) NOT NULL,
  `yearfrom2` varchar(255) NOT NULL,
  `yearupto1` varchar(255) NOT NULL,
  `yearupto2` varchar(255) NOT NULL,
  `reason1` text NOT NULL,
  `reason2` text NOT NULL,
  `es_preadmissionid` int(11) NOT NULL AUTO_INCREMENT,
  `pre_serialno` varchar(255) NOT NULL,
  `pre_number` varchar(60) NOT NULL,
  `pre_student_username` varchar(255) NOT NULL,
  `pre_student_password` varchar(255) NOT NULL,
  `pre_dateofbirth` date NOT NULL,
  `pre_fathername` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `pre_mothername` varchar(255) NOT NULL,
  `pre_fathersoccupation` varchar(255) NOT NULL,
  `pre_fathersoccupation2` varchar(225) NOT NULL,
  `pre_motheroccupation` varchar(255) NOT NULL,
  `pre_motheroccupation2` varchar(255) NOT NULL,
  `pre_contactname1` varchar(255) NOT NULL,
  `pre_contactno1` varchar(255) NOT NULL,
  `pre_contactno2` varchar(255) NOT NULL,
  `pre_contactname2` varchar(255) NOT NULL,
  `pre_address1` varchar(255) NOT NULL,
  `pre_city1` varchar(255) NOT NULL,
  `pre_state1` varchar(255) NOT NULL,
  `pre_country1` varchar(255) NOT NULL,
  `aadharno` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `edugap` varchar(255) NOT NULL,
  `pre_phno1` varchar(255) NOT NULL,
  `pre_mobile1` varchar(255) NOT NULL,
  `pre_prev_acadamicname` varchar(255) NOT NULL,
  `pre_prev_class` varchar(255) NOT NULL,
  `pre_prev_university` varchar(255) NOT NULL,
  `pre_prev_percentage` varchar(255) NOT NULL,
  `pre_prev_tcno` varchar(255) NOT NULL,
  `pre_current_acadamicname` varchar(255) NOT NULL,
  `pre_current_class1` varchar(255) NOT NULL,
  `pre_current_percentage1` varchar(255) NOT NULL,
  `pre_current_result1` varchar(255) NOT NULL,
  `pre_current_class2` varchar(255) NOT NULL,
  `pre_current_percentage2` varchar(255) NOT NULL,
  `pre_current_result2` varchar(255) NOT NULL,
  `pre_current_class3` varchar(255) NOT NULL,
  `pre_current_percentage3` varchar(255) NOT NULL,
  `pre_current_result3` varchar(255) NOT NULL,
  `pre_physical_details` varchar(255) NOT NULL,
  `pre_height` varchar(255) NOT NULL,
  `pre_weight` varchar(255) NOT NULL,
  `pre_alerge` varchar(255) NOT NULL,
  `pre_physical_status` varchar(255) NOT NULL,
  `pre_special_care` varchar(255) NOT NULL,
  `pre_class` varchar(255) NOT NULL,
  `pre_sec` varchar(255) NOT NULL,
  `pre_name` varchar(255) NOT NULL,
  `pre_age` int(11) NOT NULL,
  `pre_address` varchar(255) NOT NULL,
  `pre_city` varchar(255) NOT NULL,
  `pre_state` varchar(255) NOT NULL,
  `pre_country` varchar(255) NOT NULL,
  `pre_phno` varchar(255) NOT NULL,
  `pre_mobile` varchar(255) NOT NULL,
  `pre_resno` varchar(255) NOT NULL,
  `pre_resno1` varchar(255) NOT NULL,
  `pre_image` varchar(255) NOT NULL,
  `test1` varchar(255) NOT NULL,
  `test2` varchar(255) NOT NULL,
  `test3` varchar(255) NOT NULL,
  `pre_pincode1` varchar(255) NOT NULL,
  `pre_pincode` varchar(255) NOT NULL,
  `pre_emailid` varchar(255) NOT NULL,
  `pre_emailid2` varchar(100) NOT NULL,
  `pre_fromdate` date NOT NULL,
  `pre_todate` date NOT NULL,
  `status` enum('pass','fail','resultawaiting','inactive') NOT NULL,
  `pre_status` enum('inactive','active') NOT NULL DEFAULT 'active',
  `es_user_theme` varchar(255) NOT NULL,
  `pre_hobbies` varchar(255) NOT NULL,
  `pre_blood_group` varchar(255) NOT NULL,
  `pre_gender` enum('male','female') NOT NULL,
  `admission_status` varchar(255) NOT NULL,
  `caste_id` int(11) NOT NULL,
  `tr_place_id` int(11) NOT NULL,
  `ann_income` varchar(255) NOT NULL,
  `admission_date` date NOT NULL,
  `admission_date1` date NOT NULL,
  `document_deposited` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `fee_concession` varchar(255) NOT NULL,
  `pre_dateofbirth1` date NOT NULL,
  `pre_dateofbirth2` date NOT NULL,
  `pre_dateofbirth3` date NOT NULL,
  `es_home` varchar(255) NOT NULL,
  `es_econbackward` varchar(255) NOT NULL,
  `es_econbackward1` varchar(200) NOT NULL,
  `es_econbackward2` varchar(255) NOT NULL,
  `es_econbackward3` varchar(200) NOT NULL,
  `es_econbackward4` varchar(255) NOT NULL,
  `es_econbackward5` varchar(255) NOT NULL,
  `admission_id` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `pre_lastname` varchar(230) NOT NULL,
  `pre_placeofbirth` varchar(230) NOT NULL,
  `pre_contactno` varchar(230) NOT NULL,
  `pre_contactno3` varchar(230) NOT NULL,
  `pre_resno2` varchar(230) NOT NULL,
  `pre_family1` varchar(111) NOT NULL,
  `pre_family2` varchar(100) NOT NULL,
  `pre_family3` varchar(100) NOT NULL,
  `pre_family4` varchar(100) NOT NULL,
  `pre_family5` varchar(111) NOT NULL,
  `age1` varchar(111) NOT NULL,
  `age2` varchar(111) NOT NULL,
  `age3` varchar(111) NOT NULL,
  `age4` varchar(111) NOT NULL,
  `age5` varchar(111) NOT NULL,
  `age6` varchar(111) NOT NULL,
  `relation1` text NOT NULL,
  `relation2` text NOT NULL,
  `relation3` text NOT NULL,
  `relation4` text NOT NULL,
  `relation5` text NOT NULL,
  `relation6` text NOT NULL,
  `eduation1` text NOT NULL,
  `eduation2` text NOT NULL,
  `eduation3` text NOT NULL,
  `eduation4` text NOT NULL,
  `eduation5` text NOT NULL,
  `eduation6` text NOT NULL,
  `occupation1` text NOT NULL,
  `occupation2` text NOT NULL,
  `occupation3` text NOT NULL,
  `occupation4` text NOT NULL,
  `occupation5` text NOT NULL,
  `occupation6` text NOT NULL,
  `pre_family6` varchar(111) NOT NULL,
  `reason` varchar(230) NOT NULL,
  PRIMARY KEY (`es_preadmissionid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_preadmission`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_preadmission1`
--

CREATE TABLE IF NOT EXISTS `es_preadmission1` (
  `es_preadmissionid` int(11) NOT NULL AUTO_INCREMENT,
  `pre_serialno` varchar(255) NOT NULL,
  `pre_number` varchar(60) NOT NULL,
  `pre_student_username` varchar(255) NOT NULL,
  `pre_student_password` varchar(255) NOT NULL,
  `pre_dateofbirth` date NOT NULL,
  `pre_fathername` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `pre_mothername` varchar(255) NOT NULL,
  `pre_fathersoccupation` varchar(255) NOT NULL,
  `pre_fathersoccupation2` varchar(225) NOT NULL,
  `pre_motheroccupation` varchar(255) NOT NULL,
  `pre_motheroccupation2` varchar(255) NOT NULL,
  `pre_contactname1` varchar(255) NOT NULL,
  `pre_contactno1` varchar(255) NOT NULL,
  `pre_contactno2` varchar(255) NOT NULL,
  `pre_contactname2` varchar(255) NOT NULL,
  `pre_address1` varchar(255) NOT NULL,
  `pre_city1` varchar(255) NOT NULL,
  `pre_state1` varchar(255) NOT NULL,
  `pre_country1` varchar(255) NOT NULL,
  `pre_phno1` varchar(255) NOT NULL,
  `pre_mobile1` varchar(255) NOT NULL,
  `pre_prev_acadamicname` varchar(255) NOT NULL,
  `pre_prev_class` varchar(255) NOT NULL,
  `pre_prev_university` varchar(255) NOT NULL,
  `pre_prev_percentage` varchar(255) NOT NULL,
  `pre_prev_tcno` varchar(255) NOT NULL,
  `pre_current_acadamicname` varchar(255) NOT NULL,
  `pre_current_class1` varchar(255) NOT NULL,
  `pre_current_percentage1` varchar(255) NOT NULL,
  `pre_current_result1` varchar(255) NOT NULL,
  `pre_current_class2` varchar(255) NOT NULL,
  `pre_current_percentage2` varchar(255) NOT NULL,
  `pre_current_result2` varchar(255) NOT NULL,
  `pre_current_class3` varchar(255) NOT NULL,
  `pre_current_percentage3` varchar(255) NOT NULL,
  `pre_current_result3` varchar(255) NOT NULL,
  `pre_physical_details` varchar(255) NOT NULL,
  `pre_height` varchar(255) NOT NULL,
  `pre_weight` varchar(255) NOT NULL,
  `pre_alerge` varchar(255) NOT NULL,
  `pre_physical_status` varchar(255) NOT NULL,
  `pre_special_care` varchar(255) NOT NULL,
  `pre_class` varchar(255) NOT NULL,
  `pre_sec` varchar(255) NOT NULL,
  `pre_name` varchar(255) NOT NULL,
  `pre_age` int(11) NOT NULL,
  `pre_address` varchar(255) NOT NULL,
  `pre_city` varchar(255) NOT NULL,
  `pre_state` varchar(255) NOT NULL,
  `pre_country` varchar(255) NOT NULL,
  `pre_phno` varchar(255) NOT NULL,
  `pre_mobile` varchar(255) NOT NULL,
  `pre_resno` varchar(255) NOT NULL,
  `pre_resno1` varchar(255) NOT NULL,
  `pre_image` varchar(255) NOT NULL,
  `test1` varchar(255) NOT NULL,
  `test2` varchar(255) NOT NULL,
  `test3` varchar(255) NOT NULL,
  `pre_pincode1` varchar(255) NOT NULL,
  `pre_pincode` varchar(255) NOT NULL,
  `pre_emailid` varchar(255) NOT NULL,
  `pre_emailid2` varchar(100) NOT NULL,
  `pre_fromdate` date NOT NULL,
  `pre_todate` date NOT NULL,
  `status` enum('pass','fail','resultawaiting','inactive') NOT NULL,
  `pre_status` enum('inactive','active') NOT NULL DEFAULT 'active',
  `es_user_theme` varchar(255) NOT NULL,
  `pre_hobbies` varchar(255) NOT NULL,
  `pre_blood_group` varchar(255) NOT NULL,
  `pre_gender` enum('male','female') NOT NULL,
  `admission_status` varchar(255) NOT NULL,
  `caste_id` int(11) NOT NULL,
  `tr_place_id` int(11) NOT NULL,
  `ann_income` varchar(255) NOT NULL,
  `admission_date` date NOT NULL,
  `admission_date1` date NOT NULL,
  `document_deposited` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `fee_concession` varchar(255) NOT NULL,
  `pre_dateofbirth1` date NOT NULL,
  `pre_dateofbirth2` date NOT NULL,
  `pre_dateofbirth3` date NOT NULL,
  `es_home` varchar(255) NOT NULL,
  `es_econbackward` varchar(255) NOT NULL,
  `admission_id` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `pre_lastname` varchar(230) NOT NULL,
  `pre_placeofbirth` varchar(230) NOT NULL,
  `pre_contactno` varchar(230) NOT NULL,
  `pre_contactno3` varchar(230) NOT NULL,
  `pre_resno2` varchar(230) NOT NULL,
  PRIMARY KEY (`es_preadmissionid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_preadmission1`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_preadmission_details`
--

CREATE TABLE IF NOT EXISTS `es_preadmission_details` (
  `es_preadmission_detailsid` int(11) NOT NULL AUTO_INCREMENT,
  `es_preadmissionid` int(11) NOT NULL,
  `pre_class` varchar(255) NOT NULL,
  `pre_fromdate` date NOT NULL,
  `pre_todate` date NOT NULL,
  `status` enum('pass','fail','resultawaiting','inactive') NOT NULL,
  `admission_status` enum('newadmission','promoted') NOT NULL,
  `scat_id` int(11) NOT NULL,
  PRIMARY KEY (`es_preadmission_detailsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_preadmission_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_questionbank`
--

CREATE TABLE IF NOT EXISTS `es_questionbank` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice_1` text NOT NULL,
  `choice_2` text NOT NULL,
  `choice_3` text NOT NULL,
  `choice_4` text NOT NULL,
  `answer` enum('A','B','C','D') NOT NULL,
  `feed_dis` varchar(255) NOT NULL,
  `correct_ans` text NOT NULL,
  `wrong_ans` text NOT NULL,
  `created_on` date NOT NULL,
  `user_type` enum('admin','staff') NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_questionbank`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_requirement`
--

CREATE TABLE IF NOT EXISTS `es_requirement` (
  `es_requirementid` int(11) NOT NULL AUTO_INCREMENT,
  `es_post` varchar(255) NOT NULL,
  `es_depatname` varchar(255) NOT NULL,
  `es_qualification` varchar(255) NOT NULL,
  `es_experience` varchar(255) NOT NULL,
  `es_noofpositions` int(11) NOT NULL,
  `es_date_posteddate` date NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`es_requirementid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_requirement`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_resignation`
--

CREATE TABLE IF NOT EXISTS `es_resignation` (
  `es_resignationid` int(11) NOT NULL AUTO_INCREMENT,
  `res_letter` longtext NOT NULL,
  PRIMARY KEY (`es_resignationid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_resignation`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_roomallotment`
--

CREATE TABLE IF NOT EXISTS `es_roomallotment` (
  `es_roomallotmentid` int(11) NOT NULL AUTO_INCREMENT,
  `es_hostelroomid` int(11) NOT NULL,
  `es_personid` int(11) NOT NULL,
  `es_persontype` varchar(255) NOT NULL,
  `alloted_date` date NOT NULL,
  `dealloted_date` date NOT NULL,
  `status` enum('allocated','deallocated') NOT NULL,
  PRIMARY KEY (`es_roomallotmentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_roomallotment`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_schools`
--

CREATE TABLE IF NOT EXISTS `es_schools` (
  `Sr.No.` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`Sr.No.`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `es_schools`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_sections`
--

CREATE TABLE IF NOT EXISTS `es_sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_sections`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_sections_student`
--

CREATE TABLE IF NOT EXISTS `es_sections_student` (
  `section_student_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `year_id` bigint(20) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section_id` bigint(20) NOT NULL,
  PRIMARY KEY (`section_student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_sections_student`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_security`
--

CREATE TABLE IF NOT EXISTS `es_security` (
  `es_securityid` int(11) NOT NULL AUTO_INCREMENT,
  `sec_name` varchar(255) NOT NULL,
  `sec_address` varchar(255) NOT NULL,
  `sec_contact_person` varchar(255) NOT NULL,
  `sec_vehicle_no` varchar(255) NOT NULL,
  `sec_purpose` varchar(255) NOT NULL,
  `sec_mode_app` varchar(255) NOT NULL,
  `sec_time_out` datetime NOT NULL,
  `sec_remarks` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `sec_time_in` datetime NOT NULL,
  `sec_colour` varchar(255) NOT NULL,
  `sec_make_vehicle` varchar(255) NOT NULL,
  `sec_reg_no` varchar(255) NOT NULL,
  `sec_phone` varchar(255) NOT NULL,
  `sec_mobile` varchar(255) NOT NULL,
  PRIMARY KEY (`es_securityid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_security`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_shortlisted`
--

CREATE TABLE IF NOT EXISTS `es_shortlisted` (
  `es_shortlistedid` int(11) NOT NULL AUTO_INCREMENT,
  `stl_message` longtext NOT NULL,
  PRIMARY KEY (`es_shortlistedid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_shortlisted`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_staff`
--

CREATE TABLE IF NOT EXISTS `es_staff` (
  `es_staffid` int(11) NOT NULL AUTO_INCREMENT,
  `st_postaplied` varchar(255) NOT NULL,
  `st_firstname` varchar(255) NOT NULL,
  `st_lastname` varchar(255) NOT NULL,
  `st_gender` varchar(255) NOT NULL,
  `st_fthname` varchar(255) NOT NULL,
  `st_dob` varchar(255) NOT NULL,
  `st_primarysubject` varchar(255) NOT NULL,
  `st_fatherhusname` varchar(255) NOT NULL,
  `st_noofdughters` int(11) NOT NULL,
  `st_noofsons` varchar(255) NOT NULL,
  `st_faminfo` varchar(255) NOT NULL,
  `st_hobbies` varchar(255) NOT NULL,
  `st_marital` varchar(255) NOT NULL,
  `st_experience` varchar(255) NOT NULL,
  `st_attach1` varchar(255) NOT NULL,
  `st_attach2` varchar(255) NOT NULL,
  `st_attach3` varchar(255) NOT NULL,
  `st_attach4` varchar(255) NOT NULL,
  `st_category` varchar(255) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_mobilenocomunication` varchar(255) NOT NULL,
  `st_examp1` varchar(255) NOT NULL,
  `st_examp2` varchar(255) NOT NULL,
  `st_examp3` varchar(255) NOT NULL,
  `st_borduniversity1` varchar(255) NOT NULL,
  `st_borduniversity2` varchar(255) NOT NULL,
  `st_borduniversity3` varchar(255) NOT NULL,
  `st_year1` varchar(255) NOT NULL,
  `st_year2` varchar(255) NOT NULL,
  `st_year3` varchar(255) NOT NULL,
  `st_insititute1` varchar(255) NOT NULL,
  `st_insititute2` varchar(255) NOT NULL,
  `st_insititute3` varchar(255) NOT NULL,
  `st_position1` varchar(255) NOT NULL,
  `st_position2` varchar(255) NOT NULL,
  `st_position3` varchar(255) NOT NULL,
  `st_period1` varchar(255) NOT NULL,
  `st_period2` varchar(255) NOT NULL,
  `st_period3` varchar(255) NOT NULL,
  `st_pradress` varchar(255) NOT NULL,
  `st_prcity` varchar(255) NOT NULL,
  `st_prpincode` varchar(255) NOT NULL,
  `st_prphonecode` varchar(255) NOT NULL,
  `st_prstate` varchar(255) NOT NULL,
  `st_prresino` varchar(255) NOT NULL,
  `st_prcountry` varchar(255) NOT NULL,
  `st_prmobno` varchar(255) NOT NULL,
  `st_peadress` varchar(255) NOT NULL,
  `st_pecity` varchar(255) NOT NULL,
  `st_pepincode` varchar(255) NOT NULL,
  `st_pephoneno` varchar(255) NOT NULL,
  `st_pestate` varchar(255) NOT NULL,
  `st_peresino` varchar(255) NOT NULL,
  `st_pecountry` varchar(255) NOT NULL,
  `st_pemobileno` varchar(255) NOT NULL,
  `st_refposname1` varchar(255) NOT NULL,
  `st_refposname2` varchar(255) NOT NULL,
  `st_refposname3` varchar(255) NOT NULL,
  `st_refdesignation1` varchar(255) NOT NULL,
  `st_refdesignation2` varchar(255) NOT NULL,
  `st_refdesignation3` varchar(255) NOT NULL,
  `st_refinsititute1` varchar(255) NOT NULL,
  `st_refinsititute2` varchar(255) NOT NULL,
  `st_refinsititute3` varchar(255) NOT NULL,
  `st_refemail1` varchar(255) NOT NULL,
  `st_refemail2` varchar(255) NOT NULL,
  `st_refemail3` varchar(255) NOT NULL,
  `st_writentest` varchar(255) NOT NULL,
  `st_technicalinterview` varchar(255) NOT NULL,
  `st_finalinterview` varchar(255) NOT NULL,
  `status` enum('selected','notselected','onhold','added','dismisied') NOT NULL,
  `st_perviouspackage` varchar(255) NOT NULL,
  `st_basic` varchar(255) NOT NULL,
  `st_dateofjoining` varchar(255) NOT NULL,
  `st_post` varchar(255) NOT NULL,
  `st_department` varchar(255) NOT NULL,
  `st_remarks` varchar(255) NOT NULL,
  `intdate` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `selstatus` enum('issued','notissued','accepted','notaccepted') NOT NULL,
  `tcstatus` enum('notissued','issued','resigned') NOT NULL,
  `st_username` varchar(255) NOT NULL,
  `st_password` varchar(255) NOT NULL,
  `st_theme` varchar(255) NOT NULL,
  `st_class` varchar(255) NOT NULL,
  `st_subject` varchar(255) NOT NULL,
  `st_qualification` varchar(255) NOT NULL,
  `st_marks1` varchar(255) NOT NULL,
  `st_marks2` varchar(255) NOT NULL,
  `st_marks3` varchar(255) NOT NULL,
  `st_permissions` varchar(255) NOT NULL,
  `st_bloodgroup` varchar(255) NOT NULL,
  `teach_nonteach` enum('teaching','nonteaching') NOT NULL DEFAULT 'teaching',
  `st_emailsend` varchar(255) NOT NULL,
  `terminationdate` varchar(255) NOT NULL,
  `hrdsid` varchar(255) NOT NULL,
  `st_mail` varchar(222) NOT NULL,
  `mamber1` varchar(255) NOT NULL,
  `mamber2` varchar(255) NOT NULL,
  `mamber3` varchar(255) NOT NULL,
  `mamber4` varchar(255) NOT NULL,
  `mamber5` varchar(255) NOT NULL,
  `age1` int(11) NOT NULL,
  `age2` int(11) NOT NULL,
  `age3` int(11) NOT NULL,
  `age4` int(11) NOT NULL,
  `age5` int(11) NOT NULL,
  `relation1` varchar(255) NOT NULL,
  `relation2` varchar(255) NOT NULL,
  `relation3` varchar(255) NOT NULL,
  `relation4` varchar(255) NOT NULL,
  `relation5` varchar(255) NOT NULL,
  `education1` varchar(255) NOT NULL,
  `education2` varchar(255) NOT NULL,
  `education3` varchar(255) NOT NULL,
  `education4` varchar(255) NOT NULL,
  `education5` varchar(255) NOT NULL,
  `occupation1` varchar(255) NOT NULL,
  `occupation2` varchar(255) NOT NULL,
  `occupation3` varchar(255) NOT NULL,
  `occupation4` varchar(255) NOT NULL,
  `occupation5` varchar(255) NOT NULL,
  PRIMARY KEY (`es_staffid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_stationary`
--

CREATE TABLE IF NOT EXISTS `es_stationary` (
  `stationary_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `st_pay_id` bigint(20) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`stationary_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_stationary`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_stationary_payment`
--

CREATE TABLE IF NOT EXISTS `es_stationary_payment` (
  `st_pay_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `waived_amount` bigint(20) NOT NULL,
  `paid_amount` bigint(20) NOT NULL,
  `pay_status` enum('Paid','Pending') NOT NULL DEFAULT 'Pending',
  `saled_date` date NOT NULL,
  `paid_date` date NOT NULL,
  PRIMARY KEY (`st_pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_stationary_payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_studentabsentnoti`
--

CREATE TABLE IF NOT EXISTS `es_studentabsentnoti` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `exam_name` varchar(222) NOT NULL,
  `exam_date` varchar(222) NOT NULL,
  `roll_number` varchar(222) NOT NULL,
  `marks_obtained` varchar(222) NOT NULL,
  `rank` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `charector` varchar(222) NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `games` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_studentabsentnoti`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_subcategory`
--

CREATE TABLE IF NOT EXISTS `es_subcategory` (
  `es_subcategoryid` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_catname` int(11) NOT NULL,
  `subcat_scatname` varchar(255) NOT NULL,
  `subcat_scatdesc` longtext NOT NULL,
  `subcat_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`es_subcategoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_subcategory`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_subject`
--

CREATE TABLE IF NOT EXISTS `es_subject` (
  `es_subjectid` int(11) NOT NULL AUTO_INCREMENT,
  `es_subjectname` varchar(255) NOT NULL,
  `es_subjectcode` varchar(255) NOT NULL,
  `es_subjectshortname` varchar(255) NOT NULL,
  PRIMARY KEY (`es_subjectid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_subject`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_taxmaster`
--

CREATE TABLE IF NOT EXISTS `es_taxmaster` (
  `es_taxmasterid` int(11) NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(255) NOT NULL,
  `tax_percentage_type` varchar(255) NOT NULL,
  `tax_to` varchar(255) NOT NULL,
  `tax_from` varchar(255) NOT NULL,
  `tax_rate` varchar(255) NOT NULL,
  `tax_from_date` date NOT NULL,
  `tax_to_date` date NOT NULL,
  PRIMARY KEY (`es_taxmasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_taxmaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_tcmaster`
--

CREATE TABLE IF NOT EXISTS `es_tcmaster` (
  `es_tcmasterid` int(11) NOT NULL AUTO_INCREMENT,
  `tcm_description` longtext NOT NULL,
  PRIMARY KEY (`es_tcmasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_tcmaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_tcstudent`
--

CREATE TABLE IF NOT EXISTS `es_tcstudent` (
  `es_tcstudentid` int(11) NOT NULL AUTO_INCREMENT,
  `tcm_description` longtext NOT NULL,
  PRIMARY KEY (`es_tcstudentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_tcstudent`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_timetable`
--

CREATE TABLE IF NOT EXISTS `es_timetable` (
  `es_timetableid` int(11) NOT NULL AUTO_INCREMENT,
  `es_class` varchar(255) NOT NULL,
  `es_m1` varchar(255) NOT NULL,
  `es_m2` varchar(255) NOT NULL,
  `es_m3` varchar(255) NOT NULL,
  `es_m4` varchar(255) NOT NULL,
  `es_m5` varchar(255) NOT NULL,
  `es_m6` varchar(255) NOT NULL,
  `es_m7` varchar(255) NOT NULL,
  `es_m8` varchar(255) NOT NULL,
  `es_m9` varchar(255) NOT NULL,
  `es_subject` varchar(255) NOT NULL,
  `es_staffid` varchar(255) NOT NULL,
  `es_t1` varchar(255) NOT NULL,
  `es_t2` varchar(255) NOT NULL,
  `es_t3` varchar(255) NOT NULL,
  `es_t4` varchar(255) NOT NULL,
  `es_t5` varchar(255) NOT NULL,
  `es_t6` varchar(255) NOT NULL,
  `es_t7` varchar(255) NOT NULL,
  `es_t8` varchar(255) NOT NULL,
  `es_t9` varchar(255) NOT NULL,
  `es_w1` varchar(255) NOT NULL,
  `es_w2` varchar(255) NOT NULL,
  `es_w3` varchar(255) NOT NULL,
  `es_w4` varchar(255) NOT NULL,
  `es_w5` varchar(255) NOT NULL,
  `es_w6` varchar(255) NOT NULL,
  `es_w7` varchar(255) NOT NULL,
  `es_w8` varchar(255) NOT NULL,
  `es_w9` varchar(255) NOT NULL,
  `es_th1` varchar(255) NOT NULL,
  `es_th2` varchar(255) NOT NULL,
  `es_th3` varchar(255) NOT NULL,
  `es_th4` varchar(255) NOT NULL,
  `es_th5` varchar(255) NOT NULL,
  `es_th6` varchar(255) NOT NULL,
  `es_th7` varchar(255) NOT NULL,
  `es_th8` varchar(255) NOT NULL,
  `es_th9` varchar(255) NOT NULL,
  `es_f1` varchar(255) NOT NULL,
  `es_f2` varchar(255) NOT NULL,
  `es_f3` varchar(255) NOT NULL,
  `es_f4` varchar(255) NOT NULL,
  `es_f5` varchar(255) NOT NULL,
  `es_f6` varchar(255) NOT NULL,
  `es_f7` varchar(255) NOT NULL,
  `es_f8` varchar(255) NOT NULL,
  `es_f9` varchar(255) NOT NULL,
  `es_s1` varchar(255) NOT NULL,
  `es_s2` varchar(255) NOT NULL,
  `es_s3` varchar(255) NOT NULL,
  `es_s4` varchar(255) NOT NULL,
  `es_s5` varchar(255) NOT NULL,
  `es_s6` varchar(255) NOT NULL,
  `es_s7` varchar(255) NOT NULL,
  `es_s8` varchar(255) NOT NULL,
  `es_s9` varchar(255) NOT NULL,
  `es_startfrom` time DEFAULT '09:00:00',
  `es_endto` int(11) DEFAULT '9',
  `es_breakfrom` int(11) DEFAULT '20',
  `es_breakto` int(11) DEFAULT '1',
  `es_lunchfrom` int(11) DEFAULT '20',
  `es_lunchto` int(11) DEFAULT '2',
  `es_duration` int(11) NOT NULL DEFAULT '45',
  PRIMARY KEY (`es_timetableid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_timetable`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_timetablemaster`
--

CREATE TABLE IF NOT EXISTS `es_timetablemaster` (
  `es_timetablemasterid` int(11) NOT NULL AUTO_INCREMENT,
  `es_class` varchar(255) NOT NULL,
  `es_staffid` varchar(255) NOT NULL,
  `es_subject` varchar(255) NOT NULL,
  `es_teachername` varchar(255) NOT NULL,
  PRIMARY KEY (`es_timetablemasterid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_timetablemaster`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_timetable_staff`
--

CREATE TABLE IF NOT EXISTS `es_timetable_staff` (
  `es_st_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_class` varchar(255) NOT NULL,
  `es_m1` varchar(255) NOT NULL,
  `es_m2` varchar(255) NOT NULL,
  `es_m3` varchar(255) NOT NULL,
  `es_m4` varchar(255) NOT NULL,
  `es_m5` varchar(255) NOT NULL,
  `es_m6` varchar(255) NOT NULL,
  `es_m7` varchar(255) NOT NULL,
  `es_m8` varchar(255) NOT NULL,
  `es_m9` varchar(255) NOT NULL,
  `es_subject` varchar(255) NOT NULL,
  `es_staffid` varchar(255) NOT NULL,
  `es_t1` varchar(255) NOT NULL,
  `es_t2` varchar(255) NOT NULL,
  `es_t3` varchar(255) NOT NULL,
  `es_t4` varchar(255) NOT NULL,
  `es_t5` varchar(255) NOT NULL,
  `es_t6` varchar(255) NOT NULL,
  `es_t7` varchar(255) NOT NULL,
  `es_t8` varchar(255) NOT NULL,
  `es_t9` varchar(255) NOT NULL,
  `es_w1` varchar(255) NOT NULL,
  `es_w2` varchar(255) NOT NULL,
  `es_w3` varchar(255) NOT NULL,
  `es_w4` varchar(255) NOT NULL,
  `es_w5` varchar(255) NOT NULL,
  `es_w6` varchar(255) NOT NULL,
  `es_w7` varchar(255) NOT NULL,
  `es_w8` varchar(255) NOT NULL,
  `es_w9` varchar(255) NOT NULL,
  `es_th1` varchar(255) NOT NULL,
  `es_th2` varchar(255) NOT NULL,
  `es_th3` varchar(255) NOT NULL,
  `es_th4` varchar(255) NOT NULL,
  `es_th5` varchar(255) NOT NULL,
  `es_th6` varchar(255) NOT NULL,
  `es_th7` varchar(255) NOT NULL,
  `es_th8` varchar(255) NOT NULL,
  `es_th9` varchar(255) NOT NULL,
  `es_f1` varchar(255) NOT NULL,
  `es_f2` varchar(255) NOT NULL,
  `es_f3` varchar(255) NOT NULL,
  `es_f4` varchar(255) NOT NULL,
  `es_f5` varchar(255) NOT NULL,
  `es_f6` varchar(255) NOT NULL,
  `es_f7` varchar(255) NOT NULL,
  `es_f8` varchar(255) NOT NULL,
  `es_f9` varchar(255) NOT NULL,
  `es_s1` varchar(255) NOT NULL,
  `es_s2` varchar(255) NOT NULL,
  `es_s3` varchar(255) NOT NULL,
  `es_s4` varchar(255) NOT NULL,
  `es_s5` varchar(255) NOT NULL,
  `es_s6` varchar(255) NOT NULL,
  `es_s7` varchar(255) NOT NULL,
  `es_s8` varchar(255) NOT NULL,
  `es_s9` varchar(255) NOT NULL,
  PRIMARY KEY (`es_st_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_timetable_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_timetable_subject`
--

CREATE TABLE IF NOT EXISTS `es_timetable_subject` (
  `es_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_class` varchar(255) NOT NULL,
  `es_m1` varchar(255) NOT NULL,
  `es_m2` varchar(255) NOT NULL,
  `es_m3` varchar(255) NOT NULL,
  `es_m4` varchar(255) NOT NULL,
  `es_m5` varchar(255) NOT NULL,
  `es_m6` varchar(255) NOT NULL,
  `es_m7` varchar(255) NOT NULL,
  `es_m8` varchar(255) NOT NULL,
  `es_m9` varchar(255) NOT NULL,
  `es_subject` varchar(255) NOT NULL,
  `es_staffid` varchar(255) NOT NULL,
  `es_t1` varchar(255) NOT NULL,
  `es_t2` varchar(255) NOT NULL,
  `es_t3` varchar(255) NOT NULL,
  `es_t4` varchar(255) NOT NULL,
  `es_t5` varchar(255) NOT NULL,
  `es_t6` varchar(255) NOT NULL,
  `es_t7` varchar(255) NOT NULL,
  `es_t8` varchar(255) NOT NULL,
  `es_t9` varchar(255) NOT NULL,
  `es_w1` varchar(255) NOT NULL,
  `es_w2` varchar(255) NOT NULL,
  `es_w3` varchar(255) NOT NULL,
  `es_w4` varchar(255) NOT NULL,
  `es_w5` varchar(255) NOT NULL,
  `es_w6` varchar(255) NOT NULL,
  `es_w7` varchar(255) NOT NULL,
  `es_w8` varchar(255) NOT NULL,
  `es_w9` varchar(255) NOT NULL,
  `es_th1` varchar(255) NOT NULL,
  `es_th2` varchar(255) NOT NULL,
  `es_th3` varchar(255) NOT NULL,
  `es_th4` varchar(255) NOT NULL,
  `es_th5` varchar(255) NOT NULL,
  `es_th6` varchar(255) NOT NULL,
  `es_th7` varchar(255) NOT NULL,
  `es_th8` varchar(255) NOT NULL,
  `es_th9` varchar(255) NOT NULL,
  `es_f1` varchar(255) NOT NULL,
  `es_f2` varchar(255) NOT NULL,
  `es_f3` varchar(255) NOT NULL,
  `es_f4` varchar(255) NOT NULL,
  `es_f5` varchar(255) NOT NULL,
  `es_f6` varchar(255) NOT NULL,
  `es_f7` varchar(255) NOT NULL,
  `es_f8` varchar(255) NOT NULL,
  `es_f9` varchar(255) NOT NULL,
  `es_s1` varchar(255) NOT NULL,
  `es_s2` varchar(255) NOT NULL,
  `es_s3` varchar(255) NOT NULL,
  `es_s4` varchar(255) NOT NULL,
  `es_s5` varchar(255) NOT NULL,
  `es_s6` varchar(255) NOT NULL,
  `es_s7` varchar(255) NOT NULL,
  `es_s8` varchar(255) NOT NULL,
  `es_s9` varchar(255) NOT NULL,
  `es_startfrom` time DEFAULT '09:00:00',
  `es_endto` int(11) DEFAULT '9',
  `es_breakfrom` int(11) DEFAULT '20',
  `es_breakto` int(11) DEFAULT '1',
  `es_lunchfrom` int(11) DEFAULT '20',
  `es_lunchto` int(11) DEFAULT '2',
  `es_duration` int(11) NOT NULL DEFAULT '45',
  PRIMARY KEY (`es_sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_timetable_subject`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_timetable_subjects`
--

CREATE TABLE IF NOT EXISTS `es_timetable_subjects` (
  `ts_id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  PRIMARY KEY (`ts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_timetable_subjects`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_tips`
--

CREATE TABLE IF NOT EXISTS `es_tips` (
  `tip_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `lastupdated_on` datetime NOT NULL,
  PRIMARY KEY (`tip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_tips`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_transferstudent`
--

CREATE TABLE IF NOT EXISTS `es_transferstudent` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `sno` varchar(222) NOT NULL,
  `name` varchar(222) NOT NULL,
  `fname` varchar(222) NOT NULL,
  `nationality` varchar(222) NOT NULL,
  `sc` varchar(222) NOT NULL,
  `dobw` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `subject` text NOT NULL,
  `dobp` date NOT NULL,
  `monthfeepay` varchar(222) NOT NULL,
  `feecons` varchar(222) NOT NULL,
  `doblast` date NOT NULL,
  `datestuck` date NOT NULL,
  `attendance` varchar(222) NOT NULL,
  `sissuecetrti` date NOT NULL,
  `rls` text NOT NULL,
  `ncc` varchar(222) NOT NULL,
  `games` text NOT NULL,
  `conduct` varchar(222) NOT NULL,
  `acharge` varchar(222) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  `created_on` date NOT NULL,
  `exam_date` varchar(2222) NOT NULL,
  `gender` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `admissionno` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_transferstudent`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_translist`
--

CREATE TABLE IF NOT EXISTS `es_translist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_title` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_translist`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_transport`
--

CREATE TABLE IF NOT EXISTS `es_transport` (
  `es_transportid` int(11) NOT NULL AUTO_INCREMENT,
  `tr_transport_type` enum('bus','Car(Manual)','Car(Auto)','coach','minibus','van','other') NOT NULL,
  `tr_purchase_date` datetime NOT NULL,
  `tr_transport_no` varchar(255) NOT NULL,
  `tr_transport_name` varchar(255) NOT NULL,
  `tr_vehicle_no` varchar(255) NOT NULL,
  `tr_insurance_date` datetime NOT NULL,
  `tr_ins_renewal_date` datetime NOT NULL,
  `tr_seating_capacity` int(11) NOT NULL,
  `tr_route` varchar(255) NOT NULL,
  `tr_route_from` varchar(255) NOT NULL,
  `tr_route_to` varchar(255) NOT NULL,
  `tr_route_via` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  PRIMARY KEY (`es_transportid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_transport`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_transport_allots`
--

CREATE TABLE IF NOT EXISTS `es_transport_allots` (
  `driver_allot_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_staffid` int(11) NOT NULL,
  `es_transportid` int(11) NOT NULL,
  `driver_alloted_date` date DEFAULT NULL,
  `deallocate_date` date NOT NULL,
  `status` enum('Allocated','Deallocated') NOT NULL,
  PRIMARY KEY (`driver_allot_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_transport_allots`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_transport_drivers`
--

CREATE TABLE IF NOT EXISTS `es_transport_drivers` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_license` varchar(255) NOT NULL,
  `issuing_authority` varchar(255) NOT NULL,
  `valid_date` date NOT NULL,
  `es_staffid` int(11) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `license_doc` varchar(255) NOT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_transport_drivers`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_transport_maintenance`
--

CREATE TABLE IF NOT EXISTS `es_transport_maintenance` (
  `es_transport_maintenanceid` int(11) NOT NULL AUTO_INCREMENT,
  `tr_transportid` varchar(255) NOT NULL,
  `tr_maintenance_type` varchar(255) NOT NULL,
  `tr_date_of_maintenance` datetime NOT NULL,
  `tr_amount_paid` double NOT NULL,
  `tr_remarks` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `tr_transportno` varchar(255) NOT NULL,
  `tr_transportname` varchar(255) NOT NULL,
  `es_ledger` varchar(255) NOT NULL,
  PRIMARY KEY (`es_transport_maintenanceid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_transport_maintenance`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_transport_places`
--

CREATE TABLE IF NOT EXISTS `es_transport_places` (
  `tr_place_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`tr_place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_transport_places`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_board`
--

CREATE TABLE IF NOT EXISTS `es_trans_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id` int(11) NOT NULL,
  `board_title` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_board`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_board_allocation_to_student`
--

CREATE TABLE IF NOT EXISTS `es_trans_board_allocation_to_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `student_staff_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `created_on` date NOT NULL,
  `deallocated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_board_allocation_to_student`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_driver_allocation_to_vehicle`
--

CREATE TABLE IF NOT EXISTS `es_trans_driver_allocation_to_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_driver_allocation_to_vehicle`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_driver_details`
--

CREATE TABLE IF NOT EXISTS `es_trans_driver_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(255) NOT NULL,
  `driver_addrs` varchar(255) NOT NULL,
  `diver_mobile` varchar(255) NOT NULL,
  `driver_license` varchar(255) NOT NULL,
  `issuing_authority` varchar(255) NOT NULL,
  `valid_date` date NOT NULL,
  `driver_id` int(11) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `license_doc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_driver_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_fee_details`
--

CREATE TABLE IF NOT EXISTS `es_trans_fee_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `installment_type` enum('monthly','yearly') NOT NULL,
  `fee_fromdate` date NOT NULL,
  `fee_todate` date NOT NULL,
  `financial_year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_fee_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_maintenance`
--

CREATE TABLE IF NOT EXISTS `es_trans_maintenance` (
  `es_transport_maintenanceid` int(11) NOT NULL AUTO_INCREMENT,
  `tr_transportid` varchar(255) NOT NULL,
  `tr_maintenance_type` varchar(255) NOT NULL,
  `tr_date_of_maintenance` date NOT NULL,
  `tr_amount_paid` double NOT NULL,
  `tr_remarks` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`es_transport_maintenanceid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_maintenance`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_payment_history`
--

CREATE TABLE IF NOT EXISTS `es_trans_payment_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `due_month` date NOT NULL,
  `pay_amount` double NOT NULL,
  `amount_paid` double NOT NULL,
  `deduction` double NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `paid_on` date NOT NULL,
  `pay_status` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `voucherid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_payment_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_route`
--

CREATE TABLE IF NOT EXISTS `es_trans_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_title` varchar(255) NOT NULL,
  `route_Via` text NOT NULL,
  `amount` double NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_route`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_vehicle`
--

CREATE TABLE IF NOT EXISTS `es_trans_vehicle` (
  `es_transportid` int(11) NOT NULL AUTO_INCREMENT,
  `tr_transport_type` enum('bus','Car(Manual)','Car(Auto)','coach','minibus','van','other') NOT NULL,
  `tr_purchase_date` date NOT NULL,
  `tr_transport_name` varchar(255) NOT NULL,
  `tr_vehicle_no` varchar(255) NOT NULL,
  `tr_insurance_date` date NOT NULL,
  `tr_ins_renewal_date` date NOT NULL,
  `tr_seating_capacity` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`es_transportid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_vehicle`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_trans_vehicle_allocation_to_board`
--

CREATE TABLE IF NOT EXISTS `es_trans_vehicle_allocation_to_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_trans_vehicle_allocation_to_board`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_tutorials`
--

CREATE TABLE IF NOT EXISTS `es_tutorials` (
  `tut_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `tut_desc` longtext NOT NULL,
  `lesson` longtext NOT NULL,
  `summary` longtext NOT NULL,
  `created_on` date NOT NULL,
  `user_type` enum('admin','staff') NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`tut_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_tutorials`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_undertaking`
--

CREATE TABLE IF NOT EXISTS `es_undertaking` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sno` int(22) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `father_name` varchar(222) NOT NULL,
  `mother_name` varchar(222) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `section` varchar(222) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_undertaking`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_units`
--

CREATE TABLE IF NOT EXISTS `es_units` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_classesid` int(11) NOT NULL,
  `es_subjectid` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_units`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_userlogs`
--

CREATE TABLE IF NOT EXISTS `es_userlogs` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `submodule` varchar(255) NOT NULL,
  `record_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `posted_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_userlogs`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_videogallery`
--

CREATE TABLE IF NOT EXISTS `es_videogallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_videogallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_voucher`
--

CREATE TABLE IF NOT EXISTS `es_voucher` (
  `es_voucherid` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_type` varchar(255) NOT NULL,
  `voucher_mode` varchar(255) NOT NULL,
  PRIMARY KEY (`es_voucherid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_voucher`
--


-- --------------------------------------------------------

--
-- Table structure for table `es_voucherentry`
--

CREATE TABLE IF NOT EXISTS `es_voucherentry` (
  `es_voucherentryid` int(11) NOT NULL AUTO_INCREMENT,
  `es_vouchertype` varchar(255) NOT NULL,
  `es_receiptno` varchar(255) NOT NULL,
  `es_receiptdate` date NOT NULL,
  `es_paymentmode` varchar(255) NOT NULL,
  `es_bankacc` varchar(255) NOT NULL,
  `es_particulars` varchar(255) NOT NULL,
  `es_amount` double NOT NULL,
  `es_narration` longtext NOT NULL,
  `es_vouchermode` varchar(255) NOT NULL,
  `es_checkno` varchar(255) NOT NULL,
  `es_teller_number` bigint(20) NOT NULL,
  `es_bank_pin` bigint(20) NOT NULL,
  `es_bank_name` varchar(255) NOT NULL,
  `ve_fromfinance` date NOT NULL,
  `ve_tofinance` date NOT NULL,
  PRIMARY KEY (`es_voucherentryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `es_voucherentry`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_administrator`
--

CREATE TABLE IF NOT EXISTS `him_administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `type` enum('super','admin') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_administrator`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_admission`
--

CREATE TABLE IF NOT EXISTS `him_admission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_admission`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_applyteacher`
--

CREATE TABLE IF NOT EXISTS `him_applyteacher` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `aname` varchar(222) NOT NULL,
  `fname` varchar(222) NOT NULL,
  `mname` varchar(222) NOT NULL,
  `resident` text NOT NULL,
  `postapplied` varchar(222) NOT NULL,
  `classes` varchar(222) NOT NULL,
  `teachingsub` text NOT NULL,
  `experience` text NOT NULL,
  `nameinstitue` varchar(222) NOT NULL,
  `hobbies` varchar(222) NOT NULL,
  `tellus` text NOT NULL,
  `salery` varchar(222) NOT NULL,
  `landlineno` varchar(222) NOT NULL,
  `mobileno` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `corrosponding` text NOT NULL,
  `photo` varchar(222) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL,
  `created_on` date NOT NULL,
  `downloadapp` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_applyteacher`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_cms`
--

CREATE TABLE IF NOT EXISTS `him_cms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `document1` varchar(255) NOT NULL,
  `document2` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `header_image` varchar(255) NOT NULL,
  `videocode` text NOT NULL,
  `back_ground_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `him_cms`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_country`
--

CREATE TABLE IF NOT EXISTS `him_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) NOT NULL DEFAULT '1',
  `country_name` varchar(64) DEFAULT NULL,
  `country_3_code` char(3) DEFAULT NULL,
  `country_2_code` char(2) DEFAULT NULL,
  `country_flag` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`),
  KEY `idx_country_name` (`country_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_country`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_datasheet`
--

CREATE TABLE IF NOT EXISTS `him_datasheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_datasheet`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_gallery`
--

CREATE TABLE IF NOT EXISTS `him_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_gallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_settings`
--

CREATE TABLE IF NOT EXISTS `him_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `constant_name` varchar(255) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `him_toppers`
--

CREATE TABLE IF NOT EXISTS `him_toppers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `details` text NOT NULL,
  `select_front` enum('selected','notselected') NOT NULL DEFAULT 'notselected',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `him_toppers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_career`
--

CREATE TABLE IF NOT EXISTS `mlc_career` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_career`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_college`
--

CREATE TABLE IF NOT EXISTS `mlc_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `header_image` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_college`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_document`
--

CREATE TABLE IF NOT EXISTS `mlc_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_document`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_download`
--

CREATE TABLE IF NOT EXISTS `mlc_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_download`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_feedback`
--

CREATE TABLE IF NOT EXISTS `mlc_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_homenews`
--

CREATE TABLE IF NOT EXISTS `mlc_homenews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_homenews`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_news`
--

CREATE TABLE IF NOT EXISTS `mlc_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_news`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_newsletters`
--

CREATE TABLE IF NOT EXISTS `mlc_newsletters` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_desc` longtext NOT NULL,
  `news_doc` varchar(255) NOT NULL,
  `news_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_newsletters`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_school_policies`
--

CREATE TABLE IF NOT EXISTS `mlc_school_policies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_school_policies`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_subscribers`
--

CREATE TABLE IF NOT EXISTS `mlc_subscribers` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `sub_email` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_subscribers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mlc_yourcomment`
--

CREATE TABLE IF NOT EXISTS `mlc_yourcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mlc_yourcomment`
--


-- --------------------------------------------------------

--
-- Table structure for table `subjects_cat`
--

CREATE TABLE IF NOT EXISTS `subjects_cat` (
  `scat_id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `scat_name` varchar(255) NOT NULL,
  `subject_id_array` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`scat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subjects_cat`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_period`
--

CREATE TABLE IF NOT EXISTS `time_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_id` int(11) NOT NULL,
  `from_p` varchar(255) NOT NULL,
  `to_p` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `time_period`
--

