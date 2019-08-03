<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_enquiry` (
	`es_enquiryid` int(11) NOT NULL auto_increment,
	`eq_serialno` INT NOT NULL,
	`eq_createdon` DATE NOT NULL,
	`eq_name` VARCHAR(255) NOT NULL,
	`eq_address` VARCHAR(255) NOT NULL,
	`eq_city` VARCHAR(255) NOT NULL,
	`eq_wardname` VARCHAR(255) NOT NULL,
	`eq_sex` VARCHAR(255) NOT NULL,
	`eq_class` VARCHAR(255) NOT NULL,
	`eq_phno` INT NOT NULL,
	`eq_mobile` INT NOT NULL,
	`eq_emailid` VARCHAR(255) NOT NULL,
	`eq_reftype` VARCHAR(255) NOT NULL,
	`eq_refname` VARCHAR(255) NOT NULL,
	`eq_description` VARCHAR(255) NOT NULL,
	`eq_formtype` VARCHAR(255) NOT NULL,
	`eq_paymode` VARCHAR(255) NOT NULL,
	`eq_chequeno` VARCHAR(255) NOT NULL,
	`eq_bankname` VARCHAR(255) NOT NULL,
	`eq_submitedon` DATE NOT NULL,
	`eq_acadamic` VARCHAR(255) NOT NULL,
	`eq_marksobtain` INT NOT NULL,
	`eq_outof` INT NOT NULL,
	`eq_oralexam` VARCHAR(255) NOT NULL,
	`eq_familyinteraction` VARCHAR(255) NOT NULL,
	`eq_percentage` DOUBLE NOT NULL,
	`eq_result` VARCHAR(255) NOT NULL,
	`eq_amountpaid` VARCHAR(255) NOT NULL,
	`eq_state` VARCHAR(255) NOT NULL,
	`es_preadmissionid` INT NOT NULL, PRIMARY KEY  (`es_enquiryid`)) ENGINE=MyISAM;
*/

/**
* <b>es_enquiry</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_enquiry&attributeList=array+%28%0A++0+%3D%3E+%27eq_serialno%27%2C%0A++1+%3D%3E+%27eq_createdon%27%2C%0A++2+%3D%3E+%27eq_name%27%2C%0A++3+%3D%3E+%27eq_address%27%2C%0A++4+%3D%3E+%27eq_city%27%2C%0A++5+%3D%3E+%27eq_wardname%27%2C%0A++6+%3D%3E+%27eq_sex%27%2C%0A++7+%3D%3E+%27eq_class%27%2C%0A++8+%3D%3E+%27eq_phno%27%2C%0A++9+%3D%3E+%27eq_mobile%27%2C%0A++10+%3D%3E+%27eq_emailid%27%2C%0A++11+%3D%3E+%27eq_reftype%27%2C%0A++12+%3D%3E+%27eq_refname%27%2C%0A++13+%3D%3E+%27eq_description%27%2C%0A++14+%3D%3E+%27eq_formtype%27%2C%0A++15+%3D%3E+%27eq_paymode%27%2C%0A++16+%3D%3E+%27eq_chequeno%27%2C%0A++17+%3D%3E+%27eq_bankname%27%2C%0A++18+%3D%3E+%27eq_submitedon%27%2C%0A++19+%3D%3E+%27eq_acadamic%27%2C%0A++20+%3D%3E+%27eq_marksobtain%27%2C%0A++21+%3D%3E+%27eq_outof%27%2C%0A++22+%3D%3E+%27eq_oralexam%27%2C%0A++23+%3D%3E+%27eq_familyinteraction%27%2C%0A++24+%3D%3E+%27eq_percentage%27%2C%0A++25+%3D%3E+%27eq_result%27%2C%0A++26+%3D%3E+%27eq_amountpaid%27%2C%0A++27+%3D%3E+%27eq_state%27%2C%0A++28+%3D%3E+%27es_preadmissionid%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27DATE%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27INT%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++14+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++15+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++16+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++17+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++18+%3D%3E+%27DATE%27%2C%0A++19+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++20+%3D%3E+%27INT%27%2C%0A++21+%3D%3E+%27INT%27%2C%0A++22+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++23+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++24+%3D%3E+%27DOUBLE%27%2C%0A++25+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++26+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++27+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++28+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_enquiry extends POG_Base
{
	public $es_enquiryId = '';

	/**
	 * @var INT
	 */
	public $eq_serialno;
	
	/**
	 * @var DATE
	 */
	public $eq_createdon;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_wardname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_sex;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_class;
	
	/**
	 * @var INT
	 */
	public $eq_phno;
	
	/**
	 * @var INT
	 */
	public $eq_mobile;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_emailid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_reftype;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_refname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_description;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_formtype;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_paymode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_chequeno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_bankname;
	
	/**
	 * @var DATE
	 */
	public $eq_submitedon;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_acadamic;
	
	/**
	 * @var INT
	 */
	public $eq_marksobtain;
	
	/**
	 * @var INT
	 */
	public $eq_outof;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_oralexam;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_familyinteraction;
	
	/**
	 * @var DOUBLE
	 */
	public $eq_percentage;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_result;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_amountpaid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $eq_state;
	
	/**
	 * @var INT
	 */
	public $es_preadmissionid;
	
	public $pog_attribute_type = array(
		"es_enquiryId" => array('db_attributes' => array("NUMERIC", "INT")),
		"eq_serialno" => array('db_attributes' => array("NUMERIC", "INT")),
		"eq_createdon" => array('db_attributes' => array("NUMERIC", "DATE")),
		"eq_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_address" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_wardname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_sex" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_phno" => array('db_attributes' => array("NUMERIC", "INT")),
		"eq_mobile" => array('db_attributes' => array("NUMERIC", "INT")),
		"eq_emailid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_reftype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_refname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_description" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_formtype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_paymode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_chequeno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_bankname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_submitedon" => array('db_attributes' => array("NUMERIC", "DATE")),
		"eq_acadamic" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_marksobtain" => array('db_attributes' => array("NUMERIC", "INT")),
		"eq_outof" => array('db_attributes' => array("NUMERIC", "INT")),
		"eq_oralexam" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_familyinteraction" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_percentage" => array('db_attributes' => array("NUMERIC", "DOUBLE")),
		"eq_result" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_amountpaid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"eq_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_preadmissionid" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_enquiry($eq_serialno='', $eq_createdon='', $eq_name='', $eq_address='', $eq_city='', $eq_wardname='', $eq_sex='', $eq_class='', $eq_phno='', $eq_mobile='', $eq_emailid='', $eq_reftype='', $eq_refname='', $eq_description='', $eq_formtype='', $eq_paymode='', $eq_chequeno='', $eq_bankname='', $eq_submitedon='', $eq_acadamic='', $eq_marksobtain='', $eq_outof='', $eq_oralexam='', $eq_familyinteraction='', $eq_percentage='', $eq_result='', $eq_amountpaid='', $eq_state='', $es_preadmissionid='')
	{
		$this->eq_serialno = $eq_serialno;
		$this->eq_createdon = $eq_createdon;
		$this->eq_name = $eq_name;
		$this->eq_address = $eq_address;
		$this->eq_city = $eq_city;
		$this->eq_wardname = $eq_wardname;
		$this->eq_sex = $eq_sex;
		$this->eq_class = $eq_class;
		$this->eq_phno = $eq_phno;
		$this->eq_mobile = $eq_mobile;
		$this->eq_emailid = $eq_emailid;
		$this->eq_reftype = $eq_reftype;
		$this->eq_refname = $eq_refname;
		$this->eq_description = $eq_description;
		$this->eq_formtype = $eq_formtype;
		$this->eq_paymode = $eq_paymode;
		$this->eq_chequeno = $eq_chequeno;
		$this->eq_bankname = $eq_bankname;
		$this->eq_submitedon = $eq_submitedon;
		$this->eq_acadamic = $eq_acadamic;
		$this->eq_marksobtain = $eq_marksobtain;
		$this->eq_outof = $eq_outof;
		$this->eq_oralexam = $eq_oralexam;
		$this->eq_familyinteraction = $eq_familyinteraction;
		$this->eq_percentage = $eq_percentage;
		$this->eq_result = $eq_result;
		$this->eq_amountpaid = $eq_amountpaid;
		$this->eq_state = $eq_state;
		$this->es_preadmissionid = $es_preadmissionid;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_enquiryId 
	* @return object $es_enquiry
	*/
	function Get($es_enquiryId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_enquiry` where `es_enquiryid`='".intval($es_enquiryId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_enquiryId = $row['es_enquiryid'];
			$this->eq_serialno = $this->Unescape($row['eq_serialno']);
			$this->eq_createdon = $row['eq_createdon'];
			$this->eq_name = $this->Unescape($row['eq_name']);
			$this->eq_address = $this->Unescape($row['eq_address']);
			$this->eq_city = $this->Unescape($row['eq_city']);
			$this->eq_wardname = $this->Unescape($row['eq_wardname']);
			$this->eq_sex = $this->Unescape($row['eq_sex']);
			$this->eq_class = $this->Unescape($row['eq_class']);
			$this->eq_phno = $this->Unescape($row['eq_phno']);
			$this->eq_mobile = $this->Unescape($row['eq_mobile']);
			$this->eq_emailid = $this->Unescape($row['eq_emailid']);
			$this->eq_reftype = $this->Unescape($row['eq_reftype']);
			$this->eq_refname = $this->Unescape($row['eq_refname']);
			$this->eq_description = $this->Unescape($row['eq_description']);
			$this->eq_formtype = $this->Unescape($row['eq_formtype']);
			$this->eq_paymode = $this->Unescape($row['eq_paymode']);
			$this->eq_chequeno = $this->Unescape($row['eq_chequeno']);
			$this->eq_bankname = $this->Unescape($row['eq_bankname']);
			$this->eq_submitedon = $row['eq_submitedon'];
			$this->eq_acadamic = $this->Unescape($row['eq_acadamic']);
			$this->eq_marksobtain = $this->Unescape($row['eq_marksobtain']);
			$this->eq_outof = $this->Unescape($row['eq_outof']);
			$this->eq_oralexam = $this->Unescape($row['eq_oralexam']);
			$this->eq_familyinteraction = $this->Unescape($row['eq_familyinteraction']);
			$this->eq_percentage = $this->Unescape($row['eq_percentage']);
			$this->eq_result = $this->Unescape($row['eq_result']);
			$this->eq_amountpaid = $this->Unescape($row['eq_amountpaid']);
			$this->eq_state = $this->Unescape($row['eq_state']);
			$this->es_preadmissionid = $this->Unescape($row['es_preadmissionid']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_enquiryList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_enquiry` ";
		$es_enquiryList = Array();
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
			$sortBy = "es_enquiryid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_enquiry = new $thisObjectName();
			$es_enquiry->es_enquiryId = $row['es_enquiryid'];
			$es_enquiry->eq_serialno = $this->Unescape($row['eq_serialno']);
			$es_enquiry->eq_createdon = $row['eq_createdon'];
			$es_enquiry->eq_name = $this->Unescape($row['eq_name']);
			$es_enquiry->eq_address = $this->Unescape($row['eq_address']);
			$es_enquiry->eq_city = $this->Unescape($row['eq_city']);
			$es_enquiry->eq_wardname = $this->Unescape($row['eq_wardname']);
			$es_enquiry->eq_sex = $this->Unescape($row['eq_sex']);
			$es_enquiry->eq_class = $this->Unescape($row['eq_class']);
			$es_enquiry->eq_phno = $this->Unescape($row['eq_phno']);
			$es_enquiry->eq_mobile = $this->Unescape($row['eq_mobile']);
			$es_enquiry->eq_emailid = $this->Unescape($row['eq_emailid']);
			$es_enquiry->eq_reftype = $this->Unescape($row['eq_reftype']);
			$es_enquiry->eq_refname = $this->Unescape($row['eq_refname']);
			$es_enquiry->eq_description = $this->Unescape($row['eq_description']);
			$es_enquiry->eq_formtype = $this->Unescape($row['eq_formtype']);
			$es_enquiry->eq_paymode = $this->Unescape($row['eq_paymode']);
			$es_enquiry->eq_chequeno = $this->Unescape($row['eq_chequeno']);
			$es_enquiry->eq_bankname = $this->Unescape($row['eq_bankname']);
			$es_enquiry->eq_submitedon = $row['eq_submitedon'];
			$es_enquiry->eq_acadamic = $this->Unescape($row['eq_acadamic']);
			$es_enquiry->eq_marksobtain = $this->Unescape($row['eq_marksobtain']);
			$es_enquiry->eq_outof = $this->Unescape($row['eq_outof']);
			$es_enquiry->eq_oralexam = $this->Unescape($row['eq_oralexam']);
			$es_enquiry->eq_familyinteraction = $this->Unescape($row['eq_familyinteraction']);
			$es_enquiry->eq_percentage = $this->Unescape($row['eq_percentage']);
			$es_enquiry->eq_result = $this->Unescape($row['eq_result']);
			$es_enquiry->eq_amountpaid = $this->Unescape($row['eq_amountpaid']);
			$es_enquiry->eq_state = $this->Unescape($row['eq_state']);
			$es_enquiry->es_preadmissionid = $this->Unescape($row['es_preadmissionid']);
			$es_enquiryList[] = $es_enquiry;
		}
		return $es_enquiryList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_enquiryId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_enquiryid` from `es_enquiry` where `es_enquiryid`='".$this->es_enquiryId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_enquiry` set 
			`eq_serialno`='".$this->Escape($this->eq_serialno)."', 
			`eq_createdon`='".$this->eq_createdon."', 
			`eq_name`='".$this->Escape($this->eq_name)."', 
			`eq_address`='".$this->Escape($this->eq_address)."', 
			`eq_city`='".$this->Escape($this->eq_city)."', 
			`eq_wardname`='".$this->Escape($this->eq_wardname)."', 
			`eq_sex`='".$this->Escape($this->eq_sex)."', 
			`eq_class`='".$this->Escape($this->eq_class)."', 
			`eq_phno`='".$this->Escape($this->eq_phno)."', 
			`eq_mobile`='".$this->Escape($this->eq_mobile)."', 
			`eq_emailid`='".$this->Escape($this->eq_emailid)."', 
			`eq_reftype`='".$this->Escape($this->eq_reftype)."', 
			`eq_refname`='".$this->Escape($this->eq_refname)."', 
			`eq_description`='".$this->Escape($this->eq_description)."', 
			`eq_formtype`='".$this->Escape($this->eq_formtype)."', 
			`eq_paymode`='".$this->Escape($this->eq_paymode)."', 
			`eq_chequeno`='".$this->Escape($this->eq_chequeno)."', 
			`eq_bankname`='".$this->Escape($this->eq_bankname)."', 
			`eq_submitedon`='".$this->eq_submitedon."', 
			`eq_acadamic`='".$this->Escape($this->eq_acadamic)."', 
			`eq_marksobtain`='".$this->Escape($this->eq_marksobtain)."', 
			`eq_outof`='".$this->Escape($this->eq_outof)."', 
			`eq_oralexam`='".$this->Escape($this->eq_oralexam)."', 
			`eq_familyinteraction`='".$this->Escape($this->eq_familyinteraction)."', 
			`eq_percentage`='".$this->Escape($this->eq_percentage)."', 
			`eq_result`='".$this->Escape($this->eq_result)."', 
			`eq_amountpaid`='".$this->Escape($this->eq_amountpaid)."', 
			`eq_state`='".$this->Escape($this->eq_state)."', 
			`es_preadmissionid`='".$this->Escape($this->es_preadmissionid)."' where `es_enquiryid`='".$this->es_enquiryId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_enquiry` (`eq_serialno`, `eq_createdon`, `eq_name`, `eq_address`, `eq_city`, `eq_wardname`, `eq_sex`, `eq_class`, `eq_phno`, `eq_mobile`, `eq_emailid`, `eq_reftype`, `eq_refname`, `eq_description`, `eq_formtype`, `eq_paymode`, `eq_chequeno`, `eq_bankname`, `eq_submitedon`, `eq_acadamic`, `eq_marksobtain`, `eq_outof`, `eq_oralexam`, `eq_familyinteraction`, `eq_percentage`, `eq_result`, `eq_amountpaid`, `eq_state`, `es_preadmissionid` ) values (
			'".$this->Escape($this->eq_serialno)."', 
			'".$this->eq_createdon."', 
			'".$this->Escape($this->eq_name)."', 
			'".$this->Escape($this->eq_address)."', 
			'".$this->Escape($this->eq_city)."', 
			'".$this->Escape($this->eq_wardname)."', 
			'".$this->Escape($this->eq_sex)."', 
			'".$this->Escape($this->eq_class)."', 
			'".$this->Escape($this->eq_phno)."', 
			'".$this->Escape($this->eq_mobile)."', 
			'".$this->Escape($this->eq_emailid)."', 
			'".$this->Escape($this->eq_reftype)."', 
			'".$this->Escape($this->eq_refname)."', 
			'".$this->Escape($this->eq_description)."', 
			'".$this->Escape($this->eq_formtype)."', 
			'".$this->Escape($this->eq_paymode)."', 
			'".$this->Escape($this->eq_chequeno)."', 
			'".$this->Escape($this->eq_bankname)."', 
			'".$this->eq_submitedon."', 
			'".$this->Escape($this->eq_acadamic)."', 
			'".$this->Escape($this->eq_marksobtain)."', 
			'".$this->Escape($this->eq_outof)."', 
			'".$this->Escape($this->eq_oralexam)."', 
			'".$this->Escape($this->eq_familyinteraction)."', 
			'".$this->Escape($this->eq_percentage)."', 
			'".$this->Escape($this->eq_result)."', 
			'".$this->Escape($this->eq_amountpaid)."', 
			'".$this->Escape($this->eq_state)."', 
			'".$this->Escape($this->es_preadmissionid)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_enquiryId == "")
		{
			$this->es_enquiryId = $insertId;
		}
		return $this->es_enquiryId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_enquiryId
	*/
	function SaveNew()
	{
		$this->es_enquiryId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_enquiry` where `es_enquiryid`='".$this->es_enquiryId."'";
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
			$pog_query = "delete from `es_enquiry` where ";
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