<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_examinations` (
	`es_examinationsid` int(11) NOT NULL auto_increment,
	`examname` VARCHAR(255) NOT NULL,
	`maxmarks` VARCHAR(255) NOT NULL,
	`minmarks` VARCHAR(255) NOT NULL,
	`group_id` INT NOT NULL,
	`class_id` INT NOT NULL,
	`subject_id` INT NOT NULL, PRIMARY KEY  (`es_examinationsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_examinations</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_examinations&attributeList=array+%28%0A++0+%3D%3E+%27examname%27%2C%0A++1+%3D%3E+%27maxmarks%27%2C%0A++2+%3D%3E+%27minmarks%27%2C%0A++3+%3D%3E+%27group_id%27%2C%0A++4+%3D%3E+%27class_id%27%2C%0A++5+%3D%3E+%27subject_id%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_examinations extends POG_Base
{
	public $es_examinationsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $examname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $maxmarks;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $minmarks;
	
	/**
	 * @var INT
	 */
	public $group_id;
	
	/**
	 * @var INT
	 */
	public $class_id;
	
	/**
	 * @var INT
	 */
	public $subject_id;
	
	public $pog_attribute_type = array(
		"es_examinationsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"examname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"maxmarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"minmarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"group_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"class_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"subject_id" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_examinations($examname='', $maxmarks='', $minmarks='', $group_id='', $class_id='', $subject_id='')
	{
		$this->examname = $examname;
		$this->maxmarks = $maxmarks;
		$this->minmarks = $minmarks;
		$this->group_id = $group_id;
		$this->class_id = $class_id;
		$this->subject_id = $subject_id;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_examinationsId 
	* @return object $es_examinations
	*/
	function Get($es_examinationsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_examinations` where `es_examinationsid`='".intval($es_examinationsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_examinationsId = $row['es_examinationsid'];
			$this->examname = $this->Unescape($row['examname']);
			$this->maxmarks = $this->Unescape($row['maxmarks']);
			$this->minmarks = $this->Unescape($row['minmarks']);
			$this->group_id = $this->Unescape($row['group_id']);
			$this->class_id = $this->Unescape($row['class_id']);
			$this->subject_id = $this->Unescape($row['subject_id']);
			$this->examdate = $this->Unescape($row['examdate']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_examinationsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_examinations` ";
		$es_examinationsList = Array();
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
			$sortBy = "es_examinationsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_examinations = new $thisObjectName();
			$es_examinations->es_examinationsId = $row['es_examinationsid'];
			$es_examinations->examname = $this->Unescape($row['examname']);
			$es_examinations->maxmarks = $this->Unescape($row['maxmarks']);
			$es_examinations->minmarks = $this->Unescape($row['minmarks']);
			$es_examinations->group_id = $this->Unescape($row['group_id']);
			$es_examinations->class_id = $this->Unescape($row['class_id']);
			$es_examinations->subject_id = $this->Unescape($row['subject_id']);
			$es_examinations->examdate = $this->Unescape($row['examdate']);
			$es_examinationsList[] = $es_examinations;
		}
		return $es_examinationsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_examinationsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_examinationsid` from `es_examinations` where `es_examinationsid`='".$this->es_examinationsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_examinations` set 
			`examname`='".$this->Escape($this->examname)."', 
			`maxmarks`='".$this->Escape($this->maxmarks)."', 
			`minmarks`='".$this->Escape($this->minmarks)."', 
			`group_id`='".$this->Escape($this->group_id)."', 
			`class_id`='".$this->Escape($this->class_id)."', 
			`subject_id`='".$this->Escape($this->subject_id)."' where `es_examinationsid`='".$this->es_examinationsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_examinations` (`examname`, `maxmarks`, `minmarks`, `group_id`, `class_id`, `subject_id` ,`examdate`) values (
			'".$this->Escape($this->examname)."', 
			'".$this->Escape($this->maxmarks)."', 
			'".$this->Escape($this->minmarks)."', 
			'".$this->Escape($this->group_id)."', 
			'".$this->Escape($this->class_id)."', 
			'".$this->Escape($this->subject_id)."',
			'".$this->Escape($this->examdate)."')";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_examinationsId == "")
		{
			$this->es_examinationsId = $insertId;
		}
		return $this->es_examinationsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_examinationsId
	*/
	function SaveNew()
	{
		$this->es_examinationsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_examinations` where `es_examinationsid`='".$this->es_examinationsId."'";
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
			$pog_query = "delete from `es_examinations` where ";
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