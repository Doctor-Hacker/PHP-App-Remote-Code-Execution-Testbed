<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_taxmaster` (
	`es_taxmasterid` int(11) NOT NULL auto_increment,
	`tax_name` VARCHAR(255) NOT NULL,
	`tax_percentage_type` VARCHAR(255) NOT NULL,
	`tax_to` VARCHAR(255) NOT NULL,
	`tax_from` VARCHAR(255) NOT NULL,
	`tax_rate` VARCHAR(255) NOT NULL,
	`tax_from_date` DATE NOT NULL,
	`tax_to_date` DATE NOT NULL, PRIMARY KEY  (`es_taxmasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_taxmaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_taxmaster&attributeList=array+%28%0A++0+%3D%3E+%27tax_name%27%2C%0A++1+%3D%3E+%27tax_percentage_type%27%2C%0A++2+%3D%3E+%27tax_to%27%2C%0A++3+%3D%3E+%27tax_from%27%2C%0A++4+%3D%3E+%27tax_rate%27%2C%0A++5+%3D%3E+%27tax_from_date%27%2C%0A++6+%3D%3E+%27tax_to_date%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27DATE%27%2C%0A++6+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_taxmaster extends POG_Base
{
	public $es_taxmasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $tax_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tax_percentage_type;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tax_to;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tax_from;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $tax_rate;
	
	/**
	 * @var DATE
	 */
	public $tax_from_date;
	
	/**
	 * @var DATE
	 */
	public $tax_to_date;
	
	public $pog_attribute_type = array(
		"es_taxmasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"tax_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tax_percentage_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tax_to" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tax_from" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tax_rate" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"tax_from_date" => array('db_attributes' => array("NUMERIC", "DATE")),
		"tax_to_date" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_taxmaster($tax_name='', $tax_percentage_type='', $tax_to='', $tax_from='', $tax_rate='', $tax_from_date='', $tax_to_date='')
	{
		$this->tax_name = $tax_name;
		$this->tax_percentage_type = $tax_percentage_type;
		$this->tax_to = $tax_to;
		$this->tax_from = $tax_from;
		$this->tax_rate = $tax_rate;
		$this->tax_from_date = $tax_from_date;
		$this->tax_to_date = $tax_to_date;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_taxmasterId 
	* @return object $es_taxmaster
	*/
	function Get($es_taxmasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_taxmaster` where `es_taxmasterid`='".intval($es_taxmasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_taxmasterId = $row['es_taxmasterid'];
			$this->tax_name = $this->Unescape($row['tax_name']);
			$this->tax_percentage_type = $this->Unescape($row['tax_percentage_type']);
			$this->tax_to = $this->Unescape($row['tax_to']);
			$this->tax_from = $this->Unescape($row['tax_from']);
			$this->tax_rate = $this->Unescape($row['tax_rate']);
			$this->tax_from_date = $row['tax_from_date'];
			$this->tax_to_date = $row['tax_to_date'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_taxmasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_taxmaster` ";
		$es_taxmasterList = Array();
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
						/****prabhakar */
						if (strstr($value, ' AND ')) {
							list($d1, $d2 ) = explode('AND',$value);
							$value =  "   " . $d1 . "'   AND  '" . $d2;
						} 
						/****prabhakar ****/
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
			$sortBy = "es_taxmasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_taxmaster = new $thisObjectName();
			$es_taxmaster->es_taxmasterId = $row['es_taxmasterid'];
			$es_taxmaster->tax_name = $this->Unescape($row['tax_name']);
			$es_taxmaster->tax_percentage_type = $this->Unescape($row['tax_percentage_type']);
			$es_taxmaster->tax_to = $this->Unescape($row['tax_to']);
			$es_taxmaster->tax_from = $this->Unescape($row['tax_from']);
			$es_taxmaster->tax_rate = $this->Unescape($row['tax_rate']);
			$es_taxmaster->tax_from_date = $row['tax_from_date'];
			$es_taxmaster->tax_to_date = $row['tax_to_date'];
			$es_taxmasterList[] = $es_taxmaster;
		}
		return $es_taxmasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_taxmasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_taxmasterid` from `es_taxmaster` where `es_taxmasterid`='".$this->es_taxmasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_taxmaster` set 
			`tax_name`='".$this->Escape($this->tax_name)."', 
			`tax_percentage_type`='".$this->Escape($this->tax_percentage_type)."', 
			`tax_to`='".$this->Escape($this->tax_to)."', 
			`tax_from`='".$this->Escape($this->tax_from)."', 
			`tax_rate`='".$this->Escape($this->tax_rate)."', 
			`tax_from_date`='".$this->tax_from_date."', 
			`tax_to_date`='".$this->tax_to_date."' where `es_taxmasterid`='".$this->es_taxmasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_taxmaster` (`tax_name`, `tax_percentage_type`, `tax_to`, `tax_from`, `tax_rate`, `tax_from_date`, `tax_to_date` ) values (
			'".$this->Escape($this->tax_name)."', 
			'".$this->Escape($this->tax_percentage_type)."', 
			'".$this->Escape($this->tax_to)."', 
			'".$this->Escape($this->tax_from)."', 
			'".$this->Escape($this->tax_rate)."', 
			'".$this->tax_from_date."', 
			'".$this->tax_to_date."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_taxmasterId == "")
		{
			$this->es_taxmasterId = $insertId;
		}
		return $this->es_taxmasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_taxmasterId
	*/
	function SaveNew()
	{
		$this->es_taxmasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_taxmaster` where `es_taxmasterid`='".$this->es_taxmasterId."'";
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
			$pog_query = "delete from `es_taxmaster` where ";
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