<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_allowencemaster` (
	`es_allowencemasterid` int(11) NOT NULL auto_increment,
	`alw_post` VARCHAR(255) NOT NULL,
	`alw_type` VARCHAR(255) NOT NULL,
	`alw_fromdate` DATE NOT NULL,
	`alw_todate` DATE NOT NULL,
	`alw_amount` VARCHAR(255) NOT NULL,
	`alw_amt_type` VARCHAR(255) NOT NULL,
	`alw_dept` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_allowencemasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_allowencemaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_allowencemaster&attributeList=array+%28%0A++0+%3D%3E+%27alw_post%27%2C%0A++1+%3D%3E+%27alw_type%27%2C%0A++2+%3D%3E+%27alw_fromdate%27%2C%0A++3+%3D%3E+%27alw_todate%27%2C%0A++4+%3D%3E+%27alw_amount%27%2C%0A++5+%3D%3E+%27alw_amt_type%27%2C%0A++6+%3D%3E+%27alw_dept%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_allowencemaster extends POG_Base
{
	public $es_allowencemasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $alw_post;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $alw_type;
	
	/**
	 * @var DATE
	 */
	public $alw_fromdate;
	
	/**
	 * @var DATE
	 */
	public $alw_todate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $alw_amount;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $alw_amt_type;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $alw_dept;
	
	public $pog_attribute_type = array(
		"es_allowencemasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"alw_post" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"alw_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"alw_fromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"alw_todate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"alw_amount" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"alw_amt_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"alw_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_allowencemaster($alw_post='', $alw_type='', $alw_fromdate='', $alw_todate='', $alw_amount='', $alw_amt_type='', $alw_dept='')
	{
		$this->alw_post = $alw_post;
		$this->alw_type = $alw_type;
		$this->alw_fromdate = $alw_fromdate;
		$this->alw_todate = $alw_todate;
		$this->alw_amount = $alw_amount;
		$this->alw_amt_type = $alw_amt_type;
		$this->alw_dept = $alw_dept;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_allowencemasterId 
	* @return object $es_allowencemaster
	*/
	function Get($es_allowencemasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_allowencemaster` where `es_allowencemasterid`='".intval($es_allowencemasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_allowencemasterId = $row['es_allowencemasterid'];
			$this->alw_post = $this->Unescape($row['alw_post']);
			$this->alw_type = $this->Unescape($row['alw_type']);
			$this->alw_fromdate = $row['alw_fromdate'];
			$this->alw_todate = $row['alw_todate'];
			$this->alw_amount = $this->Unescape($row['alw_amount']);
			$this->alw_amt_type = $this->Unescape($row['alw_amt_type']);
			$this->alw_dept = $this->Unescape($row['alw_dept']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_allowencemasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_allowencemaster` ";
		$es_allowencemasterList = Array();
		if (sizeof($fcv_array) > 0)
		{
			$this->pog_query .= " where ";
			for ($i=0, $c = sizeof($fcv_array); $i<$c; $i++)
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
				//select * from `es_allowencemaster` where `es_allowencemasterId` > '0' AND `alw_todate` between '2009-01-09' AND '2009-01-31'

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
			$sortBy = "es_allowencemasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_allowencemaster = new $thisObjectName();
			$es_allowencemaster->es_allowencemasterId = $row['es_allowencemasterid'];
			$es_allowencemaster->alw_post = $this->Unescape($row['alw_post']);
			$es_allowencemaster->alw_type = $this->Unescape($row['alw_type']);
			$es_allowencemaster->alw_fromdate = $row['alw_fromdate'];
			$es_allowencemaster->alw_todate = $row['alw_todate'];
			$es_allowencemaster->alw_amount = $this->Unescape($row['alw_amount']);
			$es_allowencemaster->alw_amt_type = $this->Unescape($row['alw_amt_type']);
			$es_allowencemaster->alw_dept = $this->Unescape($row['alw_dept']);
			$es_allowencemasterList[] = $es_allowencemaster;
		}

		return $es_allowencemasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_allowencemasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_allowencemasterid` from `es_allowencemaster` where `es_allowencemasterid`='".$this->es_allowencemasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_allowencemaster` set 
			`alw_post`='".$this->Escape($this->alw_post)."', 
			`alw_type`='".$this->Escape($this->alw_type)."', 
			`alw_fromdate`='".$this->alw_fromdate."', 
			`alw_todate`='".$this->alw_todate."', 
			`alw_amount`='".$this->Escape($this->alw_amount)."', 
			`alw_amt_type`='".$this->Escape($this->alw_amt_type)."', 
			`alw_dept`='".$this->Escape($this->alw_dept)."' where `es_allowencemasterid`='".$this->es_allowencemasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_allowencemaster` (`alw_post`, `alw_type`, `alw_fromdate`, `alw_todate`, `alw_amount`, `alw_amt_type`, `alw_dept` ) values (
			'".$this->Escape($this->alw_post)."', 
			'".$this->Escape($this->alw_type)."', 
			'".$this->alw_fromdate."', 
			'".$this->alw_todate."', 
			'".$this->Escape($this->alw_amount)."', 
			'".$this->Escape($this->alw_amt_type)."', 
			'".$this->Escape($this->alw_dept)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_allowencemasterId == "")
		{
			$this->es_allowencemasterId = $insertId;
		}
		return $this->es_allowencemasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_allowencemasterId
	*/
	function SaveNew()
	{
		$this->es_allowencemasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_allowencemaster` where `es_allowencemasterid`='".$this->es_allowencemasterId."'";
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
			$pog_query = "delete from `es_allowencemaster` where ";
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