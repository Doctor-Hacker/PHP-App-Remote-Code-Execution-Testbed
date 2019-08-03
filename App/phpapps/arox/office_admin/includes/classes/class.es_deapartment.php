<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_deapartment` (
	`es_deapartmentid` int(11) NOT NULL auto_increment,
	`es_deapartmentanme` VARCHAR(255) NOT NULL,
	`status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_deapartmentid`)) ENGINE=MyISAM;
*/

/**
* <b>es_deapartment</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_deapartment&attributeList=array+%28%0A++0+%3D%3E+%27es_deapartmentanme%27%2C%0A++1+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_deapartment extends POG_Base
{
	public $es_deapartmentId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_deapartmentanme;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_deapartmentId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_deapartmentanme" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_deapartment($es_deapartmentanme='', $status='')
	{
		$this->es_deapartmentanme = $es_deapartmentanme;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_deapartmentId 
	* @return object $es_deapartment
	*/
	function Get($es_deapartmentId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_deapartment` where `es_deapartmentid`='".intval($es_deapartmentId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_deapartmentId = $row['es_deapartmentid'];
			$this->es_deapartmentanme = $this->Unescape($row['es_deapartmentanme']);
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
	* @return array $es_deapartmentList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		echo $this->pog_query = "select * from `es_deapartment` ";
		$es_deapartmentList = Array();
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
						echo $this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
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
			$sortBy = "es_deapartmentid";
		}
		echo "hi".$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_deapartment = new $thisObjectName();
			$es_deapartment->es_deapartmentId = $row['es_deapartmentid'];
			$es_deapartment->es_deapartmentanme = $this->Unescape($row['es_deapartmentanme']);
			$es_deapartment->status = $row['status'];
			$es_deapartmentList[] = $es_deapartment;
		}
		return $es_deapartmentList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_deapartmentId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_deapartmentid` from `es_deapartment` where `es_deapartmentid`='".$this->es_deapartmentId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_deapartment` set 
			`es_deapartmentanme`='".$this->Escape($this->es_deapartmentanme)."', 
			`status`='".$this->status."' where `es_deapartmentid`='".$this->es_deapartmentId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_deapartment` (`es_deapartmentanme`, `status` ) values (
			'".$this->Escape($this->es_deapartmentanme)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_deapartmentId == "")
		{
			$this->es_deapartmentId = $insertId;
		}
		return $this->es_deapartmentId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_deapartmentId
	*/
	function SaveNew()
	{
		$this->es_deapartmentId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_deapartment` where `es_deapartmentid`='".$this->es_deapartmentId."'";
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
			$pog_query = "delete from `es_deapartment` where ";
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