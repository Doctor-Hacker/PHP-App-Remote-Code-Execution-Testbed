<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_loanmaster` (
	`es_loanmasterid` int(11) NOT NULL auto_increment,
	`loan_post` VARCHAR(255) NOT NULL,
	`loan_type` VARCHAR(255) NOT NULL,
	`loan_name` VARCHAR(255) NOT NULL,
	`loan_fromdate` DATE NOT NULL,
	`loan_todate` DATE NOT NULL,
	`loan_intrestrate` VARCHAR(255) NOT NULL,
	`loan_maxlimit` VARCHAR(255) NOT NULL,
	`loan_dept` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_loanmasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_loanmaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_loanmaster&attributeList=array+%28%0A++0+%3D%3E+%27loan_post%27%2C%0A++1+%3D%3E+%27loan_type%27%2C%0A++2+%3D%3E+%27loan_name%27%2C%0A++3+%3D%3E+%27loan_fromdate%27%2C%0A++4+%3D%3E+%27loan_todate%27%2C%0A++5+%3D%3E+%27loan_intrestrate%27%2C%0A++6+%3D%3E+%27loan_maxlimit%27%2C%0A++7+%3D%3E+%27loan_dept%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27DATE%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_loanmaster extends POG_Base
{
	public $es_loanmasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $loan_post;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $loan_type;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $loan_name;
	
	/**
	 * @var DATE
	 */
	public $loan_fromdate;
	
	/**
	 * @var DATE
	 */
	public $loan_todate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $loan_intrestrate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $loan_maxlimit;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $loan_dept;
	
	public $pog_attribute_type = array(
		"es_loanmasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"loan_post" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"loan_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"loan_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"loan_fromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"loan_todate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"loan_intrestrate" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"loan_maxlimit" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"loan_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_loanmaster($loan_post='', $loan_type='', $loan_name='', $loan_fromdate='', $loan_todate='', $loan_intrestrate='', $loan_maxlimit='', $loan_dept='')
	{
		$this->loan_post = $loan_post;
		$this->loan_type = $loan_type;
		$this->loan_name = $loan_name;
		$this->loan_fromdate = $loan_fromdate;
		$this->loan_todate = $loan_todate;
		$this->loan_intrestrate = $loan_intrestrate;
		$this->loan_maxlimit = $loan_maxlimit;
		$this->loan_dept = $loan_dept;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_loanmasterId 
	* @return object $es_loanmaster
	*/
	function Get($es_loanmasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_loanmaster` where `es_loanmasterid`='".intval($es_loanmasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_loanmasterId = $row['es_loanmasterid'];
			$this->loan_post = $this->Unescape($row['loan_post']);
			$this->loan_type = $this->Unescape($row['loan_type']);
			$this->loan_name = $this->Unescape($row['loan_name']);
			$this->loan_fromdate = $row['loan_fromdate'];
			$this->loan_todate = $row['loan_todate'];
			$this->loan_intrestrate = $this->Unescape($row['loan_intrestrate']);
			$this->loan_maxlimit = $this->Unescape($row['loan_maxlimit']);
			$this->loan_dept = $this->Unescape($row['loan_dept']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_loanmasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_loanmaster` ";
		$es_loanmasterList = Array();
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
			$sortBy = "es_loanmasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_loanmaster = new $thisObjectName();
			$es_loanmaster->es_loanmasterId = $row['es_loanmasterid'];
			$es_loanmaster->loan_post = $this->Unescape($row['loan_post']);
			$es_loanmaster->loan_type = $this->Unescape($row['loan_type']);
			$es_loanmaster->loan_name = $this->Unescape($row['loan_name']);
			$es_loanmaster->loan_fromdate = $row['loan_fromdate'];
			$es_loanmaster->loan_todate = $row['loan_todate'];
			$es_loanmaster->loan_intrestrate = $this->Unescape($row['loan_intrestrate']);
			$es_loanmaster->loan_maxlimit = $this->Unescape($row['loan_maxlimit']);
			$es_loanmaster->loan_dept = $this->Unescape($row['loan_dept']);
			$es_loanmasterList[] = $es_loanmaster;
		}
		return $es_loanmasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_loanmasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_loanmasterid` from `es_loanmaster` where `es_loanmasterid`='".$this->es_loanmasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_loanmaster` set 
			`loan_post`='".$this->Escape($this->loan_post)."', 
			`loan_type`='".$this->Escape($this->loan_type)."', 
			`loan_name`='".$this->Escape($this->loan_name)."', 
			`loan_fromdate`='".$this->loan_fromdate."', 
			`loan_todate`='".$this->loan_todate."', 
			`loan_intrestrate`='".$this->Escape($this->loan_intrestrate)."', 
			`loan_maxlimit`='".$this->Escape($this->loan_maxlimit)."', 
			`loan_dept`='".$this->Escape($this->loan_dept)."' where `es_loanmasterid`='".$this->es_loanmasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_loanmaster` (`loan_post`, `loan_type`, `loan_name`, `loan_fromdate`, `loan_todate`, `loan_intrestrate`, `loan_maxlimit`, `loan_dept` ) values (
			'".$this->Escape($this->loan_post)."', 
			'".$this->Escape($this->loan_type)."', 
			'".$this->Escape($this->loan_name)."', 
			'".$this->loan_fromdate."', 
			'".$this->loan_todate."', 
			'".$this->Escape($this->loan_intrestrate)."', 
			'".$this->Escape($this->loan_maxlimit)."', 
			'".$this->Escape($this->loan_dept)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_loanmasterId == "")
		{
			$this->es_loanmasterId = $insertId;
		}
		return $this->es_loanmasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_loanmasterId
	*/
	function SaveNew()
	{
		$this->es_loanmasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_loanmaster` where `es_loanmasterid`='".$this->es_loanmasterId."'";
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
			$pog_query = "delete from `es_loanmaster` where ";
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