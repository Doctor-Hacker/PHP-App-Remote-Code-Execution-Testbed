<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_staff` (
	`es_staffid` int(11) NOT NULL auto_increment,
	`st_postaplied` VARCHAR(255) NOT NULL,
	`st_firstname` VARCHAR(255) NOT NULL,
	`st_lastname` VARCHAR(255) NOT NULL,
	`st_gender` VARCHAR(255) NOT NULL,
	`st_dob` VARCHAR(255) NOT NULL,
	`st_primarysubject` VARCHAR(255) NOT NULL,
	`st_fatherhusname` VARCHAR(255) NOT NULL,
	`st_noofdughters` INT NOT NULL,
	`st_noofsons` INT NOT NULL,
	`st_email` VARCHAR(255) NOT NULL,
	`st_mobilenocomunication` VARCHAR(255) NOT NULL,
	`st_examp1` VARCHAR(255) NOT NULL,
	`st_examp2` VARCHAR(255) NOT NULL,
	`st_examp3` VARCHAR(255) NOT NULL,
	`st_borduniversity1` VARCHAR(255) NOT NULL,
	`st_borduniversity2` VARCHAR(255) NOT NULL,
	`st_borduniversity3` VARCHAR(255) NOT NULL,
	`st_year1` VARCHAR(255) NOT NULL,
	`st_year2` VARCHAR(255) NOT NULL,
	`st_year3` VARCHAR(255) NOT NULL,
	`st_insititute1` VARCHAR(255) NOT NULL,
	`st_insititute2` VARCHAR(255) NOT NULL,
	`st_insititute3` VARCHAR(255) NOT NULL,
	`st_position1` VARCHAR(255) NOT NULL,
	`st_position2` VARCHAR(255) NOT NULL,
	`st_position3` VARCHAR(255) NOT NULL,
	`st_period1` VARCHAR(255) NOT NULL,
	`st_period2` VARCHAR(255) NOT NULL,
	`st_period3` VARCHAR(255) NOT NULL,
	`st_pradress` VARCHAR(255) NOT NULL,
	`st_prcity` VARCHAR(255) NOT NULL,
	`st_prpincode` VARCHAR(255) NOT NULL,
	`st_prphonecode` VARCHAR(255) NOT NULL,
	`st_prstate` VARCHAR(255) NOT NULL,
	`st_prresino` VARCHAR(255) NOT NULL,
	`st_prcountry` VARCHAR(255) NOT NULL,
	`st_prmobno` VARCHAR(255) NOT NULL,
	`st_peadress` VARCHAR(255) NOT NULL,
	`st_pecity` VARCHAR(255) NOT NULL,
	`st_pepincode` VARCHAR(255) NOT NULL,
	`st_pephoneno` VARCHAR(255) NOT NULL,
	`st_pestate` VARCHAR(255) NOT NULL,
	`st_peresino` VARCHAR(255) NOT NULL,
	`st_pecountry` VARCHAR(255) NOT NULL,
	`st_pemobileno` VARCHAR(255) NOT NULL,
	`st_refposname1` VARCHAR(255) NOT NULL,
	`st_refposname2` VARCHAR(255) NOT NULL,
	`st_refposname3` VARCHAR(255) NOT NULL,
	`st_refdesignation1` VARCHAR(255) NOT NULL,
	`st_refdesignation2` VARCHAR(255) NOT NULL,
	`st_refdesignation3` VARCHAR(255) NOT NULL,
	`st_refinsititute1` VARCHAR(255) NOT NULL,
	`st_refinsititute2` VARCHAR(255) NOT NULL,
	`st_refinsititute3` VARCHAR(255) NOT NULL,
	`st_refemail1` VARCHAR(255) NOT NULL,
	`st_refemail2` VARCHAR(255) NOT NULL,
	`st_refemail3` VARCHAR(255) NOT NULL,
	`st_writentest` VARCHAR(255) NOT NULL,
	`st_technicalinterview` VARCHAR(255) NOT NULL,
	`st_finalinterview` VARCHAR(255) NOT NULL,
	`status` enum('selected','notselected','onhold') NOT NULL,
	`st_perviouspackage` VARCHAR(255) NOT NULL,
	`st_basic` VARCHAR(255) NOT NULL,
	`st_dateofjoining` VARCHAR(255) NOT NULL,
	`st_post` VARCHAR(255) NOT NULL,
	`st_department` VARCHAR(255) NOT NULL,
	`st_remarks` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_staffid`)) ENGINE=MyISAM;
*/

