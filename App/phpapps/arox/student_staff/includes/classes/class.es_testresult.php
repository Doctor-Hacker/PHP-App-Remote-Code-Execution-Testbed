<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_testresult` (
	`es_testresultid` int(11) NOT NULL auto_increment,
	`t_serialno` INT NOT NULL,
	`t_acadamicsession` VARCHAR(255) NOT NULL,
	`t_wardname` VARCHAR(255) NOT NULL,
	`t_sex` VARCHAR(255) NOT NULL,
	`t_class` VARCHAR(255) NOT NULL,
	`t_marksobtain` INT NOT NULL,
	`t_outof` INT NOT NULL,
	`t_oralexamination` VARCHAR(255) NOT NULL,
	`t_familinteraction` VARCHAR(255) NOT NULL,
	`t_percentage` DOUBLE NOT NULL,
	`t_result` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_testresultid`)) ENGINE=MyISAM;
*/

/**
* <b>es_testresult</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_testresult&attributeList=array+%28%0A++0+%3D%3E+%27t_serialno%27%2C%0A++1+%3D%3E+%27t_acadamicsession%27%2C%0A++2+%3D%3E+%27t_wardname%27%2C%0A++3+%3D%3E+%27t_sex%27%2C%0A++4+%3D%3E+%27t_class%27%2C%0A++5+%3D%3E+%27t_marksobtain%27%2C%0A++6+%3D%3E+%27t_outof%27%2C%0A++7+%3D%3E+%27t_oralexamination%27%2C%0A++8+%3D%3E+%27t_familinteraction%27%2C%0A++9+%3D%3E+%27t_percentage%27%2C%0A++10+%3D%3E+%27t_result%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27INT%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27DOUBLE%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_testresult extends POG_Base
{
	public $es_testresultId = '';

	/**
	 * @var INT
	 */
	public $t_serialno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $t_acadamicsession;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $t_wardname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $t_sex;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $t_class;
	
	/**
	 * @var INT
	 */
	public $t_marksobtain;
	
	/**
	 * @var INT
	 */
	public $t_outof;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $t_oralexamination;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $t_familinteraction;
	
	/**
	 * @var DOUBLE
	 */
	public $t_percentage;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $t_result;
	
	public $pog_attribute_type = array(
		"es_testresultId" => array('db_attributes' => array("NUMERIC", "INT")),
		"t_serialno" => array('db_attributes' => array("NUMERIC", "INT")),
		"t_acadamicsession" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"t_wardname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"t_sex" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"t_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"t_marksobtain" => array('db_attributes' => array("NUMERIC", "INT")),
		"t_outof" => array('db_attributes' => array("NUMERIC", "INT")),
		"t_oralexamination" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"t_familinteraction" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"t_percentage" => array('db_attributes' => array("NUMERIC", "DOUBLE")),
		"t_result" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_testresult($t_serialno='', $t_acadamicsession='', $t_wardname='', $t_sex='', $t_class='', $t_marksobtain='', $t_outof='', $t_oralexamination='', $t_familinteraction='', $t_percentage='', $t_result='')
	{
		$this->t_serialno = $t_serialno;
		$this->t_acadamicsession = $t_acadamicsession;
		$this->t_wardname = $t_wardname;
		$this->t_sex = $t_sex;
		$this->t_class = $t_class;
		$this->t_marksobtain = $t_marksobtain;
		$this->t_outof = $t_outof;
		$this->t_oralexamination = $t_oralexamination;
		$this->t_familinteraction = $t_familinteraction;
		$this->t_percentage = $t_percentage;
		$this->t_result = $t_result;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_testresultId 
	* @return object $es_testresult
	*/
	function Get($es_testresultId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_testresult` where `es_testresultid`='".intval($es_testresultId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_testresultId = $row['es_testresultid'];
			$this->t_serialno = $this->Unescape($row['t_serialno']);
			$this->t_acadamicsession = $this->Unescape($row['t_acadamicsession']);
			$this->t_wardname = $this->Unescape($row['t_wardname']);
			$this->t_sex = $this->Unescape($row['t_sex']);
			$this->t_class = $this->Unescape($row['t_class']);
			$this->t_marksobtain = $this->Unescape($row['t_marksobtain']);
			$this->t_outof = $this->Unescape($row['t_outof']);
			$this->t_oralexamination = $this->Unescape($row['t_oralexamination']);
			$this->t_familinteraction = $this->Unescape($row['t_familinteraction']);
			$this->t_percentage = $this->Unescape($row['t_percentage']);
			$this->t_result = $this->Unescape($row['t_result']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_testresultList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_testresult` ";
		$es_testresultList = Array();
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
			$sortBy = "es_testresultid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_testresult = new $thisObjectName();
			$es_testresult->es_testresultId = $row['es_testresultid'];
			$es_testresult->t_serialno = $this->Unescape($row['t_serialno']);
			$es_testresult->t_acadamicsession = $this->Unescape($row['t_acadamicsession']);
			$es_testresult->t_wardname = $this->Unescape($row['t_wardname']);
			$es_testresult->t_sex = $this->Unescape($row['t_sex']);
			$es_testresult->t_class = $this->Unescape($row['t_class']);
			$es_testresult->t_marksobtain = $this->Unescape($row['t_marksobtain']);
			$es_testresult->t_outof = $this->Unescape($row['t_outof']);
			$es_testresult->t_oralexamination = $this->Unescape($row['t_oralexamination']);
			$es_testresult->t_familinteraction = $this->Unescape($row['t_familinteraction']);
			$es_testresult->t_percentage = $this->Unescape($row['t_percentage']);
			$es_testresult->t_result = $this->Unescape($row['t_result']);
			$es_testresultList[] = $es_testresult;
		}
		return $es_testresultList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_testresultId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_testresultid` from `es_testresult` where `es_testresultid`='".$this->es_testresultId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_testresult` set 
			`t_serialno`='".$this->Escape($this->t_serialno)."', 
			`t_acadamicsession`='".$this->Escape($this->t_acadamicsession)."', 
			`t_wardname`='".$this->Escape($this->t_wardname)."', 
			`t_sex`='".$this->Escape($this->t_sex)."', 
			`t_class`='".$this->Escape($this->t_class)."', 
			`t_marksobtain`='".$this->Escape($this->t_marksobtain)."', 
			`t_outof`='".$this->Escape($this->t_outof)."', 
			`t_oralexamination`='".$this->Escape($this->t_oralexamination)."', 
			`t_familinteraction`='".$this->Escape($this->t_familinteraction)."', 
			`t_percentage`='".$this->Escape($this->t_percentage)."', 
			`t_result`='".$this->Escape($this->t_result)."' where `es_testresultid`='".$this->es_testresultId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_testresult` (`t_serialno`, `t_acadamicsession`, `t_wardname`, `t_sex`, `t_class`, `t_marksobtain`, `t_outof`, `t_oralexamination`, `t_familinteraction`, `t_percentage`, `t_result` ) values (
			'".$this->Escape($this->t_serialno)."', 
			'".$this->Escape($this->t_acadamicsession)."', 
			'".$this->Escape($this->t_wardname)."', 
			'".$this->Escape($this->t_sex)."', 
			'".$this->Escape($this->t_class)."', 
			'".$this->Escape($this->t_marksobtain)."', 
			'".$this->Escape($this->t_outof)."', 
			'".$this->Escape($this->t_oralexamination)."', 
			'".$this->Escape($this->t_familinteraction)."', 
			'".$this->Escape($this->t_percentage)."', 
			'".$this->Escape($this->t_result)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_testresultId == "")
		{
			$this->es_testresultId = $insertId;
		}
		return $this->es_testresultId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_testresultId
	*/
	function SaveNew()
	{
		$this->es_testresultId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_testresult` where `es_testresultid`='".$this->es_testresultId."'";
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
			$pog_query = "delete from `es_testresult` where ";
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