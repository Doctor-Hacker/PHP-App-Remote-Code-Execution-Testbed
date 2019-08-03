<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_timetablemaster` (
	`es_timetablemasterid` int(11) NOT NULL auto_increment,
	`es_class` VARCHAR(255) NOT NULL,
	`es_staffid` VARCHAR(255) NOT NULL,
	`es_subject` VARCHAR(255) NOT NULL,
	`es_teachername` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_timetablemasterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_timetablemaster</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_timetablemaster&attributeList=array+%28%0A++0+%3D%3E+%27es_class%27%2C%0A++1+%3D%3E+%27es_staffid%27%2C%0A++2+%3D%3E+%27es_subject%27%2C%0A++3+%3D%3E+%27es_teachername%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_timetablemaster extends POG_Base
{
	public $es_timetablemasterId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_staffid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_subject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_teachername;
	
	public $pog_attribute_type = array(
		"es_timetablemasterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_staffid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_subject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_teachername" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_timetablemaster($es_class='', $es_staffid='', $es_subject='', $es_teachername='')
	{
		$this->es_class = $es_class;
		$this->es_staffid = $es_staffid;
		$this->es_subject = $es_subject;
		$this->es_teachername = $es_teachername;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_timetablemasterId 
	* @return object $es_timetablemaster
	*/
	function Get($es_timetablemasterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_timetablemaster` where `es_timetablemasterid`='".intval($es_timetablemasterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_timetablemasterId = $row['es_timetablemasterid'];
			$this->es_class = $this->Unescape($row['es_class']);
			$this->es_staffid = $this->Unescape($row['es_staffid']);
			$this->es_subject = $this->Unescape($row['es_subject']);
			$this->es_teachername = $this->Unescape($row['es_teachername']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_timetablemasterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_timetablemaster` ";
		$es_timetablemasterList = Array();
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
			$sortBy = "es_timetablemasterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_timetablemaster = new $thisObjectName();
			$es_timetablemaster->es_timetablemasterId = $row['es_timetablemasterid'];
			$es_timetablemaster->es_class = $this->Unescape($row['es_class']);
			$es_timetablemaster->es_staffid = $this->Unescape($row['es_staffid']);
			$es_timetablemaster->es_subject = $this->Unescape($row['es_subject']);
			$es_timetablemaster->es_teachername = $this->Unescape($row['es_teachername']);
			$es_timetablemasterList[] = $es_timetablemaster;
		}
		return $es_timetablemasterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_timetablemasterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_timetablemasterid` from `es_timetablemaster` where `es_timetablemasterid`='".$this->es_timetablemasterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_timetablemaster` set 
			`es_class`='".$this->Escape($this->es_class)."', 
			`es_staffid`='".$this->Escape($this->es_staffid)."', 
			`es_subject`='".$this->Escape($this->es_subject)."', 
			`es_teachername`='".$this->Escape($this->es_teachername)."' where `es_timetablemasterid`='".$this->es_timetablemasterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_timetablemaster` (`es_class`, `es_staffid`, `es_subject`, `es_teachername` ) values (
			'".$this->Escape($this->es_class)."', 
			'".$this->Escape($this->es_staffid)."', 
			'".$this->Escape($this->es_subject)."', 
			'".$this->Escape($this->es_teachername)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_timetablemasterId == "")
		{
			$this->es_timetablemasterId = $insertId;
		}
		return $this->es_timetablemasterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_timetablemasterId
	*/
	function SaveNew()
	{
		$this->es_timetablemasterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_timetablemaster` where `es_timetablemasterid`='".$this->es_timetablemasterId."'";
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
			$pog_query = "delete from `es_timetablemaster` where ";
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