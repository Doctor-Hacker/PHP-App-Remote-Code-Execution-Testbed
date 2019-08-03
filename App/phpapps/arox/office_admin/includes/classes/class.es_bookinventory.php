<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_inventory` (
	`es_inventoryid` int(11) NOT NULL auto_increment,
	`in_inventory_name` VARCHAR(255) NOT NULL,
	`in_short_name` VARCHAR(255) NOT NULL,
	`in_description` VARCHAR(255) NOT NULL,
	`status` ENUM('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_inventoryid`)) ENGINE=MyISAM;
*/

/**
* <b>es_inventory</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_inventory&attributeList=array+%28%0A++0+%3D%3E+%27in_inventory_name%27%2C%0A++1+%3D%3E+%27in_short_name%27%2C%0A++2+%3D%3E+%27in_description%27%2C%0A++3+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27ENUM%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_bookinventory extends POG_Base
{
	public $es_in_bookinventoryId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $fld_bookinventoryname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_shortname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_description;
	
	/**
	 * @var ENUM('active', 'inactive', 'deleted')
	 */
	public $fld_status;
	
	public $pog_attribute_type = array(
		"es_in_bookinventoryId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_bookinventoryname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_shortname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_description" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
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
	
	function es_bookinventory($fld_bookinventoryname='', $fld_shortname='', $fld_description='', $fld_status='')
	{
		$this->fld_bookinventoryname = $fld_bookinventoryname;
		$this->fld_shortname = $fld_shortname;
		$this->fld_description = $fld_description;
		$this->fld_status = $fld_status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_inventoryId 
	* @return object $es_inventory
	*/
	function Get($es_in_bookinventoryId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_bookinventory` where `es_bookinventoryid`='".intval($es_in_bookinventoryId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_in_bookinventoryId = $row['es_bookinventoryid'];
			$this->fld_bookinventoryname = $this->Unescape($row['fld_bookinventoryname']);
			$this->fld_shortname = $this->Unescape($row['fld_shortname']);
			$this->fld_description = $this->Unescape($row['fld_description']);
			$this->fld_status = $row['fld_status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_inventoryList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_bookinventory` ";
		$es_inventoryList = Array();
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
			$sortBy = "es_bookinventoryid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_bookinventory = new $thisObjectName();
			$es_bookinventory->es_in_bookinventoryId = $row['es_bookinventoryid'];
			$es_bookinventory->fld_bookinventoryname = $this->Unescape($row['fld_bookinventoryname']);
			$es_bookinventory->fld_shortname = $this->Unescape($row['fld_shortname']);
			$es_bookinventory->fld_description = $this->Unescape($row['fld_description']);
			$es_bookinventory->fld_status = $row['fld_status'];
			$es_bookinventory[] = $es_bookinventory;
		}
		return $es_inventoryList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_inventoryId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_bookinventoryid` from `es_bookinventory` where `es_bookinventoryid`='".$this->es_in_bookinventoryId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_bookinventory` set 
			`fld_bookinventoryname`='".$this->Escape($this->fld_bookinventoryname)."', 
			`fld_shortname`='".$this->Escape($this->fld_shortname)."', 
			`fld_description`='".$this->Escape($this->fld_description)."', 
			`fld_status`='".$this->fld_status."' where `es_bookinventoryid`='".$this->es_bookinventoryId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_bookinventory` (`fld_bookinventoryname`, `fld_shortname`, `fld_description`, `fld_status` ) values (
			'".$this->Escape($this->fld_bookinventoryname)."', 
			'".$this->Escape($this->fld_shortname)."', 
			'".$this->Escape($this->fld_description)."', 
			'".$this->fld_status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_in_bookinventoryId == "")
		{
			$this->es_in_bookinventoryId = $insertId;
		}
		return $this->es_in_bookinventoryId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_inventoryId
	*/
	function SaveNew()
	{
		$this->es_in_bookinventoryId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_bookinventory` where `es_bookinventoryid`='".$this->es_in_bookinventoryId."'";
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
			$pog_query = "delete from `es_bookinventory` where ";
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
