<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_in_orders` (
	`es_in_ordersid` int(11) NOT NULL auto_increment,
	`in_suplier_name` VARCHAR(255) NOT NULL,
	`in_items_purchased` LONGTEXT NOT NULL,
	`order_date` DATETIME NOT NULL,
	`in_rec_note_no` INT NOT NULL,
	`in_rec_date` DATETIME NOT NULL,
	`in_rec_bill_no` VARCHAR(255) NOT NULL,
	`in_items_recieved` LONGTEXT NOT NULL,
	`in_tot_amnt` FLOAT NOT NULL,
	`in_ord_status` enum('pending', 'complete') NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_in_ordersid`)) ENGINE=MyISAM;
*/

/**
* <b>es_in_orders</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_in_orders&attributeList=array+%28%0A++0+%3D%3E+%27in_suplier_name%27%2C%0A++1+%3D%3E+%27in_items_purchased%27%2C%0A++2+%3D%3E+%27order_date%27%2C%0A++3+%3D%3E+%27in_rec_note_no%27%2C%0A++4+%3D%3E+%27in_rec_date%27%2C%0A++5+%3D%3E+%27in_rec_bill_no%27%2C%0A++6+%3D%3E+%27in_items_recieved%27%2C%0A++7+%3D%3E+%27in_tot_amnt%27%2C%0A++8+%3D%3E+%27in_ord_status%27%2C%0A++9+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27LONGTEXT%27%2C%0A++2+%3D%3E+%27DATETIME%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27DATETIME%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27LONGTEXT%27%2C%0A++7+%3D%3E+%27FLOAT%27%2C%0A++8+%3D%3E+%27enum%28%5C%5C%5C%27pending%5C%5C%5C%27%2C+%5C%5C%5C%27complete%5C%5C%5C%27%29%27%2C%0A++9+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_in_orders extends POG_Base
{
	public $es_in_ordersId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $in_suplier_name;
	
	/**
	 * @var LONGTEXT
	 */
	public $in_items_purchased;
	
	/**
	 * @var DATETIME
	 */
	public $order_date;
	
	/**
	 * @var INT
	 */
	public $in_rec_note_no;
	
	/**
	 * @var DATETIME
	 */
	public $in_rec_date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_rec_bill_no;
	
	/**
	 * @var LONGTEXT
	 */
	public $in_items_recieved;
	
	/**
	 * @var FLOAT
	 */
	public $in_tot_amnt;
	
	/**
	 * @var enum('pending', 'complete')
	 */
	public $in_ord_status;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_in_ordersId" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_suplier_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_items_purchased" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"order_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"in_rec_note_no" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_rec_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"in_rec_bill_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_items_recieved" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"in_tot_amnt" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"in_ord_status" => array('db_attributes' => array("SET", "ENUM", "'pending', 'complete'")),
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
	
	function es_in_orders($in_suplier_name='', $in_items_purchased='', $order_date='', $in_rec_note_no='', $in_rec_date='', $in_rec_bill_no='', $in_items_recieved='', $in_tot_amnt='', $in_ord_status='', $status='')
	{
		$this->in_suplier_name = $in_suplier_name;
		$this->in_items_purchased = $in_items_purchased;
		$this->order_date = $order_date;
		$this->in_rec_note_no = $in_rec_note_no;
		$this->in_rec_date = $in_rec_date;
		$this->in_rec_bill_no = $in_rec_bill_no;
		$this->in_items_recieved = $in_items_recieved;
		$this->in_tot_amnt = $in_tot_amnt;
		$this->in_ord_status = $in_ord_status;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_in_ordersId 
	* @return object $es_in_orders
	*/
	function Get($es_in_ordersId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_in_orders` where `es_in_ordersid`='".intval($es_in_ordersId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_in_ordersId = $row['es_in_ordersid'];
			$this->in_suplier_name = $this->Unescape($row['in_suplier_name']);
			$this->in_items_purchased = $this->Unescape($row['in_items_purchased']);
			$this->order_date = $row['order_date'];
			$this->in_rec_note_no = $this->Unescape($row['in_rec_note_no']);
			$this->in_rec_date = $row['in_rec_date'];
			$this->in_rec_bill_no = $this->Unescape($row['in_rec_bill_no']);
			$this->in_items_recieved = $this->Unescape($row['in_items_recieved']);
			$this->in_tot_amnt = $this->Unescape($row['in_tot_amnt']);
			$this->in_ord_status = $row['in_ord_status'];
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
	* @return array $es_in_ordersList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_in_orders` ";
		$es_in_ordersList = Array();
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
			$sortBy = "es_in_ordersid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_in_orders = new $thisObjectName();
			$es_in_orders->es_in_ordersId = $row['es_in_ordersid'];
			$es_in_orders->in_suplier_name = $this->Unescape($row['in_suplier_name']);
			$es_in_orders->in_items_purchased = $this->Unescape($row['in_items_purchased']);
			$es_in_orders->order_date = $row['order_date'];
			$es_in_orders->in_rec_note_no = $this->Unescape($row['in_rec_note_no']);
			$es_in_orders->in_rec_date = $row['in_rec_date'];
			$es_in_orders->in_rec_bill_no = $this->Unescape($row['in_rec_bill_no']);
			$es_in_orders->in_items_recieved = $this->Unescape($row['in_items_recieved']);
			$es_in_orders->in_tot_amnt = $this->Unescape($row['in_tot_amnt']);
			$es_in_orders->in_ord_status = $row['in_ord_status'];
			$es_in_orders->status = $row['status'];
			$es_in_ordersList[] = $es_in_orders;
		}
		return $es_in_ordersList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_in_ordersId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_in_ordersid` from `es_in_orders` where `es_in_ordersid`='".$this->es_in_ordersId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_in_orders` set 
			`in_suplier_name`='".$this->Escape($this->in_suplier_name)."', 
			`in_items_purchased`='".$this->Escape($this->in_items_purchased)."', 
			`order_date`='".$this->order_date."', 
			`in_rec_note_no`='".$this->Escape($this->in_rec_note_no)."', 
			`in_rec_date`='".$this->in_rec_date."', 
			`in_rec_bill_no`='".$this->Escape($this->in_rec_bill_no)."', 
			`in_items_recieved`='".$this->Escape($this->in_items_recieved)."', 
			`in_tot_amnt`='".$this->Escape($this->in_tot_amnt)."', 
			`in_ord_status`='".$this->in_ord_status."', 
			`status`='".$this->status."' where `es_in_ordersid`='".$this->es_in_ordersId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_in_orders` (`in_suplier_name`, `in_items_purchased`, `order_date`, `in_rec_note_no`, `in_rec_date`, `in_rec_bill_no`, `in_items_recieved`, `in_tot_amnt`, `in_ord_status`, `status` ) values (
			'".$this->Escape($this->in_suplier_name)."', 
			'".$this->Escape($this->in_items_purchased)."', 
			'".$this->order_date."', 
			'".$this->Escape($this->in_rec_note_no)."', 
			'".$this->in_rec_date."', 
			'".$this->Escape($this->in_rec_bill_no)."', 
			'".$this->Escape($this->in_items_recieved)."', 
			'".$this->Escape($this->in_tot_amnt)."', 
			'".$this->in_ord_status."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_in_ordersId == "")
		{
			$this->es_in_ordersId = $insertId;
		}
		return $this->es_in_ordersId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_in_ordersId
	*/
	function SaveNew()
	{
		$this->es_in_ordersId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_in_orders` where `es_in_ordersid`='".$this->es_in_ordersId."'";
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
			$pog_query = "delete from `es_in_orders` where ";
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