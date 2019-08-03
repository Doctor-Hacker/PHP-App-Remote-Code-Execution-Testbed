<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_classes` (
	`es_classesid` int(11) NOT NULL auto_increment,
	`es_classname` VARCHAR(255) NOT NULL,
	`es_orderby` INT NOT NULL,
	`es_groupid` INT NOT NULL, PRIMARY KEY  (`es_classesid`)) ENGINE=MyISAM;
*/

/**
* <b>es_classes</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_classes&attributeList=array+%28%0A++0+%3D%3E+%27es_classname%27%2C%0A++1+%3D%3E+%27es_orderby%27%2C%0A++2+%3D%3E+%27es_groupId%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_classes extends POG_Base
{
	public $es_classesId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_classname;
	
	/**
	 * @var INT
	 */
	public $es_orderby;
	
	/**
	 * @var INT
	 */
	public $es_groupId;
	
	public $es_schoolId;
	
	public $pog_attribute_type = array(
		"es_classesId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_classname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_orderby" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_groupId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_schoolId" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_classes($es_classname='', $es_orderby='', $es_groupId='')
	{
		$this->es_classname = $es_classname;
		$this->es_orderby = $es_orderby;
		$this->es_groupId = $es_groupId;
		$this->es_schoolId = $es_schoolId;
		
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_classesId 
	* @return object $es_classes
	*/
	function Get($es_classesId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_classes` where `es_classesid`='".intval($es_classesId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_classesId = $row['es_classesid'];
			$this->es_classname = $this->Unescape($row['es_classname']);
			$this->es_orderby = $this->Unescape($row['es_orderby']);
			$this->es_groupId = $this->Unescape($row['es_groupid']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_classesList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_classes` ";
		$es_classesList = Array();
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
			$sortBy = "es_classesid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_classes = new $thisObjectName();
			$es_classes->es_classesId = $row['es_classesid'];
			$es_classes->es_classname = $this->Unescape($row['es_classname']);
			$es_classes->es_orderby = $this->Unescape($row['es_orderby']);
			$es_classes->es_groupId = $this->Unescape($row['es_groupid']);
			$es_classes->es_schoolId = $this->Unescape($row['es_schoolid']);
			$es_classesList[] = $es_classes;
		}
		return $es_classesList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_classesId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_classesid` from `es_classes` where `es_classesid`='".$this->es_classesId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_classes` set 
			`es_classname`='".$this->Escape($this->es_classname)."', 
			`es_orderby`='".$this->Escape($this->es_orderby)."', 
			`es_groupid`='".$this->Escape($this->es_groupId)."' where `es_classesid`='".$this->es_classesId."'";
		}
		else
		{
			 $this->pog_query = "insert into `es_classes` (`es_classname`, `es_orderby`, `es_groupid`,`es_schoolid` ) values (
			'".$this->Escape($this->es_classname)."', 
			'".$this->Escape($this->es_orderby)."', 
			'".$this->Escape($this->es_groupId)."',
			'".$this->Escape($this->es_schoolId)."')";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_classesId == "")
		{
			$this->es_classesId = $insertId;
		}
		return $this->es_classesId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_classesId
	*/
	function SaveNew()
	{
		$this->es_classesId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_classes` where `es_classesid`='".$this->es_classesId."'";
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
			$pog_query = "delete from `es_classes` where ";
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