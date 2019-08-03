<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_assignmentmarks` (
	`es_assignmentmarksid` int(11) NOT NULL auto_increment,
	`asig_name` VARCHAR(255) NOT NULL,
	`asig_class` VARCHAR(255) NOT NULL,
	`asig_subjectname` VARCHAR(255) NOT NULL,
	`asig_studid` VARCHAR(255) NOT NULL,
	`asig_marksobtained` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_assignmentmarksid`)) ENGINE=MyISAM;
*/

/**
* <b>es_assignmentmarks</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_assignmentmarks&attributeList=array+%28%0A++0+%3D%3E+%27asig_name%27%2C%0A++1+%3D%3E+%27asig_class%27%2C%0A++2+%3D%3E+%27asig_subjectname%27%2C%0A++3+%3D%3E+%27asig_studid%27%2C%0A++4+%3D%3E+%27asig_marksobtained%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_assignmentmarks extends POG_Base
{
	public $es_assignmentmarksId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $asig_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $asig_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $asig_subjectname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $asig_studid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $asig_marksobtained;
	
	public $pog_attribute_type = array(
		"es_assignmentmarksId" => array('db_attributes' => array("NUMERIC", "INT")),
		"asig_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"asig_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"asig_subjectname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"asig_studid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"asig_marksobtained" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_assignmentmarks($asig_name='', $asig_class='', $asig_subjectname='', $asig_studid='', $asig_marksobtained='')
	{
		$this->asig_name = $asig_name;
		$this->asig_class = $asig_class;
		$this->asig_subjectname = $asig_subjectname;
		$this->asig_studid = $asig_studid;
		$this->asig_marksobtained = $asig_marksobtained;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_assignmentmarksId 
	* @return object $es_assignmentmarks
	*/
	function Get($es_assignmentmarksId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_assignmentmarks` where `es_assignmentmarksid`='".intval($es_assignmentmarksId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_assignmentmarksId = $row['es_assignmentmarksid'];
			$this->asig_name = $this->Unescape($row['asig_name']);
			$this->asig_class = $this->Unescape($row['asig_class']);
			$this->asig_subjectname = $this->Unescape($row['asig_subjectname']);
			$this->asig_studid = $this->Unescape($row['asig_studid']);
			$this->asig_marksobtained = $this->Unescape($row['asig_marksobtained']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_assignmentmarksList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_assignmentmarks` ";
		$es_assignmentmarksList = Array();
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
			$sortBy = "es_assignmentmarksid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_assignmentmarks = new $thisObjectName();
			$es_assignmentmarks->es_assignmentmarksId = $row['es_assignmentmarksid'];
			$es_assignmentmarks->asig_name = $this->Unescape($row['asig_name']);
			$es_assignmentmarks->asig_class = $this->Unescape($row['asig_class']);
			$es_assignmentmarks->asig_subjectname = $this->Unescape($row['asig_subjectname']);
			$es_assignmentmarks->asig_studid = $this->Unescape($row['asig_studid']);
			$es_assignmentmarks->asig_marksobtained = $this->Unescape($row['asig_marksobtained']);
			$es_assignmentmarksList[] = $es_assignmentmarks;
		}
		return $es_assignmentmarksList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_assignmentmarksId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_assignmentmarksid` from `es_assignmentmarks` where `es_assignmentmarksid`='".$this->es_assignmentmarksId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_assignmentmarks` set 
			`asig_name`='".$this->Escape($this->asig_name)."', 
			`asig_class`='".$this->Escape($this->asig_class)."', 
			`asig_subjectname`='".$this->Escape($this->asig_subjectname)."', 
			`asig_studid`='".$this->Escape($this->asig_studid)."', 
			`asig_marksobtained`='".$this->Escape($this->asig_marksobtained)."' where `es_assignmentmarksid`='".$this->es_assignmentmarksId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_assignmentmarks` (`asig_name`, `asig_class`, `asig_subjectname`, `asig_studid`, `asig_marksobtained` ) values (
			'".$this->Escape($this->asig_name)."', 
			'".$this->Escape($this->asig_class)."', 
			'".$this->Escape($this->asig_subjectname)."', 
			'".$this->Escape($this->asig_studid)."', 
			'".$this->Escape($this->asig_marksobtained)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_assignmentmarksId == "")
		{
			$this->es_assignmentmarksId = $insertId;
		}
		return $this->es_assignmentmarksId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_assignmentmarksId
	*/
	function SaveNew()
	{
		$this->es_assignmentmarksId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_assignmentmarks` where `es_assignmentmarksid`='".$this->es_assignmentmarksId."'";
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
			$pog_query = "delete from `es_assignmentmarks` where ";
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