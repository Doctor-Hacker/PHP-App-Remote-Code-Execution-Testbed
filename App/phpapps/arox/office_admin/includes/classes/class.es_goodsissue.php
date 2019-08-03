<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_goodsissue` (
	`es_goodsissueid` int(11) NOT NULL auto_increment,
	`fld_issuedate` DATETIME NOT NULL,
	`fld_issueto` VARCHAR(255) NOT NULL,
	`fld_inventoryid` INT NOT NULL,
	`fld_issueditem` LONGTEXT NOT NULL,
	`fld_returneditem` LONGTEXT NOT NULL,
	`fld_departmentid` INT NOT NULL,
	`fld_issuestatus` enum('notreturned','partialreturned','returned') NOT NULL,
	`fld_status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_goodsissueid`)) ENGINE=MyISAM;
*/

/**
* <b>es_goodsissue</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_goodsissue&attributeList=array+%28%0A++0+%3D%3E+%27fld_issuedate%27%2C%0A++1+%3D%3E+%27fld_issueto%27%2C%0A++2+%3D%3E+%27fld_inventoryid%27%2C%0A++3+%3D%3E+%27fld_issueditem%27%2C%0A++4+%3D%3E+%27fld_returneditem%27%2C%0A++5+%3D%3E+%27fld_departmentid%27%2C%0A++6+%3D%3E+%27fld_issuestatus%27%2C%0A++7+%3D%3E+%27fld_status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27DATETIME%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27LONGTEXT%27%2C%0A++4+%3D%3E+%27LONGTEXT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27enum%28%5C%5C%5C%27notreturned%5C%5C%5C%27%2C%5C%5C%5C%27partialreturned%5C%5C%5C%27%2C%5C%5C%5C%27returned%5C%5C%5C%27%29%27%2C%0A++7+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_goodsissue extends POG_Base
{
	public $es_in_goodsissueId = '';

	/**
	 * @var DATETIME
	 */
	public $fld_issuedate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_issueto;
	
	/**
	 * @var INT
	 */
	public $fld_inventoryid;
	
	/**
	 * @var LONGTEXT
	 */
	public $fld_issueditem;
	
	/**
	 * @var LONGTEXT
	 */
	public $fld_returneditem;
	
	/**
	 * @var INT
	 */
	public $fld_departmentid;
	
	/**
	 * @var enum('notreturned','partialreturned','returned')
	 */
	public $fld_issuestatus;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $fld_status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_remarks;
	
	public $pog_attribute_type = array(
		"es_in_goodsissueId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_issuedate" => array('db_attributes' => array("TEXT", "DATETIME")),
		"fld_issueto" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_inventoryid" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_issueditem" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"fld_returneditem" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"fld_departmentid" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_issuestatus" => array('db_attributes' => array("SET", "ENUM", "'notreturned','partialreturned','returned'")),
		"fld_status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"fld_remarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_goodsissue($fld_issuedate='', $fld_issueto='', $fld_inventoryid='', $fld_issueditem='', $fld_returneditem='', $fld_departmentid='', $fld_issuestatus='', $fld_status='', $fld_remarks='')
	{
		$this->fld_issuedate = $fld_issuedate;
		$this->fld_issueto = $fld_issueto;
		$this->fld_inventoryid = $fld_inventoryid;
		$this->fld_issueditem = $fld_issueditem;
		$this->fld_returneditem = $fld_returneditem;
		$this->fld_departmentid = $fld_departmentid;
		$this->fld_issuestatus = $fld_issuestatus;
		$this->fld_status = $fld_status;
		$this->fld_remarks = $fld_remarks;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_goodsissueid 
	* @return object $es_goodsissue
	*/
	function Get($es_in_goodsissueId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_goodsissue` where `es_goodsissueid`='".intval($es_in_goodsissueId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_in_goodsissueId = $row['es_goodsissueid'];
			$this->fld_issuedate = $row['fld_issuedate'];
			$this->fld_issueto = $this->Unescape($row['fld_issueto']);
			$this->fld_inventoryid = $this->Unescape($row['fld_inventoryid']);
			$this->fld_issueditem = $this->Unescape($row['fld_issueditem']);
			$this->fld_returneditem = $this->Unescape($row['fld_returneditem']);
			$this->fld_departmentid = $this->Unescape($row['fld_departmentid']);
			$this->fld_issuestatus = $row['fld_issuestatus'];
			$this->fld_status = $row['fld_status'];
			$this->fld_remarks = $this->Unescape($row['fld_remarks']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_goodsissueList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_goodsissue` ";
		$es_goodsissueList = Array();
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
			$sortBy = "es_goodsissueid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		
		//echo $this->pog_query; exit;
		
		$thisObjectName = get_class($this);
//		$cursor = Database::Reader($this->pog_query, $connection);
		$cursor = Database::Reader(stripslashes($this->pog_query), $connection);
		while ($row = Database::Read($cursor))
		{
			$es_goodsissue = new $thisObjectName();
			$es_goodsissue->es_in_goodsissueId = $row['es_goodsissueid'];
			$es_goodsissue->fld_issuedate = $row['fld_issuedate'];
			$es_goodsissue->fld_issueto = $this->Unescape($row['fld_issueto']);
			$es_goodsissue->fld_inventoryid = $this->Unescape($row['fld_inventoryid']);
			$es_goodsissue->fld_issueditem = $this->Unescape($row['fld_issueditem']);
			$es_goodsissue->fld_returneditem = $this->Unescape($row['fld_returneditem']);
			$es_goodsissue->fld_departmentid = $this->Unescape($row['fld_departmentid']);
			$es_goodsissue->fld_issuestatus = $row['fld_issue'];
			$es_goodsissue->fld_status = $row['fld_status'];
			$es_goodsissue->fld_remarks = $this->Unescape($row['fld_remarks']);
			$es_goodsissueList[] = $es_goodsissue;
		}
		return $es_goodsissueList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_goodsissueid
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_goodsissueid` from `es_goodsissue` where `es_goodsissueid`='".$this->es_in_goodsissueId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_goodsissue` set 
			`fld_issuedate`='".$this->fld_issuedate."', 
			`fld_issueto`='".$this->Escape($this->fld_issueto)."', 
			`fld_inventoryid`='".$this->Escape($this->fld_inventoryid)."', 
			`fld_issueditem`='".$this->Escape($this->fld_issueditem)."', 
			`fld_returneditem`='".$this->Escape($this->fld_returneditem)."', 
			`fld_departmentid`='".$this->Escape($this->fld_departmentid)."',
			`fld_remarks`='".$this->Escape($this->fld_remarks)."', 
			`fld_issuestatus`='".$this->fld_issuestatus."', 
			`fld_status`='".$this->fld_status."' where `es_goodsissueid`='".$this->es_goodsissueid."'";
		}
		else
		{
			$this->pog_query = "insert into `es_goodsissue` (`fld_issuedate`, `fld_issueto`, `fld_inventoryid`, `fld_issueditem`, `fld_returneditem`, `fld_departmentid`, `fld_issuestatus`, `fld_status`, `fld_remarks` ) values (
			'".$this->fld_issuedate."', 
			'".$this->Escape($this->fld_issueto)."', 
			'".$this->Escape($this->fld_inventoryid)."', 
			'".$this->Escape($this->fld_issueditem)."', 
			'".$this->Escape($this->fld_returneditem)."', 
			'".$this->Escape($this->fld_departmentid)."', 
			'".$this->fld_issuestatus."', 
			'".$this->fld_status."',
			'".$this->Escape($this->fld_issueto)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_in_goodsissueId == "")
		{
			$this->es_in_goodsissueId = $insertId;
		}
		return $this->es_in_goodsissueId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_goodsissueid
	*/
	function SaveNew()
	{
		$this->es_in_goodsissueId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_goodsissue` where `es_goodsissueid`='".$this->es_in_goodsissueId."'";
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
			$pog_query = "delete from `es_goodsissue` where ";
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