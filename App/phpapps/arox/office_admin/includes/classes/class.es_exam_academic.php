<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_exam_academic` (
	`es_exam_academicid` int(11) NOT NULL auto_increment,
	`exam_id` INT NOT NULL,
	`group_id` INT NOT NULL,
	`class_id` INT NOT NULL,
	`academic_year` VARCHAR(255) NOT NULL,
	`created_date` DATETIME NOT NULL, PRIMARY KEY  (`es_exam_academicid`)) ENGINE=MyISAM;
*/

/**
* <b>es_exam_academic</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_exam_academic&attributeList=array+%28%0A++0+%3D%3E+%27exam_id%27%2C%0A++1+%3D%3E+%27group_id%27%2C%0A++2+%3D%3E+%27class_id%27%2C%0A++3+%3D%3E+%27academic_year%27%2C%0A++4+%3D%3E+%27created_date%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27DATETIME%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_exam_academic extends POG_Base
{
	public $es_exam_academicId = '';

	/**
	 * @var INT
	 */
	public $exam_id;
	
	/**
	 * @var INT
	 */
	public $group_id;
	
	/**
	 * @var INT
	 */
	public $class_id;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $academic_year;
	
	/**
	 * @var DATETIME
	 */
	public $created_date;
	
	public $pog_attribute_type = array(
		"es_exam_academicId" => array('db_attributes' => array("NUMERIC", "INT")),
		"exam_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"group_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"class_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"academic_year" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"created_date" => array('db_attributes' => array("TEXT", "DATETIME")),
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
	
	function es_exam_academic($exam_id='', $group_id='', $class_id='', $academic_year='', $created_date='')
	{
		$this->exam_id = $exam_id;
		$this->group_id = $group_id;
		$this->class_id = $class_id;
		$this->academic_year = $academic_year;
		$this->created_date = $created_date;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_exam_academicId 
	* @return object $es_exam_academic
	*/
	function Get($es_exam_academicId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_exam_academic` where `es_exam_academicid`='".intval($es_exam_academicId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_exam_academicId = $row['es_exam_academicid'];
			$this->exam_id = $this->Unescape($row['exam_id']);
			$this->group_id = $this->Unescape($row['group_id']);
			$this->class_id = $this->Unescape($row['class_id']);
			$this->academic_year = $this->Unescape($row['academic_year']);
			$this->created_date = $row['created_date'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_exam_academicList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_exam_academic` ";
		$es_exam_academicList = Array();
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
			$sortBy = "es_exam_academicid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_exam_academic = new $thisObjectName();
			$es_exam_academic->es_exam_academicId = $row['es_exam_academicid'];
			$es_exam_academic->exam_id = $this->Unescape($row['exam_id']);
			$es_exam_academic->group_id = $this->Unescape($row['group_id']);
			$es_exam_academic->class_id = $this->Unescape($row['class_id']);
			$es_exam_academic->academic_year = $this->Unescape($row['academic_year']);
			$es_exam_academic->created_date = $row['created_date'];
			$es_exam_academicList[] = $es_exam_academic;
		}
		return $es_exam_academicList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_exam_academicId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_exam_academicid` from `es_exam_academic` where `es_exam_academicid`='".$this->es_exam_academicId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_exam_academic` set 
			`exam_id`='".$this->Escape($this->exam_id)."', 
			`group_id`='".$this->Escape($this->group_id)."', 
			`class_id`='".$this->Escape($this->class_id)."', 
			`academic_year`='".$this->Escape($this->academic_year)."', 
			`created_date`='".$this->created_date."' where `es_exam_academicid`='".$this->es_exam_academicId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_exam_academic` (`exam_id`, `group_id`, `class_id`, `academic_year`, `created_date` ) values (
			'".$this->Escape($this->exam_id)."', 
			'".$this->Escape($this->group_id)."', 
			'".$this->Escape($this->class_id)."', 
			'".$this->Escape($this->academic_year)."', 
			'".$this->created_date."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_exam_academicId == "")
		{
			$this->es_exam_academicId = $insertId;
		}
		return $this->es_exam_academicId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_exam_academicId
	*/
	function SaveNew()
	{
		$this->es_exam_academicId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_exam_academic` where `es_exam_academicid`='".$this->es_exam_academicId."'";
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
			$pog_query = "delete from `es_exam_academic` where ";
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