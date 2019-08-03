<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_attend_periods` (
	`es_attend_periodsid` int(11) NOT NULL auto_increment,
	`at_class` VARCHAR(255) NOT NULL,
	`at_no_periods` INT NOT NULL,
	`at_day` VARCHAR(255) NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_attend_periodsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_attend_periods</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_attend_periods&attributeList=array+%28%0A++0+%3D%3E+%27at_class%27%2C%0A++1+%3D%3E+%27at_no_periods%27%2C%0A++2+%3D%3E+%27at_day%27%2C%0A++3+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_attend_periods extends POG_Base
{
	public $es_attend_periodsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $at_class;
	
	/**
	 * @var INT
	 */
	public $at_no_periods;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_day;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_attend_periodsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"at_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_no_periods" => array('db_attributes' => array("NUMERIC", "INT")),
		"at_day" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
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
	
	function es_attend_periods($at_class='', $at_no_periods='', $at_day='', $status='')
	{
		$this->at_class = $at_class;
		$this->at_no_periods = $at_no_periods;
		$this->at_day = $at_day;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_attend_periodsId 
	* @return object $es_attend_periods
	*/
	function Get($es_attend_periodsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_attend_periods` where `es_attend_periodsid`='".intval($es_attend_periodsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_attend_periodsId = $row['es_attend_periodsid'];
			$this->at_class = $this->Unescape($row['at_class']);
			$this->at_no_periods = $this->Unescape($row['at_no_periods']);
			$this->at_day = $this->Unescape($row['at_day']);
			$this->status = $row['status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_attend_periodsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_attend_periods` ";
		$es_attend_periodsList = Array();
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
			$sortBy = "es_attend_periodsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_attend_periods = new $thisObjectName();
			$es_attend_periods->es_attend_periodsId = $row['es_attend_periodsid'];
			$es_attend_periods->at_class = $this->Unescape($row['at_class']);
			$es_attend_periods->at_no_periods = $this->Unescape($row['at_no_periods']);
			$es_attend_periods->at_day = $this->Unescape($row['at_day']);
			$es_attend_periods->status = $row['status'];
			$es_attend_periodsList[] = $es_attend_periods;
		}
		return $es_attend_periodsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_attend_periodsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_attend_periodsid` from `es_attend_periods` where `es_attend_periodsid`='".$this->es_attend_periodsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_attend_periods` set 
			`at_class`='".$this->Escape($this->at_class)."', 
			`at_no_periods`='".$this->Escape($this->at_no_periods)."', 
			`at_day`='".$this->Escape($this->at_day)."', 
			`status`='".$this->status."' where `es_attend_periodsid`='".$this->es_attend_periodsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_attend_periods` (`at_class`, `at_no_periods`, `at_day`, `status` ) values (
			'".$this->Escape($this->at_class)."', 
			'".$this->Escape($this->at_no_periods)."', 
			'".$this->Escape($this->at_day)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_attend_periodsId == "")
		{
			$this->es_attend_periodsId = $insertId;
		}
		return $this->es_attend_periodsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_attend_periodsId
	*/
	function SaveNew()
	{
		$this->es_attend_periodsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_attend_periods` where `es_attend_periodsid`='".$this->es_attend_periodsId."'";
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
			$pog_query = "delete from `es_attend_periods` where ";
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