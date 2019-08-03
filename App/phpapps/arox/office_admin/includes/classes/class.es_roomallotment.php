<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_roomallotment` (
	`es_roomallotmentid` int(11) NOT NULL auto_increment,
	`es_hostelroomid` INT NOT NULL,
	`es_personid` INT NOT NULL,
	`es_persontype` VARCHAR(255) NOT NULL,
	`alloted_date` DATE NOT NULL,
	`dealloted_date` DATE NOT NULL,
	`status` enum('allocated','deallocated') NOT NULL, PRIMARY KEY  (`es_roomallotmentid`)) ENGINE=MyISAM;
*/

/**
* <b>es_roomallotment</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_roomallotment&attributeList=array+%28%0A++0+%3D%3E+%27es_hostelroomid%27%2C%0A++1+%3D%3E+%27es_personid%27%2C%0A++2+%3D%3E+%27es_persontype%27%2C%0A++3+%3D%3E+%27alloted_date%27%2C%0A++4+%3D%3E+%27dealloted_date%27%2C%0A++5+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27DATE%27%2C%0A++5+%3D%3E+%27enum%28%5C%27allocated%5C%27%2C%5C%27deallocated%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_roomallotment extends POG_Base
{
	public $es_roomallotmentId = '';

	/**
	 * @var INT
	 */
	public $es_hostelroomid;
	
	/**
	 * @var INT
	 */
	public $es_personid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_persontype;
	
	/**
	 * @var DATE
	 */
	public $alloted_date;
	
	/**
	 * @var DATE
	 */
	public $dealloted_date;
	
	/**
	 * @var enum('allocated','deallocated')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_roomallotmentId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_hostelroomid" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_personid" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_persontype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"alloted_date" => array('db_attributes' => array("NUMERIC", "DATE")),
		"dealloted_date" => array('db_attributes' => array("NUMERIC", "DATE")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'allocated','deallocated'")),
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
	
	function es_roomallotment($es_hostelroomid='', $es_personid='', $es_persontype='', $alloted_date='', $dealloted_date='', $status='')
	{
		$this->es_hostelroomid = $es_hostelroomid;
		$this->es_personid = $es_personid;
		$this->es_persontype = $es_persontype;
		$this->alloted_date = $alloted_date;
		$this->dealloted_date = $dealloted_date;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_roomallotmentId 
	* @return object $es_roomallotment
	*/
	function Get($es_roomallotmentId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_roomallotment` where `es_roomallotmentid`='".intval($es_roomallotmentId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_roomallotmentId = $row['es_roomallotmentid'];
			$this->es_hostelroomid = $this->Unescape($row['es_hostelroomid']);
			$this->es_personid = $this->Unescape($row['es_personid']);
			$this->es_persontype = $this->Unescape($row['es_persontype']);
			$this->alloted_date = $row['alloted_date'];
			$this->dealloted_date = $row['dealloted_date'];
			$this->status = $row['status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_roomallotmentList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_roomallotment` ";
		$es_roomallotmentList = Array();
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
			$sortBy = "es_roomallotmentid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_roomallotment = new $thisObjectName();
			$es_roomallotment->es_roomallotmentId = $row['es_roomallotmentid'];
			$es_roomallotment->es_hostelroomid = $this->Unescape($row['es_hostelroomid']);
			$es_roomallotment->es_personid = $this->Unescape($row['es_personid']);
			$es_roomallotment->es_persontype = $this->Unescape($row['es_persontype']);
			$es_roomallotment->alloted_date = $row['alloted_date'];
			$es_roomallotment->dealloted_date = $row['dealloted_date'];
			$es_roomallotment->status = $row['status'];
			$es_roomallotmentList[] = $es_roomallotment;
		}
		return $es_roomallotmentList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_roomallotmentId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_roomallotmentid` from `es_roomallotment` where `es_roomallotmentid`='".$this->es_roomallotmentId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_roomallotment` set 
			`es_hostelroomid`='".$this->Escape($this->es_hostelroomid)."', 
			`es_personid`='".$this->Escape($this->es_personid)."', 
			`es_persontype`='".$this->Escape($this->es_persontype)."', 
			`alloted_date`='".$this->alloted_date."', 
			`dealloted_date`='".$this->dealloted_date."', 
			`status`='".$this->status."' where `es_roomallotmentid`='".$this->es_roomallotmentId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_roomallotment` (`es_hostelroomid`, `es_personid`, `es_persontype`, `alloted_date`, `dealloted_date`, `status` ) values (
			'".$this->Escape($this->es_hostelroomid)."', 
			'".$this->Escape($this->es_personid)."', 
			'".$this->Escape($this->es_persontype)."', 
			'".$this->alloted_date."', 
			'".$this->dealloted_date."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_roomallotmentId == "")
		{
			$this->es_roomallotmentId = $insertId;
		}
		return $this->es_roomallotmentId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_roomallotmentId
	*/
	function SaveNew()
	{
		$this->es_roomallotmentId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_roomallotment` where `es_roomallotmentid`='".$this->es_roomallotmentId."'";
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
			$pog_query = "delete from `es_roomallotment` where ";
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