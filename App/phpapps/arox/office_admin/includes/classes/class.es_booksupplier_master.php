<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_booksupplier_master` (
	`fld_supplier_masterid` int(11) NOT NULL auto_increment,
	`fld_name` VARCHAR(255) NOT NULL,
	`fld_address` VARCHAR(255) NOT NULL,
	`fld_city` VARCHAR(255) NOT NULL,
	`fld_state` VARCHAR(255) NOT NULL,
	`fld_country` VARCHAR(255) NOT NULL,
	`fld_office_no` VARCHAR(255) NOT NULL,
	`fld_mobile_no` VARCHAR(255) NOT NULL,
	`fld_email` VARCHAR(255) NOT NULL,
	`fld_fax` VARCHAR(255) NOT NULL,
	`fld_description` VARCHAR(255) NOT NULL,
	`fld_status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`fld_supplier_masterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_booksupplier_master</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_booksupplier_master&attributeList=array+%28%0A++0+%3D%3E+%27fld_name%27%2C%0A++1+%3D%3E+%27fld_address%27%2C%0A++2+%3D%3E+%27fld_city%27%2C%0A++3+%3D%3E+%27fld_state%27%2C%0A++4+%3D%3E+%27fld_country%27%2C%0A++5+%3D%3E+%27fld_office_no%27%2C%0A++6+%3D%3E+%27fld_mobile_no%27%2C%0A++7+%3D%3E+%27fld_email%27%2C%0A++8+%3D%3E+%27fld_fax%27%2C%0A++9+%3D%3E+%27fld_description%27%2C%0A++10+%3D%3E+%27fld_status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_booksupplier_master extends POG_Base
{
	public $fld_in_supplier_masterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $fld_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_state;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_country;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_office_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_mobile_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_email;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_fax;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_description;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $fld_status;
	
	/**
	 * @var VARCHAR(255)
	 */
	//public $fld_publication;
	
	public $pog_attribute_type = array(
		"fld_in_supplier_masterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_address" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_country" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_office_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_mobile_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_fax" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_description" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
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
	
	function es_booksupplier_master($fld_name='', $fld_address='', $fld_city='', $fld_state='', $fld_country='', $fld_office_no='', $fld_mobile_no='', $fld_email='', $fld_fax='', $fld_description='', $fld_status='')
	{
		$this->fld_name = $fld_name;
		$this->fld_address = $fld_address;
		$this->fld_city = $fld_city;
		$this->fld_state = $fld_state;
		$this->fld_country = $fld_country;
		$this->fld_office_no = $fld_office_no;
		$this->fld_mobile_no = $fld_mobile_no;
		$this->fld_email = $fld_email;
		$this->fld_fax = $fld_fax;
		$this->fld_description = $fld_description;
		$this->fld_status = $fld_status;
		//$this->fld_publication = $fld_publication;
	}
	
	
	/**
	* Gets object from database
	* @param integer $fld_supplier_masterid 
	* @return object $es_booksupplier_master
	*/
	function Get($fld_in_supplier_masterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_booksupplier_master` where `fld_supplier_masterid`='".intval($fld_in_supplier_masterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->fld_in_supplier_masterId = $row['fld_supplier_masterid'];
			$this->fld_name = $this->Unescape($row['fld_name']);
			$this->fld_address = $this->Unescape($row['fld_address']);
			$this->fld_city = $this->Unescape($row['fld_city']);
			$this->fld_state = $this->Unescape($row['fld_state']);
			$this->fld_country = $this->Unescape($row['fld_country']);
			$this->fld_office_no = $this->Unescape($row['fld_office_no']);
			$this->fld_mobile_no = $this->Unescape($row['fld_mobile_no']);
			$this->fld_email = $this->Unescape($row['fld_email']);
			$this->fld_fax = $this->Unescape($row['fld_fax']);
			$this->fld_description = $this->Unescape($row['fld_description']);
			$this->fld_status = $row['fld_status'];
			//$this->fld_publication = $row['fld_publication'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_booksupplier_masterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_booksupplier_master` ";
		$es_booksupplier_masterList = Array();
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
			$sortBy = "fld_supplier_masterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_booksupplier_master = new $thisObjectName();
			$es_booksupplier_master->fld_in_supplier_masterId = $row['fld_supplier_masterid'];
			$es_booksupplier_master->fld_name = $this->Unescape($row['fld_name']);
			$es_booksupplier_master->fld_address = $this->Unescape($row['fld_address']);
			$es_booksupplier_master->fld_city = $this->Unescape($row['fld_city']);
			$es_booksupplier_master->fld_state = $this->Unescape($row['fld_state']);
			$es_booksupplier_master->fld_country = $this->Unescape($row['fld_country']);
			$es_booksupplier_master->fld_office_no = $this->Unescape($row['fld_office_no']);
			$es_booksupplier_master->fld_mobile_no = $this->Unescape($row['fld_mobile_no']);
			$es_booksupplier_master->fld_email = $this->Unescape($row['fld_email']);
			$es_booksupplier_master->fld_fax = $this->Unescape($row['fld_fax']);
			$es_booksupplier_master->fld_description = $this->Unescape($row['fld_description']);
			$es_booksupplier_master->fld_status = $row['fld_status'];
			//$es_booksupplier_master->fld_publication = $row['fld_publication'];
			$es_booksupplier_masterList[] = $es_booksupplier_master;
		}
		return $es_booksupplier_masterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $fld_supplier_masterid
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `fld_supplier_masterid` from `es_booksupplier_master` where `fld_supplier_masterid`='".$this->fld_in_supplier_masterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_booksupplier_master` set 
			`fld_name`='".$this->Escape($this->fld_name)."', 
			`fld_address`='".$this->Escape($this->fld_address)."', 
			`fld_city`='".$this->Escape($this->fld_city)."', 
			`fld_state`='".$this->Escape($this->fld_state)."', 
			`fld_country`='".$this->Escape($this->fld_country)."', 
			`fld_office_no`='".$this->Escape($this->fld_office_no)."', 
			`fld_mobile_no`='".$this->Escape($this->fld_mobile_no)."', 
			`fld_email`='".$this->Escape($this->fld_email)."', 
			`fld_fax`='".$this->Escape($this->fld_fax)."', 
			`fld_description`='".$this->Escape($this->fld_description)."',
		 
			`fld_status`='".$this->fld_status."' where `fld_supplier_masterid`='".$this->fld_in_supplier_masterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_booksupplier_master` (`fld_name`, `fld_address`, `fld_city`, `fld_state`, `fld_country`, `fld_office_no`, `fld_mobile_no`, `fld_email`, `fld_fax`, `fld_description`, `fld_status` ) values (
			'".$this->Escape($this->fld_name)."', 
			'".$this->Escape($this->fld_address)."', 
			'".$this->Escape($this->fld_city)."', 
			'".$this->Escape($this->fld_state)."', 
			'".$this->Escape($this->fld_country)."', 
			'".$this->Escape($this->fld_office_no)."', 
			'".$this->Escape($this->fld_mobile_no)."', 
			'".$this->Escape($this->fld_email)."', 
			'".$this->Escape($this->fld_fax)."', 
			'".$this->Escape($this->fld_description)."',
			
			'".$this->fld_status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->fld_in_supplier_masterId == "")
		{
			$this->fld_in_supplier_masterId = $insertId;
		}
		return $this->fld_in_supplier_masterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $fld_supplier_masterid
	*/
	function SaveNew()
	{
		$this->fld_in_supplier_masterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_booksupplier_master` where `fld_supplier_masterid`='".$this->fld_in_supplier_masterId."'";
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
			$pog_query = "delete from `es_booksupplier_master` where ";
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