<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_ledger` (
	`es_ledgerid` int(11) NOT NULL auto_increment,
	`lg_name` VARCHAR(255) NOT NULL,
	`lg_groupname` VARCHAR(255) NOT NULL,
	`lg_openingbalance` DOUBLE NOT NULL,
	`lg_createdon` DATE NOT NULL,
	`lg_amounttype` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_ledgerid`)) ENGINE=MyISAM;
*/

/**
* <b>es_ledger</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_ledger&attributeList=array+%28%0A++0+%3D%3E+%27lg_name%27%2C%0A++1+%3D%3E+%27lg_groupname%27%2C%0A++2+%3D%3E+%27lg_openingbalance%27%2C%0A++3+%3D%3E+%27lg_createdon%27%2C%0A++4+%3D%3E+%27lg_amounttype%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DOUBLE%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_ledger extends POG_Base
{
	public $es_ledgerId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $lg_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lg_groupname;
	
	/**
	 * @var DOUBLE
	 */
	public $lg_openingbalance;
	
	/**
	 * @var DATE
	 */
	public $lg_createdon;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lg_amounttype;
	
	public $pog_attribute_type = array(
		"es_ledgerId" => array('db_attributes' => array("NUMERIC", "INT")),
		"lg_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lg_groupname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lg_openingbalance" => array('db_attributes' => array("NUMERIC", "DOUBLE")),
		"lg_createdon" => array('db_attributes' => array("NUMERIC", "DATE")),
		"lg_amounttype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_ledger($lg_name='', $lg_groupname='', $lg_openingbalance='', $lg_createdon='', $lg_amounttype='')
	{
		$this->lg_name = $lg_name;
		$this->lg_groupname = $lg_groupname;
		$this->lg_openingbalance = $lg_openingbalance;
		$this->lg_createdon = $lg_createdon;
		$this->lg_amounttype = $lg_amounttype;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_ledgerId 
	* @return object $es_ledger
	*/
	function Get($es_ledgerId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_ledger` where `es_ledgerid`='".intval($es_ledgerId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_ledgerId = $row['es_ledgerid'];
			$this->lg_name = $this->Unescape($row['lg_name']);
			$this->lg_groupname = $this->Unescape($row['lg_groupname']);
			$this->lg_openingbalance = $this->Unescape($row['lg_openingbalance']);
			$this->lg_createdon = $row['lg_createdon'];
			$this->lg_amounttype = $this->Unescape($row['lg_amounttype']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_ledgerList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_ledger` ";
		$es_ledgerList = Array();
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
			$sortBy = "es_ledgerid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_ledger = new $thisObjectName();
			$es_ledger->es_ledgerId = $row['es_ledgerid'];
			$es_ledger->lg_name = $this->Unescape($row['lg_name']);
			$es_ledger->lg_groupname = $this->Unescape($row['lg_groupname']);
			$es_ledger->lg_openingbalance = $this->Unescape($row['lg_openingbalance']);
			$es_ledger->lg_createdon = $row['lg_createdon'];
			$es_ledger->lg_amounttype = $this->Unescape($row['lg_amounttype']);
			$es_ledgerList[] = $es_ledger;
		}
		return $es_ledgerList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_ledgerId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_ledgerid` from `es_ledger` where `es_ledgerid`='".$this->es_ledgerId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_ledger` set 
			`lg_name`='".$this->Escape($this->lg_name)."', 
			`lg_groupname`='".$this->Escape($this->lg_groupname)."', 
			`lg_openingbalance`='".$this->Escape($this->lg_openingbalance)."', 
			`lg_createdon`='".$this->lg_createdon."', 
			`lg_amounttype`='".$this->Escape($this->lg_amounttype)."' where `es_ledgerid`='".$this->es_ledgerId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_ledger` (`lg_name`, `lg_groupname`, `lg_openingbalance`, `lg_createdon`, `lg_amounttype` ) values (
			'".$this->Escape($this->lg_name)."', 
			'".$this->Escape($this->lg_groupname)."', 
			'".$this->Escape($this->lg_openingbalance)."', 
			'".$this->lg_createdon."', 
			'".$this->Escape($this->lg_amounttype)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_ledgerId == "")
		{
			$this->es_ledgerId = $insertId;
		}
		return $this->es_ledgerId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_ledgerId
	*/
	function SaveNew()
	{
		$this->es_ledgerId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_ledger` where `es_ledgerid`='".$this->es_ledgerId."'";
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
			$pog_query = "delete from `es_ledger` where ";
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