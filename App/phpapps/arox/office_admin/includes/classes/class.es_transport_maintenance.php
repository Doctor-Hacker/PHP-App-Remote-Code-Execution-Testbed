<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_transport_maintenance` (
	`es_transport_maintenanceid` int(11) NOT NULL auto_increment,
	`tr_transportid` VARCHAR(255) NOT NULL,
	`tr_maintenance_type` VARCHAR(255) NOT NULL,
	`tr_date_of_maintenance` DATETIME NOT NULL,
	`tr_amount_paid` DOUBLE NOT NULL,
	`tr_remarks` VARCHAR(255) NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL,
	`tr_transportno` VARCHAR(255) NOT NULL,
	`tr_transportname` VARCHAR(255) NOT NULL,
	`es_ledger` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_transport_maintenanceid`)) ENGINE=MyISAM;
*/

/**
* <b>es_transport_maintenance</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_transport_maintenance&attributeList=array+%28%0A++0+%3D%3E+%27tr_transportid%27%2C%0A++1+%3D%3E+%27tr_maintenance_type%27%2C%0A++2+%3D%3E+%27tr_date_of_maintenance%27%2C%0A++3+%3D%3E+%27tr_amount_paid%27%2C%0A++4+%3D%3E+%27tr_remarks%27%2C%0A++5+%3D%3E+%27status%27%2C%0A++6+%3D%3E+%27tr_transportno%27%2C%0A++7+%3D%3E+%27tr_transportname%27%2C%0A++8+%3D%3E+%27es_ledger%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATETIME%27%2C%0A++3+%3D%3E+%27DOUBLE%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27enum%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%2C+%5C%27deleted%5C%27%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_transport_maintenance extends POG_Base
{
	public $es_transport_maintenanceId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $tr_transportid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_maintenance_type;
	
	/**
	 * @var DATETIME
	 */
	public $tr_date_of_maintenance;
	
	/**
	 * @var DOUBLE
	 */
	public $tr_amount_paid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_remarks;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_transportno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tr_transportname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_ledger;
	
	public $pog_attribute_type = array(
		"es_transport_maintenanceId" => array('db_attributes' => array("NUMERIC", "INT")),
		"tr_transportid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_maintenance_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_date_of_maintenance" => array('db_attributes' => array("TEXT", "DATETIME")),
		"tr_amount_paid" => array('db_attributes' => array("NUMERIC", "DOUBLE")),
		"tr_remarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"tr_transportno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tr_transportname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_ledger" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_transport_maintenance($tr_transportid='', $tr_maintenance_type='', $tr_date_of_maintenance='', $tr_amount_paid='', $tr_remarks='', $status='', $tr_transportno='', $tr_transportname='', $es_ledger='')
	{
		$this->tr_transportid = $tr_transportid;
		$this->tr_maintenance_type = $tr_maintenance_type;
		$this->tr_date_of_maintenance = $tr_date_of_maintenance;
		$this->tr_amount_paid = $tr_amount_paid;
		$this->tr_remarks = $tr_remarks;
		$this->status = $status;
		$this->tr_transportno = $tr_transportno;
		$this->tr_transportname = $tr_transportname;
		$this->es_ledger = $es_ledger;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_transport_maintenanceId 
	* @return object $es_transport_maintenance
	*/
	function Get($es_transport_maintenanceId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_transport_maintenance` where `es_transport_maintenanceid`='".intval($es_transport_maintenanceId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_transport_maintenanceId = $row['es_transport_maintenanceid'];
			$this->tr_transportid = $this->Unescape($row['tr_transportid']);
			$this->tr_maintenance_type = $this->Unescape($row['tr_maintenance_type']);
			$this->tr_date_of_maintenance = $row['tr_date_of_maintenance'];
			$this->tr_amount_paid = $this->Unescape($row['tr_amount_paid']);
			$this->tr_remarks = $this->Unescape($row['tr_remarks']);
			$this->status = $row['status'];
			$this->tr_transportno = $this->Unescape($row['tr_transportno']);
			$this->tr_transportname = $this->Unescape($row['tr_transportname']);
			$this->es_ledger = $this->Unescape($row['es_ledger']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_transport_maintenanceList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_transport_maintenance` ";
		$es_transport_maintenanceList = Array();
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
			$sortBy = "es_transport_maintenanceid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_transport_maintenance = new $thisObjectName();
			$es_transport_maintenance->es_transport_maintenanceId = $row['es_transport_maintenanceid'];
			$es_transport_maintenance->tr_transportid = $this->Unescape($row['tr_transportid']);
			$es_transport_maintenance->tr_maintenance_type = $this->Unescape($row['tr_maintenance_type']);
			$es_transport_maintenance->tr_date_of_maintenance = $row['tr_date_of_maintenance'];
			$es_transport_maintenance->tr_amount_paid = $this->Unescape($row['tr_amount_paid']);
			$es_transport_maintenance->tr_remarks = $this->Unescape($row['tr_remarks']);
			$es_transport_maintenance->status = $row['status'];
			$es_transport_maintenance->tr_transportno = $this->Unescape($row['tr_transportno']);
			$es_transport_maintenance->tr_transportname = $this->Unescape($row['tr_transportname']);
			$es_transport_maintenance->es_ledger = $this->Unescape($row['es_ledger']);
			$es_transport_maintenanceList[] = $es_transport_maintenance;
		}
		return $es_transport_maintenanceList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_transport_maintenanceId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_transport_maintenanceid` from `es_transport_maintenance` where `es_transport_maintenanceid`='".$this->es_transport_maintenanceId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_transport_maintenance` set 
			`tr_transportid`='".$this->Escape($this->tr_transportid)."', 
			`tr_maintenance_type`='".$this->Escape($this->tr_maintenance_type)."', 
			`tr_date_of_maintenance`='".$this->tr_date_of_maintenance."', 
			`tr_amount_paid`='".$this->Escape($this->tr_amount_paid)."', 
			`tr_remarks`='".$this->Escape($this->tr_remarks)."', 
			`status`='".$this->status."', 
			`tr_transportno`='".$this->Escape($this->tr_transportno)."', 
			`tr_transportname`='".$this->Escape($this->tr_transportname)."', 
			`es_ledger`='".$this->Escape($this->es_ledger)."' where `es_transport_maintenanceid`='".$this->es_transport_maintenanceId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_transport_maintenance` (`tr_transportid`, `tr_maintenance_type`, `tr_date_of_maintenance`, `tr_amount_paid`, `tr_remarks`, `status`, `tr_transportno`, `tr_transportname`, `es_ledger` ) values (
			'".$this->Escape($this->tr_transportid)."', 
			'".$this->Escape($this->tr_maintenance_type)."', 
			'".$this->tr_date_of_maintenance."', 
			'".$this->Escape($this->tr_amount_paid)."', 
			'".$this->Escape($this->tr_remarks)."', 
			'".$this->status."', 
			'".$this->Escape($this->tr_transportno)."', 
			'".$this->Escape($this->tr_transportname)."', 
			'".$this->Escape($this->es_ledger)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_transport_maintenanceId == "")
		{
			$this->es_transport_maintenanceId = $insertId;
		}
		return $this->es_transport_maintenanceId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_transport_maintenanceId
	*/
	function SaveNew()
	{
		$this->es_transport_maintenanceId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_transport_maintenance` where `es_transport_maintenanceid`='".$this->es_transport_maintenanceId."'";
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
			$pog_query = "delete from `es_transport_maintenance` where ";
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