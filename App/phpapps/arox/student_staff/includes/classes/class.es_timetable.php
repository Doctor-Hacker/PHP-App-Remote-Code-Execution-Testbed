<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_timetable` (
	`es_timetableid` int(11) NOT NULL auto_increment,
	`es_class` VARCHAR(255) NOT NULL,
	`es_m1` VARCHAR(255) NOT NULL,
	`es_m2` VARCHAR(255) NOT NULL,
	`es_m3` VARCHAR(255) NOT NULL,
	`es_m4` VARCHAR(255) NOT NULL,
	`es_m5` VARCHAR(255) NOT NULL,
	`es_m6` VARCHAR(255) NOT NULL,
	`es_m7` VARCHAR(255) NOT NULL,
	`es_m8` VARCHAR(255) NOT NULL,
	`es_m9` VARCHAR(255) NOT NULL,
	`es_subject` VARCHAR(255) NOT NULL,
	`es_staffid` VARCHAR(255) NOT NULL,
	`es_t1` VARCHAR(255) NOT NULL,
	`es_t2` VARCHAR(255) NOT NULL,
	`es_t3` VARCHAR(255) NOT NULL,
	`es_t4` VARCHAR(255) NOT NULL,
	`es_t5` VARCHAR(255) NOT NULL,
	`es_t6` VARCHAR(255) NOT NULL,
	`es_t7` VARCHAR(255) NOT NULL,
	`es_t8` VARCHAR(255) NOT NULL,
	`es_t9` VARCHAR(255) NOT NULL,
	`es_w1` VARCHAR(255) NOT NULL,
	`es_w2` VARCHAR(255) NOT NULL,
	`es_w3` VARCHAR(255) NOT NULL,
	`es_w4` VARCHAR(255) NOT NULL,
	`es_w5` VARCHAR(255) NOT NULL,
	`es_w6` VARCHAR(255) NOT NULL,
	`es_w7` VARCHAR(255) NOT NULL,
	`es_w8` VARCHAR(255) NOT NULL,
	`es_w9` VARCHAR(255) NOT NULL,
	`es_th1` VARCHAR(255) NOT NULL,
	`es_th2` VARCHAR(255) NOT NULL,
	`es_th3` VARCHAR(255) NOT NULL,
	`es_th4` VARCHAR(255) NOT NULL,
	`es_th5` VARCHAR(255) NOT NULL,
	`es_th6` VARCHAR(255) NOT NULL,
	`es_th7` VARCHAR(255) NOT NULL,
	`es_th8` VARCHAR(255) NOT NULL,
	`es_th9` VARCHAR(255) NOT NULL,
	`es_f1` VARCHAR(255) NOT NULL,
	`es_f2` VARCHAR(255) NOT NULL,
	`es_f3` VARCHAR(255) NOT NULL,
	`es_f4` VARCHAR(255) NOT NULL,
	`es_f5` VARCHAR(255) NOT NULL,
	`es_f6` VARCHAR(255) NOT NULL,
	`es_f7` VARCHAR(255) NOT NULL,
	`es_f8` VARCHAR(255) NOT NULL,
	`es_f9` VARCHAR(255) NOT NULL,
	`es_s1` VARCHAR(255) NOT NULL,
	`es_s2` VARCHAR(255) NOT NULL,
	`es_s3` VARCHAR(255) NOT NULL,
	`es_s4` VARCHAR(255) NOT NULL,
	`es_s5` VARCHAR(255) NOT NULL,
	`es_s6` VARCHAR(255) NOT NULL,
	`es_s7` VARCHAR(255) NOT NULL,
	`es_s8` VARCHAR(255) NOT NULL,
	`es_s9` VARCHAR(255) NOT NULL,
	`es_startfrom` TIME NOT NULL,
	`es_endto` INT NOT NULL,
	`es_breakfrom` TIME NOT NULL,
	`es_breakto` TIME NOT NULL,
	`es_lunchfrom` TIME NOT NULL,
	`es_lunchto` TIME NOT NULL,
	`es_duration` TIME NOT NULL, PRIMARY KEY  (`es_timetableid`)) ENGINE=MyISAM;
*/

/**
* <b>es_timetable</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_timetable&attributeList=array+%28%0A++0+%3D%3E+%27es_class%27%2C%0A++1+%3D%3E+%27es_m1%27%2C%0A++2+%3D%3E+%27es_m2%27%2C%0A++3+%3D%3E+%27es_m3%27%2C%0A++4+%3D%3E+%27es_m4%27%2C%0A++5+%3D%3E+%27es_m5%27%2C%0A++6+%3D%3E+%27es_m6%27%2C%0A++7+%3D%3E+%27es_m7%27%2C%0A++8+%3D%3E+%27es_m8%27%2C%0A++9+%3D%3E+%27es_m9%27%2C%0A++10+%3D%3E+%27es_subject%27%2C%0A++11+%3D%3E+%27es_staffid%27%2C%0A++12+%3D%3E+%27es_t1%27%2C%0A++13+%3D%3E+%27es_t2%27%2C%0A++14+%3D%3E+%27es_t3%27%2C%0A++15+%3D%3E+%27es_t4%27%2C%0A++16+%3D%3E+%27es_t5%27%2C%0A++17+%3D%3E+%27es_t6%27%2C%0A++18+%3D%3E+%27es_t7%27%2C%0A++19+%3D%3E+%27es_t8%27%2C%0A++20+%3D%3E+%27es_t9%27%2C%0A++21+%3D%3E+%27es_w1%27%2C%0A++22+%3D%3E+%27es_w2%27%2C%0A++23+%3D%3E+%27es_w3%27%2C%0A++24+%3D%3E+%27es_w4%27%2C%0A++25+%3D%3E+%27es_w5%27%2C%0A++26+%3D%3E+%27es_w6%27%2C%0A++27+%3D%3E+%27es_w7%27%2C%0A++28+%3D%3E+%27es_w8%27%2C%0A++29+%3D%3E+%27es_w9%27%2C%0A++30+%3D%3E+%27es_th1%27%2C%0A++31+%3D%3E+%27es_th2%27%2C%0A++32+%3D%3E+%27es_th3%27%2C%0A++33+%3D%3E+%27es_th4%27%2C%0A++34+%3D%3E+%27es_th5%27%2C%0A++35+%3D%3E+%27es_th6%27%2C%0A++36+%3D%3E+%27es_th7%27%2C%0A++37+%3D%3E+%27es_th8%27%2C%0A++38+%3D%3E+%27es_th9%27%2C%0A++39+%3D%3E+%27es_f1%27%2C%0A++40+%3D%3E+%27es_f2%27%2C%0A++41+%3D%3E+%27es_f3%27%2C%0A++42+%3D%3E+%27es_f4%27%2C%0A++43+%3D%3E+%27es_f5%27%2C%0A++44+%3D%3E+%27es_f6%27%2C%0A++45+%3D%3E+%27es_f7%27%2C%0A++46+%3D%3E+%27es_f8%27%2C%0A++47+%3D%3E+%27es_f9%27%2C%0A++48+%3D%3E+%27es_s1%27%2C%0A++49+%3D%3E+%27es_s2%27%2C%0A++50+%3D%3E+%27es_s3%27%2C%0A++51+%3D%3E+%27es_s4%27%2C%0A++52+%3D%3E+%27es_s5%27%2C%0A++53+%3D%3E+%27es_s6%27%2C%0A++54+%3D%3E+%27es_s7%27%2C%0A++55+%3D%3E+%27es_s8%27%2C%0A++56+%3D%3E+%27es_s9%27%2C%0A++57+%3D%3E+%27es_startfrom%27%2C%0A++58+%3D%3E+%27es_endto%27%2C%0A++59+%3D%3E+%27es_breakfrom%27%2C%0A++60+%3D%3E+%27es_breakto%27%2C%0A++61+%3D%3E+%27es_lunchfrom%27%2C%0A++62+%3D%3E+%27es_lunchto%27%2C%0A++63+%3D%3E+%27es_duration%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++14+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++15+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++16+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++17+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++18+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++19+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++20+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++21+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++22+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++23+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++24+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++25+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++26+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++27+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++28+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++29+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++30+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++31+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++32+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++33+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++34+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++35+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++36+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++37+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++38+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++39+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++40+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++41+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++42+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++43+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++44+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++45+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++46+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++47+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++48+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++49+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++50+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++51+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++52+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++53+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++54+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++55+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++56+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++57+%3D%3E+%27TIME%27%2C%0A++58+%3D%3E+%27INT%27%2C%0A++59+%3D%3E+%27TIME%27%2C%0A++60+%3D%3E+%27TIME%27%2C%0A++61+%3D%3E+%27TIME%27%2C%0A++62+%3D%3E+%27TIME%27%2C%0A++63+%3D%3E+%27TIME%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_timetable extends POG_Base
{
	public $es_timetableId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m4;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m5;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m6;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m7;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m8;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_m9;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_subject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_staffid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t4;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t5;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t6;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t7;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t8;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_t9;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w4;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w5;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w6;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w7;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w8;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_w9;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th4;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th5;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th6;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th7;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th8;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_th9;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f4;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f5;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f6;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f7;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f8;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_f9;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s4;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s5;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s6;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s7;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s8;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_s9;
	
	/**
	 * @var TIME
	 */
	public $es_startfrom;
	
	/**
	 * @var INT
	 */
	public $es_endto;
	
	/**
	 * @var TIME
	 */
	public $es_breakfrom;
	
	/**
	 * @var TIME
	 */
	public $es_breakto;
	
	/**
	 * @var TIME
	 */
	public $es_lunchfrom;
	
	/**
	 * @var TIME
	 */
	public $es_lunchto;
	
	/**
	 * @var TIME
	 */
	public $es_duration;
	
	public $pog_attribute_type = array(
		"es_timetableId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m4" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m5" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m6" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m7" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m8" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_m9" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_subject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_staffid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t4" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t5" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t6" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t7" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t8" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_t9" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w4" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w5" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w6" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w7" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w8" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_w9" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th4" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th5" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th6" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th7" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th8" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_th9" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f4" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f5" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f6" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f7" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f8" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_f9" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s4" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s5" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s6" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s7" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s8" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_s9" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_startfrom" => array('db_attributes' => array("NUMERIC", "TIME")),
		"es_endto" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_breakfrom" => array('db_attributes' => array("NUMERIC", "TIME")),
		"es_breakto" => array('db_attributes' => array("NUMERIC", "TIME")),
		"es_lunchfrom" => array('db_attributes' => array("NUMERIC", "TIME")),
		"es_lunchto" => array('db_attributes' => array("NUMERIC", "TIME")),
		"es_duration" => array('db_attributes' => array("NUMERIC", "TIME")),
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
	
	function es_timetable($es_class='', $es_m1='', $es_m2='', $es_m3='', $es_m4='', $es_m5='', $es_m6='', $es_m7='', $es_m8='', $es_m9='', $es_subject='', $es_staffid='', $es_t1='', $es_t2='', $es_t3='', $es_t4='', $es_t5='', $es_t6='', $es_t7='', $es_t8='', $es_t9='', $es_w1='', $es_w2='', $es_w3='', $es_w4='', $es_w5='', $es_w6='', $es_w7='', $es_w8='', $es_w9='', $es_th1='', $es_th2='', $es_th3='', $es_th4='', $es_th5='', $es_th6='', $es_th7='', $es_th8='', $es_th9='', $es_f1='', $es_f2='', $es_f3='', $es_f4='', $es_f5='', $es_f6='', $es_f7='', $es_f8='', $es_f9='', $es_s1='', $es_s2='', $es_s3='', $es_s4='', $es_s5='', $es_s6='', $es_s7='', $es_s8='', $es_s9='', $es_startfrom='', $es_endto='', $es_breakfrom='', $es_breakto='', $es_lunchfrom='', $es_lunchto='', $es_duration='')
	{
		$this->es_class = $es_class;
		$this->es_m1 = $es_m1;
		$this->es_m2 = $es_m2;
		$this->es_m3 = $es_m3;
		$this->es_m4 = $es_m4;
		$this->es_m5 = $es_m5;
		$this->es_m6 = $es_m6;
		$this->es_m7 = $es_m7;
		$this->es_m8 = $es_m8;
		$this->es_m9 = $es_m9;
		$this->es_subject = $es_subject;
		$this->es_staffid = $es_staffid;
		$this->es_t1 = $es_t1;
		$this->es_t2 = $es_t2;
		$this->es_t3 = $es_t3;
		$this->es_t4 = $es_t4;
		$this->es_t5 = $es_t5;
		$this->es_t6 = $es_t6;
		$this->es_t7 = $es_t7;
		$this->es_t8 = $es_t8;
		$this->es_t9 = $es_t9;
		$this->es_w1 = $es_w1;
		$this->es_w2 = $es_w2;
		$this->es_w3 = $es_w3;
		$this->es_w4 = $es_w4;
		$this->es_w5 = $es_w5;
		$this->es_w6 = $es_w6;
		$this->es_w7 = $es_w7;
		$this->es_w8 = $es_w8;
		$this->es_w9 = $es_w9;
		$this->es_th1 = $es_th1;
		$this->es_th2 = $es_th2;
		$this->es_th3 = $es_th3;
		$this->es_th4 = $es_th4;
		$this->es_th5 = $es_th5;
		$this->es_th6 = $es_th6;
		$this->es_th7 = $es_th7;
		$this->es_th8 = $es_th8;
		$this->es_th9 = $es_th9;
		$this->es_f1 = $es_f1;
		$this->es_f2 = $es_f2;
		$this->es_f3 = $es_f3;
		$this->es_f4 = $es_f4;
		$this->es_f5 = $es_f5;
		$this->es_f6 = $es_f6;
		$this->es_f7 = $es_f7;
		$this->es_f8 = $es_f8;
		$this->es_f9 = $es_f9;
		$this->es_s1 = $es_s1;
		$this->es_s2 = $es_s2;
		$this->es_s3 = $es_s3;
		$this->es_s4 = $es_s4;
		$this->es_s5 = $es_s5;
		$this->es_s6 = $es_s6;
		$this->es_s7 = $es_s7;
		$this->es_s8 = $es_s8;
		$this->es_s9 = $es_s9;
		$this->es_startfrom = $es_startfrom;
		$this->es_endto = $es_endto;
		$this->es_breakfrom = $es_breakfrom;
		$this->es_breakto = $es_breakto;
		$this->es_lunchfrom = $es_lunchfrom;
		$this->es_lunchto = $es_lunchto;
		$this->es_duration = $es_duration;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_timetableId 
	* @return object $es_timetable
	*/
	function Get($es_timetableId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_timetable` where `es_timetableid`='".intval($es_timetableId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_timetableId = $row['es_timetableid'];
			$this->es_class = $this->Unescape($row['es_class']);
			$this->es_m1 = $this->Unescape($row['es_m1']);
			$this->es_m2 = $this->Unescape($row['es_m2']);
			$this->es_m3 = $this->Unescape($row['es_m3']);
			$this->es_m4 = $this->Unescape($row['es_m4']);
			$this->es_m5 = $this->Unescape($row['es_m5']);
			$this->es_m6 = $this->Unescape($row['es_m6']);
			$this->es_m7 = $this->Unescape($row['es_m7']);
			$this->es_m8 = $this->Unescape($row['es_m8']);
			$this->es_m9 = $this->Unescape($row['es_m9']);
			$this->es_subject = $this->Unescape($row['es_subject']);
			$this->es_staffid = $this->Unescape($row['es_staffid']);
			$this->es_t1 = $this->Unescape($row['es_t1']);
			$this->es_t2 = $this->Unescape($row['es_t2']);
			$this->es_t3 = $this->Unescape($row['es_t3']);
			$this->es_t4 = $this->Unescape($row['es_t4']);
			$this->es_t5 = $this->Unescape($row['es_t5']);
			$this->es_t6 = $this->Unescape($row['es_t6']);
			$this->es_t7 = $this->Unescape($row['es_t7']);
			$this->es_t8 = $this->Unescape($row['es_t8']);
			$this->es_t9 = $this->Unescape($row['es_t9']);
			$this->es_w1 = $this->Unescape($row['es_w1']);
			$this->es_w2 = $this->Unescape($row['es_w2']);
			$this->es_w3 = $this->Unescape($row['es_w3']);
			$this->es_w4 = $this->Unescape($row['es_w4']);
			$this->es_w5 = $this->Unescape($row['es_w5']);
			$this->es_w6 = $this->Unescape($row['es_w6']);
			$this->es_w7 = $this->Unescape($row['es_w7']);
			$this->es_w8 = $this->Unescape($row['es_w8']);
			$this->es_w9 = $this->Unescape($row['es_w9']);
			$this->es_th1 = $this->Unescape($row['es_th1']);
			$this->es_th2 = $this->Unescape($row['es_th2']);
			$this->es_th3 = $this->Unescape($row['es_th3']);
			$this->es_th4 = $this->Unescape($row['es_th4']);
			$this->es_th5 = $this->Unescape($row['es_th5']);
			$this->es_th6 = $this->Unescape($row['es_th6']);
			$this->es_th7 = $this->Unescape($row['es_th7']);
			$this->es_th8 = $this->Unescape($row['es_th8']);
			$this->es_th9 = $this->Unescape($row['es_th9']);
			$this->es_f1 = $this->Unescape($row['es_f1']);
			$this->es_f2 = $this->Unescape($row['es_f2']);
			$this->es_f3 = $this->Unescape($row['es_f3']);
			$this->es_f4 = $this->Unescape($row['es_f4']);
			$this->es_f5 = $this->Unescape($row['es_f5']);
			$this->es_f6 = $this->Unescape($row['es_f6']);
			$this->es_f7 = $this->Unescape($row['es_f7']);
			$this->es_f8 = $this->Unescape($row['es_f8']);
			$this->es_f9 = $this->Unescape($row['es_f9']);
			$this->es_s1 = $this->Unescape($row['es_s1']);
			$this->es_s2 = $this->Unescape($row['es_s2']);
			$this->es_s3 = $this->Unescape($row['es_s3']);
			$this->es_s4 = $this->Unescape($row['es_s4']);
			$this->es_s5 = $this->Unescape($row['es_s5']);
			$this->es_s6 = $this->Unescape($row['es_s6']);
			$this->es_s7 = $this->Unescape($row['es_s7']);
			$this->es_s8 = $this->Unescape($row['es_s8']);
			$this->es_s9 = $this->Unescape($row['es_s9']);
			$this->es_startfrom = $row['es_startfrom'];
			$this->es_endto = $this->Unescape($row['es_endto']);
			$this->es_breakfrom = $row['es_breakfrom'];
			$this->es_breakto = $row['es_breakto'];
			$this->es_lunchfrom = $row['es_lunchfrom'];
			$this->es_lunchto = $row['es_lunchto'];
			$this->es_duration = $row['es_duration'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_timetableList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_timetable` ";
		$es_timetableList = Array();
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
			$sortBy = "es_timetableid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_timetable = new $thisObjectName();
			$es_timetable->es_timetableId = $row['es_timetableid'];
			$es_timetable->es_class = $this->Unescape($row['es_class']);
			$es_timetable->es_m1 = $this->Unescape($row['es_m1']);
			$es_timetable->es_m2 = $this->Unescape($row['es_m2']);
			$es_timetable->es_m3 = $this->Unescape($row['es_m3']);
			$es_timetable->es_m4 = $this->Unescape($row['es_m4']);
			$es_timetable->es_m5 = $this->Unescape($row['es_m5']);
			$es_timetable->es_m6 = $this->Unescape($row['es_m6']);
			$es_timetable->es_m7 = $this->Unescape($row['es_m7']);
			$es_timetable->es_m8 = $this->Unescape($row['es_m8']);
			$es_timetable->es_m9 = $this->Unescape($row['es_m9']);
			$es_timetable->es_subject = $this->Unescape($row['es_subject']);
			$es_timetable->es_staffid = $this->Unescape($row['es_staffid']);
			$es_timetable->es_t1 = $this->Unescape($row['es_t1']);
			$es_timetable->es_t2 = $this->Unescape($row['es_t2']);
			$es_timetable->es_t3 = $this->Unescape($row['es_t3']);
			$es_timetable->es_t4 = $this->Unescape($row['es_t4']);
			$es_timetable->es_t5 = $this->Unescape($row['es_t5']);
			$es_timetable->es_t6 = $this->Unescape($row['es_t6']);
			$es_timetable->es_t7 = $this->Unescape($row['es_t7']);
			$es_timetable->es_t8 = $this->Unescape($row['es_t8']);
			$es_timetable->es_t9 = $this->Unescape($row['es_t9']);
			$es_timetable->es_w1 = $this->Unescape($row['es_w1']);
			$es_timetable->es_w2 = $this->Unescape($row['es_w2']);
			$es_timetable->es_w3 = $this->Unescape($row['es_w3']);
			$es_timetable->es_w4 = $this->Unescape($row['es_w4']);
			$es_timetable->es_w5 = $this->Unescape($row['es_w5']);
			$es_timetable->es_w6 = $this->Unescape($row['es_w6']);
			$es_timetable->es_w7 = $this->Unescape($row['es_w7']);
			$es_timetable->es_w8 = $this->Unescape($row['es_w8']);
			$es_timetable->es_w9 = $this->Unescape($row['es_w9']);
			$es_timetable->es_th1 = $this->Unescape($row['es_th1']);
			$es_timetable->es_th2 = $this->Unescape($row['es_th2']);
			$es_timetable->es_th3 = $this->Unescape($row['es_th3']);
			$es_timetable->es_th4 = $this->Unescape($row['es_th4']);
			$es_timetable->es_th5 = $this->Unescape($row['es_th5']);
			$es_timetable->es_th6 = $this->Unescape($row['es_th6']);
			$es_timetable->es_th7 = $this->Unescape($row['es_th7']);
			$es_timetable->es_th8 = $this->Unescape($row['es_th8']);
			$es_timetable->es_th9 = $this->Unescape($row['es_th9']);
			$es_timetable->es_f1 = $this->Unescape($row['es_f1']);
			$es_timetable->es_f2 = $this->Unescape($row['es_f2']);
			$es_timetable->es_f3 = $this->Unescape($row['es_f3']);
			$es_timetable->es_f4 = $this->Unescape($row['es_f4']);
			$es_timetable->es_f5 = $this->Unescape($row['es_f5']);
			$es_timetable->es_f6 = $this->Unescape($row['es_f6']);
			$es_timetable->es_f7 = $this->Unescape($row['es_f7']);
			$es_timetable->es_f8 = $this->Unescape($row['es_f8']);
			$es_timetable->es_f9 = $this->Unescape($row['es_f9']);
			$es_timetable->es_s1 = $this->Unescape($row['es_s1']);
			$es_timetable->es_s2 = $this->Unescape($row['es_s2']);
			$es_timetable->es_s3 = $this->Unescape($row['es_s3']);
			$es_timetable->es_s4 = $this->Unescape($row['es_s4']);
			$es_timetable->es_s5 = $this->Unescape($row['es_s5']);
			$es_timetable->es_s6 = $this->Unescape($row['es_s6']);
			$es_timetable->es_s7 = $this->Unescape($row['es_s7']);
			$es_timetable->es_s8 = $this->Unescape($row['es_s8']);
			$es_timetable->es_s9 = $this->Unescape($row['es_s9']);
			$es_timetable->es_startfrom = $row['es_startfrom'];
			$es_timetable->es_endto = $this->Unescape($row['es_endto']);
			$es_timetable->es_breakfrom = $row['es_breakfrom'];
			$es_timetable->es_breakto = $row['es_breakto'];
			$es_timetable->es_lunchfrom = $row['es_lunchfrom'];
			$es_timetable->es_lunchto = $row['es_lunchto'];
			$es_timetable->es_duration = $row['es_duration'];
			$es_timetableList[] = $es_timetable;
		}
		return $es_timetableList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_timetableId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_timetableid` from `es_timetable` where `es_timetableid`='".$this->es_timetableId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_timetable` set 
			`es_class`='".$this->Escape($this->es_class)."', 
			`es_m1`='".$this->Escape($this->es_m1)."', 
			`es_m2`='".$this->Escape($this->es_m2)."', 
			`es_m3`='".$this->Escape($this->es_m3)."', 
			`es_m4`='".$this->Escape($this->es_m4)."', 
			`es_m5`='".$this->Escape($this->es_m5)."', 
			`es_m6`='".$this->Escape($this->es_m6)."', 
			`es_m7`='".$this->Escape($this->es_m7)."', 
			`es_m8`='".$this->Escape($this->es_m8)."', 
			`es_m9`='".$this->Escape($this->es_m9)."', 
			`es_subject`='".$this->Escape($this->es_subject)."', 
			`es_staffid`='".$this->Escape($this->es_staffid)."', 
			`es_t1`='".$this->Escape($this->es_t1)."', 
			`es_t2`='".$this->Escape($this->es_t2)."', 
			`es_t3`='".$this->Escape($this->es_t3)."', 
			`es_t4`='".$this->Escape($this->es_t4)."', 
			`es_t5`='".$this->Escape($this->es_t5)."', 
			`es_t6`='".$this->Escape($this->es_t6)."', 
			`es_t7`='".$this->Escape($this->es_t7)."', 
			`es_t8`='".$this->Escape($this->es_t8)."', 
			`es_t9`='".$this->Escape($this->es_t9)."', 
			`es_w1`='".$this->Escape($this->es_w1)."', 
			`es_w2`='".$this->Escape($this->es_w2)."', 
			`es_w3`='".$this->Escape($this->es_w3)."', 
			`es_w4`='".$this->Escape($this->es_w4)."', 
			`es_w5`='".$this->Escape($this->es_w5)."', 
			`es_w6`='".$this->Escape($this->es_w6)."', 
			`es_w7`='".$this->Escape($this->es_w7)."', 
			`es_w8`='".$this->Escape($this->es_w8)."', 
			`es_w9`='".$this->Escape($this->es_w9)."', 
			`es_th1`='".$this->Escape($this->es_th1)."', 
			`es_th2`='".$this->Escape($this->es_th2)."', 
			`es_th3`='".$this->Escape($this->es_th3)."', 
			`es_th4`='".$this->Escape($this->es_th4)."', 
			`es_th5`='".$this->Escape($this->es_th5)."', 
			`es_th6`='".$this->Escape($this->es_th6)."', 
			`es_th7`='".$this->Escape($this->es_th7)."', 
			`es_th8`='".$this->Escape($this->es_th8)."', 
			`es_th9`='".$this->Escape($this->es_th9)."', 
			`es_f1`='".$this->Escape($this->es_f1)."', 
			`es_f2`='".$this->Escape($this->es_f2)."', 
			`es_f3`='".$this->Escape($this->es_f3)."', 
			`es_f4`='".$this->Escape($this->es_f4)."', 
			`es_f5`='".$this->Escape($this->es_f5)."', 
			`es_f6`='".$this->Escape($this->es_f6)."', 
			`es_f7`='".$this->Escape($this->es_f7)."', 
			`es_f8`='".$this->Escape($this->es_f8)."', 
			`es_f9`='".$this->Escape($this->es_f9)."', 
			`es_s1`='".$this->Escape($this->es_s1)."', 
			`es_s2`='".$this->Escape($this->es_s2)."', 
			`es_s3`='".$this->Escape($this->es_s3)."', 
			`es_s4`='".$this->Escape($this->es_s4)."', 
			`es_s5`='".$this->Escape($this->es_s5)."', 
			`es_s6`='".$this->Escape($this->es_s6)."', 
			`es_s7`='".$this->Escape($this->es_s7)."', 
			`es_s8`='".$this->Escape($this->es_s8)."', 
			`es_s9`='".$this->Escape($this->es_s9)."', 
			`es_startfrom`='".$this->es_startfrom."', 
			`es_endto`='".$this->Escape($this->es_endto)."', 
			`es_breakfrom`='".$this->es_breakfrom."', 
			`es_breakto`='".$this->es_breakto."', 
			`es_lunchfrom`='".$this->es_lunchfrom."', 
			`es_lunchto`='".$this->es_lunchto."', 
			`es_duration`='".$this->es_duration."' where `es_timetableid`='".$this->es_timetableId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_timetable` (`es_class`, `es_m1`, `es_m2`, `es_m3`, `es_m4`, `es_m5`, `es_m6`, `es_m7`, `es_m8`, `es_m9`, `es_subject`, `es_staffid`, `es_t1`, `es_t2`, `es_t3`, `es_t4`, `es_t5`, `es_t6`, `es_t7`, `es_t8`, `es_t9`, `es_w1`, `es_w2`, `es_w3`, `es_w4`, `es_w5`, `es_w6`, `es_w7`, `es_w8`, `es_w9`, `es_th1`, `es_th2`, `es_th3`, `es_th4`, `es_th5`, `es_th6`, `es_th7`, `es_th8`, `es_th9`, `es_f1`, `es_f2`, `es_f3`, `es_f4`, `es_f5`, `es_f6`, `es_f7`, `es_f8`, `es_f9`, `es_s1`, `es_s2`, `es_s3`, `es_s4`, `es_s5`, `es_s6`, `es_s7`, `es_s8`, `es_s9`, `es_startfrom`, `es_endto`, `es_breakfrom`, `es_breakto`, `es_lunchfrom`, `es_lunchto`, `es_duration` ) values (
			'".$this->Escape($this->es_class)."', 
			'".$this->Escape($this->es_m1)."', 
			'".$this->Escape($this->es_m2)."', 
			'".$this->Escape($this->es_m3)."', 
			'".$this->Escape($this->es_m4)."', 
			'".$this->Escape($this->es_m5)."', 
			'".$this->Escape($this->es_m6)."', 
			'".$this->Escape($this->es_m7)."', 
			'".$this->Escape($this->es_m8)."', 
			'".$this->Escape($this->es_m9)."', 
			'".$this->Escape($this->es_subject)."', 
			'".$this->Escape($this->es_staffid)."', 
			'".$this->Escape($this->es_t1)."', 
			'".$this->Escape($this->es_t2)."', 
			'".$this->Escape($this->es_t3)."', 
			'".$this->Escape($this->es_t4)."', 
			'".$this->Escape($this->es_t5)."', 
			'".$this->Escape($this->es_t6)."', 
			'".$this->Escape($this->es_t7)."', 
			'".$this->Escape($this->es_t8)."', 
			'".$this->Escape($this->es_t9)."', 
			'".$this->Escape($this->es_w1)."', 
			'".$this->Escape($this->es_w2)."', 
			'".$this->Escape($this->es_w3)."', 
			'".$this->Escape($this->es_w4)."', 
			'".$this->Escape($this->es_w5)."', 
			'".$this->Escape($this->es_w6)."', 
			'".$this->Escape($this->es_w7)."', 
			'".$this->Escape($this->es_w8)."', 
			'".$this->Escape($this->es_w9)."', 
			'".$this->Escape($this->es_th1)."', 
			'".$this->Escape($this->es_th2)."', 
			'".$this->Escape($this->es_th3)."', 
			'".$this->Escape($this->es_th4)."', 
			'".$this->Escape($this->es_th5)."', 
			'".$this->Escape($this->es_th6)."', 
			'".$this->Escape($this->es_th7)."', 
			'".$this->Escape($this->es_th8)."', 
			'".$this->Escape($this->es_th9)."', 
			'".$this->Escape($this->es_f1)."', 
			'".$this->Escape($this->es_f2)."', 
			'".$this->Escape($this->es_f3)."', 
			'".$this->Escape($this->es_f4)."', 
			'".$this->Escape($this->es_f5)."', 
			'".$this->Escape($this->es_f6)."', 
			'".$this->Escape($this->es_f7)."', 
			'".$this->Escape($this->es_f8)."', 
			'".$this->Escape($this->es_f9)."', 
			'".$this->Escape($this->es_s1)."', 
			'".$this->Escape($this->es_s2)."', 
			'".$this->Escape($this->es_s3)."', 
			'".$this->Escape($this->es_s4)."', 
			'".$this->Escape($this->es_s5)."', 
			'".$this->Escape($this->es_s6)."', 
			'".$this->Escape($this->es_s7)."', 
			'".$this->Escape($this->es_s8)."', 
			'".$this->Escape($this->es_s9)."', 
			'".$this->es_startfrom."', 
			'".$this->Escape($this->es_endto)."', 
			'".$this->es_breakfrom."', 
			'".$this->es_breakto."', 
			'".$this->es_lunchfrom."', 
			'".$this->es_lunchto."', 
			'".$this->es_duration."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_timetableId == "")
		{
			$this->es_timetableId = $insertId;
		}
		return $this->es_timetableId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_timetableId
	*/
	function SaveNew()
	{
		$this->es_timetableId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_timetable` where `es_timetableid`='".$this->es_timetableId."'";
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
			$pog_query = "delete from `es_timetable` where ";
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