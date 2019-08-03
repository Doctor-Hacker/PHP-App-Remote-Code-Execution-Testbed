<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_itembook_master` (
	`fld_item_masterid` int(11) NOT NULL auto_increment,
	`fld_item_code` VARCHAR(255) NOT NULL,
	`fld_item_name` VARCHAR(255) NOT NULL,
	`fld_inventory_id` INT NOT NULL,
	`fld_category_id` INT NOT NULL,
	`fld_qty_available` FLOAT NOT NULL,
	`fld_reorder_level` FLOAT NOT NULL,
	`fld_quantity_issued` FLOAT NOT NULL,
	`fld_last_recieved_date` DATETIME NOT NULL,
	`fld_last_issued_date` DATETIME NOT NULL,
	`fld_status` enum('active', 'inactive', 'deleted') NOT NULL,
	`fld_units` VARCHAR(255) NOT NULL,
	`fld_cost` BIGINT NOT NULL,
	`fld_test` VARCHAR(255) NOT NULL,
	`fld_test1` VARCHAR(255) NOT NULL, PRIMARY KEY  (`fld_item_masterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_itembook_master</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_itembook_master&attributeList=array+%28%0A++0+%3D%3E+%27fld_item_code%27%2C%0A++1+%3D%3E+%27fld_item_name%27%2C%0A++2+%3D%3E+%27fld_inventory_id%27%2C%0A++3+%3D%3E+%27fld_category_id%27%2C%0A++4+%3D%3E+%27fld_qty_available%27%2C%0A++5+%3D%3E+%27fld_reorder_level%27%2C%0A++6+%3D%3E+%27fld_quantity_issued%27%2C%0A++7+%3D%3E+%27fld_last_recieved_date%27%2C%0A++8+%3D%3E+%27fld_last_issued_date%27%2C%0A++9+%3D%3E+%27fld_status%27%2C%0A++10+%3D%3E+%27fld_units%27%2C%0A++11+%3D%3E+%27fld_cost%27%2C%0A++12+%3D%3E+%27fld_test%27%2C%0A++13+%3D%3E+%27fld_test1%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27FLOAT%27%2C%0A++5+%3D%3E+%27FLOAT%27%2C%0A++6+%3D%3E+%27FLOAT%27%2C%0A++7+%3D%3E+%27DATETIME%27%2C%0A++8+%3D%3E+%27DATETIME%27%2C%0A++9+%3D%3E+%27enum%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%2C+%5C%27deleted%5C%27%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27BIGINT%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_itembook_master extends POG_Base
{
	public $fld_in_item_masterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $fld_item_code;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_item_name;
	
	/**
	 * @var INT
	 */
	public $fld_inventory_id;
	
	/**
	 * @var INT
	 */
	public $fld_category_id;
	
	/**
	 * @var FLOAT
	 */
	public $fld_qty_available;
	
	/**
	 * @var FLOAT
	 */
	public $fld_reorder_level;
	
	/**
	 * @var FLOAT
	 */
	public $fld_quantity_issued;
	
	/**
	 * @var DATETIME
	 */
	public $fld_last_recieved_date;
	
	/**
	 * @var DATETIME
	 */
	public $fld_last_issued_date;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $fld_status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_units;
	
	/**
	 * @var BIGINT
	 */
	public $fld_cost;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_test;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_test1;
	
	/**
	 * @var VARCHAR(255)
	 */
	//public $fld_publication;
	
	public $pog_attribute_type = array(
		"fld_in_item_masterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_item_code" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_item_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_inventory_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_category_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_qty_available" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"fld_reorder_level" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"fld_quantity_issued" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"fld_last_recieved_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"fld_last_issued_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"fld_status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"fld_units" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_cost" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_test" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_test1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		//"fld_publication" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_itembook_master($fld_item_code='', $fld_item_name='', $fld_inventory_id='', $fld_category_id='', $fld_qty_available='', $fld_reorder_level='', $fld_quantity_issued='', $fld_last_recieved_date='', $fld_last_issued_date='', $fld_status='', $fld_units='', $fld_cost='', $fld_test='', $fld_test1='')
	{
		$this->fld_item_code = $fld_item_code;
		$this->fld_item_name = $fld_item_name;
		$this->fld_inventory_id = $fld_inventory_id;
		$this->fld_category_id = $fld_category_id;
		$this->fld_qty_available = $fld_qty_available;
		$this->fld_reorder_level = $fld_reorder_level;
		$this->fld_quantity_issued = $fld_quantity_issued;
		$this->fld_last_recieved_date = $fld_last_recieved_date;
		$this->fld_last_issued_date = $fld_last_issued_date;
		$this->fld_status = $fld_status;
		$this->fld_units = $fld_units;
		$this->fld_cost = $fld_cost;
		$this->fld_test = $fld_test;
		$this->fld_test1 = $fld_test1;
		//$this->fld_publication = $fld_publication;
	}
	
	
	/**
	* Gets object from database
	* @param integer $fld_item_masterid 
	* @return object $es_itembook_master
	*/
	function Get($fld_in_item_masterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_itembook_master` where `fld_item_masterid`='".intval($fld_in_item_masterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->fld_in_item_masterId = $row['fld_item_masterid'];
			$this->fld_item_code = $this->Unescape($row['fld_item_code']);
			$this->fld_item_name = $this->Unescape($row['fld_item_name']);
			$this->fld_inventory_id = $this->Unescape($row['fld_inventory_id']);
			$this->fld_category_id = $this->Unescape($row['fld_category_id']);
			$this->fld_qty_available = $this->Unescape($row['fld_qty_available']);
			$this->fld_reorder_level = $this->Unescape($row['fld_reorder_level']);
			$this->fld_quantity_issued = $this->Unescape($row['fld_quantity_issued']);
			$this->fld_last_recieved_date = $row['fld_last_recieved_date'];
			$this->fld_last_issued_date = $row['fld_last_issued_date'];
			$this->fld_status = $row['fld_status'];
			$this->fld_units = $this->Unescape($row['fld_units']);
			$this->fld_cost = $this->Unescape($row['fld_cost']);
			$this->fld_test = $this->Unescape($row['fld_test']);
			$this->fld_test1 = $this->Unescape($row['fld_test1']);
			//$this->fld_publication = $this->Unescape($row['fld_publication']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_itembook_masterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_itembook_master` ";
		$es_itembook_masterList = Array();
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
			$sortBy = "fld_item_masterid";
		}
$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";

		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_itembook_master = new $thisObjectName();
			$es_itembook_master->fld_in_item_masterId = $row['fld_item_masterid'];
			$es_itembook_master->fld_item_code = $this->Unescape($row['fld_item_code']);
			$es_itembook_master->fld_item_name = $this->Unescape($row['fld_item_name']);
			$es_itembook_master->fld_inventory_id = $this->Unescape($row['fld_inventory_id']);
			$es_itembook_master->fld_category_id = $this->Unescape($row['fld_category_id']);
			$es_itembook_master->fld_qty_available = $this->Unescape($row['fld_qty_available']);
			$es_itembook_master->fld_reorder_level = $this->Unescape($row['fld_reorder_level']);
			$es_itembook_master->fld_quantity_issued = $this->Unescape($row['fld_quantity_issued']);
			$es_itembook_master->fld_last_recieved_date = $row['fld_last_recieved_date'];
			$es_itembook_master->fld_last_issued_date = $row['fld_last_issued_date'];
			$es_itembook_master->fld_status = $row['fld_status'];
			$es_itembook_master->fld_units = $this->Unescape($row['fld_units']);
			$es_itembook_master->fld_cost = $this->Unescape($row['fld_cost']);
			$es_itembook_master->fld_test = $this->Unescape($row['fld_test']);
			$es_itembook_master->fld_test1 = $this->Unescape($row['fld_test1']);
			//$es_itembook_master->fld_publication = $this->Unescape($row['fld_publication']);
			$es_itembook_masterList[] = $es_itembook_master;
		}
		return $es_itembook_masterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $fld_item_masterid
	*/
	function Save()
	{
		$connection = Database::Connect();
$this->pog_query = "select `fld_item_masterid` from `es_itembook_master` where `fld_item_masterid`='".$this->fld_in_item_masterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_itembook_master` set 
			`fld_item_code`='".$this->Escape($this->fld_item_code)."', 
			`fld_item_name`='".$this->Escape($this->fld_item_name)."', 
			`fld_inventory_id`='".$this->Escape($this->fld_inventory_id)."', 
			`fld_category_id`='".$this->Escape($this->fld_category_id)."', 
			`fld_qty_available`='".$this->Escape($this->fld_qty_available)."', 
			`fld_reorder_level`='".$this->Escape($this->fld_reorder_level)."', 
			`fld_quantity_issued`='".$this->Escape($this->fld_quantity_issued)."', 
			`fld_last_recieved_date`='".$this->fld_last_recieved_date."', 
			`fld_last_issued_date`='".$this->fld_last_issued_date."', 
			`fld_status`='".$this->fld_status."', 
			`fld_units`='".$this->Escape($this->fld_units)."', 
			`fld_cost`='".$this->Escape($this->fld_cost)."',
			 
			`fld_test`='".$this->Escape($this->fld_test)."', 
			`fld_test1`='".$this->Escape($this->fld_test1)."' where `fld_item_masterid`='".$this->fld_in_item_masterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_itembook_master` (`fld_item_code`, `fld_item_name`, `fld_inventory_id`, `fld_category_id`, `fld_qty_available`, `fld_reorder_level`, `fld_quantity_issued`, `fld_last_recieved_date`, `fld_last_issued_date`, `fld_status`, `fld_units`, `fld_cost`, `fld_test`, `fld_test1`) values (
			'".$this->Escape($this->fld_item_code)."', 
			'".$this->Escape($this->fld_item_name)."', 
			'".$this->Escape($this->fld_inventory_id)."', 
			'".$this->Escape($this->fld_category_id)."', 
			'".$this->Escape($this->fld_qty_available)."', 
			'".$this->Escape($this->fld_reorder_level)."', 
			'".$this->Escape($this->fld_quantity_issued)."', 
			'".$this->fld_last_recieved_date."', 
			'".$this->fld_last_issued_date."', 
			'".$this->fld_status."', 
			'".$this->Escape($this->fld_units)."', 
			'".$this->Escape($this->fld_cost)."', 
			'".$this->Escape($this->fld_test)."', 
			'".$this->Escape($this->fld_test1)."'
			)";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->fld_in_item_masterId == "")
		{
			$this->fld_in_item_masterId = $insertId;
		}
		return $this->fld_in_item_masterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $fld_item_masterid
	*/
	function SaveNew()
	{
		$this->fld_in_item_masterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_itembook_master` where `fld_item_masterid`='".$this->fld_in_item_masterId."'";
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
			$pog_query = "delete from `es_itembook_master` where ";
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