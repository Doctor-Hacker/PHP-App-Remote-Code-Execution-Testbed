<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_attend_staff` (
	`es_attend_staffid` int(11) NOT NULL auto_increment,
	`at_staff_dept` VARCHAR(255) NOT NULL,
	`at_staff_date` DATETIME NOT NULL,
	`at_staff_id` VARCHAR(255) NOT NULL,
	`at_staff_name` VARCHAR(255) NOT NULL,
	`at_staff_desig` VARCHAR(255) NOT NULL,
	`at_staff_attend` VARCHAR(255) NOT NULL,
	`at_staff_remarks` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_attend_staffid`)) ENGINE=MyISAM;
*/

/**
* <b>es_attend_staff</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_attend_staff&attributeList=array+%28%0A++0+%3D%3E+%27at_staff_dept%27%2C%0A++1+%3D%3E+%27at_staff_date%27%2C%0A++2+%3D%3E+%27at_staff_id%27%2C%0A++3+%3D%3E+%27at_staff_name%27%2C%0A++4+%3D%3E+%27at_staff_desig%27%2C%0A++5+%3D%3E+%27at_staff_attend%27%2C%0A++6+%3D%3E+%27at_staff_remarks%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27DATETIME%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_attend_staff extends POG_Base
{
	public $es_attend_staffId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $at_staff_dept;
	
	/**
	 * @var DATETIME
	 */
	public $at_staff_date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_staff_id;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_staff_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_staff_desig;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_staff_attend;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_staff_remarks;
	
	public $pog_attribute_type = array(
		"es_attend_staffId" => array('db_attributes' => array("NUMERIC", "INT")),
		"at_staff_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_staff_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"at_staff_id" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_staff_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_staff_desig" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_staff_attend" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_staff_remarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_attend_staff($at_staff_dept='', $at_staff_date='', $at_staff_id='', $at_staff_name='', $at_staff_desig='', $at_staff_attend='', $at_staff_remarks='')
	{
		$this->at_staff_dept = $at_staff_dept;
		$this->at_staff_date = $at_staff_date;
		$this->at_staff_id = $at_staff_id;
		$this->at_staff_name = $at_staff_name;
		$this->at_staff_desig = $at_staff_desig;
		$this->at_staff_attend = $at_staff_attend;
		$this->at_staff_remarks = $at_staff_remarks;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_attend_staffId 
	* @return object $es_attend_staff
	*/
	function Get($es_attend_staffId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_attend_staff` where `es_attend_staffid`='".intval($es_attend_staffId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_attend_staffId = $row['es_attend_staffid'];
			$this->at_staff_dept = $this->Unescape($row['at_staff_dept']);
			$this->at_staff_date = $row['at_staff_date'];
			$this->at_staff_id = $this->Unescape($row['at_staff_id']);
			$this->at_staff_name = $this->Unescape($row['at_staff_name']);
			$this->at_staff_desig = $this->Unescape($row['at_staff_desig']);
			$this->at_staff_attend = $this->Unescape($row['at_staff_attend']);
			$this->at_staff_remarks = $this->Unescape($row['at_staff_remarks']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_attend_staffList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_attend_staff` ";
		$es_attend_staffList = Array();
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
			$sortBy = "es_attend_staffid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_attend_staff = new $thisObjectName();
			$es_attend_staff->es_attend_staffId = $row['es_attend_staffid'];
			$es_attend_staff->at_staff_dept = $this->Unescape($row['at_staff_dept']);
			$es_attend_staff->at_staff_date = $row['at_staff_date'];
			$es_attend_staff->at_staff_id = $this->Unescape($row['at_staff_id']);
			$es_attend_staff->at_staff_name = $this->Unescape($row['at_staff_name']);
			$es_attend_staff->at_staff_desig = $this->Unescape($row['at_staff_desig']);
			$es_attend_staff->at_staff_attend = $this->Unescape($row['at_staff_attend']);
			$es_attend_staff->at_staff_remarks = $this->Unescape($row['at_staff_remarks']);
			$es_attend_staffList[] = $es_attend_staff;
		}
		return $es_attend_staffList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_attend_staffId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_attend_staffid` from `es_attend_staff` where `es_attend_staffid`='".$this->es_attend_staffId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_attend_staff` set 
			`at_staff_dept`='".$this->Escape($this->at_staff_dept)."', 
			`at_staff_date`='".$this->at_staff_date."', 
			`at_staff_id`='".$this->Escape($this->at_staff_id)."', 
			`at_staff_name`='".$this->Escape($this->at_staff_name)."', 
			`at_staff_desig`='".$this->Escape($this->at_staff_desig)."', 
			`at_staff_attend`='".$this->Escape($this->at_staff_attend)."', 
			`at_staff_remarks`='".$this->Escape($this->at_staff_remarks)."' where `es_attend_staffid`='".$this->es_attend_staffId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_attend_staff` (`at_staff_dept`, `at_staff_date`, `at_staff_id`, `at_staff_name`, `at_staff_desig`, `at_staff_attend`, `at_staff_remarks` ) values (
			'".$this->Escape($this->at_staff_dept)."', 
			'".$this->at_staff_date."', 
			'".$this->Escape($this->at_staff_id)."', 
			'".$this->Escape($this->at_staff_name)."', 
			'".$this->Escape($this->at_staff_desig)."', 
			'".$this->Escape($this->at_staff_attend)."', 
			'".$this->Escape($this->at_staff_remarks)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_attend_staffId == "")
		{
			$this->es_attend_staffId = $insertId;
		}
		return $this->es_attend_staffId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_attend_staffId
	*/
	function SaveNew()
	{
		$this->es_attend_staffId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_attend_staff` where `es_attend_staffid`='".$this->es_attend_staffId."'";
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
			$pog_query = "delete from `es_attend_staff` where ";
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