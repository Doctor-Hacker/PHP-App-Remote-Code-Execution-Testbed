<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_categorylibrary` (
	`es_categorylibraryid` int(11) NOT NULL auto_increment,
	`lb_categoryname` VARCHAR(255) NOT NULL,
	`lb_catdesc` LONGTEXT NOT NULL,
	`status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_categorylibraryid`)) ENGINE=MyISAM;
*/

/**
* <b>es_categorylibrary</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_categorylibrary&attributeList=array+%28%0A++0+%3D%3E+%27lb_categoryname%27%2C%0A++1+%3D%3E+%27lb_catdesc%27%2C%0A++2+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27LONGTEXT%27%2C%0A++2+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_categorylibrary extends POG_Base
{
	public $es_categorylibraryId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $lb_categoryname;
	
	/**
	 * @var LONGTEXT
	 */
	public $lb_catdesc;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_categorylibraryId" => array('db_attributes' => array("NUMERIC", "INT")),
		"lb_categoryname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lb_catdesc" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive'")),
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
	
	function es_categorylibrary($lb_categoryname='', $lb_catdesc='', $status='')
	{
		$this->lb_categoryname = $lb_categoryname;
		$this->lb_catdesc = $lb_catdesc;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_categorylibraryId 
	* @return object $es_categorylibrary
	*/
	function Get($es_categorylibraryId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_categorylibrary` where `es_categorylibraryid`='".intval($es_categorylibraryId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_categorylibraryId = $row['es_categorylibraryid'];
			$this->lb_categoryname = $this->Unescape($row['lb_categoryname']);
			$this->lb_catdesc = $this->Unescape($row['lb_catdesc']);
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
	* @return array $es_categorylibraryList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_categorylibrary` ";
		$es_categorylibraryList = Array();
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
			$sortBy = "es_categorylibraryid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_categorylibrary = new $thisObjectName();
			$es_categorylibrary->es_categorylibraryId = $row['es_categorylibraryid'];
			$es_categorylibrary->lb_categoryname = $this->Unescape($row['lb_categoryname']);
			$es_categorylibrary->lb_catdesc = $this->Unescape($row['lb_catdesc']);
			$es_categorylibrary->status = $row['status'];
			$es_categorylibraryList[] = $es_categorylibrary;
		}
		return $es_categorylibraryList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_categorylibraryId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_categorylibraryid` from `es_categorylibrary` where `es_categorylibraryid`='".$this->es_categorylibraryId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_categorylibrary` set 
			`lb_categoryname`='".$this->Escape($this->lb_categoryname)."', 
			`lb_catdesc`='".$this->Escape($this->lb_catdesc)."', 
			`status`='".$this->status."' where `es_categorylibraryid`='".$this->es_categorylibraryId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_categorylibrary` (`lb_categoryname`, `lb_catdesc`, `status` ) values (
			'".$this->Escape($this->lb_categoryname)."', 
			'".$this->Escape($this->lb_catdesc)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_categorylibraryId == "")
		{
			$this->es_categorylibraryId = $insertId;
		}
		return $this->es_categorylibraryId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_categorylibraryId
	*/
	function SaveNew()
	{
		$this->es_categorylibraryId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_categorylibrary` where `es_categorylibraryid`='".$this->es_categorylibraryId."'";
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
			$pog_query = "delete from `es_categorylibrary` where ";
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