<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_exam` (
	`es_examid` int(11) NOT NULL auto_increment,
	`es_examname` VARCHAR(255) NOT NULL,
	`es_examordby` INT NOT NULL, PRIMARY KEY  (`es_examid`)) ENGINE=MyISAM;
*/

/**
* <b>es_exam</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_exam&attributeList=array+%28%0A++0+%3D%3E+%27es_examname%27%2C%0A++1+%3D%3E+%27es_examordby%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_exam extends POG_Base
{
	public $es_examId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_examname;
	
	/**
	 * @var INT
	 */
	public $es_examordby;
	
	public $pog_attribute_type = array(
		"es_examId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_examname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_examordby" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_exam($es_examname='', $es_examordby='')
	{
		$this->es_examname = $es_examname;
		$this->es_examordby = $es_examordby;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_examId 
	* @return object $es_exam
	*/
	function Get($es_examId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_exam` where `es_examid`='".intval($es_examId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_examId = $row['es_examid'];
			$this->es_examname = $this->Unescape($row['es_examname']);
			$this->es_examordby = $this->Unescape($row['es_examordby']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_examList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_exam` ";
		$es_examList = Array();
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
			$sortBy = "es_examid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_exam = new $thisObjectName();
			$es_exam->es_examId = $row['es_examid'];
			$es_exam->es_examname = $this->Unescape($row['es_examname']);
			$es_exam->es_examordby = $this->Unescape($row['es_examordby']);
			$es_examList[] = $es_exam;
		}
		return $es_examList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_examId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_examid` from `es_exam` where `es_examid`='".$this->es_examId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_exam` set 
			`es_examname`='".$this->Escape($this->es_examname)."', 
			`es_examordby`='".$this->Escape($this->es_examordby)."' where `es_examid`='".$this->es_examId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_exam` (`es_examname`, `es_examordby` ) values (
			'".$this->Escape($this->es_examname)."', 
			'".$this->Escape($this->es_examordby)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_examId == "")
		{
			$this->es_examId = $insertId;
		}
		return $this->es_examId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_examId
	*/
	function SaveNew()
	{
		$this->es_examId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_exam` where `es_examid`='".$this->es_examId."'";
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
			$pog_query = "delete from `es_exam` where ";
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