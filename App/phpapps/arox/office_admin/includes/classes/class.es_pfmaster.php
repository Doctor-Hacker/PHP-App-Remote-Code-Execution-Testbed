<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_pfmaster` (
	`es_pfmasterid` int(11) NOT NULL auto_increment,
	`pf_post` VARCHAR(255) NOT NULL,
	`pf_empcont` FLOAT NOT NULL,
	`pf_empconttype` VARCHAR(255) NOT NULL,
	`pf_empycont` FLOAT NOT NULL,
	`pf_empyconttype` VARCHAR(255) NOT NULL,
	`pf_dept` VARCHAR(255) NOT NULL,
	`pf_from_date` DATE NOT NULL,
	`pf_to_date` DATE NOT NULL, PRIMARY KEY  (`es_pfmasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_pfmaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_pfmaster&attributeList=array+%28%0A++0+%3D%3E+%27pf_post%27%2C%0A++1+%3D%3E+%27pf_empcont%27%2C%0A++2+%3D%3E+%27pf_empconttype%27%2C%0A++3+%3D%3E+%27pf_empycont%27%2C%0A++4+%3D%3E+%27pf_empyconttype%27%2C%0A++5+%3D%3E+%27pf_dept%27%2C%0A++6+%3D%3E+%27pf_from_date%27%2C%0A++7+%3D%3E+%27pf_to_date%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27FLOAT%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27FLOAT%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27DATE%27%2C%0A++7+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_pfmaster extends POG_Base
{
	public $es_pfmasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $pf_post;
	
	/**
	 * @var FLOAT
	 */
	public $pf_empcont;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pf_empconttype;
	
	/**
	 * @var FLOAT
	 */
	public $pf_empycont;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pf_empyconttype;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pf_dept;
	
	/**
	 * @var DATE
	 */
	public $pf_from_date;
	
	/**
	 * @var DATE
	 */
	public $pf_to_date;
	
	public $pog_attribute_type = array(
		"es_pfmasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"pf_post" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pf_empcont" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"pf_empconttype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pf_empycont" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"pf_empyconttype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pf_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pf_from_date" => array('db_attributes' => array("NUMERIC", "DATE")),
		"pf_to_date" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_pfmaster($pf_post='', $pf_empcont='', $pf_empconttype='', $pf_empycont='', $pf_empyconttype='', $pf_dept='', $pf_from_date='', $pf_to_date='')
	{
		$this->pf_post = $pf_post;
		$this->pf_empcont = $pf_empcont;
		$this->pf_empconttype = $pf_empconttype;
		$this->pf_empycont = $pf_empycont;
		$this->pf_empyconttype = $pf_empyconttype;
		$this->pf_dept = $pf_dept;
		$this->pf_from_date = $pf_from_date;
		$this->pf_to_date = $pf_to_date;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_pfmasterId 
	* @return object $es_pfmaster
	*/
	function Get($es_pfmasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_pfmaster` where `es_pfmasterid`='".intval($es_pfmasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_pfmasterId = $row['es_pfmasterid'];
			$this->pf_post = $this->Unescape($row['pf_post']);
			$this->pf_empcont = $this->Unescape($row['pf_empcont']);
			$this->pf_empconttype = $this->Unescape($row['pf_empconttype']);
			$this->pf_empycont = $this->Unescape($row['pf_empycont']);
			$this->pf_empyconttype = $this->Unescape($row['pf_empyconttype']);
			$this->pf_dept = $this->Unescape($row['pf_dept']);
			$this->pf_from_date = $row['pf_from_date'];
			$this->pf_to_date = $row['pf_to_date'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_pfmasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_pfmaster` ";
		$es_pfmasterList = Array();
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
			$sortBy = "es_pfmasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_pfmaster = new $thisObjectName();
			$es_pfmaster->es_pfmasterId = $row['es_pfmasterid'];
			$es_pfmaster->pf_post = $this->Unescape($row['pf_post']);
			$es_pfmaster->pf_empcont = $this->Unescape($row['pf_empcont']);
			$es_pfmaster->pf_empconttype = $this->Unescape($row['pf_empconttype']);
			$es_pfmaster->pf_empycont = $this->Unescape($row['pf_empycont']);
			$es_pfmaster->pf_empyconttype = $this->Unescape($row['pf_empyconttype']);
			$es_pfmaster->pf_dept = $this->Unescape($row['pf_dept']);
			$es_pfmaster->pf_from_date = $row['pf_from_date'];
			$es_pfmaster->pf_to_date = $row['pf_to_date'];
			$es_pfmasterList[] = $es_pfmaster;
		}
		return $es_pfmasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_pfmasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_pfmasterid` from `es_pfmaster` where `es_pfmasterid`='".$this->es_pfmasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_pfmaster` set 
			`pf_post`='".$this->Escape($this->pf_post)."', 
			`pf_empcont`='".$this->Escape($this->pf_empcont)."', 
			`pf_empconttype`='".$this->Escape($this->pf_empconttype)."', 
			`pf_empycont`='".$this->Escape($this->pf_empycont)."', 
			`pf_empyconttype`='".$this->Escape($this->pf_empyconttype)."', 
			`pf_dept`='".$this->Escape($this->pf_dept)."', 
			`pf_from_date`='".$this->pf_from_date."', 
			`pf_to_date`='".$this->pf_to_date."' where `es_pfmasterid`='".$this->es_pfmasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_pfmaster` (`pf_post`, `pf_empcont`, `pf_empconttype`, `pf_empycont`, `pf_empyconttype`, `pf_dept`, `pf_from_date`, `pf_to_date` ) values (
			'".$this->Escape($this->pf_post)."', 
			'".$this->Escape($this->pf_empcont)."', 
			'".$this->Escape($this->pf_empconttype)."', 
			'".$this->Escape($this->pf_empycont)."', 
			'".$this->Escape($this->pf_empyconttype)."', 
			'".$this->Escape($this->pf_dept)."', 
			'".$this->pf_from_date."', 
			'".$this->pf_to_date."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_pfmasterId == "")
		{
			$this->es_pfmasterId = $insertId;
		}
		return $this->es_pfmasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_pfmasterId
	*/
	function SaveNew()
	{
		$this->es_pfmasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_pfmaster` where `es_pfmasterid`='".$this->es_pfmasterId."'";
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
			$pog_query = "delete from `es_pfmaster` where ";
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