<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_hostelbuld` (
	`es_hostelbuldid` int(11) NOT NULL auto_increment,
	`buld_name` VARCHAR(255) NOT NULL,
	`status` ENUM('active', 'inactive') NOT NULL,
	`createdon` DATE NOT NULL, PRIMARY KEY  (`es_hostelbuldid`)) ENGINE=MyISAM;
*/

/**
* <b>es_hostelbuld</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_hostelbuld&attributeList=array+%28%0A++0+%3D%3E+%27buld_name%27%2C%0A++1+%3D%3E+%27status%27%2C%0A++2+%3D%3E+%27createdon%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27ENUM%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_hostelbuld extends POG_Base
{
	public $es_hostelbuldId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $buld_name;
	
	/**
	 * @var ENUM('active', 'inactive')
	 */
	public $status;
	
	/**
	 * @var DATE
	 */
	public $createdon;
	
	public $pog_attribute_type = array(
		"es_hostelbuldId" => array('db_attributes' => array("NUMERIC", "INT")),
		"buld_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive'")),
		"createdon" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_hostelbuld($buld_name='', $status='', $createdon='')
	{
		$this->buld_name = $buld_name;
		$this->status = $status;
		$this->createdon = $createdon;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_hostelbuldId 
	* @return object $es_hostelbuld
	*/
	function Get($es_hostelbuldId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_hostelbuld` where `es_hostelbuldid`='".intval($es_hostelbuldId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_hostelbuldId = $row['es_hostelbuldid'];
			$this->buld_name = $this->Unescape($row['buld_name']);
			$this->status = $row['status'];
			$this->createdon = $row['createdon'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_hostelbuldList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_hostelbuld` ";
		$es_hostelbuldList = Array();
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
			$sortBy = "es_hostelbuldid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_hostelbuld = new $thisObjectName();
			$es_hostelbuld->es_hostelbuldId = $row['es_hostelbuldid'];
			$es_hostelbuld->buld_name = $this->Unescape($row['buld_name']);
			$es_hostelbuld->status = $row['status'];
			$es_hostelbuld->createdon = $row['createdon'];
			$es_hostelbuldList[] = $es_hostelbuld;
		}
		return $es_hostelbuldList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_hostelbuldId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_hostelbuldid` from `es_hostelbuld` where `es_hostelbuldid`='".$this->es_hostelbuldId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_hostelbuld` set 
			`buld_name`='".$this->Escape($this->buld_name)."', 
			`status`='".$this->status."', 
			`createdon`='".$this->createdon."' where `es_hostelbuldid`='".$this->es_hostelbuldId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_hostelbuld` (`buld_name`, `status`, `createdon` ) values (
			'".$this->Escape($this->buld_name)."', 
			'".$this->status."', 
			'".$this->createdon."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_hostelbuldId == "")
		{
			$this->es_hostelbuldId = $insertId;
		}
		return $this->es_hostelbuldId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_hostelbuldId
	*/
	function SaveNew()
	{
		$this->es_hostelbuldId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_hostelbuld` where `es_hostelbuldid`='".$this->es_hostelbuldId."'";
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
			$pog_query = "delete from `es_hostelbuld` where ";
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