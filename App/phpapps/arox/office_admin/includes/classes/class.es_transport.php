<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_transport` (
	`es_transportid` int(11) NOT NULL auto_increment,
	`tr_transport_type` enum('bus', 'Car(Manual)', 'Car(Auto)', 'coach', 'minibus', 'van', 'other') NOT NULL,
	`tr_purchase_date` DATETIME NOT NULL,
	`tr_transport_no` VARCHAR(255) NOT NULL,
	`tr_transport_name` VARCHAR(255) NOT NULL,
	`tr_vehicle_no` VARCHAR(255) NOT NULL,
	`tr_insurance_date` DATETIME NOT NULL,
	`tr_ins_renewal_date` DATETIME NOT NULL,
	`tr_seating_capacity` INT NOT NULL,
	`tr_route` VARCHAR(255) NOT NULL,
	`tr_route_from` VARCHAR(255) NOT NULL,
	`tr_route_to` VARCHAR(255) NOT NULL,
	`tr_route_via` VARCHAR(255) NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_transportid`)) ENGINE=MyISAM;
*/

/**
* <b>es_transport</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_transport&attributeList=array+%28%0A++0+%3D%3E+%27tr_transport_type%27%2C%0A++1+%3D%3E+%27tr_purchase_date%27%2C%0A++2+%3D%3E+%27tr_transport_no%27%2C%0A++3+%3D%3E+%27tr_transport_name%27%2C%0A++4+%3D%3E+%27tr_vehicle_no%27%2C%0A++5+%3D%3E+%27tr_insurance_date%27%2C%0A++6+%3D%3E+%27tr_ins_renewal_date%27%2C%0A++7+%3D%3E+%27tr_seating_capacity%27%2C%0A++8+%3D%3E+%27tr_route%27%2C%0A++9+%3D%3E+%27tr_route_from%27%2C%0A++10+%3D%3E+%27tr_route_to%27%2C%0A++11+%3D%3E+%27tr_route_via%27%2C%0A++12+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27enum%28%5C%5C%5C%27bus%5C%5C%5C%27%2C+%5C%5C%5C%27Car(Manual)%5C%5C%5C%27%2C+%5C%5C%5C%27Car(Auto)%5C%5C%5C%27%2C+%5C%5C%5C%27auto%5C%5C%5C%27%2C+%5C%5C%5C%27minibus%5C%5C%5C%27%2C+%5C%5C%5C%27van%5C%5C%5C%27%2C+%5C%5C%5C%27other%5C%5C%5C%27%29%27%2C%0A++1+%3D%3E+%27DATETIME%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27DATETIME%27%2C%0A++6+%3D%3E+%27DATETIME%27%2C%0A++7+%3D%3E+%27INT%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_transport extends POG_Base
{
	public $es_transportId = '';

	/**
	 * @var enum('bus', 'Car(Manual)', 'Car(Auto)', 'coach', 'minibus', 'van', 'other')
	 */
	public $tr_transport_type;
	
	/**
	 * @var DATETIME
	 */
	public $tr_purchase_date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_transport_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_transport_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_vehicle_no;
	
	/**
	 * @var DATETIME
	 */
	public $tr_insurance_date;
	
	/**
	 * @var DATETIME
	 */
	public $tr_ins_renewal_date;
	
	/**
	 * @var INT
	 */
	public $tr_seating_capacity;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_route;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_route_from;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_route_to;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_route_via;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_transportId" => array('db_attributes' => array("NUMERIC", "INT")),
		"tr_transport_type" => array('db_attributes' => array("SET", "ENUM", "'bus', 'Car(Manual)', 'Car(Auto)', 'coach', 'minibus', 'van', 'other'")),
		"tr_purchase_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"tr_transport_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_transport_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_vehicle_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_insurance_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"tr_ins_renewal_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"tr_seating_capacity" => array('db_attributes' => array("NUMERIC", "INT")),
		"tr_route" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_route_from" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_route_to" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_route_via" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_transport($tr_transport_type='', $tr_purchase_date='', $tr_transport_no='', $tr_transport_name='', $tr_vehicle_no='', $tr_insurance_date='', $tr_ins_renewal_date='', $tr_seating_capacity='', $tr_route='', $tr_route_from='', $tr_route_to='', $tr_route_via='', $status='')
	{
		$this->tr_transport_type = $tr_transport_type;
		$this->tr_purchase_date = $tr_purchase_date;
		$this->tr_transport_no = $tr_transport_no;
		$this->tr_transport_name = $tr_transport_name;
		$this->tr_vehicle_no = $tr_vehicle_no;
		$this->tr_insurance_date = $tr_insurance_date;
		$this->tr_ins_renewal_date = $tr_ins_renewal_date;
		$this->tr_seating_capacity = $tr_seating_capacity;
		$this->tr_route = $tr_route;
		$this->tr_route_from = $tr_route_from;
		$this->tr_route_to = $tr_route_to;
		$this->tr_route_via = $tr_route_via;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_transportId 
	* @return object $es_transport
	*/
	function Get($es_transportId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_transport` where `es_transportid`='".intval($es_transportId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_transportId = $row['es_transportid'];
			$this->tr_transport_type = $row['tr_transport_type'];
			$this->tr_purchase_date = $row['tr_purchase_date'];
			$this->tr_transport_no = $this->Unescape($row['tr_transport_no']);
			$this->tr_transport_name = $this->Unescape($row['tr_transport_name']);
			$this->tr_vehicle_no = $this->Unescape($row['tr_vehicle_no']);
			$this->tr_insurance_date = $row['tr_insurance_date'];
			$this->tr_ins_renewal_date = $row['tr_ins_renewal_date'];
			$this->tr_seating_capacity = $this->Unescape($row['tr_seating_capacity']);
			$this->tr_route = $this->Unescape($row['tr_route']);
			$this->tr_route_from = $this->Unescape($row['tr_route_from']);
			$this->tr_route_to = $this->Unescape($row['tr_route_to']);
			$this->tr_route_via = $this->Unescape($row['tr_route_via']);
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
	* @return array $es_transportList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_transport` ";
		$es_transportList = Array();
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
			$sortBy = "es_transportid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_transport = new $thisObjectName();
			$es_transport->es_transportId = $row['es_transportid'];
			$es_transport->tr_transport_type = $row['tr_transport_type'];
			$es_transport->tr_purchase_date = $row['tr_purchase_date'];
			$es_transport->tr_transport_no = $this->Unescape($row['tr_transport_no']);
			$es_transport->tr_transport_name = $this->Unescape($row['tr_transport_name']);
			$es_transport->tr_vehicle_no = $this->Unescape($row['tr_vehicle_no']);
			$es_transport->tr_insurance_date = $row['tr_insurance_date'];
			$es_transport->tr_ins_renewal_date = $row['tr_ins_renewal_date'];
			$es_transport->tr_seating_capacity = $this->Unescape($row['tr_seating_capacity']);
			$es_transport->tr_route = $this->Unescape($row['tr_route']);
			$es_transport->tr_route_from = $this->Unescape($row['tr_route_from']);
			$es_transport->tr_route_to = $this->Unescape($row['tr_route_to']);
			$es_transport->tr_route_via = $this->Unescape($row['tr_route_via']);
			$es_transport->status = $row['status'];
			$es_transportList[] = $es_transport;
		}
		return $es_transportList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_transportId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_transportid` from `es_transport` where `es_transportid`='".$this->es_transportId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_transport` set 
			`tr_transport_type`='".$this->tr_transport_type."', 
			`tr_purchase_date`='".$this->tr_purchase_date."', 
			`tr_transport_no`='".$this->Escape($this->tr_transport_no)."', 
			`tr_transport_name`='".$this->Escape($this->tr_transport_name)."', 
			`tr_vehicle_no`='".$this->Escape($this->tr_vehicle_no)."', 
			`tr_insurance_date`='".$this->tr_insurance_date."', 
			`tr_ins_renewal_date`='".$this->tr_ins_renewal_date."', 
			`tr_seating_capacity`='".$this->Escape($this->tr_seating_capacity)."', 
			`tr_route`='".$this->Escape($this->tr_route)."', 
			`tr_route_from`='".$this->Escape($this->tr_route_from)."', 
			`tr_route_to`='".$this->Escape($this->tr_route_to)."', 
			`tr_route_via`='".$this->Escape($this->tr_route_via)."', 
			`status`='".$this->status."' where `es_transportid`='".$this->es_transportId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_transport` (`tr_transport_type`, `tr_purchase_date`, `tr_transport_no`, `tr_transport_name`, `tr_vehicle_no`, `tr_insurance_date`, `tr_ins_renewal_date`, `tr_seating_capacity`, `tr_route`, `tr_route_from`, `tr_route_to`, `tr_route_via`, `status` ) values (
			'".$this->tr_transport_type."', 
			'".$this->tr_purchase_date."', 
			'".$this->Escape($this->tr_transport_no)."', 
			'".$this->Escape($this->tr_transport_name)."', 
			'".$this->Escape($this->tr_vehicle_no)."', 
			'".$this->tr_insurance_date."', 
			'".$this->tr_ins_renewal_date."', 
			'".$this->Escape($this->tr_seating_capacity)."', 
			'".$this->Escape($this->tr_route)."', 
			'".$this->Escape($this->tr_route_from)."', 
			'".$this->Escape($this->tr_route_to)."', 
			'".$this->Escape($this->tr_route_via)."', 
			'".$this->status."' )";
		}
		//echo $this->pog_query;exit;
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_transportId == "")
		{
			$this->es_transportId = $insertId;
		}
		return $this->es_transportId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_transportId
	*/
	function SaveNew()
	{
		$this->es_transportId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_transport` where `es_transportid`='".$this->es_transportId."'";
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
			$pog_query = "delete from `es_transport` where ";
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