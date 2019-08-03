<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_libstaffadd` (
	`es_libstaffaddid` int(11) NOT NULL auto_increment,
	`staffadd_id` INT NOT NULL,
	`staffadd_name` VARCHAR(255) NOT NULL,
	`staffadd_sex` VARCHAR(255) NOT NULL,
	`staffadd_qulification` VARCHAR(255) NOT NULL,
	`staffadd_adress` VARCHAR(255) NOT NULL,
	`staffadd_phone` VARCHAR(255) NOT NULL,
	`staffadd_subject` VARCHAR(255) NOT NULL,
	`staffadd_designation` VARCHAR(255) NOT NULL,
	`staffadd_deaprtment` VARCHAR(255) NOT NULL,
	`staffadd_addtinalinfo` VARCHAR(255) NOT NULL,
	`staffadd_issuedfromdate` DATE NOT NULL,
	`staffadd_issuedtodate` DATE NOT NULL,
	`staffadd_status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_libstaffaddid`)) ENGINE=MyISAM;
*/

/**
* <b>es_libstaffadd</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_libstaffadd&attributeList=array+%28%0A++0+%3D%3E+%27staffadd_id%27%2C%0A++1+%3D%3E+%27staffadd_name%27%2C%0A++2+%3D%3E+%27staffadd_sex%27%2C%0A++3+%3D%3E+%27staffadd_qulification%27%2C%0A++4+%3D%3E+%27staffadd_adress%27%2C%0A++5+%3D%3E+%27staffadd_phone%27%2C%0A++6+%3D%3E+%27staffadd_subject%27%2C%0A++7+%3D%3E+%27staffadd_designation%27%2C%0A++8+%3D%3E+%27staffadd_deaprtment%27%2C%0A++9+%3D%3E+%27staffadd_addtinalinfo%27%2C%0A++10+%3D%3E+%27staffadd_issuedfromdate%27%2C%0A++11+%3D%3E+%27staffadd_issuedtodate%27%2C%0A++12+%3D%3E+%27staffadd_status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27DATE%27%2C%0A++11+%3D%3E+%27DATE%27%2C%0A++12+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_libstaffadd extends POG_Base
{
	public $es_libstaffaddId = '';

	/**
	 * @var INT
	 */
	public $staffadd_id;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_sex;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_qulification;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_adress;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_phone;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_subject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_designation;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_deaprtment;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $staffadd_addtinalinfo;
	
	/**
	 * @var DATE
	 */
	public $staffadd_issuedfromdate;
	
	/**
	 * @var DATE
	 */
	public $staffadd_issuedtodate;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $staffadd_status;
	
	public $pog_attribute_type = array(
		"es_libstaffaddId" => array('db_attributes' => array("NUMERIC", "INT")),
		"staffadd_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"staffadd_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_sex" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_qulification" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_adress" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_phone" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_subject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_designation" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_deaprtment" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_addtinalinfo" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"staffadd_issuedfromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"staffadd_issuedtodate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"staffadd_status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive'")),
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
	
	function es_libstaffadd($staffadd_id='', $staffadd_name='', $staffadd_sex='', $staffadd_qulification='', $staffadd_adress='', $staffadd_phone='', $staffadd_subject='', $staffadd_designation='', $staffadd_deaprtment='', $staffadd_addtinalinfo='', $staffadd_issuedfromdate='', $staffadd_issuedtodate='', $staffadd_status='')
	{
		$this->staffadd_id = $staffadd_id;
		$this->staffadd_name = $staffadd_name;
		$this->staffadd_sex = $staffadd_sex;
		$this->staffadd_qulification = $staffadd_qulification;
		$this->staffadd_adress = $staffadd_adress;
		$this->staffadd_phone = $staffadd_phone;
		$this->staffadd_subject = $staffadd_subject;
		$this->staffadd_designation = $staffadd_designation;
		$this->staffadd_deaprtment = $staffadd_deaprtment;
		$this->staffadd_addtinalinfo = $staffadd_addtinalinfo;
		$this->staffadd_issuedfromdate = $staffadd_issuedfromdate;
		$this->staffadd_issuedtodate = $staffadd_issuedtodate;
		$this->staffadd_status = $staffadd_status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_libstaffaddId 
	* @return object $es_libstaffadd
	*/
	function Get($es_libstaffaddId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libstaffadd` where `es_libstaffaddid`='".intval($es_libstaffaddId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libstaffaddId = $row['es_libstaffaddid'];
			$this->staffadd_id = $this->Unescape($row['staffadd_id']);
			$this->staffadd_name = $this->Unescape($row['staffadd_name']);
			$this->staffadd_sex = $this->Unescape($row['staffadd_sex']);
			$this->staffadd_qulification = $this->Unescape($row['staffadd_qulification']);
			$this->staffadd_adress = $this->Unescape($row['staffadd_adress']);
			$this->staffadd_phone = $this->Unescape($row['staffadd_phone']);
			$this->staffadd_subject = $this->Unescape($row['staffadd_subject']);
			$this->staffadd_designation = $this->Unescape($row['staffadd_designation']);
			$this->staffadd_deaprtment = $this->Unescape($row['staffadd_deaprtment']);
			$this->staffadd_addtinalinfo = $this->Unescape($row['staffadd_addtinalinfo']);
			$this->staffadd_issuedfromdate = $row['staffadd_issuedfromdate'];
			$this->staffadd_issuedtodate = $row['staffadd_issuedtodate'];
			$this->staffadd_status = $row['staffadd_status'];
		}
		return $this;
	}
	function Get1($es_libstaffaddId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libstaffadd` where `staffadd_id`='".intval($es_libstaffaddId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libstaffaddId = $row['es_libstaffaddid'];
			$this->staffadd_id = $this->Unescape($row['staffadd_id']);
			$this->staffadd_name = $this->Unescape($row['staffadd_name']);
			$this->staffadd_sex = $this->Unescape($row['staffadd_sex']);
			$this->staffadd_qulification = $this->Unescape($row['staffadd_qulification']);
			$this->staffadd_adress = $this->Unescape($row['staffadd_adress']);
			$this->staffadd_phone = $this->Unescape($row['staffadd_phone']);
			$this->staffadd_subject = $this->Unescape($row['staffadd_subject']);
			$this->staffadd_designation = $this->Unescape($row['staffadd_designation']);
			$this->staffadd_deaprtment = $this->Unescape($row['staffadd_deaprtment']);
			$this->staffadd_addtinalinfo = $this->Unescape($row['staffadd_addtinalinfo']);
			$this->staffadd_issuedfromdate = $row['staffadd_issuedfromdate'];
			$this->staffadd_issuedtodate = $row['staffadd_issuedtodate'];
			$this->staffadd_status = $row['staffadd_status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_libstaffaddList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_libstaffadd` ";
		$es_libstaffaddList = Array();
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
			$sortBy = "es_libstaffaddid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_libstaffadd = new $thisObjectName();
			$es_libstaffadd->es_libstaffaddId = $row['es_libstaffaddid'];
			$es_libstaffadd->staffadd_id = $this->Unescape($row['staffadd_id']);
			$es_libstaffadd->staffadd_name = $this->Unescape($row['staffadd_name']);
			$es_libstaffadd->staffadd_sex = $this->Unescape($row['staffadd_sex']);
			$es_libstaffadd->staffadd_qulification = $this->Unescape($row['staffadd_qulification']);
			$es_libstaffadd->staffadd_adress = $this->Unescape($row['staffadd_adress']);
			$es_libstaffadd->staffadd_phone = $this->Unescape($row['staffadd_phone']);
			$es_libstaffadd->staffadd_subject = $this->Unescape($row['staffadd_subject']);
			$es_libstaffadd->staffadd_designation = $this->Unescape($row['staffadd_designation']);
			$es_libstaffadd->staffadd_deaprtment = $this->Unescape($row['staffadd_deaprtment']);
			$es_libstaffadd->staffadd_addtinalinfo = $this->Unescape($row['staffadd_addtinalinfo']);
			$es_libstaffadd->staffadd_issuedfromdate = $row['staffadd_issuedfromdate'];
			$es_libstaffadd->staffadd_issuedtodate = $row['staffadd_issuedtodate'];
			$es_libstaffadd->staffadd_status = $row['staffadd_status'];
			$es_libstaffaddList[] = $es_libstaffadd;
		}
		return $es_libstaffaddList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_libstaffaddId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_libstaffaddid` from `es_libstaffadd` where `es_libstaffaddid`='".$this->es_libstaffaddId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_libstaffadd` set 
			`staffadd_id`='".$this->Escape($this->staffadd_id)."', 
			`staffadd_name`='".$this->Escape($this->staffadd_name)."', 
			`staffadd_sex`='".$this->Escape($this->staffadd_sex)."', 
			`staffadd_qulification`='".$this->Escape($this->staffadd_qulification)."', 
			`staffadd_adress`='".$this->Escape($this->staffadd_adress)."', 
			`staffadd_phone`='".$this->Escape($this->staffadd_phone)."', 
			`staffadd_subject`='".$this->Escape($this->staffadd_subject)."', 
			`staffadd_designation`='".$this->Escape($this->staffadd_designation)."', 
			`staffadd_deaprtment`='".$this->Escape($this->staffadd_deaprtment)."', 
			`staffadd_addtinalinfo`='".$this->Escape($this->staffadd_addtinalinfo)."', 
			`staffadd_issuedfromdate`='".$this->staffadd_issuedfromdate."', 
			`staffadd_issuedtodate`='".$this->staffadd_issuedtodate."', 
			`staffadd_status`='".$this->staffadd_status."' where `es_libstaffaddid`='".$this->es_libstaffaddId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_libstaffadd` (`staffadd_id`, `staffadd_name`, `staffadd_sex`, `staffadd_qulification`, `staffadd_adress`, `staffadd_phone`, `staffadd_subject`, `staffadd_designation`, `staffadd_deaprtment`, `staffadd_addtinalinfo`, `staffadd_issuedfromdate`, `staffadd_issuedtodate`, `staffadd_status` ) values (
			'".$this->Escape($this->staffadd_id)."', 
			'".$this->Escape($this->staffadd_name)."', 
			'".$this->Escape($this->staffadd_sex)."', 
			'".$this->Escape($this->staffadd_qulification)."', 
			'".$this->Escape($this->staffadd_adress)."', 
			'".$this->Escape($this->staffadd_phone)."', 
			'".$this->Escape($this->staffadd_subject)."', 
			'".$this->Escape($this->staffadd_designation)."', 
			'".$this->Escape($this->staffadd_deaprtment)."', 
			'".$this->Escape($this->staffadd_addtinalinfo)."', 
			'".$this->staffadd_issuedfromdate."', 
			'".$this->staffadd_issuedtodate."', 
			'".$this->staffadd_status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_libstaffaddId == "")
		{
			$this->es_libstaffaddId = $insertId;
		}
		return $this->es_libstaffaddId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_libstaffaddId
	*/
	function SaveNew()
	{
		$this->es_libstaffaddId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_libstaffadd` where `es_libstaffaddid`='".$this->es_libstaffaddId."'";
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
			$pog_query = "delete from `es_libstaffadd` where ";
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