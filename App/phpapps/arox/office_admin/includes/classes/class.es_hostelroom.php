<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_hostelroom` (
	`es_hostelroomid` int(11) NOT NULL auto_increment,
	`room_type` VARCHAR(255) NOT NULL,
	`room_capacity` INT NOT NULL,
	`room_vacancy` INT NOT NULL,
	`room_no` VARCHAR(255) NOT NULL,
	`status` ENUM('active', 'inactive') NOT NULL,
	`buld_name` VARCHAR(255) NOT NULL,
	`es_hostelbuldid` INT NOT NULL,
	`room_rate` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_hostelroomid`)) ENGINE=MyISAM;
*/

/**
* <b>es_hostelroom</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_hostelroom&attributeList=array+%28%0A++0+%3D%3E+%27room_type%27%2C%0A++1+%3D%3E+%27room_capacity%27%2C%0A++2+%3D%3E+%27room_vacancy%27%2C%0A++3+%3D%3E+%27room_no%27%2C%0A++4+%3D%3E+%27status%27%2C%0A++5+%3D%3E+%27buld_name%27%2C%0A++6+%3D%3E+%27es_hostelbuldid%27%2C%0A++7+%3D%3E+%27room_rate%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27ENUM%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27INT%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_hostelroom extends POG_Base
{
	public $es_hostelroomId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $room_type;
	
	/**
	 * @var INT
	 */
	public $room_capacity;
	
	/**
	 * @var INT
	 */
	public $room_vacancy;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $room_no;
	
	/**
	 * @var ENUM('active', 'inactive')
	 */
	public $status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $buld_name;
	
	/**
	 * @var INT
	 */
	public $es_hostelbuldid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $room_rate;
	
	public $pog_attribute_type = array(
		"es_hostelroomId" => array('db_attributes' => array("NUMERIC", "INT")),
		"room_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"room_capacity" => array('db_attributes' => array("NUMERIC", "INT")),
		"room_vacancy" => array('db_attributes' => array("NUMERIC", "INT")),
		"room_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive'")),
		"buld_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_hostelbuldid" => array('db_attributes' => array("NUMERIC", "INT")),
		"room_rate" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_hostelroom($room_type='', $room_capacity='', $room_vacancy='', $room_no='', $status='', $buld_name='', $es_hostelbuldid='', $room_rate='')
	{
		$this->room_type = $room_type;
		$this->room_capacity = $room_capacity;
		$this->room_vacancy = $room_vacancy;
		$this->room_no = $room_no;
		$this->status = $status;
		$this->buld_name = $buld_name;
		$this->es_hostelbuldid = $es_hostelbuldid;
		$this->room_rate = $room_rate;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_hostelroomId 
	* @return object $es_hostelroom
	*/
	function Get($es_hostelroomId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_hostelroom` where `es_hostelroomid`='".intval($es_hostelroomId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_hostelroomId = $row['es_hostelroomid'];
			$this->room_type = $this->Unescape($row['room_type']);
			$this->room_capacity = $this->Unescape($row['room_capacity']);
			$this->room_vacancy = $this->Unescape($row['room_vacancy']);
			$this->room_no = $this->Unescape($row['room_no']);
			$this->status = $row['status'];
			$this->buld_name = $this->Unescape($row['buld_name']);
			$this->es_hostelbuldid = $this->Unescape($row['es_hostelbuldid']);
			$this->room_rate = $this->Unescape($row['room_rate']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_hostelroomList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_hostelroom` ";
		$es_hostelroomList = Array();
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
			$sortBy = "es_hostelroomid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_hostelroom = new $thisObjectName();
			$es_hostelroom->es_hostelroomId = $row['es_hostelroomid'];
			$es_hostelroom->room_type = $this->Unescape($row['room_type']);
			$es_hostelroom->room_capacity = $this->Unescape($row['room_capacity']);
			$es_hostelroom->room_vacancy = $this->Unescape($row['room_vacancy']);
			$es_hostelroom->room_no = $this->Unescape($row['room_no']);
			$es_hostelroom->status = $row['status'];
			$es_hostelroom->buld_name = $this->Unescape($row['buld_name']);
			$es_hostelroom->es_hostelbuldid = $this->Unescape($row['es_hostelbuldid']);
			$es_hostelroom->room_rate = $this->Unescape($row['room_rate']);
			$es_hostelroomList[] = $es_hostelroom;
		}
		return $es_hostelroomList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_hostelroomId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_hostelroomid` from `es_hostelroom` where `es_hostelroomid`='".$this->es_hostelroomId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_hostelroom` set 
			`room_type`='".$this->Escape($this->room_type)."', 
			`room_capacity`='".$this->Escape($this->room_capacity)."', 
			`room_vacancy`='".$this->Escape($this->room_vacancy)."', 
			`room_no`='".$this->Escape($this->room_no)."', 
			`status`='".$this->status."', 
			`buld_name`='".$this->Escape($this->buld_name)."', 
			`es_hostelbuldid`='".$this->Escape($this->es_hostelbuldid)."', 
			`room_rate`='".$this->Escape($this->room_rate)."' where `es_hostelroomid`='".$this->es_hostelroomId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_hostelroom` (`room_type`, `room_capacity`, `room_vacancy`, `room_no`, `status`, `buld_name`, `es_hostelbuldid`, `room_rate` ) values (
			'".$this->Escape($this->room_type)."', 
			'".$this->Escape($this->room_capacity)."', 
			'".$this->Escape($this->room_vacancy)."', 
			'".$this->Escape($this->room_no)."', 
			'".$this->status."', 
			'".$this->Escape($this->buld_name)."', 
			'".$this->Escape($this->es_hostelbuldid)."', 
			'".$this->Escape($this->room_rate)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_hostelroomId == "")
		{
			$this->es_hostelroomId = $insertId;
		}
		return $this->es_hostelroomId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_hostelroomId
	*/
	function SaveNew()
	{
		$this->es_hostelroomId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_hostelroom` where `es_hostelroomid`='".$this->es_hostelroomId."'";
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
			$pog_query = "delete from `es_hostelroom` where ";
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