<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_voucher` (
	`es_voucherid` int(11) NOT NULL auto_increment,
	`voucher_type` VARCHAR(255) NOT NULL,
	`voucher_mode` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_voucherid`)) ENGINE=MyISAM;
*/

/**
* <b>es_voucher</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_voucher&attributeList=array+%28%0A++0+%3D%3E+%27voucher_type%27%2C%0A++1+%3D%3E+%27voucher_mode%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_voucher extends POG_Base
{
	public $es_voucherId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $voucher_type;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $voucher_mode;
	
	public $pog_attribute_type = array(
		"es_voucherId" => array('db_attributes' => array("NUMERIC", "INT")),
		"voucher_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"voucher_mode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_voucher($voucher_type='', $voucher_mode='')
	{
		$this->voucher_type = $voucher_type;
		$this->voucher_mode = $voucher_mode;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_voucherId 
	* @return object $es_voucher
	*/
	function Get($es_voucherId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_voucher` where `es_voucherid`='".intval($es_voucherId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_voucherId = $row['es_voucherid'];
			$this->voucher_type = $this->Unescape($row['voucher_type']);
			$this->voucher_mode = $this->Unescape($row['voucher_mode']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_voucherList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_voucher` ";
		$es_voucherList = Array();
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
			$sortBy = "es_voucherid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_voucher = new $thisObjectName();
			$es_voucher->es_voucherId = $row['es_voucherid'];
			$es_voucher->voucher_type = $this->Unescape($row['voucher_type']);
			$es_voucher->voucher_mode = $this->Unescape($row['voucher_mode']);
			$es_voucherList[] = $es_voucher;
		}
		return $es_voucherList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_voucherId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_voucherid` from `es_voucher` where `es_voucherid`='".$this->es_voucherId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_voucher` set 
			`voucher_type`='".$this->Escape($this->voucher_type)."', 
			`voucher_mode`='".$this->Escape($this->voucher_mode)."' where `es_voucherid`='".$this->es_voucherId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_voucher` (`voucher_type`, `voucher_mode` ) values (
			'".$this->Escape($this->voucher_type)."', 
			'".$this->Escape($this->voucher_mode)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_voucherId == "")
		{
			$this->es_voucherId = $insertId;
		}
		return $this->es_voucherId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_voucherId
	*/
	function SaveNew()
	{
		$this->es_voucherId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_voucher` where `es_voucherid`='".$this->es_voucherId."'";
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
			$pog_query = "delete from `es_voucher` where ";
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