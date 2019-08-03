<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_feemaster` (
	`es_feemasterid` int(11) NOT NULL auto_increment,
	`fee_particular` VARCHAR(255) NOT NULL,
	`fee_class` INT NOT NULL,
	`fee_amount` DOUBLE NOT NULL,
	`fee_instalments` INT NOT NULL,
	`fee_extra1` VARCHAR(255) NOT NULL,
	`fee_extra2` VARCHAR(255) NOT NULL,
	`fee_fromdate` DATE NOT NULL,
	`fee_todate` DATE NOT NULL, PRIMARY KEY  (`es_feemasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_feemaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_feemaster&attributeList=array+%28%0A++0+%3D%3E+%27fee_particular%27%2C%0A++1+%3D%3E+%27fee_class%27%2C%0A++2+%3D%3E+%27fee_amount%27%2C%0A++3+%3D%3E+%27fee_instalments%27%2C%0A++4+%3D%3E+%27fee_extra1%27%2C%0A++5+%3D%3E+%27fee_extra2%27%2C%0A++6+%3D%3E+%27fee_fromdate%27%2C%0A++7+%3D%3E+%27fee_todate%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27DOUBLE%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27DATE%27%2C%0A++7+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_feemaster extends POG_Base
{
	public $es_feemasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $fee_particular;
	
	/**
	 * @var INT
	 */
	public $fee_class;
	
	/**
	 * @var DOUBLE
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
	
	/**
	 * @var DATE
	 */
	public $fee_fromdate;
	
	/**
	 * @var DATE
	 */
	public $fee_todate;
	
	public $pog_attribute_type = array(
		"es_feemasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_particular" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fee_class" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_amount" => array('db_attributes' => array("NUMERIC", "DOUBLE")),
		"fee_instalments" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_extra1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fee_extra2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fee_fromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"fee_todate" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_feemaster($fee_particular='', $fee_class='', $fee_amount='', $fee_instalments='', $fee_extra1='', $fee_extra2='', $fee_fromdate='', $fee_todate='')
	{
		$this->fee_particular = $fee_particular;
		$this->fee_class = $fee_class;
		$this->fee_amount = $fee_amount;
		$this->fee_instalments = $fee_instalments;
		$this->fee_extra1 = $fee_extra1;
		$this->fee_extra2 = $fee_extra2;
		$this->fee_fromdate = $fee_fromdate;
		$this->fee_todate = $fee_todate;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_feemasterId 
	* @return object $es_feemaster
	*/
	function Get($es_feemasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_feemaster` where `es_feemasterid`='".intval($es_feemasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_feemasterId = $row['es_feemasterid'];
			$this->fee_particular = $this->Unescape($row['fee_particular']);
			$this->fee_class = $this->Unescape($row['fee_class']);
			$this->fee_amount = $this->Unescape($row['fee_amount']);
			$this->fee_instalments = $this->Unescape($row['fee_instalments']);
			$this->fee_extra1 = $this->Unescape($row['fee_extra1']);
			$this->fee_extra2 = $this->Unescape($row['fee_extra2']);
			$this->fee_fromdate = $row['fee_fromdate'];
			$this->fee_todate = $row['fee_todate'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_feemasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_feemaster` ";
		$es_feemasterList = Array();
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
			$sortBy = "es_feemasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_feemaster = new $thisObjectName();
			$es_feemaster->es_feemasterId = $row['es_feemasterid'];
			$es_feemaster->fee_particular = $this->Unescape($row['fee_particular']);
			$es_feemaster->fee_class = $this->Unescape($row['fee_class']);
			$es_feemaster->fee_amount = $this->Unescape($row['fee_amount']);
			$es_feemaster->fee_instalments = $this->Unescape($row['fee_instalments']);
			$es_feemaster->fee_extra1 = $this->Unescape($row['fee_extra1']);
			$es_feemaster->fee_extra2 = $this->Unescape($row['fee_extra2']);
			$es_feemaster->fee_fromdate = $row['fee_fromdate'];
			$es_feemaster->fee_todate = $row['fee_todate'];
			$es_feemasterList[] = $es_feemaster;
		}
		return $es_feemasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_feemasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_feemasterid` from `es_feemaster` where `es_feemasterid`='".$this->es_feemasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_feemaster` set 
			`fee_particular`='".$this->Escape($this->fee_particular)."', 
			`fee_class`='".$this->Escape($this->fee_class)."', 
			`fee_amount`='".$this->Escape($this->fee_amount)."', 
			`fee_instalments`='".$this->Escape($this->fee_instalments)."', 
			`fee_extra1`='".$this->Escape($this->fee_extra1)."', 
			`fee_extra2`='".$this->Escape($this->fee_extra2)."', 
			`fee_fromdate`='".$this->fee_fromdate."', 
			`fee_todate`='".$this->fee_todate."' where `es_feemasterid`='".$this->es_feemasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_feemaster` (`fee_particular`, `fee_class`, `fee_amount`, `fee_instalments`, `fee_extra1`, `fee_extra2`, `fee_fromdate`, `fee_todate` ) values (
			'".$this->Escape($this->fee_particular)."', 
			'".$this->Escape($this->fee_class)."', 
			'".$this->Escape($this->fee_amount)."', 
			'".$this->Escape($this->fee_instalments)."', 
			'".$this->Escape($this->fee_extra1)."', 
			'".$this->Escape($this->fee_extra2)."', 
			'".$this->fee_fromdate."', 
			'".$this->fee_todate."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_feemasterId == "")
		{
			$this->es_feemasterId = $insertId;
		}
		return $this->es_feemasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_feemasterId
	*/
	function SaveNew()
	{
		$this->es_feemasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_feemaster` where `es_feemasterid`='".$this->es_feemasterId."'";
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
			$pog_query = "delete from `es_feemaster` where ";
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