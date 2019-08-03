<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_classifieds` (
	`es_classifiedsid` int(11) NOT NULL auto_increment,
	`cfs_name` VARCHAR(255) NOT NULL,
	`cfs_modeofadds` VARCHAR(255) NOT NULL,
	`cfs_posteddate` DATE NOT NULL,
	`cfs_details` LONGTEXT NOT NULL,
	`status` enum('active',deactive','deleted') NOT NULL, PRIMARY KEY  (`es_classifiedsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_classifieds</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_classifieds&attributeList=array+%28%0A++0+%3D%3E+%27cfs_name%27%2C%0A++1+%3D%3E+%27cfs_modeofadds%27%2C%0A++2+%3D%3E+%27cfs_posteddate%27%2C%0A++3+%3D%3E+%27cfs_details%27%2C%0A++4+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A++3+%3D%3E+%27LONGTEXT%27%2C%0A++4+%3D%3E+%27enum%28%5C%27active%5C%27%2Cdeactive%5C%27%2C%5C%27deleted%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_classifieds extends POG_Base
{
	public $es_classifiedsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $cfs_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $cfs_modeofadds;
	
	/**
	 * @var DATE
	 */
	public $cfs_posteddate;
	
	/**
	 * @var LONGTEXT
	 */
	public $cfs_details;
	
	/**
	 * @var enum('active',deactive','deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_classifiedsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"cfs_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cfs_modeofadds" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cfs_posteddate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"cfs_details" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active',deactive','deleted'")),
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
	
	function es_classifieds($cfs_name='', $cfs_modeofadds='', $cfs_posteddate='', $cfs_details='', $status='')
	{
		$this->cfs_name = $cfs_name;
		$this->cfs_modeofadds = $cfs_modeofadds;
		$this->cfs_posteddate = $cfs_posteddate;
		$this->cfs_details = $cfs_details;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_classifiedsId 
	* @return object $es_classifieds
	*/
	function Get($es_classifiedsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_classifieds` where `es_classifiedsid`='".intval($es_classifiedsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_classifiedsId = $row['es_classifiedsid'];
			$this->cfs_name = $this->Unescape($row['cfs_name']);
			$this->cfs_modeofadds = $this->Unescape($row['cfs_modeofadds']);
			$this->cfs_posteddate = $row['cfs_posteddate'];
			$this->cfs_details = $this->Unescape($row['cfs_details']);
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
	* @return array $es_classifiedsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_classifieds` ";
		$es_classifiedsList = Array();
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
			$sortBy = "es_classifiedsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_classifieds = new $thisObjectName();
			$es_classifieds->es_classifiedsId = $row['es_classifiedsid'];
			$es_classifieds->cfs_name = $this->Unescape($row['cfs_name']);
			$es_classifieds->cfs_modeofadds = $this->Unescape($row['cfs_modeofadds']);
			$es_classifieds->cfs_posteddate = $row['cfs_posteddate'];
			$es_classifieds->cfs_details = $this->Unescape($row['cfs_details']);
			$es_classifieds->status = $row['status'];
			$es_classifiedsList[] = $es_classifieds;
		}
		return $es_classifiedsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_classifiedsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_classifiedsid` from `es_classifieds` where `es_classifiedsid`='".$this->es_classifiedsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_classifieds` set 
			`cfs_name`='".$this->Escape($this->cfs_name)."', 
			`cfs_modeofadds`='".$this->Escape($this->cfs_modeofadds)."', 
			`cfs_posteddate`='".$this->cfs_posteddate."', 
			`cfs_details`='".$this->Escape($this->cfs_details)."', 
			`status`='".$this->status."' where `es_classifiedsid`='".$this->es_classifiedsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_classifieds` (`cfs_name`, `cfs_modeofadds`, `cfs_posteddate`, `cfs_details`, `status` ) values (
			'".$this->Escape($this->cfs_name)."', 
			'".$this->Escape($this->cfs_modeofadds)."', 
			'".$this->cfs_posteddate."', 
			'".$this->Escape($this->cfs_details)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_classifiedsId == "")
		{
			$this->es_classifiedsId = $insertId;
		}
		return $this->es_classifiedsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_classifiedsId
	*/
	function SaveNew()
	{
		$this->es_classifiedsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_classifieds` where `es_classifiedsid`='".$this->es_classifiedsId."'";
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
			$pog_query = "delete from `es_classifieds` where ";
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