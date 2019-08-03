<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_addstaff` (
	`es_addstaffid` int(11) NOT NULL auto_increment,
	`tbl_varchar_teachername` VARCHAR(255) NOT NULL,
	`tbl_varchar_gender` VARCHAR(255) NOT NULL,
	`tbl_date_dob` DATE NOT NULL,
	`tbl_varchar_designation` VARCHAR(255) NOT NULL,
	`tbl_varchar_primarysubject` VARCHAR(255) NOT NULL,
	`tbl_varcahr_secondrysubject` VARCHAR(255) NOT NULL,
	`tbl_varchar_fathus` VARCHAR(255) NOT NULL,
	`tbl_varchar_exampassed` VARCHAR(255) NOT NULL,
	`tbl_varchar_university` VARCHAR(255) NOT NULL,
	`tbl_varchar_year` VARCHAR(255) NOT NULL,
	`tbl_varchar_experience` VARCHAR(255) NOT NULL,
	`tbl_int_noofdughters` VARCHAR(255) NOT NULL,
	`tbl_int_noofsons` VARCHAR(255) NOT NULL,
	`tbl_varchar_presentadress` VARCHAR(255) NOT NULL,
	`tbl_varchar_city` VARCHAR(255) NOT NULL,
	`tbl_varchar_state` VARCHAR(255) NOT NULL,
	`tbl_varchar_country` VARCHAR(255) NOT NULL,
	`tbl_varchar_zipcode` VARCHAR(255) NOT NULL,
	`tbl_varchar_residenceno` VARCHAR(255) NOT NULL,
	`tbl_varchar_mobileno` VARCHAR(255) NOT NULL,
	`tbl_varchar_email` VARCHAR(255) NOT NULL,
	`tbl_varchar_parmanent adress` VARCHAR(255) NOT NULL,
	`tbl_varchar_city1` VARCHAR(255) NOT NULL,
	`tbl_varchar_state1` VARCHAR(255) NOT NULL,
	`tbl_varchar_contry1` VARCHAR(255) NOT NULL,
	`tbl_varchar_zipcode1` VARCHAR(255) NOT NULL,
	`tbl_varchar_previousemp` VARCHAR(255) NOT NULL,
	`tbl_varchar_instiname` VARCHAR(255) NOT NULL,
	`tbl_varchar_period` VARCHAR(255) NOT NULL,
	`tbl_varchar_designation1` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_addstaffid`)) ENGINE=MyISAM;
*/

