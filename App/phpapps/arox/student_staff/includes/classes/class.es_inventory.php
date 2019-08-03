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
class es_inventory extends POG_Base
{
	public $es_inventoryId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $in_inventory_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_short_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_description;
	
	/**
	 * @var ENUM('active', 'inactive', 'deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_inventoryId" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_inventory_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_short_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_description" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_inventory($in_inventory_name='', $in_short_name='', $in_description='', $status='')
	{
		$this->in_inventory_name = $in_inventory_name;
		$this->in_short_name = $in_short_name;
		$this->in_description = $in_description;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_inventoryId 
	* @return object $es_inventory
	*/
	function Get($es_inventoryId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_inventory` where `es_inventoryid`='".intval($es_inventoryId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_inventoryId = $row['es_inventoryid'];
			$this->in_inventory_name = $this->Unescape($row['in_inventory_name']);
			$this->in_short_name = $this->Unescape($row['in_short_name']);
			$this->in_description = $this->Unescape($row['in_description']);
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
	* @return array $es_inventoryList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_inventory` ";
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
			$sortBy = "es_inventoryid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_inventory = new $thisObjectName();
			$es_inventory->es_inventoryId = $row['es_inventoryid'];
			$es_inventory->in_inventory_name = $this->Unescape($row['in_inventory_name']);
			$es_inventory->in_short_name = $this->Unescape($row['in_short_name']);
			$es_inventory->in_description = $this->Unescape($row['in_description']);
			$es_inventory->status = $row['status'];
			$es_inventoryList[] = $es_inventory;
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
		$this->pog_query = "select `es_inventoryid` from `es_inventory` where `es_inventoryid`='".$this->es_inventoryId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_inventory` set 
			`in_inventory_name`='".$this->Escape($this->in_inventory_name)."', 
			`in_short_name`='".$this->Escape($this->in_short_name)."', 
			`in_description`='".$this->Escape($this->in_description)."', 
			`status`='".$this->status."' where `es_inventoryid`='".$this->es_inventoryId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_inventory` (`in_inventory_name`, `in_short_name`, `in_description`, `status` ) values (
			'".$this->Escape($this->in_inventory_name)."', 
			'".$this->Escape($this->in_short_name)."', 
			'".$this->Escape($this->in_description)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_inventoryId == "")
		{
			$this->es_inventoryId = $insertId;
		}
		return $this->es_inventoryId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_inventoryId
	*/
	function SaveNew()
	{
		$this->es_inventoryId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_inventory` where `es_inventoryid`='".$this->es_inventoryId."'";
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
			$pog_query = "delete from `es_inventory` where ";
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
