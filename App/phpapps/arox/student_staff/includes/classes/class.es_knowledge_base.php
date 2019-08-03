<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_knowledge_base` (
	`es_knowledge_baseid` int(11) NOT NULL auto_increment,
	`kb_category` VARCHAR(255) NOT NULL,
	`kb_description` TEXT NOT NULL,
	`kb_date` DATETIME NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL,
	`parent_id` INT NOT NULL,
	`created_by` INT NOT NULL, PRIMARY KEY  (`es_knowledge_baseid`)) ENGINE=MyISAM;
*/

/**
* <b>es_knowledge_base</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_knowledge_base&attributeList=array+%28%0A++0+%3D%3E+%27kb_category%27%2C%0A++1+%3D%3E+%27kb_description%27%2C%0A++2+%3D%3E+%27kb_date%27%2C%0A++3+%3D%3E+%27status%27%2C%0A++4+%3D%3E+%27parent_id%27%2C%0A++5+%3D%3E+%27created_by%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27TEXT%27%2C%0A++2+%3D%3E+%27DATETIME%27%2C%0A++3+%3D%3E+%27enum%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%2C+%5C%27deleted%5C%27%29%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_knowledge_base extends POG_Base
{
	public $es_knowledge_baseId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $kb_category;
	
	/**
	 * @var TEXT
	 */
	public $kb_description;
	
	/**
	 * @var DATETIME
	 */
	public $kb_date;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	/**
	 * @var INT
	 */
	public $parent_id;
	
	/**
	 * @var INT
	 */
	public $created_by;
	
	public $pog_attribute_type = array(
		"es_knowledge_baseId" => array('db_attributes' => array("NUMERIC", "INT")),
		"kb_category" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"kb_description" => array('db_attributes' => array("TEXT", "TEXT")),
		"kb_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"parent_id" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_knowledge_base($kb_category='', $kb_description='', $kb_date='', $status='', $parent_id='', $created_by='')
	{
		$this->kb_category = $kb_category;
		$this->kb_description = $kb_description;
		$this->kb_date = $kb_date;
		$this->status = $status;
		$this->parent_id = $parent_id;
		$this->created_by = $created_by;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_knowledge_baseId 
	* @return object $es_knowledge_base
	*/
	function Get($es_knowledge_baseId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_knowledge_base` where `es_knowledge_baseid`='".intval($es_knowledge_baseId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_knowledge_baseId = $row['es_knowledge_baseid'];
			$this->kb_category = $this->Unescape($row['kb_category']);
			$this->kb_description = $this->Unescape($row['kb_description']);
			$this->kb_date = $row['kb_date'];
			$this->status = $row['status'];
			$this->parent_id = $this->Unescape($row['parent_id']);
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
	* @return array $es_knowledge_baseList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_knowledge_base` ";
		$es_knowledge_baseList = Array();
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
			$sortBy = "es_knowledge_baseid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_knowledge_base = new $thisObjectName();
			$es_knowledge_base->es_knowledge_baseId = $row['es_knowledge_baseid'];
			$es_knowledge_base->kb_category = $this->Unescape($row['kb_category']);
			$es_knowledge_base->kb_description = $this->Unescape($row['kb_description']);
			$es_knowledge_base->kb_date = $row['kb_date'];
			$es_knowledge_base->status = $row['status'];
			$es_knowledge_base->parent_id = $this->Unescape($row['parent_id']);
			$es_knowledge_base->created_by = $this->Unescape($row['created_by']);
			$es_knowledge_baseList[] = $es_knowledge_base;
		}
		return $es_knowledge_baseList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_knowledge_baseId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_knowledge_baseid` from `es_knowledge_base` where `es_knowledge_baseid`='".$this->es_knowledge_baseId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_knowledge_base` set 
			`kb_category`='".$this->Escape($this->kb_category)."', 
			`kb_description`='".$this->Escape($this->kb_description)."', 
			`kb_date`='".$this->kb_date."', 
			`status`='".$this->status."', 
			`parent_id`='".$this->Escape($this->parent_id)."', 
			`created_by`='".$this->Escape($this->created_by)."' where `es_knowledge_baseid`='".$this->es_knowledge_baseId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_knowledge_base` (`kb_category`, `kb_description`, `kb_date`, `status`, `parent_id`, `created_by` ) values (
			'".$this->Escape($this->kb_category)."', 
			'".$this->Escape($this->kb_description)."', 
			'".$this->kb_date."', 
			'".$this->status."', 
			'".$this->Escape($this->parent_id)."', 
			'".$this->Escape($this->created_by)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_knowledge_baseId == "")
		{
			$this->es_knowledge_baseId = $insertId;
		}
		return $this->es_knowledge_baseId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_knowledge_baseId
	*/
	function SaveNew()
	{
		$this->es_knowledge_baseId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_knowledge_base` where `es_knowledge_baseid`='".$this->es_knowledge_baseId."'";
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
			$pog_query = "delete from `es_knowledge_base` where ";
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