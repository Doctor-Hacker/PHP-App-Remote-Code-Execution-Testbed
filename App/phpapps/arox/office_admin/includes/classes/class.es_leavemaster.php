<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_leavemaster` (
	`es_leavemasterid` int(11) NOT NULL auto_increment,
	`lev_post` VARCHAR(255) NOT NULL,
	`lev_type` VARCHAR(255) NOT NULL,
	`lev_leavescount` VARCHAR(255) NOT NULL,
	`lev_carryforward` VARCHAR(255) NOT NULL,
	`lev_days` VARCHAR(255) NOT NULL,
	`lev_enchashable` VARCHAR(255) NOT NULL,
	`lev_dept` VARCHAR(255) NOT NULL,
	`lev_from_date` DATE NOT NULL,
	`lev_to_date` DATE NOT NULL, PRIMARY KEY  (`es_leavemasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_leavemaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_leavemaster&attributeList=array+%28%0A++0+%3D%3E+%27lev_post%27%2C%0A++1+%3D%3E+%27lev_type%27%2C%0A++2+%3D%3E+%27lev_leavescount%27%2C%0A++3+%3D%3E+%27lev_carryforward%27%2C%0A++4+%3D%3E+%27lev_days%27%2C%0A++5+%3D%3E+%27lev_enchashable%27%2C%0A++6+%3D%3E+%27lev_dept%27%2C%0A++7+%3D%3E+%27lev_from_date%27%2C%0A++8+%3D%3E+%27lev_to_date%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27DATE%27%2C%0A++8+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_leavemaster extends POG_Base
{
	public $es_leavemasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $lev_post;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lev_type;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lev_leavescount;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lev_carryforward;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lev_days;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lev_enchashable;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lev_dept;
	
	/**
	 * @var DATE
	 */
	public $lev_from_date;
	
	/**
	 * @var DATE
	 */
	public $lev_to_date;
	
	public $pog_attribute_type = array(
		"es_leavemasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"lev_post" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lev_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lev_leavescount" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lev_carryforward" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lev_days" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lev_enchashable" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lev_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lev_from_date" => array('db_attributes' => array("NUMERIC", "DATE")),
		"lev_to_date" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_leavemaster($lev_post='', $lev_type='', $lev_leavescount='', $lev_carryforward='', $lev_days='', $lev_enchashable='', $lev_dept='', $lev_from_date='', $lev_to_date='')
	{
		$this->lev_post = $lev_post;
		$this->lev_type = $lev_type;
		$this->lev_leavescount = $lev_leavescount;
		$this->lev_carryforward = $lev_carryforward;
		$this->lev_days = $lev_days;
		$this->lev_enchashable = $lev_enchashable;
		$this->lev_dept = $lev_dept;
		$this->lev_from_date = $lev_from_date;
		$this->lev_to_date = $lev_to_date;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_leavemasterId 
	* @return object $es_leavemaster
	*/
	function Get($es_leavemasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_leavemaster` where `es_leavemasterid`='".intval($es_leavemasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_leavemasterId = $row['es_leavemasterid'];
			$this->lev_post = $this->Unescape($row['lev_post']);
			$this->lev_type = $this->Unescape($row['lev_type']);
			$this->lev_leavescount = $this->Unescape($row['lev_leavescount']);
			$this->lev_carryforward = $this->Unescape($row['lev_carryforward']);
			$this->lev_days = $this->Unescape($row['lev_days']);
			$this->lev_enchashable = $this->Unescape($row['lev_enchashable']);
			$this->lev_dept = $this->Unescape($row['lev_dept']);
			$this->lev_from_date = $row['lev_from_date'];
			$this->lev_to_date = $row['lev_to_date'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_leavemasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
	     
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_leavemaster` ";
		$es_leavemasterList = Array();
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
						/****prabhakar */
						if (strstr($value, ' AND ')) {
							list($d1, $d2 ) = explode('AND',$value);
							$value =  "   " . $d1 . "'   AND  '" . $d2;
						} 
						/****prabhakar ****/
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
			$sortBy = "es_leavemasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_leavemaster = new $thisObjectName();
			$es_leavemaster->es_leavemasterId = $row['es_leavemasterid'];
			$es_leavemaster->lev_post = $this->Unescape($row['lev_post']);
			$es_leavemaster->lev_type = $this->Unescape($row['lev_type']);
			$es_leavemaster->lev_leavescount = $this->Unescape($row['lev_leavescount']);
			$es_leavemaster->lev_carryforward = $this->Unescape($row['lev_carryforward']);
			$es_leavemaster->lev_days = $this->Unescape($row['lev_days']);
			$es_leavemaster->lev_enchashable = $this->Unescape($row['lev_enchashable']);
			$es_leavemaster->lev_dept = $this->Unescape($row['lev_dept']);
			$es_leavemaster->lev_from_date = $row['lev_from_date'];
			$es_leavemaster->lev_to_date = $row['lev_to_date'];
			$es_leavemasterList[] = $es_leavemaster;
		}
		return $es_leavemasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_leavemasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_leavemasterid` from `es_leavemaster` where `es_leavemasterid`='".$this->es_leavemasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_leavemaster` set 
			`lev_post`='".$this->Escape($this->lev_post)."', 
			`lev_type`='".$this->Escape($this->lev_type)."', 
			`lev_leavescount`='".$this->Escape($this->lev_leavescount)."', 
			`lev_carryforward`='".$this->Escape($this->lev_carryforward)."', 
			`lev_days`='".$this->Escape($this->lev_days)."', 
			`lev_enchashable`='".$this->Escape($this->lev_enchashable)."', 
			`lev_dept`='".$this->Escape($this->lev_dept)."', 
			`lev_from_date`='".$this->lev_from_date."', 
			`lev_to_date`='".$this->lev_to_date."' where `es_leavemasterid`='".$this->es_leavemasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_leavemaster` (`lev_post`, `lev_type`, `lev_leavescount`, `lev_carryforward`, `lev_days`, `lev_enchashable`, `lev_dept`, `lev_from_date`, `lev_to_date` ) values (
			'".$this->Escape($this->lev_post)."', 
			'".$this->Escape($this->lev_type)."', 
			'".$this->Escape($this->lev_leavescount)."', 
			'".$this->Escape($this->lev_carryforward)."', 
			'".$this->Escape($this->lev_days)."', 
			'".$this->Escape($this->lev_enchashable)."', 
			'".$this->Escape($this->lev_dept)."', 
			'".$this->lev_from_date."', 
			'".$this->lev_to_date."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_leavemasterId == "")
		{
			$this->es_leavemasterId = $insertId;
		}
		return $this->es_leavemasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_leavemasterId
	*/
	function SaveNew()
	{
		$this->es_leavemasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_leavemaster` where `es_leavemasterid`='".$this->es_leavemasterId."'";
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
			$pog_query = "delete from `es_leavemaster` where ";
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