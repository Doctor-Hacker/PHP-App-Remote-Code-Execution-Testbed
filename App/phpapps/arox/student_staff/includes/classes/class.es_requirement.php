<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_requirement` (
	`es_requirementid` int(11) NOT NULL auto_increment,
	`es_post` VARCHAR(255) NOT NULL,
	`es_depatname` VARCHAR(255) NOT NULL,
	`es_qualification` VARCHAR(255) NOT NULL,
	`es_experience` VARCHAR(255) NOT NULL,
	`es_noofpositions` int(11) NOT NULL,
	`es_date_posteddate` DATE NOT NULL,
	`status` enum('active','inactive','deleted') NOT NULL, PRIMARY KEY  (`es_requirementid`)) ENGINE=MyISAM;
*/

/**
* <b>es_requirement</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_requirement&attributeList=array+%28%0A++0+%3D%3E+%27es_post%27%2C%0A++1+%3D%3E+%27es_depatname%27%2C%0A++2+%3D%3E+%27es_qualification%27%2C%0A++3+%3D%3E+%27es_experience%27%2C%0A++4+%3D%3E+%27es_noofpositions%27%2C%0A++5+%3D%3E+%27es_date_posteddate%27%2C%0A++6+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27int%2811%29%27%2C%0A++5+%3D%3E+%27DATE%27%2C%0A++6+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%2C%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_requirement extends POG_Base
{
	public $es_requirementId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_post;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_depatname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_qualification;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_experience;
	
	/**
	 * @var int(11)
	 */
	public $es_noofpositions;
	
	/**
	 * @var DATE
	 */
	public $es_date_posteddate;
	
	/**
	 * @var enum('active','inactive','deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_requirementId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_post" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_depatname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_qualification" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_experience" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_noofpositions" => array('db_attributes' => array("NUMERIC", "INT", "11")),
		"es_date_posteddate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive','deleted'")),
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
	
	function es_requirement($es_post='', $es_depatname='', $es_qualification='', $es_experience='', $es_noofpositions='', $es_date_posteddate='', $status='')
	{
		$this->es_post = $es_post;
		$this->es_depatname = $es_depatname;
		$this->es_qualification = $es_qualification;
		$this->es_experience = $es_experience;
		$this->es_noofpositions = $es_noofpositions;
		$this->es_date_posteddate = $es_date_posteddate;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_requirementId 
	* @return object $es_requirement
	*/
	function Get($es_requirementId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_requirement` where `es_requirementid`='".intval($es_requirementId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_requirementId = $row['es_requirementid'];
			$this->es_post = $this->Unescape($row['es_post']);
			$this->es_depatname = $this->Unescape($row['es_depatname']);
			$this->es_qualification = $this->Unescape($row['es_qualification']);
			$this->es_experience = $this->Unescape($row['es_experience']);
			$this->es_noofpositions = $this->Unescape($row['es_noofpositions']);
			$this->es_date_posteddate = $row['es_date_posteddate'];
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
	* @return array $es_requirementList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
	   $this->pog_query = "select * from `es_requirement` ";
		$es_requirementList = Array();
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
			$sortBy = "es_requirementid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_requirement = new $thisObjectName();
			$es_requirement->es_requirementId = $row['es_requirementid'];
			$es_requirement->es_post = $this->Unescape($row['es_post']);
			$es_requirement->es_depatname = $this->Unescape($row['es_depatname']);
			$es_requirement->es_qualification = $this->Unescape($row['es_qualification']);
			$es_requirement->es_experience = $this->Unescape($row['es_experience']);
			$es_requirement->es_noofpositions = $this->Unescape($row['es_noofpositions']);
			$es_requirement->es_date_posteddate = $row['es_date_posteddate'];
			$es_requirement->status = $row['status'];
			$es_requirementList[] = $es_requirement;
		}
		 return $es_requirementList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_requirementId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_requirementid` from `es_requirement` where `es_requirementid`='".$this->es_requirementId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_requirement` set 
			`es_post`='".$this->Escape($this->es_post)."', 
			`es_depatname`='".$this->Escape($this->es_depatname)."', 
			`es_qualification`='".$this->Escape($this->es_qualification)."', 
			`es_experience`='".$this->Escape($this->es_experience)."', 
			`es_noofpositions`='".$this->Escape($this->es_noofpositions)."', 
			`es_date_posteddate`='".$this->es_date_posteddate."', 
			`status`='".$this->status."' where `es_requirementid`='".$this->es_requirementId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_requirement` (`es_post`, `es_depatname`, `es_qualification`, `es_experience`, `es_noofpositions`, `es_date_posteddate`, `status` ) values (
			'".$this->Escape($this->es_post)."', 
			'".$this->Escape($this->es_depatname)."', 
			'".$this->Escape($this->es_qualification)."', 
			'".$this->Escape($this->es_experience)."', 
			'".$this->Escape($this->es_noofpositions)."', 
			'".$this->es_date_posteddate."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_requirementId == "")
		{
			$this->es_requirementId = $insertId;
		}
		return $this->es_requirementId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_requirementId
	*/
	function SaveNew()
	{
		$this->es_requirementId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_requirement` where `es_requirementid`='".$this->es_requirementId."'";
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
			$pog_query = "delete from `es_requirement` where ";
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
