<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `feemaster` (
	`feemasterid` int(11) NOT NULL auto_increment,
	`fee_particular` VARCHAR(255) NOT NULL,
	`fee_class` VARCHAR(255) NOT NULL,
	`fee_amount` FLOAT NOT NULL,
	`fee_instalments` INT NOT NULL,
	`fee_extra1` VARCHAR(255) NOT NULL,
	`fee_extra2` VARCHAR(255) NOT NULL, PRIMARY KEY  (`feemasterid`)) ENGINE=MyISAM;
*/

/**
* <b>feemaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=feemaster&attributeList=array+%28%0A++0+%3D%3E+%27fee_particular%27%2C%0A++1+%3D%3E+%27fee_class%27%2C%0A++2+%3D%3E+%27fee_amount%27%2C%0A++3+%3D%3E+%27fee_instalments%27%2C%0A++4+%3D%3E+%27fee_extra1%27%2C%0A++5+%3D%3E+%27fee_extra2%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27FLOAT%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class feemaster extends POG_Base
{
	public $feemasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $fee_particular;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fee_class;
	
	/**
	 * @var FLOAT
	 */
	public $fee_amount;
	
	/**
	 * @var INT
	 */
	public $fee_instalments;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fee_extra1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fee_extra2;
	
	public $pog_attribute_type = array(
		"feemasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_particular" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fee_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fee_amount" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"fee_instalments" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_extra1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fee_extra2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function feemaster($fee_particular='', $fee_class='', $fee_amount='', $fee_instalments='', $fee_extra1='', $fee_extra2='')
	{
		$this->fee_particular = $fee_particular;
		$this->fee_class = $fee_class;
		$this->fee_amount = $fee_amount;
		$this->fee_instalments = $fee_instalments;
		$this->fee_extra1 = $fee_extra1;
		$this->fee_extra2 = $fee_extra2;
	}
	
	
	/**
	* Gets object from database
	* @param integer $feemasterId 
	* @return object $feemaster
	*/
	function Get($feemasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `feemaster` where `feemasterid`='".intval($feemasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->feemasterId = $row['feemasterid'];
			$this->fee_particular = $this->Unescape($row['fee_particular']);
			$this->fee_class = $this->Unescape($row['fee_class']);
			$this->fee_amount = $this->Unescape($row['fee_amount']);
			$this->fee_instalments = $this->Unescape($row['fee_instalments']);
			$this->fee_extra1 = $this->Unescape($row['fee_extra1']);
			$this->fee_extra2 = $this->Unescape($row['fee_extra2']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $feemasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `feemaster` ";
		$feemasterList = Array();
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
			$sortBy = "feemasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$feemaster = new $thisObjectName();
			$feemaster->feemasterId = $row['feemasterid'];
			$feemaster->fee_particular = $this->Unescape($row['fee_particular']);
			$feemaster->fee_class = $this->Unescape($row['fee_class']);
			$feemaster->fee_amount = $this->Unescape($row['fee_amount']);
			$feemaster->fee_instalments = $this->Unescape($row['fee_instalments']);
			$feemaster->fee_extra1 = $this->Unescape($row['fee_extra1']);
			$feemaster->fee_extra2 = $this->Unescape($row['fee_extra2']);
			$feemasterList[] = $feemaster;
		}
		return $feemasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $feemasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `feemasterid` from `feemaster` where `feemasterid`='".$this->feemasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `feemaster` set 
			`fee_particular`='".$this->Escape($this->fee_particular)."', 
			`fee_class`='".$this->Escape($this->fee_class)."', 
			`fee_amount`='".$this->Escape($this->fee_amount)."', 
			`fee_instalments`='".$this->Escape($this->fee_instalments)."', 
			`fee_extra1`='".$this->Escape($this->fee_extra1)."', 
			`fee_extra2`='".$this->Escape($this->fee_extra2)."' where `feemasterid`='".$this->feemasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `feemaster` (`fee_particular`, `fee_class`, `fee_amount`, `fee_instalments`, `fee_extra1`, `fee_extra2` ) values (
			'".$this->Escape($this->fee_particular)."', 
			'".$this->Escape($this->fee_class)."', 
			'".$this->Escape($this->fee_amount)."', 
			'".$this->Escape($this->fee_instalments)."', 
			'".$this->Escape($this->fee_extra1)."', 
			'".$this->Escape($this->fee_extra2)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->feemasterId == "")
		{
			$this->feemasterId = $insertId;
		}
		return $this->feemasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $feemasterId
	*/
	function SaveNew()
	{
		$this->feemasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `feemaster` where `feemasterid`='".$this->feemasterId."'";
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
			$pog_query = "delete from `feemaster` where ";
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