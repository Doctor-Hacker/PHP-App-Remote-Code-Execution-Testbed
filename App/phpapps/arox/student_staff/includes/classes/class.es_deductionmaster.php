<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_deductionmaster` (
	`es_deductionmasterid` int(11) NOT NULL auto_increment,
	`ded_post` VARCHAR(255) NOT NULL,
	`ded_type` VARCHAR(255) NOT NULL,
	`ded_fromdate` DATE NOT NULL,
	`ded_todate` DATE NOT NULL,
	`ded_amount` VARCHAR(255) NOT NULL,
	`ded_amt_type` VARCHAR(255) NOT NULL,
	`ded_dept` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_deductionmasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_deductionmaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_deductionmaster&attributeList=array+%28%0A++0+%3D%3E+%27ded_post%27%2C%0A++1+%3D%3E+%27ded_type%27%2C%0A++2+%3D%3E+%27ded_fromdate%27%2C%0A++3+%3D%3E+%27ded_todate%27%2C%0A++4+%3D%3E+%27ded_amount%27%2C%0A++5+%3D%3E+%27ded_amt_type%27%2C%0A++6+%3D%3E+%27ded_dept%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_deductionmaster extends POG_Base
{
	public $es_deductionmasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $ded_post;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $ded_type;
	
	/**
	 * @var DATE
	 */
	public $ded_fromdate;
	
	/**
	 * @var DATE
	 */
	public $ded_todate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $ded_amount;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $ded_amt_type;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $ded_dept;
	
	public $pog_attribute_type = array(
		"es_deductionmasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"ded_post" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"ded_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"ded_fromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"ded_todate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"ded_amount" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"ded_amt_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"ded_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_deductionmaster($ded_post='', $ded_type='', $ded_fromdate='', $ded_todate='', $ded_amount='', $ded_amt_type='', $ded_dept='')
	{
		$this->ded_post = $ded_post;
		$this->ded_type = $ded_type;
		$this->ded_fromdate = $ded_fromdate;
		$this->ded_todate = $ded_todate;
		$this->ded_amount = $ded_amount;
		$this->ded_amt_type = $ded_amt_type;
		$this->ded_dept = $ded_dept;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_deductionmasterId 
	* @return object $es_deductionmaster
	*/
	function Get($es_deductionmasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_deductionmaster` where `es_deductionmasterid`='".intval($es_deductionmasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_deductionmasterId = $row['es_deductionmasterid'];
			$this->ded_post = $this->Unescape($row['ded_post']);
			$this->ded_type = $this->Unescape($row['ded_type']);
			$this->ded_fromdate = $row['ded_fromdate'];
			$this->ded_todate = $row['ded_todate'];
			$this->ded_amount = $this->Unescape($row['ded_amount']);
			$this->ded_amt_type = $this->Unescape($row['ded_amt_type']);
			$this->ded_dept = $this->Unescape($row['ded_dept']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_deductionmasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_deductionmaster` ";
		$es_deductionmasterList = Array();
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
			$sortBy = "es_deductionmasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_deductionmaster = new $thisObjectName();
			$es_deductionmaster->es_deductionmasterId = $row['es_deductionmasterid'];
			$es_deductionmaster->ded_post = $this->Unescape($row['ded_post']);
			$es_deductionmaster->ded_type = $this->Unescape($row['ded_type']);
			$es_deductionmaster->ded_fromdate = $row['ded_fromdate'];
			$es_deductionmaster->ded_todate = $row['ded_todate'];
			$es_deductionmaster->ded_amount = $this->Unescape($row['ded_amount']);
			$es_deductionmaster->ded_amt_type = $this->Unescape($row['ded_amt_type']);
			$es_deductionmaster->ded_dept = $this->Unescape($row['ded_dept']);
			$es_deductionmasterList[] = $es_deductionmaster;
		}
		return $es_deductionmasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_deductionmasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_deductionmasterid` from `es_deductionmaster` where `es_deductionmasterid`='".$this->es_deductionmasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_deductionmaster` set 
			`ded_post`='".$this->Escape($this->ded_post)."', 
			`ded_type`='".$this->Escape($this->ded_type)."', 
			`ded_fromdate`='".$this->ded_fromdate."', 
			`ded_todate`='".$this->ded_todate."', 
			`ded_amount`='".$this->Escape($this->ded_amount)."', 
			`ded_amt_type`='".$this->Escape($this->ded_amt_type)."', 
			`ded_dept`='".$this->Escape($this->ded_dept)."' where `es_deductionmasterid`='".$this->es_deductionmasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_deductionmaster` (`ded_post`, `ded_type`, `ded_fromdate`, `ded_todate`, `ded_amount`, `ded_amt_type`, `ded_dept` ) values (
			'".$this->Escape($this->ded_post)."', 
			'".$this->Escape($this->ded_type)."', 
			'".$this->ded_fromdate."', 
			'".$this->ded_todate."', 
			'".$this->Escape($this->ded_amount)."', 
			'".$this->Escape($this->ded_amt_type)."', 
			'".$this->Escape($this->ded_dept)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_deductionmasterId == "")
		{
			$this->es_deductionmasterId = $insertId;
		}
		return $this->es_deductionmasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_deductionmasterId
	*/
	function SaveNew()
	{
		$this->es_deductionmasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_deductionmaster` where `es_deductionmasterid`='".$this->es_deductionmasterId."'";
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
			$pog_query = "delete from `es_deductionmaster` where ";
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