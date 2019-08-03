<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_exam_details` (
	`es_exam_detailsid` int(11) NOT NULL auto_increment,
	`academicexam_id` INT NOT NULL,
	`subject_id` INT NOT NULL,
	`exam_date` DATETIME NOT NULL,
	`exam_duration` VARCHAR(255) NOT NULL,
	`total_marks` INT NOT NULL,
	`pass_marks` INT NOT NULL,
	`upload_exam_paper` LONGTEXT NOT NULL, PRIMARY KEY  (`es_exam_detailsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_exam_details</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_exam_details&attributeList=array+%28%0A++0+%3D%3E+%27academicexam_id%27%2C%0A++1+%3D%3E+%27subject_id%27%2C%0A++2+%3D%3E+%27exam_date%27%2C%0A++3+%3D%3E+%27exam_duration%27%2C%0A++4+%3D%3E+%27total_marks%27%2C%0A++5+%3D%3E+%27pass_marks%27%2C%0A++6+%3D%3E+%27upload_exam_paper%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27DATETIME%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27LONGTEXT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_exam_details extends POG_Base
{
	public $es_exam_detailsId = '';

	/**
	 * @var INT
	 */
	public $academicexam_id;
	
	/**
	 * @var INT
	 */
	public $subject_id;
	
	/**
	 * @var DATETIME
	 */
	public $exam_date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $exam_duration;
	
	/**
	 * @var INT
	 */
	public $total_marks;
	
	/**
	 * @var INT
	 */
	public $pass_marks;
	
	/**
	 * @var LONGTEXT
	 */
	public $upload_exam_paper;
	
	public $pog_attribute_type = array(
		"es_exam_detailsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"academicexam_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"subject_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"exam_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"exam_duration" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"total_marks" => array('db_attributes' => array("NUMERIC", "INT")),
		"pass_marks" => array('db_attributes' => array("NUMERIC", "INT")),
		"upload_exam_paper" => array('db_attributes' => array("TEXT", "LONGTEXT")),
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
	
	function es_exam_details($academicexam_id='', $subject_id='', $exam_date='', $exam_duration='', $total_marks='', $pass_marks='', $upload_exam_paper='')
	{
		$this->academicexam_id = $academicexam_id;
		$this->subject_id = $subject_id;
		$this->exam_date = $exam_date;
		$this->exam_duration = $exam_duration;
		$this->total_marks = $total_marks;
		$this->pass_marks = $pass_marks;
		$this->upload_exam_paper = $upload_exam_paper;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_exam_detailsId 
	* @return object $es_exam_details
	*/
	function Get($es_exam_detailsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_exam_details` where `es_exam_detailsid`='".intval($es_exam_detailsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_exam_detailsId = $row['es_exam_detailsid'];
			$this->academicexam_id = $this->Unescape($row['academicexam_id']);
			$this->subject_id = $this->Unescape($row['subject_id']);
			$this->exam_date = $row['exam_date'];
			$this->exam_duration = $this->Unescape($row['exam_duration']);
			$this->total_marks = $this->Unescape($row['total_marks']);
			$this->pass_marks = $this->Unescape($row['pass_marks']);
			$this->upload_exam_paper = $this->Unescape($row['upload_exam_paper']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_exam_detailsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_exam_details` ";
		$es_exam_detailsList = Array();
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
			$sortBy = "es_exam_detailsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_exam_details = new $thisObjectName();
			$es_exam_details->es_exam_detailsId = $row['es_exam_detailsid'];
			$es_exam_details->academicexam_id = $this->Unescape($row['academicexam_id']);
			$es_exam_details->subject_id = $this->Unescape($row['subject_id']);
			$es_exam_details->exam_date = $row['exam_date'];
			$es_exam_details->exam_duration = $this->Unescape($row['exam_duration']);
			$es_exam_details->total_marks = $this->Unescape($row['total_marks']);
			$es_exam_details->pass_marks = $this->Unescape($row['pass_marks']);
			$es_exam_details->upload_exam_paper = $this->Unescape($row['upload_exam_paper']);
			$es_exam_detailsList[] = $es_exam_details;
		}
		return $es_exam_detailsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_exam_detailsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_exam_detailsid` from `es_exam_details` where `es_exam_detailsid`='".$this->es_exam_detailsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_exam_details` set 
			`academicexam_id`='".$this->Escape($this->academicexam_id)."', 
			`subject_id`='".$this->Escape($this->subject_id)."', 
			`exam_date`='".$this->exam_date."', 
			`exam_duration`='".$this->Escape($this->exam_duration)."', 
			`total_marks`='".$this->Escape($this->total_marks)."', 
			`pass_marks`='".$this->Escape($this->pass_marks)."', 
			`upload_exam_paper`='".$this->Escape($this->upload_exam_paper)."' where `es_exam_detailsid`='".$this->es_exam_detailsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_exam_details` (`academicexam_id`, `subject_id`, `exam_date`, `exam_duration`, `total_marks`, `pass_marks`, `upload_exam_paper` ) values (
			'".$this->Escape($this->academicexam_id)."', 
			'".$this->Escape($this->subject_id)."', 
			'".$this->exam_date."', 
			'".$this->Escape($this->exam_duration)."', 
			'".$this->Escape($this->total_marks)."', 
			'".$this->Escape($this->pass_marks)."', 
			'".$this->Escape($this->upload_exam_paper)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_exam_detailsId == "")
		{
			$this->es_exam_detailsId = $insertId;
		}
		return $this->es_exam_detailsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_exam_detailsId
	*/
	function SaveNew()
	{
		$this->es_exam_detailsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_exam_details` where `es_exam_detailsid`='".$this->es_exam_detailsId."'";
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
			$pog_query = "delete from `es_exam_details` where ";
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