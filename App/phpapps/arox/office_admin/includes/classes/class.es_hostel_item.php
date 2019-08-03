<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_hostel_item` (
	`es_hostel_itemid` int(11) NOT NULL auto_increment,
	`hostel_itemno` INT NOT NULL,
	`hostel_itemcode` VARCHAR(255) NOT NULL,
	`hostel_itemname` VARCHAR(255) NOT NULL,
	`hostel_itemtype` VARCHAR(255) NOT NULL,
	`hostel_itemqty` INT NOT NULL,
	`es_hostelroomid` INT NOT NULL, PRIMARY KEY  (`es_hostel_itemid`)) ENGINE=MyISAM;
*/

/**
* <b>es_hostel_item</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_hostel_item&attributeList=array+%28%0A++0+%3D%3E+%27hostel_itemno%27%2C%0A++1+%3D%3E+%27hostel_itemcode%27%2C%0A++2+%3D%3E+%27hostel_itemname%27%2C%0A++3+%3D%3E+%27hostel_itemtype%27%2C%0A++4+%3D%3E+%27hostel_itemqty%27%2C%0A++5+%3D%3E+%27es_hostelroomid%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_hostel_item extends POG_Base
{
	public $es_hostel_itemId = '';

	/**
	 * @var INT
	 */
	public $hostel_itemno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $hostel_itemcode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $hostel_itemname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $hostel_itemtype;
	
	/**
	 * @var INT
	 */
	public $hostel_itemqty;
	
	/**
	 * @var INT
	 */
	public $es_hostelroomid;
	
	public $pog_attribute_type = array(
		"es_hostel_itemId" => array('db_attributes' => array("NUMERIC", "INT")),
		"hostel_itemno" => array('db_attributes' => array("NUMERIC", "INT")),
		"hostel_itemcode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"hostel_itemname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"hostel_itemtype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"hostel_itemqty" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_hostelroomid" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_hostel_item($hostel_itemno='', $hostel_itemcode='', $hostel_itemname='', $hostel_itemtype='', $hostel_itemqty='', $es_hostelroomid='')
	{
		$this->hostel_itemno = $hostel_itemno;
		$this->hostel_itemcode = $hostel_itemcode;
		$this->hostel_itemname = $hostel_itemname;
		$this->hostel_itemtype = $hostel_itemtype;
		$this->hostel_itemqty = $hostel_itemqty;
		$this->es_hostelroomid = $es_hostelroomid;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_hostel_itemId 
	* @return object $es_hostel_item
	*/
	function Get($es_hostel_itemId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_hostel_item` where `es_hostel_itemid`='".intval($es_hostel_itemId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_hostel_itemId = $row['es_hostel_itemid'];
			$this->hostel_itemno = $this->Unescape($row['hostel_itemno']);
			$this->hostel_itemcode = $this->Unescape($row['hostel_itemcode']);
			$this->hostel_itemname = $this->Unescape($row['hostel_itemname']);
			$this->hostel_itemtype = $this->Unescape($row['hostel_itemtype']);
			$this->hostel_itemqty = $this->Unescape($row['hostel_itemqty']);
			$this->es_hostelroomid = $this->Unescape($row['es_hostelroomid']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_hostel_itemList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_hostel_item` ";
		$es_hostel_itemList = Array();
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
			$sortBy = "es_hostel_itemid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_hostel_item = new $thisObjectName();
			$es_hostel_item->es_hostel_itemId = $row['es_hostel_itemid'];
			$es_hostel_item->hostel_itemno = $this->Unescape($row['hostel_itemno']);
			$es_hostel_item->hostel_itemcode = $this->Unescape($row['hostel_itemcode']);
			$es_hostel_item->hostel_itemname = $this->Unescape($row['hostel_itemname']);
			$es_hostel_item->hostel_itemtype = $this->Unescape($row['hostel_itemtype']);
			$es_hostel_item->hostel_itemqty = $this->Unescape($row['hostel_itemqty']);
			$es_hostel_item->es_hostelroomid = $this->Unescape($row['es_hostelroomid']);
			$es_hostel_itemList[] = $es_hostel_item;
		}
		return $es_hostel_itemList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_hostel_itemId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_hostel_itemid` from `es_hostel_item` where `es_hostel_itemid`='".$this->es_hostel_itemId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_hostel_item` set 
			`hostel_itemno`='".$this->Escape($this->hostel_itemno)."', 
			`hostel_itemcode`='".$this->Escape($this->hostel_itemcode)."', 
			`hostel_itemname`='".$this->Escape($this->hostel_itemname)."', 
			`hostel_itemtype`='".$this->Escape($this->hostel_itemtype)."', 
			`hostel_itemqty`='".$this->Escape($this->hostel_itemqty)."', 
			`es_hostelroomid`='".$this->Escape($this->es_hostelroomid)."' where `es_hostel_itemid`='".$this->es_hostel_itemId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_hostel_item` (`hostel_itemno`, `hostel_itemcode`, `hostel_itemname`, `hostel_itemtype`, `hostel_itemqty`, `es_hostelroomid` ) values (
			'".$this->Escape($this->hostel_itemno)."', 
			'".$this->Escape($this->hostel_itemcode)."', 
			'".$this->Escape($this->hostel_itemname)."', 
			'".$this->Escape($this->hostel_itemtype)."', 
			'".$this->Escape($this->hostel_itemqty)."', 
			'".$this->Escape($this->es_hostelroomid)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_hostel_itemId == "")
		{
			$this->es_hostel_itemId = $insertId;
		}
		return $this->es_hostel_itemId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_hostel_itemId
	*/
	function SaveNew()
	{
		$this->es_hostel_itemId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_hostel_item` where `es_hostel_itemid`='".$this->es_hostel_itemId."'";
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
			$pog_query = "delete from `es_hostel_item` where ";
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