/**
* <b>es_staff</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_staff&attributeList=array+%28%0A++0+%3D%3E+%27st_postaplied%27%2C%0A++1+%3D%3E+%27st_firstname%27%2C%0A++2+%3D%3E+%27st_lastname%27%2C%0A++3+%3D%3E+%27st_gender%27%2C%0A++4+%3D%3E+%27st_dob%27%2C%0A++5+%3D%3E+%27st_primarysubject%27%2C%0A++6+%3D%3E+%27st_fatherhusname%27%2C%0A++7+%3D%3E+%27st_noofdughters%27%2C%0A++8+%3D%3E+%27st_noofsons%27%2C%0A++9+%3D%3E+%27st_email%27%2C%0A++10+%3D%3E+%27st_mobilenocomunication%27%2C%0A++11+%3D%3E+%27st_examp1%27%2C%0A++12+%3D%3E+%27st_examp2%27%2C%0A++13+%3D%3E+%27st_examp3%27%2C%0A++14+%3D%3E+%27st_borduniversity1%27%2C%0A++15+%3D%3E+%27st_borduniversity2%27%2C%0A++16+%3D%3E+%27st_borduniversity3%27%2C%0A++17+%3D%3E+%27st_year1%27%2C%0A++18+%3D%3E+%27st_year2%27%2C%0A++19+%3D%3E+%27st_year3%27%2C%0A++20+%3D%3E+%27st_insititute1%27%2C%0A++21+%3D%3E+%27st_insititute2%27%2C%0A++22+%3D%3E+%27st_insititute3%27%2C%0A++23+%3D%3E+%27st_position1%27%2C%0A++24+%3D%3E+%27st_position2%27%2C%0A++25+%3D%3E+%27st_position3%27%2C%0A++26+%3D%3E+%27st_period1%27%2C%0A++27+%3D%3E+%27st_period2%27%2C%0A++28+%3D%3E+%27st_period3%27%2C%0A++29+%3D%3E+%27st_pradress%27%2C%0A++30+%3D%3E+%27st_prcity%27%2C%0A++31+%3D%3E+%27st_prpincode%27%2C%0A++32+%3D%3E+%27st_prphonecode%27%2C%0A++33+%3D%3E+%27st_prstate%27%2C%0A++34+%3D%3E+%27st_prresino%27%2C%0A++35+%3D%3E+%27st_prcountry%27%2C%0A++36+%3D%3E+%27st_prmobno%27%2C%0A++37+%3D%3E+%27st_peadress%27%2C%0A++38+%3D%3E+%27st_pecity%27%2C%0A++39+%3D%3E+%27st_pepincode%27%2C%0A++40+%3D%3E+%27st_pephoneno%27%2C%0A++41+%3D%3E+%27st_pestate%27%2C%0A++42+%3D%3E+%27st_peresino%27%2C%0A++43+%3D%3E+%27st_pecountry%27%2C%0A++44+%3D%3E+%27st_pemobileno%27%2C%0A++45+%3D%3E+%27st_refposname1%27%2C%0A++46+%3D%3E+%27st_refposname2%27%2C%0A++47+%3D%3E+%27st_refposname3%27%2C%0A++48+%3D%3E+%27st_refdesignation1%27%2C%0A++49+%3D%3E+%27st_refdesignation2%27%2C%0A++50+%3D%3E+%27st_refdesignation3%27%2C%0A++51+%3D%3E+%27st_refinsititute1%27%2C%0A++52+%3D%3E+%27st_refinsititute2%27%2C%0A++53+%3D%3E+%27st_refinsititute3%27%2C%0A++54+%3D%3E+%27st_refemail1%27%2C%0A++55+%3D%3E+%27st_refemail2%27%2C%0A++56+%3D%3E+%27st_refemail3%27%2C%0A++57+%3D%3E+%27st_writentest%27%2C%0A++58+%3D%3E+%27st_technicalinterview%27%2C%0A++59+%3D%3E+%27st_finalinterview%27%2C%0A++60+%3D%3E+%27status%27%2C%0A++61+%3D%3E+%27st_perviouspackage%27%2C%0A++62+%3D%3E+%27st_basic%27%2C%0A++63+%3D%3E+%27st_dateofjoining%27%2C%0A++64+%3D%3E+%27st_post%27%2C%0A++65+%3D%3E+%27st_department%27%2C%0A++66+%3D%3E+%27st_remarks%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27INT%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++14+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++15+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++16+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++17+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++18+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++19+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++20+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++21+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++22+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++23+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++24+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++25+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++26+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++27+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++28+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++29+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++30+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++31+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++32+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++33+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++34+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++35+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++36+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++37+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++38+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++39+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++40+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++41+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++42+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++43+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++44+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++45+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++46+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++47+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++48+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++49+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++50+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++51+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++52+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++53+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++54+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++55+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++56+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++57+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++58+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++59+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++60+%3D%3E+%27enum%28%5C%5C%5C%27selected%5C%5C%5C%27%2C%5C%5C%5C%27notselected%5C%5C%5C%27%2C%5C%5C%5C%27onhold%5C%5C%5C%27%29%27%2C%0A++61+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++62+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++63+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++64+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++65+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++66+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_staff extends POG_Base
{
	public $es_staffId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $st_postaplied;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_firstname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_lastname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_gender;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_dob;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_primarysubject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_fatherhusname;
	
	/**
	 * @var INT
	 */
	public $st_noofdughters;
	
	/**
	 * @var INT
	 */
	public $st_noofsons;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_email;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_mobilenocomunication;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_examp1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_examp2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_examp3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_borduniversity1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_borduniversity2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_borduniversity3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_year1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_year2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_year3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_insititute1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_insititute2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_insititute3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_position1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_position2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_position3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_period1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_period2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_period3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_pradress;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_prcity;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_prpincode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_prphonecode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_prstate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_prresino;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_prcountry;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_prmobno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_peadress;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_pecity;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_pepincode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_pephoneno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_pestate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_peresino;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_pecountry;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_pemobileno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refposname1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refposname2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refposname3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refdesignation1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refdesignation2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refdesignation3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refinsititute1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refinsititute2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refinsititute3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refemail1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refemail2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_refemail3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_writentest;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_technicalinterview;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_finalinterview;
	
	/**
	 * @var enum('selected','notselected','onhold')
	 */
	public $status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_perviouspackage;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_basic;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_dateofjoining;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_post;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_department;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $st_remarks;
	
	public $pog_attribute_type = array(
		"es_staffId" => array('db_attributes' => array("NUMERIC", "INT")),
		"st_postaplied" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_firstname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_lastname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_gender" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_dob" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_primarysubject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_fatherhusname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_noofdughters" => array('db_attributes' => array("NUMERIC", "INT")),
		"st_noofsons" => array('db_attributes' => array("NUMERIC", "INT")),
		"st_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_mobilenocomunication" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_examp1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_examp2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_examp3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_borduniversity1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_borduniversity2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_borduniversity3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_year1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_year2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_year3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_insititute1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_insititute2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_insititute3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_position1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_position2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_position3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_period1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_period2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_period3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_pradress" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_prcity" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_prpincode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_prphonecode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_prstate" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_prresino" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_prcountry" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_prmobno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_peadress" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_pecity" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_pepincode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_pephoneno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_pestate" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_peresino" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_pecountry" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_pemobileno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refposname1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refposname2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refposname3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refdesignation1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refdesignation2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refdesignation3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refinsititute1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refinsititute2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refinsititute3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refemail1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refemail2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_refemail3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_writentest" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_technicalinterview" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_finalinterview" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'selected','notselected','onhold'")),
		"st_perviouspackage" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_basic" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_dateofjoining" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_post" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_department" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"st_remarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		);
	public $pog_query;
	
	
	/**
	* Getter for some private attributes
	* @return mixed $attribute
	*/
	public function __get($attribute)
	{
		if (isset($this->{"_".$attribute}))
		{
			return $this->{"_".$attribute};
		}
		else
		{
			return false;
		}
	}
	
	function es_staff($st_postaplied='', $st_firstname='', $st_lastname='', $st_gender='', $st_dob='', $st_primarysubject='', $st_fatherhusname='', $st_noofdughters='', $st_noofsons='', $st_email='', $st_mobilenocomunication='', $st_examp1='', $st_examp2='', $st_examp3='', $st_borduniversity1='', $st_borduniversity2='', $st_borduniversity3='', $st_year1='', $st_year2='', $st_year3='', $st_insititute1='', $st_insititute2='', $st_insititute3='', $st_position1='', $st_position2='', $st_position3='', $st_period1='', $st_period2='', $st_period3='', $st_pradress='', $st_prcity='', $st_prpincode='', $st_prphonecode='', $st_prstate='', $st_prresino='', $st_prcountry='', $st_prmobno='', $st_peadress='', $st_pecity='', $st_pepincode='', $st_pephoneno='', $st_pestate='', $st_peresino='', $st_pecountry='', $st_pemobileno='', $st_refposname1='', $st_refposname2='', $st_refposname3='', $st_refdesignation1='', $st_refdesignation2='', $st_refdesignation3='', $st_refinsititute1='', $st_refinsititute2='', $st_refinsititute3='', $st_refemail1='', $st_refemail2='', $st_refemail3='', $st_writentest='', $st_technicalinterview='', $st_finalinterview='', $status='', $st_perviouspackage='', $st_basic='', $st_dateofjoining='', $st_post='', $st_department='', $st_remarks='')
	{
		$this->st_postaplied = $st_postaplied;
		$this->st_firstname = $st_firstname;
		$this->st_lastname = $st_lastname;
		$this->st_gender = $st_gender;
		$this->st_dob = $st_dob;
		$this->st_primarysubject = $st_primarysubject;
		$this->st_fatherhusname = $st_fatherhusname;
		$this->st_noofdughters = $st_noofdughters;
		$this->st_noofsons = $st_noofsons;
		$this->st_email = $st_email;
		$this->st_mobilenocomunication = $st_mobilenocomunication;
		$this->st_examp1 = $st_examp1;
		$this->st_examp2 = $st_examp2;
		$this->st_examp3 = $st_examp3;
		$this->st_borduniversity1 = $st_borduniversity1;
		$this->st_borduniversity2 = $st_borduniversity2;
		$this->st_borduniversity3 = $st_borduniversity3;
		$this->st_year1 = $st_year1;
		$this->st_year2 = $st_year2;
		$this->st_year3 = $st_year3;
		$this->st_insititute1 = $st_insititute1;
		$this->st_insititute2 = $st_insititute2;
		$this->st_insititute3 = $st_insititute3;
		$this->st_position1 = $st_position1;
		$this->st_position2 = $st_position2;
		$this->st_position3 = $st_position3;
		$this->st_period1 = $st_period1;
		$this->st_period2 = $st_period2;
		$this->st_period3 = $st_period3;
		$this->st_pradress = $st_pradress;
		$this->st_prcity = $st_prcity;
		$this->st_prpincode = $st_prpincode;
		$this->st_prphonecode = $st_prphonecode;
		$this->st_prstate = $st_prstate;
		$this->st_prresino = $st_prresino;
		$this->st_prcountry = $st_prcountry;
		$this->st_prmobno = $st_prmobno;
		$this->st_peadress = $st_peadress;
		$this->st_pecity = $st_pecity;
		$this->st_pepincode = $st_pepincode;
		$this->st_pephoneno = $st_pephoneno;
		$this->st_pestate = $st_pestate;
		$this->st_peresino = $st_peresino;
		$this->st_pecountry = $st_pecountry;
		$this->st_pemobileno = $st_pemobileno;
		$this->st_refposname1 = $st_refposname1;
		$this->st_refposname2 = $st_refposname2;
		$this->st_refposname3 = $st_refposname3;
		$this->st_refdesignation1 = $st_refdesignation1;
		$this->st_refdesignation2 = $st_refdesignation2;
		$this->st_refdesignation3 = $st_refdesignation3;
		$this->st_refinsititute1 = $st_refinsititute1;
		$this->st_refinsititute2 = $st_refinsititute2;
		$this->st_refinsititute3 = $st_refinsititute3;
		$this->st_refemail1 = $st_refemail1;
		$this->st_refemail2 = $st_refemail2;
		$this->st_refemail3 = $st_refemail3;
		$this->st_writentest = $st_writentest;
		$this->st_technicalinterview = $st_technicalinterview;
		$this->st_finalinterview = $st_finalinterview;
		$this->status = $status;
		$this->st_perviouspackage = $st_perviouspackage;
		$this->st_basic = $st_basic;
		$this->st_dateofjoining = $st_dateofjoining;
		$this->st_post = $st_post;
		$this->st_department = $st_department;
		$this->st_remarks = $st_remarks;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_staffId 
	* @return object $es_staff
	*/
	function Get($es_staffId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_staff` where `es_staffid`='".intval($es_staffId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_staffId = $row['es_staffid'];
			$this->st_postaplied = $this->Unescape($row['st_postaplied']);
			$this->st_firstname = $this->Unescape($row['st_firstname']);
			$this->st_lastname = $this->Unescape($row['st_lastname']);
			$this->st_gender = $this->Unescape($row['st_gender']);
			$this->st_dob = $this->Unescape($row['st_dob']);
			$this->st_primarysubject = $this->Unescape($row['st_primarysubject']);
			$this->st_fatherhusname = $this->Unescape($row['st_fatherhusname']);
			$this->st_noofdughters = $this->Unescape($row['st_noofdughters']);
			$this->st_noofsons = $this->Unescape($row['st_noofsons']);
			$this->st_email = $this->Unescape($row['st_email']);
			$this->st_mobilenocomunication = $this->Unescape($row['st_mobilenocomunication']);
			$this->st_examp1 = $this->Unescape($row['st_examp1']);
			$this->st_examp2 = $this->Unescape($row['st_examp2']);
			$this->st_examp3 = $this->Unescape($row['st_examp3']);
			$this->st_borduniversity1 = $this->Unescape($row['st_borduniversity1']);
			$this->st_borduniversity2 = $this->Unescape($row['st_borduniversity2']);
			$this->st_borduniversity3 = $this->Unescape($row['st_borduniversity3']);
			$this->st_year1 = $this->Unescape($row['st_year1']);
			$this->st_year2 = $this->Unescape($row['st_year2']);
			$this->st_year3 = $this->Unescape($row['st_year3']);
			$this->st_insititute1 = $this->Unescape($row['st_insititute1']);
			$this->st_insititute2 = $this->Unescape($row['st_insititute2']);
			$this->st_insititute3 = $this->Unescape($row['st_insititute3']);
			$this->st_position1 = $this->Unescape($row['st_position1']);
			$this->st_position2 = $this->Unescape($row['st_position2']);
			$this->st_position3 = $this->Unescape($row['st_position3']);
			$this->st_period1 = $this->Unescape($row['st_period1']);
			$this->st_period2 = $this->Unescape($row['st_period2']);
			$this->st_period3 = $this->Unescape($row['st_period3']);
			$this->st_pradress = $this->Unescape($row['st_pradress']);
			$this->st_prcity = $this->Unescape($row['st_prcity']);
			$this->st_prpincode = $this->Unescape($row['st_prpincode']);
			$this->st_prphonecode = $this->Unescape($row['st_prphonecode']);
			$this->st_prstate = $this->Unescape($row['st_prstate']);
			$this->st_prresino = $this->Unescape($row['st_prresino']);
			$this->st_prcountry = $this->Unescape($row['st_prcountry']);
			$this->st_prmobno = $this->Unescape($row['st_prmobno']);
			$this->st_peadress = $this->Unescape($row['st_peadress']);
			$this->st_pecity = $this->Unescape($row['st_pecity']);
			$this->st_pepincode = $this->Unescape($row['st_pepincode']);
			$this->st_pephoneno = $this->Unescape($row['st_pephoneno']);
			$this->st_pestate = $this->Unescape($row['st_pestate']);
			$this->st_peresino = $this->Unescape($row['st_peresino']);
			$this->st_pecountry = $this->Unescape($row['st_pecountry']);
			$this->st_pemobileno = $this->Unescape($row['st_pemobileno']);
			$this->st_refposname1 = $this->Unescape($row['st_refposname1']);
			$this->st_refposname2 = $this->Unescape($row['st_refposname2']);
			$this->st_refposname3 = $this->Unescape($row['st_refposname3']);
			$this->st_refdesignation1 = $this->Unescape($row['st_refdesignation1']);
			$this->st_refdesignation2 = $this->Unescape($row['st_refdesignation2']);
			$this->st_refdesignation3 = $this->Unescape($row['st_refdesignation3']);
			$this->st_refinsititute1 = $this->Unescape($row['st_refinsititute1']);
			$this->st_refinsititute2 = $this->Unescape($row['st_refinsititute2']);
			$this->st_refinsititute3 = $this->Unescape($row['st_refinsititute3']);
			$this->st_refemail1 = $this->Unescape($row['st_refemail1']);
			$this->st_refemail2 = $this->Unescape($row['st_refemail2']);
			$this->st_refemail3 = $this->Unescape($row['st_refemail3']);
			$this->st_writentest = $this->Unescape($row['st_writentest']);
			$this->st_technicalinterview = $this->Unescape($row['st_technicalinterview']);
			$this->st_finalinterview = $this->Unescape($row['st_finalinterview']);
			$this->status = $row['status'];
			$this->st_perviouspackage = $this->Unescape($row['st_perviouspackage']);
			$this->st_basic = $this->Unescape($row['st_basic']);
			$this->st_dateofjoining = $this->Unescape($row['st_dateofjoining']);
			$this->st_post = $this->Unescape($row['st_post']);
			$this->st_department = $this->Unescape($row['st_department']);
			$this->st_remarks = $this->Unescape($row['st_remarks']);
			$this->image = $this->Unescape($row['image']);
			$this->selstatus = $row['selstatus'];
			$this->tcstatus = $row['tcstatus'];
			$this->st_username = $this->Unescape($row['st_username']);
			$this->st_password = $this->Unescape($row['st_password']);
			$this->st_theme = $this->Unescape($row['st_theme']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_staffList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_staff` ";
		$es_staffList = Array();
		if (sizeof($fcv_array) > 0)
		{
			$this->pog_query .= " where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$this->pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) != 1)
					{
						$this->pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						if ($GLOBALS['configuration']['db_encoding'] == 1)
						{
							$value = POG_Base::IsColumn($fcv_array[$i][2]) ? "BASE64_DECODE(".$fcv_array[$i][2].")" : "'".$fcv_array[$i][2]."'";
							$this->pog_query .= "BASE64_DECODE(`".$fcv_array[$i][0]."`) ".$fcv_array[$i][1]." ".$value;
						}
						else
						{
							$value =  POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$this->Escape($fcv_array[$i][2])."'";
							$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
						}
					}
					else
					{
						$value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$fcv_array[$i][2]."'";
						$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
					}
				}
			}
		}
		if ($sortBy != '')
		{
			if (isset($this->pog_attribute_type[$sortBy]['db_attributes']) && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'SET')
			{
				if ($GLOBALS['configuration']['db_encoding'] == 1)
				{
					$sortBy = "BASE64_DECODE($sortBy) ";
				}
				else
				{
					$sortBy = "$sortBy ";
				}
			}
			else
			{
				$sortBy = "$sortBy ";
			}
		}
		else
		{
			$sortBy = "es_staffid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_staff = new $thisObjectName();
			$es_staff->es_staffId = $row['es_staffid'];
			$es_staff->st_postaplied = $this->Unescape($row['st_postaplied']);
			$es_staff->st_firstname = $this->Unescape($row['st_firstname']);
			$es_staff->st_lastname = $this->Unescape($row['st_lastname']);
			$es_staff->st_gender = $this->Unescape($row['st_gender']);
			$es_staff->st_dob = $this->Unescape($row['st_dob']);
			$es_staff->st_primarysubject = $this->Unescape($row['st_primarysubject']);
			$es_staff->st_fatherhusname = $this->Unescape($row['st_fatherhusname']);
			$es_staff->st_noofdughters = $this->Unescape($row['st_noofdughters']);
			$es_staff->st_noofsons = $this->Unescape($row['st_noofsons']);
			$es_staff->st_email = $this->Unescape($row['st_email']);
			$es_staff->st_mobilenocomunication = $this->Unescape($row['st_mobilenocomunication']);
			$es_staff->st_examp1 = $this->Unescape($row['st_examp1']);
			$es_staff->st_examp2 = $this->Unescape($row['st_examp2']);
			$es_staff->st_examp3 = $this->Unescape($row['st_examp3']);
			$es_staff->st_borduniversity1 = $this->Unescape($row['st_borduniversity1']);
			$es_staff->st_borduniversity2 = $this->Unescape($row['st_borduniversity2']);
			$es_staff->st_borduniversity3 = $this->Unescape($row['st_borduniversity3']);
			$es_staff->st_year1 = $this->Unescape($row['st_year1']);
			$es_staff->st_year2 = $this->Unescape($row['st_year2']);
			$es_staff->st_year3 = $this->Unescape($row['st_year3']);
			$es_staff->st_insititute1 = $this->Unescape($row['st_insititute1']);
			$es_staff->st_insititute2 = $this->Unescape($row['st_insititute2']);
			$es_staff->st_insititute3 = $this->Unescape($row['st_insititute3']);
			$es_staff->st_position1 = $this->Unescape($row['st_position1']);
			$es_staff->st_position2 = $this->Unescape($row['st_position2']);
			$es_staff->st_position3 = $this->Unescape($row['st_position3']);
			$es_staff->st_period1 = $this->Unescape($row['st_period1']);
			$es_staff->st_period2 = $this->Unescape($row['st_period2']);
			$es_staff->st_period3 = $this->Unescape($row['st_period3']);
			$es_staff->st_pradress = $this->Unescape($row['st_pradress']);
			$es_staff->st_prcity = $this->Unescape($row['st_prcity']);
			$es_staff->st_prpincode = $this->Unescape($row['st_prpincode']);
			$es_staff->st_prphonecode = $this->Unescape($row['st_prphonecode']);
			$es_staff->st_prstate = $this->Unescape($row['st_prstate']);
			$es_staff->st_prresino = $this->Unescape($row['st_prresino']);
			$es_staff->st_prcountry = $this->Unescape($row['st_prcountry']);
			$es_staff->st_prmobno = $this->Unescape($row['st_prmobno']);
			$es_staff->st_peadress = $this->Unescape($row['st_peadress']);
			$es_staff->st_pecity = $this->Unescape($row['st_pecity']);
			$es_staff->st_pepincode = $this->Unescape($row['st_pepincode']);
			$es_staff->st_pephoneno = $this->Unescape($row['st_pephoneno']);
			$es_staff->st_pestate = $this->Unescape($row['st_pestate']);
			$es_staff->st_peresino = $this->Unescape($row['st_peresino']);
			$es_staff->st_pecountry = $this->Unescape($row['st_pecountry']);
			$es_staff->st_pemobileno = $this->Unescape($row['st_pemobileno']);
			$es_staff->st_refposname1 = $this->Unescape($row['st_refposname1']);
			$es_staff->st_refposname2 = $this->Unescape($row['st_refposname2']);
			$es_staff->st_refposname3 = $this->Unescape($row['st_refposname3']);
			$es_staff->st_refdesignation1 = $this->Unescape($row['st_refdesignation1']);
			$es_staff->st_refdesignation2 = $this->Unescape($row['st_refdesignation2']);
			$es_staff->st_refdesignation3 = $this->Unescape($row['st_refdesignation3']);
			$es_staff->st_refinsititute1 = $this->Unescape($row['st_refinsititute1']);
			$es_staff->st_refinsititute2 = $this->Unescape($row['st_refinsititute2']);
			$es_staff->st_refinsititute3 = $this->Unescape($row['st_refinsititute3']);
			$es_staff->st_refemail1 = $this->Unescape($row['st_refemail1']);
			$es_staff->st_refemail2 = $this->Unescape($row['st_refemail2']);
			$es_staff->st_refemail3 = $this->Unescape($row['st_refemail3']);
			$es_staff->st_writentest = $this->Unescape($row['st_writentest']);
			$es_staff->st_technicalinterview = $this->Unescape($row['st_technicalinterview']);
			$es_staff->st_finalinterview = $this->Unescape($row['st_finalinterview']);
			$es_staff->status = $row['status'];
			$es_staff->st_perviouspackage = $this->Unescape($row['st_perviouspackage']);
			$es_staff->st_basic = $this->Unescape($row['st_basic']);
			$es_staff->st_dateofjoining = $this->Unescape($row['st_dateofjoining']);
			$es_staff->st_post = $this->Unescape($row['st_post']);
			$es_staff->st_department = $this->Unescape($row['st_department']);
			$es_staff->st_remarks = $this->Unescape($row['st_remarks']);
			$es_staff->intdate = $this->Unescape($row['intdate']);
			$es_staff->image = $this->Unescape($row['image']);
			$es_staff->selstatus = $row['selstatus'];
			$es_staff->tcstatus = $row['tcstatus'];
			$es_staff->st_username = $this->Unescape($row['st_username']);
			$es_staff->st_password = $this->Unescape($row['st_password']);
			$es_staff->st_theme = $this->Unescape($row['st_theme']);
			
			$es_staffList[] = $es_staff;
		}
		return $es_staffList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_staffId
	*/
	function Save()
	{
		
		$connection = Database::Connect();
		$this->pog_query = "select `es_staffid` from `es_staff` where `es_staffid`='".$this->es_staffId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_staff` set 
			`st_postaplied`='".$this->Escape($this->st_postaplied)."', 
			`st_firstname`='".$this->Escape($this->st_firstname)."', 
			`st_lastname`='".$this->Escape($this->st_lastname)."', 
			`st_gender`='".$this->Escape($this->st_gender)."', 
			`st_dob`='".$this->Escape($this->st_dob)."', 
			`st_primarysubject`='".$this->Escape($this->st_primarysubject)."', 
			`st_fatherhusname`='".$this->Escape($this->st_fatherhusname)."', 
			`st_noofdughters`='".$this->Escape($this->st_noofdughters)."', 
			`st_noofsons`='".$this->Escape($this->st_noofsons)."', 
			`st_email`='".$this->Escape($this->st_email)."', 
			`st_mobilenocomunication`='".$this->Escape($this->st_mobilenocomunication)."', 
			`st_examp1`='".$this->Escape($this->st_examp1)."', 
			`st_examp2`='".$this->Escape($this->st_examp2)."', 
			`st_examp3`='".$this->Escape($this->st_examp3)."', 
			`st_borduniversity1`='".$this->Escape($this->st_borduniversity1)."', 
			`st_borduniversity2`='".$this->Escape($this->st_borduniversity2)."', 
			`st_borduniversity3`='".$this->Escape($this->st_borduniversity3)."', 
			`st_year1`='".$this->Escape($this->st_year1)."', 
			`st_year2`='".$this->Escape($this->st_year2)."', 
			`st_year3`='".$this->Escape($this->st_year3)."', 
			`st_insititute1`='".$this->Escape($this->st_insititute1)."', 
			`st_insititute2`='".$this->Escape($this->st_insititute2)."', 
			`st_insititute3`='".$this->Escape($this->st_insititute3)."', 
			`st_position1`='".$this->Escape($this->st_position1)."', 
			`st_position2`='".$this->Escape($this->st_position2)."', 
			`st_position3`='".$this->Escape($this->st_position3)."', 
			`st_period1`='".$this->Escape($this->st_period1)."', 
			`st_period2`='".$this->Escape($this->st_period2)."', 
			`st_period3`='".$this->Escape($this->st_period3)."', 
			`st_pradress`='".$this->Escape($this->st_pradress)."', 
			`st_prcity`='".$this->Escape($this->st_prcity)."', 
			`st_prpincode`='".$this->Escape($this->st_prpincode)."', 
			`st_prphonecode`='".$this->Escape($this->st_prphonecode)."', 
			`st_prstate`='".$this->Escape($this->st_prstate)."', 
			`st_prresino`='".$this->Escape($this->st_prresino)."', 
			`st_prcountry`='".$this->Escape($this->st_prcountry)."', 
			`st_prmobno`='".$this->Escape($this->st_prmobno)."', 
			`st_peadress`='".$this->Escape($this->st_peadress)."', 
			`st_pecity`='".$this->Escape($this->st_pecity)."', 
			`st_pepincode`='".$this->Escape($this->st_pepincode)."', 
			`st_pephoneno`='".$this->Escape($this->st_pephoneno)."', 
			`st_pestate`='".$this->Escape($this->st_pestate)."', 
			`st_peresino`='".$this->Escape($this->st_peresino)."', 
			`st_pecountry`='".$this->Escape($this->st_pecountry)."', 
			`st_pemobileno`='".$this->Escape($this->st_pemobileno)."', 
			`st_refposname1`='".$this->Escape($this->st_refposname1)."', 
			`st_refposname2`='".$this->Escape($this->st_refposname2)."', 
			`st_refposname3`='".$this->Escape($this->st_refposname3)."', 
			`st_refdesignation1`='".$this->Escape($this->st_refdesignation1)."', 
			`st_refdesignation2`='".$this->Escape($this->st_refdesignation2)."', 
			`st_refdesignation3`='".$this->Escape($this->st_refdesignation3)."', 
			`st_refinsititute1`='".$this->Escape($this->st_refinsititute1)."', 
			`st_refinsititute2`='".$this->Escape($this->st_refinsititute2)."', 
			`st_refinsititute3`='".$this->Escape($this->st_refinsititute3)."', 
			`st_refemail1`='".$this->Escape($this->st_refemail1)."', 
			`st_refemail2`='".$this->Escape($this->st_refemail2)."', 
			`st_refemail3`='".$this->Escape($this->st_refemail3)."', 
			`st_writentest`='".$this->Escape($this->st_writentest)."', 
			`st_technicalinterview`='".$this->Escape($this->st_technicalinterview)."', 
			`st_finalinterview`='".$this->Escape($this->st_finalinterview)."', 
			`status`='".$this->status."', 
			`st_perviouspackage`='".$this->Escape($this->st_perviouspackage)."', 
			`st_basic`='".$this->Escape($this->st_basic)."', 
			`st_dateofjoining`='".$this->Escape($this->st_dateofjoining)."', 
			`st_post`='".$this->Escape($this->st_post)."', 
			`st_department`='".$this->Escape($this->st_department)."', 
			`st_remarks`='".$this->Escape($this->st_remarks)."' ,
			`image`='".$this->Escape($this->image)."' where `es_staffid`='".$this->es_staffId."'";
		}
		else
		{
		$date1=date('Y-m-d');
		 $this->pog_query = "insert into `es_staff` (`st_postaplied`, `st_firstname`, `st_lastname`, `st_gender`, `st_dob`, `st_primarysubject`, `st_fatherhusname`, `st_noofdughters`, `st_noofsons`, `st_email`, `st_mobilenocomunication`, `st_examp1`, `st_examp2`, `st_examp3`, `st_borduniversity1`, `st_borduniversity2`, `st_borduniversity3`, `st_year1`, `st_year2`, `st_year3`, `st_insititute1`, `st_insititute2`, `st_insititute3`, `st_position1`, `st_position2`, `st_position3`, `st_period1`, `st_period2`, `st_period3`, `st_pradress`, `st_prcity`, `st_prpincode`, `st_prphonecode`, `st_prstate`, `st_prresino`, `st_prcountry`, `st_prmobno`, `st_peadress`, `st_pecity`, `st_pepincode`, `st_pephoneno`, `st_pestate`, `st_peresino`, `st_pecountry`, `st_pemobileno`, `st_refposname1`, `st_refposname2`, `st_refposname3`, `st_refdesignation1`, `st_refdesignation2`, `st_refdesignation3`, `st_refinsititute1`, `st_refinsititute2`, `st_refinsititute3`, `st_refemail1`, `st_refemail2`, `st_refemail3`, `st_writentest`, `st_technicalinterview`, `st_finalinterview`, `status`, `st_perviouspackage`, `st_basic`, `st_dateofjoining`, `st_post`, `st_department`, `st_remarks`,`intdate`,`image`,`selstatus`,`tcstatus`,`st_username`,`st_password`,`st_theme`) values (
			'".$this->Escape($this->st_postaplied)."', 
			'".$this->Escape($this->st_firstname)."', 
			'".$this->Escape($this->st_lastname)."', 
			'".$this->Escape($this->st_gender)."', 
			'".$this->Escape($this->st_dob)."', 
			'".$this->Escape($this->st_primarysubject)."', 
			'".$this->Escape($this->st_fatherhusname)."', 
			'".$this->Escape($this->st_noofdughters)."', 
			'".$this->Escape($this->st_noofsons)."', 
			'".$this->Escape($this->st_email)."', 
			'".$this->Escape($this->st_mobilenocomunication)."', 
			'".$this->Escape($this->st_examp1)."', 
			'".$this->Escape($this->st_examp2)."', 
			'".$this->Escape($this->st_examp3)."', 
			'".$this->Escape($this->st_borduniversity1)."', 
			'".$this->Escape($this->st_borduniversity2)."', 
			'".$this->Escape($this->st_borduniversity3)."', 
			'".$this->Escape($this->st_year1)."', 
			'".$this->Escape($this->st_year2)."', 
			'".$this->Escape($this->st_year3)."', 
			'".$this->Escape($this->st_insititute1)."', 
			'".$this->Escape($this->st_insititute2)."', 
			'".$this->Escape($this->st_insititute3)."', 
			'".$this->Escape($this->st_position1)."', 
			'".$this->Escape($this->st_position2)."', 
			'".$this->Escape($this->st_position3)."', 
			'".$this->Escape($this->st_period1)."', 
			'".$this->Escape($this->st_period2)."', 
			'".$this->Escape($this->st_period3)."', 
			'".$this->Escape($this->st_pradress)."', 
			'".$this->Escape($this->st_prcity)."', 
			'".$this->Escape($this->st_prpincode)."', 
			'".$this->Escape($this->st_prphonecode)."', 
			'".$this->Escape($this->st_prstate)."', 
			'".$this->Escape($this->st_prresino)."', 
			'".$this->Escape($this->st_prcountry)."', 
			'".$this->Escape($this->st_prmobno)."', 
			'".$this->Escape($this->st_peadress)."', 
			'".$this->Escape($this->st_pecity)."', 
			'".$this->Escape($this->st_pepincode)."', 
			'".$this->Escape($this->st_pephoneno)."', 
			'".$this->Escape($this->st_pestate)."', 
			'".$this->Escape($this->st_peresino)."', 
			'".$this->Escape($this->st_pecountry)."', 
			'".$this->Escape($this->st_pemobileno)."', 
			'".$this->Escape($this->st_refposname1)."', 
			'".$this->Escape($this->st_refposname2)."', 
			'".$this->Escape($this->st_refposname3)."', 
			'".$this->Escape($this->st_refdesignation1)."', 
			'".$this->Escape($this->st_refdesignation2)."', 
			'".$this->Escape($this->st_refdesignation3)."', 
			'".$this->Escape($this->st_refinsititute1)."', 
			'".$this->Escape($this->st_refinsititute2)."', 
			'".$this->Escape($this->st_refinsititute3)."', 
			'".$this->Escape($this->st_refemail1)."', 
			'".$this->Escape($this->st_refemail2)."', 
			'".$this->Escape($this->st_refemail3)."', 
			'".$this->Escape($this->st_writentest)."', 
			'".$this->Escape($this->st_technicalinterview)."', 
			'".$this->Escape($this->st_finalinterview)."', 
			'".$this->status."', 
			'".$this->Escape($this->st_perviouspackage)."', 
			'".$this->Escape($this->st_basic)."', 
			'".$this->Escape($this->st_dateofjoining)."', 
			'".$this->Escape($this->st_post)."', 
			'".$this->Escape($this->st_department)."', 
			'".$this->Escape($this->st_remarks)."',
			'".$date1."','','notissued','notissued',
			'".$this->Escape($this->st_username)."',
			'".$this->Escape($this->st_password)."',
			'".$this->Escape($this->st_theme)."')";
		
		
		}
		
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_staffId == "")
		{
			$this->es_staffId = $insertId;
		}
		return $this->es_staffId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_staffId
	*/
	function SaveNew()
	{
		$this->es_staffId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_staff` where `es_staffid`='".$this->es_staffId."'";
		return Database::NonQuery($this->pog_query, $connection);
	}
	
	
	/**
	* Deletes a list of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param bool $deep 
	* @return 
	*/
	function DeleteList($fcv_array)
	{
		if (sizeof($fcv_array) > 0)
		{
			$connection = Database::Connect();
			$pog_query = "delete from `es_staff` where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) !== 1)
					{
						$pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$this->Escape($fcv_array[$i][2])."'";
					}
					else
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$fcv_array[$i][2]."'";
					}
				}
			}
			return Database::NonQuery($pog_query, $connection);
		}
	}
}
?>