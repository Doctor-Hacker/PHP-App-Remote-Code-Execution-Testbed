<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_in_item_master` (
	`es_in_item_masterid` int(11) NOT NULL auto_increment,
	`in_item_code` VARCHAR(255) NOT NULL,
	`in_item_name` VARCHAR(255) NOT NULL,
	`in_inventory_id` INT NOT NULL,
	`in_category_id` INT NOT NULL,
	`in_qty_available` FLOAT NOT NULL,
	`in_reorder_level` FLOAT NOT NULL,
	`in_quantity_issued` FLOAT NOT NULL,
	`in_last_recieved_date` DATETIME NOT NULL,
	`in_last_issued_date` DATETIME NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL,
	`in_units` VARCHAR(255) NOT NULL,
	`cost` BIGINT NOT NULL,
	`test` VARCHAR(255) NOT NULL,
	`test1` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_in_item_masterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_in_item_master</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_in_item_master&attributeList=array+%28%0A++0+%3D%3E+%27in_item_code%27%2C%0A++1+%3D%3E+%27in_item_name%27%2C%0A++2+%3D%3E+%27in_inventory_id%27%2C%0A++3+%3D%3E+%27in_category_id%27%2C%0A++4+%3D%3E+%27in_qty_available%27%2C%0A++5+%3D%3E+%27in_reorder_level%27%2C%0A++6+%3D%3E+%27in_quantity_issued%27%2C%0A++7+%3D%3E+%27in_last_recieved_date%27%2C%0A++8+%3D%3E+%27in_last_issued_date%27%2C%0A++9+%3D%3E+%27status%27%2C%0A++10+%3D%3E+%27in_units%27%2C%0A++11+%3D%3E+%27cost%27%2C%0A++12+%3D%3E+%27test%27%2C%0A++13+%3D%3E+%27test1%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27FLOAT%27%2C%0A++5+%3D%3E+%27FLOAT%27%2C%0A++6+%3D%3E+%27FLOAT%27%2C%0A++7+%3D%3E+%27DATETIME%27%2C%0A++8+%3D%3E+%27DATETIME%27%2C%0A++9+%3D%3E+%27enum%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%2C+%5C%27deleted%5C%27%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27BIGINT%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_in_item_master extends POG_Base
{
	public $es_in_item_masterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $in_item_code;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_item_name;
	
	/**
	 * @var INT
	 */
	public $in_inventory_id;
	
	/**
	 * @var INT
	 */
	public $in_category_id;
	
	/**
	 * @var FLOAT
	 */
	public $in_qty_available;
	
	/**
	 * @var FLOAT
	 */
	public $in_reorder_level;
	
	/**
	 * @var FLOAT
	 */
	public $in_quantity_issued;
	
	/**
	 * @var DATETIME
	 */
	public $in_last_recieved_date;
	
	/**
	 * @var DATETIME
	 */
	public $in_last_issued_date;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_units;
	
	/**
	 * @var BIGINT
	 */
	public $cost;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $test;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $test1;
	
	public $pog_attribute_type = array(
		"es_in_item_masterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_item_code" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_item_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_inventory_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_category_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_qty_available" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"in_reorder_level" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"in_quantity_issued" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"in_last_recieved_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"in_last_issued_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"in_units" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cost" => array('db_attributes' => array("NUMERIC", "BIGINT")),
		"test" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"test1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_in_item_master($in_item_code='', $in_item_name='', $in_inventory_id='', $in_category_id='', $in_qty_available='', $in_reorder_level='', $in_quantity_issued='', $in_last_recieved_date='', $in_last_issued_date='', $status='', $in_units='', $cost='', $test='', $test1='')
	{
		$this->in_item_code = $in_item_code;
		$this->in_item_name = $in_item_name;
		$this->in_inventory_id = $in_inventory_id;
		$this->in_category_id = $in_category_id;
		$this->in_qty_available = $in_qty_available;
		$this->in_reorder_level = $in_reorder_level;
		$this->in_quantity_issued = $in_quantity_issued;
		$this->in_last_recieved_date = $in_last_recieved_date;
		$this->in_last_issued_date = $in_last_issued_date;
		$this->status = $status;
		$this->in_units = $in_units;
		$this->cost = $cost;
		$this->test = $test;
		$this->test1 = $test1;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_in_item_masterId 
	* @return object $es_in_item_master
	*/
	function Get($es_in_item_masterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_in_item_master` where `es_in_item_masterid`='".intval($es_in_item_masterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_in_item_masterId = $row['es_in_item_masterid'];
			$this->in_item_code = $this->Unescape($row['in_item_code']);
			$this->in_item_name = $this->Unescape($row['in_item_name']);
			$this->in_inventory_id = $this->Unescape($row['in_inventory_id']);
			$this->in_category_id = $this->Unescape($row['in_category_id']);
			$this->in_qty_available = $this->Unescape($row['in_qty_available']);
			$this->in_reorder_level = $this->Unescape($row['in_reorder_level']);
			$this->in_quantity_issued = $this->Unescape($row['in_quantity_issued']);
			$this->in_last_recieved_date = $row['in_last_recieved_date'];
			$this->in_last_issued_date = $row['in_last_issued_date'];
			$this->status = $row['status'];
			$this->in_units = $this->Unescape($row['in_units']);
			$this->cost = $this->Unescape($row['cost']);
			$this->test = $this->Unescape($row['test']);
			$this->test1 = $this->Unescape($row['test1']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_in_item_masterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_in_item_master` ";
		$es_in_item_masterList = Array();
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
			$sortBy = "es_in_item_masterid";
		}
$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";

		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_in_item_master = new $thisObjectName();
			$es_in_item_master->es_in_item_masterId = $row['es_in_item_masterid'];
			$es_in_item_master->in_item_code = $this->Unescape($row['in_item_code']);
			$es_in_item_master->in_item_name = $this->Unescape($row['in_item_name']);
			$es_in_item_master->in_inventory_id = $this->Unescape($row['in_inventory_id']);
			$es_in_item_master->in_category_id = $this->Unescape($row['in_category_id']);
			$es_in_item_master->in_qty_available = $this->Unescape($row['in_qty_available']);
			$es_in_item_master->in_reorder_level = $this->Unescape($row['in_reorder_level']);
			$es_in_item_master->in_quantity_issued = $this->Unescape($row['in_quantity_issued']);
			$es_in_item_master->in_last_recieved_date = $row['in_last_recieved_date'];
			$es_in_item_master->in_last_issued_date = $row['in_last_issued_date'];
			$es_in_item_master->status = $row['status'];
			$es_in_item_master->in_units = $this->Unescape($row['in_units']);
			$es_in_item_master->cost = $this->Unescape($row['cost']);
			$es_in_item_master->test = $this->Unescape($row['test']);
			$es_in_item_master->test1 = $this->Unescape($row['test1']);
			$es_in_item_masterList[] = $es_in_item_master;
		}
		return $es_in_item_masterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_in_item_masterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_in_item_masterid` from `es_in_item_master` where `es_in_item_masterid`='".$this->es_in_item_masterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_in_item_master` set 
			`in_item_code`='".$this->Escape($this->in_item_code)."', 
			`in_item_name`='".$this->Escape($this->in_item_name)."', 
			`in_inventory_id`='".$this->Escape($this->in_inventory_id)."', 
			`in_category_id`='".$this->Escape($this->in_category_id)."', 
			`in_qty_available`='".$this->Escape($this->in_qty_available)."', 
			`in_reorder_level`='".$this->Escape($this->in_reorder_level)."', 
			`in_quantity_issued`='".$this->Escape($this->in_quantity_issued)."', 
			`in_last_recieved_date`='".$this->in_last_recieved_date."', 
			`in_last_issued_date`='".$this->in_last_issued_date."', 
			`status`='".$this->status."', 
			`in_units`='".$this->Escape($this->in_units)."', 
			`cost`='".$this->Escape($this->cost)."', 
			`test`='".$this->Escape($this->test)."', 
			`test1`='".$this->Escape($this->test1)."' where `es_in_item_masterid`='".$this->es_in_item_masterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_in_item_master` (`in_item_code`, `in_item_name`, `in_inventory_id`, `in_category_id`, `in_qty_available`, `in_reorder_level`, `in_quantity_issued`, `in_last_recieved_date`, `in_last_issued_date`, `status`, `in_units`, `cost`, `test`, `test1` ) values (
			'".$this->Escape($this->in_item_code)."', 
			'".$this->Escape($this->in_item_name)."', 
			'".$this->Escape($this->in_inventory_id)."', 
			'".$this->Escape($this->in_category_id)."', 
			'".$this->Escape($this->in_qty_available)."', 
			'".$this->Escape($this->in_reorder_level)."', 
			'".$this->Escape($this->in_quantity_issued)."', 
			'".$this->in_last_recieved_date."', 
			'".$this->in_last_issued_date."', 
			'".$this->status."', 
			'".$this->Escape($this->in_units)."', 
			'".$this->Escape($this->cost)."', 
			'".$this->Escape($this->test)."', 
			'".$this->Escape($this->test1)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_in_item_masterId == "")
		{
			$this->es_in_item_masterId = $insertId;
		}
		return $this->es_in_item_masterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_in_item_masterId
	*/
	function SaveNew()
	{
		$this->es_in_item_masterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_in_item_master` where `es_in_item_masterid`='".$this->es_in_item_masterId."'";
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
			$pog_query = "delete from `es_in_item_master` where ";
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