<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_assignment` (
	`es_assignmentid` int(11) NOT NULL auto_increment,
	`as_name` VARCHAR(255) NOT NULL,
	`as_class` VARCHAR(255) NOT NULL,
	`as_sec` VARCHAR(255) NOT NULL,
	`as_suject` VARCHAR(255) NOT NULL,
	`as_lastdate` DATE NOT NULL,
	`as_description` LONGTEXT NOT NULL,
	`as_createdon` DATE NOT NULL,
	`status` ENUM('active', 'inactive', 'deleted') NOT NULL,
	`as_marks` INT NOT NULL,
	`person_type` VARCHAR(255) NOT NULL,
	`created_by` INT NOT NULL, PRIMARY KEY  (`es_assignmentid`)) ENGINE=MyISAM;
*/

/**
* <b>es_assignment</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_assignment&attributeList=array+%28%0A++0+%3D%3E+%27as_name%27%2C%0A++1+%3D%3E+%27as_class%27%2C%0A++2+%3D%3E+%27as_sec%27%2C%0A++3+%3D%3E+%27as_suject%27%2C%0A++4+%3D%3E+%27as_lastdate%27%2C%0A++5+%3D%3E+%27as_description%27%2C%0A++6+%3D%3E+%27as_createdon%27%2C%0A++7+%3D%3E+%27status%27%2C%0A++8+%3D%3E+%27as_marks%27%2C%0A++9+%3D%3E+%27person_type%27%2C%0A++10+%3D%3E+%27created_by%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27DATE%27%2C%0A++5+%3D%3E+%27LONGTEXT%27%2C%0A++6+%3D%3E+%27DATE%27%2C%0A++7+%3D%3E+%27ENUM%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%2C+%5C%27deleted%5C%27%29%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_assignment extends POG_Base
{
	public $es_assignmentId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $as_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $as_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $as_sec;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $as_suject;
	
	/**
	 * @var DATE
	 */
	public $as_lastdate;
	
	/**
	 * @var LONGTEXT
	 */
	public $as_description;
	
	/**
	 * @var DATE
	 */
	public $as_createdon;
	
	/**
	 * @var ENUM('active', 'inactive', 'deleted')
	 */
	public $status;
	
	/**
	 * @var INT
	 */
	public $as_marks;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $person_type;
	
	/**
	 * @var INT
	 */
	public $created_by;
	
	public $pog_attribute_type = array(
		"es_assignmentId" => array('db_attributes' => array("NUMERIC", "INT")),
		"as_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"as_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"as_sec" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"as_suject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"as_lastdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"as_description" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"as_createdon" => array('db_attributes' => array("NUMERIC", "DATE")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"as_marks" => array('db_attributes' => array("NUMERIC", "INT")),
		"person_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"created_by" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_assignment($as_name='', $as_class='', $as_sec='', $as_suject='', $as_lastdate='', $as_description='', $as_createdon='', $status='', $as_marks='', $person_type='', $created_by='')
	{
		$this->as_name = $as_name;
		$this->as_class = $as_class;
		$this->as_sec = $as_sec;
		$this->as_suject = $as_suject;
		$this->as_lastdate = $as_lastdate;
		$this->as_description = $as_description;
		$this->as_createdon = $as_createdon;
		$this->status = $status;
		$this->as_marks = $as_marks;
		$this->person_type = $person_type;
		$this->created_by = $created_by;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_assignmentId 
	* @return object $es_assignment
	*/
	function Get($es_assignmentId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_assignment` where `es_assignmentid`='".intval($es_assignmentId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_assignmentId = $row['es_assignmentid'];
			$this->as_name = $this->Unescape($row['as_name']);
			$this->as_class = $this->Unescape($row['as_class']);
			$this->as_sec = $this->Unescape($row['as_sec']);
			$this->as_suject = $this->Unescape($row['as_suject']);
			$this->as_lastdate = $row['as_lastdate'];
			$this->as_description = $this->Unescape($row['as_description']);
			$this->as_createdon = $row['as_createdon'];
			$this->status = $row['status'];
			$this->as_marks = $this->Unescape($row['as_marks']);
			$this->person_type = $this->Unescape($row['person_type']);
			$this->created_by = $this->Unescape($row['created_by']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_assignmentList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_assignment` ";
		$es_assignmentList = Array();
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
			$sortBy = "es_assignmentid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_assignment = new $thisObjectName();
			$es_assignment->es_assignmentId = $row['es_assignmentid'];
			$es_assignment->as_name = $this->Unescape($row['as_name']);
			$es_assignment->as_class = $this->Unescape($row['as_class']);
			$es_assignment->as_sec = $this->Unescape($row['as_sec']);
			$es_assignment->as_suject = $this->Unescape($row['as_suject']);
			$es_assignment->as_lastdate = $row['as_lastdate'];
			$es_assignment->as_description = $this->Unescape($row['as_description']);
			$es_assignment->as_createdon = $row['as_createdon'];
			$es_assignment->status = $row['status'];
			$es_assignment->as_marks = $this->Unescape($row['as_marks']);
			$es_assignment->person_type = $this->Unescape($row['person_type']);
			$es_assignment->created_by = $this->Unescape($row['created_by']);
			$es_assignmentList[] = $es_assignment;
		}
		return $es_assignmentList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_assignmentId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_assignmentid` from `es_assignment` where `es_assignmentid`='".$this->es_assignmentId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_assignment` set 
			`as_name`='".$this->Escape($this->as_name)."', 
			`as_class`='".$this->Escape($this->as_class)."', 
			`as_sec`='".$this->Escape($this->as_sec)."', 
			`as_suject`='".$this->Escape($this->as_suject)."', 
			`as_lastdate`='".$this->as_lastdate."', 
			`as_description`='".$this->Escape($this->as_description)."', 
			`as_createdon`='".$this->as_createdon."', 
			`status`='".$this->status."', 
			`as_marks`='".$this->Escape($this->as_marks)."', 
			`person_type`='".$this->Escape($this->person_type)."', 
			`created_by`='".$this->Escape($this->created_by)."' where `es_assignmentid`='".$this->es_assignmentId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_assignment` (`as_name`, `as_class`, `as_sec`, `as_suject`, `as_lastdate`, `as_description`, `as_createdon`, `status`, `as_marks`, `person_type`, `created_by` ) values (
			'".$this->Escape($this->as_name)."', 
			'".$this->Escape($this->as_class)."', 
			'".$this->Escape($this->as_sec)."', 
			'".$this->Escape($this->as_suject)."', 
			'".$this->as_lastdate."', 
			'".$this->Escape($this->as_description)."', 
			'".$this->as_createdon."', 
			'".$this->status."', 
			'".$this->Escape($this->as_marks)."', 
			'".$this->Escape($this->person_type)."', 
			'".$this->Escape($this->created_by)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_assignmentId == "")
		{
			$this->es_assignmentId = $insertId;
		}
		return $this->es_assignmentId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_assignmentId
	*/
	function SaveNew()
	{
		$this->es_assignmentId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_assignment` where `es_assignmentid`='".$this->es_assignmentId."'";
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
			$pog_query = "delete from `es_assignment` where ";
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