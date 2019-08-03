<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_security` (
	`es_securityid` int(11) NOT NULL auto_increment,
	`sec_name` VARCHAR(255) NOT NULL,
	`sec_address` VARCHAR(255) NOT NULL,
	`sec_contact_person` VARCHAR(255) NOT NULL,
	`sec_vehicle_no` VARCHAR(255) NOT NULL,
	`sec_purpose` VARCHAR(255) NOT NULL,
	`sec_mode_app` VARCHAR(255) NOT NULL,
	`sec_time_out` DATETIME NOT NULL,
	`sec_remarks` VARCHAR(255) NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL,
	`sec_time_in` DATETIME NOT NULL,
	`sec_colour` VARCHAR(255) NOT NULL,
	`sec_make_vehicle` VARCHAR(255) NOT NULL,
	`sec_reg_no` VARCHAR(255) NOT NULL,
	`sec_phone` VARCHAR(255) NOT NULL,
	`sec_mobile` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_securityid`)) ENGINE=MyISAM;
*/

/**
* <b>es_security</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_security&attributeList=array+%28%0A++0+%3D%3E+%27sec_name%27%2C%0A++1+%3D%3E+%27sec_address%27%2C%0A++2+%3D%3E+%27sec_contact_person%27%2C%0A++3+%3D%3E+%27sec_vehicle_no%27%2C%0A++4+%3D%3E+%27sec_purpose%27%2C%0A++5+%3D%3E+%27sec_mode_app%27%2C%0A++6+%3D%3E+%27sec_time_out%27%2C%0A++7+%3D%3E+%27sec_remarks%27%2C%0A++8+%3D%3E+%27status%27%2C%0A++9+%3D%3E+%27sec_time_in%27%2C%0A++10+%3D%3E+%27sec_colour%27%2C%0A++11+%3D%3E+%27sec_make_vehicle%27%2C%0A++12+%3D%3E+%27sec_reg_no%27%2C%0A++13+%3D%3E+%27sec_phone%27%2C%0A++14+%3D%3E+%27sec_mobile%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27DATETIME%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27enum%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%2C+%5C%27deleted%5C%27%29%27%2C%0A++9+%3D%3E+%27DATETIME%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++14+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_security extends POG_Base
{
	public $es_securityId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $sec_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_contact_person;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_vehicle_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_purpose;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_mode_app;
	
	/**
	 * @var DATETIME
	 */
	public $sec_time_out;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_remarks;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	/**
	 * @var DATETIME
	 */
	public $sec_time_in;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_colour;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_make_vehicle;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_reg_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_phone;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sec_mobile;
	
	public $pog_attribute_type = array(
		"es_securityId" => array('db_attributes' => array("NUMERIC", "INT")),
		"sec_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_address" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_contact_person" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_vehicle_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_purpose" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_mode_app" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_time_out" => array('db_attributes' => array("TEXT", "DATETIME")),
		"sec_remarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"sec_time_in" => array('db_attributes' => array("TEXT", "DATETIME")),
		"sec_colour" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_make_vehicle" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_reg_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_phone" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"sec_mobile" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_security($sec_name='', $sec_address='', $sec_contact_person='', $sec_vehicle_no='', $sec_purpose='', $sec_mode_app='', $sec_time_out='', $sec_remarks='', $status='', $sec_time_in='', $sec_colour='', $sec_make_vehicle='', $sec_reg_no='', $sec_phone='', $sec_mobile='')
	{
		$this->sec_name = $sec_name;
		$this->sec_address = $sec_address;
		$this->sec_contact_person = $sec_contact_person;
		$this->sec_vehicle_no = $sec_vehicle_no;
		$this->sec_purpose = $sec_purpose;
		$this->sec_mode_app = $sec_mode_app;
		$this->sec_time_out = $sec_time_out;
		$this->sec_remarks = $sec_remarks;
		$this->status = $status;
		$this->sec_time_in = $sec_time_in;
		$this->sec_colour = $sec_colour;
		$this->sec_make_vehicle = $sec_make_vehicle;
		$this->sec_reg_no = $sec_reg_no;
		$this->sec_phone = $sec_phone;
		$this->sec_mobile = $sec_mobile;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_securityId 
	* @return object $es_security
	*/
	function Get($es_securityId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_security` where `es_securityid`='".intval($es_securityId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_securityId = $row['es_securityid'];
			$this->sec_name = $this->Unescape($row['sec_name']);
			$this->sec_address = $this->Unescape($row['sec_address']);
			$this->sec_contact_person = $this->Unescape($row['sec_contact_person']);
			$this->sec_vehicle_no = $this->Unescape($row['sec_vehicle_no']);
			$this->sec_purpose = $this->Unescape($row['sec_purpose']);
			$this->sec_mode_app = $this->Unescape($row['sec_mode_app']);
			$this->sec_time_out = $row['sec_time_out'];
			$this->sec_remarks = $this->Unescape($row['sec_remarks']);
			$this->status = $row['status'];
			$this->sec_time_in = $row['sec_time_in'];
			$this->sec_colour = $this->Unescape($row['sec_colour']);
			$this->sec_make_vehicle = $this->Unescape($row['sec_make_vehicle']);
			$this->sec_reg_no = $this->Unescape($row['sec_reg_no']);
			$this->sec_phone = $this->Unescape($row['sec_phone']);
			$this->sec_mobile = $this->Unescape($row['sec_mobile']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_securityList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_security` ";
		$es_securityList = Array();
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
						
						/****prabhakar */
						if (strstr($value, ' AND ')) {
							list($d1, $d2 ) = explode('AND',$value);
							$value =  "   " . $d1 . "'   AND  '" . $d2;
						} 
						/****prabhakar ****/
						
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
			$sortBy = "es_securityid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_security = new $thisObjectName();
			$es_security->es_securityId = $row['es_securityid'];
			$es_security->sec_name = $this->Unescape($row['sec_name']);
			$es_security->sec_address = $this->Unescape($row['sec_address']);
			$es_security->sec_contact_person = $this->Unescape($row['sec_contact_person']);
			$es_security->sec_vehicle_no = $this->Unescape($row['sec_vehicle_no']);
			$es_security->sec_purpose = $this->Unescape($row['sec_purpose']);
			$es_security->sec_mode_app = $this->Unescape($row['sec_mode_app']);
			$es_security->sec_time_out = $row['sec_time_out'];
			$es_security->sec_remarks = $this->Unescape($row['sec_remarks']);
			$es_security->status = $row['status'];
			$es_security->sec_time_in = $row['sec_time_in'];
			$es_security->sec_colour = $this->Unescape($row['sec_colour']);
			$es_security->sec_make_vehicle = $this->Unescape($row['sec_make_vehicle']);
			$es_security->sec_reg_no = $this->Unescape($row['sec_reg_no']);
			$es_security->sec_phone = $this->Unescape($row['sec_phone']);
			$es_security->sec_mobile = $this->Unescape($row['sec_mobile']);
			$es_securityList[] = $es_security;
		}
		return $es_securityList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_securityId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_securityid` from `es_security` where `es_securityid`='".$this->es_securityId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_security` set 
			`sec_name`='".$this->Escape($this->sec_name)."', 
			`sec_address`='".$this->Escape($this->sec_address)."', 
			`sec_contact_person`='".$this->Escape($this->sec_contact_person)."', 
			`sec_vehicle_no`='".$this->Escape($this->sec_vehicle_no)."', 
			`sec_purpose`='".$this->Escape($this->sec_purpose)."', 
			`sec_mode_app`='".$this->Escape($this->sec_mode_app)."', 
			`sec_time_out`='".$this->sec_time_out."', 
			`sec_remarks`='".$this->Escape($this->sec_remarks)."', 
			`status`='".$this->status."', 
			`sec_time_in`='".$this->sec_time_in."', 
			`sec_colour`='".$this->Escape($this->sec_colour)."', 
			`sec_make_vehicle`='".$this->Escape($this->sec_make_vehicle)."', 
			`sec_reg_no`='".$this->Escape($this->sec_reg_no)."', 
			`sec_phone`='".$this->Escape($this->sec_phone)."', 
			`sec_mobile`='".$this->Escape($this->sec_mobile)."' where `es_securityid`='".$this->es_securityId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_security` (`sec_name`, `sec_address`, `sec_contact_person`, `sec_vehicle_no`, `sec_purpose`, `sec_mode_app`, `sec_time_out`, `sec_remarks`, `status`, `sec_time_in`, `sec_colour`, `sec_make_vehicle`, `sec_reg_no`, `sec_phone`, `sec_mobile` ) values (
			'".$this->Escape($this->sec_name)."', 
			'".$this->Escape($this->sec_address)."', 
			'".$this->Escape($this->sec_contact_person)."', 
			'".$this->Escape($this->sec_vehicle_no)."', 
			'".$this->Escape($this->sec_purpose)."', 
			'".$this->Escape($this->sec_mode_app)."', 
			'".$this->sec_time_out."', 
			'".$this->Escape($this->sec_remarks)."', 
			'".$this->status."', 
			'".$this->sec_time_in."', 
			'".$this->Escape($this->sec_colour)."', 
			'".$this->Escape($this->sec_make_vehicle)."', 
			'".$this->Escape($this->sec_reg_no)."', 
			'".$this->Escape($this->sec_phone)."', 
			'".$this->Escape($this->sec_mobile)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_securityId == "")
		{
			$this->es_securityId = $insertId;
		}
		return $this->es_securityId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_securityId
	*/
	function SaveNew()
	{
		$this->es_securityId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_security` where `es_securityid`='".$this->es_securityId."'";
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
			$pog_query = "delete from `es_security` where ";
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