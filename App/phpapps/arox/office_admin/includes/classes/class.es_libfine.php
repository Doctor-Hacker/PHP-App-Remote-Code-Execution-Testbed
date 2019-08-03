<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_libfine` (
	`es_libfineid` int(11) NOT NULL auto_increment,
	`es_libfinenoofdays` VARCHAR(255) NOT NULL,
	`es_libfineamount` VARCHAR(255) NOT NULL,
	`es_libfineduration` VARCHAR(255) NOT NULL,
	`es_libfinefor` VARCHAR(255) NOT NULL,
	`status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_libfineid`)) ENGINE=MyISAM;
*/

/**
* <b>es_libfine</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_libfine&attributeList=array+%28%0A++0+%3D%3E+%27es_libfinenoofdays%27%2C%0A++1+%3D%3E+%27es_libfineamount%27%2C%0A++2+%3D%3E+%27es_libfineduration%27%2C%0A++3+%3D%3E+%27es_libfinefor%27%2C%0A++4+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_libfine extends POG_Base
{
	public $es_libfineId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_libfinenoofdays;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_libfineamount;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_libfineduration;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_libfinefor;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_libfineId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_libfinenoofdays" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_libfineamount" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_libfineduration" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_libfinefor" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive'")),
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
	
	function es_libfine($es_libfinenoofdays='', $es_libfineamount='', $es_libfineduration='', $es_libfinefor='', $status='')
	{
		$this->es_libfinenoofdays = $es_libfinenoofdays;
		$this->es_libfineamount = $es_libfineamount;
		$this->es_libfineduration = $es_libfineduration;
		$this->es_libfinefor = $es_libfinefor;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_libfineId 
	* @return object $es_libfine
	*/
	function Get($es_libfineId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libfine` where `es_libfineid`='".intval($es_libfineId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libfineId = $row['es_libfineid'];
			$this->es_libfinenoofdays = $this->Unescape($row['es_libfinenoofdays']);
			$this->es_libfineamount = $this->Unescape($row['es_libfineamount']);
			$this->es_libfineduration = $this->Unescape($row['es_libfineduration']);
			$this->es_libfinefor = $this->Unescape($row['es_libfinefor']);
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
	* @return array $es_libfineList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_libfine` ";
		$es_libfineList = Array();
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
			$sortBy = "es_libfineid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_libfine = new $thisObjectName();
			$es_libfine->es_libfineId = $row['es_libfineid'];
			$es_libfine->es_libfinenoofdays = $this->Unescape($row['es_libfinenoofdays']);
			$es_libfine->es_libfineamount = $this->Unescape($row['es_libfineamount']);
			$es_libfine->es_libfineduration = $this->Unescape($row['es_libfineduration']);
			$es_libfine->es_libfinefor = $this->Unescape($row['es_libfinefor']);
			$es_libfine->status = $row['status'];
			$es_libfineList[] = $es_libfine;
		}
		return $es_libfineList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_libfineId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_libfineid` from `es_libfine` where `es_libfineid`='".$this->es_libfineId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_libfine` set 
			`es_libfinenoofdays`='".$this->Escape($this->es_libfinenoofdays)."', 
			`es_libfineamount`='".$this->Escape($this->es_libfineamount)."', 
			`es_libfineduration`='".$this->Escape($this->es_libfineduration)."', 
			`es_libfinefor`='".$this->Escape($this->es_libfinefor)."', 
			`status`='".$this->status."' where `es_libfineid`='".$this->es_libfineId."'";
			
		}
		else
		{
			$this->pog_query = "insert into `es_libfine` (`es_libfinenoofdays`, `es_libfineamount`, `es_libfineduration`, `es_libfinefor`, `status` ) values (
			'".$this->Escape($this->es_libfinenoofdays)."', 
			'".$this->Escape($this->es_libfineamount)."', 
			'".$this->Escape($this->es_libfineduration)."', 
			'".$this->Escape($this->es_libfinefor)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_libfineId == "")
		{
			$this->es_libfineId = $insertId;
		}
		return $this->es_libfineId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_libfineId
	*/
	function SaveNew()
	{
		$this->es_libfineId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_libfine` where `es_libfineid`='".$this->es_libfineId."'";
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
			$pog_query = "delete from `es_libfine` where ";
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