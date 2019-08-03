<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_libbookfinedet` (
	`es_libbookfinedetid` int(11) NOT NULL auto_increment,
	`es_libbooksid` VARCHAR(255) NOT NULL,
	`es_libbookbwid` VARCHAR(255) NOT NULL,
	`es_libbookfine` VARCHAR(255) NOT NULL,
	`es_libbookdate` VARCHAR(255) NOT NULL,
	`es_type` VARCHAR(255) NOT NULL,
	`status` enum('active','inactive') NOT NULL,
	`es_issuetype` VARCHAR(255) NOT NULL,
	`fine_paid` VARCHAR(255) NOT NULL,
	`fine_deducted` VARCHAR(255) NOT NULL,
	`paid_on` DATE NOT NULL,
	`remarks` TEXT NOT NULL, PRIMARY KEY  (`es_libbookfinedetid`)) ENGINE=MyISAM;
*/

/**
* <b>es_libbookfinedet</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_libbookfinedet&attributeList=array+%28%0A++0+%3D%3E+%27es_libbooksid%27%2C%0A++1+%3D%3E+%27es_libbookbwid%27%2C%0A++2+%3D%3E+%27es_libbookfine%27%2C%0A++3+%3D%3E+%27es_libbookdate%27%2C%0A++4+%3D%3E+%27es_type%27%2C%0A++5+%3D%3E+%27status%27%2C%0A++6+%3D%3E+%27es_issuetype%27%2C%0A++7+%3D%3E+%27fine_paid%27%2C%0A++8+%3D%3E+%27fine_deducted%27%2C%0A++9+%3D%3E+%27paid_on%27%2C%0A++10+%3D%3E+%27remarks%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27enum%28%5C%27active%5C%27%2C%5C%27inactive%5C%27%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27DATE%27%2C%0A++10+%3D%3E+%27TEXT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_libbookfinedet extends POG_Base
{
	public $es_libbookfinedetId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_libbooksid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_libbookbwid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_libbookfine;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_libbookdate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_type;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_issuetype;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fine_paid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fine_deducted;
	
	/**
	 * @var DATE
	 */
	public $paid_on;
	
	/**
	 * @var TEXT
	 */
	public $remarks;
	
	public $pog_attribute_type = array(
		"es_libbookfinedetId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_libbooksid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_libbookbwid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_libbookfine" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_libbookdate" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive'")),
		"es_issuetype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fine_paid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fine_deducted" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"paid_on" => array('db_attributes' => array("NUMERIC", "DATE")),
		"remarks" => array('db_attributes' => array("TEXT", "TEXT")),
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
	
	function es_libbookfinedet($es_libbooksid='', $es_libbookbwid='', $es_libbookfine='', $es_libbookdate='', $es_type='', $status='', $es_issuetype='', $fine_paid='', $fine_deducted='', $paid_on='', $remarks='')
	{
		$this->es_libbooksid = $es_libbooksid;
		$this->es_libbookbwid = $es_libbookbwid;
		$this->es_libbookfine = $es_libbookfine;
		$this->es_libbookdate = $es_libbookdate;
		$this->es_type = $es_type;
		$this->status = $status;
		$this->es_issuetype = $es_issuetype;
		$this->fine_paid = $fine_paid;
		$this->fine_deducted = $fine_deducted;
		$this->paid_on = $paid_on;
		$this->remarks = $remarks;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_libbookfinedetId 
	* @return object $es_libbookfinedet
	*/
	function Get($es_libbookfinedetId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libbookfinedet` where `es_libbookfinedetid`='".intval($es_libbookfinedetId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libbookfinedetId = $row['es_libbookfinedetid'];
			$this->es_libbooksid = $this->Unescape($row['es_libbooksid']);
			$this->es_libbookbwid = $this->Unescape($row['es_libbookbwid']);
			$this->es_libbookfine = $this->Unescape($row['es_libbookfine']);
			$this->es_libbookdate = $this->Unescape($row['es_libbookdate']);
			$this->es_type = $this->Unescape($row['es_type']);
			$this->status = $row['status'];
			$this->es_issuetype = $this->Unescape($row['es_issuetype']);
			$this->fine_paid = $this->Unescape($row['fine_paid']);
			$this->fine_deducted = $this->Unescape($row['fine_deducted']);
			$this->paid_on = $row['paid_on'];
			$this->remarks = $this->Unescape($row['remarks']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_libbookfinedetList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_libbookfinedet` ";
		$es_libbookfinedetList = Array();
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
			$sortBy = "es_libbookfinedetid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_libbookfinedet = new $thisObjectName();
			$es_libbookfinedet->es_libbookfinedetId = $row['es_libbookfinedetid'];
			$es_libbookfinedet->es_libbooksid = $this->Unescape($row['es_libbooksid']);
			$es_libbookfinedet->es_libbookbwid = $this->Unescape($row['es_libbookbwid']);
			$es_libbookfinedet->es_libbookfine = $this->Unescape($row['es_libbookfine']);
			$es_libbookfinedet->es_libbookdate = $this->Unescape($row['es_libbookdate']);
			$es_libbookfinedet->es_type = $this->Unescape($row['es_type']);
			$es_libbookfinedet->status = $row['status'];
			$es_libbookfinedet->es_issuetype = $this->Unescape($row['es_issuetype']);
			$es_libbookfinedet->fine_paid = $this->Unescape($row['fine_paid']);
			$es_libbookfinedet->fine_deducted = $this->Unescape($row['fine_deducted']);
			$es_libbookfinedet->paid_on = $row['paid_on'];
			$es_libbookfinedet->remarks = $this->Unescape($row['remarks']);
			$es_libbookfinedetList[] = $es_libbookfinedet;
		}
		return $es_libbookfinedetList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_libbookfinedetId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_libbookfinedetid` from `es_libbookfinedet` where `es_libbookfinedetid`='".$this->es_libbookfinedetId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_libbookfinedet` set 
			`es_libbooksid`='".$this->Escape($this->es_libbooksid)."', 
			`es_libbookbwid`='".$this->Escape($this->es_libbookbwid)."', 
			`es_libbookfine`='".$this->Escape($this->es_libbookfine)."', 
			`es_libbookdate`='".$this->Escape($this->es_libbookdate)."', 
			`es_type`='".$this->Escape($this->es_type)."', 
			`status`='".$this->status."', 
			`es_issuetype`='".$this->Escape($this->es_issuetype)."', 
			`fine_paid`='".$this->Escape($this->fine_paid)."', 
			`fine_deducted`='".$this->Escape($this->fine_deducted)."', 
			`paid_on`='".$this->paid_on."', 
			`remarks`='".$this->Escape($this->remarks)."' where `es_libbookfinedetid`='".$this->es_libbookfinedetId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_libbookfinedet` (`es_libbooksid`, `es_libbookbwid`, `es_libbookfine`, `es_libbookdate`, `es_type`, `status`, `es_issuetype`, `fine_paid`, `fine_deducted`, `paid_on`, `remarks` ) values (
			'".$this->Escape($this->es_libbooksid)."', 
			'".$this->Escape($this->es_libbookbwid)."', 
			'".$this->Escape($this->es_libbookfine)."', 
			'".$this->Escape($this->es_libbookdate)."', 
			'".$this->Escape($this->es_type)."', 
			'".$this->status."', 
			'".$this->Escape($this->es_issuetype)."', 
			'".$this->Escape($this->fine_paid)."', 
			'".$this->Escape($this->fine_deducted)."', 
			'".$this->paid_on."', 
			'".$this->Escape($this->remarks)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_libbookfinedetId == "")
		{
			$this->es_libbookfinedetId = $insertId;
		}
		return $this->es_libbookfinedetId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_libbookfinedetId
	*/
	function SaveNew()
	{
		$this->es_libbookfinedetId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_libbookfinedet` where `es_libbookfinedetid`='".$this->es_libbookfinedetId."'";
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
			$pog_query = "delete from `es_libbookfinedet` where ";
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