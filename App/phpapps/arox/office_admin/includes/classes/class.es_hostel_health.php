<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_hostel_health` (
	`es_hostel_healthid` int(11) NOT NULL auto_increment,
	`health_regno` INT NOT NULL,
	`health_name` VARCHAR(255) NOT NULL,
	`health_class` VARCHAR(255) NOT NULL,
	`health_section` VARCHAR(255) NOT NULL,
	`health_problem` VARCHAR(255) NOT NULL,
	`health_doctorname` VARCHAR(255) NOT NULL,
	`health_address` VARCHAR(255) NOT NULL,
	`health_contactno` INT NOT NULL,
	`health_prescription` VARCHAR(255) NOT NULL,
	`es_personid` INT NOT NULL,
	`es_persontpe` VARCHAR(255) NOT NULL,
	`es_createdon` DATE NOT NULL, PRIMARY KEY  (`es_hostel_healthid`)) ENGINE=MyISAM;
*/

/**
* <b>es_hostel_health</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_hostel_health&attributeList=array+%28%0A++0+%3D%3E+%27health_regno%27%2C%0A++1+%3D%3E+%27health_name%27%2C%0A++2+%3D%3E+%27health_class%27%2C%0A++3+%3D%3E+%27health_section%27%2C%0A++4+%3D%3E+%27health_problem%27%2C%0A++5+%3D%3E+%27health_doctorname%27%2C%0A++6+%3D%3E+%27health_address%27%2C%0A++7+%3D%3E+%27health_contactno%27%2C%0A++8+%3D%3E+%27health_prescription%27%2C%0A++9+%3D%3E+%27es_personid%27%2C%0A++10+%3D%3E+%27es_persontpe%27%2C%0A++11+%3D%3E+%27es_createdon%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27INT%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27INT%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');

class es_hostel_health extends POG_Base
{
	public $es_hostel_healthId = '';

	/**
	 * @var INT
	 */
	public $health_regno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $health_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $health_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $health_section;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $health_problem;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $health_doctorname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $health_address;
	
	/**
	 * @var INT
	 */
	public $health_contactno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $health_prescription;
	
	/**
	 * @var INT
	 */
	public $es_personid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_persontpe;
	
	/**
	 * @var DATE
	 */
	public $es_createdon;
	
	public $pog_attribute_type = array(
		"es_hostel_healthId" => array('db_attributes' => array("NUMERIC", "INT")),
		"health_regno" => array('db_attributes' => array("NUMERIC", "INT")),
		"health_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"health_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"health_section" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"health_problem" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"health_doctorname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"health_address" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"health_contactno" => array('db_attributes' => array("NUMERIC", "INT")),
		"health_prescription" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_personid" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_persontpe" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_createdon" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_hostel_health($health_regno='', $health_name='', $health_class='', $health_section='', $health_problem='', $health_doctorname='', $health_address='', $health_contactno='', $health_prescription='', $es_personid='', $es_persontpe='', $es_createdon='')
	{
		$this->health_regno = $health_regno;
		$this->health_name = $health_name;
		$this->health_class = $health_class;
		$this->health_section = $health_section;
		$this->health_problem = $health_problem;
		$this->health_doctorname = $health_doctorname;
		$this->health_address = $health_address;
		$this->health_contactno = $health_contactno;
		$this->health_prescription = $health_prescription;
		$this->es_personid = $es_personid;
		$this->es_persontpe = $es_persontpe;
		$this->es_createdon = $es_createdon;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_hostel_healthId 
	* @return object $es_hostel_health
	*/
	function Get($es_hostel_healthId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_hostel_health` where `es_hostel_healthid`='".intval($es_hostel_healthId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_hostel_healthId = $row['es_hostel_healthid'];
			$this->health_regno = $this->Unescape($row['health_regno']);
			$this->health_name = $this->Unescape($row['health_name']);
			$this->health_class = $this->Unescape($row['health_class']);
			$this->health_section = $this->Unescape($row['health_section']);
			$this->health_problem = $this->Unescape($row['health_problem']);
			$this->health_doctorname = $this->Unescape($row['health_doctorname']);
			$this->health_address = $this->Unescape($row['health_address']);
			$this->health_contactno = $this->Unescape($row['health_contactno']);
			$this->health_prescription = $this->Unescape($row['health_prescription']);
			$this->es_personid = $this->Unescape($row['es_personid']);
			$this->es_persontpe = $this->Unescape($row['es_persontpe']);
			$this->es_createdon = $row['es_createdon'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_hostel_healthList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_hostel_health` ";
		$es_hostel_healthList = Array();
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
			$sortBy = "es_hostel_healthid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_hostel_health = new $thisObjectName();
			$es_hostel_health->es_hostel_healthId = $row['es_hostel_healthid'];
			$es_hostel_health->health_regno = $this->Unescape($row['health_regno']);
			$es_hostel_health->health_name = $this->Unescape($row['health_name']);
			$es_hostel_health->health_class = $this->Unescape($row['health_class']);
			$es_hostel_health->health_section = $this->Unescape($row['health_section']);
			$es_hostel_health->health_problem = $this->Unescape($row['health_problem']);
			$es_hostel_health->health_doctorname = $this->Unescape($row['health_doctorname']);
			$es_hostel_health->health_address = $this->Unescape($row['health_address']);
			$es_hostel_health->health_contactno = $this->Unescape($row['health_contactno']);
			$es_hostel_health->health_prescription = $this->Unescape($row['health_prescription']);
			$es_hostel_health->es_personid = $this->Unescape($row['es_personid']);
			$es_hostel_health->es_persontpe = $this->Unescape($row['es_persontpe']);
			$es_hostel_health->es_createdon = $row['es_createdon'];
			$es_hostel_healthList[] = $es_hostel_health;
		}
		return $es_hostel_healthList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_hostel_healthId
	*/
	function Save()
	{
	
		$connection = Database::Connect();
	 $this->pog_query = "select `es_hostel_healthid` from `es_hostel_health` where `es_hostel_healthid`='".$this->es_hostel_healthId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_hostel_health` set 
			`health_regno`='".$this->Escape($this->health_regno)."', 
			`health_name`='".$this->Escape($this->health_name)."', 
			`health_class`='".$this->Escape($this->health_class)."', 
			`health_section`='".$this->Escape($this->health_section)."', 
			`health_problem`='".$this->Escape($this->health_problem)."', 
			`health_doctorname`='".$this->Escape($this->health_doctorname)."', 
			`health_address`='".$this->Escape($this->health_address)."', 
			`health_contactno`='".$this->Escape($this->health_contactno)."', 
			`health_prescription`='".$this->Escape($this->health_prescription)."', 
			`es_personid`='".$this->Escape($this->es_personid)."', 
			`es_persontpe`='".$this->Escape($this->es_persontpe)."', 
			`es_createdon`='".$this->es_createdon."' where `es_hostel_healthid`='".$this->es_hostel_healthId."'";
		}
		else
		{
		$this->pog_query = "insert into `es_hostel_health` (`health_regno`, `health_name`, `health_class`, `health_section`, `health_problem`, `health_doctorname`, `health_address`, `health_contactno`, `health_prescription`, `es_personid`, `es_persontpe`, `es_createdon` ) values (
			'".$this->Escape($this->health_regno)."', 
			'".$this->Escape($this->health_name)."', 
			'".$this->Escape($this->health_class)."', 
			'".$this->Escape($this->health_section)."', 
			'".$this->Escape($this->health_problem)."', 
			'".$this->Escape($this->health_doctorname)."', 
			'".$this->Escape($this->health_address)."', 
			'".$this->Escape($this->health_contactno)."', 
			'".$this->Escape($this->health_prescription)."', 
			'".$this->Escape($this->es_personid)."', 
			'".$this->Escape($this->es_persontpe)."', 
			'".$this->es_createdon."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_hostel_healthId == "")
		{
			$this->es_hostel_healthId = $insertId;
		}
		return $this->es_hostel_healthId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_hostel_healthId
	*/
	function SaveNew()
	{
		$this->es_hostel_healthId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_hostel_health` where `es_hostel_healthid`='".$this->es_hostel_healthId."'";
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
			$pog_query = "delete from `es_hostel_health` where ";
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