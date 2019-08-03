<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_in_supplier_master` (
	`es_in_supplier_masterid` int(11) NOT NULL auto_increment,
	`in_name` VARCHAR(255) NOT NULL,
	`in_address` VARCHAR(255) NOT NULL,
	`in_city` VARCHAR(255) NOT NULL,
	`in_state` VARCHAR(255) NOT NULL,
	`in_country` VARCHAR(255) NOT NULL,
	`in_office_no` VARCHAR(255) NOT NULL,
	`in_mobile_no` VARCHAR(255) NOT NULL,
	`in_email` VARCHAR(255) NOT NULL,
	`in_fax` VARCHAR(255) NOT NULL,
	`in_description` VARCHAR(255) NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_in_supplier_masterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_in_supplier_master</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_in_supplier_master&attributeList=array+%28%0A++0+%3D%3E+%27in_name%27%2C%0A++1+%3D%3E+%27in_address%27%2C%0A++2+%3D%3E+%27in_city%27%2C%0A++3+%3D%3E+%27in_state%27%2C%0A++4+%3D%3E+%27in_country%27%2C%0A++5+%3D%3E+%27in_office_no%27%2C%0A++6+%3D%3E+%27in_mobile_no%27%2C%0A++7+%3D%3E+%27in_email%27%2C%0A++8+%3D%3E+%27in_fax%27%2C%0A++9+%3D%3E+%27in_description%27%2C%0A++10+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_in_supplier_master extends POG_Base
{
	public $es_in_supplier_masterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $in_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_state;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_country;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_office_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_mobile_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_email;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_fax;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_description;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_in_supplier_masterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_address" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_country" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_office_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_mobile_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_fax" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_in_supplier_master($in_name='', $in_address='', $in_city='', $in_state='', $in_country='', $in_office_no='', $in_mobile_no='', $in_email='', $in_fax='', $in_description='', $status='')
	{
		$this->in_name = $in_name;
		$this->in_address = $in_address;
		$this->in_city = $in_city;
		$this->in_state = $in_state;
		$this->in_country = $in_country;
		$this->in_office_no = $in_office_no;
		$this->in_mobile_no = $in_mobile_no;
		$this->in_email = $in_email;
		$this->in_fax = $in_fax;
		$this->in_description = $in_description;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_in_supplier_masterId 
	* @return object $es_in_supplier_master
	*/
	function Get($es_in_supplier_masterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_in_supplier_master` where `es_in_supplier_masterid`='".intval($es_in_supplier_masterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_in_supplier_masterId = $row['es_in_supplier_masterid'];
			$this->in_name = $this->Unescape($row['in_name']);
			$this->in_address = $this->Unescape($row['in_address']);
			$this->in_city = $this->Unescape($row['in_city']);
			$this->in_state = $this->Unescape($row['in_state']);
			$this->in_country = $this->Unescape($row['in_country']);
			$this->in_office_no = $this->Unescape($row['in_office_no']);
			$this->in_mobile_no = $this->Unescape($row['in_mobile_no']);
			$this->in_email = $this->Unescape($row['in_email']);
			$this->in_fax = $this->Unescape($row['in_fax']);
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
	* @return array $es_in_supplier_masterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_in_supplier_master` ";
		$es_in_supplier_masterList = Array();
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
			$sortBy = "es_in_supplier_masterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_in_supplier_master = new $thisObjectName();
			$es_in_supplier_master->es_in_supplier_masterId = $row['es_in_supplier_masterid'];
			$es_in_supplier_master->in_name = $this->Unescape($row['in_name']);
			$es_in_supplier_master->in_address = $this->Unescape($row['in_address']);
			$es_in_supplier_master->in_city = $this->Unescape($row['in_city']);
			$es_in_supplier_master->in_state = $this->Unescape($row['in_state']);
			$es_in_supplier_master->in_country = $this->Unescape($row['in_country']);
			$es_in_supplier_master->in_office_no = $this->Unescape($row['in_office_no']);
			$es_in_supplier_master->in_mobile_no = $this->Unescape($row['in_mobile_no']);
			$es_in_supplier_master->in_email = $this->Unescape($row['in_email']);
			$es_in_supplier_master->in_fax = $this->Unescape($row['in_fax']);
			$es_in_supplier_master->in_description = $this->Unescape($row['in_description']);
			$es_in_supplier_master->status = $row['status'];
			$es_in_supplier_masterList[] = $es_in_supplier_master;
		}
		return $es_in_supplier_masterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_in_supplier_masterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_in_supplier_masterid` from `es_in_supplier_master` where `es_in_supplier_masterid`='".$this->es_in_supplier_masterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_in_supplier_master` set 
			`in_name`='".$this->Escape($this->in_name)."', 
			`in_address`='".$this->Escape($this->in_address)."', 
			`in_city`='".$this->Escape($this->in_city)."', 
			`in_state`='".$this->Escape($this->in_state)."', 
			`in_country`='".$this->Escape($this->in_country)."', 
			`in_office_no`='".$this->Escape($this->in_office_no)."', 
			`in_mobile_no`='".$this->Escape($this->in_mobile_no)."', 
			`in_email`='".$this->Escape($this->in_email)."', 
			`in_fax`='".$this->Escape($this->in_fax)."', 
			`in_description`='".$this->Escape($this->in_description)."', 
			`status`='".$this->status."' where `es_in_supplier_masterid`='".$this->es_in_supplier_masterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_in_supplier_master` (`in_name`, `in_address`, `in_city`, `in_state`, `in_country`, `in_office_no`, `in_mobile_no`, `in_email`, `in_fax`, `in_description`, `status` ) values (
			'".$this->Escape($this->in_name)."', 
			'".$this->Escape($this->in_address)."', 
			'".$this->Escape($this->in_city)."', 
			'".$this->Escape($this->in_state)."', 
			'".$this->Escape($this->in_country)."', 
			'".$this->Escape($this->in_office_no)."', 
			'".$this->Escape($this->in_mobile_no)."', 
			'".$this->Escape($this->in_email)."', 
			'".$this->Escape($this->in_fax)."', 
			'".$this->Escape($this->in_description)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_in_supplier_masterId == "")
		{
			$this->es_in_supplier_masterId = $insertId;
		}
		return $this->es_in_supplier_masterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_in_supplier_masterId
	*/
	function SaveNew()
	{
		$this->es_in_supplier_masterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_in_supplier_master` where `es_in_supplier_masterid`='".$this->es_in_supplier_masterId."'";
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
			$pog_query = "delete from `es_in_supplier_master` where ";
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