/**
* <b>es_addstaff</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_addstaff&attributeList=array+%28%0A++0+%3D%3E+%27tbl_varchar_teachername%27%2C%0A++1+%3D%3E+%27tbl_varchar_gender%27%2C%0A++2+%3D%3E+%27tbl_date_dob%27%2C%0A++3+%3D%3E+%27tbl_varchar_designation%27%2C%0A++4+%3D%3E+%27tbl_varchar_primarysubject%27%2C%0A++5+%3D%3E+%27tbl_varcahr_secondrysubject%27%2C%0A++6+%3D%3E+%27tbl_varchar_fathus%27%2C%0A++7+%3D%3E+%27tbl_varchar_exampassed%27%2C%0A++8+%3D%3E+%27tbl_varchar_university%27%2C%0A++9+%3D%3E+%27tbl_varchar_year%27%2C%0A++10+%3D%3E+%27tbl_varchar_experience%27%2C%0A++11+%3D%3E+%27tbl_int_noofdughters%27%2C%0A++12+%3D%3E+%27tbl_int_noofsons%27%2C%0A++13+%3D%3E+%27tbl_varchar_presentadress%27%2C%0A++14+%3D%3E+%27tbl_varchar_city%27%2C%0A++15+%3D%3E+%27tbl_varchar_state%27%2C%0A++16+%3D%3E+%27tbl_varchar_country%27%2C%0A++17+%3D%3E+%27tbl_varchar_zipcode%27%2C%0A++18+%3D%3E+%27%27%2C%0A++19+%3D%3E+%27tbl_varchar_residenceno%27%2C%0A++20+%3D%3E+%27tbl_varchar_mobileno%27%2C%0A++21+%3D%3E+%27tbl_varchar_email%27%2C%0A++22+%3D%3E+%27tbl_varchar_parmanent+adress%27%2C%0A++23+%3D%3E+%27tbl_varchar_city1%27%2C%0A++24+%3D%3E+%27tbl_varchar_state1%27%2C%0A++25+%3D%3E+%27tbl_varchar_contry11%27%2C%0A++26+%3D%3E+%27tbl_varchar_zipcode1%27%2C%0A++27+%3D%3E+%27tbl_varchar_previousemp%27%2C%0A++28+%3D%3E+%27tbl_varchar_instiname%27%2C%0A++29+%3D%3E+%27tbl_varchar_period%27%2C%0A++30+%3D%3E+%27tbl_varchar_designation1%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++14+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++15+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++16+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++17+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++18+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++19+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++20+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++21+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++22+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++23+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++24+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++25+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++26+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++27+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++28+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++29+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++30+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_addstaff extends POG_Base
{
	public $es_addstaffId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_teachername;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_gender;
	
	/**
	 * @var DATE
	 */
	public $tbl_date_dob;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_designation;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_primarysubject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varcahr_secondrysubject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_fathus;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_exampassed;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_university;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_year;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_experience;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_int_noofdughters;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_int_noofsons;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_presentadress;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_state;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_country;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_zipcode;
	
	/**
	 * @var VARCHAR(255)
	 */
	
	public $tbl_varchar_residenceno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_mobileno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_email;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_parmanentadress;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_city1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_state1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_contry1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_zipcode1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_previousemp;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_instiname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_period;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tbl_varchar_designation1;
	
	public $pog_attribute_type = array(
		"es_addstaffId" => array('db_attributes' => array("NUMERIC", "INT")),
		"tbl_varchar_teachername" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_gender" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_date_dob" => array('db_attributes' => array("NUMERIC", "DATE")),
		"tbl_varchar_designation" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_primarysubject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varcahr_secondrysubject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_fathus" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_exampassed" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_university" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_year" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_experience" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_int_noofdughters" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_int_noofsons" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_presentadress" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_country" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_zipcode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_residenceno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_mobileno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_parmanentadress" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_city1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_state1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_contry1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_zipcode1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_previousemp" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_instiname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_period" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tbl_varchar_designation1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_addstaff($tbl_varchar_teachername='', $tbl_varchar_gender='', $tbl_date_dob='', $tbl_varchar_designation='', $tbl_varchar_primarysubject='', $tbl_varcahr_secondrysubject='', $tbl_varchar_fathus='', $tbl_varchar_exampassed='', $tbl_varchar_university='', $tbl_varchar_year='', $tbl_varchar_experience='', $tbl_int_noofdughters='', $tbl_int_noofsons='', $tbl_varchar_presentadress='', $tbl_varchar_city='', $tbl_varchar_state='', $tbl_varchar_country='', $tbl_varchar_zipcode='', $tbl_varchar_mobileno='', $tbl_varchar_email='', $tbl_varchar_parmanentadress='', $tbl_varchar_city1='', $tbl_varchar_state1='', $tbl_varchar_contry1='', $tbl_varchar_zipcode1='', $tbl_varchar_previousemp='', $tbl_varchar_instiname='', $tbl_varchar_period='', $tbl_varchar_designation1='')
	{
		$this->tbl_varchar_teachername = $tbl_varchar_teachername;
		$this->tbl_varchar_gender = $tbl_varchar_gender;
		$this->tbl_date_dob = $tbl_date_dob;
		$this->tbl_varchar_designation = $tbl_varchar_designation;
		$this->tbl_varchar_primarysubject = $tbl_varchar_primarysubject;
		$this->tbl_varcahr_secondrysubject = $tbl_varcahr_secondrysubject;
		$this->tbl_varchar_fathus = $tbl_varchar_fathus;
		$this->tbl_varchar_exampassed = $tbl_varchar_exampassed;
		$this->tbl_varchar_university = $tbl_varchar_university;
		$this->tbl_varchar_year = $tbl_varchar_year;
		$this->tbl_varchar_experience = $tbl_varchar_experience;
		$this->tbl_int_noofdughters = $tbl_int_noofdughters;
		$this->tbl_int_noofsons = $tbl_int_noofsons;
		$this->tbl_varchar_presentadress = $tbl_varchar_presentadress;
		$this->tbl_varchar_city = $tbl_varchar_city;
		$this->tbl_varchar_state = $tbl_varchar_state;
		$this->tbl_varchar_country = $tbl_varchar_country;
		$this->tbl_varchar_zipcode = $tbl_varchar_zipcode;
		$this->tbl_varchar_residenceno = $tbl_varchar_residenceno;
		$this->tbl_varchar_mobileno = $tbl_varchar_mobileno;
		$this->tbl_varchar_email = $tbl_varchar_email;
		$this->tbl_varchar_parmanentadress = $tbl_varchar_parmanentadress;
		$this->tbl_varchar_city1 = $tbl_varchar_city1;
		$this->tbl_varchar_state1 = $tbl_varchar_state1;
		$this->tbl_varchar_contry1 = $tbl_varchar_contry1;
		$this->tbl_varchar_zipcode1 = $tbl_varchar_zipcode1;
		$this->tbl_varchar_previousemp = $tbl_varchar_previousemp;
		$this->tbl_varchar_instiname = $tbl_varchar_instiname;
		$this->tbl_varchar_period = $tbl_varchar_period;
		$this->tbl_varchar_designation1 = $tbl_varchar_designation1;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_addstaffId 
	* @return object $es_addstaff
	*/
	function Get($es_addstaffId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_addstaff` where `es_addstaffid`='".intval($es_addstaffId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_addstaffId = $row['es_addstaffid'];
			$this->tbl_varchar_teachername = $this->Unescape($row['tbl_varchar_teachername']);
			$this->tbl_varchar_gender = $this->Unescape($row['tbl_varchar_gender']);
			$this->tbl_date_dob = $row['tbl_date_dob'];
			$this->tbl_varchar_designation = $this->Unescape($row['tbl_varchar_designation']);
			$this->tbl_varchar_primarysubject = $this->Unescape($row['tbl_varchar_primarysubject']);
			$this->tbl_varcahr_secondrysubject = $this->Unescape($row['tbl_varcahr_secondrysubject']);
			$this->tbl_varchar_fathus = $this->Unescape($row['tbl_varchar_fathus']);
			$this->tbl_varchar_exampassed = $this->Unescape($row['tbl_varchar_exampassed']);
			$this->tbl_varchar_university = $this->Unescape($row['tbl_varchar_university']);
			$this->tbl_varchar_year = $this->Unescape($row['tbl_varchar_year']);
			$this->tbl_varchar_experience = $this->Unescape($row['tbl_varchar_experience']);
			$this->tbl_int_noofdughters = $this->Unescape($row['tbl_int_noofdughters']);
			$this->tbl_int_noofsons = $this->Unescape($row['tbl_int_noofsons']);
			$this->tbl_varchar_presentadress = $this->Unescape($row['tbl_varchar_presentadress']);
			$this->tbl_varchar_city = $this->Unescape($row['tbl_varchar_city']);
			$this->tbl_varchar_state = $this->Unescape($row['tbl_varchar_state']);
			$this->tbl_varchar_country = $this->Unescape($row['tbl_varchar_country']);
			$this->tbl_varchar_zipcode = $this->Unescape($row['tbl_varchar_zipcode']);
			$this->tbl_varchar_residenceno = $this->Unescape($row['tbl_varchar_residenceno']);
			$this->tbl_varchar_mobileno = $this->Unescape($row['tbl_varchar_mobileno']);
			$this->tbl_varchar_email = $this->Unescape($row['tbl_varchar_email']);
			$this->tbl_varchar_parmanentadress = $this->Unescape($row['tbl_varchar_parmanentadress']);
			$this->tbl_varchar_city1 = $this->Unescape($row['tbl_varchar_city1']);
			$this->tbl_varchar_state1 = $this->Unescape($row['tbl_varchar_state1']);
			$this->tbl_varchar_contry1 = $this->Unescape($row['tbl_varchar_contry1']);
			$this->tbl_varchar_zipcode1 = $this->Unescape($row['tbl_varchar_zipcode1']);
			$this->tbl_varchar_previousemp = $this->Unescape($row['tbl_varchar_previousemp']);
			$this->tbl_varchar_instiname = $this->Unescape($row['tbl_varchar_instiname']);
			$this->tbl_varchar_period = $this->Unescape($row['tbl_varchar_period']);
			$this->tbl_varchar_designation1 = $this->Unescape($row['tbl_varchar_designation1']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_addstaffList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_addstaff` ";
		$es_addstaffList = Array();
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
			$sortBy = "es_addstaffid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_addstaff = new $thisObjectName();
			$es_addstaff->es_addstaffId = $row['es_addstaffid'];
			$es_addstaff->tbl_varchar_teachername = $this->Unescape($row['tbl_varchar_teachername']);
			$es_addstaff->tbl_varchar_gender = $this->Unescape($row['tbl_varchar_gender']);
			$es_addstaff->tbl_date_dob = $row['tbl_date_dob'];
			$es_addstaff->tbl_varchar_designation = $this->Unescape($row['tbl_varchar_designation']);
			$es_addstaff->tbl_varchar_primarysubject = $this->Unescape($row['tbl_varchar_primarysubject']);
			$es_addstaff->tbl_varcahr_secondrysubject = $this->Unescape($row['tbl_varcahr_secondrysubject']);
			$es_addstaff->tbl_varchar_fathus = $this->Unescape($row['tbl_varchar_fathus']);
			$es_addstaff->tbl_varchar_exampassed = $this->Unescape($row['tbl_varchar_exampassed']);
			$es_addstaff->tbl_varchar_university = $this->Unescape($row['tbl_varchar_university']);
			$es_addstaff->tbl_varchar_year = $this->Unescape($row['tbl_varchar_year']);
			$es_addstaff->tbl_varchar_experience = $this->Unescape($row['tbl_varchar_experience']);
			$es_addstaff->tbl_int_noofdughters = $this->Unescape($row['tbl_int_noofdughters']);
			$es_addstaff->tbl_int_noofsons = $this->Unescape($row['tbl_int_noofsons']);
			$es_addstaff->tbl_varchar_presentadress = $this->Unescape($row['tbl_varchar_presentadress']);
			$es_addstaff->tbl_varchar_city = $this->Unescape($row['tbl_varchar_city']);
			$es_addstaff->tbl_varchar_state = $this->Unescape($row['tbl_varchar_state']);
			$es_addstaff->tbl_varchar_country = $this->Unescape($row['tbl_varchar_country']);
			$es_addstaff->tbl_varchar_zipcode = $this->Unescape($row['tbl_varchar_zipcode']);
			$es_addstaff->tbl_varchar_residenceno = $this->Unescape($row['tbl_varchar_residenceno']);
			$es_addstaff->tbl_varchar_mobileno = $this->Unescape($row['tbl_varchar_mobileno']);
			$es_addstaff->tbl_varchar_email = $this->Unescape($row['tbl_varchar_email']);
			$es_addstaff->tbl_varchar_parmanentadress = $this->Unescape($row['tbl_varchar_parmanentadress']);
			$es_addstaff->tbl_varchar_city1 = $this->Unescape($row['tbl_varchar_city1']);
			$es_addstaff->tbl_varchar_state1 = $this->Unescape($row['tbl_varchar_state1']);
			$es_addstaff->tbl_varchar_contry1 = $this->Unescape($row['tbl_varchar_contry1']);
			$es_addstaff->tbl_varchar_zipcode1 = $this->Unescape($row['tbl_varchar_zipcode1']);
			$es_addstaff->tbl_varchar_previousemp = $this->Unescape($row['tbl_varchar_previousemp']);
			$es_addstaff->tbl_varchar_instiname = $this->Unescape($row['tbl_varchar_instiname']);
			$es_addstaff->tbl_varchar_period = $this->Unescape($row['tbl_varchar_period']);
			$es_addstaff->tbl_varchar_designation1 = $this->Unescape($row['tbl_varchar_designation1']);
			$es_addstaffList[] = $es_addstaff;
		}
		return $es_addstaffList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_addstaffId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_addstaffid` from `es_addstaff` where `es_addstaffid`='".$this->es_addstaffId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_addstaff` set 
			`tbl_varchar_teachername`='".$this->Escape($this->tbl_varchar_teachername)."', 
			`tbl_varchar_gender`='".$this->Escape($this->tbl_varchar_gender)."', 
			`tbl_date_dob`='".$this->tbl_date_dob."', 
			`tbl_varchar_designation`='".$this->Escape($this->tbl_varchar_designation)."', 
			`tbl_varchar_primarysubject`='".$this->Escape($this->tbl_varchar_primarysubject)."', 
			`tbl_varcahr_secondrysubject`='".$this->Escape($this->tbl_varcahr_secondrysubject)."', 
			`tbl_varchar_fathus`='".$this->Escape($this->tbl_varchar_fathus)."', 
			`tbl_varchar_exampassed`='".$this->Escape($this->tbl_varchar_exampassed)."', 
			`tbl_varchar_university`='".$this->Escape($this->tbl_varchar_university)."', 
			`tbl_varchar_year`='".$this->Escape($this->tbl_varchar_year)."', 
			`tbl_varchar_experience`='".$this->Escape($this->tbl_varchar_experience)."', 
			`tbl_int_noofdughters`='".$this->Escape($this->tbl_int_noofdughters)."', 
			`tbl_int_noofsons`='".$this->Escape($this->tbl_int_noofsons)."', 
			`tbl_varchar_presentadress`='".$this->Escape($this->tbl_varchar_presentadress)."', 
			`tbl_varchar_city`='".$this->Escape($this->tbl_varchar_city)."', 
			`tbl_varchar_state`='".$this->Escape($this->tbl_varchar_state)."', 
			`tbl_varchar_country`='".$this->Escape($this->tbl_varchar_country)."', 
			`tbl_varchar_zipcode`='".$this->Escape($this->tbl_varchar_zipcode)."', 
			`tbl_varchar_residenceno`='".$this->Escape($this->tbl_varchar_residenceno)."', 
			`tbl_varchar_mobileno`='".$this->Escape($this->tbl_varchar_mobileno)."', 
			`tbl_varchar_email`='".$this->Escape($this->tbl_varchar_email)."', 
			`tbl_varchar_parmanentadress`='".$this->Escape($this->tbl_varchar_parmanentadress)."', 
			`tbl_varchar_city1`='".$this->Escape($this->tbl_varchar_city1)."', 
			`tbl_varchar_state1`='".$this->Escape($this->tbl_varchar_state1)."', 
			`tbl_varchar_contry1`='".$this->Escape($this->tbl_varchar_contry1)."', 
			`tbl_varchar_zipcode1`='".$this->Escape($this->tbl_varchar_zipcode1)."', 
			`tbl_varchar_previousemp`='".$this->Escape($this->tbl_varchar_previousemp)."', 
			`tbl_varchar_instiname`='".$this->Escape($this->tbl_varchar_instiname)."', 
			`tbl_varchar_period`='".$this->Escape($this->tbl_varchar_period)."', 
			`tbl_varchar_designation1`='".$this->Escape($this->tbl_varchar_designation1)."' where `es_addstaffid`='".$this->es_addstaffId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_addstaff` (`tbl_varchar_teachername`, `tbl_varchar_gender`, `tbl_date_dob`, `tbl_varchar_designation`, `tbl_varchar_primarysubject`, `tbl_varcahr_secondrysubject`, `tbl_varchar_fathus`, `tbl_varchar_exampassed`, `tbl_varchar_university`, `tbl_varchar_year`, `tbl_varchar_experience`, `tbl_int_noofdughters`, `tbl_int_noofsons`, `tbl_varchar_presentadress`, `tbl_varchar_city`, `tbl_varchar_state`, `tbl_varchar_country`, `tbl_varchar_zipcode`,  `tbl_varchar_residenceno`, `tbl_varchar_mobileno`, `tbl_varchar_email`, `tbl_varchar_parmanent adress`, `tbl_varchar_city1`, `tbl_varchar_state1`, `tbl_varchar_contry1`, `tbl_varchar_zipcode1`, `tbl_varchar_previousemp`, `tbl_varchar_instiname`, `tbl_varchar_period`, `tbl_varchar_designation1` ) values (
			'".$this->Escape($this->tbl_varchar_teachername)."', 
			'".$this->Escape($this->tbl_varchar_gender)."', 
			'".$this->tbl_date_dob."', 
			'".$this->Escape($this->tbl_varchar_designation)."', 
			'".$this->Escape($this->tbl_varchar_primarysubject)."', 
			'".$this->Escape($this->tbl_varcahr_secondrysubject)."', 
			'".$this->Escape($this->tbl_varchar_fathus)."', 
			'".$this->Escape($this->tbl_varchar_exampassed)."', 
			'".$this->Escape($this->tbl_varchar_university)."', 
			'".$this->Escape($this->tbl_varchar_year)."', 
			'".$this->Escape($this->tbl_varchar_experience)."', 
			'".$this->Escape($this->tbl_int_noofdughters)."', 
			'".$this->Escape($this->tbl_int_noofsons)."', 
			'".$this->Escape($this->tbl_varchar_presentadress)."', 
			'".$this->Escape($this->tbl_varchar_city)."', 
			'".$this->Escape($this->tbl_varchar_state)."', 
			'".$this->Escape($this->tbl_varchar_country)."', 
			'".$this->Escape($this->tbl_varchar_zipcode)."', 
			'".$this->Escape($this->tbl_varchar_residenceno)."', 
			'".$this->Escape($this->tbl_varchar_mobileno)."', 
			'".$this->Escape($this->tbl_varchar_email)."', 
			'".$this->Escape($this->tbl_varchar_parmanentadress)."', 
			'".$this->Escape($this->tbl_varchar_city1)."', 
			'".$this->Escape($this->tbl_varchar_state1)."', 
			'".$this->Escape($this->tbl_varchar_contry1)."', 
			'".$this->Escape($this->tbl_varchar_zipcode1)."', 
			'".$this->Escape($this->tbl_varchar_previousemp)."', 
			'".$this->Escape($this->tbl_varchar_instiname)."', 
			'".$this->Escape($this->tbl_varchar_period)."', 
			'".$this->Escape($this->tbl_varchar_designation1)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_addstaffId == "")
		{
			$this->es_addstaffId = $insertId;
		}
		return $this->es_addstaffId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_addstaffId
	*/
	function SaveNew()
	{
		$this->es_addstaffId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_addstaff` where `es_addstaffid`='".$this->es_addstaffId."'";
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
			$pog_query = "delete from `es_addstaff` where ";
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