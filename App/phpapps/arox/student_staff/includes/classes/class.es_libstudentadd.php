<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_libstudentadd` (
	`es_libstudentaddid` int(11) NOT NULL auto_increment,
	`student_id` INT NOT NULL,
	`student_name` VARCHAR(255) NOT NULL,
	`student_sex` VARCHAR(255) NOT NULL,
	`student_fathername` VARCHAR(255) NOT NULL,
	`student_classname` VARCHAR(255) NOT NULL,
	`student_section` VARCHAR(255) NOT NULL,
	`student_adress` VARCHAR(255) NOT NULL,
	`student_phoneno` VARCHAR(255) NOT NULL,
	`student_aditinalinfo` VARCHAR(255) NOT NULL,
	`student_issuedfrom` VARCHAR(255) NOT NULL,
	`student_issuedto` VARCHAR(255) NOT NULL,
	`status` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_libstudentaddid`)) ENGINE=MyISAM;
*/

/**
* <b>es_libstudentadd</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_libstudentadd&attributeList=array+%28%0A++0+%3D%3E+%27student_id%27%2C%0A++1+%3D%3E+%27student_name%27%2C%0A++2+%3D%3E+%27student_sex%27%2C%0A++3+%3D%3E+%27student_fathername%27%2C%0A++4+%3D%3E+%27student_classname%27%2C%0A++5+%3D%3E+%27student_section%27%2C%0A++6+%3D%3E+%27student_adress%27%2C%0A++7+%3D%3E+%27student_phoneno%27%2C%0A++8+%3D%3E+%27student_aditinalinfo%27%2C%0A++9+%3D%3E+%27student_issuedfrom%27%2C%0A++10+%3D%3E+%27student_issuedto%27%2C%0A++11+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_libstudentadd extends POG_Base
{
	public $es_libstudentaddId = '';

	/**
	 * @var INT
	 */
	public $student_id;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_sex;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_fathername;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_classname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_section;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_adress;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_phoneno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_aditinalinfo;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_issuedfrom;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $student_issuedto;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_libstudentaddId" => array('db_attributes' => array("NUMERIC", "INT")),
		"student_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"student_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_sex" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_fathername" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_classname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_section" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_adress" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_phoneno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_aditinalinfo" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_issuedfrom" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"student_issuedto" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_libstudentadd($student_id='', $student_name='', $student_sex='', $student_fathername='', $student_classname='', $student_section='', $student_adress='', $student_phoneno='', $student_aditinalinfo='', $student_issuedfrom='', $student_issuedto='', $status='')
	{
		$this->student_id = $student_id;
		$this->student_name = $student_name;
		$this->student_sex = $student_sex;
		$this->student_fathername = $student_fathername;
		$this->student_classname = $student_classname;
		$this->student_section = $student_section;
		$this->student_adress = $student_adress;
		$this->student_phoneno = $student_phoneno;
		$this->student_aditinalinfo = $student_aditinalinfo;
		$this->student_issuedfrom = $student_issuedfrom;
		$this->student_issuedto = $student_issuedto;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_libstudentaddId 
	* @return object $es_libstudentadd
	*/
	function Get($es_libstudentaddId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libstudentadd` where `es_libstudentaddid`='".intval($es_libstudentaddId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libstudentaddId = $row['es_libstudentaddid'];
			$this->student_id = $this->Unescape($row['student_id']);
			$this->student_name = $this->Unescape($row['student_name']);
			$this->student_sex = $this->Unescape($row['student_sex']);
			$this->student_fathername = $this->Unescape($row['student_fathername']);
			$this->student_classname = $this->Unescape($row['student_classname']);
			$this->student_section = $this->Unescape($row['student_section']);
			$this->student_adress = $this->Unescape($row['student_adress']);
			$this->student_phoneno = $this->Unescape($row['student_phoneno']);
			$this->student_aditinalinfo = $this->Unescape($row['student_aditinalinfo']);
			$this->student_issuedfrom = $this->Unescape($row['student_issuedfrom']);
			$this->student_issuedto = $this->Unescape($row['student_issuedto']);
			$this->status = $this->Unescape($row['status']);
		}
		return $this;
	}
	function Get1($es_libstudentaddId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libstudentadd` where `student_id`='".intval($es_libstudentaddId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libstudentaddId = $row['es_libstudentaddid'];
			$this->student_id = $this->Unescape($row['student_id']);
			$this->student_name = $this->Unescape($row['student_name']);
			$this->student_sex = $this->Unescape($row['student_sex']);
			$this->student_fathername = $this->Unescape($row['student_fathername']);
			$this->student_classname = $this->Unescape($row['student_classname']);
			$this->student_section = $this->Unescape($row['student_section']);
			$this->student_adress = $this->Unescape($row['student_adress']);
			$this->student_phoneno = $this->Unescape($row['student_phoneno']);
			$this->student_aditinalinfo = $this->Unescape($row['student_aditinalinfo']);
			$this->student_issuedfrom = $this->Unescape($row['student_issuedfrom']);
			$this->student_issuedto = $this->Unescape($row['student_issuedto']);
			$this->status = $this->Unescape($row['status']);
		}
		return $this;
	}
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_libstudentaddList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_libstudentadd` ";
		$es_libstudentaddList = Array();
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
			$sortBy = "es_libstudentaddid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_libstudentadd = new $thisObjectName();
			$es_libstudentadd->es_libstudentaddId = $row['es_libstudentaddid'];
			$es_libstudentadd->student_id = $this->Unescape($row['student_id']);
			$es_libstudentadd->student_name = $this->Unescape($row['student_name']);
			$es_libstudentadd->student_sex = $this->Unescape($row['student_sex']);
			$es_libstudentadd->student_fathername = $this->Unescape($row['student_fathername']);
			$es_libstudentadd->student_classname = $this->Unescape($row['student_classname']);
			$es_libstudentadd->student_section = $this->Unescape($row['student_section']);
			$es_libstudentadd->student_adress = $this->Unescape($row['student_adress']);
			$es_libstudentadd->student_phoneno = $this->Unescape($row['student_phoneno']);
			$es_libstudentadd->student_aditinalinfo = $this->Unescape($row['student_aditinalinfo']);
			$es_libstudentadd->student_issuedfrom = $this->Unescape($row['student_issuedfrom']);
			$es_libstudentadd->student_issuedto = $this->Unescape($row['student_issuedto']);
			$es_libstudentadd->status = $this->Unescape($row['status']);
			$es_libstudentaddList[] = $es_libstudentadd;
		}
		return $es_libstudentaddList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_libstudentaddId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_libstudentaddid` from `es_libstudentadd` where `es_libstudentaddid`='".$this->es_libstudentaddId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_libstudentadd` set 
			`student_id`='".$this->Escape($this->student_id)."', 
			`student_name`='".$this->Escape($this->student_name)."', 
			`student_sex`='".$this->Escape($this->student_sex)."', 
			`student_fathername`='".$this->Escape($this->student_fathername)."', 
			`student_classname`='".$this->Escape($this->student_classname)."', 
			`student_section`='".$this->Escape($this->student_section)."', 
			`student_adress`='".$this->Escape($this->student_adress)."', 
			`student_phoneno`='".$this->Escape($this->student_phoneno)."', 
			`student_aditinalinfo`='".$this->Escape($this->student_aditinalinfo)."', 
			`student_issuedfrom`='".$this->Escape($this->student_issuedfrom)."', 
			`student_issuedto`='".$this->Escape($this->student_issuedto)."', 
			`status`='".$this->Escape($this->status)."' where `es_libstudentaddid`='".$this->es_libstudentaddId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_libstudentadd` (`student_id`, `student_name`, `student_sex`, `student_fathername`, `student_classname`, `student_section`, `student_adress`, `student_phoneno`, `student_aditinalinfo`, `student_issuedfrom`, `student_issuedto`, `status` ) values (
			'".$this->Escape($this->student_id)."', 
			'".$this->Escape($this->student_name)."', 
			'".$this->Escape($this->student_sex)."', 
			'".$this->Escape($this->student_fathername)."', 
			'".$this->Escape($this->student_classname)."', 
			'".$this->Escape($this->student_section)."', 
			'".$this->Escape($this->student_adress)."', 
			'".$this->Escape($this->student_phoneno)."', 
			'".$this->Escape($this->student_aditinalinfo)."', 
			'".$this->Escape($this->student_issuedfrom)."', 
			'".$this->Escape($this->student_issuedto)."', 
			'".$this->Escape($this->status)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_libstudentaddId == "")
		{
			$this->es_libstudentaddId = $insertId;
		}
		return $this->es_libstudentaddId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_libstudentaddId
	*/
	function SaveNew()
	{
		$this->es_libstudentaddId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_libstudentadd` where `es_libstudentaddid`='".$this->es_libstudentaddId."'";
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
			$pog_query = "delete from `es_libstudentadd` where ";
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