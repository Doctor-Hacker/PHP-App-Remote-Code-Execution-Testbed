<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_attend_student` (
	`es_attend_studentid` int(11) NOT NULL auto_increment,
	`at_std_group` VARCHAR(255) NOT NULL,
	`at_std_class` VARCHAR(255) NOT NULL,
	`at_attendance_date` DATETIME NOT NULL,
	`at_std_subject` VARCHAR(255) NOT NULL,
	`at_std_period` INT NOT NULL,
	`at_period_from` INT NOT NULL,
	`at_period_to` INT NOT NULL,
	`at_reg_no` VARCHAR(255) NOT NULL,
	`at_stud_name` VARCHAR(255) NOT NULL,
	`at_attendance` VARCHAR(255) NOT NULL,
	`at_remarks` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_attend_studentid`)) ENGINE=MyISAM;
*/

/**
* <b>es_attend_student</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_attend_student&attributeList=array+%28%0A++0+%3D%3E+%27at_std_group%27%2C%0A++1+%3D%3E+%27at_std_class%27%2C%0A++2+%3D%3E+%27at_attendance_date%27%2C%0A++3+%3D%3E+%27at_std_subject%27%2C%0A++4+%3D%3E+%27at_std_period%27%2C%0A++5+%3D%3E+%27at_period_from%27%2C%0A++6+%3D%3E+%27at_period_to%27%2C%0A++7+%3D%3E+%27at_reg_no%27%2C%0A++8+%3D%3E+%27at_stud_name%27%2C%0A++9+%3D%3E+%27at_attendance%27%2C%0A++10+%3D%3E+%27at_remarks%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATETIME%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27INT%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_attend_student extends POG_Base
{
	public $es_attend_studentId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $at_std_group;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_std_class;
	
	/**
	 * @var DATETIME
	 */
	public $at_attendance_date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_std_subject;
	
	/**
	 * @var INT
	 */
	public $at_std_period;
	
	/**
	 * @var INT
	 */
	public $at_period_from;
	
	/**
	 * @var INT
	 */
	public $at_period_to;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_reg_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_stud_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_attendance;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $at_remarks;
	
	public $pog_attribute_type = array(
		"es_attend_studentId" => array('db_attributes' => array("NUMERIC", "INT")),
		"at_std_group" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_std_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_attendance_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"at_std_subject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_std_period" => array('db_attributes' => array("NUMERIC", "INT")),
		"at_period_from" => array('db_attributes' => array("NUMERIC", "INT")),
		"at_period_to" => array('db_attributes' => array("NUMERIC", "INT")),
		"at_reg_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_stud_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_attendance" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"at_remarks" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_attend_student($at_std_group='', $at_std_class='', $at_attendance_date='', $at_std_subject='', $at_std_period='', $at_period_from='', $at_period_to='', $at_reg_no='', $at_stud_name='', $at_attendance='', $at_remarks='')
	{
		$this->at_std_group = $at_std_group;
		$this->at_std_class = $at_std_class;
		$this->at_attendance_date = $at_attendance_date;
		$this->at_std_subject = $at_std_subject;
		$this->at_std_period = $at_std_period;
		$this->at_period_from = $at_period_from;
		$this->at_period_to = $at_period_to;
		$this->at_reg_no = $at_reg_no;
		$this->at_stud_name = $at_stud_name;
		$this->at_attendance = $at_attendance;
		$this->at_remarks = $at_remarks;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_attend_studentId 
	* @return object $es_attend_student
	*/
	function Get($es_attend_studentId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_attend_student` where `es_attend_studentid`='".intval($es_attend_studentId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_attend_studentId = $row['es_attend_studentid'];
			$this->at_std_group = $this->Unescape($row['at_std_group']);
			$this->at_std_class = $this->Unescape($row['at_std_class']);
			$this->at_attendance_date = $row['at_attendance_date'];
			$this->at_std_subject = $this->Unescape($row['at_std_subject']);
			$this->at_std_period = $this->Unescape($row['at_std_period']);
			$this->at_period_from = $this->Unescape($row['at_period_from']);
			$this->at_period_to = $this->Unescape($row['at_period_to']);
			$this->at_reg_no = $this->Unescape($row['at_reg_no']);
			$this->at_stud_name = $this->Unescape($row['at_stud_name']);
			$this->at_attendance = $this->Unescape($row['at_attendance']);
			$this->at_remarks = $this->Unescape($row['at_remarks']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_attend_studentList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_attend_student` ";
		$es_attend_studentList = Array();
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
			$sortBy = "es_attend_studentid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_attend_student = new $thisObjectName();
			$es_attend_student->es_attend_studentId = $row['es_attend_studentid'];
			$es_attend_student->at_std_group = $this->Unescape($row['at_std_group']);
			$es_attend_student->at_std_class = $this->Unescape($row['at_std_class']);
			$es_attend_student->at_attendance_date = $row['at_attendance_date'];
			$es_attend_student->at_std_subject = $this->Unescape($row['at_std_subject']);
			$es_attend_student->at_std_period = $this->Unescape($row['at_std_period']);
			$es_attend_student->at_period_from = $this->Unescape($row['at_period_from']);
			$es_attend_student->at_period_to = $this->Unescape($row['at_period_to']);
			$es_attend_student->at_reg_no = $this->Unescape($row['at_reg_no']);
			$es_attend_student->at_stud_name = $this->Unescape($row['at_stud_name']);
			$es_attend_student->at_attendance = $this->Unescape($row['at_attendance']);
			$es_attend_student->at_remarks = $this->Unescape($row['at_remarks']);
			$es_attend_studentList[] = $es_attend_student;
		}
		return $es_attend_studentList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_attend_studentId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_attend_studentid` from `es_attend_student` where `es_attend_studentid`='".$this->es_attend_studentId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_attend_student` set 
			`at_std_group`='".$this->Escape($this->at_std_group)."', 
			`at_std_class`='".$this->Escape($this->at_std_class)."', 
			`at_attendance_date`='".$this->at_attendance_date."', 
			`at_std_subject`='".$this->Escape($this->at_std_subject)."', 
			`at_std_period`='".$this->Escape($this->at_std_period)."', 
			`at_period_from`='".$this->Escape($this->at_period_from)."', 
			`at_period_to`='".$this->Escape($this->at_period_to)."', 
			`at_reg_no`='".$this->Escape($this->at_reg_no)."', 
			`at_stud_name`='".$this->Escape($this->at_stud_name)."', 
			`at_attendance`='".$this->Escape($this->at_attendance)."', 
			`at_remarks`='".$this->Escape($this->at_remarks)."' where `es_attend_studentid`='".$this->es_attend_studentId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_attend_student` (`at_std_group`, `at_std_class`, `at_attendance_date`, `at_std_subject`, `at_std_period`, `at_period_from`, `at_period_to`, `at_reg_no`, `at_stud_name`, `at_attendance`, `at_remarks` ) values (
			'".$this->Escape($this->at_std_group)."', 
			'".$this->Escape($this->at_std_class)."', 
			'".$this->at_attendance_date."', 
			'".$this->Escape($this->at_std_subject)."', 
			'".$this->Escape($this->at_std_period)."', 
			'".$this->Escape($this->at_period_from)."', 
			'".$this->Escape($this->at_period_to)."', 
			'".$this->Escape($this->at_reg_no)."', 
			'".$this->Escape($this->at_stud_name)."', 
			'".$this->Escape($this->at_attendance)."', 
			'".$this->Escape($this->at_remarks)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_attend_studentId == "")
		{
			$this->es_attend_studentId = $insertId;
		}
		return $this->es_attend_studentId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_attend_studentId
	*/
	function SaveNew()
	{
		$this->es_attend_studentId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_attend_student` where `es_attend_studentid`='".$this->es_attend_studentId."'";
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
			$pog_query = "delete from `es_attend_student` where ";
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