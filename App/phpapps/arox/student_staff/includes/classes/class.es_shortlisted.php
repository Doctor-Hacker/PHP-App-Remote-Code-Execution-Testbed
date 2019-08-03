<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_shortlisted` (
	`es_shortlistedid` int(11) NOT NULL auto_increment,
	`stl_message` LONGTEXT NOT NULL, PRIMARY KEY  (`es_shortlistedid`)) ENGINE=MyISAM;
*/

/**
* <b>es_shortlisted</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_shortlisted&attributeList=array+%28%0A++0+%3D%3E+%27stl_message%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27LONGTEXT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_shortlisted extends POG_Base
{
	public $es_shortlistedId = '';

	/**
	 * @var LONGTEXT
	 */
	public $stl_message;
	
	public $pog_attribute_type = array(
		"es_shortlistedId" => array('db_attributes' => array("NUMERIC", "INT")),
		"stl_message" => array('db_attributes' => array("TEXT", "LONGTEXT")),
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
	
	function es_shortlisted($stl_message='')
	{
		$this->stl_message = $stl_message;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_shortlistedId 
	* @return object $es_shortlisted
	*/
	function Get($es_shortlistedId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_shortlisted` where `es_shortlistedid`='".intval($es_shortlistedId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_shortlistedId = $row['es_shortlistedid'];
			$this->stl_message = $this->Unescape($row['stl_message']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_shortlistedList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_shortlisted` ";
		$es_shortlistedList = Array();
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
			$sortBy = "es_shortlistedid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_shortlisted = new $thisObjectName();
			$es_shortlisted->es_shortlistedId = $row['es_shortlistedid'];
			$es_shortlisted->stl_message = $this->Unescape($row['stl_message']);
			$es_shortlistedList[] = $es_shortlisted;
		}
		return $es_shortlistedList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_shortlistedId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_shortlistedid` from `es_shortlisted` where `es_shortlistedid`='".$this->es_shortlistedId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_shortlisted` set 
			`stl_message`='".$this->Escape($this->stl_message)."' where `es_shortlistedid`='".$this->es_shortlistedId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_shortlisted` (`stl_message` ) values (
			'".$this->Escape($this->stl_message)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_shortlistedId == "")
		{
			$this->es_shortlistedId = $insertId;
		}
		return $this->es_shortlistedId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_shortlistedId
	*/
	function SaveNew()
	{
		$this->es_shortlistedId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_shortlisted` where `es_shortlistedid`='".$this->es_shortlistedId."'";
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
			$pog_query = "delete from `es_shortlisted` where ";
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