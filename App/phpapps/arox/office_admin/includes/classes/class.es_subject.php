<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_subject` (
	`es_subjectid` int(11) NOT NULL auto_increment,
	`es_subjectname` VARCHAR(255) NOT NULL,
	`es_subjectcode` VARCHAR(255) NOT NULL,
	`es_subjectshortname` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_subjectid`)) ENGINE=MyISAM;
*/

/**
* <b>es_subject</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_subject&attributeList=array+%28%0A++0+%3D%3E+%27es_subjectname%27%2C%0A++1+%3D%3E+%27es_subjectcode%27%2C%0A++2+%3D%3E+%27es_subjectshortname%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_subject extends POG_Base
{
	public $es_subjectId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_subjectname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_subjectcode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_subjectshortname;
	
	public $pog_attribute_type = array(
		"es_subjectId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_subjectname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_subjectcode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_subjectshortname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_subject($es_subjectname='', $es_subjectcode='', $es_subjectshortname='')
	{
		$this->es_subjectname = $es_subjectname;
		$this->es_subjectcode = $es_subjectcode;
		$this->es_subjectshortname = $es_subjectshortname;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_subjectId 
	* @return object $es_subject
	*/
	function Get($es_subjectId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_subject` where `es_subjectid`='".intval($es_subjectId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_subjectId = $row['es_subjectid'];
			$this->es_subjectname = $this->Unescape($row['es_subjectname']);
			$this->es_subjectcode = $this->Unescape($row['es_subjectcode']);
			$this->es_subjectshortname = $this->Unescape($row['es_subjectshortname']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_subjectList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_subject` ";
		$es_subjectList = Array();
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
			$sortBy = "es_subjectid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_subject = new $thisObjectName();
			$es_subject->es_subjectId = $row['es_subjectid'];
			$es_subject->es_subjectname = $this->Unescape($row['es_subjectname']);
			$es_subject->es_subjectcode = $this->Unescape($row['es_subjectcode']);
			$es_subject->es_subjectshortname = $this->Unescape($row['es_subjectshortname']);
			$es_subjectList[] = $es_subject;
		}
		return $es_subjectList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_subjectId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_subjectid` from `es_subject` where `es_subjectid`='".$this->es_subjectId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_subject` set 
			`es_subjectname`='".$this->Escape($this->es_subjectname)."', 
			`es_subjectcode`='".$this->Escape($this->es_subjectcode)."', 
			`es_subjectshortname`='".$this->Escape($this->es_subjectshortname)."' where `es_subjectid`='".$this->es_subjectId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_subject` (`es_subjectname`, `es_subjectcode`, `es_subjectshortname` ) values (
			'".$this->Escape($this->es_subjectname)."', 
			'".$this->Escape($this->es_subjectcode)."', 
			'".$this->Escape($this->es_subjectshortname)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_subjectId == "")
		{
			$this->es_subjectId = $insertId;
		}
		return $this->es_subjectId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_subjectId
	*/
	function SaveNew()
	{
		$this->es_subjectId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_subject` where `es_subjectid`='".$this->es_subjectId."'";
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
			$pog_query = "delete from `es_subject` where ";
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