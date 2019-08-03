<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_groups` (
	`es_groupsid` int(11) NOT NULL auto_increment,
	`es_groupname` VARCHAR(255) NOT NULL,
	`es_grouporderby` INT NOT NULL, PRIMARY KEY  (`es_groupsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_groups</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_groups&attributeList=array+%28%0A++0+%3D%3E+%27es_groupname%27%2C%0A++1+%3D%3E+%27es_grouporderby%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_schools extends POG_Base
{
	public $school_id = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $school_name;
	
	/**
	 * @var INT
	 */
	public $group_id;
	
	public $pog_attribute_type = array(
		"school_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"school_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"group_id" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_schools($es_classname='', $es_orderby='', $es_groupId='')
	{
		$this->school_name = $es_classname;
		//$this->es_orderby = $es_orderby;
		$this->group_id = $es_groupId;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_groupsId 
	* @return object $es_groups
	*/
	function Get($es_schoolsid)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_schools` where `es_schoolsid`='".intval($es_schoolsid)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_schoolsid = $row['es_schoolsid'];
			$this->es_schoolname = $this->Unescape($row['es_schoolname']);
			$this->es_schoolorderby = $this->Unescape($row['es_schoolorderby']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_groupsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_schools` ";
		$es_schoolList = Array();
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
			$sortBy = "school_id";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_school = new $thisObjectName();
			$es_school->school_id = $row['school_id'];
			$es_school->school_name = $this->Unescape($row['school_name']);
			//$es_classes->es_orderby = $this->Unescape($row['es_orderby']);
			$es_school->group_id = $this->Unescape($row['group_id']);
			$es_schoolList[] = $es_school;
		}
		return $es_schoolList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_groupsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `school_id` from `es_schools` where `school_id`='".$this->school_id."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_schools` set 
			`school_name`='".$this->Escape($this->school_name)."', 
			`group_id`='".$this->Escape($this->group_id)."' where `school_id`='".$this->school_id."'";
		}
		else
		{
			$this->pog_query = "insert into `es_schools` (`school_name`,`group_id` ) values (
			'".$this->Escape($this->school_name)."', 
			'".$this->Escape($this->group_id)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->school_id == "")
		{
			$this->school_id = $insertId;
		}
		return $this->school_id;
	}
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_groupsId
	*/
function SaveNew()
	{
		$this->school_id = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_schools` where `school_id`='".$this->school_id."'";
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
			$pog_query = "delete from `es_schools` where ";
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