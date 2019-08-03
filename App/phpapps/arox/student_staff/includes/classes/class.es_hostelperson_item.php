<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_hostelperson_item` (
	`es_hostelperson_itemid` int(11) NOT NULL auto_increment,
	`hostelperson_itemno` INT NOT NULL,
	`hostelperson_itemcode` INT NOT NULL,
	`hostelperson_itemname` VARCHAR(255) NOT NULL,
	`hostelperson_itemtype` VARCHAR(255) NOT NULL,
	`hostelperson_itemqty` INT NOT NULL,
	`es_personid` INT NOT NULL,
	`hostelperson_itemissued` INT NOT NULL,
	`es_persontype` VARCHAR(255) NOT NULL,
	`es_roomallotmentid` INT NOT NULL,
	`status` 'issued','issuereturn' NOT NULL,
	`return_on` DATE NOT NULL, PRIMARY KEY  (`es_hostelperson_itemid`)) ENGINE=MyISAM;
*/

/**
* <b>es_hostelperson_item</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_hostelperson_item&attributeList=array+%28%0A++0+%3D%3E+%27hostelperson_itemno%27%2C%0A++1+%3D%3E+%27hostelperson_itemcode%27%2C%0A++2+%3D%3E+%27hostelperson_itemname%27%2C%0A++3+%3D%3E+%27hostelperson_itemtype%27%2C%0A++4+%3D%3E+%27hostelperson_itemqty%27%2C%0A++5+%3D%3E+%27es_personid%27%2C%0A++6+%3D%3E+%27hostelperson_itemissued%27%2C%0A++7+%3D%3E+%27es_persontype%27%2C%0A++8+%3D%3E+%27es_roomallotmentid%27%2C%0A++9+%3D%3E+%27status%27%2C%0A++10+%3D%3E+%27return_on%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27INT%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27%5C%27issued%5C%27%2C%5C%27issuereturn%5C%27%27%2C%0A++10+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_hostelperson_item extends POG_Base
{
	public $es_hostelperson_itemId = '';

	/**
	 * @var INT
	 */
	public $hostelperson_itemno;
	
	/**
	 * @var INT
	 */
	public $hostelperson_itemcode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $hostelperson_itemname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $hostelperson_itemtype;
	
	/**
	 * @var INT
	 */
	public $hostelperson_itemqty;
	
	/**
	 * @var INT
	 */
	public $es_personid;
	
	/**
	 * @var INT
	 */
	public $hostelperson_itemissued;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_persontype;
	
	/**
	 * @var INT
	 */
	public $es_roomallotmentid;
	
	/**
	 * @var 'issued','issuereturn'
	 */
	public $status;
	
	/**
	 * @var DATE
	 */
	public $return_on;
	
	public $pog_attribute_type = array(
		"es_hostelperson_itemId" => array('db_attributes' => array("NUMERIC", "INT")),
		"hostelperson_itemno" => array('db_attributes' => array("NUMERIC", "INT")),
		"hostelperson_itemcode" => array('db_attributes' => array("NUMERIC", "INT")),
		"hostelperson_itemname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"hostelperson_itemtype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"hostelperson_itemqty" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_personid" => array('db_attributes' => array("NUMERIC", "INT")),
		"hostelperson_itemissued" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_persontype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_roomallotmentid" => array('db_attributes' => array("NUMERIC", "INT")),
		"status" => array('db_attributes' => array("TEXT", "'ISSUED','ISSUERETURN'")),
		"return_on" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_hostelperson_item($hostelperson_itemno='', $hostelperson_itemcode='', $hostelperson_itemname='', $hostelperson_itemtype='', $hostelperson_itemqty='', $es_personid='', $hostelperson_itemissued='', $es_persontype='', $es_roomallotmentid='', $status='', $return_on='')
	{
		$this->hostelperson_itemno = $hostelperson_itemno;
		$this->hostelperson_itemcode = $hostelperson_itemcode;
		$this->hostelperson_itemname = $hostelperson_itemname;
		$this->hostelperson_itemtype = $hostelperson_itemtype;
		$this->hostelperson_itemqty = $hostelperson_itemqty;
		$this->es_personid = $es_personid;
		$this->hostelperson_itemissued = $hostelperson_itemissued;
		$this->es_persontype = $es_persontype;
		$this->es_roomallotmentid = $es_roomallotmentid;
		$this->status = $status;
		$this->return_on = $return_on;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_hostelperson_itemId 
	* @return object $es_hostelperson_item
	*/
	function Get($es_hostelperson_itemId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_hostelperson_item` where `es_hostelperson_itemid`='".intval($es_hostelperson_itemId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_hostelperson_itemId = $row['es_hostelperson_itemid'];
			$this->hostelperson_itemno = $this->Unescape($row['hostelperson_itemno']);
			$this->hostelperson_itemcode = $this->Unescape($row['hostelperson_itemcode']);
			$this->hostelperson_itemname = $this->Unescape($row['hostelperson_itemname']);
			$this->hostelperson_itemtype = $this->Unescape($row['hostelperson_itemtype']);
			$this->hostelperson_itemqty = $this->Unescape($row['hostelperson_itemqty']);
			$this->es_personid = $this->Unescape($row['es_personid']);
			$this->hostelperson_itemissued = $this->Unescape($row['hostelperson_itemissued']);
			$this->es_persontype = $this->Unescape($row['es_persontype']);
			$this->es_roomallotmentid = $this->Unescape($row['es_roomallotmentid']);
			$this->status = $this->Unescape($row['status']);
			$this->return_on = $row['return_on'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_hostelperson_itemList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_hostelperson_item` ";
		$es_hostelperson_itemList = Array();
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
			$sortBy = "es_hostelperson_itemid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_hostelperson_item = new $thisObjectName();
			$es_hostelperson_item->es_hostelperson_itemId = $row['es_hostelperson_itemid'];
			$es_hostelperson_item->hostelperson_itemno = $this->Unescape($row['hostelperson_itemno']);
			$es_hostelperson_item->hostelperson_itemcode = $this->Unescape($row['hostelperson_itemcode']);
			$es_hostelperson_item->hostelperson_itemname = $this->Unescape($row['hostelperson_itemname']);
			$es_hostelperson_item->hostelperson_itemtype = $this->Unescape($row['hostelperson_itemtype']);
			$es_hostelperson_item->hostelperson_itemqty = $this->Unescape($row['hostelperson_itemqty']);
			$es_hostelperson_item->es_personid = $this->Unescape($row['es_personid']);
			$es_hostelperson_item->hostelperson_itemissued = $this->Unescape($row['hostelperson_itemissued']);
			$es_hostelperson_item->es_persontype = $this->Unescape($row['es_persontype']);
			$es_hostelperson_item->es_roomallotmentid = $this->Unescape($row['es_roomallotmentid']);
			$es_hostelperson_item->status = $this->Unescape($row['status']);
			$es_hostelperson_item->return_on = $row['return_on'];
			$es_hostelperson_itemList[] = $es_hostelperson_item;
		}
		return $es_hostelperson_itemList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_hostelperson_itemId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_hostelperson_itemid` from `es_hostelperson_item` where `es_hostelperson_itemid`='".$this->es_hostelperson_itemId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_hostelperson_item` set 
			`hostelperson_itemno`='".$this->Escape($this->hostelperson_itemno)."', 
			`hostelperson_itemcode`='".$this->Escape($this->hostelperson_itemcode)."', 
			`hostelperson_itemname`='".$this->Escape($this->hostelperson_itemname)."', 
			`hostelperson_itemtype`='".$this->Escape($this->hostelperson_itemtype)."', 
			`hostelperson_itemqty`='".$this->Escape($this->hostelperson_itemqty)."', 
			`es_personid`='".$this->Escape($this->es_personid)."', 
			`hostelperson_itemissued`='".$this->Escape($this->hostelperson_itemissued)."', 
			`es_persontype`='".$this->Escape($this->es_persontype)."', 
			`es_roomallotmentid`='".$this->Escape($this->es_roomallotmentid)."', 
			`status`='".$this->Escape($this->status)."', 
			`return_on`='".$this->return_on."' where `es_hostelperson_itemid`='".$this->es_hostelperson_itemId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_hostelperson_item` (`hostelperson_itemno`, `hostelperson_itemcode`, `hostelperson_itemname`, `hostelperson_itemtype`, `hostelperson_itemqty`, `es_personid`, `hostelperson_itemissued`, `es_persontype`, `es_roomallotmentid`, `status`, `return_on` ) values (
			'".$this->Escape($this->hostelperson_itemno)."', 
			'".$this->Escape($this->hostelperson_itemcode)."', 
			'".$this->Escape($this->hostelperson_itemname)."', 
			'".$this->Escape($this->hostelperson_itemtype)."', 
			'".$this->Escape($this->hostelperson_itemqty)."', 
			'".$this->Escape($this->es_personid)."', 
			'".$this->Escape($this->hostelperson_itemissued)."', 
			'".$this->Escape($this->es_persontype)."', 
			'".$this->Escape($this->es_roomallotmentid)."', 
			'".$this->Escape($this->status)."', 
			'".$this->return_on."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_hostelperson_itemId == "")
		{
			$this->es_hostelperson_itemId = $insertId;
		}
		return $this->es_hostelperson_itemId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_hostelperson_itemId
	*/
	function SaveNew()
	{
		$this->es_hostelperson_itemId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_hostelperson_item` where `es_hostelperson_itemid`='".$this->es_hostelperson_itemId."'";
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
			$pog_query = "delete from `es_hostelperson_item` where ";
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