<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_departments` (
	`es_departmentsid` int(11) NOT NULL auto_increment,
	`es_deptname` VARCHAR(255) NOT NULL,
	`es_orderby` INT NOT NULL,
	`es_groupid` INT NOT NULL, PRIMARY KEY  (`es_departmentsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_departments</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_departments&attributeList=array+%28%0A++0+%3D%3E+%27es_deptname%27%2C%0A++1+%3D%3E+%27es_orderby%27%2C%0A++2+%3D%3E+%27es_groupid%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_departments extends POG_Base
{
	public $es_departmentsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_deptname;
	
	/**
	 * @var INT
	 */
	public $es_orderby;
	
	/**
	 * @var INT
	 */
	public $es_groupid;
	
	public $pog_attribute_type = array(
		"es_departmentsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_deptname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_orderby" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_groupid" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_departments($es_deptname='', $es_orderby='', $es_groupid='')
	{
		$this->es_deptname = $es_deptname;
		$this->es_orderby = $es_orderby;
		$this->es_groupid = $es_groupid;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_departmentsId 
	* @return object $es_departments
	*/
	function Get($es_departmentsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_departments` where `es_departmentsid`='".intval($es_departmentsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_departmentsId = $row['es_departmentsid'];
			$this->es_deptname = $this->Unescape($row['es_deptname']);
			$this->es_orderby = $this->Unescape($row['es_orderby']);
			$this->es_groupid = $this->Unescape($row['es_groupid']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_departmentsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_departments` ";
		$es_departmentsList = Array();
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
			$sortBy = "es_departmentsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_departments = new $thisObjectName();
			$es_departments->es_departmentsId = $row['es_departmentsid'];
			$es_departments->es_deptname = $this->Unescape($row['es_deptname']);
			$es_departments->es_orderby = $this->Unescape($row['es_orderby']);
			$es_departments->es_groupid = $this->Unescape($row['es_groupid']);
			$es_departmentsList[] = $es_departments;
		}
		return $es_departmentsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_departmentsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_departmentsid` from `es_departments` where `es_departmentsid`='".$this->es_departmentsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_departments` set 
			`es_deptname`='".$this->Escape($this->es_deptname)."', 
			`es_orderby`='".$this->Escape($this->es_orderby)."', 
			`es_groupid`='".$this->Escape($this->es_groupid)."' where `es_departmentsid`='".$this->es_departmentsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_departments` (`es_deptname`, `es_orderby`, `es_groupid` ) values (
			'".$this->Escape($this->es_deptname)."', 
			'".$this->Escape($this->es_orderby)."', 
			'".$this->Escape($this->es_groupid)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_departmentsId == "")
		{
			$this->es_departmentsId = $insertId;
		}
		return $this->es_departmentsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_departmentsId
	*/
	function SaveNew()
	{
		$this->es_departmentsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_departments` where `es_departmentsid`='".$this->es_departmentsId."'";
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
			$pog_query = "delete from `es_departments` where ";
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