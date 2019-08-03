<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_marks` (
	`es_marksid` int(11) NOT NULL auto_increment,
	`es_examdetailsid` INT NOT NULL,
	`es_marksstudentid` INT NOT NULL,
	`es_marksobtined` VARCHAR(255) NOT NULL,
	`status` enum('active', 'inactive') NOT NULL, PRIMARY KEY  (`es_marksid`)) ENGINE=MyISAM;
*/

/**
* <b>es_marks</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_marks&attributeList=array+%28%0A++0+%3D%3E+%27es_examdetailsid%27%2C%0A++1+%3D%3E+%27es_marksstudentid%27%2C%0A++2+%3D%3E+%27es_marksobtined%27%2C%0A++3+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27enum%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_marks extends POG_Base
{
	public $es_marksId = '';

	/**
	 * @var INT
	 */
	public $es_examdetailsid;
	
	/**
	 * @var INT
	 */
	public $es_marksstudentid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_marksobtined;
	
	/**
	 * @var enum('active', 'inactive')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_marksId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_examdetailsid" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_marksstudentid" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_marksobtined" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive'")),
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
	
	function es_marks($es_examdetailsid='', $es_marksstudentid='', $es_marksobtined='', $status='')
	{
		$this->es_examdetailsid = $es_examdetailsid;
		$this->es_marksstudentid = $es_marksstudentid;
		$this->es_marksobtined = $es_marksobtined;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_marksId 
	* @return object $es_marks
	*/
	function Get($es_marksId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_marks` where `es_marksid`='".intval($es_marksId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_marksId = $row['es_marksid'];
			$this->es_examdetailsid = $this->Unescape($row['es_examdetailsid']);
			$this->es_marksstudentid = $this->Unescape($row['es_marksstudentid']);
			$this->es_marksobtined = $this->Unescape($row['es_marksobtined']);
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
	* @return array $es_marksList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_marks` ";
		$es_marksList = Array();
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
			$sortBy = "es_marksid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_marks = new $thisObjectName();
			$es_marks->es_marksId = $row['es_marksid'];
			$es_marks->es_examdetailsid = $this->Unescape($row['es_examdetailsid']);
			$es_marks->es_marksstudentid = $this->Unescape($row['es_marksstudentid']);
			$es_marks->es_marksobtined = $this->Unescape($row['es_marksobtined']);
			$es_marks->status = $row['status'];
			$es_marksList[] = $es_marks;
		}
		return $es_marksList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_marksId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_marksid` from `es_marks` where `es_marksid`='".$this->es_marksId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_marks` set 
			`es_examdetailsid`='".$this->Escape($this->es_examdetailsid)."', 
			`es_marksstudentid`='".$this->Escape($this->es_marksstudentid)."', 
			`es_marksobtined`='".$this->Escape($this->es_marksobtined)."', 
			`status`='".$this->status."' where `es_marksid`='".$this->es_marksId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_marks` (`es_examdetailsid`, `es_marksstudentid`, `es_marksobtined`, `status` ) values (
			'".$this->Escape($this->es_examdetailsid)."', 
			'".$this->Escape($this->es_marksstudentid)."', 
			'".$this->Escape($this->es_marksobtined)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_marksId == "")
		{
			$this->es_marksId = $insertId;
		}
		return $this->es_marksId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_marksId
	*/
	function SaveNew()
	{
		$this->es_marksId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_marks` where `es_marksid`='".$this->es_marksId."'";
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
			$pog_query = "delete from `es_marks` where ";
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