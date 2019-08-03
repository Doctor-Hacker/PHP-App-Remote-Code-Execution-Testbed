<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_deptposts` (
	`es_deptpostsid` int(11) NOT NULL auto_increment,
	`es_postshortname` VARCHAR(255) NOT NULL,
	`es_postcode` VARCHAR(255) NOT NULL,
	`es_postname` VARCHAR(255) NOT NULL,
	`status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_deptpostsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_deptposts</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_deptposts&attributeList=array+%28%0A++0+%3D%3E+%27es_postshortname%27%2C%0A++1+%3D%3E+%27es_postcode%27%2C%0A++2+%3D%3E+%27es_postname%27%2C%0A++3+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_deptposts extends POG_Base
{
	public $es_deptpostsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_postshortname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_postcode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_postname;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_deptpostsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_postshortname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_postcode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_postname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_deptposts($es_postshortname='', $es_postcode='', $es_postname='', $status='')
	{
		$this->es_postshortname = $es_postshortname;
		$this->es_postcode = $es_postcode;
		$this->es_postname = $es_postname;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_deptpostsId 
	* @return object $es_deptposts
	*/
	function Get($es_deptpostsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_deptposts` where `es_deptpostsid`='".intval($es_deptpostsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_deptpostsId = $row['es_deptpostsid'];
			$this->es_postshortname = $this->Unescape($row['es_postshortname']);
			$this->es_postcode = $this->Unescape($row['es_postcode']);
			$this->es_postname = $this->Unescape($row['es_postname']);
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
	* @return array $es_deptpostsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_deptposts` ";
		$es_deptpostsList = Array();
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
			$sortBy = "es_deptpostsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_deptposts = new $thisObjectName();
			$es_deptposts->es_deptpostsId = $row['es_deptpostsid'];
			$es_deptposts->es_postshortname = $this->Unescape($row['es_postshortname']);
			$es_deptposts->es_postcode = $this->Unescape($row['es_postcode']);
			$es_deptposts->es_postname = $this->Unescape($row['es_postname']);
			$es_deptposts->status = $row['status'];
			$es_deptpostsList[] = $es_deptposts;
		}
		return $es_deptpostsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_deptpostsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_deptpostsid` from `es_deptposts` where `es_deptpostsid`='".$this->es_deptpostsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_deptposts` set 
			`es_postshortname`='".$this->Escape($this->es_postshortname)."', 
			`es_postcode`='".$this->Escape($this->es_postcode)."', 
			`es_postname`='".$this->Escape($this->es_postname)."', 
			`status`='".$this->status."' where `es_deptpostsid`='".$this->es_deptpostsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_deptposts` (`es_postshortname`, `es_postcode`, `es_postname`, `status` ) values (
			'".$this->Escape($this->es_postshortname)."', 
			'".$this->Escape($this->es_postcode)."', 
			'".$this->Escape($this->es_postname)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_deptpostsId == "")
		{
			$this->es_deptpostsId = $insertId;
		}
		return $this->es_deptpostsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_deptpostsId
	*/
	function SaveNew()
	{
		$this->es_deptpostsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_deptposts` where `es_deptpostsid`='".$this->es_deptpostsId."'";
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
			$pog_query = "delete from `es_deptposts` where ";
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