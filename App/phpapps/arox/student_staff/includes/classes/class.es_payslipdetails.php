<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_payslipdetails` (
	`es_payslipdetailsid` int(11) NOT NULL auto_increment,
	`staff_id` INT NOT NULL,
	`pay_month` DATE NOT NULL,
	`basic_salary` FLOAT NOT NULL,
	`tot_allowance` FLOAT NOT NULL,
	`tot_deductions` FLOAT NOT NULL,
	`net_salary` FLOAT NOT NULL, PRIMARY KEY  (`es_payslipdetailsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_payslipdetails</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_payslipdetails&attributeList=array+%28%0A++0+%3D%3E+%27staff_id%27%2C%0A++1+%3D%3E+%27pay_month%27%2C%0A++2+%3D%3E+%27basic_salary%27%2C%0A++3+%3D%3E+%27tot_allowance%27%2C%0A++4+%3D%3E+%27tot_deductions%27%2C%0A++5+%3D%3E+%27net_salary%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27DATE%27%2C%0A++2+%3D%3E+%27FLOAT%27%2C%0A++3+%3D%3E+%27FLOAT%27%2C%0A++4+%3D%3E+%27FLOAT%27%2C%0A++5+%3D%3E+%27FLOAT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_payslipdetails extends POG_Base
{
	public $es_payslipdetailsId = '';

	/**
	 * @var INT
	 */
	public $staff_id;
	
	/**
	 * @var DATE
	 */
	public $pay_month;
	
	/**
	 * @var FLOAT
	 */
	public $basic_salary;
	
	/**
	 * @var FLOAT
	 */
	public $tot_allowance;
	
	/**
	 * @var FLOAT
	 */
	public $tot_deductions;
	
	/**
	 * @var FLOAT
	 */
	public $net_salary;
	
	public $pog_attribute_type = array(
		"es_payslipdetailsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"staff_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"pay_month" => array('db_attributes' => array("NUMERIC", "DATE")),
		"basic_salary" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"tot_allowance" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"tot_deductions" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"net_salary" => array('db_attributes' => array("NUMERIC", "FLOAT")),
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
	
	function es_payslipdetails($staff_id='', $pay_month='', $basic_salary='', $tot_allowance='', $tot_deductions='', $net_salary='')
	{
		$this->staff_id = $staff_id;
		$this->pay_month = $pay_month;
		$this->basic_salary = $basic_salary;
		$this->tot_allowance = $tot_allowance;
		$this->tot_deductions = $tot_deductions;
		$this->net_salary = $net_salary;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_payslipdetailsId 
	* @return object $es_payslipdetails
	*/
	function Get($es_payslipdetailsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_payslipdetails` where `es_payslipdetailsid`='".intval($es_payslipdetailsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_payslipdetailsId = $row['es_payslipdetailsid'];
			$this->staff_id = $this->Unescape($row['staff_id']);
			$this->pay_month = $row['pay_month'];
			$this->basic_salary = $this->Unescape($row['basic_salary']);
			$this->tot_allowance = $this->Unescape($row['tot_allowance']);
			$this->tot_deductions = $this->Unescape($row['tot_deductions']);
			$this->net_salary = $this->Unescape($row['net_salary']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_payslipdetailsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_payslipdetails` ";
		$es_payslipdetailsList = Array();
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
			$sortBy = "es_payslipdetailsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_payslipdetails = new $thisObjectName();
			$es_payslipdetails->es_payslipdetailsId = $row['es_payslipdetailsid'];
			$es_payslipdetails->staff_id = $this->Unescape($row['staff_id']);
			$es_payslipdetails->pay_month = $row['pay_month'];
			$es_payslipdetails->basic_salary = $this->Unescape($row['basic_salary']);
			$es_payslipdetails->tot_allowance = $this->Unescape($row['tot_allowance']);
			$es_payslipdetails->tot_deductions = $this->Unescape($row['tot_deductions']);
			$es_payslipdetails->net_salary = $this->Unescape($row['net_salary']);
			$es_payslipdetailsList[] = $es_payslipdetails;
		}
		return $es_payslipdetailsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_payslipdetailsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_payslipdetailsid` from `es_payslipdetails` where `es_payslipdetailsid`='".$this->es_payslipdetailsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_payslipdetails` set 
			`staff_id`='".$this->Escape($this->staff_id)."', 
			`pay_month`='".$this->pay_month."', 
			`basic_salary`='".$this->Escape($this->basic_salary)."', 
			`tot_allowance`='".$this->Escape($this->tot_allowance)."', 
			`tot_deductions`='".$this->Escape($this->tot_deductions)."', 
			`net_salary`='".$this->Escape($this->net_salary)."' where `es_payslipdetailsid`='".$this->es_payslipdetailsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_payslipdetails` (`staff_id`, `pay_month`, `basic_salary`, `tot_allowance`, `tot_deductions`, `net_salary` ) values (
			'".$this->Escape($this->staff_id)."', 
			'".$this->pay_month."', 
			'".$this->Escape($this->basic_salary)."', 
			'".$this->Escape($this->tot_allowance)."', 
			'".$this->Escape($this->tot_deductions)."', 
			'".$this->Escape($this->net_salary)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_payslipdetailsId == "")
		{
			$this->es_payslipdetailsId = $insertId;
		}
		return $this->es_payslipdetailsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_payslipdetailsId
	*/
	function SaveNew()
	{
		$this->es_payslipdetailsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_payslipdetails` where `es_payslipdetailsid`='".$this->es_payslipdetailsId."'";
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
			$pog_query = "delete from `es_payslipdetails` where ";
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