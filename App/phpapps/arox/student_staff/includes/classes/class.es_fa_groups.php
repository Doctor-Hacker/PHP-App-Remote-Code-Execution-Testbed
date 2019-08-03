<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_fa_groups` (
	`es_fa_groupsid` int(11) NOT NULL auto_increment,
	`fa_groupname` VARCHAR(255) NOT NULL,
	`fa_undergroup` VARCHAR(255) NOT NULL,
	`fa_display` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_fa_groupsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_fa_groups</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_fa_groups&attributeList=array+%28%0A++0+%3D%3E+%27fa_groupname%27%2C%0A++1+%3D%3E+%27fa_undergroup%27%2C%0A++2+%3D%3E+%27fa_display%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_fa_groups extends POG_Base
{
	public $es_fa_groupsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $fa_groupname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fa_undergroup;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fa_display;
	
	public $pog_attribute_type = array(
		"es_fa_groupsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fa_groupname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fa_undergroup" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fa_display" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_fa_groups($fa_groupname='', $fa_undergroup='', $fa_display='')
	{
		$this->fa_groupname = $fa_groupname;
		$this->fa_undergroup = $fa_undergroup;
		$this->fa_display = $fa_display;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_fa_groupsId 
	* @return object $es_fa_groups
	*/
	function Get($es_fa_groupsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_fa_groups` where `es_fa_groupsid`='".intval($es_fa_groupsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_fa_groupsId = $row['es_fa_groupsid'];
			$this->fa_groupname = $this->Unescape($row['fa_groupname']);
			$this->fa_undergroup = $this->Unescape($row['fa_undergroup']);
			$this->fa_display = $this->Unescape($row['fa_display']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_fa_groupsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_fa_groups` ";
		$es_fa_groupsList = Array();
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
			$sortBy = "es_fa_groupsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_fa_groups = new $thisObjectName();
			$es_fa_groups->es_fa_groupsId = $row['es_fa_groupsid'];
			$es_fa_groups->fa_groupname = $this->Unescape($row['fa_groupname']);
			$es_fa_groups->fa_undergroup = $this->Unescape($row['fa_undergroup']);
			$es_fa_groups->fa_display = $this->Unescape($row['fa_display']);
			$es_fa_groupsList[] = $es_fa_groups;
		}
		return $es_fa_groupsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_fa_groupsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_fa_groupsid` from `es_fa_groups` where `es_fa_groupsid`='".$this->es_fa_groupsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_fa_groups` set 
			`fa_groupname`='".$this->Escape($this->fa_groupname)."', 
			`fa_undergroup`='".$this->Escape($this->fa_undergroup)."', 
			`fa_display`='".$this->Escape($this->fa_display)."' where `es_fa_groupsid`='".$this->es_fa_groupsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_fa_groups` (`fa_groupname`, `fa_undergroup`, `fa_display` ) values (
			'".$this->Escape($this->fa_groupname)."', 
			'".$this->Escape($this->fa_undergroup)."', 
			'".$this->Escape($this->fa_display)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_fa_groupsId == "")
		{
			$this->es_fa_groupsId = $insertId;
		}
		return $this->es_fa_groupsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_fa_groupsId
	*/
	function SaveNew()
	{
		$this->es_fa_groupsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_fa_groups` where `es_fa_groupsid`='".$this->es_fa_groupsId."'";
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
			$pog_query = "delete from `es_fa_groups` where ";
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