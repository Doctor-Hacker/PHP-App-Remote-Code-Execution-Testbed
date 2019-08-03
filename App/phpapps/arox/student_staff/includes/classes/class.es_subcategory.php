<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_subcategory` (
	`es_subcategoryid` int(11) NOT NULL auto_increment,
	`subcat_catname` INT NOT NULL,
	`subcat_scatname` VARCHAR(255) NOT NULL,
	`subcat_scatdesc` LONGTEXT NOT NULL,
	`subcat_status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_subcategoryid`)) ENGINE=MyISAM;
*/

/**
* <b>es_subcategory</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_subcategory&attributeList=array+%28%0A++0+%3D%3E+%27subcat_catname%27%2C%0A++1+%3D%3E+%27subcat_scatname%27%2C%0A++2+%3D%3E+%27subcat_scatdesc%27%2C%0A++3+%3D%3E+%27subcat_status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27LONGTEXT%27%2C%0A++3+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_subcategory extends POG_Base
{
	public $es_subcategoryId = '';

	/**
	 * @var INT
	 */
	public $subcat_catname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $subcat_scatname;
	
	/**
	 * @var LONGTEXT
	 */
	public $subcat_scatdesc;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $subcat_status;
	
	public $pog_attribute_type = array(
		"es_subcategoryId" => array('db_attributes' => array("NUMERIC", "INT")),
		"subcat_catname" => array('db_attributes' => array("NUMERIC", "INT")),
		"subcat_scatname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"subcat_scatdesc" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"subcat_status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive'")),
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
	
	function es_subcategory($subcat_catname='', $subcat_scatname='', $subcat_scatdesc='', $subcat_status='')
	{
		$this->subcat_catname = $subcat_catname;
		$this->subcat_scatname = $subcat_scatname;
		$this->subcat_scatdesc = $subcat_scatdesc;
		$this->subcat_status = $subcat_status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_subcategoryId 
	* @return object $es_subcategory
	*/
	function Get($es_subcategoryId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_subcategory` where `es_subcategoryid`='".intval($es_subcategoryId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_subcategoryId = $row['es_subcategoryid'];
			$this->subcat_catname = $this->Unescape($row['subcat_catname']);
			$this->subcat_scatname = $this->Unescape($row['subcat_scatname']);
			$this->subcat_scatdesc = $this->Unescape($row['subcat_scatdesc']);
			$this->subcat_status = $row['subcat_status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_subcategoryList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_subcategory` ";
		$es_subcategoryList = Array();
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
			$sortBy = "es_subcategoryid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_subcategory = new $thisObjectName();
			$es_subcategory->es_subcategoryId = $row['es_subcategoryid'];
			$es_subcategory->subcat_catname = $this->Unescape($row['subcat_catname']);
			$es_subcategory->subcat_scatname = $this->Unescape($row['subcat_scatname']);
			$es_subcategory->subcat_scatdesc = $this->Unescape($row['subcat_scatdesc']);
			$es_subcategory->subcat_status = $row['subcat_status'];
			$es_subcategoryList[] = $es_subcategory;
		}
		return $es_subcategoryList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_subcategoryId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_subcategoryid` from `es_subcategory` where `es_subcategoryid`='".$this->es_subcategoryId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_subcategory` set 
			`subcat_catname`='".$this->Escape($this->subcat_catname)."', 
			`subcat_scatname`='".$this->Escape($this->subcat_scatname)."', 
			`subcat_scatdesc`='".$this->Escape($this->subcat_scatdesc)."', 
			`subcat_status`='".$this->subcat_status."' where `es_subcategoryid`='".$this->es_subcategoryId."'";
		}
		else
		{
			echo "hi".$this->pog_query = "insert into `es_subcategory` (`subcat_catname`, `subcat_scatname`, `subcat_scatdesc`, `subcat_status` ) values (
			'".$this->Escape($this->subcat_catname)."', 
			'".$this->Escape($this->subcat_scatname)."', 
			'".$this->Escape($this->subcat_scatdesc)."', 
			'".$this->subcat_status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_subcategoryId == "")
		{
			$this->es_subcategoryId = $insertId;
		}
		return $this->es_subcategoryId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_subcategoryId
	*/
	function SaveNew()
	{
		$this->es_subcategoryId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_subcategory` where `es_subcategoryid`='".$this->es_subcategoryId."'";
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
			$pog_query = "delete from `es_subcategory` where ";
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