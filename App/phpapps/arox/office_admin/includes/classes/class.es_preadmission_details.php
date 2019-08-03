<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_preadmission_details` (
	`es_preadmission_detailsid` int(11) NOT NULL auto_increment,
	`es_preadmissionid` INT NOT NULL,
	`pre_class` VARCHAR(255) NOT NULL,
	`pre_fromdate` DATE NOT NULL,
	`pre_todate` DATE NOT NULL,
	`status` ENUM('pass','fail','resultawaiting', 'inactive' ) NOT NULL,
	`admission_status` ENUM('newadmission','promoted') NOT NULL, PRIMARY KEY  (`es_preadmission_detailsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_preadmission_details</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_preadmission_details&attributeList=array+%28%0A++0+%3D%3E+%27es_preadmissionid%27%2C%0A++1+%3D%3E+%27pre_class%27%2C%0A++2+%3D%3E+%27pre_fromdate%27%2C%0A++3+%3D%3E+%27pre_todate%27%2C%0A++4+%3D%3E+%27status%27%2C%0A++5+%3D%3E+%27admission_status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27ENUM%28%5C%27pass%5C%27%2C%5C%27fail%5C%27%2C%5C%27resultawaiting%5C%27%2C+%5C%27inactive%5C%27+%29%27%2C%0A++5+%3D%3E+%27ENUM%28%5C%27newadmission%5C%27%2C%5C%27promoted%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_preadmission_details extends POG_Base
{
	public $es_preadmission_detailsId = '';

	/**
	 * @var INT
	 */
	public $es_preadmissionid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_class;
	
	/**
	 * @var DATE
	 */
	public $pre_fromdate;
	
	/**
	 * @var DATE
	 */
	public $pre_todate;
	
	/**
	 * @var ENUM('pass','fail','resultawaiting', 'inactive' )
	 */
	public $status;
	
	/**
	 * @var ENUM('newadmission','promoted')
	 */
	public $admission_status;
	
	public $pog_attribute_type = array(
		"es_preadmission_detailsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_preadmissionid" => array('db_attributes' => array("NUMERIC", "INT")),
		"pre_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_fromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"pre_todate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'pass','fail','resultawaiting', 'inactive'")),
		"admission_status" => array('db_attributes' => array("SET", "ENUM", "'newadmission','promoted'")),
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
	
	function es_preadmission_details($es_preadmissionid='', $pre_class='', $pre_fromdate='', $pre_todate='', $status='', $admission_status='')
	{
		$this->es_preadmissionid = $es_preadmissionid;
		$this->pre_class = $pre_class;
		$this->pre_fromdate = $pre_fromdate;
		$this->pre_todate = $pre_todate;
		$this->status = $status;
		$this->admission_status = $admission_status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_preadmission_detailsId 
	* @return object $es_preadmission_details
	*/
	function Get($es_preadmission_detailsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_preadmission_details` where `es_preadmission_detailsid`='".intval($es_preadmission_detailsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_preadmission_detailsId = $row['es_preadmission_detailsid'];
			$this->es_preadmissionid = $this->Unescape($row['es_preadmissionid']);
			$this->pre_class = $this->Unescape($row['pre_class']);
			$this->pre_fromdate = $row['pre_fromdate'];
			$this->pre_todate = $row['pre_todate'];
			$this->status = $row['status'];
			$this->admission_status = $row['admission_status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_preadmission_detailsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_preadmission_details` ";
		$es_preadmission_detailsList = Array();
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
			$sortBy = "es_preadmission_detailsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_preadmission_details = new $thisObjectName();
			$es_preadmission_details->es_preadmission_detailsId = $row['es_preadmission_detailsid'];
			$es_preadmission_details->es_preadmissionid = $this->Unescape($row['es_preadmissionid']);
			$es_preadmission_details->pre_class = $this->Unescape($row['pre_class']);
			$es_preadmission_details->pre_fromdate = $row['pre_fromdate'];
			$es_preadmission_details->pre_todate = $row['pre_todate'];
			$es_preadmission_details->status = $row['status'];
			$es_preadmission_details->admission_status = $row['admission_status'];
			$es_preadmission_detailsList[] = $es_preadmission_details;
		}
		return $es_preadmission_detailsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_preadmission_detailsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_preadmission_detailsid` from `es_preadmission_details` where `es_preadmission_detailsid`='".$this->es_preadmission_detailsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_preadmission_details` set 
			`es_preadmissionid`='".$this->Escape($this->es_preadmissionid)."', 
			`pre_class`='".$this->Escape($this->pre_class)."', 
			`pre_fromdate`='".$this->pre_fromdate."', 
			`pre_todate`='".$this->pre_todate."', 
			`status`='".$this->status."', 
			`admission_status`='".$this->admission_status."' where `es_preadmission_detailsid`='".$this->es_preadmission_detailsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_preadmission_details` (`es_preadmissionid`, `pre_class`, `pre_fromdate`, `pre_todate`, `status`, `admission_status` ) values (
			'".$this->Escape($this->es_preadmissionid)."', 
			'".$this->Escape($this->pre_class)."', 
			'".$this->pre_fromdate."', 
			'".$this->pre_todate."', 
			'".$this->status."', 
			'".$this->admission_status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_preadmission_detailsId == "")
		{
			$this->es_preadmission_detailsId = $insertId;
		}
		return $this->es_preadmission_detailsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_preadmission_detailsId
	*/
	function SaveNew()
	{
		$this->es_preadmission_detailsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_preadmission_details` where `es_preadmission_detailsid`='".$this->es_preadmission_detailsId."'";
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
			$pog_query = "delete from `es_preadmission_details` where ";
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